package org.silex.publication;

import org.silex.service.ServiceBase;
import org.silex.publication.PublicationData;

import js.Lib;
import js.Dom;

#if SilexClientSide
#end

#if SilexServerSide
import org.silex.config.PublicationConfigManager;
import org.silex.util.FileSystemTools;
import haxe.remoting.Context;
import sys.io.File;
import sys.FileSystem;
#end

/**
 * 
 */
class PublicationService extends ServiceBase{
	/**
	 * Constant for this service name, as exposed to Haxe remoting
	 */
	public static inline var SERVICE_NAME:String = "publicationService";

#if SilexClientSide
	/**
	 * folder where publications are stored
	 */
	public var publicationFolder:String;
	/**
	 * Constructor
	 * Store the publication name and the folder where to look for the publications
	 */
	public function new(publicationFolder:String = null, gatewayUrl:String = ServiceBase.DEFAULT_GATEWAY_URL){
		super(SERVICE_NAME, gatewayUrl);
		this.publicationFolder = publicationFolder;
	}
	/**
	 * Retrieve a publication data
	 */
	public function getPublicationData(publicationName:String, onResult:PublicationData->Void, onError:String->Void=null) {
		callServerMethod("getPublicationData", [publicationName, publicationFolder], onResult, onError);
	}
	/**
	 * Set the publication data
	 */
	public function setPublicationData(publicationName:String, publicationData:PublicationData, onResult:Void->Void, onError:String->Void=null) {
		callServerMethod("setPublicationData", [publicationName, publicationData, publicationFolder], onResult, onError);
	}
	/**
	 * Create a publication given a publication data structure
	 */
	public function create(publicationName:String, publicationData:PublicationData, onResult:Void->Void, onError:String->Void=null) {
		callServerMethod("create", [publicationName, publicationData, publicationFolder], onResult, onError);
	}
	/**
	 * Move a publication to trash
	 */
	public function trash(publicationName:String, onResult:Void->Void, onError:String->Void=null) {
		callServerMethod("trash", [publicationName, publicationFolder], onResult, onError);
	}
	/**
	 * Empty trash, i.e. browse all publications and check their state, then permanently delete the ones with the state Trashed
	 */
	public function emptyTrash(onResult:Void->Void, onError:String->Void=null) {
		callServerMethod("emptyTrash", [publicationFolder], onResult, onError);
	}
	/**
	 * Duplicate an existing publication
	 */
	public function duplicate(srcPublicationName:String, publicationName:String, onResult:Void->Void, onError:String->Void=null) {
		callServerMethod("duplicate", [srcPublicationName, publicationName, publicationFolder], onResult, onError);
	}
	/**
	 * Rename an existing publication
	 * todo: handle empty names, security, same names, creation errors
	 */
	public function rename(srcPublicationName:String, publicationName:String, onResult:Void->Void, onError:String->Void=null) {
		callServerMethod("rename", [srcPublicationName, publicationName, publicationFolder], onResult, onError);
	}
	/**
	 * List available publication matching a state
	 * For the states enum use like Published(null) to have all Published publications
	 */
	public function getPublications(publicationStates:Null<Array<PublicationState>> = null, 
		onResult:Hash<PublicationConfig>->Void, onError:String->Void=null) {
		callServerMethod("getPublications", [publicationStates, publicationFolder], onResult, onError);
	}
#end

//////////////////////////////////////////////////////////////////////////////////////////	

#if SilexServerSide
	/**
	 * Constructor
	 */
	public function new(){
		super(SERVICE_NAME);
	}
	/**
	 * List available publication matching a state
	 * For the states enum use like Published(null) to have all Published publications
	 * @return 	Hash with the publications names as key and the publications config as value
	 */
	public function getPublications(publicationStates:Null<Array<PublicationState>> = null, 
		publicationFolder:String = PublicationConfigManager.DEFAULT_PUBLICATION_FOLDER):Hash<PublicationConfig> {
		// browse all folders in the publications directory
		var files:Array<String> = FileSystem.readDirectory(publicationFolder);
		// keep only the folders and the publication with the desired states
		var publications:Hash<PublicationConfig> = new Hash();
		for(name in files){
			var path = publicationFolder + name + "/";
			if (FileSystem.isDirectory(path)){
				var publicationConfig = getPublicationConfig(name, publicationFolder);
				// if no filter is provided, add anyway
				if (publicationStates == null || publicationStates.length == 0){
					publications.set(name, publicationConfig);
				}
				else{
					// filter
					switch (publicationConfig.state) {
						case Private:
							if (Lambda.has(publicationStates, Private))
								publications.set(name, publicationConfig);
						case Trashed(data):
							if (Lambda.has(publicationStates, Trashed(null)))
								publications.set(name, publicationConfig);
						case Published(data):
							if (Lambda.has(publicationStates, Published(null)))
								publications.set(name, publicationConfig);
					}
				}
			}
		}
		return publications;
	}
	/**
	 * Empty trash, i.e. browse all publications and check their state, then permanently delete the ones with the state Trashed
	 */
	public function emptyTrash(publicationFolder:String = PublicationConfigManager.DEFAULT_PUBLICATION_FOLDER) {
		// get all publications with a state "Trashed"
		var publications:Hash<PublicationConfig> = getPublications([Trashed(null)], publicationFolder);
		// browse all publications
		for (publicationName in publications.keys()){
			FileSystemTools.recursiveDelete(publicationFolder + publicationName + "/");
		}
	}
	/**
	 * Create a publication given a publication data structure
	 */
	public function create(publicationName:String, publicationData:PublicationData, publicationFolder:String = PublicationConfigManager.DEFAULT_PUBLICATION_FOLDER) {
		try{
			// update with actual date and author
			var publicationConfig:PublicationConfig = {
				state : Private,
				creation : {
					author : "silexlabs", 
					date : Date.now()
				}, 
				lastChange : {
					author : "silexlabs", 
					date : Date.now()
				}
			};
			// create the empty directory for the publication
			FileSystem.createDirectory(publicationFolder + publicationName);
			// create other empty directories
			FileSystem.createDirectory(publicationFolder + publicationName + "/" + PublicationConfigManager.PUBLICATION_CONFIG_FOLDER);
			// set the publication config
			setPublicationConfig(publicationName, publicationConfig, publicationFolder);
			// set the publication data
			setPublicationData(publicationName, publicationData, publicationFolder);
		}
		catch(e:Dynamic){
			throw(e);
		}
	}
	/**
	 * Duplicate an existing publication
	 */
	public function duplicate(srcPublicationName:String, publicationName:String, publicationFolder:String = PublicationConfigManager.DEFAULT_PUBLICATION_FOLDER) {
		try{
			// retrieve the application data
			var publicationData:PublicationData = getPublicationData(srcPublicationName, publicationFolder);

			// create the new publication
			create(publicationName, publicationData, publicationFolder);
		}
		catch(e:Dynamic){
			throw(e);
		}
	}
	/**
	 * Rename an existing publication
	 * todo: handle empty names, security, same names, creation errors
	 */
	public function rename(srcPublicationName:String, publicationName:String, publicationFolder:String = PublicationConfigManager.DEFAULT_PUBLICATION_FOLDER) {
		try{
			// retrieve the application data
			var publicationData:PublicationData = getPublicationData(srcPublicationName, publicationFolder);

			// create the new publication
			create(publicationName, publicationData, publicationFolder);

			// permanently delete this publication
			FileSystemTools.recursiveDelete(publicationFolder+srcPublicationName);
		}
		catch(e:Dynamic){
			throw(e);
		}
	}
	/**
	 * Delete a publication
	 * Put it in the trash state
	 */
	public function trash(publicationName:String, publicationFolder:String = PublicationConfigManager.DEFAULT_PUBLICATION_FOLDER) {
		try{
			// set the publication data
			var publicationConfig = getPublicationConfig(publicationName, publicationFolder);

			// trash state
			publicationConfig.state = Trashed({
				author: "todo: authors and security",
				date: Date.now()
			});

			// update with actual date and author
			publicationConfig.lastChange.author = "to do this author";
			publicationConfig.lastChange.date = Date.now();
			
			// set config data
			setPublicationConfig(publicationName, publicationConfig, publicationFolder);

		}
		catch(e:Dynamic){
			throw(e);
		}
	}
	/**
	 * Retrieve a publication raw HTML/CSS string and the config
	 * TODO: handle the case where the publication does not exist
	 */
	public function getPublicationData(publicationName:String, publicationFolder:String = PublicationConfigManager.DEFAULT_PUBLICATION_FOLDER):Null<PublicationData> {
		try{
			var html = File.getContent(publicationFolder + publicationName + "/" + PublicationConfigManager.PUBLICATION_HTML_FILE);
			var css = File.getContent(publicationFolder + publicationName + "/" + PublicationConfigManager.PUBLICATION_CSS_FILE);
			var publicationConfig = getPublicationConfig(publicationName, publicationFolder);
			return {
				html : html,
				css: css,
			};
		}
		catch(e:Dynamic){
			throw(e);
		}
	}
	/**
	 * Set a publication raw HTML and css
	 * TODO: handle the case where the publication does not exist
	 */
	public function setPublicationData(publicationName:String, publicationData:PublicationData, publicationFolder:String = PublicationConfigManager.DEFAULT_PUBLICATION_FOLDER) {
		try{
			File.saveContent(publicationFolder + publicationName + "/" + PublicationConfigManager.PUBLICATION_HTML_FILE, publicationData.html);
			File.saveContent(publicationFolder + publicationName + "/" + PublicationConfigManager.PUBLICATION_CSS_FILE, publicationData.css);
		}
		catch(e:Dynamic){
			throw(e);
		}
	}
	/**
	 * Retrieve publication config
	 * TODO: handle the case where the publication does not exist
	 */
	public function getPublicationConfig(publicationName:String, publicationFolder:String = PublicationConfigManager.DEFAULT_PUBLICATION_FOLDER):PublicationConfig {
		try{
			var config = new PublicationConfigManager(publicationFolder + publicationName + "/" + PublicationConfigManager.PUBLICATION_CONFIG_FOLDER + PublicationConfigManager.PUBLICATION_CONFIG_FILE);
			return config.publicationConfig;
		}
		catch(e:Dynamic){
			throw(e);
		}
	}
	/**
	 * Update publication config
	 * TODO: handle the case where the publication does not exist
	 */
	public function setPublicationConfig(publicationName:String, publicationConfig:PublicationConfig, publicationFolder:String = PublicationConfigManager.DEFAULT_PUBLICATION_FOLDER) {
		try{
			var config = new PublicationConfigManager();
			config.publicationConfig = {
				state : publicationConfig.state,
				creation : publicationConfig.creation, 
				lastChange : publicationConfig.lastChange
			}
			config.saveData(publicationFolder + publicationName + "/" + PublicationConfigManager.PUBLICATION_CONFIG_FOLDER + "/" + PublicationConfigManager.PUBLICATION_CONFIG_FILE);
		}
		catch(e:Dynamic){
			throw(e);
		}
	}
#end
}
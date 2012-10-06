package silex.publication;

import silex.ServiceBase;
import silex.publication.PublicationData;

import js.Lib;
import js.Dom;

#if silexClientSide
#end

#if silexServerSide
import silex.publication.PublicationConfig;
import silex.publication.PublicationData;
import silex.util.FileSystemTools;
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
	public static var SERVICE_NAME:String = "publicationService";

#if silexClientSide
	/**
	 * Constructor
	 * Store the publication name and the folder where to look for the publications
	 */
	public function new(){
		super(SERVICE_NAME);
	}
	/**
	 * Retrieve publication config
	 */
	public function getPublicationConfig(publicationName:String, onResult:PublicationConfigData->Void, onError:String->Void=null) {
		callServerMethod("getPublicationConfig", [publicationName], onResult, onError);
	}
	/**
	 * Set the publication config
	 */
	public function setPublicationConfig(publicationName:String, publicationConfigData:PublicationConfigData, onResult:Void->Void, onError:String->Void=null) {
		callServerMethod("setPublicationConfig", [publicationName, publicationConfigData], onResult, onError);
	}
	/**
	 * Retrieve a publication data
	 */
	public function getPublicationData(publicationName:String, onResult:PublicationData->Void, onError:String->Void=null) {
		callServerMethod("getPublicationData", [publicationName], onResult, onError);
	}
	/**
	 * Set the publication data
	 */
	public function setPublicationData(publicationName:String, publicationData:PublicationData, onResult:Void->Void, onError:String->Void=null) {
		callServerMethod("setPublicationData", [publicationName, publicationData], onResult, onError);
	}
	/**
	 * Create a publication given a publication data structure
	 */
	public function create(publicationName:String, publicationData:PublicationData, onResult:Void->Void, onError:String->Void=null) {
		callServerMethod("create", [publicationName, publicationData], onResult, onError);
	}
	/**
	 * Move a publication to trash
	 */
	public function trash(publicationName:String, onResult:Void->Void, onError:String->Void=null) {
		callServerMethod("trash", [publicationName], onResult, onError);
	}
	/**
	 * Empty trash, i.e. browse all publications and check their state, then permanently delete the ones with the state Trashed
	 */
	public function emptyTrash(onResult:Void->Void, onError:String->Void=null) {
		callServerMethod("emptyTrash", [], onResult, onError);
	}
	/**
	 * Duplicate an existing publication
	 */
	public function duplicate(srcPublicationName:String, publicationName:String, onResult:Void->Void, onError:String->Void=null) {
		callServerMethod("duplicate", [srcPublicationName, publicationName], onResult, onError);
	}
	/**
	 * Rename an existing publication
	 * todo: handle empty names, security, same names, creation errors
	 */
	public function rename(srcPublicationName:String, publicationName:String, onResult:Void->Void, onError:String->Void=null) {
		callServerMethod("rename", [srcPublicationName, publicationName], onResult, onError);
	}
	/**
	 * List available publication matching a state
	 * For the states enum use like Published(null) to have all Published publications
	 */
	public function getPublications(stateFilter:Null<Array<PublicationState>> = null, 
		categoryFilter:Null<Array<PublicationCategory>> = null, 
		onResult:Hash<PublicationConfigData>->Void, onError:String->Void=null) {
		callServerMethod("getPublications", [stateFilter, categoryFilter], onResult, onError);
	}
#end

//////////////////////////////////////////////////////////////////////////////////////////	

#if silexServerSide
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
	public function getPublications(stateFilter:Null<Array<PublicationState>> = null, 
		categoryFilter:Null<Array<PublicationCategory>> = null):Hash<PublicationConfigData> {
		// browse all folders in the publications directory
		var files:Array<String> = FileSystem.readDirectory(PUBLICATION_FOLDER);
		// keep only the folders and the publication with the desired states
		var publications:Hash<PublicationConfigData> = new Hash();
		for(name in files){
			// check that the publication folder is not a file
			var path = PUBLICATION_FOLDER + name + "/";
			if (FileSystem.isDirectory(path)){
				var configData = getPublicationConfig(name);
				// variable used to know if we should return this publication or not
				var fitStateFilter = false;
				var fitCategoryFilter = false;
				// if no filter is provided, add anyway
				if (stateFilter == null || stateFilter.length == 0){
					fitStateFilter = true;
				}
				else{
					// filter
					switch (configData.state) {
						case Private:
							if (Lambda.has(stateFilter, Private))
								fitStateFilter = true;
						case Trashed(data):
							if (Lambda.has(stateFilter, Trashed(null)))
								fitStateFilter = true;
						case Published(data):
							if (Lambda.has(stateFilter, Published(null)))
								fitStateFilter = true;
					}
				}
				// if no filter is provided, add anyway
				if (categoryFilter == null || categoryFilter.length == 0){
					fitCategoryFilter = true;
				}
				else{
					// filter
					switch (configData.category) {
						case Publication:
							if (Lambda.has(categoryFilter, Publication))
								fitCategoryFilter = true;
						case Utility:
							if (Lambda.has(categoryFilter, Utility))
								fitCategoryFilter = true;
						case Theme:
							if (Lambda.has(categoryFilter, Theme))
								fitCategoryFilter = true;
					}
				}
				// add the publication to the returned hash
				if(fitStateFilter && fitCategoryFilter)
					publications.set(name, configData);
			}
		}
		return publications;
	}
	/**
	 * Empty trash, i.e. browse all publications and check their state, then permanently delete the ones with the state Trashed
	 */
	public function emptyTrash() {
		// get all publications with a state "Trashed"
		var publications:Hash<PublicationConfigData> = getPublications([Trashed(null)]);
		// browse all publications
		for (publicationName in publications.keys()){
			FileSystemTools.recursiveDelete(PUBLICATION_FOLDER + publicationName + "/");
		}
	}
	/**
	 * Create a publication given a publication data structure
	 */
	public function create(publicationName:String, publicationData:PublicationData) {
		try{
			// update with actual date and author
			var configData:PublicationConfigData = {
				state : Private,
				category : Publication,
				creation : {
					author : "silexlabs", 
					date : Date.now()
				}, 
				lastChange : {
					author : "silexlabs", 
					date : Date.now()
				},
				debugModeAction: null
			};
			// create the empty directory for the publication
			FileSystem.createDirectory(PUBLICATION_FOLDER + publicationName);
			// create other empty directories
			FileSystem.createDirectory(PUBLICATION_FOLDER + publicationName + "/" + PublicationConfig.PUBLICATION_CONFIG_FOLDER);
			// set the publication config
			setPublicationConfig(publicationName, configData);
			// set the publication data
			setPublicationData(publicationName, publicationData);
		}
		catch(e:Dynamic){
			throw(e);
		}
	}
	/**
	 * Duplicate an existing publication
	 */
	public function duplicate(srcPublicationName:String, publicationName:String) {
		try{
			// retrieve the application data
			var publicationData:PublicationData = getPublicationData(srcPublicationName);

			// create the new publication
			create(publicationName, publicationData);
		}
		catch(e:Dynamic){
			throw(e);
		}
	}
	/**
	 * Rename an existing publication
	 * todo: handle empty names, security, same names, creation errors
	 */
	public function rename(srcPublicationName:String, publicationName:String) {
		try{
			// retrieve the application data
			var publicationData:PublicationData = getPublicationData(srcPublicationName);

			// create the new publication
			create(publicationName, publicationData);

			// permanently delete this publication
			FileSystemTools.recursiveDelete(PUBLICATION_FOLDER+srcPublicationName);
		}
		catch(e:Dynamic){
			throw(e);
		}
	}
	/**
	 * Delete a publication
	 * Put it in the trash state
	 */
	public function trash(publicationName:String) {
		try{
			// set the publication data
			var configData = getPublicationConfig(publicationName);

			// trash state
			configData.state = Trashed({
				author: "todo: authors and security",
				date: Date.now()
			});

			// update with actual date and author
			configData.lastChange.author = "to do this author";
			configData.lastChange.date = Date.now();
			
			// set config data
			setPublicationConfig(publicationName, configData);

		}
		catch(e:Dynamic){
			throw(e);
		}
	}
	/**
	 * Retrieve a publication raw HTML/CSS string and the config
	 */
	public function getPublicationData(publicationName:String):Null<PublicationData> {
		try{
			var html = File.getContent(PUBLICATION_FOLDER + publicationName + "/" + PublicationConfig.PUBLICATION_HTML_FILE);
			var css = File.getContent(PUBLICATION_FOLDER + publicationName + "/" + PublicationConfig.PUBLICATION_CSS_FILE);
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
	 */
	public function setPublicationData(publicationName:String, publicationData:PublicationData) {
		try{
			File.saveContent(PUBLICATION_FOLDER + publicationName + "/" + PublicationConfig.PUBLICATION_HTML_FILE, publicationData.html);
			File.saveContent(PUBLICATION_FOLDER + publicationName + "/" + PublicationConfig.PUBLICATION_CSS_FILE, publicationData.css);
		}
		catch(e:Dynamic){
			throw(e);
		}
	}
	/**
	 * Retrieve publication config
	 * TODO: handle the case where the publication does not exist
	 */
	public function getPublicationConfig(publicationName:String):PublicationConfigData {
		try{
			var config = new PublicationConfig(PUBLICATION_FOLDER + publicationName + "/" + PublicationConfig.PUBLICATION_CONFIG_FOLDER + PublicationConfig.PUBLICATION_CONFIG_FILE);
			return config.configData;
		}
		catch(e:Dynamic){
			throw(e);
		}
	}
	/**
	 * Update publication config
	 * TODO: handle the case where the publication does not exist
	 */
	public function setPublicationConfig(publicationName:String, configData:PublicationConfigData) {
		try{
			var config = new PublicationConfig();
			config.configData = {
				state : configData.state,
				category : configData.category,
				creation : configData.creation, 
				lastChange : configData.lastChange,
				debugModeAction : configData.debugModeAction,
			}
			config.saveData(PUBLICATION_FOLDER + publicationName + "/" + PublicationConfig.PUBLICATION_CONFIG_FOLDER + "/" + PublicationConfig.PUBLICATION_CONFIG_FILE);
		}
		catch(e:Dynamic){
			throw(e);
		}
	}
#end
}
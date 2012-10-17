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
	 * todo: check that the publication is not utils or theme/template
	 */
	public function setPublicationData(publicationName:String, publicationData:PublicationData, onResult:Void->Void, onError:String->Void=null) {
		callServerMethod("setPublicationData", [publicationName, publicationData], onResult, onError);
	}
	/**
	 * Create a publication given an initial publication data structure
	 * Use the publication named "creation-template".
	 */
	public function create(publicationName:String, onResult:Void->Void, onError:String->Void=null) {
		callServerMethod("create", [publicationName], onResult, onError);
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
	 * build the publication folder path
	 */
	private function getPublicationFolder(publicationName:String):String{
		return PublicationConstants.PUBLICATION_FOLDER + publicationName + "/";
	}
	/**
	 * Duplicate a publication
	 * this private method is used in create, duplicate, rename...
	 * if newConfigData is provided, each field which is not null is pushed in the new publication config
	 * todo: handle empty names, same names, creation errors
	 */
	private function doDuplicate(srcPublicationName:String, publicationName:String, newConfigData:PublicationConfigData=null) {
		try{
			// retrieve the publication config data
			var configData = getPublicationConfig(srcPublicationName);

			// create the new publication
			FileSystemTools.recursiveCopy(getPublicationFolder(srcPublicationName), getPublicationFolder(publicationName));

			// update with actual date and author
			configData.lastChange.author = "silexlabs";
			configData.lastChange.date = Date.now();

			// update with the provided data
			if (newConfigData != null){
				for (fieldName in Reflect.fields(newConfigData)){
					var value = Reflect.field(newConfigData, fieldName);
					if(value!=null){
						Reflect.setField(configData, fieldName, value);
					}
				}
			}
			// set config data
			setPublicationConfig(publicationName, configData);
		}
		catch(e:Dynamic){
			throw("doDuplicate("+srcPublicationName+", "+publicationName+", "+newConfigData+") error: "+e);
		}
	}
	/**
	 * List available publication matching a state
	 * For the states enum use like Published(null) to have all Published publications
	 * @return 	Hash with the publications names as key and the publications config as value
	 */
	public function getPublications(stateFilter:Null<Array<PublicationState>> = null, 
		categoryFilter:Null<Array<PublicationCategory>> = null):Hash<PublicationConfigData> {
		// browse all folders in the publications directory
		var files:Array<String> = FileSystem.readDirectory(PublicationConstants.PUBLICATION_FOLDER);
		// keep only the folders and the publication with the desired states
		var publications:Hash<PublicationConfigData> = new Hash();
		for(name in files){
			// check publication name is authorized
			if (!StringTools.startsWith(name, ".") 
				&& name.indexOf("..")<0){				
				// check that the publication folder is not a file
				var path = getPublicationFolder(name);
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
			FileSystemTools.recursiveDelete(getPublicationFolder(publicationName));
		}
	}
	/**
	 * Obsolete: open "creation-template" and then use saveAs
	 * Create a publication out of the publication named "creation-template".
	 * @param 	publicationName 	the template from which to create the new publication
	 */
	public function create(publicationName:String) {
		try{
			// update with actual date and author
			var configData:PublicationConfigData = {
				state : null, // this is changed in the client side (PublicationModel::doCreate)
				category : null, // this is changed in the client side (PublicationModel::doCreate)
				creation : {
					author : "silexlabs", 
					date : Date.now()
				}, 
				lastChange : null,
				debugModeAction: null
			};
			// duplicate with a new creation author and date
			doDuplicate(PublicationConstants.CREATION_TEMPLATE_PUBLICATION_NAME, publicationName, configData);
		}
		catch(e:Dynamic){
			throw("create error: "+e);
		}
	}
	/**
	 * Duplicate an existing publication
	 */
	public function duplicate(srcPublicationName:String, publicationName:String) {
		try{
			// duplicate without changing creation author and date
			doDuplicate(srcPublicationName, publicationName);
		}
		catch(e:Dynamic){
			throw("duplicate("+srcPublicationName+", "+publicationName+") error: "+e);
		}
	}
	/**
	 * Rename an existing publication
	 */
	public function rename(srcPublicationName:String, publicationName:String) {
		try{
			// duplicate without changing creation author and date
			doDuplicate(srcPublicationName, publicationName);

			// permanently delete this publication
			FileSystemTools.recursiveDelete(getPublicationFolder(srcPublicationName));
		}
		catch(e:Dynamic){
			throw("rename("+srcPublicationName+", "+publicationName+") error: "+e);
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
				author: "silexlabs",
				date: Date.now()
			});

			// update with actual date and author
			configData.lastChange.author = "silexlabs";
			configData.lastChange.date = Date.now();
			
			// set config data
			setPublicationConfig(publicationName, configData);

		}
		catch(e:Dynamic){
			throw("trash("+publicationName+") error: "+e);
		}
	}
	/**
	 * Retrieve a publication raw HTML/CSS string and the config
	 */
	public function getPublicationData(publicationName:String):Null<PublicationData> {
		try{
			var html = File.getContent(getPublicationFolder(publicationName) + PublicationConstants.PUBLICATION_HTML_FILE);
			var css = File.getContent(getPublicationFolder(publicationName) + PublicationConstants.PUBLICATION_CSS_FILE);
			return {
				html : html,
				css: css,
			};
		}
		catch(e:Dynamic){
			throw("getPublicationData("+publicationName+") error: "+e);
		}
	}
	/**
	 * Set a publication raw HTML and css
	 */
	public function setPublicationData(publicationName:String, publicationData:PublicationData) {
		try{
			File.saveContent(getPublicationFolder(publicationName) + PublicationConstants.PUBLICATION_HTML_FILE, publicationData.html);
			File.saveContent(getPublicationFolder(publicationName) + PublicationConstants.PUBLICATION_CSS_FILE, publicationData.css);
		}
		catch(e:Dynamic){
			throw("setPublicationData("+publicationName+", "+publicationData+") error: "+e);
		}
	}
	/**
	 * Retrieve publication config
	 * TODO: handle the case where the publication does not exist
	 */
	public function getPublicationConfig(publicationName:String):PublicationConfigData {
		try{
			var config = new PublicationConfig(getPublicationFolder(publicationName) + PublicationConstants.PUBLICATION_CONFIG_FOLDER + PublicationConstants.PUBLICATION_CONFIG_FILE);
			return config.configData;
		}
		catch(e:Dynamic){
			throw("getPublicationConfig("+publicationName+") error: "+e);
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
			config.saveData(getPublicationFolder(publicationName) + PublicationConstants.PUBLICATION_CONFIG_FOLDER + PublicationConstants.PUBLICATION_CONFIG_FILE);
		}
		catch(e:Dynamic){
			throw("setPublicationConfig("+publicationName+", "+configData+") error: "+e);
		}
	}
#end
}
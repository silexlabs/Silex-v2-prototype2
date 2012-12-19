<?php
// here you must have defined $key and $secret in conf/server-config.xml.php

/**
 * A bootstrap for the Dropbox SDK usage examples
* @link https://github.com/BenTheDesigner/Dropbox/tree/master/examples
*/

// Prevent access via command line interface
if (PHP_SAPI === 'cli') {
    exit('bootstrap.php must not be run via the command line interface');
}

// Don't allow direct access to the bootstrap
if(basename($_SERVER['REQUEST_URI']) == 'bootstrap.php'){
    exit('bootstrap.php does nothing on its own. Please see the examples provided');
}

set_include_path(get_include_path() . PATH_SEPARATOR . __DIR__.'/../Dropbox');
//set_include_path(get_include_path() . PATH_SEPARATOR . __DIR__.'/../Dropbox/Dropbox');
//require_once("Dropbox/API.php");

// Set error reporting
error_reporting(-1);
ini_set('display_errors', 'On');
ini_set('html_errors', 'On');

// Register a simple autoload function
spl_autoload_register(function($class){
    $class = str_replace('\\', '/', $class);
    require_once('' . $class . '.php');
});

// Check whether to use HTTPS and set the callback URL
$protocol = (!empty($_SERVER['HTTPS'])) ? 'https' : 'http';
$callback = $protocol . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

// Instantiate the Encrypter and storage objects
$encrypter = new \Dropbox\OAuth\Storage\Encrypter('XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX');

// User ID assigned by your auth system (used by persistent storage handlers)
$userID = 1;

// Instantiate the database data store and connect
$storage = new \Dropbox\OAuth\Storage\PDO($encrypter, $userID);
//$storage->connect('localhost', 'dropbox', 'username', 'password', 3306);
$storage->connect('localhost', 'dropbox', 'root', 'root', 3306);
// Optionally set the table name, default is dropbox_oauth_tokens
// $storage->setTable('oauth_tokens');

// If you use this, comment out lines 44-47
//$storage = new \Dropbox\OAuth\Storage\Session($encrypter);

// Instantiate the filesystem store and set the token directory
// Note: If you use this, comment out lines 44-47 and 50
//$storage = new \Dropbox\OAuth\Storage\Filesystem($encrypter, $userID);
//$storage->setDirectory('tokens');

$OAuth = new \Dropbox\OAuth\Consumer\Curl($key, $secret, $storage, $callback);
$dropbox = new \Dropbox\API($OAuth);


class SilexDropbox
{
	/**
	 * List available publication matching a state
	 * For the states enum use like Published(null) to have all Published publications
	 * @return 	Hash with the publications names as key and the publications config as value
	 */
	public function getPublications():Hash<PublicationConfigData> {
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
}
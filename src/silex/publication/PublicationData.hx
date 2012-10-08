package silex.publication;

import js.Dom;

class PublicationConstants 
{
	/**
	 * constant, path and file names
	 */
	public static inline var PUBLICATION_HTML_FILE:String = "index.html";
	/**
	 * constant, path and file names
	 */
	public static inline var PUBLICATION_CSS_FILE:String = "app.css";
	/**
	 * constant, path and file names
	 */
	public static inline var PUBLICATION_ASSETS_FOLDER:String = "assets/";
	/**
	 * constant, path and file names
	 */
	public static inline var PUBLICATION_CONFIG_FOLDER:String = "conf/";
	/**
	 * constant, path and file names
	 */
	public static inline var PUBLICATION_CONFIG_FILE:String = "config.xml.php";
	/**
	 * Relative path of the publication folder
	 */ 
	public static var PUBLICATION_FOLDER = "publications/";
	/** 
	 * name of the publication which contains Silex builder
	 */
	public static var BUILDER_PUBLICATION_NAME = "admin";
}
/**
 * Structure used to store the items of the publication list
 */
typedef PublicationListItem = {
	name:String, 
	configData:PublicationConfigData
}
/**
 * Store the content data of a publiction for client/server transmission
 */
typedef PublicationData = {
	/**
	 * the raw HTML data of the publication including the body and header tags
	 * @example 	<HTML><HEAD><META name="description" content="Silex online editor"></META></HEAD><BODY><P>Hello</P></BODY></HTML>
	 */
	var html:String;
	/**
	 * the CSS data of the publication, saved in the style folder of the publication
	 */
	var css:String;
}

/**
 * Category of a publication
 * use PublicationConfigManager::publicationConfig to get the config of a given publication
 */
enum PublicationCategory{
	Publication;
	Utility;
	Theme; // Todo: (id:String, version:String, url:String);
}
/**
 * state of a publication
 * use PublicationConfigManager::publicationConfig to get the config of a given publication
 */
enum PublicationState{
	Trashed(data:ChangeData);
	Published(data:ChangeData);
	Private;
}
/**
 * Store the data concerning a change of a publication data, i.e. creation, deletion, ...
 */
typedef ChangeData = {
	/**
	 * The author of the change
	 */
	public var author:String; // TODO: UserId instead of String
	/**
	 * The date of the change
	 */
	public var date:Date;
}
/**
 * Store the configuration data of a publiction
 * Stored in a .xml.php file
 * use PublicationConfigManager::publicationConfig to get the config of a given publication
 */
typedef PublicationConfigData = {
	/**
	 * State of the publication
	 */
	var state:PublicationState;
	/**
	 * Category of the publication
	 */
	var category:PublicationCategory;
	/**
	 * The owner of the publication and the date of creation
	 */
	var creation:ChangeData;
	/**
	 * The last change data
	 */
	var lastChange:ChangeData;
	/**
	 * Script to be executed when the publication is opened.
	 * This is for debug purpose and it requires Silex to be compiled with the flag -silexDebug
	 */
	var debugModeAction:Null<String>;
}
package org.silex.publication;

import js.Dom;


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
	 * the raw HTML data of the publication's body tag, including the body tag
	 * @example 	<BODY><P>Hello</P></BODY>
	 */
//	var body:String;
	/**
	 * the raw HTML data of the publication's head tag, including the head tag
	 * @example 	<HEAD><META name="description" content="Silex online editor"></META></HEAD>
	 */
//	var head:String;
	/**
	 * the CSS data of the publication, saved in the style folder of the publication
	 */
	var css:String;
	/**
	 * name of the publication, which is also the folder containing the publication files
	 * @example		[publication folder path]/[publication name]/
	 */
//	var name:String;
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
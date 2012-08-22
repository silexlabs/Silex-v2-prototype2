package org.silex.publication;

import js.Dom;


/**
 * Store the content data of a publiction for client/server transmission
 */
typedef PublicationData = {
	/**
	 * the raw HTML data of the publication, including html, head and body tags
	 */
	var html:String;
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
typedef PublicationConfig = {
	/**
	 * State of the publication
	 */
	var state:PublicationState;
	/**
	 * The owner of the publication and the date of creation
	 */
	var creation:ChangeData;
	/**
	 * The last change data
	 */
	var lastChange:ChangeData;
}
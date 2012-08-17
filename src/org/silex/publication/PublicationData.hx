package org.silex.publication;

import js.Dom;
import org.silex.config.PublicationConfigManager;


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
//	var styleSheets:HtmlCollection<StyleSheet>;
	/**
	 * the configuration data of the publication stored in the publication config file
	 */
	var publicationConfig:PublicationConfig;
}

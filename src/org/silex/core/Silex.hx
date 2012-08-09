package org.silex.core;

import js.Lib;
import js.Dom;


//////////////////////////////////////////////////
// Imports
//////////////////////////////////////////////////


import org.slplayer.core.Application;
#if SilexClientSide
#end

#if SilexServerSide
import php.Web;
import sys.io.File;
#end

//////////////////////////////////////////////////
// Main Silex class
// TODO: should not be a static class, and should be sandboxed
//////////////////////////////////////////////////
/**
 * Entry point for Silex applications
 * TODO: should not be a static class, and should be sandboxed
 */
class Silex {
	/**
	 * constant, name of tag
	 */
	public static inline var CONFIG_TAG:String = "meta";
	/**
	 * constant, name of attribute
	 */
	public static inline var CONFIG_NAME_ATTR:String = "name";
	/**
	 * constant, name of attribute
	 */
	public static inline var CONFIG_VALUE_ATTR:String = "content";
	/**
	 * constant, name of attribute
	 */
	public static inline var CONFIG_INITIAL_PAGE_NAME:String = "InitialPageName";
	/**
	 * constant, name of attribute
	 */
	public static inline var CONFIG_PUBLICATION_NAME:String = "PublicationName";
	/**
	 * constant, name of attribute
	 */
	public static inline var CONFIG_PUBLICATION_BODY:String = "PublicationBody";
	/**
	 * constant, path and file names
	 */
	public static inline var PUBLICATIONS_FOLDER:String = "publications/";
	/**
	 * constant, path and file names
	 */
	public static inline var PUBLICATION_HTML_FILE:String = "content/index.html";
	/**
	 * configuration of this publication
	 */
	static public var config:Hash<String>;
	/**
	 * Publication name
	 * It is provided in the URL as http://my.domain.com/?publication_name
	 */
	static public var publicationName:String;
	/**
	 * Name of the current page
	 * Initially, it is provided in the URL as http://my.domain.com/?publication_name/page_name
	 * or as http://my.domain.com/?/page_name
	 */
	static public var initialPageName:String;

#if SilexClientSide
	/**
	 * Entry point for Silex applications
	 * Load Silex config
	 * Load HTML and site config
	 * Init plugins
	 * Init SLPayer
	 * Init Silex pages
	 * Open the default page or the page designated by the deeplink
	 */
	static public function main() {
		haxe.Timer.delay(doAfterDomInit, 1000);
		trace("- "+Lib.document.body);
	}
	static private function doAfterDomInit(){
		trace("Silex starting");

		// bug in nme:		
		config = loadConfig(Lib.document);

		// retrieve initialPageName
		initialPageName = config.get(CONFIG_INITIAL_PAGE_NAME);
		
		// retrieve publicationName
		publicationName = config.get(CONFIG_PUBLICATION_NAME);

		trace("- "+Lib.document.body+" - "+config);

		Lib.document.body.innerHTML = StringTools.htmlUnescape(config.get(CONFIG_PUBLICATION_BODY));

		haxe.Timer.delay(doAfterBodyInit, 1000);
	}
	static private function doAfterBodyInit(){
		// init SLPlayer components
		Application.init();
	}
#end
#if SilexServerSide
	/**
	 * Entry point for Silex applications
	 * Retrieve the publication name from the URL
	 * Load Silex config
	 * Load HTML and site config
	 * Init plugins
	 * Init SLPayer
	 * Output the code to load Silex client in Javascript or in Flash version  
	 */
	static public function main() {
		// load server config
		//var serverConfig = new ServerConfig(publicationName);

		// Retrieve the publication name from the URL
		var urlParamsString:String = Web.getParamsString();
		var params:Array<String> = (urlParamsString.split("&")[0]).split("/");

		// extracts the publication name
		// case of http://my.domain.com/
		// all default params
		if (params.length == 0){
			publicationName = "";
			initialPageName = "";
		} 
		// case of 		http://my.domain.com/?/my.page
		else if (params.length == 1){
			// publication name is either "" or the 1st element
			publicationName = params[0];
			// default value
			initialPageName = "";
		}
		// case of 		http://my.domain.com/?my.site/my.page
		else {

			// publication name is either "" or the 1st element
			publicationName = params[0];

			// page name is either "" or the 1st element
			initialPageName = params[1];
		}
		// default publication
		//if (publicationName == "")
		//	publicationName = serverConfig.defaultPublication;

		// Load HTML data
		var htmlContent:String = File.getContent(PUBLICATIONS_FOLDER + publicationName + "/" + PUBLICATION_HTML_FILE);
		//trace("- "+initialPageName+" - "+params);
		//Lib.document.documentElement.innerHTML = "<html><head></head><body><p>test</p></body></html>";
		Lib.document.documentElement.innerHTML = htmlContent;

		// Load site config
		config = loadConfig(Lib.document);

		// Add meta tags in the head section for CONFIG_INITIAL_PAGE_NAME and CONFIG_PUBLICATION_NAME
		config = setConfig(Lib.document, CONFIG_PUBLICATION_NAME, publicationName);

		// add meta with the page content
		config = setConfig(Lib.document, CONFIG_PUBLICATION_BODY, StringTools.htmlEscape(Lib.document.body.innerHTML));

		// set initial page 
		if (initialPageName != "")
				config = setConfig(Lib.document, CONFIG_INITIAL_PAGE_NAME, initialPageName);

//		trace(Lib.document.body.innerHTML);
//		trace("-----------------------------------------------------------------");
		// init SLPayer
		Application.init();
//		trace(Lib.document.body.innerHTML);
//		trace("-----------------------------------------------------------------");

		// Output the code to load Silex client in Javascript or in Flash version 
		php.Lib.print(Lib.document.documentElement.innerHTML);
	}
#end
	/**
	 * Adds or replace a meta tag
	 */
	static public function setConfig(document:Document, metaName:String, metaValue:String):Hash<String>{
		var res:Hash<String> = new Hash();

		// retrieve all config tags (the meta tags)
		var metaTags:HtmlCollection<HtmlDom> = document.getElementsByTagName(CONFIG_TAG);

		// flag to check if metaName exists
		var found = false;

		// for each config element, store the name/value pair
		for (idxNode in 0...metaTags.length){
			var node = metaTags[idxNode];
			var configName = node.getAttribute(CONFIG_NAME_ATTR);
			var configValue = node.getAttribute(CONFIG_VALUE_ATTR);
			if (configName!=null && configValue!=null){
				if(configName == metaName){
					configValue = metaValue;
					node.setAttribute(CONFIG_VALUE_ATTR, metaValue);
					found = true;
				}
				res.set(configName, configValue);
			}
		}
		// add the meta if needed
		if (!found){
			var node = document.createElement("meta");
			node.setAttribute("name", metaName);
			node.setAttribute("content", metaValue);
			var head = document.getElementsByTagName("head")[0];
			head.appendChild(node);
			// update config
			res.set(metaName, metaValue);
		}

		return res;
	}
	/**
	 * Load Silex config from HTML head/meta tags
	 */
	static public function loadConfig(document:Document):Hash<String>{
		var res:Hash<String> = new Hash();

		// retrieve all config tags (the meta tags)
		var metaTags:HtmlCollection<HtmlDom> = document.getElementsByTagName(CONFIG_TAG);

		// for each config element, store the name/value pair
		for (idxNode in 0...metaTags.length){
			var node = metaTags[idxNode];
			var configName = node.getAttribute(CONFIG_NAME_ATTR);
			var configValue = node.getAttribute(CONFIG_VALUE_ATTR);
			if (configName!=null && configValue!=null)
				res.set(configName, configValue);
		}
		return res;
	}
}
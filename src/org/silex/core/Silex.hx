package org.silex.core;

import js.Lib;
import js.Dom;


//////////////////////////////////////////////////
// Imports
//////////////////////////////////////////////////

import org.slplayer.core.Application;
import org.slplayer.util.DomTools;
import org.slplayer.component.navigation.Page;
#if SilexClientSide
#end

#if SilexServerSide
import php.Web;
import sys.io.File;

import org.silex.config.ServerConfig;
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
	 * constant, name of attribute
	 */
	public static inline var CONFIG_PUBLICATION_NAME:String = "publicationName";
	/**
	 * constant, name of attribute
	 */
	public static inline var CONFIG_PUBLICATION_BODY:String = "publicationBody";
	/**
	 * constant, path and file names
	 */
	public static inline var PUBLICATIONS_FOLDER:String = "publications/";
	/**
	 * constant, path and file names
	 */
	public static inline var PUBLICATION_HTML_FILE:String = "content/index.html";
	/**
	 * constant, path and file names
	 */
	public static inline var LOADER_SCRIPT_PATH:String = "loader.js";
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
		// workaround, bug https://github.com/silexlabs/Cocktail/issues/207
/**/
	#if js
		Lib.window.onload = init;
	#else
		init();
	#end
/**/		
//		init();
	}
	/**
	 * Method to call if this class is not defined as the application entry point
	 * Otherwise it is automatically called by main
	 */
	static public function init(unused:Dynamic=null){

		// create an SLPlayer app
		var application = Application.createApplication();

	#if flash
		// init the document with non empty body, workaround see  https://github.com/silexlabs/Cocktail/issues/208
		//Lib.document.innerHTML = "<html><head></head><body></body></html>";
		// retrieve config data from flashvars, add all flashvars to the meta
		var params:Dynamic<String> = flash.Lib.current.loaderInfo.parameters;
		for (paramName in Reflect.fields(params)){
			DomTools.setMeta(paramName, StringTools.urlDecode(Reflect.field(params, paramName)));
		}
	#end
	
		// retrieve initialPageName
		initialPageName = DomTools.getMeta(Page.CONFIG_INITIAL_PAGE_NAME);
		
		// retrieve publicationName
		publicationName = DomTools.getMeta(CONFIG_PUBLICATION_NAME);

		// set the body of the publication if it is provided in the meta
		var publicationBody = DomTools.getMeta(CONFIG_PUBLICATION_BODY);
		if (publicationBody != null){
			var node = Lib.document.createElement("DIV");
			node.innerHTML = StringTools.htmlUnescape(DomTools.getMeta(CONFIG_PUBLICATION_BODY));
			Lib.document.body.appendChild(node);
		}
		// init SLPlayer components
		application.init();
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
		// create an SLPlayer app
		var application = Application.createApplication();

		// load server config
		var serverConfig = new ServerConfig();

		// Retrieve the publication name from the URL
		var urlParamsString:String = Web.getParamsString();
		var params:Array<String> = (urlParamsString.split("&")[0]).split("/");

		// get the publication name from the URL
		// page name is either "" or the 1st element
		publicationName = params[0];
		// default value
		if (publicationName == ""){
			publicationName = serverConfig.defaultPublication;
		}

		// get the initial page name from the URL
		// case of 		http://my.domain.com/
		// case of 		http://my.domain.com/?/my.page
		if (params.length == 1){
			// default value
			initialPageName = "";
		}
		// case of 		http://my.domain.com/?my.site/my.page
		else {
			// page name is either "" or the 1st element
			initialPageName = params[1];
		}
		// Load HTML data
		var htmlContent:String = File.getContent(PUBLICATIONS_FOLDER + publicationName + "/" + PUBLICATION_HTML_FILE);
		//Lib.document.innerHTML = "<html><head></head><body><p>test</p></body></html>";
		Lib.document.innerHTML = htmlContent;

		// Add meta tags in the head section for CONFIG_INITIAL_PAGE_NAME and CONFIG_PUBLICATION_NAME
		DomTools.setMeta(CONFIG_PUBLICATION_NAME, publicationName);

		// add meta with the page content
		DomTools.setMeta(CONFIG_PUBLICATION_BODY, StringTools.htmlEscape(Lib.document.body.innerHTML));

		// set initial page 
		if (initialPageName != "")
				DomTools.setMeta(Page.CONFIG_INITIAL_PAGE_NAME, initialPageName);

		// add loader script
		var node = Lib.document.createElement("script");
		node.setAttribute("src", LOADER_SCRIPT_PATH);
		
		var head = Lib.document.getElementsByTagName("head")[0];
		head.appendChild(node);

		// init SLPayer
		application.init();

		// Output the code to load Silex client in Javascript or in Flash version 
		php.Lib.print(Lib.document.innerHTML);
	}
#end

	/**
	 * Load Silex config from HTML head/meta tags
	 * Store the config in the static config object
	 */
/*	static public function loadConfig(document:Document):Hash<String>{
		var res:Hash<String> = new Hash();

		// retrieve all config tags (the meta tags)
		var metaTags:HtmlCollection<HtmlDom> = document.getElementsByTagName("meta");

		// for each config element, store the name/value pair
		for (idxNode in 0...metaTags.length){
			var node = metaTags[idxNode];
			var configName = node.getAttribute("name");
			var configValue = node.getAttribute("content");
			if (configName!=null && configValue!=null)
				res.set(configName, configValue);
		}
		return res;
	}
*/
}
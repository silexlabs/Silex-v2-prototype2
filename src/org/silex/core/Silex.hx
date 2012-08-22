package org.silex.core;

import js.Lib;
import js.Dom;


//////////////////////////////////////////////////
// Imports
//////////////////////////////////////////////////

import org.slplayer.core.Application;
import org.slplayer.util.DomTools;

import org.slplayer.component.navigation.Page;

import org.silex.publication.PublicationService;

#if SilexClientSide
#end

#if SilexServerSide
import php.Web;
import sys.io.File;

import org.silex.config.ServerConfigManager;
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
	 * constant, name of attribute
	 */
	public static inline var CONFIG_USE_DEEPLINK:String = "useDeeplink";
	/**
	 * constant, path and file names
	 */
	public static inline var LOADER_SCRIPT_PATH:String = "loader.js";
	/**
	 * Publication name
	 * It is provided in the URL as http://my.domain.com/?publication_name
	 */
	static public var publicationName:String;

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
		#if js
			Lib.window.onload = init;
		#else
			init();
		#end
	}
	/**
	 * Init Silex app
	 */
	static public function init(unused:Dynamic=null){

	#if flash
		// retrieve config data from flashvars, add all flashvars to the meta
		var params:Dynamic<String> = flash.Lib.current.loaderInfo.parameters;
		for (paramName in Reflect.fields(params)){
			DomTools.setMeta(paramName, StringTools.urlDecode(Reflect.field(params, paramName)));
		}
	#else
		// retrieve initialPageName
		if (Lib.window.location.hash != "" && DomTools.getMeta(CONFIG_USE_DEEPLINK)!="false"){
			// hash is the page name after the # in the URL
			var initialPageName = Lib.window.location.hash.substr(1);
			// set initial page 
			DomTools.setMeta(Page.CONFIG_INITIAL_PAGE_NAME, initialPageName);
		}
	#end

		// retrieve publicationName
		publicationName = DomTools.getMeta(CONFIG_PUBLICATION_NAME);

		// set the body of the publication if it is provided in the meta
		var publicationBody = DomTools.getMeta(CONFIG_PUBLICATION_BODY);
		if (publicationBody != null){
			/*
			var node = Lib.document.createElement("DIV");
			node.innerHTML = StringTools.htmlUnescape(DomTools.getMeta(CONFIG_PUBLICATION_BODY));
			Lib.document.body.appendChild(node);
			/**/
			Lib.document.body.innerHTML = StringTools.htmlUnescape(DomTools.getMeta(CONFIG_PUBLICATION_BODY));
		}
		// init SLPlayer components
		trace(" application.init "+Lib.document.body);
		// create an SLPlayer app
		var application = Application.createApplication();
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
		// load server config
		var serverConfigManager = new ServerConfigManager();

		// Retrieve the publication name from the URL
		var urlParamsString:String = Web.getParamsString();
		var params:Array<String> = (urlParamsString.split("&")[0]).split("/");

		// get the publication name from the URL
		// page name is either "" or the 1st element
		publicationName = params[0];
		// default value
		if (publicationName == ""){
			publicationName = serverConfigManager.defaultPublication;
		}

		var initialPageName = "";
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
		var publicationService = new PublicationService();
		var publicationData = publicationService.getPublicationData(publicationName);

		// build the DOM
		Lib.document.innerHTML = publicationData.html;

		// include the script
		DomTools.addCssRules(publicationData.css);

		// Add meta tags in the head section for CONFIG_INITIAL_PAGE_NAME and CONFIG_PUBLICATION_NAME
		DomTools.setMeta(CONFIG_PUBLICATION_NAME, publicationName);

		// add meta with the page content
		DomTools.setMeta(CONFIG_PUBLICATION_BODY, StringTools.htmlEscape(Lib.document.body.innerHTML));

		// set initial page 
		if (initialPageName != "" && DomTools.getMeta(CONFIG_USE_DEEPLINK)!="false")
				DomTools.setMeta(Page.CONFIG_INITIAL_PAGE_NAME, initialPageName);

		// add loader script
		DomTools.embedScript(LOADER_SCRIPT_PATH);

		// create an SLPlayer app
		var application = Application.createApplication();

		// init SLPayer
		application.init(Lib.document.body);

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
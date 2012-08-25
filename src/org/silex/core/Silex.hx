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
import org.silex.interpreter.Interpreter;

#if silexClientSide
#end

#if silexServerSide
import php.Web;
import sys.io.File;
import haxe.remoting.HttpConnection;

import org.silex.core.ServerConfig;
import org.silex.service.ServiceBase;
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

#if silexClientSide
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

		haxe.Timer.delay(callback(doAfterInit, application), 1000);
	}
	private static function doAfterInit(application) {
		#if silexDebug
		// execute an action when needed for debug (publication and server config)
		var debugModeAction = DomTools.getMeta(Interpreter.CONFIG_TAG_DEBUG_MODE_ACTION);
		if (debugModeAction != null){
			var context = new Hash();
			context.set("slpid", application.id);
			var res = Interpreter.exec(StringTools.htmlUnescape(debugModeAction), context);
		}
		#end
	}
#end
#if silexServerSide
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
		var serverConfig = new ServerConfig();

		// create the services (which are then exposed)
		var publicationService = new PublicationService();

	    // handle remoting, this entry point can be a gateway 
		if( HttpConnection.handleRequest(ServiceBase.context) )
		  return;

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
		// Load HTML data
		var publicationData = publicationService.getPublicationData(publicationName);

		// Load config data
		var publicationConfig = publicationService.getPublicationConfig(publicationName);
	
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
		// build the DOM
		Lib.document.innerHTML = publicationData.html;

		// include the script
		DomTools.addCssRules(publicationData.css);

		// Add meta tags in the head section for CONFIG_INITIAL_PAGE_NAME and CONFIG_PUBLICATION_NAME
		DomTools.setMeta(CONFIG_PUBLICATION_NAME, publicationName);

		// add meta with the page content
		DomTools.setMeta(CONFIG_PUBLICATION_BODY, StringTools.htmlEscape(Lib.document.body.innerHTML));

		// add meta with the scripts
		// todo: add the scripts from the html page
		var scripts = StringTools.htmlEscape(serverConfig.debugModeAction + publicationConfig.debugModeAction);
		DomTools.setMeta(Interpreter.CONFIG_TAG_DEBUG_MODE_ACTION, scripts);

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
}
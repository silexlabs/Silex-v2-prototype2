package silex;

import js.Lib;
import js.Dom;

//////////////////////////////////////////////////
// Imports
//////////////////////////////////////////////////

import brix.core.Application;
import brix.util.DomTools;

import brix.component.navigation.Page;

import silex.file.FileService;

#if silexServerSide
import php.Web;
import sys.io.File;
import haxe.remoting.HttpConnection;
import haxe.Unserializer;

import silex.ServiceBase;
import silex.config.ServerConfig;
#else
import haxe.Serializer;
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
	 * used to pass data from the server to the client
	 */
	public static inline var CONFIG_FILE_BODY:String = "fileBody";
	/**
	 * constant, name of attribute
	 * used to pass data from the server to the client
	 */
	public static inline var CONFIG_USE_DEEPLINK:String = "useDeeplink";
	/**
	 * constant, path and file names
	 */
	public static inline var LOADER_SCRIPT_PATH:String = "../../libs/silex/loader.js";


#if silexClientSide
	/**
	 * store the initial URL, since it will change with base tags
	 */
	public static var initialBaseUrl:String;
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
 		trace("Hello Silex!");
		#if redirectTraces
			if (haxe.Firebug.detect())
			{
				haxe.Firebug.redirectTraces();
				trace("Brix redirect traces to console");
			}
			else
			{
				trace("Warning: Brix can not redirect traces to console, because no console was found");
			}
		#end

		// store the initial URL
		initialBaseUrl = DomTools.getBaseUrl();

		if (Lib.document.body == null){
			// the script has been loaded at start
			Lib.window.onload = init;
		}
		else{
			// the script has been loaded after the html page
			init();
		}
	}
	/**
	 * Init Silex app
	 */
	static public function init(unused:Dynamic=null){
		trace("Hello Silex!");
		// create a Brix app
		var application = Application.createApplication();
		application.initDom();

	#if flash
		// retrieve config data from flashvars, add all flashvars to the meta
		var params:Dynamic<String> = flash.Lib.current.loaderInfo.parameters;
		for (paramName in Reflect.fields(params)){
			var value = Reflect.field(params, paramName);
			// trace("Flashvar "+paramName+"="+value);
			DomTools.setMeta(paramName, StringTools.urlDecode(value));
		}
	#elseif js
		// retrieve initialPageName
		if (Lib.window.location.hash != "" && DomTools.getMeta(CONFIG_USE_DEEPLINK)!="false"){
			// hash is the page name after the # in the URL
			var initialPageName = Lib.window.location.hash.substr(1);
			// set initial page 
			DomTools.setMeta(Page.CONFIG_INITIAL_PAGE_NAME, initialPageName);
		}
	#end
		// init Brix components
		application.initComponents();
		application.attachBody();
		// make the file visible
		Lib.document.body.style.visibility = "visible";
	}
#end
#if silexServerSide
	/**
	 * Entry point for Silex applications
	 * Load Silex config
	 * Load HTML and site config
	 * Init plugins
	 * Init SLPayer
	 * Output the code to load Silex client in Javascript or in Flash version  
	 */
	static public function main() {
		// load server config
		var serverConfig = new ServerConfig();

		// create the services (which expose themselves to remoting)
		var fileService = new FileService(serverConfig);

	    // handle remoting, this entry point can be a gateway 
		if( HttpConnection.handleRequest(ServiceBase.context) )
		  return;

		//php.Lib.print("this is a haxe remoting gateway");

		// redirect to the builder
		Web.setHeader("Location", serverConfig.userFolder + serverConfig.defaultFile);
	}
#end
}
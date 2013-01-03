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


#if silexClientSide
	/**
	 * store the initial URL, since it will change with base tags
	 */
	public static var initialBaseUrl:String;

	public static inline var CHECK_INSTALL_SCRIPT = "../libs/dropbox/checkInstall.php";
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
		// 
		startSilexInit();
	}
#if silexBuilder
	/**
	 * builder version
	 * check the install is ok, may redirect
	 * then call init()
	 */
	private static function startSilexInit() 
	{
		var fileService = new FileService();
		fileService.checkInstall(onCheckInstall, onCheckInstallError);
		#if silexDropboxMode
			var element = DomTools.embedScript("https://www.dropbox.com/static/api/1/dropbox.js");
			element.setAttribute("id", "dropboxjs");
			element.setAttribute("data-app-key", "hxo7uimig22bi2o");
		#end
	}
	private static function onCheckInstall(installStatus:InstallStatus){
		trace("onCheckInstall return latest silex version: "+installStatus);
		if (installStatus.redirect != null){
			untyped {
				Lib.window.location = installStatus.redirect;
			}
		}
		else{
			init();
		}
	}
	private static function onCheckInstallError(error:String){
		trace("onCheckInstall error: "+error);
	#if silexDropboxMode
		untyped {
			Lib.window.location = CHECK_INSTALL_SCRIPT;
		}
	#end
	}
#else
	/**
	 * player version
	 * simply call call init()
	 */
	private static function startSilexInit() 
	{
		init();
	}
#end
	/**
	 * call init() right now, or wait for the body to be ready
	 */
	private static function init() 
	{
		if (Lib.document.body == null){
			// the script has been loaded at start
			Lib.window.onload = onLoad;
		}
		else{
			// the script has been loaded after the html page
			doInit();
		}
	}
	static function onLoad(e:Event){
		doInit();
	}
	/**
	 * Init Silex app
	 * Here, the body is ready but the file may not be attached yet (brix "embeded" mode)
	 */
	static public function doInit(){
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
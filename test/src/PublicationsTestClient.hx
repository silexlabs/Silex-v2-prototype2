package ;

import silex.publication.PublicationService;
import silex.publication.PublicationModel;
import silex.publication.PublicationData;
import silex.page.PageModel;
import silex.layer.LayerModel;
import silex.component.ComponentModel;
import silex.property.PropertyModel;

import brix.core.Application;
import brix.util.DomTools;

import brix.component.navigation.Page;

import silex.publication.PublicationService;
import silex.interpreter.Interpreter;
import silex.ServiceBase;

import js.Dom;
import js.XMLHttpRequest;


class PublicationsTestClient {


	public function new(){
	}

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
		haxe.Timer.delay(callback(init), 1000);
		ServiceBase.GATEWAY_URL = "../../gateway.php/";
	}
	/**
	 * Init Silex app
	 */
	static public function init(unused:Dynamic=null){
		// create an Brix app
		var application = Application.createApplication();
		application.initDom();

		// init Brix components
		trace(" application.init ");
		application.initComponents();

		haxe.Timer.delay(doAfterInit, 1000);
	}
	private static function doAfterInit() {
		// execute an action when needed for debug (publication and server config)
		var debugModeAction = DomTools.getMeta(Interpreter.CONFIG_TAG_DEBUG_MODE_ACTION);
		if (debugModeAction != null){
			var context:Hash<Dynamic> = new Hash();
			context.set("PublicationModel", PublicationModel);
			context.set("PageModel", PageModel);
			context.set("LayerModel", LayerModel);
			context.set("ComponentModel", ComponentModel);
			context.set("PropertyModel", PropertyModel);
			try{
				Interpreter.exec(StringTools.htmlUnescape(debugModeAction), context);
			}catch(e:Dynamic){
				throw("Error while executing the script in the config file of the publication (debugModeAction variable). The error: "+e);
			}
		}
	}
}
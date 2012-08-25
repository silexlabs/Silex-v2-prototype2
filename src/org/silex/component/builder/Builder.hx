package org.silex.component.builder;

import js.Dom;
import js.Lib;
import haxe.xml.Fast;

import org.silex.interpreter.Interpreter;
import org.silex.publication.PublicationService;
import org.silex.publication.PublicationData;
import org.slplayer.component.navigation.transition.TransitionData;
import org.slplayer.component.navigation.Page;

import org.slplayer.util.DomTools;

import org.slplayer.core.Application;
import org.slplayer.component.ui.DisplayObject;

/**
 * This class is in charge of loading and saving the publications.
 * It also has all the methods to manipulate the loaded publication DOM
 * The static methods can access the unique Biulder instance because it has registered iteself vie registerBuilder()
 */
class Builder extends DisplayObject{
	/**
	 * name for the builder mode of the Silex editor
	 */
	public static inline var BUILDER_MODE_PAGE_NAME = "Builder";
#if silexClientSide
	/**
	 * publication DOM used as the model
	 */
	public static var publicationModel:{body:HtmlDom, head:HtmlDom};
	/**
	 * publication DOM used as the view
	 * it is attached to the browser dom
	 */
	public static var publicationView:{body:HtmlDom, head:HtmlDom};
	/**
	 * currently loaded publication config
	 */
	public static var configData:PublicationConfigData;
	/**
	 * currently loaded publication name
	 */
	public static var publicationName:String;
	/**
	 * the builder instance 
	 * when it is instanciated, the Builder class registers itself with the static method registerBuilder (the call is made in the constructor)
	 * there should be only one builder per publication (unless you edit the builder with the builder
	 */
	public static var builderInstance:Builder;

	/**
	 * register the builder instance when it is instanciated (the call is made in the constructor)
	 * display the loaded view if needed
	 */
	private static function registerBuilder(builder:Builder){
		if (builderInstance != null){
			trace ("Warning: builder already registered, there should be only one builder per publication (unless you edit the builder with the builder)");
		}
		else{
			builderInstance = builder;
			if (publicationView != null)
				initView();
		}
	}
	/**
	 * load a publication
	 */
	public static function loadPublication(name:String, config:PublicationConfigData){
		trace("loading publication "+name);
		var publicationService = new PublicationService();
		publicationName = name;
		configData = config;
		publicationService.getPublicationData(name, onLoad, onError);
	}
	/**
	 * the publication is loaded
	 * duplicate the loaded dom and store the model and the view
	 * initialize the SLPlayer for the view
	 */
	public static function onLoad(data:PublicationData){
		publicationModel = {
			body:Lib.document.createElement("div"),
			head: Lib.document.createElement("div")
		}
		// parse html data as XML
		var xml = new Fast(Xml.parse(data.html).firstChild());

		// Convert xml to DOM/html
		if (xml.hasNode.body)
			publicationModel.body.innerHTML = xml.node.body.innerHTML;
		else if (xml.hasNode.BODY)
			publicationModel.body.innerHTML = xml.node.BODY.innerHTML;
		if (xml.hasNode.head)
			publicationModel.head.innerHTML = xml.node.head.innerHTML;
		else if (xml.hasNode.HEAD)
			publicationModel.head.innerHTML = xml.node.HEAD.innerHTML;

		// Duplicate DOM
		publicationView = {
			body: publicationModel.body.cloneNode(true),
			head: publicationModel.head.cloneNode(true)
		}
		// Add the CSS in the head 
		DomTools.addCssRules(data.css, publicationView.head);

		trace("Call attachView on the builder instance "+builderInstance);
		// attach to the browser DOM
		if (builderInstance != null){
			initView();
		}
	}
	/**
	 * Attach the view to the DOM and init a new SLPlayer app
	 */
	private static function initView() {

		builderInstance.attachPublicationView(publicationView.body);

		// init SLPlayer
		// create an SLPlayer app
		var application = Application.createApplication();
		application.init(publicationView.body);

/*		haxe.Timer.delay(callback(doAfterInit, application), 1000);
	}
	private static function doAfterInit(application) {
*/
		// initial page
		var initialPageName = DomTools.getMeta(Page.CONFIG_INITIAL_PAGE_NAME, null, publicationModel.head);
		trace("initialPageName "+initialPageName);
		Page.openPage(initialPageName, true, null, application.id);

		// execute debug actions
		#if silexDebug
		// execute an action when needed for debug (publication and server config)
		if (configData.debugModeAction != null){
			var context = new Hash();
			context.set("slpid", application.id);
			trace("slpid = "+ application.id);
			var res = Interpreter.exec(configData.debugModeAction, context);
		}
		#end
	}
	/**
	 * publication loading went wrong
	 */
	public static function onError(msg:String){
		throw("not implemented: notify the user");
	}

	/**
	 * Constructor
	 * Define the callbacks
	 * Register the builder
	 */
	public function new(rootElement:HtmlDom, SLPId:String){
		super(rootElement, SLPId);
		// listen to the Layer class event
		rootElement.addEventListener(TransitionData.EVENT_TYPE_REQUEST, onLayerShowOrHide, false);
		// Register the builder
		Builder.registerBuilder(this);
	}
	/**
	 * Callback for the "show" and hide events of the Layer class
	 * Call onShow or onHide callbacks
	 */
	public function onLayerShowOrHide(event:Event) {
		// retrieve the transition event data
		var transitionData:TransitionData = cast(event).detail;

		// call onShow if it is a show request and onHide otherwise
		if (transitionData.type == show){
		}else{
		}
	}
	/**
	 * attach the publication view, i.e. add the publication view to the dom
	 */
	public function attachPublicationView(body:HtmlDom){
		trace("attachPublicationView "+body);
		rootElement.innerHTML = "";
		rootElement.appendChild(body);
	}
#end
}
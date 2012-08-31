package org.silex.publication;

import js.Lib;
import js.Dom;
import haxe.xml.Fast;

import org.silex.model.ModelBase;

import org.silex.page.PageModel;
import org.silex.component.ComponentModel;
import org.silex.publication.PublicationData;
import org.slplayer.core.Application;
import org.slplayer.util.DomTools;
import org.slplayer.component.navigation.Page;
import org.silex.interpreter.Interpreter;

/**
 * Structure used to store the items of the publication list
 */
typedef PublicationListItem = {
	name:String, 
	configData:PublicationConfigData
}

/**
 * Manipulation of publications, loading, display, etc. 
 * This class is a singleton and it can be used on the client side (may be used on the server side with cocktail).
 * The models in Silex are used only when editing, not when viewing a publication.
 */
class PublicationModel extends ModelBase<PublicationConfigData>{
	////////////////////////////////////////////////
	// Singleton implementation
	////////////////////////////////////////////////
	/**
	 * implement the singleton pattern
	 */
	static private var instance:PublicationModel;
	/**
	 * implement the singleton pattern
	 */
	static public function getInstance():PublicationModel {
	 	if (instance == null){
	 		instance = new PublicationModel();
	 	}
	 	return instance;
	}
	////////////////////////////////////////////////
	// Selection
	////////////////////////////////////////////////
	/**
	 * event dispatched when the list of publications is updated successfully
	 */
	public static inline var ON_CHANGE:String = "onPublicationChange";
	/**
	 * Event dispatched when the list of publications is updated successfully
	 * The event object will have event.detail set to an array of PublicationListItem
	 */
	public static inline var ON_LIST:String = "onPublicationList";
	/**
	 * event dispatched when a publication is loaded successfully
	 */
	public static inline var ON_DATA:String = "onPublicationData";
	/**
	 * event dispatched when a publication config is loaded
	 */
	public static inline var ON_CONFIG:String = "onPublicationConfigChange";
	/**
	 * event dispatched when a publication config changed
	 */
	public static inline var ON_CONFIG_CHANGE:String = "onPublicationConfigChange";
	/**
	 * event dispatched when an error occured 
	 */
	public static inline var ON_ERROR:String = "onPublicationError";
	/**
	 * Publication service, used to load/save a publication etc.
	 */
	private var publicationService:PublicationService;
	/**
	 * currently loaded publication name
	 */
	public static var currentName:String;
	/**
	 * Currently loaded publication
	 */
	public var currentData:PublicationData;
	/**
	 * Currently loaded publication
	 */
	public var currentConfig:PublicationConfigData;
	/** 
	 * Current dom object, being edited, this is the actual model
	 */
	 public var body:HtmlDom;
	/** 
	 * Current dom object, being edited, this is the actual model
	 */
	 public var head:HtmlDom;
	/** 
	 * Current duplicated DOM in order to be displayed and edited
	 */
	 public var view:HtmlDom;
	/**
	 * SLPlayer application used to create the components in the loaded publication (the view)
	 */
	public var application:Application;

	/**
	 * Models are singletons
	 * Constructor is private
	 */
	private function new(){
		// do not use the selection pattern
		super(null, null);
		// store the service provider
		publicationService = new PublicationService();
	}
#if silexClientSide
	/**
	 * Starts the loading process of the list of available publications
	 */
	public function loadList(){
		publicationService.getPublications(null, [Publication], onListResult, onError);
	}
	/**
	 * Load a publication
	 * Load the config data first if needed
	 * Reset model selection
	 */
	public function unload(){
		load("");
	}
	/**
	 * Load a publication
	 * Load the config data first if needed
	 * Reset model selection
	 */
	public function load(name:String, configData:PublicationConfigData = null){
		// store the new publication name
		currentName = name;

		// reset model selection
		var pageModel = PageModel.getInstance();
		pageModel.hoveredItem = null;
		pageModel.selectedItem = null;

		// dispatch the event 
		dispatchEvent(createEvent(ON_CHANGE));

		// Start the loading process
		if (name == ""){
			// unload
			trace("unload");
		}
		else if (configData != null){
			// load publication data directly
			onConfig(configData);
		}
		else{
			// load publication config first
			publicationService.getPublicationConfig(name, onConfig, onError);
		}
	}
	/**
	 * Config is loaded 
	 * Load the whole publication data
	 */
	private function onConfig(publicationConfig:PublicationConfigData):Void{
		// store the data / update the model
		currentConfig =	publicationConfig;
		// continue the loading process
		publicationService.getPublicationData(currentName, onData, onError);
		// dispatch the event 
		dispatchEvent(createEvent(ON_CONFIG));
	}
	/**
	 * Publication data is loaded 
	 * End of the loading process, the whole publication data is available
	 */
	private function onData(publicationData:PublicationData):Void{

		// store the data / update the model
		currentData = publicationData;

		// parse the data and make it available as HTML
		body = Lib.document.createElement("div");
		head = Lib.document.createElement("div");

		// parse html data as XML
		var xml = new Fast(Xml.parse(currentData.html).firstChild());

		// Convert xml to DOM/html
		if (xml.hasNode.body)
			body.innerHTML = xml.node.body.innerHTML;
		else if (xml.hasNode.BODY)
			body.innerHTML = xml.node.BODY.innerHTML;
		if (xml.hasNode.head)
			head.innerHTML = xml.node.head.innerHTML;
		else if (xml.hasNode.HEAD)
			head.innerHTML = xml.node.HEAD.innerHTML;

		// init the view
		initDOMView();

		// dispatch the event 
		dispatchEvent(createEvent(ON_DATA));
	}
	/**
	 * Duplicate the loaded DOM
	 * Initialize the SLPlayer for the view
	 */
	public function initDOMView():Void{
		// Duplicate DOM
		view = body.cloneNode(true);

		// Add the CSS in the body tag rather than head tag, because the later is not really added to the browser dom
		DomTools.addCssRules(currentData.css, view);

		// init the SLPlayer application
		initSLPlayerApplication(view);
	}
	/**
	 * init the SLPlayer application
	 */
	public function initSLPlayerApplication(rootElement:HtmlDom):Void{
		// create an SLPlayer app
		application = Application.createApplication();

		// init SLPlayer
		application.init(rootElement);

		// initial page
		var initialPageName = DomTools.getMeta(Page.CONFIG_INITIAL_PAGE_NAME, null, head);
		if (initialPageName != null){
			Page.openPage(initialPageName, true, null, application.id, rootElement);
		}
		else{
			trace("Warning: no initial page found");
		}

		// execute debug actions
		#if silexDebug
		// execute an action when needed for debug (publication and server config)
		if (currentConfig.debugModeAction != null){
			var context = new Hash();
			context.set("slpid", application.id);
			trace("slpid = "+ application.id);
			var res = Interpreter.exec(currentConfig.debugModeAction, context);
		}
		#end
	}
	/**
	 * An error occured
	 */
	private function onError(msg:String):Void{
		// todo: display notification
		dispatchEvent(createEvent(ON_ERROR));
		trace("An error occured while loading publications list ("+msg+")");
		throw("An error occured while loading publications list ("+msg+")");
	}
	/**
	 * Data is loaded 
	 * Build the data object and throw the onPublicationList event
	 */
	private function onListResult(publications:Hash<PublicationConfigData>):Void{
		var data:Array<PublicationListItem> = new Array();
		if (publications != null){
			// browse all publications 
			for (publicationName in publications.keys()){
				trace("Publication "+ publicationName);
				// create the item (name and config data)
				var item = {name:publicationName, configData:publications.get(publicationName)};
				// add to the data
				data.push(item);
			}
		}
		// populate the list
		dispatchEvent(createEvent(ON_LIST, data));
	}
#end
}
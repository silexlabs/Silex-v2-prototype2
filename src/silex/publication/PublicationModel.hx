package silex.publication;

import js.Lib;
import js.Dom;
import haxe.xml.Fast;

import silex.ModelBase;
import silex.page.PageModel;
import silex.component.ComponentModel;
import silex.layer.LayerModel;
import silex.publication.PublicationData;
import silex.interpreter.Interpreter;

import org.slplayer.core.Application;
import org.slplayer.util.DomTools;
import org.slplayer.component.navigation.Page;

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
	 * Information for debugging, e.g. the class name
	 */ 
	public static inline var DEBUG_INFO = "PublicationModel class";
	/**
	 * event dispatched when the list of publications is updated successfully
	 */
	public static inline var ON_CHANGE = "onPublicationChange";
	/**
	 * Event dispatched when the list of publications is updated successfully
	 * The event object will have event.detail set to an array of PublicationListItem
	 */
	public static inline var ON_LIST = "onPublicationList";
	/**
	 * event dispatched when a publication is loaded successfully
	 */
	public static inline var ON_DATA = "onPublicationData";
	/**
	 * event dispatched when a publication config is loaded
	 */
	public static inline var ON_CONFIG = "onPublicationConfigChange";
	/**
	 * event dispatched when a publication config changed
	 */
	public static inline var ON_CONFIG_CHANGE = "onPublicationConfigChange";
	/**
	 * event dispatched when an error occured 
	 */
	public static inline var ON_ERROR = "onPublicationError";
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
	 public var modelHtmlDom:HtmlDom;
	/** 
	 * Current dom object, being edited, this is the actual model
	 */
	 public var headHtmlDom:HtmlDom;
	/** 
	 * Current duplicated DOM in order to be displayed and edited
	 */
	 public var viewHtmlDom:HtmlDom;
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
		super(null, null, DEBUG_INFO);
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
		// set base tag so the ./ is the publication folder
		var currentBasTag = DomTools.getBaseTag();
		if (currentBasTag == PublicationService.PUBLICATION_FOLDER + currentName + "/"
			|| currentBasTag == PublicationService.PUBLICATION_FOLDER + PublicationService.BUILDER_PUBLICATION_NAME + "/"
			){
			DomTools.setBaseTag(PublicationService.PUBLICATION_FOLDER + name+"/");
		}
		else{
			// case of a publication displayed directly from the publicaiton folder, i.e. publications/default/index.html
			DomTools.setBaseTag("../" + name + "/");
		}


		// store the new publication name
		currentName = name;

		// reset model selection
		var pageModel = PageModel.getInstance();
		pageModel.hoveredItem = null;
		pageModel.selectedItem = null;

		// dispatch the event 
		dispatchEvent(createEvent(ON_CHANGE), debugInfo);

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
		dispatchEvent(createEvent(ON_CONFIG), debugInfo);
	}
	/**
	 * Publication data is loaded 
	 * End of the loading process, the whole publication data is available
	 */
	private function onData(publicationData:PublicationData):Void{
		// store the data / update the model
		currentData = publicationData;

		// parse the data and make it available as HTML
		modelHtmlDom = Lib.document.createElement("div");
		headHtmlDom = Lib.document.createElement("div");

		// parse html data as XML
		var xml:Fast;
		try{
			xml = new Fast(Xml.parse(currentData.html).firstChild());
		}
		catch(e:Dynamic){
			throw("Error in the HTML data of the publication "+currentName+". Note that valid XHTML is expected. Error message: "+e);
		}

		// Convert xml to DOM/html
		if (xml.hasNode.body)
			modelHtmlDom.innerHTML = xml.node.body.innerHTML;
		else if (xml.hasNode.BODY)
			modelHtmlDom.innerHTML = xml.node.BODY.innerHTML;
		if (xml.hasNode.head)
			headHtmlDom.innerHTML = xml.node.head.innerHTML;
		else if (xml.hasNode.HEAD)
			headHtmlDom.innerHTML = xml.node.HEAD.innerHTML;

		// add attributes to nodes recursively
		prepareForEdit(modelHtmlDom);

		// init the view
		initViewHtmlDom();

		// dispatch the event, the DOM is then assumed to be attached to the browser DOM
		dispatchEvent(createEvent(ON_DATA), debugInfo);

		// init the SLPlayer application
		initSLPlayerApplication(viewHtmlDom);
	}
	/**
	 * Duplicate the loaded DOM
	 * Initialize the SLPlayer for the view
	 */
	private function initViewHtmlDom():Void{
		trace("initViewHtmlDom");
		// Duplicate DOM
		viewHtmlDom = modelHtmlDom.cloneNode(true);

		// Add the CSS in the body tag rather than head tag, because the later is not really added to the browser dom
		DomTools.addCssRules(currentData.css, viewHtmlDom);
	}
	/**
	 * Fixes the DOM root when needed
	 * - add the PublicationGroup to the root of the DOM
	 */
	function fixDomRoot(modelDom:HtmlDom){
		// add the PublicationGroup to the root of the DOM
		DomTools.addClass(modelDom, "PublicationGroup");
	}
	/**
	 * Fixes the components, layers and pages when needed
	 * - add the attribute data-group-id to components
	 */
	function fixDom(modelDom:HtmlDom){
		// add the attribute data-group-id to components
		if (modelDom.getAttribute("data-group-id") == null){
			modelDom.setAttribute("data-group-id", "PublicationGroup");
		}
	}
	/**
	 * Recursively browse all html nodes and does this:
	 * - add the attribute data-silex-component-id to node which are editable components
	 * - add the attribute data-silex-layer-id to nodes which are editable layers
	 * - call fixDom method for each component
	 */
	private function prepareForEdit(modelDom:HtmlDom) {
		//trace("prepareForEdit ("+modelDom+", "+viewDom+"));
		// Take only HtmlDom elements, not TextNode
		if (modelDom.className == null){
			return;
		}

		// Dom Root
		if (modelDom.parentNode == null){
			// correct anomalies if needed at the dom root
			fixDomRoot(modelDom);
		}
		// Components
		else if (DomTools.hasClass(modelDom.parentNode, "Layer")){
			// add the attribute data-silex-component-id to nodes which parent is a layer
			modelDom.setAttribute(ComponentModel.COMPONENT_ID_ATTRIBUTE_NAME, generateNewId());
			fixDom(modelDom);
		}
		// Layers
		else if (DomTools.hasClass(modelDom, "Layer")){
			// add the attribute data-silex-layer-id to nodes which are layers
			modelDom.setAttribute(LayerModel.LAYER_ID_ATTRIBUTE_NAME, generateNewId());
			fixDom(modelDom);
		}
		// Pages
		else if (DomTools.hasClass(modelDom, "Page")){
			// check Dom for robustness
			fixDom(modelDom);
		}
		// browse the children
		for(idx in 0...modelDom.childNodes.length){
			var modelChild = modelDom.childNodes[idx];
			prepareForEdit(modelChild);
		}
	}
	private static var nextId = 0;
	/**
	 * Generate an id, unique to this edit session
	 */
	private function generateNewId():String{
		return (nextId++)+"";
	}
	/**
	 * init the SLPlayer application
	 */
	private function initSLPlayerApplication(rootElement:HtmlDom):Void{
		// create an SLPlayer app
		application = Application.createApplication();

		// init SLPlayer
		application.init(rootElement);

		// initial page
		var initialPageName = DomTools.getMeta(Page.CONFIG_INITIAL_PAGE_NAME, null, headHtmlDom);
		if (initialPageName != null){
			var page = Page.getPageByName(initialPageName, application.id, viewHtmlDom);
			if (page != null){	
				PageModel.getInstance().selectedItem = page;
			}
			else{
				trace("Warning: could not resolve default page name ("+initialPageName+")");
			}
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
			try{
				Interpreter.exec(StringTools.htmlUnescape(currentConfig.debugModeAction), context);
			}catch(e:Dynamic){
				throw("Error while executing the script in the config file of the publication (debugModeAction variable). The error: "+e);
			}
		}
		#end
	}
	/**
	 * An error occured
	 */
	private function onError(msg:String):Void{
		// todo: display notification
		dispatchEvent(createEvent(ON_ERROR), debugInfo);
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
		dispatchEvent(createEvent(ON_LIST, data), debugInfo);
	}
#end
}
package silex.publication;

import js.Lib;
import js.Dom;
import haxe.xml.Fast;

import silex.ModelBase;
import silex.publication.PublicationData;
import silex.interpreter.Interpreter;

import silex.ui.toolbox.MenuController;
import silex.property.PropertyModel;
import silex.component.ComponentModel;
import silex.layer.LayerModel;
import silex.page.PageModel;
import silex.publication.PublicationModel;

import brix.core.Application;
import brix.util.DomTools;
import brix.component.navigation.Page;


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
	 * Class name of the root node
	 * It is put by the PublicationModel class on the model and the view DOMs
	 * when they are retrieved from the server
	 */ 
	public static inline var BUILDER_ROOT_NODE_CLASS = "silex-view";
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
	 * event dispatched when an error occured while loading a publication 
	 */
	public static inline var ON_ERROR = "onPublicationError";
	/**
	 * event dispatched when the user save publication
	 */
	public static inline var ON_SAVE_START = "onPublicationSaveStart";
	/**
	 * event dispatched when save publication is done
	 */
	public static inline var ON_SAVE_SUCCESS = "onPublicationSaveSuccess";
	/**
	 * event dispatched when saving publication has failed
	 */
	public static inline var ON_SAVE_ERROR = "onPublicationSaveError";
	/**
	 * Publication service, used to load/save a publication etc.
	 */
	private var publicationService:PublicationService;
	/**
	 * currently loaded publication name
	 */
	public var currentName(default, setPublicationName):String;
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
	 * Brix application used to create the components in the loaded publication (the view)
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
		// expose the class to the scripts interpreter
		Interpreter.getInstance().expose("PublicationModel", PublicationModel);
	}
	////////////////////////////////////////////////
	// list
	////////////////////////////////////////////////
	/**
	 * Starts the loading process of the list of available publications
	 */
	public function loadList(){
		publicationService.getPublications([Published(null), Private], [Publication], onListResult, onError);
	}
	////////////////////////////////////////////////
	// helpers
	////////////////////////////////////////////////
	/**
	 * Load a publication
	 * Load the config data first if needed
	 * Reset model selection
	 */
	public function unload(){
		load("");
	}
	/**
	 * Retrieve a reference to the selected component or layer in the PublicationModel::modelHtmlDom object
	 */
	public function getModelFromView(viewHtmlDom:HtmlDom):HtmlDom{
		if (viewHtmlDom == null){
			trace("Warning: could not retrieve the model for element because it is null.");
			return null;
		}
		try{
			// case of the builder root node
			if (DomTools.hasClass(viewHtmlDom, BUILDER_ROOT_NODE_CLASS))
				return modelHtmlDom;

			var results : Array<HtmlDom> = null;
			var id = viewHtmlDom.getAttribute(ComponentModel.COMPONENT_ID_ATTRIBUTE_NAME);
			if (id != null)
			{
				// case of a component
				results = DomTools.getElementsByAttribute(PublicationModel.getInstance().modelHtmlDom, ComponentModel.COMPONENT_ID_ATTRIBUTE_NAME, id);
			}
			else{
				id = viewHtmlDom.getAttribute(LayerModel.LAYER_ID_ATTRIBUTE_NAME);
				if (id!=null){
					// case of a layer
					results = DomTools.getElementsByAttribute(PublicationModel.getInstance().modelHtmlDom, LayerModel.LAYER_ID_ATTRIBUTE_NAME, id);
				}
				else{
					throw("Error: the selected layer has not a Silex ID. It should have the ID in the "+LayerModel.LAYER_ID_ATTRIBUTE_NAME+" or "+ComponentModel.COMPONENT_ID_ATTRIBUTE_NAME+" attributes");
				}
			}
			// returns the element
			if (results == null || results.length != 1){
				throw ("Error: 1 and only 1 component or layer is expected to have ID \"" + id + "\" ("+results+").");
			}
			return results[0];
		}catch(e:Dynamic){
			trace("Error, could not retrieve the model for element "+viewHtmlDom+" ("+e+").");
			throw("Error, could not retrieve the model for element "+viewHtmlDom+" ("+e+").");
		}
		return null;
	}
	/**
	 * set a new publication name
	 * update the base tag for the html page so that ./ is the publication folder
	 */
	public function setPublicationName(newName:String):String
	{
		currentName = newName;
		DomTools.setBaseTag("../" + newName + "/");
		return newName;
	}
	////////////////////////////////////////////////
	// load
	////////////////////////////////////////////////
	/**
	 * Load a publication
	 * Load the config data first if needed
	 * Reset model selection
	 */
	public function load(name:String, configData:PublicationConfigData = null){
		// set base tag so that ./ is the publication folder
/*		var currentBasTag = DomTools.getBaseTag();
		if (currentBasTag == PublicationConstants.PUBLICATION_FOLDER + currentName + "/"
			|| currentBasTag == PublicationConstants.PUBLICATION_FOLDER + PublicationConstants.BUILDER_PUBLICATION_NAME + "/"
			){
			DomTools.setBaseTag(PublicationConstants.PUBLICATION_FOLDER + name+"/");
		}
		else{
			// case of a publication displayed directly from the publicaiton folder, i.e. publications/default/index.html
			DomTools.setBaseTag("../" + name + "/");
		}
*/

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
			currentConfig = null;
			currentData = null;
			viewHtmlDom = null;
			modelHtmlDom = null;
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

		// use lower case to find head and body tags
		var lowerCaseHtml = currentData.html.toLowerCase();
		// split head and body tags 
		var headOpenIdx = lowerCaseHtml.indexOf("<head>");
		if (headOpenIdx == -1) headOpenIdx = lowerCaseHtml.indexOf("<head ");
		var headCloseIdx = lowerCaseHtml.indexOf("</head>");
		var bodyOpenIdx = lowerCaseHtml.indexOf("<body>");
		if (bodyOpenIdx == -1) bodyOpenIdx = lowerCaseHtml.indexOf("<body ");
		var bodyCloseIdx = lowerCaseHtml.indexOf("</body>");

		if (headOpenIdx > -1 && headCloseIdx > -1){
			// look for the first ">" after "<head"
			var closingTagIdx = lowerCaseHtml.indexOf(">", headOpenIdx);
			// extract the head section
			headHtmlDom.innerHTML = currentData.html.substring(closingTagIdx + 1, headCloseIdx);
		}
		if (bodyOpenIdx > -1 && bodyCloseIdx > -1){
			// look for the first ">" after "<body"
			var closingTagIdx = lowerCaseHtml.indexOf(">", bodyOpenIdx);
			// extract the body section
			modelHtmlDom.innerHTML = currentData.html.substring(closingTagIdx + 1, bodyCloseIdx);
		}

		// add attributes to nodes recursively
		prepareForEdit(modelHtmlDom);

		// init the view
		initViewHtmlDom();

		// init the Brix application
		initBrixApplication(viewHtmlDom);

		// dispatch the event, the DOM is then assumed to be attached to the browser DOM
		dispatchEvent(createEvent(ON_DATA), debugInfo);

		// refresh selection
		refresh();
		PageModel.getInstance().refresh();
		LayerModel.getInstance().refresh();
		ComponentModel.getInstance().refresh();
		PropertyModel.getInstance().refresh();
	}
	/**
	 * Duplicate the loaded DOM
	 * Initialize the Brix for the view
	 */
	private function initViewHtmlDom():Void{
		// Duplicate DOM
		viewHtmlDom = modelHtmlDom.cloneNode(true);
		viewHtmlDom.className = BUILDER_ROOT_NODE_CLASS;
		viewHtmlDom.style.visibility = "visible";

		// Add the CSS in the body tag rather than head tag, because the later is not really added to the browser dom
		var styleElement = DomTools.addCssRules(currentData.css, viewHtmlDom);
		// specify that the style is to be applyed at the publication only, not the builder
		// not supported by any browsers YET : styleElement.setAttribute("scoped", "scoped"); 
	}
	/**
	 * Fixes the DOM root when needed
	 * - add the PublicationGroup to the root of the DOM
	 */
	private function fixDomRoot(modelDom:HtmlDom){
		// add the PublicationGroup to the root of the DOM
		DomTools.addClass(modelDom, "PublicationGroup");
	}
	/**
	 * Recursively browse all html nodes and does this:
	 * - add the attribute data-silex-component-id to node which are editable components
	 * - add the attribute data-silex-layer-id to nodes which are editable layers
	 */
	public function prepareForEdit(modelDom:HtmlDom) {
		// Take only HtmlDom elements, not TextNode
		if (modelDom.nodeType != 1){
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
		}
		// Layers
		else if (DomTools.hasClass(modelDom, "Layer")){
			// add the attribute data-silex-layer-id to nodes which are layers
			modelDom.setAttribute(LayerModel.LAYER_ID_ATTRIBUTE_NAME, generateNewId());
		}
		// Pages
		else if (DomTools.hasClass(modelDom, "Page")){
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
	 * init the Brix application
	 */
	private function initBrixApplication(rootElement:HtmlDom):Void{
		// create an Brix app
		application = Application.createApplication();

		// init Brix
		application.initDom(rootElement);
		application.initComponents();

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
			trace("PublicationModel exec "+rootElement+" - "+rootElement.className);
			Interpreter.getInstance().execScriptTags(rootElement);
		#end
	}
	/**
	 * An error occured
	 */
	private function onError(msg:String):Void{
		// todo: display notification
		dispatchEvent(createEvent(ON_ERROR), debugInfo);
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
				// create the item (name and config data)
				var item = {name:publicationName, configData:publications.get(publicationName)};
				// add to the data
				data.push(item);
			}
		}
		// populate the list
		dispatchEvent(createEvent(ON_LIST, data), debugInfo);
	}
	////////////////////////////////////////////////
	// Save
	////////////////////////////////////////////////
	/**
	 * Create a publication with current data
	 * This has to be called after create, in order to give the new publication a name and actually save the data on disk
	 * Get empty publication template
	 * Use this before actually creating a new publication with doCreate
	 * Load the data of the publication named "creation-template".
	 */
	public function create(){
		// Load the data of the publication named "creation-template".
		load(PublicationConstants.CREATION_TEMPLATE_PUBLICATION_NAME);
	}
	/**
	 * Create a publication with current data
	 * This has to be called after create, in order to give the new publication a name and actually save the data on disk
	 */
	public function doCreate(newName:String){
		// updatethe publication type
		currentConfig.state = Private;
		currentConfig.category = Publication;
		// start the creation process
		publicationService.create(newName, callback(save, newName), onSaveError);
	}
	/**
	 * Delete a publication
	 * TODO: handle errors specific to deletion
	 */
	public function trash(name:String){
		// start the save process
		publicationService.trash(name, onDeleteSuccess, onSaveError);
	}
	/**
	 * Deletion success
	 */
	private function onDeleteSuccess():Void{
		trace("PUBLICATION DELETED ");
		unload();
	}
	/**
	 * Save a copy of the current publication with a new name
	 * It will NOT save the current publication
	 * It will NOT change currentName
	 */
	public function saveACopy(newName:String){
		// check that a publication is loaded
		if (currentData == null)
			throw("Error: can not save the publication because no publication is loaded.");

		// reset model selection
		// var pageModel = PageModel.getInstance();
		// pageModel.hoveredItem = null;
		// pageModel.selectedItem = null;

		// dispatch the event 
		dispatchEvent(createEvent(ON_SAVE_START), debugInfo);

		// check that a publication is loaded
		if (currentData == null)
			throw("Error: can not save the publication because no publication is loaded.");

		publicationService.duplicate(currentName, newName, callback(onCopyCreated, newName), onSaveError);
	}
	private function onCopyCreated(newName:String){
		// Start the saving process
		publicationService.setPublicationConfig(newName, currentConfig, callback(doSavePublicationData, null, newName), onSaveError);
	}
	/**
	 * Save a publication with a new name
	 * Duplicate the current publication and then save
	 * It will change currentName
	 */
	public function saveAs(newName:String){
		// check that a publication is loaded
		if (currentData == null)
			throw("Error: can not save the publication because no publication is loaded.");

		publicationService.duplicate(currentName, newName, callback(save, newName), onSaveError);
	}
	/**
	 * Save a publication
	 * Save the config data and then call doSavePublicationData to save publication data
	 * Reset model selection
	 */
	public function save(newName:Null<String> = null, successCallback:Void->Void=null){
		// check that a publication is loaded
		if (currentData == null)
			throw("Error: can not save the publication because no publication is loaded.");

		// check the publication was renamed
		if (newName != null)
			currentName = newName;

		// reset model selection
		// var pageModel = PageModel.getInstance();
		// pageModel.hoveredItem = null;
		// pageModel.selectedItem = null;

		// dispatch the event 
		dispatchEvent(createEvent(ON_SAVE_START), debugInfo);

		// Start the saving process
		publicationService.setPublicationConfig(currentName, currentConfig, callback(doSavePublicationData, successCallback), onSaveError);
	}
	/**
	 * Save the publication data
	 */
	private function doSavePublicationData(successCallback:Void->Void=null, publicationName:Null<String>=null){
		// default value for success
		if (successCallback == null)
			successCallback = onSaveSuccess;

		// default value for publication name
		if (publicationName == null)
			publicationName = currentName;

		// duplicate the model temporarily
		var tempModelHead = headHtmlDom.cloneNode(true);
		var tempModelBody = modelHtmlDom.cloneNode(true);

		// prepare the model for saving
		prepareForSave(tempModelBody);

		// duplicate the model and save store it into the publication data
		currentData.html = "<HTML>
		<HEAD>
			"+tempModelHead.innerHTML+"
		</HEAD>
		<BODY class=\"silex-view\">
			"+tempModelBody.innerHTML+"
		</BODY>
	</HTML>
		";

		// Start the saving process
		publicationService.setPublicationData(publicationName, currentData, successCallback, onSaveError);
	}
	
	/**
	 * Recursively browse all html nodes and does this:
	 * - remove the attribute data-silex-component-id and data-silex-layer-id
	 */
	public function prepareForSave(modelDom:HtmlDom) {
		//trace("prepareForSave ("+modelDom+")");
		// Take only HtmlDom elements, not TextNode
		if (modelDom.nodeType != 1){
			return;
		}
		// Components
		modelDom.removeAttribute(ComponentModel.COMPONENT_ID_ATTRIBUTE_NAME);

		// Layers
		modelDom.removeAttribute(LayerModel.LAYER_ID_ATTRIBUTE_NAME);

		// Publication group
		if (modelDom.getAttribute("data-group-id") == "PublicationGroup")
			modelDom.removeAttribute("data-group-id");

		// Builder root node
		DomTools.removeClass(modelDom, BUILDER_ROOT_NODE_CLASS);

		// browse the children
		for(idx in 0...modelDom.childNodes.length){
			var modelChild = modelDom.childNodes[idx];
			prepareForSave(modelChild);
		}
	}
	/**
	 * An error occured while saving
	 */
	private function onSaveError(msg:String):Void{
		dispatchEvent(createEvent(ON_SAVE_ERROR), debugInfo);
		throw("An error occured while saving the publication ("+msg+")");
	}

	/**
	 * Saving success
	 */
	private function onSaveSuccess():Void{
		dispatchEvent(createEvent(ON_SAVE_SUCCESS), debugInfo);
		trace("PUBLICATION SAVED");
	}

}
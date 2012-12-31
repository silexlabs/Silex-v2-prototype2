package silex.file;

import js.Lib;
import js.Dom;
import haxe.xml.Fast;

import silex.ModelBase;
import silex.interpreter.Interpreter;

import silex.ui.toolbox.MenuController;
import silex.property.PropertyModel;
import silex.component.ComponentModel;
import silex.layer.LayerModel;
import silex.page.PageModel;

import brix.core.Application;
import brix.component.ui.DisplayObject;
import brix.util.DomTools;
import brix.component.navigation.Page;
import brix.component.interaction.NotificationManager;


/**
 * Manipulation of files: loading, selection, etc. 
 * This class is a singleton and it can be used on the client side (may be used on the server side with cocktail).
 * The models in Silex are used only when editing, not when viewing a file.
 */
class FileModel extends ModelBase<HtmlDom>{
	////////////////////////////////////////////////
	// Singleton implementation
	////////////////////////////////////////////////
	/**
	 * implement the singleton pattern
	 */
	static private var instance:FileModel;
	/**
	 * implement the singleton pattern
	 */
	static public function getInstance():FileModel {
	 	if (instance == null){
	 		instance = new FileModel();
	 	}
	 	return instance;
	}
	////////////////////////////////////////////////
	// Selection
	////////////////////////////////////////////////
	/**
	 * Information for debugging, e.g. the class name
	 */ 
	public static inline var DEBUG_INFO = "FileModel class";
	/**
	 * Prefix for all files to be loaded through dropbox
	 * url rewriting with htaccess should conevrt this into ../libs/dropbox/getFile.php?name=
	 */ 
	public static inline var DROPBOX_GET_FILE = "../libs/dropbox/";
	/**
	 * CSS class name for the root group of the file being edited
	 * It is applyed when the file is loaded and it is not saved in the file
	 */ 
	public static inline var CLASS_NAME_MAIN_GROUP = "silex-main-group";
	/**
	 * Class name of the root node
	 * It is put by the FileModel class on the model and the view DOMs
	 * when they are retrieved from the server
	 */ 
	public static inline var BUILDER_ROOT_NODE_CLASS = "silex-view";
	/**
	 * File used as a template for new files
	 */ 
	public static inline var CREATION_TEMPLATE_FILE_NAME = "creation-template.html";
	/**
	 * event dispatched when a file about to be loaded
	 */
	public static inline var ON_LOAD_START = "onLoadStart";
	/**
	 * event dispatched when a file is loaded successfully
	 */
	public static inline var ON_LOAD_SUCCESS = "onLoadSuccess";
	/**
	 * event dispatched when an error occured while loading a file 
	 */
	public static inline var ON_ERROR = "onFileError";
	/**
	 * event dispatched when the user save file
	 */
	public static inline var ON_SAVE_START = "onFileSaveStart";
	/**
	 * event dispatched when save file is done
	 */
	public static inline var ON_SAVE_SUCCESS = "onFileSaveSuccess";
	/**
	 * event dispatched when saving file has failed
	 */
	public static inline var ON_SAVE_ERROR = "onFileSaveError";
	/**
	 * file service, used to load/save a file etc.
	 */
	private var fileService:FileService;
	/**
	 * Currently loaded file
	 */
	public var currentData:FileData;
	/**
	 * Brix application used to create the components in the loaded file (the view)
	 */
	public var application:Application;
	/**
	 * initial value of the window title - the content of the document title tag
	 */
	public var initialDocumentTitle:String;

	/**
	 * Models are singletons
	 * Constructor is private
	 */
	private function new(){
		// do not use the selection pattern
		super(null, null, DEBUG_INFO);
		currentData = {
			modelHtmlDom:null,
			headHtmlDom:null,
			viewHtmlDom:null,
			rawHtml:"",
			name:"",
			isLoaded:false,
		};
		// store the document title
		initialDocumentTitle = "";
		var nodes = Lib.document.getElementsByTagName("title");
		if (nodes.length > 0){
			initialDocumentTitle = nodes[0].innerHTML;
		}
		// store the service provider
		fileService = new FileService();
		// expose the class to the scripts interpreter
		Interpreter.getInstance().expose("FileModel", FileModel);
	}
	////////////////////////////////////////////////
	// helpers
	////////////////////////////////////////////////
	/**
	 * Retrieve a reference to the selected component or layer in the FileModel::modelHtmlDom object
	 */
	public function getModelFromView(viewHtmlDom:HtmlDom):HtmlDom{
		if (viewHtmlDom == null){
			trace("Warning: could not retrieve the model for element because it is null.");
			return null;
		}
		try{
			// case of the builder root node
			if (DomTools.hasClass(viewHtmlDom, BUILDER_ROOT_NODE_CLASS))
				return currentData.modelHtmlDom;

			var results : Array<HtmlDom> = null;
			var id = viewHtmlDom.getAttribute(ComponentModel.COMPONENT_ID_ATTRIBUTE_NAME);
			if (id != null)
			{
				// case of a component
				results = DomTools.getElementsByAttribute(currentData.modelHtmlDom, ComponentModel.COMPONENT_ID_ATTRIBUTE_NAME, id);
			}
			else{
				id = viewHtmlDom.getAttribute(LayerModel.LAYER_ID_ATTRIBUTE_NAME);
				if (id!=null){
					// case of a layer
					results = DomTools.getElementsByAttribute(currentData.modelHtmlDom, LayerModel.LAYER_ID_ATTRIBUTE_NAME, id);
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
	////////////////////////////////////////////////
	// load
	////////////////////////////////////////////////
	/**
	 * unload the current file
	 */
/*	public function unload(){
		trace("unload "+currentData.name);
		// reset file name
		currentData.name = "";

		// reset model selection
		var pageModel = PageModel.getInstance();
		pageModel.hoveredItem = null;
		pageModel.selectedItem = null;

		selectedItem = null;
		currentData = {
			modelHtmlDom:null,
			headHtmlDom:null,
			viewHtmlDom:null,
			rawHtml:"",
			name:"",
			isLoaded:false,
		};
	}
	/**
	 * Load a file
	 * Reset model selection
	 */
	public function changeBaseTag(name:String){
		var idx = currentData.name.lastIndexOf("/");

/*if silexDropboxMode
		if (idx>0){
			// keep only the folders
			name = name.substr(0, idx+1);
		}
		else{
			// no folder
			name="";
		}
		trace("setBaseTag "+Silex.initialBaseUrl + DROPBOX_GET_FILE + name);
		DomTools.setBaseTag(Silex.initialBaseUrl + DROPBOX_GET_FILE + name);
else
*/		if (idx>0){
			trace("setBaseTag "+name.substr(0, idx+1));
			DomTools.setBaseTag(name.substr(0, idx+1));
		}
		else{
			DomTools.removeBaseTag();
		}
//end
	}
	public function load(name:String){
		trace("load "+name);
		// store the new file name
		currentData.name = name;
		changeBaseTag(name);

		// reset model selection
		var pageModel = PageModel.getInstance();
		pageModel.hoveredItem = null;
		pageModel.selectedItem = null;

		// dispatch the event 
		dispatchEvent(createEvent(ON_LOAD_START), debugInfo);

		// start the loading process
		fileService.load(currentData.name, onData, onError);
	}
	/**
	 * file data is loaded 
	 * End of the loading process, the whole file data is available
	 */
	private function onData(content:String):Void{
		// store the data / update the model
		currentData.rawHtml = content;
		currentData.isLoaded = true;

		// parse the data and make it available as HTML
		currentData.modelHtmlDom = Lib.document.createElement("div");
		currentData.headHtmlDom = Lib.document.createElement("div");

		// use lower case to find head and body tags
		var lowerCaseHtml = currentData.rawHtml.toLowerCase();
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
			currentData.headHtmlDom.innerHTML = currentData.rawHtml.substring(closingTagIdx + 1, headCloseIdx);
		}
		if (bodyOpenIdx > -1 && bodyCloseIdx > -1){
			// look for the first ">" after "<body"
			var closingTagIdx = lowerCaseHtml.indexOf(">", bodyOpenIdx);
			// extract the body section
			currentData.modelHtmlDom.innerHTML = currentData.rawHtml.substring(closingTagIdx + 1, bodyCloseIdx);
		}

		// add attributes to nodes recursively
		prepareForEdit(currentData.modelHtmlDom);
		prepareForEditVanilaHtml(currentData.modelHtmlDom);

		// init the view
		initViewHtmlDom();

		// init the Brix application
		initBrixApplication();

		// dispatch the event, the DOM is then assumed to be attached to the browser DOM
		dispatchEvent(createEvent(ON_LOAD_SUCCESS), debugInfo);

		// refresh silex builder title
		var title = initialDocumentTitle;
		if (currentData.name != ""){
			title = title + " (" + currentData.name + ")";
		}
		Lib.document.title = title;

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
		currentData.viewHtmlDom = currentData.modelHtmlDom.cloneNode(true);
		currentData.viewHtmlDom.className = BUILDER_ROOT_NODE_CLASS;
		currentData.viewHtmlDom.style.visibility = "visible";
	}
	/**
	 * Fixes the DOM root when needed
	 * - add the file-group to the root of the DOM
	 */
	private function fixDomRoot(modelDom:HtmlDom){
		// add the file-group to the root of the DOM
		DomTools.addClass(modelDom, CLASS_NAME_MAIN_GROUP);
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
	/**
	 */
	public function prepareForEditVanilaHtml(modelDom:HtmlDom) {
//		var hasLayerInChildren = false;
		// Take only HtmlDom elements, not TextNode
		if (modelDom.nodeType != 1){
			return;
		}
		// only after init
		if (application == null){
			return;
		}
		// Dom Root
		if (modelDom.parentNode == null){
		}
		else if (application.getAssociatedComponents(modelDom, DisplayObject).length == 0){		
			if (modelDom.nodeName.toLowerCase() == "div"){
				// add the attribute data-silex-component-id to nodes which parent is a layer
				modelDom.setAttribute(ComponentModel.COMPONENT_ID_ATTRIBUTE_NAME, generateNewId());
			}
			else{
				var nodeName = modelDom.nodeName.toLowerCase();
				if (nodeName == "img" || nodeName == "button" || nodeName == "video" || nodeName == "audio" || nodeName == "input"){
					// add the attribute data-silex-component-id to nodes which parent is a layer
					modelDom.setAttribute(ComponentModel.COMPONENT_ID_ATTRIBUTE_NAME, generateNewId());
				}
			}
		}
		// browse the children
		for(idx in 0...modelDom.childNodes.length){
			var modelChild = modelDom.childNodes[idx];
			prepareForEditVanilaHtml(modelChild);
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
	private function initBrixApplication():Void{
		// create an Brix app
		application = Application.createApplication();

		// init Brix
		application.initDom(currentData.viewHtmlDom);
		application.attachBody(currentData.viewHtmlDom);
		application.initComponents();

		// initial page
		var initialPageName = DomTools.getMeta(Page.CONFIG_INITIAL_PAGE_NAME, null, currentData.headHtmlDom);
		if (initialPageName != null){
			var page = Page.getPageByName(initialPageName, application.id, currentData.viewHtmlDom);
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

		// execute scripts
		Interpreter.getInstance().execScriptTags(currentData.viewHtmlDom);
	}
	/**
	 * An error occured
	 */
	private function onError(msg:String):Void{
		// display notification
		dispatchEvent(createEvent(ON_ERROR), debugInfo);
		NotificationManager.notifyError("Error", "An error occured while loading the file \""+currentData.name+"\" ("+msg+")", currentData.viewHtmlDom);
		trace("An error occured while loading file ("+msg+")");
	}
	////////////////////////////////////////////////
	// Save
	////////////////////////////////////////////////
	/**
	 * Create a file with current data
	 * This has to be called after create, in order to give the new file a name and actually save the data on disk
	 * Get empty file template
	 * Use this before actually creating a new file with save
	 * Load the data of the file named "creation-template.html".
	 */
	public function create(){
		// Load the data of the file named "creation-template.html".
		load(CREATION_TEMPLATE_FILE_NAME);
	}
	/**
	 * Delete a file
	 * TODO: handle errors specific to deletion
	 */
	public function trash(name:String){
		// start the save process
		fileService.trash(name, onDeleteSuccess, onSaveError);
	}
	/**
	 * Deletion success
	 */
	private function onDeleteSuccess():Void{
		trace("FILE DELETED ");
		create();
	}
	/**
	 * Save a copy of the current file with a new name
	 * It will NOT save the current file
	 * It will NOT change currentData.name
	 */
	public function saveACopy(newName:String){
		// check that a file is loaded
		if (currentData.isLoaded == false){
			NotificationManager.notifyError("Error", "I can not save the file because no file is loaded.", currentData.viewHtmlDom);
			throw("Error: can not save the file because no file is loaded.");
		}

		// reset model selection
		// var pageModel = PageModel.getInstance();
		// pageModel.hoveredItem = null;
		// pageModel.selectedItem = null;

		save(newName);
	}
	/**
	 * Save a file with a new name
	 * Duplicate the current file and then save
	 * It will change currentData.name
	 */
	public function saveAs(newName:String){
		// check that a file is loaded
		if (currentData.isLoaded == false){
			NotificationManager.notifyError("Error", "I can not save the file because no file is loaded.", currentData.viewHtmlDom);
			throw("Error: can not save the file because no file is loaded.");
		}
		currentData.name = newName;
		changeBaseTag(newName);
		save();
	}
	/**
	 * Save a file
	 * Reset model selection
	 */
	public function save(tempName:Null<String> = null){
		// check that a file is loaded
		if (currentData.isLoaded == false){
			NotificationManager.notifyError("Error", "I can not save the file because no file is loaded.", currentData.viewHtmlDom);
			throw("Error: can not save the file because no file is loaded.");
		}
		// check the file name
		if (tempName == null){
			// handle a new publication
			if (currentData.name == CREATION_TEMPLATE_FILE_NAME){
				var newName = Lib.window.prompt("New name for your file?", "your-file-"+Math.round(Math.random()*100)+".html");
				if (newName != null && newName!=""){
					currentData.name = newName;
				}
			}
			tempName = currentData.name;
		}
		// reset model selection
		// var pageModel = PageModel.getInstance();
		// pageModel.hoveredItem = null;
		// pageModel.selectedItem = null;

		// dispatch the event 
		dispatchEvent(createEvent(ON_SAVE_START), debugInfo);

		// duplicate the model temporarily
		var tempModelHead = currentData.headHtmlDom.cloneNode(true);
		var tempModelBody = currentData.modelHtmlDom.cloneNode(true);

		// prepare the model for saving
		prepareForSave(tempModelBody);

		// duplicate the model and save store it into the file data
		currentData.rawHtml = "<HTML>
		<HEAD>
			"+tempModelHead.innerHTML+"
		</HEAD>
		<BODY class=\"silex-view\">
			"+tempModelBody.innerHTML+"
		</BODY>
	</HTML>
		";

		// Start the saving process
		fileService.save(tempName, currentData.rawHtml, onSaveSuccess, onSaveError);

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

		// file group
		if (modelDom.getAttribute("data-group-id") == CLASS_NAME_MAIN_GROUP)
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
		NotificationManager.notifyError("Error", "An error occured while saving "+currentData.name+" ("+msg+")", currentData.viewHtmlDom);
		throw("An error occured while saving the file ("+msg+")");
	}

	/**
	 * Saving success
	 */
	private function onSaveSuccess():Void{
		dispatchEvent(createEvent(ON_SAVE_SUCCESS), debugInfo);
		trace("FILE SAVED");
		NotificationManager.notifySuccess("File saved", currentData.name+" has been saved successfully.", currentData.viewHtmlDom);
	}
}
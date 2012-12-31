package silex.layer;

import js.Lib;
import js.Dom;

import silex.interpreter.Interpreter;
import silex.ModelBase;
import silex.component.ComponentModel;
import silex.file.FileModel;
import silex.property.PropertyModel;

import brix.component.navigation.Layer;
import brix.component.navigation.Page;
import brix.util.DomTools;

/**
 * Manipulation of layers, remove, add, etc. 
 * This class is a singleton and it can be used on the client side (may be used on the server side with cocktail).
 * The models in Silex are used only when editing, not when viewing a file.
 */
class LayerModel extends ModelBase<Layer>{
	////////////////////////////////////////////////
	// Singleton implementation
	////////////////////////////////////////////////
	/**
	 * implement the singleton pattern
	 */
	static private var instance:LayerModel;
	/**
	 * implement the singleton pattern
	 */
	static public function getInstance():LayerModel {
	 	if (instance == null){
	 		instance = new LayerModel();
	 	}
	 	return instance;
	}
	////////////////////////////////////////////////
	// 
	////////////////////////////////////////////////
	/**
	 * Name of the attribute for the layer id
	 * The layer id is used only when editing a Silex file, and it is not saved in the HTML file
	 * It is used to ease the synch between the view and the model, i.e. the file DOM which is displayed by the browser and the one which is stored by Silex
	 */ 
	public static inline var LAYER_ID_ATTRIBUTE_NAME = "data-silex-layer-id";
	/**
	 * Name of the attribute for the layer name
	 * The layer name is used only when editing a Silex file, but it is saved in the HTML file
	 */ 
	public static inline var NAME_ATTRIBUTE_NAME = "data-silex-name";
	////////////////////////////////////////////////
	// Selection
	////////////////////////////////////////////////
	/**
	 * Information for debugging, e.g. the class name
	 */ 
	public static inline var DEBUG_INFO:String = "LayerModel class";
	/**
	 * event dispatched when selection changes
	 */
	public static inline var ON_SELECTION_CHANGE:String = "onLayerSelectionChange";
	/**
	 * event dispatched when hover changes
	 * hover is like a pre-selection visualization
	 */
	public static inline var ON_HOVER_CHANGE:String = "onLayerHoverChange";
	/**
	 * event dispatched when the list of layers changes
	 */
	public static inline var ON_LIST_CHANGE = "onLayerListChange";
	/**
	 * name of the master property on html nodes
	 */
	public static inline var MASTER_PROPERTY_NAME = "data-master";
	/**
	 * name of the layer automatically created with a new page
	 */
	public static inline var NEW_LAYER_NAME = "container1";
	/**
	 * css class of the layer automatically created with a new page
	 */
	public static inline var NEW_LAYER_CSS_CLASS = "container";
	/**
	 * name of the required container
	 */
	public static inline var HEADER_LAYER_NAME = "header";
	/**
	 * name of the required container
	 */
	public static inline var FOOTER_LAYER_NAME = "footer";
	/**
	 * name of the required container
	 */
	public static inline var NAV_LAYER_NAME = "nav";
	/**
	 * name of the required container
	 */
	public static inline var SIDE_BAR_LAYER_NAME = "side-bar";
	/**
	 * required containers
	 */
	public static inline var REQUIRED_CONTAINERS = [HEADER_LAYER_NAME, FOOTER_LAYER_NAME, NAV_LAYER_NAME, SIDE_BAR_LAYER_NAME];
	/**
	 * Models are singletons
	 * Constructor is private
	 */
	private function new(){
		super(ON_HOVER_CHANGE, ON_SELECTION_CHANGE, DEBUG_INFO);
		// expose the class to the scripts interpreter
		Interpreter.getInstance().expose("LayerModel", LayerModel);
	}
	/**
	 * Setter for the selected item
	 * Reset the selection
	 */
	override public function setSelectedItem(item:Layer):Layer {
		// trace("setSelectedItem "+item);
		// reset model selection
		var model = ComponentModel.getInstance();
		model.selectedItem = null;
		model.hoveredItem = null;
		return super.setSelectedItem(item);
	}
	/**
	 * add a master to the page (view and model)
	 * dispatch the change event
	 */
	public function addMaster(layer:Layer, pageName:String){
		// trace("addMaster("+layer+", "+page+")");
		// simply add the name of the page to the css class of the layer node
		DomTools.addClass(layer.rootElement, pageName);
		// do the same in the model
		DomTools.addClass(FileModel.getInstance().getModelFromView(layer.rootElement), pageName);
		//show the layer
		layer.show();
		// dispatch the change event
		dispatchEvent(createEvent(ON_LIST_CHANGE, layer), DEBUG_INFO);
	}
	/**
	 * add a layer to the page (view and model)
	 * dispatch the change event
	 */
	public function addLayer(pageName:String, layerName:String, position:Int = 0):Layer{
		// trace("addLayer "+page+", "+layerName+", "+position);
		// get the file model
		var fileModel = FileModel.getInstance();
		// get the view and model DOM
		var viewHtmlDom = fileModel.currentData.viewHtmlDom;
		var modelHtmlDom = fileModel.currentData.modelHtmlDom;

		// create a node for an empty new layer
		var newNode = Lib.document.createElement("div");
		newNode.className = "Layer " + pageName + " " + NEW_LAYER_CSS_CLASS;
		newNode.setAttribute(NAME_ATTRIBUTE_NAME, layerName);


		// add to the view DOM
		if (position > viewHtmlDom.childNodes.length - 1){
			// at the end
			viewHtmlDom.appendChild(newNode);
		}
		else{
			// at a given position
			viewHtmlDom.insertBefore(newNode, viewHtmlDom.childNodes[position]);
		}

		// add the layer id
		fileModel.prepareForEdit(newNode);

		// add to the model DOM
		if (position > modelHtmlDom.childNodes.length - 1){
			// at the end
			modelHtmlDom.appendChild(newNode.cloneNode(true));
		}
		else{
			// at a given position
			modelHtmlDom.insertBefore(newNode.cloneNode(true), modelHtmlDom.childNodes[position]);
		}


		// create the Layer instance
/**/
		var newLayer:Layer = new Layer(newNode, fileModel.application.id);
		newLayer.init();
		newLayer.show();
/*
		fileModel.application.initDom(newNode);
		fileModel.application.initComponents();
		var newLayer = fileModel.application.getAssociatedComponents(newNode, Layer).first();
/**/
		// add a text field
		var textElement = ComponentModel.getInstance().addComponent("div", newLayer);
		PropertyModel.getInstance().setAttribute(textElement, ComponentModel.NAME_ATTRIBUTE_NAME, "New text field");
		PropertyModel.getInstance().setProperty(textElement, "innerHTML", "<p>Insert text here.</p>");

		// dispatch the change event
		dispatchEvent(createEvent(ON_LIST_CHANGE, newLayer), DEBUG_INFO);
		return newLayer;
	}
	/**
	 * remove a page from the view and model of the file
	 * remove the page from all layers css class name
	 * dispatch the change event
	 */
	public function removeLayer(layer:Layer, pageName:String){
		// get the file model
		var fileModel = FileModel.getInstance();
		// get the view and model DOM
		var viewHtmlDom = layer.rootElement;
		var modelHtmlDom = fileModel.getModelFromView(layer.rootElement);

		// remove the page from layer css class name
		DomTools.removeClass(viewHtmlDom, pageName);
		DomTools.removeClass(modelHtmlDom, pageName);

		var allPageNodes = Page.getPageNodes(fileModel.application.id, fileModel.currentData.viewHtmlDom);
		var found = false;
		for (idx in 0...allPageNodes.length){
			if (DomTools.hasClass(viewHtmlDom, allPageNodes[idx].getAttribute(Page.CONFIG_NAME_ATTR))){
				found = true;
				break;
			}
		}
		// remove layer from dom if it is not used on other pages and it is not marked as a master
		if (layer.rootElement.getAttribute(MASTER_PROPERTY_NAME) == null
			&& found == false){
			// reset components associated wit hthis element
			fileModel.application.removeAllAssociatedComponent(viewHtmlDom);
			// remove ffrom the dom
			viewHtmlDom.parentNode.removeChild(viewHtmlDom);
			modelHtmlDom.parentNode.removeChild(modelHtmlDom);
		}
		else{
			layer.hide(null, true);
		}
		// change selection 
		if(selectedItem == layer)
			selectedItem = null;

		// dispatch the change event
		dispatchEvent(createEvent(ON_LIST_CHANGE), DEBUG_INFO);
	}
	/**
	 * add the required masters
	 */
	public function addRequiredMasters(pageName:String, addEmptyContainer:Bool = true){
		// get the file model
		var fileModel = FileModel.getInstance();

		// get the side bar position
		var sideBarNode = DomTools.getSingleElement(fileModel.currentData.viewHtmlDom, SIDE_BAR_LAYER_NAME, true);
		var nextPosition:Int;
		if (sideBarNode.nextSibling != null)
			nextPosition = DomTools.getElementIndex(sideBarNode.nextSibling);
		else
			nextPosition = DomTools.getElementIndex(sideBarNode)+1;

		// add a first empty container after the side bar
		addLayer(pageName, NEW_LAYER_NAME, nextPosition);

		// browe all required masters
		for (idx in 0...REQUIRED_CONTAINERS.length){
			var masterName = REQUIRED_CONTAINERS[idx];
			var masterNode = DomTools.getSingleElement(fileModel.currentData.viewHtmlDom, masterName, true);
			var masterInstance = fileModel.application.getAssociatedComponents(masterNode, Layer).first();
			addMaster(masterInstance, pageName);
		}
	}
}

package silex.layer;

import js.Lib;
import js.Dom;

import silex.ModelBase;
import silex.component.ComponentModel;
import silex.publication.PublicationModel;
import silex.property.PropertyModel;

import brix.component.navigation.Layer;
import brix.component.navigation.Page;
import brix.util.DomTools;

/**
 * Manipulation of layers, remove, add, etc. 
 * This class is a singleton and it can be used on the client side (may be used on the server side with cocktail).
 * The models in Silex are used only when editing, not when viewing a publication.
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
	 * The layer id is used only when editing a Silex publication, and it is not saved in the HTML file
	 * It is used to ease the synch between the view and the model, i.e. the publication DOM which is displayed by the browser and the one which is stored by Silex
	 */ 
	public static inline var LAYER_ID_ATTRIBUTE_NAME = "data-silex-layer-id";
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
	 * Models are singletons
	 * Constructor is private
	 */
	private function new(){
		super(ON_HOVER_CHANGE, ON_SELECTION_CHANGE, DEBUG_INFO);
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
	public function addMaster(layer:Layer, page:Page){
		trace("addMaster("+layer+", "+page+")");
		// simply add the name of the page to the css class of the layer node
		DomTools.addClass(layer.rootElement, page.name);
		// do the same in the model
		DomTools.addClass(PublicationModel.getInstance().getModelFromView(layer.rootElement), page.name);
		//show the layer
		layer.show();
		// dispatch the change event
		dispatchEvent(createEvent(ON_LIST_CHANGE, layer), DEBUG_INFO);
	}
	/**
	 * add a layer to the page (view and model)
	 * dispatch the change event
	 */
	public function addLayer(page:Page, layerName:String, position:Int = 0){
		trace("addLayer "+page+", "+layerName+", "+position);
		// get the publication model
		var publicationModel = PublicationModel.getInstance();
		// get the view and model DOM
		var viewHtmlDom = publicationModel.viewHtmlDom;
		var modelHtmlDom = publicationModel.modelHtmlDom;

		// create a node for an empty new layer
		var newNode = Lib.document.createElement("div");
		newNode.className = "Layer " + page.name;
		newNode.setAttribute("title", layerName);

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
		publicationModel.prepareForEdit(newNode);

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
		var newLayer:Layer = new Layer(newNode, publicationModel.application.id);
		newLayer.init();
/*
		publicationModel.application.initDom(newNode);
		publicationModel.application.initComponents();
		var newLayer = publicationModel.application.getAssociatedComponents(newNode, Layer).first();
/**/
		// dispatch the change event
		dispatchEvent(createEvent(ON_LIST_CHANGE, newLayer), DEBUG_INFO);
	}
	/**
	 * remove a page from the view and model of the publication
	 * remove the page from all layers css class name
	 * dispatch the change event
	 */
	public function removeLayer(layer:Layer, page:Page){
		// get the publication model
		var publicationModel = PublicationModel.getInstance();
		// get the view and model DOM
		var viewHtmlDom = layer.rootElement;
		var modelHtmlDom = publicationModel.getModelFromView(layer.rootElement);

		// remove the page from layer css class name
		DomTools.removeClass(viewHtmlDom, page.name);
		DomTools.removeClass(modelHtmlDom, page.name);

		var allPageNodes = Page.getPageNodes(publicationModel.application.id, publicationModel.viewHtmlDom);
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
			publicationModel.application.removeAllAssociatedComponent(viewHtmlDom);
			// remove ffrom the dom
			viewHtmlDom.parentNode.removeChild(viewHtmlDom);
			modelHtmlDom.parentNode.removeChild(modelHtmlDom);
			// todo: maybe free the domelement, not possible to write layer.rootElement = null;
			// todo: unregister class from Brix
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
}

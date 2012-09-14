package silex.layer;

import js.Lib;
import js.Dom;

import silex.ModelBase;
import silex.component.ComponentModel;

import org.slplayer.component.navigation.Layer;

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
		trace("setSelectedItem "+item);
		// reset model selection
		var model = ComponentModel.getInstance();
		model.selectedItem = null;
		model.hoveredItem = null;
		return super.setSelectedItem(item);
	}
	/**
	 * add a page to the view and model of the publication
	 * dispatch the change event
	 */
/*	public function addLayer(pageName:String){
		// get the publication model
		var publicationModel = PublicationModel.getInstance();
		// get the view and model DOM
		var viewHtmlDom = publicationModel.viewHtmlDom;
		var modelHtmlDom = publicationModel.modelHtmlDom;

		// create the node and the associated instance
		var newNode = Lib.document.createElement("a");
		newNode.className = "Page";
		newNode.setAttribute(Page.CONFIG_NAME_ATTR, className);
		newNode.innerHTML = name;

		// add to the view and model DOMs
		modelHtmlDom.appendChild(newNode.cloneNode(true));
		viewHtmlDom.appendChild(newNode);

		// create the Page instance
		var newPage:Page = new Page(newNode, publicationModel.application.id);
		newPage.init();

		// create a node for an empty new layer
		var newNode = Lib.document.createElement("div");
		newNode.className = "Layer "+className;
		PublicationModel.getInstance().prepareForEdit(newNode);

		// add to the view and model DOMs
		modelHtmlDom.appendChild(newNode.cloneNode(true));
		viewHtmlDom.appendChild(newNode);

		// create the Layer instance
		var newLayer:Layer = new Layer(newNode, publicationModel.application.id);
		newLayer.init();

		// open the new page
		Page.getPageByName(className, publicationModel.application.id, viewHtmlDom).open(null, null, true, true);

		// dispatch the change event
		dispatchEvent(createEvent(ON_LIST_CHANGE, newPage), DEBUG_INFO);
	}
	/**
	 * remove a page from the view and model of the publication
	 * remove the page from all layers css class name
	 * dispatch the change event
	 */
/*
	public function removeLayer(layer:Layer){
		// get the publication model
		var publicationModel = PublicationModel.getInstance();
		// get the view and model DOM
		var viewHtmlDom = publicationModel.viewHtmlDom;
		var modelHtmlDom = publicationModel.modelHtmlDom;

		// close the page
		//page.close(null, null, true);

		// open the default page
		var initialPageName = DomTools.getMeta(Page.CONFIG_INITIAL_PAGE_NAME, null, publicationModel.headHtmlDom);
		Page.getPageByName(initialPageName, publicationModel.application.id, viewHtmlDom).open(null, null, true, true);

		// retrieve the node in the model, which is associated to the page instance
		// get all pages, i.e. all element with class name "page"
		var pages:HtmlCollection<HtmlDom> = Page.getPageNodes(publicationModel.application.id, modelHtmlDom);
		// browse all pages
		for (pageIdx in 0...pages.length){
			// check if it has the desired name
			if (pages[pageIdx].getAttribute(Page.CONFIG_NAME_ATTR) == page.name){
				// remove the node 
				pages[pageIdx].parentNode.removeChild(pages[pageIdx]);
				break;
			}
		}

		page.rootElement.parentNode.removeChild(page.rootElement);
		//page.rootElement = null;

		// remove the page from all layers css class name
		removeClassFromLayers(page.name, publicationModel.application.id, modelHtmlDom);
		removeClassFromLayers(page.name, publicationModel.application.id, viewHtmlDom);

		// dispatch the change event
		dispatchEvent(createEvent(ON_LIST_CHANGE), DEBUG_INFO);
	}
	public function removeClassFromLayers(className:String, slPlayerId:String, htmlDom:HtmlDom) {
		trace("removeClassFromLayers("+className+", "+slPlayerId+", "+htmlDom+")");
		var nodes = Layer.getLayerNodes(className, slPlayerId, htmlDom);
		// browse the layers
		for (idxLayerNode in 0...nodes.length){
			trace("found "+nodes[0].className);

			// always take the 1st element since the HtmlList is updated, and the nodes are removed automatically
			DomTools.removeClass(nodes[0], className);
		}
	}
	/**/
}

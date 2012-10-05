package silex.component;

import js.Lib;
import js.Dom;

import silex.ModelBase;
import silex.publication.PublicationModel;
import brix.component.navigation.Layer;


/**
 * Manipulation of components, selection etc. 
 * This class is a singleton and it can be used on the client side (may be used on the server side with cocktail).
 * The models in Silex are used only when editing, not when viewing a publication.
 */
class ComponentModel extends ModelBase<HtmlDom>{
	////////////////////////////////////////////////
	// Singleton implementation
	////////////////////////////////////////////////
	/**
	 * implement the singleton pattern
	 */
	static private var instance:ComponentModel;
	/**
	 * implement the singleton pattern
	 */
	static public function getInstance():ComponentModel {
	 	if (instance == null){
	 		instance = new ComponentModel();
	 	}
	 	return instance;
	}
	////////////////////////////////////////////////
	// Selection
	////////////////////////////////////////////////
	/**
	 * Name of the attribute for the component id
	 * The component id is used only when editing a Silex publication, and it is not saved in the HTML file
	 * It is used to ease the synch between the view and the model, i.e. the publication DOM which is displayed by the browser and the one which is stored by Silex
	 */ 
	public static inline var COMPONENT_ID_ATTRIBUTE_NAME = "data-silex-component-id";
	/**
	 * Information for debugging, e.g. the class name
	 */ 
	public static inline var DEBUG_INFO = "ComponentModel class";
	/**
	 * event dispatched when selection changes
	 */
	public static inline var ON_SELECTION_CHANGE = "onComponentSelectionChange";
	/**
	 * event dispatched when hover changes
	 * hover is like a pre-selection visualization
	 */
	public static inline var ON_HOVER_CHANGE = "onComponentHoverChange";
	/**
	 * event dispatched when the list of components changes
	 */
	public static inline var ON_LIST_CHANGE = "onComponentListChange";
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
	override public function setSelectedItem(item:HtmlDom):HtmlDom {
		// reset model selection
		// Todo: onSlectionChange event could be dispatched when the property editor has the focus
		/* var model = PropertyModel.getInstance();
		   model.selectedItem = null;
		   model.hoveredItem = null;
		*/
		return super.setSelectedItem(item);
	}
	/**
	 * add a component to a layer (view and model)
	 * dispatch the change event
	 * @return 	the created component, i.e. a dom element added to the view
	 */
	public function addComponent(nodeName:String, layer:Layer, position:Int = 0):HtmlDom{
		trace("addComponent "+nodeName+", "+layer+", "+position);
		// get the publication model
		var publicationModel = PublicationModel.getInstance();
		// get the view and model DOM
		var viewHtmlDom = layer.rootElement;
		var modelHtmlDom = publicationModel.getModelFromView(layer.rootElement);

		// create a node for an empty new layer
		var newNode = Lib.document.createElement(nodeName);

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

		// clone the node for the model
		var cloneNode = newNode.cloneNode(true);

		// add to the model DOM
		if (position > modelHtmlDom.childNodes.length - 1){
			// at the end
			modelHtmlDom.appendChild(cloneNode);
		}
		else{
			// at a given position
			modelHtmlDom.insertBefore(cloneNode, modelHtmlDom.childNodes[position]);
		}
/*
		publicationModel.application.initDom(newNode);
		publicationModel.application.initComponents();
*/
		// dispatch the change event
		dispatchEvent(createEvent(ON_LIST_CHANGE, newNode), DEBUG_INFO);

		// return the new dom element
		return newNode;
	}
	/**
	 * remove a page from the view and model of the publication
	 * remove the page from all layers css class name
	 * dispatch the change event
	 */
	public function removeComponent(element:HtmlDom){
		// get the publication model
		var publicationModel = PublicationModel.getInstance();

		// get the view and model DOM
		var viewHtmlDom = element;
		var modelHtmlDom = publicationModel.getModelFromView(element);

		// reset components associated wit hthis element
		publicationModel.application.removeAllAssociatedComponent(viewHtmlDom);

		// remove element from dom
		viewHtmlDom.parentNode.removeChild(viewHtmlDom);
		modelHtmlDom.parentNode.removeChild(modelHtmlDom);

		// change selection 
		if(selectedItem == viewHtmlDom)
			selectedItem = null;

		// dispatch the change event
		dispatchEvent(createEvent(ON_LIST_CHANGE), DEBUG_INFO);
	}

}
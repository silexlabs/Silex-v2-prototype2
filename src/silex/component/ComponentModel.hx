package silex.component;

import js.Lib;
import js.Dom;

import silex.interpreter.Interpreter;
import silex.ModelBase;
import silex.file.FileModel;
import silex.layer.LayerModel;
import silex.property.PropertyModel;

import brix.component.navigation.Layer;
import brix.util.DomTools;

import silex.ui.link.SilexLink;
import brix.component.navigation.link.LinkBase;


/**
 * Manipulation of components, selection etc. 
 * This class is a singleton and it can be used on the client side (may be used on the server side with cocktail).
 * The models in Silex are used only when editing, not when viewing a file.
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
	 * The component id is used only when editing a Silex file, and it is not saved in the HTML file
	 * It is used to ease the synch between the view and the model, i.e. the file DOM which is displayed by the browser and the one which is stored by Silex
	 */ 
	public static inline var COMPONENT_ID_ATTRIBUTE_NAME = "data-silex-component-id";
	/**
	 * Name of the attribute for the layer name
	 * The layer name is used only when editing a Silex file, but it is saved in the HTML file
	 */ 
	public static inline var NAME_ATTRIBUTE_NAME = "data-silex-name";
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
		// expose the class to the scripts interpreter
		Interpreter.getInstance().expose("ComponentModel", ComponentModel);
	}
	/**
	 * Setter for the selected item
	 * Reset the selection
	 */
	override public function setSelectedItem(item:HtmlDom):HtmlDom {
		if (item!=null){
			// change the layer selection (used in the layer marker to display the container name)
			var layer = FileModel.getInstance().application.getAssociatedComponents(item.parentNode, Layer).first();
			LayerModel.getInstance().selectedItem = layer;
		}

		return super.setSelectedItem(item);
	}
	/**
	 * add a component to a layer (view and model)
	 * dispatch the change event
	 * @return 	the created component, i.e. a dom element added to the view
	 */
	public function addComponent(nodeName:String, layer:Layer, position:Int = 0):HtmlDom{
		// trace("addComponent "+nodeName+", "+layer+", "+position);
		// get the file model
		var fileModel = FileModel.getInstance();
		// get the view and model DOM
		var viewHtmlDom = layer.rootElement;
		var modelHtmlDom = fileModel.getModelFromView(layer.rootElement);

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
		fileModel.prepareForEdit(newNode);

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
		fileModel.application.initDom(newNode);
		fileModel.application.initComponents();
*/
		// dispatch the change event
		dispatchEvent(createEvent(ON_LIST_CHANGE, newNode), DEBUG_INFO);

		// return the new dom element
		return newNode;
	}
	/**
	 * remove a page from the view and model of the file
	 * remove the page from all layers css class name
	 * dispatch the change event
	 */
	public function removeComponent(element:HtmlDom){
		// get the file model
		var fileModel = FileModel.getInstance();

		// get the view and model DOM
		var viewHtmlDom = element;
		var modelHtmlDom = fileModel.getModelFromView(element);

		// reset components associated wit hthis element
		fileModel.application.removeAllAssociatedComponent(viewHtmlDom);

		// remove element from dom
		viewHtmlDom.parentNode.removeChild(viewHtmlDom);
		modelHtmlDom.parentNode.removeChild(modelHtmlDom);

		// change selection 
		if(selectedItem == viewHtmlDom)
			selectedItem = null;

		// dispatch the change event
		dispatchEvent(createEvent(ON_LIST_CHANGE), DEBUG_INFO);
	}
	/**
	 * make the given component a link to the given page
	 */
	public function makeLinkToPage(htmlDom:HtmlDom, pageName:String){
		// get the model
		var fileModel = FileModel.getInstance();
		var propertyModel = PropertyModel.getInstance();

		// add  class in view and model
		DomTools.addClass(htmlDom, "SilexLink");
		PropertyModel.getInstance().addClass(htmlDom, "SilexLink");

		// add the link attribute in view and model
		propertyModel.setAttribute(htmlDom, LinkBase.CONFIG_PAGE_NAME_DATA_ATTR, pageName);

		// create the component instance
		var linkToPage = new SilexLink(htmlDom, fileModel.application.id);
		linkToPage.init();
	}
	/**
	 * remove the link from the given component
	 */
	public function resetLinkToPage(htmlDom:HtmlDom){
		// get the model
		var propertyModel = PropertyModel.getInstance();

		// remove the link attribute in view and model
		propertyModel.removeAttribute(htmlDom, LinkBase.CONFIG_PAGE_NAME_DATA_ATTR);
		propertyModel.removeAttribute(htmlDom, LinkBase.CONFIG_PAGE_NAME_ATTR);

		// remove class in view and model
		propertyModel.removeClass(htmlDom, "SilexLink");

		// delete the component instance
		// TODO: remove from Brix
	}
	/**
	 * update the link from the given component
	 * replace the text if newLinkText is provided
	 */
	public function updateLink(htmlDom:HtmlDom, oldLink:String, newLink:String, newLinkText:String = ""){
		// get the model
		var propertyModel = PropertyModel.getInstance();

		// update the link attribute in view and model
		if(propertyModel.getAttribute(htmlDom, LinkBase.CONFIG_PAGE_NAME_ATTR)==oldLink)
			propertyModel.setAttribute(htmlDom, LinkBase.CONFIG_PAGE_NAME_ATTR, newLink);
		if(propertyModel.getAttribute(htmlDom, LinkBase.CONFIG_PAGE_NAME_DATA_ATTR)==oldLink)
			propertyModel.setAttribute(htmlDom, LinkBase.CONFIG_PAGE_NAME_DATA_ATTR, newLink);

		// replace the text
		if (newLinkText != ""){
			htmlDom.innerHTML = newLinkText;
			var modelHtmlDom:HtmlDom = FileModel.getInstance().getModelFromView(htmlDom);
			modelHtmlDom.innerHTML = newLinkText;
		}

		// delete the component instance
		// TODO: remove from Brix
	}
}
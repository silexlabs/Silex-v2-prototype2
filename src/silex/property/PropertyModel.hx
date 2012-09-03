package silex.property;

import silex.ModelBase;
import silex.property.PropertyData;
import silex.component.ComponentModel;
import silex.publication.PublicationModel;
import silex.layer.LayerModel;

import org.slplayer.util.DomTools;

import js.Lib;
import js.Dom;

/**
 * Manipulation of properties, set/get styles, set/get attributes, maintain the 2 DOM synced - view and model, etc. 
 * This class is a singleton and it can be used on the client side (may be used on the server side with cocktail).
 * The models in Silex are used only when editing, not when viewing a publication.
 */
class PropertyModel extends ModelBase<PropertyData>{
	////////////////////////////////////////////////
	// Singleton implementation
	////////////////////////////////////////////////
	/**
	 * implement the singleton pattern
	 */
	static private var instance:PropertyModel;
	/**
	 * implement the singleton pattern
	 */
	static public function getInstance():PropertyModel {
	 	if (instance == null){
	 		instance = new PropertyModel();
	 	}
	 	return instance;
	}
	////////////////////////////////////////////////
	// Selection
	////////////////////////////////////////////////
	/**
	 * Information for debugging, e.g. the class name
	 */ 
	public static inline var DEBUG_INFO:String = "PropertyModel class";
	/**
	 * event dispatched when a property value changes
	 */
	public static inline var ON_PROPERTY_CHANGE:String = "onPropertyChange";
	/**
	 * Models are singletons
	 * Constructor is private
	 * Todo: onSlectionChange event could be dispatched when the property editor has the focus
	 */
	private function new(){
		super(null, null, DEBUG_INFO);
	}
	/**
	 * Apply a value to the view and the model simultanneously
	 * This dispatches a onPropertyChange event with event.detail set to the PropertyData object 
	 */
	public function setAttribute(name:String, value:String){
		trace("setAttribute("+name+", "+value+")");
		// retrieve the owner component 
		var owner:HtmlDom = getSelectedElementFromModel();
		// apply the change 
		owner.setAttribute(name, value);
		// create the property data object
		var propertyData:PropertyData = {
			name: name,
			value: value,
			owner: owner
		};
		// dispatch the event 
		dispatchEvent(createEvent(ON_PROPERTY_CHANGE, propertyData), debugInfo);
	}
	/**
	 * Retrieve a value in the view and the model simultanneously
	 */
	public function getAttribute(name:String):PropertyData{
		trace("getAttribute("+name+")");
		// retrieve the owner component 
		var owner:HtmlDom = getSelectedElementFromModel();
		// create the property data object
		return {
			name: name,
			value: owner.getAttribute(name),
			owner: owner
		};
	}
	/**
	 * Retrieve a reference to the selected component or layer in the PublicationModel modelHtmlDom object
	 * If a component is selected, the it looks for  a component, otherwise it looks for a layer
	 * Todo: same for pages
	 */
	public function getSelectedElementFromModel():HtmlDom{
		var results : Array<HtmlDom>;
		var id:String;
		// case of a component
		if (ComponentModel.getInstance().selectedItem != null){
			id = ComponentModel.getInstance().selectedItem.getAttribute(ComponentModel.COMPONENT_ID_ATTRIBUTE_NAME);
			if (id!=null){
				results = DomTools.getElementsByAttribute(PublicationModel.getInstance().modelHtmlDom, ComponentModel.COMPONENT_ID_ATTRIBUTE_NAME, id);
			}
			else{
				throw("Error: the selected component has not a Silex ID. It should have the ID in the "+ComponentModel.COMPONENT_ID_ATTRIBUTE_NAME+" attribute");
			}
		}
		// case of a layer
		else if (LayerModel.getInstance().selectedItem != null){
			id = LayerModel.getInstance().selectedItem.rootElement.getAttribute(LayerModel.LAYER_ID_ATTRIBUTE_NAME);
			if (id!=null){
				results = DomTools.getElementsByAttribute(PublicationModel.getInstance().modelHtmlDom, LayerModel.LAYER_ID_ATTRIBUTE_NAME, id);
			}
			else{
				throw("Error: the selected layer has not a Silex ID. It should have the ID in the "+LayerModel.LAYER_ID_ATTRIBUTE_NAME+" attribute");
			}
		}
		else{
			throw ("Error: no layer nor component selected.");
		}
		if (results.length != 1){
			throw ("Error: 1 and only 1 component or layer is expected to have ID \"" + id + "\". There are "+results.length+" components with this id.");
		}
		return results[0];
	}
}

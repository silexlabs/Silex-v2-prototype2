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
	 * event dispatched when a style value changes
	 */
	public static inline var ON_STYLE_CHANGE:String = "onStyleChange";
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
/*	public function setAttribute(name:String, value:String){
		trace("setAttribute("+name+", "+value+")");
		// retrieve the owner component 
		var owner:HtmlDom = getSelectedElement(false);
		// apply the change 
		owner.setAttribute(name, value);
		// retrieve the owner component 
		var owner:HtmlDom = getSelectedElement(true);
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
	 * Retrieve a value in the model
	 */
/*	public function getAttribute(name:String):PropertyData{
		// retrieve the owner component 
		var owner:HtmlDom = getSelectedElement(true);
		trace("getAttribute("+name+") => "+owner.getAttribute(name));
		// create the property data object
		return {
			name: name,
			value: owner.getAttribute(name),
			owner: owner
		};
	}
	/**
	 * Apply a value to the view and the model simultanneously
	 * This dispatches a onPropertyChange event with event.detail set to the PropertyData object 
	 */
	public function setProperty(viewHtmlDom:HtmlDom, name:String, value:Null<Dynamic>){
		trace("setProperty("+viewHtmlDom+", "+name+", "+value+")");
		// retrieve the model of the component 
		var modelHtmlDom:HtmlDom = getModel(viewHtmlDom);
		// apply the change 
		try{
			Reflect.setField(viewHtmlDom, name, value);
			Reflect.setField(modelHtmlDom, name, value);
		}
		catch(e:Dynamic){
			throw("Error: the selected element has no field "+name+" or there was an error ("+e+")");
		}

		// create the property data object
		var propertyData:PropertyData = {
			name: name,
			value: value,
			viewHtmlDom: viewHtmlDom,
			modelHtmlDom: modelHtmlDom,
		};
		// dispatch the event 
		dispatchEvent(createEvent(ON_PROPERTY_CHANGE, propertyData), debugInfo);
	}
	/**
	 * Retrieve a value in the model
	 */
	public function getProperty(viewHtmlDom:HtmlDom, name:String):Dynamic{
		var value:String;
		// retrieve the model of the component 
		var modelHtmlDom:HtmlDom = getModel(viewHtmlDom);
		// get the value
		try{
			value = Reflect.field(modelHtmlDom, name);
		}
		catch(e:Dynamic){
			throw("Error: the selected element has no field "+name+" or there was an error ("+e+")");
		}
		// create the property data object
		return value;
	}
	/**
	 * Apply a value to the style property of the view and the model simultanneously
	 * This dispatches a onStyleChange event with event.detail set to the PropertyData object 
	 */
	public function setStyle(viewHtmlDom:HtmlDom, name:String, value:String){
		trace("setStyle("+viewHtmlDom+", "+name+", "+value+")");
		// retrieve the model of the component 
		var modelHtmlDom:HtmlDom = getModel(viewHtmlDom);
		// apply the change 
		try{
			Reflect.setField(viewHtmlDom.style, name, value);
			Reflect.setField(modelHtmlDom.style, name, value);
		}
		catch(e:Dynamic){
			throw("Error: the selected element has no field "+name+" or there was an error ("+e+")");
		}

		// create the property data object
		var propertyData:PropertyData = {
			name: name,
			value: value,
			viewHtmlDom: viewHtmlDom,
			modelHtmlDom: modelHtmlDom,
		};
		// dispatch the event 
		dispatchEvent(createEvent(ON_STYLE_CHANGE, propertyData), debugInfo);
	}
	/**
	 * Retrieve a value in the model
	 */
	public function getStyle(viewHtmlDom:HtmlDom, name:String):String{
		var value:String;
		// retrieve the model of the component 
		var modelHtmlDom:HtmlDom = getModel(viewHtmlDom);
		// get the value
		try{
			value = Reflect.field(modelHtmlDom.style, name);
		}
		catch(e:Dynamic){
			throw("Error: the selected element has no field "+name+" or there was an error ("+e+")");
		}
		// create the property data object
		return value;
	}
	/**
	 * Retrieve a reference to the selected component or layer in the PublicationModel::modelHtmlDom object
	 * Todo: same for pages
	 */
	public function getModel(viewHtmlDom):HtmlDom{
		if (ComponentModel.getInstance().selectedItem == null && LayerModel.getInstance().selectedItem == null)
			throw ("Error: no component nor layer is selected.");

		var results : Array<HtmlDom> = null;
		var id:String = null;
		if (ComponentModel.getInstance().selectedItem != null)
			id = ComponentModel.getInstance().selectedItem.getAttribute(ComponentModel.COMPONENT_ID_ATTRIBUTE_NAME);
		if (id==null){
			if (LayerModel.getInstance().selectedItem != null){
				trace("case of a layer");
				// case of a layer
				id = LayerModel.getInstance().selectedItem.rootElement.getAttribute(LayerModel.LAYER_ID_ATTRIBUTE_NAME);
				if (id!=null){
					results = DomTools.getElementsByAttribute(PublicationModel.getInstance().modelHtmlDom, LayerModel.LAYER_ID_ATTRIBUTE_NAME, id);
				}
				else{
					throw("Error: the selected layer has not a Silex ID. It should have the ID in the "+LayerModel.LAYER_ID_ATTRIBUTE_NAME+" or "+ComponentModel.COMPONENT_ID_ATTRIBUTE_NAME+" attributes");
				}
			}
			else{
				// should never go here: a component is selected but has no data-silex-component-id
				throw("Error: the selected component has not a Silex ID. It should have the ID in the "+ComponentModel.COMPONENT_ID_ATTRIBUTE_NAME+" attribute");
			}
		}
		else{
			trace("case of a component");
			// case of a component
			results = DomTools.getElementsByAttribute(PublicationModel.getInstance().modelHtmlDom, ComponentModel.COMPONENT_ID_ATTRIBUTE_NAME, id);
		}
		// returns the element
		if (results == null || results.length != 1){
			throw ("Error: 1 and only 1 component or layer is expected to have ID \"" + id + "\".");
		}
		return results[0];
	}
}

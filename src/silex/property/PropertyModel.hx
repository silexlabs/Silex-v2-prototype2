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
	 * @param 	value 	a value to be set on the view and html dom elements, can be null to remove the attribute, and of different types, e.g. Bool for the autostart param of an audio element 
	 */
	public function setAttribute(viewHtmlDom:HtmlDom, name:String, value:Null<Dynamic>){
		trace("setAttribute("+viewHtmlDom+", "+name+", "+Type.typeof(value)+")");
		// retrieve the model of the component 
		var modelHtmlDom:HtmlDom = PublicationModel.getInstance().getModelFromView(viewHtmlDom);
		// apply the change 
		try{
			if (value == null){
				viewHtmlDom.removeAttribute(name);
				modelHtmlDom.removeAttribute(name);
			}
			else{			
				viewHtmlDom.setAttribute(name, value);
				modelHtmlDom.setAttribute(name, value);
			}
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
	public function getAttribute(viewHtmlDom:HtmlDom, name:String):Dynamic{
		var value:String;
		// retrieve the model of the component 
		var modelHtmlDom:HtmlDom = PublicationModel.getInstance().getModelFromView(viewHtmlDom);
		// get the value
		try{
			value = modelHtmlDom.getAttribute(name);
		}
		catch(e:Dynamic){
			throw("Error: the selected element has no field "+name+" or there was an error ("+e+")");
		}
		// create the property data object
		return value;
	}
	/**
	 * Apply a value to the view and the model simultanneously
	 * This dispatches a onPropertyChange event with event.detail set to the PropertyData object 
	 * @param 	value 	a value to be set on the view and html dom elements, can be null to remove the attribute, and of different types, e.g. Bool for the autostart param of an audio element 
	 */
	public function setProperty(viewHtmlDom:HtmlDom, name:String, value:Null<Dynamic>){
		// trace("setProperty("+viewHtmlDom+", "+name+", "+Type.typeof(value)+")");
		// retrieve the model of the component 
		var modelHtmlDom:HtmlDom = PublicationModel.getInstance().getModelFromView(viewHtmlDom);
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
		var modelHtmlDom:HtmlDom = PublicationModel.getInstance().getModelFromView(viewHtmlDom);
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
		var modelHtmlDom:HtmlDom = PublicationModel.getInstance().getModelFromView(viewHtmlDom);
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
		trace("getStyle("+viewHtmlDom+", "+name+")");

		var value:String;
		// retrieve the model of the component 
		var modelHtmlDom:HtmlDom = PublicationModel.getInstance().getModelFromView(viewHtmlDom);
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
}

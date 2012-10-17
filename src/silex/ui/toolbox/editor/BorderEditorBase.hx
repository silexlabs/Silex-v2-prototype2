package silex.ui.toolbox.editor;

import silex.property.PropertyModel;
import silex.component.ComponentModel;
import silex.layer.LayerModel;

import js.Lib;
import js.Dom;

import brix.component.ui.DisplayObject;
import brix.util.DomTools;

enum Side{
	top;
	left;
	bottom;
	right;
}

/**
 * Editor for box styles. 
 * Editors are Brix components, in charge of handling HTML input elements, 
 * in order to let the user enter values and edit css style values or tag attributes.
 * todo: background alpha
 */
class BorderEditorBase extends EditorBase {
	/**
	 * class name for the "apply to all" buttons
	 * when clicked, it will apply the first value to all fields, i.e. top, left, bottom and right
	 */ 
	public static inline var APPLY_ALL_CLASS_NAME:String = "apply_to_all";
	/**
	 * virtual method to be implemented in derived classes
	 * retrieve the value being edited
	 */
	private function getPropVal(element:HtmlDom, side:Side):String{
		throw("This is an abstract method, which should be overriden.");
		return null;
	}
	/**
	 * virtual method to be implemented in derived classes
	 * retrieve the name of the property being edited
	 */
	private function getPropName(side:Side):String{
		throw("This is an abstract method, which should be overriden.");
		return null;
	}
	/**
	 * callback for the click event, check if a dialog must be opened
	 */
	override private function onClick(e:Event) {
		super.onClick(e);

		if (DomTools.hasClass(e.target, APPLY_ALL_CLASS_NAME)){
			// prevent default button behaviour
			e.preventDefault();
			// apply the first value to all fields
			var value:String = getInputValue("border_top");
			setInputValue("border_left", value);
			setInputValue("border_bottom", value);
			setInputValue("border_right", value);
			apply();
		}
	}
	/**
	 * reset the values
	 */
	override private function reset() {
		setInputValue("border_top", "");
		setInputValue("border_left", "");
		setInputValue("border_bottom", "");
		setInputValue("border_right", "");
	}
	/**
	 * display the property value
	 */
	override private function load(element:HtmlDom) {
		setInputValue("border_top", getPropVal(element, top));
		setInputValue("border_left", getPropVal(element, left));
		setInputValue("border_bottom", getPropVal(element, bottom));
		setInputValue("border_right", getPropVal(element, right));
	}
	/**
	 * apply the property value
	 */
	override private function apply() {

		var propertyModel = PropertyModel.getInstance();

		var value:String = getInputValue("border_top");
		propertyModel.setStyle(selectedItem, getPropName(top), value);

		var value:String = getInputValue("border_left");
		propertyModel.setStyle(selectedItem, getPropName(left), value);

		var value:String = getInputValue("border_bottom");
		propertyModel.setStyle(selectedItem, getPropName(bottom), value);

		var value:String = getInputValue("border_right");
		propertyModel.setStyle(selectedItem, getPropName(right), value);
	}
}
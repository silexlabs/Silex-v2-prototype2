package silex.ui.toolbox.editor;

import silex.property.PropertyModel;
import silex.component.ComponentModel;
import silex.layer.LayerModel;

import js.Lib;
import js.Dom;

import brix.component.ui.DisplayObject;
import brix.util.DomTools;

/**
 * Editor for position styles. 
 * Editors are Brix components, in charge of handling HTML input elements, 
 * in order to let the user enter values and edit css style values or tag attributes.
 * todo: background alpha
 */
class PositionStyleEditor extends EditorBase 
{
	/**
	 * reset the values
	 */
	override private function reset() {

		// position
		setInputValue("positioning_type", "");
		// visibility
		setInputValue("positioning_visibility", "");
		// z index
		setInputValue("positioning_zindex", "");
		// overflow
		setInputValue("positioning_overflow", "");
	}
	/**
	 * display the property value
	 */
	override private function load(element:HtmlDom) {
		// position
		var value = element.style.position;
		if (value == null || value == ""){
			setInputValue("positioning_type", "");
		}
		else{
			setInputValue("positioning_type", value);
		}
		// visibility
		var value = element.style.visibility;
		if (value == null || value == ""){
			setInputValue("positioning_visibility", "");
		}
		else{
			setInputValue("positioning_visibility", value);
		}
		// z index
		var value = element.style.zIndex;
		if (value == null){
			setInputValue("positioning_zindex", "");
		}
		else{
			setInputValue("positioning_zindex", value);
		}
		// overflow
		var value = element.style.overflow;
		if (value == null){
			setInputValue("positioning_overflow", "");
		}
		else{
			setInputValue("positioning_overflow", value);
		}
	}
	/**
	 * apply the property value
	 */
	override private function apply() {
		var propertyModel = PropertyModel.getInstance();

		// position
		var value = getInputValue("positioning_type");
		if (value == "") value = null;
		propertyModel.setStyle(selectedItem, "position", value);
		// visibility
		var value = getInputValue("positioning_visibility");
		if (value == "") value = null;
		propertyModel.setStyle(selectedItem, "visibility", value);
		// z index
		var value = getInputValue("positioning_zindex");
		if (value == "") value = null;
		propertyModel.setStyle(selectedItem, "zIndex", value);
		// overflow
		var value = getInputValue("positioning_overflow");
		if (value == "") value = null;
		propertyModel.setStyle(selectedItem, "overflow", value);
	}
}
package silex.ui.toolbox.editor;

import silex.property.PropertyModel;
import silex.component.ComponentModel;
import silex.layer.LayerModel;

import js.Lib;
import js.Dom;

import org.slplayer.component.ui.DisplayObject;
import org.slplayer.util.DomTools;

/**
 * Editor for position styles. 
 * Editors are SLPlayer components, in charge of handling HTML input elements, 
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
		// width
		setInputValue("positioning_width", "");
		setInputValue("positioning_width_unit", "");
		// height
		setInputValue("positioning_height", "");
		setInputValue("positioning_height_unit", "");
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
		// width
		var value = element.style.width;
		if (value == null || value == ""){
			setInputValue("positioning_width", "");
			setInputValue("positioning_width_unit", "");
		}
		else{
			var options = getOptions("positioning_width_unit");
			for (idx in 0...options.length){
				// if the value ends with one of the units
				if (StringTools.endsWith(value, cast(options[idx]).value)){
					// case of a number + unit
					setInputValue("positioning_width", Std.string(Std.parseInt(value)));
					setInputValue("positioning_width_unit", cast(options[idx]).value);
				}
			}
		}
		// width
		var value = element.style.height;
		if (value == null || value == ""){
			setInputValue("positioning_height", "");
			setInputValue("positioning_height_unit", "");
		}
		else{
			var options = getOptions("positioning_height_unit");
			for (idx in 0...options.length){
				// if the value ends with one of the units
				if (StringTools.endsWith(value, cast(options[idx]).value)){
					// case of a number + unit
					setInputValue("positioning_height", Std.string(Std.parseInt(value)));
					setInputValue("positioning_height_unit", cast(options[idx]).value);
				}
			}
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
		// width
		var value:String = getInputValue("positioning_width");
		var unit:String = getInputValue("positioning_width_unit");
		propertyModel.setStyle(selectedItem, "width", value+unit);
		// height
		var value:String = getInputValue("positioning_height");
		var unit:String = getInputValue("positioning_height_unit");
		propertyModel.setStyle(selectedItem, "height", value+unit);
	}
}
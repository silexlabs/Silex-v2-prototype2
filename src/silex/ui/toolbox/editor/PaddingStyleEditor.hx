package silex.ui.toolbox.editor;

import silex.property.PropertyModel;
import silex.component.ComponentModel;
import silex.layer.LayerModel;

import js.Lib;
import js.Dom;

import org.slplayer.component.ui.DisplayObject;
import org.slplayer.util.DomTools;

/**
 * Editor for padding styles. 
 * Editors are SLPlayer components, in charge of handling HTML input elements, 
 * in order to let the user enter values and edit css style values or tag attributes.
 * todo: background alpha
 */
@tagNameFilter("fieldset div")
class PaddingStyleEditor extends EditorBase 
{
	/**
	 * reset the values
	 */
	override private function reset() {

		// top
		setInputValue("box_padding_top", "");
		setInputValue("box_padding_top_unit", "");
		// right
		setInputValue("box_padding_right", "");
		setInputValue("box_padding_right_unit", "");
		// bottom
		setInputValue("box_padding_bottom", "");
		setInputValue("box_padding_bottom_unit", "");
		//left
		setInputValue("box_padding_left", "");
		setInputValue("box_padding_left_unit", "");

	}
	/**
	 * display the property value
	 */
	override private function load(element:HtmlDom) {
		// top
		var value = element.style.paddingTop;
		if (value == null || value == ""){
			setInputValue("box_padding_top", "");
			setInputValue("box_padding_top_unit", "");
		}
		else{
			var options = getOptions("box_padding_top_unit");
			for (idx in 0...options.length){
				// if the value ends with one of the units
				if (StringTools.endsWith(value, cast(options[idx]).value)){
					// case of a number + unit
					setInputValue("box_padding_top", Std.string(Std.parseInt(value)));
					setInputValue("box_padding_top_unit", cast(options[idx]).value);
				}
			}
		}
		// right
		var value = element.style.paddingRight;
		if (value == null || value == ""){
			setInputValue("box_padding_right", "");
			setInputValue("box_padding_right_unit", "");
		}
		else{
			var options = getOptions("box_padding_right_unit");
			for (idx in 0...options.length){
				// if the value ends with one of the units
				if (StringTools.endsWith(value, cast(options[idx]).value)){
					// case of a number + unit
					setInputValue("box_padding_right", Std.string(Std.parseInt(value)));
					setInputValue("box_padding_right_unit", cast(options[idx]).value);
				}
			}
		}
		// bottom
		var value = element.style.paddingBottom;
		if (value == null || value == ""){
			setInputValue("box_padding_bottom", "");
			setInputValue("box_padding_bottom_unit", "");
		}
		else{
			var options = getOptions("box_padding_bottom_unit");
			for (idx in 0...options.length){
				// if the value ends with one of the units
				if (StringTools.endsWith(value, cast(options[idx]).value)){
					// case of a number + unit
					setInputValue("box_padding_bottom", Std.string(Std.parseInt(value)));
					setInputValue("box_padding_bottom_unit", cast(options[idx]).value);
				}
			}
		}
		// left
		var value = element.style.paddingLeft;
		if (value == null || value == ""){
			setInputValue("box_padding_left", "");
			setInputValue("box_padding_left_unit", "");
		}
		else{
			var options = getOptions("box_padding_left_unit");
			for (idx in 0...options.length){
				// if the value ends with one of the units
				if (StringTools.endsWith(value, cast(options[idx]).value)){
					// case of a number + unit
					setInputValue("box_padding_left", Std.string(Std.parseInt(value)));
					setInputValue("box_padding_left_unit", cast(options[idx]).value);
				}
			}
		}

	}
	/**
	 * apply the property value
	 */
	override private function apply() {
		var propertyModel = PropertyModel.getInstance();

		// top
		var value:String = getInputValue("box_padding_top");
		var unit:String = getInputValue("box_padding_top_unit");
		propertyModel.setStyle(selectedItem, "paddingTop", value+unit);

		// right
		var value:String = getInputValue("box_padding_right");
		var unit:String = getInputValue("box_padding_right_unit");
		propertyModel.setStyle(selectedItem, "paddingRight", value+unit);

		// bottom
		var value:String = getInputValue("box_padding_bottom");
		var unit:String = getInputValue("box_padding_bottom_unit");
		propertyModel.setStyle(selectedItem, "paddingBottom", value+unit);

		// left
		var value:String = getInputValue("box_padding_left");
		var unit:String = getInputValue("box_padding_left_unit");
		propertyModel.setStyle(selectedItem, "paddingLeft", value+unit);

	}
}
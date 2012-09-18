package silex.ui.toolbox.editor;

import silex.property.PropertyModel;
import silex.component.ComponentModel;
import silex.layer.LayerModel;

import js.Lib;
import js.Dom;

import org.slplayer.component.ui.DisplayObject;
import org.slplayer.util.DomTools;

/**
 * Editor for margin styles. 
 * Editors are SLPlayer components, in charge of handling HTML input elements, 
 * in order to let the user enter values and edit css style values or tag attributes.
 * todo: background alpha
 */
@tagNameFilter("fieldset div")
class MarginStyleEditor extends EditorBase 
{
	/**
	 * reset the values
	 */
	override private function reset() {

		// top
		setInputValue("box_margin_top", "");
		setInputValue("box_margin_top_unit", "");
		// right
		setInputValue("box_margin_right", "");
		setInputValue("box_margin_right_unit", "");
		// bottom
		setInputValue("box_margin_bottom", "");
		setInputValue("box_margin_bottom_unit", "");
		//left
		setInputValue("box_margin_left", "");
		setInputValue("box_margin_left_unit", "");

	}
	/**
	 * display the property value
	 */
	override private function load(element:HtmlDom) {
		// top
		var value = element.style.marginTop;
		if (value == null || value == ""){
			setInputValue("box_margin_top", "");
			setInputValue("box_margin_top_unit", "");
		}
		else{
			var options = getOptions("box_margin_top_unit");
			for (idx in 0...options.length){
				// if the value ends with one of the units
				if (StringTools.endsWith(value, cast(options[idx]).value)){
					// case of a number + unit
					setInputValue("box_margin_top", Std.string(Std.parseInt(value)));
					setInputValue("box_margin_top_unit", cast(options[idx]).value);
				}
			}
		}
		// right
		var value = element.style.marginRight;
		if (value == null || value == ""){
			setInputValue("box_margin_right", "");
			setInputValue("box_margin_right_unit", "");
		}
		else{
			var options = getOptions("box_margin_right_unit");
			for (idx in 0...options.length){
				// if the value ends with one of the units
				if (StringTools.endsWith(value, cast(options[idx]).value)){
					// case of a number + unit
					setInputValue("box_margin_right", Std.string(Std.parseInt(value)));
					setInputValue("box_margin_right_unit", cast(options[idx]).value);
				}
			}
		}
		// bottom
		var value = element.style.marginBottom;
		if (value == null || value == ""){
			setInputValue("box_margin_bottom", "");
			setInputValue("box_margin_bottom_unit", "");
		}
		else{
			var options = getOptions("box_margin_bottom_unit");
			for (idx in 0...options.length){
				// if the value ends with one of the units
				if (StringTools.endsWith(value, cast(options[idx]).value)){
					// case of a number + unit
					setInputValue("box_margin_bottom", Std.string(Std.parseInt(value)));
					setInputValue("box_margin_bottom_unit", cast(options[idx]).value);
				}
			}
		}
		// left
		var value = element.style.marginLeft;
		if (value == null || value == ""){
			setInputValue("box_margin_left", "");
			setInputValue("box_margin_left_unit", "");
		}
		else{
			var options = getOptions("box_margin_left_unit");
			for (idx in 0...options.length){
				// if the value ends with one of the units
				if (StringTools.endsWith(value, cast(options[idx]).value)){
					// case of a number + unit
					setInputValue("box_margin_left", Std.string(Std.parseInt(value)));
					setInputValue("box_margin_left_unit", cast(options[idx]).value);
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
		var value:String = getInputValue("box_margin_top");
		var unit:String = getInputValue("box_margin_top_unit");
		propertyModel.setStyle(selectedItem, "marginTop", value+unit);

		// right
		var value:String = getInputValue("box_margin_right");
		var unit:String = getInputValue("box_margin_right_unit");
		propertyModel.setStyle(selectedItem, "marginRight", value+unit);

		// bottom
		var value:String = getInputValue("box_margin_bottom");
		var unit:String = getInputValue("box_margin_bottom_unit");
		propertyModel.setStyle(selectedItem, "marginBottom", value+unit);

		// left
		var value:String = getInputValue("box_margin_left");
		var unit:String = getInputValue("box_margin_left_unit");
		propertyModel.setStyle(selectedItem, "marginLeft", value+unit);

	}
}
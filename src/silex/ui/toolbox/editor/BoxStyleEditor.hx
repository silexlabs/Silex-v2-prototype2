package silex.ui.toolbox.editor;

import silex.property.PropertyModel;
import silex.component.ComponentModel;
import silex.layer.LayerModel;

import js.Lib;
import js.Dom;

import org.slplayer.component.ui.DisplayObject;
import org.slplayer.util.DomTools;

/**
 * Editor for box styles. 
 * Editors are SLPlayer components, in charge of handling HTML input elements, 
 * in order to let the user enter values and edit css style values or tag attributes.
 * todo: background alpha
 */
@tagNameFilter("fieldset div")
class BoxStyleEditor extends EditorBase 
{
	/**
	 * reset the values
	 */
	override private function reset() {
		// width
		setInputValue("box_width", "");
		setInputValue("box_width_unit", "");
		// height
		setInputValue("box_height", "");
		setInputValue("box_height_unit", "");
		// float
		setInputValue("box_float", "");
		// clear
		setInputValue("box_clear", "");
	}
	/**
	 * display the property value
	 */
	override private function load(element:HtmlDom) {
		// width
		var value = element.style.width;
		if (value == null || value == ""){
			setInputValue("box_width", "");
			setInputValue("box_width_unit", "");
		}
		else{
			var options = getOptions("box_width_unit");
			for (idx in 0...options.length){
				// if the value ends with one of the units
				if (StringTools.endsWith(value, cast(options[idx]).value)){
					// case of a number + unit
					setInputValue("box_width", Std.string(Std.parseInt(value)));
					setInputValue("box_width_unit", cast(options[idx]).value);
				}
			}
		}
		// height
		var value = element.style.height;
		if (value == null || value == ""){
			setInputValue("box_height", "");
			setInputValue("box_height_unit", "");
		}
		else{
			var options = getOptions("box_height_unit");
			for (idx in 0...options.length){
				// if the value ends with one of the units
				if (StringTools.endsWith(value, cast(options[idx]).value)){
					// case of a number + unit
					setInputValue("box_height", Std.string(Std.parseInt(value)));
					setInputValue("box_height_unit", cast(options[idx]).value);
				}
			}
		}
		// float
		setInputValue("box_float", element.style.cssFloat);
		// clear
		setInputValue("box_clear", element.style.clear);
	}
	/**
	 * apply the property value
	 */
	override private function apply() {

		var propertyModel = PropertyModel.getInstance();

		// width
		var value:String = getInputValue("box_width");
		var unit:String = getInputValue("box_width_unit");
		propertyModel.setStyle(selectedItem, "width", value+unit);

		// height
		var value:String = getInputValue("box_height");
		var unit:String = getInputValue("box_height_unit");
		propertyModel.setStyle(selectedItem, "height", value+unit);

		// float
		propertyModel.setStyle(selectedItem, "cssFloat", getInputValue("box_float"));

		// clear
		propertyModel.setStyle(selectedItem, "clear", getInputValue("box_clear"));
	}
}
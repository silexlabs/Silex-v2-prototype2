package silex.ui.toolbox.editor;

import silex.property.PropertyModel;
import silex.component.ComponentModel;
import silex.layer.LayerModel;

import js.Lib;
import js.Dom;

import org.slplayer.component.ui.DisplayObject;
import org.slplayer.util.DomTools;

/**
 * Editor for clip styles. 
 * Editors are SLPlayer components, in charge of handling HTML input elements, 
 * in order to let the user enter values and edit css style values or tag attributes.
 * todo: background alpha
 */
@tagNameFilter("fieldset div")
class ClipStyleEditor extends EditorBase 
{
	/**
	 * reset the values
	 */
	override private function reset() {

		// top
		setInputValue("positioning_clip_top", "");
		setInputValue("positioning_clip_top_unit", "");
		// right
		setInputValue("positioning_clip_right", "");
		setInputValue("positioning_clip_right_unit", "");
		// bottom
		setInputValue("positioning_clip_bottom", "");
		setInputValue("positioning_clip_bottom_unit", "");
		//left
		setInputValue("positioning_clip_left", "");
		setInputValue("positioning_clip_left_unit", "");

	}
	/**
	 * display the property value
	 */
	override private function load(element:HtmlDom) {
		var propertyModel = PropertyModel.getInstance();
		// extract the value of clip property, which can be auto, inherit or rect (top, right, bottom, left)
		var value = propertyModel.getStyle(element, "clip");
		var initialValue = value;
		if (value == null){
			reset();
		}
		else{
			value = StringTools.trim(value.toLowerCase());
			if (StringTools.startsWith(value, "rect")){
				// case of rect (top, right, bottom, left)
				var top, right, bottom, left;
				// remove "rect", "(" and ")"
				value = StringTools.replace(value, "rect", "");
				value = StringTools.replace(value, "(", "");
				value = StringTools.replace(value, ")", "");
				value = StringTools.trim(value);
				// check that it went all right
				var splitVal = value.split(",");
				if (splitVal.length != 4){
					throw("Error: could not extract values for clip style (clip=\""+initialValue+"\";)");
				}
				// extract the values
				top = StringTools.trim(splitVal[0]);
				right = StringTools.trim(splitVal[1]);
				bottom = StringTools.trim(splitVal[2]);
				left = StringTools.trim(splitVal[3]);
				var options = getOptions("positioning_clip_top_unit");

				// update inputs
				// top
				for (idx in 0...options.length){
					// if the value ends with one of the units
					if (StringTools.endsWith(top, cast(options[idx]).value)){
						// case of a number + unit
						setInputValue("positioning_clip_top", Std.string(Std.parseInt(top)));
						setInputValue("positioning_clip_top_unit", cast(options[idx]).value);
					}
				}
				// right
				var options = getOptions("positioning_clip_right_unit");
				for (idx in 0...options.length){
					// if the value ends with one of the units
					if (StringTools.endsWith(right, cast(options[idx]).value)){
						// case of a number + unit
						setInputValue("positioning_clip_right", Std.string(Std.parseInt(right)));
						setInputValue("positioning_clip_right_unit", cast(options[idx]).value);
					}
				}
				// bottom
				var options = getOptions("positioning_clip_bottom_unit");
				for (idx in 0...options.length){
					// if the value ends with one of the units
					if (StringTools.endsWith(bottom, cast(options[idx]).value)){
						// case of a number + unit
						setInputValue("positioning_clip_bottom", Std.string(Std.parseInt(bottom)));
						setInputValue("positioning_clip_bottom_unit", cast(options[idx]).value);
					}
				}
				// left
				var options = getOptions("positioning_clip_left_unit");
				for (idx in 0...options.length){
					// if the value ends with one of the units
					if (StringTools.endsWith(left, cast(options[idx]).value)){
						// case of a number + unit
						setInputValue("positioning_clip_left", Std.string(Std.parseInt(left)));
						setInputValue("positioning_clip_left_unit", cast(options[idx]).value);
					}
				}
			}
			else {
				// case of auto or inherit - assume it is auto
				// todo: allow a inherit / auto choice for clip style
				reset();
			}
		}
	}
	/**
	 * apply the property value
	 */
	override private function apply() {
		var propertyModel = PropertyModel.getInstance();
		var top, right, bottom, left;

		// top
		var value:String = getInputValue("positioning_clip_top");
		var unit:String = getInputValue("positioning_clip_top_unit");
		top = value+unit;

		// right
		var value:String = getInputValue("positioning_clip_right");
		var unit:String = getInputValue("positioning_clip_right_unit");
		right = value+unit;

		// bottom
		var value:String = getInputValue("positioning_clip_bottom");
		var unit:String = getInputValue("positioning_clip_bottom_unit");
		bottom = value+unit;

		// left
		var value:String = getInputValue("positioning_clip_left");
		var unit:String = getInputValue("positioning_clip_left_unit");
		left = value+unit;

		propertyModel.setStyle(selectedItem, "clip", "rect("+top+", "+right+", "+bottom+", "+left+")");
	}
}
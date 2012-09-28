package silex.ui.toolbox.editor;

import silex.property.PropertyModel;
import silex.component.ComponentModel;
import silex.layer.LayerModel;

import js.Lib;
import js.Dom;

import org.slplayer.component.ui.DisplayObject;
import org.slplayer.util.DomTools;

/**
 * Editor for text styles. 
 * Editors are SLPlayer components, in charge of handling HTML input elements, 
 * in order to let the user enter values and edit css style values or tag attributes.
 */
class TextStyleEditor extends EditorBase 
{
	/**
	 * Constructor
	 * Start listening the input events
	 */
	public function new(rootElement:HtmlDom, SLPId:String){
		super(rootElement, SLPId);
	}
	/**
	 * reset the values
	 */
	override private function reset() {
		// trace("reset ");
		// font family
		setInputValue("text_font", "");
		// font size
		setInputValue("text_size", "");
		setInputValue("text_size_unit", "");
		setInputValue("text_size_num", "");
		// font weight
		setInputValue("text_weight", "");
		// font style
		setInputValue("text_style", "");
		// font variant
		setInputValue("text_variant", "");
		// font variant
		setInputValue("text_lineheight", "");
		// font variant
		setInputValue("text_lineheight_unit", "");
		// case
		setInputValue("text_case", "");
		// color
		setInputValue("text_color", "");
		// decoration
		setInputValue("text_decoration", "");
	}
	/**
	 * display the property value
	 */
	override private function load(element:HtmlDom) {
		// trace("load "+element);

		// font family
		var value = element.style.fontFamily;
		setInputValue("text_font", value);

		// font size + unit
		var value = element.style.fontSize;
		if (hasOptionValue("text_size", value)){
			// case of a label or "", then no unit
			setInputValue("text_size", value);
			setInputValue("text_size_unit", "");
			setInputValue("text_size_num", "");
		}else{
			// case of a number + unit
			var options = getOptions("text_size_unit");
			for (idx in 0...options.length){
				// if the value ends with one of the units
				if (StringTools.endsWith(value, cast(options[idx]).value)){
					// case of a number + unit
					setInputValue("text_size", "");
					setInputValue("text_size_num", Std.string(Std.parseInt(value)));
					setInputValue("text_size_unit", cast(options[idx]).value);
				}
			}
		}
		// font weight
		var value = element.style.fontWeight;
		setInputValue("text_weight", value);
		// font style
		var value = element.style.fontStyle;
		setInputValue("text_style", value);
		// font variant
		var value = element.style.fontVariant;
		setInputValue("text_variant", value);
		// line height: a number + unit
		var value = element.style.lineHeight;
		var options = getOptions("text_lineheight_unit");
		for (idx in 0...options.length){
			// if the value ends with one of the units
			if (StringTools.endsWith(value, cast(options[idx]).value)){
				// case of a number + unit
				var valInt = Std.parseInt(value);
				var valStr = "";
				if (valInt != null) 
					valStr = Std.string(valInt);
				setInputValue("text_lineheight", valStr);
				setInputValue("text_lineheight_unit", cast(options[idx]).value);
			}
		}
		// case
		var value = element.style.textTransform;
		setInputValue("text_case", value);
		// color
		var value:String = element.style.color;
		if(StringTools.startsWith(value.toLowerCase(), "rgb(") || StringTools.startsWith(value.toLowerCase(), "rgba(")){
			var decValue:Int = 0;
			// remove rgb( or argb(
			value = value.substr(value.indexOf("(")+1);
			// remove everything after ")"
			value = value.substr(0, value.lastIndexOf(")"));
			var values = value.split(",");
			decValue = Std.parseInt(values[0])*255*255 + Std.parseInt(values[1])*255 + Std.parseInt(values[2]);
			if (values.length == 4){
				decValue *= 255;
				decValue += Math.round(Std.parseFloat(values[3])*255);
			}
			// convert to hex
			setInputValue("text_color", "#" + StringTools.hex(decValue, 6));
			trace("load "+values+" -> "+decValue+" -> "+StringTools.hex(decValue));
		}else{
			setInputValue("text_color", value);
		}
		// decoration
		var value = element.style.textDecoration;
		setInputValue("text_decoration", value);
	}
	/**
	 * apply the property value
	 */
	override private function apply() {
		// trace("TextStyleEditor apply "+selectedItem);
		var propertyModel = PropertyModel.getInstance();

		// font family
		var value = getInputValue("text_font");
		propertyModel.setStyle(selectedItem, "fontFamily", value);
		// font size
		var value = getInputValue("text_size");
		if (value != ""){
			// case of a label
			propertyModel.setStyle(selectedItem, "fontSize", value);
		}else{
			// number + unit
			var value:String = getInputValue("text_size_num");
			var unit:String = getInputValue("text_size_unit");
			propertyModel.setStyle(selectedItem, "fontSize", value+unit);
		}
		// font weight
		var value = getInputValue("text_weight");
		propertyModel.setStyle(selectedItem, "fontWeight", value);
		// font style
		var value = getInputValue("text_style");
		propertyModel.setStyle(selectedItem, "fontStyle", value);
		// font variant
		var value = getInputValue("text_variant");
		propertyModel.setStyle(selectedItem, "fontVariant", value);
		// line height
		var value:String = getInputValue("text_lineheight");
		var unit:String = getInputValue("text_lineheight_unit");
		propertyModel.setStyle(selectedItem, "lineHeight", value+unit);
		// case
		var value = getInputValue("text_case");
		propertyModel.setStyle(selectedItem, "textTransform", value);
		// color
		var value = getInputValue("text_color");
		propertyModel.setStyle(selectedItem, "color", value);
		// decoration
		var value = getInputValue("text_decoration");
		propertyModel.setStyle(selectedItem, "textDecoration", value);
	}
}
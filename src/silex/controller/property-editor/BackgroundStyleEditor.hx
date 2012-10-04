package silex.ui.toolbox.editor;

import silex.property.PropertyModel;
import silex.component.ComponentModel;
import silex.layer.LayerModel;

import js.Lib;
import js.Dom;

import brix.component.ui.DisplayObject;
import brix.util.DomTools;

/**
 * Editor for background styles. 
 * Editors are Brix components, in charge of handling HTML input elements, 
 * in order to let the user enter values and edit css style values or tag attributes.
 * todo: background alpha
 */
class BackgroundStyleEditor extends EditorBase 
{
	/**
	 * Constructor
	 * Start listening the input events
	 */
	public function new(rootElement:HtmlDom, BrixId:String){
		super(rootElement, BrixId);
	}
	/**
	 * reset the values
	 */
	override private function reset() {
		trace("reset ");
		// color
		setInputValue("background_color", "");

		// image
		setInputValue("multiple-src-property", "");

		// repeat
		setInputValue("background_repeat", "");

		// horizontal position
		setInputValue("background_hpos", "");
		setInputValue("background_hpos_unit", "");
		setInputValue("background_hpos_num", "");

		// vertical position
		setInputValue("background_vpos", "");
		setInputValue("background_vpos_unit", "");
		setInputValue("background_vpos_num", "");
	}
	/**
	 * display the property value
	 */
	override private function load(element:HtmlDom) {
		trace("load "+element);

		// color
		var value:String = element.style.backgroundColor;
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
			setInputValue("background_color", "#" + StringTools.hex(decValue, 6));
			trace("load "+values+" -> "+decValue+" -> "+StringTools.hex(decValue));
		}else{
			setInputValue("background_color", value);
		}
		
		// image
		// values is a list of "," separated elements which can be url('URL'), none or inherit
		var values:Array<String> = element.style.backgroundImage.split(",");
		var urls:Array<String> = new Array();
		for (idx in 0...values.length){
			var value = values[idx];
			value = StringTools.trim(value);
			if(StringTools.startsWith(value.toLowerCase(), "url")){
				// remove url(
				value = value.substr(value.indexOf("(")+1);
				// remove everything after ")"
				value = value.substr(0, value.lastIndexOf(")"));
				value = StringTools.trim(value);

				// remove the quotes " and '
				if(StringTools.startsWith(value, "\"") || StringTools.startsWith(value, "'")){
					// remove the quotes
					value = value.substr(1);
					value = value.substr(0, value.length-1);
					value = StringTools.trim(value);
				}
				// absolute url to relative
				value = abs2rel(value);
			}
			urls.push(value);
		}
		setInputValue("multiple-src-property", urls.join("\n"));

		// repeat
		var value = element.style.backgroundRepeat;
		setInputValue("background_repeat", value);

		// attachement
		var value = element.style.backgroundAttachment;
		setInputValue("background_attachment", value);

		// position
		var hpos:String = "";
		var vpos:String = "";
		var value = element.style.backgroundPosition;
		if (value != null || value != ""){
			var values = value.split(" ");
			if (values.length > 0){
				hpos = values[0];
				if (values.length > 1){
					vpos = values[1];
				}
			}
		}
		// horizontal position
		if (hasOptionValue("background_hpos", hpos)){
			// case of a label or "", then no unit
			setInputValue("background_hpos", hpos);
			setInputValue("background_hpos_unit", "");
			setInputValue("background_hpos_num", "");
		}else{
			// case of a number + unit
			var options = getOptions("background_hpos_unit");
			for (idx in 0...options.length){
				// if the value ends with one of the units
				if (StringTools.endsWith(hpos, cast(options[idx]).value)){
					// case of a number + unit
					setInputValue("background_hpos", "");
					setInputValue("background_hpos_num", Std.string(Std.parseInt(hpos)));
					setInputValue("background_hpos_unit", cast(options[idx]).value);
				}
			}
		}
		// vertical position
		if (hasOptionValue("background_vpos", vpos)){
			// case of a label or "", then no unit
			setInputValue("background_vpos", vpos);
			setInputValue("background_vpos_unit", "");
			setInputValue("background_vpos_num", "");
		}else{
			// case of a number + unit
			var options = getOptions("background_vpos_unit");
			for (idx in 0...options.length){
				// if the value ends with one of the units
				if (StringTools.endsWith(vpos, cast(options[idx]).value)){
					// case of a number + unit
					setInputValue("background_vpos", "");
					setInputValue("background_vpos_num", Std.string(Std.parseInt(vpos)));
					setInputValue("background_vpos_unit", cast(options[idx]).value);
				}
			}
		}
	}
	/**
	 * apply the property value
	 */
	override private function apply() {
		trace("apply "+selectedItem);
		var propertyModel = PropertyModel.getInstance();

		// color
		var value = getInputValue("background_color");
		propertyModel.setStyle(selectedItem, "backgroundColor", value);

		// image
		var urls:Array<String> = getInputValue("multiple-src-property").split("\n");
		var value = "";
		for (entry in urls){
			if (StringTools.trim(entry) == "") continue;
			if (value != "") value += ", ";
			if (entry == "none" || entry == "inherit") {
				value += entry;
			}
			else{
				// convert into relative url
				value += "url('" + abs2rel(entry) + "')";
			}
		}
		trace("apply "+value);
		propertyModel.setStyle(selectedItem, "backgroundImage", "");
		propertyModel.setStyle(selectedItem, "backgroundImage", value);

		// repeat
		var value = getInputValue("background_repeat");
		propertyModel.setStyle(selectedItem, "backgroundRepeat", value);

		// attachement
		var value = getInputValue("background_attachment");
		propertyModel.setStyle(selectedItem, "backgroundAttachment", value);

		// position
		var hpos:String = "";
		var vpos:String = "";

		// horizontal position
		var value = getInputValue("background_hpos");
		if (value != ""){
			// case of a label
			hpos = value;
		}else{
			// number + unit
			var value:String = getInputValue("background_hpos_num");
			var unit:String = getInputValue("background_hpos_unit");
			hpos = value + unit;
		}
		// vertical position
		var value = getInputValue("background_vpos");
		if (value != ""){
			// case of a label
			vpos = value;
		}else{
			// number + unit
			var value:String = getInputValue("background_vpos_num");
			var unit:String = getInputValue("background_vpos_unit");
			vpos = value + unit;
		}
		propertyModel.setStyle(selectedItem, "backgroundPosition", hpos + " " + vpos);

	}
}
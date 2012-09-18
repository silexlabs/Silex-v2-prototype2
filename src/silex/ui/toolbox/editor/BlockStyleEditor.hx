package silex.ui.toolbox.editor;

import silex.property.PropertyModel;
import silex.component.ComponentModel;
import silex.layer.LayerModel;

import js.Lib;
import js.Dom;

import org.slplayer.component.ui.DisplayObject;
import org.slplayer.util.DomTools;

/**
 * Editor for block styles. 
 * Editors are SLPlayer components, in charge of handling HTML input elements, 
 * in order to let the user enter values and edit css style values or tag attributes.
 * todo: background alpha
 */
@tagNameFilter("fieldset div")
class BlockStyleEditor extends EditorBase 
{
	/**
	 * reset the values
	 */
	override private function reset() {
		// word spacing
		setInputValue("block_wordspacing", "");
		setInputValue("block_wordspacing_unit", "");
		setInputValue("block_wordspacing_num", "");
		// letter spacing
		setInputValue("block_letterspacing", "");
		setInputValue("block_letterspacing_unit", "");
		setInputValue("block_letterspacing_num", "");
		// text indent
		setInputValue("block_text_indent", "");
		setInputValue("block_text_indent_unit", "");
		// align
		setInputValue("block_text_align", "");
		setInputValue("block_vertical_alignment", "");
		// white space
		setInputValue("block_whitespace", "");
		// display
		setInputValue("block_display", "");
	}
	/**
	 * display the property value
	 */
	override private function load(element:HtmlDom) {
		// wordspacing
		var value = element.style.wordSpacing;
		if (hasOptionValue("block_wordspacing", value)){
			// case of a label or "", then no unit
			setInputValue("block_wordspacing", value);
			setInputValue("block_wordspacing_unit", "");
			setInputValue("block_wordspacing_num", "");
		}else{
			// case of a number + unit
			var options = getOptions("block_wordspacing_unit");
			for (idx in 0...options.length){
				// if the value ends with one of the units
				if (StringTools.endsWith(value, cast(options[idx]).value)){
					// case of a number + unit
					setInputValue("block_wordspacing", "");
					setInputValue("block_wordspacing_num", Std.string(Std.parseInt(value)));
					setInputValue("block_wordspacing_unit", cast(options[idx]).value);
				}
			}
		}
		// letterspacing
		var value = element.style.letterSpacing;
		if (hasOptionValue("block_letterspacing", value)){
			// case of a label or "", then no unit
			setInputValue("block_letterspacing", value);
			setInputValue("block_letterspacing_unit", "");
			setInputValue("block_letterspacing_num", "");
		}else{
			// case of a number + unit
			var options = getOptions("block_letterspacing_unit");
			for (idx in 0...options.length){
				// if the value ends with one of the units
				if (StringTools.endsWith(value, cast(options[idx]).value)){
					// case of a number + unit
					setInputValue("block_letterspacing", "");
					setInputValue("block_letterspacing_num", Std.string(Std.parseInt(value)));
					setInputValue("block_letterspacing_unit", cast(options[idx]).value);
				}
			}
		}
		// text indent
		var value = element.style.textIndent;
		if (value == null || value == ""){
			setInputValue("block_text_indent", "");
			setInputValue("block_text_indent_unit", "");
		}
		else{
			var options = getOptions("block_text_indent_unit");
			for (idx in 0...options.length){
				// if the value ends with one of the units
				if (StringTools.endsWith(value, cast(options[idx]).value)){
					// case of a number + unit
					setInputValue("block_text_indent", Std.string(Std.parseInt(value)));
					setInputValue("block_text_indent_unit", cast(options[idx]).value);
				}
			}
		}
		// align
		setInputValue("block_text_align", element.style.textAlign);
		setInputValue("block_vertical_alignment", element.style.verticalAlign);

		// white space
		setInputValue("block_whitespace", element.style.whiteSpace);

		// display
		setInputValue("block_display", element.style.display);
	}
	/**
	 * apply the property value
	 */
	override private function apply() {
		var propertyModel = PropertyModel.getInstance();

		// wordspacing
		var pos:String = "";
		var value = getInputValue("block_wordspacing");
		if (value != ""){
			// case of a label
			pos = value;
		}else{
			// number + unit
			var value:String = getInputValue("block_wordspacing_num");
			var unit:String = getInputValue("block_wordspacing_unit");
			pos = value + unit;
		}
		propertyModel.setStyle(selectedItem, "wordSpacing", pos);

		// letterspacing
		var pos:String = "";
		var value = getInputValue("block_letterspacing");
		if (value != ""){
			// case of a label
			pos = value;
		}else{
			// number + unit
			var value:String = getInputValue("block_letterspacing_num");
			var unit:String = getInputValue("block_letterspacing_unit");
			pos = value + unit;
		}
		propertyModel.setStyle(selectedItem, "letterSpacing", pos);

		// text indent
		var value:String = getInputValue("block_text_indent");
		var unit:String = getInputValue("block_text_indent_unit");
		propertyModel.setStyle(selectedItem, "textIndent", value+unit);

		// align
		propertyModel.setStyle(selectedItem, "textAlign", getInputValue("block_text_align"));
		propertyModel.setStyle(selectedItem, "verticalAlign", getInputValue("block_vertical_alignment"));

		// white space
		propertyModel.setStyle(selectedItem, "whiteSpace", getInputValue("block_whitespace"));

		// display
		propertyModel.setStyle(selectedItem, "display", getInputValue("block_display"));
	}
}
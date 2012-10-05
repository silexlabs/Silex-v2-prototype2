package silex.ui.toolbox.editor;

import silex.property.PropertyModel;
import silex.component.ComponentModel;
import silex.layer.LayerModel;

import js.Lib;
import js.Dom;

import brix.component.ui.DisplayObject;
import brix.util.DomTools;

/**
 * Base class for editor for styles which have top, left, bottom and right properties,
 * e.g. margin, padding, placement, clip.
 * The HTML inputs must be a number input for value with class name prefix + "_top" 
 * and a combo box for unit with class name prefix + "_top_unit".
 * The style prefix is the prefix for the property on the style, e.g. "margin" for element.style.marginTop
 * 
 * Editors are Brix components, in charge of handling HTML input elements, 
 * in order to let the user enter values and edit css style values or tag attributes.
 * todo: background alpha
 */
class BoxTypeEditorBase extends EditorBase 
{
	private var prefix:String;
	private var stylePrefix:String;
	private var topStyleSufix:String;
	private var leftStyleSufix:String;
	private var rightStyleSufix:String;
	private var bottomStyleSufix:String;
	/**
	 * Constructor
	 * store the prefix values 
	 */
	public function new(rootElement:HtmlDom, BrixId:String, prefix:String, stylePrefix:String, topStyleSufix:String="Top", leftStyleSufix:String="Left", rightStyleSufix:String="Right", bottomStyleSufix:String="Bottom"){
		this.prefix = prefix;
		this.stylePrefix = stylePrefix;
		this.topStyleSufix = topStyleSufix;
		this.leftStyleSufix = leftStyleSufix;
		this.rightStyleSufix = rightStyleSufix;
		this.bottomStyleSufix = bottomStyleSufix;

		super(rootElement, BrixId);
	}
	/**
	 * reset the values
	 */
	override private function reset() {

		// top
		setInputValue(prefix + "_top", "");
		setInputValue(prefix + "_top_unit", "");
		//left
		setInputValue(prefix + "_left", "");
		setInputValue(prefix + "_left_unit", "");
		// right
		setInputValue(prefix + "_right", "");
		setInputValue(prefix + "_right_unit", "");
		// bottom
		setInputValue(prefix + "_bottom", "");
		setInputValue(prefix + "_bottom_unit", "");

	}
	/**
	 * display the property value
	 */
	override private function load(element:HtmlDom) {
		var propertyModel = PropertyModel.getInstance();

		// top
		var value = propertyModel.getStyle(element, stylePrefix + topStyleSufix);
		if (value == null || value == ""){
			setInputValue(prefix + "_top", "");
			setInputValue(prefix + "_top_unit", "");
		}
		else{
			var options = getOptions(prefix + "_top_unit");
			for (idx in 0...options.length){
				// if the value ends with one of the units
				if (StringTools.endsWith(value, cast(options[idx]).value)){
					// case of a number + unit
					setInputValue(prefix + "_top", Std.string(Std.parseInt(value)));
					setInputValue(prefix + "_top_unit", cast(options[idx]).value);
				}
			}
		}
		// left
		var value = propertyModel.getStyle(element, stylePrefix + leftStyleSufix);
		if (value == null || value == ""){
			setInputValue(prefix + "_left", "");
			setInputValue(prefix + "_left_unit", "");
		}
		else{
			var options = getOptions(prefix + "_left_unit");
			for (idx in 0...options.length){
				// if the value ends with one of the units
				if (StringTools.endsWith(value, cast(options[idx]).value)){
					// case of a number + unit
					setInputValue(prefix + "_left", Std.string(Std.parseInt(value)));
					setInputValue(prefix + "_left_unit", cast(options[idx]).value);
				}
			}
		}
		// right
		var value = propertyModel.getStyle(element, stylePrefix + rightStyleSufix);
		if (value == null || value == ""){
			setInputValue(prefix + "_right", "");
			setInputValue(prefix + "_right_unit", "");
		}
		else{
			var options = getOptions(prefix + "_right_unit");
			for (idx in 0...options.length){
				// if the value ends with one of the units
				if (StringTools.endsWith(value, cast(options[idx]).value)){
					// case of a number + unit
					setInputValue(prefix + "_right", Std.string(Std.parseInt(value)));
					setInputValue(prefix + "_right_unit", cast(options[idx]).value);
				}
			}
		}
		// bottom
		var value = propertyModel.getStyle(element, stylePrefix + bottomStyleSufix);
		if (value == null || value == ""){
			setInputValue(prefix + "_bottom", "");
			setInputValue(prefix + "_bottom_unit", "");
		}
		else{
			var options = getOptions(prefix + "_bottom_unit");
			for (idx in 0...options.length){
				// if the value ends with one of the units
				if (StringTools.endsWith(value, cast(options[idx]).value)){
					// case of a number + unit
					setInputValue(prefix + "_bottom", Std.string(Std.parseInt(value)));
					setInputValue(prefix + "_bottom_unit", cast(options[idx]).value);
				}
			}
		}

	}
	/**
	 * apply the property value
	 */
	override private function apply() {
		var propertyModel = PropertyModel.getInstance();
trace("apply "+stylePrefix + topStyleSufix);
		// top
		var value:String = getInputValue(prefix + "_top");
		var unit:String = getInputValue(prefix + "_top_unit");
		propertyModel.setStyle(selectedItem, stylePrefix + topStyleSufix, value+unit);

		// left
		var value:String = getInputValue(prefix + "_left");
		var unit:String = getInputValue(prefix + "_left_unit");
		propertyModel.setStyle(selectedItem, stylePrefix + leftStyleSufix, value+unit);

		// right
		var value:String = getInputValue(prefix + "_right");
		var unit:String = getInputValue(prefix + "_right_unit");
		propertyModel.setStyle(selectedItem, stylePrefix + rightStyleSufix, value+unit);

		// bottom
		var value:String = getInputValue(prefix + "_bottom");
		var unit:String = getInputValue(prefix + "_bottom_unit");
		propertyModel.setStyle(selectedItem, stylePrefix + bottomStyleSufix, value+unit);

	}
}
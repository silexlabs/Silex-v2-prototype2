package silex.ui.toolbox.editor;

import silex.component.ComponentModel;
import silex.layer.LayerModel;
import silex.property.PropertyModel;

import js.Lib;
import js.Dom;

import brix.component.ui.DisplayObject;
import brix.util.DomTools;

/**
 * Editor for raw HTML input. data-attribute-name is not used since it is always used to edit the innerHTML attribute
 * Editors are Brix components, in charge of handling HTML input elements, 
 * in order to let the user enter values and edit css style values or tag attributes.
 * The name of the style or attribute is specifiyed as data-attribute-name or data-style-name
 * And the values are given as key/value pairs
 */
class HtmlEditor extends EditorBase 
{
	/**
	 * The css class name of the text area or text input used to input data
	 */
	public static inline var TEXT_INPUT_CLASS_NAME = "text-input";

	/**
	 * apply the property value
	 */
	override private function apply() {
		var textArea = DomTools.getSingleElement(rootElement, TEXT_INPUT_CLASS_NAME, true);
		var value = cast(textArea).value;
		PropertyModel.getInstance().setProperty(selectedItem, "innerHTML", value);
	}
	/**
	 * display the property value
	 */
	override private function load(element:HtmlDom) {
		var textArea = DomTools.getSingleElement(rootElement, TEXT_INPUT_CLASS_NAME, true);
		cast(textArea).value = element.innerHTML;
	}
	/**
	 * reset the values
	 */
	override private function reset() {
		var textArea = DomTools.getSingleElement(rootElement, TEXT_INPUT_CLASS_NAME, true);
		cast(textArea).value = "";
	}
}
package silex.ui.toolbox.editor;

import js.Lib;
import js.Dom;

import silex.property.PropertyModel;

/**
 * Editors are Brix components, in charge of editing the CSS types, 
 * This component ihandles boolean CSS properties. 
 * @see 	silex.ui.toolbox.editor.EditorBase
 */
class LengthEditor extends EditorBase
{
	/**
	 * input element
	 */
	private var inputElement : HtmlDom;
	/**
	 * input element
	 */
	private var unitElement : HtmlDom;
	/**
	 * Constructor
	 * get references to the inputs
	 */
	public function new(rootElement:HtmlDom, BrixId:String){
		super(rootElement, BrixId);
		var elements = rootElement.getElementsByTagName("input");
		inputElement = elements[0];
		var elements = rootElement.getElementsByTagName("select");
		unitElement = elements[0];
	}
	/**
	 * reset the values
	 * this method should be implemented in the derived class
	 */
	override private function reset() {
		cast(inputElement).value = "";
		cast(unitElement).value = "";
	}
	/**
	 * display the property value
	 * this method should be implemented in the derived class
	 */
	override private function load(element:HtmlDom) {
		var value:String = PropertyModel.getInstance().getStyle(element, propertyName);
		if (value == null || value == ""){
			cast(inputElement).value = value;
			cast(unitElement).value = value;
		}
		else{
			var options = unitElement.getElementsByTagName("option");
			for (idx in 0...options.length){
				// if the value ends with one of the units
				if (StringTools.endsWith(value, cast(options[idx]).value)){
					// case of a number + unit
					cast(inputElement).value = Std.string(Std.parseInt(value));
					cast(unitElement).value = cast(options[idx]).value;
				}
			}
		}
	}
	/**
	 * apply the property value
	 * this method should be implemented in the derived class
	 */
	override private function apply() {
		var value = cast(inputElement).value;
		var unit = cast(unitElement).value;
		if (value != "" && value != null && unit != "" && unit != null){
			PropertyModel.getInstance().setStyle(selectedItem, propertyName, value+unit);
		}
		else{
			PropertyModel.getInstance().setStyle(selectedItem, propertyName, null);
		}
	}
}
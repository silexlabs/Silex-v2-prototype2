package silex.ui.toolbox.editor;

import js.Lib;
import js.Dom;

import silex.property.PropertyModel;

/**
 * Editors are Brix components, in charge of editing the CSS types, 
 * This component ihandles boolean CSS properties. 
 * @see 	silex.ui.toolbox.editor.EditorBase
 */
class PercentageEditor extends EditorBase
{
	/**
	 * input element
	 */
	private var inputElement : HtmlDom;
	private var dataValue : String;
	/**
	 * Constructor
	 * get references to the inputs
	 */
	public function new(rootElement:HtmlDom, BrixId:String){
		super(rootElement, BrixId);
		var elements = rootElement.getElementsByTagName("input");
		inputElement = elements[0];
	}
	/**
	 * reset the values
	 * this method should be implemented in the derived class
	 */
	override private function reset() {
		cast(inputElement).value = "";
	}
	/**
	 * display the property value
	 * this method should be implemented in the derived class
	 */
	override private function load(element:HtmlDom) {
		var value:String = PropertyModel.getInstance().getStyle(element, propertyName);
		cast(inputElement).value = value;
	}
	/**
	 * apply the property value
	 * this method should be implemented in the derived class
	 */
	override private function apply() {
		var value = cast(inputElement).value;
		if (value != "" && value != null){
			PropertyModel.getInstance().setStyle(selectedItem, propertyName, value);
		}
		else{
			PropertyModel.getInstance().setStyle(selectedItem, propertyName, null);
		}
	}
}
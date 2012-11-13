package silex.ui.toolbox.editor;

import js.Lib;
import js.Dom;

import silex.property.PropertyModel;

/**
 * Editors are Brix components, in charge of editing the CSS types, 
 * This component ihandles boolean CSS properties. 
 * @see 	silex.ui.toolbox.editor.EditorBase
 */
class BoolEditor extends EditorBase
{
	/**
	 * check box input element
	 */
	private var inputElement : HtmlDom;
	/**
	 * value to be set as the style value
	 * comes from the option tag in the styles XML, and from the data-value attribute in the HTML (on root element)
	 */
	private var dataValue : String;
	/**
	 * Constructor
	 * get references to the inputs
	 */
	public function new(rootElement:HtmlDom, BrixId:String){
		super(rootElement, BrixId);
		var elements = rootElement.getElementsByTagName("input");
		inputElement = elements[0];
		dataValue = rootElement.getAttribute("data-value");
	}
	/**
	 * reset the values
	 * this method should be implemented in the derived class
	 */
	override private function reset() {
		cast(inputElement).checked = false;
	}
	/**
	 * display the property value
	 * this method should be implemented in the derived class
	 */
	override private function load(element:HtmlDom) {
		var value:String = PropertyModel.getInstance().getStyle(element, propertyName);
		if (value==dataValue){
			cast(inputElement).checked = true;
		}
		else{
			cast(inputElement).checked = false;
		}
	}
	/**
	 * apply the property value
	 * this method should be implemented in the derived class
	 */
	override private function apply() {
		if (cast(inputElement).checked == true){
			PropertyModel.getInstance().setStyle(selectedItem, propertyName, dataValue);
		}
		else{
			PropertyModel.getInstance().setStyle(selectedItem, propertyName, null);
		}
	}
}
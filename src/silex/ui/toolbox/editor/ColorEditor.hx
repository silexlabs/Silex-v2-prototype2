package silex.ui.toolbox.editor;

import js.Lib;
import js.Dom;

import silex.property.PropertyModel;

/**
 * Editors are Brix components, in charge of editing the CSS types, 
 * This component ihandles boolean CSS properties. 
 * @see 	silex.ui.toolbox.editor.EditorBase
 */
class ColorEditor extends EditorBase
{
	/**
	 * input element
	 */
	private var inputElement : HtmlDom;
	/**
	 * input element for the "transparent" check box
	 */
	private var checkElement : HtmlDom;
	/**
	 * Constructor
	 * get references to the inputs
	 */
	public function new(rootElement:HtmlDom, BrixId:String){
		super(rootElement, BrixId);
		var elements = rootElement.getElementsByTagName("input");
		inputElement = elements[0];

		var elements = rootElement.getElementsByTagName("input");
		checkElement = elements[1];
	}
	/**
	 * reset the values
	 * this method should be implemented in the derived class
	 */
	override private function reset() {
		cast(inputElement).value = "";
		cast(checkElement).checked = true;
	}
	/**
	 * display the property value
	 * this method should be implemented in the derived class
	 */
	override private function load(element:HtmlDom) {
		var value:String = PropertyModel.getInstance().getStyle(element, propertyName);
		if (value == null || value == ""){
			cast(inputElement).value = "";
			cast(checkElement).checked = true;
		}
		else{
			cast(checkElement).checked = false;
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
				cast(inputElement).value = "#"+StringTools.hex(decValue, 6);
			}else{
				cast(inputElement).value = value;
			}
		}

	}
	/**
	 * apply the property value
	 * this method should be implemented in the derived class
	 */
	override private function apply() {
		if (cast(checkElement).checked == true){
			PropertyModel.getInstance().setStyle(selectedItem, propertyName, null);
		}
		else{
			var value = cast(inputElement).value;
			if (value != "" && value != null){
				PropertyModel.getInstance().setStyle(selectedItem, propertyName, value);
			}
			else{
				PropertyModel.getInstance().setStyle(selectedItem, propertyName, null);
			}
		}
	}
}
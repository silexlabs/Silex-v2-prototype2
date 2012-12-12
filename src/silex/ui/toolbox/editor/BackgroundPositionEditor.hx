package silex.ui.toolbox.editor;

import js.Lib;
import js.Dom;

import silex.property.PropertyModel;

import brix.util.DomTools;

/**
 * Editors are Brix components, in charge of editing the CSS types, 
 * This component ihandles boolean CSS properties. 
 * @see 	silex.ui.toolbox.editor.EditorBase
 */
class BackgroundPositionEditor extends EditorBase
{
	/**
	 * input element
	 */
	private var keywordX : HtmlDom;
	private var lengthSelectX : HtmlDom;
	private var lengthInputX : HtmlDom;
	private var percentageX : HtmlDom;
	private var keywordY : HtmlDom;
	private var lengthSelectY : HtmlDom;
	private var lengthInputY : HtmlDom;
	private var percentageY : HtmlDom;
	/**
	 * Constructor
	 * get references to the inputs
	 */
	public function new(rootElement:HtmlDom, BrixId:String){
		super(rootElement, BrixId);

		keywordX = DomTools.getSingleElement(rootElement, "keyword-x");
		lengthSelectX = DomTools.getSingleElement(rootElement, "length-select-x");
		lengthInputX = DomTools.getSingleElement(rootElement, "length-input-x");
		percentageX = DomTools.getSingleElement(rootElement, "percentage-x");
		keywordY = DomTools.getSingleElement(rootElement, "keyword-y");
		lengthSelectY = DomTools.getSingleElement(rootElement, "length-select-y");
		lengthInputY = DomTools.getSingleElement(rootElement, "length-input-y");
		percentageY = DomTools.getSingleElement(rootElement, "percentage-y");
	}
	/**
	 * reset the values
	 * this method should be implemented in the derived class
	 */
	override private function reset() {
		cast(keywordX).value = "";
		cast(lengthSelectX).value = "";
		cast(lengthInputX).value = "";
		cast(percentageX).value = "";
		cast(keywordY).value = "";
		cast(lengthSelectY).value = "";
		cast(lengthInputY).value = "";
		cast(percentageY).value = "";
	}
	/**
	 * display the property value
	 * this method should be implemented in the derived class
	 */
	override private function load(element:HtmlDom) {
		reset();
		var value:String = PropertyModel.getInstance().getStyle(element, "background-position");
		value = StringTools.trim(value);
		if (value == "")
			return;

		var values = value.split(" ");
		// clean up emty spaces
		for (idx in 0...values.length){
			values[idx] = StringTools.trim(values[idx]);
		}
		while (values.remove("")){
		}
		if (values.length != 2){
			trace("Error: found a value of "+value+" for background-position, but could not split it in 2 parts for X and Y. Length is "+values.length);
			return;
		}
		// **
		// X position
		// keyword
		if(values[0] == "0%") values[0] = "left";
		if(values[0] == "50%") values[0] = "center";
		if(values[0] == "100%") values[0] = "right";
		if (values[0] == "left" || values[0] == "center" || values[0] == "right"){
			cast(keywordX).value = values[0];
		}
		// percent
		else if (StringTools.endsWith(values[0], "%")){
			cast(percentageX).value = values[0].substr(0,-1);
		}
		// length
		else {
			var options = lengthSelectX.getElementsByTagName("option");
			var unit = "";
			for (idx in 0...options.length){
				// if the value ends with one of the units
				if (StringTools.endsWith(values[0], cast(options[idx]).value)){
					// case of a number + unit
					cast(lengthInputX).value = Std.string(Std.parseInt(values[0]));
					// unit
					unit = cast(options[idx]).value;
					cast(lengthSelectX).value = unit;

					break;
				}
			}
		}
		// **
		// Y position
		// keyword
		if(values[1] == "0%") values[1] = "top";
		if(values[1] == "50%") values[1] = "center";
		if(values[1] == "100%") values[1] = "bottom";
		if (values[1] == "top" || values[1] == "center" || values[1] == "bottom"){
			cast(keywordY).value = values[1];
		}
		// percent
		else if (StringTools.endsWith(values[1], "%")){
			cast(percentageY).value = values[1].substr(0,-1);
		}
		// length
		else {
			var options = lengthSelectY.getElementsByTagName("option");
			var unit = "";
			for (idx in 0...options.length){
				// if the value ends with one of the units
				if (StringTools.endsWith(values[1], cast(options[idx]).value)){
					// case of a number + unit
					cast(lengthInputY).value = Std.string(Std.parseInt(values[1]));
					// unit
					unit = cast(options[idx]).value;
					cast(lengthSelectY).value = unit;

					break;
				}
			}
		}
	}
	/**
	 * apply the property value
	 * this method should be implemented in the derived class
	 */
	override private function apply() {
		// **
		// X position
		var valueX = "0%";
		// percent
		if (cast(percentageX).value != "" && cast(percentageX).value != null){
			valueX = cast(percentageX).value + "%";
		}
		// keyword
		else if (cast(keywordX).value != ""){
			valueX = cast(keywordX).value;
		}
		// length
		else if (cast(lengthInputX).value != ""){
			valueX = cast(lengthInputX).value;
			if (cast(lengthSelectX).value != ""){
				valueX+=cast(lengthSelectX).value;
			}
			else{
				valueX+="px";
			}
		}
		// **
		// Y position
		var valueY = "0%";
		// percent
		if (cast(percentageY).value != "" && cast(percentageY).value != null){
			valueY = cast(percentageY).value + "%";
		}
		// keyword
		else if (cast(keywordY).value != ""){
			valueY = cast(keywordY).value;
		}
		// length
		else if (cast(lengthInputY).value != ""){
			valueY = cast(lengthInputY).value;
			if (cast(lengthSelectY).value != ""){
				valueY+=cast(lengthSelectY).value;
			}
			else{
				valueY+="px";
			}
		}
		if (valueX != "0%" || valueY != "0%"){
			PropertyModel.getInstance().setStyle(selectedItem, "background-position", valueX + " " + valueY);
		}
		else{
			PropertyModel.getInstance().setStyle(selectedItem, "background-position", null);
		}
	}
}
package silex.ui.toolbox.editor;

import js.Lib;
import js.Dom;

import silex.property.PropertyModel;
import silex.ui.dialog.FileBrowserDialog;
import brix.util.DomTools;

/**
 * this editor handles single URL and multiple URL
 * This class handles the link with the FileBrowserDialog:
 * - opens the page file-browser-dialog when a button with class name select-file-button is clicked
 * - and calls this.selectFile to attach an event to retrieve the selected file
 * Editors are Brix components, in charge of editing the CSS types, 
 * This component ihandles boolean CSS properties. 
 * @see 	silex.ui.toolbox.editor.EditorBase
 */
class UrlEditor extends EditorBase
{
	/**
	 * class name for the "open media lib" buttons
	 * when clicked, it will automatically open the FB and link the returned URL to a text field
	 */ 
	public static inline var ADD_MULTIPLE_FILE_BROWSER_CLASS_NAME:String = "add-multiple-files-button";
	/**
	 * class name for the "open media lib" buttons
	 * when clicked, it will automatically open the FB and link the returned URL to a text field
	 */ 
	public static inline var OPEN_FILE_BROWSER_CLASS_NAME:String = "select-file-button";
	/**
	 * input element
	 */
	private var inputElement : HtmlDom;
	/**
	 * Constructor
	 * get references to the inputs
	 */
	public function new(rootElement:HtmlDom, BrixId:String){
		super(rootElement, BrixId);
		var elements = rootElement.getElementsByTagName("input");
		if (elements.length == 0)
			elements = rootElement.getElementsByTagName("textarea");
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

		// values is a list of "," separated elements which can be url('URL'), none or inherit
		var values:Array<String> = value.split(",");
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
				value = DomTools.abs2rel(value);
			}
			urls.push(value);
		}
		cast(inputElement).value = urls.join("\n");
	}
	/**
	 * apply the property value
	 * this method should be implemented in the derived class
	 */
	override private function apply() {
		var value = cast(inputElement).value;
		if (value != "" && value != null){
			// image
			var urls:Array<String> = value.split("\n");
			var res = "";
			for (entry in urls){
				if (StringTools.trim(entry) == "") continue;
				if (res != "") res += ", ";
				if (entry == "none" || entry == "inherit") {
					res += entry;
				}
				else{
					// convert into relative url
					res += "url('" + DomTools.abs2rel(entry) + "')";
				}
			}
			PropertyModel.getInstance().setStyle(selectedItem, propertyName, res);
		}
		else{
			PropertyModel.getInstance().setStyle(selectedItem, propertyName, null);
		}
	}

	/**
	 * callback for the click event, check if a dialog must be opened
	 */
	override private function onClick(e:Event) {
		super.onClick(e);
		if (DomTools.hasClass(e.target, ADD_MULTIPLE_FILE_BROWSER_CLASS_NAME)){
			e.preventDefault();
			var inputControlClassName = e.target.getAttribute("data-fb-target");
			var cbk = callback(onMultipleFilesChosen, inputControlClassName);
			FileBrowserDialog.selectMultipleFiles(cbk, brixInstanceId);
		}
		else if (DomTools.hasClass(e.target, OPEN_FILE_BROWSER_CLASS_NAME)){
			e.preventDefault();
			var inputControlClassName = e.target.getAttribute("data-fb-target");
			var cbk = callback(onFileChosen, inputControlClassName);
			FileBrowserDialog.selectFile(cbk, brixInstanceId);
		}
	}
	////////////////////////////////////////////
	// File Browser 
	////////////////////////////////////////////
	/**
	 * callback for the FileBrowserDialog
	 */
	private function onFileChosen(inputControlClassName:String, fileUrl:String){
		var inputElement = DomTools.getSingleElement(rootElement, inputControlClassName, true);
		cast(inputElement).value = FileBrowserDialog.getRelativeURLFromFileBrowser(fileUrl);

		beforeApply();
		try{
			apply();
		}
		catch(e:Dynamic){
			throw("Error in the implementation of the method apply: "+e);
		}
		afterApply();
		DomTools.doLater(refreshSelection);
	}
	/**
	 * callback for the FileBrowserDialog
	 */
	private function onMultipleFilesChosen(inputControlClassName:String, files:Array<String>){
		var inputElement = DomTools.getSingleElement(rootElement, inputControlClassName, true);
		var value = cast(inputElement).value;

		if (value != "") value += "\n";
		value = StringTools.replace(value, "none\n", "");

		// convert urls to relative
		for (sourceUrl in files){
			value += FileBrowserDialog.getRelativeURLFromFileBrowser(sourceUrl) + "\n";
		}
		// set the value in the text area
		cast(inputElement).value = value;

		// apply to the element
		beforeApply();
		try{
			apply();
		}
		catch(e:Dynamic){
			throw("Error in the implementation of the method apply: "+e);
		}
		afterApply();
		DomTools.doLater(refreshSelection);
	}
}
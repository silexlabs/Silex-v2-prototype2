package silex.ui.toolbox.editor;

import silex.component.ComponentModel;
import silex.layer.LayerModel;
import silex.property.PropertyModel;

import silex.ui.link.SilexLink;
import brix.component.navigation.link.LinkBase;

import js.Lib;
import js.Dom;

import brix.component.ui.DisplayObject;
import brix.util.DomTools;

/**
 * Editors are Brix components, in charge of editing the CSS types, 
 * This component ihandles boolean CSS properties. 
 * @see 	silex.ui.toolbox.editor.EditorBase
 */
class LinkEditorUrl extends EditorBase 
{
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
		// do nothing if the element is not a link
		if (!DomTools.hasClass(element, "SilexLink")){
			reset();
		}
		else{
			var value:String = PropertyModel.getInstance().getAttribute(element, LinkBase.CONFIG_PAGE_NAME_DATA_ATTR);
			if (SilexLink.isUrl(value)){
				cast(inputElement).value = value;
			}
			else{
				reset();
			}
		}
	}
	/**
	 * apply the property value
	 * this method should be implemented in the derived class
	 */
	override private function apply() {
		var value = cast(inputElement).value;
		if (value != "" && value != null){
			PropertyModel.getInstance().setAttribute(selectedItem, LinkBase.CONFIG_PAGE_NAME_DATA_ATTR, value);
			if(!DomTools.hasClass(selectedItem, "SilexLink")){
				// todo: init class
				DomTools.addClass(selectedItem, "SilexLink");
				PropertyModel.getInstance().addClass(selectedItem, "SilexLink");
			}
		}
		else{
			PropertyModel.getInstance().setAttribute(selectedItem, LinkBase.CONFIG_PAGE_NAME_DATA_ATTR, null);
			if(DomTools.hasClass(selectedItem, "SilexLink")){
				// todo: remove class
				DomTools.removeClass(selectedItem, "SilexLink");
				PropertyModel.getInstance().removeClass(selectedItem, "SilexLink");
			}
		}
	}
}
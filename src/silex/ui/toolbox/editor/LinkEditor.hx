package silex.ui.toolbox.editor;

import silex.property.PropertyModel;
import silex.component.ComponentModel;
import silex.layer.LayerModel;
import silex.file.FileModel;

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
class LinkEditor extends EditorBase 
{
	/**
	 * input element
	 */
	private var inputElement : HtmlDom;
	/**
	 * input element
	 */
	private var targetElement : HtmlDom;
	/**
	 * input element
	 */
	private var resetPageNameButton : HtmlDom;
	/**
	 * input element
	 */
	private var pageSelectElement : HtmlDom;
	/**
	 * Constructor
	 * get references to the inputs
	 */
	public function new(rootElement:HtmlDom, BrixId:String){
		super(rootElement, BrixId);
		var elements = rootElement.getElementsByTagName("input");
		inputElement = elements[0];
		var elements = rootElement.getElementsByTagName("select");
		targetElement = elements[0];
		var elements = rootElement.getElementsByTagName("button");
		resetPageNameButton = elements[0];
		var elements = rootElement.getElementsByTagName("select");
		pageSelectElement = elements[1];

		// events
		resetPageNameButton.addEventListener("click", resetPageNameSelector, true);
	}
	/** 
	 * reset the selection of a page, i.e. unselect a page in the drop downlink
	 */
	function resetPageNameSelector(e:Event){
		e.preventDefault();
		cast(pageSelectElement).selectedIndex = -1;
		apply();
	}
	/**
	 * reset the values
	 * this method should be implemented in the derived class
	 */
	override private function reset() {
		trace("reset "+targetElement);
		cast(inputElement).value = "";
		cast(targetElement).value = "";
		cast(pageSelectElement).selectedIndex = -1;
	}
	/**
	 * display the property value
	 * this method should be implemented in the derived class
	 */
	override private function load(element:HtmlDom) {
		trace("load "+targetElement);
		// do nothing if the element is not a link, or there is no file loaded
		if (!DomTools.hasClass(element, "SilexLink") || FileModel.getInstance().application == null){
			reset();
		}
		else{
			var value:String = PropertyModel.getInstance().getAttribute(element, LinkBase.CONFIG_PAGE_NAME_DATA_ATTR);
			if (SilexLink.isUrl(value)){
				cast(inputElement).value = value;
				// target
				var value:String = PropertyModel.getInstance().getAttribute(element, LinkBase.CONFIG_TARGET_ATTR);
				cast(targetElement).value = value;
			}
			else if (SilexLink.isPage(value, FileModel.getInstance().application.id)){
				cast(pageSelectElement).value = value;
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
		trace("apply "+targetElement);
		var value = cast(inputElement).value;
		if (value != "" && value != null){
			// there is a link to set
			ComponentModel.getInstance().makeLinkToPage(selectedItem, value);
			// target
			var value = cast(targetElement).value;
			PropertyModel.getInstance().setAttribute(selectedItem, LinkBase.CONFIG_TARGET_ATTR, value);
		}
		else if((value = cast(pageSelectElement).value) != ""){
			// internal page
			ComponentModel.getInstance().makeLinkToPage(selectedItem, value);
		}
		else{
			// no link
			ComponentModel.getInstance().resetLinkToPage(selectedItem);

			PropertyModel.getInstance().setAttribute(selectedItem, LinkBase.CONFIG_PAGE_NAME_DATA_ATTR, null);

			// target
			PropertyModel.getInstance().removeAttribute(selectedItem, LinkBase.CONFIG_TARGET_ATTR);
		}
	}
}
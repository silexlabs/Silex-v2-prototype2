package silex.ui.toolbox.editor;

import silex.property.PropertyModel;
import silex.property.TextEditor;
import silex.component.ComponentModel;
import silex.file.FileModel;
import silex.layer.LayerModel;
import silex.page.PageModel;

import js.Lib;
import js.Dom;

import brix.component.ui.DisplayObject;
import brix.util.DomTools;

/**
 * Editor for component properties, e.g. the URL of the image tag. 
 * Editors are Brix components, in charge of handling HTML input elements, 
 * in order to let the user enter values and edit css style values or tag attributes.
 */
class PropertyEditor extends UrlEditor 
{
	/**
	 * The css class name of the "edit text" button
	 */
	public static inline var OPEN_TEXT_EDITOR_CLASS_NAME = "property-editor-edit-text";
	/**
	 * class name expected for the button
	 */
	public static inline var DELETE_BUTTON_CLASS_NAME:String = "property-editor-delete-selected";
	/**
	 * Constructor
	 * Start listening the input events
	 */
	public function new(rootElement:HtmlDom, BrixId:String){
		super(rootElement, BrixId);
	}
	override private function onPropertyChange(e:CustomEvent) {
		trace("onPropertyChange "+propertyChangePending+" - "+e.detail.name+" - "+propertyName);
		if (propertyChangePending)
			return;
		refresh();
	}
	/**
	 * callback for toolbox events
	 * handle the click on delete button, remove the selection from model and view
	 */
	override private function onClick(e:Event) {
		super.onClick(e);
		// retrieve the node who triggered the event
		var target:HtmlDom = e.target;
		// remove the selection from model and view
		if (DomTools.hasClass(target, DELETE_BUTTON_CLASS_NAME)){
			
			e.preventDefault();
			if (DomTools.hasClass(selectedItem, "Layer")){
				var layer = LayerModel.getInstance().selectedItem;
				var page = PageModel.getInstance().selectedItem;
				var name:String = layer.rootElement.getAttribute(LayerModel.NAME_ATTRIBUTE_NAME);
				if (name == null) name = "";
				var confirm = Lib.window.confirm("I am about to delete the container "+name+". Are you sure?");
				if (confirm == true)
					LayerModel.getInstance().removeLayer(layer, page.name);
			}
			else{
				var name:String = selectedItem.getAttribute(ComponentModel.NAME_ATTRIBUTE_NAME);
				if (name == null) name = "";
				var confirm = Lib.window.confirm("I am about to delete the component "+name+". Are you sure?");
				if (confirm == true)
					ComponentModel.getInstance().removeComponent(selectedItem);
			}
		}
		else if (DomTools.hasClass(e.target, OPEN_TEXT_EDITOR_CLASS_NAME)){
			// prevent default button behaviour
			e.preventDefault();
			// open the text editor page
			TextEditor.openTextEditor(callback(onTextEditorChange, selectedItem), selectedItem.innerHTML, brixInstanceId);
		}
	}
	////////////////////////////////////////////
	// Text Editor 
	////////////////////////////////////////////
	/**
	 * callback for the TextEditorDialog
	 */
	private function onTextEditorChange(item:HtmlDom, htmlText:String){
		PropertyModel.getInstance().setProperty(item, "innerHTML", htmlText);
	}
	////////////////////////////////////////////
	// Load, apply and reset: display or apply the properties of the selected HTML dom element
	////////////////////////////////////////////
	/**
	 * reset the values
	 */
	override private function reset() {
		trace("reset");
		// 
		// font family
		setInputValue("name-property", "");
		setInputValue("title-property", "");
		setInputValue("alt-property", "");
		setInputValue("multiple-src-property", "");
		setInputValue("src-property", "");
		setInputValue("auto-start-property", null, "checked");
		setInputValue("controls-property", null, "checked");
		setInputValue("loop-property", null, "checked");
		setInputValue("master-property", null, "checked");
	}
	/**
	 * display the property value
	 */
	override private function load(element:HtmlDom) {
		trace("load");

		var propertyModel = PropertyModel.getInstance();

		var value = propertyModel.getAttribute(element, LayerModel.NAME_ATTRIBUTE_NAME);
		if (value != null) setInputValue("name-property", value);

		var value = propertyModel.getAttribute(element, "title");
		if (value != null) setInputValue("title-property", value);

		var value = propertyModel.getAttribute(element, "alt");
		if (value != null) setInputValue("alt-property", value);

		var value = propertyModel.getProperty(element, "src");
		if (value != null) setInputValue("src-property", DomTools.abs2rel(value));
		else setInputValue("src-property", "");

		var sources = FileModel.getInstance().getModelFromView(element).getElementsByTagName("source");
		var value = "";
		for (idx in 0...sources.length){
			value += DomTools.abs2rel(cast(sources[idx]).src) + "\n";
		}
		setInputValue("multiple-src-property", value);

		var value:Bool = propertyModel.getProperty(element, "autoplay");
		if (value == null || value == false) 
			setInputValue("auto-start-property", null, "checked");
		else
			setInputValue("auto-start-property", "checked", "checked");

		var value:Bool = propertyModel.getProperty(element, "loop");
		if (value == null || value == false) 
			setInputValue("loop-property", null, "checked");
		else
			setInputValue("loop-property", "checked", "checked");

		var value:Bool = propertyModel.getProperty(element, "controls");
		if (value == null || value == false) 
			setInputValue("controls-property", null, "checked");
		else
			setInputValue("controls-property", "checked", "checked");

		var value:Bool = propertyModel.getAttribute(element, LayerModel.MASTER_PROPERTY_NAME);
		if (value == null || value == false) 
			setInputValue("master-property", null, "checked");
		else
			setInputValue("master-property", "checked", "checked");
	}
	/**
	 * apply the property value
	 */
	override private function apply() {
		var propertyModel = PropertyModel.getInstance();

		var value = getInputValue("name-property");
		if (value != null && value != "")
			propertyModel.setAttribute(selectedItem, LayerModel.NAME_ATTRIBUTE_NAME, getInputValue("name-property"));
		else
			propertyModel.setAttribute(selectedItem, LayerModel.NAME_ATTRIBUTE_NAME, null);

		var value = getInputValue("title-property");
		if (value != null && value != "")
			propertyModel.setAttribute(selectedItem, "title", getInputValue("title-property"));
		else
			propertyModel.setAttribute(selectedItem, "title", null);

		var value = getInputValue("alt-property");
		if (value != null && value != "")
			propertyModel.setAttribute(selectedItem, "alt", getInputValue("alt-property"));
		else
			propertyModel.setAttribute(selectedItem, "alt", null);

		var value = getInputValue("src-property");
		if (value != null && value != "") propertyModel.setProperty(selectedItem, "src", DomTools.abs2rel(value));
		else if (Reflect.hasField(selectedItem, "src")){
			// only if the attribute is defined 
			// otherwise it may be on a node of type audio or video, which has no src attribute
			propertyModel.setProperty(selectedItem, "src", "");
		}
		trace("apply "+DomTools.abs2rel(value));

		var modelHtmlDom = FileModel.getInstance().getModelFromView(selectedItem);
		var sources = modelHtmlDom.getElementsByTagName("source");
		for (idx in 0...sources.length){
			// always take "0" element because this remove an item from sources 
			sources[0].parentNode.removeChild(sources[0]);
		}
		var sources = selectedItem.getElementsByTagName("source");
		for (idx in 0...sources.length){
			// always take "0" element because this remove an item from sources 
			sources[0].parentNode.removeChild(sources[0]);
		}
		var value:String = getInputValue("multiple-src-property");
		if (value != null){
			var urls = value.split("\n");
			for (sourceUrl in urls){
				if (sourceUrl != ""){
					var sourceElement = Lib.document.createElement("source");
					cast(sourceElement).src = DomTools.abs2rel(sourceUrl);
					modelHtmlDom.appendChild(sourceElement);
					var sourceElement = Lib.document.createElement("source");
					cast(sourceElement).src = DomTools.abs2rel(sourceUrl);
					selectedItem.appendChild(sourceElement);
				}
			}
		}

		var value:Bool = getInputValue("auto-start-property", "checked");
		if (value == true)
			propertyModel.setProperty(selectedItem, "autoplay", "autoplay");
		else
			propertyModel.setProperty(selectedItem, "autoplay", null);

		var value:Bool = getInputValue("controls-property", "checked");
		if (value == true)
			propertyModel.setProperty(selectedItem, "controls", "controls");
		else
			propertyModel.setProperty(selectedItem, "controls", null);

		var value:Bool = getInputValue("loop-property", "checked");
		if (value == true)
			propertyModel.setProperty(selectedItem, "loop", "loop");
		else
			propertyModel.setProperty(selectedItem, "loop", null);

		var value:Bool = getInputValue("master-property", "checked");
		if (value == true)
			propertyModel.setAttribute(selectedItem, "data-master", "true");
		else
			propertyModel.setAttribute(selectedItem, "data-master", null);
	}
}
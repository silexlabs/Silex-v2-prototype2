package silex.ui.toolbox.editor;

import silex.property.PropertyModel;
import silex.component.ComponentModel;
import silex.publication.PublicationModel;
import silex.layer.LayerModel;
import silex.page.PageModel;

import js.Lib;
import js.Dom;

import brix.component.ui.DisplayObject;
import brix.component.navigation.Layer;
import brix.util.DomTools;

/**
 * Editor for component properties, e.g. the URL of the image tag. 
 * Editors are Brix components, in charge of handling HTML input elements, 
 * in order to let the user enter values and edit css style values or tag attributes.
 */
class PropertyEditor extends EditorBase 
{
	public static inline var ALL_CONTEXTS = ["context-video", "context-audio", "context-img", "context-layer", "context-div"];
	/**
	 * class name expected for the button
	 */
	public static inline var DELETE_BUTTON_CLASS_NAME:String = "property-editor-delete-selected";
	/**
	 * Stores the style node with the current context as visible 
	 */
	private static var styleSheet:HtmlDom;
	/**
	 * Constructor
	 * Start listening the input events
	 */
	public function new(rootElement:HtmlDom, BrixId:String){
		super(rootElement, BrixId);
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
				var name:String = layer.rootElement.getAttribute("title");
				if (name == null) name = "";
				var confirm = Lib.window.confirm("I am about to delete the container "+name+". Are you sure?");
				if (confirm == true)
					LayerModel.getInstance().removeLayer(layer, page.name);
			}
			else{
				var name:String = selectedItem.getAttribute("title");
				if (name == null) name = "";
				var confirm = Lib.window.confirm("I am about to delete the component "+name+". Are you sure?");
				if (confirm == true)
					ComponentModel.getInstance().removeComponent(selectedItem);
			}
		}
	}
	/**
	 * reset the values
	 */
	override private function reset() {
		// 
		// font family
		setInputValue("name-property", "");
		setInputValue("multiple-src-property", "");
		setInputValue("src-property", "");
		setInputValue("auto-start-property", null, "checked");
		setInputValue("controls-property", null, "checked");
		setInputValue("loop-property", null, "checked");
		setInputValue("master-property", null, "checked");
		updateContext([]);

	}
	public function updateContext(contextArray:Array<String>){
		// handle the context
		if (styleSheet != null){
			Lib.document.getElementsByTagName("head")[0].removeChild(cast(styleSheet));	
		}
		var cssText = "";
		for (context in ALL_CONTEXTS){
			cssText += "."+context+" { display : none; visibility : hidden; } ";
		}
		for (context in contextArray){
			cssText += "."+context+" { display : inline; visibility : visible; } ";
		}
		// 
		styleSheet = DomTools.addCssRules(cssText);
	}
	/**
	 * display the property value
	 */
	override private function load(element:HtmlDom) {
		

		// handle the context
		var contextArray = [];
		if (DomTools.hasClass(element, "Layer")){
			contextArray.push("context-layer");
		}
		else{
			switch (element.nodeName.toLowerCase()) {
				case "audio":
					contextArray.push("context-audio");
				case "video":
					contextArray.push("context-video");
				case "img":
					contextArray.push("context-img");
				case "div":
					contextArray.push("context-div");
			}
		}
		updateContext(contextArray);

		var propertyModel = PropertyModel.getInstance();

		var value = propertyModel.getProperty(element, "title");
		if (value != null) setInputValue("name-property", value);

		var value = propertyModel.getProperty(element, "src");
		if (value != null) setInputValue("src-property", abs2rel(value));
		else setInputValue("src-property", "");

		var sources = PublicationModel.getInstance().getModelFromView(element).getElementsByTagName("source");
		var value = "";
		for (idx in 0...sources.length){
			value += abs2rel(cast(sources[idx]).src) + "\n";
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
		// 
		var propertyModel = PropertyModel.getInstance();

		var value = getInputValue("name-property");
		if (value != null && value != "")
			propertyModel.setProperty(selectedItem, "title", getInputValue("name-property"));
		else
			propertyModel.setProperty(selectedItem, "title", null);

		var value = getInputValue("src-property");
		if (value != null && value != "") propertyModel.setProperty(selectedItem, "src", abs2rel(value));
		else if (Reflect.hasField(selectedItem, "src")){
			// only if the attrivute is defined 
			// otherwise it my be on a node of type audio or video, which has no src attribute
			propertyModel.setProperty(selectedItem, "src", "");
		}

		var modelHtmlDom = PublicationModel.getInstance().getModelFromView(selectedItem);
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
					cast(sourceElement).src = abs2rel(sourceUrl);
					modelHtmlDom.appendChild(sourceElement);
					var sourceElement = Lib.document.createElement("source");
					cast(sourceElement).src = abs2rel(sourceUrl);
					selectedItem.appendChild(sourceElement);
				}
			}
		}

		var value:Bool = getInputValue("auto-start-property", "checked");
		propertyModel.setProperty(selectedItem, "autoplay", value);

		var value:Bool = getInputValue("controls-property", "checked");
		propertyModel.setProperty(selectedItem, "controls", value);

		var value:Bool = getInputValue("loop-property", "checked");
		propertyModel.setProperty(selectedItem, "loop", value);

		var value:Bool = getInputValue("master-property", "checked");
		if (value == true)
			propertyModel.setAttribute(selectedItem, "data-master", "true");
		else
			propertyModel.setAttribute(selectedItem, "data-master", null);
	}
}
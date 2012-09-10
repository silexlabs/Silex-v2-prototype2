package silex.ui.toolbox.editor;

import silex.property.PropertyModel;
import silex.component.ComponentModel;
import silex.layer.LayerModel;

import js.Lib;
import js.Dom;

import org.slplayer.component.ui.DisplayObject;
import org.slplayer.util.DomTools;

/**
 * Editor for component properties, e.g. the URL of the image tag. 
 * Editors are SLPlayer components, in charge of handling HTML input elements, 
 * in order to let the user enter values and edit css style values or tag attributes.
 */
@tagNameFilter("fieldset div")
class PropertyEditor extends EditorBase 
{
	public static inline var ALL_CONTEXTS = ["context-video", "context-audio", "context-img", "context-txt", "context-layer", "context-div"];
	/**
	 * Constructor
	 * Start listening the input events
	 */
	public function new(rootElement:HtmlDom, SLPId:String){
		super(rootElement, SLPId);
	}
	/**
	 * Stores the style node with the current context as visible 
	 */
	private static var styleSheet:HtmlDom;
	/**
	 * reset the values
	 */
	override private function reset() {
		// trace("reset ");
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
		// trace("cssText="+cssText);
		styleSheet = DomTools.addCssRules(cssText);
	}
	/**
	 * display the property value
	 */
	override private function load(element:HtmlDom) {
		// trace("load "+element);

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
				case "p":
					contextArray.push("context-txt");
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

		var sources = propertyModel.getModel(element).getElementsByTagName("source");
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

		var value:Bool = propertyModel.getProperty(element, "master");
		if (value == null || value == false) 
			setInputValue("master-property", null, "checked");
		else
			setInputValue("master-property", "checked", "checked");
	}
	/**
	 * apply the property value
	 */
	override private function apply() {
		// trace("TextStyleEditor apply "+selectedItem);
		var propertyModel = PropertyModel.getInstance();

		var value = getInputValue("name-property");
		if (value != null)
			propertyModel.setProperty(selectedItem, "title", getInputValue("name-property"));

		var value = getInputValue("src-property");
		if (value != null)
			propertyModel.setProperty(selectedItem, "src", abs2rel(value));

		var modelHtmlDom = propertyModel.getModel(selectedItem);
		var sources = modelHtmlDom.getElementsByTagName("source");
		for (idx in 0...sources.length){
			try{
				modelHtmlDom.removeChild(sources[idx]);
			}catch(e:Dynamic){
				trace("Warning: could not delete node in the model ("+e+")");
			}
		}
		var sources = selectedItem.getElementsByTagName("source");
		for (idx in 0...sources.length){
			try{
				selectedItem.removeChild(sources[idx]);
			}catch(e:Dynamic){
				trace("Warning: could not delete node in the view ("+e+")");
			}
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
		propertyModel.setProperty(selectedItem, "master", value);
	}
}
package silex.ui.toolbox;

import js.Lib;
import js.Dom;

import silex.page.PageModel;
import silex.layer.LayerModel;
import silex.component.ComponentModel;

import org.slplayer.util.DomTools;

/**
 * This component displays the items which the user can add to the stage
 */
@tagNameFilter("div")
class InsertToolbox extends ToolboxBase 
{
	/**
	 * class name expected for the add page button
	 */
	public static inline var ADD_BUTTON_CLASS_NAME:String = "add-button";
	/**
	 * type of item to be added in a layer
	 * this type can be added as a class name of the items of the list of elements of the insert toolbox
	 */
	public static inline var IMAGE_TYPE:String = "image";
	/**
	 * type of item to be added in a layer
	 * this type can be added as a class name of the items of the list of elements of the insert toolbox
	 */
	public static inline var TEXT_TYPE:String = "text";
	/**
	 * type of item to be added in a layer
	 * this type can be added as a class name of the items of the list of elements of the insert toolbox
	 */
	public static inline var LAYER_TYPE:String = "layer";
	/**
	 * type of item to be added in a layer
	 * this type can be added as a class name of the items of the list of elements of the insert toolbox
	 */
	public static inline var AUDIO_TYPE:String = "audio";
	/**
	 * type of item to be added in a layer
	 * this type can be added as a class name of the items of the list of elements of the insert toolbox
	 */
	public static inline var VIDEO_TYPE:String = "video";
	/**
	 * store the type of the list selected item
	 */
	private var selectedType:String;

	/**
	 * Constructor
	 * Start listening the input events
	 */
	public function new(rootElement:HtmlDom, SLPId:String)
	{
		super(rootElement, SLPId);
		// listen to the input event
		rootElement.addEventListener("click", onClick, true);
	}
	/**
	 * callback for toolbox events
	 */
	public function onClick(e:Event) {
		trace("onClick "+e.target.className);
		// retrieve the node who triggered the event
		var target:HtmlDom = e.target;
		// handle the change event
		if (DomTools.hasClass(e.target, IMAGE_TYPE))
			selectedType = IMAGE_TYPE;
		else if (DomTools.hasClass(e.target, TEXT_TYPE))
			selectedType = TEXT_TYPE;
		else if (DomTools.hasClass(e.target, LAYER_TYPE))
			selectedType = LAYER_TYPE;
		else if (DomTools.hasClass(e.target, AUDIO_TYPE))
			selectedType = AUDIO_TYPE;
		else if (DomTools.hasClass(e.target, VIDEO_TYPE))
			selectedType = VIDEO_TYPE;
		else if (DomTools.hasClass(e.target, ADD_BUTTON_CLASS_NAME))
			doAdd(selectedType);
	}
	/**
	 * The add button was pressed, add an element in the selected layer
	 */
	public function doAdd(selectedType:String) {
		switch (selectedType) {
			case LAYER_TYPE:
				LayerModel.getInstance().addLayer(PageModel.getInstance().selectedItem);
			case IMAGE_TYPE:
				addComponent("img").setAttribute("src", "enter image url here");
			case TEXT_TYPE:
				addComponent("p").innerHTML = "Insert text here.";
			case AUDIO_TYPE:
				var element = addComponent("audio");
				element.innerHTML = "<source>enter media url here</source>";
				element.setAttribute("controls", "controls");
			case VIDEO_TYPE:
				var element = addComponent("video");
				element.innerHTML = "<source>enter media url here</source>";
				element.setAttribute("controls", "controls");
		}
	}
	/**
	 * add an element in the selected layer
	 */
	public function addComponent(nodeName:String):HtmlDom {
		var layer = LayerModel.getInstance().selectedItem;
		if (layer == null)
			throw("Error: No selected layer. Could not add "+nodeName+" to the layer.");
		return ComponentModel.getInstance().addComponent(nodeName, layer);
	}
}
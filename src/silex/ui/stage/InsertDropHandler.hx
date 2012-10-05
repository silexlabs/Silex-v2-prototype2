package silex.ui.stage;

import js.Lib;
import js.Dom;

import brix.component.ui.DisplayObject;
import brix.util.DomTools;
import brix.component.navigation.Layer;
import brix.component.navigation.Page;
import brix.component.interaction.Draggable;
import silex.page.PageModel;
import silex.layer.LayerModel;
import silex.publication.PublicationModel;
import silex.component.ComponentModel;

/**
 * Selection markers are selection rectangles put over the selection, 
 * i.e. on top of the selected layer or component on the stage
 * This class uses from draggable and adds the behavior of moving the layers and components.
 * use attribute like rthis: data-dropzones-class-name="Layer" data-dropzones-class-name="silex-view"
 * use with Draggable on the same node
 */
class InsertDropHandler extends StageDropHandler{
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
	 * constructor
	 * listen to the Draggable class events
	 */
	public function new(rootElement:HtmlDom, BrixId:String){
		super(rootElement, BrixId);
	}
	/**
	 * virtual method to be implemented in derived classes
	 */
	override private function setDraggedElement(draggableEvent:DraggableEvent) {
		trace("setDraggedElement "+draggableEvent);
	}
	/**
	 * virtual method to be implemented in derived classes
	 */
	override private function getDraggedElement(draggableEvent:DraggableEvent):HtmlDom {
		return null;
	}
	/**
	 * Handle Draggable events
	 */
	override public function onDrag(e:Event) {
		trace("onDrag "+e);
		super.onDrag(e);
		var event:CustomEvent = cast(e);
		event.detail.draggable.groupElement = PublicationModel.getInstance().viewHtmlDom.parentNode;
	}
	/**
	 * Handle Draggable events
	 */
	override public function onDrop(e:Event) {
		trace("onDrop "+e);
		super.onDrop(e);

		// retrieve a reference to the component or layer
		var event:CustomEvent = cast(e);
		var dropZone:DropZone = event.detail.dropZone;

		// add the desired element
		if (dropZone != null){
			if (DomTools.hasClass(rootElement, IMAGE_TYPE))
				addComponent(dropZone, "img").setAttribute("src", "enter image url here");
			else if (DomTools.hasClass(rootElement, TEXT_TYPE))
				addComponent(dropZone, "p").innerHTML = "Insert text here.";
			else if (DomTools.hasClass(rootElement, AUDIO_TYPE)){
				var element = addComponent(dropZone, "audio");
				element.innerHTML = "<source>enter media url here</source>";
				element.setAttribute("controls", "controls");
			}
			else if (DomTools.hasClass(rootElement, VIDEO_TYPE)){
				var element = addComponent(dropZone, "video");
				element.innerHTML = "<source>enter media url here</source>";
				element.setAttribute("controls", "controls");
			}
			else if (DomTools.hasClass(rootElement, LAYER_TYPE)){
				addLayer(dropZone, PageModel.getInstance().selectedItem);
			}
		}
		else{
			trace("onDrop - a drop zone was NOT found");
		}
	}
	/**
	 * add an element in the layer
	 */
	public function addComponent(dropZone:DropZone, nodeName:String):HtmlDom {
		// trace("addComponent "+dropZone+", "+nodeName);
		var layers = PublicationModel.getInstance().application.getAssociatedComponents(dropZone.parent, Layer);
		if (layers.length != 1){
			throw("Error: search for the layer gave "+layers.length+" results");
		}
		return ComponentModel.getInstance().addComponent(nodeName, layers.first(), dropZone.position);
	}
	/**
	 * add a layer to the current page
	 */
	public function addLayer(dropZone:DropZone, page:Page) {
		// trace("addLayer "+page.name);
		if (page == null)
			throw("Error: No selected page. Could not add a layer to the page "+page.name+".");

		LayerModel.getInstance().addLayer(page, Lib.window.prompt("I need a name for your new container please."), dropZone.position);
	}
}

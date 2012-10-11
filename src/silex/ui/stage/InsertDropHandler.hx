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
import silex.property.PropertyModel;

/**
 * Selection markers are selection rectangles put over the selection, 
 * i.e. on top of the selected layer or component on the stage
 * This class uses from draggable and adds the behavior of moving the layers and components.
 * use attribute like rthis: data-dropzones-class-name="Layer" data-dropzones-class-name="silex-view"
 * use with Draggable on the same node
 */
class InsertDropHandler extends DropHandlerBase{
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
	public static inline var LAYER_TYPE:String = "container";
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
		super.onDrag(e);
		var event:CustomEvent = cast(e);
		event.detail.draggable.groupElement = PublicationModel.getInstance().viewHtmlDom.parentNode;
	}
	/**
	 * Handle Draggable events
	 */
	override public function onDrop(e:Event) {
		super.onDrop(e);

		// retrieve a reference to the component or layer
		var event:CustomEvent = cast(e);
		var dropZone:DropZone = event.detail.dropZone;

		// add the desired element
		if (dropZone != null){
			if (DomTools.hasClass(rootElement, IMAGE_TYPE)){
				var element = addComponent(dropZone, "img");
				PropertyModel.getInstance().setAttribute(element, "src", "enter image url here");
				PropertyModel.getInstance().setAttribute(element, "title", "New image component");
			}
			else if (DomTools.hasClass(rootElement, TEXT_TYPE)){
				var element = addComponent(dropZone, "div");
				PropertyModel.getInstance().setAttribute(element, "title", "New text field");
				PropertyModel.getInstance().setProperty(element, "innerHTML", "<p>Insert text here.</p>");
			}
			else if (DomTools.hasClass(rootElement, AUDIO_TYPE)){
				var element = addComponent(dropZone, "audio");
				DomTools.doLater(callback(initMediaComp, element));
			}
			else if (DomTools.hasClass(rootElement, VIDEO_TYPE)){
				var element = addComponent(dropZone, "video");
				DomTools.doLater(callback(initMediaComp, element));
			}
			else if (DomTools.hasClass(rootElement, LAYER_TYPE)){
				var element = addLayer(dropZone, PageModel.getInstance().selectedItem).rootElement;
				PropertyModel.getInstance().setAttribute(element, "title", "New container");
			}
		}
		else{
			trace("onDrop - a drop zone was NOT found");
		}
	}
	/**
	 * init an audio or video tag
	 */
	public function initMediaComp(element:HtmlDom){
		PropertyModel.getInstance().setAttribute(element, "controls", "controls");
		PropertyModel.getInstance().setAttribute(element, "title", "New media component");
		PropertyModel.getInstance().setStyle(element, "width", "New media component");
		element.innerHTML = "<source>enter-urls-here</source>";
	}
	/**
	 * add an element in the layer
	 */
	public function addComponent(dropZone:DropZone, nodeName:String):HtmlDom {
		var layers = PublicationModel.getInstance().application.getAssociatedComponents(dropZone.parent, Layer);
		if (layers.length != 1){
			throw("Error: search for the layer gave "+layers.length+" results");
		}
		return ComponentModel.getInstance().addComponent(nodeName, layers.first(), dropZone.position);
	}
	/**
	 * add a layer to the current page
	 */
	public function addLayer(dropZone:DropZone, page:Page):Layer {
		if (page == null)
			throw("Error: No selected page. Could not add a layer to the page "+page.name+".");

		return LayerModel.getInstance().addLayer(page, "", dropZone.position);
	}
}

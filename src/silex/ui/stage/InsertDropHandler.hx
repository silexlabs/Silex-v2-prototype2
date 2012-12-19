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
import silex.file.FileModel;
import silex.component.ComponentModel;
import silex.property.PropertyModel;
import silex.ui.dialog.FileBrowserDialog;

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
	 * clone of the dragged element, stays in the list while the element is dragged
	 */
	private var listElementClone:HtmlDom;
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
		// clone of the dragged element 
		listElementClone = draggableEvent.target.cloneNode(true);
		listElementClone.className = draggableEvent.target.className;
		listElementClone.style.position = null;
		
		// leave the clone in the list
		draggableEvent.target.parentNode.insertBefore(listElementClone, draggableEvent.target);
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
		event.detail.draggable.groupElement = FileModel.getInstance().currentData.viewHtmlDom.parentNode;
	}
	/**
	 * reset dragged element
	 */
	override private function resetDraggedMarker(){
		// delete the clone of the dragged element in the list
		listElementClone.parentNode.removeChild(listElementClone);
		listElementClone = null;

		// default behavior
		super.resetDraggedMarker();
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
		var element : HtmlDom;
		if (dropZone != null){
			if (DomTools.hasClass(rootElement, IMAGE_TYPE)){
				element = addComponent(dropZone, "img");
				//PropertyModel.getInstance().setAttribute(element, "src", "enter image url here");
				PropertyModel.getInstance().setAttribute(element, "data-silex-name", "New image component");
				DomTools.doLater(callback(initImageComp, element));
			}
			else if (DomTools.hasClass(rootElement, TEXT_TYPE)){
				element = addComponent(dropZone, "div");
				PropertyModel.getInstance().setAttribute(element, "data-silex-name", "New text field");
				PropertyModel.getInstance().setProperty(element, "innerHTML", "<p>Insert text here.</p>");
			}
			else if (DomTools.hasClass(rootElement, AUDIO_TYPE)){
				element = addComponent(dropZone, "audio");
				PropertyModel.getInstance().setAttribute(element, "data-silex-name", "New media component");
				DomTools.doLater(callback(initMediaComp, element));
			}
			else if (DomTools.hasClass(rootElement, VIDEO_TYPE)){
				element = addComponent(dropZone, "video");
				PropertyModel.getInstance().setAttribute(element, "data-silex-name", "New media component");
				DomTools.doLater(callback(initMediaComp, element));
			}
			else if (DomTools.hasClass(rootElement, LAYER_TYPE)){
				element = addLayer(dropZone, PageModel.getInstance().selectedItem).rootElement;
				PropertyModel.getInstance().setAttribute(element, "data-silex-name", "New container");
			}
			else {
				throw("unknown element has been drop on stage from the insert menu");
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
		// select the element
		ComponentModel.getInstance().selectedItem = element;

		// open the browse library dialog
		var cbk = callback(onMultipleFilesChosen, element);
		FileBrowserDialog.selectMultipleFiles(cbk, brixInstanceId, null, "files/assets/");
	}
	/**
	 * callback for the FileBrowserDialog
	 */
	private function onMultipleFilesChosen(element:HtmlDom, files:Array<String>){
		trace("onMultipleFilesChosen "+files);

		PropertyModel.getInstance().setAttribute(element, "controls", "controls");
		
		var modelHtmlDom = FileModel.getInstance().getModelFromView(element);

		for (sourceUrl in files){
			var sourceElement = Lib.document.createElement("source");
			cast(sourceElement).src = FileBrowserDialog.getRelativeURLFromFileBrowser(sourceUrl);
			modelHtmlDom.appendChild(sourceElement);
			var sourceElement = Lib.document.createElement("source");
			cast(sourceElement).src = FileBrowserDialog.getRelativeURLFromFileBrowser(sourceUrl);
			element.appendChild(sourceElement);
		}
	}
	/**
	 * init an img tag
	 */
	public function initImageComp(element:HtmlDom){
		// select the element
		ComponentModel.getInstance().selectedItem = element;

		// open the browse library dialog
		var cbk = callback(onFileChosen, element);
		FileBrowserDialog.selectFile(cbk, brixInstanceId, null, "files/assets/");
	}
	/**
	 * callback for the FileBrowserDialog
	 */
	private function onFileChosen(element:HtmlDom, fileUrl:String){
		trace("onFileChosen "+fileUrl);
		PropertyModel.getInstance().setAttribute(element, "src", FileBrowserDialog.getRelativeURLFromFileBrowser(fileUrl));
	}
	/**
	 * add an element in the layer
	 */
	public function addComponent(dropZone:DropZone, nodeName:String):HtmlDom {
		var layers = FileModel.getInstance().application.getAssociatedComponents(dropZone.parent, Layer);
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
			throw("Error: No selected page. Could not add a layer.");

		return LayerModel.getInstance().addLayer(page.name, "", dropZone.position);
	}
}

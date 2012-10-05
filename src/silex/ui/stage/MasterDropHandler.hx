package silex.ui.stage;

import js.Lib;
import js.Dom;

import brix.component.ui.DisplayObject;
import brix.util.DomTools;
import brix.component.navigation.Layer;
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
class MasterDropHandler extends StageDropHandler{
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
	override public function onDrop(e:Event) {
		trace("onDrop "+e);
		super.onDrop(e);
		var event:CustomEvent = cast(e);
		DomTools.doLater(addLayer);
	}
	private function addLayer(){
		trace("addLayer "+LayerModel.getInstance().selectedItem);
		var layer = LayerModel.getInstance().selectedItem;
		var page = PageModel.getInstance().selectedItem;
		LayerModel.getInstance().addMaster(layer, page);
	}
}

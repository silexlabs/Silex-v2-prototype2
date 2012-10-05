package silex.ui.stage;

import js.Lib;
import js.Dom;

import brix.component.ui.DisplayObject;
import brix.util.DomTools;
import brix.component.navigation.Layer;
import brix.component.interaction.Draggable;
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
@tagNameFilter("DIV")
class SelectionMarker extends StageDropHandler{
	/**
	 * selected component
	 * store a component while dragging
	 */ 
	private static var draggedComponent:HtmlDom;
	/**
	 * selected layer
	 * store a layer while dragging
	 */ 
	private static var draggedLayer:Layer;
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
		// check that we have finished dragging any other element
		if (draggedComponent != null || draggedLayer != null){
			throw ("Error: could not start dragging this component or layer, another layer is still being dragged");
		}
		// remove the element from the DOM
		if(ComponentModel.getInstance().selectedItem != null){
			// case of a component
			trace("setDraggedElement COMPONENT ");
			// store the component and its parent and index
			draggedComponent = ComponentModel.getInstance().selectedItem;
			// change the style of the phantom to erflect the element style
			//draggableEvent.draggable.initPhantomStyle(draggedComponent);
		}
		else if(LayerModel.getInstance().selectedItem != null){
			// case of a layer
			trace("setDraggedElement LAYER ");
			// store the component 
			draggedLayer = LayerModel.getInstance().selectedItem;
			// change the style of the phantom to erflect the element style
			//draggableEvent.draggable.initPhantomStyle(draggedLayer.rootElement);
		}
	}
	private static function indexOfChild(childNode:HtmlDom):Int{
		var i = 0;
		var child = childNode;
		while( (child = child.previousSibling) != null ) 
			i++;
		return i;
	}
	/**
	 * virtual method to be implemented in derived classes
	 */
	override private function getDraggedElement(draggableEvent:DraggableEvent):HtmlDom {
		trace("getDraggedElement "+draggableEvent);
		// get what's to drop
		if (draggedComponent != null){
			// case of a component
			return draggedComponent;
		}
		else if (draggedLayer != null){
			// case of a layer
			return draggedLayer.rootElement;
		}
		else{
			throw("No component nor layer being dragged");
		}
	}
	/**
	 * Handle Draggable events
	 */
	override public function onDrop(e:Event) {
		trace("onDrop "+e);
		super.onDrop(e);

		// refresh the builder display
		if (draggedComponent != null){
			// case of a component
			ComponentModel.getInstance().refresh();
		}
		else if (draggedLayer != null){
			// case of a layer
			LayerModel.getInstance().refresh();
		}
		// **
		// reset state
		draggedComponent = null;
		draggedLayer = null;
	}
}

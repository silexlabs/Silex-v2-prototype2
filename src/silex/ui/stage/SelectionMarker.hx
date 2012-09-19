package silex.ui.stage;

import js.Lib;
import js.Dom;

import org.slplayer.component.ui.DisplayObject;
import org.slplayer.util.DomTools;
import org.slplayer.component.navigation.Layer;
import org.slplayer.component.interaction.Draggable;
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
@tagNameFilter("div")
class SelectionMarker extends DisplayObject{
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
	 * store the parent of the component or layer while dragging
	 */ 
	private static var draggedParent:HtmlDom;
	/**
	 * store the position in the parent childNodes of the component or layer while dragging
	 */ 
	private static var draggedPosition:Int;
	/**
	 * marker initial position in the DOM (reset after each drop)
	 */
	private var initialMarkerParent:HtmlDom;
	/**
	 * constructor
	 * listen to the Draggable class events
	 */
	public function new(rootElement:HtmlDom, SLPId:String){
		super(rootElement, SLPId);
		initialMarkerParent = rootElement.parentNode;
		rootElement.addEventListener(Draggable.EVENT_DROPPED, onDrop, false);
		rootElement.addEventListener(Draggable.EVENT_DRAG, onDrag, false);
	}
	/**
	 * Handle Draggable events
	 */
	public function onDrag(e:Event) {
		trace("onDrag "+e);
		// check that we have finished dragging any other element
		if (draggedComponent != null || draggedLayer != null){
			throw ("Error: could not start dragging this component or layer, another layer is still being dragged");
		}
		var event:CustomEvent = cast(e);
		// remove the element from the DOM
		if(ComponentModel.getInstance().selectedItem != null){
			// case of a component
			trace("onDrag COMPONENT "+e);
			// store the component and its parent and index
			draggedComponent = ComponentModel.getInstance().selectedItem;
			draggedParent = draggedComponent.parentNode;
			draggedPosition = draggedComponent.parentNode.indexOf(draggedComponent);
			// remove from the DOM
			draggedParent.removeChild(draggedComponent);
		}
		else if(LayerModel.getInstance().selectedItem != null){
			// case of a layer
			trace("onDrag LAYER "+e);
			// store the component 
			draggedLayer = LayerModel.getInstance().selectedItem;
			draggedParent = draggedLayer.rootElement.parentNode;
			draggedPosition = draggedLayer.rootElement.parentNode.indexOf(draggedLayer.rootElement);
			draggedParent.removeChild(draggedLayer.rootElement);
		}
	}
	/**
	 * Handle Draggable events
	 */
	public function onDrop(e:Event) {
		//trace("onDrop "+e);
		// the drop zone passed with the event 
		var dropZone:DropZone = cast(e).detail.dropZone;
		// retrieve a reference to the dragged html dom (layer or component)
		var element:HtmlDom;
		var position:Int;
		var parent:HtmlDom;
		
		// **
		// Move the element in the view and model

		// get what's to drop
		if (draggedComponent != null){
			// case of a component
			element = draggedComponent;
		}
		else if (draggedLayer != null){
			// case of a layer
			element = draggedLayer.rootElement;
		}
		else{
			throw("No component nor layer being dragged");
		}
		// get where to drop
		if (dropZone != null){
			// a drop zone was found
			trace("onDrop DROPPED in "+dropZone.parent+" at "+dropZone.position);
			position = dropZone.position;
			parent = dropZone.parent;
		}
		else{
			// a drop zone was NOT found , put the element back to the previous parent and position
			position = draggedPosition;
			parent = draggedParent;
		}
		// drop, i.e. put back into the DOM
		if (parent.childNodes.length <= position){
			// at the end
			parent.appendChild(element);
		}
		else{
			// at a given position
			parent.insertBefore(element, parent.childNodes[position+1]);
		}
		// and also move in the model if needed
		if (dropZone != null){
			// remove the element from the model
			var modelElement = PublicationModel.getInstance().getModelFromView(element);
			if (modelElement == null) throw("Error while moving the element: could not retrieve the element in the model.");
			if (modelElement.parentNode == null) throw("Error while moving the element: the element in the model has no parent.");
			trace("Move "+modelElement +" from "+modelElement.parentNode);
			modelElement.parentNode.removeChild(modelElement);

			// put back the element at a new position
			var newParent = PublicationModel.getInstance().modelHtmlDom;
			trace("Move "+modelElement +" to "+newParent + " - "+newParent.childNodes.length +" <= "+ position);
			if (newParent.childNodes.length <= position){
				// at the end
				newParent.appendChild(modelElement);
			}
			else{
				// at a given position
				newParent.insertBefore(modelElement, newParent.childNodes[position+1]);
			}
		}
/*
		DomTools.doLater(resetMarkerParent);
	}
	private function resetMarkerParent(){
*/
		// refresh the builder display
		if (draggedComponent != null){
			// case of a component
			ComponentModel.getInstance().selectedItem = ComponentModel.getInstance().selectedItem;
		}
		else if (draggedLayer != null){
			// case of a layer
			LayerModel.getInstance().selectedItem = LayerModel.getInstance().selectedItem;
		}
		// **
		// reset state
		draggedComponent = null;
		draggedLayer = null;
		draggedParent = null;
		draggedPosition = null;

		// reset the marker position in the DOM
		if (rootElement.parentNode != initialMarkerParent){
			trace("MARKER MOVED, RESET "+rootElement.parentNode);
			//	generate an exception?		rootElement.parentNode.removeChild(rootElement.parentNode);
			initialMarkerParent.appendChild(rootElement);
		}
	}
}

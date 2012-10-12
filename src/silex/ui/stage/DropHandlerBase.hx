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
 * use with Draggable on the same node, on the markers
 * This class catches Draggable events and moves an element of the stage along with the dragged element
 * After the drop, it puts the dragged element back in place
 */
@tagNameFilter("DIV")
class DropHandlerBase extends DisplayObject{
	/**
	 * marker initial parent in the DOM
	 */
	private var initialMarkerParent:HtmlDom;
	/**
	 * marker initial position in the DOM
	 */
	private var initialMarkerPopsition:Int;
	/**
	 * dragged element initial parent in the DOM
	 */
	private var draggedElementParent:HtmlDom;
	/**
	 * dragged element initial position in the DOM
	 */
	private var draggedElementPosition:Int;
	/**
	 * constructor
	 * listen to the Draggable class events
	 */
	public function new(rootElement:HtmlDom, BrixId:String){
		super(rootElement, BrixId);
		initialMarkerParent = rootElement.parentNode;
		initialMarkerPopsition = indexOfChild(rootElement);
		rootElement.addEventListener(Draggable.EVENT_DROPPED, onDrop, false);
		rootElement.addEventListener(Draggable.EVENT_DRAG, onDrag, false);
	}
	/**
	 * init the component
	 */
	override public function init() : Void {
		super.init();
	}
	/**
	 * retrieve the postion of a node in its parent's children
	 */
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
	private function getDraggedElement(draggableEvent:DraggableEvent):HtmlDom {
		throw("virtual method to be implemented in derived classes");
		return null;
	}
	/**
	 * virtual method to be implemented in derived classes
	 */
	private function setDraggedElement(draggableEvent:DraggableEvent) {
		throw("virtual method to be implemented in derived classes");
	}
	/**
	 * Handle Draggable events
	 */
	public function onDrag(e:Event) {
		// check that we have finished dragging any other element
		var event:CustomEvent = cast(e);
		event.detail.draggable.groupElement = PublicationModel.getInstance().viewHtmlDom.parentNode;
		setDraggedElement(event.detail);
		var draggedElement = getDraggedElement(event.detail);

		if (draggedElement!= null){
			// store the initial info in case it is droped outside a drop zone
			draggedElementParent = draggedElement.parentNode;
			draggedElementPosition = indexOfChild(draggedElement);
			// change the phantom style
			event.detail.draggable.initPhantomStyle(draggedElement);
			// remove the element from stage
			//draggedElement.parentNode.removeChild(draggedElement);
			rootElement.appendChild(draggedElement);
		}
	}
	/**
	 * Handle Draggable events
	 */
	public function onDrop(e:Event) {

		var event:CustomEvent = cast(e);

		// the drop zone passed with the event 
		var dropZone:DropZone = event.detail.dropZone;

		// retrieve a reference to the dragged html dom (layer or component)
		var element:HtmlDom;
		var position:Int;
		var parent:HtmlDom;
		
		// **
		// Move the element in the view and model

		// get what's to drop
		element = getDraggedElement(event.detail);
		if (element != null){
			// this will be used to retrieve the beforeElement in the model
			var beforeElement:HtmlDom = null;

			// get where to drop
			if (dropZone != null){
				// a drop zone was found
				position = dropZone.position;
				parent = dropZone.parent;
				// find the component before the insetion position
				// only if the insert position is not the end
				if (parent.childNodes.length > position){
					// before can be text node or dom element
					var before:Dynamic = parent.childNodes[position];
					// browse siblings until it is a component/layer
					while (before != null
					&& (
						before.nodeType != 1 
						|| (
							// case of a component
							before.getAttribute(ComponentModel.COMPONENT_ID_ATTRIBUTE_NAME) == null
							// case of a layer
							&& before.getAttribute(LayerModel.LAYER_ID_ATTRIBUTE_NAME) == null
						)
					)
					){
						before = before.nextSibling;
					}
					beforeElement = before;
				}
				// put the dragged element back into the DOM
				if (parent.childNodes.length <= position){
					// drop at the end 
					parent.appendChild(element);
				}
				else{
					// at a given position
					parent.insertBefore(element, parent.childNodes[position]);
				}
				try{
					// and also move in the model if needed
					// link view to model
					var modelElement = PublicationModel.getInstance().getModelFromView(element);
					var modelBeforeElement = PublicationModel.getInstance().getModelFromView(beforeElement);
					var modelParent = PublicationModel.getInstance().getModelFromView(parent);

					// remove the element from the model
					if (modelElement == null) 
						throw("Error while moving the element: could not retrieve the element in the model.");
					if (modelElement.parentNode == null) 
						throw("Error while moving the element: the element in the model has no parent.");

					//causes an exception when modelElement==modelBeforeElement
					//modelElement.parentNode.removeChild(modelElement);

					// put back the element at a new position
					if (modelBeforeElement == null){
						// at the end
						modelParent.appendChild(modelElement);
					}
					else{
						// at a given position
						modelParent.insertBefore(modelElement, modelBeforeElement);
					}
				}
				catch(e:Dynamic){
						trace("ON DROP ERROR: "+e+ "("+element+" , "+beforeElement+", "+parent+")");
				}
			}
			else{
				// a drop zone was NOT found , put the element back to the previous parent and position
				// position = initialDraggedPosition;
				// parent = initialDraggedParent;
				trace("a drop zone was NOT found");
				// put the element back in place
				if (draggedElementParent.childNodes.length > draggedElementPosition){
					// insert at the right position
					draggedElementParent.insertBefore(element, draggedElementParent.childNodes[draggedElementPosition]);
				}
				else{
					// drop at the end 
					draggedElementParent.appendChild(element);
				}
			}
		}
		else{
			trace("Nothing being dragged");
			//throw("Nothing being dragged");
		}
		resetDraggedMarker();
	}
	private function resetDraggedMarker(){
		// reset the marker position in the DOM
		if (rootElement.parentNode != initialMarkerParent){
			//	generate an exception?		rootElement.parentNode.removeChild(rootElement.parentNode);
			if (initialMarkerParent.childNodes.length > initialMarkerPopsition){
				// insert at the right position
				initialMarkerParent.insertBefore(rootElement, initialMarkerParent.childNodes[initialMarkerPopsition]);
			}
			else{
				// drop at the end 
				initialMarkerParent.appendChild(rootElement);
			}
		}
		// refresh the builder display
		if (ComponentModel.getInstance().selectedItem != null){
			// case of a component
			ComponentModel.getInstance().refresh();
		}
		else if (LayerModel.getInstance().selectedItem != null){
			// case of a layer
			LayerModel.getInstance().refresh();
		}
	}
}

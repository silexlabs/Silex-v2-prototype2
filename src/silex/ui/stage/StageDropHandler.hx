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
 * use with Draggable on the same node
 */
@tagNameFilter("DIV")
class StageDropHandler extends DisplayObject{
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
		trace("onDrag "+e);
		// check that we have finished dragging any other element
		var event:CustomEvent = cast(e);
		setDraggedElement(event.detail);
	}
	/**
	 * Handle Draggable events
	 */
	public function onDrop(e:Event) {
		trace("onDrop "+e);

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
trace("parent = "+parent+"  - position= "+position);
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
					parent.insertBefore(element, parent.childNodes[position+1]);
				}
//		try{
				// and also move in the model if needed
				// link view to model
				trace("Model 002");
				var modelElement = PublicationModel.getInstance().getModelFromView(element);
				trace("Model 004");
				var modelBeforeElement = PublicationModel.getInstance().getModelFromView(beforeElement);
				trace("Model 006 "+parent);
				var modelParent = PublicationModel.getInstance().getModelFromView(parent);
				trace("Model 008");

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
/*
		}
		catch(e:Dynamic){
				trace("ON DROP ERROR: "+e+ "("+element+" , "+beforeElement+", "+parent+")");
		}
*/			}
			else{
				// a drop zone was NOT found , put the element back to the previous parent and position
				// position = initialDraggedPosition;
				// parent = initialDraggedParent;
				trace("a drop zone was NOT found");
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
			initialMarkerParent.appendChild(rootElement);
		}
		// refresh the builder display
		if (ComponentModel.getInstance().selectedItem != null){
			// case of a component
			ComponentModel.getInstance().selectedItem = ComponentModel.getInstance().selectedItem;
		}
		else if (LayerModel.getInstance().selectedItem != null){
			// case of a layer
			LayerModel.getInstance().selectedItem = LayerModel.getInstance().selectedItem;
		}
		trace("ON DROP COMPLETE");
	}
}

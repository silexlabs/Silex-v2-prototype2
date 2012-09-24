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
			draggedPosition = indexOfChild(draggedComponent);
			// change the style of the phantom to erflect the element style
			//event.detail.draggable.initPhantomStyle(draggedComponent);
			// remove from the DOM
			// draggedParent.removeChild(draggedComponent);
		}
		else if(LayerModel.getInstance().selectedItem != null){
			// case of a layer
			trace("onDrag LAYER "+e);
			// store the component 
			draggedLayer = LayerModel.getInstance().selectedItem;
			draggedParent = draggedLayer.rootElement.parentNode;
			draggedPosition = indexOfChild(draggedLayer.rootElement);
			// change the style of the phantom to erflect the element style
			//event.detail.draggable.initPhantomStyle(draggedLayer.rootElement);
			// remove from the DOM
			// draggedParent.removeChild(draggedLayer.rootElement);
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
				var layerOrComponentDataAttr;
				if (draggedComponent != null){
					// case of a component
					layerOrComponentDataAttr = ComponentModel.COMPONENT_ID_ATTRIBUTE_NAME;
				}
				else {
					// case of a layer
					layerOrComponentDataAttr = LayerModel.LAYER_ID_ATTRIBUTE_NAME;
				}
				// browse siblings until it is a component/layer
				while (before != null && 
					(before.nodeType != 1 || before.getAttribute(layerOrComponentDataAttr) == null)
				){
					before = before.nextSibling;
				}
				beforeElement = before;
			}
		}
		else{
			// a drop zone was NOT found , put the element back to the previous parent and position
			position = draggedPosition;
			parent = draggedParent;
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
try{
		// and also move in the model if needed
		if (dropZone != null){
			// link view to model
			var modelElement = PublicationModel.getInstance().getModelFromView(element);
			var modelBeforeElement = PublicationModel.getInstance().getModelFromView(beforeElement);
			var modelParent = PublicationModel.getInstance().getModelFromView(parent);

			// remove the element from the model
			if (modelElement == null) throw("Error while moving the element: could not retrieve the element in the model.");
			if (modelElement.parentNode == null) throw("Error while moving the element: the element in the model has no parent.");
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
}
catch(e:Dynamic){
		trace("ON DROP ERROR: "+e+ "("+element+" , "+beforeElement+", "+parent+")");
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
			//	generate an exception?		rootElement.parentNode.removeChild(rootElement.parentNode);
			initialMarkerParent.appendChild(rootElement);
		}

		trace("ON DROP COMPLETE");
	}
}

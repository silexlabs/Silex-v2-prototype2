package org.silex.component.toolbox;

import js.Lib;
import js.Dom;

import org.slplayer.util.DomTools;
import org.slplayer.component.ui.DisplayObject;
import org.slplayer.component.navigation.transition.TransitionData;
import org.slplayer.component.navigation.Page;
import org.slplayer.component.interaction.Draggable;

/**
 * This component displays a window. Derive this class in order to make a new Toolbox.
 * 
 * It has to be position on the foreground with the CSS styles of the DOM element with which it is associated. 
 */
@tagNameFilter("div")
class ToolboxBase extends DisplayObject 
{
	public static inline var CONFIG_TOOLBOX_NAME = "data-toolbox-name";
	/**
	 * Callback, called automatically
	 * Passed to the constructor or set during execution
	 */
	private var onShow:Null<TransitionData->Void>;
	/**
	 * Callback, called automatically
	 * Passed to the constructor or set during execution
	 */
	private var onHide:Null<TransitionData->Void>;
	/**
	 * Name of the toolbox
	 * Passed as an attribute of the node
	 * It is not supposed to contain white spaces in the name since it is used as a css class
	 * @example	 &lt;div class=&quot;MyToolbox&quot; data-toolbox-name=&quot;the-toolbox-name&quot; &gt;Test toolbox&lt;/div&gt;
	 */
	private var toolboxName:String;

	/**
	 * Constructor
	 * Start listening the buttons
	 */
	public function new(rootElement:HtmlDom, SLPId:String, 
		onShow:Null<TransitionData->Void>, onHide:Null<TransitionData->Void>)
	{
		super(rootElement, SLPId);

		// store the callbacks
		this.onShow = onShow;
		this.onHide = onHide;

		// init toolboxName
		toolboxName = rootElement.getAttribute(CONFIG_TOOLBOX_NAME);
		if (toolboxName == null){
			trace("Warning, this toolbox has no data-toolbox-name attribute. It will not be able to close automatically.");
		}else{
			// add the toolbox name as a css class
			DomTools.addClass(rootElement, toolboxName);
		}

		// listen to the Layer class event
		rootElement.addEventListener(TransitionData.EVENT_TYPE_REQUEST, onLayerShowOrHide, false);
		
		// listen to the Draggable class event
		rootElement.addEventListener(Draggable.EVENT_DRAG, onDrag, false);
		rootElement.addEventListener(Draggable.EVENT_DROPPED, onDrop, false);
		rootElement.addEventListener(Draggable.EVENT_MOVE, onMove, false);
	}
	/**
	 * Callback for the "show" and hide events of the Layer class
	 * Call onShow or onHide callbacks
	 */
	public function onLayerShowOrHide(event:Event) {
		// retrieve the transition event data
		var transitionData:TransitionData = cast(event).detail;

		// call onShow if it is a show request and onHide otherwise
		if (transitionData.type == show){
			if (onShow != null)
				onShow(transitionData);
		}else{
			if (onHide != null)
				onHide(transitionData);
		}
	}
	/**
	 * Close this toolbox
	 * It uses the toolbox name as a css class
	 */
	public function close() {
		Page.closePage(toolboxName, null, SLPlayerInstanceId);
	}
	/**
	 * Called when the toolbox is dragged
	 */
	public function onDrag(event:Event) {
		var draggableEvent : DraggableEvent = cast(event).detail;

		if (draggableEvent.dropZone != null){
			applyConstraints(draggableEvent.dropZone.parent);
		}
		else{
			trace("Warning: Toolbox "+toolboxName+" has not found a dropzone (it should have the css class "+draggableEvent.draggable.dropZonesClassName+")");
		}
	}
	/**
	 * Called when the toolbox is dropped
	 */
	public function onDrop(event:Event) {
		var draggableEvent : DraggableEvent = cast(event).detail;

		if (draggableEvent.dropZone != null){
			applyConstraints(draggableEvent.dropZone.parent);
		}
		else{
			trace("Warning: Toolbox "+toolboxName+" has not found a dropzone (it should have the css class "+draggableEvent.draggable.dropZonesClassName+")");
		}
	}
	/**
	 * Called when the toolbox is moved
	 */
	public function onMove(event:Event) {
		var draggableEvent : DraggableEvent = cast(event).detail;

		if (draggableEvent.dropZone != null){
			applyConstraints(draggableEvent.dropZone.parent);
		}
		else{
			trace("Warning: Toolbox "+toolboxName+" has not found a dropzone (it should have the css class "+draggableEvent.draggable.dropZonesClassName+")");
		}
	}
	/**
	 * do not drop outside the limits of the drop zone
	 */
	private function applyConstraints(container:HtmlDom) {
		var boundingBox = DomTools.getElementBoundingBox(rootElement);
		var boundingBoxContainer = DomTools.getElementBoundingBox(container);

		// left side
		if (boundingBox.x < boundingBoxContainer.x){
			rootElement.style.left = (boundingBoxContainer.x) + "px";
		}
		// right side
		if (boundingBox.x + boundingBox.w > boundingBoxContainer.x + boundingBoxContainer.w){
			rootElement.style.left = (boundingBoxContainer.x + boundingBoxContainer.w - boundingBox.w) + "px";
		}
		// top side
		if (boundingBox.y < boundingBoxContainer.y){
			rootElement.style.top = (boundingBoxContainer.y) + "px";
		}
		// bottom side
		if (boundingBox.y + boundingBox.h > boundingBoxContainer.y + boundingBoxContainer.h){
			rootElement.style.top = (boundingBoxContainer.y + boundingBoxContainer.h - boundingBox.h) + "px";
		}
	}
}

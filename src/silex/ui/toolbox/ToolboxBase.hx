package silex.ui.toolbox;

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
	/**
	 * Constructor
	 * Start listening the buttons
	 */
	public function new(rootElement:HtmlDom, SLPId:String)
	{
		super(rootElement, SLPId);

		// listen to the Draggable class event
		rootElement.addEventListener(Draggable.EVENT_DRAG, onDrag, false);
		rootElement.addEventListener(Draggable.EVENT_DROPPED, onDrop, false);
		rootElement.addEventListener(Draggable.EVENT_MOVE, onMove, false);
	}
	/**
	 * Called when the toolbox is dragged
	 */
	public function onDrag(event:Event) {
		applyConstraints();
	}
	/**
	 * Called when the toolbox is dropped
	 */
	public function onDrop(event:Event) {
		applyConstraints();
	}
	/**
	 * Called when the toolbox is moved
	 */
	public function onMove(event:Event) {
		applyConstraints();
	}
	/**
	 * do not drop outside the limits of the drop zone
	 */
	private function applyConstraints() {
		// var container = Lib.document.body;
		//var boundingBoxContainer = DomTools.getElementBoundingBox(container);
		var boundingBoxContainer = {
			x:0,
			y:0,
			w: Lib.document.body.clientWidth,
			h: Lib.document.body.clientHeight,
		}
		//trace("constraints: "+boundingBoxContainer);
		var boundingBox = DomTools.getElementBoundingBox(rootElement);

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

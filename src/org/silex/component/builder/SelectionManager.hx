package org.silex.component.builder;

import js.Lib;
import js.Dom;

import org.slplayer.component.ui.DisplayObject;
import org.slplayer.util.DomTools;

/**
 * This component listen to the mouse events and start the desired actions. 
 * It acts on the selection and it is in charge of the editing in place (move, resize...)
 */
@tagNameFilter("a")
class SelectionManager extends DisplayObject
{
	public static inline var SELECTION_MARKER_STYLE_NAME = "selection-marker";
	public static inline var HOVER_MARKER_STYLE_NAME = "hover-marker";
	/**
	 * hover marker
	 * this DIV is placed over the hovered element on the stage 
	 * it intercept the click to make the element selected
	 */ 
	private var hoverMarker:HtmlDom;
	/**
	 * selection marker
	 * this DIV is placed over the selected element on the stage 
	 * it intercept the click to handle the editing actions
	 */ 
	private var selectionMarker:HtmlDom;
	/**
	 * selected element
	 */ 
	private var selectedItem:HtmlDom;
	/**
	 * hovered element
	 */ 
	private var hoveredItem:HtmlDom;

	/**
	 * Constructor
	 * Start listening the node
	 */
	public function new(rootElement:HtmlDom, SLPId:String){
		super(rootElement, SLPId);
		rootElement.addEventListener("mouseover", onMouseOver, true);
		rootElement.addEventListener("click", onClickAnywhere, true);

		hoverMarker = Lib.document.createElement("div");
		hoverMarker.className = "hover-marker";
		Lib.document.body.appendChild(hoverMarker);
		hoverMarker.addEventListener("click", onClickHover, true);

		selectionMarker = Lib.document.createElement("div");
		selectionMarker.className = SELECTION_MARKER_STYLE_NAME;
		Lib.document.body.appendChild(selectionMarker);
		selectionMarker.addEventListener("click", onClickSelection, true);

	}
	/**
	 * Handle mouse events
	 */
	public function onClickAnywhere(e:Event) {
		trace("onClickAnywhere "+hoveredItem);
		// set the selection marker over the hovered element
		setSelection(hoveredItem);
	}
	/**
	 * Handle mouse events
	 */
	public function onClickHover(e:Event) {
		trace("onClickHover");
		// set the selection marker over the hovered element
		setSelection(hoveredItem);
	}
	/**
	 * Handle mouse events
	 */
	public function onClickSelection(e:Event) {
		trace("SelectionManager onClickSelection");
	}
	/**
	 * Handle mouse events
	 */
	public function onMouseOver(e:Event) {
		// retrieve the node who triggered the event
		var target:HtmlDom = e.target;
		// retrieve the node which is a component, i.e. the one whise parent node has the Layer class
		var component:HtmlDom = getComponent(e.target);
		// set the hover marker over the element
		setHover(component);
	}
	/**
	 * Set the hovered element, and position the marker over it
	 */
	private function setHover(target:HtmlDom){
		hoveredItem = target;
		setMarkerPosition(hoverMarker, target);
	}
	/**
	 * Set the selected element, and position the marker over it
	 */
	private function setSelection(target:HtmlDom){
		selectedItem = target;
		setMarkerPosition(selectionMarker, target);
	}
	/**
	 * position the given marker over the element
	 * todo: with transformations + rotation
	 */
	private function setMarkerPosition(marker:HtmlDom, target:HtmlDom){
		if (target == null){
			trace("setMarkerPosition - remove marker "+marker);
			marker.style.display = "none";
		}
		else{			
			//var halfBorderH = (target.offsetWidth - target.clientWidth)/4.0;
			//var halfBorderV = (target.offsetHeight - target.clientHeight)/4.0;
			var halfBorderH = (marker.offsetWidth - marker.clientWidth)/2.0;
			var halfBorderV = (marker.offsetHeight - marker.clientHeight)/2.0;
			marker.style.display = "inline";
			marker.style.left = (target.offsetLeft - halfBorderH) + "px";
			marker.style.top = (target.offsetTop - halfBorderV) + "px";
			marker.style.width = Math.floor(target.offsetWidth - halfBorderH) + "px";
			marker.style.height = Math.floor(target.offsetHeight - halfBorderV) + "px";
			trace("setMarkerPosition - "+marker.style.left+", "+marker.style.top+" - "+marker.style.width+" - "+marker.style.height);
		}
	}
	/**
	 * retrieve the node which is a component, i.e. the one whise parent node has the Layer class
	 */
	private function getComponent(target:HtmlDom):Null<HtmlDom>{
		// browse in the parent
		trace("getComponent BEFORE "+target.nodeName+" - "+ target.className);
		while (target != null && target.parentNode != null && !DomTools.hasClass(target.parentNode, "Layer")){
			target = target.parentNode;
		}
		trace("getComponent AFTER "+target.nodeName+" - "+ target.className+" - "+target.parentNode.className);
		// in case the element is not in a Layer, do nothing
		if (target == null || target.parentNode == null || DomTools.hasClass(target.parentNode, "SelectionManager")){
			trace("Warning: the element clicked is not in a Layer");
			return null;
		}
		return target;
	}
}
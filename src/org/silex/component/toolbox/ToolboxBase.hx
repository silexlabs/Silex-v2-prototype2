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
	/**
	 * name of the attribute to pass the drop zone param param to this class
	 * the drop zone is used to compute the limits of the stage and constraint the tool box
	 */
	public static inline var ATTR_DROPZONE = "data-toolbox-dropzones-class-name";
	/**
	 * default class name for the drop zones, used if you do not specify a data-toolbox-dropzones-class-name attribute
	 */
	public static inline var DEFAULT_CSS_CLASS_DROPZONE = "toolbox-dropzone";
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
	 * class name to select the zone used to detect the scene borders
	 * @default	dropzone 
	 */
	public var dropZonesClassName:String;
	/**
	 * html elment instance for the zone used to detect the scene borders
	 */
	public var dropZone:HtmlDom;

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

		// retrieve atribute of the html dom node 
		dropZonesClassName = rootElement.getAttribute(ATTR_DROPZONE);

		// default value
		if (dropZonesClassName == null || dropZonesClassName == "")
			dropZonesClassName = DEFAULT_CSS_CLASS_DROPZONE;

		// listen to the Layer class event
		rootElement.addEventListener(TransitionData.EVENT_TYPE_REQUEST, onLayerShowOrHide, false);
		
		// listen to the Draggable class event
		rootElement.addEventListener(Draggable.EVENT_DRAG, onDrag, false);
		rootElement.addEventListener(Draggable.EVENT_DROPPED, onDrop, false);
		rootElement.addEventListener(Draggable.EVENT_MOVE, onMove, false);
	}
	/**
	 * init the component
	 */
	override public function init() : Void 
	{ 
		super.init();

		// retrieve references to the elements
		var dropZones = Lib.document.body.getElementsByClassName(dropZonesClassName);
		if (dropZones.length == 0)
			dropZone = rootElement.parentNode;
		else
			dropZone = dropZones[0];

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
	 * Called when the toolbox is dragged
	 */
	public function onDrag(event:Event) {
		applyConstraints(dropZone);
	}
	/**
	 * Called when the toolbox is dropped
	 */
	public function onDrop(event:Event) {
		applyConstraints(dropZone);
	}
	/**
	 * Called when the toolbox is moved
	 */
	public function onMove(event:Event) {
		applyConstraints(dropZone);
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

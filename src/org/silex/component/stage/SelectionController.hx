package org.silex.component.stage;

import js.Lib;
import js.Dom;

import org.slplayer.component.ui.DisplayObject;
import org.slplayer.util.DomTools;
import org.slplayer.component.navigation.Layer;
import org.slplayer.core.Application;

import org.silex.layer.LayerModel;
import org.silex.publication.PublicationModel;

/**
 * This component listen to the mouse events and start the desired actions. 
 * It acts on the selection and it is in charge of the editing in place (move, resize...)
 */
@tagNameFilter("a")
class SelectionController extends DisplayObject
{
	/**
	 * The selection marker placed over the selected item. 
	 * This constant defines the css style applyed to the marker, so that one can style it.
	 */
	public static inline var SELECTION_MARKER_STYLE_NAME = "selection-marker";
	/**
	 * The hover marker placed over the selectable item under the mouse. 
	 * This constant defines the css style applyed to the marker, so that one can style it.
	 */
	public static inline var HOVER_MARKER_STYLE_NAME = "hover-marker";
	/**
	 * Selection marker
	 * The selection marker placed over the selected item. 
	 * it intercept the click to handle the editing actions
	 */ 
	private var selectionMarker:HtmlDom;
	/**
	 * Hover marker
	 * The hover marker placed over the selectable item under the mouse. 
	 * it intercept the click to make the element selected
	 */ 
	private var hoverMarker:HtmlDom;
	/**
	 * Component model, used to interact with the DOM
	 */
	private var componentModel:ComponentModel;
	/**
	 * Layer model, used to interact with the DOM
	 */
	private var layerModel:LayerModel;
	/**
	 * Constructor
	 * Create the markers
	 * Start listening the node (view) and to the model
	 */
	public function new(rootElement:HtmlDom, SLPId:String){
		super(rootElement, SLPId);

		// create the marker
		hoverMarker = Lib.document.createElement("div");
		hoverMarker.className = "hover-marker";
		Lib.document.body.appendChild(hoverMarker);

		// create the marker
		selectionMarker = Lib.document.createElement("div");
		selectionMarker.className = SELECTION_MARKER_STYLE_NAME;
		Lib.document.body.appendChild(selectionMarker);

		// listen to the view events
		rootElement.addEventListener("mouseover", onMouseOver, true);
		rootElement.addEventListener("click", onClickAnywhere, true);
		hoverMarker.addEventListener("click", onClickHover, true);
		selectionMarker.addEventListener("click", onClickSelection, true);

		// listen to the model events
		componentModel = ComponentModel.getInstance();
		componentModel.addEventListener(ComponentModel.ON_SELECTION_CHANGE, onSelectionChanged);
		componentModel.addEventListener(ComponentModel.ON_HOVER_CHANGE, onHoverChanged);
		
		// listen to the model events
		layerModel = LayerModel.getInstance();
		layerModel.addEventListener(LayerModel.ON_SELECTION_CHANGE, onLayerSelectionChanged);
		layerModel.addEventListener(LayerModel.ON_HOVER_CHANGE, onLayerHoverChanged);
	}
	/**
	 * Handle mouse events
	 */
	public function onClickAnywhere(e:Event) {
		// set the selection marker over the hovered element
		componentModel.hoveredItem = null;
		componentModel.selectedItem = null;
	}
	/**
	 * Handle mouse events
	 */
	public function onClickHover(e:Event) {
		// prenvent default (selection of text, call of this.onClickAnywhere)
		e.preventDefault();
		// set the item on the model (this will dispatch an event and we will catch it to update the marker)
		componentModel.selectedItem = componentModel.hoveredItem;
		componentModel.hoveredItem = null;
	}
	/**
	 * Handle mouse events
	 * Todo: move, resize...
	 */
	public function onClickSelection(e:Event) {
		trace("SelectionController onClickSelection");
	}
	/**
	 * Handle mouse events
	 */
	public function onMouseOver(e:Event) {
		trace("onMouseOver "+e.target.className);
		// retrieve the node who triggered the event
		var target:HtmlDom = e.target;
		// check if this is a Layer component
		if (DomTools.hasClass(target, "Layer")){
			// get the SLPlayer application from the loaded publication
			var application = PublicationModel.getInstance().application;
			// get the Layer instance associated with the target
			var layerList = application.getAssociatedComponents(target, Layer); // there should be 1 and only 1 element here
			if (layerList.length != 1){
				trace("Warning: there should be 1 and only 1 Layer instance associated with this node, not "+layerList.length);
			}
			layerModel.selectedItem = layerList.first();
		}
		else{
			// retrieve the node which is a component, i.e. the one whise parent node has the Layer class
			var component:HtmlDom = getComponent(e.target);
			// set the item on the model (this will dispatch an event and we will catch it to update the marker)
			componentModel.hoveredItem = component;
		}
	}
	/**
	 * Called by the model when selection changed
	 * Position the marker over the element
	 */
	private function onLayerSelectionChanged(event:CustomEvent){
		trace("Layer selected TODO !!! ");
		setMarkerPosition(selectionMarker, LayerModel.getInstance().selectedItem.rootElement);
	}
	/**
	 * Called by the model when selection changed
	 * Position the marker over the element
	 */
	private function onLayerHoverChanged(event:CustomEvent){
		trace("Layer hovered TODO !!! ");
		setMarkerPosition(hoverMarker, LayerModel.getInstance().hoveredItem.rootElement);
	}
	/**
	 * Called by the model when selection changed
	 * Position the marker over the element
	 */
	private function onSelectionChanged(event:CustomEvent){
		setMarkerPosition(selectionMarker, componentModel.selectedItem);
	}
	/**
	 * Called by the model when selection changed
	 * Position the marker over the element
	 */
	private function onHoverChanged(event:CustomEvent){
		setMarkerPosition(hoverMarker, componentModel.hoveredItem);
	}
	/**
	 * position the given marker over the element
	 * todo: with transformations + rotation
	 */
	private function setMarkerPosition(marker:HtmlDom, target:HtmlDom){
		if (target == null){
			//marker.style.display = "none";
			marker.style.visibility = "hidden";
		}
		else{			
			var boundingBox = DomTools.getElementBoundingBox(target);
			var markerMarginH = (marker.offsetWidth - marker.clientWidth)/2.0;
			var markerMarginV = (marker.offsetHeight - marker.clientHeight)/2.0;
			//marker.style.display = "inline";
			marker.style.visibility = "visible";
			doSetMarkerPosition(marker,
				Math.floor(boundingBox.x - markerMarginH/2),
				Math.floor(boundingBox.y - markerMarginV/2),
				Math.floor(boundingBox.w - markerMarginH),
				Math.floor(boundingBox.h - markerMarginV)
			);
		}
	}
	private function doSetMarkerPosition(marker:HtmlDom, left:Int, top:Int, width:Int, height:Int) {
		marker.style.left = left + "px";
		marker.style.top = top + "px";
		marker.style.width = width + "px";
		marker.style.height = height + "px";
	}
	/**
	 * retrieve the node which is a component, i.e. the one whise parent node has the Layer class
	 */
	private function getComponent(target:HtmlDom):Null<HtmlDom>{
		// browse in the parent
		while (target != null // there has been a problem
			&& target.parentNode != null // stop before we reach the html root tag
			&& target.parentNode != rootElement // the stage can not be selected
			&& !DomTools.hasClass(target.parentNode, "Layer") // if it is a layer, break because we have the result
		){
			target = target.parentNode;
		}
		// in case the element is not in a Layer, do nothing
		if (target == null 
			|| target.parentNode == null 
			|| target.parentNode == rootElement
		){
			// the element clicked is not inside a Layer on the stage
			return null;
		}
		return target;
	}
}
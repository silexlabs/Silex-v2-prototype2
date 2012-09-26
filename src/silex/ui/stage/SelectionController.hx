package silex.ui.stage;

import js.Lib;
import js.Dom;

import org.slplayer.component.ui.DisplayObject;
import org.slplayer.util.DomTools;
import org.slplayer.component.navigation.Layer;
import org.slplayer.core.Application;

import silex.property.PropertyModel;
import silex.component.ComponentModel;
import silex.layer.LayerModel;
import silex.page.PageModel;
import silex.publication.PublicationModel;

/**
 * This component listen to the mouse events and start the desired actions. 
 * It acts on the selection and it is in charge of the editing in place (move, resize...)
 * 	- mouse move on the scene => check position of all layers layers
 * 	- mouse move on the currently hovered layer => check the position of all components
 * 	- if mouse is over a component, remove the layer hover marker, display the component hover marker (if component is not selected)
 * 	- else if mouse is over a layer, display the layer hover marker (if component is not selected)
 * 	- on click, select the hovered component, or layer 
 * 	- on select layer, remove all other marker, display layer selection marker
 * 	- on select component, remove all other marker, display component selection marker
 */
@tagNameFilter("DIV")
class SelectionController extends DisplayObject
{
	/**
	 * Information for debugging, e.g. the class name
	 */ 
	public static inline var DEBUG_INFO = "SelectionController class";
	/**
	 * The selection marker placed over the selected item. 
	 * This constant defines the css style applyed to the marker, so that one can style it.
	 */
	public static inline var SELECTION_MARKER_STYLE_NAME = "selection-marker";
	public static inline var SELECTION_LAYER_MARKER_STYLE_NAME = "selection-layer-marker";
	/**
	 * The hover marker placed over the selectable item under the mouse. 
	 * This constant defines the css style applyed to the marker, so that one can style it.
	 */
	public static inline var HOVER_MARKER_STYLE_NAME = "hover-marker";
	public static inline var HOVER_LAYER_MARKER_STYLE_NAME = "hover-layer-marker";
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
	 * Selection marker for layers
	 * It is attached directly at the end of the layer DOM elements
	 */ 
	private var selectionLayerMarker:HtmlDom;
	/**
	 * Hover marker for layers
	 * It is attached directly at the end of the layer DOM elements
	 */ 
	private var hoverLayerMarker:HtmlDom;
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

		var selectionContainer = Lib.document.body;

		// create the marker
//		hoverLayerMarker = Lib.document.createElement("div");
//		hoverLayerMarker.className = HOVER_LAYER_MARKER_STYLE_NAME;
		hoverLayerMarker = DomTools.getSingleElement(rootElement, HOVER_LAYER_MARKER_STYLE_NAME, true);
		hoverLayerMarker.addEventListener("mousedown", onClickLayerHover, false);
		hoverLayerMarker.addEventListener("mouseout", onOutLayerHover, false);
		selectionContainer.appendChild(hoverLayerMarker);

		// create the marker
//		selectionLayerMarker = Lib.document.createElement("div");
//		selectionLayerMarker.className = SELECTION_LAYER_MARKER_STYLE_NAME;
		selectionLayerMarker = DomTools.getSingleElement(rootElement, SELECTION_LAYER_MARKER_STYLE_NAME, true);
		selectionLayerMarker.addEventListener("click", onClickLayerSelection, false);
		selectionContainer.appendChild(selectionLayerMarker);

		// create the marker
//		hoverMarker = Lib.document.createElement("div");
//		hoverMarker.className = HOVER_MARKER_STYLE_NAME;
		hoverMarker = DomTools.getSingleElement(rootElement, HOVER_MARKER_STYLE_NAME, true);
		hoverMarker.addEventListener("mousedown", onClickHover, false);
		hoverMarker.addEventListener("mouseout", onOutHover, false);
		selectionContainer.appendChild(hoverMarker);

		// create the marker
//		selectionMarker = Lib.document.createElement("div");
//		selectionMarker.className = SELECTION_MARKER_STYLE_NAME;
		selectionMarker = DomTools.getSingleElement(rootElement, SELECTION_MARKER_STYLE_NAME, true);
		selectionMarker.addEventListener("click", onClickSelection, false);
		selectionContainer.appendChild(selectionMarker);

		// listen to the view events
		Lib.document.body.addEventListener("mousemove", onMouseMove, false);
		//rootElement.addEventListener("mouseover", onMouseOver, false);
		//Lib.document.body.addEventListener("click", onClickAnywhere, false);

		// listen to the model events
		componentModel = ComponentModel.getInstance();
		componentModel.addEventListener(ComponentModel.ON_SELECTION_CHANGE, onSelectionChanged, DEBUG_INFO);
		componentModel.addEventListener(ComponentModel.ON_HOVER_CHANGE, onHoverChanged, DEBUG_INFO);
		componentModel.addEventListener(ComponentModel.ON_LIST_CHANGE, redraw, DEBUG_INFO);
		
		// listen to the model events
		layerModel = LayerModel.getInstance();
		layerModel.addEventListener(LayerModel.ON_SELECTION_CHANGE, onLayerSelectionChanged, DEBUG_INFO);
		layerModel.addEventListener(LayerModel.ON_HOVER_CHANGE, onLayerHoverChanged, DEBUG_INFO);
		layerModel.addEventListener(LayerModel.ON_LIST_CHANGE, redraw, DEBUG_INFO);

		// listen to the model events
		PageModel.getInstance().addEventListener(PageModel.ON_LIST_CHANGE, redraw, DEBUG_INFO);
		PublicationModel.getInstance().addEventListener(PublicationModel.ON_DATA, redraw, DEBUG_INFO);
		PropertyModel.getInstance().addEventListener(PropertyModel.ON_PROPERTY_CHANGE, redraw, DEBUG_INFO);
		PropertyModel.getInstance().addEventListener(PropertyModel.ON_STYLE_CHANGE, redraw, DEBUG_INFO);
		

		rootElement.addEventListener("scroll", redraw, false);
		Lib.window.addEventListener("resize", redraw, false);
	}
	/**
	 * refresh display
	 */
	public function redraw(e:Event=null) {
		trace("redraw selection");
		if (layerModel.selectedItem == null) setMarkerPosition(selectionLayerMarker, null);
		else setMarkerPosition(selectionLayerMarker, layerModel.selectedItem.rootElement);
		if (layerModel.hoveredItem == null) setMarkerPosition(hoverLayerMarker, null);
		else  setMarkerPosition(hoverLayerMarker, layerModel.hoveredItem.rootElement);
		setMarkerPosition(selectionMarker, componentModel.selectedItem);
		setMarkerPosition(hoverMarker, componentModel.hoveredItem);
	}
	//////////////////////////////////////////////////////
	// Selection clicks
	//////////////////////////////////////////////////////
	/**
	 * Handle mouse events
	 */
	public function onClickHover(e:Event) {
		// trace("onClickHover ");
		// prenvent default (selection of text, call of this.onClickAnywhere)
//		e.preventDefault();
		// set the item on the model (this will dispatch an event and we will catch it to update the marker)
		componentModel.selectedItem = componentModel.hoveredItem;

/* attempt to start drag on mouse down
		// start drag on mouse down
		var e:Event = Lib.document.createEvent('HTMLEvents');
		e.initEvent('mousedown', true, false);
		selectionMarker.dispatchEvent(cast(e));

//		DomTools.doLater(callback(selectionMarker.dispatchEvent, cast(e)), 100);
*/
	}
	/**
	 * Handle mouse events
	 */
	public function onClickLayerHover(e:Event) {
		// trace("onClickLayerHover ");
		// prenvent default (selection of text, call of this.onClickAnywhere)
		e.preventDefault();
		// set the item on the model (this will dispatch an event and we will catch it to update the marker)
		layerModel.selectedItem = layerModel.hoveredItem;
	}
	/**
	 * Handle mouse events
	 * Todo: move, resize...
	 */
	public function onClickSelection(e:Event) {
		// trace("onClickSelection ");
		// prenvent default (selection of text, call of this.onClickAnywhere)
		e.preventDefault();
	}
	/**
	 * Handle mouse events
	 * Todo: move, resize...
	 */
	public function onClickLayerSelection(e:Event) {
		// trace("onClickLayerSelection ");
		// prenvent default (selection of text, call of this.onClickAnywhere)
		e.preventDefault();
	}
	/**
	 * Handle mouse events
	 */
/*	public function onClickAnywhere(e:Event) {
		trace("onClickAnywhere ");
		e.preventDefault();
		// set the selection marker over the hovered element
		layerModel.hoveredItem = null;
		layerModel.selectedItem = null;
		componentModel.hoveredItem = null;
		componentModel.selectedItem = null;
	}

	//////////////////////////////////////////////////////
	// Hover detection
	//////////////////////////////////////////////////////
	/**
	 * Handle mouse events
	 */
	public function onOutHover(e:Event) {
		componentModel.hoveredItem = null;
	}
	/**
	 * Handle mouse events
	 */
	public function onOutLayerHover(e:Event) {
		layerModel.hoveredItem = null;
	}
	/**
	 * Handle mouse events
	 */
	public function onMouseMove(e:Event) {
		//trace("onMouseMove "+e.target.className);
		// browse all layers to check if it should be set as hovered
		var found = false;
		var layers = DomTools.getElementsByAttribute(rootElement, "data-silex-layer-id", "*");
		for (idx in 0...layers.length){
			if (checkIsOver(layers[idx], e.pageX, e.pageY)){
				// the mouse is over a layer
				// get the SLPlayer application from the loaded publication
				var application = PublicationModel.getInstance().application;
				// get the Layer instance associated with the layers[idx]
				var layerList = application.getAssociatedComponents(layers[idx], Layer); // there should be 1 and only 1 element here
				if (layerList.length != 1){
					trace("Warning: there should be 1 and only 1 Layer instance associated with this node, not "+layerList.length);
				}
				layerModel.hoveredItem = layerList.first();
				found = true;
				break;
			}
		}
		if (found == false){
			layerModel.hoveredItem = null;
		}else{
			
		}

		// mouse move on the currently hovered layer
		var found = false;
		if (layerModel.hoveredItem != null){
			// browse all components to check if it should be set as hovered
			var comps = DomTools.getElementsByAttribute(layerModel.hoveredItem.rootElement, "data-silex-component-id", "*");
			for (idx in 0...comps.length){
				if (checkIsOver(comps[idx], e.pageX, e.pageY)){
					// the mouse is over a layer
					componentModel.hoveredItem = comps[idx];
					found = true;
					break;
				}
			}
		}
		if (found == false){
			componentModel.hoveredItem = null;
		}else{
		}
/*
		// retrieve the node which is a component
		var target:HtmlDom = getComponent(e.target);
		// check if this is a Layer or a Component
		if (target != null){
			// trace("COMPONENT!");
			// set the item on the model (this will dispatch an event and we will catch it to update the marker)
			componentModel.hoveredItem = target;
		}else{
			var target:HtmlDom = getLayer(e.target);
			// check if this is a Layer component
			if (target != null){
				// trace("LAYER!");
				// get the SLPlayer application from the loaded publication
				var application = PublicationModel.getInstance().application;
				// get the Layer instance associated with the target
				var layerList = application.getAssociatedComponents(target, Layer); // there should be 1 and only 1 element here
				if (layerList.length != 1){
					trace("Warning: there should be 1 and only 1 Layer instance associated with this node, not "+layerList.length);
				}
				layerModel.hoveredItem = layerList.first();
			}else{
				trace("Warning: the hovered element is not a Layer nor a Component");
			}
		}
/*
		var target:HtmlDom = e.target;
		// check if this is a Layer component
		if (DomTools.hasClass(target, "Layer")){
			trace("LAYER!");
			// get the SLPlayer application from the loaded publication
			var application = PublicationModel.getInstance().application;
			// get the Layer instance associated with the target
			var layerList = application.getAssociatedComponents(target, Layer); // there should be 1 and only 1 element here
			if (layerList.length != 1){
				trace("Warning: there should be 1 and only 1 Layer instance associated with this node, not "+layerList.length);
			}
			layerModel.hoveredItem = layerList.first();
		}else{
			trace("COMPONENT!");
			// retrieve the node which is a component, i.e. the one whise parent node has the Layer class
			var component:HtmlDom = getComponent(e.target);
			// set the item on the model (this will dispatch an event and we will catch it to update the marker)
			componentModel.hoveredItem = component;
		}
/**/	
	}
	/**
	 * Check if the mouse is over a given node
	 */
	private function checkIsOver(target:HtmlDom, mouseX:Int, mouseY:Int):Bool{
		var boundingBox = DomTools.getElementBoundingBox(target);
		var res = mouseX > boundingBox.x 
			&& mouseX < boundingBox.x+boundingBox.w
			&& mouseY > boundingBox.y
			&& mouseY < boundingBox.y+boundingBox.h;
		//trace("checkIsOver(" + target + ", " + mouseX + ", "+ mouseY + ") returns "+res);
		return res;
	}
	/**
	 * retrieve the node which is a component, i.e. the one whith data-silex-component-id
	 */
/*	private function getComponent(target:HtmlDom):Null<HtmlDom>{
		// browse in the parent
		while (target != null && target.nodeName.toLowerCase() != "body"){
			if (target.getAttribute(ComponentModel.COMPONENT_ID_ATTRIBUTE_NAME) != null){
				return target;
			}
			target = target.parentNode;
		}
		return null;
	}
	/**
	 * retrieve the node which is a layer, i.e. the one whith data-silex-layer-id
	 */
/*	private function getLayer(target:HtmlDom):Null<HtmlDom>{
		// browse in the parent
		while (target != null){
			if (target.getAttribute(LayerModel.LAYER_ID_ATTRIBUTE_NAME) != null){
				return target;
			}
			target = target.parentNode;
		}
		return null;
	}
	//////////////////////////////////////////////////////
	// Model events handling
	//////////////////////////////////////////////////////
	/**
	 * Called by the model when selection changed
	 * Position the marker over the element
	 */
	private function onLayerSelectionChanged(event:CustomEvent){
		if (layerModel.selectedItem == null || componentModel.selectedItem != null){
			setMarkerPosition(selectionLayerMarker, null);
		}
		else{
			setMarkerPosition(selectionLayerMarker, layerModel.selectedItem.rootElement);
		}
	}
	/**
	 * Called by the model when selection changed
	 * Position the marker over the element
	 */
	private function onLayerHoverChanged(event:CustomEvent){
		if (layerModel.hoveredItem == null || componentModel.hoveredItem != null){
			setMarkerPosition(hoverLayerMarker, null);
		}
		else{
			setMarkerPosition(hoverLayerMarker, layerModel.hoveredItem.rootElement);
		}
	}
	/**
	 * Called by the model when selection changed
	 * Position the marker over the element
	 */
	private function onSelectionChanged(event:CustomEvent){
		setMarkerPosition(selectionMarker, componentModel.selectedItem);
		// remove the layer marker
		if (componentModel.selectedItem != null)
			setMarkerPosition(selectionLayerMarker, null);
	}
	/**
	 * Called by the model when selection changed
	 * Position the marker over the element
	 */
	private function onHoverChanged(event:CustomEvent){
		setMarkerPosition(hoverMarker, componentModel.hoveredItem);
		// remove the layer marker
		if (componentModel.hoveredItem != null)
			setMarkerPosition(hoverLayerMarker, null);
	}
	//////////////////////////////////////////////////////
	// Markers management
	//////////////////////////////////////////////////////
	/**
	 * position the given marker over the element
	 * todo: with transformations + rotation
	 */
	private function setMarkerPosition(marker:HtmlDom, target:HtmlDom){
		// trace("setMarkerPosition ("+marker+", "+target+")");
		if (target == null || target.style.display == "none"){
			marker.style.display = "none";
			marker.style.visibility = "hidden";
		}
		else{			
			marker.style.display = "inline";
			marker.style.visibility = "visible";
			var boundingBox = DomTools.getElementBoundingBox(target);
			var markerMarginH = (marker.offsetWidth - marker.clientWidth)/2.0;
			var markerMarginV = (marker.offsetHeight - marker.clientHeight)/2.0;
			doSetMarkerPosition(marker,
				Math.floor(boundingBox.x - markerMarginH/2),
				Math.floor(boundingBox.y - markerMarginV/2),
				Math.floor(boundingBox.w - markerMarginH),
				Math.floor(boundingBox.h - markerMarginV)
			);
		}
	}
	/**
	 * position the given marker at the given position
	 */
	private function doSetMarkerPosition(marker:HtmlDom, left:Int, top:Int, width:Int, height:Int) {
		marker.style.left = left + "px";
		marker.style.top = top + "px";
		marker.style.width = width + "px";
		marker.style.height = height + "px";
	}
}
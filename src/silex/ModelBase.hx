package silex;

import js.Dom;
import js.Lib;

import brix.core.Application;
import brix.component.ui.DisplayObject;

/**
 * structure used to store the listeners and the event they are listening to
 */
typedef EventListener = {
	callbackFunction:CustomEvent->Void,
	eventName:String,
	debugInfo:String
}
/**
 * The models in Silex are used only when editing, not when viewing a publication.
 * This class implements an event system, so that the views can be notified of changes in the model. 
 * Also this class implements a selection pattern, for the PageModel, LayerModel, ComponentModel classes.
 */
class ModelBase <FinalType>{
	/**
	 * Models are singletons
	 * Constructor is private
	 */
	private function new(hoverChangeEventName:String, selectionChangeEventName:String, debugInfo:String){
		// init event system
		listeners = new List();
		// store the event names
		this.hoverChangeEventName = hoverChangeEventName; 
		this.selectionChangeEventName = selectionChangeEventName;
		this.debugInfo = debugInfo;
	}
	////////////////////////////////////////////////
	// Type param
	////////////////////////////////////////////////
	/** 
	 * retrieve all the instances of a given component
	 * @example 	all the layers: LayerModel.getInstance().getClasses(publicationModel.viewHtmlDom, publicationModel.application.id, Layer);
	 */
	public function getClasses(viewHtmlDom:HtmlDom, brixInstanceId:String, finalType:Class<DisplayObject>):Array<FinalType>{
		// get all nodes which have instances of FinalType, i.e. all element with class name "FinalType"
		var classes:Array<FinalType> = new Array();

		// if a publication is loaded only
		if (viewHtmlDom == null)
			return classes;
			
		// get the class nodes
		var className = Type.getClassName(finalType);
		// remove the package
		className = className.substr(className.lastIndexOf(".")+1);
		// retrieve the nodes
		var nodes:HtmlCollection<HtmlDom> = viewHtmlDom.getElementsByClassName(className);
		// browse all nodes
		for (idx in 0...nodes.length)
		{
			// retrieve the class instance associated with this node
			var instances:List<DisplayObject> = Application.get(brixInstanceId).getAssociatedComponents(nodes[idx], finalType);

			if (instances.length == 1){
				// store the first instance
				classes.push(cast(instances.first()));
			}
			else{
				throw ("Error: there should be 1 and only 1 instance of "+Type.getClassName(finalType)+" associated with this node, and there is "+instances.length+" ("+nodes[idx].className+")");
			}
		}
		return classes;
	}
	////////////////////////////////////////////////
	// Selection
	////////////////////////////////////////////////
	/**
	 * Information for debugging, should be the class name or any element which will ease the debuging of errors occuring in a listener
	 */ 
	private var debugInfo:String;
	/**
	 * selected element
	 */ 
	public var selectedItem(default, setSelectedItem):FinalType;
	/**
	 * hovered element
	 */ 
	public var hoveredItem(default, setHoveredItem):FinalType;
	/**
	 * name of the hover change event
	 */ 
	private var hoverChangeEventName:String;
	/**
	 * name of the selection change event
	 */ 
	private var selectionChangeEventName:String;
	/**
	 * Setter for the hovered item
	 * Dispatch the change event with the item reference as the detail property of the custom event
	 */
	public function setHoveredItem(item:FinalType):FinalType {
//		if (hoveredItem != item)
		{
			hoveredItem = item;
			dispatchEvent(createEvent(hoverChangeEventName, item), debugInfo);
		}
		return item;
	}
	/**
	 * Setter for the selected item
	 * Dispatch the change event with the item reference as the detail property of the custom event
	 */
	public function setSelectedItem(item:FinalType):FinalType {
//		if (selectedItem != item)
		{
			selectedItem = item;
			dispatchEvent(createEvent(selectionChangeEventName, item), debugInfo);
		}
		return item;
	}
	/**
	 * Refresh selection, this wil dispatch a change event but keep current selection
	 */
	public function refresh() {
		dispatchEvent(createEvent(selectionChangeEventName, selectedItem), debugInfo);
	}
	////////////////////////////////////////////////
	// Event system implementation
	////////////////////////////////////////////////
	/**
	 * Envent system
	 * List of the EventListener structures to notify when the event is dispatched
	 */
	private var listeners:List<EventListener>;
	/**
	 * Find a listener given its node and event name
	 */
	private function getEventListener(callbackFunction:CustomEvent->Void, eventName:String):Null<EventListener> {
		for(el in listeners){
			if (el.eventName == eventName && el.callbackFunction == callbackFunction){
				return el;
			}
		}
		return null;
	}
	/**
	 * Defines if two EventListener objects are equal or not
	 */
	private function isSameEventListeners(el1:EventListener, el2:EventListener):Bool{
		return (el1.callbackFunction == el2.callbackFunction && el1.eventName == el2.eventName);
	}
	/**
	 * Envent system
	 * Add a listener, so that it will be notified of an event
	 */
	public function addEventListener(eventName:String, callbackFunction:CustomEvent->Void, debugInfo:String) {
		if (getEventListener(callbackFunction, eventName) == null){
			listeners.add({
				callbackFunction:callbackFunction,
				eventName: eventName,
				debugInfo:debugInfo
			});
		}
	}
	/**
	 * Envent system
	 * Remove a listener for a given event
	 */
	public function removeEventListener(eventName:String, callbackFunction:CustomEvent->Void) {
		var el = getEventListener(callbackFunction, eventName);
		if (el != null){
			listeners.remove(el);
		}
	}
	/**
	 * Envent system
	 * Dispatch an event to the registered listeners
	 */
	public function dispatchEvent(event:CustomEvent, debugInfo:String) {
		// dispatch the event on each node
		for(el in listeners){
			if (el.eventName == event.type){
				try{
					el.callbackFunction(event);
				}catch(e:Dynamic){
					throw("Error when dispatching \""+el.eventName+"\" event, from "+debugInfo+", to "+el.debugInfo+". The error: "+e);
				}
			}
		}		
	}
	/**
	 * Envent system
	 * Dispatch an event with the given name and no custom data
	 */
	public function createEvent(eventName:String, detail:Dynamic=null):CustomEvent {
		var event:CustomEvent = cast Lib.document.createEvent("CustomEvent");
		event.initCustomEvent(eventName, true, true, detail);
		return event;
	}
}
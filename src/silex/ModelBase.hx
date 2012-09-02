package silex;

import js.Dom;
import js.Lib;

/**
 * structure used to store the listeners and the event they are listening to
 */
typedef EventListener = {
	callbackFunction:CustomEvent->Void,
	eventName:String
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
	private function new(hoverChangeEventName:String, selectionChangeEventName:String){
		// init event system
		listeners = new List();
		// store the event names
		this.hoverChangeEventName = hoverChangeEventName; 
		this.selectionChangeEventName = selectionChangeEventName;
	}
	////////////////////////////////////////////////
	// Selection
	////////////////////////////////////////////////
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
	 * Dispatch the change event
	 */
	public function setHoveredItem(item:FinalType):FinalType {
		if (hoveredItem != item){
			hoveredItem = item;
			dispatchEvent(createEvent(hoverChangeEventName));
		}
		return item;
	}
	/**
	 * Setter for the selected item
	 * Dispatch the change event
	 */
	public function setSelectedItem(item:FinalType):FinalType {
		if (selectedItem != item){
			selectedItem = item;
			dispatchEvent(createEvent(selectionChangeEventName));
		}
		return item;
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
	public function addEventListener(eventName:String, callbackFunction:CustomEvent->Void) {
		if (getEventListener(callbackFunction, eventName) == null){
			listeners.add({
				callbackFunction:callbackFunction,
				eventName: eventName,
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
	public function dispatchEvent(event:CustomEvent) {
		// dispatch the event on each node
		for(el in listeners){
			if (el.eventName == event.type){
				el.callbackFunction(event);
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
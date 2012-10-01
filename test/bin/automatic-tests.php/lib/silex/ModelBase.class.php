<?php

class silex_ModelBase {
	public function __construct($hoverChangeEventName, $selectionChangeEventName) {
		if(!php_Boot::$skip_constructor) {
		$this->listeners = new HList();
		$this->hoverChangeEventName = $hoverChangeEventName;
		$this->selectionChangeEventName = $selectionChangeEventName;
	}}
	public function createEvent($eventName, $detail = null) {
		$event = cocktail_Lib::get_document()->createEvent("CustomEvent");
		$event->initCustomEvent($eventName, true, true, $detail);
		return $event;
	}
	public function dispatchEvent($event) {
		if(null == $this->listeners) throw new HException('null iterable');
		$»it = $this->listeners->iterator();
		while($»it->hasNext()) {
			$el = $»it->next();
			if($el->eventName === $event->type) {
				$el->callbackFunction($event);
			}
		}
	}
	public function removeEventListener($eventName, $callbackFunction) {
		$el = $this->getEventListener($callbackFunction, $eventName);
		if($el !== null) {
			$this->listeners->remove($el);
		}
	}
	public function addEventListener($eventName, $callbackFunction) {
		if($this->getEventListener($callbackFunction, $eventName) === null) {
			$this->listeners->add(_hx_anonymous(array("callbackFunction" => $callbackFunction, "eventName" => $eventName)));
		}
	}
	public function isSameEventListeners($el1, $el2) {
		return $el1->callbackFunction == $el2->callbackFunction && $el1->eventName === $el2->eventName;
	}
	public function getEventListener($callbackFunction, $eventName) {
		if(null == $this->listeners) throw new HException('null iterable');
		$»it = $this->listeners->iterator();
		while($»it->hasNext()) {
			$el = $»it->next();
			if($el->eventName === $eventName && $el->callbackFunction == $callbackFunction) {
				return $el;
			}
		}
		return null;
	}
	public $listeners;
	public function setSelectedItem($item) {
		if($this->selectedItem != $item) {
			$this->selectedItem = $item;
			$this->dispatchEvent($this->createEvent($this->selectionChangeEventName, null));
		}
		return $item;
	}
	public function setHoveredItem($item) {
		if($this->hoveredItem != $item) {
			$this->hoveredItem = $item;
			$this->dispatchEvent($this->createEvent($this->hoverChangeEventName, null));
		}
		return $item;
	}
	public $selectionChangeEventName;
	public $hoverChangeEventName;
	public $hoveredItem;
	public $selectedItem;
	public function __call($m, $a) {
		if(isset($this->$m) && is_callable($this->$m))
			return call_user_func_array($this->$m, $a);
		else if(isset($this->»dynamics[$m]) && is_callable($this->»dynamics[$m]))
			return call_user_func_array($this->»dynamics[$m], $a);
		else if('toString' == $m)
			return $this->__toString();
		else
			throw new HException('Unable to call «'.$m.'»');
	}
	static $__properties__ = array("set_selectedItem" => "setSelectedItem","set_hoveredItem" => "setHoveredItem");
	function __toString() { return 'silex.ModelBase'; }
}

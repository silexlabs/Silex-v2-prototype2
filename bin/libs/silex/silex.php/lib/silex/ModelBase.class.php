<?php

class silex_ModelBase {
	public function __construct($hoverChangeEventName, $selectionChangeEventName, $debugInfo) {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("silex.ModelBase::new");
		$»spos = $GLOBALS['%s']->length;
		$this->listeners = new HList();
		$this->hoverChangeEventName = $hoverChangeEventName;
		$this->selectionChangeEventName = $selectionChangeEventName;
		$this->debugInfo = $debugInfo;
		$GLOBALS['%s']->pop();
	}}
	public function createEvent($eventName, $detail = null) {
		$GLOBALS['%s']->push("silex.ModelBase::createEvent");
		$»spos = $GLOBALS['%s']->length;
		$event = cocktail_Lib::get_document()->createEvent("CustomEvent");
		$event->initCustomEvent($eventName, true, true, $detail);
		{
			$GLOBALS['%s']->pop();
			return $event;
		}
		$GLOBALS['%s']->pop();
	}
	public function dispatchEvent($event, $debugInfo) {
		$GLOBALS['%s']->push("silex.ModelBase::dispatchEvent");
		$»spos = $GLOBALS['%s']->length;
		if(null == $this->listeners) throw new HException('null iterable');
		$»it = $this->listeners->iterator();
		while($»it->hasNext()) {
			$el = $»it->next();
			if($el->eventName === $event->type) {
				try {
					$el->callbackFunction($event);
				}catch(Exception $»e) {
					$_ex_ = ($»e instanceof HException) ? $»e->e : $»e;
					$e = $_ex_;
					{
						$GLOBALS['%e'] = new _hx_array(array());
						while($GLOBALS['%s']->length >= $»spos) {
							$GLOBALS['%e']->unshift($GLOBALS['%s']->pop());
						}
						$GLOBALS['%s']->push($GLOBALS['%e'][0]);
						throw new HException("Error when dispatching \"" . $el->eventName . "\" event, from " . $debugInfo . ", to " . $el->debugInfo . ". The error: " . Std::string($e));
					}
				}
				unset($e);
			}
		}
		$GLOBALS['%s']->pop();
	}
	public function removeEventListener($eventName, $callbackFunction) {
		$GLOBALS['%s']->push("silex.ModelBase::removeEventListener");
		$»spos = $GLOBALS['%s']->length;
		$el = $this->getEventListener($callbackFunction, $eventName);
		if($el !== null) {
			$this->listeners->remove($el);
		}
		$GLOBALS['%s']->pop();
	}
	public function addEventListener($eventName, $callbackFunction, $debugInfo) {
		$GLOBALS['%s']->push("silex.ModelBase::addEventListener");
		$»spos = $GLOBALS['%s']->length;
		if($this->getEventListener($callbackFunction, $eventName) === null) {
			$this->listeners->add(_hx_anonymous(array("callbackFunction" => $callbackFunction, "eventName" => $eventName, "debugInfo" => $debugInfo)));
		}
		$GLOBALS['%s']->pop();
	}
	public function isSameEventListeners($el1, $el2) {
		$GLOBALS['%s']->push("silex.ModelBase::isSameEventListeners");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $el1->callbackFunction == $el2->callbackFunction && $el1->eventName === $el2->eventName;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getEventListener($callbackFunction, $eventName) {
		$GLOBALS['%s']->push("silex.ModelBase::getEventListener");
		$»spos = $GLOBALS['%s']->length;
		if(null == $this->listeners) throw new HException('null iterable');
		$»it = $this->listeners->iterator();
		while($»it->hasNext()) {
			$el = $»it->next();
			if($el->eventName === $eventName && $el->callbackFunction == $callbackFunction) {
				$GLOBALS['%s']->pop();
				return $el;
			}
		}
		{
			$GLOBALS['%s']->pop();
			return null;
		}
		$GLOBALS['%s']->pop();
	}
	public $listeners;
	public function setSelectedItem($item) {
		$GLOBALS['%s']->push("silex.ModelBase::setSelectedItem");
		$»spos = $GLOBALS['%s']->length;
		if($this->selectedItem != $item) {
			$this->selectedItem = $item;
			$this->dispatchEvent($this->createEvent($this->selectionChangeEventName, $item), $this->debugInfo);
		}
		{
			$GLOBALS['%s']->pop();
			return $item;
		}
		$GLOBALS['%s']->pop();
	}
	public function setHoveredItem($item) {
		$GLOBALS['%s']->push("silex.ModelBase::setHoveredItem");
		$»spos = $GLOBALS['%s']->length;
		if($this->hoveredItem != $item) {
			$this->hoveredItem = $item;
			$this->dispatchEvent($this->createEvent($this->hoverChangeEventName, $item), $this->debugInfo);
		}
		{
			$GLOBALS['%s']->pop();
			return $item;
		}
		$GLOBALS['%s']->pop();
	}
	public $selectionChangeEventName;
	public $hoverChangeEventName;
	public $hoveredItem;
	public $selectedItem;
	public $debugInfo;
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

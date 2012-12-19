<?php

class cocktail_core_event_EventListener {
	public function __construct($eventType, $listener, $useCapture) {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.event.EventListener::new");
		$»spos = $GLOBALS['%s']->length;
		$this->listener = $listener;
		$this->useCapture = $useCapture;
		$this->eventType = $eventType;
		$GLOBALS['%s']->pop();
	}}
	public function dispose() {
		$GLOBALS['%s']->push("cocktail.core.event.EventListener::dispose");
		$»spos = $GLOBALS['%s']->length;
		$this->listener = null;
		$GLOBALS['%s']->pop();
	}
	public function handleEvent($evt) {
		$GLOBALS['%s']->push("cocktail.core.event.EventListener::handleEvent");
		$»spos = $GLOBALS['%s']->length;
		$this->listener($evt);
		$GLOBALS['%s']->pop();
	}
	public $eventType;
	public $listener;
	public $useCapture;
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
	function __toString() { return 'cocktail.core.event.EventListener'; }
}

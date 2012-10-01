<?php

class cocktail_core_event_Event {
	public function __construct() {
		;
	}
	public function stopImmediatePropagation() {
		$this->immediatePropagationStopped = true;
	}
	public function stopPropagation() {
		$this->propagationStopped = true;
	}
	public function preventDefault() {
		$this->defaultPrevented = true;
	}
	public function initEvent($eventTypeArg, $canBubbleArg, $cancelableArg) {
		if($this->dispatched === true) {
			return;
		}
		$this->type = $eventTypeArg;
		$this->bubbles = $canBubbleArg;
		$this->cancelable = $cancelableArg;
	}
	public $dispatched;
	public $immediatePropagationStopped;
	public $propagationStopped;
	public $defaultPrevented;
	public $cancelable;
	public $bubbles;
	public $currentTarget;
	public $target;
	public $type;
	public $eventPhase;
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
	static $CAPTURING_PHASE = 1;
	static $AT_TARGET = 2;
	static $BUBBLING_PHASE = 3;
	function __toString() { return 'cocktail.core.event.Event'; }
}

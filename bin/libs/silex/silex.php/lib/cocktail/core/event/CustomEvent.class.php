<?php

class cocktail_core_event_CustomEvent extends cocktail_core_event_Event {
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.event.CustomEvent::new");
		$»spos = $GLOBALS['%s']->length;
		parent::__construct();
		$GLOBALS['%s']->pop();
	}}
	public function initCustomEvent($eventTypeArg, $canBubbleArg, $cancelableArg, $detailArg) {
		$GLOBALS['%s']->push("cocktail.core.event.CustomEvent::initCustomEvent");
		$»spos = $GLOBALS['%s']->length;
		if($this->dispatched === true) {
			$GLOBALS['%s']->pop();
			return;
		}
		$this->initEvent($eventTypeArg, $canBubbleArg, $cancelableArg);
		$this->detail = $detailArg;
		$GLOBALS['%s']->pop();
	}
	public $detail;
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
	function __toString() { return 'cocktail.core.event.CustomEvent'; }
}

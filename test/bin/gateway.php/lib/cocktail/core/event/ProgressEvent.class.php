<?php

class cocktail_core_event_ProgressEvent extends cocktail_core_event_Event {
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.event.ProgressEvent::new");
		$»spos = $GLOBALS['%s']->length;
		parent::__construct();
		$this->lengthComputable = false;
		$this->loaded = 0;
		$this->total = 0;
		$GLOBALS['%s']->pop();
	}}
	public function initProgressEvent($eventTypeArg, $canBubbleArg, $cancelableArg, $lengthComputableArg, $loadedArg, $totalArg) {
		$GLOBALS['%s']->push("cocktail.core.event.ProgressEvent::initProgressEvent");
		$»spos = $GLOBALS['%s']->length;
		if($this->dispatched === true) {
			$GLOBALS['%s']->pop();
			return;
		}
		$this->initEvent($eventTypeArg, $canBubbleArg, $cancelableArg);
		$this->lengthComputable = $lengthComputableArg;
		$this->loaded = $loadedArg;
		$this->total = $totalArg;
		$GLOBALS['%s']->pop();
	}
	public $total;
	public $loaded;
	public $lengthComputable;
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
	function __toString() { return 'cocktail.core.event.ProgressEvent'; }
}

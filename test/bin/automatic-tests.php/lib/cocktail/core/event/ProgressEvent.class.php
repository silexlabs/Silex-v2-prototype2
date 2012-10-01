<?php

class cocktail_core_event_ProgressEvent extends cocktail_core_event_Event {
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		parent::__construct();
		$this->lengthComputable = false;
		$this->loaded = 0;
		$this->total = 0;
	}}
	public function initProgressEvent($eventTypeArg, $canBubbleArg, $cancelableArg, $lengthComputableArg, $loadedArg, $totalArg) {
		if($this->dispatched === true) {
			return;
		}
		$this->initEvent($eventTypeArg, $canBubbleArg, $cancelableArg);
		$this->lengthComputable = $lengthComputableArg;
		$this->loaded = $loadedArg;
		$this->total = $totalArg;
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

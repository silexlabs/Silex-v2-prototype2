<?php

class cocktail_core_event_MouseEvent extends cocktail_core_event_UIEvent {
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.event.MouseEvent::new");
		$»spos = $GLOBALS['%s']->length;
		parent::__construct();
		$GLOBALS['%s']->pop();
	}}
	public function initMouseEvent($eventTypeArg, $canBubbleArg, $cancelableArg, $viewArg, $detailArg, $screenXArg, $screenYArg, $clientXArg, $clientYArg, $ctrlKeyArg, $altKeyArg, $shiftKeyArg, $metaKeyArg, $buttonArg, $relatedTargeArg) {
		$GLOBALS['%s']->push("cocktail.core.event.MouseEvent::initMouseEvent");
		$»spos = $GLOBALS['%s']->length;
		if($this->dispatched === true) {
			$GLOBALS['%s']->pop();
			return;
		}
		$this->initUIEvent($eventTypeArg, $canBubbleArg, $cancelableArg, $viewArg, $detailArg);
		$this->screenX = $screenXArg;
		$this->screenY = $screenYArg;
		$this->clientX = $clientXArg;
		$this->clientY = $clientYArg;
		$this->ctrlKey = $ctrlKeyArg;
		$this->shiftKey = $shiftKeyArg;
		$this->altKey = $altKeyArg;
		$this->metaKey = $metaKeyArg;
		$this->button = $buttonArg;
		$this->relatedTarget = $relatedTargeArg;
		$GLOBALS['%s']->pop();
	}
	public $relatedTarget;
	public $button;
	public $metaKey;
	public $altKey;
	public $shiftKey;
	public $ctrlKey;
	public $clientY;
	public $clientX;
	public $screenY;
	public $screenX;
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
	function __toString() { return 'cocktail.core.event.MouseEvent'; }
}

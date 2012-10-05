<?php

class cocktail_core_resource_AbstractResource extends cocktail_core_event_EventTarget {
	public function __construct($url) {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.resource.AbstractResource::new");
		$»spos = $GLOBALS['%s']->length;
		parent::__construct();
		$this->loaded = false;
		$this->loadedWithError = false;
		$this->load($url);
		$GLOBALS['%s']->pop();
	}}
	public function onLoadError() {
		$GLOBALS['%s']->push("cocktail.core.resource.AbstractResource::onLoadError");
		$»spos = $GLOBALS['%s']->length;
		$this->loadedWithError = true;
		$errorEvent = new cocktail_core_event_UIEvent();
		$errorEvent->initUIEvent("error", false, false, null, 0.0);
		$this->dispatchEvent($errorEvent);
		$GLOBALS['%s']->pop();
	}
	public function onLoadComplete() {
		$GLOBALS['%s']->push("cocktail.core.resource.AbstractResource::onLoadComplete");
		$»spos = $GLOBALS['%s']->length;
		$this->loaded = true;
		$loadEvent = new cocktail_core_event_UIEvent();
		$loadEvent->initUIEvent("load", false, false, null, 0.0);
		$this->dispatchEvent($loadEvent);
		$GLOBALS['%s']->pop();
	}
	public function load($url) {
		$GLOBALS['%s']->push("cocktail.core.resource.AbstractResource::load");
		$»spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public $intrinsicRatio;
	public $intrinsicHeight;
	public $intrinsicWidth;
	public $nativeResource;
	public $loadedWithError;
	public $loaded;
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
	function __toString() { return 'cocktail.core.resource.AbstractResource'; }
}

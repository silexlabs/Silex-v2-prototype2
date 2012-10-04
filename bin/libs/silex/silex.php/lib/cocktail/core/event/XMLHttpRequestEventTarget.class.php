<?php

class cocktail_core_event_XMLHttpRequestEventTarget extends cocktail_core_event_EventTarget {
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.event.XMLHttpRequestEventTarget::new");
		$»spos = $GLOBALS['%s']->length;
		parent::__construct();
		$GLOBALS['%s']->pop();
	}}
	public function set_onLoadEnd($value) {
		$GLOBALS['%s']->push("cocktail.core.event.XMLHttpRequestEventTarget::set_onLoadEnd");
		$»spos = $GLOBALS['%s']->length;
		$this->updateCallbackListener("loadend", $value, (isset($this->onloadend) ? $this->onloadend: array($this, "onloadend")));
		{
			$»tmp = $this->onloadend = $value;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_onTimeout($value) {
		$GLOBALS['%s']->push("cocktail.core.event.XMLHttpRequestEventTarget::set_onTimeout");
		$»spos = $GLOBALS['%s']->length;
		$this->updateCallbackListener("timeout", $value, (isset($this->ontimeout) ? $this->ontimeout: array($this, "ontimeout")));
		{
			$»tmp = $this->ontimeout = $value;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_onLoad($value) {
		$GLOBALS['%s']->push("cocktail.core.event.XMLHttpRequestEventTarget::set_onLoad");
		$»spos = $GLOBALS['%s']->length;
		$this->updateCallbackListener("load", $value, (isset($this->onload) ? $this->onload: array($this, "onload")));
		{
			$»tmp = $this->onload = $value;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_onError($value) {
		$GLOBALS['%s']->push("cocktail.core.event.XMLHttpRequestEventTarget::set_onError");
		$»spos = $GLOBALS['%s']->length;
		$this->updateCallbackListener("error", $value, (isset($this->onerror) ? $this->onerror: array($this, "onerror")));
		{
			$»tmp = $this->onerror = $value;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_onAbort($value) {
		$GLOBALS['%s']->push("cocktail.core.event.XMLHttpRequestEventTarget::set_onAbort");
		$»spos = $GLOBALS['%s']->length;
		$this->updateCallbackListener("abort", $value, (isset($this->onabort) ? $this->onabort: array($this, "onabort")));
		{
			$»tmp = $this->onabort = $value;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_onProgress($value) {
		$GLOBALS['%s']->push("cocktail.core.event.XMLHttpRequestEventTarget::set_onProgress");
		$»spos = $GLOBALS['%s']->length;
		$this->updateCallbackListener("progress", $value, (isset($this->onprogress) ? $this->onprogress: array($this, "onprogress")));
		{
			$»tmp = $this->onprogress = $value;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_onLoadStart($value) {
		$GLOBALS['%s']->push("cocktail.core.event.XMLHttpRequestEventTarget::set_onLoadStart");
		$»spos = $GLOBALS['%s']->length;
		$this->updateCallbackListener("loadstart", $value, (isset($this->onloadStart) ? $this->onloadStart: array($this, "onloadStart")));
		{
			$»tmp = $this->onloadStart = $value;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function updateCallbackListener($eventType, $newListener, $oldListener) {
		$GLOBALS['%s']->push("cocktail.core.event.XMLHttpRequestEventTarget::updateCallbackListener");
		$»spos = $GLOBALS['%s']->length;
		if($oldListener !== null) {
			$this->removeEventListener($eventType, $oldListener, null);
		}
		if($newListener !== null) {
			$this->addEventListener($eventType, $newListener, null);
		}
		$GLOBALS['%s']->pop();
	}
	public $onloadend;
	public $ontimeout;
	public $onload;
	public $onerror;
	public $onabort;
	public $onprogress;
	public $onloadStart;
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
	static $__properties__ = array("set_onloadStart" => "set_onLoadStart","set_onprogress" => "set_onProgress","set_onabort" => "set_onAbort","set_onerror" => "set_onError","set_onload" => "set_onLoad","set_ontimeout" => "set_onTimeout","set_onloadend" => "set_onLoadEnd");
	function __toString() { return 'cocktail.core.event.XMLHttpRequestEventTarget'; }
}

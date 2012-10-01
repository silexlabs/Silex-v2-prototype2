<?php

class cocktail_core_event_XMLHttpRequestEventTarget extends cocktail_core_event_EventTarget {
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		parent::__construct();
	}}
	public function set_onLoadEnd($value) {
		$this->updateCallbackListener("loadend", $value, (isset($this->onloadend) ? $this->onloadend: array($this, "onloadend")));
		return $this->onloadend = $value;
	}
	public function set_onTimeout($value) {
		$this->updateCallbackListener("timeout", $value, (isset($this->ontimeout) ? $this->ontimeout: array($this, "ontimeout")));
		return $this->ontimeout = $value;
	}
	public function set_onLoad($value) {
		$this->updateCallbackListener("load", $value, (isset($this->onload) ? $this->onload: array($this, "onload")));
		return $this->onload = $value;
	}
	public function set_onError($value) {
		$this->updateCallbackListener("error", $value, (isset($this->onerror) ? $this->onerror: array($this, "onerror")));
		return $this->onerror = $value;
	}
	public function set_onAbort($value) {
		$this->updateCallbackListener("abort", $value, (isset($this->onabort) ? $this->onabort: array($this, "onabort")));
		return $this->onabort = $value;
	}
	public function set_onProgress($value) {
		$this->updateCallbackListener("progress", $value, (isset($this->onprogress) ? $this->onprogress: array($this, "onprogress")));
		return $this->onprogress = $value;
	}
	public function set_onLoadStart($value) {
		$this->updateCallbackListener("loadstart", $value, (isset($this->onloadStart) ? $this->onloadStart: array($this, "onloadStart")));
		return $this->onloadStart = $value;
	}
	public function updateCallbackListener($eventType, $newListener, $oldListener) {
		if($oldListener !== null) {
			$this->removeEventListener($eventType, $oldListener, null);
		}
		if($newListener !== null) {
			$this->addEventListener($eventType, $newListener, null);
		}
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

<?php

class cocktail_port_platform_nativeHttp_AbstractNativeHttp extends cocktail_core_event_EventTarget {
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.port.platform.nativeHttp.AbstractNativeHttp::new");
		$»spos = $GLOBALS['%s']->length;
		parent::__construct();
		$GLOBALS['%s']->pop();
	}}
	public function get_loaded() {
		$GLOBALS['%s']->push("cocktail.port.platform.nativeHttp.AbstractNativeHttp::get_loaded");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return -1;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_total() {
		$GLOBALS['%s']->push("cocktail.port.platform.nativeHttp.AbstractNativeHttp::get_total");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return -1;
		}
		$GLOBALS['%s']->pop();
	}
	public function onLoadProgress($time) {
		$GLOBALS['%s']->push("cocktail.port.platform.nativeHttp.AbstractNativeHttp::onLoadProgress");
		$»spos = $GLOBALS['%s']->length;
		if($this->error === true) {
			$errorEvent = new cocktail_core_event_Event();
			$errorEvent->initEvent("error", false, false);
			$this->dispatchEvent($errorEvent);
		} else {
			if($this->complete === true) {
				$loadEvent = new cocktail_core_event_Event();
				$loadEvent->initEvent("load", false, false);
				$this->dispatchEvent($loadEvent);
			} else {
				$progressEvent = new cocktail_core_event_ProgressEvent();
				$progressEvent->initProgressEvent("progress", false, false, false, $this->get_loaded(), $this->get_total());
				$this->dispatchEvent($progressEvent);
				cocktail_Lib::get_document()->timer->delay((isset($this->onLoadProgress) ? $this->onLoadProgress: array($this, "onLoadProgress")), 50);
			}
		}
		$GLOBALS['%s']->pop();
	}
	public function doLoad($url, $method, $data, $authorRequestHeaders, $dataFormat) {
		$GLOBALS['%s']->push("cocktail.port.platform.nativeHttp.AbstractNativeHttp::doLoad");
		$»spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public function close() {
		$GLOBALS['%s']->push("cocktail.port.platform.nativeHttp.AbstractNativeHttp::close");
		$»spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public function load($url, $method, $data, $authorRequestHeaders, $dataFormat) {
		$GLOBALS['%s']->push("cocktail.port.platform.nativeHttp.AbstractNativeHttp::load");
		$»spos = $GLOBALS['%s']->length;
		$this->status = 0;
		$this->total = 0;
		$this->loaded = 0;
		$this->responseHeaders = new Hash();
		$this->responseHeadersLoaded = false;
		$this->response = null;
		$this->error = false;
		$this->complete = false;
		$this->doLoad($url, $method, $data, $authorRequestHeaders, $dataFormat);
		cocktail_Lib::get_document()->timer->delay((isset($this->onLoadProgress) ? $this->onLoadProgress: array($this, "onLoadProgress")), 50);
		$GLOBALS['%s']->pop();
	}
	public $complete;
	public $error;
	public $responseHeadersLoaded;
	public $response;
	public $responseHeaders;
	public $loaded;
	public $total;
	public $status;
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
	static $PROGRESS_UPDATE_FREQUENCY = 50;
	static $__properties__ = array("get_total" => "get_total","get_loaded" => "get_loaded");
	function __toString() { return 'cocktail.port.platform.nativeHttp.AbstractNativeHttp'; }
}

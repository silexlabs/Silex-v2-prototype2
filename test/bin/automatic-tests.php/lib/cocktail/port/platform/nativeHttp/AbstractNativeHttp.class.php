<?php

class cocktail_port_platform_nativeHttp_AbstractNativeHttp {
	public function __construct() {
		;
	}
	public function get_loaded() {
		return -1;
	}
	public function get_total() {
		return -1;
	}
	public function doLoad($url, $method, $data, $authorRequestHeaders) {
	}
	public function close() {
	}
	public function load($url, $method, $data, $authorRequestHeaders) {
		$this->status = 0;
		$this->total = 0;
		$this->loaded = 0;
		$this->responseHeaders = new Hash();
		$this->responseHeadersLoaded = false;
		$this->response = null;
		$this->error = false;
		$this->complete = false;
		$this->doLoad($url, $method, $data, $authorRequestHeaders);
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
	static $__properties__ = array("get_total" => "get_total","get_loaded" => "get_loaded");
	function __toString() { return 'cocktail.port.platform.nativeHttp.AbstractNativeHttp'; }
}

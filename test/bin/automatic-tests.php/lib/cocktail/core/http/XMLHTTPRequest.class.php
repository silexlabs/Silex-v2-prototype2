<?php

class cocktail_core_http_XMLHTTPRequest extends cocktail_core_event_XMLHttpRequestEventTarget {
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		parent::__construct();
		$this->_nativeHttp = new cocktail_port_platform_nativeHttp_AbstractNativeHttp();
		$this->set_responseType("");
		$this->setReadyState(0);
	}}
	public function set_onReadyStateChange($value) {
		$this->updateCallbackListener("readystatechange", $value, (isset($this->onreadystatechange) ? $this->onreadystatechange: array($this, "onreadystatechange")));
		return $this->onreadystatechange = $value;
	}
	public function set_responseType($value) {
		switch($this->readyState) {
		case 3:case 4:{
			throw new HException(11);
			return null;
		}break;
		default:{
		}break;
		}
		return $this->responseType = $value;
	}
	public function get_responseXML() {
		if($this->responseType !== "" && $this->responseType !== "document") {
			throw new HException(11);
			return null;
		}
		if($this->readyState !== 4) {
			return null;
		}
		if($this->_error === true) {
			return null;
		}
		return $this->responseXML;
	}
	public function get_responseText() {
		if($this->responseType !== "" && $this->responseType !== "text") {
			throw new HException(11);
			return null;
		}
		switch($this->readyState) {
		case 3:case 4:{
		}break;
		default:{
			return "";
		}break;
		}
		if($this->_error === true) {
			return "";
		}
		return $this->responseText;
	}
	public function get_response() {
		if($this->responseType === "" && $this->responseType === "text") {
			switch($this->readyState) {
			case 3:case 4:{
			}break;
			default:{
				return "";
			}break;
			}
			if($this->_error === true) {
				return "";
			}
			return $this->get_responseText();
		} else {
			if($this->readyState !== 4) {
				return null;
			}
			if($this->_error === true) {
				return null;
			}
			return null;
		}
	}
	public function get_statusText() {
		switch($this->readyState) {
		case 0:case 1:{
			return "";
		}break;
		default:{
		}break;
		}
		if($this->_error === true) {
			return "";
		}
		return $this->statusText;
	}
	public function get_status() {
		switch($this->readyState) {
		case 0:case 1:{
			return 0;
		}break;
		default:{
		}break;
		}
		if($this->_error === true) {
			return 0;
		}
		return $this->status;
	}
	public function fireReadyStateChange() {
		$readyStateChangeEvent = new cocktail_core_event_Event();
		$readyStateChangeEvent->initEvent("readystatechange", false, false);
		$this->dispatchEvent($readyStateChangeEvent);
	}
	public function setReadyState($value) {
		$this->readyState = $value;
		$this->fireReadyStateChange();
	}
	public function requestError($error, $event) {
		$this->_nativeHttp->close();
		$this->_error = true;
		$this->readyState = 4;
		if($this->_synchronous === true) {
			throw new HException($error);
			return;
		}
		$this->fireReadyStateChange();
		if($this->_uploadComplete === false) {
			$this->_uploadComplete = true;
			$errorEvent = new cocktail_core_event_ProgressEvent();
			$errorEvent->initEvent($event, false, false);
			$this->upload->dispatchEvent($errorEvent);
			$loadEnd = new cocktail_core_event_ProgressEvent();
			$loadEnd->initEvent("loadend", false, false);
			$this->upload->dispatchEvent($loadEnd);
		}
		$errorEvent = new cocktail_core_event_ProgressEvent();
		$errorEvent->initEvent($event, false, false);
		$this->dispatchEvent($errorEvent);
		$loadEnd = new cocktail_core_event_ProgressEvent();
		$loadEnd->initEvent("loadend", false, false);
		$this->dispatchEvent($loadEnd);
	}
	public function makeUploadProgressNotification() {
	}
	public function makeProgressNotification() {
		$progressEvent = new cocktail_core_event_ProgressEvent();
		$progressEvent->initProgressEvent("progress", false, false, $this->_nativeHttp->get_total() !== 0, $this->_nativeHttp->get_loaded(), $this->_nativeHttp->get_total());
		$this->dispatchEvent($progressEvent);
	}
	public function onHttpProgressTick() {
		$this->status = $this->_nativeHttp->status;
		if($this->_error === true) {
			return;
		}
		$this->makeProgressNotification();
		$this->makeUploadProgressNotification();
		if($this->readyState === 1) {
			if($this->_nativeHttp->responseHeadersLoaded === true && $this->_synchronous === false) {
				$this->_responseHeaders = $this->_nativeHttp->responseHeaders;
				$this->setReadyState(2);
			}
		}
		if($this->readyState === 2) {
			if($this->_synchronous === false) {
				if($this->_nativeHttp->get_loaded() > 0) {
					$this->setReadyState(3);
				}
			}
		}
		if($this->readyState === 3 || $this->_nativeHttp->complete === true) {
			if($this->_nativeHttp->complete === true) {
				$this->_synchronous = false;
				$this->response = $this->_nativeHttp->response;
				$this->responseText = $this->_nativeHttp->response;
				$this->setReadyState(4);
				$loadEvent = new cocktail_core_event_ProgressEvent();
				$loadEvent->initEvent("load", false, false);
				$this->dispatchEvent($loadEvent);
				$loadEndEvent = new cocktail_core_event_ProgressEvent();
				$loadEndEvent->initEvent("loadend", false, false);
				$this->dispatchEvent($loadEndEvent);
				return;
			}
		}
	}
	public function setRequestHeader($header, $value) {
		if($this->readyState !== 1 || $this->_send === true) {
			throw new HException(11);
			return;
		}
		switch(strtolower($header)) {
		case "accept-charset":case "accept-encoding":case "access-control-request-headers":case "access-control-request-method":case "connection":case "content-length":case "cookie":case "cookie2":case "content-transfer-encoding":case "date":case "expect":case "host":case "keep-alive":case "origin":case "referer":case "te":case "trailer":case "transfer-encoding":case "upgrade":case "user-agent":case "via":{
			return;
		}break;
		}
		if(_hx_substr(strtolower($header), 0, 6) === "proxy-" || _hx_substr(strtolower($header), 0, 4) === "sec-") {
			return;
		}
		if($this->_authorRequestHeaders->exists($header) === false) {
			$this->_authorRequestHeaders->set($header, $value);
		} else {
			$this->_authorRequestHeaders->set($header, $value);
		}
	}
	public function abort() {
	}
	public function send($data = null) {
		if($this->readyState !== 1 || $this->_send === true) {
			throw new HException(11);
			return;
		}
		$useRequestEntityBody = $data !== null;
		switch($this->_method) {
		case "get":case "head":{
			$useRequestEntityBody = false;
		}break;
		}
		if($useRequestEntityBody === true) {
		}
		if($this->_synchronous === true) {
		} else {
			if($this->_registeredEventListeners->keys()->hasNext() === true) {
				$this->_uploadEvents = true;
			}
		}
		$this->_error = false;
		if($useRequestEntityBody === false || $data === null) {
			$this->_uploadComplete = true;
		}
		if($this->_synchronous === false) {
			$this->_send = true;
			$this->fireReadyStateChange();
			$loadStart = new cocktail_core_event_ProgressEvent();
			$loadStart->initEvent("loadstart", false, false);
			$this->dispatchEvent($loadStart);
			if($this->_uploadComplete === false) {
				$uploadLoadStart = new cocktail_core_event_ProgressEvent();
				$uploadLoadStart->initEvent("loadstart", false, false);
				$this->upload->dispatchEvent($uploadLoadStart);
			}
		}
		$this->_nativeHttp->load($this->_url, $this->_method, $data, $this->_authorRequestHeaders);
		$this->onHttpProgressTick();
	}
	public function open($method, $url, $async = null, $user = null, $password = null) {
		if($async === null) {
			$async = true;
		}
		switch(strtolower($method)) {
		case "delete":case "get":case "head":case "options":case "post":case "put":{
		}break;
		case "connect":case "trace":case "track":{
			throw new HException(18);
			return;
		}break;
		default:{
			throw new HException(12);
			return;
		}break;
		}
		$this->_method = $method;
		$this->_url = $url;
		if($async === false) {
			$this->_synchronous = true;
		}
		$this->_authorRequestHeaders = new Hash();
		$this->_send = false;
		$this->response = null;
		$this->setReadyState(1);
	}
	public $_uploadEvents;
	public $_uploadComplete;
	public $_requestEntityBody;
	public $_authorRequestHeaders;
	public $_password;
	public $_username;
	public $_synchronous;
	public $_url;
	public $_method;
	public $_error;
	public $_send;
	public $_responseHeaders;
	public $_nativeHttp;
	public $onreadystatechange;
	public $statusText;
	public $status;
	public $upload;
	public $responseType;
	public $responseXML;
	public $responseText;
	public $response;
	public $readyState;
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
	static $__properties__ = array("get_response" => "get_response","get_responseText" => "get_responseText","get_responseXML" => "get_responseXML","set_responseType" => "set_responseType","get_status" => "get_status","get_statusText" => "get_statusText","set_onreadystatechange" => "set_onReadyStateChange","set_onloadStart" => "set_onLoadStart","set_onprogress" => "set_onProgress","set_onabort" => "set_onAbort","set_onerror" => "set_onError","set_onload" => "set_onLoad","set_ontimeout" => "set_onTimeout","set_onloadend" => "set_onLoadEnd");
	function __toString() { return 'cocktail.core.http.XMLHTTPRequest'; }
}

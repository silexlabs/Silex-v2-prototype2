<?php

class cocktail_core_http_XMLHTTPRequest extends cocktail_core_event_XMLHttpRequestEventTarget {
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.http.XMLHTTPRequest::new");
		$»spos = $GLOBALS['%s']->length;
		parent::__construct();
		$this->_nativeHttp = new cocktail_port_platform_nativeHttp_AbstractNativeHttp();
		$this->set_responseType("");
		$this->setReadyState(0);
		$GLOBALS['%s']->pop();
	}}
	public function set_onReadyStateChange($value) {
		$GLOBALS['%s']->push("cocktail.core.http.XMLHTTPRequest::set_onReadyStateChange");
		$»spos = $GLOBALS['%s']->length;
		$this->updateCallbackListener("readystatechange", $value, (isset($this->onreadystatechange) ? $this->onreadystatechange: array($this, "onreadystatechange")));
		{
			$»tmp = $this->onreadystatechange = $value;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_responseType($value) {
		$GLOBALS['%s']->push("cocktail.core.http.XMLHTTPRequest::set_responseType");
		$»spos = $GLOBALS['%s']->length;
		switch($this->readyState) {
		case 3:case 4:{
			throw new HException(11);
			{
				$GLOBALS['%s']->pop();
				return null;
			}
		}break;
		default:{
		}break;
		}
		{
			$»tmp = $this->responseType = $value;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_responseXML() {
		$GLOBALS['%s']->push("cocktail.core.http.XMLHTTPRequest::get_responseXML");
		$»spos = $GLOBALS['%s']->length;
		if($this->responseType !== "" && $this->responseType !== "document") {
			throw new HException(11);
			{
				$GLOBALS['%s']->pop();
				return null;
			}
		}
		if($this->readyState !== 4) {
			$GLOBALS['%s']->pop();
			return null;
		}
		if($this->_error === true) {
			$GLOBALS['%s']->pop();
			return null;
		}
		{
			$»tmp = $this->responseXML;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_responseText() {
		$GLOBALS['%s']->push("cocktail.core.http.XMLHTTPRequest::get_responseText");
		$»spos = $GLOBALS['%s']->length;
		if($this->responseType !== "" && $this->responseType !== "text") {
			throw new HException(11);
			{
				$GLOBALS['%s']->pop();
				return null;
			}
		}
		switch($this->readyState) {
		case 3:case 4:{
		}break;
		default:{
			$GLOBALS['%s']->pop();
			return "";
		}break;
		}
		if($this->_error === true) {
			$GLOBALS['%s']->pop();
			return "";
		}
		{
			$»tmp = $this->responseText;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_response() {
		$GLOBALS['%s']->push("cocktail.core.http.XMLHTTPRequest::get_response");
		$»spos = $GLOBALS['%s']->length;
		if($this->responseType === "" && $this->responseType === "text") {
			switch($this->readyState) {
			case 3:case 4:{
			}break;
			default:{
				$GLOBALS['%s']->pop();
				return "";
			}break;
			}
			if($this->_error === true) {
				$GLOBALS['%s']->pop();
				return "";
			}
			{
				$»tmp = $this->get_responseText();
				$GLOBALS['%s']->pop();
				return $»tmp;
			}
		} else {
			if($this->readyState !== 4) {
				$GLOBALS['%s']->pop();
				return null;
			}
			if($this->_error === true) {
				$GLOBALS['%s']->pop();
				return null;
			}
			{
				$GLOBALS['%s']->pop();
				return null;
			}
		}
		$GLOBALS['%s']->pop();
	}
	public function get_statusText() {
		$GLOBALS['%s']->push("cocktail.core.http.XMLHTTPRequest::get_statusText");
		$»spos = $GLOBALS['%s']->length;
		switch($this->readyState) {
		case 0:case 1:{
			$GLOBALS['%s']->pop();
			return "";
		}break;
		default:{
		}break;
		}
		if($this->_error === true) {
			$GLOBALS['%s']->pop();
			return "";
		}
		{
			$»tmp = $this->statusText;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_status() {
		$GLOBALS['%s']->push("cocktail.core.http.XMLHTTPRequest::get_status");
		$»spos = $GLOBALS['%s']->length;
		switch($this->readyState) {
		case 0:case 1:{
			$GLOBALS['%s']->pop();
			return 0;
		}break;
		default:{
		}break;
		}
		if($this->_error === true) {
			$GLOBALS['%s']->pop();
			return 0;
		}
		{
			$»tmp = $this->status;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function fireReadyStateChange() {
		$GLOBALS['%s']->push("cocktail.core.http.XMLHTTPRequest::fireReadyStateChange");
		$»spos = $GLOBALS['%s']->length;
		$readyStateChangeEvent = new cocktail_core_event_Event();
		$readyStateChangeEvent->initEvent("readystatechange", false, false);
		$this->dispatchEvent($readyStateChangeEvent);
		$GLOBALS['%s']->pop();
	}
	public function setReadyState($value) {
		$GLOBALS['%s']->push("cocktail.core.http.XMLHTTPRequest::setReadyState");
		$»spos = $GLOBALS['%s']->length;
		$this->readyState = $value;
		$this->fireReadyStateChange();
		$GLOBALS['%s']->pop();
	}
	public function requestError($error, $event) {
		$GLOBALS['%s']->push("cocktail.core.http.XMLHTTPRequest::requestError");
		$»spos = $GLOBALS['%s']->length;
		$this->_nativeHttp->close();
		$this->_error = true;
		$this->readyState = 4;
		if($this->_synchronous === true) {
			throw new HException($error);
			{
				$GLOBALS['%s']->pop();
				return;
			}
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
		$GLOBALS['%s']->pop();
	}
	public function makeUploadProgressNotification() {
		$GLOBALS['%s']->push("cocktail.core.http.XMLHTTPRequest::makeUploadProgressNotification");
		$»spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public function makeProgressNotification() {
		$GLOBALS['%s']->push("cocktail.core.http.XMLHTTPRequest::makeProgressNotification");
		$»spos = $GLOBALS['%s']->length;
		$progressEvent = new cocktail_core_event_ProgressEvent();
		$progressEvent->initProgressEvent("progress", false, false, $this->_nativeHttp->get_total() !== 0, $this->_nativeHttp->get_loaded(), $this->_nativeHttp->get_total());
		$this->dispatchEvent($progressEvent);
		$GLOBALS['%s']->pop();
	}
	public function onHttpProgressTick($timeStamp) {
		$GLOBALS['%s']->push("cocktail.core.http.XMLHTTPRequest::onHttpProgressTick");
		$»spos = $GLOBALS['%s']->length;
		$this->status = $this->_nativeHttp->status;
		if($this->_error === true) {
			$GLOBALS['%s']->pop();
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
				{
					$GLOBALS['%s']->pop();
					return;
				}
			}
		}
		cocktail_Lib::get_document()->timer->delay((isset($this->onHttpProgressTick) ? $this->onHttpProgressTick: array($this, "onHttpProgressTick")), 50);
		$GLOBALS['%s']->pop();
	}
	public function setRequestHeader($header, $value) {
		$GLOBALS['%s']->push("cocktail.core.http.XMLHTTPRequest::setRequestHeader");
		$»spos = $GLOBALS['%s']->length;
		if($this->readyState !== 1 || $this->_send === true) {
			throw new HException(11);
			{
				$GLOBALS['%s']->pop();
				return;
			}
		}
		switch(strtolower($header)) {
		case "accept-charset":case "accept-encoding":case "access-control-request-headers":case "access-control-request-method":case "connection":case "content-length":case "cookie":case "cookie2":case "content-transfer-encoding":case "date":case "expect":case "host":case "keep-alive":case "origin":case "referer":case "te":case "trailer":case "transfer-encoding":case "upgrade":case "user-agent":case "via":{
			$GLOBALS['%s']->pop();
			return;
		}break;
		}
		if(_hx_substr(strtolower($header), 0, 6) === "proxy-" || _hx_substr(strtolower($header), 0, 4) === "sec-") {
			$GLOBALS['%s']->pop();
			return;
		}
		if($this->_authorRequestHeaders->exists($header) === false) {
			$this->_authorRequestHeaders->set($header, $value);
		} else {
			$this->_authorRequestHeaders->set($header, $value);
		}
		$GLOBALS['%s']->pop();
	}
	public function abort() {
		$GLOBALS['%s']->push("cocktail.core.http.XMLHTTPRequest::abort");
		$»spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public function send($data = null) {
		$GLOBALS['%s']->push("cocktail.core.http.XMLHTTPRequest::send");
		$»spos = $GLOBALS['%s']->length;
		if($this->readyState !== 1 || $this->_send === true) {
			throw new HException(11);
			{
				$GLOBALS['%s']->pop();
				return;
			}
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
			if($this->_registeredEventListeners !== null) {
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
		$this->_nativeHttp->load($this->_url, $this->_method, $data, $this->_authorRequestHeaders, cocktail_port_platform_nativeHttp_DataFormatValue::$TEXT);
		$this->onHttpProgressTick(0);
		$GLOBALS['%s']->pop();
	}
	public function open($method, $url, $async = null, $user = null, $password = null) {
		$GLOBALS['%s']->push("cocktail.core.http.XMLHTTPRequest::open");
		$»spos = $GLOBALS['%s']->length;
		if($async === null) {
			$async = true;
		}
		switch(strtolower($method)) {
		case "delete":case "get":case "head":case "options":case "post":case "put":{
		}break;
		case "connect":case "trace":case "track":{
			throw new HException(18);
			{
				$GLOBALS['%s']->pop();
				return;
			}
		}break;
		default:{
			throw new HException(12);
			{
				$GLOBALS['%s']->pop();
				return;
			}
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
		$GLOBALS['%s']->pop();
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

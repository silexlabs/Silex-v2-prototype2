<?php

class cocktail_core_http_XMLHttpRequestUpload extends cocktail_core_event_XMLHttpRequestEventTarget {
	public function __construct() { if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.http.XMLHttpRequestUpload::new");
		$»spos = $GLOBALS['%s']->length;
		parent::__construct();
		$GLOBALS['%s']->pop();
	}}
	static $__properties__ = array("set_onloadStart" => "set_onLoadStart","set_onprogress" => "set_onProgress","set_onabort" => "set_onAbort","set_onerror" => "set_onError","set_onload" => "set_onLoad","set_ontimeout" => "set_onTimeout","set_onloadend" => "set_onLoadEnd");
	function __toString() { return 'cocktail.core.http.XMLHttpRequestUpload'; }
}

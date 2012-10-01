<?php

class cocktail_port_server_NativeWindow extends cocktail_port_platform_nativeWindow_AbstractNativeWindow {
	public function __construct() { if(!php_Boot::$skip_constructor) {
		parent::__construct();
	}}
	static $__properties__ = array("get_innerHeight" => "get_innerHeight","get_innerWidth" => "get_innerWidth");
	function __toString() { return 'cocktail.port.server.NativeWindow'; }
}

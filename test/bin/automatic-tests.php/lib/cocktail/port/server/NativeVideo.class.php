<?php

class cocktail_port_server_NativeVideo extends cocktail_port_platform_nativeMedia_NativeMedia {
	public function __construct() { if(!php_Boot::$skip_constructor) {
		parent::__construct();
	}}
	static $__properties__ = array("get_duration" => "get_duration","set_volume" => "set_volume","set_src" => "set_src","get_width" => "get_width","get_height" => "get_height","get_currentTime" => "get_currentTime","get_nativeElement" => "get_nativeElement","get_bytesLoaded" => "get_bytesLoaded","get_bytesTotal" => "get_bytesTotal");
	function __toString() { return 'cocktail.port.server.NativeVideo'; }
}

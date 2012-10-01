<?php

class cocktail_port_server_Keyboard extends cocktail_port_platform_keyboard_AbstractKeyboard {
	public function __construct() { if(!php_Boot::$skip_constructor) {
		parent::__construct();
	}}
	function __toString() { return 'cocktail.port.server.Keyboard'; }
}

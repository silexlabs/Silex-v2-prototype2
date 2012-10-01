<?php

class cocktail_port_server_Mouse extends cocktail_port_platform_mouse_AbstractMouse {
	public function __construct() { if(!php_Boot::$skip_constructor) {
		parent::__construct();
	}}
	function __toString() { return 'cocktail.port.server.Mouse'; }
}

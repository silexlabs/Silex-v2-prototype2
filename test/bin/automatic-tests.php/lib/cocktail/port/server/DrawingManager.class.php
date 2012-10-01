<?php

class cocktail_port_server_DrawingManager extends cocktail_core_drawing_AbstractDrawingManager {
	public function __construct($width, $height) { if(!php_Boot::$skip_constructor) {
		parent::__construct($width,$height);
	}}
	function __toString() { return 'cocktail.port.server.DrawingManager'; }
}

<?php

class cocktail_port_server_FontManagerImpl extends cocktail_core_font_AbstractFontManagerImpl {
	public function __construct() { if(!php_Boot::$skip_constructor) {
		parent::__construct();
	}}
	function __toString() { return 'cocktail.port.server.FontManagerImpl'; }
}

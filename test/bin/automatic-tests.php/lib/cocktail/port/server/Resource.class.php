<?php

class cocktail_port_server_Resource extends cocktail_core_resource_AbstractResource {
	public function __construct($url) { if(!php_Boot::$skip_constructor) {
		parent::__construct($url);
	}}
	function __toString() { return 'cocktail.port.server.Resource'; }
}

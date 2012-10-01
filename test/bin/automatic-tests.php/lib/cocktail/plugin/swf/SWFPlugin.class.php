<?php

class cocktail_plugin_swf_SWFPlugin extends cocktail_plugin_Plugin {
	public function __construct($elementAttributes, $params, $loadComplete, $loadError) { if(!php_Boot::$skip_constructor) {
		parent::__construct($elementAttributes,$params,$loadComplete,$loadError);
	}}
	static $__properties__ = array("set_viewport" => "set_viewport","get_viewport" => "get_viewport");
	function __toString() { return 'cocktail.plugin.swf.SWFPlugin'; }
}

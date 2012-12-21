<?php

class cocktail_core_utils_Utils {
	public function __construct() { if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.utils.Utils::new");
		$»spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}}
	static function clear($array) {
		$GLOBALS['%s']->push("cocktail.core.utils.Utils::clear");
		$»spos = $GLOBALS['%s']->length;
		$array = new _hx_array(array());
		{
			$GLOBALS['%s']->pop();
			return $array;
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'cocktail.core.utils.Utils'; }
}

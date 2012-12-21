<?php

class cocktail_Lib {
	public function __construct() { if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.Lib::new");
		$�spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}}
	static $document;
	static $window;
	static function init() {
		$GLOBALS['%s']->push("cocktail.Lib::init");
		$�spos = $GLOBALS['%s']->length;
		cocktail_Lib::$window = new cocktail_core_window_Window();
		cocktail_Lib::$document = cocktail_Lib::get_window()->document;
		$GLOBALS['%s']->pop();
	}
	static function get_document() {
		$GLOBALS['%s']->push("cocktail.Lib::get_document");
		$�spos = $GLOBALS['%s']->length;
		if(cocktail_Lib::$document === null) {
			cocktail_Lib::init();
		}
		{
			$�tmp = cocktail_Lib::$document;
			$GLOBALS['%s']->pop();
			return $�tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function get_window() {
		$GLOBALS['%s']->push("cocktail.Lib::get_window");
		$�spos = $GLOBALS['%s']->length;
		if(cocktail_Lib::$window === null) {
			cocktail_Lib::init();
		}
		{
			$�tmp = cocktail_Lib::$window;
			$GLOBALS['%s']->pop();
			return $�tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static $__properties__ = array("get_window" => "get_window","get_document" => "get_document");
	function __toString() { return 'cocktail.Lib'; }
}

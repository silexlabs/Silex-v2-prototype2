<?php

class cocktail_core_css_SelectorComponentValue extends Enum {
	public static function COMBINATOR($value) { return new cocktail_core_css_SelectorComponentValue("COMBINATOR", 1, array($value)); }
	public static function SIMPLE_SELECTOR_SEQUENCE($value) { return new cocktail_core_css_SelectorComponentValue("SIMPLE_SELECTOR_SEQUENCE", 0, array($value)); }
	public static $__constructors = array(1 => 'COMBINATOR', 0 => 'SIMPLE_SELECTOR_SEQUENCE');
	}

<?php

class cocktail_core_style_TransitionProperty extends Enum {
	public static function _list($value) { return new cocktail_core_style_TransitionProperty("_list", 2, array($value)); }
	public static $all;
	public static $none;
	public static $__constructors = array(2 => '_list', 1 => 'all', 0 => 'none');
	}
cocktail_core_style_TransitionProperty::$all = new cocktail_core_style_TransitionProperty("all", 1);
cocktail_core_style_TransitionProperty::$none = new cocktail_core_style_TransitionProperty("none", 0);

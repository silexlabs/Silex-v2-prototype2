<?php

class cocktail_core_css_CSSTimeValue extends Enum {
	public static function MILLISECONDS($value) { return new cocktail_core_css_CSSTimeValue("MILLISECONDS", 1, array($value)); }
	public static function SECONDS($value) { return new cocktail_core_css_CSSTimeValue("SECONDS", 0, array($value)); }
	public static $__constructors = array(1 => 'MILLISECONDS', 0 => 'SECONDS');
	}

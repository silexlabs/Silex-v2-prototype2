<?php

class cocktail_core_css_CSSAngleValue extends Enum {
	public static function DEG($value) { return new cocktail_core_css_CSSAngleValue("DEG", 0, array($value)); }
	public static function GRAD($value) { return new cocktail_core_css_CSSAngleValue("GRAD", 1, array($value)); }
	public static function RAD($value) { return new cocktail_core_css_CSSAngleValue("RAD", 2, array($value)); }
	public static function TURN($value) { return new cocktail_core_css_CSSAngleValue("TURN", 3, array($value)); }
	public static $__constructors = array(0 => 'DEG', 1 => 'GRAD', 2 => 'RAD', 3 => 'TURN');
	}

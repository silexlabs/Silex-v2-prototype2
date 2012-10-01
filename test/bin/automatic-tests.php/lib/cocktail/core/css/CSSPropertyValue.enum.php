<?php

class cocktail_core_css_CSSPropertyValue extends Enum {
	public static function ABSOLUTE_LENGTH($value) { return new cocktail_core_css_CSSPropertyValue("ABSOLUTE_LENGTH", 17, array($value)); }
	public static function ANGLE($value) { return new cocktail_core_css_CSSPropertyValue("ANGLE", 8, array($value)); }
	public static function COLOR($value) { return new cocktail_core_css_CSSPropertyValue("COLOR", 12, array($value)); }
	public static function CSS_LIST($value) { return new cocktail_core_css_CSSPropertyValue("CSS_LIST", 14, array($value)); }
	public static function CUBIC_BEZIER($x1, $y1, $x2, $y2) { return new cocktail_core_css_CSSPropertyValue("CUBIC_BEZIER", 19, array($x1, $y1, $x2, $y2)); }
	public static function FREQUENCY($value) { return new cocktail_core_css_CSSPropertyValue("FREQUENCY", 10, array($value)); }
	public static function GROUP($value) { return new cocktail_core_css_CSSPropertyValue("GROUP", 13, array($value)); }
	public static function IDENTIFIER($value) { return new cocktail_core_css_CSSPropertyValue("IDENTIFIER", 3, array($value)); }
	public static $INHERIT;
	public static $INITIAL;
	public static function INTEGER($value) { return new cocktail_core_css_CSSPropertyValue("INTEGER", 0, array($value)); }
	public static function KEYWORD($value) { return new cocktail_core_css_CSSPropertyValue("KEYWORD", 4, array($value)); }
	public static function LENGTH($value) { return new cocktail_core_css_CSSPropertyValue("LENGTH", 7, array($value)); }
	public static function NUMBER($value) { return new cocktail_core_css_CSSPropertyValue("NUMBER", 1, array($value)); }
	public static function PERCENTAGE($value) { return new cocktail_core_css_CSSPropertyValue("PERCENTAGE", 2, array($value)); }
	public static function RESOLUTION($value) { return new cocktail_core_css_CSSPropertyValue("RESOLUTION", 11, array($value)); }
	public static function STEPS($intervalNumbers, $intervalChange) { return new cocktail_core_css_CSSPropertyValue("STEPS", 18, array($intervalNumbers, $intervalChange)); }
	public static function STRING($value) { return new cocktail_core_css_CSSPropertyValue("STRING", 6, array($value)); }
	public static function TIME($value) { return new cocktail_core_css_CSSPropertyValue("TIME", 9, array($value)); }
	public static function TRANSFORM_FUNCTION($value) { return new cocktail_core_css_CSSPropertyValue("TRANSFORM_FUNCTION", 20, array($value)); }
	public static function URL($value) { return new cocktail_core_css_CSSPropertyValue("URL", 5, array($value)); }
	public static $__constructors = array(17 => 'ABSOLUTE_LENGTH', 8 => 'ANGLE', 12 => 'COLOR', 14 => 'CSS_LIST', 19 => 'CUBIC_BEZIER', 10 => 'FREQUENCY', 13 => 'GROUP', 3 => 'IDENTIFIER', 15 => 'INHERIT', 16 => 'INITIAL', 0 => 'INTEGER', 4 => 'KEYWORD', 7 => 'LENGTH', 1 => 'NUMBER', 2 => 'PERCENTAGE', 11 => 'RESOLUTION', 18 => 'STEPS', 6 => 'STRING', 9 => 'TIME', 20 => 'TRANSFORM_FUNCTION', 5 => 'URL');
	}
cocktail_core_css_CSSPropertyValue::$INHERIT = new cocktail_core_css_CSSPropertyValue("INHERIT", 15);
cocktail_core_css_CSSPropertyValue::$INITIAL = new cocktail_core_css_CSSPropertyValue("INITIAL", 16);

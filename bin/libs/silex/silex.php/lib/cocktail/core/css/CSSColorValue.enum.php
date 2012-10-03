<?php

class cocktail_core_css_CSSColorValue extends Enum {
	public static $CURRENT_COLOR;
	public static function HEX($value) { return new cocktail_core_css_CSSColorValue("HEX", 4, array($value)); }
	public static function HSL($hue, $saturation, $lightness) { return new cocktail_core_css_CSSColorValue("HSL", 5, array($hue, $saturation, $lightness)); }
	public static function HSLA($hue, $saturation, $lightness, $alpha) { return new cocktail_core_css_CSSColorValue("HSLA", 6, array($hue, $saturation, $lightness, $alpha)); }
	public static function KEYWORD($value) { return new cocktail_core_css_CSSColorValue("KEYWORD", 7, array($value)); }
	public static function RGB($red, $green, $blue) { return new cocktail_core_css_CSSColorValue("RGB", 0, array($red, $green, $blue)); }
	public static function RGBA($red, $green, $blue, $alpha) { return new cocktail_core_css_CSSColorValue("RGBA", 2, array($red, $green, $blue, $alpha)); }
	public static function RGBA_PERCENTAGE($red, $green, $blue, $alpha) { return new cocktail_core_css_CSSColorValue("RGBA_PERCENTAGE", 3, array($red, $green, $blue, $alpha)); }
	public static function RGB_PERCENTAGE($red, $green, $blue) { return new cocktail_core_css_CSSColorValue("RGB_PERCENTAGE", 1, array($red, $green, $blue)); }
	public static $TRANSPARENT;
	public static $__constructors = array(9 => 'CURRENT_COLOR', 4 => 'HEX', 5 => 'HSL', 6 => 'HSLA', 7 => 'KEYWORD', 0 => 'RGB', 2 => 'RGBA', 3 => 'RGBA_PERCENTAGE', 1 => 'RGB_PERCENTAGE', 8 => 'TRANSPARENT');
	}
cocktail_core_css_CSSColorValue::$CURRENT_COLOR = new cocktail_core_css_CSSColorValue("CURRENT_COLOR", 9);
cocktail_core_css_CSSColorValue::$TRANSPARENT = new cocktail_core_css_CSSColorValue("TRANSPARENT", 8);

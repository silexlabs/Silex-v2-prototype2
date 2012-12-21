<?php

class cocktail_core_css_CSSResolutionValue extends Enum {
	public static function DPCM($value) { return new cocktail_core_css_CSSResolutionValue("DPCM", 1, array($value)); }
	public static function DPI($value) { return new cocktail_core_css_CSSResolutionValue("DPI", 0, array($value)); }
	public static function DPPX($value) { return new cocktail_core_css_CSSResolutionValue("DPPX", 2, array($value)); }
	public static $__constructors = array(1 => 'DPCM', 0 => 'DPI', 2 => 'DPPX');
	}

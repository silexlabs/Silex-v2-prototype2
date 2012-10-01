<?php

class cocktail_core_css_CSSLengthValue extends Enum {
	public static function CM($value) { return new cocktail_core_css_CSSLengthValue("CM", 1, array($value)); }
	public static function EM($value) { return new cocktail_core_css_CSSLengthValue("EM", 6, array($value)); }
	public static function EX($value) { return new cocktail_core_css_CSSLengthValue("EX", 7, array($value)); }
	public static function IN($value) { return new cocktail_core_css_CSSLengthValue("IN", 5, array($value)); }
	public static function MM($value) { return new cocktail_core_css_CSSLengthValue("MM", 2, array($value)); }
	public static function PC($value) { return new cocktail_core_css_CSSLengthValue("PC", 4, array($value)); }
	public static function PT($value) { return new cocktail_core_css_CSSLengthValue("PT", 3, array($value)); }
	public static function PX($value) { return new cocktail_core_css_CSSLengthValue("PX", 0, array($value)); }
	public static $__constructors = array(1 => 'CM', 6 => 'EM', 7 => 'EX', 5 => 'IN', 2 => 'MM', 4 => 'PC', 3 => 'PT', 0 => 'PX');
	}

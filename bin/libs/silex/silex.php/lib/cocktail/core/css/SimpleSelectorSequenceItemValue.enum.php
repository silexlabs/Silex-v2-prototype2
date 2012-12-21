<?php

class cocktail_core_css_SimpleSelectorSequenceItemValue extends Enum {
	public static function ATTRIBUTE($value) { return new cocktail_core_css_SimpleSelectorSequenceItemValue("ATTRIBUTE", 0, array($value)); }
	public static function CSS_CLASS($value) { return new cocktail_core_css_SimpleSelectorSequenceItemValue("CSS_CLASS", 2, array($value)); }
	public static function ID($value) { return new cocktail_core_css_SimpleSelectorSequenceItemValue("ID", 3, array($value)); }
	public static function PSEUDO_CLASS($value) { return new cocktail_core_css_SimpleSelectorSequenceItemValue("PSEUDO_CLASS", 1, array($value)); }
	public static $__constructors = array(0 => 'ATTRIBUTE', 2 => 'CSS_CLASS', 3 => 'ID', 1 => 'PSEUDO_CLASS');
	}

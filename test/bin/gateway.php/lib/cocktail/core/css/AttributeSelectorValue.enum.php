<?php

class cocktail_core_css_AttributeSelectorValue extends Enum {
	public static function ATTRIBUTE($value) { return new cocktail_core_css_AttributeSelectorValue("ATTRIBUTE", 0, array($value)); }
	public static function ATTRIBUTE_LIST($name, $value) { return new cocktail_core_css_AttributeSelectorValue("ATTRIBUTE_LIST", 2, array($name, $value)); }
	public static function ATTRIBUTE_VALUE($name, $value) { return new cocktail_core_css_AttributeSelectorValue("ATTRIBUTE_VALUE", 1, array($name, $value)); }
	public static function ATTRIBUTE_VALUE_BEGINS($name, $value) { return new cocktail_core_css_AttributeSelectorValue("ATTRIBUTE_VALUE_BEGINS", 3, array($name, $value)); }
	public static function ATTRIBUTE_VALUE_BEGINS_HYPHEN_LIST($name, $value) { return new cocktail_core_css_AttributeSelectorValue("ATTRIBUTE_VALUE_BEGINS_HYPHEN_LIST", 6, array($name, $value)); }
	public static function ATTRIBUTE_VALUE_CONTAINS($name, $value) { return new cocktail_core_css_AttributeSelectorValue("ATTRIBUTE_VALUE_CONTAINS", 5, array($name, $value)); }
	public static function ATTRIBUTE_VALUE_ENDS($name, $value) { return new cocktail_core_css_AttributeSelectorValue("ATTRIBUTE_VALUE_ENDS", 4, array($name, $value)); }
	public static $__constructors = array(0 => 'ATTRIBUTE', 2 => 'ATTRIBUTE_LIST', 1 => 'ATTRIBUTE_VALUE', 3 => 'ATTRIBUTE_VALUE_BEGINS', 6 => 'ATTRIBUTE_VALUE_BEGINS_HYPHEN_LIST', 5 => 'ATTRIBUTE_VALUE_CONTAINS', 4 => 'ATTRIBUTE_VALUE_ENDS');
	}

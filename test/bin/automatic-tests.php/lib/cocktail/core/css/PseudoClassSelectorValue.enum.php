<?php

class cocktail_core_css_PseudoClassSelectorValue extends Enum {
	public static function LANG($value) { return new cocktail_core_css_PseudoClassSelectorValue("LANG", 3, array($value)); }
	public static function LINK($value) { return new cocktail_core_css_PseudoClassSelectorValue("LINK", 1, array($value)); }
	public static function NOT($value) { return new cocktail_core_css_PseudoClassSelectorValue("NOT", 6, array($value)); }
	public static function STRUCTURAL($value) { return new cocktail_core_css_PseudoClassSelectorValue("STRUCTURAL", 0, array($value)); }
	public static $TARGET;
	public static function UI_ELEMENT_STATES($value) { return new cocktail_core_css_PseudoClassSelectorValue("UI_ELEMENT_STATES", 5, array($value)); }
	public static function USER_ACTION($value) { return new cocktail_core_css_PseudoClassSelectorValue("USER_ACTION", 4, array($value)); }
	public static $__constructors = array(3 => 'LANG', 1 => 'LINK', 6 => 'NOT', 0 => 'STRUCTURAL', 2 => 'TARGET', 5 => 'UI_ELEMENT_STATES', 4 => 'USER_ACTION');
	}
cocktail_core_css_PseudoClassSelectorValue::$TARGET = new cocktail_core_css_PseudoClassSelectorValue("TARGET", 2);

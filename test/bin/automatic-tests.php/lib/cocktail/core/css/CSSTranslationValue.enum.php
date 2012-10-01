<?php

class cocktail_core_css_CSSTranslationValue extends Enum {
	public static function ABSOLUTE_LENGTH($value) { return new cocktail_core_css_CSSTranslationValue("ABSOLUTE_LENGTH", 0, array($value)); }
	public static function LENGTH($value) { return new cocktail_core_css_CSSTranslationValue("LENGTH", 1, array($value)); }
	public static function PERCENTAGE($value) { return new cocktail_core_css_CSSTranslationValue("PERCENTAGE", 2, array($value)); }
	public static $__constructors = array(0 => 'ABSOLUTE_LENGTH', 1 => 'LENGTH', 2 => 'PERCENTAGE');
	}

<?php

class cocktail_core_css_SimpleSelectorSequenceStartValue extends Enum {
	public static function TYPE($value) { return new cocktail_core_css_SimpleSelectorSequenceStartValue("TYPE", 1, array($value)); }
	public static $UNIVERSAL;
	public static $__constructors = array(1 => 'TYPE', 0 => 'UNIVERSAL');
	}
cocktail_core_css_SimpleSelectorSequenceStartValue::$UNIVERSAL = new cocktail_core_css_SimpleSelectorSequenceStartValue("UNIVERSAL", 0);

<?php

class cocktail_core_css_CSSFrequencyValue extends Enum {
	public static function HERTZ($value) { return new cocktail_core_css_CSSFrequencyValue("HERTZ", 0, array($value)); }
	public static function KILO_HERTZ($value) { return new cocktail_core_css_CSSFrequencyValue("KILO_HERTZ", 1, array($value)); }
	public static $__constructors = array(0 => 'HERTZ', 1 => 'KILO_HERTZ');
	}

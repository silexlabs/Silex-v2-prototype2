<?php

class cocktail_core_css_CSSTransformFunctionValue extends Enum {
	public static function MATRIX($data) { return new cocktail_core_css_CSSTransformFunctionValue("MATRIX", 0, array($data)); }
	public static function ROTATE($angle) { return new cocktail_core_css_CSSTransformFunctionValue("ROTATE", 7, array($angle)); }
	public static function SCALE($sx, $sy) { return new cocktail_core_css_CSSTransformFunctionValue("SCALE", 4, array($sx, $sy)); }
	public static function SCALE_X($sx) { return new cocktail_core_css_CSSTransformFunctionValue("SCALE_X", 5, array($sx)); }
	public static function SCALE_Y($sy) { return new cocktail_core_css_CSSTransformFunctionValue("SCALE_Y", 6, array($sy)); }
	public static function SKEW($angleX, $angleY) { return new cocktail_core_css_CSSTransformFunctionValue("SKEW", 10, array($angleX, $angleY)); }
	public static function SKEW_X($angle) { return new cocktail_core_css_CSSTransformFunctionValue("SKEW_X", 8, array($angle)); }
	public static function SKEW_Y($angle) { return new cocktail_core_css_CSSTransformFunctionValue("SKEW_Y", 9, array($angle)); }
	public static function TRANSLATE($tx, $ty) { return new cocktail_core_css_CSSTransformFunctionValue("TRANSLATE", 1, array($tx, $ty)); }
	public static function TRANSLATE_X($tx) { return new cocktail_core_css_CSSTransformFunctionValue("TRANSLATE_X", 2, array($tx)); }
	public static function TRANSLATE_Y($ty) { return new cocktail_core_css_CSSTransformFunctionValue("TRANSLATE_Y", 3, array($ty)); }
	public static $__constructors = array(0 => 'MATRIX', 7 => 'ROTATE', 4 => 'SCALE', 5 => 'SCALE_X', 6 => 'SCALE_Y', 10 => 'SKEW', 8 => 'SKEW_X', 9 => 'SKEW_Y', 1 => 'TRANSLATE', 2 => 'TRANSLATE_X', 3 => 'TRANSLATE_Y');
	}

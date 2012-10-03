<?php

class cocktail_core_style_computer_DisplayStylesComputer {
	public function __construct() { if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.style.computer.DisplayStylesComputer::new");
		$製pos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}}
	static function compute($style) {
		$GLOBALS['%s']->push("cocktail.core.style.computer.DisplayStylesComputer::compute");
		$製pos = $GLOBALS['%s']->length;
		$computedStyle = $style->computedStyle;
		$computedStyle->cssFloat = cocktail_core_style_computer_DisplayStylesComputer::getComputedFloat($style, $computedStyle->position);
		$computedStyle->display = cocktail_core_style_computer_DisplayStylesComputer::getComputedDisplay($style, $computedStyle->cssFloat, $computedStyle->position);
		$computedStyle->clear = cocktail_core_style_computer_DisplayStylesComputer::getComputedClear($style, $computedStyle->position, $computedStyle->display);
		$GLOBALS['%s']->pop();
	}
	static function getComputedFloat($style, $computedPosition) {
		$GLOBALS['%s']->push("cocktail.core.style.computer.DisplayStylesComputer::getComputedFloat");
		$製pos = $GLOBALS['%s']->length;
		$ret = null;
		if($computedPosition === cocktail_core_style_Position::$absolute || $computedPosition === cocktail_core_style_Position::$fixed) {
			$ret = cocktail_core_style_CSSFloat::$none;
		} else {
			$ret = $style->cssFloat;
		}
		{
			$GLOBALS['%s']->pop();
			return $ret;
		}
		$GLOBALS['%s']->pop();
	}
	static function getComputedDisplay($style, $computedFloat, $computedPosition) {
		$GLOBALS['%s']->push("cocktail.core.style.computer.DisplayStylesComputer::getComputedDisplay");
		$製pos = $GLOBALS['%s']->length;
		$ret = null;
		if($computedFloat !== cocktail_core_style_CSSFloat::$none) {
			$裨 = ($style->display);
			switch($裨->index) {
			case 2:
			case 1:
			{
				$ret = cocktail_core_style_Display::$block;
			}break;
			default:{
				$ret = $style->display;
			}break;
			}
		} else {
			if($computedPosition === cocktail_core_style_Position::$absolute || $computedPosition === cocktail_core_style_Position::$fixed) {
				$裨 = ($style->display);
				switch($裨->index) {
				case 2:
				case 1:
				{
					$ret = cocktail_core_style_Display::$block;
				}break;
				default:{
					$ret = $style->display;
				}break;
				}
			} else {
				$ret = $style->display;
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $ret;
		}
		$GLOBALS['%s']->pop();
	}
	static function getComputedClear($style, $computedPosition, $computedDisplay) {
		$GLOBALS['%s']->push("cocktail.core.style.computer.DisplayStylesComputer::getComputedClear");
		$製pos = $GLOBALS['%s']->length;
		$ret = null;
		if($computedDisplay === cocktail_core_style_Display::$cssInline || $computedDisplay === cocktail_core_style_Display::$inlineBlock) {
			$ret = cocktail_core_style_Clear::$none;
		} else {
			if($computedPosition === cocktail_core_style_Position::$absolute || $computedPosition === cocktail_core_style_Position::$fixed) {
				$ret = cocktail_core_style_Clear::$none;
			} else {
				$ret = $style->clear;
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $ret;
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'cocktail.core.style.computer.DisplayStylesComputer'; }
}

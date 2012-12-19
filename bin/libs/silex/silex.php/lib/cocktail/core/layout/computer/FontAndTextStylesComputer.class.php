<?php

class cocktail_core_layout_computer_FontAndTextStylesComputer {
	public function __construct() { if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.FontAndTextStylesComputer::new");
		$製pos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}}
	static function compute($style, $containingBlockData) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.FontAndTextStylesComputer::compute");
		$製pos = $GLOBALS['%s']->length;
		$usedValues = $style->usedValues;
		$fontSize = $style->getAbsoluteLength(cocktail_core_layout_computer_FontAndTextStylesComputer_0($containingBlockData, $style, $usedValues));
		$usedValues->lineHeight = cocktail_core_layout_computer_FontAndTextStylesComputer::getUsedLineHeight($style, $fontSize);
		$usedValues->textIndent = cocktail_core_layout_computer_FontAndTextStylesComputer::getUsedTextIndent($style, $containingBlockData);
		$usedValues->letterSpacing = cocktail_core_layout_computer_FontAndTextStylesComputer::getUsedLetterSpacing($style);
		$GLOBALS['%s']->pop();
	}
	static function getUsedTextIndent($style, $containingBlockData) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.FontAndTextStylesComputer::getUsedTextIndent");
		$製pos = $GLOBALS['%s']->length;
		$usedTextIndent = 0.0;
		$裨 = (cocktail_core_layout_computer_FontAndTextStylesComputer_1($containingBlockData, $style, $usedTextIndent));
		switch($裨->index) {
		case 17:
		$value = $裨->params[0];
		{
			$usedTextIndent = $value;
		}break;
		case 2:
		$value = $裨->params[0];
		{
			$usedTextIndent = cocktail_core_css_CSSValueConverter::getPixelFromPercent($value, $containingBlockData->width);
		}break;
		default:{
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $usedTextIndent;
		}
		$GLOBALS['%s']->pop();
	}
	static function getUsedLineHeight($style, $fontSize) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.FontAndTextStylesComputer::getUsedLineHeight");
		$製pos = $GLOBALS['%s']->length;
		$usedLineHeight = 0.0;
		$裨 = (cocktail_core_layout_computer_FontAndTextStylesComputer_2($fontSize, $style, $usedLineHeight));
		switch($裨->index) {
		case 17:
		$value = $裨->params[0];
		{
			$usedLineHeight = $value;
		}break;
		case 4:
		$value = $裨->params[0];
		{
			$usedLineHeight = $fontSize * 1.2;
		}break;
		case 1:
		$value = $裨->params[0];
		{
			$usedLineHeight = $fontSize * $value;
		}break;
		default:{
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $usedLineHeight;
		}
		$GLOBALS['%s']->pop();
	}
	static function getUsedLetterSpacing($style) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.FontAndTextStylesComputer::getUsedLetterSpacing");
		$製pos = $GLOBALS['%s']->length;
		$usedLetterSpacing = 0.0;
		$裨 = (cocktail_core_layout_computer_FontAndTextStylesComputer_3($style, $usedLetterSpacing));
		switch($裨->index) {
		case 17:
		$value = $裨->params[0];
		{
			$usedLetterSpacing = $value;
		}break;
		case 4:
		$value = $裨->params[0];
		{
			$usedLetterSpacing = 0.0;
		}break;
		default:{
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $usedLetterSpacing;
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'cocktail.core.layout.computer.FontAndTextStylesComputer'; }
}
function cocktail_core_layout_computer_FontAndTextStylesComputer_0(&$containingBlockData, &$style, &$usedValues) {
	$製pos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("font-size", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_FontAndTextStylesComputer_4($containingBlockData, $style, $transition, $usedValues)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_FontAndTextStylesComputer_1(&$containingBlockData, &$style, &$usedTextIndent) {
	$製pos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("text-indent", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_FontAndTextStylesComputer_5($containingBlockData, $style, $transition, $usedTextIndent)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_FontAndTextStylesComputer_2(&$fontSize, &$style, &$usedLineHeight) {
	$製pos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("line-height", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_FontAndTextStylesComputer_6($fontSize, $style, $transition, $usedLineHeight)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_FontAndTextStylesComputer_3(&$style, &$usedLetterSpacing) {
	$製pos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("letter-spacing", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_FontAndTextStylesComputer_7($style, $transition, $usedLetterSpacing)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_FontAndTextStylesComputer_4(&$containingBlockData, &$style, &$transition, &$usedValues) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this = $style->computedValues;
		$typedProperty = null;
		$length = $_this->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($_this->_properties, $i)->name === "font-size") {
					$typedProperty = $_this->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}
function cocktail_core_layout_computer_FontAndTextStylesComputer_5(&$containingBlockData, &$style, &$transition, &$usedTextIndent) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this = $style->computedValues;
		$typedProperty = null;
		$length = $_this->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($_this->_properties, $i)->name === "text-indent") {
					$typedProperty = $_this->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}
function cocktail_core_layout_computer_FontAndTextStylesComputer_6(&$fontSize, &$style, &$transition, &$usedLineHeight) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this = $style->computedValues;
		$typedProperty = null;
		$length = $_this->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($_this->_properties, $i)->name === "line-height") {
					$typedProperty = $_this->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}
function cocktail_core_layout_computer_FontAndTextStylesComputer_7(&$style, &$transition, &$usedLetterSpacing) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this = $style->computedValues;
		$typedProperty = null;
		$length = $_this->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($_this->_properties, $i)->name === "letter-spacing") {
					$typedProperty = $_this->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}

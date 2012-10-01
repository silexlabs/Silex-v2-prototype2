<?php

class cocktail_core_layout_computer_FontAndTextStylesComputer {
	public function __construct() { 
	}
	static function compute($style, $containingBlockData) {
		$usedValues = $style->usedValues;
		$fontSize = $style->getAbsoluteLength($style->get_fontSize());
		$usedValues->lineHeight = cocktail_core_layout_computer_FontAndTextStylesComputer::getUsedLineHeight($style, $fontSize);
		$usedValues->textIndent = cocktail_core_layout_computer_FontAndTextStylesComputer::getUsedTextIndent($style, $containingBlockData);
		$usedValues->letterSpacing = cocktail_core_layout_computer_FontAndTextStylesComputer::getUsedLetterSpacing($style);
	}
	static function getUsedTextIndent($style, $containingBlockData) {
		$usedTextIndent = 0.0;
		$퍁 = ($style->get_textIndent());
		switch($퍁->index) {
		case 17:
		$value = $퍁->params[0];
		{
			$usedTextIndent = $value;
		}break;
		case 2:
		$value = $퍁->params[0];
		{
			$usedTextIndent = cocktail_core_css_CSSValueConverter::getPixelFromPercent($value, $containingBlockData->width);
		}break;
		default:{
		}break;
		}
		return $usedTextIndent;
	}
	static function getUsedLineHeight($style, $fontSize) {
		$usedLineHeight = 0.0;
		$퍁 = ($style->get_lineHeight());
		switch($퍁->index) {
		case 17:
		$value = $퍁->params[0];
		{
			$usedLineHeight = $value;
		}break;
		case 4:
		$value = $퍁->params[0];
		{
			$usedLineHeight = $fontSize * 1.2;
		}break;
		case 1:
		$value = $퍁->params[0];
		{
			$usedLineHeight = $fontSize * $value;
		}break;
		default:{
		}break;
		}
		return $usedLineHeight;
	}
	static function getUsedLetterSpacing($style) {
		$usedLetterSpacing = 0.0;
		$퍁 = ($style->get_letterSpacing());
		switch($퍁->index) {
		case 17:
		$value = $퍁->params[0];
		{
			$usedLetterSpacing = $value;
		}break;
		case 4:
		$value = $퍁->params[0];
		{
			$usedLetterSpacing = 0.0;
		}break;
		default:{
		}break;
		}
		return $usedLetterSpacing;
	}
	function __toString() { return 'cocktail.core.layout.computer.FontAndTextStylesComputer'; }
}

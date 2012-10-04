<?php

class cocktail_core_layout_computer_FontAndTextStylesComputer {
	public function __construct() { if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.FontAndTextStylesComputer::new");
		$»spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}}
	static function compute($style, $containingBlockData) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.FontAndTextStylesComputer::compute");
		$»spos = $GLOBALS['%s']->length;
		$usedValues = $style->usedValues;
		$fontSize = $style->getAbsoluteLength($style->get_fontSize());
		$usedValues->lineHeight = cocktail_core_layout_computer_FontAndTextStylesComputer::getUsedLineHeight($style, $fontSize);
		$usedValues->textIndent = cocktail_core_layout_computer_FontAndTextStylesComputer::getUsedTextIndent($style, $containingBlockData);
		$usedValues->letterSpacing = cocktail_core_layout_computer_FontAndTextStylesComputer::getUsedLetterSpacing($style);
		$GLOBALS['%s']->pop();
	}
	static function getUsedTextIndent($style, $containingBlockData) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.FontAndTextStylesComputer::getUsedTextIndent");
		$»spos = $GLOBALS['%s']->length;
		$usedTextIndent = 0.0;
		$»t = ($style->get_textIndent());
		switch($»t->index) {
		case 17:
		$value = $»t->params[0];
		{
			$usedTextIndent = $value;
		}break;
		case 2:
		$value = $»t->params[0];
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
		$»spos = $GLOBALS['%s']->length;
		$usedLineHeight = 0.0;
		$»t = ($style->get_lineHeight());
		switch($»t->index) {
		case 17:
		$value = $»t->params[0];
		{
			$usedLineHeight = $value;
		}break;
		case 4:
		$value = $»t->params[0];
		{
			$usedLineHeight = $fontSize * 1.2;
		}break;
		case 1:
		$value = $»t->params[0];
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
		$»spos = $GLOBALS['%s']->length;
		$usedLetterSpacing = 0.0;
		$»t = ($style->get_letterSpacing());
		switch($»t->index) {
		case 17:
		$value = $»t->params[0];
		{
			$usedLetterSpacing = $value;
		}break;
		case 4:
		$value = $»t->params[0];
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

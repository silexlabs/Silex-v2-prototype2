<?php

class cocktail_core_style_computer_FontAndTextStylesComputer {
	public function __construct() { if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.style.computer.FontAndTextStylesComputer::new");
		$»spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}}
	static function compute($style, $containingBlockData, $containingBlockFontMetricsData) {
		$GLOBALS['%s']->push("cocktail.core.style.computer.FontAndTextStylesComputer::compute");
		$»spos = $GLOBALS['%s']->length;
		$computedStyle = $style->computedStyle;
		$fontMetrics = $style->get_fontMetricsData();
		$computedStyle->set_fontSize(cocktail_core_style_computer_FontAndTextStylesComputer::getComputedFontSize($style, $containingBlockFontMetricsData->fontSize, $containingBlockFontMetricsData->xHeight));
		$computedStyle->set_lineHeight(cocktail_core_style_computer_FontAndTextStylesComputer::getComputedLineHeight($style, $fontMetrics));
		$computedStyle->verticalAlign = cocktail_core_style_computer_FontAndTextStylesComputer::getComputedVerticalAlign($style, $containingBlockFontMetricsData, $fontMetrics);
		$computedStyle->set_letterSpacing(cocktail_core_style_computer_FontAndTextStylesComputer::getComputedLetterSpacing($style, $fontMetrics));
		$computedStyle->set_wordSpacing(cocktail_core_style_computer_FontAndTextStylesComputer::getComputedWordSpacing($style, $fontMetrics));
		$computedStyle->set_textIndent(cocktail_core_style_computer_FontAndTextStylesComputer::getComputedTextIndent($style, $containingBlockData, $fontMetrics));
		$computedStyle->color = cocktail_core_style_computer_FontAndTextStylesComputer::getComputedColor($style);
		$GLOBALS['%s']->pop();
	}
	static function getComputedTextIndent($style, $containingBlockData, $fontMetrics) {
		$GLOBALS['%s']->push("cocktail.core.style.computer.FontAndTextStylesComputer::getComputedTextIndent");
		$»spos = $GLOBALS['%s']->length;
		$textIndent = null;
		$»t = ($style->textIndent);
		switch($»t->index) {
		case 0:
		$value = $»t->params[0];
		{
			$textIndent = cocktail_core_unit_UnitManager::getPixelFromLength($value, $fontMetrics->fontSize, $fontMetrics->xHeight);
		}break;
		case 1:
		$value = $»t->params[0];
		{
			$textIndent = cocktail_core_unit_UnitManager::getPixelFromPercent($value, $containingBlockData->width);
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $textIndent;
		}
		$GLOBALS['%s']->pop();
	}
	static function getComputedVerticalAlign($style, $containingBlockFontMetricsData, $fontMetrics) {
		$GLOBALS['%s']->push("cocktail.core.style.computer.FontAndTextStylesComputer::getComputedVerticalAlign");
		$»spos = $GLOBALS['%s']->length;
		$verticalAlign = null;
		$»t = ($style->verticalAlign);
		switch($»t->index) {
		case 0:
		{
			$verticalAlign = 0;
		}break;
		case 5:
		{
			$verticalAlign = 0;
		}break;
		case 1:
		{
			$verticalAlign = $containingBlockFontMetricsData->subscriptOffset;
		}break;
		case 2:
		{
			$verticalAlign = $containingBlockFontMetricsData->superscriptOffset;
		}break;
		case 4:
		{
			$verticalAlign = 0;
		}break;
		case 7:
		{
			$verticalAlign = 0;
		}break;
		case 8:
		$value = $»t->params[0];
		{
			$verticalAlign = cocktail_core_unit_UnitManager::getPixelFromPercent($value, $style->computedStyle->getLineHeight());
		}break;
		case 9:
		$value = $»t->params[0];
		{
			$verticalAlign = cocktail_core_unit_UnitManager::getPixelFromLength($value, $fontMetrics->fontSize, $fontMetrics->xHeight);
		}break;
		case 3:
		{
			$verticalAlign = 0;
		}break;
		case 6:
		{
			$verticalAlign = 0;
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $verticalAlign;
		}
		$GLOBALS['%s']->pop();
	}
	static function getComputedColor($style) {
		$GLOBALS['%s']->push("cocktail.core.style.computer.FontAndTextStylesComputer::getComputedColor");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = cocktail_core_unit_UnitManager::getColorDataFromCSSColor($style->color);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function getComputedWordSpacing($style, $fontMetrics) {
		$GLOBALS['%s']->push("cocktail.core.style.computer.FontAndTextStylesComputer::getComputedWordSpacing");
		$»spos = $GLOBALS['%s']->length;
		$wordSpacing = null;
		$»t = ($style->wordSpacing);
		switch($»t->index) {
		case 0:
		{
			$wordSpacing = 0;
		}break;
		case 1:
		$unit = $»t->params[0];
		{
			$wordSpacing = cocktail_core_unit_UnitManager::getPixelFromLength($unit, $style->computedStyle->getFontSize(), $fontMetrics->xHeight);
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $wordSpacing;
		}
		$GLOBALS['%s']->pop();
	}
	static function getComputedLineHeight($style, $fontMetrics) {
		$GLOBALS['%s']->push("cocktail.core.style.computer.FontAndTextStylesComputer::getComputedLineHeight");
		$»spos = $GLOBALS['%s']->length;
		$lineHeight = null;
		$»t = ($style->lineHeight);
		switch($»t->index) {
		case 2:
		$unit = $»t->params[0];
		{
			$lineHeight = cocktail_core_unit_UnitManager::getPixelFromLength($unit, $style->computedStyle->getFontSize(), $fontMetrics->xHeight);
		}break;
		case 0:
		{
			$lineHeight = $style->computedStyle->getFontSize() * 1.2;
		}break;
		case 3:
		$value = $»t->params[0];
		{
			$lineHeight = cocktail_core_unit_UnitManager::getPixelFromPercent($value, $style->computedStyle->getFontSize());
		}break;
		case 1:
		$value = $»t->params[0];
		{
			$lineHeight = $style->computedStyle->getFontSize() * $value;
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $lineHeight;
		}
		$GLOBALS['%s']->pop();
	}
	static function getComputedLetterSpacing($style, $fontMetrics) {
		$GLOBALS['%s']->push("cocktail.core.style.computer.FontAndTextStylesComputer::getComputedLetterSpacing");
		$»spos = $GLOBALS['%s']->length;
		$letterSpacing = null;
		$»t = ($style->letterSpacing);
		switch($»t->index) {
		case 0:
		{
			$letterSpacing = 0.0;
		}break;
		case 1:
		$unit = $»t->params[0];
		{
			$letterSpacing = cocktail_core_unit_UnitManager::getPixelFromLength($unit, $fontMetrics->fontSize, $fontMetrics->xHeight);
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $letterSpacing;
		}
		$GLOBALS['%s']->pop();
	}
	static function getComputedFontSize($style, $parentFontSize, $parentXHeight) {
		$GLOBALS['%s']->push("cocktail.core.style.computer.FontAndTextStylesComputer::getComputedFontSize");
		$»spos = $GLOBALS['%s']->length;
		$fontSize = null;
		$»t = ($style->fontSize);
		switch($»t->index) {
		case 0:
		$unit = $»t->params[0];
		{
			$fontSize = cocktail_core_unit_UnitManager::getPixelFromLength($unit, $parentFontSize, $parentXHeight);
		}break;
		case 1:
		$percent = $»t->params[0];
		{
			$fontSize = cocktail_core_unit_UnitManager::getPixelFromPercent($percent, $parentFontSize);
		}break;
		case 2:
		$value = $»t->params[0];
		{
			$fontSize = cocktail_core_unit_UnitManager::getFontSizeFromAbsoluteSizeValue($value);
		}break;
		case 3:
		$value = $»t->params[0];
		{
			$fontSize = cocktail_core_unit_UnitManager::getFontSizeFromRelativeSizeValue($value, $parentFontSize);
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $fontSize;
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'cocktail.core.style.computer.FontAndTextStylesComputer'; }
}

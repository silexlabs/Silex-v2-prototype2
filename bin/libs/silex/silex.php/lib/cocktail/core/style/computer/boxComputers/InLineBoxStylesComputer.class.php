<?php

class cocktail_core_style_computer_boxComputers_InLineBoxStylesComputer extends cocktail_core_style_computer_boxComputers_BoxStylesComputer {
	public function __construct() { if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.style.computer.boxComputers.InLineBoxStylesComputer::new");
		$製pos = $GLOBALS['%s']->length;
		parent::__construct();
		$GLOBALS['%s']->pop();
	}}
	public function getComputedHeight($style, $containingBlockData, $fontMetrics) {
		$GLOBALS['%s']->push("cocktail.core.style.computer.boxComputers.InLineBoxStylesComputer::getComputedHeight");
		$製pos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return 0.0;
		}
		$GLOBALS['%s']->pop();
	}
	public function getComputedWidth($style, $containingBlockData, $fontMetrics) {
		$GLOBALS['%s']->push("cocktail.core.style.computer.boxComputers.InLineBoxStylesComputer::getComputedWidth");
		$製pos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return 0.0;
		}
		$GLOBALS['%s']->pop();
	}
	public function getComputedAutoMargin($marginStyleValue, $opositeMargin, $containingHTMLElementDimension, $computedDimension, $isDimensionAuto, $computedPaddingsDimension, $fontSize, $xHeight, $isHorizontalMargin) {
		$GLOBALS['%s']->push("cocktail.core.style.computer.boxComputers.InLineBoxStylesComputer::getComputedAutoMargin");
		$製pos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return 0.0;
		}
		$GLOBALS['%s']->pop();
	}
	public function measureHeight($style, $containingBlockData, $fontMetrics) {
		$GLOBALS['%s']->push("cocktail.core.style.computer.boxComputers.InLineBoxStylesComputer::measureHeight");
		$製pos = $GLOBALS['%s']->length;
		$computedHeight = $this->getComputedHeight($style, $containingBlockData, $fontMetrics);
		$style->computedStyle->set_marginTop(0.0);
		$style->computedStyle->set_marginBottom(0.0);
		{
			$GLOBALS['%s']->pop();
			return $computedHeight;
		}
		$GLOBALS['%s']->pop();
	}
	public function measureAutoHeight($style, $containingBlockData, $fontMetrics) {
		$GLOBALS['%s']->push("cocktail.core.style.computer.boxComputers.InLineBoxStylesComputer::measureAutoHeight");
		$製pos = $GLOBALS['%s']->length;
		$computedHeight = $this->getComputedAutoHeight($style, $containingBlockData, $fontMetrics);
		$style->computedStyle->set_marginTop(0.0);
		$style->computedStyle->set_marginBottom(0.0);
		{
			$GLOBALS['%s']->pop();
			return $computedHeight;
		}
		$GLOBALS['%s']->pop();
	}
	public function measureVerticalPaddings($style, $containingBlockData, $fontMetrics) {
		$GLOBALS['%s']->push("cocktail.core.style.computer.boxComputers.InLineBoxStylesComputer::measureVerticalPaddings");
		$製pos = $GLOBALS['%s']->length;
		$style->computedStyle->set_paddingTop(0);
		$style->computedStyle->set_paddingBottom(0);
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'cocktail.core.style.computer.boxComputers.InLineBoxStylesComputer'; }
}

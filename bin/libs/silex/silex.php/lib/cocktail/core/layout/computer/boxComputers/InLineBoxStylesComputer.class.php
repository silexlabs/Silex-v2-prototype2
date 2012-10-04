<?php

class cocktail_core_layout_computer_boxComputers_InLineBoxStylesComputer extends cocktail_core_layout_computer_boxComputers_BoxStylesComputer {
	public function __construct() { if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.boxComputers.InLineBoxStylesComputer::new");
		$�spos = $GLOBALS['%s']->length;
		parent::__construct();
		$GLOBALS['%s']->pop();
	}}
	public function getComputedHeight($style, $containingBlockData) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.boxComputers.InLineBoxStylesComputer::getComputedHeight");
		$�spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return 0.0;
		}
		$GLOBALS['%s']->pop();
	}
	public function getComputedWidth($style, $containingBlockData) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.boxComputers.InLineBoxStylesComputer::getComputedWidth");
		$�spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return 0.0;
		}
		$GLOBALS['%s']->pop();
	}
	public function getComputedAutoMargin($marginStyleValue, $opositeMargin, $containingHTMLElementDimension, $computedDimension, $isDimensionAuto, $computedPaddingsDimension, $isHorizontalMargin) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.boxComputers.InLineBoxStylesComputer::getComputedAutoMargin");
		$�spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return 0.0;
		}
		$GLOBALS['%s']->pop();
	}
	public function measureHeight($style, $containingBlockData) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.boxComputers.InLineBoxStylesComputer::measureHeight");
		$�spos = $GLOBALS['%s']->length;
		$computedHeight = $this->getComputedHeight($style, $containingBlockData);
		$style->usedValues->marginTop = 0.0;
		$style->usedValues->marginBottom = 0.0;
		{
			$GLOBALS['%s']->pop();
			return $computedHeight;
		}
		$GLOBALS['%s']->pop();
	}
	public function measureAutoHeight($style, $containingBlockData) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.boxComputers.InLineBoxStylesComputer::measureAutoHeight");
		$�spos = $GLOBALS['%s']->length;
		$computedHeight = $this->getComputedAutoHeight($style, $containingBlockData);
		$style->usedValues->marginTop = 0.0;
		$style->usedValues->marginBottom = 0.0;
		{
			$GLOBALS['%s']->pop();
			return $computedHeight;
		}
		$GLOBALS['%s']->pop();
	}
	public function measureVerticalPaddings($style, $containingBlockData) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.boxComputers.InLineBoxStylesComputer::measureVerticalPaddings");
		$�spos = $GLOBALS['%s']->length;
		$style->usedValues->paddingTop = 0;
		$style->usedValues->paddingBottom = 0;
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'cocktail.core.layout.computer.boxComputers.InLineBoxStylesComputer'; }
}

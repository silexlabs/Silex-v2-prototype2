<?php

class cocktail_core_layout_computer_boxComputers_InLineBoxStylesComputer extends cocktail_core_layout_computer_boxComputers_BoxStylesComputer {
	public function __construct() { if(!php_Boot::$skip_constructor) {
		parent::__construct();
	}}
	public function getComputedHeight($style, $containingBlockData) {
		return 0.0;
	}
	public function getComputedWidth($style, $containingBlockData) {
		return 0.0;
	}
	public function getComputedAutoMargin($marginStyleValue, $opositeMargin, $containingHTMLElementDimension, $computedDimension, $isDimensionAuto, $computedPaddingsDimension, $isHorizontalMargin) {
		return 0.0;
	}
	public function measureHeight($style, $containingBlockData) {
		$computedHeight = $this->getComputedHeight($style, $containingBlockData);
		$style->usedValues->marginTop = 0.0;
		$style->usedValues->marginBottom = 0.0;
		return $computedHeight;
	}
	public function measureAutoHeight($style, $containingBlockData) {
		$computedHeight = $this->getComputedAutoHeight($style, $containingBlockData);
		$style->usedValues->marginTop = 0.0;
		$style->usedValues->marginBottom = 0.0;
		return $computedHeight;
	}
	public function measureVerticalPaddings($style, $containingBlockData) {
		$style->usedValues->paddingTop = 0;
		$style->usedValues->paddingBottom = 0;
	}
	function __toString() { return 'cocktail.core.layout.computer.boxComputers.InLineBoxStylesComputer'; }
}

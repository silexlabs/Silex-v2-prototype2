<?php

class cocktail_core_style_computer_boxComputers_InlineBlockBoxStylesComputer extends cocktail_core_style_computer_boxComputers_BoxStylesComputer {
	public function __construct() { if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.style.computer.boxComputers.InlineBlockBoxStylesComputer::new");
		$»spos = $GLOBALS['%s']->length;
		parent::__construct();
		$GLOBALS['%s']->pop();
	}}
	public function getComputedAutoMargin($marginStyleValue, $opositeMargin, $containingHTMLElementDimension, $computedDimension, $isDimensionAuto, $computedPaddingsDimension, $fontSize, $xHeight, $isHorizontalMargin) {
		$GLOBALS['%s']->push("cocktail.core.style.computer.boxComputers.InlineBlockBoxStylesComputer::getComputedAutoMargin");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return 0.0;
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'cocktail.core.style.computer.boxComputers.InlineBlockBoxStylesComputer'; }
}

<?php

class cocktail_core_style_computer_boxComputers_FloatBoxStylesComputer extends cocktail_core_style_computer_boxComputers_InlineBlockBoxStylesComputer {
	public function __construct() { if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.style.computer.boxComputers.FloatBoxStylesComputer::new");
		$»spos = $GLOBALS['%s']->length;
		parent::__construct();
		$GLOBALS['%s']->pop();
	}}
	public function getComputedAutoWidth($style, $containingBlockData, $fontMetrics) {
		$GLOBALS['%s']->push("cocktail.core.style.computer.boxComputers.FloatBoxStylesComputer::getComputedAutoWidth");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return 0.0;
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'cocktail.core.style.computer.boxComputers.FloatBoxStylesComputer'; }
}

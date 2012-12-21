<?php

class cocktail_core_renderer_InlineBoxRenderer extends cocktail_core_renderer_FlowBoxRenderer {
	public function __construct($node) { if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.renderer.InlineBoxRenderer::new");
		$製pos = $GLOBALS['%s']->length;
		parent::__construct($node);
		$GLOBALS['%s']->pop();
	}}
	public function updateBounds() {
		$GLOBALS['%s']->push("cocktail.core.renderer.InlineBoxRenderer::updateBounds");
		$製pos = $GLOBALS['%s']->length;
		$this->getLineBoxesBounds($this->lineBoxes, $this->get_bounds());
		$GLOBALS['%s']->pop();
	}
	public function updateLineBoxes() {
		$GLOBALS['%s']->push("cocktail.core.renderer.InlineBoxRenderer::updateLineBoxes");
		$製pos = $GLOBALS['%s']->length;
		$this->lineBoxes = new _hx_array(array());
		$child = $this->firstChild;
		while($child !== null) {
			$child->updateLineBoxes();
			$child = $child->nextSibling;
		}
		$GLOBALS['%s']->pop();
	}
	public function render($parentGraphicContext) {
		$GLOBALS['%s']->push("cocktail.core.renderer.InlineBoxRenderer::render");
		$製pos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	static $__properties__ = array("get_bounds" => "get_bounds","get_globalBounds" => "get_globalBounds","get_scrollableBounds" => "get_scrollableBounds","set_scrollLeft" => "set_scrollLeft","get_scrollLeft" => "get_scrollLeft","set_scrollTop" => "set_scrollTop","get_scrollTop" => "get_scrollTop","get_scrollWidth" => "get_scrollWidth","get_scrollHeight" => "get_scrollHeight");
	function __toString() { return 'cocktail.core.renderer.InlineBoxRenderer'; }
}

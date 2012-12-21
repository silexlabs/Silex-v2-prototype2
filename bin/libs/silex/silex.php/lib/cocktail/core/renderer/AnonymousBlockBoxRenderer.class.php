<?php

class cocktail_core_renderer_AnonymousBlockBoxRenderer extends cocktail_core_renderer_BlockBoxRenderer {
	public function __construct() { if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.renderer.AnonymousBlockBoxRenderer::new");
		$製pos = $GLOBALS['%s']->length;
		parent::__construct(cocktail_Lib::get_document()->createElement("DIV"));
		$GLOBALS['%s']->pop();
	}}
	public function isInlineLevel() {
		$GLOBALS['%s']->push("cocktail.core.renderer.AnonymousBlockBoxRenderer::isInlineLevel");
		$製pos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function createOwnLayer() {
		$GLOBALS['%s']->push("cocktail.core.renderer.AnonymousBlockBoxRenderer::createOwnLayer");
		$製pos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function isAnonymousBlockBox() {
		$GLOBALS['%s']->push("cocktail.core.renderer.AnonymousBlockBoxRenderer::isAnonymousBlockBox");
		$製pos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return true;
		}
		$GLOBALS['%s']->pop();
	}
	public function isPositioned() {
		$GLOBALS['%s']->push("cocktail.core.renderer.AnonymousBlockBoxRenderer::isPositioned");
		$製pos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function removeChild($oldChild) {
		$GLOBALS['%s']->push("cocktail.core.renderer.AnonymousBlockBoxRenderer::removeChild");
		$製pos = $GLOBALS['%s']->length;
		parent::removeChild($oldChild);
		$this->parentNode->removeChild($this);
		$GLOBALS['%s']->pop();
	}
	static $__properties__ = array("get_bounds" => "get_bounds","get_globalBounds" => "get_globalBounds","get_scrollableBounds" => "get_scrollableBounds","set_scrollLeft" => "set_scrollLeft","get_scrollLeft" => "get_scrollLeft","set_scrollTop" => "set_scrollTop","get_scrollTop" => "get_scrollTop","get_scrollWidth" => "get_scrollWidth","get_scrollHeight" => "get_scrollHeight");
	function __toString() { return 'cocktail.core.renderer.AnonymousBlockBoxRenderer'; }
}

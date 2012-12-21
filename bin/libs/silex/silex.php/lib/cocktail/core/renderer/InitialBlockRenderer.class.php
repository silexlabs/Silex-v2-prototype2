<?php

class cocktail_core_renderer_InitialBlockRenderer extends cocktail_core_renderer_BlockBoxRenderer {
	public function __construct($node) { if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.renderer.InitialBlockRenderer::new");
		$�spos = $GLOBALS['%s']->length;
		parent::__construct($node);
		$this->containingBlock = $this;
		$GLOBALS['%s']->pop();
	}}
	public function get_globalBounds() {
		$GLOBALS['%s']->push("cocktail.core.renderer.InitialBlockRenderer::get_globalBounds");
		$�spos = $GLOBALS['%s']->length;
		{
			$�tmp = $this->get_bounds();
			$GLOBALS['%s']->pop();
			return $�tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getContainingBlock() {
		$GLOBALS['%s']->push("cocktail.core.renderer.InitialBlockRenderer::getContainingBlock");
		$�spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return $this;
		}
		$GLOBALS['%s']->pop();
	}
	public function getContainerBlockData() {
		$GLOBALS['%s']->push("cocktail.core.renderer.InitialBlockRenderer::getContainerBlockData");
		$�spos = $GLOBALS['%s']->length;
		{
			$�tmp = $this->getWindowData();
			$GLOBALS['%s']->pop();
			return $�tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getWindowData() {
		$GLOBALS['%s']->push("cocktail.core.renderer.InitialBlockRenderer::getWindowData");
		$�spos = $GLOBALS['%s']->length;
		$width = cocktail_Lib::get_window()->get_innerWidth();
		$height = cocktail_Lib::get_window()->get_innerHeight();
		if($this->_verticalScrollBar !== null) {
			$width -= $this->_verticalScrollBar->coreStyle->usedValues->width;
		}
		if($this->_horizontalScrollBar !== null) {
			$height -= $this->_horizontalScrollBar->coreStyle->usedValues->height;
		}
		$this->_containerBlockData->width = $width;
		$this->_containerBlockData->height = $height;
		$this->_containerBlockData->isHeightAuto = false;
		$this->_containerBlockData->isWidthAuto = false;
		{
			$�tmp = $this->_containerBlockData;
			$GLOBALS['%s']->pop();
			return $�tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function treatVisibleOverflowAsAuto() {
		$GLOBALS['%s']->push("cocktail.core.renderer.InitialBlockRenderer::treatVisibleOverflowAsAuto");
		$�spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return true;
		}
		$GLOBALS['%s']->pop();
	}
	public function mustBubbleScrollEvent() {
		$GLOBALS['%s']->push("cocktail.core.renderer.InitialBlockRenderer::mustBubbleScrollEvent");
		$�spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return true;
		}
		$GLOBALS['%s']->pop();
	}
	public function getScrollbarContainerBlock() {
		$GLOBALS['%s']->push("cocktail.core.renderer.InitialBlockRenderer::getScrollbarContainerBlock");
		$�spos = $GLOBALS['%s']->length;
		$width = cocktail_Lib::get_window()->get_innerWidth();
		$height = cocktail_Lib::get_window()->get_innerHeight();
		{
			$�tmp = new cocktail_core_layout_ContainingBlockVO($width, false, $height, false);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function createOwnLayer() {
		$GLOBALS['%s']->push("cocktail.core.renderer.InitialBlockRenderer::createOwnLayer");
		$�spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return true;
		}
		$GLOBALS['%s']->pop();
	}
	public function establishesNewFormattingContext() {
		$GLOBALS['%s']->push("cocktail.core.renderer.InitialBlockRenderer::establishesNewFormattingContext");
		$�spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return true;
		}
		$GLOBALS['%s']->pop();
	}
	public function isPositioned() {
		$GLOBALS['%s']->push("cocktail.core.renderer.InitialBlockRenderer::isPositioned");
		$�spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return true;
		}
		$GLOBALS['%s']->pop();
	}
	public function invalidateContainingBlock($styleName) {
		$GLOBALS['%s']->push("cocktail.core.renderer.InitialBlockRenderer::invalidateContainingBlock");
		$�spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public function unregisterWithContainingBlock() {
		$GLOBALS['%s']->push("cocktail.core.renderer.InitialBlockRenderer::unregisterWithContainingBlock");
		$�spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public function registerWithContaininingBlock() {
		$GLOBALS['%s']->push("cocktail.core.renderer.InitialBlockRenderer::registerWithContaininingBlock");
		$�spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public function attachLayer() {
		$GLOBALS['%s']->push("cocktail.core.renderer.InitialBlockRenderer::attachLayer");
		$�spos = $GLOBALS['%s']->length;
		$this->layerRenderer = new cocktail_core_layer_InitialLayerRenderer($this);
		$GLOBALS['%s']->pop();
	}
	public function updateBounds() {
		$GLOBALS['%s']->push("cocktail.core.renderer.InitialBlockRenderer::updateBounds");
		$�spos = $GLOBALS['%s']->length;
		$containerBlockData = $this->getContainerBlockData();
		$this->get_bounds()->x = 0.0;
		$this->get_bounds()->y = 0.0;
		$this->get_bounds()->width = $containerBlockData->width;
		$this->get_bounds()->height = $containerBlockData->height;
		$GLOBALS['%s']->pop();
	}
	public function updateGlobalBounds() {
		$GLOBALS['%s']->push("cocktail.core.renderer.InitialBlockRenderer::updateGlobalBounds");
		$�spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	static $__properties__ = array("get_bounds" => "get_bounds","get_globalBounds" => "get_globalBounds","get_scrollableBounds" => "get_scrollableBounds","set_scrollLeft" => "set_scrollLeft","get_scrollLeft" => "get_scrollLeft","set_scrollTop" => "set_scrollTop","get_scrollTop" => "get_scrollTop","get_scrollWidth" => "get_scrollWidth","get_scrollHeight" => "get_scrollHeight");
	function __toString() { return 'cocktail.core.renderer.InitialBlockRenderer'; }
}

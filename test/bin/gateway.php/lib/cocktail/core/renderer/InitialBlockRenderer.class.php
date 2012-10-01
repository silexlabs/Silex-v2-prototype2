<?php

class cocktail_core_renderer_InitialBlockRenderer extends cocktail_core_renderer_BlockBoxRenderer {
	public function __construct($node) { if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.renderer.InitialBlockRenderer::new");
		$製pos = $GLOBALS['%s']->length;
		parent::__construct($node);
		$GLOBALS['%s']->pop();
	}}
	public function get_globalBounds() {
		$GLOBALS['%s']->push("cocktail.core.renderer.InitialBlockRenderer::get_globalBounds");
		$製pos = $GLOBALS['%s']->length;
		{
			$裨mp = $this->get_bounds();
			$GLOBALS['%s']->pop();
			return $裨mp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_bounds() {
		$GLOBALS['%s']->push("cocktail.core.renderer.InitialBlockRenderer::get_bounds");
		$製pos = $GLOBALS['%s']->length;
		$containerBlockData = $this->getContainerBlockData();
		$width = $containerBlockData->width;
		$height = $containerBlockData->height;
		{
			$裨mp = new cocktail_core_geom_RectangleVO(0.0, 0.0, $width, $height);
			$GLOBALS['%s']->pop();
			return $裨mp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getContainingBlock() {
		$GLOBALS['%s']->push("cocktail.core.renderer.InitialBlockRenderer::getContainingBlock");
		$製pos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return $this;
		}
		$GLOBALS['%s']->pop();
	}
	public function getContainerBlockData() {
		$GLOBALS['%s']->push("cocktail.core.renderer.InitialBlockRenderer::getContainerBlockData");
		$製pos = $GLOBALS['%s']->length;
		{
			$裨mp = $this->getWindowData();
			$GLOBALS['%s']->pop();
			return $裨mp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getWindowData() {
		$GLOBALS['%s']->push("cocktail.core.renderer.InitialBlockRenderer::getWindowData");
		$製pos = $GLOBALS['%s']->length;
		$width = cocktail_Lib::get_window()->get_innerWidth();
		$height = cocktail_Lib::get_window()->get_innerHeight();
		if($this->_verticalScrollBar !== null) {
			$width -= $this->_verticalScrollBar->coreStyle->usedValues->width;
		}
		if($this->_horizontalScrollBar !== null) {
			$height -= $this->_horizontalScrollBar->coreStyle->usedValues->height;
		}
		{
			$裨mp = new cocktail_core_layout_ContainingBlockVO($width, false, $height, false);
			$GLOBALS['%s']->pop();
			return $裨mp;
		}
		$GLOBALS['%s']->pop();
	}
	public function treatVisibleOverflowAsAuto() {
		$GLOBALS['%s']->push("cocktail.core.renderer.InitialBlockRenderer::treatVisibleOverflowAsAuto");
		$製pos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return true;
		}
		$GLOBALS['%s']->pop();
	}
	public function mustBubbleScrollEvent() {
		$GLOBALS['%s']->push("cocktail.core.renderer.InitialBlockRenderer::mustBubbleScrollEvent");
		$製pos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return true;
		}
		$GLOBALS['%s']->pop();
	}
	public function getScrollbarContainerBlock() {
		$GLOBALS['%s']->push("cocktail.core.renderer.InitialBlockRenderer::getScrollbarContainerBlock");
		$製pos = $GLOBALS['%s']->length;
		$width = cocktail_Lib::get_window()->get_innerWidth();
		$height = cocktail_Lib::get_window()->get_innerHeight();
		{
			$裨mp = new cocktail_core_layout_ContainingBlockVO($width, false, $height, false);
			$GLOBALS['%s']->pop();
			return $裨mp;
		}
		$GLOBALS['%s']->pop();
	}
	public function createOwnLayer() {
		$GLOBALS['%s']->push("cocktail.core.renderer.InitialBlockRenderer::createOwnLayer");
		$製pos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return true;
		}
		$GLOBALS['%s']->pop();
	}
	public function establishesNewFormattingContext() {
		$GLOBALS['%s']->push("cocktail.core.renderer.InitialBlockRenderer::establishesNewFormattingContext");
		$製pos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return true;
		}
		$GLOBALS['%s']->pop();
	}
	public function isPositioned() {
		$GLOBALS['%s']->push("cocktail.core.renderer.InitialBlockRenderer::isPositioned");
		$製pos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return true;
		}
		$GLOBALS['%s']->pop();
	}
	public function invalidateContainingBlock($invalidationReason) {
		$GLOBALS['%s']->push("cocktail.core.renderer.InitialBlockRenderer::invalidateContainingBlock");
		$製pos = $GLOBALS['%s']->length;
		$this->invalidateDocumentLayoutAndRendering();
		$GLOBALS['%s']->pop();
	}
	public function unregisterWithContainingBlock() {
		$GLOBALS['%s']->push("cocktail.core.renderer.InitialBlockRenderer::unregisterWithContainingBlock");
		$製pos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public function registerWithContaininingBlock() {
		$GLOBALS['%s']->push("cocktail.core.renderer.InitialBlockRenderer::registerWithContaininingBlock");
		$製pos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public function detachLayer() {
		$GLOBALS['%s']->push("cocktail.core.renderer.InitialBlockRenderer::detachLayer");
		$製pos = $GLOBALS['%s']->length;
		$this->layerRenderer->detach();
		$this->layerRenderer = null;
		$GLOBALS['%s']->pop();
	}
	public function attachLayer() {
		$GLOBALS['%s']->push("cocktail.core.renderer.InitialBlockRenderer::attachLayer");
		$製pos = $GLOBALS['%s']->length;
		$this->layerRenderer = new cocktail_core_layer_InitialLayerRenderer($this);
		$GLOBALS['%s']->pop();
	}
	static $__properties__ = array("set_bounds" => "set_bounds","get_bounds" => "get_bounds","get_globalBounds" => "get_globalBounds","get_scrollableBounds" => "get_scrollableBounds","set_scrollLeft" => "set_scrollLeft","get_scrollLeft" => "get_scrollLeft","set_scrollTop" => "set_scrollTop","get_scrollTop" => "get_scrollTop","get_scrollWidth" => "get_scrollWidth","get_scrollHeight" => "get_scrollHeight","get_firstChild" => "get_firstChild","get_lastChild" => "get_lastChild","get_nextSibling" => "get_nextSibling","get_previousSibling" => "get_previousSibling","set_onclick" => "set_onClick","set_ondblclick" => "set_onDblClick","set_onmousedown" => "set_onMouseDown","set_onmouseup" => "set_onMouseUp","set_onmouseover" => "set_onMouseOver","set_onmouseout" => "set_onMouseOut","set_onmousemove" => "set_onMouseMove","set_onmousewheel" => "set_onMouseWheel","set_onkeydown" => "set_onKeyDown","set_onkeyup" => "set_onKeyUp","set_onfocus" => "set_onFocus","set_onblur" => "set_onBlur","set_onresize" => "set_onResize","set_onfullscreenchange" => "set_onFullScreenChange","set_onscroll" => "set_onScroll","set_onload" => "set_onLoad","set_onerror" => "set_onError","set_onloadstart" => "set_onLoadStart","set_onprogress" => "set_onProgress","set_onsuspend" => "set_onSuspend","set_onemptied" => "set_onEmptied","set_onstalled" => "set_onStalled","set_onloadedmetadata" => "set_onLoadedMetadata","set_onloadeddata" => "set_onLoadedData","set_oncanplay" => "set_onCanPlay","set_oncanplaythrough" => "set_onCanPlayThrough","set_onplaying" => "set_onPlaying","set_onwaiting" => "set_onWaiting","set_onseeking" => "set_onSeeking","set_onseeked" => "set_onSeeked","set_onended" => "set_onEnded","set_ondurationchange" => "set_onDurationChanged","set_ontimeupdate" => "set_onTimeUpdate","set_onplay" => "set_onPlay","set_onpause" => "set_onPause","set_onvolumechange" => "set_onVolumeChange","set_ontransitionend" => "set_onTransitionEnd");
	function __toString() { return 'cocktail.core.renderer.InitialBlockRenderer'; }
}

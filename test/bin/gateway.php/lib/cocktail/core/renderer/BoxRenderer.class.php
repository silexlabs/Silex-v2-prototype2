<?php

class cocktail_core_renderer_BoxRenderer extends cocktail_core_renderer_InvalidatingElementRenderer {
	public function __construct($domNode) { if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.renderer.BoxRenderer::new");
		$�spos = $GLOBALS['%s']->length;
		parent::__construct($domNode);
		$GLOBALS['%s']->pop();
	}}
	public function getWindowData() {
		$GLOBALS['%s']->push("cocktail.core.renderer.BoxRenderer::getWindowData");
		$�spos = $GLOBALS['%s']->length;
		$window = cocktail_Lib::get_window();
		$width = $window->get_innerWidth();
		$height = $window->get_innerHeight();
		{
			$�tmp = new cocktail_core_layout_ContainingBlockVO($width, false, $height, false);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getContainerBlockData() {
		$GLOBALS['%s']->push("cocktail.core.renderer.BoxRenderer::getContainerBlockData");
		$�spos = $GLOBALS['%s']->length;
		{
			$�tmp = new cocktail_core_layout_ContainingBlockVO($this->coreStyle->usedValues->width, $this->coreStyle->isAuto($this->coreStyle->get_width()), $this->coreStyle->usedValues->height, $this->coreStyle->isAuto($this->coreStyle->get_height()));
			$GLOBALS['%s']->pop();
			return $�tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getBackgroundBounds() {
		$GLOBALS['%s']->push("cocktail.core.renderer.BoxRenderer::getBackgroundBounds");
		$�spos = $GLOBALS['%s']->length;
		$globalBounds = $this->get_globalBounds();
		$globalBounds->x -= $this->scrollOffset->x;
		$globalBounds->y -= $this->scrollOffset->y;
		{
			$GLOBALS['%s']->pop();
			return $globalBounds;
		}
		$GLOBALS['%s']->pop();
	}
	public function isClear() {
		$GLOBALS['%s']->push("cocktail.core.renderer.BoxRenderer::isClear");
		$�spos = $GLOBALS['%s']->length;
		$�t = ($this->coreStyle->getKeyword($this->coreStyle->get_clear()));
		switch($�t->index) {
		case 11:
		case 12:
		case 31:
		{
			$GLOBALS['%s']->pop();
			return true;
		}break;
		default:{
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function isTransparent() {
		$GLOBALS['%s']->push("cocktail.core.renderer.BoxRenderer::isTransparent");
		$�spos = $GLOBALS['%s']->length;
		$�t = ($this->coreStyle->get_opacity());
		switch($�t->index) {
		case 1:
		$value = $�t->params[0];
		{
			$�tmp = $value !== 1.0;
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 17:
		$value = $�t->params[0];
		{
			$�tmp = $value !== 1.0;
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		default:{
			$GLOBALS['%s']->pop();
			return false;
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	public function isVisible() {
		$GLOBALS['%s']->push("cocktail.core.renderer.BoxRenderer::isVisible");
		$�spos = $GLOBALS['%s']->length;
		{
			$�tmp = $this->coreStyle->getKeyword($this->coreStyle->get_visibility()) != cocktail_core_css_CSSKeywordValue::$HIDDEN;
			$GLOBALS['%s']->pop();
			return $�tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function isTransformed() {
		$GLOBALS['%s']->push("cocktail.core.renderer.BoxRenderer::isTransformed");
		$�spos = $GLOBALS['%s']->length;
		if($this->coreStyle->isNone($this->coreStyle->get_transform()) === false) {
			$GLOBALS['%s']->pop();
			return true;
		}
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function createOwnLayer() {
		$GLOBALS['%s']->push("cocktail.core.renderer.BoxRenderer::createOwnLayer");
		$�spos = $GLOBALS['%s']->length;
		if($this->isTransformed() === true) {
			$GLOBALS['%s']->pop();
			return true;
		} else {
			if($this->isPositioned() === true) {
				$GLOBALS['%s']->pop();
				return true;
			} else {
				if($this->isTransparent() === true) {
					$GLOBALS['%s']->pop();
					return true;
				}
			}
		}
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function isInlineLevel() {
		$GLOBALS['%s']->push("cocktail.core.renderer.BoxRenderer::isInlineLevel");
		$�spos = $GLOBALS['%s']->length;
		$ret = false;
		$�t = ($this->coreStyle->getKeyword($this->coreStyle->get_display()));
		switch($�t->index) {
		case 30:
		case 29:
		{
			$ret = true;
		}break;
		default:{
			$ret = false;
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $ret;
		}
		$GLOBALS['%s']->pop();
	}
	public function isRelativePositioned() {
		$GLOBALS['%s']->push("cocktail.core.renderer.BoxRenderer::isRelativePositioned");
		$�spos = $GLOBALS['%s']->length;
		{
			$�tmp = $this->coreStyle->getKeyword($this->coreStyle->get_position()) == cocktail_core_css_CSSKeywordValue::$RELATIVE;
			$GLOBALS['%s']->pop();
			return $�tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function isPositioned() {
		$GLOBALS['%s']->push("cocktail.core.renderer.BoxRenderer::isPositioned");
		$�spos = $GLOBALS['%s']->length;
		{
			$�tmp = $this->coreStyle->getKeyword($this->coreStyle->get_position()) != cocktail_core_css_CSSKeywordValue::$STATIC;
			$GLOBALS['%s']->pop();
			return $�tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function isFloat() {
		$GLOBALS['%s']->push("cocktail.core.renderer.BoxRenderer::isFloat");
		$�spos = $GLOBALS['%s']->length;
		{
			$�tmp = $this->coreStyle->isNone($this->coreStyle->get_cssFloat()) === false;
			$GLOBALS['%s']->pop();
			return $�tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function computeBoxModelStyles($containingBlockDimensions) {
		$GLOBALS['%s']->push("cocktail.core.renderer.BoxRenderer::computeBoxModelStyles");
		$�spos = $GLOBALS['%s']->length;
		$htmlDocument = $this->domNode->ownerDocument;
		$boxComputer = $htmlDocument->layoutManager->getBoxStylesComputer($this);
		$boxComputer->measure($this->coreStyle, $containingBlockDimensions);
		$GLOBALS['%s']->pop();
	}
	public function layoutSelf() {
		$GLOBALS['%s']->push("cocktail.core.renderer.BoxRenderer::layoutSelf");
		$�spos = $GLOBALS['%s']->length;
		$containingBlockData = $this->_containingBlock->getContainerBlockData();
		if($containingBlockData->isHeightAuto === true && $this->_containingBlock->domNode->tagName !== "BODY") {
			if($this->isPositioned() === false || $this->isRelativePositioned() === true) {
				$�t = ($this->coreStyle->get_height());
				switch($�t->index) {
				case 2:
				$value = $�t->params[0];
				{
					$this->coreStyle->computedValues->set_height("auto");
				}break;
				default:{
				}break;
				}
			}
		}
		if($this->isPositioned() === true && $this->isRelativePositioned() === false) {
			if($this->_containingBlock->isBlockContainer() === true) {
				$containingBlockUsedValues = $this->_containingBlock->coreStyle->usedValues;
				$containingBlockData->height += $containingBlockUsedValues->paddingTop + $containingBlockUsedValues->paddingBottom;
				$containingBlockData->width += $containingBlockUsedValues->paddingLeft + $containingBlockUsedValues->paddingRight;
			}
		}
		cocktail_core_layout_computer_FontAndTextStylesComputer::compute($this->coreStyle, $containingBlockData);
		$this->computeBoxModelStyles($containingBlockData);
		$GLOBALS['%s']->pop();
	}
	public function layout($forceLayout) {
		$GLOBALS['%s']->push("cocktail.core.renderer.BoxRenderer::layout");
		$�spos = $GLOBALS['%s']->length;
		if($this->_needsLayout === true || $forceLayout === true) {
			$this->layoutSelf();
			$this->_needsLayout = false;
		}
		$GLOBALS['%s']->pop();
	}
	public function renderChildren($graphicContext) {
		$GLOBALS['%s']->push("cocktail.core.renderer.BoxRenderer::renderChildren");
		$�spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public function renderBackground($graphicContext) {
		$GLOBALS['%s']->push("cocktail.core.renderer.BoxRenderer::renderBackground");
		$�spos = $GLOBALS['%s']->length;
		$backgroundBounds = $this->getBackgroundBounds();
		cocktail_core_background_BackgroundManager::render($graphicContext, $backgroundBounds, $this->coreStyle, $this);
		$GLOBALS['%s']->pop();
	}
	public function renderSelf($graphicContext) {
		$GLOBALS['%s']->push("cocktail.core.renderer.BoxRenderer::renderSelf");
		$�spos = $GLOBALS['%s']->length;
		$this->renderBackground($graphicContext);
		$GLOBALS['%s']->pop();
	}
	public function render($parentGraphicContext) {
		$GLOBALS['%s']->push("cocktail.core.renderer.BoxRenderer::render");
		$�spos = $GLOBALS['%s']->length;
		if($this->isVisible() === true) {
			$this->renderSelf($parentGraphicContext);
		}
		$this->renderChildren($parentGraphicContext);
		$GLOBALS['%s']->pop();
	}
	static $__properties__ = array("set_bounds" => "set_bounds","get_bounds" => "get_bounds","get_globalBounds" => "get_globalBounds","get_scrollableBounds" => "get_scrollableBounds","set_scrollLeft" => "set_scrollLeft","get_scrollLeft" => "get_scrollLeft","set_scrollTop" => "set_scrollTop","get_scrollTop" => "get_scrollTop","get_scrollWidth" => "get_scrollWidth","get_scrollHeight" => "get_scrollHeight","get_firstChild" => "get_firstChild","get_lastChild" => "get_lastChild","get_nextSibling" => "get_nextSibling","get_previousSibling" => "get_previousSibling","set_onclick" => "set_onClick","set_ondblclick" => "set_onDblClick","set_onmousedown" => "set_onMouseDown","set_onmouseup" => "set_onMouseUp","set_onmouseover" => "set_onMouseOver","set_onmouseout" => "set_onMouseOut","set_onmousemove" => "set_onMouseMove","set_onmousewheel" => "set_onMouseWheel","set_onkeydown" => "set_onKeyDown","set_onkeyup" => "set_onKeyUp","set_onfocus" => "set_onFocus","set_onblur" => "set_onBlur","set_onresize" => "set_onResize","set_onfullscreenchange" => "set_onFullScreenChange","set_onscroll" => "set_onScroll","set_onload" => "set_onLoad","set_onerror" => "set_onError","set_onloadstart" => "set_onLoadStart","set_onprogress" => "set_onProgress","set_onsuspend" => "set_onSuspend","set_onemptied" => "set_onEmptied","set_onstalled" => "set_onStalled","set_onloadedmetadata" => "set_onLoadedMetadata","set_onloadeddata" => "set_onLoadedData","set_oncanplay" => "set_onCanPlay","set_oncanplaythrough" => "set_onCanPlayThrough","set_onplaying" => "set_onPlaying","set_onwaiting" => "set_onWaiting","set_onseeking" => "set_onSeeking","set_onseeked" => "set_onSeeked","set_onended" => "set_onEnded","set_ondurationchange" => "set_onDurationChanged","set_ontimeupdate" => "set_onTimeUpdate","set_onplay" => "set_onPlay","set_onpause" => "set_onPause","set_onvolumechange" => "set_onVolumeChange","set_ontransitionend" => "set_onTransitionEnd");
	function __toString() { return 'cocktail.core.renderer.BoxRenderer'; }
}

<?php

class cocktail_core_renderer_BoxRenderer extends cocktail_core_renderer_InvalidatingElementRenderer {
	public function __construct($domNode) { if(!php_Boot::$skip_constructor) {
		parent::__construct($domNode);
	}}
	public function getWindowData() {
		$window = cocktail_Lib::get_window();
		$width = $window->get_innerWidth();
		$height = $window->get_innerHeight();
		return new cocktail_core_layout_ContainingBlockVO($width, false, $height, false);
	}
	public function getContainerBlockData() {
		return new cocktail_core_layout_ContainingBlockVO($this->coreStyle->usedValues->width, $this->coreStyle->isAuto($this->coreStyle->get_width()), $this->coreStyle->usedValues->height, $this->coreStyle->isAuto($this->coreStyle->get_height()));
	}
	public function getBackgroundBounds() {
		$globalBounds = $this->get_globalBounds();
		$globalBounds->x -= $this->scrollOffset->x;
		$globalBounds->y -= $this->scrollOffset->y;
		return $globalBounds;
	}
	public function isClear() {
		$퍁 = ($this->coreStyle->getKeyword($this->coreStyle->get_clear()));
		switch($퍁->index) {
		case 11:
		case 12:
		case 31:
		{
			return true;
		}break;
		default:{
		}break;
		}
		return false;
	}
	public function isTransparent() {
		$퍁 = ($this->coreStyle->get_opacity());
		switch($퍁->index) {
		case 1:
		$value = $퍁->params[0];
		{
			return $value !== 1.0;
		}break;
		case 17:
		$value = $퍁->params[0];
		{
			return $value !== 1.0;
		}break;
		default:{
			return false;
		}break;
		}
	}
	public function isVisible() {
		return $this->coreStyle->getKeyword($this->coreStyle->get_visibility()) != cocktail_core_css_CSSKeywordValue::$HIDDEN;
	}
	public function isTransformed() {
		if($this->coreStyle->isNone($this->coreStyle->get_transform()) === false) {
			return true;
		}
		return false;
	}
	public function createOwnLayer() {
		if($this->isTransformed() === true) {
			return true;
		} else {
			if($this->isPositioned() === true) {
				return true;
			} else {
				if($this->isTransparent() === true) {
					return true;
				}
			}
		}
		return false;
	}
	public function isInlineLevel() {
		$ret = false;
		$퍁 = ($this->coreStyle->getKeyword($this->coreStyle->get_display()));
		switch($퍁->index) {
		case 30:
		case 29:
		{
			$ret = true;
		}break;
		default:{
			$ret = false;
		}break;
		}
		return $ret;
	}
	public function isRelativePositioned() {
		return $this->coreStyle->getKeyword($this->coreStyle->get_position()) == cocktail_core_css_CSSKeywordValue::$RELATIVE;
	}
	public function isPositioned() {
		return $this->coreStyle->getKeyword($this->coreStyle->get_position()) != cocktail_core_css_CSSKeywordValue::$STATIC;
	}
	public function isFloat() {
		return $this->coreStyle->isNone($this->coreStyle->get_cssFloat()) === false;
	}
	public function computeBoxModelStyles($containingBlockDimensions) {
		$htmlDocument = $this->domNode->ownerDocument;
		$boxComputer = $htmlDocument->layoutManager->getBoxStylesComputer($this);
		$boxComputer->measure($this->coreStyle, $containingBlockDimensions);
	}
	public function layoutSelf() {
		$containingBlockData = $this->_containingBlock->getContainerBlockData();
		if($containingBlockData->isHeightAuto === true && $this->_containingBlock->domNode->tagName !== "BODY") {
			if($this->isPositioned() === false || $this->isRelativePositioned() === true) {
				$퍁 = ($this->coreStyle->get_height());
				switch($퍁->index) {
				case 2:
				$value = $퍁->params[0];
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
	}
	public function layout($forceLayout) {
		if($this->_needsLayout === true || $forceLayout === true) {
			$this->layoutSelf();
			$this->_needsLayout = false;
		}
	}
	public function renderChildren($graphicContext) {
	}
	public function renderBackground($graphicContext) {
		$backgroundBounds = $this->getBackgroundBounds();
		cocktail_core_background_BackgroundManager::render($graphicContext, $backgroundBounds, $this->coreStyle, $this);
	}
	public function renderSelf($graphicContext) {
		$this->renderBackground($graphicContext);
	}
	public function render($parentGraphicContext) {
		if($this->isVisible() === true) {
			$this->renderSelf($parentGraphicContext);
		}
		$this->renderChildren($parentGraphicContext);
	}
	static $__properties__ = array("set_bounds" => "set_bounds","get_bounds" => "get_bounds","get_globalBounds" => "get_globalBounds","get_scrollableBounds" => "get_scrollableBounds","set_scrollLeft" => "set_scrollLeft","get_scrollLeft" => "get_scrollLeft","set_scrollTop" => "set_scrollTop","get_scrollTop" => "get_scrollTop","get_scrollWidth" => "get_scrollWidth","get_scrollHeight" => "get_scrollHeight","get_firstChild" => "get_firstChild","get_lastChild" => "get_lastChild","get_nextSibling" => "get_nextSibling","get_previousSibling" => "get_previousSibling","set_onclick" => "set_onClick","set_ondblclick" => "set_onDblClick","set_onmousedown" => "set_onMouseDown","set_onmouseup" => "set_onMouseUp","set_onmouseover" => "set_onMouseOver","set_onmouseout" => "set_onMouseOut","set_onmousemove" => "set_onMouseMove","set_onmousewheel" => "set_onMouseWheel","set_onkeydown" => "set_onKeyDown","set_onkeyup" => "set_onKeyUp","set_onfocus" => "set_onFocus","set_onblur" => "set_onBlur","set_onresize" => "set_onResize","set_onfullscreenchange" => "set_onFullScreenChange","set_onscroll" => "set_onScroll","set_onload" => "set_onLoad","set_onerror" => "set_onError","set_onloadstart" => "set_onLoadStart","set_onprogress" => "set_onProgress","set_onsuspend" => "set_onSuspend","set_onemptied" => "set_onEmptied","set_onstalled" => "set_onStalled","set_onloadedmetadata" => "set_onLoadedMetadata","set_onloadeddata" => "set_onLoadedData","set_oncanplay" => "set_onCanPlay","set_oncanplaythrough" => "set_onCanPlayThrough","set_onplaying" => "set_onPlaying","set_onwaiting" => "set_onWaiting","set_onseeking" => "set_onSeeking","set_onseeked" => "set_onSeeked","set_onended" => "set_onEnded","set_ondurationchange" => "set_onDurationChanged","set_ontimeupdate" => "set_onTimeUpdate","set_onplay" => "set_onPlay","set_onpause" => "set_onPause","set_onvolumechange" => "set_onVolumeChange","set_ontransitionend" => "set_onTransitionEnd");
	function __toString() { return 'cocktail.core.renderer.BoxRenderer'; }
}

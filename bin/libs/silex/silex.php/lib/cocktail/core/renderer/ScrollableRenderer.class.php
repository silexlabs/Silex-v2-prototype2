<?php

class cocktail_core_renderer_ScrollableRenderer extends cocktail_core_renderer_FlowBoxRenderer {
	public function __construct($domNode) {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.renderer.ScrollableRenderer::new");
		$»spos = $GLOBALS['%s']->length;
		parent::__construct($domNode);
		$this->_isUpdatingScroll = false;
		$this->_scrollLeft = 0;
		$this->_scrollTop = 0;
		$this->_scrollableBounds = new cocktail_core_geom_RectangleVO(0.0, 0.0, 0.0, 0.0);
		$GLOBALS['%s']->pop();
	}}
	public function treatVisibleOverflowAsAuto() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ScrollableRenderer::treatVisibleOverflowAsAuto");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function canAlwaysOverflow() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ScrollableRenderer::canAlwaysOverflow");
		$»spos = $GLOBALS['%s']->length;
		if($this->treatVisibleOverflowAsAuto() === true) {
			$GLOBALS['%s']->pop();
			return false;
		}
		$»t = ($this->coreStyle->getKeyword($this->coreStyle->get_overflowX()));
		switch($»t->index) {
		case 36:
		{
		}break;
		default:{
			$GLOBALS['%s']->pop();
			return false;
		}break;
		}
		$»t = ($this->coreStyle->getKeyword($this->coreStyle->get_overflowY()));
		switch($»t->index) {
		case 36:
		{
		}break;
		default:{
			$GLOBALS['%s']->pop();
			return false;
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return true;
		}
		$GLOBALS['%s']->pop();
	}
	public function mustBubbleScrollEvent() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ScrollableRenderer::mustBubbleScrollEvent");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function dispatchScrollEvent() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ScrollableRenderer::dispatchScrollEvent");
		$»spos = $GLOBALS['%s']->length;
		$scrollEvent = new cocktail_core_event_UIEvent();
		$scrollEvent->initUIEvent("scroll", $this->mustBubbleScrollEvent(), false, null, 0.0);
		$this->domNode->dispatchEvent($scrollEvent);
		$GLOBALS['%s']->pop();
	}
	public function getHorizontalMaxScroll() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ScrollableRenderer::getHorizontalMaxScroll");
		$»spos = $GLOBALS['%s']->length;
		$maxScroll = $this->_scrollableBounds->width - $this->getContainerBlockData()->width;
		if($maxScroll < 0) {
			$GLOBALS['%s']->pop();
			return 0;
		}
		{
			$GLOBALS['%s']->pop();
			return $maxScroll;
		}
		$GLOBALS['%s']->pop();
	}
	public function getVerticalMaxScroll() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ScrollableRenderer::getVerticalMaxScroll");
		$»spos = $GLOBALS['%s']->length;
		$maxScroll = $this->_scrollableBounds->height - $this->getContainerBlockData()->height;
		if($maxScroll < 0) {
			$GLOBALS['%s']->pop();
			return 0;
		}
		{
			$GLOBALS['%s']->pop();
			return $maxScroll;
		}
		$GLOBALS['%s']->pop();
	}
	public function getScrollbarContainerBlock() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ScrollableRenderer::getScrollbarContainerBlock");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = parent::getContainerBlockData();
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function isHorizontallyScrollable($scrollOffset) {
		$GLOBALS['%s']->push("cocktail.core.renderer.ScrollableRenderer::isHorizontallyScrollable");
		$»spos = $GLOBALS['%s']->length;
		if($this->_horizontalScrollBar === null) {
			$GLOBALS['%s']->pop();
			return false;
		}
		if($scrollOffset < 0) {
			if($this->get_scrollLeft() >= $this->_scrollableBounds->width - $this->getContainerBlockData()->width) {
				$GLOBALS['%s']->pop();
				return false;
			}
		} else {
			if($scrollOffset > 0) {
				if($this->get_scrollLeft() <= 0) {
					$GLOBALS['%s']->pop();
					return false;
				}
			}
		}
		{
			$GLOBALS['%s']->pop();
			return true;
		}
		$GLOBALS['%s']->pop();
	}
	public function isVerticallyScrollable($scrollOffset) {
		$GLOBALS['%s']->push("cocktail.core.renderer.ScrollableRenderer::isVerticallyScrollable");
		$»spos = $GLOBALS['%s']->length;
		if($this->_verticalScrollBar === null) {
			$GLOBALS['%s']->pop();
			return false;
		}
		if($scrollOffset < 0) {
			if($this->get_scrollTop() >= $this->_scrollableBounds->height - $this->getContainerBlockData()->height) {
				$GLOBALS['%s']->pop();
				return false;
			}
		} else {
			if($scrollOffset > 0) {
				if($this->get_scrollTop() <= 0) {
					$GLOBALS['%s']->pop();
					return false;
				}
			}
		}
		{
			$GLOBALS['%s']->pop();
			return true;
		}
		$GLOBALS['%s']->pop();
	}
	public function onVerticalScroll($event) {
		$GLOBALS['%s']->push("cocktail.core.renderer.ScrollableRenderer::onVerticalScroll");
		$»spos = $GLOBALS['%s']->length;
		$this->set_scrollTop($this->_verticalScrollBar->scroll);
		$GLOBALS['%s']->pop();
	}
	public function onHorizontalScroll($event) {
		$GLOBALS['%s']->push("cocktail.core.renderer.ScrollableRenderer::onHorizontalScroll");
		$»spos = $GLOBALS['%s']->length;
		$this->set_scrollLeft($this->_horizontalScrollBar->scroll);
		$GLOBALS['%s']->pop();
	}
	public function attachOrDetachVerticalScrollBarIfNecessary() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ScrollableRenderer::attachOrDetachVerticalScrollBarIfNecessary");
		$»spos = $GLOBALS['%s']->length;
		if($this->_scrollableBounds->y < 0 || $this->_scrollableBounds->y + $this->_scrollableBounds->height > $this->get_bounds()->height) {
			$this->attachVerticalScrollBar();
		} else {
			$this->detachVerticalScrollBar();
		}
		$GLOBALS['%s']->pop();
	}
	public function detachVerticalScrollBar() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ScrollableRenderer::detachVerticalScrollBar");
		$»spos = $GLOBALS['%s']->length;
		if($this->_verticalScrollBar !== null) {
			$this->removeChild($this->_verticalScrollBar->elementRenderer);
			$this->_verticalScrollBar->set_onScroll(null);
			$this->_verticalScrollBar = null;
			$this->set_scrollTop(0);
		}
		$GLOBALS['%s']->pop();
	}
	public function attachVerticalScrollBar() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ScrollableRenderer::attachVerticalScrollBar");
		$»spos = $GLOBALS['%s']->length;
		if($this->_verticalScrollBar === null) {
			$this->_verticalScrollBar = new cocktail_core_html_ScrollBar(true);
			$this->_verticalScrollBar->set_ownerDocument($this->domNode->ownerDocument);
			$this->_verticalScrollBar->attach();
			$this->appendChild($this->_verticalScrollBar->elementRenderer);
			$this->_verticalScrollBar->set_onScroll((isset($this->onVerticalScroll) ? $this->onVerticalScroll: array($this, "onVerticalScroll")));
		}
		if($this->_verticalScrollBar !== null) {
			$this->_verticalScrollBar->set_maxScroll($this->getVerticalMaxScroll());
		}
		$GLOBALS['%s']->pop();
	}
	public function attachOrDetachHorizontalScrollBarIfNecessary() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ScrollableRenderer::attachOrDetachHorizontalScrollBarIfNecessary");
		$»spos = $GLOBALS['%s']->length;
		if($this->_scrollableBounds->x < 0 || $this->_scrollableBounds->x + $this->_scrollableBounds->width > $this->get_bounds()->width) {
			$this->attachHorizontalScrollBar();
		} else {
			$this->detachHorizontalScrollBar();
		}
		$GLOBALS['%s']->pop();
	}
	public function detachHorizontalScrollBar() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ScrollableRenderer::detachHorizontalScrollBar");
		$»spos = $GLOBALS['%s']->length;
		if($this->_horizontalScrollBar !== null) {
			$this->removeChild($this->_horizontalScrollBar->elementRenderer);
			$this->_horizontalScrollBar->set_onScroll(null);
			$this->_horizontalScrollBar = null;
			$this->set_scrollLeft(0);
		}
		$GLOBALS['%s']->pop();
	}
	public function attachHorizontalScrollBar() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ScrollableRenderer::attachHorizontalScrollBar");
		$»spos = $GLOBALS['%s']->length;
		if($this->_horizontalScrollBar === null) {
			$this->_horizontalScrollBar = new cocktail_core_html_ScrollBar(false);
			$this->_horizontalScrollBar->set_ownerDocument($this->domNode->ownerDocument);
			$this->_horizontalScrollBar->attach();
			$this->appendChild($this->_horizontalScrollBar->elementRenderer);
			$this->_horizontalScrollBar->set_onScroll((isset($this->onHorizontalScroll) ? $this->onHorizontalScroll: array($this, "onHorizontalScroll")));
		}
		if($this->_horizontalScrollBar !== null) {
			$this->_horizontalScrollBar->set_maxScroll($this->getHorizontalMaxScroll());
		}
		$GLOBALS['%s']->pop();
	}
	public function attachScrollBarsIfnecessary() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ScrollableRenderer::attachScrollBarsIfnecessary");
		$»spos = $GLOBALS['%s']->length;
		if($this->canAlwaysOverflow() === true) {
			$this->detachHorizontalScrollBar();
			$this->detachVerticalScrollBar();
			{
				$GLOBALS['%s']->pop();
				return;
			}
		}
		$»t = ($this->coreStyle->getKeyword($this->coreStyle->get_overflowX()));
		switch($»t->index) {
		case 38:
		{
			$this->attachHorizontalScrollBar();
		}break;
		case 37:
		{
			$this->detachHorizontalScrollBar();
		}break;
		case 27:
		{
			$this->attachOrDetachHorizontalScrollBarIfNecessary();
		}break;
		case 36:
		{
			if($this->treatVisibleOverflowAsAuto() === true) {
				$this->attachOrDetachHorizontalScrollBarIfNecessary();
			} else {
				$this->detachHorizontalScrollBar();
			}
		}break;
		default:{
			throw new HException("invalid value for overflowX");
		}break;
		}
		$»t = ($this->coreStyle->getKeyword($this->coreStyle->get_overflowY()));
		switch($»t->index) {
		case 38:
		{
			$this->attachVerticalScrollBar();
		}break;
		case 37:
		{
			$this->detachVerticalScrollBar();
		}break;
		case 27:
		{
			$this->attachOrDetachVerticalScrollBarIfNecessary();
		}break;
		case 36:
		{
			if($this->treatVisibleOverflowAsAuto() === true) {
				$this->attachOrDetachVerticalScrollBarIfNecessary();
			} else {
				$this->detachVerticalScrollBar();
			}
		}break;
		default:{
			throw new HException("invalid value for overflowY");
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	public function doGetScrollableBounds($rootRenderer) {
		$GLOBALS['%s']->push("cocktail.core.renderer.ScrollableRenderer::doGetScrollableBounds");
		$»spos = $GLOBALS['%s']->length;
		$childrenBounds = new _hx_array(array());
		$length = $rootRenderer->childNodes->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				$child = $rootRenderer->childNodes[$i];
				if($child->domNode != $this->_horizontalScrollBar && $child->domNode != $this->_verticalScrollBar) {
					if($child->hasChildNodes() === true) {
						$childChildrenBounds = $this->doGetScrollableBounds($child);
						$childLength = $childChildrenBounds->length;
						{
							$_g1 = 0;
							while($_g1 < $childLength) {
								$j = $_g1++;
								$childrenBounds->push($childChildrenBounds[$j]);
								unset($j);
							}
							unset($_g1);
						}
						unset($childLength,$childChildrenBounds);
					}
					$childrenBounds->push($child->get_scrollableBounds());
				}
				unset($i,$child);
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $childrenBounds;
		}
		$GLOBALS['%s']->pop();
	}
	public function getScrollableBounds() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ScrollableRenderer::getScrollableBounds");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getChildrenBounds($this->doGetScrollableBounds($this));
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function updateScroll() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ScrollableRenderer::updateScroll");
		$»spos = $GLOBALS['%s']->length;
		if($this->_isUpdatingScroll === false) {
			$this->_isUpdatingScroll = true;
			if($this->isXAxisClipped() === true || $this->isYAxisClipped() === true) {
				$this->invalidate(cocktail_core_renderer_InvalidationReason::$other);
			}
			if($this->_horizontalScrollBar !== null) {
				$this->_horizontalScrollBar->set_scroll($this->get_scrollLeft());
			}
			if($this->_verticalScrollBar !== null) {
				$this->_verticalScrollBar->set_scroll($this->get_scrollTop());
			}
			$this->dispatchScrollEvent();
			$this->_isUpdatingScroll = false;
		}
		$GLOBALS['%s']->pop();
	}
	public function isYAxisClipped() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ScrollableRenderer::isYAxisClipped");
		$»spos = $GLOBALS['%s']->length;
		$»t = ($this->coreStyle->get_overflowY());
		switch($»t->index) {
		case 4:
		$value = $»t->params[0];
		{
			$»t2 = ($value);
			switch($»t2->index) {
			case 37:
			case 38:
			{
				$GLOBALS['%s']->pop();
				return true;
			}break;
			case 27:
			{
				$»tmp = $this->_verticalScrollBar !== null;
				$GLOBALS['%s']->pop();
				return $»tmp;
			}break;
			case 36:
			{
				if($this->treatVisibleOverflowAsAuto() === true) {
					$»tmp = $this->_verticalScrollBar !== null;
					$GLOBALS['%s']->pop();
					return $»tmp;
				}
				{
					$GLOBALS['%s']->pop();
					return false;
				}
			}break;
			default:{
				$GLOBALS['%s']->pop();
				return false;
			}break;
			}
		}break;
		default:{
			$GLOBALS['%s']->pop();
			return false;
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	public function isXAxisClipped() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ScrollableRenderer::isXAxisClipped");
		$»spos = $GLOBALS['%s']->length;
		$»t = ($this->coreStyle->get_overflowX());
		switch($»t->index) {
		case 4:
		$value = $»t->params[0];
		{
			$»t2 = ($value);
			switch($»t2->index) {
			case 37:
			case 38:
			{
				$GLOBALS['%s']->pop();
				return true;
			}break;
			case 27:
			{
				$»tmp = $this->_horizontalScrollBar !== null;
				$GLOBALS['%s']->pop();
				return $»tmp;
			}break;
			case 36:
			{
				if($this->treatVisibleOverflowAsAuto() === true) {
					$»tmp = $this->_horizontalScrollBar !== null;
					$GLOBALS['%s']->pop();
					return $»tmp;
				}
				{
					$GLOBALS['%s']->pop();
					return false;
				}
			}break;
			default:{
				$GLOBALS['%s']->pop();
				return false;
			}break;
			}
		}break;
		default:{
			$GLOBALS['%s']->pop();
			return false;
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_scrollHeight() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ScrollableRenderer::get_scrollHeight");
		$»spos = $GLOBALS['%s']->length;
		if($this->_scrollableBounds->height > $this->get_bounds()->height) {
			$»tmp = $this->_scrollableBounds->height;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		{
			$»tmp = $this->get_bounds()->height;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_scrollWidth() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ScrollableRenderer::get_scrollWidth");
		$»spos = $GLOBALS['%s']->length;
		if($this->_scrollableBounds->width > $this->get_bounds()->width) {
			$»tmp = $this->_scrollableBounds->width;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		{
			$»tmp = $this->get_bounds()->width;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_scrollTop($value) {
		$GLOBALS['%s']->push("cocktail.core.renderer.ScrollableRenderer::set_scrollTop");
		$»spos = $GLOBALS['%s']->length;
		if($value <= 0) {
			$this->_scrollTop = 0;
		} else {
			if($value > $this->getVerticalMaxScroll()) {
				$this->_scrollTop = $this->getVerticalMaxScroll();
			} else {
				$this->_scrollTop = $value;
			}
		}
		$this->updateScroll();
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_scrollTop() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ScrollableRenderer::get_scrollTop");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->_scrollTop;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_scrollLeft($value) {
		$GLOBALS['%s']->push("cocktail.core.renderer.ScrollableRenderer::set_scrollLeft");
		$»spos = $GLOBALS['%s']->length;
		if($value <= 0) {
			$this->_scrollLeft = 0;
		} else {
			if($value > $this->getHorizontalMaxScroll()) {
				$this->_scrollLeft = $this->getHorizontalMaxScroll();
			} else {
				$this->_scrollLeft = $value;
			}
		}
		$this->updateScroll();
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_scrollLeft() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ScrollableRenderer::get_scrollLeft");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->_scrollLeft;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function layoutScrollBarsIfNecessary($viewportData) {
		$GLOBALS['%s']->push("cocktail.core.renderer.ScrollableRenderer::layoutScrollBarsIfNecessary");
		$»spos = $GLOBALS['%s']->length;
		$horizontalScrollBarContainerBlockData = $this->getContainerBlockData();
		if($this->_horizontalScrollBar !== null) {
			$horizontalScrollBarContainerBlockData->height += $this->_horizontalScrollBar->coreStyle->usedValues->height;
		}
		if($this->_horizontalScrollBar !== null) {
			$this->layoutPositionedChild($this->_horizontalScrollBar->elementRenderer, $horizontalScrollBarContainerBlockData, $viewportData);
		}
		$verticalScrollBarContainerBlockData = $this->getContainerBlockData();
		if($this->_verticalScrollBar !== null) {
			$verticalScrollBarContainerBlockData->width += $this->_verticalScrollBar->coreStyle->usedValues->width;
		}
		if($this->_verticalScrollBar !== null) {
			$this->layoutPositionedChild($this->_verticalScrollBar->elementRenderer, $verticalScrollBarContainerBlockData, $viewportData);
		}
		$GLOBALS['%s']->pop();
	}
	public function layout($forceLayout) {
		$GLOBALS['%s']->push("cocktail.core.renderer.ScrollableRenderer::layout");
		$»spos = $GLOBALS['%s']->length;
		parent::layout($forceLayout);
		if($this->canAlwaysOverflow() === false) {
			$this->_scrollableBounds = $this->getScrollableBounds();
		}
		$isVerticalScrollAttached = $this->_verticalScrollBar !== null;
		$isHorizontalScrollAttached = $this->_horizontalScrollBar !== null;
		if($isVerticalScrollAttached !== ($this->_verticalScrollBar !== null) || $isHorizontalScrollAttached !== ($this->_horizontalScrollBar !== null)) {
			$this->_needsLayout = true;
			$this->_childrenNeedLayout = true;
			parent::layout($forceLayout);
		}
		$this->layoutScrollBarsIfNecessary($this->getWindowData());
		$GLOBALS['%s']->pop();
	}
	public $_isUpdatingScroll;
	public $_scrollTop;
	public $_scrollLeft;
	public $_scrollableBounds;
	public $_verticalScrollBar;
	public $_horizontalScrollBar;
	public function __call($m, $a) {
		if(isset($this->$m) && is_callable($this->$m))
			return call_user_func_array($this->$m, $a);
		else if(isset($this->»dynamics[$m]) && is_callable($this->»dynamics[$m]))
			return call_user_func_array($this->»dynamics[$m], $a);
		else if('toString' == $m)
			return $this->__toString();
		else
			throw new HException('Unable to call «'.$m.'»');
	}
	static $__properties__ = array("set_bounds" => "set_bounds","get_bounds" => "get_bounds","get_globalBounds" => "get_globalBounds","get_scrollableBounds" => "get_scrollableBounds","set_scrollLeft" => "set_scrollLeft","get_scrollLeft" => "get_scrollLeft","set_scrollTop" => "set_scrollTop","get_scrollTop" => "get_scrollTop","get_scrollWidth" => "get_scrollWidth","get_scrollHeight" => "get_scrollHeight","get_firstChild" => "get_firstChild","get_lastChild" => "get_lastChild","get_nextSibling" => "get_nextSibling","get_previousSibling" => "get_previousSibling","set_onclick" => "set_onClick","set_ondblclick" => "set_onDblClick","set_onmousedown" => "set_onMouseDown","set_onmouseup" => "set_onMouseUp","set_onmouseover" => "set_onMouseOver","set_onmouseout" => "set_onMouseOut","set_onmousemove" => "set_onMouseMove","set_onmousewheel" => "set_onMouseWheel","set_onkeydown" => "set_onKeyDown","set_onkeyup" => "set_onKeyUp","set_onfocus" => "set_onFocus","set_onblur" => "set_onBlur","set_onresize" => "set_onResize","set_onfullscreenchange" => "set_onFullScreenChange","set_onscroll" => "set_onScroll","set_onload" => "set_onLoad","set_onerror" => "set_onError","set_onloadstart" => "set_onLoadStart","set_onprogress" => "set_onProgress","set_onsuspend" => "set_onSuspend","set_onemptied" => "set_onEmptied","set_onstalled" => "set_onStalled","set_onloadedmetadata" => "set_onLoadedMetadata","set_onloadeddata" => "set_onLoadedData","set_oncanplay" => "set_onCanPlay","set_oncanplaythrough" => "set_onCanPlayThrough","set_onplaying" => "set_onPlaying","set_onwaiting" => "set_onWaiting","set_onseeking" => "set_onSeeking","set_onseeked" => "set_onSeeked","set_onended" => "set_onEnded","set_ondurationchange" => "set_onDurationChanged","set_ontimeupdate" => "set_onTimeUpdate","set_onplay" => "set_onPlay","set_onpause" => "set_onPause","set_onvolumechange" => "set_onVolumeChange","set_ontransitionend" => "set_onTransitionEnd");
	function __toString() { return 'cocktail.core.renderer.ScrollableRenderer'; }
}

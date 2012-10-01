<?php

class cocktail_core_renderer_ScrollableRenderer extends cocktail_core_renderer_FlowBoxRenderer {
	public function __construct($domNode) {
		if(!php_Boot::$skip_constructor) {
		parent::__construct($domNode);
		$this->_isUpdatingScroll = false;
		$this->_scrollLeft = 0;
		$this->_scrollTop = 0;
		$this->_scrollableBounds = new cocktail_core_geom_RectangleVO(0.0, 0.0, 0.0, 0.0);
	}}
	public function treatVisibleOverflowAsAuto() {
		return false;
	}
	public function canAlwaysOverflow() {
		if($this->treatVisibleOverflowAsAuto() === true) {
			return false;
		}
		$퍁 = ($this->coreStyle->getKeyword($this->coreStyle->get_overflowX()));
		switch($퍁->index) {
		case 36:
		{
		}break;
		default:{
			return false;
		}break;
		}
		$퍁 = ($this->coreStyle->getKeyword($this->coreStyle->get_overflowY()));
		switch($퍁->index) {
		case 36:
		{
		}break;
		default:{
			return false;
		}break;
		}
		return true;
	}
	public function mustBubbleScrollEvent() {
		return false;
	}
	public function dispatchScrollEvent() {
		$scrollEvent = new cocktail_core_event_UIEvent();
		$scrollEvent->initUIEvent("scroll", $this->mustBubbleScrollEvent(), false, null, 0.0);
		$this->domNode->dispatchEvent($scrollEvent);
	}
	public function getHorizontalMaxScroll() {
		$maxScroll = $this->_scrollableBounds->width - $this->getContainerBlockData()->width;
		if($maxScroll < 0) {
			return 0;
		}
		return $maxScroll;
	}
	public function getVerticalMaxScroll() {
		$maxScroll = $this->_scrollableBounds->height - $this->getContainerBlockData()->height;
		if($maxScroll < 0) {
			return 0;
		}
		return $maxScroll;
	}
	public function getScrollbarContainerBlock() {
		return parent::getContainerBlockData();
	}
	public function isHorizontallyScrollable($scrollOffset) {
		if($this->_horizontalScrollBar === null) {
			return false;
		}
		if($scrollOffset < 0) {
			if($this->get_scrollLeft() >= $this->_scrollableBounds->width - $this->getContainerBlockData()->width) {
				return false;
			}
		} else {
			if($scrollOffset > 0) {
				if($this->get_scrollLeft() <= 0) {
					return false;
				}
			}
		}
		return true;
	}
	public function isVerticallyScrollable($scrollOffset) {
		if($this->_verticalScrollBar === null) {
			return false;
		}
		if($scrollOffset < 0) {
			if($this->get_scrollTop() >= $this->_scrollableBounds->height - $this->getContainerBlockData()->height) {
				return false;
			}
		} else {
			if($scrollOffset > 0) {
				if($this->get_scrollTop() <= 0) {
					return false;
				}
			}
		}
		return true;
	}
	public function onVerticalScroll($event) {
		$this->set_scrollTop($this->_verticalScrollBar->scroll);
	}
	public function onHorizontalScroll($event) {
		$this->set_scrollLeft($this->_horizontalScrollBar->scroll);
	}
	public function attachOrDetachVerticalScrollBarIfNecessary() {
		if($this->_scrollableBounds->y < 0 || $this->_scrollableBounds->y + $this->_scrollableBounds->height > $this->get_bounds()->height) {
			$this->attachVerticalScrollBar();
		} else {
			$this->detachVerticalScrollBar();
		}
	}
	public function detachVerticalScrollBar() {
		if($this->_verticalScrollBar !== null) {
			$this->removeChild($this->_verticalScrollBar->elementRenderer);
			$this->_verticalScrollBar->set_onScroll(null);
			$this->_verticalScrollBar = null;
			$this->set_scrollTop(0);
		}
	}
	public function attachVerticalScrollBar() {
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
	}
	public function attachOrDetachHorizontalScrollBarIfNecessary() {
		if($this->_scrollableBounds->x < 0 || $this->_scrollableBounds->x + $this->_scrollableBounds->width > $this->get_bounds()->width) {
			$this->attachHorizontalScrollBar();
		} else {
			$this->detachHorizontalScrollBar();
		}
	}
	public function detachHorizontalScrollBar() {
		if($this->_horizontalScrollBar !== null) {
			$this->removeChild($this->_horizontalScrollBar->elementRenderer);
			$this->_horizontalScrollBar->set_onScroll(null);
			$this->_horizontalScrollBar = null;
			$this->set_scrollLeft(0);
		}
	}
	public function attachHorizontalScrollBar() {
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
	}
	public function attachScrollBarsIfnecessary() {
		if($this->canAlwaysOverflow() === true) {
			$this->detachHorizontalScrollBar();
			$this->detachVerticalScrollBar();
			return;
		}
		$퍁 = ($this->coreStyle->getKeyword($this->coreStyle->get_overflowX()));
		switch($퍁->index) {
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
		$퍁 = ($this->coreStyle->getKeyword($this->coreStyle->get_overflowY()));
		switch($퍁->index) {
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
	}
	public function doGetScrollableBounds($rootRenderer) {
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
		return $childrenBounds;
	}
	public function getScrollableBounds() {
		return $this->getChildrenBounds($this->doGetScrollableBounds($this));
	}
	public function updateScroll() {
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
	}
	public function isYAxisClipped() {
		$퍁 = ($this->coreStyle->get_overflowY());
		switch($퍁->index) {
		case 4:
		$value = $퍁->params[0];
		{
			$퍁2 = ($value);
			switch($퍁2->index) {
			case 37:
			case 38:
			{
				return true;
			}break;
			case 27:
			{
				return $this->_verticalScrollBar !== null;
			}break;
			case 36:
			{
				if($this->treatVisibleOverflowAsAuto() === true) {
					return $this->_verticalScrollBar !== null;
				}
				return false;
			}break;
			default:{
				return false;
			}break;
			}
		}break;
		default:{
			return false;
		}break;
		}
	}
	public function isXAxisClipped() {
		$퍁 = ($this->coreStyle->get_overflowX());
		switch($퍁->index) {
		case 4:
		$value = $퍁->params[0];
		{
			$퍁2 = ($value);
			switch($퍁2->index) {
			case 37:
			case 38:
			{
				return true;
			}break;
			case 27:
			{
				return $this->_horizontalScrollBar !== null;
			}break;
			case 36:
			{
				if($this->treatVisibleOverflowAsAuto() === true) {
					return $this->_horizontalScrollBar !== null;
				}
				return false;
			}break;
			default:{
				return false;
			}break;
			}
		}break;
		default:{
			return false;
		}break;
		}
	}
	public function get_scrollHeight() {
		if($this->_scrollableBounds->height > $this->get_bounds()->height) {
			return $this->_scrollableBounds->height;
		}
		return $this->get_bounds()->height;
	}
	public function get_scrollWidth() {
		if($this->_scrollableBounds->width > $this->get_bounds()->width) {
			return $this->_scrollableBounds->width;
		}
		return $this->get_bounds()->width;
	}
	public function set_scrollTop($value) {
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
		return $value;
	}
	public function get_scrollTop() {
		return $this->_scrollTop;
	}
	public function set_scrollLeft($value) {
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
		return $value;
	}
	public function get_scrollLeft() {
		return $this->_scrollLeft;
	}
	public function layoutScrollBarsIfNecessary($viewportData) {
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
	}
	public function layout($forceLayout) {
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
		else if(isset($this->팪ynamics[$m]) && is_callable($this->팪ynamics[$m]))
			return call_user_func_array($this->팪ynamics[$m], $a);
		else if('toString' == $m)
			return $this->__toString();
		else
			throw new HException('Unable to call �'.$m.'�');
	}
	static $__properties__ = array("set_bounds" => "set_bounds","get_bounds" => "get_bounds","get_globalBounds" => "get_globalBounds","get_scrollableBounds" => "get_scrollableBounds","set_scrollLeft" => "set_scrollLeft","get_scrollLeft" => "get_scrollLeft","set_scrollTop" => "set_scrollTop","get_scrollTop" => "get_scrollTop","get_scrollWidth" => "get_scrollWidth","get_scrollHeight" => "get_scrollHeight","get_firstChild" => "get_firstChild","get_lastChild" => "get_lastChild","get_nextSibling" => "get_nextSibling","get_previousSibling" => "get_previousSibling","set_onclick" => "set_onClick","set_ondblclick" => "set_onDblClick","set_onmousedown" => "set_onMouseDown","set_onmouseup" => "set_onMouseUp","set_onmouseover" => "set_onMouseOver","set_onmouseout" => "set_onMouseOut","set_onmousemove" => "set_onMouseMove","set_onmousewheel" => "set_onMouseWheel","set_onkeydown" => "set_onKeyDown","set_onkeyup" => "set_onKeyUp","set_onfocus" => "set_onFocus","set_onblur" => "set_onBlur","set_onresize" => "set_onResize","set_onfullscreenchange" => "set_onFullScreenChange","set_onscroll" => "set_onScroll","set_onload" => "set_onLoad","set_onerror" => "set_onError","set_onloadstart" => "set_onLoadStart","set_onprogress" => "set_onProgress","set_onsuspend" => "set_onSuspend","set_onemptied" => "set_onEmptied","set_onstalled" => "set_onStalled","set_onloadedmetadata" => "set_onLoadedMetadata","set_onloadeddata" => "set_onLoadedData","set_oncanplay" => "set_onCanPlay","set_oncanplaythrough" => "set_onCanPlayThrough","set_onplaying" => "set_onPlaying","set_onwaiting" => "set_onWaiting","set_onseeking" => "set_onSeeking","set_onseeked" => "set_onSeeked","set_onended" => "set_onEnded","set_ondurationchange" => "set_onDurationChanged","set_ontimeupdate" => "set_onTimeUpdate","set_onplay" => "set_onPlay","set_onpause" => "set_onPause","set_onvolumechange" => "set_onVolumeChange","set_ontransitionend" => "set_onTransitionEnd");
	function __toString() { return 'cocktail.core.renderer.ScrollableRenderer'; }
}

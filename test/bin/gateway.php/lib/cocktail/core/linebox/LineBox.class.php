<?php

class cocktail_core_linebox_LineBox extends cocktail_core_dom_NodeBase {
	public function __construct($elementRenderer) {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.linebox.LineBox::new");
		$»spos = $GLOBALS['%s']->length;
		parent::__construct();
		$this->bounds = new cocktail_core_geom_RectangleVO(0.0, 0.0, 0.0, 0.0);
		$this->elementRenderer = $elementRenderer;
		$this->marginLeft = 0;
		$this->marginRight = 0;
		$this->paddingLeft = 0;
		$this->paddingRight = 0;
		$this->leadedAscent = $this->getLeadedAscent();
		$this->leadedDescent = $this->getLeadedDescent();
		$GLOBALS['%s']->pop();
	}}
	public function get_bounds() {
		$GLOBALS['%s']->push("cocktail.core.linebox.LineBox::get_bounds");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->bounds;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getLeadedDescent() {
		$GLOBALS['%s']->push("cocktail.core.linebox.LineBox::getLeadedDescent");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return 0;
		}
		$GLOBALS['%s']->pop();
	}
	public function getLeadedAscent() {
		$GLOBALS['%s']->push("cocktail.core.linebox.LineBox::getLeadedAscent");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return 0;
		}
		$GLOBALS['%s']->pop();
	}
	public function getChildrenBounds($childrenBounds) {
		$GLOBALS['%s']->push("cocktail.core.linebox.LineBox::getChildrenBounds");
		$»spos = $GLOBALS['%s']->length;
		$bounds = null;
		$left = 50000;
		$top = 50000;
		$right = -50000;
		$bottom = -50000;
		$length = $childrenBounds->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				$childBounds = $childrenBounds[$i];
				if($childBounds->x < $left) {
					$left = $childBounds->x;
				}
				if($childBounds->y < $top) {
					$top = $childBounds->y;
				}
				if($childBounds->x + $childBounds->width > $right) {
					$right = $childBounds->x + $childBounds->width;
				}
				if($childBounds->y + $childBounds->height > $bottom) {
					$bottom = $childBounds->y + $childBounds->height;
				}
				unset($i,$childBounds);
			}
		}
		$bounds = new cocktail_core_geom_RectangleVO($left, $top, $right - $left, $bottom - $top);
		if($bounds->width < 0) {
			$bounds->width = 0;
		}
		if($bounds->height < 0) {
			$bounds->height = 0;
		}
		{
			$GLOBALS['%s']->pop();
			return $bounds;
		}
		$GLOBALS['%s']->pop();
	}
	public function getLineBoxesBounds($lineBox) {
		$GLOBALS['%s']->push("cocktail.core.linebox.LineBox::getLineBoxesBounds");
		$»spos = $GLOBALS['%s']->length;
		$lineBoxesBounds = new _hx_array(array());
		$length = $lineBox->childNodes->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				$child = $lineBox->childNodes[$i];
				if($child->isStaticPosition() === false) {
					$lineBoxesBounds->push($child->get_bounds());
					if($child->hasChildNodes() === true) {
						$childrenBounds = $this->getLineBoxesBounds($child);
						$childLength = $childrenBounds->length;
						{
							$_g1 = 0;
							while($_g1 < $childLength) {
								$j = $_g1++;
								$lineBoxesBounds->push($childrenBounds[$j]);
								unset($j);
							}
							unset($_g1);
						}
						unset($childrenBounds,$childLength);
					}
				}
				unset($i,$child);
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $lineBoxesBounds;
		}
		$GLOBALS['%s']->pop();
	}
	public function getBaselineOffset($parentBaselineOffset, $parentXHeight) {
		$GLOBALS['%s']->push("cocktail.core.linebox.LineBox::getBaselineOffset");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return $parentBaselineOffset;
		}
		$GLOBALS['%s']->pop();
	}
	public function isStaticPosition() {
		$GLOBALS['%s']->push("cocktail.core.linebox.LineBox::isStaticPosition");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function isSpace() {
		$GLOBALS['%s']->push("cocktail.core.linebox.LineBox::isSpace");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function isText() {
		$GLOBALS['%s']->push("cocktail.core.linebox.LineBox::isText");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function render($graphicContext) {
		$GLOBALS['%s']->push("cocktail.core.linebox.LineBox::render");
		$»spos = $GLOBALS['%s']->length;
		$childBounds = $this->getChildrenBounds($this->getLineBoxesBounds($this));
		$this->get_bounds()->width = $childBounds->width;
		$this->get_bounds()->height = $childBounds->height;
		$this->get_bounds()->x = $childBounds->x + $this->elementRenderer->get_globalBounds()->x - $this->elementRenderer->scrollOffset->x;
		$this->get_bounds()->y = $this->elementRenderer->get_globalBounds()->y - $this->elementRenderer->scrollOffset->y;
		cocktail_core_background_BackgroundManager::render($graphicContext, $this->get_bounds(), $this->elementRenderer->coreStyle, $this->elementRenderer);
		$GLOBALS['%s']->pop();
	}
	public $paddingRight;
	public $paddingLeft;
	public $marginRight;
	public $marginLeft;
	public $leadedDescent;
	public $leadedAscent;
	public $bounds;
	public $elementRenderer;
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
	static $__properties__ = array("get_bounds" => "get_bounds","get_firstChild" => "get_firstChild","get_lastChild" => "get_lastChild","get_nextSibling" => "get_nextSibling","get_previousSibling" => "get_previousSibling","set_onclick" => "set_onClick","set_ondblclick" => "set_onDblClick","set_onmousedown" => "set_onMouseDown","set_onmouseup" => "set_onMouseUp","set_onmouseover" => "set_onMouseOver","set_onmouseout" => "set_onMouseOut","set_onmousemove" => "set_onMouseMove","set_onmousewheel" => "set_onMouseWheel","set_onkeydown" => "set_onKeyDown","set_onkeyup" => "set_onKeyUp","set_onfocus" => "set_onFocus","set_onblur" => "set_onBlur","set_onresize" => "set_onResize","set_onfullscreenchange" => "set_onFullScreenChange","set_onscroll" => "set_onScroll","set_onload" => "set_onLoad","set_onerror" => "set_onError","set_onloadstart" => "set_onLoadStart","set_onprogress" => "set_onProgress","set_onsuspend" => "set_onSuspend","set_onemptied" => "set_onEmptied","set_onstalled" => "set_onStalled","set_onloadedmetadata" => "set_onLoadedMetadata","set_onloadeddata" => "set_onLoadedData","set_oncanplay" => "set_onCanPlay","set_oncanplaythrough" => "set_onCanPlayThrough","set_onplaying" => "set_onPlaying","set_onwaiting" => "set_onWaiting","set_onseeking" => "set_onSeeking","set_onseeked" => "set_onSeeked","set_onended" => "set_onEnded","set_ondurationchange" => "set_onDurationChanged","set_ontimeupdate" => "set_onTimeUpdate","set_onplay" => "set_onPlay","set_onpause" => "set_onPause","set_onvolumechange" => "set_onVolumeChange","set_ontransitionend" => "set_onTransitionEnd");
	function __toString() { return 'cocktail.core.linebox.LineBox'; }
}

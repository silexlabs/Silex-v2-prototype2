<?php

class cocktail_core_linebox_TextLineBox extends cocktail_core_linebox_LineBox {
	public function __construct($elementRenderer, $text, $fontMetrics, $fontManager) {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.linebox.TextLineBox::new");
		$»spos = $GLOBALS['%s']->length;
		$this->_fontMetrics = $fontMetrics;
		parent::__construct($elementRenderer);
		$this->initNativeTextElement($text, $fontManager, $elementRenderer->coreStyle);
		$this->get_bounds()->width = $this->getTextWidth();
		$this->get_bounds()->height = $this->getTextHeight();
		$this->_renderRect = new cocktail_core_geom_RectangleVO(0.0, 0.0, $this->get_bounds()->width, $this->get_bounds()->height);
		$this->_destinationPoint = new cocktail_core_geom_PointVO(0.0, 0.0);
		$this->initTextBitmap();
		$GLOBALS['%s']->pop();
	}}
	public function getTextHeight() {
		$GLOBALS['%s']->push("cocktail.core.linebox.TextLineBox::getTextHeight");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->leadedAscent + $this->leadedDescent;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getTextWidth() {
		$GLOBALS['%s']->push("cocktail.core.linebox.TextLineBox::getTextWidth");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->_nativeText->get_width();
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getLeadedDescent() {
		$GLOBALS['%s']->push("cocktail.core.linebox.TextLineBox::getLeadedDescent");
		$»spos = $GLOBALS['%s']->length;
		$ascent = $this->_fontMetrics->ascent;
		$descent = $this->_fontMetrics->descent;
		$lineHeight = $this->elementRenderer->coreStyle->usedValues->lineHeight;
		$leading = $lineHeight - ($ascent + $descent);
		$leadedAscent = $ascent + $leading / 2;
		$leadedDescent = $descent + $leading / 2;
		{
			$GLOBALS['%s']->pop();
			return $leadedDescent;
		}
		$GLOBALS['%s']->pop();
	}
	public function getLeadedAscent() {
		$GLOBALS['%s']->push("cocktail.core.linebox.TextLineBox::getLeadedAscent");
		$»spos = $GLOBALS['%s']->length;
		$ascent = $this->_fontMetrics->ascent;
		$descent = $this->_fontMetrics->descent;
		$lineHeight = $this->elementRenderer->coreStyle->usedValues->lineHeight;
		$leading = $lineHeight - ($ascent + $descent);
		$leadedAscent = $ascent + $leading / 2;
		$leadedDescent = $descent + $leading / 2;
		{
			$GLOBALS['%s']->pop();
			return $leadedAscent;
		}
		$GLOBALS['%s']->pop();
	}
	public function isText() {
		$GLOBALS['%s']->push("cocktail.core.linebox.TextLineBox::isText");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return true;
		}
		$GLOBALS['%s']->pop();
	}
	public function getBaselineOffset($parentBaselineOffset, $parentXHeight) {
		$GLOBALS['%s']->push("cocktail.core.linebox.TextLineBox::getBaselineOffset");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return $parentBaselineOffset;
		}
		$GLOBALS['%s']->pop();
	}
	public function render($graphicContext) {
		$GLOBALS['%s']->push("cocktail.core.linebox.TextLineBox::render");
		$»spos = $GLOBALS['%s']->length;
		$this->_destinationPoint->x = $this->get_bounds()->x + $this->elementRenderer->globalContainingBlockOrigin->x - $this->elementRenderer->scrollOffset->x;
		$this->_destinationPoint->y = $this->get_bounds()->y + $this->elementRenderer->globalContainingBlockOrigin->y - $this->elementRenderer->scrollOffset->y;
		$graphicContext->copyPixels($this->_nativeTextBitmap, $this->_renderRect, $this->_destinationPoint);
		$GLOBALS['%s']->pop();
	}
	public function initTextBitmap() {
		$GLOBALS['%s']->push("cocktail.core.linebox.TextLineBox::initTextBitmap");
		$»spos = $GLOBALS['%s']->length;
		$bitmapBounds = new cocktail_core_geom_RectangleVO(0.0, $this->leadedAscent, $this->get_bounds()->width, $this->get_bounds()->height);
		$this->_nativeTextBitmap = $this->_nativeText->getBitmap($bitmapBounds);
		$GLOBALS['%s']->pop();
	}
	public function initNativeTextElement($text, $fontManager, $style) {
		$GLOBALS['%s']->push("cocktail.core.linebox.TextLineBox::initNativeTextElement");
		$»spos = $GLOBALS['%s']->length;
		$nativeElement = $fontManager->createNativeTextElement($text, $style);
		$this->_nativeText = new cocktail_port_platform_nativeText_AbstractNativeText($nativeElement);
		$GLOBALS['%s']->pop();
	}
	public $_destinationPoint;
	public $_renderRect;
	public $_nativeTextBitmap;
	public $_nativeText;
	public $_fontMetrics;
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
	function __toString() { return 'cocktail.core.linebox.TextLineBox'; }
}

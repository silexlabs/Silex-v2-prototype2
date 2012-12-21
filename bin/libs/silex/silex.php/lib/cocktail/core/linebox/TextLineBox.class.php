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
		$this->_renderRect = new cocktail_core_geom_RectangleVO();
		$this->_renderRect->width = $this->get_bounds()->width;
		$this->_renderRect->height = $this->get_bounds()->height;
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
		$graphicContext->graphics->copyPixels($this->_nativeTextBitmap, $this->_renderRect, $this->_destinationPoint);
		$GLOBALS['%s']->pop();
	}
	public function initTextBitmap() {
		$GLOBALS['%s']->push("cocktail.core.linebox.TextLineBox::initTextBitmap");
		$»spos = $GLOBALS['%s']->length;
		$bitmapBounds = new cocktail_core_geom_RectangleVO();
		$bitmapBounds->y = $this->leadedAscent;
		$bitmapBounds->width = $this->get_bounds()->width;
		$bitmapBounds->height = $this->get_bounds()->height;
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
	public function dispose() {
		$GLOBALS['%s']->push("cocktail.core.linebox.TextLineBox::dispose");
		$»spos = $GLOBALS['%s']->length;
		parent::dispose();
		if($this->_nativeText !== null) {
			$this->_nativeText->dispose();
			$this->_nativeText = null;
		}
		$this->_fontMetrics = null;
		$this->_renderRect = null;
		$this->_destinationPoint = null;
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
	static $__properties__ = array("get_bounds" => "get_bounds");
	function __toString() { return 'cocktail.core.linebox.TextLineBox'; }
}

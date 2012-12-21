<?php

class cocktail_core_graphics_AbstractGraphicsContextImpl {
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.graphics.AbstractGraphicsContextImpl::new");
		$»spos = $GLOBALS['%s']->length;
		$this->_useTransparency = false;
		$this->_alpha = 0.0;
		$GLOBALS['%s']->pop();
	}}
	public function get_nativeLayer() {
		$GLOBALS['%s']->push("cocktail.core.graphics.AbstractGraphicsContextImpl::get_nativeLayer");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return null;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_nativeBitmapData() {
		$GLOBALS['%s']->push("cocktail.core.graphics.AbstractGraphicsContextImpl::get_nativeBitmapData");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return null;
		}
		$GLOBALS['%s']->pop();
	}
	public function fillRect($rect, $color) {
		$GLOBALS['%s']->push("cocktail.core.graphics.AbstractGraphicsContextImpl::fillRect");
		$»spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public function copyPixels($bitmapData, $sourceRect, $destPoint) {
		$GLOBALS['%s']->push("cocktail.core.graphics.AbstractGraphicsContextImpl::copyPixels");
		$»spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public function drawImage($bitmapData, $matrix, $sourceRect) {
		$GLOBALS['%s']->push("cocktail.core.graphics.AbstractGraphicsContextImpl::drawImage");
		$»spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public function endTransparency() {
		$GLOBALS['%s']->push("cocktail.core.graphics.AbstractGraphicsContextImpl::endTransparency");
		$»spos = $GLOBALS['%s']->length;
		$this->_useTransparency = false;
		$GLOBALS['%s']->pop();
	}
	public function beginTransparency($alpha) {
		$GLOBALS['%s']->push("cocktail.core.graphics.AbstractGraphicsContextImpl::beginTransparency");
		$»spos = $GLOBALS['%s']->length;
		$this->_useTransparency = true;
		$this->_alpha = $alpha;
		$GLOBALS['%s']->pop();
	}
	public function clear() {
		$GLOBALS['%s']->push("cocktail.core.graphics.AbstractGraphicsContextImpl::clear");
		$»spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public function transform($matrix) {
		$GLOBALS['%s']->push("cocktail.core.graphics.AbstractGraphicsContextImpl::transform");
		$»spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public function dispose() {
		$GLOBALS['%s']->push("cocktail.core.graphics.AbstractGraphicsContextImpl::dispose");
		$»spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public function detachFromRoot() {
		$GLOBALS['%s']->push("cocktail.core.graphics.AbstractGraphicsContextImpl::detachFromRoot");
		$»spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public function attachToRoot() {
		$GLOBALS['%s']->push("cocktail.core.graphics.AbstractGraphicsContextImpl::attachToRoot");
		$»spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public function detach($graphicsContext) {
		$GLOBALS['%s']->push("cocktail.core.graphics.AbstractGraphicsContextImpl::detach");
		$»spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public function attach($graphicsContext, $index) {
		$GLOBALS['%s']->push("cocktail.core.graphics.AbstractGraphicsContextImpl::attach");
		$»spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public function initBitmapData($width, $height) {
		$GLOBALS['%s']->push("cocktail.core.graphics.AbstractGraphicsContextImpl::initBitmapData");
		$»spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public $_alpha;
	public $_useTransparency;
	public $nativeBitmapData;
	public $nativeLayer;
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
	static $__properties__ = array("get_nativeLayer" => "get_nativeLayer","get_nativeBitmapData" => "get_nativeBitmapData");
	function __toString() { return 'cocktail.core.graphics.AbstractGraphicsContextImpl'; }
}

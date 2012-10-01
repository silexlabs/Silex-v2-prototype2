<?php

class cocktail_core_graphics_AbstractGraphicsContext extends cocktail_core_dom_NodeBase {
	public function __construct($layerRenderer = null, $nativeLayer = null) {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.graphics.AbstractGraphicsContext::new");
		$»spos = $GLOBALS['%s']->length;
		parent::__construct();
		$this->layerRenderer = $layerRenderer;
		$this->_useTransparency = false;
		$this->_alpha = 0.0;
		$this->_orderedChildList = new _hx_array(array());
		$GLOBALS['%s']->pop();
	}}
	public function get_nativeLayer() {
		$GLOBALS['%s']->push("cocktail.core.graphics.AbstractGraphicsContext::get_nativeLayer");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return null;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_nativeBitmapData() {
		$GLOBALS['%s']->push("cocktail.core.graphics.AbstractGraphicsContext::get_nativeBitmapData");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return null;
		}
		$GLOBALS['%s']->pop();
	}
	public function getIndex($elementRenderer) {
		$GLOBALS['%s']->push("cocktail.core.graphics.AbstractGraphicsContext::getIndex");
		$»spos = $GLOBALS['%s']->length;
		$index = 0;
		if($elementRenderer->isPositioned() === true) {
			if($elementRenderer->coreStyle !== null) {
				$»t = ($elementRenderer->coreStyle->get_zIndex());
				switch($»t->index) {
				case 0:
				$value = $»t->params[0];
				{
					$index = $value;
				}break;
				default:{
				}break;
				}
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $index;
		}
		$GLOBALS['%s']->pop();
	}
	public function instertIntoOrderedChildList($newChild) {
		$GLOBALS['%s']->push("cocktail.core.graphics.AbstractGraphicsContext::instertIntoOrderedChildList");
		$»spos = $GLOBALS['%s']->length;
		$index = $this->getIndex($newChild->layerRenderer->rootElementRenderer);
		$isInserted = false;
		$newOrderedChildList = new _hx_array(array());
		{
			$_g1 = 0; $_g = $this->_orderedChildList->length;
			while($_g1 < $_g) {
				$i = $_g1++;
				$childIndex = $this->getIndex(_hx_array_get($this->_orderedChildList, $i)->layerRenderer->rootElementRenderer);
				if($index < $childIndex && $isInserted === false) {
					$newOrderedChildList->push($newChild);
					$isInserted = true;
				}
				$newOrderedChildList->push($this->_orderedChildList[$i]);
				unset($i,$childIndex);
			}
		}
		if($isInserted === false) {
			$newOrderedChildList->push($newChild);
		}
		$this->_orderedChildList = $newOrderedChildList;
		$GLOBALS['%s']->pop();
	}
	public function fillRect($rect, $color) {
		$GLOBALS['%s']->push("cocktail.core.graphics.AbstractGraphicsContext::fillRect");
		$»spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public function copyPixels($bitmapData, $sourceRect, $destPoint) {
		$GLOBALS['%s']->push("cocktail.core.graphics.AbstractGraphicsContext::copyPixels");
		$»spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public function drawImage($bitmapData, $matrix = null, $sourceRect = null) {
		$GLOBALS['%s']->push("cocktail.core.graphics.AbstractGraphicsContext::drawImage");
		$»spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public function endTransparency() {
		$GLOBALS['%s']->push("cocktail.core.graphics.AbstractGraphicsContext::endTransparency");
		$»spos = $GLOBALS['%s']->length;
		$this->_useTransparency = false;
		$GLOBALS['%s']->pop();
	}
	public function beginTransparency($alpha) {
		$GLOBALS['%s']->push("cocktail.core.graphics.AbstractGraphicsContext::beginTransparency");
		$»spos = $GLOBALS['%s']->length;
		$this->_useTransparency = true;
		$this->_alpha = $alpha;
		$GLOBALS['%s']->pop();
	}
	public function clear() {
		$GLOBALS['%s']->push("cocktail.core.graphics.AbstractGraphicsContext::clear");
		$»spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public function transform($matrix) {
		$GLOBALS['%s']->push("cocktail.core.graphics.AbstractGraphicsContext::transform");
		$»spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public function dispose() {
		$GLOBALS['%s']->push("cocktail.core.graphics.AbstractGraphicsContext::dispose");
		$»spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public function removeChild($oldChild) {
		$GLOBALS['%s']->push("cocktail.core.graphics.AbstractGraphicsContext::removeChild");
		$»spos = $GLOBALS['%s']->length;
		parent::removeChild($oldChild);
		$this->_orderedChildList->remove($oldChild);
		{
			$GLOBALS['%s']->pop();
			return $oldChild;
		}
		$GLOBALS['%s']->pop();
	}
	public function appendChild($newChild) {
		$GLOBALS['%s']->push("cocktail.core.graphics.AbstractGraphicsContext::appendChild");
		$»spos = $GLOBALS['%s']->length;
		parent::appendChild($newChild);
		$this->instertIntoOrderedChildList($newChild);
		{
			$GLOBALS['%s']->pop();
			return $newChild;
		}
		$GLOBALS['%s']->pop();
	}
	public function initBitmapData($width, $height) {
		$GLOBALS['%s']->push("cocktail.core.graphics.AbstractGraphicsContext::initBitmapData");
		$»spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public $_alpha;
	public $_useTransparency;
	public $_orderedChildList;
	public $layerRenderer;
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
	static $__properties__ = array("get_nativeLayer" => "get_nativeLayer","get_nativeBitmapData" => "get_nativeBitmapData","get_firstChild" => "get_firstChild","get_lastChild" => "get_lastChild","get_nextSibling" => "get_nextSibling","get_previousSibling" => "get_previousSibling","set_onclick" => "set_onClick","set_ondblclick" => "set_onDblClick","set_onmousedown" => "set_onMouseDown","set_onmouseup" => "set_onMouseUp","set_onmouseover" => "set_onMouseOver","set_onmouseout" => "set_onMouseOut","set_onmousemove" => "set_onMouseMove","set_onmousewheel" => "set_onMouseWheel","set_onkeydown" => "set_onKeyDown","set_onkeyup" => "set_onKeyUp","set_onfocus" => "set_onFocus","set_onblur" => "set_onBlur","set_onresize" => "set_onResize","set_onfullscreenchange" => "set_onFullScreenChange","set_onscroll" => "set_onScroll","set_onload" => "set_onLoad","set_onerror" => "set_onError","set_onloadstart" => "set_onLoadStart","set_onprogress" => "set_onProgress","set_onsuspend" => "set_onSuspend","set_onemptied" => "set_onEmptied","set_onstalled" => "set_onStalled","set_onloadedmetadata" => "set_onLoadedMetadata","set_onloadeddata" => "set_onLoadedData","set_oncanplay" => "set_onCanPlay","set_oncanplaythrough" => "set_onCanPlayThrough","set_onplaying" => "set_onPlaying","set_onwaiting" => "set_onWaiting","set_onseeking" => "set_onSeeking","set_onseeked" => "set_onSeeked","set_onended" => "set_onEnded","set_ondurationchange" => "set_onDurationChanged","set_ontimeupdate" => "set_onTimeUpdate","set_onplay" => "set_onPlay","set_onpause" => "set_onPause","set_onvolumechange" => "set_onVolumeChange","set_ontransitionend" => "set_onTransitionEnd");
	function __toString() { return 'cocktail.core.graphics.AbstractGraphicsContext'; }
}

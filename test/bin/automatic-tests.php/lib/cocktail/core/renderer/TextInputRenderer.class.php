<?php

class cocktail_core_renderer_TextInputRenderer extends cocktail_core_renderer_EmbeddedBoxRenderer {
	public function __construct($node) {
		if(!php_Boot::$skip_constructor) {
		parent::__construct($node);
		$this->_nativeTextInput = new cocktail_port_platform_input_AbstractNativeTextInput();
		$node->addEventListener("focus", (isset($this->onTextInputFocus) ? $this->onTextInputFocus: array($this, "onTextInputFocus")), null);
	}}
	public function set_value($value) {
		return $this->_nativeTextInput->set_value($value);
	}
	public function get_value() {
		return $this->_nativeTextInput->get_value();
	}
	public function updateNativeTextInput() {
		$globalBounds = $this->get_globalBounds();
		$x = $globalBounds->x - $this->scrollOffset->x;
		$y = $globalBounds->y + $globalBounds->height / 2 - $this->coreStyle->get_fontMetricsData()->fontSize + $this->coreStyle->get_fontMetricsData()->ascent / 2 - $this->scrollOffset->y;
		$width = $globalBounds->width;
		$height = $globalBounds->height;
		$this->_nativeTextInput->set_viewport(new cocktail_core_geom_RectangleVO($x, $y, $width, $height));
		$this->_nativeTextInput->set_fontFamily(_hx_array_get(cocktail_core_css_CSSValueConverter::getFontFamilyAsStringArray($this->coreStyle->get_fontFamily()), 0));
		$this->_nativeTextInput->set_letterSpacing($this->coreStyle->usedValues->letterSpacing);
		$this->_nativeTextInput->set_fontSize($this->coreStyle->getAbsoluteLength($this->coreStyle->get_fontSize()));
		$bold = false;
		$»t = ($this->coreStyle->get_fontWeight());
		switch($»t->index) {
		case 4:
		$value = $»t->params[0];
		{
			$»t2 = ($value);
			switch($»t2->index) {
			case 3:
			case 0:
			{
				$bold = false;
			}break;
			case 2:
			case 1:
			{
				$bold = true;
			}break;
			default:{
				throw new HException("Illegal keyword for bold style");
			}break;
			}
		}break;
		case 0:
		$value = $»t->params[0];
		{
			$bold = $value > 400;
		}break;
		default:{
			throw new HException("Illegal value for bold style");
		}break;
		}
		$this->_nativeTextInput->set_italic($bold);
		$this->_nativeTextInput->set_italic($this->coreStyle->getKeyword($this->coreStyle->get_fontStyle()) == cocktail_core_css_CSSKeywordValue::$ITALIC);
		$this->_nativeTextInput->set_letterSpacing($this->coreStyle->usedValues->letterSpacing);
		$this->_nativeTextInput->set_color($this->coreStyle->usedValues->color->color);
	}
	public function onTextInputFocus($e) {
		$this->_nativeTextInput->focus();
	}
	public function renderEmbeddedAsset($graphicContext) {
		$this->updateNativeTextInput();
		$this->_nativeTextInput->attach($graphicContext);
	}
	public function createLayer($parentLayer) {
		$this->layerRenderer = new cocktail_core_layer_CompositingLayerRenderer($this);
		$parentLayer->appendChild($this->layerRenderer);
		$this->_hasOwnLayer = true;
	}
	public function createOwnLayer() {
		return true;
	}
	public $value;
	public $_nativeTextInput;
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
	static $__properties__ = array("set_value" => "set_value","get_value" => "get_value","set_bounds" => "set_bounds","get_bounds" => "get_bounds","get_globalBounds" => "get_globalBounds","get_scrollableBounds" => "get_scrollableBounds","set_scrollLeft" => "set_scrollLeft","get_scrollLeft" => "get_scrollLeft","set_scrollTop" => "set_scrollTop","get_scrollTop" => "get_scrollTop","get_scrollWidth" => "get_scrollWidth","get_scrollHeight" => "get_scrollHeight","get_firstChild" => "get_firstChild","get_lastChild" => "get_lastChild","get_nextSibling" => "get_nextSibling","get_previousSibling" => "get_previousSibling","set_onclick" => "set_onClick","set_ondblclick" => "set_onDblClick","set_onmousedown" => "set_onMouseDown","set_onmouseup" => "set_onMouseUp","set_onmouseover" => "set_onMouseOver","set_onmouseout" => "set_onMouseOut","set_onmousemove" => "set_onMouseMove","set_onmousewheel" => "set_onMouseWheel","set_onkeydown" => "set_onKeyDown","set_onkeyup" => "set_onKeyUp","set_onfocus" => "set_onFocus","set_onblur" => "set_onBlur","set_onresize" => "set_onResize","set_onfullscreenchange" => "set_onFullScreenChange","set_onscroll" => "set_onScroll","set_onload" => "set_onLoad","set_onerror" => "set_onError","set_onloadstart" => "set_onLoadStart","set_onprogress" => "set_onProgress","set_onsuspend" => "set_onSuspend","set_onemptied" => "set_onEmptied","set_onstalled" => "set_onStalled","set_onloadedmetadata" => "set_onLoadedMetadata","set_onloadeddata" => "set_onLoadedData","set_oncanplay" => "set_onCanPlay","set_oncanplaythrough" => "set_onCanPlayThrough","set_onplaying" => "set_onPlaying","set_onwaiting" => "set_onWaiting","set_onseeking" => "set_onSeeking","set_onseeked" => "set_onSeeked","set_onended" => "set_onEnded","set_ondurationchange" => "set_onDurationChanged","set_ontimeupdate" => "set_onTimeUpdate","set_onplay" => "set_onPlay","set_onpause" => "set_onPause","set_onvolumechange" => "set_onVolumeChange","set_ontransitionend" => "set_onTransitionEnd");
	function __toString() { return 'cocktail.core.renderer.TextInputRenderer'; }
}

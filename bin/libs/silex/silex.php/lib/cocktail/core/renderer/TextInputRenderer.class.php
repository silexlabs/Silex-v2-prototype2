<?php

class cocktail_core_renderer_TextInputRenderer extends cocktail_core_renderer_EmbeddedBoxRenderer {
	public function __construct($node) {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.renderer.TextInputRenderer::new");
		$»spos = $GLOBALS['%s']->length;
		parent::__construct($node);
		$this->nativeTextInput = new cocktail_port_platform_input_AbstractNativeTextInput();
		$node->addEventListener("focus", (isset($this->onTextInputFocus) ? $this->onTextInputFocus: array($this, "onTextInputFocus")), null);
		$GLOBALS['%s']->pop();
	}}
	public function set_value($value) {
		$GLOBALS['%s']->push("cocktail.core.renderer.TextInputRenderer::set_value");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->nativeTextInput->set_value($value);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_value() {
		$GLOBALS['%s']->push("cocktail.core.renderer.TextInputRenderer::get_value");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->nativeTextInput->get_value();
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function updateNativeTextInput() {
		$GLOBALS['%s']->push("cocktail.core.renderer.TextInputRenderer::updateNativeTextInput");
		$»spos = $GLOBALS['%s']->length;
		$globalBounds = $this->get_globalBounds();
		$x = $globalBounds->x - $this->scrollOffset->x;
		$y = $globalBounds->y + $globalBounds->height / 2 - $this->coreStyle->fontMetrics->fontSize + $this->coreStyle->fontMetrics->ascent / 2 - $this->scrollOffset->y;
		$width = $globalBounds->width;
		$height = $globalBounds->height;
		$viewport = new cocktail_core_geom_RectangleVO();
		$viewport->x = $x;
		$viewport->y = $y;
		$viewport->width = $width;
		$viewport->height = $height;
		$this->nativeTextInput->set_viewport($viewport);
		$this->nativeTextInput->set_fontFamily(_hx_array_get(cocktail_core_css_CSSValueConverter::getFontFamilyAsStringArray(_hx_deref((cocktail_core_renderer_TextInputRenderer_0($this, $globalBounds, $height, $viewport, $width, $x, $y)))->typedValue), 0));
		$this->nativeTextInput->set_letterSpacing($this->coreStyle->usedValues->letterSpacing);
		$this->nativeTextInput->set_fontSize($this->coreStyle->getAbsoluteLength(cocktail_core_renderer_TextInputRenderer_1($this, $globalBounds, $height, $viewport, $width, $x, $y)));
		$bold = false;
		$»t = (_hx_deref((cocktail_core_renderer_TextInputRenderer_2($this, $bold, $globalBounds, $height, $viewport, $width, $x, $y)))->typedValue);
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
		$this->nativeTextInput->set_italic($bold);
		$this->nativeTextInput->set_italic($this->coreStyle->getKeyword(_hx_deref((cocktail_core_renderer_TextInputRenderer_3($this, $bold, $globalBounds, $height, $viewport, $width, $x, $y)))->typedValue) == cocktail_core_css_CSSKeywordValue::$ITALIC);
		$this->nativeTextInput->set_letterSpacing($this->coreStyle->usedValues->letterSpacing);
		$this->nativeTextInput->set_color($this->coreStyle->usedValues->color->color);
		$GLOBALS['%s']->pop();
	}
	public function onTextInputFocus($e) {
		$GLOBALS['%s']->push("cocktail.core.renderer.TextInputRenderer::onTextInputFocus");
		$»spos = $GLOBALS['%s']->length;
		$this->nativeTextInput->focus();
		$GLOBALS['%s']->pop();
	}
	public function renderEmbeddedAsset($graphicContext) {
		$GLOBALS['%s']->push("cocktail.core.renderer.TextInputRenderer::renderEmbeddedAsset");
		$»spos = $GLOBALS['%s']->length;
		$this->updateNativeTextInput();
		$GLOBALS['%s']->pop();
	}
	public function doCreateLayer() {
		$GLOBALS['%s']->push("cocktail.core.renderer.TextInputRenderer::doCreateLayer");
		$»spos = $GLOBALS['%s']->length;
		$this->layerRenderer = new cocktail_core_layer_TextInputLayerRenderer($this);
		$GLOBALS['%s']->pop();
	}
	public function createOwnLayer() {
		$GLOBALS['%s']->push("cocktail.core.renderer.TextInputRenderer::createOwnLayer");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return true;
		}
		$GLOBALS['%s']->pop();
	}
	public $value;
	public $nativeTextInput;
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
	static $__properties__ = array("set_value" => "set_value","get_value" => "get_value","get_bounds" => "get_bounds","get_globalBounds" => "get_globalBounds","get_scrollableBounds" => "get_scrollableBounds","set_scrollLeft" => "set_scrollLeft","get_scrollLeft" => "get_scrollLeft","set_scrollTop" => "set_scrollTop","get_scrollTop" => "get_scrollTop","get_scrollWidth" => "get_scrollWidth","get_scrollHeight" => "get_scrollHeight");
	function __toString() { return 'cocktail.core.renderer.TextInputRenderer'; }
}
function cocktail_core_renderer_TextInputRenderer_0(&$»this, &$globalBounds, &$height, &$viewport, &$width, &$x, &$y) {
	$»spos = $GLOBALS['%s']->length;
	{
		$_this = $»this->coreStyle->computedValues;
		$typedProperty = null;
		$length = $_this->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($_this->_properties, $i)->name === "font-family") {
					$typedProperty = $_this->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}
function cocktail_core_renderer_TextInputRenderer_1(&$»this, &$globalBounds, &$height, &$viewport, &$width, &$x, &$y) {
	$»spos = $GLOBALS['%s']->length;
	{
		$_this = $»this->coreStyle;
		{
			$transition = $_this->_transitionManager->getTransition("font-size", $_this);
			if($transition !== null) {
				return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
			} else {
				return _hx_deref((cocktail_core_renderer_TextInputRenderer_4($»this, $_this, $globalBounds, $height, $transition, $viewport, $width, $x, $y)))->typedValue;
			}
			unset($transition);
		}
		unset($_this);
	}
}
function cocktail_core_renderer_TextInputRenderer_2(&$»this, &$bold, &$globalBounds, &$height, &$viewport, &$width, &$x, &$y) {
	$»spos = $GLOBALS['%s']->length;
	{
		$_this = $»this->coreStyle->computedValues;
		$typedProperty = null;
		$length = $_this->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($_this->_properties, $i)->name === "font-weight") {
					$typedProperty = $_this->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}
function cocktail_core_renderer_TextInputRenderer_3(&$»this, &$bold, &$globalBounds, &$height, &$viewport, &$width, &$x, &$y) {
	$»spos = $GLOBALS['%s']->length;
	{
		$_this = $»this->coreStyle->computedValues;
		$typedProperty = null;
		$length = $_this->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($_this->_properties, $i)->name === "font-style") {
					$typedProperty = $_this->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}
function cocktail_core_renderer_TextInputRenderer_4(&$»this, &$_this, &$globalBounds, &$height, &$transition, &$viewport, &$width, &$x, &$y) {
	$»spos = $GLOBALS['%s']->length;
	{
		$_this1 = $_this->computedValues;
		$typedProperty = null;
		$length = $_this1->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($_this1->_properties, $i)->name === "font-size") {
					$typedProperty = $_this1->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}

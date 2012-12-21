<?php

class cocktail_core_renderer_BoxRenderer extends cocktail_core_renderer_InvalidatingElementRenderer {
	public function __construct($domNode) {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.renderer.BoxRenderer::new");
		$»spos = $GLOBALS['%s']->length;
		parent::__construct($domNode);
		$this->_containerBlockData = new cocktail_core_layout_ContainingBlockVO(0.0, false, 0.0, false);
		$this->_windowData = new cocktail_core_layout_ContainingBlockVO(0.0, false, 0.0, false);
		$GLOBALS['%s']->pop();
	}}
	public function getWindowData() {
		$GLOBALS['%s']->push("cocktail.core.renderer.BoxRenderer::getWindowData");
		$»spos = $GLOBALS['%s']->length;
		$window = cocktail_Lib::get_window();
		$width = $window->get_innerWidth();
		$height = $window->get_innerHeight();
		$this->_windowData->width = $window->get_innerWidth();
		$this->_windowData->height = $window->get_innerHeight();
		$this->_windowData->isHeightAuto = false;
		$this->_windowData->isWidthAuto = false;
		{
			$»tmp = $this->_windowData;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getContainerBlockData() {
		$GLOBALS['%s']->push("cocktail.core.renderer.BoxRenderer::getContainerBlockData");
		$»spos = $GLOBALS['%s']->length;
		$this->_containerBlockData->width = $this->coreStyle->usedValues->width;
		$this->_containerBlockData->isWidthAuto = $this->coreStyle->isAuto(cocktail_core_renderer_BoxRenderer_0($this));
		$this->_containerBlockData->height = $this->coreStyle->usedValues->height;
		$this->_containerBlockData->isHeightAuto = $this->coreStyle->isAuto(cocktail_core_renderer_BoxRenderer_1($this));
		{
			$»tmp = $this->_containerBlockData;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getBackgroundBounds() {
		$GLOBALS['%s']->push("cocktail.core.renderer.BoxRenderer::getBackgroundBounds");
		$»spos = $GLOBALS['%s']->length;
		$this->get_globalBounds()->x -= $this->scrollOffset->x;
		$this->get_globalBounds()->y -= $this->scrollOffset->y;
		{
			$»tmp = $this->get_globalBounds();
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function isClear() {
		$GLOBALS['%s']->push("cocktail.core.renderer.BoxRenderer::isClear");
		$»spos = $GLOBALS['%s']->length;
		$»t = ($this->coreStyle->getKeyword(_hx_deref((cocktail_core_renderer_BoxRenderer_2($this)))->typedValue));
		switch($»t->index) {
		case 11:
		case 12:
		case 31:
		{
			$GLOBALS['%s']->pop();
			return true;
		}break;
		default:{
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function isTransparent() {
		$GLOBALS['%s']->push("cocktail.core.renderer.BoxRenderer::isTransparent");
		$»spos = $GLOBALS['%s']->length;
		$»t = (cocktail_core_renderer_BoxRenderer_3($this));
		switch($»t->index) {
		case 1:
		$value = $»t->params[0];
		{
			$»tmp = $value !== 1.0;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}break;
		case 17:
		$value = $»t->params[0];
		{
			$»tmp = $value !== 1.0;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}break;
		default:{
			$GLOBALS['%s']->pop();
			return false;
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	public function isVisible() {
		$GLOBALS['%s']->push("cocktail.core.renderer.BoxRenderer::isVisible");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->coreStyle->getKeyword(_hx_deref((cocktail_core_renderer_BoxRenderer_4($this)))->typedValue) != cocktail_core_css_CSSKeywordValue::$HIDDEN;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function isTransformed() {
		$GLOBALS['%s']->push("cocktail.core.renderer.BoxRenderer::isTransformed");
		$»spos = $GLOBALS['%s']->length;
		if($this->coreStyle->isNone(_hx_deref((cocktail_core_renderer_BoxRenderer_5($this)))->typedValue) === false) {
			$GLOBALS['%s']->pop();
			return true;
		}
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function createOwnLayer() {
		$GLOBALS['%s']->push("cocktail.core.renderer.BoxRenderer::createOwnLayer");
		$»spos = $GLOBALS['%s']->length;
		if($this->isPositioned() === true) {
			$GLOBALS['%s']->pop();
			return true;
		} else {
			if($this->isTransparent() === true) {
				$GLOBALS['%s']->pop();
				return true;
			} else {
				if($this->isTransformed() === true) {
					$GLOBALS['%s']->pop();
					return true;
				}
			}
		}
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function isInlineLevel() {
		$GLOBALS['%s']->push("cocktail.core.renderer.BoxRenderer::isInlineLevel");
		$»spos = $GLOBALS['%s']->length;
		$ret = false;
		$»t = ($this->coreStyle->getKeyword(_hx_deref((cocktail_core_renderer_BoxRenderer_6($this, $ret)))->typedValue));
		switch($»t->index) {
		case 30:
		case 29:
		{
			$ret = true;
		}break;
		default:{
			$ret = false;
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $ret;
		}
		$GLOBALS['%s']->pop();
	}
	public function isRelativePositioned() {
		$GLOBALS['%s']->push("cocktail.core.renderer.BoxRenderer::isRelativePositioned");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->coreStyle->getKeyword(_hx_deref((cocktail_core_renderer_BoxRenderer_7($this)))->typedValue) == cocktail_core_css_CSSKeywordValue::$RELATIVE;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function isPositioned() {
		$GLOBALS['%s']->push("cocktail.core.renderer.BoxRenderer::isPositioned");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->coreStyle->getKeyword(_hx_deref((cocktail_core_renderer_BoxRenderer_8($this)))->typedValue) != cocktail_core_css_CSSKeywordValue::$STATIC;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function isFloat() {
		$GLOBALS['%s']->push("cocktail.core.renderer.BoxRenderer::isFloat");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->coreStyle->isNone(_hx_deref((cocktail_core_renderer_BoxRenderer_9($this)))->typedValue) === false;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function computeBoxModelStyles($containingBlockDimensions) {
		$GLOBALS['%s']->push("cocktail.core.renderer.BoxRenderer::computeBoxModelStyles");
		$»spos = $GLOBALS['%s']->length;
		$htmlDocument = $this->domNode->ownerDocument;
		$boxComputer = $htmlDocument->layoutManager->getBoxStylesComputer($this);
		$boxComputer->measure($this->coreStyle, $containingBlockDimensions);
		$GLOBALS['%s']->pop();
	}
	public function layoutSelf() {
		$GLOBALS['%s']->push("cocktail.core.renderer.BoxRenderer::layoutSelf");
		$»spos = $GLOBALS['%s']->length;
		$containingBlockData = $this->containingBlock->getContainerBlockData();
		if($containingBlockData->isHeightAuto === true && $this->containingBlock->domNode->tagName !== "BODY") {
			if($this->isPositioned() === false || $this->isRelativePositioned() === true) {
				$»t = (cocktail_core_renderer_BoxRenderer_10($this, $containingBlockData));
				switch($»t->index) {
				case 2:
				$value = $»t->params[0];
				{
					$this->coreStyle->computedValues->set_height("auto");
				}break;
				default:{
				}break;
				}
			}
		}
		if($this->isPositioned() === true && $this->isRelativePositioned() === false) {
			if($this->containingBlock->isBlockContainer() === true) {
				$containingBlockUsedValues = $this->containingBlock->coreStyle->usedValues;
				$containingBlockData->height += $containingBlockUsedValues->paddingTop + $containingBlockUsedValues->paddingBottom;
				$containingBlockData->width += $containingBlockUsedValues->paddingLeft + $containingBlockUsedValues->paddingRight;
			}
		}
		cocktail_core_layout_computer_FontAndTextStylesComputer::compute($this->coreStyle, $containingBlockData);
		$this->computeBoxModelStyles($containingBlockData);
		$GLOBALS['%s']->pop();
	}
	public function layout($forceLayout) {
		$GLOBALS['%s']->push("cocktail.core.renderer.BoxRenderer::layout");
		$»spos = $GLOBALS['%s']->length;
		if($this->_needsLayout === true || $forceLayout === true) {
			$this->layoutSelf();
			$this->_needsLayout = false;
		}
		$GLOBALS['%s']->pop();
	}
	public function renderChildren($graphicContext) {
		$GLOBALS['%s']->push("cocktail.core.renderer.BoxRenderer::renderChildren");
		$»spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public function renderBackground($graphicContext) {
		$GLOBALS['%s']->push("cocktail.core.renderer.BoxRenderer::renderBackground");
		$»spos = $GLOBALS['%s']->length;
		$backgroundBounds = $this->getBackgroundBounds();
		cocktail_core_background_BackgroundManager::render($graphicContext, $backgroundBounds, $this->coreStyle, $this);
		$GLOBALS['%s']->pop();
	}
	public function renderSelf($graphicContext) {
		$GLOBALS['%s']->push("cocktail.core.renderer.BoxRenderer::renderSelf");
		$»spos = $GLOBALS['%s']->length;
		$this->renderBackground($graphicContext);
		$GLOBALS['%s']->pop();
	}
	public function render($parentGraphicContext) {
		$GLOBALS['%s']->push("cocktail.core.renderer.BoxRenderer::render");
		$»spos = $GLOBALS['%s']->length;
		if($this->isVisible() === true) {
			$this->renderSelf($parentGraphicContext);
		}
		$this->renderChildren($parentGraphicContext);
		$GLOBALS['%s']->pop();
	}
	public function updateLineBoxes() {
		$GLOBALS['%s']->push("cocktail.core.renderer.BoxRenderer::updateLineBoxes");
		$»spos = $GLOBALS['%s']->length;
		$this->lineBoxes = new _hx_array(array());
		if($this->isPositioned() === true && $this->isRelativePositioned() === false) {
			$staticLineBox = new cocktail_core_linebox_StaticPositionLineBox($this);
			$this->lineBoxes->push($staticLineBox);
		} else {
			$embeddedLineBox = new cocktail_core_linebox_EmbeddedLineBox($this);
			$this->lineBoxes->push($embeddedLineBox);
		}
		parent::updateLineBoxes();
		$GLOBALS['%s']->pop();
	}
	public $_windowData;
	public $_containerBlockData;
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
	static $__properties__ = array("get_bounds" => "get_bounds","get_globalBounds" => "get_globalBounds","get_scrollableBounds" => "get_scrollableBounds","set_scrollLeft" => "set_scrollLeft","get_scrollLeft" => "get_scrollLeft","set_scrollTop" => "set_scrollTop","get_scrollTop" => "get_scrollTop","get_scrollWidth" => "get_scrollWidth","get_scrollHeight" => "get_scrollHeight");
	function __toString() { return 'cocktail.core.renderer.BoxRenderer'; }
}
function cocktail_core_renderer_BoxRenderer_0(&$»this) {
	$»spos = $GLOBALS['%s']->length;
	{
		$_this = $»this->coreStyle;
		{
			$transition = $_this->_transitionManager->getTransition("width", $_this);
			if($transition !== null) {
				return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
			} else {
				return _hx_deref((cocktail_core_renderer_BoxRenderer_11($»this, $_this, $transition)))->typedValue;
			}
			unset($transition);
		}
		unset($_this);
	}
}
function cocktail_core_renderer_BoxRenderer_1(&$»this) {
	$»spos = $GLOBALS['%s']->length;
	{
		$_this = $»this->coreStyle;
		{
			$transition = $_this->_transitionManager->getTransition("height", $_this);
			if($transition !== null) {
				return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
			} else {
				return _hx_deref((cocktail_core_renderer_BoxRenderer_12($»this, $_this, $transition)))->typedValue;
			}
			unset($transition);
		}
		unset($_this);
	}
}
function cocktail_core_renderer_BoxRenderer_2(&$»this) {
	$»spos = $GLOBALS['%s']->length;
	{
		$_this = $»this->coreStyle->computedValues;
		$typedProperty = null;
		$length = $_this->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($_this->_properties, $i)->name === "clear") {
					$typedProperty = $_this->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}
function cocktail_core_renderer_BoxRenderer_3(&$»this) {
	$»spos = $GLOBALS['%s']->length;
	{
		$_this = $»this->coreStyle;
		{
			$transition = $_this->_transitionManager->getTransition("opacity", $_this);
			if($transition !== null) {
				return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
			} else {
				return _hx_deref((cocktail_core_renderer_BoxRenderer_13($»this, $_this, $transition)))->typedValue;
			}
			unset($transition);
		}
		unset($_this);
	}
}
function cocktail_core_renderer_BoxRenderer_4(&$»this) {
	$»spos = $GLOBALS['%s']->length;
	{
		$_this = $»this->coreStyle->computedValues;
		$typedProperty = null;
		$length = $_this->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($_this->_properties, $i)->name === "visibility") {
					$typedProperty = $_this->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}
function cocktail_core_renderer_BoxRenderer_5(&$»this) {
	$»spos = $GLOBALS['%s']->length;
	{
		$_this = $»this->coreStyle->computedValues;
		$typedProperty = null;
		$length = $_this->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($_this->_properties, $i)->name === "transform") {
					$typedProperty = $_this->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}
function cocktail_core_renderer_BoxRenderer_6(&$»this, &$ret) {
	$»spos = $GLOBALS['%s']->length;
	{
		$_this = $»this->coreStyle->computedValues;
		$typedProperty = null;
		$length = $_this->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($_this->_properties, $i)->name === "display") {
					$typedProperty = $_this->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}
function cocktail_core_renderer_BoxRenderer_7(&$»this) {
	$»spos = $GLOBALS['%s']->length;
	{
		$_this = $»this->coreStyle->computedValues;
		$typedProperty = null;
		$length = $_this->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($_this->_properties, $i)->name === "position") {
					$typedProperty = $_this->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}
function cocktail_core_renderer_BoxRenderer_8(&$»this) {
	$»spos = $GLOBALS['%s']->length;
	{
		$_this = $»this->coreStyle->computedValues;
		$typedProperty = null;
		$length = $_this->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($_this->_properties, $i)->name === "position") {
					$typedProperty = $_this->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}
function cocktail_core_renderer_BoxRenderer_9(&$»this) {
	$»spos = $GLOBALS['%s']->length;
	{
		$_this = $»this->coreStyle->computedValues;
		$typedProperty = null;
		$length = $_this->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($_this->_properties, $i)->name === "float") {
					$typedProperty = $_this->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}
function cocktail_core_renderer_BoxRenderer_10(&$»this, &$containingBlockData) {
	$»spos = $GLOBALS['%s']->length;
	{
		$_this = $»this->coreStyle;
		{
			$transition = $_this->_transitionManager->getTransition("height", $_this);
			if($transition !== null) {
				return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
			} else {
				return _hx_deref((cocktail_core_renderer_BoxRenderer_14($»this, $_this, $containingBlockData, $transition)))->typedValue;
			}
			unset($transition);
		}
		unset($_this);
	}
}
function cocktail_core_renderer_BoxRenderer_11(&$»this, &$_this, &$transition) {
	$»spos = $GLOBALS['%s']->length;
	{
		$_this1 = $_this->computedValues;
		$typedProperty = null;
		$length = $_this1->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($_this1->_properties, $i)->name === "width") {
					$typedProperty = $_this1->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}
function cocktail_core_renderer_BoxRenderer_12(&$»this, &$_this, &$transition) {
	$»spos = $GLOBALS['%s']->length;
	{
		$_this1 = $_this->computedValues;
		$typedProperty = null;
		$length = $_this1->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($_this1->_properties, $i)->name === "height") {
					$typedProperty = $_this1->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}
function cocktail_core_renderer_BoxRenderer_13(&$»this, &$_this, &$transition) {
	$»spos = $GLOBALS['%s']->length;
	{
		$_this1 = $_this->computedValues;
		$typedProperty = null;
		$length = $_this1->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($_this1->_properties, $i)->name === "opacity") {
					$typedProperty = $_this1->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}
function cocktail_core_renderer_BoxRenderer_14(&$»this, &$_this, &$containingBlockData, &$transition) {
	$»spos = $GLOBALS['%s']->length;
	{
		$_this1 = $_this->computedValues;
		$typedProperty = null;
		$length = $_this1->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($_this1->_properties, $i)->name === "height") {
					$typedProperty = $_this1->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}

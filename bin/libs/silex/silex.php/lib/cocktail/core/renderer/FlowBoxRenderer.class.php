<?php

class cocktail_core_renderer_FlowBoxRenderer extends cocktail_core_renderer_BoxRenderer {
	public function __construct($node) {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.renderer.FlowBoxRenderer::new");
		$»spos = $GLOBALS['%s']->length;
		parent::__construct($node);
		$this->_positionedChildren = new _hx_array(array());
		$GLOBALS['%s']->pop();
	}}
	public function childrenInline() {
		$GLOBALS['%s']->push("cocktail.core.renderer.FlowBoxRenderer::childrenInline");
		$»spos = $GLOBALS['%s']->length;
		$child = $this->firstChild;
		while($child !== null) {
			if($child->isInlineLevel() === true) {
				if($child->isFloat() === false) {
					if($child->isPositioned() === false || $child->isRelativePositioned() === true) {
						$GLOBALS['%s']->pop();
						return true;
					}
				}
			}
			$child = $child->nextSibling;
		}
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function getBottomOffset($elementRenderer, $containingHTMLElementHeight) {
		$GLOBALS['%s']->push("cocktail.core.renderer.FlowBoxRenderer::getBottomOffset");
		$»spos = $GLOBALS['%s']->length;
		$usedValues = $elementRenderer->coreStyle->usedValues;
		{
			$»tmp = $containingHTMLElementHeight - $usedValues->height - $usedValues->paddingTop - $usedValues->paddingBottom - $usedValues->bottom - $usedValues->marginBottom;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getTopOffset($elementRenderer) {
		$GLOBALS['%s']->push("cocktail.core.renderer.FlowBoxRenderer::getTopOffset");
		$»spos = $GLOBALS['%s']->length;
		$usedValues = $elementRenderer->coreStyle->usedValues;
		{
			$»tmp = $usedValues->top + $usedValues->marginTop;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getRightOffset($elementRenderer, $containingHTMLElementWidth) {
		$GLOBALS['%s']->push("cocktail.core.renderer.FlowBoxRenderer::getRightOffset");
		$»spos = $GLOBALS['%s']->length;
		$usedValues = $elementRenderer->coreStyle->usedValues;
		{
			$»tmp = $containingHTMLElementWidth - $usedValues->width - $usedValues->paddingLeft - $usedValues->paddingRight - $usedValues->right - $usedValues->marginRight;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getLeftOffset($elementRenderer) {
		$GLOBALS['%s']->push("cocktail.core.renderer.FlowBoxRenderer::getLeftOffset");
		$»spos = $GLOBALS['%s']->length;
		$usedValues = $elementRenderer->coreStyle->usedValues;
		{
			$»tmp = $usedValues->left + $usedValues->marginLeft;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function doLayoutPositionedChild($elementRenderer, $containingBlockData) {
		$GLOBALS['%s']->push("cocktail.core.renderer.FlowBoxRenderer::doLayoutPositionedChild");
		$»spos = $GLOBALS['%s']->length;
		$elementCoreStyle = $elementRenderer->coreStyle;
		if($elementCoreStyle->isAuto(cocktail_core_renderer_FlowBoxRenderer_0($this, $containingBlockData, $elementCoreStyle, $elementRenderer)) === false) {
			$elementRenderer->positionedOrigin->x = $this->getLeftOffset($elementRenderer);
		} else {
			if($elementCoreStyle->isAuto(cocktail_core_renderer_FlowBoxRenderer_1($this, $containingBlockData, $elementCoreStyle, $elementRenderer)) === false) {
				$elementRenderer->positionedOrigin->x = $this->getRightOffset($elementRenderer, $containingBlockData->width);
			}
		}
		if($elementCoreStyle->isAuto(cocktail_core_renderer_FlowBoxRenderer_2($this, $containingBlockData, $elementCoreStyle, $elementRenderer)) === false) {
			$elementRenderer->positionedOrigin->y = $this->getTopOffset($elementRenderer);
		} else {
			if($elementCoreStyle->isAuto(cocktail_core_renderer_FlowBoxRenderer_3($this, $containingBlockData, $elementCoreStyle, $elementRenderer)) === false) {
				$elementRenderer->positionedOrigin->y = $this->getBottomOffset($elementRenderer, $containingBlockData->height);
			}
		}
		$GLOBALS['%s']->pop();
	}
	public function layoutPositionedChild($elementRenderer, $firstPositionedAncestorData, $viewportData) {
		$GLOBALS['%s']->push("cocktail.core.renderer.FlowBoxRenderer::layoutPositionedChild");
		$»spos = $GLOBALS['%s']->length;
		$coreStyle = $elementRenderer->coreStyle;
		$»t = ($coreStyle->getKeyword(_hx_deref((cocktail_core_renderer_FlowBoxRenderer_4($this, $coreStyle, $elementRenderer, $firstPositionedAncestorData, $viewportData)))->typedValue));
		switch($»t->index) {
		case 35:
		{
			$this->doLayoutPositionedChild($elementRenderer, $viewportData);
		}break;
		case 34:
		{
			$this->doLayoutPositionedChild($elementRenderer, $firstPositionedAncestorData);
		}break;
		default:{
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	public function layoutPositionedChildren() {
		$GLOBALS['%s']->push("cocktail.core.renderer.FlowBoxRenderer::layoutPositionedChildren");
		$»spos = $GLOBALS['%s']->length;
		$containerBlockData = $this->getContainerBlockData();
		$windowData = $this->getWindowData();
		$length = $this->_positionedChildren->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				$this->layoutPositionedChild($this->_positionedChildren[$i], $containerBlockData, $windowData);
				unset($i);
			}
		}
		$GLOBALS['%s']->pop();
	}
	public function layoutChildren() {
		$GLOBALS['%s']->push("cocktail.core.renderer.FlowBoxRenderer::layoutChildren");
		$»spos = $GLOBALS['%s']->length;
		$child = $this->firstChild;
		while($child !== null) {
			$child->layout($this->_childrenNeedLayout);
			$child = $child->nextSibling;
		}
		$GLOBALS['%s']->pop();
	}
	public function layout($forceLayout) {
		$GLOBALS['%s']->push("cocktail.core.renderer.FlowBoxRenderer::layout");
		$»spos = $GLOBALS['%s']->length;
		parent::layout($forceLayout);
		$this->layoutChildren();
		if($this->_positionedChildrenNeedLayout === true || $forceLayout === true) {
			if($this->isPositioned() === true) {
				$this->layoutPositionedChildren();
			}
			$this->_positionedChildrenNeedLayout = false;
		}
		$GLOBALS['%s']->pop();
	}
	public function removePositionedChild($element) {
		$GLOBALS['%s']->push("cocktail.core.renderer.FlowBoxRenderer::removePositionedChild");
		$»spos = $GLOBALS['%s']->length;
		$this->_positionedChildren->remove($element);
		$GLOBALS['%s']->pop();
	}
	public function addPositionedChildren($element) {
		$GLOBALS['%s']->push("cocktail.core.renderer.FlowBoxRenderer::addPositionedChildren");
		$»spos = $GLOBALS['%s']->length;
		$this->_positionedChildren->push($element);
		$GLOBALS['%s']->pop();
	}
	public $_positionedChildren;
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
	function __toString() { return 'cocktail.core.renderer.FlowBoxRenderer'; }
}
function cocktail_core_renderer_FlowBoxRenderer_0(&$»this, &$containingBlockData, &$elementCoreStyle, &$elementRenderer) {
	$»spos = $GLOBALS['%s']->length;
	{
		$transition = $elementCoreStyle->_transitionManager->getTransition("left", $elementCoreStyle);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_renderer_FlowBoxRenderer_5($»this, $containingBlockData, $elementCoreStyle, $elementRenderer, $transition)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_renderer_FlowBoxRenderer_1(&$»this, &$containingBlockData, &$elementCoreStyle, &$elementRenderer) {
	$»spos = $GLOBALS['%s']->length;
	{
		$transition = $elementCoreStyle->_transitionManager->getTransition("right", $elementCoreStyle);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_renderer_FlowBoxRenderer_6($»this, $containingBlockData, $elementCoreStyle, $elementRenderer, $transition)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_renderer_FlowBoxRenderer_2(&$»this, &$containingBlockData, &$elementCoreStyle, &$elementRenderer) {
	$»spos = $GLOBALS['%s']->length;
	{
		$transition = $elementCoreStyle->_transitionManager->getTransition("top", $elementCoreStyle);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_renderer_FlowBoxRenderer_7($»this, $containingBlockData, $elementCoreStyle, $elementRenderer, $transition)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_renderer_FlowBoxRenderer_3(&$»this, &$containingBlockData, &$elementCoreStyle, &$elementRenderer) {
	$»spos = $GLOBALS['%s']->length;
	{
		$transition = $elementCoreStyle->_transitionManager->getTransition("bottom", $elementCoreStyle);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_renderer_FlowBoxRenderer_8($»this, $containingBlockData, $elementCoreStyle, $elementRenderer, $transition)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_renderer_FlowBoxRenderer_4(&$»this, &$coreStyle, &$elementRenderer, &$firstPositionedAncestorData, &$viewportData) {
	$»spos = $GLOBALS['%s']->length;
	{
		$_this = $elementRenderer->coreStyle->computedValues;
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
function cocktail_core_renderer_FlowBoxRenderer_5(&$»this, &$containingBlockData, &$elementCoreStyle, &$elementRenderer, &$transition) {
	$»spos = $GLOBALS['%s']->length;
	{
		$_this = $elementCoreStyle->computedValues;
		$typedProperty = null;
		$length = $_this->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($_this->_properties, $i)->name === "left") {
					$typedProperty = $_this->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}
function cocktail_core_renderer_FlowBoxRenderer_6(&$»this, &$containingBlockData, &$elementCoreStyle, &$elementRenderer, &$transition) {
	$»spos = $GLOBALS['%s']->length;
	{
		$_this = $elementCoreStyle->computedValues;
		$typedProperty = null;
		$length = $_this->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($_this->_properties, $i)->name === "right") {
					$typedProperty = $_this->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}
function cocktail_core_renderer_FlowBoxRenderer_7(&$»this, &$containingBlockData, &$elementCoreStyle, &$elementRenderer, &$transition) {
	$»spos = $GLOBALS['%s']->length;
	{
		$_this = $elementCoreStyle->computedValues;
		$typedProperty = null;
		$length = $_this->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($_this->_properties, $i)->name === "top") {
					$typedProperty = $_this->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}
function cocktail_core_renderer_FlowBoxRenderer_8(&$»this, &$containingBlockData, &$elementCoreStyle, &$elementRenderer, &$transition) {
	$»spos = $GLOBALS['%s']->length;
	{
		$_this = $elementCoreStyle->computedValues;
		$typedProperty = null;
		$length = $_this->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($_this->_properties, $i)->name === "bottom") {
					$typedProperty = $_this->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}

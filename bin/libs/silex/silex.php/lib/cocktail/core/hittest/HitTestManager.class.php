<?php

class cocktail_core_hittest_HitTestManager {
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.hittest.HitTestManager::new");
		$»spos = $GLOBALS['%s']->length;
		$this->_scrolledPoint = new cocktail_core_geom_PointVO(0.0, 0.0);
		$this->_targetPoint = new cocktail_core_geom_PointVO(0.0, 0.0);
		$this->_elementRenderersAtPoint = new _hx_array(array());
		$GLOBALS['%s']->pop();
	}}
	public function isWithinBounds($point, $bounds) {
		$GLOBALS['%s']->push("cocktail.core.hittest.HitTestManager::isWithinBounds");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $point->x >= $bounds->x && $point->x <= $bounds->x + $bounds->width && $point->y >= $bounds->y && $point->y <= $bounds->y + $bounds->height;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function doGetElementRenderersAtPointInChildRenderers($elementRenderersAtPoint, $layer, $childRenderers, $point, $scrollX, $scrollY) {
		$GLOBALS['%s']->push("cocktail.core.hittest.HitTestManager::doGetElementRenderersAtPointInChildRenderers");
		$»spos = $GLOBALS['%s']->length;
		$length = $childRenderers->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				$child = _hx_array_get($childRenderers, $i)->rootElementRenderer;
				if($child !== null) {
					if($child->createOwnLayer() === true) {
						if($child->isScrollBar() === true) {
							$this->getElementRenderersAtPoint($elementRenderersAtPoint, $child->layerRenderer, $point, $scrollX, $scrollY);
						} else {
							if($child->coreStyle->getKeyword(_hx_deref((cocktail_core_hittest_HitTestManager_0($this, $_g, $child, $childRenderers, $elementRenderersAtPoint, $i, $layer, $length, $point, $scrollX, $scrollY)))->typedValue) == cocktail_core_css_CSSKeywordValue::$FIXED) {
								$this->getElementRenderersAtPoint($elementRenderersAtPoint, $child->layerRenderer, $point, $scrollX, $scrollY);
							} else {
								$this->getElementRenderersAtPoint($elementRenderersAtPoint, $child->layerRenderer, $point, $scrollX + $layer->rootElementRenderer->get_scrollLeft(), $scrollY + $layer->rootElementRenderer->get_scrollTop());
							}
						}
					}
				}
				unset($i,$child);
			}
		}
		$GLOBALS['%s']->pop();
	}
	public function getElementRenderersAtPointInChildRenderers($elementRenderersAtPoint, $layer, $point, $scrollX, $scrollY) {
		$GLOBALS['%s']->push("cocktail.core.hittest.HitTestManager::getElementRenderersAtPointInChildRenderers");
		$»spos = $GLOBALS['%s']->length;
		$this->doGetElementRenderersAtPointInChildRenderers($elementRenderersAtPoint, $layer, $layer->negativeZIndexChildLayerRenderers, $point, $scrollX, $scrollY);
		$this->doGetElementRenderersAtPointInChildRenderers($elementRenderersAtPoint, $layer, $layer->zeroAndAutoZIndexChildLayerRenderers, $point, $scrollX, $scrollY);
		$this->doGetElementRenderersAtPointInChildRenderers($elementRenderersAtPoint, $layer, $layer->positiveZIndexChildLayerRenderers, $point, $scrollX, $scrollY);
		$GLOBALS['%s']->pop();
	}
	public function getElementRenderersAtPointInLayer($elementRenderersAtPoint, $layer, $renderer, $point, $scrollX, $scrollY) {
		$GLOBALS['%s']->push("cocktail.core.hittest.HitTestManager::getElementRenderersAtPointInLayer");
		$»spos = $GLOBALS['%s']->length;
		$this->_scrolledPoint->x = $point->x + $scrollX;
		$this->_scrolledPoint->y = $point->y + $scrollY;
		if($this->isWithinBounds($this->_scrolledPoint, $renderer->get_globalBounds()) === true) {
			if($renderer->isVisible() === true) {
				$elementRenderersAtPoint->push($renderer);
			}
		}
		$scrollX += $renderer->get_scrollLeft();
		$scrollY += $renderer->get_scrollTop();
		$child = $renderer->firstChild;
		while($child !== null) {
			if($child->layerRenderer === $layer) {
				if($child->firstChild !== null) {
					$this->getElementRenderersAtPointInLayer($elementRenderersAtPoint, $layer, $child, $point, $scrollX, $scrollY);
				} else {
					$this->_scrolledPoint->x = $point->x + $scrollX;
					$this->_scrolledPoint->y = $point->y + $scrollY;
					if($this->isWithinBounds($this->_scrolledPoint, $child->get_globalBounds()) === true) {
						if($child->isVisible() === true) {
							$elementRenderersAtPoint->push($child);
						}
					}
				}
			}
			$child = $child->nextSibling;
		}
		$GLOBALS['%s']->pop();
	}
	public function getElementRenderersAtPoint($elementRenderersAtPoint, $layer, $point, $scrollX, $scrollY) {
		$GLOBALS['%s']->push("cocktail.core.hittest.HitTestManager::getElementRenderersAtPoint");
		$»spos = $GLOBALS['%s']->length;
		$this->getElementRenderersAtPointInLayer($elementRenderersAtPoint, $layer, $layer->rootElementRenderer, $point, $scrollX, $scrollY);
		if($layer->rootElementRenderer->firstChild !== null) {
			$this->getElementRenderersAtPointInChildRenderers($elementRenderersAtPoint, $layer, $point, $scrollX, $scrollY);
		}
		$GLOBALS['%s']->pop();
	}
	public function getTopMostElementRendererAtPoint($layer, $x, $y, $scrollX, $scrollY) {
		$GLOBALS['%s']->push("cocktail.core.hittest.HitTestManager::getTopMostElementRendererAtPoint");
		$»spos = $GLOBALS['%s']->length;
		$this->_targetPoint->x = $x;
		$this->_targetPoint->y = $y;
		$this->_elementRenderersAtPoint = cocktail_core_utils_Utils::clear($this->_elementRenderersAtPoint);
		$this->getElementRenderersAtPoint($this->_elementRenderersAtPoint, $layer, $this->_targetPoint, $scrollX, $scrollY);
		{
			$»tmp = $this->_elementRenderersAtPoint[$this->_elementRenderersAtPoint->length - 1];
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public $_targetPoint;
	public $_elementRenderersAtPoint;
	public $_scrolledPoint;
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
	function __toString() { return 'cocktail.core.hittest.HitTestManager'; }
}
function cocktail_core_hittest_HitTestManager_0(&$»this, &$_g, &$child, &$childRenderers, &$elementRenderersAtPoint, &$i, &$layer, &$length, &$point, &$scrollX, &$scrollY) {
	$»spos = $GLOBALS['%s']->length;
	{
		$_this = $child->coreStyle->computedValues;
		$typedProperty = null;
		$length1 = $_this->_properties->length;
		{
			$_g1 = 0;
			while($_g1 < $length1) {
				$i1 = $_g1++;
				if(_hx_array_get($_this->_properties, $i1)->name === "position") {
					$typedProperty = $_this->_properties[$i1];
				}
				unset($i1);
			}
		}
		return $typedProperty;
	}
}

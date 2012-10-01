<?php

class cocktail_core_layout_formatter_BlockFormattingContext extends cocktail_core_layout_formatter_FormattingContext {
	public function __construct($inlineFormattingContext, $floatsManager) {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.layout.formatter.BlockFormattingContext::new");
		$»spos = $GLOBALS['%s']->length;
		parent::__construct($floatsManager);
		$this->_inlineFormattingContext = $inlineFormattingContext;
		$this->_registeredFloats = new _hx_array(array());
		$GLOBALS['%s']->pop();
	}}
	public function getCollapsedMarginBottom($child, $parentCollapsedMarginBottom) {
		$GLOBALS['%s']->push("cocktail.core.layout.formatter.BlockFormattingContext::getCollapsedMarginBottom");
		$»spos = $GLOBALS['%s']->length;
		$childUsedValues = $child->coreStyle->usedValues;
		$marginBottom = $childUsedValues->marginBottom;
		if(_hx_equal($childUsedValues->paddingBottom, 0)) {
			if($child->get_nextSibling() !== null) {
				$nextSibling = $child->get_nextSibling();
				$nextSiblingUsedValues = $nextSibling->coreStyle->usedValues;
				if(_hx_equal($nextSiblingUsedValues->paddingTop, 0)) {
					if($nextSiblingUsedValues->marginTop > $marginBottom) {
						$marginBottom = 0;
					}
				}
			} else {
				if($child->parentNode !== null) {
					$parent = $child->parentNode;
					if($parent->establishesNewFormattingContext() === false) {
						if(_hx_equal($parent->coreStyle->usedValues->paddingBottom, 0)) {
							if($parentCollapsedMarginBottom > $marginBottom) {
								$marginBottom = 0;
							}
						}
					}
				}
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $marginBottom;
		}
		$GLOBALS['%s']->pop();
	}
	public function getCollapsedMarginTop($child, $parentCollapsedMarginTop) {
		$GLOBALS['%s']->push("cocktail.core.layout.formatter.BlockFormattingContext::getCollapsedMarginTop");
		$»spos = $GLOBALS['%s']->length;
		$childUsedValues = $child->coreStyle->usedValues;
		$marginTop = $childUsedValues->marginTop;
		if(_hx_equal($childUsedValues->paddingTop, 0)) {
			if($child->get_previousSibling() !== null) {
				$previousSibling = $child->get_previousSibling();
				$previsousSiblingUsedValues = $previousSibling->coreStyle->usedValues;
				if(_hx_equal($previsousSiblingUsedValues->paddingBottom, 0)) {
					if($previsousSiblingUsedValues->marginBottom > $marginTop) {
						if($marginTop > 0) {
							$marginTop = 0;
						}
					}
				}
			} else {
				if($child->parentNode !== null) {
					$parent = $child->parentNode;
					if($parent->establishesNewFormattingContext() === false) {
						if(_hx_equal($parent->coreStyle->usedValues->paddingTop, 0)) {
							if($parentCollapsedMarginTop > $marginTop) {
								$marginTop = 0;
							}
						}
					}
				}
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $marginTop;
		}
		$GLOBALS['%s']->pop();
	}
	public function doFormat($elementRenderer, $concatenatedX, $concatenatedY, $currentLineY, $parentCollapsedMarginTop, $parentCollapsedMarginBottom) {
		$GLOBALS['%s']->push("cocktail.core.layout.formatter.BlockFormattingContext::doFormat");
		$»spos = $GLOBALS['%s']->length;
		$elementRendererUsedValues = $elementRenderer->coreStyle->usedValues;
		$concatenatedX += $elementRendererUsedValues->paddingLeft + $elementRendererUsedValues->marginLeft;
		$concatenatedY += $elementRendererUsedValues->paddingTop + $parentCollapsedMarginTop;
		$childHeight = $concatenatedY;
		$elementRendererChildNodes = $elementRenderer->childNodes;
		$length = $elementRendererChildNodes->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				$child = $elementRendererChildNodes[$i];
				$marginTop = $this->getCollapsedMarginTop($child, $parentCollapsedMarginTop);
				$marginBottom = $this->getCollapsedMarginBottom($child, $parentCollapsedMarginBottom);
				$usedValues = $child->coreStyle->usedValues;
				$width = $usedValues->width + $usedValues->paddingLeft + $usedValues->paddingRight;
				$height = $usedValues->height + $usedValues->paddingTop + $usedValues->paddingBottom;
				$x = $concatenatedX + $child->coreStyle->usedValues->marginLeft;
				$y = $concatenatedY + $marginTop;
				$childBounds = $child->get_bounds();
				$childBounds->x = $x;
				$childBounds->y = $y;
				$childBounds->width = $width;
				$childBounds->height = $height;
				if($child->isFloat() === true) {
					if($this->isFloatRegistered($child) === false) {
						$floatBounds = $this->_floatsManager->registerFloat($child, $concatenatedY, 0, $elementRendererUsedValues->width);
						$this->_registeredFloats->push(new cocktail_core_layout_FloatVO($child, $floatBounds));
						$this->format($this->_formattingContextRoot, false);
						{
							$GLOBALS['%s']->pop();
							return 0.0;
						}
						unset($floatBounds);
					}
					$floatBounds = $this->getRegisteredFloat($child)->bounds;
					$childBounds->x = $floatBounds->x + $usedValues->marginLeft;
					$childBounds->y = $floatBounds->y + $usedValues->marginTop;
					$childBounds->x += $concatenatedX;
					unset($floatBounds);
				} else {
					if($child->hasChildNodes() === true) {
						if($child->establishesNewFormattingContext() === false) {
							$currentLineY = $child->get_bounds()->y;
							$concatenatedY = $this->doFormat($child, $concatenatedX, $concatenatedY, $currentLineY, $marginTop, $marginBottom);
						} else {
							if(($child->isPositioned() === false || $child->isRelativePositioned() === true) && $child->isFloat() === false) {
								if($child->childrenInline() === true) {
									$this->_inlineFormattingContext->format($child, false);
								}
								$currentLineY = $child->get_bounds()->y;
								$concatenatedY += $child->get_bounds()->height + $marginTop + $marginBottom;
							}
						}
					} else {
						if($child->isPositioned() === false || $child->isRelativePositioned() === true) {
							$concatenatedY += $child->get_bounds()->height + $marginTop + $marginBottom;
						}
					}
				}
				if($childBounds->x + $childBounds->width + $usedValues->marginRight > $this->_formattingContextData->width) {
					if($child->isAnonymousBlockBox() === false) {
						$this->_formattingContextData->width = $childBounds->x + $childBounds->width + $usedValues->marginRight;
					}
				}
				if($concatenatedY > $this->_formattingContextData->height) {
					$this->_formattingContextData->height = $concatenatedY;
				}
				unset($y,$x,$width,$usedValues,$marginTop,$marginBottom,$i,$height,$childBounds,$child);
			}
		}
		if($elementRenderer->coreStyle->isAuto($elementRenderer->coreStyle->get_height()) === true) {
			$childHeight = $concatenatedY - $childHeight;
			$elementRenderer->get_bounds()->height = $childHeight + $elementRendererUsedValues->paddingBottom + $elementRendererUsedValues->paddingTop;
			$elementRendererUsedValues->height = $childHeight;
		} else {
			$concatenatedY = $childHeight;
			$concatenatedY += $elementRenderer->get_bounds()->height;
		}
		$concatenatedY += $elementRendererUsedValues->paddingBottom + $parentCollapsedMarginBottom;
		$this->_floatsManager->removeFloats($concatenatedY);
		$this->_registeredFloats = new _hx_array(array());
		{
			$GLOBALS['%s']->pop();
			return $concatenatedY;
		}
		$GLOBALS['%s']->pop();
	}
	public function getRegisteredFloat($child) {
		$GLOBALS['%s']->push("cocktail.core.layout.formatter.BlockFormattingContext::getRegisteredFloat");
		$»spos = $GLOBALS['%s']->length;
		$length = $this->_registeredFloats->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($this->_registeredFloats, $i)->node === $child) {
					$»tmp = $this->_registeredFloats[$i];
					$GLOBALS['%s']->pop();
					return $»tmp;
					unset($»tmp);
				}
				unset($i);
			}
		}
		{
			$GLOBALS['%s']->pop();
			return null;
		}
		$GLOBALS['%s']->pop();
	}
	public function isFloatRegistered($child) {
		$GLOBALS['%s']->push("cocktail.core.layout.formatter.BlockFormattingContext::isFloatRegistered");
		$»spos = $GLOBALS['%s']->length;
		$length = $this->_registeredFloats->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($this->_registeredFloats, $i)->node === $child) {
					$GLOBALS['%s']->pop();
					return true;
				}
				unset($i);
			}
		}
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function startFormatting() {
		$GLOBALS['%s']->push("cocktail.core.layout.formatter.BlockFormattingContext::startFormatting");
		$»spos = $GLOBALS['%s']->length;
		$this->doFormat($this->_formattingContextRoot, -$this->_formattingContextRoot->coreStyle->usedValues->marginLeft, -$this->_formattingContextRoot->coreStyle->usedValues->marginTop, 0, $this->_formattingContextRoot->coreStyle->usedValues->marginTop, $this->_formattingContextRoot->coreStyle->usedValues->marginBottom);
		$GLOBALS['%s']->pop();
	}
	public $_inlineFormattingContext;
	public $_registeredFloats;
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
	function __toString() { return 'cocktail.core.layout.formatter.BlockFormattingContext'; }
}

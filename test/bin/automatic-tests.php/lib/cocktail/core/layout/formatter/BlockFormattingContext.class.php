<?php

class cocktail_core_layout_formatter_BlockFormattingContext extends cocktail_core_layout_formatter_FormattingContext {
	public function __construct($inlineFormattingContext, $floatsManager) {
		if(!php_Boot::$skip_constructor) {
		parent::__construct($floatsManager);
		$this->_inlineFormattingContext = $inlineFormattingContext;
		$this->_registeredFloats = new _hx_array(array());
	}}
	public function getCollapsedMarginBottom($child, $parentCollapsedMarginBottom) {
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
		return $marginBottom;
	}
	public function getCollapsedMarginTop($child, $parentCollapsedMarginTop) {
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
		return $marginTop;
	}
	public function doFormat($elementRenderer, $concatenatedX, $concatenatedY, $currentLineY, $parentCollapsedMarginTop, $parentCollapsedMarginBottom) {
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
						return 0.0;
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
		return $concatenatedY;
	}
	public function getRegisteredFloat($child) {
		$length = $this->_registeredFloats->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($this->_registeredFloats, $i)->node === $child) {
					return $this->_registeredFloats[$i];
				}
				unset($i);
			}
		}
		return null;
	}
	public function isFloatRegistered($child) {
		$length = $this->_registeredFloats->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($this->_registeredFloats, $i)->node === $child) {
					return true;
				}
				unset($i);
			}
		}
		return false;
	}
	public function startFormatting() {
		$this->doFormat($this->_formattingContextRoot, -$this->_formattingContextRoot->coreStyle->usedValues->marginLeft, -$this->_formattingContextRoot->coreStyle->usedValues->marginTop, 0, $this->_formattingContextRoot->coreStyle->usedValues->marginTop, $this->_formattingContextRoot->coreStyle->usedValues->marginBottom);
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

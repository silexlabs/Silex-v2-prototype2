<?php

class cocktail_core_style_formatter_BlockFormattingContext extends cocktail_core_style_formatter_FormattingContext {
	public function __construct($formattingContextRoot) {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.style.formatter.BlockFormattingContext::new");
		$»spos = $GLOBALS['%s']->length;
		parent::__construct($formattingContextRoot);
		$this->_registeredFloats = new _hx_array(array());
		$GLOBALS['%s']->pop();
	}}
	public function getCollapsedMarginBottom($child, $parentCollapsedMarginBottom) {
		$GLOBALS['%s']->push("cocktail.core.style.formatter.BlockFormattingContext::getCollapsedMarginBottom");
		$»spos = $GLOBALS['%s']->length;
		$childComputedStyle = $child->coreStyle->computedStyle;
		$marginBottom = $childComputedStyle->getMarginBottom();
		if(_hx_equal($childComputedStyle->getPaddingBottom(), 0)) {
			if($child->get_nextSibling() !== null) {
				$nextSibling = $child->get_nextSibling();
				$nextSiblingComputedStyle = $nextSibling->coreStyle->computedStyle;
				if(_hx_equal($nextSiblingComputedStyle->getPaddingTop(), 0)) {
					if($nextSiblingComputedStyle->getMarginTop() > $marginBottom) {
						$marginBottom = 0;
					}
				}
			} else {
				if($child->parentNode !== null) {
					$parent = $child->parentNode;
					if($parent->establishesNewFormattingContext() === false) {
						if(_hx_equal($parent->coreStyle->computedStyle->getPaddingBottom(), 0)) {
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
		$GLOBALS['%s']->push("cocktail.core.style.formatter.BlockFormattingContext::getCollapsedMarginTop");
		$»spos = $GLOBALS['%s']->length;
		$childComputedStyle = $child->coreStyle->computedStyle;
		$marginTop = $childComputedStyle->getMarginTop();
		if(_hx_equal($childComputedStyle->getPaddingTop(), 0)) {
			if($child->get_previousSibling() !== null) {
				$previousSibling = $child->get_previousSibling();
				$previsousSiblingComputedStyle = $previousSibling->coreStyle->computedStyle;
				if(_hx_equal($previsousSiblingComputedStyle->getPaddingBottom(), 0)) {
					if($previsousSiblingComputedStyle->getMarginBottom() > $marginTop) {
						if($marginTop > 0) {
							$marginTop = 0;
						}
					}
				}
			} else {
				if($child->parentNode !== null) {
					$parent = $child->parentNode;
					if($parent->establishesNewFormattingContext() === false) {
						if(_hx_equal($parent->coreStyle->computedStyle->getPaddingTop(), 0)) {
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
		$GLOBALS['%s']->push("cocktail.core.style.formatter.BlockFormattingContext::doFormat");
		$»spos = $GLOBALS['%s']->length;
		$elementRendererComputedStyle = $elementRenderer->coreStyle->computedStyle;
		$concatenatedX += $elementRendererComputedStyle->getPaddingLeft() + $elementRendererComputedStyle->getMarginLeft();
		$concatenatedY += $elementRendererComputedStyle->getPaddingTop() + $parentCollapsedMarginTop;
		$childHeight = $concatenatedY;
		$length = $elementRenderer->childNodes->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				$child = $elementRenderer->childNodes[$i];
				$marginTop = $this->getCollapsedMarginTop($child, $parentCollapsedMarginTop);
				$marginBottom = $this->getCollapsedMarginBottom($child, $parentCollapsedMarginBottom);
				$computedStyle = $child->coreStyle->computedStyle;
				$width = $computedStyle->getWidth() + $computedStyle->getPaddingLeft() + $computedStyle->getPaddingRight();
				$height = $computedStyle->getHeight() + $computedStyle->getPaddingTop() + $computedStyle->getPaddingBottom();
				$x = $concatenatedX + $child->coreStyle->computedStyle->getMarginLeft();
				$y = $concatenatedY + $marginTop;
				$childBounds = $child->get_bounds();
				$childBounds->x = $x;
				$childBounds->y = $y;
				$childBounds->width = $width;
				$childBounds->height = $height;
				if($child->isFloat() === true) {
					if($this->isFloatRegistered($child) === false) {
						$floatBounds = $this->_floatsManager->registerFloat($child, $concatenatedY, 0, $elementRendererComputedStyle->getWidth());
						$this->_registeredFloats->push(_hx_anonymous(array("node" => $child, "bounds" => $floatBounds)));
						$this->format($this->_floatsManager);
						{
							$GLOBALS['%s']->pop();
							return 0.0;
						}
						unset($floatBounds);
					}
					$floatBounds = $this->getRegisteredFloat($child)->bounds;
					$childBounds->x = $floatBounds->x + $computedStyle->getMarginLeft();
					$childBounds->y = $floatBounds->y + $computedStyle->getMarginTop();
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
									$inlineFormattingContext = new cocktail_core_style_formatter_InlineFormattingContext($child);
									$inlineFormattingContext->format($this->_floatsManager);
									unset($inlineFormattingContext);
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
				if($childBounds->x + $childBounds->width + $computedStyle->getMarginRight() > $this->_formattingContextData->width) {
					if($child->isAnonymousBlockBox() === false) {
						$this->_formattingContextData->width = $childBounds->x + $childBounds->width + $computedStyle->getMarginRight();
					}
				}
				if($concatenatedY > $this->_formattingContextData->height) {
					$this->_formattingContextData->height = $concatenatedY;
				}
				unset($y,$x,$width,$marginTop,$marginBottom,$i,$height,$computedStyle,$childBounds,$child);
			}
		}
		if($elementRenderer->coreStyle->height == cocktail_core_style_Dimension::$cssAuto) {
			$childHeight = $concatenatedY - $childHeight;
			$elementRenderer->get_bounds()->height = $childHeight + $elementRendererComputedStyle->getPaddingBottom() + $elementRendererComputedStyle->getPaddingTop();
			$elementRendererComputedStyle->set_height($childHeight);
		} else {
			$concatenatedY = $childHeight;
			$concatenatedY += $elementRenderer->get_bounds()->height;
		}
		$concatenatedY += $elementRendererComputedStyle->getPaddingBottom() + $parentCollapsedMarginBottom;
		$this->_floatsManager->removeFloats($concatenatedY);
		{
			$GLOBALS['%s']->pop();
			return $concatenatedY;
		}
		$GLOBALS['%s']->pop();
	}
	public function getRegisteredFloat($child) {
		$GLOBALS['%s']->push("cocktail.core.style.formatter.BlockFormattingContext::getRegisteredFloat");
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
		$GLOBALS['%s']->push("cocktail.core.style.formatter.BlockFormattingContext::isFloatRegistered");
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
		$GLOBALS['%s']->push("cocktail.core.style.formatter.BlockFormattingContext::startFormatting");
		$»spos = $GLOBALS['%s']->length;
		$this->doFormat($this->_formattingContextRoot, -$this->_formattingContextRoot->coreStyle->computedStyle->getMarginLeft(), -$this->_formattingContextRoot->coreStyle->computedStyle->getMarginTop(), 0, $this->_formattingContextRoot->coreStyle->computedStyle->getMarginTop(), $this->_formattingContextRoot->coreStyle->computedStyle->getMarginBottom());
		$GLOBALS['%s']->pop();
	}
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
	function __toString() { return 'cocktail.core.style.formatter.BlockFormattingContext'; }
}

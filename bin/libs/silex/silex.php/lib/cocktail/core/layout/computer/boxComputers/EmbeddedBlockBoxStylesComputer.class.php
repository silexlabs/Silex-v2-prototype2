<?php

class cocktail_core_layout_computer_boxComputers_EmbeddedBlockBoxStylesComputer extends cocktail_core_layout_computer_boxComputers_BoxStylesComputer {
	public function __construct() { if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.boxComputers.EmbeddedBlockBoxStylesComputer::new");
		$製pos = $GLOBALS['%s']->length;
		parent::__construct();
		$GLOBALS['%s']->pop();
	}}
	public function getComputedAutoMargin($marginStyleValue, $opositeMargin, $containingHTMLElementDimension, $computedDimension, $isDimensionAuto, $computedPaddingsDimension, $isHorizontalMargin) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.boxComputers.EmbeddedBlockBoxStylesComputer::getComputedAutoMargin");
		$製pos = $GLOBALS['%s']->length;
		$usedMargin = null;
		if($isHorizontalMargin === false) {
			$usedMargin = 0.0;
		} else {
			$usedMargin = parent::getComputedAutoMargin($marginStyleValue,$opositeMargin,$containingHTMLElementDimension,$computedDimension,false,$computedPaddingsDimension,$isHorizontalMargin);
		}
		{
			$GLOBALS['%s']->pop();
			return $usedMargin;
		}
		$GLOBALS['%s']->pop();
	}
	public function getComputedAutoHeight($style, $containingBlockData) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.boxComputers.EmbeddedBlockBoxStylesComputer::getComputedAutoHeight");
		$製pos = $GLOBALS['%s']->length;
		$usedValues = $style->usedValues;
		$usedHeight = 0.0;
		$embeddedHTMLElement = $style->htmlElement;
		if($embeddedHTMLElement->getAttributeNode("height") !== null) {
			$usedHeight = $embeddedHTMLElement->get_height();
		} else {
			if($style->isAuto(cocktail_core_layout_computer_boxComputers_EmbeddedBlockBoxStylesComputer_0($this, $containingBlockData, $embeddedHTMLElement, $style, $usedHeight, $usedValues)) === true) {
				if($embeddedHTMLElement->get_intrinsicHeight() !== null) {
					$usedHeight = $embeddedHTMLElement->get_intrinsicHeight();
				} else {
					if($embeddedHTMLElement->get_intrinsicWidth() !== null && $embeddedHTMLElement->get_intrinsicRatio() !== null) {
						$usedHeight = $embeddedHTMLElement->get_intrinsicWidth() * $embeddedHTMLElement->get_intrinsicRatio();
					} else {
						if($embeddedHTMLElement->get_intrinsicRatio() !== null) {
						}
					}
				}
			} else {
				if($embeddedHTMLElement->get_intrinsicRatio() !== null) {
					$usedWidth = $this->getComputedDimension(cocktail_core_layout_computer_boxComputers_EmbeddedBlockBoxStylesComputer_1($this, $containingBlockData, $embeddedHTMLElement, $style, $usedHeight, $usedValues), $containingBlockData->width, $containingBlockData->isWidthAuto);
					$usedHeight = $usedWidth * $embeddedHTMLElement->get_intrinsicRatio();
				} else {
					if($embeddedHTMLElement->get_intrinsicHeight() !== null) {
						$usedHeight = $embeddedHTMLElement->get_intrinsicHeight();
					} else {
						$usedHeight = 150;
					}
				}
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $usedHeight;
		}
		$GLOBALS['%s']->pop();
	}
	public function getComputedAutoWidth($style, $containingBlockData) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.boxComputers.EmbeddedBlockBoxStylesComputer::getComputedAutoWidth");
		$製pos = $GLOBALS['%s']->length;
		$usedValues = $style->usedValues;
		$usedWidth = 0.0;
		$embeddedHTMLElement = $style->htmlElement;
		if($embeddedHTMLElement->getAttributeNode("width") !== null) {
			$usedWidth = $embeddedHTMLElement->get_width();
		} else {
			if($style->isAuto(cocktail_core_layout_computer_boxComputers_EmbeddedBlockBoxStylesComputer_2($this, $containingBlockData, $embeddedHTMLElement, $style, $usedValues, $usedWidth)) === true) {
				if($embeddedHTMLElement->get_intrinsicWidth() !== null) {
					$usedWidth = $embeddedHTMLElement->get_intrinsicWidth();
				} else {
					if($embeddedHTMLElement->get_intrinsicHeight() !== null && $embeddedHTMLElement->get_intrinsicRatio() !== null) {
						$usedWidth = $embeddedHTMLElement->get_intrinsicHeight() * $embeddedHTMLElement->get_intrinsicRatio();
					} else {
						if($embeddedHTMLElement->get_intrinsicRatio() !== null) {
							if($containingBlockData->isWidthAuto === false) {
								$usedWidth = $containingBlockData->width - $usedValues->marginLeft - $usedValues->marginRight - $usedValues->paddingLeft - $usedValues->paddingRight;
							} else {
								$usedWidth = 0.0;
							}
						}
					}
				}
			} else {
				$usedHeight = $this->getComputedDimension(cocktail_core_layout_computer_boxComputers_EmbeddedBlockBoxStylesComputer_3($this, $containingBlockData, $embeddedHTMLElement, $style, $usedValues, $usedWidth), $containingBlockData->height, $containingBlockData->isHeightAuto);
				if($embeddedHTMLElement->get_intrinsicRatio() !== null) {
					$usedWidth = $usedHeight / $embeddedHTMLElement->get_intrinsicRatio();
				} else {
					if($embeddedHTMLElement->get_intrinsicWidth() !== null) {
						$usedWidth = $embeddedHTMLElement->get_intrinsicWidth();
					} else {
						$usedWidth = 300;
					}
				}
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $usedWidth;
		}
		$GLOBALS['%s']->pop();
	}
	public function measureAutoWidth($style, $containingBlockData) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.boxComputers.EmbeddedBlockBoxStylesComputer::measureAutoWidth");
		$製pos = $GLOBALS['%s']->length;
		$usedValues = $style->usedValues;
		$usedWidth = $this->getComputedAutoWidth($style, $containingBlockData);
		$usedValues->marginLeft = $this->getComputedMarginLeft($style, $usedWidth, $containingBlockData);
		$usedValues->marginRight = $this->getComputedMarginRight($style, $usedWidth, $containingBlockData);
		{
			$GLOBALS['%s']->pop();
			return $usedWidth;
		}
		$GLOBALS['%s']->pop();
	}
	public function constrainDimensions($style, $usedWidth, $usedHeight) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.boxComputers.EmbeddedBlockBoxStylesComputer::constrainDimensions");
		$製pos = $GLOBALS['%s']->length;
		$usedValues = $style->usedValues;
		$maxHeight = $usedValues->maxHeight;
		$minHeight = $usedValues->minHeight;
		$maxWidth = $usedValues->maxWidth;
		$minWidth = $usedValues->minWidth;
		$widthSuperiorToMaxWidth = false;
		if($style->isNone(cocktail_core_layout_computer_boxComputers_EmbeddedBlockBoxStylesComputer_4($this, $maxHeight, $maxWidth, $minHeight, $minWidth, $style, $usedHeight, $usedValues, $usedWidth, $widthSuperiorToMaxWidth)) === false) {
			$widthSuperiorToMaxWidth = $usedWidth > $maxWidth;
		}
		$heightSuperiorToMaxHeight = false;
		if($style->isNone(cocktail_core_layout_computer_boxComputers_EmbeddedBlockBoxStylesComputer_5($this, $heightSuperiorToMaxHeight, $maxHeight, $maxWidth, $minHeight, $minWidth, $style, $usedHeight, $usedValues, $usedWidth, $widthSuperiorToMaxWidth)) === false) {
			$heightSuperiorToMaxHeight = $usedHeight > $maxHeight;
		}
		$widthInferiorToMinWidth = $usedWidth < $minWidth;
		$heightInferiorToMinHeight = $usedHeight < $minHeight;
		if($widthSuperiorToMaxWidth === true) {
			if($heightSuperiorToMaxHeight === true) {
				if($maxWidth / $usedWidth <= $maxHeight / $usedHeight) {
					if($minHeight > $maxWidth * ($usedHeight / $usedWidth)) {
						$usedHeight = $minHeight;
					} else {
						$usedHeight = $maxWidth * ($usedHeight / $usedWidth);
					}
					$usedWidth = $maxWidth;
				}
			} else {
				if($heightInferiorToMinHeight === true) {
					$usedWidth = $maxWidth;
					$usedHeight = $minHeight;
				} else {
					if($maxWidth * ($usedHeight / $usedWidth) > $minHeight) {
						$usedHeight = $maxWidth * ($usedHeight / $usedWidth);
					} else {
						$usedHeight = $minHeight;
					}
					$usedWidth = $maxWidth;
				}
			}
		} else {
			if($widthInferiorToMinWidth === true) {
				if($heightInferiorToMinHeight === true) {
					if($minWidth / $usedWidth <= $minHeight / $usedHeight) {
						if($maxWidth < $minHeight * ($usedWidth / $usedHeight)) {
							$usedWidth = $maxWidth;
						} else {
							$usedWidth = $minHeight * ($usedWidth / $usedHeight);
						}
						$usedHeight = $minHeight;
					} else {
						if($maxHeight < $minWidth * ($usedHeight / $usedWidth)) {
							$usedHeight = $maxHeight;
						} else {
							$usedHeight = $minWidth * ($usedHeight / $usedWidth);
						}
						$usedWidth = $minWidth;
					}
				} else {
					if($heightSuperiorToMaxHeight === true) {
						$usedWidth = $minWidth;
						$usedHeight = $maxHeight;
					} else {
						if($minWidth * ($usedHeight / $usedWidth) < $maxHeight) {
							$usedHeight = $minWidth * ($usedHeight / $usedWidth);
						} else {
							$usedHeight = $maxHeight;
						}
						$usedWidth = $minWidth;
					}
				}
			} else {
				if($heightSuperiorToMaxHeight === true) {
					if($maxHeight * ($usedWidth / $usedHeight) > $minWidth) {
						$usedWidth = $maxHeight * ($usedWidth / $usedHeight);
					} else {
						$usedWidth = $minWidth;
					}
					$usedHeight = $maxHeight;
				} else {
					if($heightInferiorToMinHeight === true) {
						if($minHeight * ($usedWidth / $usedHeight) < $minHeight) {
							$usedWidth = $minHeight * ($usedWidth / $usedHeight);
						} else {
							$usedWidth = $minHeight;
						}
						$usedHeight = $minHeight;
					}
				}
			}
		}
		$usedValues->width = $usedWidth;
		$usedValues->height = $usedHeight;
		$GLOBALS['%s']->pop();
	}
	public function measureDimensionsAndMargins($style, $containingBlockData) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.boxComputers.EmbeddedBlockBoxStylesComputer::measureDimensionsAndMargins");
		$製pos = $GLOBALS['%s']->length;
		$usedValues = $style->usedValues;
		$usedWidth = $this->measureWidthAndHorizontalMargins($style, $containingBlockData);
		$usedHeight = $this->measureHeightAndVerticalMargins($style, $containingBlockData);
		if($style->isAuto(cocktail_core_layout_computer_boxComputers_EmbeddedBlockBoxStylesComputer_6($this, $containingBlockData, $style, $usedHeight, $usedValues, $usedWidth)) === true && $style->isAuto(cocktail_core_layout_computer_boxComputers_EmbeddedBlockBoxStylesComputer_7($this, $containingBlockData, $style, $usedHeight, $usedValues, $usedWidth)) === true) {
			$this->constrainDimensions($style, $usedWidth, $usedHeight);
		} else {
			$usedValues->width = $this->constrainWidth($style, $usedWidth);
			$usedValues->height = $this->constrainHeight($style, $usedHeight);
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'cocktail.core.layout.computer.boxComputers.EmbeddedBlockBoxStylesComputer'; }
}
function cocktail_core_layout_computer_boxComputers_EmbeddedBlockBoxStylesComputer_0(&$裨his, &$containingBlockData, &$embeddedHTMLElement, &$style, &$usedHeight, &$usedValues) {
	$製pos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("width", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_EmbeddedBlockBoxStylesComputer_8($裨his, $containingBlockData, $embeddedHTMLElement, $style, $transition, $usedHeight, $usedValues)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_EmbeddedBlockBoxStylesComputer_1(&$裨his, &$containingBlockData, &$embeddedHTMLElement, &$style, &$usedHeight, &$usedValues) {
	$製pos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("width", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_EmbeddedBlockBoxStylesComputer_9($裨his, $containingBlockData, $embeddedHTMLElement, $style, $transition, $usedHeight, $usedValues)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_EmbeddedBlockBoxStylesComputer_2(&$裨his, &$containingBlockData, &$embeddedHTMLElement, &$style, &$usedValues, &$usedWidth) {
	$製pos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("height", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_EmbeddedBlockBoxStylesComputer_10($裨his, $containingBlockData, $embeddedHTMLElement, $style, $transition, $usedValues, $usedWidth)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_EmbeddedBlockBoxStylesComputer_3(&$裨his, &$containingBlockData, &$embeddedHTMLElement, &$style, &$usedValues, &$usedWidth) {
	$製pos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("height", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_EmbeddedBlockBoxStylesComputer_11($裨his, $containingBlockData, $embeddedHTMLElement, $style, $transition, $usedValues, $usedWidth)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_EmbeddedBlockBoxStylesComputer_4(&$裨his, &$maxHeight, &$maxWidth, &$minHeight, &$minWidth, &$style, &$usedHeight, &$usedValues, &$usedWidth, &$widthSuperiorToMaxWidth) {
	$製pos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("max-width", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_EmbeddedBlockBoxStylesComputer_12($裨his, $maxHeight, $maxWidth, $minHeight, $minWidth, $style, $transition, $usedHeight, $usedValues, $usedWidth, $widthSuperiorToMaxWidth)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_EmbeddedBlockBoxStylesComputer_5(&$裨his, &$heightSuperiorToMaxHeight, &$maxHeight, &$maxWidth, &$minHeight, &$minWidth, &$style, &$usedHeight, &$usedValues, &$usedWidth, &$widthSuperiorToMaxWidth) {
	$製pos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("max-height", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_EmbeddedBlockBoxStylesComputer_13($裨his, $heightSuperiorToMaxHeight, $maxHeight, $maxWidth, $minHeight, $minWidth, $style, $transition, $usedHeight, $usedValues, $usedWidth, $widthSuperiorToMaxWidth)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_EmbeddedBlockBoxStylesComputer_6(&$裨his, &$containingBlockData, &$style, &$usedHeight, &$usedValues, &$usedWidth) {
	$製pos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("width", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_EmbeddedBlockBoxStylesComputer_14($裨his, $containingBlockData, $style, $transition, $usedHeight, $usedValues, $usedWidth)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_EmbeddedBlockBoxStylesComputer_7(&$裨his, &$containingBlockData, &$style, &$usedHeight, &$usedValues, &$usedWidth) {
	$製pos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("height", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_EmbeddedBlockBoxStylesComputer_15($裨his, $containingBlockData, $style, $transition, $usedHeight, $usedValues, $usedWidth)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_EmbeddedBlockBoxStylesComputer_8(&$裨his, &$containingBlockData, &$embeddedHTMLElement, &$style, &$transition, &$usedHeight, &$usedValues) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this = $style->computedValues;
		$typedProperty = null;
		$length = $_this->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($_this->_properties, $i)->name === "width") {
					$typedProperty = $_this->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}
function cocktail_core_layout_computer_boxComputers_EmbeddedBlockBoxStylesComputer_9(&$裨his, &$containingBlockData, &$embeddedHTMLElement, &$style, &$transition, &$usedHeight, &$usedValues) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this = $style->computedValues;
		$typedProperty = null;
		$length = $_this->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($_this->_properties, $i)->name === "width") {
					$typedProperty = $_this->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}
function cocktail_core_layout_computer_boxComputers_EmbeddedBlockBoxStylesComputer_10(&$裨his, &$containingBlockData, &$embeddedHTMLElement, &$style, &$transition, &$usedValues, &$usedWidth) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this = $style->computedValues;
		$typedProperty = null;
		$length = $_this->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($_this->_properties, $i)->name === "height") {
					$typedProperty = $_this->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}
function cocktail_core_layout_computer_boxComputers_EmbeddedBlockBoxStylesComputer_11(&$裨his, &$containingBlockData, &$embeddedHTMLElement, &$style, &$transition, &$usedValues, &$usedWidth) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this = $style->computedValues;
		$typedProperty = null;
		$length = $_this->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($_this->_properties, $i)->name === "height") {
					$typedProperty = $_this->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}
function cocktail_core_layout_computer_boxComputers_EmbeddedBlockBoxStylesComputer_12(&$裨his, &$maxHeight, &$maxWidth, &$minHeight, &$minWidth, &$style, &$transition, &$usedHeight, &$usedValues, &$usedWidth, &$widthSuperiorToMaxWidth) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this = $style->computedValues;
		$typedProperty = null;
		$length = $_this->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($_this->_properties, $i)->name === "max-width") {
					$typedProperty = $_this->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}
function cocktail_core_layout_computer_boxComputers_EmbeddedBlockBoxStylesComputer_13(&$裨his, &$heightSuperiorToMaxHeight, &$maxHeight, &$maxWidth, &$minHeight, &$minWidth, &$style, &$transition, &$usedHeight, &$usedValues, &$usedWidth, &$widthSuperiorToMaxWidth) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this = $style->computedValues;
		$typedProperty = null;
		$length = $_this->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($_this->_properties, $i)->name === "max-height") {
					$typedProperty = $_this->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}
function cocktail_core_layout_computer_boxComputers_EmbeddedBlockBoxStylesComputer_14(&$裨his, &$containingBlockData, &$style, &$transition, &$usedHeight, &$usedValues, &$usedWidth) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this = $style->computedValues;
		$typedProperty = null;
		$length = $_this->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($_this->_properties, $i)->name === "width") {
					$typedProperty = $_this->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}
function cocktail_core_layout_computer_boxComputers_EmbeddedBlockBoxStylesComputer_15(&$裨his, &$containingBlockData, &$style, &$transition, &$usedHeight, &$usedValues, &$usedWidth) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this = $style->computedValues;
		$typedProperty = null;
		$length = $_this->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($_this->_properties, $i)->name === "height") {
					$typedProperty = $_this->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}

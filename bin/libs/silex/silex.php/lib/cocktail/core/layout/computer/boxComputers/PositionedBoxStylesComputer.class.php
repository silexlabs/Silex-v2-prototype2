<?php

class cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer extends cocktail_core_layout_computer_boxComputers_BoxStylesComputer {
	public function __construct() { if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.boxComputers.PositionedBoxStylesComputer::new");
		$製pos = $GLOBALS['%s']->length;
		parent::__construct();
		$GLOBALS['%s']->pop();
	}}
	public function getComputedStaticTop($style, $containingBlockData) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.boxComputers.PositionedBoxStylesComputer::getComputedStaticTop");
		$製pos = $GLOBALS['%s']->length;
		{
			$裨mp = $style->usedValues->marginTop;
			$GLOBALS['%s']->pop();
			return $裨mp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getComputedStaticLeft($style, $containingBlockData) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.boxComputers.PositionedBoxStylesComputer::getComputedStaticLeft");
		$製pos = $GLOBALS['%s']->length;
		{
			$裨mp = $style->usedValues->marginLeft;
			$GLOBALS['%s']->pop();
			return $裨mp;
		}
		$GLOBALS['%s']->pop();
	}
	public function measureHeight($style, $containingBlockData) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.boxComputers.PositionedBoxStylesComputer::measureHeight");
		$製pos = $GLOBALS['%s']->length;
		$usedValues = $style->usedValues;
		$usedHeight = $this->getComputedHeight($style, $containingBlockData);
		if($style->isAuto(cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_0($this, $containingBlockData, $style, $usedHeight, $usedValues)) === false && $style->isAuto(cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_1($this, $containingBlockData, $style, $usedHeight, $usedValues)) === false) {
			$usedValues->top = $this->getComputedPositionOffset(cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_2($this, $containingBlockData, $style, $usedHeight, $usedValues), $containingBlockData->height);
			$usedValues->bottom = $this->getComputedPositionOffset(cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_3($this, $containingBlockData, $style, $usedHeight, $usedValues), $containingBlockData->height);
			if($style->isAuto(cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_4($this, $containingBlockData, $style, $usedHeight, $usedValues)) === true && $style->isAuto(cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_5($this, $containingBlockData, $style, $usedHeight, $usedValues)) === true) {
				$usedMargin = ($containingBlockData->height - $usedValues->height - $usedValues->paddingTop - $usedValues->paddingBottom - $usedValues->top - $usedValues->bottom) / 2;
				if($usedMargin >= 0) {
					$usedValues->marginTop = $usedMargin;
					$usedValues->marginBottom = $usedMargin;
				} else {
					$usedValues->marginBottom = 0;
					$usedValues->marginTop = $containingBlockData->height - $usedValues->height - $usedValues->paddingTop - $usedValues->paddingBottom - $usedValues->bottom - $usedValues->top;
				}
			} else {
				if($style->isAuto(cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_6($this, $containingBlockData, $style, $usedHeight, $usedValues)) === true) {
					$usedValues->marginBottom = $this->getComputedMarginBottom($style, $usedHeight, $containingBlockData);
					$usedValues->marginTop = $containingBlockData->height - $usedValues->height - $usedValues->paddingTop - $usedValues->paddingBottom - $usedValues->top - $usedValues->bottom - $usedValues->marginBottom;
				} else {
					if($style->isAuto(cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_7($this, $containingBlockData, $style, $usedHeight, $usedValues)) === true) {
						$usedValues->marginTop = $this->getComputedMarginTop($style, $usedHeight, $containingBlockData);
						$usedValues->marginBottom = $containingBlockData->height - $usedValues->height - $usedValues->paddingTop - $usedValues->paddingBottom - $usedValues->top - $usedValues->bottom - $usedValues->marginTop;
					} else {
						$usedValues->marginTop = $this->getComputedMarginTop($style, $usedHeight, $containingBlockData);
						$usedValues->marginBottom = $this->getComputedMarginBottom($style, $usedHeight, $containingBlockData);
					}
				}
			}
		} else {
			if($style->isAuto(cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_8($this, $containingBlockData, $style, $usedHeight, $usedValues)) === true) {
				$usedValues->marginTop = 0;
			} else {
				$usedValues->marginTop = $this->getComputedMarginTop($style, $usedHeight, $containingBlockData);
			}
			if($style->isAuto(cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_9($this, $containingBlockData, $style, $usedHeight, $usedValues)) === true) {
				$usedValues->marginBottom = 0;
			} else {
				$usedValues->marginBottom = $this->getComputedMarginBottom($style, $usedHeight, $containingBlockData);
			}
			if($style->isAuto(cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_10($this, $containingBlockData, $style, $usedHeight, $usedValues)) === true && $style->isAuto(cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_11($this, $containingBlockData, $style, $usedHeight, $usedValues)) === true) {
				$usedValues->top = $this->getComputedStaticTop($style, $containingBlockData);
				$usedValues->bottom = $containingBlockData->height - $usedValues->marginTop - $usedValues->marginBottom - $usedValues->height - $usedValues->paddingTop - $usedValues->paddingBottom - $usedValues->top;
			} else {
				if($style->isAuto(cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_12($this, $containingBlockData, $style, $usedHeight, $usedValues)) === true) {
					$usedValues->top = $this->getComputedPositionOffset(cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_13($this, $containingBlockData, $style, $usedHeight, $usedValues), $containingBlockData->height);
					$usedValues->bottom = $containingBlockData->height - $usedValues->marginTop - $usedValues->marginBottom - $usedValues->height - $usedValues->paddingTop - $usedValues->paddingBottom - $usedValues->top;
				} else {
					if($style->isAuto(cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_14($this, $containingBlockData, $style, $usedHeight, $usedValues)) === true) {
						$usedValues->bottom = $this->getComputedPositionOffset(cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_15($this, $containingBlockData, $style, $usedHeight, $usedValues), $containingBlockData->height);
						$usedValues->top = $containingBlockData->height - $usedValues->marginTop - $usedValues->marginBottom - $usedValues->height - $usedValues->paddingTop - $usedValues->paddingBottom - $usedValues->bottom;
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
	public function measureAutoHeight($style, $containingBlockData) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.boxComputers.PositionedBoxStylesComputer::measureAutoHeight");
		$製pos = $GLOBALS['%s']->length;
		$usedValues = $style->usedValues;
		$usedHeight = 0.0;
		if($style->isAuto(cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_16($this, $containingBlockData, $style, $usedHeight, $usedValues)) === true) {
			$usedValues->marginTop = 0;
		} else {
			$usedValues->marginTop = $this->getComputedMarginTop($style, $usedHeight, $containingBlockData);
		}
		if($style->isAuto(cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_17($this, $containingBlockData, $style, $usedHeight, $usedValues)) === true) {
			$usedValues->marginBottom = 0;
		} else {
			$usedValues->marginBottom = $this->getComputedMarginBottom($style, $usedHeight, $containingBlockData);
		}
		if($style->isAuto(cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_18($this, $containingBlockData, $style, $usedHeight, $usedValues)) === false && $style->isAuto(cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_19($this, $containingBlockData, $style, $usedHeight, $usedValues)) === false) {
			$usedValues->top = $this->getComputedPositionOffset(cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_20($this, $containingBlockData, $style, $usedHeight, $usedValues), $containingBlockData->height);
			$usedValues->bottom = $this->getComputedPositionOffset(cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_21($this, $containingBlockData, $style, $usedHeight, $usedValues), $containingBlockData->height);
			$usedHeight = $containingBlockData->height - $usedValues->marginTop - $usedValues->top - $usedValues->bottom - $usedValues->marginBottom - $usedValues->paddingTop - $usedValues->paddingBottom;
		} else {
			if($style->isAuto(cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_22($this, $containingBlockData, $style, $usedHeight, $usedValues)) === true) {
				$usedValues->top = $this->getComputedPositionOffset(cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_23($this, $containingBlockData, $style, $usedHeight, $usedValues), $containingBlockData->height);
				$usedValues->bottom = $containingBlockData->height - $usedValues->marginTop - $usedValues->marginBottom - $usedValues->height - $usedValues->paddingTop - $usedValues->paddingBottom - $usedValues->top;
			} else {
				if($style->isAuto(cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_24($this, $containingBlockData, $style, $usedHeight, $usedValues)) === true) {
					$usedValues->bottom = $this->getComputedPositionOffset(cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_25($this, $containingBlockData, $style, $usedHeight, $usedValues), $containingBlockData->height);
					$usedValues->top = $containingBlockData->height - $usedValues->marginTop - $usedValues->marginBottom - $usedValues->height - $usedValues->paddingTop - $usedValues->paddingBottom - $usedValues->bottom;
				}
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $usedHeight;
		}
		$GLOBALS['%s']->pop();
	}
	public function measureWidth($style, $containingBlockData) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.boxComputers.PositionedBoxStylesComputer::measureWidth");
		$製pos = $GLOBALS['%s']->length;
		$usedValues = $style->usedValues;
		$usedWidth = $this->getComputedWidth($style, $containingBlockData);
		if($style->isAuto(cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_26($this, $containingBlockData, $style, $usedValues, $usedWidth)) === false && $style->isAuto(cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_27($this, $containingBlockData, $style, $usedValues, $usedWidth)) === false) {
			$usedValues->left = $this->getComputedPositionOffset(cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_28($this, $containingBlockData, $style, $usedValues, $usedWidth), $containingBlockData->width);
			$usedValues->right = $this->getComputedPositionOffset(cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_29($this, $containingBlockData, $style, $usedValues, $usedWidth), $containingBlockData->width);
			if($style->isAuto(cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_30($this, $containingBlockData, $style, $usedValues, $usedWidth)) === true && $style->isAuto(cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_31($this, $containingBlockData, $style, $usedValues, $usedWidth)) === true) {
				$usedMargin = ($containingBlockData->width - $usedValues->width - $usedValues->paddingLeft - $usedValues->paddingRight - $usedValues->left - $usedValues->right) / 2;
				if($usedMargin >= 0) {
					$usedValues->marginLeft = $usedMargin;
					$usedValues->marginRight = $usedMargin;
				} else {
					$usedValues->marginLeft = 0;
					$usedValues->marginRight = $containingBlockData->width - $usedValues->width - $usedValues->paddingLeft - $usedValues->paddingRight - $usedValues->left - $usedValues->right;
				}
			} else {
				if($style->isAuto(cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_32($this, $containingBlockData, $style, $usedValues, $usedWidth)) === true) {
					$usedValues->marginRight = $this->getComputedMarginRight($style, $usedWidth, $containingBlockData);
					$usedValues->marginLeft = $containingBlockData->width - $usedValues->width - $usedValues->paddingLeft - $usedValues->paddingRight - $usedValues->left - $usedValues->right - $usedValues->marginRight;
				} else {
					if($style->isAuto(cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_33($this, $containingBlockData, $style, $usedValues, $usedWidth)) === true) {
						$usedValues->marginLeft = $this->getComputedMarginLeft($style, $usedWidth, $containingBlockData);
						$usedValues->marginRight = $containingBlockData->width - $usedValues->width - $usedValues->paddingLeft - $usedValues->paddingRight - $usedValues->left - $usedValues->right - $usedValues->marginLeft;
					} else {
						$usedValues->marginLeft = $this->getComputedMarginLeft($style, $usedWidth, $containingBlockData);
						$usedValues->marginRight = $this->getComputedMarginRight($style, $usedWidth, $containingBlockData);
					}
				}
			}
		} else {
			if($style->isAuto(cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_34($this, $containingBlockData, $style, $usedValues, $usedWidth)) === true) {
				$usedValues->marginLeft = 0;
			} else {
				$usedValues->marginLeft = $this->getComputedMarginLeft($style, $usedWidth, $containingBlockData);
			}
			if($style->isAuto(cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_35($this, $containingBlockData, $style, $usedValues, $usedWidth)) === true) {
				$usedValues->marginRight = 0;
			} else {
				$usedValues->marginRight = $this->getComputedMarginRight($style, $usedWidth, $containingBlockData);
			}
			if($style->isAuto(cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_36($this, $containingBlockData, $style, $usedValues, $usedWidth)) === true && $style->isAuto(cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_37($this, $containingBlockData, $style, $usedValues, $usedWidth)) === true) {
				$usedValues->left = $this->getComputedStaticLeft($style, $containingBlockData);
				$usedValues->right = $containingBlockData->width - $usedValues->marginLeft - $usedValues->marginRight - $usedValues->width - $usedValues->paddingLeft - $usedValues->paddingRight - $usedValues->left;
			} else {
				if($style->isAuto(cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_38($this, $containingBlockData, $style, $usedValues, $usedWidth)) === true) {
					$usedValues->right = $this->getComputedPositionOffset(cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_39($this, $containingBlockData, $style, $usedValues, $usedWidth), $containingBlockData->width);
					$usedValues->left = $containingBlockData->width - $usedValues->marginLeft - $usedValues->marginRight - $usedValues->width - $usedValues->paddingLeft - $usedValues->paddingRight - $usedValues->right;
				} else {
					if($style->isAuto(cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_40($this, $containingBlockData, $style, $usedValues, $usedWidth)) === true) {
						$usedValues->left = $this->getComputedPositionOffset(cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_41($this, $containingBlockData, $style, $usedValues, $usedWidth), $containingBlockData->width);
						$usedValues->right = $containingBlockData->width - $usedValues->marginLeft - $usedValues->marginRight - $usedValues->width - $usedValues->paddingLeft - $usedValues->paddingRight - $usedValues->left;
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
		$GLOBALS['%s']->push("cocktail.core.layout.computer.boxComputers.PositionedBoxStylesComputer::measureAutoWidth");
		$製pos = $GLOBALS['%s']->length;
		$usedValues = $style->usedValues;
		$usedWidth = 0.0;
		if($style->isAuto(cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_42($this, $containingBlockData, $style, $usedValues, $usedWidth)) === true) {
			$usedValues->marginLeft = 0;
		} else {
			$usedValues->marginLeft = $this->getComputedMarginLeft($style, $usedWidth, $containingBlockData);
		}
		if($style->isAuto(cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_43($this, $containingBlockData, $style, $usedValues, $usedWidth)) === true) {
			$usedValues->marginRight = 0;
		} else {
			$usedValues->marginRight = $this->getComputedMarginRight($style, $usedWidth, $containingBlockData);
		}
		if($style->isAuto(cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_44($this, $containingBlockData, $style, $usedValues, $usedWidth)) === false && $style->isAuto(cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_45($this, $containingBlockData, $style, $usedValues, $usedWidth)) === false) {
			$usedValues->left = $this->getComputedPositionOffset(cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_46($this, $containingBlockData, $style, $usedValues, $usedWidth), $containingBlockData->width);
			$usedValues->right = $this->getComputedPositionOffset(cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_47($this, $containingBlockData, $style, $usedValues, $usedWidth), $containingBlockData->width);
			$usedWidth = $containingBlockData->width - $usedValues->marginLeft - $usedValues->left - $usedValues->right - $usedValues->marginRight - $usedValues->paddingLeft - $usedValues->paddingRight;
		} else {
			if($style->isAuto(cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_48($this, $containingBlockData, $style, $usedValues, $usedWidth)) === true) {
				$usedValues->right = $this->getComputedPositionOffset(cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_49($this, $containingBlockData, $style, $usedValues, $usedWidth), $containingBlockData->width);
			} else {
				if($style->isAuto(cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_50($this, $containingBlockData, $style, $usedValues, $usedWidth)) === true) {
					$usedValues->left = $this->getComputedPositionOffset(cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_51($this, $containingBlockData, $style, $usedValues, $usedWidth), $containingBlockData->width);
				}
			}
			$usedWidth = $containingBlockData->width;
		}
		{
			$GLOBALS['%s']->pop();
			return $usedWidth;
		}
		$GLOBALS['%s']->pop();
	}
	public function measurePositionOffsets($style, $containingBlockData) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.boxComputers.PositionedBoxStylesComputer::measurePositionOffsets");
		$製pos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'cocktail.core.layout.computer.boxComputers.PositionedBoxStylesComputer'; }
}
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_0(&$裨his, &$containingBlockData, &$style, &$usedHeight, &$usedValues) {
	$製pos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("top", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_52($裨his, $containingBlockData, $style, $transition, $usedHeight, $usedValues)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_1(&$裨his, &$containingBlockData, &$style, &$usedHeight, &$usedValues) {
	$製pos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("bottom", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_53($裨his, $containingBlockData, $style, $transition, $usedHeight, $usedValues)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_2(&$裨his, &$containingBlockData, &$style, &$usedHeight, &$usedValues) {
	$製pos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("top", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_54($裨his, $containingBlockData, $style, $transition, $usedHeight, $usedValues)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_3(&$裨his, &$containingBlockData, &$style, &$usedHeight, &$usedValues) {
	$製pos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("bottom", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_55($裨his, $containingBlockData, $style, $transition, $usedHeight, $usedValues)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_4(&$裨his, &$containingBlockData, &$style, &$usedHeight, &$usedValues) {
	$製pos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("margin-top", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_56($裨his, $containingBlockData, $style, $transition, $usedHeight, $usedValues)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_5(&$裨his, &$containingBlockData, &$style, &$usedHeight, &$usedValues) {
	$製pos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("margin-bottom", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_57($裨his, $containingBlockData, $style, $transition, $usedHeight, $usedValues)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_6(&$裨his, &$containingBlockData, &$style, &$usedHeight, &$usedValues) {
	$製pos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("margin-top", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_58($裨his, $containingBlockData, $style, $transition, $usedHeight, $usedValues)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_7(&$裨his, &$containingBlockData, &$style, &$usedHeight, &$usedValues) {
	$製pos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("margin-bottom", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_59($裨his, $containingBlockData, $style, $transition, $usedHeight, $usedValues)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_8(&$裨his, &$containingBlockData, &$style, &$usedHeight, &$usedValues) {
	$製pos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("margin-top", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_60($裨his, $containingBlockData, $style, $transition, $usedHeight, $usedValues)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_9(&$裨his, &$containingBlockData, &$style, &$usedHeight, &$usedValues) {
	$製pos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("margin-bottom", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_61($裨his, $containingBlockData, $style, $transition, $usedHeight, $usedValues)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_10(&$裨his, &$containingBlockData, &$style, &$usedHeight, &$usedValues) {
	$製pos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("top", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_62($裨his, $containingBlockData, $style, $transition, $usedHeight, $usedValues)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_11(&$裨his, &$containingBlockData, &$style, &$usedHeight, &$usedValues) {
	$製pos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("bottom", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_63($裨his, $containingBlockData, $style, $transition, $usedHeight, $usedValues)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_12(&$裨his, &$containingBlockData, &$style, &$usedHeight, &$usedValues) {
	$製pos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("bottom", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_64($裨his, $containingBlockData, $style, $transition, $usedHeight, $usedValues)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_13(&$裨his, &$containingBlockData, &$style, &$usedHeight, &$usedValues) {
	$製pos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("top", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_65($裨his, $containingBlockData, $style, $transition, $usedHeight, $usedValues)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_14(&$裨his, &$containingBlockData, &$style, &$usedHeight, &$usedValues) {
	$製pos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("top", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_66($裨his, $containingBlockData, $style, $transition, $usedHeight, $usedValues)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_15(&$裨his, &$containingBlockData, &$style, &$usedHeight, &$usedValues) {
	$製pos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("bottom", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_67($裨his, $containingBlockData, $style, $transition, $usedHeight, $usedValues)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_16(&$裨his, &$containingBlockData, &$style, &$usedHeight, &$usedValues) {
	$製pos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("margin-top", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_68($裨his, $containingBlockData, $style, $transition, $usedHeight, $usedValues)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_17(&$裨his, &$containingBlockData, &$style, &$usedHeight, &$usedValues) {
	$製pos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("margin-bottom", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_69($裨his, $containingBlockData, $style, $transition, $usedHeight, $usedValues)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_18(&$裨his, &$containingBlockData, &$style, &$usedHeight, &$usedValues) {
	$製pos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("top", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_70($裨his, $containingBlockData, $style, $transition, $usedHeight, $usedValues)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_19(&$裨his, &$containingBlockData, &$style, &$usedHeight, &$usedValues) {
	$製pos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("bottom", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_71($裨his, $containingBlockData, $style, $transition, $usedHeight, $usedValues)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_20(&$裨his, &$containingBlockData, &$style, &$usedHeight, &$usedValues) {
	$製pos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("top", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_72($裨his, $containingBlockData, $style, $transition, $usedHeight, $usedValues)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_21(&$裨his, &$containingBlockData, &$style, &$usedHeight, &$usedValues) {
	$製pos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("bottom", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_73($裨his, $containingBlockData, $style, $transition, $usedHeight, $usedValues)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_22(&$裨his, &$containingBlockData, &$style, &$usedHeight, &$usedValues) {
	$製pos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("bottom", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_74($裨his, $containingBlockData, $style, $transition, $usedHeight, $usedValues)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_23(&$裨his, &$containingBlockData, &$style, &$usedHeight, &$usedValues) {
	$製pos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("top", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_75($裨his, $containingBlockData, $style, $transition, $usedHeight, $usedValues)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_24(&$裨his, &$containingBlockData, &$style, &$usedHeight, &$usedValues) {
	$製pos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("top", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_76($裨his, $containingBlockData, $style, $transition, $usedHeight, $usedValues)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_25(&$裨his, &$containingBlockData, &$style, &$usedHeight, &$usedValues) {
	$製pos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("bottom", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_77($裨his, $containingBlockData, $style, $transition, $usedHeight, $usedValues)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_26(&$裨his, &$containingBlockData, &$style, &$usedValues, &$usedWidth) {
	$製pos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("left", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_78($裨his, $containingBlockData, $style, $transition, $usedValues, $usedWidth)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_27(&$裨his, &$containingBlockData, &$style, &$usedValues, &$usedWidth) {
	$製pos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("right", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_79($裨his, $containingBlockData, $style, $transition, $usedValues, $usedWidth)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_28(&$裨his, &$containingBlockData, &$style, &$usedValues, &$usedWidth) {
	$製pos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("left", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_80($裨his, $containingBlockData, $style, $transition, $usedValues, $usedWidth)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_29(&$裨his, &$containingBlockData, &$style, &$usedValues, &$usedWidth) {
	$製pos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("right", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_81($裨his, $containingBlockData, $style, $transition, $usedValues, $usedWidth)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_30(&$裨his, &$containingBlockData, &$style, &$usedValues, &$usedWidth) {
	$製pos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("margin-left", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_82($裨his, $containingBlockData, $style, $transition, $usedValues, $usedWidth)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_31(&$裨his, &$containingBlockData, &$style, &$usedValues, &$usedWidth) {
	$製pos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("margin-right", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_83($裨his, $containingBlockData, $style, $transition, $usedValues, $usedWidth)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_32(&$裨his, &$containingBlockData, &$style, &$usedValues, &$usedWidth) {
	$製pos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("margin-left", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_84($裨his, $containingBlockData, $style, $transition, $usedValues, $usedWidth)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_33(&$裨his, &$containingBlockData, &$style, &$usedValues, &$usedWidth) {
	$製pos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("margin-right", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_85($裨his, $containingBlockData, $style, $transition, $usedValues, $usedWidth)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_34(&$裨his, &$containingBlockData, &$style, &$usedValues, &$usedWidth) {
	$製pos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("margin-left", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_86($裨his, $containingBlockData, $style, $transition, $usedValues, $usedWidth)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_35(&$裨his, &$containingBlockData, &$style, &$usedValues, &$usedWidth) {
	$製pos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("margin-right", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_87($裨his, $containingBlockData, $style, $transition, $usedValues, $usedWidth)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_36(&$裨his, &$containingBlockData, &$style, &$usedValues, &$usedWidth) {
	$製pos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("left", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_88($裨his, $containingBlockData, $style, $transition, $usedValues, $usedWidth)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_37(&$裨his, &$containingBlockData, &$style, &$usedValues, &$usedWidth) {
	$製pos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("right", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_89($裨his, $containingBlockData, $style, $transition, $usedValues, $usedWidth)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_38(&$裨his, &$containingBlockData, &$style, &$usedValues, &$usedWidth) {
	$製pos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("left", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_90($裨his, $containingBlockData, $style, $transition, $usedValues, $usedWidth)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_39(&$裨his, &$containingBlockData, &$style, &$usedValues, &$usedWidth) {
	$製pos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("right", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_91($裨his, $containingBlockData, $style, $transition, $usedValues, $usedWidth)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_40(&$裨his, &$containingBlockData, &$style, &$usedValues, &$usedWidth) {
	$製pos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("right", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_92($裨his, $containingBlockData, $style, $transition, $usedValues, $usedWidth)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_41(&$裨his, &$containingBlockData, &$style, &$usedValues, &$usedWidth) {
	$製pos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("left", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_93($裨his, $containingBlockData, $style, $transition, $usedValues, $usedWidth)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_42(&$裨his, &$containingBlockData, &$style, &$usedValues, &$usedWidth) {
	$製pos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("margin-left", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_94($裨his, $containingBlockData, $style, $transition, $usedValues, $usedWidth)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_43(&$裨his, &$containingBlockData, &$style, &$usedValues, &$usedWidth) {
	$製pos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("margin-right", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_95($裨his, $containingBlockData, $style, $transition, $usedValues, $usedWidth)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_44(&$裨his, &$containingBlockData, &$style, &$usedValues, &$usedWidth) {
	$製pos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("left", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_96($裨his, $containingBlockData, $style, $transition, $usedValues, $usedWidth)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_45(&$裨his, &$containingBlockData, &$style, &$usedValues, &$usedWidth) {
	$製pos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("right", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_97($裨his, $containingBlockData, $style, $transition, $usedValues, $usedWidth)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_46(&$裨his, &$containingBlockData, &$style, &$usedValues, &$usedWidth) {
	$製pos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("left", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_98($裨his, $containingBlockData, $style, $transition, $usedValues, $usedWidth)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_47(&$裨his, &$containingBlockData, &$style, &$usedValues, &$usedWidth) {
	$製pos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("right", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_99($裨his, $containingBlockData, $style, $transition, $usedValues, $usedWidth)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_48(&$裨his, &$containingBlockData, &$style, &$usedValues, &$usedWidth) {
	$製pos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("left", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_100($裨his, $containingBlockData, $style, $transition, $usedValues, $usedWidth)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_49(&$裨his, &$containingBlockData, &$style, &$usedValues, &$usedWidth) {
	$製pos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("right", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_101($裨his, $containingBlockData, $style, $transition, $usedValues, $usedWidth)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_50(&$裨his, &$containingBlockData, &$style, &$usedValues, &$usedWidth) {
	$製pos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("right", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_102($裨his, $containingBlockData, $style, $transition, $usedValues, $usedWidth)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_51(&$裨his, &$containingBlockData, &$style, &$usedValues, &$usedWidth) {
	$製pos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("left", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_103($裨his, $containingBlockData, $style, $transition, $usedValues, $usedWidth)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_52(&$裨his, &$containingBlockData, &$style, &$transition, &$usedHeight, &$usedValues) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this = $style->computedValues;
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
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_53(&$裨his, &$containingBlockData, &$style, &$transition, &$usedHeight, &$usedValues) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this = $style->computedValues;
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
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_54(&$裨his, &$containingBlockData, &$style, &$transition, &$usedHeight, &$usedValues) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this = $style->computedValues;
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
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_55(&$裨his, &$containingBlockData, &$style, &$transition, &$usedHeight, &$usedValues) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this = $style->computedValues;
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
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_56(&$裨his, &$containingBlockData, &$style, &$transition, &$usedHeight, &$usedValues) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this = $style->computedValues;
		$typedProperty = null;
		$length = $_this->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($_this->_properties, $i)->name === "margin-top") {
					$typedProperty = $_this->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_57(&$裨his, &$containingBlockData, &$style, &$transition, &$usedHeight, &$usedValues) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this = $style->computedValues;
		$typedProperty = null;
		$length = $_this->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($_this->_properties, $i)->name === "margin-bottom") {
					$typedProperty = $_this->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_58(&$裨his, &$containingBlockData, &$style, &$transition, &$usedHeight, &$usedValues) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this = $style->computedValues;
		$typedProperty = null;
		$length = $_this->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($_this->_properties, $i)->name === "margin-top") {
					$typedProperty = $_this->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_59(&$裨his, &$containingBlockData, &$style, &$transition, &$usedHeight, &$usedValues) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this = $style->computedValues;
		$typedProperty = null;
		$length = $_this->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($_this->_properties, $i)->name === "margin-bottom") {
					$typedProperty = $_this->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_60(&$裨his, &$containingBlockData, &$style, &$transition, &$usedHeight, &$usedValues) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this = $style->computedValues;
		$typedProperty = null;
		$length = $_this->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($_this->_properties, $i)->name === "margin-top") {
					$typedProperty = $_this->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_61(&$裨his, &$containingBlockData, &$style, &$transition, &$usedHeight, &$usedValues) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this = $style->computedValues;
		$typedProperty = null;
		$length = $_this->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($_this->_properties, $i)->name === "margin-bottom") {
					$typedProperty = $_this->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_62(&$裨his, &$containingBlockData, &$style, &$transition, &$usedHeight, &$usedValues) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this = $style->computedValues;
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
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_63(&$裨his, &$containingBlockData, &$style, &$transition, &$usedHeight, &$usedValues) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this = $style->computedValues;
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
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_64(&$裨his, &$containingBlockData, &$style, &$transition, &$usedHeight, &$usedValues) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this = $style->computedValues;
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
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_65(&$裨his, &$containingBlockData, &$style, &$transition, &$usedHeight, &$usedValues) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this = $style->computedValues;
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
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_66(&$裨his, &$containingBlockData, &$style, &$transition, &$usedHeight, &$usedValues) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this = $style->computedValues;
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
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_67(&$裨his, &$containingBlockData, &$style, &$transition, &$usedHeight, &$usedValues) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this = $style->computedValues;
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
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_68(&$裨his, &$containingBlockData, &$style, &$transition, &$usedHeight, &$usedValues) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this = $style->computedValues;
		$typedProperty = null;
		$length = $_this->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($_this->_properties, $i)->name === "margin-top") {
					$typedProperty = $_this->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_69(&$裨his, &$containingBlockData, &$style, &$transition, &$usedHeight, &$usedValues) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this = $style->computedValues;
		$typedProperty = null;
		$length = $_this->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($_this->_properties, $i)->name === "margin-bottom") {
					$typedProperty = $_this->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_70(&$裨his, &$containingBlockData, &$style, &$transition, &$usedHeight, &$usedValues) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this = $style->computedValues;
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
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_71(&$裨his, &$containingBlockData, &$style, &$transition, &$usedHeight, &$usedValues) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this = $style->computedValues;
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
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_72(&$裨his, &$containingBlockData, &$style, &$transition, &$usedHeight, &$usedValues) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this = $style->computedValues;
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
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_73(&$裨his, &$containingBlockData, &$style, &$transition, &$usedHeight, &$usedValues) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this = $style->computedValues;
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
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_74(&$裨his, &$containingBlockData, &$style, &$transition, &$usedHeight, &$usedValues) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this = $style->computedValues;
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
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_75(&$裨his, &$containingBlockData, &$style, &$transition, &$usedHeight, &$usedValues) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this = $style->computedValues;
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
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_76(&$裨his, &$containingBlockData, &$style, &$transition, &$usedHeight, &$usedValues) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this = $style->computedValues;
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
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_77(&$裨his, &$containingBlockData, &$style, &$transition, &$usedHeight, &$usedValues) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this = $style->computedValues;
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
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_78(&$裨his, &$containingBlockData, &$style, &$transition, &$usedValues, &$usedWidth) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this = $style->computedValues;
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
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_79(&$裨his, &$containingBlockData, &$style, &$transition, &$usedValues, &$usedWidth) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this = $style->computedValues;
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
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_80(&$裨his, &$containingBlockData, &$style, &$transition, &$usedValues, &$usedWidth) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this = $style->computedValues;
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
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_81(&$裨his, &$containingBlockData, &$style, &$transition, &$usedValues, &$usedWidth) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this = $style->computedValues;
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
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_82(&$裨his, &$containingBlockData, &$style, &$transition, &$usedValues, &$usedWidth) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this = $style->computedValues;
		$typedProperty = null;
		$length = $_this->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($_this->_properties, $i)->name === "margin-left") {
					$typedProperty = $_this->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_83(&$裨his, &$containingBlockData, &$style, &$transition, &$usedValues, &$usedWidth) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this = $style->computedValues;
		$typedProperty = null;
		$length = $_this->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($_this->_properties, $i)->name === "margin-right") {
					$typedProperty = $_this->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_84(&$裨his, &$containingBlockData, &$style, &$transition, &$usedValues, &$usedWidth) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this = $style->computedValues;
		$typedProperty = null;
		$length = $_this->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($_this->_properties, $i)->name === "margin-left") {
					$typedProperty = $_this->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_85(&$裨his, &$containingBlockData, &$style, &$transition, &$usedValues, &$usedWidth) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this = $style->computedValues;
		$typedProperty = null;
		$length = $_this->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($_this->_properties, $i)->name === "margin-right") {
					$typedProperty = $_this->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_86(&$裨his, &$containingBlockData, &$style, &$transition, &$usedValues, &$usedWidth) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this = $style->computedValues;
		$typedProperty = null;
		$length = $_this->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($_this->_properties, $i)->name === "margin-left") {
					$typedProperty = $_this->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_87(&$裨his, &$containingBlockData, &$style, &$transition, &$usedValues, &$usedWidth) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this = $style->computedValues;
		$typedProperty = null;
		$length = $_this->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($_this->_properties, $i)->name === "margin-right") {
					$typedProperty = $_this->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_88(&$裨his, &$containingBlockData, &$style, &$transition, &$usedValues, &$usedWidth) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this = $style->computedValues;
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
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_89(&$裨his, &$containingBlockData, &$style, &$transition, &$usedValues, &$usedWidth) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this = $style->computedValues;
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
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_90(&$裨his, &$containingBlockData, &$style, &$transition, &$usedValues, &$usedWidth) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this = $style->computedValues;
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
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_91(&$裨his, &$containingBlockData, &$style, &$transition, &$usedValues, &$usedWidth) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this = $style->computedValues;
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
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_92(&$裨his, &$containingBlockData, &$style, &$transition, &$usedValues, &$usedWidth) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this = $style->computedValues;
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
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_93(&$裨his, &$containingBlockData, &$style, &$transition, &$usedValues, &$usedWidth) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this = $style->computedValues;
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
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_94(&$裨his, &$containingBlockData, &$style, &$transition, &$usedValues, &$usedWidth) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this = $style->computedValues;
		$typedProperty = null;
		$length = $_this->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($_this->_properties, $i)->name === "margin-left") {
					$typedProperty = $_this->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_95(&$裨his, &$containingBlockData, &$style, &$transition, &$usedValues, &$usedWidth) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this = $style->computedValues;
		$typedProperty = null;
		$length = $_this->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($_this->_properties, $i)->name === "margin-right") {
					$typedProperty = $_this->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_96(&$裨his, &$containingBlockData, &$style, &$transition, &$usedValues, &$usedWidth) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this = $style->computedValues;
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
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_97(&$裨his, &$containingBlockData, &$style, &$transition, &$usedValues, &$usedWidth) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this = $style->computedValues;
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
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_98(&$裨his, &$containingBlockData, &$style, &$transition, &$usedValues, &$usedWidth) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this = $style->computedValues;
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
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_99(&$裨his, &$containingBlockData, &$style, &$transition, &$usedValues, &$usedWidth) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this = $style->computedValues;
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
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_100(&$裨his, &$containingBlockData, &$style, &$transition, &$usedValues, &$usedWidth) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this = $style->computedValues;
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
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_101(&$裨his, &$containingBlockData, &$style, &$transition, &$usedValues, &$usedWidth) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this = $style->computedValues;
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
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_102(&$裨his, &$containingBlockData, &$style, &$transition, &$usedValues, &$usedWidth) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this = $style->computedValues;
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
function cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer_103(&$裨his, &$containingBlockData, &$style, &$transition, &$usedValues, &$usedWidth) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this = $style->computedValues;
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

<?php

class cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer extends cocktail_core_layout_computer_boxComputers_EmbeddedBlockBoxStylesComputer {
	public function __construct() { if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.boxComputers.EmbeddedPositionedBoxStylesComputer::new");
		$�spos = $GLOBALS['%s']->length;
		parent::__construct();
		$GLOBALS['%s']->pop();
	}}
	public function getComputedStaticTop($style, $containingBlockData) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.boxComputers.EmbeddedPositionedBoxStylesComputer::getComputedStaticTop");
		$�spos = $GLOBALS['%s']->length;
		{
			$�tmp = $style->usedValues->marginTop;
			$GLOBALS['%s']->pop();
			return $�tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getComputedStaticLeft($style, $containingBlockData) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.boxComputers.EmbeddedPositionedBoxStylesComputer::getComputedStaticLeft");
		$�spos = $GLOBALS['%s']->length;
		{
			$�tmp = $style->usedValues->marginLeft;
			$GLOBALS['%s']->pop();
			return $�tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function measureVerticalPositionOffsets($style, $containingBlockData) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.boxComputers.EmbeddedPositionedBoxStylesComputer::measureVerticalPositionOffsets");
		$�spos = $GLOBALS['%s']->length;
		$usedValues = $style->usedValues;
		if($style->isAuto(cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_0($this, $containingBlockData, $style, $usedValues)) === true || $style->isAuto(cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_1($this, $containingBlockData, $style, $usedValues)) === true) {
			if($style->isAuto(cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_2($this, $containingBlockData, $style, $usedValues)) === true) {
				$usedValues->marginTop = 0;
			}
			if($style->isAuto(cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_3($this, $containingBlockData, $style, $usedValues)) === true) {
				$usedValues->marginBottom = 0;
			}
			if($style->isAuto(cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_4($this, $containingBlockData, $style, $usedValues)) === true && $style->isAuto(cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_5($this, $containingBlockData, $style, $usedValues)) === true) {
				$usedValues->top = $this->getComputedStaticTop($style, $containingBlockData);
				$usedValues->bottom = $containingBlockData->height - $usedValues->height - $usedValues->marginTop - $usedValues->marginBottom - $usedValues->paddingTop - $usedValues->paddingBottom - $usedValues->top;
			} else {
				if($style->isAuto(cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_6($this, $containingBlockData, $style, $usedValues)) === true) {
					$usedValues->bottom = $this->getComputedPositionOffset(cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_7($this, $containingBlockData, $style, $usedValues), $containingBlockData->height);
					$usedValues->top = $containingBlockData->height - $usedValues->height - $usedValues->marginTop - $usedValues->marginBottom - $usedValues->bottom - $usedValues->paddingTop - $usedValues->paddingBottom;
				} else {
					if($style->isAuto(cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_8($this, $containingBlockData, $style, $usedValues)) === true) {
						$usedValues->top = $this->getComputedPositionOffset(cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_9($this, $containingBlockData, $style, $usedValues), $containingBlockData->height);
						$usedValues->bottom = $containingBlockData->height - $usedValues->height - $usedValues->marginTop - $usedValues->marginBottom - $usedValues->top - $usedValues->paddingTop - $usedValues->paddingBottom;
					} else {
						$usedValues->top = $this->getComputedPositionOffset(cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_10($this, $containingBlockData, $style, $usedValues), $containingBlockData->height);
						$usedValues->bottom = $this->getComputedPositionOffset(cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_11($this, $containingBlockData, $style, $usedValues), $containingBlockData->height);
					}
				}
			}
		} else {
			$usedValues->top = $this->getComputedPositionOffset(cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_12($this, $containingBlockData, $style, $usedValues), $containingBlockData->height);
			$usedValues->bottom = $this->getComputedPositionOffset(cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_13($this, $containingBlockData, $style, $usedValues), $containingBlockData->height);
			if($style->isAuto(cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_14($this, $containingBlockData, $style, $usedValues)) === true && $style->isAuto(cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_15($this, $containingBlockData, $style, $usedValues)) === true) {
				$margin = ($containingBlockData->height - $usedValues->top - $usedValues->bottom - $usedValues->paddingTop - $usedValues->paddingBottom) / 2;
				$usedMargin = ($containingBlockData->height - $usedValues->height - $usedValues->paddingTop - $usedValues->paddingBottom - $usedValues->top - $usedValues->bottom) / 2;
				if($usedMargin >= 0) {
					$usedValues->marginTop = $usedMargin;
					$usedValues->marginBottom = $usedMargin;
				} else {
					$usedValues->marginTop = 0;
					$usedValues->marginBottom = $containingBlockData->height - $usedValues->height - $usedValues->paddingTop - $usedValues->paddingBottom - $usedValues->top - $usedValues->bottom;
				}
			} else {
				if($style->isAuto(cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_16($this, $containingBlockData, $style, $usedValues)) === true) {
					$usedValues->marginTop = $containingBlockData->height - $usedValues->height - $usedValues->paddingTop - $usedValues->paddingBottom - $usedValues->top - $usedValues->bottom - $usedValues->marginBottom;
				} else {
					if($style->isAuto(cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_17($this, $containingBlockData, $style, $usedValues)) === true) {
						$usedValues->marginBottom = $containingBlockData->height - $usedValues->height - $usedValues->paddingTop - $usedValues->paddingBottom - $usedValues->top - $usedValues->bottom - $usedValues->marginTop;
					}
				}
			}
		}
		$GLOBALS['%s']->pop();
	}
	public function measureHorizontalPositionOffsets($style, $containingBlockData) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.boxComputers.EmbeddedPositionedBoxStylesComputer::measureHorizontalPositionOffsets");
		$�spos = $GLOBALS['%s']->length;
		$usedValues = $style->usedValues;
		if($style->isAuto(cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_18($this, $containingBlockData, $style, $usedValues)) === true || $style->isAuto(cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_19($this, $containingBlockData, $style, $usedValues)) === true) {
			if($style->isAuto(cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_20($this, $containingBlockData, $style, $usedValues)) === true) {
				$usedValues->marginLeft = 0;
			}
			if($style->isAuto(cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_21($this, $containingBlockData, $style, $usedValues)) === true) {
				$usedValues->marginRight = 0;
			}
			if($style->isAuto(cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_22($this, $containingBlockData, $style, $usedValues)) === true && $style->isAuto(cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_23($this, $containingBlockData, $style, $usedValues)) === true) {
				$usedValues->left = $this->getComputedStaticLeft($style, $containingBlockData);
				$usedValues->right = $containingBlockData->width - $usedValues->width - $usedValues->marginLeft - $usedValues->marginRight - $usedValues->paddingLeft - $usedValues->paddingRight - $usedValues->left;
			} else {
				if($style->isAuto(cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_24($this, $containingBlockData, $style, $usedValues)) === true) {
					$usedValues->right = $this->getComputedPositionOffset(cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_25($this, $containingBlockData, $style, $usedValues), $containingBlockData->width);
					$usedValues->left = $containingBlockData->width - $usedValues->width - $usedValues->marginLeft - $usedValues->marginRight - $usedValues->right - $usedValues->paddingLeft - $usedValues->paddingRight;
				} else {
					if($style->isAuto(cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_26($this, $containingBlockData, $style, $usedValues)) === true) {
						$usedValues->left = $this->getComputedPositionOffset(cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_27($this, $containingBlockData, $style, $usedValues), $containingBlockData->width);
						$usedValues->right = $containingBlockData->width - $usedValues->width - $usedValues->marginLeft - $usedValues->marginRight - $usedValues->left - $usedValues->paddingLeft - $usedValues->paddingRight;
					}
				}
			}
		} else {
			$usedValues->left = $this->getComputedPositionOffset(cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_28($this, $containingBlockData, $style, $usedValues), $containingBlockData->width);
			$usedValues->right = $this->getComputedPositionOffset(cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_29($this, $containingBlockData, $style, $usedValues), $containingBlockData->width);
			if($style->isAuto(cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_30($this, $containingBlockData, $style, $usedValues)) === true && $style->isAuto(cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_31($this, $containingBlockData, $style, $usedValues)) === true) {
				$margin = ($containingBlockData->width - $usedValues->left - $usedValues->right - $usedValues->paddingLeft - $usedValues->paddingRight) / 2;
				$usedMargin = ($containingBlockData->width - $usedValues->width - $usedValues->paddingLeft - $usedValues->paddingRight - $usedValues->left - $usedValues->right) / 2;
				if($usedMargin >= 0) {
					$usedValues->marginLeft = $usedMargin;
					$usedValues->marginRight = $usedMargin;
				} else {
					$usedValues->marginLeft = 0;
					$usedValues->marginRight = $containingBlockData->width - $usedValues->width - $usedValues->paddingLeft - $usedValues->paddingRight - $usedValues->left - $usedValues->right;
				}
				$usedValues->marginLeft = 0;
			} else {
				if($style->isAuto(cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_32($this, $containingBlockData, $style, $usedValues)) === true) {
					$usedValues->marginLeft = $containingBlockData->width - $usedValues->width - $usedValues->paddingLeft - $usedValues->paddingRight - $usedValues->left - $usedValues->right - $usedValues->marginRight;
				} else {
					if($style->isAuto(cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_33($this, $containingBlockData, $style, $usedValues)) === true) {
						$usedValues->marginRight = $containingBlockData->width - $usedValues->width - $usedValues->paddingLeft - $usedValues->paddingRight - $usedValues->left - $usedValues->right - $usedValues->marginLeft;
					}
				}
			}
		}
		$GLOBALS['%s']->pop();
	}
	public function measurePositionOffsets($style, $containingBlockData) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.boxComputers.EmbeddedPositionedBoxStylesComputer::measurePositionOffsets");
		$�spos = $GLOBALS['%s']->length;
		$this->measureHorizontalPositionOffsets($style, $containingBlockData);
		$this->measureVerticalPositionOffsets($style, $containingBlockData);
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'cocktail.core.layout.computer.boxComputers.EmbeddedPositionedBoxStylesComputer'; }
}
function cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_0(&$�this, &$containingBlockData, &$style, &$usedValues) {
	$�spos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("top", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_34($�this, $containingBlockData, $style, $transition, $usedValues)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_1(&$�this, &$containingBlockData, &$style, &$usedValues) {
	$�spos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("bottom", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_35($�this, $containingBlockData, $style, $transition, $usedValues)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_2(&$�this, &$containingBlockData, &$style, &$usedValues) {
	$�spos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("margin-top", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_36($�this, $containingBlockData, $style, $transition, $usedValues)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_3(&$�this, &$containingBlockData, &$style, &$usedValues) {
	$�spos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("margin-bottom", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_37($�this, $containingBlockData, $style, $transition, $usedValues)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_4(&$�this, &$containingBlockData, &$style, &$usedValues) {
	$�spos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("top", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_38($�this, $containingBlockData, $style, $transition, $usedValues)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_5(&$�this, &$containingBlockData, &$style, &$usedValues) {
	$�spos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("bottom", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_39($�this, $containingBlockData, $style, $transition, $usedValues)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_6(&$�this, &$containingBlockData, &$style, &$usedValues) {
	$�spos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("top", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_40($�this, $containingBlockData, $style, $transition, $usedValues)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_7(&$�this, &$containingBlockData, &$style, &$usedValues) {
	$�spos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("bottom", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_41($�this, $containingBlockData, $style, $transition, $usedValues)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_8(&$�this, &$containingBlockData, &$style, &$usedValues) {
	$�spos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("bottom", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_42($�this, $containingBlockData, $style, $transition, $usedValues)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_9(&$�this, &$containingBlockData, &$style, &$usedValues) {
	$�spos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("top", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_43($�this, $containingBlockData, $style, $transition, $usedValues)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_10(&$�this, &$containingBlockData, &$style, &$usedValues) {
	$�spos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("top", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_44($�this, $containingBlockData, $style, $transition, $usedValues)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_11(&$�this, &$containingBlockData, &$style, &$usedValues) {
	$�spos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("bottom", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_45($�this, $containingBlockData, $style, $transition, $usedValues)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_12(&$�this, &$containingBlockData, &$style, &$usedValues) {
	$�spos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("top", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_46($�this, $containingBlockData, $style, $transition, $usedValues)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_13(&$�this, &$containingBlockData, &$style, &$usedValues) {
	$�spos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("bottom", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_47($�this, $containingBlockData, $style, $transition, $usedValues)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_14(&$�this, &$containingBlockData, &$style, &$usedValues) {
	$�spos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("margin-top", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_48($�this, $containingBlockData, $style, $transition, $usedValues)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_15(&$�this, &$containingBlockData, &$style, &$usedValues) {
	$�spos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("margin-bottom", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_49($�this, $containingBlockData, $style, $transition, $usedValues)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_16(&$�this, &$containingBlockData, &$style, &$usedValues) {
	$�spos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("margin-top", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_50($�this, $containingBlockData, $style, $transition, $usedValues)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_17(&$�this, &$containingBlockData, &$style, &$usedValues) {
	$�spos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("margin-bottom", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_51($�this, $containingBlockData, $style, $transition, $usedValues)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_18(&$�this, &$containingBlockData, &$style, &$usedValues) {
	$�spos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("left", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_52($�this, $containingBlockData, $style, $transition, $usedValues)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_19(&$�this, &$containingBlockData, &$style, &$usedValues) {
	$�spos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("right", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_53($�this, $containingBlockData, $style, $transition, $usedValues)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_20(&$�this, &$containingBlockData, &$style, &$usedValues) {
	$�spos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("margin-left", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_54($�this, $containingBlockData, $style, $transition, $usedValues)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_21(&$�this, &$containingBlockData, &$style, &$usedValues) {
	$�spos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("margin-right", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_55($�this, $containingBlockData, $style, $transition, $usedValues)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_22(&$�this, &$containingBlockData, &$style, &$usedValues) {
	$�spos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("left", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_56($�this, $containingBlockData, $style, $transition, $usedValues)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_23(&$�this, &$containingBlockData, &$style, &$usedValues) {
	$�spos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("right", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_57($�this, $containingBlockData, $style, $transition, $usedValues)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_24(&$�this, &$containingBlockData, &$style, &$usedValues) {
	$�spos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("left", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_58($�this, $containingBlockData, $style, $transition, $usedValues)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_25(&$�this, &$containingBlockData, &$style, &$usedValues) {
	$�spos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("right", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_59($�this, $containingBlockData, $style, $transition, $usedValues)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_26(&$�this, &$containingBlockData, &$style, &$usedValues) {
	$�spos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("right", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_60($�this, $containingBlockData, $style, $transition, $usedValues)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_27(&$�this, &$containingBlockData, &$style, &$usedValues) {
	$�spos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("left", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_61($�this, $containingBlockData, $style, $transition, $usedValues)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_28(&$�this, &$containingBlockData, &$style, &$usedValues) {
	$�spos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("left", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_62($�this, $containingBlockData, $style, $transition, $usedValues)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_29(&$�this, &$containingBlockData, &$style, &$usedValues) {
	$�spos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("right", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_63($�this, $containingBlockData, $style, $transition, $usedValues)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_30(&$�this, &$containingBlockData, &$style, &$usedValues) {
	$�spos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("margin-left", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_64($�this, $containingBlockData, $style, $transition, $usedValues)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_31(&$�this, &$containingBlockData, &$style, &$usedValues) {
	$�spos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("margin-right", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_65($�this, $containingBlockData, $style, $transition, $usedValues)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_32(&$�this, &$containingBlockData, &$style, &$usedValues) {
	$�spos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("margin-left", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_66($�this, $containingBlockData, $style, $transition, $usedValues)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_33(&$�this, &$containingBlockData, &$style, &$usedValues) {
	$�spos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("margin-right", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_67($�this, $containingBlockData, $style, $transition, $usedValues)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_34(&$�this, &$containingBlockData, &$style, &$transition, &$usedValues) {
	$�spos = $GLOBALS['%s']->length;
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
function cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_35(&$�this, &$containingBlockData, &$style, &$transition, &$usedValues) {
	$�spos = $GLOBALS['%s']->length;
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
function cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_36(&$�this, &$containingBlockData, &$style, &$transition, &$usedValues) {
	$�spos = $GLOBALS['%s']->length;
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
function cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_37(&$�this, &$containingBlockData, &$style, &$transition, &$usedValues) {
	$�spos = $GLOBALS['%s']->length;
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
function cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_38(&$�this, &$containingBlockData, &$style, &$transition, &$usedValues) {
	$�spos = $GLOBALS['%s']->length;
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
function cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_39(&$�this, &$containingBlockData, &$style, &$transition, &$usedValues) {
	$�spos = $GLOBALS['%s']->length;
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
function cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_40(&$�this, &$containingBlockData, &$style, &$transition, &$usedValues) {
	$�spos = $GLOBALS['%s']->length;
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
function cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_41(&$�this, &$containingBlockData, &$style, &$transition, &$usedValues) {
	$�spos = $GLOBALS['%s']->length;
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
function cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_42(&$�this, &$containingBlockData, &$style, &$transition, &$usedValues) {
	$�spos = $GLOBALS['%s']->length;
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
function cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_43(&$�this, &$containingBlockData, &$style, &$transition, &$usedValues) {
	$�spos = $GLOBALS['%s']->length;
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
function cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_44(&$�this, &$containingBlockData, &$style, &$transition, &$usedValues) {
	$�spos = $GLOBALS['%s']->length;
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
function cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_45(&$�this, &$containingBlockData, &$style, &$transition, &$usedValues) {
	$�spos = $GLOBALS['%s']->length;
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
function cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_46(&$�this, &$containingBlockData, &$style, &$transition, &$usedValues) {
	$�spos = $GLOBALS['%s']->length;
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
function cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_47(&$�this, &$containingBlockData, &$style, &$transition, &$usedValues) {
	$�spos = $GLOBALS['%s']->length;
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
function cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_48(&$�this, &$containingBlockData, &$style, &$transition, &$usedValues) {
	$�spos = $GLOBALS['%s']->length;
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
function cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_49(&$�this, &$containingBlockData, &$style, &$transition, &$usedValues) {
	$�spos = $GLOBALS['%s']->length;
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
function cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_50(&$�this, &$containingBlockData, &$style, &$transition, &$usedValues) {
	$�spos = $GLOBALS['%s']->length;
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
function cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_51(&$�this, &$containingBlockData, &$style, &$transition, &$usedValues) {
	$�spos = $GLOBALS['%s']->length;
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
function cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_52(&$�this, &$containingBlockData, &$style, &$transition, &$usedValues) {
	$�spos = $GLOBALS['%s']->length;
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
function cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_53(&$�this, &$containingBlockData, &$style, &$transition, &$usedValues) {
	$�spos = $GLOBALS['%s']->length;
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
function cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_54(&$�this, &$containingBlockData, &$style, &$transition, &$usedValues) {
	$�spos = $GLOBALS['%s']->length;
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
function cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_55(&$�this, &$containingBlockData, &$style, &$transition, &$usedValues) {
	$�spos = $GLOBALS['%s']->length;
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
function cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_56(&$�this, &$containingBlockData, &$style, &$transition, &$usedValues) {
	$�spos = $GLOBALS['%s']->length;
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
function cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_57(&$�this, &$containingBlockData, &$style, &$transition, &$usedValues) {
	$�spos = $GLOBALS['%s']->length;
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
function cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_58(&$�this, &$containingBlockData, &$style, &$transition, &$usedValues) {
	$�spos = $GLOBALS['%s']->length;
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
function cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_59(&$�this, &$containingBlockData, &$style, &$transition, &$usedValues) {
	$�spos = $GLOBALS['%s']->length;
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
function cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_60(&$�this, &$containingBlockData, &$style, &$transition, &$usedValues) {
	$�spos = $GLOBALS['%s']->length;
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
function cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_61(&$�this, &$containingBlockData, &$style, &$transition, &$usedValues) {
	$�spos = $GLOBALS['%s']->length;
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
function cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_62(&$�this, &$containingBlockData, &$style, &$transition, &$usedValues) {
	$�spos = $GLOBALS['%s']->length;
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
function cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_63(&$�this, &$containingBlockData, &$style, &$transition, &$usedValues) {
	$�spos = $GLOBALS['%s']->length;
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
function cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_64(&$�this, &$containingBlockData, &$style, &$transition, &$usedValues) {
	$�spos = $GLOBALS['%s']->length;
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
function cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_65(&$�this, &$containingBlockData, &$style, &$transition, &$usedValues) {
	$�spos = $GLOBALS['%s']->length;
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
function cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_66(&$�this, &$containingBlockData, &$style, &$transition, &$usedValues) {
	$�spos = $GLOBALS['%s']->length;
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
function cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer_67(&$�this, &$containingBlockData, &$style, &$transition, &$usedValues) {
	$�spos = $GLOBALS['%s']->length;
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

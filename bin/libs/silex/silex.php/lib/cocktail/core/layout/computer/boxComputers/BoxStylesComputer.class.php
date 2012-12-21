<?php

class cocktail_core_layout_computer_boxComputers_BoxStylesComputer {
	public function __construct() { if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.boxComputers.BoxStylesComputer::new");
		$製pos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}}
	public function constrainHeight($style, $usedHeight) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.boxComputers.BoxStylesComputer::constrainHeight");
		$製pos = $GLOBALS['%s']->length;
		$usedValues = $style->usedValues;
		if($style->isNone(cocktail_core_layout_computer_boxComputers_BoxStylesComputer_0($this, $style, $usedHeight, $usedValues)) === false) {
			if($usedHeight > $usedValues->maxHeight) {
				$usedHeight = $usedValues->maxHeight;
			}
		}
		if($usedHeight < $usedValues->minHeight) {
			$usedHeight = $usedValues->minHeight;
		}
		{
			$GLOBALS['%s']->pop();
			return $usedHeight;
		}
		$GLOBALS['%s']->pop();
	}
	public function constrainWidth($style, $usedWidth) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.boxComputers.BoxStylesComputer::constrainWidth");
		$製pos = $GLOBALS['%s']->length;
		$usedValues = $style->usedValues;
		if($style->isNone(cocktail_core_layout_computer_boxComputers_BoxStylesComputer_1($this, $style, $usedValues, $usedWidth)) === false) {
			if($usedWidth > $usedValues->maxWidth) {
				$usedWidth = $usedValues->maxWidth;
			}
		}
		if($usedWidth < $usedValues->minWidth) {
			$usedWidth = $usedValues->minWidth;
		}
		{
			$GLOBALS['%s']->pop();
			return $usedWidth;
		}
		$GLOBALS['%s']->pop();
	}
	public function getComputedPadding($paddingStyleValue, $containingHTMLElementDimension) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.boxComputers.BoxStylesComputer::getComputedPadding");
		$製pos = $GLOBALS['%s']->length;
		$computedPaddingValue = null;
		$裨 = ($paddingStyleValue);
		switch($裨->index) {
		case 17:
		$value = $裨->params[0];
		{
			$computedPaddingValue = $value;
		}break;
		case 2:
		$value = $裨->params[0];
		{
			$computedPaddingValue = cocktail_core_css_CSSValueConverter::getPixelFromPercent($value, $containingHTMLElementDimension);
		}break;
		default:{
			throw new HException("Illegal value for padding");
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $computedPaddingValue;
		}
		$GLOBALS['%s']->pop();
	}
	public function getComputedDimension($dimensionStyleValue, $containingHTMLElementDimension, $isContainingDimensionAuto) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.boxComputers.BoxStylesComputer::getComputedDimension");
		$製pos = $GLOBALS['%s']->length;
		$computedDimensions = null;
		$裨 = ($dimensionStyleValue);
		switch($裨->index) {
		case 17:
		$value = $裨->params[0];
		{
			$computedDimensions = $value;
		}break;
		case 2:
		$value = $裨->params[0];
		{
			$computedDimensions = cocktail_core_css_CSSValueConverter::getPixelFromPercent($value, $containingHTMLElementDimension);
		}break;
		case 4:
		$value = $裨->params[0];
		{
			if($value === cocktail_core_css_CSSKeywordValue::$AUTO) {
				$computedDimensions = 0;
			} else {
				throw new HException("Illegal keyword value for width or height");
			}
		}break;
		default:{
			throw new HException("Illegal value for width or height");
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $computedDimensions;
		}
		$GLOBALS['%s']->pop();
	}
	public function getComputedPositionOffset($positionOffsetStyleValue, $containingHTMLElementDimension) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.boxComputers.BoxStylesComputer::getComputedPositionOffset");
		$製pos = $GLOBALS['%s']->length;
		$computedPositionOffset = 0.0;
		$裨 = ($positionOffsetStyleValue);
		switch($裨->index) {
		case 17:
		$value = $裨->params[0];
		{
			$computedPositionOffset = $value;
		}break;
		case 2:
		$value = $裨->params[0];
		{
			$computedPositionOffset = cocktail_core_css_CSSValueConverter::getPixelFromPercent($value, $containingHTMLElementDimension);
		}break;
		default:{
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $computedPositionOffset;
		}
		$GLOBALS['%s']->pop();
	}
	public function getComputedConstrainedDimension($constrainedDimension, $containingHTMLElementDimension, $isContainingDimensionAuto, $isMinConstraint = null) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.boxComputers.BoxStylesComputer::getComputedConstrainedDimension");
		$製pos = $GLOBALS['%s']->length;
		if($isMinConstraint === null) {
			$isMinConstraint = false;
		}
		$computedConstraintDimension = null;
		$裨 = ($constrainedDimension);
		switch($裨->index) {
		case 17:
		$value = $裨->params[0];
		{
			$computedConstraintDimension = $value;
		}break;
		case 2:
		$value = $裨->params[0];
		{
			if($isContainingDimensionAuto === true) {
				if($isMinConstraint === true) {
					$computedConstraintDimension = 0;
				} else {
					$computedConstraintDimension = 100000;
				}
			} else {
				$computedConstraintDimension = cocktail_core_css_CSSValueConverter::getPixelFromPercent($value, $containingHTMLElementDimension);
			}
		}break;
		case 4:
		$value = $裨->params[0];
		{
			if($value !== cocktail_core_css_CSSKeywordValue::$NONE) {
				throw new HException("Illegal keyword value for dimension constraints style");
			}
			if($isMinConstraint === true) {
				$computedConstraintDimension = 0.0;
			} else {
				$computedConstraintDimension = 100000;
			}
		}break;
		default:{
			throw new HException("Illegal value for dimension constraints style");
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $computedConstraintDimension;
		}
		$GLOBALS['%s']->pop();
	}
	public function getComputedAutoMargin($marginStyleValue, $opositeMargin, $containingHTMLElementDimension, $computedDimension, $isDimensionAuto, $computedPaddingsDimension, $isHorizontalMargin) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.boxComputers.BoxStylesComputer::getComputedAutoMargin");
		$製pos = $GLOBALS['%s']->length;
		$computedMargin = null;
		if($isHorizontalMargin === false || $isDimensionAuto === true) {
			$computedMargin = 0.0;
		} else {
			$裨 = ($opositeMargin);
			switch($裨->index) {
			case 4:
			$value = $裨->params[0];
			{
				if($value !== cocktail_core_css_CSSKeywordValue::$AUTO) {
					throw new HException("Illegal keyword value for margin");
				}
				$computedMargin = ($containingHTMLElementDimension - $computedDimension - $computedPaddingsDimension) / 2;
			}break;
			default:{
				$opositeComputedMargin = $this->getComputedMargin($opositeMargin, $marginStyleValue, $containingHTMLElementDimension, $computedDimension, $isDimensionAuto, $computedPaddingsDimension, $isHorizontalMargin);
				$computedMargin = $containingHTMLElementDimension - $computedDimension - $computedPaddingsDimension - $opositeComputedMargin;
			}break;
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $computedMargin;
		}
		$GLOBALS['%s']->pop();
	}
	public function getComputedMargin($marginStyleValue, $opositeMargin, $containingHTMLElementDimension, $computedDimension, $isDimensionAuto, $computedPaddingsDimension, $isHorizontalMargin) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.boxComputers.BoxStylesComputer::getComputedMargin");
		$製pos = $GLOBALS['%s']->length;
		$usedMargin = null;
		$裨 = ($marginStyleValue);
		switch($裨->index) {
		case 17:
		$value = $裨->params[0];
		{
			$usedMargin = $value;
		}break;
		case 2:
		$value = $裨->params[0];
		{
			if($isDimensionAuto === true) {
				$usedMargin = 0.0;
			} else {
				$usedMargin = cocktail_core_css_CSSValueConverter::getPixelFromPercent($value, $containingHTMLElementDimension);
			}
		}break;
		case 4:
		$value = $裨->params[0];
		{
			if($value !== cocktail_core_css_CSSKeywordValue::$AUTO) {
				throw new HException("Illegal keyword value for margin style");
			}
			$usedMargin = $this->getComputedAutoMargin($marginStyleValue, $opositeMargin, $containingHTMLElementDimension, $computedDimension, $isDimensionAuto, $computedPaddingsDimension, $isHorizontalMargin);
		}break;
		default:{
			throw new HException("Illegal value for margin style");
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $usedMargin;
		}
		$GLOBALS['%s']->pop();
	}
	public function getComputedMarginBottom($style, $computedHeight, $containingBlockData) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.boxComputers.BoxStylesComputer::getComputedMarginBottom");
		$製pos = $GLOBALS['%s']->length;
		{
			$裨mp = $this->getComputedMargin(cocktail_core_layout_computer_boxComputers_BoxStylesComputer_2($this, $computedHeight, $containingBlockData, $style), cocktail_core_layout_computer_boxComputers_BoxStylesComputer_3($this, $computedHeight, $containingBlockData, $style), $containingBlockData->height, $computedHeight, $style->isAuto(cocktail_core_layout_computer_boxComputers_BoxStylesComputer_4($this, $computedHeight, $containingBlockData, $style)), $style->usedValues->paddingTop + $style->usedValues->paddingBottom, false);
			$GLOBALS['%s']->pop();
			return $裨mp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getComputedMarginTop($style, $computedHeight, $containingBlockData) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.boxComputers.BoxStylesComputer::getComputedMarginTop");
		$製pos = $GLOBALS['%s']->length;
		{
			$裨mp = $this->getComputedMargin(cocktail_core_layout_computer_boxComputers_BoxStylesComputer_5($this, $computedHeight, $containingBlockData, $style), cocktail_core_layout_computer_boxComputers_BoxStylesComputer_6($this, $computedHeight, $containingBlockData, $style), $containingBlockData->height, $computedHeight, $style->isAuto(cocktail_core_layout_computer_boxComputers_BoxStylesComputer_7($this, $computedHeight, $containingBlockData, $style)), $style->usedValues->paddingTop + $style->usedValues->paddingBottom, false);
			$GLOBALS['%s']->pop();
			return $裨mp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getComputedMarginRight($style, $computedWidth, $containingBlockData) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.boxComputers.BoxStylesComputer::getComputedMarginRight");
		$製pos = $GLOBALS['%s']->length;
		{
			$裨mp = $this->getComputedMargin(cocktail_core_layout_computer_boxComputers_BoxStylesComputer_8($this, $computedWidth, $containingBlockData, $style), cocktail_core_layout_computer_boxComputers_BoxStylesComputer_9($this, $computedWidth, $containingBlockData, $style), $containingBlockData->width, $computedWidth, $style->isAuto(cocktail_core_layout_computer_boxComputers_BoxStylesComputer_10($this, $computedWidth, $containingBlockData, $style)), $style->usedValues->paddingRight + $style->usedValues->paddingLeft, true);
			$GLOBALS['%s']->pop();
			return $裨mp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getComputedMarginLeft($style, $computedWidth, $containingBlockData) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.boxComputers.BoxStylesComputer::getComputedMarginLeft");
		$製pos = $GLOBALS['%s']->length;
		{
			$裨mp = $this->getComputedMargin(cocktail_core_layout_computer_boxComputers_BoxStylesComputer_11($this, $computedWidth, $containingBlockData, $style), cocktail_core_layout_computer_boxComputers_BoxStylesComputer_12($this, $computedWidth, $containingBlockData, $style), $containingBlockData->width, $computedWidth, $style->isAuto(cocktail_core_layout_computer_boxComputers_BoxStylesComputer_13($this, $computedWidth, $containingBlockData, $style)), $style->usedValues->paddingRight + $style->usedValues->paddingLeft, true);
			$GLOBALS['%s']->pop();
			return $裨mp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getComputedAutoHeight($style, $containingBlockData) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.boxComputers.BoxStylesComputer::getComputedAutoHeight");
		$製pos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return 0;
		}
		$GLOBALS['%s']->pop();
	}
	public function getComputedHeight($style, $containingBlockData) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.boxComputers.BoxStylesComputer::getComputedHeight");
		$製pos = $GLOBALS['%s']->length;
		{
			$裨mp = $this->getComputedDimension(cocktail_core_layout_computer_boxComputers_BoxStylesComputer_14($this, $containingBlockData, $style), $containingBlockData->height, $containingBlockData->isHeightAuto);
			$GLOBALS['%s']->pop();
			return $裨mp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getComputedAutoWidth($style, $containingBlockData) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.boxComputers.BoxStylesComputer::getComputedAutoWidth");
		$製pos = $GLOBALS['%s']->length;
		{
			$裨mp = $containingBlockData->width - $style->usedValues->paddingLeft - $style->usedValues->paddingRight - $style->usedValues->marginLeft - $style->usedValues->marginRight;
			$GLOBALS['%s']->pop();
			return $裨mp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getComputedWidth($style, $containingBlockData) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.boxComputers.BoxStylesComputer::getComputedWidth");
		$製pos = $GLOBALS['%s']->length;
		{
			$裨mp = $this->getComputedDimension(cocktail_core_layout_computer_boxComputers_BoxStylesComputer_15($this, $containingBlockData, $style), $containingBlockData->width, $containingBlockData->isWidthAuto);
			$GLOBALS['%s']->pop();
			return $裨mp;
		}
		$GLOBALS['%s']->pop();
	}
	public function measureHeight($style, $containingBlockData) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.boxComputers.BoxStylesComputer::measureHeight");
		$製pos = $GLOBALS['%s']->length;
		$computedHeight = $this->constrainHeight($style, $this->getComputedHeight($style, $containingBlockData));
		$style->usedValues->marginTop = $this->getComputedMarginTop($style, $computedHeight, $containingBlockData);
		$style->usedValues->marginBottom = $this->getComputedMarginBottom($style, $computedHeight, $containingBlockData);
		{
			$GLOBALS['%s']->pop();
			return $computedHeight;
		}
		$GLOBALS['%s']->pop();
	}
	public function measureAutoHeight($style, $containingBlockData) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.boxComputers.BoxStylesComputer::measureAutoHeight");
		$製pos = $GLOBALS['%s']->length;
		$computedHeight = $this->getComputedAutoHeight($style, $containingBlockData);
		$style->usedValues->marginTop = $this->getComputedMarginTop($style, $computedHeight, $containingBlockData);
		$style->usedValues->marginBottom = $this->getComputedMarginBottom($style, $computedHeight, $containingBlockData);
		{
			$GLOBALS['%s']->pop();
			return $computedHeight;
		}
		$GLOBALS['%s']->pop();
	}
	public function measureHeightAndVerticalMargins($style, $containingBlockData) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.boxComputers.BoxStylesComputer::measureHeightAndVerticalMargins");
		$製pos = $GLOBALS['%s']->length;
		if($style->isAuto(cocktail_core_layout_computer_boxComputers_BoxStylesComputer_16($this, $containingBlockData, $style)) === true) {
			$裨mp = $this->measureAutoHeight($style, $containingBlockData);
			$GLOBALS['%s']->pop();
			return $裨mp;
		} else {
			$裨mp = $this->measureHeight($style, $containingBlockData);
			$GLOBALS['%s']->pop();
			return $裨mp;
		}
		$GLOBALS['%s']->pop();
	}
	public function measureWidth($style, $containingBlockData) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.boxComputers.BoxStylesComputer::measureWidth");
		$製pos = $GLOBALS['%s']->length;
		$computedWidth = $this->constrainWidth($style, $this->getComputedWidth($style, $containingBlockData));
		$style->usedValues->marginLeft = $this->getComputedMarginLeft($style, $computedWidth, $containingBlockData);
		$style->usedValues->marginRight = $this->getComputedMarginRight($style, $computedWidth, $containingBlockData);
		{
			$GLOBALS['%s']->pop();
			return $computedWidth;
		}
		$GLOBALS['%s']->pop();
	}
	public function measureAutoWidth($style, $containingBlockData) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.boxComputers.BoxStylesComputer::measureAutoWidth");
		$製pos = $GLOBALS['%s']->length;
		$usedWidth = 0.0;
		$style->usedValues->marginLeft = $this->getComputedMarginLeft($style, $usedWidth, $containingBlockData);
		$style->usedValues->marginRight = $this->getComputedMarginRight($style, $usedWidth, $containingBlockData);
		{
			$裨mp = $this->getComputedAutoWidth($style, $containingBlockData);
			$GLOBALS['%s']->pop();
			return $裨mp;
		}
		$GLOBALS['%s']->pop();
	}
	public function measureWidthAndHorizontalMargins($style, $containingBlockData) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.boxComputers.BoxStylesComputer::measureWidthAndHorizontalMargins");
		$製pos = $GLOBALS['%s']->length;
		if($style->isAuto(cocktail_core_layout_computer_boxComputers_BoxStylesComputer_17($this, $containingBlockData, $style)) === true) {
			$裨mp = $this->measureAutoWidth($style, $containingBlockData);
			$GLOBALS['%s']->pop();
			return $裨mp;
		} else {
			$裨mp = $this->measureWidth($style, $containingBlockData);
			$GLOBALS['%s']->pop();
			return $裨mp;
		}
		$GLOBALS['%s']->pop();
	}
	public function measureHorizontalPaddings($style, $containingBlockData) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.boxComputers.BoxStylesComputer::measureHorizontalPaddings");
		$製pos = $GLOBALS['%s']->length;
		$style->usedValues->paddingLeft = $this->getComputedPadding(cocktail_core_layout_computer_boxComputers_BoxStylesComputer_18($this, $containingBlockData, $style), $containingBlockData->width);
		$style->usedValues->paddingRight = $this->getComputedPadding(cocktail_core_layout_computer_boxComputers_BoxStylesComputer_19($this, $containingBlockData, $style), $containingBlockData->width);
		$GLOBALS['%s']->pop();
	}
	public function measureVerticalPaddings($style, $containingBlockData) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.boxComputers.BoxStylesComputer::measureVerticalPaddings");
		$製pos = $GLOBALS['%s']->length;
		$style->usedValues->paddingTop = $this->getComputedPadding(cocktail_core_layout_computer_boxComputers_BoxStylesComputer_20($this, $containingBlockData, $style), $containingBlockData->width);
		$style->usedValues->paddingBottom = $this->getComputedPadding(cocktail_core_layout_computer_boxComputers_BoxStylesComputer_21($this, $containingBlockData, $style), $containingBlockData->width);
		$GLOBALS['%s']->pop();
	}
	public function measureDimensionsAndMargins($style, $containingBlockData) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.boxComputers.BoxStylesComputer::measureDimensionsAndMargins");
		$製pos = $GLOBALS['%s']->length;
		$style->usedValues->width = $this->constrainWidth($style, $this->measureWidthAndHorizontalMargins($style, $containingBlockData));
		$style->usedValues->height = $this->constrainHeight($style, $this->measureHeightAndVerticalMargins($style, $containingBlockData));
		$GLOBALS['%s']->pop();
	}
	public function measurePositionOffsets($style, $containingBlockData) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.boxComputers.BoxStylesComputer::measurePositionOffsets");
		$製pos = $GLOBALS['%s']->length;
		$style->usedValues->left = $this->getComputedPositionOffset(cocktail_core_layout_computer_boxComputers_BoxStylesComputer_22($this, $containingBlockData, $style), $containingBlockData->width);
		$style->usedValues->right = $this->getComputedPositionOffset(cocktail_core_layout_computer_boxComputers_BoxStylesComputer_23($this, $containingBlockData, $style), $containingBlockData->width);
		$style->usedValues->top = $this->getComputedPositionOffset(cocktail_core_layout_computer_boxComputers_BoxStylesComputer_24($this, $containingBlockData, $style), $containingBlockData->height);
		$style->usedValues->bottom = $this->getComputedPositionOffset(cocktail_core_layout_computer_boxComputers_BoxStylesComputer_25($this, $containingBlockData, $style), $containingBlockData->height);
		$GLOBALS['%s']->pop();
	}
	public function measureDimensionsConstraints($style, $containingBlockData) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.boxComputers.BoxStylesComputer::measureDimensionsConstraints");
		$製pos = $GLOBALS['%s']->length;
		$style->usedValues->maxHeight = $this->getComputedConstrainedDimension(cocktail_core_layout_computer_boxComputers_BoxStylesComputer_26($this, $containingBlockData, $style), $containingBlockData->height, $containingBlockData->isHeightAuto, null);
		$style->usedValues->minHeight = $this->getComputedConstrainedDimension(cocktail_core_layout_computer_boxComputers_BoxStylesComputer_27($this, $containingBlockData, $style), $containingBlockData->height, $containingBlockData->isHeightAuto, true);
		$style->usedValues->maxWidth = $this->getComputedConstrainedDimension(cocktail_core_layout_computer_boxComputers_BoxStylesComputer_28($this, $containingBlockData, $style), $containingBlockData->width, $containingBlockData->isWidthAuto, null);
		$style->usedValues->minWidth = $this->getComputedConstrainedDimension(cocktail_core_layout_computer_boxComputers_BoxStylesComputer_29($this, $containingBlockData, $style), $containingBlockData->width, $containingBlockData->isWidthAuto, true);
		$GLOBALS['%s']->pop();
	}
	public function measure($style, $containingBlockData) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.boxComputers.BoxStylesComputer::measure");
		$製pos = $GLOBALS['%s']->length;
		$this->measureHorizontalPaddings($style, $containingBlockData);
		$this->measureVerticalPaddings($style, $containingBlockData);
		$this->measureDimensionsConstraints($style, $containingBlockData);
		$this->measureDimensionsAndMargins($style, $containingBlockData);
		$this->measurePositionOffsets($style, $containingBlockData);
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'cocktail.core.layout.computer.boxComputers.BoxStylesComputer'; }
}
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_0(&$裨his, &$style, &$usedHeight, &$usedValues) {
	$製pos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("max-height", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_BoxStylesComputer_30($裨his, $style, $transition, $usedHeight, $usedValues)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_1(&$裨his, &$style, &$usedValues, &$usedWidth) {
	$製pos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("max-width", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_BoxStylesComputer_31($裨his, $style, $transition, $usedValues, $usedWidth)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_2(&$裨his, &$computedHeight, &$containingBlockData, &$style) {
	$製pos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("margin-bottom", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_BoxStylesComputer_32($裨his, $computedHeight, $containingBlockData, $style, $transition)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_3(&$裨his, &$computedHeight, &$containingBlockData, &$style) {
	$製pos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("margin-top", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_BoxStylesComputer_33($裨his, $computedHeight, $containingBlockData, $style, $transition)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_4(&$裨his, &$computedHeight, &$containingBlockData, &$style) {
	$製pos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("height", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_BoxStylesComputer_34($裨his, $computedHeight, $containingBlockData, $style, $transition)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_5(&$裨his, &$computedHeight, &$containingBlockData, &$style) {
	$製pos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("margin-top", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_BoxStylesComputer_35($裨his, $computedHeight, $containingBlockData, $style, $transition)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_6(&$裨his, &$computedHeight, &$containingBlockData, &$style) {
	$製pos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("margin-bottom", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_BoxStylesComputer_36($裨his, $computedHeight, $containingBlockData, $style, $transition)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_7(&$裨his, &$computedHeight, &$containingBlockData, &$style) {
	$製pos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("height", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_BoxStylesComputer_37($裨his, $computedHeight, $containingBlockData, $style, $transition)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_8(&$裨his, &$computedWidth, &$containingBlockData, &$style) {
	$製pos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("margin-right", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_BoxStylesComputer_38($裨his, $computedWidth, $containingBlockData, $style, $transition)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_9(&$裨his, &$computedWidth, &$containingBlockData, &$style) {
	$製pos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("margin-left", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_BoxStylesComputer_39($裨his, $computedWidth, $containingBlockData, $style, $transition)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_10(&$裨his, &$computedWidth, &$containingBlockData, &$style) {
	$製pos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("width", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_BoxStylesComputer_40($裨his, $computedWidth, $containingBlockData, $style, $transition)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_11(&$裨his, &$computedWidth, &$containingBlockData, &$style) {
	$製pos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("margin-left", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_BoxStylesComputer_41($裨his, $computedWidth, $containingBlockData, $style, $transition)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_12(&$裨his, &$computedWidth, &$containingBlockData, &$style) {
	$製pos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("margin-right", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_BoxStylesComputer_42($裨his, $computedWidth, $containingBlockData, $style, $transition)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_13(&$裨his, &$computedWidth, &$containingBlockData, &$style) {
	$製pos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("width", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_BoxStylesComputer_43($裨his, $computedWidth, $containingBlockData, $style, $transition)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_14(&$裨his, &$containingBlockData, &$style) {
	$製pos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("height", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_BoxStylesComputer_44($裨his, $containingBlockData, $style, $transition)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_15(&$裨his, &$containingBlockData, &$style) {
	$製pos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("width", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_BoxStylesComputer_45($裨his, $containingBlockData, $style, $transition)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_16(&$裨his, &$containingBlockData, &$style) {
	$製pos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("height", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_BoxStylesComputer_46($裨his, $containingBlockData, $style, $transition)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_17(&$裨his, &$containingBlockData, &$style) {
	$製pos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("width", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_BoxStylesComputer_47($裨his, $containingBlockData, $style, $transition)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_18(&$裨his, &$containingBlockData, &$style) {
	$製pos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("padding-left", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_BoxStylesComputer_48($裨his, $containingBlockData, $style, $transition)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_19(&$裨his, &$containingBlockData, &$style) {
	$製pos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("padding-right", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_BoxStylesComputer_49($裨his, $containingBlockData, $style, $transition)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_20(&$裨his, &$containingBlockData, &$style) {
	$製pos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("padding-top", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_BoxStylesComputer_50($裨his, $containingBlockData, $style, $transition)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_21(&$裨his, &$containingBlockData, &$style) {
	$製pos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("padding-bottom", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_BoxStylesComputer_51($裨his, $containingBlockData, $style, $transition)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_22(&$裨his, &$containingBlockData, &$style) {
	$製pos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("left", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_BoxStylesComputer_52($裨his, $containingBlockData, $style, $transition)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_23(&$裨his, &$containingBlockData, &$style) {
	$製pos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("right", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_BoxStylesComputer_53($裨his, $containingBlockData, $style, $transition)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_24(&$裨his, &$containingBlockData, &$style) {
	$製pos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("top", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_BoxStylesComputer_54($裨his, $containingBlockData, $style, $transition)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_25(&$裨his, &$containingBlockData, &$style) {
	$製pos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("bottom", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_BoxStylesComputer_55($裨his, $containingBlockData, $style, $transition)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_26(&$裨his, &$containingBlockData, &$style) {
	$製pos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("max-height", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_BoxStylesComputer_56($裨his, $containingBlockData, $style, $transition)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_27(&$裨his, &$containingBlockData, &$style) {
	$製pos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("min-height", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_BoxStylesComputer_57($裨his, $containingBlockData, $style, $transition)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_28(&$裨his, &$containingBlockData, &$style) {
	$製pos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("max-width", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_BoxStylesComputer_58($裨his, $containingBlockData, $style, $transition)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_29(&$裨his, &$containingBlockData, &$style) {
	$製pos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("min-width", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_BoxStylesComputer_59($裨his, $containingBlockData, $style, $transition)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_30(&$裨his, &$style, &$transition, &$usedHeight, &$usedValues) {
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
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_31(&$裨his, &$style, &$transition, &$usedValues, &$usedWidth) {
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
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_32(&$裨his, &$computedHeight, &$containingBlockData, &$style, &$transition) {
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
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_33(&$裨his, &$computedHeight, &$containingBlockData, &$style, &$transition) {
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
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_34(&$裨his, &$computedHeight, &$containingBlockData, &$style, &$transition) {
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
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_35(&$裨his, &$computedHeight, &$containingBlockData, &$style, &$transition) {
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
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_36(&$裨his, &$computedHeight, &$containingBlockData, &$style, &$transition) {
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
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_37(&$裨his, &$computedHeight, &$containingBlockData, &$style, &$transition) {
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
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_38(&$裨his, &$computedWidth, &$containingBlockData, &$style, &$transition) {
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
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_39(&$裨his, &$computedWidth, &$containingBlockData, &$style, &$transition) {
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
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_40(&$裨his, &$computedWidth, &$containingBlockData, &$style, &$transition) {
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
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_41(&$裨his, &$computedWidth, &$containingBlockData, &$style, &$transition) {
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
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_42(&$裨his, &$computedWidth, &$containingBlockData, &$style, &$transition) {
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
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_43(&$裨his, &$computedWidth, &$containingBlockData, &$style, &$transition) {
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
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_44(&$裨his, &$containingBlockData, &$style, &$transition) {
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
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_45(&$裨his, &$containingBlockData, &$style, &$transition) {
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
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_46(&$裨his, &$containingBlockData, &$style, &$transition) {
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
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_47(&$裨his, &$containingBlockData, &$style, &$transition) {
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
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_48(&$裨his, &$containingBlockData, &$style, &$transition) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this = $style->computedValues;
		$typedProperty = null;
		$length = $_this->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($_this->_properties, $i)->name === "padding-left") {
					$typedProperty = $_this->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_49(&$裨his, &$containingBlockData, &$style, &$transition) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this = $style->computedValues;
		$typedProperty = null;
		$length = $_this->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($_this->_properties, $i)->name === "padding-right") {
					$typedProperty = $_this->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_50(&$裨his, &$containingBlockData, &$style, &$transition) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this = $style->computedValues;
		$typedProperty = null;
		$length = $_this->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($_this->_properties, $i)->name === "padding-top") {
					$typedProperty = $_this->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_51(&$裨his, &$containingBlockData, &$style, &$transition) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this = $style->computedValues;
		$typedProperty = null;
		$length = $_this->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($_this->_properties, $i)->name === "padding-bottom") {
					$typedProperty = $_this->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_52(&$裨his, &$containingBlockData, &$style, &$transition) {
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
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_53(&$裨his, &$containingBlockData, &$style, &$transition) {
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
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_54(&$裨his, &$containingBlockData, &$style, &$transition) {
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
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_55(&$裨his, &$containingBlockData, &$style, &$transition) {
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
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_56(&$裨his, &$containingBlockData, &$style, &$transition) {
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
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_57(&$裨his, &$containingBlockData, &$style, &$transition) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this = $style->computedValues;
		$typedProperty = null;
		$length = $_this->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($_this->_properties, $i)->name === "min-height") {
					$typedProperty = $_this->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_58(&$裨his, &$containingBlockData, &$style, &$transition) {
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
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_59(&$裨his, &$containingBlockData, &$style, &$transition) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this = $style->computedValues;
		$typedProperty = null;
		$length = $_this->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($_this->_properties, $i)->name === "min-width") {
					$typedProperty = $_this->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}

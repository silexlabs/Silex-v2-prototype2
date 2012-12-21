<?php

class cocktail_core_layout_computer_boxComputers_BoxStylesComputer {
	public function __construct() { if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.boxComputers.BoxStylesComputer::new");
		$�spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}}
	public function constrainHeight($style, $usedHeight) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.boxComputers.BoxStylesComputer::constrainHeight");
		$�spos = $GLOBALS['%s']->length;
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
		$�spos = $GLOBALS['%s']->length;
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
		$�spos = $GLOBALS['%s']->length;
		$computedPaddingValue = null;
		$�t = ($paddingStyleValue);
		switch($�t->index) {
		case 17:
		$value = $�t->params[0];
		{
			$computedPaddingValue = $value;
		}break;
		case 2:
		$value = $�t->params[0];
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
		$�spos = $GLOBALS['%s']->length;
		$computedDimensions = null;
		$�t = ($dimensionStyleValue);
		switch($�t->index) {
		case 17:
		$value = $�t->params[0];
		{
			$computedDimensions = $value;
		}break;
		case 2:
		$value = $�t->params[0];
		{
			$computedDimensions = cocktail_core_css_CSSValueConverter::getPixelFromPercent($value, $containingHTMLElementDimension);
		}break;
		case 4:
		$value = $�t->params[0];
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
		$�spos = $GLOBALS['%s']->length;
		$computedPositionOffset = 0.0;
		$�t = ($positionOffsetStyleValue);
		switch($�t->index) {
		case 17:
		$value = $�t->params[0];
		{
			$computedPositionOffset = $value;
		}break;
		case 2:
		$value = $�t->params[0];
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
		$�spos = $GLOBALS['%s']->length;
		if($isMinConstraint === null) {
			$isMinConstraint = false;
		}
		$computedConstraintDimension = null;
		$�t = ($constrainedDimension);
		switch($�t->index) {
		case 17:
		$value = $�t->params[0];
		{
			$computedConstraintDimension = $value;
		}break;
		case 2:
		$value = $�t->params[0];
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
		$value = $�t->params[0];
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
		$�spos = $GLOBALS['%s']->length;
		$computedMargin = null;
		if($isHorizontalMargin === false || $isDimensionAuto === true) {
			$computedMargin = 0.0;
		} else {
			$�t = ($opositeMargin);
			switch($�t->index) {
			case 4:
			$value = $�t->params[0];
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
		$�spos = $GLOBALS['%s']->length;
		$usedMargin = null;
		$�t = ($marginStyleValue);
		switch($�t->index) {
		case 17:
		$value = $�t->params[0];
		{
			$usedMargin = $value;
		}break;
		case 2:
		$value = $�t->params[0];
		{
			if($isDimensionAuto === true) {
				$usedMargin = 0.0;
			} else {
				$usedMargin = cocktail_core_css_CSSValueConverter::getPixelFromPercent($value, $containingHTMLElementDimension);
			}
		}break;
		case 4:
		$value = $�t->params[0];
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
		$�spos = $GLOBALS['%s']->length;
		{
			$�tmp = $this->getComputedMargin(cocktail_core_layout_computer_boxComputers_BoxStylesComputer_2($this, $computedHeight, $containingBlockData, $style), cocktail_core_layout_computer_boxComputers_BoxStylesComputer_3($this, $computedHeight, $containingBlockData, $style), $containingBlockData->height, $computedHeight, $style->isAuto(cocktail_core_layout_computer_boxComputers_BoxStylesComputer_4($this, $computedHeight, $containingBlockData, $style)), $style->usedValues->paddingTop + $style->usedValues->paddingBottom, false);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getComputedMarginTop($style, $computedHeight, $containingBlockData) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.boxComputers.BoxStylesComputer::getComputedMarginTop");
		$�spos = $GLOBALS['%s']->length;
		{
			$�tmp = $this->getComputedMargin(cocktail_core_layout_computer_boxComputers_BoxStylesComputer_5($this, $computedHeight, $containingBlockData, $style), cocktail_core_layout_computer_boxComputers_BoxStylesComputer_6($this, $computedHeight, $containingBlockData, $style), $containingBlockData->height, $computedHeight, $style->isAuto(cocktail_core_layout_computer_boxComputers_BoxStylesComputer_7($this, $computedHeight, $containingBlockData, $style)), $style->usedValues->paddingTop + $style->usedValues->paddingBottom, false);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getComputedMarginRight($style, $computedWidth, $containingBlockData) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.boxComputers.BoxStylesComputer::getComputedMarginRight");
		$�spos = $GLOBALS['%s']->length;
		{
			$�tmp = $this->getComputedMargin(cocktail_core_layout_computer_boxComputers_BoxStylesComputer_8($this, $computedWidth, $containingBlockData, $style), cocktail_core_layout_computer_boxComputers_BoxStylesComputer_9($this, $computedWidth, $containingBlockData, $style), $containingBlockData->width, $computedWidth, $style->isAuto(cocktail_core_layout_computer_boxComputers_BoxStylesComputer_10($this, $computedWidth, $containingBlockData, $style)), $style->usedValues->paddingRight + $style->usedValues->paddingLeft, true);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getComputedMarginLeft($style, $computedWidth, $containingBlockData) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.boxComputers.BoxStylesComputer::getComputedMarginLeft");
		$�spos = $GLOBALS['%s']->length;
		{
			$�tmp = $this->getComputedMargin(cocktail_core_layout_computer_boxComputers_BoxStylesComputer_11($this, $computedWidth, $containingBlockData, $style), cocktail_core_layout_computer_boxComputers_BoxStylesComputer_12($this, $computedWidth, $containingBlockData, $style), $containingBlockData->width, $computedWidth, $style->isAuto(cocktail_core_layout_computer_boxComputers_BoxStylesComputer_13($this, $computedWidth, $containingBlockData, $style)), $style->usedValues->paddingRight + $style->usedValues->paddingLeft, true);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getComputedAutoHeight($style, $containingBlockData) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.boxComputers.BoxStylesComputer::getComputedAutoHeight");
		$�spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return 0;
		}
		$GLOBALS['%s']->pop();
	}
	public function getComputedHeight($style, $containingBlockData) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.boxComputers.BoxStylesComputer::getComputedHeight");
		$�spos = $GLOBALS['%s']->length;
		{
			$�tmp = $this->getComputedDimension(cocktail_core_layout_computer_boxComputers_BoxStylesComputer_14($this, $containingBlockData, $style), $containingBlockData->height, $containingBlockData->isHeightAuto);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getComputedAutoWidth($style, $containingBlockData) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.boxComputers.BoxStylesComputer::getComputedAutoWidth");
		$�spos = $GLOBALS['%s']->length;
		{
			$�tmp = $containingBlockData->width - $style->usedValues->paddingLeft - $style->usedValues->paddingRight - $style->usedValues->marginLeft - $style->usedValues->marginRight;
			$GLOBALS['%s']->pop();
			return $�tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getComputedWidth($style, $containingBlockData) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.boxComputers.BoxStylesComputer::getComputedWidth");
		$�spos = $GLOBALS['%s']->length;
		{
			$�tmp = $this->getComputedDimension(cocktail_core_layout_computer_boxComputers_BoxStylesComputer_15($this, $containingBlockData, $style), $containingBlockData->width, $containingBlockData->isWidthAuto);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function measureHeight($style, $containingBlockData) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.boxComputers.BoxStylesComputer::measureHeight");
		$�spos = $GLOBALS['%s']->length;
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
		$�spos = $GLOBALS['%s']->length;
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
		$�spos = $GLOBALS['%s']->length;
		if($style->isAuto(cocktail_core_layout_computer_boxComputers_BoxStylesComputer_16($this, $containingBlockData, $style)) === true) {
			$�tmp = $this->measureAutoHeight($style, $containingBlockData);
			$GLOBALS['%s']->pop();
			return $�tmp;
		} else {
			$�tmp = $this->measureHeight($style, $containingBlockData);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function measureWidth($style, $containingBlockData) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.boxComputers.BoxStylesComputer::measureWidth");
		$�spos = $GLOBALS['%s']->length;
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
		$�spos = $GLOBALS['%s']->length;
		$usedWidth = 0.0;
		$style->usedValues->marginLeft = $this->getComputedMarginLeft($style, $usedWidth, $containingBlockData);
		$style->usedValues->marginRight = $this->getComputedMarginRight($style, $usedWidth, $containingBlockData);
		{
			$�tmp = $this->getComputedAutoWidth($style, $containingBlockData);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function measureWidthAndHorizontalMargins($style, $containingBlockData) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.boxComputers.BoxStylesComputer::measureWidthAndHorizontalMargins");
		$�spos = $GLOBALS['%s']->length;
		if($style->isAuto(cocktail_core_layout_computer_boxComputers_BoxStylesComputer_17($this, $containingBlockData, $style)) === true) {
			$�tmp = $this->measureAutoWidth($style, $containingBlockData);
			$GLOBALS['%s']->pop();
			return $�tmp;
		} else {
			$�tmp = $this->measureWidth($style, $containingBlockData);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function measureHorizontalPaddings($style, $containingBlockData) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.boxComputers.BoxStylesComputer::measureHorizontalPaddings");
		$�spos = $GLOBALS['%s']->length;
		$style->usedValues->paddingLeft = $this->getComputedPadding(cocktail_core_layout_computer_boxComputers_BoxStylesComputer_18($this, $containingBlockData, $style), $containingBlockData->width);
		$style->usedValues->paddingRight = $this->getComputedPadding(cocktail_core_layout_computer_boxComputers_BoxStylesComputer_19($this, $containingBlockData, $style), $containingBlockData->width);
		$GLOBALS['%s']->pop();
	}
	public function measureVerticalPaddings($style, $containingBlockData) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.boxComputers.BoxStylesComputer::measureVerticalPaddings");
		$�spos = $GLOBALS['%s']->length;
		$style->usedValues->paddingTop = $this->getComputedPadding(cocktail_core_layout_computer_boxComputers_BoxStylesComputer_20($this, $containingBlockData, $style), $containingBlockData->width);
		$style->usedValues->paddingBottom = $this->getComputedPadding(cocktail_core_layout_computer_boxComputers_BoxStylesComputer_21($this, $containingBlockData, $style), $containingBlockData->width);
		$GLOBALS['%s']->pop();
	}
	public function measureDimensionsAndMargins($style, $containingBlockData) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.boxComputers.BoxStylesComputer::measureDimensionsAndMargins");
		$�spos = $GLOBALS['%s']->length;
		$style->usedValues->width = $this->constrainWidth($style, $this->measureWidthAndHorizontalMargins($style, $containingBlockData));
		$style->usedValues->height = $this->constrainHeight($style, $this->measureHeightAndVerticalMargins($style, $containingBlockData));
		$GLOBALS['%s']->pop();
	}
	public function measurePositionOffsets($style, $containingBlockData) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.boxComputers.BoxStylesComputer::measurePositionOffsets");
		$�spos = $GLOBALS['%s']->length;
		$style->usedValues->left = $this->getComputedPositionOffset(cocktail_core_layout_computer_boxComputers_BoxStylesComputer_22($this, $containingBlockData, $style), $containingBlockData->width);
		$style->usedValues->right = $this->getComputedPositionOffset(cocktail_core_layout_computer_boxComputers_BoxStylesComputer_23($this, $containingBlockData, $style), $containingBlockData->width);
		$style->usedValues->top = $this->getComputedPositionOffset(cocktail_core_layout_computer_boxComputers_BoxStylesComputer_24($this, $containingBlockData, $style), $containingBlockData->height);
		$style->usedValues->bottom = $this->getComputedPositionOffset(cocktail_core_layout_computer_boxComputers_BoxStylesComputer_25($this, $containingBlockData, $style), $containingBlockData->height);
		$GLOBALS['%s']->pop();
	}
	public function measureDimensionsConstraints($style, $containingBlockData) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.boxComputers.BoxStylesComputer::measureDimensionsConstraints");
		$�spos = $GLOBALS['%s']->length;
		$style->usedValues->maxHeight = $this->getComputedConstrainedDimension(cocktail_core_layout_computer_boxComputers_BoxStylesComputer_26($this, $containingBlockData, $style), $containingBlockData->height, $containingBlockData->isHeightAuto, null);
		$style->usedValues->minHeight = $this->getComputedConstrainedDimension(cocktail_core_layout_computer_boxComputers_BoxStylesComputer_27($this, $containingBlockData, $style), $containingBlockData->height, $containingBlockData->isHeightAuto, true);
		$style->usedValues->maxWidth = $this->getComputedConstrainedDimension(cocktail_core_layout_computer_boxComputers_BoxStylesComputer_28($this, $containingBlockData, $style), $containingBlockData->width, $containingBlockData->isWidthAuto, null);
		$style->usedValues->minWidth = $this->getComputedConstrainedDimension(cocktail_core_layout_computer_boxComputers_BoxStylesComputer_29($this, $containingBlockData, $style), $containingBlockData->width, $containingBlockData->isWidthAuto, true);
		$GLOBALS['%s']->pop();
	}
	public function measure($style, $containingBlockData) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.boxComputers.BoxStylesComputer::measure");
		$�spos = $GLOBALS['%s']->length;
		$this->measureHorizontalPaddings($style, $containingBlockData);
		$this->measureVerticalPaddings($style, $containingBlockData);
		$this->measureDimensionsConstraints($style, $containingBlockData);
		$this->measureDimensionsAndMargins($style, $containingBlockData);
		$this->measurePositionOffsets($style, $containingBlockData);
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'cocktail.core.layout.computer.boxComputers.BoxStylesComputer'; }
}
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_0(&$�this, &$style, &$usedHeight, &$usedValues) {
	$�spos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("max-height", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_BoxStylesComputer_30($�this, $style, $transition, $usedHeight, $usedValues)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_1(&$�this, &$style, &$usedValues, &$usedWidth) {
	$�spos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("max-width", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_BoxStylesComputer_31($�this, $style, $transition, $usedValues, $usedWidth)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_2(&$�this, &$computedHeight, &$containingBlockData, &$style) {
	$�spos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("margin-bottom", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_BoxStylesComputer_32($�this, $computedHeight, $containingBlockData, $style, $transition)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_3(&$�this, &$computedHeight, &$containingBlockData, &$style) {
	$�spos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("margin-top", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_BoxStylesComputer_33($�this, $computedHeight, $containingBlockData, $style, $transition)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_4(&$�this, &$computedHeight, &$containingBlockData, &$style) {
	$�spos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("height", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_BoxStylesComputer_34($�this, $computedHeight, $containingBlockData, $style, $transition)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_5(&$�this, &$computedHeight, &$containingBlockData, &$style) {
	$�spos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("margin-top", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_BoxStylesComputer_35($�this, $computedHeight, $containingBlockData, $style, $transition)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_6(&$�this, &$computedHeight, &$containingBlockData, &$style) {
	$�spos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("margin-bottom", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_BoxStylesComputer_36($�this, $computedHeight, $containingBlockData, $style, $transition)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_7(&$�this, &$computedHeight, &$containingBlockData, &$style) {
	$�spos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("height", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_BoxStylesComputer_37($�this, $computedHeight, $containingBlockData, $style, $transition)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_8(&$�this, &$computedWidth, &$containingBlockData, &$style) {
	$�spos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("margin-right", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_BoxStylesComputer_38($�this, $computedWidth, $containingBlockData, $style, $transition)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_9(&$�this, &$computedWidth, &$containingBlockData, &$style) {
	$�spos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("margin-left", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_BoxStylesComputer_39($�this, $computedWidth, $containingBlockData, $style, $transition)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_10(&$�this, &$computedWidth, &$containingBlockData, &$style) {
	$�spos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("width", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_BoxStylesComputer_40($�this, $computedWidth, $containingBlockData, $style, $transition)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_11(&$�this, &$computedWidth, &$containingBlockData, &$style) {
	$�spos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("margin-left", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_BoxStylesComputer_41($�this, $computedWidth, $containingBlockData, $style, $transition)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_12(&$�this, &$computedWidth, &$containingBlockData, &$style) {
	$�spos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("margin-right", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_BoxStylesComputer_42($�this, $computedWidth, $containingBlockData, $style, $transition)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_13(&$�this, &$computedWidth, &$containingBlockData, &$style) {
	$�spos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("width", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_BoxStylesComputer_43($�this, $computedWidth, $containingBlockData, $style, $transition)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_14(&$�this, &$containingBlockData, &$style) {
	$�spos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("height", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_BoxStylesComputer_44($�this, $containingBlockData, $style, $transition)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_15(&$�this, &$containingBlockData, &$style) {
	$�spos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("width", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_BoxStylesComputer_45($�this, $containingBlockData, $style, $transition)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_16(&$�this, &$containingBlockData, &$style) {
	$�spos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("height", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_BoxStylesComputer_46($�this, $containingBlockData, $style, $transition)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_17(&$�this, &$containingBlockData, &$style) {
	$�spos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("width", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_BoxStylesComputer_47($�this, $containingBlockData, $style, $transition)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_18(&$�this, &$containingBlockData, &$style) {
	$�spos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("padding-left", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_BoxStylesComputer_48($�this, $containingBlockData, $style, $transition)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_19(&$�this, &$containingBlockData, &$style) {
	$�spos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("padding-right", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_BoxStylesComputer_49($�this, $containingBlockData, $style, $transition)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_20(&$�this, &$containingBlockData, &$style) {
	$�spos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("padding-top", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_BoxStylesComputer_50($�this, $containingBlockData, $style, $transition)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_21(&$�this, &$containingBlockData, &$style) {
	$�spos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("padding-bottom", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_BoxStylesComputer_51($�this, $containingBlockData, $style, $transition)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_22(&$�this, &$containingBlockData, &$style) {
	$�spos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("left", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_BoxStylesComputer_52($�this, $containingBlockData, $style, $transition)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_23(&$�this, &$containingBlockData, &$style) {
	$�spos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("right", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_BoxStylesComputer_53($�this, $containingBlockData, $style, $transition)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_24(&$�this, &$containingBlockData, &$style) {
	$�spos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("top", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_BoxStylesComputer_54($�this, $containingBlockData, $style, $transition)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_25(&$�this, &$containingBlockData, &$style) {
	$�spos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("bottom", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_BoxStylesComputer_55($�this, $containingBlockData, $style, $transition)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_26(&$�this, &$containingBlockData, &$style) {
	$�spos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("max-height", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_BoxStylesComputer_56($�this, $containingBlockData, $style, $transition)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_27(&$�this, &$containingBlockData, &$style) {
	$�spos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("min-height", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_BoxStylesComputer_57($�this, $containingBlockData, $style, $transition)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_28(&$�this, &$containingBlockData, &$style) {
	$�spos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("max-width", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_BoxStylesComputer_58($�this, $containingBlockData, $style, $transition)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_29(&$�this, &$containingBlockData, &$style) {
	$�spos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("min-width", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_computer_boxComputers_BoxStylesComputer_59($�this, $containingBlockData, $style, $transition)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_30(&$�this, &$style, &$transition, &$usedHeight, &$usedValues) {
	$�spos = $GLOBALS['%s']->length;
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
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_31(&$�this, &$style, &$transition, &$usedValues, &$usedWidth) {
	$�spos = $GLOBALS['%s']->length;
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
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_32(&$�this, &$computedHeight, &$containingBlockData, &$style, &$transition) {
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
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_33(&$�this, &$computedHeight, &$containingBlockData, &$style, &$transition) {
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
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_34(&$�this, &$computedHeight, &$containingBlockData, &$style, &$transition) {
	$�spos = $GLOBALS['%s']->length;
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
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_35(&$�this, &$computedHeight, &$containingBlockData, &$style, &$transition) {
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
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_36(&$�this, &$computedHeight, &$containingBlockData, &$style, &$transition) {
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
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_37(&$�this, &$computedHeight, &$containingBlockData, &$style, &$transition) {
	$�spos = $GLOBALS['%s']->length;
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
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_38(&$�this, &$computedWidth, &$containingBlockData, &$style, &$transition) {
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
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_39(&$�this, &$computedWidth, &$containingBlockData, &$style, &$transition) {
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
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_40(&$�this, &$computedWidth, &$containingBlockData, &$style, &$transition) {
	$�spos = $GLOBALS['%s']->length;
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
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_41(&$�this, &$computedWidth, &$containingBlockData, &$style, &$transition) {
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
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_42(&$�this, &$computedWidth, &$containingBlockData, &$style, &$transition) {
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
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_43(&$�this, &$computedWidth, &$containingBlockData, &$style, &$transition) {
	$�spos = $GLOBALS['%s']->length;
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
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_44(&$�this, &$containingBlockData, &$style, &$transition) {
	$�spos = $GLOBALS['%s']->length;
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
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_45(&$�this, &$containingBlockData, &$style, &$transition) {
	$�spos = $GLOBALS['%s']->length;
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
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_46(&$�this, &$containingBlockData, &$style, &$transition) {
	$�spos = $GLOBALS['%s']->length;
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
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_47(&$�this, &$containingBlockData, &$style, &$transition) {
	$�spos = $GLOBALS['%s']->length;
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
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_48(&$�this, &$containingBlockData, &$style, &$transition) {
	$�spos = $GLOBALS['%s']->length;
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
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_49(&$�this, &$containingBlockData, &$style, &$transition) {
	$�spos = $GLOBALS['%s']->length;
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
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_50(&$�this, &$containingBlockData, &$style, &$transition) {
	$�spos = $GLOBALS['%s']->length;
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
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_51(&$�this, &$containingBlockData, &$style, &$transition) {
	$�spos = $GLOBALS['%s']->length;
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
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_52(&$�this, &$containingBlockData, &$style, &$transition) {
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
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_53(&$�this, &$containingBlockData, &$style, &$transition) {
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
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_54(&$�this, &$containingBlockData, &$style, &$transition) {
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
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_55(&$�this, &$containingBlockData, &$style, &$transition) {
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
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_56(&$�this, &$containingBlockData, &$style, &$transition) {
	$�spos = $GLOBALS['%s']->length;
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
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_57(&$�this, &$containingBlockData, &$style, &$transition) {
	$�spos = $GLOBALS['%s']->length;
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
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_58(&$�this, &$containingBlockData, &$style, &$transition) {
	$�spos = $GLOBALS['%s']->length;
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
function cocktail_core_layout_computer_boxComputers_BoxStylesComputer_59(&$�this, &$containingBlockData, &$style, &$transition) {
	$�spos = $GLOBALS['%s']->length;
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

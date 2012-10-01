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
		if($style->isNone($style->get_maxHeight()) === false) {
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
		if($style->isNone($style->get_maxWidth()) === false) {
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
			$�tmp = $this->getComputedMargin($style->get_marginTop(), $style->get_marginTop(), $containingBlockData->height, $computedHeight, $style->isAuto($style->get_height()), $style->usedValues->paddingTop + $style->usedValues->paddingBottom, false);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getComputedMarginTop($style, $computedHeight, $containingBlockData) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.boxComputers.BoxStylesComputer::getComputedMarginTop");
		$�spos = $GLOBALS['%s']->length;
		{
			$�tmp = $this->getComputedMargin($style->get_marginTop(), $style->get_marginTop(), $containingBlockData->height, $computedHeight, $style->isAuto($style->get_height()), $style->usedValues->paddingTop + $style->usedValues->paddingBottom, false);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getComputedMarginRight($style, $computedWidth, $containingBlockData) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.boxComputers.BoxStylesComputer::getComputedMarginRight");
		$�spos = $GLOBALS['%s']->length;
		{
			$�tmp = $this->getComputedMargin($style->get_marginRight(), $style->get_marginLeft(), $containingBlockData->width, $computedWidth, $style->isAuto($style->get_width()), $style->usedValues->paddingRight + $style->usedValues->paddingLeft, true);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getComputedMarginLeft($style, $computedWidth, $containingBlockData) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.boxComputers.BoxStylesComputer::getComputedMarginLeft");
		$�spos = $GLOBALS['%s']->length;
		{
			$�tmp = $this->getComputedMargin($style->get_marginLeft(), $style->get_marginRight(), $containingBlockData->width, $computedWidth, $style->isAuto($style->get_width()), $style->usedValues->paddingRight + $style->usedValues->paddingLeft, true);
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
			$�tmp = $this->getComputedDimension($style->get_height(), $containingBlockData->height, $containingBlockData->isHeightAuto);
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
			$�tmp = $this->getComputedDimension($style->get_width(), $containingBlockData->width, $containingBlockData->isWidthAuto);
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
		if($style->isAuto($style->get_height()) === true) {
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
		if($style->isAuto($style->get_width()) === true) {
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
		$style->usedValues->paddingLeft = $this->getComputedPadding($style->get_paddingLeft(), $containingBlockData->width);
		$style->usedValues->paddingRight = $this->getComputedPadding($style->get_paddingRight(), $containingBlockData->width);
		$GLOBALS['%s']->pop();
	}
	public function measureVerticalPaddings($style, $containingBlockData) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.boxComputers.BoxStylesComputer::measureVerticalPaddings");
		$�spos = $GLOBALS['%s']->length;
		$style->usedValues->paddingTop = $this->getComputedPadding($style->get_paddingTop(), $containingBlockData->width);
		$style->usedValues->paddingBottom = $this->getComputedPadding($style->get_paddingBottom(), $containingBlockData->width);
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
		$style->usedValues->left = $this->getComputedPositionOffset($style->get_left(), $containingBlockData->width);
		$style->usedValues->right = $this->getComputedPositionOffset($style->get_right(), $containingBlockData->width);
		$style->usedValues->top = $this->getComputedPositionOffset($style->get_top(), $containingBlockData->height);
		$style->usedValues->bottom = $this->getComputedPositionOffset($style->get_bottom(), $containingBlockData->height);
		$GLOBALS['%s']->pop();
	}
	public function measureDimensionsConstraints($style, $containingBlockData) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.boxComputers.BoxStylesComputer::measureDimensionsConstraints");
		$�spos = $GLOBALS['%s']->length;
		$style->usedValues->maxHeight = $this->getComputedConstrainedDimension($style->get_maxHeight(), $containingBlockData->height, $containingBlockData->isHeightAuto, null);
		$style->usedValues->minHeight = $this->getComputedConstrainedDimension($style->get_minHeight(), $containingBlockData->height, $containingBlockData->isHeightAuto, true);
		$style->usedValues->maxWidth = $this->getComputedConstrainedDimension($style->get_maxWidth(), $containingBlockData->width, $containingBlockData->isWidthAuto, null);
		$style->usedValues->minWidth = $this->getComputedConstrainedDimension($style->get_minWidth(), $containingBlockData->width, $containingBlockData->isWidthAuto, true);
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

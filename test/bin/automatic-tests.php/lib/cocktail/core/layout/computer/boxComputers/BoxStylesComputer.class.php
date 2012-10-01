<?php

class cocktail_core_layout_computer_boxComputers_BoxStylesComputer {
	public function __construct() { 
	}
	public function constrainHeight($style, $usedHeight) {
		$usedValues = $style->usedValues;
		if($style->isNone($style->get_maxHeight()) === false) {
			if($usedHeight > $usedValues->maxHeight) {
				$usedHeight = $usedValues->maxHeight;
			}
		}
		if($usedHeight < $usedValues->minHeight) {
			$usedHeight = $usedValues->minHeight;
		}
		return $usedHeight;
	}
	public function constrainWidth($style, $usedWidth) {
		$usedValues = $style->usedValues;
		if($style->isNone($style->get_maxWidth()) === false) {
			if($usedWidth > $usedValues->maxWidth) {
				$usedWidth = $usedValues->maxWidth;
			}
		}
		if($usedWidth < $usedValues->minWidth) {
			$usedWidth = $usedValues->minWidth;
		}
		return $usedWidth;
	}
	public function getComputedPadding($paddingStyleValue, $containingHTMLElementDimension) {
		$computedPaddingValue = null;
		$퍁 = ($paddingStyleValue);
		switch($퍁->index) {
		case 17:
		$value = $퍁->params[0];
		{
			$computedPaddingValue = $value;
		}break;
		case 2:
		$value = $퍁->params[0];
		{
			$computedPaddingValue = cocktail_core_css_CSSValueConverter::getPixelFromPercent($value, $containingHTMLElementDimension);
		}break;
		default:{
			throw new HException("Illegal value for padding");
		}break;
		}
		return $computedPaddingValue;
	}
	public function getComputedDimension($dimensionStyleValue, $containingHTMLElementDimension, $isContainingDimensionAuto) {
		$computedDimensions = null;
		$퍁 = ($dimensionStyleValue);
		switch($퍁->index) {
		case 17:
		$value = $퍁->params[0];
		{
			$computedDimensions = $value;
		}break;
		case 2:
		$value = $퍁->params[0];
		{
			$computedDimensions = cocktail_core_css_CSSValueConverter::getPixelFromPercent($value, $containingHTMLElementDimension);
		}break;
		case 4:
		$value = $퍁->params[0];
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
		return $computedDimensions;
	}
	public function getComputedPositionOffset($positionOffsetStyleValue, $containingHTMLElementDimension) {
		$computedPositionOffset = 0.0;
		$퍁 = ($positionOffsetStyleValue);
		switch($퍁->index) {
		case 17:
		$value = $퍁->params[0];
		{
			$computedPositionOffset = $value;
		}break;
		case 2:
		$value = $퍁->params[0];
		{
			$computedPositionOffset = cocktail_core_css_CSSValueConverter::getPixelFromPercent($value, $containingHTMLElementDimension);
		}break;
		default:{
		}break;
		}
		return $computedPositionOffset;
	}
	public function getComputedConstrainedDimension($constrainedDimension, $containingHTMLElementDimension, $isContainingDimensionAuto, $isMinConstraint = null) {
		if($isMinConstraint === null) {
			$isMinConstraint = false;
		}
		$computedConstraintDimension = null;
		$퍁 = ($constrainedDimension);
		switch($퍁->index) {
		case 17:
		$value = $퍁->params[0];
		{
			$computedConstraintDimension = $value;
		}break;
		case 2:
		$value = $퍁->params[0];
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
		$value = $퍁->params[0];
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
		return $computedConstraintDimension;
	}
	public function getComputedAutoMargin($marginStyleValue, $opositeMargin, $containingHTMLElementDimension, $computedDimension, $isDimensionAuto, $computedPaddingsDimension, $isHorizontalMargin) {
		$computedMargin = null;
		if($isHorizontalMargin === false || $isDimensionAuto === true) {
			$computedMargin = 0.0;
		} else {
			$퍁 = ($opositeMargin);
			switch($퍁->index) {
			case 4:
			$value = $퍁->params[0];
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
		return $computedMargin;
	}
	public function getComputedMargin($marginStyleValue, $opositeMargin, $containingHTMLElementDimension, $computedDimension, $isDimensionAuto, $computedPaddingsDimension, $isHorizontalMargin) {
		$usedMargin = null;
		$퍁 = ($marginStyleValue);
		switch($퍁->index) {
		case 17:
		$value = $퍁->params[0];
		{
			$usedMargin = $value;
		}break;
		case 2:
		$value = $퍁->params[0];
		{
			if($isDimensionAuto === true) {
				$usedMargin = 0.0;
			} else {
				$usedMargin = cocktail_core_css_CSSValueConverter::getPixelFromPercent($value, $containingHTMLElementDimension);
			}
		}break;
		case 4:
		$value = $퍁->params[0];
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
		return $usedMargin;
	}
	public function getComputedMarginBottom($style, $computedHeight, $containingBlockData) {
		return $this->getComputedMargin($style->get_marginTop(), $style->get_marginTop(), $containingBlockData->height, $computedHeight, $style->isAuto($style->get_height()), $style->usedValues->paddingTop + $style->usedValues->paddingBottom, false);
	}
	public function getComputedMarginTop($style, $computedHeight, $containingBlockData) {
		return $this->getComputedMargin($style->get_marginTop(), $style->get_marginTop(), $containingBlockData->height, $computedHeight, $style->isAuto($style->get_height()), $style->usedValues->paddingTop + $style->usedValues->paddingBottom, false);
	}
	public function getComputedMarginRight($style, $computedWidth, $containingBlockData) {
		return $this->getComputedMargin($style->get_marginRight(), $style->get_marginLeft(), $containingBlockData->width, $computedWidth, $style->isAuto($style->get_width()), $style->usedValues->paddingRight + $style->usedValues->paddingLeft, true);
	}
	public function getComputedMarginLeft($style, $computedWidth, $containingBlockData) {
		return $this->getComputedMargin($style->get_marginLeft(), $style->get_marginRight(), $containingBlockData->width, $computedWidth, $style->isAuto($style->get_width()), $style->usedValues->paddingRight + $style->usedValues->paddingLeft, true);
	}
	public function getComputedAutoHeight($style, $containingBlockData) {
		return 0;
	}
	public function getComputedHeight($style, $containingBlockData) {
		return $this->getComputedDimension($style->get_height(), $containingBlockData->height, $containingBlockData->isHeightAuto);
	}
	public function getComputedAutoWidth($style, $containingBlockData) {
		return $containingBlockData->width - $style->usedValues->paddingLeft - $style->usedValues->paddingRight - $style->usedValues->marginLeft - $style->usedValues->marginRight;
	}
	public function getComputedWidth($style, $containingBlockData) {
		return $this->getComputedDimension($style->get_width(), $containingBlockData->width, $containingBlockData->isWidthAuto);
	}
	public function measureHeight($style, $containingBlockData) {
		$computedHeight = $this->constrainHeight($style, $this->getComputedHeight($style, $containingBlockData));
		$style->usedValues->marginTop = $this->getComputedMarginTop($style, $computedHeight, $containingBlockData);
		$style->usedValues->marginBottom = $this->getComputedMarginBottom($style, $computedHeight, $containingBlockData);
		return $computedHeight;
	}
	public function measureAutoHeight($style, $containingBlockData) {
		$computedHeight = $this->getComputedAutoHeight($style, $containingBlockData);
		$style->usedValues->marginTop = $this->getComputedMarginTop($style, $computedHeight, $containingBlockData);
		$style->usedValues->marginBottom = $this->getComputedMarginBottom($style, $computedHeight, $containingBlockData);
		return $computedHeight;
	}
	public function measureHeightAndVerticalMargins($style, $containingBlockData) {
		if($style->isAuto($style->get_height()) === true) {
			return $this->measureAutoHeight($style, $containingBlockData);
		} else {
			return $this->measureHeight($style, $containingBlockData);
		}
	}
	public function measureWidth($style, $containingBlockData) {
		$computedWidth = $this->constrainWidth($style, $this->getComputedWidth($style, $containingBlockData));
		$style->usedValues->marginLeft = $this->getComputedMarginLeft($style, $computedWidth, $containingBlockData);
		$style->usedValues->marginRight = $this->getComputedMarginRight($style, $computedWidth, $containingBlockData);
		return $computedWidth;
	}
	public function measureAutoWidth($style, $containingBlockData) {
		$usedWidth = 0.0;
		$style->usedValues->marginLeft = $this->getComputedMarginLeft($style, $usedWidth, $containingBlockData);
		$style->usedValues->marginRight = $this->getComputedMarginRight($style, $usedWidth, $containingBlockData);
		return $this->getComputedAutoWidth($style, $containingBlockData);
	}
	public function measureWidthAndHorizontalMargins($style, $containingBlockData) {
		if($style->isAuto($style->get_width()) === true) {
			return $this->measureAutoWidth($style, $containingBlockData);
		} else {
			return $this->measureWidth($style, $containingBlockData);
		}
	}
	public function measureHorizontalPaddings($style, $containingBlockData) {
		$style->usedValues->paddingLeft = $this->getComputedPadding($style->get_paddingLeft(), $containingBlockData->width);
		$style->usedValues->paddingRight = $this->getComputedPadding($style->get_paddingRight(), $containingBlockData->width);
	}
	public function measureVerticalPaddings($style, $containingBlockData) {
		$style->usedValues->paddingTop = $this->getComputedPadding($style->get_paddingTop(), $containingBlockData->width);
		$style->usedValues->paddingBottom = $this->getComputedPadding($style->get_paddingBottom(), $containingBlockData->width);
	}
	public function measureDimensionsAndMargins($style, $containingBlockData) {
		$style->usedValues->width = $this->constrainWidth($style, $this->measureWidthAndHorizontalMargins($style, $containingBlockData));
		$style->usedValues->height = $this->constrainHeight($style, $this->measureHeightAndVerticalMargins($style, $containingBlockData));
	}
	public function measurePositionOffsets($style, $containingBlockData) {
		$style->usedValues->left = $this->getComputedPositionOffset($style->get_left(), $containingBlockData->width);
		$style->usedValues->right = $this->getComputedPositionOffset($style->get_right(), $containingBlockData->width);
		$style->usedValues->top = $this->getComputedPositionOffset($style->get_top(), $containingBlockData->height);
		$style->usedValues->bottom = $this->getComputedPositionOffset($style->get_bottom(), $containingBlockData->height);
	}
	public function measureDimensionsConstraints($style, $containingBlockData) {
		$style->usedValues->maxHeight = $this->getComputedConstrainedDimension($style->get_maxHeight(), $containingBlockData->height, $containingBlockData->isHeightAuto, null);
		$style->usedValues->minHeight = $this->getComputedConstrainedDimension($style->get_minHeight(), $containingBlockData->height, $containingBlockData->isHeightAuto, true);
		$style->usedValues->maxWidth = $this->getComputedConstrainedDimension($style->get_maxWidth(), $containingBlockData->width, $containingBlockData->isWidthAuto, null);
		$style->usedValues->minWidth = $this->getComputedConstrainedDimension($style->get_minWidth(), $containingBlockData->width, $containingBlockData->isWidthAuto, true);
	}
	public function measure($style, $containingBlockData) {
		$this->measureHorizontalPaddings($style, $containingBlockData);
		$this->measureVerticalPaddings($style, $containingBlockData);
		$this->measureDimensionsConstraints($style, $containingBlockData);
		$this->measureDimensionsAndMargins($style, $containingBlockData);
		$this->measurePositionOffsets($style, $containingBlockData);
	}
	function __toString() { return 'cocktail.core.layout.computer.boxComputers.BoxStylesComputer'; }
}

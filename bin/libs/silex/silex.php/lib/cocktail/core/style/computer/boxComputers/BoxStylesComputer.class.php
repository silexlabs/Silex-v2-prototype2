<?php

class cocktail_core_style_computer_boxComputers_BoxStylesComputer {
	public function __construct() { if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.style.computer.boxComputers.BoxStylesComputer::new");
		$�spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}}
	public function constrainHeight($style, $computedHeight) {
		$GLOBALS['%s']->push("cocktail.core.style.computer.boxComputers.BoxStylesComputer::constrainHeight");
		$�spos = $GLOBALS['%s']->length;
		$computedStyle = $style->computedStyle;
		if($style->maxHeight != cocktail_core_style_ConstrainedDimension::$none) {
			if($computedHeight > $computedStyle->getMaxHeight()) {
				$computedHeight = $computedStyle->getMaxHeight();
			}
		}
		if($computedHeight < $computedStyle->getMinHeight()) {
			$computedHeight = $computedStyle->getMinHeight();
		}
		{
			$GLOBALS['%s']->pop();
			return $computedHeight;
		}
		$GLOBALS['%s']->pop();
	}
	public function constrainWidth($style, $computedWidth) {
		$GLOBALS['%s']->push("cocktail.core.style.computer.boxComputers.BoxStylesComputer::constrainWidth");
		$�spos = $GLOBALS['%s']->length;
		$computedStyle = $style->computedStyle;
		if($style->maxWidth != cocktail_core_style_ConstrainedDimension::$none) {
			if($computedWidth > $computedStyle->getMaxWidth()) {
				$computedWidth = $computedStyle->getMaxWidth();
			}
		}
		if($computedWidth < $computedStyle->getMinWidth()) {
			$computedWidth = $computedStyle->getMinWidth();
		}
		{
			$GLOBALS['%s']->pop();
			return $computedWidth;
		}
		$GLOBALS['%s']->pop();
	}
	public function getComputedPadding($paddingStyleValue, $containingHTMLElementDimension, $fontSize, $xHeight) {
		$GLOBALS['%s']->push("cocktail.core.style.computer.boxComputers.BoxStylesComputer::getComputedPadding");
		$�spos = $GLOBALS['%s']->length;
		$computedPaddingValue = null;
		$�t = ($paddingStyleValue);
		switch($�t->index) {
		case 0:
		$value = $�t->params[0];
		{
			$computedPaddingValue = cocktail_core_unit_UnitManager::getPixelFromLength($value, $fontSize, $xHeight);
		}break;
		case 1:
		$value = $�t->params[0];
		{
			$computedPaddingValue = cocktail_core_unit_UnitManager::getPixelFromPercent($value, $containingHTMLElementDimension);
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $computedPaddingValue;
		}
		$GLOBALS['%s']->pop();
	}
	public function getComputedDimension($dimensionStyleValue, $containingHTMLElementDimension, $isContainingDimensionAuto, $fontSize, $xHeight) {
		$GLOBALS['%s']->push("cocktail.core.style.computer.boxComputers.BoxStylesComputer::getComputedDimension");
		$�spos = $GLOBALS['%s']->length;
		$computedDimensions = null;
		$�t = ($dimensionStyleValue);
		switch($�t->index) {
		case 0:
		$value = $�t->params[0];
		{
			$computedDimensions = cocktail_core_unit_UnitManager::getPixelFromLength($value, $fontSize, $xHeight);
		}break;
		case 1:
		$value = $�t->params[0];
		{
			$computedDimensions = cocktail_core_unit_UnitManager::getPixelFromPercent($value, $containingHTMLElementDimension);
		}break;
		case 2:
		{
			$computedDimensions = 0;
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $computedDimensions;
		}
		$GLOBALS['%s']->pop();
	}
	public function getComputedPositionOffset($positionOffsetStyleValue, $containingHTMLElementDimension, $fontSize, $xHeight) {
		$GLOBALS['%s']->push("cocktail.core.style.computer.boxComputers.BoxStylesComputer::getComputedPositionOffset");
		$�spos = $GLOBALS['%s']->length;
		$computedPositionOffset = null;
		$�t = ($positionOffsetStyleValue);
		switch($�t->index) {
		case 0:
		$value = $�t->params[0];
		{
			$computedPositionOffset = cocktail_core_unit_UnitManager::getPixelFromLength($value, $fontSize, $xHeight);
		}break;
		case 1:
		$value = $�t->params[0];
		{
			$computedPositionOffset = cocktail_core_unit_UnitManager::getPixelFromPercent($value, $containingHTMLElementDimension);
		}break;
		case 2:
		{
			$computedPositionOffset = 0.0;
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $computedPositionOffset;
		}
		$GLOBALS['%s']->pop();
	}
	public function getComputedConstrainedDimension($constrainedDimension, $containingHTMLElementDimension, $isContainingDimensionAuto, $fontSize, $xHeight, $isMinConstraint = null) {
		$GLOBALS['%s']->push("cocktail.core.style.computer.boxComputers.BoxStylesComputer::getComputedConstrainedDimension");
		$�spos = $GLOBALS['%s']->length;
		if($isMinConstraint === null) {
			$isMinConstraint = false;
		}
		$computedConstraintDimension = null;
		$�t = ($constrainedDimension);
		switch($�t->index) {
		case 0:
		$value = $�t->params[0];
		{
			$computedConstraintDimension = cocktail_core_unit_UnitManager::getPixelFromLength($value, $fontSize, $xHeight);
		}break;
		case 1:
		$value = $�t->params[0];
		{
			if($isContainingDimensionAuto === true) {
				if($isMinConstraint === true) {
					$computedConstraintDimension = 0;
				} else {
					$computedConstraintDimension = Math::$POSITIVE_INFINITY;
				}
			} else {
				$computedConstraintDimension = cocktail_core_unit_UnitManager::getPixelFromPercent($value, $containingHTMLElementDimension);
			}
		}break;
		case 2:
		{
			if($isMinConstraint === true) {
				$computedConstraintDimension = 0.0;
			} else {
				$computedConstraintDimension = Math::$POSITIVE_INFINITY;
			}
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $computedConstraintDimension;
		}
		$GLOBALS['%s']->pop();
	}
	public function getComputedAutoMargin($marginStyleValue, $opositeMargin, $containingHTMLElementDimension, $computedDimension, $isDimensionAuto, $computedPaddingsDimension, $fontSize, $xHeight, $isHorizontalMargin) {
		$GLOBALS['%s']->push("cocktail.core.style.computer.boxComputers.BoxStylesComputer::getComputedAutoMargin");
		$�spos = $GLOBALS['%s']->length;
		$computedMargin = null;
		if($isHorizontalMargin === false || $isDimensionAuto === true) {
			$computedMargin = 0.0;
		} else {
			$�t = ($opositeMargin);
			switch($�t->index) {
			case 2:
			{
				$computedMargin = ($containingHTMLElementDimension - $computedDimension - $computedPaddingsDimension) / 2;
			}break;
			default:{
				$opositeComputedMargin = $this->getComputedMargin($opositeMargin, $marginStyleValue, $containingHTMLElementDimension, $computedDimension, $isDimensionAuto, $computedPaddingsDimension, $fontSize, $xHeight, $isHorizontalMargin);
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
	public function getComputedMargin($marginStyleValue, $opositeMargin, $containingHTMLElementDimension, $computedDimension, $isDimensionAuto, $computedPaddingsDimension, $fontSize, $xHeight, $isHorizontalMargin) {
		$GLOBALS['%s']->push("cocktail.core.style.computer.boxComputers.BoxStylesComputer::getComputedMargin");
		$�spos = $GLOBALS['%s']->length;
		$computedMargin = null;
		$�t = ($marginStyleValue);
		switch($�t->index) {
		case 0:
		$value = $�t->params[0];
		{
			$computedMargin = cocktail_core_unit_UnitManager::getPixelFromLength($value, $fontSize, $xHeight);
		}break;
		case 1:
		$value = $�t->params[0];
		{
			if($isDimensionAuto === true) {
				$computedMargin = 0.0;
			} else {
				$computedMargin = cocktail_core_unit_UnitManager::getPixelFromPercent($value, $containingHTMLElementDimension);
			}
		}break;
		case 2:
		{
			$computedMargin = $this->getComputedAutoMargin($marginStyleValue, $opositeMargin, $containingHTMLElementDimension, $computedDimension, $isDimensionAuto, $computedPaddingsDimension, $fontSize, $xHeight, $isHorizontalMargin);
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $computedMargin;
		}
		$GLOBALS['%s']->pop();
	}
	public function getComputedMarginBottom($style, $computedHeight, $containingBlockData, $fontMetrics) {
		$GLOBALS['%s']->push("cocktail.core.style.computer.boxComputers.BoxStylesComputer::getComputedMarginBottom");
		$�spos = $GLOBALS['%s']->length;
		{
			$�tmp = $this->getComputedMargin($style->marginBottom, $style->marginTop, $containingBlockData->height, $computedHeight, $style->height == cocktail_core_style_Dimension::$cssAuto, $style->computedStyle->getPaddingTop() + $style->computedStyle->getPaddingBottom(), $fontMetrics->fontSize, $fontMetrics->xHeight, false);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getComputedMarginTop($style, $computedHeight, $containingBlockData, $fontMetrics) {
		$GLOBALS['%s']->push("cocktail.core.style.computer.boxComputers.BoxStylesComputer::getComputedMarginTop");
		$�spos = $GLOBALS['%s']->length;
		{
			$�tmp = $this->getComputedMargin($style->marginTop, $style->marginBottom, $containingBlockData->height, $computedHeight, $style->height == cocktail_core_style_Dimension::$cssAuto, $style->computedStyle->getPaddingTop() + $style->computedStyle->getPaddingBottom(), $fontMetrics->fontSize, $fontMetrics->xHeight, false);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getComputedMarginRight($style, $computedWidth, $containingBlockData, $fontMetrics) {
		$GLOBALS['%s']->push("cocktail.core.style.computer.boxComputers.BoxStylesComputer::getComputedMarginRight");
		$�spos = $GLOBALS['%s']->length;
		{
			$�tmp = $this->getComputedMargin($style->marginRight, $style->marginLeft, $containingBlockData->width, $computedWidth, $style->width == cocktail_core_style_Dimension::$cssAuto, $style->computedStyle->getPaddingRight() + $style->computedStyle->getPaddingLeft(), $fontMetrics->fontSize, $fontMetrics->xHeight, true);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getComputedMarginLeft($style, $computedWidth, $containingBlockData, $fontMetrics) {
		$GLOBALS['%s']->push("cocktail.core.style.computer.boxComputers.BoxStylesComputer::getComputedMarginLeft");
		$�spos = $GLOBALS['%s']->length;
		{
			$�tmp = $this->getComputedMargin($style->marginLeft, $style->marginRight, $containingBlockData->width, $computedWidth, $style->width == cocktail_core_style_Dimension::$cssAuto, $style->computedStyle->getPaddingRight() + $style->computedStyle->getPaddingLeft(), $fontMetrics->fontSize, $fontMetrics->xHeight, true);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getComputedAutoHeight($style, $containingBlockData, $fontMetrics) {
		$GLOBALS['%s']->push("cocktail.core.style.computer.boxComputers.BoxStylesComputer::getComputedAutoHeight");
		$�spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return 0;
		}
		$GLOBALS['%s']->pop();
	}
	public function getComputedHeight($style, $containingBlockData, $fontMetrics) {
		$GLOBALS['%s']->push("cocktail.core.style.computer.boxComputers.BoxStylesComputer::getComputedHeight");
		$�spos = $GLOBALS['%s']->length;
		{
			$�tmp = $this->getComputedDimension($style->height, $containingBlockData->height, $containingBlockData->isHeightAuto, $fontMetrics->fontSize, $fontMetrics->xHeight);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getComputedAutoWidth($style, $containingBlockData, $fontMetrics) {
		$GLOBALS['%s']->push("cocktail.core.style.computer.boxComputers.BoxStylesComputer::getComputedAutoWidth");
		$�spos = $GLOBALS['%s']->length;
		{
			$�tmp = $containingBlockData->width - $style->computedStyle->getPaddingLeft() - $style->computedStyle->getPaddingRight() - $style->computedStyle->getMarginLeft() - $style->computedStyle->getMarginRight();
			$GLOBALS['%s']->pop();
			return $�tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getComputedWidth($style, $containingBlockData, $fontMetrics) {
		$GLOBALS['%s']->push("cocktail.core.style.computer.boxComputers.BoxStylesComputer::getComputedWidth");
		$�spos = $GLOBALS['%s']->length;
		{
			$�tmp = $this->getComputedDimension($style->width, $containingBlockData->width, $containingBlockData->isWidthAuto, $fontMetrics->fontSize, $fontMetrics->xHeight);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function measureHeight($style, $containingBlockData, $fontMetrics) {
		$GLOBALS['%s']->push("cocktail.core.style.computer.boxComputers.BoxStylesComputer::measureHeight");
		$�spos = $GLOBALS['%s']->length;
		$computedHeight = $this->getComputedHeight($style, $containingBlockData, $fontMetrics);
		$style->computedStyle->set_marginTop($this->getComputedMarginTop($style, $computedHeight, $containingBlockData, $fontMetrics));
		$style->computedStyle->set_marginBottom($this->getComputedMarginBottom($style, $computedHeight, $containingBlockData, $fontMetrics));
		{
			$GLOBALS['%s']->pop();
			return $computedHeight;
		}
		$GLOBALS['%s']->pop();
	}
	public function measureAutoHeight($style, $containingBlockData, $fontMetrics) {
		$GLOBALS['%s']->push("cocktail.core.style.computer.boxComputers.BoxStylesComputer::measureAutoHeight");
		$�spos = $GLOBALS['%s']->length;
		$computedHeight = $this->getComputedAutoHeight($style, $containingBlockData, $fontMetrics);
		$style->computedStyle->set_marginTop($this->getComputedMarginTop($style, $computedHeight, $containingBlockData, $fontMetrics));
		$style->computedStyle->set_marginBottom($this->getComputedMarginBottom($style, $computedHeight, $containingBlockData, $fontMetrics));
		{
			$GLOBALS['%s']->pop();
			return $computedHeight;
		}
		$GLOBALS['%s']->pop();
	}
	public function measureHeightAndVerticalMargins($style, $containingBlockData, $fontMetrics) {
		$GLOBALS['%s']->push("cocktail.core.style.computer.boxComputers.BoxStylesComputer::measureHeightAndVerticalMargins");
		$�spos = $GLOBALS['%s']->length;
		if($style->height == cocktail_core_style_Dimension::$cssAuto) {
			$�tmp = $this->measureAutoHeight($style, $containingBlockData, $fontMetrics);
			$GLOBALS['%s']->pop();
			return $�tmp;
		} else {
			$�tmp = $this->measureHeight($style, $containingBlockData, $fontMetrics);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function measureWidth($style, $containingBlockData, $fontMetrics) {
		$GLOBALS['%s']->push("cocktail.core.style.computer.boxComputers.BoxStylesComputer::measureWidth");
		$�spos = $GLOBALS['%s']->length;
		$computedWidth = $this->getComputedWidth($style, $containingBlockData, $fontMetrics);
		$style->computedStyle->set_marginLeft($this->getComputedMarginLeft($style, $computedWidth, $containingBlockData, $fontMetrics));
		$style->computedStyle->set_marginRight($this->getComputedMarginRight($style, $computedWidth, $containingBlockData, $fontMetrics));
		{
			$GLOBALS['%s']->pop();
			return $computedWidth;
		}
		$GLOBALS['%s']->pop();
	}
	public function measureAutoWidth($style, $containingBlockData, $fontMetrics) {
		$GLOBALS['%s']->push("cocktail.core.style.computer.boxComputers.BoxStylesComputer::measureAutoWidth");
		$�spos = $GLOBALS['%s']->length;
		$computedWidth = 0.0;
		$style->computedStyle->set_marginLeft($this->getComputedMarginLeft($style, $computedWidth, $containingBlockData, $fontMetrics));
		$style->computedStyle->set_marginRight($this->getComputedMarginRight($style, $computedWidth, $containingBlockData, $fontMetrics));
		{
			$�tmp = $this->getComputedAutoWidth($style, $containingBlockData, $fontMetrics);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function measureWidthAndHorizontalMargins($style, $containingBlockData, $fontMetrics) {
		$GLOBALS['%s']->push("cocktail.core.style.computer.boxComputers.BoxStylesComputer::measureWidthAndHorizontalMargins");
		$�spos = $GLOBALS['%s']->length;
		if($style->width == cocktail_core_style_Dimension::$cssAuto) {
			$�tmp = $this->measureAutoWidth($style, $containingBlockData, $fontMetrics);
			$GLOBALS['%s']->pop();
			return $�tmp;
		} else {
			$�tmp = $this->measureWidth($style, $containingBlockData, $fontMetrics);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function measureHorizontalPaddings($style, $containingBlockData, $fontMetrics) {
		$GLOBALS['%s']->push("cocktail.core.style.computer.boxComputers.BoxStylesComputer::measureHorizontalPaddings");
		$�spos = $GLOBALS['%s']->length;
		$style->computedStyle->set_paddingLeft($this->getComputedPadding($style->paddingLeft, $containingBlockData->width, $fontMetrics->fontSize, $fontMetrics->xHeight));
		$style->computedStyle->set_paddingRight($this->getComputedPadding($style->paddingRight, $containingBlockData->width, $fontMetrics->fontSize, $fontMetrics->xHeight));
		$GLOBALS['%s']->pop();
	}
	public function measureVerticalPaddings($style, $containingBlockData, $fontMetrics) {
		$GLOBALS['%s']->push("cocktail.core.style.computer.boxComputers.BoxStylesComputer::measureVerticalPaddings");
		$�spos = $GLOBALS['%s']->length;
		$style->computedStyle->set_paddingTop($this->getComputedPadding($style->paddingTop, $containingBlockData->width, $fontMetrics->fontSize, $fontMetrics->xHeight));
		$style->computedStyle->set_paddingBottom($this->getComputedPadding($style->paddingBottom, $containingBlockData->width, $fontMetrics->fontSize, $fontMetrics->xHeight));
		$GLOBALS['%s']->pop();
	}
	public function measureDimensionsAndMargins($style, $containingBlockData, $fontMetrics) {
		$GLOBALS['%s']->push("cocktail.core.style.computer.boxComputers.BoxStylesComputer::measureDimensionsAndMargins");
		$�spos = $GLOBALS['%s']->length;
		$style->computedStyle->set_width($this->constrainWidth($style, $this->measureWidthAndHorizontalMargins($style, $containingBlockData, $fontMetrics)));
		$style->computedStyle->set_height($this->constrainHeight($style, $this->measureHeightAndVerticalMargins($style, $containingBlockData, $fontMetrics)));
		$GLOBALS['%s']->pop();
	}
	public function measurePositionOffsets($style, $containingBlockData, $fontMetrics) {
		$GLOBALS['%s']->push("cocktail.core.style.computer.boxComputers.BoxStylesComputer::measurePositionOffsets");
		$�spos = $GLOBALS['%s']->length;
		$style->computedStyle->set_left($this->getComputedPositionOffset($style->left, $containingBlockData->width, $fontMetrics->fontSize, $fontMetrics->xHeight));
		$style->computedStyle->set_right($this->getComputedPositionOffset($style->right, $containingBlockData->width, $fontMetrics->fontSize, $fontMetrics->xHeight));
		$style->computedStyle->set_top($this->getComputedPositionOffset($style->top, $containingBlockData->height, $fontMetrics->fontSize, $fontMetrics->xHeight));
		$style->computedStyle->set_bottom($this->getComputedPositionOffset($style->bottom, $containingBlockData->height, $fontMetrics->fontSize, $fontMetrics->xHeight));
		$GLOBALS['%s']->pop();
	}
	public function measureDimensionsConstraints($style, $containingBlockData, $fontMetrics) {
		$GLOBALS['%s']->push("cocktail.core.style.computer.boxComputers.BoxStylesComputer::measureDimensionsConstraints");
		$�spos = $GLOBALS['%s']->length;
		$style->computedStyle->set_maxHeight($this->getComputedConstrainedDimension($style->maxHeight, $containingBlockData->height, $containingBlockData->isHeightAuto, $fontMetrics->fontSize, $fontMetrics->xHeight, null));
		$style->computedStyle->set_minHeight($this->getComputedConstrainedDimension($style->minHeight, $containingBlockData->height, $containingBlockData->isHeightAuto, $fontMetrics->fontSize, $fontMetrics->xHeight, true));
		$style->computedStyle->set_maxWidth($this->getComputedConstrainedDimension($style->maxWidth, $containingBlockData->width, $containingBlockData->isWidthAuto, $fontMetrics->fontSize, $fontMetrics->xHeight, null));
		$style->computedStyle->set_minWidth($this->getComputedConstrainedDimension($style->minWidth, $containingBlockData->width, $containingBlockData->isWidthAuto, $fontMetrics->fontSize, $fontMetrics->xHeight, true));
		$GLOBALS['%s']->pop();
	}
	public function measure($style, $containingBlockData) {
		$GLOBALS['%s']->push("cocktail.core.style.computer.boxComputers.BoxStylesComputer::measure");
		$�spos = $GLOBALS['%s']->length;
		$fontMetrics = $style->get_fontMetricsData();
		$this->measureHorizontalPaddings($style, $containingBlockData, $fontMetrics);
		$this->measureVerticalPaddings($style, $containingBlockData, $fontMetrics);
		$this->measureDimensionsConstraints($style, $containingBlockData, $fontMetrics);
		$this->measureDimensionsAndMargins($style, $containingBlockData, $fontMetrics);
		$this->measurePositionOffsets($style, $containingBlockData, $fontMetrics);
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'cocktail.core.style.computer.boxComputers.BoxStylesComputer'; }
}

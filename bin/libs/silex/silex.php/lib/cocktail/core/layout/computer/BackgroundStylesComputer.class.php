<?php

class cocktail_core_layout_computer_BackgroundStylesComputer {
	public function __construct() { if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.BackgroundStylesComputer::new");
		$퍀pos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}}
	static function computeIndividualBackground($style, $backgroundBox, $intrinsicWidth, $intrinsicHeight, $intrinsicRatio, $backgroundPosition, $backgroundSize, $backgroundOrigin, $backgroundClip, $backgroundRepeat, $backgroundImage) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.BackgroundStylesComputer::computeIndividualBackground");
		$퍀pos = $GLOBALS['%s']->length;
		$backgroundPositioningArea = cocktail_core_layout_computer_BackgroundStylesComputer::getBackgroundPositioningArea($style, $backgroundOrigin, $backgroundBox);
		$computedBackgroundSize = cocktail_core_layout_computer_BackgroundStylesComputer::getComputedBackgroundSize($backgroundSize, $backgroundPositioningArea, $intrinsicWidth, $intrinsicHeight, $intrinsicRatio);
		$computedBackgroundPosition = cocktail_core_layout_computer_BackgroundStylesComputer::getComputedBackgroundPosition($backgroundPosition, $backgroundPositioningArea, $computedBackgroundSize);
		$computedBackgroundClip = cocktail_core_layout_computer_BackgroundStylesComputer::getBackgroundPaintingArea($style, $backgroundClip, $backgroundBox);
		$computedBackgroundStyle = _hx_anonymous(array("backgroundOrigin" => $backgroundPositioningArea, "backgroundClip" => $computedBackgroundClip, "backgroundRepeat" => $backgroundRepeat, "backgroundImage" => $backgroundImage, "backgroundSize" => $computedBackgroundSize, "backgroundPosition" => $computedBackgroundPosition));
		{
			$GLOBALS['%s']->pop();
			return $computedBackgroundStyle;
		}
		$GLOBALS['%s']->pop();
	}
	static function getComputedBackgroundPosition($backgroundPosition, $backgroundPositioningArea, $computedBackgroundSize) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.BackgroundStylesComputer::getComputedBackgroundPosition");
		$퍀pos = $GLOBALS['%s']->length;
		$backgroundPositionX = null;
		$backgroundPositionY = null;
		$퍁 = ($backgroundPosition);
		switch($퍁->index) {
		case 13:
		$value = $퍁->params[0];
		{
			$backgroundPositionX = $value[0];
			$backgroundPositionY = $value[1];
		}break;
		default:{
		}break;
		}
		$computedBackgroundXPosition = cocktail_core_layout_computer_BackgroundStylesComputer::doGetComputedBackgroundPosition($backgroundPositionX, $backgroundPositioningArea->width, $computedBackgroundSize->width);
		$computedBackgroundYPosition = cocktail_core_layout_computer_BackgroundStylesComputer::doGetComputedBackgroundPosition($backgroundPositionY, $backgroundPositioningArea->height, $computedBackgroundSize->height);
		$computedBackgroundPosition = new cocktail_core_geom_PointVO($computedBackgroundXPosition, $computedBackgroundYPosition);
		{
			$GLOBALS['%s']->pop();
			return $computedBackgroundPosition;
		}
		$GLOBALS['%s']->pop();
	}
	static function doGetComputedBackgroundPosition($backgroundPosition, $backgroundPositioningAreaDimension, $imageDimension) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.BackgroundStylesComputer::doGetComputedBackgroundPosition");
		$퍀pos = $GLOBALS['%s']->length;
		$computedBackgroundPosition = 0.0;
		$퍁 = ($backgroundPosition);
		switch($퍁->index) {
		case 17:
		$value = $퍁->params[0];
		{
			$computedBackgroundPosition = $value;
		}break;
		case 2:
		$value = $퍁->params[0];
		{
			$computedBackgroundPosition = cocktail_core_css_CSSValueConverter::getPixelFromPercent($value, $backgroundPositioningAreaDimension - $imageDimension);
		}break;
		case 4:
		$value = $퍁->params[0];
		{
			$퍁2 = ($value);
			switch($퍁2->index) {
			case 13:
			{
				$computedBackgroundPosition = cocktail_core_css_CSSValueConverter::getPixelFromPercent(50, $backgroundPositioningAreaDimension - $imageDimension);
			}break;
			case 11:
			case 22:
			{
				$computedBackgroundPosition = cocktail_core_css_CSSValueConverter::getPixelFromPercent(0, $backgroundPositioningAreaDimension - $imageDimension);
			}break;
			case 12:
			case 25:
			{
				$computedBackgroundPosition = cocktail_core_css_CSSValueConverter::getPixelFromPercent(100, $backgroundPositioningAreaDimension - $imageDimension);
			}break;
			default:{
			}break;
			}
		}break;
		default:{
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $computedBackgroundPosition;
		}
		$GLOBALS['%s']->pop();
	}
	static function getComputedBackgroundSize($backgroundSize, $backgroundPositioningArea, $intrinsicWidth, $intrinsicHeight, $intrinsicRatio) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.BackgroundStylesComputer::getComputedBackgroundSize");
		$퍀pos = $GLOBALS['%s']->length;
		$computedBackgroundSize = new cocktail_core_geom_DimensionVO(0.0, 0.0);
		$퍁 = ($backgroundSize);
		switch($퍁->index) {
		case 4:
		$value = $퍁->params[0];
		{
			$퍁2 = ($value);
			switch($퍁2->index) {
			case 42:
			{
				if($intrinsicRatio !== null) {
					$ratio = $intrinsicRatio / ($backgroundPositioningArea->width / $backgroundPositioningArea->height);
					$computedBackgroundSize->width = $intrinsicWidth * $ratio;
					$computedBackgroundSize->height = $intrinsicHeight * $ratio;
				} else {
					$computedBackgroundSize->width = $backgroundPositioningArea->width;
					$computedBackgroundSize->height = $backgroundPositioningArea->height;
				}
			}break;
			case 43:
			{
				if($intrinsicRatio !== null) {
					$ratio = $backgroundPositioningArea->width / $backgroundPositioningArea->height / $intrinsicRatio;
					$computedBackgroundSize->width = $intrinsicWidth * $ratio;
					$computedBackgroundSize->height = $intrinsicHeight * $ratio;
				} else {
					$computedBackgroundSize->width = $backgroundPositioningArea->width;
					$computedBackgroundSize->height = $backgroundPositioningArea->height;
				}
			}break;
			case 27:
			{
				$computedBackgroundSize->width = cocktail_core_layout_computer_BackgroundStylesComputer::getBackgroundSizeStyleDimensionVO(cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$AUTO), cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$AUTO), $backgroundPositioningArea->width, $backgroundPositioningArea->height, $intrinsicWidth, $intrinsicHeight, $intrinsicRatio);
				$computedBackgroundSize->height = cocktail_core_layout_computer_BackgroundStylesComputer::getBackgroundSizeStyleDimensionVO(cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$AUTO), cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$AUTO), $backgroundPositioningArea->height, $backgroundPositioningArea->width, $intrinsicHeight, $intrinsicWidth, $intrinsicRatio);
			}break;
			default:{
			}break;
			}
		}break;
		case 17:
		$value = $퍁->params[0];
		{
			$computedBackgroundSize->width = cocktail_core_layout_computer_BackgroundStylesComputer::getBackgroundSizeStyleDimensionVO($backgroundSize, cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$AUTO), $backgroundPositioningArea->width, $backgroundPositioningArea->height, $intrinsicWidth, $intrinsicHeight, $intrinsicRatio);
			$computedBackgroundSize->height = cocktail_core_layout_computer_BackgroundStylesComputer::getBackgroundSizeStyleDimensionVO(cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$AUTO), $backgroundSize, $backgroundPositioningArea->height, $backgroundPositioningArea->width, $intrinsicHeight, $intrinsicWidth, $intrinsicRatio);
		}break;
		case 2:
		$value = $퍁->params[0];
		{
			$computedBackgroundSize->width = cocktail_core_layout_computer_BackgroundStylesComputer::getBackgroundSizeStyleDimensionVO($backgroundSize, cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$AUTO), $backgroundPositioningArea->width, $backgroundPositioningArea->height, $intrinsicWidth, $intrinsicHeight, $intrinsicRatio);
			$computedBackgroundSize->height = cocktail_core_layout_computer_BackgroundStylesComputer::getBackgroundSizeStyleDimensionVO(cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$AUTO), $backgroundSize, $backgroundPositioningArea->height, $backgroundPositioningArea->width, $intrinsicHeight, $intrinsicWidth, $intrinsicRatio);
		}break;
		case 13:
		$value = $퍁->params[0];
		{
			$computedBackgroundSize->width = cocktail_core_layout_computer_BackgroundStylesComputer::getBackgroundSizeStyleDimensionVO($value[0], $value[1], $backgroundPositioningArea->width, $backgroundPositioningArea->height, $intrinsicWidth, $intrinsicHeight, $intrinsicRatio);
			$computedBackgroundSize->height = cocktail_core_layout_computer_BackgroundStylesComputer::getBackgroundSizeStyleDimensionVO($value[1], $value[0], $backgroundPositioningArea->height, $backgroundPositioningArea->width, $intrinsicHeight, $intrinsicWidth, $intrinsicRatio);
		}break;
		default:{
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $computedBackgroundSize;
		}
		$GLOBALS['%s']->pop();
	}
	static function getBackgroundSizeStyleDimensionVO($backgroundSizeValue, $opositeBackgroundSizeValue, $backgroundPositioningAreaDimension, $opositeBackgroundAreaDimension, $intrinsicDimension, $opositeIntrinsicDimension, $intrinsicRatio) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.BackgroundStylesComputer::getBackgroundSizeStyleDimensionVO");
		$퍀pos = $GLOBALS['%s']->length;
		$backgroundSizeStyleDimension = 0.0;
		$퍁 = ($backgroundSizeValue);
		switch($퍁->index) {
		case 17:
		$value = $퍁->params[0];
		{
			$backgroundSizeStyleDimension = $value;
		}break;
		case 2:
		$value = $퍁->params[0];
		{
			$backgroundSizeStyleDimension = cocktail_core_css_CSSValueConverter::getPixelFromPercent($value, $backgroundPositioningAreaDimension);
		}break;
		case 4:
		$value = $퍁->params[0];
		{
			if($value === cocktail_core_css_CSSKeywordValue::$AUTO) {
				$isOpositeAuto = false;
				$퍁2 = ($opositeBackgroundSizeValue);
				switch($퍁2->index) {
				case 4:
				$value1 = $퍁2->params[0];
				{
					if($value1 === cocktail_core_css_CSSKeywordValue::$AUTO) {
						$isOpositeAuto = true;
					}
				}break;
				default:{
				}break;
				}
				if($intrinsicDimension !== null && $isOpositeAuto === true) {
					$backgroundSizeStyleDimension = $intrinsicDimension;
				} else {
					if($opositeIntrinsicDimension !== null && $intrinsicRatio !== null) {
						$opositeDimension = cocktail_core_layout_computer_BackgroundStylesComputer::getBackgroundSizeStyleDimensionVO($opositeBackgroundSizeValue, $backgroundSizeValue, $opositeBackgroundAreaDimension, $backgroundPositioningAreaDimension, $opositeIntrinsicDimension, $intrinsicDimension, $intrinsicRatio);
						$backgroundSizeStyleDimension = $opositeDimension * $intrinsicRatio;
					} else {
						$backgroundSizeStyleDimension = cocktail_core_css_CSSValueConverter::getPixelFromPercent(100, $backgroundPositioningAreaDimension);
					}
				}
			}
		}break;
		default:{
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $backgroundSizeStyleDimension;
		}
		$GLOBALS['%s']->pop();
	}
	static function getBackgroundPositioningArea($style, $backgroundOrigin, $backgroundBox) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.BackgroundStylesComputer::getBackgroundPositioningArea");
		$퍀pos = $GLOBALS['%s']->length;
		$height = 0.0;
		$width = 0.0;
		$x = 0.0;
		$y = 0.0;
		$퍁 = ($backgroundOrigin);
		switch($퍁->index) {
		case 4:
		$value = $퍁->params[0];
		{
			$퍁2 = ($value);
			switch($퍁2->index) {
			case 39:
			{
				$height = $backgroundBox->height;
				$width = $backgroundBox->width;
				$x = 0.0;
				$y = 0.0;
			}break;
			case 40:
			{
				$height = $backgroundBox->height;
				$width = $backgroundBox->width;
				$x = 0.0;
				$y = 0.0;
			}break;
			case 41:
			{
				$height = $backgroundBox->height - $style->usedValues->marginTop - $style->usedValues->marginBottom - $style->usedValues->paddingTop - $style->usedValues->paddingBottom;
				$width = $backgroundBox->width - $style->usedValues->marginLeft - $style->usedValues->marginRight - $style->usedValues->paddingLeft - $style->usedValues->paddingRight;
				$x = 0.0;
				$y = 0.0;
			}break;
			default:{
			}break;
			}
		}break;
		default:{
		}break;
		}
		{
			$퍁mp = new cocktail_core_geom_RectangleVO($x, $y, $width, $height);
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}
		$GLOBALS['%s']->pop();
	}
	static function getBackgroundPaintingArea($style, $backgroundClip, $backgroundBox) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.BackgroundStylesComputer::getBackgroundPaintingArea");
		$퍀pos = $GLOBALS['%s']->length;
		$height = 0.0;
		$width = 0.0;
		$x = 0.0;
		$y = 0.0;
		$퍁 = ($backgroundClip);
		switch($퍁->index) {
		case 4:
		$value = $퍁->params[0];
		{
			$퍁2 = ($value);
			switch($퍁2->index) {
			case 39:
			{
				$height = $backgroundBox->height;
				$width = $backgroundBox->width;
				$x = 0.0;
				$y = 0.0;
			}break;
			case 40:
			{
				$height = $backgroundBox->height;
				$width = $backgroundBox->width;
				$x = $style->usedValues->marginLeft;
				$y = $style->usedValues->marginTop;
			}break;
			case 41:
			{
				$height = $backgroundBox->height - $style->usedValues->marginTop - $style->usedValues->marginBottom - $style->usedValues->paddingTop - $style->usedValues->paddingBottom;
				$width = $backgroundBox->width - $style->usedValues->marginLeft - $style->usedValues->marginRight - $style->usedValues->paddingLeft - $style->usedValues->paddingRight;
				$x = $style->usedValues->marginLeft + $style->usedValues->paddingLeft;
				$y = $style->usedValues->marginTop + $style->usedValues->paddingTop;
			}break;
			default:{
			}break;
			}
		}break;
		default:{
		}break;
		}
		{
			$퍁mp = new cocktail_core_geom_RectangleVO($x, $y, $width, $height);
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'cocktail.core.layout.computer.BackgroundStylesComputer'; }
}

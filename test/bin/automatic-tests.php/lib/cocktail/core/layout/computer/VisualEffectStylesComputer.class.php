<?php

class cocktail_core_layout_computer_VisualEffectStylesComputer {
	public function __construct() { 
	}
	static function compute($style) {
		$style->usedValues->transformOrigin = cocktail_core_layout_computer_VisualEffectStylesComputer::getComputedTransformOrigin($style);
		$style->usedValues->transform = cocktail_core_layout_computer_VisualEffectStylesComputer::getComputedTransform($style);
	}
	static function getComputedTransformOrigin($style) {
		$x = 0.0;
		$y = 0.0;
		$transformOriginX = null;
		$transformOriginY = null;
		$퍁 = ($style->get_transformOrigin());
		switch($퍁->index) {
		case 13:
		$value = $퍁->params[0];
		{
			$transformOriginX = $value[0];
			$transformOriginY = $value[1];
		}break;
		default:{
		}break;
		}
		$퍁 = ($transformOriginX);
		switch($퍁->index) {
		case 17:
		$value = $퍁->params[0];
		{
			$x = $value;
		}break;
		case 2:
		$value = $퍁->params[0];
		{
			$x = cocktail_core_css_CSSValueConverter::getPixelFromPercent($value, $style->usedValues->width);
		}break;
		case 4:
		$value = $퍁->params[0];
		{
			$퍁2 = ($value);
			switch($퍁2->index) {
			case 11:
			{
				$x = cocktail_core_css_CSSValueConverter::getPixelFromPercent(0, $style->usedValues->width);
			}break;
			case 13:
			{
				$x = cocktail_core_css_CSSValueConverter::getPixelFromPercent(50, $style->usedValues->width);
			}break;
			case 12:
			{
				$x = cocktail_core_css_CSSValueConverter::getPixelFromPercent(100, $style->usedValues->width);
			}break;
			default:{
			}break;
			}
		}break;
		default:{
		}break;
		}
		$퍁 = ($transformOriginY);
		switch($퍁->index) {
		case 17:
		$value = $퍁->params[0];
		{
			$y = $value;
		}break;
		case 2:
		$value = $퍁->params[0];
		{
			$y = cocktail_core_css_CSSValueConverter::getPixelFromPercent($value, $style->usedValues->width);
		}break;
		case 4:
		$value = $퍁->params[0];
		{
			$퍁2 = ($value);
			switch($퍁2->index) {
			case 22:
			{
				$y = cocktail_core_css_CSSValueConverter::getPixelFromPercent(0, $style->usedValues->width);
			}break;
			case 13:
			{
				$y = cocktail_core_css_CSSValueConverter::getPixelFromPercent(50, $style->usedValues->width);
			}break;
			case 25:
			{
				$y = cocktail_core_css_CSSValueConverter::getPixelFromPercent(100, $style->usedValues->width);
			}break;
			default:{
			}break;
			}
		}break;
		default:{
		}break;
		}
		$transformOriginPoint = new cocktail_core_geom_PointVO($x, $y);
		return $transformOriginPoint;
	}
	static function getComputedTransform($style) {
		if($style->isNone($style->get_transform())) {
			return new cocktail_core_geom_Matrix(null);
		}
		$matrix = new cocktail_core_geom_Matrix(null);
		$transformFunctions = new _hx_array(array());
		$transformOrigin = $style->usedValues->transformOrigin;
		$퍁 = ($style->get_transform());
		switch($퍁->index) {
		case 13:
		$value = $퍁->params[0];
		{
			$_g1 = 0; $_g = $value->length;
			while($_g1 < $_g) {
				$i = $_g1++;
				$퍁2 = ($value[$i]);
				switch($퍁2->index) {
				case 20:
				$value1 = $퍁2->params[0];
				{
					$transformFunctions->push($value1);
				}break;
				default:{
				}break;
				}
				unset($i);
			}
		}break;
		default:{
		}break;
		}
		$matrix->translate($transformOrigin->x, $transformOrigin->y);
		{
			$_g1 = 0; $_g = $transformFunctions->length;
			while($_g1 < $_g) {
				$i = $_g1++;
				$transformFunction = $transformFunctions[$i];
				$퍁 = ($transformFunction);
				switch($퍁->index) {
				case 0:
				$data = $퍁->params[0];
				{
					$matrix->concatenate(new cocktail_core_geom_Matrix($data));
				}break;
				case 7:
				$value = $퍁->params[0];
				{
					$angle = cocktail_core_layout_computer_VisualEffectStylesComputer::getRadFromAngle($value);
					$matrix->rotate($angle);
				}break;
				case 4:
				$sy = $퍁->params[1]; $sx = $퍁->params[0];
				{
					$matrix->scale($sx, $sy);
				}break;
				case 5:
				$sx = $퍁->params[0];
				{
					$matrix->scale($sx, 1);
				}break;
				case 6:
				$sy = $퍁->params[0];
				{
					$matrix->scale(1, $sy);
				}break;
				case 10:
				$angleY = $퍁->params[1]; $angleX = $퍁->params[0];
				{
					$skewX = cocktail_core_layout_computer_VisualEffectStylesComputer::getRadFromAngle($angleX);
					$skewY = cocktail_core_layout_computer_VisualEffectStylesComputer::getRadFromAngle($angleY);
					$matrix->skew($skewX, $skewY);
				}break;
				case 8:
				$angleX = $퍁->params[0];
				{
					$skewX = cocktail_core_layout_computer_VisualEffectStylesComputer::getRadFromAngle($angleX);
					$matrix->skew($skewX, 0);
				}break;
				case 9:
				$angleY = $퍁->params[0];
				{
					$skewY = cocktail_core_layout_computer_VisualEffectStylesComputer::getRadFromAngle($angleY);
					$matrix->skew(0, $skewY);
				}break;
				case 1:
				$ty = $퍁->params[1]; $tx = $퍁->params[0];
				{
					$translationX = cocktail_core_layout_computer_VisualEffectStylesComputer::getComputedTranslation($style, $tx, $style->usedValues->width);
					$translationY = cocktail_core_layout_computer_VisualEffectStylesComputer::getComputedTranslation($style, $ty, $style->usedValues->height);
					$matrix->translate($translationX, $translationY);
				}break;
				case 2:
				$tx = $퍁->params[0];
				{
					$translationX = cocktail_core_layout_computer_VisualEffectStylesComputer::getComputedTranslation($style, $tx, $style->usedValues->width);
					$matrix->translate($translationX, 0.0);
				}break;
				case 3:
				$ty = $퍁->params[0];
				{
					$translationY = cocktail_core_layout_computer_VisualEffectStylesComputer::getComputedTranslation($style, $ty, $style->usedValues->height);
					$matrix->translate(0.0, $translationY);
				}break;
				}
				unset($transformFunction,$i);
			}
		}
		$matrix->translate($transformOrigin->x * -1, $transformOrigin->y * -1);
		return $matrix;
	}
	static function getComputedTranslation($style, $translation, $percentReference) {
		$computedTranslation = 0.0;
		$퍁 = ($translation);
		switch($퍁->index) {
		case 0:
		$value = $퍁->params[0];
		{
			$computedTranslation = $value;
		}break;
		case 2:
		$value = $퍁->params[0];
		{
			$computedTranslation = cocktail_core_css_CSSValueConverter::getPixelFromPercent($value, $percentReference);
		}break;
		default:{
		}break;
		}
		return $computedTranslation;
	}
	static function getRadFromAngle($value) {
		$angle = null;
		$퍁 = ($value);
		switch($퍁->index) {
		case 0:
		$value1 = $퍁->params[0];
		{
			$angle = $value1 * (Math::$PI / 180);
		}break;
		case 2:
		$value1 = $퍁->params[0];
		{
			$angle = $value1;
		}break;
		case 3:
		$value1 = $퍁->params[0];
		{
			$angle = $value1 * 360 * (Math::$PI / 180);
		}break;
		case 1:
		$value1 = $퍁->params[0];
		{
			$angle = $value1 * (Math::$PI / 200);
		}break;
		}
		return $angle;
	}
	function __toString() { return 'cocktail.core.layout.computer.VisualEffectStylesComputer'; }
}

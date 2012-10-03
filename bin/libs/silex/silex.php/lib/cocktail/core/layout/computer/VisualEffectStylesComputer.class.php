<?php

class cocktail_core_layout_computer_VisualEffectStylesComputer {
	public function __construct() { if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.VisualEffectStylesComputer::new");
		$�spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}}
	static function compute($style) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.VisualEffectStylesComputer::compute");
		$�spos = $GLOBALS['%s']->length;
		$style->usedValues->transformOrigin = cocktail_core_layout_computer_VisualEffectStylesComputer::getComputedTransformOrigin($style);
		$style->usedValues->transform = cocktail_core_layout_computer_VisualEffectStylesComputer::getComputedTransform($style);
		$GLOBALS['%s']->pop();
	}
	static function getComputedTransformOrigin($style) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.VisualEffectStylesComputer::getComputedTransformOrigin");
		$�spos = $GLOBALS['%s']->length;
		$x = 0.0;
		$y = 0.0;
		$transformOriginX = null;
		$transformOriginY = null;
		$�t = ($style->get_transformOrigin());
		switch($�t->index) {
		case 13:
		$value = $�t->params[0];
		{
			$transformOriginX = $value[0];
			$transformOriginY = $value[1];
		}break;
		default:{
		}break;
		}
		$�t = ($transformOriginX);
		switch($�t->index) {
		case 17:
		$value = $�t->params[0];
		{
			$x = $value;
		}break;
		case 2:
		$value = $�t->params[0];
		{
			$x = cocktail_core_css_CSSValueConverter::getPixelFromPercent($value, $style->usedValues->width);
		}break;
		case 4:
		$value = $�t->params[0];
		{
			$�t2 = ($value);
			switch($�t2->index) {
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
		$�t = ($transformOriginY);
		switch($�t->index) {
		case 17:
		$value = $�t->params[0];
		{
			$y = $value;
		}break;
		case 2:
		$value = $�t->params[0];
		{
			$y = cocktail_core_css_CSSValueConverter::getPixelFromPercent($value, $style->usedValues->width);
		}break;
		case 4:
		$value = $�t->params[0];
		{
			$�t2 = ($value);
			switch($�t2->index) {
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
		{
			$GLOBALS['%s']->pop();
			return $transformOriginPoint;
		}
		$GLOBALS['%s']->pop();
	}
	static function getComputedTransform($style) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.VisualEffectStylesComputer::getComputedTransform");
		$�spos = $GLOBALS['%s']->length;
		if($style->isNone($style->get_transform())) {
			$�tmp = new cocktail_core_geom_Matrix(null);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}
		$matrix = new cocktail_core_geom_Matrix(null);
		$transformFunctions = new _hx_array(array());
		$transformOrigin = $style->usedValues->transformOrigin;
		$�t = ($style->get_transform());
		switch($�t->index) {
		case 13:
		$value = $�t->params[0];
		{
			$_g1 = 0; $_g = $value->length;
			while($_g1 < $_g) {
				$i = $_g1++;
				$�t2 = ($value[$i]);
				switch($�t2->index) {
				case 20:
				$value1 = $�t2->params[0];
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
				$�t = ($transformFunction);
				switch($�t->index) {
				case 0:
				$data = $�t->params[0];
				{
					$matrix->concatenate(new cocktail_core_geom_Matrix($data));
				}break;
				case 7:
				$value = $�t->params[0];
				{
					$angle = cocktail_core_layout_computer_VisualEffectStylesComputer::getRadFromAngle($value);
					$matrix->rotate($angle);
				}break;
				case 4:
				$sy = $�t->params[1]; $sx = $�t->params[0];
				{
					$matrix->scale($sx, $sy);
				}break;
				case 5:
				$sx = $�t->params[0];
				{
					$matrix->scale($sx, 1);
				}break;
				case 6:
				$sy = $�t->params[0];
				{
					$matrix->scale(1, $sy);
				}break;
				case 10:
				$angleY = $�t->params[1]; $angleX = $�t->params[0];
				{
					$skewX = cocktail_core_layout_computer_VisualEffectStylesComputer::getRadFromAngle($angleX);
					$skewY = cocktail_core_layout_computer_VisualEffectStylesComputer::getRadFromAngle($angleY);
					$matrix->skew($skewX, $skewY);
				}break;
				case 8:
				$angleX = $�t->params[0];
				{
					$skewX = cocktail_core_layout_computer_VisualEffectStylesComputer::getRadFromAngle($angleX);
					$matrix->skew($skewX, 0);
				}break;
				case 9:
				$angleY = $�t->params[0];
				{
					$skewY = cocktail_core_layout_computer_VisualEffectStylesComputer::getRadFromAngle($angleY);
					$matrix->skew(0, $skewY);
				}break;
				case 1:
				$ty = $�t->params[1]; $tx = $�t->params[0];
				{
					$translationX = cocktail_core_layout_computer_VisualEffectStylesComputer::getComputedTranslation($style, $tx, $style->usedValues->width);
					$translationY = cocktail_core_layout_computer_VisualEffectStylesComputer::getComputedTranslation($style, $ty, $style->usedValues->height);
					$matrix->translate($translationX, $translationY);
				}break;
				case 2:
				$tx = $�t->params[0];
				{
					$translationX = cocktail_core_layout_computer_VisualEffectStylesComputer::getComputedTranslation($style, $tx, $style->usedValues->width);
					$matrix->translate($translationX, 0.0);
				}break;
				case 3:
				$ty = $�t->params[0];
				{
					$translationY = cocktail_core_layout_computer_VisualEffectStylesComputer::getComputedTranslation($style, $ty, $style->usedValues->height);
					$matrix->translate(0.0, $translationY);
				}break;
				}
				unset($transformFunction,$i);
			}
		}
		$matrix->translate($transformOrigin->x * -1, $transformOrigin->y * -1);
		{
			$GLOBALS['%s']->pop();
			return $matrix;
		}
		$GLOBALS['%s']->pop();
	}
	static function getComputedTranslation($style, $translation, $percentReference) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.VisualEffectStylesComputer::getComputedTranslation");
		$�spos = $GLOBALS['%s']->length;
		$computedTranslation = 0.0;
		$�t = ($translation);
		switch($�t->index) {
		case 0:
		$value = $�t->params[0];
		{
			$computedTranslation = $value;
		}break;
		case 2:
		$value = $�t->params[0];
		{
			$computedTranslation = cocktail_core_css_CSSValueConverter::getPixelFromPercent($value, $percentReference);
		}break;
		default:{
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $computedTranslation;
		}
		$GLOBALS['%s']->pop();
	}
	static function getRadFromAngle($value) {
		$GLOBALS['%s']->push("cocktail.core.layout.computer.VisualEffectStylesComputer::getRadFromAngle");
		$�spos = $GLOBALS['%s']->length;
		$angle = null;
		$�t = ($value);
		switch($�t->index) {
		case 0:
		$value1 = $�t->params[0];
		{
			$angle = $value1 * (Math::$PI / 180);
		}break;
		case 2:
		$value1 = $�t->params[0];
		{
			$angle = $value1;
		}break;
		case 3:
		$value1 = $�t->params[0];
		{
			$angle = $value1 * 360 * (Math::$PI / 180);
		}break;
		case 1:
		$value1 = $�t->params[0];
		{
			$angle = $value1 * (Math::$PI / 200);
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $angle;
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'cocktail.core.layout.computer.VisualEffectStylesComputer'; }
}

<?php

class cocktail_core_css_CSSValueConverter {
	public function __construct() { if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSValueConverter::new");
		$�spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}}
	static function getPixelFromLength($length, $emReference, $exReference) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSValueConverter::getPixelFromLength");
		$�spos = $GLOBALS['%s']->length;
		$lengthValue = null;
		$�t = ($length);
		switch($�t->index) {
		case 0:
		$value = $�t->params[0];
		{
			$lengthValue = $value;
		}break;
		case 2:
		$value = $�t->params[0];
		{
			$lengthValue = $value * (72 * (1 / 0.75) / 2.54) / 10;
		}break;
		case 1:
		$value = $�t->params[0];
		{
			$lengthValue = $value * (72 * (1 / 0.75) / 2.54);
		}break;
		case 3:
		$value = $�t->params[0];
		{
			$lengthValue = $value / 0.75;
		}break;
		case 5:
		$value = $�t->params[0];
		{
			$lengthValue = $value * (72 * (1 / 0.75));
		}break;
		case 4:
		$value = $�t->params[0];
		{
			$lengthValue = $value * (12 * (1 / 0.75));
		}break;
		case 6:
		$value = $�t->params[0];
		{
			$lengthValue = $emReference * $value;
		}break;
		case 7:
		$value = $�t->params[0];
		{
			$lengthValue = $exReference * $value;
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $lengthValue;
		}
		$GLOBALS['%s']->pop();
	}
	static function getFontFamilyAsStringArray($value) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSValueConverter::getFontFamilyAsStringArray");
		$�spos = $GLOBALS['%s']->length;
		$fontNames = new _hx_array(array());
		$�t = ($value);
		switch($�t->index) {
		case 14:
		$value1 = $�t->params[0];
		{
			$_g1 = 0; $_g = $value1->length;
			while($_g1 < $_g) {
				$i = $_g1++;
				$�t2 = ($value1[$i]);
				switch($�t2->index) {
				case 6:
				$value2 = $�t2->params[0];
				{
					$fontNames->push($value2);
				}break;
				case 3:
				$value2 = $�t2->params[0];
				{
					$fontNames->push($value2);
				}break;
				default:{
					throw new HException("Illegal value for font family style");
				}break;
				}
				unset($i);
			}
		}break;
		case 3:
		$value1 = $�t->params[0];
		{
			$fontNames = new _hx_array(array($value1));
		}break;
		default:{
			throw new HException("Illegal value for font family style");
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $fontNames;
		}
		$GLOBALS['%s']->pop();
	}
	static function getFontSizeFromAbsoluteSizeValue($absoluteSize) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSValueConverter::getFontSizeFromAbsoluteSizeValue");
		$�spos = $GLOBALS['%s']->length;
		$fontSize = 0.0;
		$mediumFontSize = 16;
		$�t = ($absoluteSize);
		switch($�t->index) {
		case 58:
		{
			$fontSize = 9;
		}break;
		case 59:
		{
			$fontSize = 10;
		}break;
		case 60:
		{
			$fontSize = 13;
		}break;
		case 61:
		{
			$fontSize = 16;
		}break;
		case 62:
		{
			$fontSize = 18;
		}break;
		case 63:
		{
			$fontSize = 24;
		}break;
		case 64:
		{
			$fontSize = 32;
		}break;
		default:{
			throw new HException("Illegal keyword value for font size");
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $fontSize;
		}
		$GLOBALS['%s']->pop();
	}
	static function getFontSizeFromRelativeSizeValue($relativeSize, $parentFontSize) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSValueConverter::getFontSizeFromRelativeSizeValue");
		$�spos = $GLOBALS['%s']->length;
		$fontSize = 0.0;
		$�t = ($relativeSize);
		switch($�t->index) {
		case 65:
		{
			$fontSize = cocktail_core_css_CSSValueConverter::getLargerFontSize($parentFontSize);
		}break;
		case 66:
		{
			$fontSize = cocktail_core_css_CSSValueConverter::getSmallerFontSize($parentFontSize);
		}break;
		default:{
			throw new HException("Illegal keyword value for font size");
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $fontSize;
		}
		$GLOBALS['%s']->pop();
	}
	static function getPixelFromPercent($percent, $reference) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSValueConverter::getPixelFromPercent");
		$�spos = $GLOBALS['%s']->length;
		{
			$�tmp = $reference * ($percent * 0.01);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function getPercentFromPixel($pixel, $reference) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSValueConverter::getPercentFromPixel");
		$�spos = $GLOBALS['%s']->length;
		{
			$�tmp = $reference / $pixel * 100;
			$GLOBALS['%s']->pop();
			return $�tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function getComputedCSSColorFromCSSColor($colorProperty, $currentColor) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSValueConverter::getComputedCSSColorFromCSSColor");
		$�spos = $GLOBALS['%s']->length;
		$�t = ($colorProperty);
		switch($�t->index) {
		case 7:
		$value = $�t->params[0];
		{
			$�tmp = cocktail_core_css_CSSValueConverter::getRGBAColorFromColorKeyword($value);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 8:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(0, 0, 0, 0.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 0:
		$blue = $�t->params[2]; $green = $�t->params[1]; $red = $�t->params[0];
		{
			$red = cocktail_core_css_CSSValueConverter::clampInteger($red, 255, 0);
			$green = cocktail_core_css_CSSValueConverter::clampInteger($green, 255, 0);
			$blue = cocktail_core_css_CSSValueConverter::clampInteger($blue, 255, 0);
			{
				$�tmp = cocktail_core_css_CSSColorValue::RGBA($red, $green, $blue, 1.0);
				$GLOBALS['%s']->pop();
				return $�tmp;
			}
		}break;
		case 1:
		$blue = $�t->params[2]; $green = $�t->params[1]; $red = $�t->params[0];
		{
			$red = cocktail_core_css_CSSValueConverter::clampNumber($red, 100, 0);
			$green = cocktail_core_css_CSSValueConverter::clampNumber($green, 100, 0);
			$blue = cocktail_core_css_CSSValueConverter::clampNumber($blue, 100, 0);
			{
				$�tmp = cocktail_core_css_CSSColorValue::RGBA(Math::round(255 * ($red * 0.01)), Math::round(255 * ($green * 0.01)), Math::round(255 * ($blue * 0.01)), 1.0);
				$GLOBALS['%s']->pop();
				return $�tmp;
			}
		}break;
		case 2:
		$alpha = $�t->params[3]; $blue = $�t->params[2]; $green = $�t->params[1]; $red = $�t->params[0];
		{
			$red = cocktail_core_css_CSSValueConverter::clampInteger($red, 255, 0);
			$green = cocktail_core_css_CSSValueConverter::clampInteger($green, 255, 0);
			$blue = cocktail_core_css_CSSValueConverter::clampInteger($blue, 255, 0);
			$alpha = cocktail_core_css_CSSValueConverter::clampNumber($alpha, 1.0, 0.0);
			{
				$�tmp = cocktail_core_css_CSSColorValue::RGBA($red, $green, $blue, $alpha);
				$GLOBALS['%s']->pop();
				return $�tmp;
			}
		}break;
		case 3:
		$alpha = $�t->params[3]; $blue = $�t->params[2]; $green = $�t->params[1]; $red = $�t->params[0];
		{
			$red = cocktail_core_css_CSSValueConverter::clampNumber($red, 100, 0);
			$green = cocktail_core_css_CSSValueConverter::clampNumber($green, 100, 0);
			$blue = cocktail_core_css_CSSValueConverter::clampNumber($blue, 100, 0);
			$alpha = cocktail_core_css_CSSValueConverter::clampNumber($alpha, 1.0, 0.0);
			{
				$�tmp = cocktail_core_css_CSSColorValue::RGBA(Math::round(255 * ($red * 0.01)), Math::round(255 * ($green * 0.01)), Math::round(255 * ($blue * 0.01)), $alpha);
				$GLOBALS['%s']->pop();
				return $�tmp;
			}
		}break;
		case 5:
		$lightness = $�t->params[2]; $saturation = $�t->params[1]; $hue = $�t->params[0];
		{
			$GLOBALS['%s']->pop();
			return $colorProperty;
		}break;
		case 6:
		$alpha = $�t->params[3]; $lightness = $�t->params[2]; $saturation = $�t->params[1]; $hue = $�t->params[0];
		{
			$GLOBALS['%s']->pop();
			return $colorProperty;
		}break;
		case 4:
		$value = $�t->params[0];
		{
			$paddedHex = "";
			if(strlen($value) === 3) {
				$paddedHex .= _hx_char_at($value, 0);
				$paddedHex .= _hx_char_at($value, 0);
				$paddedHex .= _hx_char_at($value, 1);
				$paddedHex .= _hx_char_at($value, 1);
				$paddedHex .= _hx_char_at($value, 2);
				$paddedHex .= _hx_char_at($value, 2);
			} else {
				$paddedHex = $value;
			}
			{
				$�tmp = cocktail_core_css_CSSValueConverter::hexToRGBA($paddedHex);
				$GLOBALS['%s']->pop();
				return $�tmp;
			}
		}break;
		case 9:
		{
			$GLOBALS['%s']->pop();
			return $currentColor;
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	static function getColorVOFromCSSColor($value, $colorVO) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSValueConverter::getColorVOFromCSSColor");
		$�spos = $GLOBALS['%s']->length;
		$colorValue = 0;
		$alphaValue = 0;
		$�t = ($value);
		switch($�t->index) {
		case 2:
		$alpha = $�t->params[3]; $blue = $�t->params[2]; $green = $�t->params[1]; $red = $�t->params[0];
		{
			$colorValue = $red;
			$colorValue = ($colorValue << 8) + $green;
			$colorValue = ($colorValue << 8) + $blue;
			$alphaValue = $alpha;
		}break;
		case 5:
		$lightness = $�t->params[2]; $saturation = $�t->params[1]; $hue = $�t->params[0];
		{
		}break;
		case 6:
		$alpha = $�t->params[3]; $lightness = $�t->params[2]; $saturation = $�t->params[1]; $hue = $�t->params[0];
		{
		}break;
		default:{
		}break;
		}
		$colorVO->color = $colorValue;
		$colorVO->alpha = $alphaValue;
		$GLOBALS['%s']->pop();
	}
	static function clampNumber($number, $max, $min) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSValueConverter::clampNumber");
		$�spos = $GLOBALS['%s']->length;
		if($number > $max) {
			$GLOBALS['%s']->pop();
			return $max;
		}
		if($number < $min) {
			$GLOBALS['%s']->pop();
			return $min;
		}
		{
			$GLOBALS['%s']->pop();
			return $number;
		}
		$GLOBALS['%s']->pop();
	}
	static function clampInteger($integer, $max, $min) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSValueConverter::clampInteger");
		$�spos = $GLOBALS['%s']->length;
		if($integer > $max) {
			$GLOBALS['%s']->pop();
			return $max;
		}
		if($integer < $min) {
			$GLOBALS['%s']->pop();
			return $min;
		}
		{
			$GLOBALS['%s']->pop();
			return $integer;
		}
		$GLOBALS['%s']->pop();
	}
	static function hexToRGBA($hex) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSValueConverter::hexToRGBA");
		$�spos = $GLOBALS['%s']->length;
		$red = cocktail_core_css_CSSValueConverter::hexToInt(_hx_char_at($hex, 0)) * 16 + cocktail_core_css_CSSValueConverter::hexToInt(_hx_char_at($hex, 1));
		$green = cocktail_core_css_CSSValueConverter::hexToInt(_hx_char_at($hex, 2)) * 16 + cocktail_core_css_CSSValueConverter::hexToInt(_hx_char_at($hex, 3));
		$blue = cocktail_core_css_CSSValueConverter::hexToInt(_hx_char_at($hex, 4)) * 16 + cocktail_core_css_CSSValueConverter::hexToInt(_hx_char_at($hex, 5));
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA($red, $green, $blue, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function hexToInt($char) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSValueConverter::hexToInt");
		$�spos = $GLOBALS['%s']->length;
		switch(strtoupper($char)) {
		case "0":{
			$GLOBALS['%s']->pop();
			return 0;
		}break;
		case "1":{
			$GLOBALS['%s']->pop();
			return 1;
		}break;
		case "2":{
			$GLOBALS['%s']->pop();
			return 2;
		}break;
		case "3":{
			$GLOBALS['%s']->pop();
			return 3;
		}break;
		case "4":{
			$GLOBALS['%s']->pop();
			return 4;
		}break;
		case "5":{
			$GLOBALS['%s']->pop();
			return 5;
		}break;
		case "6":{
			$GLOBALS['%s']->pop();
			return 6;
		}break;
		case "7":{
			$GLOBALS['%s']->pop();
			return 7;
		}break;
		case "8":{
			$GLOBALS['%s']->pop();
			return 8;
		}break;
		case "9":{
			$GLOBALS['%s']->pop();
			return 9;
		}break;
		case "A":{
			$GLOBALS['%s']->pop();
			return 10;
		}break;
		case "B":{
			$GLOBALS['%s']->pop();
			return 11;
		}break;
		case "C":{
			$GLOBALS['%s']->pop();
			return 12;
		}break;
		case "D":{
			$GLOBALS['%s']->pop();
			return 13;
		}break;
		case "E":{
			$GLOBALS['%s']->pop();
			return 14;
		}break;
		case "F":{
			$GLOBALS['%s']->pop();
			return 15;
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return 0;
		}
		$GLOBALS['%s']->pop();
	}
	static function getRGBAColorFromColorKeyword($value) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSValueConverter::getRGBAColorFromColorKeyword");
		$�spos = $GLOBALS['%s']->length;
		$�t = ($value);
		switch($�t->index) {
		case 0:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(240, 248, 255, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 1:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(250, 235, 215, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 2:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(0, 255, 255, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 3:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(127, 255, 212, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 4:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(240, 255, 255, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 5:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(245, 245, 220, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 6:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(255, 228, 196, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 7:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(0, 0, 0, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 8:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(255, 235, 205, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 9:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(0, 0, 255, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 10:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(138, 43, 226, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 11:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(165, 42, 42, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 12:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(222, 184, 135, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 13:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(95, 158, 160, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 14:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(127, 255, 0, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 15:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(210, 105, 30, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 16:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(255, 127, 80, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 17:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(100, 149, 237, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 18:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(255, 248, 220, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 19:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(220, 20, 60, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 20:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(0, 255, 255, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 21:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(0, 0, 139, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 22:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(0, 139, 139, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 23:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(184, 134, 11, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 24:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(169, 169, 169, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 25:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(0, 100, 0, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 26:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(169, 169, 169, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 27:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(189, 183, 107, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 28:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(139, 0, 139, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 29:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(85, 107, 47, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 30:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(255, 140, 0, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 31:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(153, 50, 204, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 32:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(139, 0, 0, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 33:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(233, 150, 122, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 34:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(143, 188, 143, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 35:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(72, 61, 139, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 36:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(47, 79, 79, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 37:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(47, 79, 79, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 38:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(0, 206, 209, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 39:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(148, 0, 211, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 40:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(255, 20, 147, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 41:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(0, 191, 255, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 42:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(105, 105, 105, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 43:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(105, 105, 105, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 44:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(30, 144, 255, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 45:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(178, 34, 34, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 46:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(255, 250, 240, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 47:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(34, 139, 34, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 48:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(255, 0, 255, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 49:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(220, 220, 220, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 50:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(248, 248, 255, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 51:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(255, 215, 0, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 52:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(218, 165, 32, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 53:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(128, 128, 128, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 54:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(0, 128, 0, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 55:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(173, 255, 47, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 56:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(128, 128, 128, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 57:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(240, 255, 240, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 58:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(255, 105, 180, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 59:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(205, 92, 92, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 60:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(75, 0, 130, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 61:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(255, 255, 240, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 62:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(240, 230, 140, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 63:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(230, 230, 250, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 64:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(255, 240, 245, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 65:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(124, 252, 0, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 66:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(255, 250, 205, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 67:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(173, 216, 130, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 68:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(240, 128, 128, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 69:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(224, 255, 255, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 70:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(250, 250, 210, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 71:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(211, 211, 211, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 72:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(144, 238, 144, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 73:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(211, 211, 211, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 74:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(255, 182, 193, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 75:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(255, 160, 122, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 76:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(32, 178, 170, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 77:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(135, 206, 250, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 78:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(119, 136, 153, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 79:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(119, 136, 153, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 80:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(176, 196, 222, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 81:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(255, 255, 224, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 82:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(0, 255, 0, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 83:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(50, 205, 50, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 84:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(250, 240, 230, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 85:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(255, 0, 255, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 86:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(128, 0, 0, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 87:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(102, 205, 170, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 88:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(0, 0, 205, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 89:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(186, 85, 211, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 90:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(147, 112, 219, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 91:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(60, 179, 113, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 92:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(123, 104, 238, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 93:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(0, 250, 154, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 94:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(72, 209, 204, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 95:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(199, 21, 133, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 96:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(25, 25, 112, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 97:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(245, 255, 250, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 98:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(255, 228, 225, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 99:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(255, 228, 181, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 100:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(255, 222, 173, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 101:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(0, 0, 128, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 102:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(253, 245, 230, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 103:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(128, 128, 0, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 104:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(107, 142, 35, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 105:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(255, 165, 0, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 106:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(255, 69, 0, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 107:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(218, 112, 214, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 108:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(238, 232, 170, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 109:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(152, 251, 152, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 110:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(175, 238, 238, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 111:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(219, 112, 147, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 112:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(255, 239, 213, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 113:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(255, 218, 185, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 114:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(205, 133, 63, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 115:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(255, 192, 203, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 116:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(221, 160, 221, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 117:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(176, 224, 230, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 118:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(255, 165, 0, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 119:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(255, 0, 0, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 120:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(188, 143, 143, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 121:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(65, 105, 225, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 122:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(139, 69, 19, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 123:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(250, 128, 114, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 124:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(244, 164, 96, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 125:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(46, 139, 87, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 126:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(255, 245, 238, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 127:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(160, 82, 45, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 128:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(192, 192, 192, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 129:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(135, 206, 235, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 130:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(106, 90, 205, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 131:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(112, 128, 144, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 132:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(112, 128, 144, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 133:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(255, 250, 250, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 134:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(0, 255, 127, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 135:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(70, 130, 180, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 136:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(210, 180, 140, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 137:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(0, 128, 128, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 138:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(216, 191, 216, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 139:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(255, 99, 71, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 140:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(64, 224, 208, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 141:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(238, 130, 238, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 142:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(245, 222, 179, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 143:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(255, 255, 255, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 144:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(245, 245, 245, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 145:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(255, 255, 0, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 146:
		{
			$�tmp = cocktail_core_css_CSSColorValue::RGBA(154, 205, 50, 1.0);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	static function getLargerFontSize($parentFontSize) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSValueConverter::getLargerFontSize");
		$�spos = $GLOBALS['%s']->length;
		$fontSizeTable = new _hx_array(array(9, 10, 13, 16, 18, 24, 32));
		$fontSize = $fontSizeTable[$fontSizeTable->length - 1];
		{
			$_g1 = 0; $_g = $fontSizeTable->length;
			while($_g1 < $_g) {
				$i = $_g1++;
				if($fontSizeTable->�a[$i] > $parentFontSize) {
					$fontSize = $fontSizeTable[$i];
					break;
				}
				unset($i);
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $fontSize;
		}
		$GLOBALS['%s']->pop();
	}
	static function getSmallerFontSize($parentFontSize) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSValueConverter::getSmallerFontSize");
		$�spos = $GLOBALS['%s']->length;
		$fontSizeTable = new _hx_array(array(9, 10, 13, 16, 18, 24, 32));
		$fontSize = $fontSizeTable[0];
		$i = $fontSizeTable->length - 1;
		while($i > 0) {
			if($fontSizeTable->�a[$i] < $parentFontSize) {
				$fontSize = $fontSizeTable[$i];
				break;
			}
			$i--;
		}
		{
			$GLOBALS['%s']->pop();
			return $fontSize;
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'cocktail.core.css.CSSValueConverter'; }
}

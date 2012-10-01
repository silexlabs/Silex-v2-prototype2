<?php

class cocktail_core_css_CSSValueConverter {
	public function __construct() { 
	}
	static function getPixelFromLength($length, $emReference, $exReference) {
		$lengthValue = null;
		$퍁 = ($length);
		switch($퍁->index) {
		case 0:
		$value = $퍁->params[0];
		{
			$lengthValue = $value;
		}break;
		case 2:
		$value = $퍁->params[0];
		{
			$lengthValue = $value * (72 * (1 / 0.75) / 2.54) / 10;
		}break;
		case 1:
		$value = $퍁->params[0];
		{
			$lengthValue = $value * (72 * (1 / 0.75) / 2.54);
		}break;
		case 3:
		$value = $퍁->params[0];
		{
			$lengthValue = $value / 0.75;
		}break;
		case 5:
		$value = $퍁->params[0];
		{
			$lengthValue = $value * (72 * (1 / 0.75));
		}break;
		case 4:
		$value = $퍁->params[0];
		{
			$lengthValue = $value * (12 * (1 / 0.75));
		}break;
		case 6:
		$value = $퍁->params[0];
		{
			$lengthValue = $emReference * $value;
		}break;
		case 7:
		$value = $퍁->params[0];
		{
			$lengthValue = $exReference * $value;
		}break;
		}
		return $lengthValue;
	}
	static function getFontFamilyAsStringArray($value) {
		$fontNames = new _hx_array(array());
		$퍁 = ($value);
		switch($퍁->index) {
		case 14:
		$value1 = $퍁->params[0];
		{
			$_g1 = 0; $_g = $value1->length;
			while($_g1 < $_g) {
				$i = $_g1++;
				$퍁2 = ($value1[$i]);
				switch($퍁2->index) {
				case 6:
				$value2 = $퍁2->params[0];
				{
					$fontNames->push($value2);
				}break;
				case 3:
				$value2 = $퍁2->params[0];
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
		$value1 = $퍁->params[0];
		{
			$fontNames = new _hx_array(array($value1));
		}break;
		default:{
			throw new HException("Illegal value for font family style");
		}break;
		}
		return $fontNames;
	}
	static function getFontSizeFromAbsoluteSizeValue($absoluteSize) {
		$fontSize = 0.0;
		$mediumFontSize = 16;
		$퍁 = ($absoluteSize);
		switch($퍁->index) {
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
		return $fontSize;
	}
	static function getFontSizeFromRelativeSizeValue($relativeSize, $parentFontSize) {
		$fontSize = 0.0;
		$퍁 = ($relativeSize);
		switch($퍁->index) {
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
		return $fontSize;
	}
	static function getPixelFromPercent($percent, $reference) {
		return $reference * ($percent * 0.01);
	}
	static function getPercentFromPixel($pixel, $reference) {
		return $reference / $pixel * 100;
	}
	static function getComputedCSSColorFromCSSColor($colorProperty, $currentColor) {
		$퍁 = ($colorProperty);
		switch($퍁->index) {
		case 7:
		$value = $퍁->params[0];
		{
			return cocktail_core_css_CSSValueConverter::getRGBAColorFromColorKeyword($value);
		}break;
		case 8:
		{
			return cocktail_core_css_CSSColorValue::RGBA(0, 0, 0, 0.0);
		}break;
		case 0:
		$blue = $퍁->params[2]; $green = $퍁->params[1]; $red = $퍁->params[0];
		{
			$red = cocktail_core_css_CSSValueConverter::clampInteger($red, 255, 0);
			$green = cocktail_core_css_CSSValueConverter::clampInteger($green, 255, 0);
			$blue = cocktail_core_css_CSSValueConverter::clampInteger($blue, 255, 0);
			return cocktail_core_css_CSSColorValue::RGBA($red, $green, $blue, 1.0);
		}break;
		case 1:
		$blue = $퍁->params[2]; $green = $퍁->params[1]; $red = $퍁->params[0];
		{
			$red = cocktail_core_css_CSSValueConverter::clampNumber($red, 100, 0);
			$green = cocktail_core_css_CSSValueConverter::clampNumber($green, 100, 0);
			$blue = cocktail_core_css_CSSValueConverter::clampNumber($blue, 100, 0);
			return cocktail_core_css_CSSColorValue::RGBA(Math::round(255 * ($red * 0.01)), Math::round(255 * ($green * 0.01)), Math::round(255 * ($blue * 0.01)), 1.0);
		}break;
		case 2:
		$alpha = $퍁->params[3]; $blue = $퍁->params[2]; $green = $퍁->params[1]; $red = $퍁->params[0];
		{
			$red = cocktail_core_css_CSSValueConverter::clampInteger($red, 255, 0);
			$green = cocktail_core_css_CSSValueConverter::clampInteger($green, 255, 0);
			$blue = cocktail_core_css_CSSValueConverter::clampInteger($blue, 255, 0);
			$alpha = cocktail_core_css_CSSValueConverter::clampNumber($alpha, 1.0, 0.0);
			return cocktail_core_css_CSSColorValue::RGBA($red, $green, $blue, $alpha);
		}break;
		case 3:
		$alpha = $퍁->params[3]; $blue = $퍁->params[2]; $green = $퍁->params[1]; $red = $퍁->params[0];
		{
			$red = cocktail_core_css_CSSValueConverter::clampNumber($red, 100, 0);
			$green = cocktail_core_css_CSSValueConverter::clampNumber($green, 100, 0);
			$blue = cocktail_core_css_CSSValueConverter::clampNumber($blue, 100, 0);
			$alpha = cocktail_core_css_CSSValueConverter::clampNumber($alpha, 1.0, 0.0);
			return cocktail_core_css_CSSColorValue::RGBA(Math::round(255 * ($red * 0.01)), Math::round(255 * ($green * 0.01)), Math::round(255 * ($blue * 0.01)), $alpha);
		}break;
		case 5:
		$lightness = $퍁->params[2]; $saturation = $퍁->params[1]; $hue = $퍁->params[0];
		{
			return $colorProperty;
		}break;
		case 6:
		$alpha = $퍁->params[3]; $lightness = $퍁->params[2]; $saturation = $퍁->params[1]; $hue = $퍁->params[0];
		{
			return $colorProperty;
		}break;
		case 4:
		$value = $퍁->params[0];
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
			return cocktail_core_css_CSSValueConverter::hexToRGBA($paddedHex);
		}break;
		case 9:
		{
			return $currentColor;
		}break;
		}
	}
	static function getColorVOFromCSSColor($value, $colorVO) {
		$colorValue = 0;
		$alphaValue = 0;
		$퍁 = ($value);
		switch($퍁->index) {
		case 2:
		$alpha = $퍁->params[3]; $blue = $퍁->params[2]; $green = $퍁->params[1]; $red = $퍁->params[0];
		{
			$colorValue = $red;
			$colorValue = ($colorValue << 8) + $green;
			$colorValue = ($colorValue << 8) + $blue;
			$alphaValue = $alpha;
		}break;
		case 5:
		$lightness = $퍁->params[2]; $saturation = $퍁->params[1]; $hue = $퍁->params[0];
		{
		}break;
		case 6:
		$alpha = $퍁->params[3]; $lightness = $퍁->params[2]; $saturation = $퍁->params[1]; $hue = $퍁->params[0];
		{
		}break;
		default:{
		}break;
		}
		$colorVO->color = $colorValue;
		$colorVO->alpha = $alphaValue;
	}
	static function clampNumber($number, $max, $min) {
		if($number > $max) {
			return $max;
		}
		if($number < $min) {
			return $min;
		}
		return $number;
	}
	static function clampInteger($integer, $max, $min) {
		if($integer > $max) {
			return $max;
		}
		if($integer < $min) {
			return $min;
		}
		return $integer;
	}
	static function hexToRGBA($hex) {
		$red = cocktail_core_css_CSSValueConverter::hexToInt(_hx_char_at($hex, 0)) * 16 + cocktail_core_css_CSSValueConverter::hexToInt(_hx_char_at($hex, 1));
		$green = cocktail_core_css_CSSValueConverter::hexToInt(_hx_char_at($hex, 2)) * 16 + cocktail_core_css_CSSValueConverter::hexToInt(_hx_char_at($hex, 3));
		$blue = cocktail_core_css_CSSValueConverter::hexToInt(_hx_char_at($hex, 4)) * 16 + cocktail_core_css_CSSValueConverter::hexToInt(_hx_char_at($hex, 5));
		return cocktail_core_css_CSSColorValue::RGBA($red, $green, $blue, 1.0);
	}
	static function hexToInt($char) {
		switch(strtoupper($char)) {
		case "0":{
			return 0;
		}break;
		case "1":{
			return 1;
		}break;
		case "2":{
			return 2;
		}break;
		case "3":{
			return 3;
		}break;
		case "4":{
			return 4;
		}break;
		case "5":{
			return 5;
		}break;
		case "6":{
			return 6;
		}break;
		case "7":{
			return 7;
		}break;
		case "8":{
			return 8;
		}break;
		case "9":{
			return 9;
		}break;
		case "A":{
			return 10;
		}break;
		case "B":{
			return 11;
		}break;
		case "C":{
			return 12;
		}break;
		case "D":{
			return 13;
		}break;
		case "E":{
			return 14;
		}break;
		case "F":{
			return 15;
		}break;
		}
		return 0;
	}
	static function getRGBAColorFromColorKeyword($value) {
		$퍁 = ($value);
		switch($퍁->index) {
		case 0:
		{
			return cocktail_core_css_CSSColorValue::RGBA(240, 248, 255, 1.0);
		}break;
		case 1:
		{
			return cocktail_core_css_CSSColorValue::RGBA(250, 235, 215, 1.0);
		}break;
		case 2:
		{
			return cocktail_core_css_CSSColorValue::RGBA(0, 255, 255, 1.0);
		}break;
		case 3:
		{
			return cocktail_core_css_CSSColorValue::RGBA(127, 255, 212, 1.0);
		}break;
		case 4:
		{
			return cocktail_core_css_CSSColorValue::RGBA(240, 255, 255, 1.0);
		}break;
		case 5:
		{
			return cocktail_core_css_CSSColorValue::RGBA(245, 245, 220, 1.0);
		}break;
		case 6:
		{
			return cocktail_core_css_CSSColorValue::RGBA(255, 228, 196, 1.0);
		}break;
		case 7:
		{
			return cocktail_core_css_CSSColorValue::RGBA(0, 0, 0, 1.0);
		}break;
		case 8:
		{
			return cocktail_core_css_CSSColorValue::RGBA(255, 235, 205, 1.0);
		}break;
		case 9:
		{
			return cocktail_core_css_CSSColorValue::RGBA(0, 0, 255, 1.0);
		}break;
		case 10:
		{
			return cocktail_core_css_CSSColorValue::RGBA(138, 43, 226, 1.0);
		}break;
		case 11:
		{
			return cocktail_core_css_CSSColorValue::RGBA(165, 42, 42, 1.0);
		}break;
		case 12:
		{
			return cocktail_core_css_CSSColorValue::RGBA(222, 184, 135, 1.0);
		}break;
		case 13:
		{
			return cocktail_core_css_CSSColorValue::RGBA(95, 158, 160, 1.0);
		}break;
		case 14:
		{
			return cocktail_core_css_CSSColorValue::RGBA(127, 255, 0, 1.0);
		}break;
		case 15:
		{
			return cocktail_core_css_CSSColorValue::RGBA(210, 105, 30, 1.0);
		}break;
		case 16:
		{
			return cocktail_core_css_CSSColorValue::RGBA(255, 127, 80, 1.0);
		}break;
		case 17:
		{
			return cocktail_core_css_CSSColorValue::RGBA(100, 149, 237, 1.0);
		}break;
		case 18:
		{
			return cocktail_core_css_CSSColorValue::RGBA(255, 248, 220, 1.0);
		}break;
		case 19:
		{
			return cocktail_core_css_CSSColorValue::RGBA(220, 20, 60, 1.0);
		}break;
		case 20:
		{
			return cocktail_core_css_CSSColorValue::RGBA(0, 255, 255, 1.0);
		}break;
		case 21:
		{
			return cocktail_core_css_CSSColorValue::RGBA(0, 0, 139, 1.0);
		}break;
		case 22:
		{
			return cocktail_core_css_CSSColorValue::RGBA(0, 139, 139, 1.0);
		}break;
		case 23:
		{
			return cocktail_core_css_CSSColorValue::RGBA(184, 134, 11, 1.0);
		}break;
		case 24:
		{
			return cocktail_core_css_CSSColorValue::RGBA(169, 169, 169, 1.0);
		}break;
		case 25:
		{
			return cocktail_core_css_CSSColorValue::RGBA(0, 100, 0, 1.0);
		}break;
		case 26:
		{
			return cocktail_core_css_CSSColorValue::RGBA(169, 169, 169, 1.0);
		}break;
		case 27:
		{
			return cocktail_core_css_CSSColorValue::RGBA(189, 183, 107, 1.0);
		}break;
		case 28:
		{
			return cocktail_core_css_CSSColorValue::RGBA(139, 0, 139, 1.0);
		}break;
		case 29:
		{
			return cocktail_core_css_CSSColorValue::RGBA(85, 107, 47, 1.0);
		}break;
		case 30:
		{
			return cocktail_core_css_CSSColorValue::RGBA(255, 140, 0, 1.0);
		}break;
		case 31:
		{
			return cocktail_core_css_CSSColorValue::RGBA(153, 50, 204, 1.0);
		}break;
		case 32:
		{
			return cocktail_core_css_CSSColorValue::RGBA(139, 0, 0, 1.0);
		}break;
		case 33:
		{
			return cocktail_core_css_CSSColorValue::RGBA(233, 150, 122, 1.0);
		}break;
		case 34:
		{
			return cocktail_core_css_CSSColorValue::RGBA(143, 188, 143, 1.0);
		}break;
		case 35:
		{
			return cocktail_core_css_CSSColorValue::RGBA(72, 61, 139, 1.0);
		}break;
		case 36:
		{
			return cocktail_core_css_CSSColorValue::RGBA(47, 79, 79, 1.0);
		}break;
		case 37:
		{
			return cocktail_core_css_CSSColorValue::RGBA(47, 79, 79, 1.0);
		}break;
		case 38:
		{
			return cocktail_core_css_CSSColorValue::RGBA(0, 206, 209, 1.0);
		}break;
		case 39:
		{
			return cocktail_core_css_CSSColorValue::RGBA(148, 0, 211, 1.0);
		}break;
		case 40:
		{
			return cocktail_core_css_CSSColorValue::RGBA(255, 20, 147, 1.0);
		}break;
		case 41:
		{
			return cocktail_core_css_CSSColorValue::RGBA(0, 191, 255, 1.0);
		}break;
		case 42:
		{
			return cocktail_core_css_CSSColorValue::RGBA(105, 105, 105, 1.0);
		}break;
		case 43:
		{
			return cocktail_core_css_CSSColorValue::RGBA(105, 105, 105, 1.0);
		}break;
		case 44:
		{
			return cocktail_core_css_CSSColorValue::RGBA(30, 144, 255, 1.0);
		}break;
		case 45:
		{
			return cocktail_core_css_CSSColorValue::RGBA(178, 34, 34, 1.0);
		}break;
		case 46:
		{
			return cocktail_core_css_CSSColorValue::RGBA(255, 250, 240, 1.0);
		}break;
		case 47:
		{
			return cocktail_core_css_CSSColorValue::RGBA(34, 139, 34, 1.0);
		}break;
		case 48:
		{
			return cocktail_core_css_CSSColorValue::RGBA(255, 0, 255, 1.0);
		}break;
		case 49:
		{
			return cocktail_core_css_CSSColorValue::RGBA(220, 220, 220, 1.0);
		}break;
		case 50:
		{
			return cocktail_core_css_CSSColorValue::RGBA(248, 248, 255, 1.0);
		}break;
		case 51:
		{
			return cocktail_core_css_CSSColorValue::RGBA(255, 215, 0, 1.0);
		}break;
		case 52:
		{
			return cocktail_core_css_CSSColorValue::RGBA(218, 165, 32, 1.0);
		}break;
		case 53:
		{
			return cocktail_core_css_CSSColorValue::RGBA(128, 128, 128, 1.0);
		}break;
		case 54:
		{
			return cocktail_core_css_CSSColorValue::RGBA(0, 128, 0, 1.0);
		}break;
		case 55:
		{
			return cocktail_core_css_CSSColorValue::RGBA(173, 255, 47, 1.0);
		}break;
		case 56:
		{
			return cocktail_core_css_CSSColorValue::RGBA(128, 128, 128, 1.0);
		}break;
		case 57:
		{
			return cocktail_core_css_CSSColorValue::RGBA(240, 255, 240, 1.0);
		}break;
		case 58:
		{
			return cocktail_core_css_CSSColorValue::RGBA(255, 105, 180, 1.0);
		}break;
		case 59:
		{
			return cocktail_core_css_CSSColorValue::RGBA(205, 92, 92, 1.0);
		}break;
		case 60:
		{
			return cocktail_core_css_CSSColorValue::RGBA(75, 0, 130, 1.0);
		}break;
		case 61:
		{
			return cocktail_core_css_CSSColorValue::RGBA(255, 255, 240, 1.0);
		}break;
		case 62:
		{
			return cocktail_core_css_CSSColorValue::RGBA(240, 230, 140, 1.0);
		}break;
		case 63:
		{
			return cocktail_core_css_CSSColorValue::RGBA(230, 230, 250, 1.0);
		}break;
		case 64:
		{
			return cocktail_core_css_CSSColorValue::RGBA(255, 240, 245, 1.0);
		}break;
		case 65:
		{
			return cocktail_core_css_CSSColorValue::RGBA(124, 252, 0, 1.0);
		}break;
		case 66:
		{
			return cocktail_core_css_CSSColorValue::RGBA(255, 250, 205, 1.0);
		}break;
		case 67:
		{
			return cocktail_core_css_CSSColorValue::RGBA(173, 216, 130, 1.0);
		}break;
		case 68:
		{
			return cocktail_core_css_CSSColorValue::RGBA(240, 128, 128, 1.0);
		}break;
		case 69:
		{
			return cocktail_core_css_CSSColorValue::RGBA(224, 255, 255, 1.0);
		}break;
		case 70:
		{
			return cocktail_core_css_CSSColorValue::RGBA(250, 250, 210, 1.0);
		}break;
		case 71:
		{
			return cocktail_core_css_CSSColorValue::RGBA(211, 211, 211, 1.0);
		}break;
		case 72:
		{
			return cocktail_core_css_CSSColorValue::RGBA(144, 238, 144, 1.0);
		}break;
		case 73:
		{
			return cocktail_core_css_CSSColorValue::RGBA(211, 211, 211, 1.0);
		}break;
		case 74:
		{
			return cocktail_core_css_CSSColorValue::RGBA(255, 182, 193, 1.0);
		}break;
		case 75:
		{
			return cocktail_core_css_CSSColorValue::RGBA(255, 160, 122, 1.0);
		}break;
		case 76:
		{
			return cocktail_core_css_CSSColorValue::RGBA(32, 178, 170, 1.0);
		}break;
		case 77:
		{
			return cocktail_core_css_CSSColorValue::RGBA(135, 206, 250, 1.0);
		}break;
		case 78:
		{
			return cocktail_core_css_CSSColorValue::RGBA(119, 136, 153, 1.0);
		}break;
		case 79:
		{
			return cocktail_core_css_CSSColorValue::RGBA(119, 136, 153, 1.0);
		}break;
		case 80:
		{
			return cocktail_core_css_CSSColorValue::RGBA(176, 196, 222, 1.0);
		}break;
		case 81:
		{
			return cocktail_core_css_CSSColorValue::RGBA(255, 255, 224, 1.0);
		}break;
		case 82:
		{
			return cocktail_core_css_CSSColorValue::RGBA(0, 255, 0, 1.0);
		}break;
		case 83:
		{
			return cocktail_core_css_CSSColorValue::RGBA(50, 205, 50, 1.0);
		}break;
		case 84:
		{
			return cocktail_core_css_CSSColorValue::RGBA(250, 240, 230, 1.0);
		}break;
		case 85:
		{
			return cocktail_core_css_CSSColorValue::RGBA(255, 0, 255, 1.0);
		}break;
		case 86:
		{
			return cocktail_core_css_CSSColorValue::RGBA(128, 0, 0, 1.0);
		}break;
		case 87:
		{
			return cocktail_core_css_CSSColorValue::RGBA(102, 205, 170, 1.0);
		}break;
		case 88:
		{
			return cocktail_core_css_CSSColorValue::RGBA(0, 0, 205, 1.0);
		}break;
		case 89:
		{
			return cocktail_core_css_CSSColorValue::RGBA(186, 85, 211, 1.0);
		}break;
		case 90:
		{
			return cocktail_core_css_CSSColorValue::RGBA(147, 112, 219, 1.0);
		}break;
		case 91:
		{
			return cocktail_core_css_CSSColorValue::RGBA(60, 179, 113, 1.0);
		}break;
		case 92:
		{
			return cocktail_core_css_CSSColorValue::RGBA(123, 104, 238, 1.0);
		}break;
		case 93:
		{
			return cocktail_core_css_CSSColorValue::RGBA(0, 250, 154, 1.0);
		}break;
		case 94:
		{
			return cocktail_core_css_CSSColorValue::RGBA(72, 209, 204, 1.0);
		}break;
		case 95:
		{
			return cocktail_core_css_CSSColorValue::RGBA(199, 21, 133, 1.0);
		}break;
		case 96:
		{
			return cocktail_core_css_CSSColorValue::RGBA(25, 25, 112, 1.0);
		}break;
		case 97:
		{
			return cocktail_core_css_CSSColorValue::RGBA(245, 255, 250, 1.0);
		}break;
		case 98:
		{
			return cocktail_core_css_CSSColorValue::RGBA(255, 228, 225, 1.0);
		}break;
		case 99:
		{
			return cocktail_core_css_CSSColorValue::RGBA(255, 228, 181, 1.0);
		}break;
		case 100:
		{
			return cocktail_core_css_CSSColorValue::RGBA(255, 222, 173, 1.0);
		}break;
		case 101:
		{
			return cocktail_core_css_CSSColorValue::RGBA(0, 0, 128, 1.0);
		}break;
		case 102:
		{
			return cocktail_core_css_CSSColorValue::RGBA(253, 245, 230, 1.0);
		}break;
		case 103:
		{
			return cocktail_core_css_CSSColorValue::RGBA(128, 128, 0, 1.0);
		}break;
		case 104:
		{
			return cocktail_core_css_CSSColorValue::RGBA(107, 142, 35, 1.0);
		}break;
		case 105:
		{
			return cocktail_core_css_CSSColorValue::RGBA(255, 165, 0, 1.0);
		}break;
		case 106:
		{
			return cocktail_core_css_CSSColorValue::RGBA(255, 69, 0, 1.0);
		}break;
		case 107:
		{
			return cocktail_core_css_CSSColorValue::RGBA(218, 112, 214, 1.0);
		}break;
		case 108:
		{
			return cocktail_core_css_CSSColorValue::RGBA(238, 232, 170, 1.0);
		}break;
		case 109:
		{
			return cocktail_core_css_CSSColorValue::RGBA(152, 251, 152, 1.0);
		}break;
		case 110:
		{
			return cocktail_core_css_CSSColorValue::RGBA(175, 238, 238, 1.0);
		}break;
		case 111:
		{
			return cocktail_core_css_CSSColorValue::RGBA(219, 112, 147, 1.0);
		}break;
		case 112:
		{
			return cocktail_core_css_CSSColorValue::RGBA(255, 239, 213, 1.0);
		}break;
		case 113:
		{
			return cocktail_core_css_CSSColorValue::RGBA(255, 218, 185, 1.0);
		}break;
		case 114:
		{
			return cocktail_core_css_CSSColorValue::RGBA(205, 133, 63, 1.0);
		}break;
		case 115:
		{
			return cocktail_core_css_CSSColorValue::RGBA(255, 192, 203, 1.0);
		}break;
		case 116:
		{
			return cocktail_core_css_CSSColorValue::RGBA(221, 160, 221, 1.0);
		}break;
		case 117:
		{
			return cocktail_core_css_CSSColorValue::RGBA(176, 224, 230, 1.0);
		}break;
		case 118:
		{
			return cocktail_core_css_CSSColorValue::RGBA(255, 165, 0, 1.0);
		}break;
		case 119:
		{
			return cocktail_core_css_CSSColorValue::RGBA(255, 0, 0, 1.0);
		}break;
		case 120:
		{
			return cocktail_core_css_CSSColorValue::RGBA(188, 143, 143, 1.0);
		}break;
		case 121:
		{
			return cocktail_core_css_CSSColorValue::RGBA(65, 105, 225, 1.0);
		}break;
		case 122:
		{
			return cocktail_core_css_CSSColorValue::RGBA(139, 69, 19, 1.0);
		}break;
		case 123:
		{
			return cocktail_core_css_CSSColorValue::RGBA(250, 128, 114, 1.0);
		}break;
		case 124:
		{
			return cocktail_core_css_CSSColorValue::RGBA(244, 164, 96, 1.0);
		}break;
		case 125:
		{
			return cocktail_core_css_CSSColorValue::RGBA(46, 139, 87, 1.0);
		}break;
		case 126:
		{
			return cocktail_core_css_CSSColorValue::RGBA(255, 245, 238, 1.0);
		}break;
		case 127:
		{
			return cocktail_core_css_CSSColorValue::RGBA(160, 82, 45, 1.0);
		}break;
		case 128:
		{
			return cocktail_core_css_CSSColorValue::RGBA(192, 192, 192, 1.0);
		}break;
		case 129:
		{
			return cocktail_core_css_CSSColorValue::RGBA(135, 206, 235, 1.0);
		}break;
		case 130:
		{
			return cocktail_core_css_CSSColorValue::RGBA(106, 90, 205, 1.0);
		}break;
		case 131:
		{
			return cocktail_core_css_CSSColorValue::RGBA(112, 128, 144, 1.0);
		}break;
		case 132:
		{
			return cocktail_core_css_CSSColorValue::RGBA(112, 128, 144, 1.0);
		}break;
		case 133:
		{
			return cocktail_core_css_CSSColorValue::RGBA(255, 250, 250, 1.0);
		}break;
		case 134:
		{
			return cocktail_core_css_CSSColorValue::RGBA(0, 255, 127, 1.0);
		}break;
		case 135:
		{
			return cocktail_core_css_CSSColorValue::RGBA(70, 130, 180, 1.0);
		}break;
		case 136:
		{
			return cocktail_core_css_CSSColorValue::RGBA(210, 180, 140, 1.0);
		}break;
		case 137:
		{
			return cocktail_core_css_CSSColorValue::RGBA(0, 128, 128, 1.0);
		}break;
		case 138:
		{
			return cocktail_core_css_CSSColorValue::RGBA(216, 191, 216, 1.0);
		}break;
		case 139:
		{
			return cocktail_core_css_CSSColorValue::RGBA(255, 99, 71, 1.0);
		}break;
		case 140:
		{
			return cocktail_core_css_CSSColorValue::RGBA(64, 224, 208, 1.0);
		}break;
		case 141:
		{
			return cocktail_core_css_CSSColorValue::RGBA(238, 130, 238, 1.0);
		}break;
		case 142:
		{
			return cocktail_core_css_CSSColorValue::RGBA(245, 222, 179, 1.0);
		}break;
		case 143:
		{
			return cocktail_core_css_CSSColorValue::RGBA(255, 255, 255, 1.0);
		}break;
		case 144:
		{
			return cocktail_core_css_CSSColorValue::RGBA(245, 245, 245, 1.0);
		}break;
		case 145:
		{
			return cocktail_core_css_CSSColorValue::RGBA(255, 255, 0, 1.0);
		}break;
		case 146:
		{
			return cocktail_core_css_CSSColorValue::RGBA(154, 205, 50, 1.0);
		}break;
		}
	}
	static function getLargerFontSize($parentFontSize) {
		$fontSizeTable = new _hx_array(array(9, 10, 13, 16, 18, 24, 32));
		$fontSize = $fontSizeTable[$fontSizeTable->length - 1];
		{
			$_g1 = 0; $_g = $fontSizeTable->length;
			while($_g1 < $_g) {
				$i = $_g1++;
				if($fontSizeTable->팤[$i] > $parentFontSize) {
					$fontSize = $fontSizeTable[$i];
					break;
				}
				unset($i);
			}
		}
		return $fontSize;
	}
	static function getSmallerFontSize($parentFontSize) {
		$fontSizeTable = new _hx_array(array(9, 10, 13, 16, 18, 24, 32));
		$fontSize = $fontSizeTable[0];
		$i = $fontSizeTable->length - 1;
		while($i > 0) {
			if($fontSizeTable->팤[$i] < $parentFontSize) {
				$fontSize = $fontSizeTable[$i];
				break;
			}
			$i--;
		}
		return $fontSize;
	}
	function __toString() { return 'cocktail.core.css.CSSValueConverter'; }
}

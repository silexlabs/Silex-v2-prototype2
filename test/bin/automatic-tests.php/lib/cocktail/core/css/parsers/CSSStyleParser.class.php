<?php

class cocktail_core_css_parsers_CSSStyleParser {
	public function __construct() { 
	}
	static $_position = 0;
	static function parseStyle($styles) {
		cocktail_core_css_parsers_CSSStyleParser::$_position = 0;
		$state = cocktail_core_css_parsers_StyleDeclarationParserState::$IGNORE_SPACES;
		$next = cocktail_core_css_parsers_StyleDeclarationParserState::$BEGIN;
		$typedProperties = new _hx_array(array());
		$position = 0;
		$start = $position;
		$c = ord(substr($styles,$position,1));
		$styleName = null;
		while(!($c === 0)) {
			$퍁 = ($state);
			switch($퍁->index) {
			case 2:
			{
				switch($c) {
				case 10:case 13:case 9:case 32:{
				}break;
				default:{
					$state = $next;
					continue 3;
				}break;
				}
			}break;
			case 5:
			{
				switch($c) {
				case 47:{
					$state = cocktail_core_css_parsers_StyleDeclarationParserState::$BEGIN_COMMENT;
				}break;
				default:{
					$start = $position;
					$state = cocktail_core_css_parsers_StyleDeclarationParserState::$STYLE_NAME;
					continue 3;
				}break;
				}
			}break;
			case 7:
			{
				if($c !== 42) {
					$state = cocktail_core_css_parsers_StyleDeclarationParserState::$INVALID_STYLE;
				} else {
					$state = cocktail_core_css_parsers_StyleDeclarationParserState::$COMMENT;
				}
			}break;
			case 6:
			{
				if($c === 42) {
					$state = cocktail_core_css_parsers_StyleDeclarationParserState::$END_COMMENT;
				}
			}break;
			case 8:
			{
				if($c === 47) {
					$state = cocktail_core_css_parsers_StyleDeclarationParserState::$IGNORE_SPACES;
					$next = cocktail_core_css_parsers_StyleDeclarationParserState::$BEGIN;
				} else {
					$state = cocktail_core_css_parsers_StyleDeclarationParserState::$INVALID_STYLE;
				}
			}break;
			case 0:
			{
				if(!($c >= 97 && $c <= 122 || $c >= 65 && $c <= 90 || $c === 45)) {
					switch($c) {
					case 58:{
						$styleName = _hx_substr($styles, $start, $position - $start);
						$state = cocktail_core_css_parsers_StyleDeclarationParserState::$IGNORE_SPACES;
						$next = cocktail_core_css_parsers_StyleDeclarationParserState::$STYLE_VALUE;
						continue 3;
					}break;
					case 32:{
						$styleName = _hx_substr($styles, $start, $position - $start);
						$state = cocktail_core_css_parsers_StyleDeclarationParserState::$IGNORE_SPACES;
						$next = cocktail_core_css_parsers_StyleDeclarationParserState::$STYLE_SEPARATOR;
						continue 3;
					}break;
					default:{
						$state = cocktail_core_css_parsers_StyleDeclarationParserState::$INVALID_STYLE;
						continue 3;
					}break;
					}
				}
			}break;
			case 4:
			{
				if($c === 58) {
					$state = cocktail_core_css_parsers_StyleDeclarationParserState::$STYLE_VALUE;
				} else {
					$state = cocktail_core_css_parsers_StyleDeclarationParserState::$INVALID_STYLE;
					continue 2;
				}
			}break;
			case 1:
			{
				$typedProperty = cocktail_core_css_parsers_CSSStyleParser::parseStyleValue($styleName, $styles, $position);
				$position = cocktail_core_css_parsers_CSSStyleParser::$_position;
				if($typedProperty !== null) {
					$typedProperties->push($typedProperty);
				}
				$state = cocktail_core_css_parsers_StyleDeclarationParserState::$IGNORE_SPACES;
				$next = cocktail_core_css_parsers_StyleDeclarationParserState::$BEGIN;
			}break;
			case 3:
			{
				return new _hx_array(array());
			}break;
			}
			$c = ord(substr($styles,++$position,1));
		}
		return $typedProperties;
	}
	static function parseStyleValue($propertyName, $styles, $position) {
		$c = ord(substr($styles,$position,1));
		if($c === 58) {
			++$position;
			$c = ord(substr($styles,$position,1));
		}
		$state = cocktail_core_css_parsers_StyleValueParserState::$IGNORE_SPACES;
		$next = cocktail_core_css_parsers_StyleValueParserState::$BEGIN_VALUE;
		$start = $position;
		$important = false;
		$styleValues = new _hx_array(array());
		$styleValuesLists = new _hx_array(array());
		while(!($c === 0)) {
			$퍁 = ($state);
			switch($퍁->index) {
			case 0:
			{
				switch($c) {
				case 10:case 13:case 9:case 32:{
				}break;
				default:{
					$state = $next;
					continue 3;
				}break;
				}
			}break;
			case 4:
			{
				if(($c === 0)) {
					$state = cocktail_core_css_parsers_StyleValueParserState::$END;
					continue 2;
				} else {
					switch($c) {
					case 32:{
						$state = cocktail_core_css_parsers_StyleValueParserState::$IGNORE_SPACES;
						$next = cocktail_core_css_parsers_StyleValueParserState::$BEGIN_VALUE;
					}break;
					case 44:{
						$styleValuesLists->push($styleValues);
						$styleValues = new _hx_array(array());
						$state = cocktail_core_css_parsers_StyleValueParserState::$IGNORE_SPACES;
						$next = cocktail_core_css_parsers_StyleValueParserState::$BEGIN_VALUE;
					}break;
					case 59:{
						$state = cocktail_core_css_parsers_StyleValueParserState::$END;
						continue 3;
					}break;
					default:{
						$state = cocktail_core_css_parsers_StyleValueParserState::$INVALID_STYLE_VALUE;
						continue 3;
					}break;
					}
				}
			}break;
			case 1:
			{
				switch($c) {
				case 44:{
					$styleValuesLists->push($styleValues);
					$styleValues = new _hx_array(array());
					$state = cocktail_core_css_parsers_StyleValueParserState::$IGNORE_SPACES;
					$next = cocktail_core_css_parsers_StyleValueParserState::$BEGIN_VALUE;
					$c = ord(substr($styles,++$position,1));
					continue 3;
				}break;
				case 59:{
					$state = cocktail_core_css_parsers_StyleValueParserState::$END;
					continue 3;
				}break;
				case 45:{
					$state = cocktail_core_css_parsers_StyleValueParserState::$NUMBER_INTEGER_DIMENSION_PERCENTAGE;
					$start = $position;
					continue 3;
				}break;
				case 46:{
					$state = cocktail_core_css_parsers_StyleValueParserState::$NUMBER_INTEGER_DIMENSION_PERCENTAGE;
					$start = $position;
					continue 3;
				}break;
				case 35:{
					$state = cocktail_core_css_parsers_StyleValueParserState::$HEX;
					$start = $position;
					continue 3;
				}break;
				case 33:{
					$state = cocktail_core_css_parsers_StyleValueParserState::$IMPORTANT;
					$start = $position;
					continue 3;
				}break;
				case 34:case 39:{
					$state = cocktail_core_css_parsers_StyleValueParserState::$STRING;
					$start = $position;
					continue 3;
				}break;
				}
				if($c >= 97 && $c <= 122 || $c >= 65 && $c <= 90 || $c === 45) {
					$state = cocktail_core_css_parsers_StyleValueParserState::$IDENT_FUNCTION;
					$start = $position;
					continue 2;
				}
				if($c >= 48 && $c <= 57) {
					$state = cocktail_core_css_parsers_StyleValueParserState::$NUMBER_INTEGER_DIMENSION_PERCENTAGE;
					$start = $position;
					continue 2;
				}
				$state = cocktail_core_css_parsers_StyleValueParserState::$INVALID_STYLE_VALUE;
				continue 2;
			}break;
			case 7:
			{
				if(($c === 0)) {
					break 2;
				} else {
					if($c !== 59) {
						$state = cocktail_core_css_parsers_StyleValueParserState::$INVALID_STYLE_VALUE;
						continue 2;
					} else {
						break 2;
					}
				}
			}break;
			case 6:
			{
				$endPosition = cocktail_core_css_parsers_CSSStyleParser::parseImportant($styles, ++$position);
				if($endPosition !== -1) {
					$position = $endPosition;
					$important = true;
					$state = cocktail_core_css_parsers_StyleValueParserState::$IGNORE_SPACES;
					$next = cocktail_core_css_parsers_StyleValueParserState::$END;
				} else {
					$state = cocktail_core_css_parsers_StyleValueParserState::$INVALID_STYLE_VALUE;
					continue 2;
				}
			}break;
			case 8:
			{
				$endPosition = cocktail_core_css_parsers_CSSStyleParser::parseHexaColor($styles, ++$position, $styleValues);
				if($endPosition !== -1) {
					$position = $endPosition;
					$state = cocktail_core_css_parsers_StyleValueParserState::$SPACE_OR_END;
				} else {
					$state = cocktail_core_css_parsers_StyleValueParserState::$INVALID_STYLE_VALUE;
					continue 2;
				}
			}break;
			case 9:
			{
				$endPosition = cocktail_core_css_parsers_CSSStyleParser::parseString($styles, $position, $styleValues);
				if($endPosition !== -1) {
					$position = $endPosition;
					$c = ord(substr($styles,$position,1));
					$state = cocktail_core_css_parsers_StyleValueParserState::$SPACE_OR_END;
					continue 2;
				} else {
					$state = cocktail_core_css_parsers_StyleValueParserState::$INVALID_STYLE_VALUE;
					continue 2;
				}
			}break;
			case 2:
			{
				$endPosition = cocktail_core_css_parsers_CSSStyleParser::parseIdentOrFunctionnalNotation($styles, $position, $styleValues);
				if($endPosition !== -1) {
					$position = $endPosition;
					$c = ord(substr($styles,$position,1));
					$state = cocktail_core_css_parsers_StyleValueParserState::$SPACE_OR_END;
					continue 2;
				} else {
					$state = cocktail_core_css_parsers_StyleValueParserState::$INVALID_STYLE_VALUE;
					continue 2;
				}
			}break;
			case 3:
			{
				$endPosition = cocktail_core_css_parsers_CSSStyleParser::parseIntegerNumberDimensionOrPercentage($styles, $position, $styleValues);
				if($endPosition !== -1) {
					$position = $endPosition;
					$c = ord(substr($styles,$position,1));
					$state = cocktail_core_css_parsers_StyleValueParserState::$SPACE_OR_END;
					continue 2;
				} else {
					$state = cocktail_core_css_parsers_StyleValueParserState::$INVALID_STYLE_VALUE;
					continue 2;
				}
			}break;
			case 5:
			{
				if($c === 59) {
					cocktail_core_css_parsers_CSSStyleParser::$_position = ++$position;
					return null;
				}
			}break;
			}
			$c = ord(substr($styles,++$position,1));
		}
		cocktail_core_css_parsers_CSSStyleParser::$_position = $position;
		if($styleValuesLists->length === 0) {
			if($styleValues->length === 1) {
				return new cocktail_core_css_TypedPropertyVO($propertyName, $styleValues[0], $important);
			} else {
				return new cocktail_core_css_TypedPropertyVO($propertyName, cocktail_core_css_CSSPropertyValue::GROUP($styleValues), $important);
			}
		} else {
			$styleListProperty = new _hx_array(array());
			if($styleValues->length > 0) {
				$styleValuesLists->push($styleValues);
			}
			{
				$_g1 = 0; $_g = $styleValuesLists->length;
				while($_g1 < $_g) {
					$i = $_g1++;
					if(_hx_array_get($styleValuesLists, $i)->length === 1) {
						$styleListProperty->push($styleValuesLists[$i][0]);
					} else {
						$styleListProperty->push(cocktail_core_css_CSSPropertyValue::GROUP($styleValuesLists[$i]));
					}
					unset($i);
				}
			}
			return new cocktail_core_css_TypedPropertyVO($propertyName, cocktail_core_css_CSSPropertyValue::CSS_LIST($styleListProperty), $important);
		}
	}
	static function parseImportant($styles, $position) {
		$c = ord(substr($styles,$position,1));
		$start = $position;
		while($c >= 97 && $c <= 122 || $c >= 65 && $c <= 90 || $c === 45) {
			$c = ord(substr($styles,++$position,1));
		}
		$ident = _hx_substr($styles, $start, $position - $start);
		if($ident === "important") {
			return $position;
		}
		return -1;
	}
	static function parseIntegerNumberDimensionOrPercentage($styles, $position, $styleValues) {
		$c = ord(substr($styles,$position,1));
		$start = $position;
		if($c === 45) {
			$c = ord(substr($styles,++$position,1));
		}
		$isNumber = $c === 46;
		while($c >= 48 && $c <= 57) {
			$c = ord(substr($styles,++$position,1));
		}
		if(($c === 0) && $isNumber === false) {
			$integer = Std::parseInt(_hx_substr($styles, $start, $position - $start));
			$styleValues->push(cocktail_core_css_CSSPropertyValue::INTEGER($integer));
			return $position;
		}
		if($c === 46) {
			$c = ord(substr($styles,++$position,1));
			$isNumber = true;
			while($c >= 48 && $c <= 57) {
				$c = ord(substr($styles,++$position,1));
			}
		}
		if(($c === 0)) {
			$number = Std::parseFloat(_hx_substr($styles, $start, $position - $start));
			$styleValues->push(cocktail_core_css_CSSPropertyValue::NUMBER($number));
			return $position;
		}
		if($c >= 97 && $c <= 122 || $c >= 65 && $c <= 90 || $c === 45) {
			$numberOrInteger = Std::parseFloat(_hx_substr($styles, $start, $position - $start));
			$position = cocktail_core_css_parsers_CSSStyleParser::parseDimension($numberOrInteger, $styles, $position, $styleValues);
		} else {
			switch($c) {
			case 37:{
				$numberOrInteger = Std::parseFloat(_hx_substr($styles, $start, $position - $start));
				$styleValues->push(cocktail_core_css_CSSPropertyValue::PERCENTAGE($numberOrInteger));
				++$position;
			}break;
			default:{
				if($isNumber) {
					$number = Std::parseFloat(_hx_substr($styles, $start, $position - $start));
					$styleValues->push(cocktail_core_css_CSSPropertyValue::NUMBER($number));
				} else {
					$integer = Std::parseInt(_hx_substr($styles, $start, $position - $start));
					$styleValues->push(cocktail_core_css_CSSPropertyValue::INTEGER($integer));
				}
			}break;
			}
		}
		return $position;
	}
	static function parseDimension($numberOrInteger, $styles, $position, $styleValues) {
		$c = ord(substr($styles,$position,1));
		$start = $position;
		while($c >= 97 && $c <= 122 || $c >= 65 && $c <= 90 || $c === 45) {
			$c = ord(substr($styles,++$position,1));
		}
		$ident = _hx_substr($styles, $start, $position - $start);
		switch($ident) {
		case "px":{
			$styleValues->push(cocktail_core_css_CSSPropertyValue::LENGTH(cocktail_core_css_CSSLengthValue::PX($numberOrInteger)));
		}break;
		case "em":{
			$styleValues->push(cocktail_core_css_CSSPropertyValue::LENGTH(cocktail_core_css_CSSLengthValue::EM($numberOrInteger)));
		}break;
		case "ex":{
			$styleValues->push(cocktail_core_css_CSSPropertyValue::LENGTH(cocktail_core_css_CSSLengthValue::EX($numberOrInteger)));
		}break;
		case "mm":{
			$styleValues->push(cocktail_core_css_CSSPropertyValue::LENGTH(cocktail_core_css_CSSLengthValue::MM($numberOrInteger)));
		}break;
		case "in":{
			$styleValues->push(cocktail_core_css_CSSPropertyValue::LENGTH(cocktail_core_css_CSSLengthValue::IN($numberOrInteger)));
		}break;
		case "cm":{
			$styleValues->push(cocktail_core_css_CSSPropertyValue::LENGTH(cocktail_core_css_CSSLengthValue::CM($numberOrInteger)));
		}break;
		case "pc":{
			$styleValues->push(cocktail_core_css_CSSPropertyValue::LENGTH(cocktail_core_css_CSSLengthValue::PC($numberOrInteger)));
		}break;
		case "pt":{
			$styleValues->push(cocktail_core_css_CSSPropertyValue::LENGTH(cocktail_core_css_CSSLengthValue::PT($numberOrInteger)));
		}break;
		case "deg":{
			$styleValues->push(cocktail_core_css_CSSPropertyValue::ANGLE(cocktail_core_css_CSSAngleValue::DEG($numberOrInteger)));
		}break;
		case "rad":{
			$styleValues->push(cocktail_core_css_CSSPropertyValue::ANGLE(cocktail_core_css_CSSAngleValue::RAD($numberOrInteger)));
		}break;
		case "grad":{
			$styleValues->push(cocktail_core_css_CSSPropertyValue::ANGLE(cocktail_core_css_CSSAngleValue::GRAD($numberOrInteger)));
		}break;
		case "turn":{
			$styleValues->push(cocktail_core_css_CSSPropertyValue::ANGLE(cocktail_core_css_CSSAngleValue::TURN($numberOrInteger)));
		}break;
		case "s":{
			$styleValues->push(cocktail_core_css_CSSPropertyValue::TIME(cocktail_core_css_CSSTimeValue::SECONDS($numberOrInteger)));
		}break;
		case "ms":{
			$styleValues->push(cocktail_core_css_CSSPropertyValue::TIME(cocktail_core_css_CSSTimeValue::MILLISECONDS($numberOrInteger)));
		}break;
		case "Hz":{
			$styleValues->push(cocktail_core_css_CSSPropertyValue::FREQUENCY(cocktail_core_css_CSSFrequencyValue::HERTZ($numberOrInteger)));
		}break;
		case "kHz":{
			$styleValues->push(cocktail_core_css_CSSPropertyValue::FREQUENCY(cocktail_core_css_CSSFrequencyValue::KILO_HERTZ($numberOrInteger)));
		}break;
		case "dpi":{
			$styleValues->push(cocktail_core_css_CSSPropertyValue::RESOLUTION(cocktail_core_css_CSSResolutionValue::DPI($numberOrInteger)));
		}break;
		case "dpcm":{
			$styleValues->push(cocktail_core_css_CSSPropertyValue::RESOLUTION(cocktail_core_css_CSSResolutionValue::DPCM($numberOrInteger)));
		}break;
		case "dppx":{
			$styleValues->push(cocktail_core_css_CSSPropertyValue::RESOLUTION(cocktail_core_css_CSSResolutionValue::DPPX($numberOrInteger)));
		}break;
		default:{
			return -1;
		}break;
		}
		return $position;
	}
	static function parseString($styles, $position, $styleValues) {
		$quote = ord(substr($styles,$position,1));
		$start = ++$position;
		$c = ord(substr($styles,$position,1));
		while($c !== $quote) {
			if(($c === 0)) {
				return -1;
			}
			$c = ord(substr($styles,++$position,1));
		}
		$stringValue = _hx_substr($styles, $start, $position - $start);
		$styleValues->push(cocktail_core_css_CSSPropertyValue::STRING($stringValue));
		return ++$position;
	}
	static function parseIdentOrFunctionnalNotation($styles, $position, $styleValues) {
		$c = ord(substr($styles,$position,1));
		$start = $position;
		while($c >= 97 && $c <= 122 || $c >= 65 && $c <= 90 || $c === 45) {
			$c = ord(substr($styles,++$position,1));
		}
		$ident = _hx_substr($styles, $start, $position - $start);
		switch($c) {
		case 40:{
			$position = cocktail_core_css_parsers_CSSStyleParser::parseFunctionnalNotation($ident, $styles, ++$position, $styleValues);
		}break;
		default:{
			cocktail_core_css_parsers_CSSStyleParser::parseIdent($ident, $styleValues);
		}break;
		}
		return $position;
	}
	static function parseHexaColor($styles, $position, $styleValues) {
		$c = ord(substr($styles,$position,1));
		$start = $position;
		while($c >= 97 && $c <= 102 || $c >= 65 && $c <= 70 || $c >= 48 && $c <= 57) {
			$c = ord(substr($styles,++$position,1));
		}
		$hexa = _hx_substr($styles, $start, $position - $start);
		if(strlen($hexa) === 3 || strlen($hexa) === 6) {
			$styleValues->push(cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::HEX($hexa)));
			return --$position;
		}
		return -1;
	}
	static function parseFunctionnalNotation($ident, $styles, $position, $styleValues) {
		$c = ord(substr($styles,$position,1));
		$start = $position;
		while($c !== 41) {
			if(($c === 0)) {
				return -1;
			}
			$c = ord(substr($styles,++$position,1));
		}
		$cssFunction = _hx_substr($styles, $start, $position - $start);
		$functionValues = cocktail_core_css_parsers_CSSStyleParser::parseStyleValue("", $cssFunction, 0);
		$functionValue = cocktail_core_css_parsers_CSSStyleParser::getFunctionalNotation($ident, $functionValues->typedValue);
		if($functionValue === null) {
			return -1;
		} else {
			$styleValues->push($functionValue);
			return ++$position;
		}
	}
	static function getFunctionalNotation($name, $value) {
		switch($name) {
		case "rgb":{
			return cocktail_core_css_parsers_CSSStyleParser::parseRGBOrRGBA($value, false);
		}break;
		case "rgba":{
			return cocktail_core_css_parsers_CSSStyleParser::parseRGBOrRGBA($value, true);
		}break;
		case "url":{
			$퍁 = ($value);
			switch($퍁->index) {
			case 3:
			$value1 = $퍁->params[0];
			{
				return cocktail_core_css_CSSPropertyValue::URL($value1);
			}break;
			case 6:
			$value1 = $퍁->params[0];
			{
				return cocktail_core_css_CSSPropertyValue::URL($value1);
			}break;
			default:{
				return null;
			}break;
			}
		}break;
		default:{
			return null;
		}break;
		}
	}
	static function parseRGBOrRGBA($property, $isRGBA) {
		$퍁 = ($property);
		switch($퍁->index) {
		case 14:
		$value = $퍁->params[0];
		{
			if($isRGBA === true) {
				if($value->length !== 4) {
					return null;
				}
			} else {
				if($value->length !== 3) {
					return null;
				}
			}
			$isPercentRGB = false;
			$red = 0;
			$green = 0;
			$blue = 0;
			$percentRed = 0.0;
			$percentGreen = 0.0;
			$percentBlue = 0.0;
			$퍁2 = ($value[0]);
			switch($퍁2->index) {
			case 0:
			$value1 = $퍁2->params[0];
			{
				$red = $value1;
			}break;
			case 2:
			$value1 = $퍁2->params[0];
			{
				$percentRed = $value1;
				$isPercentRGB = true;
			}break;
			default:{
				return null;
			}break;
			}
			$퍁2 = ($value[1]);
			switch($퍁2->index) {
			case 0:
			$value1 = $퍁2->params[0];
			{
				$green = $value1;
				if($isPercentRGB === true) {
					return null;
				}
			}break;
			case 2:
			$value1 = $퍁2->params[0];
			{
				$percentGreen = $value1;
				if($isPercentRGB === false) {
					return null;
				}
			}break;
			default:{
				return null;
			}break;
			}
			$퍁2 = ($value[2]);
			switch($퍁2->index) {
			case 0:
			$value1 = $퍁2->params[0];
			{
				$blue = $value1;
				if($isPercentRGB === true) {
					return null;
				}
			}break;
			case 2:
			$value1 = $퍁2->params[0];
			{
				$percentBlue = $value1;
				if($isPercentRGB === false) {
					return null;
				}
			}break;
			default:{
				return null;
			}break;
			}
			if($isRGBA === false) {
				if($isPercentRGB === true) {
					return cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::RGB_PERCENTAGE($percentRed, $percentGreen, $percentBlue));
				} else {
					return cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::RGB($red, $green, $blue));
				}
			} else {
				$alpha = 0.0;
				$퍁2 = ($value[3]);
				switch($퍁2->index) {
				case 1:
				$value1 = $퍁2->params[0];
				{
					$alpha = $value1;
				}break;
				case 0:
				$value1 = $퍁2->params[0];
				{
					$alpha = $value1;
				}break;
				default:{
					return null;
				}break;
				}
				if($isPercentRGB === true) {
					return cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::RGBA_PERCENTAGE($percentRed, $percentGreen, $percentBlue, $alpha));
				} else {
					return cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::RGBA($red, $green, $blue, $alpha));
				}
			}
			return null;
		}break;
		default:{
			return null;
		}break;
		}
	}
	static function parseIdent($ident, $styleValues) {
		$ident = strtolower($ident);
		switch($ident) {
		case "inherit":{
			$styleValues->push(cocktail_core_css_CSSPropertyValue::$INHERIT);
		}break;
		case "initial":{
			$styleValues->push(cocktail_core_css_CSSPropertyValue::$INITIAL);
		}break;
		default:{
			cocktail_core_css_parsers_CSSStyleParser::parseKeyword($ident, $styleValues);
		}break;
		}
	}
	static function parseKeyword($ident, $styleValues) {
		$cssPropertyValue = cocktail_core_css_CSSPropertyValue::IDENTIFIER($ident);
		switch($ident) {
		case "normal":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$NORMAL);
		}break;
		case "bold":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$BOLD);
		}break;
		case "bolder":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$BOLDER);
		}break;
		case "lighter":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$LIGHTER);
		}break;
		case "oblique":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$OBLIQUE);
		}break;
		case "italic":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$ITALIC);
		}break;
		case "small-caps":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$SMALL_CAPS);
		}break;
		case "pre":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$PRE);
		}break;
		case "no-wrap":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$NO_WRAP);
		}break;
		case "pre-wrap":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$PRE_WRAP);
		}break;
		case "pre-line":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$PRE_LINE);
		}break;
		case "left":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$LEFT);
		}break;
		case "right":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$RIGHT);
		}break;
		case "center":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$CENTER);
		}break;
		case "justify":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$JUSTIFY);
		}break;
		case "capitalize":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$CAPITALIZE);
		}break;
		case "uppercase":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$UPPERCASE);
		}break;
		case "lowercase":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$LOWERCASE);
		}break;
		case "none":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$NONE);
		}break;
		case "baseline":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$BASELINE);
		}break;
		case "sub":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$SUB);
		}break;
		case "super":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$SUPER);
		}break;
		case "top":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$TOP);
		}break;
		case "text-top":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$TEXT_TOP);
		}break;
		case "middle":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$MIDDLE);
		}break;
		case "bottom":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$BOTTOM);
		}break;
		case "text-bottom":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$TEXT_BOTTOM);
		}break;
		case "auto":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$AUTO);
		}break;
		case "block":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$BLOCK);
		}break;
		case "inline-block":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$INLINE_BLOCK);
		}break;
		case "inline":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$INLINE);
		}break;
		case "both":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$BOTH);
		}break;
		case "static":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$STATIC);
		}break;
		case "relative":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$RELATIVE);
		}break;
		case "absolute":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$ABSOLUTE);
		}break;
		case "fixed":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$FIXED);
		}break;
		case "visible":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$VISIBLE);
		}break;
		case "hidden":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$HIDDEN);
		}break;
		case "scroll":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$SCROLL);
		}break;
		case "border-box":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$BORDER_BOX);
		}break;
		case "padding-box":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$PADDING_BOX);
		}break;
		case "content-box":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$CONTENT_BOX);
		}break;
		case "contain":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$CONTAIN);
		}break;
		case "cover":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$COVER);
		}break;
		case "crosshair":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$CROSSHAIR);
		}break;
		case "default":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$DEFAULT);
		}break;
		case "pointer":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$POINTER);
		}break;
		case "text":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$TEXT);
		}break;
		case "all":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$ALL);
		}break;
		case "ease":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$EASE);
		}break;
		case "linear":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$LINEAR);
		}break;
		case "ease-in":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$EASE_IN);
		}break;
		case "ease-out":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$EASE_OUT);
		}break;
		case "ease-in-out":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$EASE_IN_OUT);
		}break;
		case "step-start":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$STEP_START);
		}break;
		case "step-end":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$STEP_END);
		}break;
		case "start":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$START);
		}break;
		case "end":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$END);
		}break;
		case "x-small":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$X_SMALL);
		}break;
		case "xx-small":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$XX_SMALL);
		}break;
		case "x-large":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$X_LARGE);
		}break;
		case "xx-large":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$XX_LARGE);
		}break;
		case "medium":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$MEDIUM);
		}break;
		case "smaller":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$SMALLER);
		}break;
		case "larger":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$LARGER);
		}break;
		case "space":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$SPACE);
		}break;
		case "round":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$ROUND);
		}break;
		case "large":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$LARGE);
		}break;
		case "small":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$SMALL);
		}break;
		case "repeat-x":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$REPEAT_X);
		}break;
		case "repeat-y":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$REPEAT_Y);
		}break;
		case "no-repeat":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$NO_REPEAT);
		}break;
		case "repeat":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$REPEAT);
		}break;
		case "transparent":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::$TRANSPARENT);
		}break;
		default:{
			$cssPropertyValue = cocktail_core_css_parsers_CSSStyleParser::parseColorKeyword($ident);
		}break;
		}
		if($cssPropertyValue === null) {
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::IDENTIFIER($ident);
		}
		$styleValues->push($cssPropertyValue);
	}
	static function parseColorKeyword($ident) {
		$cssPropertyValue = null;
		switch($ident) {
		case "aliceblue":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$ALICE_BLUE));
		}break;
		case "antiquewhite":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$ANTIQUE_WHITE));
		}break;
		case "aqua":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$AQUA));
		}break;
		case "aquamarine":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$AQUAMARINE));
		}break;
		case "azure":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$AZURE));
		}break;
		case "beige":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$BEIGE));
		}break;
		case "bisque":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$BISQUE));
		}break;
		case "dimgray":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$DIM_GRAY));
		}break;
		case "dimgrey":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$DIM_GREY));
		}break;
		case "blue":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$BLUE));
		}break;
		case "black":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$BLACK));
		}break;
		case "blanchedalmond":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$BLANCHE_DALMOND));
		}break;
		case "blueviolet":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$BLUE_VIOLET));
		}break;
		case "brown":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$BROWN));
		}break;
		case "burlywood":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$ALICE_BLUE));
		}break;
		case "cadetblue":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$CADET_BLUE));
		}break;
		case "chartreuse":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$CHARTREUSE));
		}break;
		case "chocolate":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$CHOCOLATE));
		}break;
		case "coral":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$CORAL));
		}break;
		case "cornflowerblue":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$CORNFLOWER_BLUE));
		}break;
		case "cornsilk":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$CORNSILK));
		}break;
		case "crimson":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$CRIMSON));
		}break;
		case "cyan":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$CYAN));
		}break;
		case "darkblue":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$DARK_BLUE));
		}break;
		case "darkgoldenrod":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$DARK_GOLDEN_ROD));
		}break;
		case "darkgray":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$DARK_GRAY));
		}break;
		case "darkgreen":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$DARK_GREEN));
		}break;
		case "darkgrey":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$DARK_GREY));
		}break;
		case "darkkhaki":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$DARK_KHAKI));
		}break;
		case "darkmagenta":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$DARK_MAGENTA));
		}break;
		case "darkolivegreen":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$DARK_OLIVE_GREEN));
		}break;
		case "darkorange":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$DARK_ORANGE));
		}break;
		case "darkorchid":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$DARK_ORCHID));
		}break;
		case "darkred":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$DARK_RED));
		}break;
		case "darksalmon":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$DARK_SALMON));
		}break;
		case "darkseagreen":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$DARK_SEA_GREEN));
		}break;
		case "darkslateblue":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$DARK_SLATE_BLUE));
		}break;
		case "darkslategray":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$DARK_SLATE_GRAY));
		}break;
		case "darkslategrey":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$DARK_SLATE_GREY));
		}break;
		case "darkturquoise":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$DARK_TURQUOISE));
		}break;
		case "darkviolet":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$DARK_VIOLET));
		}break;
		case "deeppink":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$DEEP_PINK));
		}break;
		case "deepskyblue":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$DEEP_SKY_BLUE));
		}break;
		case "dodgerblue":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$DODGER_BLUE));
		}break;
		case "firebrick":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$FIRE_BRICK));
		}break;
		case "floralwhite":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$FLORAL_WHITE));
		}break;
		case "forestgreen":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$FOREST_GREEN));
		}break;
		case "gainsboro":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$GAINSBORO));
		}break;
		case "ghostwhite":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$GHOST_WHITE));
		}break;
		case "gold":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$GOLD));
		}break;
		case "goldenrod":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$GOLDEN_ROD));
		}break;
		case "greenyellow":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$GREEN_YELLOW));
		}break;
		case "honeydew":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$HONEY_DEW));
		}break;
		case "hotpink":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$HOT_PINK));
		}break;
		case "indianred":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$INDIAN_RED));
		}break;
		case "indigo":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$INDIGO));
		}break;
		case "ivory":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$IVORY));
		}break;
		case "khaki":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$KHAKI));
		}break;
		case "lavender":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$LAVENDER));
		}break;
		case "lavenderblush":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$LAVENDER_BLUSH));
		}break;
		case "lawngreen":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$LAWN_GREEN));
		}break;
		case "lemonchiffon":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$LEMON_CHIFFON));
		}break;
		case "lightblue":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$LIGHT_BLUE));
		}break;
		case "lightcoral":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$LIGHT_CORAL));
		}break;
		case "lightcyan":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$LIGHT_CYAN));
		}break;
		case "lightgoldenrodyellow":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$LIGHT_GOLDENROD_YELLOW));
		}break;
		case "lightgray":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$LIGHT_GRAY));
		}break;
		case "lightgrey":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$LIGHT_GREY));
		}break;
		case "lightgreen":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$LIGHT_GREEN));
		}break;
		case "lightpink":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$LIGHT_PINK));
		}break;
		case "lightsalmon":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$LIGHT_SALMON));
		}break;
		case "lightseagreen":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$LIGHT_SEA_GREEN));
		}break;
		case "lightskyblue":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$LIGHT_SKY_BLUE));
		}break;
		case "lightslategray":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$LIGHT_SLATE_GRAY));
		}break;
		case "lightslategrey":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$LIGHT_SLATE_GREY));
		}break;
		case "lightsteelblue":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$LIGHT_STEEL_BLUE));
		}break;
		default:{
			$cssPropertyValue = cocktail_core_css_parsers_CSSStyleParser::parseColorKeyword2($ident);
		}break;
		}
		return $cssPropertyValue;
	}
	static function parseColorKeyword2($ident) {
		$cssPropertyValue = null;
		switch($ident) {
		case "lightyellow":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$LIGHT_YELLOW));
		}break;
		case "limegreen":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$LIME_GREEN));
		}break;
		case "linen":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$LINEN));
		}break;
		case "magenta":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$MAGENTA));
		}break;
		case "marron":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$MAROON));
		}break;
		case "mediumaquamarine":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$MEDIUM_AQUAMARINE));
		}break;
		case "mediumblue":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$MEDIUM_BLUE));
		}break;
		case "mediumorchid":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$MEDIUM_ORCHID));
		}break;
		case "mediumpurple":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$MEDIUM_PURPLE));
		}break;
		case "mediumseagreen":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$MEDIUM_SEA_GREEN));
		}break;
		case "mediumslateblue":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$MEDIUM_SLATE_BLUE));
		}break;
		case "mediumspringgreen":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$MEDIUM_SPRING_GREEN));
		}break;
		case "mintcream":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$MINT_CREAM));
		}break;
		case "mistyrose":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$MISTY_ROSE));
		}break;
		case "moccasin":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$MOCCASIN));
		}break;
		case "navajowhite":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$NAVAJO_WHITE));
		}break;
		case "oldlace":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$OLD_LACE));
		}break;
		case "olivedrab":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$OLIVE_DRAB));
		}break;
		case "orangered":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$ORANGE_RED));
		}break;
		case "orchid":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$ORCHID));
		}break;
		case "palegoldenrod":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$PALE_GOLDEN_ROD));
		}break;
		case "palegreen":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$PALE_GREEN));
		}break;
		case "paleturquoise":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$PALE_TURQUOISE));
		}break;
		case "palevioletred":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$PALE_VIOLET_RED));
		}break;
		case "papayawhip":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$PAPAYA_WHIP));
		}break;
		case "peachpuff":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$PEACH_PUFF));
		}break;
		case "peru":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$PERU));
		}break;
		case "pink":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$PINK));
		}break;
		case "plum":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$PLUM));
		}break;
		case "powderblue":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$POWDER_BLUE));
		}break;
		case "rosybrown":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$ROSY_BROWN));
		}break;
		case "royalblue":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$ROYAL_BLUE));
		}break;
		case "saddlebrown":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$SADDLE_BROWN));
		}break;
		case "salmon":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$SALMON));
		}break;
		case "sandybrown":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$SANDY_BROWN));
		}break;
		case "seagreen":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$SEA_GREEN));
		}break;
		case "sienna":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$SIENNA));
		}break;
		case "skyblue":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$SKY_BLUE));
		}break;
		case "slateblue":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$SLATE_BLUE));
		}break;
		case "slategray":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$SLATE_GRAY));
		}break;
		case "slategrey":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$SLATE_GREY));
		}break;
		case "snow":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$SNOW));
		}break;
		case "springgreen":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$SPRING_GREEN));
		}break;
		case "steelblue":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$STEEL_BLUE));
		}break;
		case "tan":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$TAN));
		}break;
		case "thisle":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$THISLE));
		}break;
		case "tomato":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$TOMATO));
		}break;
		case "turquoise":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$TURQUOISE));
		}break;
		case "violet":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$VIOLET));
		}break;
		case "wheat":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$WHEAT));
		}break;
		case "whitesmoke":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$WHITE_SMOKE));
		}break;
		case "yellowgreen":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$YELLOW_GREEN));
		}break;
		case "silver":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$SILVER));
		}break;
		case "gray":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$GRAY));
		}break;
		case "grey":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$GREY));
		}break;
		case "white":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$WHITE));
		}break;
		case "maroon":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$MAROON));
		}break;
		case "red":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$RED));
		}break;
		case "purple":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$PURPLE));
		}break;
		case "fuchsia":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$FUCHSIA));
		}break;
		case "green":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$GREEN));
		}break;
		case "lime":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$LIME));
		}break;
		case "olive":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$OLIVE));
		}break;
		case "yellow":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$YELLOW));
		}break;
		case "navy":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$NAVY));
		}break;
		case "orange":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$ORANGE));
		}break;
		case "teal":{
			$cssPropertyValue = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$TEAL));
		}break;
		}
		return $cssPropertyValue;
	}
	static function isHexaChar($c) {
		return $c >= 97 && $c <= 102 || $c >= 65 && $c <= 70 || $c >= 48 && $c <= 57;
	}
	static function isIdentChar($c) {
		return $c >= 97 && $c <= 122 || $c >= 65 && $c <= 90 || $c === 45;
	}
	static function isNumChar($c) {
		return $c >= 48 && $c <= 57;
	}
	function __toString() { return 'cocktail.core.css.parsers.CSSStyleParser'; }
}

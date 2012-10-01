<?php

class cocktail_core_css_CSSStyleDeclaration {
	public function __construct($parentRule = null, $onStyleChange = null) {
		if(!php_Boot::$skip_constructor) {
		$this->initPropertiesStructure();
		$this->_onStyleChange = $onStyleChange;
		$this->parentRule = $parentRule;
	}}
	public function set_transformOrigin($value) {
		$this->setProperty("transform-origin", $value, null);
		return $value;
	}
	public function get_transformOrigin() {
		return $this->getPropertyValue("transform-origin");
	}
	public function set_transform($value) {
		$this->setProperty("transform", $value, null);
		return $value;
	}
	public function get_transform() {
		return $this->getPropertyValue("transform");
	}
	public function set_transitionTimingFunction($value) {
		$this->setProperty("transition-timing-function", $value, null);
		return $value;
	}
	public function get_transitionTimingFunction() {
		return $this->getPropertyValue("transition-timing-function");
	}
	public function set_transitionDelay($value) {
		$this->setProperty("transition-delay", $value, null);
		return $value;
	}
	public function get_transitionDelay() {
		return $this->getPropertyValue("transition-delay");
	}
	public function set_transitionDuration($value) {
		$this->setProperty("transition-duration", $value, null);
		return $value;
	}
	public function get_transitionDuration() {
		return $this->getPropertyValue("transition-duration");
	}
	public function set_transitionProperty($value) {
		$this->setProperty("transition-property", $value, null);
		return $value;
	}
	public function get_transitionProperty() {
		return $this->getPropertyValue("transition-property");
	}
	public function get_cursor() {
		return $this->getPropertyValue("cursor");
	}
	public function set_cursor($value) {
		$this->setProperty("cursor", $value, null);
		return $value;
	}
	public function set_overflowY($value) {
		$this->setProperty("overflow-y", $value, null);
		return $value;
	}
	public function get_overflowY() {
		return $this->getPropertyValue("overflow-y");
	}
	public function set_overflowX($value) {
		$this->setProperty("overflow-x", $value, null);
		return $value;
	}
	public function get_overflowX() {
		return $this->getPropertyValue("overflow-x");
	}
	public function set_overflow($value) {
		$this->setProperty("overflow", $value, null);
		return $value;
	}
	public function get_overflow() {
		return $this->getPropertyValue("overflow");
	}
	public function get_backgroundOrigin() {
		return $this->getPropertyValue("background-origin");
	}
	public function set_backgroundOrigin($value) {
		$this->setProperty("background-origin", $value, null);
		return $value;
	}
	public function get_backgroundPosition() {
		return $this->getPropertyValue("background-position");
	}
	public function set_backgroundPosition($value) {
		$this->setProperty("background-position", $value, null);
		return $value;
	}
	public function get_backgroundClip() {
		return $this->getPropertyValue("background-clip");
	}
	public function set_backgroundClip($value) {
		$this->setProperty("background-clip", $value, null);
		return $value;
	}
	public function get_backgroundSize() {
		return $this->getPropertyValue("background-size");
	}
	public function set_backgroundSize($value) {
		$this->setProperty("background-size", $value, null);
		return $value;
	}
	public function get_backgroundRepeat() {
		return $this->getPropertyValue("background-repeat");
	}
	public function set_backgroundRepeat($value) {
		$this->setProperty("background-repeat", $value, null);
		return $value;
	}
	public function get_backgroundImage() {
		return $this->getPropertyValue("background-image");
	}
	public function set_backgroundImage($value) {
		$this->setProperty("background-image", $value, null);
		return $value;
	}
	public function get_backgroundColor() {
		return $this->getPropertyValue("background-color");
	}
	public function set_backgroundColor($value) {
		$this->setProperty("background-color", $value, null);
		return $value;
	}
	public function set_textAlign($value) {
		$this->setProperty("text-align", $value, null);
		return $value;
	}
	public function get_textAlign() {
		return $this->getPropertyValue("text-align");
	}
	public function set_whiteSpace($value) {
		$this->setProperty("white-space", $value, null);
		return $value;
	}
	public function get_whiteSpace() {
		return $this->getPropertyValue("white-space");
	}
	public function set_textIndent($value) {
		$this->setProperty("text-indent", $value, null);
		return $value;
	}
	public function get_textIndent() {
		return $this->getPropertyValue("text-indent");
	}
	public function set_verticalAlign($value) {
		$this->setProperty("vertical-align", $value, null);
		return $value;
	}
	public function get_verticalAlign() {
		return $this->getPropertyValue("vertical-align");
	}
	public function set_lineHeight($value) {
		$this->setProperty("line-height", $value, null);
		return $value;
	}
	public function get_lineHeight() {
		return $this->getPropertyValue("line-height");
	}
	public function set_wordSpacing($value) {
		$this->setProperty("word-spacing", $value, null);
		return $value;
	}
	public function get_wordSpacing() {
		return $this->getPropertyValue("word-spacing");
	}
	public function set_color($value) {
		$this->setProperty("color", $value, null);
		return $value;
	}
	public function get_color() {
		return $this->getPropertyValue("color");
	}
	public function set_letterSpacing($value) {
		$this->setProperty("letter-spacing", $value, null);
		return $value;
	}
	public function get_letterSpacing() {
		return $this->getPropertyValue("letter-spacing");
	}
	public function set_textTransform($value) {
		$this->setProperty("text-transform", $value, null);
		return $value;
	}
	public function get_textTransform() {
		return $this->getPropertyValue("text-transform");
	}
	public function set_fontVariant($value) {
		$this->setProperty("font-variant", $value, null);
		return $value;
	}
	public function get_fontVariant() {
		return $this->getPropertyValue("font-variant");
	}
	public function set_fontFamily($value) {
		$this->setProperty("font-family", $value, null);
		return $value;
	}
	public function get_fontFamily() {
		return $this->getPropertyValue("font-family");
	}
	public function set_fontStyle($value) {
		$this->setProperty("font-style", $value, null);
		return $value;
	}
	public function get_fontStyle() {
		return $this->getPropertyValue("font-style");
	}
	public function set_fontWeight($value) {
		$this->setProperty("font-weight", $value, null);
		return $value;
	}
	public function get_fontWeight() {
		return $this->getPropertyValue("font-weight");
	}
	public function set_fontSize($value) {
		$this->setProperty("font-size", $value, null);
		return $value;
	}
	public function get_fontSize() {
		return $this->getPropertyValue("font-size");
	}
	public function set_clear($value) {
		$this->setProperty("clear", $value, null);
		return $value;
	}
	public function get_clear() {
		return $this->getPropertyValue("clear");
	}
	public function set_CSSFloat($value) {
		$this->setProperty("float", $value, null);
		return $value;
	}
	public function get_CSSFloat() {
		return $this->getPropertyValue("float");
	}
	public function set_right($value) {
		$this->setProperty("right", $value, null);
		return $value;
	}
	public function get_right() {
		return $this->getPropertyValue("right");
	}
	public function set_bottom($value) {
		$this->setProperty("bottom", $value, null);
		return $value;
	}
	public function get_bottom() {
		return $this->getPropertyValue("bottom");
	}
	public function set_left($value) {
		$this->setProperty("left", $value, null);
		return $value;
	}
	public function get_left() {
		return $this->getPropertyValue("left");
	}
	public function set_top($value) {
		$this->setProperty("top", $value, null);
		return $value;
	}
	public function get_top() {
		return $this->getPropertyValue("top");
	}
	public function set_maxWidth($value) {
		$this->setProperty("max-width", $value, null);
		return $value;
	}
	public function get_maxWidth() {
		return $this->getPropertyValue("max-width");
	}
	public function set_minWidth($value) {
		$this->setProperty("min-width", $value, null);
		return $value;
	}
	public function get_minWidth() {
		return $this->getPropertyValue("min-width");
	}
	public function set_maxHeight($value) {
		$this->setProperty("max-height", $value, null);
		return $value;
	}
	public function get_maxHeight() {
		return $this->getPropertyValue("max-height");
	}
	public function set_minHeight($value) {
		$this->setProperty("min-height", $value, null);
		return $value;
	}
	public function get_minHeight() {
		return $this->getPropertyValue("min-height");
	}
	public function set_height($value) {
		$this->setProperty("height", $value, null);
		return $value;
	}
	public function get_height() {
		return $this->getPropertyValue("height");
	}
	public function set_width($value) {
		$this->setProperty("width", $value, null);
		return $value;
	}
	public function get_width() {
		return $this->getPropertyValue("width");
	}
	public function set_zIndex($value) {
		$this->setProperty("z-index", $value, null);
		return $value;
	}
	public function get_zIndex() {
		return $this->getPropertyValue("z-index");
	}
	public function set_position($value) {
		$this->setProperty("position", $value, null);
		return $value;
	}
	public function get_position() {
		return $this->getPropertyValue("position");
	}
	public function set_display($value) {
		$this->setProperty("display", $value, null);
		return $value;
	}
	public function get_display() {
		return $this->getPropertyValue("display");
	}
	public function set_paddingBottom($value) {
		$this->setProperty("padding-bottom", $value, null);
		return $value;
	}
	public function get_paddingBottom() {
		return $this->getPropertyValue("padding-bottom");
	}
	public function set_paddingTop($value) {
		$this->setProperty("padding-top", $value, null);
		return $value;
	}
	public function get_paddingTop() {
		return $this->getPropertyValue("padding-top");
	}
	public function set_paddingRight($value) {
		$this->setProperty("padding-right", $value, null);
		return $value;
	}
	public function get_paddingRight() {
		return $this->getPropertyValue("padding-right");
	}
	public function set_paddingLeft($value) {
		$this->setProperty("padding-left", $value, null);
		return $value;
	}
	public function get_paddingLeft() {
		return $this->getPropertyValue("padding-left");
	}
	public function set_padding($value) {
		$this->setProperty("padding", $value, null);
		return $value;
	}
	public function get_padding() {
		return $this->getPropertyValue("padding");
	}
	public function set_marginBottom($value) {
		$this->setProperty("margin-bottom", $value, null);
		return $value;
	}
	public function get_marginBottom() {
		return $this->getPropertyValue("margin-bottom");
	}
	public function set_marginTop($value) {
		$this->setProperty("margin-top", $value, null);
		return $value;
	}
	public function get_marginTop() {
		return $this->getPropertyValue("margin-top");
	}
	public function set_marginRight($value) {
		$this->setProperty("margin-right", $value, null);
		return $value;
	}
	public function get_marginRight() {
		return $this->getPropertyValue("margin-right");
	}
	public function set_marginLeft($value) {
		$this->setProperty("margin-left", $value, null);
		return $value;
	}
	public function get_marginLeft() {
		return $this->getPropertyValue("margin-left");
	}
	public function set_margin($value) {
		$this->setProperty("margin", $value, null);
		return $value;
	}
	public function get_margin() {
		return $this->getPropertyValue("margin");
	}
	public function set_visibility($value) {
		$this->setProperty("visibility", $value, null);
		return $value;
	}
	public function get_visibility() {
		return $this->getPropertyValue("visibility");
	}
	public function set_opacity($value) {
		$this->setProperty("opacity", $value, null);
		return $value;
	}
	public function get_opacity() {
		return $this->getPropertyValue("opacity");
	}
	public function get_length() {
		return $this->_properties->length;
	}
	public function set_cssText($value) {
		$this->initPropertiesStructure();
		$typedProperties = cocktail_core_css_parsers_CSSStyleParser::parseStyle($value);
		{
			$_g1 = 0; $_g = $typedProperties->length;
			while($_g1 < $_g) {
				$i = $_g1++;
				$typedProperty = $typedProperties[$i];
				$this->applyProperty($typedProperty->name, $typedProperty->typedValue, $typedProperty->important);
				unset($typedProperty,$i);
			}
		}
		return $value;
	}
	public function get_cssText() {
		return $this->serializeStyleDeclaration();
	}
	public function serializeStyleDeclaration() {
		$serializedStyleDeclaration = "";
		$length = $this->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				$property = $this->_properties[$i];
				$serializedStyleDeclaration .= $property->name . ":" . cocktail_core_css_parsers_CSSStyleSerializer::serialize($property->typedValue);
				if($property->important === true) {
					$serializedStyleDeclaration .= " !important";
				}
				$serializedStyleDeclaration .= ";";
				unset($property,$i);
			}
		}
		return $serializedStyleDeclaration;
	}
	public function isPositiveLength($length) {
		$퍁 = ($length);
		switch($퍁->index) {
		case 0:
		$value = $퍁->params[0];
		{
			return $value >= 0;
		}break;
		case 6:
		$value = $퍁->params[0];
		{
			return $value >= 0;
		}break;
		case 5:
		$value = $퍁->params[0];
		{
			return $value >= 0;
		}break;
		case 4:
		$value = $퍁->params[0];
		{
			return $value >= 0;
		}break;
		case 7:
		$value = $퍁->params[0];
		{
			return $value >= 0;
		}break;
		case 3:
		$value = $퍁->params[0];
		{
			return $value >= 0;
		}break;
		case 2:
		$value = $퍁->params[0];
		{
			return $value >= 0;
		}break;
		case 1:
		$value = $퍁->params[0];
		{
			return $value >= 0;
		}break;
		}
	}
	public function isValidPaddingProperty($styleValue) {
		$퍁 = ($styleValue);
		switch($퍁->index) {
		case 7:
		$value = $퍁->params[0];
		{
			if($this->isPositiveLength($value) === true) {
				return true;
			}
		}break;
		case 0:
		$value = $퍁->params[0];
		{
			if($value === 0) {
				return true;
			}
		}break;
		case 2:
		$value = $퍁->params[0];
		{
			if($value >= 0) {
				return true;
			}
		}break;
		case 15:
		{
			return true;
		}break;
		default:{
		}break;
		}
		return false;
	}
	public function isValidMarginProperty($styleValue) {
		$퍁 = ($styleValue);
		switch($퍁->index) {
		case 7:
		$value = $퍁->params[0];
		{
			return true;
		}break;
		case 0:
		$value = $퍁->params[0];
		{
			if($value === 0) {
				return true;
			}
		}break;
		case 2:
		$value = $퍁->params[0];
		{
			return true;
		}break;
		case 4:
		$value = $퍁->params[0];
		{
			$퍁2 = ($value);
			switch($퍁2->index) {
			case 27:
			{
				return true;
			}break;
			default:{
			}break;
			}
		}break;
		case 15:
		{
			return true;
		}break;
		default:{
		}break;
		}
		return false;
	}
	public function isValidOverflowValue($styleValue) {
		$퍁 = ($styleValue);
		switch($퍁->index) {
		case 4:
		$value = $퍁->params[0];
		{
			$퍁2 = ($value);
			switch($퍁2->index) {
			case 36:
			case 38:
			case 37:
			case 27:
			{
				return true;
			}break;
			default:{
			}break;
			}
		}break;
		default:{
		}break;
		}
		return false;
	}
	public function isValidTransitionGroup($styleValues) {
		$hasTransitionProperty = false;
		$hasTransitionTimingFunction = false;
		$hasTransitionDelay = false;
		$hasTransitionDuration = false;
		if($styleValues->length === 2 || $styleValues->length === 3 || $styleValues->length === 4) {
			if($this->isValidTransitionProperty($styleValues[0])) {
				$hasTransitionProperty = true;
			} else {
				if($this->isValidTransitionDelayOrDuration($styleValues[0])) {
					$hasTransitionDuration = true;
				} else {
					if($this->isValidTransitionTimingFunction($styleValues[0])) {
						$hasTransitionTimingFunction = true;
					} else {
						return false;
					}
				}
			}
			if($this->isValidTransitionProperty($styleValues[1])) {
				if($hasTransitionProperty === true) {
					return false;
				}
			} else {
				if($this->isValidTransitionDelayOrDuration($styleValues[1])) {
					if($hasTransitionDuration === true) {
						$hasTransitionDelay = true;
					} else {
						$hasTransitionDuration = true;
					}
				} else {
					if($this->isValidTransitionTimingFunction($styleValues[1])) {
						if($hasTransitionTimingFunction === true) {
							return false;
						}
					} else {
						return false;
					}
				}
			}
			if($styleValues->length === 2) {
				return true;
			}
			if($this->isValidTransitionProperty($styleValues[2])) {
				if($hasTransitionProperty === true) {
					return false;
				}
			} else {
				if($this->isValidTransitionDelayOrDuration($styleValues[2])) {
					if($hasTransitionDuration === true) {
						if($hasTransitionDelay === true) {
							return false;
						} else {
							$hasTransitionDelay = true;
						}
					} else {
						$hasTransitionDuration = true;
					}
				} else {
					if($this->isValidTransitionTimingFunction($styleValues[2])) {
						if($hasTransitionTimingFunction === true) {
							return false;
						}
					} else {
						return false;
					}
				}
			}
			if($styleValues->length === 3) {
				return true;
			}
			if($this->isValidTransitionProperty($styleValues[3])) {
				if($hasTransitionProperty === true) {
					return false;
				}
			} else {
				if($this->isValidTransitionDelayOrDuration($styleValues[3])) {
					if($hasTransitionDuration === true) {
						if($hasTransitionDelay === true) {
							return false;
						} else {
							$hasTransitionDelay = true;
						}
					} else {
						$hasTransitionDuration = true;
					}
				} else {
					if($this->isValidTransitionTimingFunction($styleValues[3])) {
						if($hasTransitionTimingFunction === true) {
							return false;
						}
					} else {
						return false;
					}
				}
			}
			return true;
		}
		return false;
	}
	public function isValidTransitionShorthand($styleValue) {
		$퍁 = ($styleValue);
		switch($퍁->index) {
		case 9:
		$value = $퍁->params[0];
		{
			return $this->isValidTransitionDelayOrDuration($styleValue);
		}break;
		case 3:
		$value = $퍁->params[0];
		{
			return true;
		}break;
		case 4:
		$keyword = $퍁->params[0];
		{
			$isValid = $this->isValidTransitionProperty($styleValue);
			if($isValid === true) {
				return true;
			}
			return $this->isValidTransitionTimingFunction($styleValue);
		}break;
		case 13:
		$value = $퍁->params[0];
		{
			return $this->isValidTransitionGroup($value);
		}break;
		case 15:
		case 16:
		{
			return true;
		}break;
		default:{
			return $this->isValidTransitionTimingFunction($styleValue);
		}break;
		}
	}
	public function isValidShorthand($propertyName, $styleValue) {
		switch($propertyName) {
		case "margin":{
			$퍁 = ($styleValue);
			switch($퍁->index) {
			case 7:
			$value = $퍁->params[0];
			{
				return $this->isValidMarginProperty($styleValue);
			}break;
			case 2:
			$value = $퍁->params[0];
			{
				return $this->isValidMarginProperty($styleValue);
			}break;
			case 0:
			$value = $퍁->params[0];
			{
				return $this->isValidMarginProperty($styleValue);
			}break;
			case 4:
			$value = $퍁->params[0];
			{
				return $this->isValidMarginProperty($styleValue);
			}break;
			case 15:
			case 16:
			{
				return true;
			}break;
			case 13:
			$value = $퍁->params[0];
			{
				switch($value->length) {
				case 2:{
					$isValid = $this->isValidMarginProperty($value[0]);
					if($isValid === false) {
						return false;
					}
					return $this->isValidMarginProperty($value[1]);
				}break;
				case 3:{
					$isValid = $this->isValidMarginProperty($value[0]);
					if($isValid === false) {
						return false;
					}
					$isValid = $this->isValidMarginProperty($value[1]);
					if($isValid === false) {
						return false;
					}
					return $this->isValidMarginProperty($value[2]);
				}break;
				case 4:{
					$isValid = $this->isValidMarginProperty($value[0]);
					if($isValid === false) {
						return false;
					}
					$isValid = $this->isValidMarginProperty($value[1]);
					if($isValid === false) {
						return false;
					}
					$isValid = $this->isValidMarginProperty($value[2]);
					if($isValid === false) {
						return false;
					}
					return $this->isValidMarginProperty($value[3]);
				}break;
				}
			}break;
			default:{
			}break;
			}
		}break;
		case "padding":{
			$퍁 = ($styleValue);
			switch($퍁->index) {
			case 7:
			$value = $퍁->params[0];
			{
				return $this->isValidPaddingProperty($styleValue);
			}break;
			case 2:
			$value = $퍁->params[0];
			{
				return $this->isValidPaddingProperty($styleValue);
			}break;
			case 0:
			$value = $퍁->params[0];
			{
				return $this->isValidPaddingProperty($styleValue);
			}break;
			case 15:
			case 16:
			{
				return true;
			}break;
			case 13:
			$value = $퍁->params[0];
			{
				switch($value->length) {
				case 2:{
					$isValid = $this->isValidPaddingProperty($value[0]);
					if($isValid === false) {
						return false;
					}
					return $this->isValidPaddingProperty($value[1]);
				}break;
				case 3:{
					$isValid = $this->isValidPaddingProperty($value[0]);
					if($isValid === false) {
						return false;
					}
					$isValid = $this->isValidPaddingProperty($value[1]);
					if($isValid === false) {
						return false;
					}
					return $this->isValidPaddingProperty($value[2]);
				}break;
				case 4:{
					$isValid = $this->isValidPaddingProperty($value[0]);
					if($isValid === false) {
						return false;
					}
					$isValid = $this->isValidPaddingProperty($value[1]);
					if($isValid === false) {
						return false;
					}
					$isValid = $this->isValidPaddingProperty($value[2]);
					if($isValid === false) {
						return false;
					}
					return $this->isValidPaddingProperty($value[3]);
				}break;
				}
			}break;
			default:{
			}break;
			}
		}break;
		case "overflow":{
			$퍁 = ($styleValue);
			switch($퍁->index) {
			case 4:
			$value = $퍁->params[0];
			{
				return $this->isValidOverflowValue($styleValue);
			}break;
			case 15:
			case 16:
			{
				return true;
			}break;
			case 13:
			$value = $퍁->params[0];
			{
				$isValid = $this->isValidOverflowValue($value[0]);
				if($isValid === false) {
					return false;
				}
				return $this->isValidOverflowValue($value[1]);
			}break;
			default:{
			}break;
			}
		}break;
		case "transition":{
			$퍁 = ($styleValue);
			switch($퍁->index) {
			case 14:
			$value = $퍁->params[0];
			{
				$length = $value->length;
				{
					$_g = 0;
					while($_g < $length) {
						$i = $_g++;
						if($this->isValidTransitionShorthand($value[$i]) === false) {
							return false;
						}
						unset($i);
					}
				}
				return true;
			}break;
			default:{
				return $this->isValidTransitionShorthand($styleValue);
			}break;
			}
		}break;
		default:{
		}break;
		}
		return false;
	}
	public function setTransitionShorthand($styleValue, $useDelayForTime, $transitionProperty, $transitionDuration, $transitionDelay, $transitionTimingFunction) {
		$퍁 = ($styleValue);
		switch($퍁->index) {
		case 3:
		$value = $퍁->params[0];
		{
			$transitionProperty->push($styleValue);
		}break;
		case 9:
		$value = $퍁->params[0];
		{
			if($useDelayForTime === false) {
				$transitionDuration->push($styleValue);
			} else {
				$transitionDelay->push($styleValue);
			}
		}break;
		case 4:
		$value = $퍁->params[0];
		{
			if($this->isValidTransitionProperty($styleValue) === true) {
				$transitionProperty->push($styleValue);
			} else {
				if($this->isValidTransitionTimingFunction($styleValue) === true) {
					$transitionTimingFunction->push($styleValue);
				}
			}
		}break;
		default:{
			$transitionTimingFunction->push($styleValue);
		}break;
		}
	}
	public function setTransitionGroupShorthand($styleValues, $transitionProperty, $transitionDuration, $transitionDelay, $transitionTimingFunction) {
		$hasTransitionDuration = false;
		{
			$_g1 = 0; $_g = $styleValues->length;
			while($_g1 < $_g) {
				$i = $_g1++;
				$this->setTransitionShorthand($styleValues[$i], $hasTransitionDuration, $transitionProperty, $transitionDuration, $transitionDelay, $transitionTimingFunction);
				if($this->isValidTransitionDelayOrDuration($styleValues[$i]) === true) {
					$hasTransitionDuration = true;
				}
				unset($i);
			}
		}
	}
	public function setShorthand($propertyName, $styleValue, $important) {
		switch($propertyName) {
		case "margin":{
			$퍁 = ($styleValue);
			switch($퍁->index) {
			case 7:
			$value = $퍁->params[0];
			{
				$this->setTypedProperty("margin-left", $styleValue, $important);
				$this->setTypedProperty("margin-right", $styleValue, $important);
				$this->setTypedProperty("margin-top", $styleValue, $important);
				$this->setTypedProperty("margin-bottom", $styleValue, $important);
			}break;
			case 2:
			$value = $퍁->params[0];
			{
				$this->setTypedProperty("margin-left", $styleValue, $important);
				$this->setTypedProperty("margin-right", $styleValue, $important);
				$this->setTypedProperty("margin-top", $styleValue, $important);
				$this->setTypedProperty("margin-bottom", $styleValue, $important);
			}break;
			case 0:
			$value = $퍁->params[0];
			{
				$this->setTypedProperty("margin-left", $styleValue, $important);
				$this->setTypedProperty("margin-right", $styleValue, $important);
				$this->setTypedProperty("margin-top", $styleValue, $important);
				$this->setTypedProperty("margin-bottom", $styleValue, $important);
			}break;
			case 15:
			case 16:
			{
				$this->setTypedProperty("margin-left", $styleValue, $important);
				$this->setTypedProperty("margin-right", $styleValue, $important);
				$this->setTypedProperty("margin-top", $styleValue, $important);
				$this->setTypedProperty("margin-bottom", $styleValue, $important);
			}break;
			case 4:
			$value = $퍁->params[0];
			{
				if($value === cocktail_core_css_CSSKeywordValue::$AUTO) {
					$this->setTypedProperty("margin-left", $styleValue, $important);
					$this->setTypedProperty("margin-right", $styleValue, $important);
					$this->setTypedProperty("margin-top", $styleValue, $important);
					$this->setTypedProperty("margin-bottom", $styleValue, $important);
				}
			}break;
			case 13:
			$value = $퍁->params[0];
			{
				switch($value->length) {
				case 2:{
					$this->setTypedProperty("margin-left", $value[1], $important);
					$this->setTypedProperty("margin-right", $value[1], $important);
					$this->setTypedProperty("margin-top", $value[0], $important);
					$this->setTypedProperty("margin-bottom", $value[0], $important);
				}break;
				case 3:{
					$this->setTypedProperty("margin-left", $value[1], $important);
					$this->setTypedProperty("margin-right", $value[1], $important);
					$this->setTypedProperty("margin-top", $value[0], $important);
					$this->setTypedProperty("margin-bottom", $value[2], $important);
				}break;
				case 4:{
					$this->setTypedProperty("margin-left", $value[3], $important);
					$this->setTypedProperty("margin-right", $value[1], $important);
					$this->setTypedProperty("margin-top", $value[0], $important);
					$this->setTypedProperty("margin-bottom", $value[2], $important);
				}break;
				}
			}break;
			default:{
			}break;
			}
		}break;
		case "padding":{
			$퍁 = ($styleValue);
			switch($퍁->index) {
			case 7:
			$value = $퍁->params[0];
			{
				$this->setTypedProperty("padding-left", $styleValue, $important);
				$this->setTypedProperty("padding-right", $styleValue, $important);
				$this->setTypedProperty("padding-top", $styleValue, $important);
				$this->setTypedProperty("padding-bottom", $styleValue, $important);
			}break;
			case 2:
			$value = $퍁->params[0];
			{
				$this->setTypedProperty("padding-left", $styleValue, $important);
				$this->setTypedProperty("padding-right", $styleValue, $important);
				$this->setTypedProperty("padding-top", $styleValue, $important);
				$this->setTypedProperty("padding-bottom", $styleValue, $important);
			}break;
			case 0:
			$value = $퍁->params[0];
			{
				$this->setTypedProperty("padding-left", $styleValue, $important);
				$this->setTypedProperty("padding-right", $styleValue, $important);
				$this->setTypedProperty("padding-top", $styleValue, $important);
				$this->setTypedProperty("padding-bottom", $styleValue, $important);
			}break;
			case 15:
			case 16:
			{
				$this->setTypedProperty("padding-left", $styleValue, $important);
				$this->setTypedProperty("padding-right", $styleValue, $important);
				$this->setTypedProperty("padding-top", $styleValue, $important);
				$this->setTypedProperty("padding-bottom", $styleValue, $important);
			}break;
			case 13:
			$value = $퍁->params[0];
			{
				switch($value->length) {
				case 2:{
					$this->setTypedProperty("padding-left", $value[1], $important);
					$this->setTypedProperty("padding-right", $value[1], $important);
					$this->setTypedProperty("padding-top", $value[0], $important);
					$this->setTypedProperty("padding-bottom", $value[0], $important);
				}break;
				case 3:{
					$this->setTypedProperty("padding-left", $value[1], $important);
					$this->setTypedProperty("padding-right", $value[1], $important);
					$this->setTypedProperty("padding-top", $value[0], $important);
					$this->setTypedProperty("padding-bottom", $value[2], $important);
				}break;
				case 4:{
					$this->setTypedProperty("padding-left", $value[3], $important);
					$this->setTypedProperty("padding-right", $value[1], $important);
					$this->setTypedProperty("padding-top", $value[0], $important);
					$this->setTypedProperty("padding-bottom", $value[2], $important);
				}break;
				}
			}break;
			default:{
			}break;
			}
		}break;
		case "overflow":{
			$퍁 = ($styleValue);
			switch($퍁->index) {
			case 4:
			$value = $퍁->params[0];
			{
				$this->setTypedProperty("overflow-x", $styleValue, $important);
				$this->setTypedProperty("overflow-y", $styleValue, $important);
			}break;
			case 13:
			$value = $퍁->params[0];
			{
				$this->setTypedProperty("overflow-x", $value[0], $important);
				$this->setTypedProperty("overflow-y", $value[1], $important);
			}break;
			default:{
			}break;
			}
		}break;
		case "transition":{
			$transitionPropertyValues = new _hx_array(array());
			$transitionDurationValues = new _hx_array(array());
			$transitionDelayValues = new _hx_array(array());
			$transitionTimingFunctionValues = new _hx_array(array());
			$퍁 = ($styleValue);
			switch($퍁->index) {
			case 14:
			$value = $퍁->params[0];
			{
				$_g1 = 0; $_g = $value->length;
				while($_g1 < $_g) {
					$i = $_g1++;
					$퍁2 = ($value[$i]);
					switch($퍁2->index) {
					case 13:
					$value1 = $퍁2->params[0];
					{
						$this->setTransitionGroupShorthand($value1, $transitionPropertyValues, $transitionDurationValues, $transitionDelayValues, $transitionTimingFunctionValues);
					}break;
					default:{
						$this->setTransitionShorthand($value[$i], false, $transitionPropertyValues, $transitionDurationValues, $transitionDelayValues, $transitionTimingFunctionValues);
					}break;
					}
					unset($i);
				}
			}break;
			case 13:
			$value = $퍁->params[0];
			{
				$this->setTransitionGroupShorthand($value, $transitionPropertyValues, $transitionDurationValues, $transitionDelayValues, $transitionTimingFunctionValues);
			}break;
			default:{
				$this->setTransitionShorthand($styleValue, false, $transitionPropertyValues, $transitionDurationValues, $transitionDelayValues, $transitionTimingFunctionValues);
			}break;
			}
			if($transitionPropertyValues->length > 0) {
				if($transitionPropertyValues->length === 1) {
					$this->setTypedProperty("transition-property", $transitionPropertyValues[0], $important);
				} else {
					$this->setTypedProperty("transition-property", cocktail_core_css_CSSPropertyValue::CSS_LIST($transitionPropertyValues), $important);
				}
			}
			if($transitionDelayValues->length > 0) {
				if($transitionDelayValues->length === 1) {
					$this->setTypedProperty("transition-delay", $transitionDelayValues[0], $important);
				} else {
					$this->setTypedProperty("transition-delay", cocktail_core_css_CSSPropertyValue::CSS_LIST($transitionDelayValues), $important);
				}
			}
			if($transitionDurationValues->length > 0) {
				if($transitionDurationValues->length === 1) {
					$this->setTypedProperty("transition-duration", $transitionDurationValues[0], $important);
				} else {
					$this->setTypedProperty("transition-duration", cocktail_core_css_CSSPropertyValue::CSS_LIST($transitionDurationValues), $important);
				}
			}
			if($transitionTimingFunctionValues->length > 0) {
				if($transitionTimingFunctionValues->length === 1) {
					$this->setTypedProperty("transition-timing-function", $transitionTimingFunctionValues[0], $important);
				} else {
					$this->setTypedProperty("transition-timing-function", cocktail_core_css_CSSPropertyValue::CSS_LIST($transitionTimingFunctionValues), $important);
				}
			}
		}break;
		default:{
		}break;
		}
	}
	public function isShorthand($propertyName) {
		switch($propertyName) {
		case "margin":case "padding":case "overflow":case "transition":{
			return true;
		}break;
		default:{
			return false;
		}break;
		}
	}
	public function isValidBackgroundSize($property) {
		$퍁 = ($property);
		switch($퍁->index) {
		case 4:
		$value = $퍁->params[0];
		{
			return $value === cocktail_core_css_CSSKeywordValue::$AUTO;
		}break;
		case 7:
		$value = $퍁->params[0];
		{
			if($this->isPositiveLength($value)) {
				return true;
			}
		}break;
		case 0:
		$value = $퍁->params[0];
		{
			return $value === 0;
		}break;
		case 2:
		$value = $퍁->params[0];
		{
			return true;
		}break;
		case 15:
		case 16:
		{
			return true;
		}break;
		default:{
		}break;
		}
		return false;
	}
	public function isValidBackgroundPosition($property) {
		$퍁 = ($property);
		switch($퍁->index) {
		case 7:
		$value = $퍁->params[0];
		{
			return true;
		}break;
		case 0:
		$value = $퍁->params[0];
		{
			return $value === 0;
		}break;
		case 2:
		$value = $퍁->params[0];
		{
			return true;
		}break;
		case 4:
		$value = $퍁->params[0];
		{
			$퍁2 = ($value);
			switch($퍁2->index) {
			case 11:
			case 13:
			case 12:
			{
				return true;
			}break;
			default:{
			}break;
			}
		}break;
		case 15:
		case 16:
		{
			return true;
		}break;
		default:{
		}break;
		}
		return false;
	}
	public function isValidTransitionDelayOrDuration($property) {
		$퍁 = ($property);
		switch($퍁->index) {
		case 0:
		$value = $퍁->params[0];
		{
			if($value === 0) {
				return true;
			}
		}break;
		case 9:
		$value = $퍁->params[0];
		{
			return true;
		}break;
		case 15:
		case 16:
		{
			return true;
		}break;
		default:{
		}break;
		}
		return false;
	}
	public function isValidTransitionProperty($property) {
		$퍁 = ($property);
		switch($퍁->index) {
		case 4:
		$value = $퍁->params[0];
		{
			$퍁2 = ($value);
			switch($퍁2->index) {
			case 18:
			case 48:
			case 11:
			case 12:
			{
				return true;
			}break;
			default:{
			}break;
			}
		}break;
		case 3:
		$value = $퍁->params[0];
		{
			return true;
		}break;
		case 15:
		case 16:
		{
			return true;
		}break;
		default:{
		}break;
		}
		return false;
	}
	public function isValidTransitionTimingFunction($property) {
		$퍁 = ($property);
		switch($퍁->index) {
		case 4:
		$value = $퍁->params[0];
		{
			$퍁2 = ($value);
			switch($퍁2->index) {
			case 49:
			case 51:
			case 50:
			case 52:
			case 53:
			case 54:
			case 55:
			{
				return true;
			}break;
			default:{
			}break;
			}
		}break;
		case 18:
		$intervalChange = $퍁->params[1]; $intervalNumbers = $퍁->params[0];
		{
			return true;
		}break;
		case 19:
		$y2 = $퍁->params[3]; $x2 = $퍁->params[2]; $y1 = $퍁->params[1]; $x1 = $퍁->params[0];
		{
			return true;
		}break;
		default:{
		}break;
		}
		return false;
	}
	public function isValidProperty($propertyName, $styleValue) {
		switch($propertyName) {
		case "width":case "height":{
			$퍁 = ($styleValue);
			switch($퍁->index) {
			case 7:
			$value = $퍁->params[0];
			{
				if($this->isPositiveLength($value) === true) {
					return true;
				}
			}break;
			case 0:
			$value = $퍁->params[0];
			{
				if($value === 0) {
					return true;
				}
			}break;
			case 2:
			$value = $퍁->params[0];
			{
				if($value >= 0) {
					return true;
				}
			}break;
			case 4:
			$value = $퍁->params[0];
			{
				if($value === cocktail_core_css_CSSKeywordValue::$AUTO) {
					return true;
				}
			}break;
			case 15:
			case 16:
			{
				return true;
			}break;
			default:{
			}break;
			}
		}break;
		case "display":{
			$퍁 = ($styleValue);
			switch($퍁->index) {
			case 4:
			$value = $퍁->params[0];
			{
				$퍁2 = ($value);
				switch($퍁2->index) {
				case 30:
				case 29:
				case 18:
				case 28:
				{
					return true;
				}break;
				default:{
				}break;
				}
			}break;
			case 15:
			case 16:
			{
				return true;
			}break;
			default:{
			}break;
			}
		}break;
		case "visibility":{
			$퍁 = ($styleValue);
			switch($퍁->index) {
			case 4:
			$value = $퍁->params[0];
			{
				$퍁2 = ($value);
				switch($퍁2->index) {
				case 36:
				case 37:
				{
					return true;
				}break;
				default:{
				}break;
				}
			}break;
			case 15:
			case 16:
			{
				return true;
			}break;
			default:{
			}break;
			}
		}break;
		case "position":{
			$퍁 = ($styleValue);
			switch($퍁->index) {
			case 4:
			$value = $퍁->params[0];
			{
				$퍁2 = ($value);
				switch($퍁2->index) {
				case 32:
				case 35:
				case 34:
				case 33:
				{
					return true;
				}break;
				default:{
				}break;
				}
			}break;
			case 15:
			case 16:
			{
				return true;
			}break;
			default:{
			}break;
			}
		}break;
		case "font-size":{
			$퍁 = ($styleValue);
			switch($퍁->index) {
			case 7:
			$value = $퍁->params[0];
			{
				if($this->isPositiveLength($value) === true) {
					return true;
				}
			}break;
			case 2:
			$value = $퍁->params[0];
			{
				if($value >= 0) {
					return true;
				}
			}break;
			case 4:
			$value = $퍁->params[0];
			{
				$퍁2 = ($value);
				switch($퍁2->index) {
				case 58:
				case 59:
				case 60:
				case 61:
				case 62:
				case 63:
				case 64:
				case 65:
				case 66:
				{
					return true;
				}break;
				default:{
				}break;
				}
			}break;
			case 15:
			case 16:
			{
				return true;
			}break;
			default:{
			}break;
			}
		}break;
		case "margin-top":case "margin-left":case "margin-bottom":case "margin-right":{
			return $this->isValidMarginProperty($styleValue);
		}break;
		case "padding-top":case "padding-bottom":case "padding-left":case "padding-right":{
			return $this->isValidPaddingProperty($styleValue);
		}break;
		case "max-width":case "max-height":{
			$퍁 = ($styleValue);
			switch($퍁->index) {
			case 4:
			$value = $퍁->params[0];
			{
				$퍁2 = ($value);
				switch($퍁2->index) {
				case 18:
				{
					return true;
				}break;
				default:{
				}break;
				}
			}break;
			case 7:
			$value = $퍁->params[0];
			{
				if($this->isPositiveLength($value) === true) {
					return true;
				}
			}break;
			case 2:
			$value = $퍁->params[0];
			{
				if($value >= 0) {
					return true;
				}
			}break;
			case 15:
			case 16:
			{
				return true;
			}break;
			default:{
			}break;
			}
		}break;
		case "opacity":{
			$퍁 = ($styleValue);
			switch($퍁->index) {
			case 1:
			$value = $퍁->params[0];
			{
				return true;
			}break;
			case 0:
			$value = $퍁->params[0];
			{
				return true;
			}break;
			case 15:
			case 16:
			{
				return true;
			}break;
			default:{
			}break;
			}
		}break;
		case "min-width":case "min-height":{
			$퍁 = ($styleValue);
			switch($퍁->index) {
			case 7:
			$value = $퍁->params[0];
			{
				if($this->isPositiveLength($value) === true) {
					return true;
				}
			}break;
			case 2:
			$value = $퍁->params[0];
			{
				if($value >= 0) {
					return true;
				}
			}break;
			case 15:
			case 16:
			{
				return true;
			}break;
			default:{
			}break;
			}
		}break;
		case "left":case "right":case "top":case "bottom":{
			$퍁 = ($styleValue);
			switch($퍁->index) {
			case 7:
			$value = $퍁->params[0];
			{
				return true;
			}break;
			case 2:
			$value = $퍁->params[0];
			{
				return true;
			}break;
			case 0:
			$value = $퍁->params[0];
			{
				if($value === 0) {
					return true;
				}
			}break;
			case 4:
			$value = $퍁->params[0];
			{
				if($value === cocktail_core_css_CSSKeywordValue::$AUTO) {
					return true;
				}
			}break;
			case 15:
			case 16:
			{
				return true;
			}break;
			default:{
			}break;
			}
		}break;
		case "font-style":{
			$퍁 = ($styleValue);
			switch($퍁->index) {
			case 4:
			$value = $퍁->params[0];
			{
				$퍁2 = ($value);
				switch($퍁2->index) {
				case 4:
				case 5:
				case 0:
				{
					return true;
				}break;
				default:{
				}break;
				}
			}break;
			case 15:
			case 16:
			{
				return true;
			}break;
			default:{
			}break;
			}
		}break;
		case "transform":{
			$퍁 = ($styleValue);
			switch($퍁->index) {
			case 4:
			$value = $퍁->params[0];
			{
				$퍁2 = ($value);
				switch($퍁2->index) {
				case 18:
				{
					return true;
				}break;
				default:{
				}break;
				}
			}break;
			case 15:
			case 16:
			{
				return true;
			}break;
			default:{
			}break;
			}
		}break;
		case "overflow-x":case "overflow-y":{
			$퍁 = ($styleValue);
			switch($퍁->index) {
			case 4:
			$value = $퍁->params[0];
			{
				$퍁2 = ($value);
				switch($퍁2->index) {
				case 36:
				case 38:
				case 37:
				case 27:
				{
					return true;
				}break;
				default:{
				}break;
				}
			}break;
			case 15:
			case 16:
			{
				return true;
			}break;
			default:{
			}break;
			}
		}break;
		case "font-family":{
			$퍁 = ($styleValue);
			switch($퍁->index) {
			case 14:
			$values = $퍁->params[0];
			{
				return true;
			}break;
			case 3:
			$value = $퍁->params[0];
			{
				return true;
			}break;
			case 15:
			case 16:
			{
				return true;
			}break;
			default:{
			}break;
			}
		}break;
		case "float":{
			$퍁 = ($styleValue);
			switch($퍁->index) {
			case 4:
			$value = $퍁->params[0];
			{
				$퍁2 = ($value);
				switch($퍁2->index) {
				case 11:
				case 12:
				case 31:
				case 18:
				{
					return true;
				}break;
				default:{
				}break;
				}
			}break;
			case 15:
			case 16:
			{
				return true;
			}break;
			default:{
			}break;
			}
		}break;
		case "white-space":{
			$퍁 = ($styleValue);
			switch($퍁->index) {
			case 4:
			$value = $퍁->params[0];
			{
				$퍁2 = ($value);
				switch($퍁2->index) {
				case 0:
				case 8:
				case 10:
				case 7:
				case 9:
				{
					return true;
				}break;
				default:{
				}break;
				}
			}break;
			case 15:
			case 16:
			{
				return true;
			}break;
			default:{
			}break;
			}
		}break;
		case "text-transform":{
			$퍁 = ($styleValue);
			switch($퍁->index) {
			case 4:
			$value = $퍁->params[0];
			{
				$퍁2 = ($value);
				switch($퍁2->index) {
				case 18:
				case 16:
				case 17:
				case 15:
				{
					return true;
				}break;
				default:{
				}break;
				}
			}break;
			case 15:
			case 16:
			{
				return true;
			}break;
			default:{
			}break;
			}
		}break;
		case "font-weight":{
			$퍁 = ($styleValue);
			switch($퍁->index) {
			case 4:
			$value = $퍁->params[0];
			{
				$퍁2 = ($value);
				switch($퍁2->index) {
				case 0:
				case 1:
				case 2:
				case 3:
				{
					return true;
				}break;
				default:{
				}break;
				}
			}break;
			case 0:
			$value = $퍁->params[0];
			{
				switch($value) {
				case 100:case 200:case 300:case 400:case 500:case 600:case 700:case 800:case 900:{
					return true;
				}break;
				default:{
				}break;
				}
			}break;
			case 15:
			case 16:
			{
				return true;
			}break;
			default:{
			}break;
			}
		}break;
		case "font-variant":{
			$퍁 = ($styleValue);
			switch($퍁->index) {
			case 4:
			$value = $퍁->params[0];
			{
				$퍁2 = ($value);
				switch($퍁2->index) {
				case 0:
				case 6:
				{
					return true;
				}break;
				default:{
				}break;
				}
			}break;
			case 15:
			case 16:
			{
				return true;
			}break;
			default:{
			}break;
			}
		}break;
		case "text-align":{
			$퍁 = ($styleValue);
			switch($퍁->index) {
			case 4:
			$value = $퍁->params[0];
			{
				$퍁2 = ($value);
				switch($퍁2->index) {
				case 11:
				case 12:
				case 13:
				case 14:
				{
					return true;
				}break;
				default:{
				}break;
				}
			}break;
			case 15:
			case 16:
			{
				return true;
			}break;
			default:{
			}break;
			}
		}break;
		case "vertical-align":{
			$퍁 = ($styleValue);
			switch($퍁->index) {
			case 4:
			$value = $퍁->params[0];
			{
				$퍁2 = ($value);
				switch($퍁2->index) {
				case 19:
				case 20:
				case 21:
				case 26:
				case 23:
				case 24:
				case 22:
				case 25:
				{
					return true;
				}break;
				default:{
				}break;
				}
			}break;
			case 2:
			$value = $퍁->params[0];
			{
				return true;
			}break;
			case 7:
			$value = $퍁->params[0];
			{
				return true;
			}break;
			case 15:
			case 16:
			{
				return true;
			}break;
			default:{
			}break;
			}
		}break;
		case "cursor":{
			$퍁 = ($styleValue);
			switch($퍁->index) {
			case 4:
			$value = $퍁->params[0];
			{
				$퍁2 = ($value);
				switch($퍁2->index) {
				case 27:
				case 44:
				case 45:
				case 46:
				case 47:
				{
					return true;
				}break;
				default:{
				}break;
				}
			}break;
			case 5:
			$value = $퍁->params[0];
			{
				return true;
			}break;
			case 15:
			case 16:
			{
				return true;
			}break;
			default:{
			}break;
			}
		}break;
		case "z-index":{
			$퍁 = ($styleValue);
			switch($퍁->index) {
			case 4:
			$value = $퍁->params[0];
			{
				if($value === cocktail_core_css_CSSKeywordValue::$AUTO) {
					return true;
				}
			}break;
			case 0:
			$value = $퍁->params[0];
			{
				return true;
			}break;
			case 15:
			case 16:
			{
				return true;
			}break;
			default:{
			}break;
			}
		}break;
		case "line-height":{
			$퍁 = ($styleValue);
			switch($퍁->index) {
			case 4:
			$value = $퍁->params[0];
			{
				if($value === cocktail_core_css_CSSKeywordValue::$NORMAL) {
					return true;
				}
			}break;
			case 7:
			$value = $퍁->params[0];
			{
				if($this->isPositiveLength($value) === true) {
					return true;
				}
			}break;
			case 1:
			$value = $퍁->params[0];
			{
				if($value >= 0) {
					return true;
				}
			}break;
			case 2:
			$value = $퍁->params[0];
			{
				if($value >= 0) {
					return true;
				}
			}break;
			case 15:
			case 16:
			{
				return true;
			}break;
			default:{
			}break;
			}
		}break;
		case "text-indent":{
			$퍁 = ($styleValue);
			switch($퍁->index) {
			case 0:
			$value = $퍁->params[0];
			{
				if($value === 0) {
					return true;
				}
			}break;
			case 7:
			$value = $퍁->params[0];
			{
				return true;
			}break;
			case 2:
			$value = $퍁->params[0];
			{
				return true;
			}break;
			case 15:
			case 16:
			{
				return true;
			}break;
			default:{
			}break;
			}
		}break;
		case "letter-spacing":case "word-spacing":{
			$퍁 = ($styleValue);
			switch($퍁->index) {
			case 4:
			$value = $퍁->params[0];
			{
				if($value === cocktail_core_css_CSSKeywordValue::$NORMAL) {
					return true;
				}
			}break;
			case 7:
			$value = $퍁->params[0];
			{
				return true;
			}break;
			case 15:
			case 16:
			{
				return true;
			}break;
			default:{
			}break;
			}
		}break;
		case "color":case "background-color":{
			$퍁 = ($styleValue);
			switch($퍁->index) {
			case 12:
			$value = $퍁->params[0];
			{
				return true;
			}break;
			case 15:
			case 16:
			{
				return true;
			}break;
			default:{
			}break;
			}
		}break;
		case "background-image":{
			$퍁 = ($styleValue);
			switch($퍁->index) {
			case 4:
			$value = $퍁->params[0];
			{
				if($value === cocktail_core_css_CSSKeywordValue::$NONE) {
					return true;
				}
			}break;
			case 5:
			$value = $퍁->params[0];
			{
				return true;
			}break;
			case 14:
			$value = $퍁->params[0];
			{
				$isImageList = true;
				{
					$_g1 = 0; $_g = $value->length;
					while($_g1 < $_g) {
						$i = $_g1++;
						$퍁2 = ($value[$i]);
						switch($퍁2->index) {
						case 5:
						$value1 = $퍁2->params[0];
						{
						}break;
						case 4:
						$value1 = $퍁2->params[0];
						{
							if($value1 !== cocktail_core_css_CSSKeywordValue::$NONE) {
								$isImageList = false;
							}
						}break;
						default:{
							$isImageList = false;
						}break;
						}
						unset($i);
					}
				}
				if($isImageList === true) {
					return true;
				}
			}break;
			case 15:
			case 16:
			{
				return true;
			}break;
			default:{
			}break;
			}
		}break;
		case "background-position":{
			$퍁 = ($styleValue);
			switch($퍁->index) {
			case 13:
			$value = $퍁->params[0];
			{
				switch($value->length) {
				case 2:{
					$isValidHorizontalPosition = $this->isValidBackgroundPosition($value[0]);
					if($isValidHorizontalPosition === false) {
						return false;
					}
					return $this->isValidBackgroundPosition($value[1]);
				}break;
				}
			}break;
			default:{
				return $this->isValidBackgroundPosition($styleValue);
			}break;
			}
		}break;
		case "background-repeat":{
			$퍁 = ($styleValue);
			switch($퍁->index) {
			case 4:
			$value = $퍁->params[0];
			{
				$퍁2 = ($value);
				switch($퍁2->index) {
				case 67:
				case 68:
				case 69:
				case 72:
				case 71:
				case 70:
				{
					return true;
				}break;
				default:{
				}break;
				}
			}break;
			case 13:
			$value = $퍁->params[0];
			{
				if($value->length === 2) {
					$isFirstValueValid = false;
					$퍁2 = ($value[0]);
					switch($퍁2->index) {
					case 4:
					$value1 = $퍁2->params[0];
					{
						$퍁3 = ($value1);
						switch($퍁3->index) {
						case 67:
						case 70:
						case 71:
						case 72:
						{
							$isFirstValueValid = true;
						}break;
						default:{
						}break;
						}
					}break;
					default:{
					}break;
					}
					$isSecondValueValid = false;
					$퍁2 = ($value[1]);
					switch($퍁2->index) {
					case 4:
					$value1 = $퍁2->params[0];
					{
						$퍁3 = ($value1);
						switch($퍁3->index) {
						case 67:
						case 70:
						case 71:
						case 72:
						{
							$isSecondValueValid = true;
						}break;
						default:{
						}break;
						}
					}break;
					default:{
					}break;
					}
					if($isFirstValueValid === true && $isSecondValueValid === true) {
						return true;
					}
				}
			}break;
			case 15:
			case 16:
			{
				return true;
			}break;
			default:{
			}break;
			}
		}break;
		case "background-size":{
			$퍁 = ($styleValue);
			switch($퍁->index) {
			case 4:
			$value = $퍁->params[0];
			{
				$퍁2 = ($value);
				switch($퍁2->index) {
				case 43:
				case 42:
				case 27:
				{
					return true;
				}break;
				default:{
				}break;
				}
			}break;
			case 13:
			$value = $퍁->params[0];
			{
				if($value->length === 2) {
					$isFirstValueValid = $this->isValidBackgroundSize($value[0]);
					if($isFirstValueValid === false) {
						return false;
					}
					return $this->isValidBackgroundSize($value[1]);
				}
			}break;
			default:{
				return $this->isValidBackgroundSize($styleValue);
			}break;
			}
		}break;
		case "background-clip":case "background-origin":{
			$퍁 = ($styleValue);
			switch($퍁->index) {
			case 4:
			$value = $퍁->params[0];
			{
				$퍁2 = ($value);
				switch($퍁2->index) {
				case 39:
				case 40:
				case 41:
				{
					return true;
				}break;
				default:{
				}break;
				}
			}break;
			case 15:
			case 16:
			{
				return true;
			}break;
			default:{
			}break;
			}
		}break;
		case "transition-property":{
			$퍁 = ($styleValue);
			switch($퍁->index) {
			case 14:
			$value = $퍁->params[0];
			{
				$length = $value->length;
				{
					$_g = 0;
					while($_g < $length) {
						$i = $_g++;
						$isValid = $this->isValidTransitionProperty($value[$i]);
						if($isValid === false) {
							return false;
						}
						unset($isValid,$i);
					}
				}
				return true;
			}break;
			default:{
				return $this->isValidTransitionProperty($styleValue);
			}break;
			}
		}break;
		case "transition-duration":case "transition-delay":{
			$퍁 = ($styleValue);
			switch($퍁->index) {
			case 14:
			$value = $퍁->params[0];
			{
				$length = $value->length;
				{
					$_g = 0;
					while($_g < $length) {
						$i = $_g++;
						$isValid = $this->isValidTransitionDelayOrDuration($value[$i]);
						if($isValid === false) {
							return false;
						}
						unset($isValid,$i);
					}
				}
				return true;
			}break;
			default:{
				return $this->isValidTransitionDelayOrDuration($styleValue);
			}break;
			}
		}break;
		case "transition-timing-function":{
			$퍁 = ($styleValue);
			switch($퍁->index) {
			case 14:
			$value = $퍁->params[0];
			{
				$length = $value->length;
				{
					$_g = 0;
					while($_g < $length) {
						$i = $_g++;
						$isValid = $this->isValidTransitionTimingFunction($value[$i]);
						if($isValid === false) {
							return false;
						}
						unset($isValid,$i);
					}
				}
			}break;
			default:{
				return $this->isValidTransitionTimingFunction($styleValue);
			}break;
			}
		}break;
		}
		return false;
	}
	public function applyProperty($propertyName, $styleValue, $important) {
		if($this->isShorthand($propertyName) === true) {
			if($this->isValidShorthand($propertyName, $styleValue) === true) {
				$this->setShorthand($propertyName, $styleValue, $important);
			}
		} else {
			if($this->isValidProperty($propertyName, $styleValue) === true) {
				$this->setTypedProperty($propertyName, $styleValue, $important);
			}
		}
	}
	public function setTypedProperty($property, $typedValue, $important) {
		$currentProperty = $this->_propertiesHash->get($property);
		if($currentProperty === null) {
			$newProperty = new cocktail_core_css_TypedPropertyVO($property, $typedValue, $important);
			$this->_propertiesHash->set($property, $newProperty);
			$this->_properties->push($newProperty);
			if($this->_onStyleChange !== null) {
				$this->_onStyleChange($property);
			}
			return;
		}
		if(Type::enumEq($currentProperty->typedValue, $typedValue) === false || $currentProperty->important !== $important) {
			$currentProperty->typedValue = $typedValue;
			$currentProperty->important = $important;
			if($this->_onStyleChange !== null) {
				$this->_onStyleChange($property);
			}
		}
	}
	public function getTypedProperty($property) {
		return $this->_propertiesHash->get($property);
	}
	public function getPropertyPriority($property) {
		$typedProperty = $this->_propertiesHash->get($property);
		if($typedProperty !== null) {
			if($typedProperty->important === true) {
				return "important";
			} else {
				return "";
			}
		}
		return null;
	}
	public function removeProperty($property) {
		$typedProperty = $this->_propertiesHash->get($property);
		if($typedProperty !== null) {
			$this->_properties->remove($typedProperty);
			$this->_propertiesHash->remove($property);
			if($this->_onStyleChange !== null) {
				$this->_onStyleChange($property);
			}
			return $property;
		}
		return null;
	}
	public function setProperty($name, $value, $priority = null) {
		if($value === null) {
			$this->removeProperty($name);
		} else {
			$typedProperty = cocktail_core_css_parsers_CSSStyleParser::parseStyleValue($name, $value, 0);
			if($typedProperty !== null) {
				$this->applyProperty($typedProperty->name, $typedProperty->typedValue, $typedProperty->important);
			}
		}
	}
	public function getPropertyValue($property) {
		$typedProperty = $this->_propertiesHash->get($property);
		if($typedProperty !== null) {
			return cocktail_core_css_parsers_CSSStyleSerializer::serialize($typedProperty->typedValue);
		}
		return null;
	}
	public function item($index) {
		return _hx_array_get($this->_properties, $index)->name;
	}
	public function initPropertiesStructure() {
		$this->_properties = new _hx_array(array());
		$this->_propertiesHash = new Hash();
	}
	public $_onStyleChange;
	public $_propertiesHash;
	public $_properties;
	public $parentRule;
	public $length;
	public $cssText;
	public $cursor;
	public $transformOrigin;
	public $transform;
	public $transitionDelay;
	public $transitionTimingFunction;
	public $transitionDuration;
	public $transitionProperty;
	public $overflowY;
	public $overflowX;
	public $overflow;
	public $visibility;
	public $opacity;
	public $verticalAlign;
	public $textIndent;
	public $textAlign;
	public $whiteSpace;
	public $wordSpacing;
	public $letterSpacing;
	public $textTransform;
	public $lineHeight;
	public $color;
	public $fontVariant;
	public $fontFamily;
	public $fontStyle;
	public $fontWeight;
	public $fontSize;
	public $backgroundClip;
	public $backgroundPosition;
	public $backgroundSize;
	public $backgroundOrigin;
	public $backgroundRepeat;
	public $backgroundImage;
	public $backgroundColor;
	public $right;
	public $bottom;
	public $left;
	public $top;
	public $maxWidth;
	public $minWidth;
	public $maxHeight;
	public $minHeight;
	public $height;
	public $width;
	public $paddingBottom;
	public $paddingTop;
	public $paddingRight;
	public $paddingLeft;
	public $padding;
	public $marginBottom;
	public $marginTop;
	public $marginRight;
	public $marginLeft;
	public $margin;
	public $zIndex;
	public $clear;
	public $cssFloat;
	public $position;
	public $display;
	public function __call($m, $a) {
		if(isset($this->$m) && is_callable($this->$m))
			return call_user_func_array($this->$m, $a);
		else if(isset($this->팪ynamics[$m]) && is_callable($this->팪ynamics[$m]))
			return call_user_func_array($this->팪ynamics[$m], $a);
		else if('toString' == $m)
			return $this->__toString();
		else
			throw new HException('Unable to call �'.$m.'�');
	}
	static $__properties__ = array("set_display" => "set_display","get_display" => "get_display","set_position" => "set_position","get_position" => "get_position","set_cssFloat" => "set_CSSFloat","get_cssFloat" => "get_CSSFloat","set_clear" => "set_clear","get_clear" => "get_clear","set_zIndex" => "set_zIndex","get_zIndex" => "get_zIndex","set_margin" => "set_margin","get_margin" => "get_margin","set_marginLeft" => "set_marginLeft","get_marginLeft" => "get_marginLeft","set_marginRight" => "set_marginRight","get_marginRight" => "get_marginRight","set_marginTop" => "set_marginTop","get_marginTop" => "get_marginTop","set_marginBottom" => "set_marginBottom","get_marginBottom" => "get_marginBottom","set_padding" => "set_padding","get_padding" => "get_padding","set_paddingLeft" => "set_paddingLeft","get_paddingLeft" => "get_paddingLeft","set_paddingRight" => "set_paddingRight","get_paddingRight" => "get_paddingRight","set_paddingTop" => "set_paddingTop","get_paddingTop" => "get_paddingTop","set_paddingBottom" => "set_paddingBottom","get_paddingBottom" => "get_paddingBottom","set_width" => "set_width","get_width" => "get_width","set_height" => "set_height","get_height" => "get_height","set_minHeight" => "set_minHeight","get_minHeight" => "get_minHeight","set_maxHeight" => "set_maxHeight","get_maxHeight" => "get_maxHeight","set_minWidth" => "set_minWidth","get_minWidth" => "get_minWidth","set_maxWidth" => "set_maxWidth","get_maxWidth" => "get_maxWidth","set_top" => "set_top","get_top" => "get_top","set_left" => "set_left","get_left" => "get_left","set_bottom" => "set_bottom","get_bottom" => "get_bottom","set_right" => "set_right","get_right" => "get_right","set_backgroundColor" => "set_backgroundColor","get_backgroundColor" => "get_backgroundColor","set_backgroundImage" => "set_backgroundImage","get_backgroundImage" => "get_backgroundImage","set_backgroundRepeat" => "set_backgroundRepeat","get_backgroundRepeat" => "get_backgroundRepeat","set_backgroundOrigin" => "set_backgroundOrigin","get_backgroundOrigin" => "get_backgroundOrigin","set_backgroundSize" => "set_backgroundSize","get_backgroundSize" => "get_backgroundSize","set_backgroundPosition" => "set_backgroundPosition","get_backgroundPosition" => "get_backgroundPosition","set_backgroundClip" => "set_backgroundClip","get_backgroundClip" => "get_backgroundClip","set_fontSize" => "set_fontSize","get_fontSize" => "get_fontSize","set_fontWeight" => "set_fontWeight","get_fontWeight" => "get_fontWeight","set_fontStyle" => "set_fontStyle","get_fontStyle" => "get_fontStyle","set_fontFamily" => "set_fontFamily","get_fontFamily" => "get_fontFamily","set_fontVariant" => "set_fontVariant","get_fontVariant" => "get_fontVariant","set_color" => "set_color","get_color" => "get_color","set_lineHeight" => "set_lineHeight","get_lineHeight" => "get_lineHeight","set_textTransform" => "set_textTransform","get_textTransform" => "get_textTransform","set_letterSpacing" => "set_letterSpacing","get_letterSpacing" => "get_letterSpacing","set_wordSpacing" => "set_wordSpacing","get_wordSpacing" => "get_wordSpacing","set_whiteSpace" => "set_whiteSpace","get_whiteSpace" => "get_whiteSpace","set_textAlign" => "set_textAlign","get_textAlign" => "get_textAlign","set_textIndent" => "set_textIndent","get_textIndent" => "get_textIndent","set_verticalAlign" => "set_verticalAlign","get_verticalAlign" => "get_verticalAlign","set_opacity" => "set_opacity","get_opacity" => "get_opacity","set_visibility" => "set_visibility","get_visibility" => "get_visibility","set_overflow" => "set_overflow","get_overflow" => "get_overflow","set_overflowX" => "set_overflowX","get_overflowX" => "get_overflowX","set_overflowY" => "set_overflowY","get_overflowY" => "get_overflowY","set_transitionProperty" => "set_transitionProperty","get_transitionProperty" => "get_transitionProperty","set_transitionDuration" => "set_transitionDuration","get_transitionDuration" => "get_transitionDuration","set_transitionTimingFunction" => "set_transitionTimingFunction","get_transitionTimingFunction" => "get_transitionTimingFunction","set_transitionDelay" => "set_transitionDelay","get_transitionDelay" => "get_transitionDelay","set_transform" => "set_transform","get_transform" => "get_transform","set_transformOrigin" => "set_transformOrigin","get_transformOrigin" => "get_transformOrigin","set_cursor" => "set_cursor","get_cursor" => "get_cursor","set_cssText" => "set_cssText","get_cssText" => "get_cssText","get_length" => "get_length");
	function __toString() { return 'cocktail.core.css.CSSStyleDeclaration'; }
}

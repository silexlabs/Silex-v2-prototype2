<?php

class cocktail_core_css_CoreStyle {
	public function __construct($htmlElement) {
		if(!php_Boot::$skip_constructor) {
		$this->htmlElement = $htmlElement;
		$this->computedValues = new cocktail_core_css_CSSStyleDeclaration(null, null);
		$this->specifiedValues = new cocktail_core_css_CSSStyleDeclaration(null, null);
		$this->_fontManager = cocktail_core_font_FontManager::getInstance();
		$this->_animator = new cocktail_core_animation_Animator();
		$this->_animator->onTransitionCompleteCallback = (isset($this->onTransitionComplete) ? $this->onTransitionComplete: array($this, "onTransitionComplete"));
		$this->_animator->onTransitionUpdateCallback = (isset($this->onTransitionUpdate) ? $this->onTransitionUpdate: array($this, "onTransitionUpdate"));
		$this->_pendingTransitionEndEvents = new _hx_array(array());
		$this->_transitionManager = cocktail_core_animation_TransitionManager::getInstance();
		$this->initUsedValues();
		$initialStyleDeclaration = new cocktail_core_css_InitialStyleDeclaration();
		$this->cascade($initialStyleDeclaration->get_supportedCSSProperties(), $initialStyleDeclaration, $initialStyleDeclaration, $initialStyleDeclaration, $initialStyleDeclaration, 12, 10, false);
	}}
	public function get_transitionDelay() {
		return $this->computedValues->getTypedProperty("transition-delay")->typedValue;
	}
	public function get_transitionTimingFunction() {
		return $this->computedValues->getTypedProperty("transition-timing-function")->typedValue;
	}
	public function get_transitionDuration() {
		return $this->computedValues->getTypedProperty("transition-duration")->typedValue;
	}
	public function get_transitionProperty() {
		return $this->computedValues->getTypedProperty("transition-property")->typedValue;
	}
	public function get_cursor() {
		return $this->computedValues->getTypedProperty("cursor")->typedValue;
	}
	public function get_transform() {
		return $this->computedValues->getTypedProperty("transform")->typedValue;
	}
	public function get_transformOrigin() {
		return $this->computedValues->getTypedProperty("transform-origin")->typedValue;
	}
	public function get_overflowY() {
		return $this->computedValues->getTypedProperty("overflow-y")->typedValue;
	}
	public function get_overflowX() {
		return $this->computedValues->getTypedProperty("overflow-x")->typedValue;
	}
	public function get_visibility() {
		return $this->computedValues->getTypedProperty("visibility")->typedValue;
	}
	public function get_verticalAlign() {
		return $this->computedValues->getTypedProperty("vertical-align")->typedValue;
	}
	public function get_textIndent() {
		return $this->getTransitionablePropertyValue("text-indent");
	}
	public function get_textAlign() {
		return $this->computedValues->getTypedProperty("text-align")->typedValue;
	}
	public function get_whiteSpace() {
		return $this->computedValues->getTypedProperty("white-space")->typedValue;
	}
	public function get_wordSpacing() {
		return $this->getTransitionablePropertyValue("word-spacing");
	}
	public function get_letterSpacing() {
		return $this->getTransitionablePropertyValue("letter-spacing");
	}
	public function get_textTransform() {
		return $this->computedValues->getTypedProperty("text-transform")->typedValue;
	}
	public function get_lineHeight() {
		return $this->getTransitionablePropertyValue("line-height");
	}
	public function get_color() {
		return $this->computedValues->getTypedProperty("color")->typedValue;
	}
	public function get_fontVariant() {
		return $this->computedValues->getTypedProperty("font-variant")->typedValue;
	}
	public function get_fontFamily() {
		return $this->computedValues->getTypedProperty("font-family")->typedValue;
	}
	public function get_fontStyle() {
		return $this->computedValues->getTypedProperty("font-style")->typedValue;
	}
	public function get_fontWeight() {
		return $this->computedValues->getTypedProperty("font-weight")->typedValue;
	}
	public function get_backgroundPosition() {
		return $this->computedValues->getTypedProperty("background-position")->typedValue;
	}
	public function get_backgroundSize() {
		return $this->computedValues->getTypedProperty("background-size")->typedValue;
	}
	public function get_backgroundRepeat() {
		return $this->computedValues->getTypedProperty("background-repeat")->typedValue;
	}
	public function get_backgroundClip() {
		return $this->computedValues->getTypedProperty("background-clip")->typedValue;
	}
	public function get_backgroundOrigin() {
		return $this->computedValues->getTypedProperty("background-origin")->typedValue;
	}
	public function get_backgroundImage() {
		return $this->computedValues->getTypedProperty("background-image")->typedValue;
	}
	public function get_backgroundColor() {
		return $this->computedValues->getTypedProperty("background-color")->typedValue;
	}
	public function get_zIndex() {
		return $this->computedValues->getTypedProperty("z-index")->typedValue;
	}
	public function get_clear() {
		return $this->computedValues->getTypedProperty("clear")->typedValue;
	}
	public function get_cssFloat() {
		return $this->computedValues->getTypedProperty("float")->typedValue;
	}
	public function get_position() {
		return $this->computedValues->getTypedProperty("position")->typedValue;
	}
	public function get_display() {
		return $this->computedValues->getTypedProperty("display")->typedValue;
	}
	public function get_fontSize() {
		return $this->getTransitionablePropertyValue("font-size");
	}
	public function get_right() {
		return $this->getTransitionablePropertyValue("right");
	}
	public function get_bottom() {
		return $this->getTransitionablePropertyValue("bottom");
	}
	public function get_left() {
		return $this->getTransitionablePropertyValue("left");
	}
	public function get_top() {
		return $this->getTransitionablePropertyValue("top");
	}
	public function get_maxWidth() {
		return $this->getTransitionablePropertyValue("max-width");
	}
	public function get_minWidth() {
		return $this->getTransitionablePropertyValue("min-width");
	}
	public function get_maxHeight() {
		return $this->getTransitionablePropertyValue("max-height");
	}
	public function get_minHeight() {
		return $this->getTransitionablePropertyValue("min-height");
	}
	public function get_height() {
		return $this->getTransitionablePropertyValue("height");
	}
	public function get_width() {
		return $this->getTransitionablePropertyValue("width");
	}
	public function get_paddingBottom() {
		return $this->getTransitionablePropertyValue("padding-bottom");
	}
	public function get_paddingTop() {
		return $this->getTransitionablePropertyValue("padding-top");
	}
	public function get_paddingRight() {
		return $this->getTransitionablePropertyValue("padding-right");
	}
	public function get_paddingLeft() {
		return $this->getTransitionablePropertyValue("padding-left");
	}
	public function get_marginBottom() {
		return $this->getTransitionablePropertyValue("margin-bottom");
	}
	public function get_marginTop() {
		return $this->getTransitionablePropertyValue("margin-top");
	}
	public function get_marginRight() {
		return $this->getTransitionablePropertyValue("margin-right");
	}
	public function get_marginLeft() {
		return $this->getTransitionablePropertyValue("margin-left");
	}
	public function get_opacity() {
		return $this->getTransitionablePropertyValue("opacity");
	}
	public function get_fontMetricsData() {
		return $this->_fontManager->getFontMetrics($this->computedValues->get_fontFamily(), $this->getAbsoluteLength($this->get_fontSize()));
	}
	public function isNone($property) {
		$퍁 = ($property);
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
				return false;
			}break;
			}
		}break;
		default:{
			return false;
		}break;
		}
	}
	public function isAuto($property) {
		$퍁 = ($property);
		switch($퍁->index) {
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
				return false;
			}break;
			}
		}break;
		default:{
			return false;
		}break;
		}
	}
	public function getColor($value) {
		$퍁 = ($value);
		switch($퍁->index) {
		case 12:
		$value1 = $퍁->params[0];
		{
			return $value1;
		}break;
		default:{
			throw new HException("not a color value");
		}break;
		}
	}
	public function getAbsoluteLength($value) {
		$퍁 = ($value);
		switch($퍁->index) {
		case 17:
		$value1 = $퍁->params[0];
		{
			return $value1;
		}break;
		default:{
			throw new HException("not an absolute length value");
		}break;
		}
	}
	public function getList($value) {
		$퍁 = ($value);
		switch($퍁->index) {
		case 14:
		$value1 = $퍁->params[0];
		{
			return $value1;
		}break;
		default:{
			throw new HException("not a list value");
		}break;
		}
	}
	public function getNumber($value) {
		$퍁 = ($value);
		switch($퍁->index) {
		case 1:
		$value1 = $퍁->params[0];
		{
			return $value1;
		}break;
		default:{
			throw new HException("not a number value");
		}break;
		}
	}
	public function getKeyword($value) {
		$퍁 = ($value);
		switch($퍁->index) {
		case 4:
		$value1 = $퍁->params[0];
		{
			return $value1;
		}break;
		default:{
			throw new HException("not a keyword value");
		}break;
		}
	}
	public function isInherited($propertyName) {
		switch($propertyName) {
		case "color":case "cursor":case "font-family":case "font-size":case "font-style":case "font-variant":case "font-weight":case "letter-spacing":case "line-height":case "text-align":case "text-indent":case "text-transform":case "visibility":case "white-space":case "word-spacing":{
			return true;
		}break;
		default:{
			return false;
		}break;
		}
	}
	public function getAnimatablePropertyValue($propertyName) {
		switch($propertyName) {
		case "opacity":{
			$퍁 = ($this->get_opacity());
			switch($퍁->index) {
			case 1:
			$value = $퍁->params[0];
			{
				return $value;
			}break;
			case 17:
			$value = $퍁->params[0];
			{
				return $value;
			}break;
			default:{
				return 0;
			}break;
			}
		}break;
		default:{
			return Reflect::getProperty($this->usedValues, $this->getIDLName($propertyName));
		}break;
		}
	}
	public function isAnimatable($propertyName) {
		switch($propertyName) {
		case "width":case "height":case "top":case "bottom":case "left":case "right":case "opacity":{
			return true;
		}break;
		default:{
			return false;
		}break;
		}
	}
	public function getIDLName($propertyName) {
		switch($propertyName) {
		default:{
			return $propertyName;
		}break;
		}
	}
	public function getTransitionablePropertyValue($propertyName) {
		$transition = $this->_transitionManager->getTransition($propertyName, $this);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return $this->computedValues->getTypedProperty($propertyName)->typedValue;
		}
	}
	public function onTransitionUpdate($transition) {
		$this->htmlElement->invalidate($transition->invalidationReason);
	}
	public function onTransitionComplete($transition) {
		$this->htmlElement->invalidate($transition->invalidationReason);
		$transitionEvent = new cocktail_core_event_TransitionEvent();
		$transitionEvent->initTransitionEvent("transitionend", true, true, $transition->propertyName, $transition->transitionDuration, "");
		$this->_pendingTransitionEndEvents->push($transitionEvent);
	}
	public function endPendingAnimation() {
		if($this->_pendingTransitionEndEvents->length > 0) {
			$length = $this->_pendingTransitionEndEvents->length;
			{
				$_g = 0;
				while($_g < $length) {
					$i = $_g++;
					$this->htmlElement->dispatchEvent($this->_pendingTransitionEndEvents[$i]);
					unset($i);
				}
			}
			$this->_pendingTransitionEndEvents = new _hx_array(array());
		}
	}
	public function startPendingAnimations() {
		return $this->_animator->startPendingAnimations($this);
	}
	public function applyPositionFloatAndDisplayRelationship() {
		$퍁 = ($this->getKeyword($this->get_position()));
		switch($퍁->index) {
		case 34:
		case 35:
		{
			$퍁2 = ($this->getKeyword($this->get_display()));
			switch($퍁2->index) {
			case 30:
			case 29:
			{
				$this->computedValues->setTypedProperty("display", cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$BLOCK), false);
			}break;
			default:{
			}break;
			}
			$퍁2 = ($this->getKeyword($this->get_cssFloat()));
			switch($퍁2->index) {
			case 11:
			case 12:
			{
				$this->computedValues->setTypedProperty("float", cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$NONE), false);
			}break;
			default:{
			}break;
			}
		}break;
		default:{
			$퍁2 = ($this->getKeyword($this->get_cssFloat()));
			switch($퍁2->index) {
			case 11:
			case 12:
			{
				$퍁3 = ($this->getKeyword($this->get_display()));
				switch($퍁3->index) {
				case 30:
				case 29:
				{
					$this->computedValues->setTypedProperty("display", cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$BLOCK), false);
				}break;
				default:{
				}break;
				}
			}break;
			default:{
			}break;
			}
		}break;
		}
	}
	public function getComputedProperty($propertyName, $property, $parentFontSize, $parentXHeight, $fontSize, $xHeight) {
		switch($propertyName) {
		case "min-width":case "min-height":case "max-height":case "max-width":case "left":case "right":case "top":case "bottom":case "padding-left":case "padding-right":case "padding-top":case "padding-bottom":case "margin-top":case "margin-left":case "margin-bottom":case "margin-right":case "width":case "height":{
			$퍁 = ($property);
			switch($퍁->index) {
			case 7:
			$value = $퍁->params[0];
			{
				return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH(cocktail_core_css_CSSValueConverter::getPixelFromLength($value, $fontSize, $xHeight));
			}break;
			case 0:
			$value = $퍁->params[0];
			{
				return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($value);
			}break;
			default:{
			}break;
			}
		}break;
		case "transition-property":{
			$퍁 = ($property);
			switch($퍁->index) {
			case 4:
			$value = $퍁->params[0];
			{
				$퍁2 = ($value);
				switch($퍁2->index) {
				case 11:
				{
					return cocktail_core_css_CSSPropertyValue::IDENTIFIER("left");
				}break;
				case 12:
				{
					return cocktail_core_css_CSSPropertyValue::IDENTIFIER("right");
				}break;
				default:{
				}break;
				}
			}break;
			case 14:
			$value = $퍁->params[0];
			{
				$length = $value->length;
				{
					$_g = 0;
					while($_g < $length) {
						$i = $_g++;
						$퍁2 = ($value[$i]);
						switch($퍁2->index) {
						case 4:
						$keyword = $퍁2->params[0];
						{
							$퍁3 = ($keyword);
							switch($퍁3->index) {
							case 11:
							{
								$value[$i] = cocktail_core_css_CSSPropertyValue::IDENTIFIER("left");
							}break;
							case 12:
							{
								$value[$i] = cocktail_core_css_CSSPropertyValue::IDENTIFIER("right");
							}break;
							default:{
							}break;
							}
						}break;
						default:{
						}break;
						}
						unset($i);
					}
				}
			}break;
			default:{
			}break;
			}
		}break;
		case "opacity":{
			$퍁 = ($property);
			switch($퍁->index) {
			case 1:
			$value = $퍁->params[0];
			{
				if($value > 1) {
					return cocktail_core_css_CSSPropertyValue::NUMBER(1);
				}
				if($value < 0) {
					return cocktail_core_css_CSSPropertyValue::NUMBER(0);
				}
			}break;
			case 0:
			$value = $퍁->params[0];
			{
				if($value < 0) {
					return cocktail_core_css_CSSPropertyValue::NUMBER(0);
				}
				if($value > 1) {
					return cocktail_core_css_CSSPropertyValue::NUMBER(1);
				}
				return cocktail_core_css_CSSPropertyValue::NUMBER($value);
			}break;
			default:{
			}break;
			}
		}break;
		case "font-size":{
			$퍁 = ($property);
			switch($퍁->index) {
			case 7:
			$value = $퍁->params[0];
			{
				return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH(cocktail_core_css_CSSValueConverter::getPixelFromLength($value, $parentFontSize, $parentXHeight));
			}break;
			case 2:
			$value = $퍁->params[0];
			{
				return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH(cocktail_core_css_CSSValueConverter::getPixelFromPercent($value, $parentFontSize));
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
				{
					return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH(cocktail_core_css_CSSValueConverter::getFontSizeFromAbsoluteSizeValue($value));
				}break;
				case 65:
				case 66:
				{
					return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH(cocktail_core_css_CSSValueConverter::getFontSizeFromRelativeSizeValue($value, $parentFontSize));
				}break;
				default:{
				}break;
				}
			}break;
			default:{
			}break;
			}
		}break;
		case "transform":{
			$퍁 = ($property);
			switch($퍁->index) {
			case 4:
			$value = $퍁->params[0];
			{
			}break;
			default:{
			}break;
			}
		}break;
		case "font-weight":{
			$퍁 = ($property);
			switch($퍁->index) {
			case 4:
			$value = $퍁->params[0];
			{
			}break;
			default:{
			}break;
			}
		}break;
		case "vertical-align":{
			$퍁 = ($property);
			switch($퍁->index) {
			case 0:
			$value = $퍁->params[0];
			{
				return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH(0);
			}break;
			case 7:
			$value = $퍁->params[0];
			{
				return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH(cocktail_core_css_CSSValueConverter::getPixelFromLength($value, $fontSize, $xHeight));
			}break;
			default:{
			}break;
			}
		}break;
		case "cursor":{
			$퍁 = ($property);
			switch($퍁->index) {
			case 5:
			$value = $퍁->params[0];
			{
			}break;
			default:{
			}break;
			}
		}break;
		case "line-height":{
			$퍁 = ($property);
			switch($퍁->index) {
			case 7:
			$value = $퍁->params[0];
			{
				return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH(cocktail_core_css_CSSValueConverter::getPixelFromLength($value, $fontSize, $xHeight));
			}break;
			case 2:
			$value = $퍁->params[0];
			{
				return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH(cocktail_core_css_CSSValueConverter::getPixelFromPercent($value, $fontSize));
			}break;
			default:{
			}break;
			}
		}break;
		case "text-indent":{
			$퍁 = ($property);
			switch($퍁->index) {
			case 7:
			$value = $퍁->params[0];
			{
				return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH(cocktail_core_css_CSSValueConverter::getPixelFromLength($value, $fontSize, $xHeight));
			}break;
			case 0:
			$value = $퍁->params[0];
			{
				return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($value);
			}break;
			default:{
			}break;
			}
		}break;
		case "letter-spacing":{
			$퍁 = ($property);
			switch($퍁->index) {
			case 7:
			$value = $퍁->params[0];
			{
				return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH(cocktail_core_css_CSSValueConverter::getPixelFromLength($value, $fontSize, $xHeight));
			}break;
			default:{
			}break;
			}
		}break;
		case "word-spacing":{
			$퍁 = ($property);
			switch($퍁->index) {
			case 7:
			$value = $퍁->params[0];
			{
				return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH(cocktail_core_css_CSSValueConverter::getPixelFromLength($value, $fontSize, $xHeight));
			}break;
			case 4:
			$value = $퍁->params[0];
			{
				return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH(0);
			}break;
			default:{
			}break;
			}
		}break;
		case "color":{
			$퍁 = ($property);
			switch($퍁->index) {
			case 12:
			$value = $퍁->params[0];
			{
				return cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSValueConverter::getComputedCSSColorFromCSSColor($value, $value));
			}break;
			default:{
			}break;
			}
		}break;
		case "background-color":{
			$퍁 = ($property);
			switch($퍁->index) {
			case 12:
			$value = $퍁->params[0];
			{
				return cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSValueConverter::getComputedCSSColorFromCSSColor($value, $value));
			}break;
			default:{
			}break;
			}
		}break;
		case "background-image":{
			$퍁 = ($property);
			switch($퍁->index) {
			case 4:
			$value = $퍁->params[0];
			{
			}break;
			case 5:
			$value = $퍁->params[0];
			{
			}break;
			default:{
			}break;
			}
		}break;
		case "background-position":{
			$퍁 = ($property);
			switch($퍁->index) {
			case 4:
			$value = $퍁->params[0];
			{
				return cocktail_core_css_CSSPropertyValue::GROUP(new _hx_array(array(cocktail_core_css_CSSPropertyValue::KEYWORD($value), cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$CENTER))));
			}break;
			case 7:
			$value = $퍁->params[0];
			{
				return cocktail_core_css_CSSPropertyValue::GROUP(new _hx_array(array(cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH(cocktail_core_css_CSSValueConverter::getPixelFromLength($value, $fontSize, $xHeight)), cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$CENTER))));
			}break;
			case 2:
			$value = $퍁->params[0];
			{
				return cocktail_core_css_CSSPropertyValue::GROUP(new _hx_array(array(cocktail_core_css_CSSPropertyValue::PERCENTAGE($value), cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$CENTER))));
			}break;
			case 13:
			$value = $퍁->params[0];
			{
				$backgroundPositionX = null;
				$backgroundPostionY = null;
				$퍁2 = ($value[0]);
				switch($퍁2->index) {
				case 7:
				$value1 = $퍁2->params[0];
				{
					$backgroundPositionX = cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH(cocktail_core_css_CSSValueConverter::getPixelFromLength($value1, $fontSize, $xHeight));
				}break;
				default:{
					$backgroundPositionX = $value[0];
				}break;
				}
				$퍁2 = ($value[1]);
				switch($퍁2->index) {
				case 7:
				$value1 = $퍁2->params[0];
				{
					$backgroundPostionY = cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH(cocktail_core_css_CSSValueConverter::getPixelFromLength($value1, $fontSize, $xHeight));
				}break;
				default:{
					$backgroundPostionY = $value[1];
				}break;
				}
				return cocktail_core_css_CSSPropertyValue::GROUP(new _hx_array(array($backgroundPositionX, $backgroundPostionY)));
			}break;
			default:{
			}break;
			}
		}break;
		case "background-repeat":{
			$퍁 = ($property);
			switch($퍁->index) {
			case 4:
			$value = $퍁->params[0];
			{
				$퍁2 = ($value);
				switch($퍁2->index) {
				case 67:
				{
					return cocktail_core_css_CSSPropertyValue::GROUP(new _hx_array(array(cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$REPEAT), cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$REPEAT))));
				}break;
				case 72:
				{
					return cocktail_core_css_CSSPropertyValue::GROUP(new _hx_array(array(cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$NO_REPEAT), cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$NO_REPEAT))));
				}break;
				case 71:
				{
					return cocktail_core_css_CSSPropertyValue::GROUP(new _hx_array(array(cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$ROUND), cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$ROUND))));
				}break;
				case 70:
				{
					return cocktail_core_css_CSSPropertyValue::GROUP(new _hx_array(array(cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$SPACE), cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$SPACE))));
				}break;
				case 68:
				{
					return cocktail_core_css_CSSPropertyValue::GROUP(new _hx_array(array(cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$REPEAT), cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$NO_REPEAT))));
				}break;
				case 69:
				{
					return cocktail_core_css_CSSPropertyValue::GROUP(new _hx_array(array(cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$NO_REPEAT), cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$REPEAT))));
				}break;
				default:{
				}break;
				}
			}break;
			case 13:
			$value = $퍁->params[0];
			{
			}break;
			default:{
			}break;
			}
		}break;
		case "background-size":{
			$퍁 = ($property);
			switch($퍁->index) {
			case 7:
			$value = $퍁->params[0];
			{
				return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH(cocktail_core_css_CSSValueConverter::getPixelFromLength($value, $fontSize, $xHeight));
			}break;
			case 13:
			$value = $퍁->params[0];
			{
				$backgroundSizeX = null;
				$backgroundSizeY = null;
				$퍁2 = ($value[0]);
				switch($퍁2->index) {
				case 7:
				$value1 = $퍁2->params[0];
				{
					$backgroundSizeX = cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH(cocktail_core_css_CSSValueConverter::getPixelFromLength($value1, $fontSize, $xHeight));
				}break;
				default:{
					$backgroundSizeX = $value[0];
				}break;
				}
				$퍁2 = ($value[1]);
				switch($퍁2->index) {
				case 7:
				$value1 = $퍁2->params[0];
				{
					$backgroundSizeY = cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH(cocktail_core_css_CSSValueConverter::getPixelFromLength($value1, $fontSize, $xHeight));
				}break;
				default:{
					$backgroundSizeY = $value[1];
				}break;
				}
				return cocktail_core_css_CSSPropertyValue::GROUP(new _hx_array(array($backgroundSizeX, $backgroundSizeY)));
			}break;
			default:{
			}break;
			}
		}break;
		}
		return $property;
	}
	public function setProperty($propertyName, $styleDeclaration, $parentStyleDeclaration, $initialStyleDeclaration, $parentFontSize, $parentXHeight, $fontSize, $xHeight, $programmaticChange, $isInherited) {
		$propertyData = $styleDeclaration->getTypedProperty($propertyName);
		$property = $propertyData->typedValue;
		$specifiedProperty = $this->specifiedValues->getTypedProperty($propertyName);
		if($specifiedProperty !== null) {
			if(Type::enumEq($property, $specifiedProperty->typedValue) === true) {
				return false;
			}
		}
		$this->specifiedValues->setTypedProperty($propertyName, $property, $propertyData->important);
		$computedProperty = null;
		$퍁 = ($property);
		switch($퍁->index) {
		case 15:
		{
			$computedProperty = $parentStyleDeclaration->getTypedProperty($propertyName)->typedValue;
			$isInherited = true;
		}break;
		case 16:
		{
			$computedProperty = $initialStyleDeclaration->getTypedProperty($propertyName)->typedValue;
		}break;
		default:{
			switch($propertyName) {
			default:{
				$computedProperty = $this->getComputedProperty($propertyName, $property, $parentFontSize, $parentXHeight, $fontSize, $xHeight);
			}break;
			}
		}break;
		}
		$invalidationReason = cocktail_core_renderer_InvalidationReason::styleChanged($propertyName);
		if($programmaticChange === true && $isInherited === false) {
			if($this->computedValues->getTypedProperty($propertyName) !== null) {
				if($this->isAnimatable($propertyName)) {
					$this->_animator->registerPendingAnimation($propertyName, $invalidationReason, $this->getAnimatablePropertyValue($propertyName));
				}
			}
		}
		$this->computedValues->setTypedProperty($propertyName, $computedProperty, $propertyData->important);
		$this->htmlElement->invalidate($invalidationReason);
		return true;
	}
	public function cascadeProperty($propertyName, $initialStyleDeclaration, $styleSheetDeclaration, $inlineStyleDeclaration, $parentStyleDeclaration, $parentFontSize, $parentXHeight, $fontSize, $xHeight, $programmaticChange) {
		if($inlineStyleDeclaration->getTypedProperty($propertyName) !== null) {
			return $this->setProperty($propertyName, $inlineStyleDeclaration, $parentStyleDeclaration, $initialStyleDeclaration, $parentFontSize, $parentXHeight, $fontSize, $xHeight, $programmaticChange, false);
		} else {
			if($styleSheetDeclaration->getTypedProperty($propertyName) !== null) {
				return $this->setProperty($propertyName, $styleSheetDeclaration, $parentStyleDeclaration, $initialStyleDeclaration, $parentFontSize, $parentXHeight, $fontSize, $xHeight, $programmaticChange, false);
			} else {
				if($this->isInherited($propertyName) === true) {
					return $this->setProperty($propertyName, $parentStyleDeclaration, $parentStyleDeclaration, $initialStyleDeclaration, $parentFontSize, $parentXHeight, $fontSize, $xHeight, $programmaticChange, true);
				} else {
					return $this->setProperty($propertyName, $initialStyleDeclaration, $parentStyleDeclaration, $initialStyleDeclaration, $parentFontSize, $parentXHeight, $fontSize, $xHeight, $programmaticChange, false);
				}
			}
		}
	}
	public function cascade($properties, $initialStyleDeclaration, $styleSheetDeclaration, $inlineStyleDeclaration, $parentStyleDeclaration, $parentFontSize, $parentXHeight, $programmaticChange) {
		if($properties->exists("font-size") === true || $properties->exists("font-family") === true) {
			$this->cascadeProperty("font-size", $initialStyleDeclaration, $styleSheetDeclaration, $inlineStyleDeclaration, $parentStyleDeclaration, $parentFontSize, $parentXHeight, 0, 0, $programmaticChange);
			$this->cascadeProperty("font-family", $initialStyleDeclaration, $styleSheetDeclaration, $inlineStyleDeclaration, $parentStyleDeclaration, $parentFontSize, $parentXHeight, 0, 0, $programmaticChange);
			$properties->remove("font-size");
			$properties->remove("font-family");
			$lengthCSSProperties = $initialStyleDeclaration->lengthCSSProperties;
			$length = $lengthCSSProperties->length;
			{
				$_g = 0;
				while($_g < $length) {
					$i = $_g++;
					$properties->set($lengthCSSProperties[$i], null);
					unset($i);
				}
			}
		}
		$changedProperties = new Hash();
		$fontMetrics = $this->get_fontMetricsData();
		$fontSize = $fontMetrics->fontSize;
		$xHeight = $fontMetrics->xHeight;
		if(null == $properties) throw new HException('null iterable');
		$팱t = $properties->keys();
		while($팱t->hasNext()) {
			$propertyName = $팱t->next();
			$didChangeSpecifiedValue = $this->cascadeProperty($propertyName, $initialStyleDeclaration, $styleSheetDeclaration, $inlineStyleDeclaration, $parentStyleDeclaration, $parentFontSize, $parentXHeight, $fontSize, $xHeight, $programmaticChange);
			if($didChangeSpecifiedValue === true) {
				$changedProperties->set($propertyName, null);
			}
			unset($didChangeSpecifiedValue);
		}
		$this->applyPositionFloatAndDisplayRelationship();
		if($changedProperties->exists("background-color") === true) {
			cocktail_core_css_CSSValueConverter::getColorVOFromCSSColor($this->getColor($this->get_backgroundColor()), $this->usedValues->backgroundColor);
		}
		if($changedProperties->exists("color") === true) {
			cocktail_core_css_CSSValueConverter::getColorVOFromCSSColor($this->getColor($this->get_color()), $this->usedValues->color);
		}
		return $changedProperties;
	}
	public function initUsedValues() {
		$this->usedValues = new cocktail_core_css_UsedValuesVO();
		$this->usedValues->minHeight = 0.0;
		$this->usedValues->maxHeight = 0.0;
		$this->usedValues->minWidth = 0.0;
		$this->usedValues->maxWidth = 0.0;
		$this->usedValues->width = 0.0;
		$this->usedValues->height = 0.0;
		$this->usedValues->marginLeft = 0.0;
		$this->usedValues->marginRight = 0.0;
		$this->usedValues->marginTop = 0.0;
		$this->usedValues->marginBottom = 0.0;
		$this->usedValues->paddingLeft = 0.0;
		$this->usedValues->paddingRight = 0.0;
		$this->usedValues->paddingTop = 0.0;
		$this->usedValues->paddingBottom = 0.0;
		$this->usedValues->left = 0.0;
		$this->usedValues->right = 0.0;
		$this->usedValues->top = 0.0;
		$this->usedValues->bottom = 0.0;
		$this->usedValues->textIndent = 0;
		$this->usedValues->lineHeight = 0.0;
		$this->usedValues->letterSpacing = 0.0;
		$this->usedValues->color = new cocktail_core_css_ColorVO(0, 1.0);
		$this->usedValues->transformOrigin = new cocktail_core_geom_PointVO(0.0, 0.0);
		$this->usedValues->transform = new cocktail_core_geom_Matrix(null);
		$this->usedValues->backgroundColor = new cocktail_core_css_ColorVO(0, 1.0);
	}
	public $htmlElement;
	public $_fontManager;
	public $fontMetrics;
	public $_pendingTransitionEndEvents;
	public $_transitionManager;
	public $_animator;
	public $usedValues;
	public $computedValues;
	public $specifiedValues;
	public $transitionTimingFunction;
	public $transitionDelay;
	public $transitionDuration;
	public $transitionProperty;
	public $cursor;
	public $transform;
	public $transformOrigin;
	public $overflowY;
	public $overflowX;
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
	public $marginBottom;
	public $marginTop;
	public $marginRight;
	public $marginLeft;
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
	static $__properties__ = array("get_display" => "get_display","get_position" => "get_position","get_cssFloat" => "get_cssFloat","get_clear" => "get_clear","get_zIndex" => "get_zIndex","get_marginLeft" => "get_marginLeft","get_marginRight" => "get_marginRight","get_marginTop" => "get_marginTop","get_marginBottom" => "get_marginTop","get_paddingLeft" => "get_paddingLeft","get_paddingRight" => "get_paddingRight","get_paddingTop" => "get_paddingTop","get_paddingBottom" => "get_paddingBottom","get_width" => "get_width","get_height" => "get_height","get_minHeight" => "get_minHeight","get_maxHeight" => "get_maxHeight","get_minWidth" => "get_minWidth","get_maxWidth" => "get_maxWidth","get_top" => "get_top","get_left" => "get_left","get_bottom" => "get_bottom","get_right" => "get_right","get_backgroundColor" => "get_backgroundColor","get_backgroundImage" => "get_backgroundImage","get_backgroundRepeat" => "get_backgroundRepeat","get_backgroundOrigin" => "get_backgroundOrigin","get_backgroundSize" => "get_backgroundSize","get_backgroundPosition" => "get_backgroundPosition","get_backgroundClip" => "get_backgroundClip","get_fontSize" => "get_fontSize","get_fontWeight" => "get_fontWeight","get_fontStyle" => "get_fontStyle","get_fontFamily" => "get_fontFamily","get_fontVariant" => "get_fontVariant","get_color" => "get_color","get_lineHeight" => "get_lineHeight","get_textTransform" => "get_textTransform","get_letterSpacing" => "get_letterSpacing","get_wordSpacing" => "get_wordSpacing","get_whiteSpace" => "get_whiteSpace","get_textAlign" => "get_textAlign","get_textIndent" => "get_textIndent","get_verticalAlign" => "get_verticalAlign","get_opacity" => "get_opacity","get_visibility" => "get_visibility","get_overflowX" => "get_overflowX","get_overflowY" => "get_overflowY","get_transformOrigin" => "get_transformOrigin","get_transform" => "get_transform","get_cursor" => "get_cursor","get_transitionProperty" => "get_transitionProperty","get_transitionDuration" => "get_transitionDuration","get_transitionDelay" => "get_transitionDelay","get_transitionTimingFunction" => "get_transitionTimingFunction","get_fontMetrics" => "get_fontMetricsData");
	function __toString() { return 'cocktail.core.css.CoreStyle'; }
}

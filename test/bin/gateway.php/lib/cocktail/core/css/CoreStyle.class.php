<?php

class cocktail_core_css_CoreStyle {
	public function __construct($htmlElement) {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.css.CoreStyle::new");
		$»spos = $GLOBALS['%s']->length;
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
		$GLOBALS['%s']->pop();
	}}
	public function get_transitionDelay() {
		$GLOBALS['%s']->push("cocktail.core.css.CoreStyle::get_transitionDelay");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->computedValues->getTypedProperty("transition-delay")->typedValue;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_transitionTimingFunction() {
		$GLOBALS['%s']->push("cocktail.core.css.CoreStyle::get_transitionTimingFunction");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->computedValues->getTypedProperty("transition-timing-function")->typedValue;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_transitionDuration() {
		$GLOBALS['%s']->push("cocktail.core.css.CoreStyle::get_transitionDuration");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->computedValues->getTypedProperty("transition-duration")->typedValue;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_transitionProperty() {
		$GLOBALS['%s']->push("cocktail.core.css.CoreStyle::get_transitionProperty");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->computedValues->getTypedProperty("transition-property")->typedValue;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_cursor() {
		$GLOBALS['%s']->push("cocktail.core.css.CoreStyle::get_cursor");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->computedValues->getTypedProperty("cursor")->typedValue;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_transform() {
		$GLOBALS['%s']->push("cocktail.core.css.CoreStyle::get_transform");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->computedValues->getTypedProperty("transform")->typedValue;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_transformOrigin() {
		$GLOBALS['%s']->push("cocktail.core.css.CoreStyle::get_transformOrigin");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->computedValues->getTypedProperty("transform-origin")->typedValue;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_overflowY() {
		$GLOBALS['%s']->push("cocktail.core.css.CoreStyle::get_overflowY");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->computedValues->getTypedProperty("overflow-y")->typedValue;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_overflowX() {
		$GLOBALS['%s']->push("cocktail.core.css.CoreStyle::get_overflowX");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->computedValues->getTypedProperty("overflow-x")->typedValue;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_visibility() {
		$GLOBALS['%s']->push("cocktail.core.css.CoreStyle::get_visibility");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->computedValues->getTypedProperty("visibility")->typedValue;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_verticalAlign() {
		$GLOBALS['%s']->push("cocktail.core.css.CoreStyle::get_verticalAlign");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->computedValues->getTypedProperty("vertical-align")->typedValue;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_textIndent() {
		$GLOBALS['%s']->push("cocktail.core.css.CoreStyle::get_textIndent");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getTransitionablePropertyValue("text-indent");
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_textAlign() {
		$GLOBALS['%s']->push("cocktail.core.css.CoreStyle::get_textAlign");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->computedValues->getTypedProperty("text-align")->typedValue;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_whiteSpace() {
		$GLOBALS['%s']->push("cocktail.core.css.CoreStyle::get_whiteSpace");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->computedValues->getTypedProperty("white-space")->typedValue;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_wordSpacing() {
		$GLOBALS['%s']->push("cocktail.core.css.CoreStyle::get_wordSpacing");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getTransitionablePropertyValue("word-spacing");
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_letterSpacing() {
		$GLOBALS['%s']->push("cocktail.core.css.CoreStyle::get_letterSpacing");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getTransitionablePropertyValue("letter-spacing");
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_textTransform() {
		$GLOBALS['%s']->push("cocktail.core.css.CoreStyle::get_textTransform");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->computedValues->getTypedProperty("text-transform")->typedValue;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_lineHeight() {
		$GLOBALS['%s']->push("cocktail.core.css.CoreStyle::get_lineHeight");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getTransitionablePropertyValue("line-height");
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_color() {
		$GLOBALS['%s']->push("cocktail.core.css.CoreStyle::get_color");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->computedValues->getTypedProperty("color")->typedValue;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_fontVariant() {
		$GLOBALS['%s']->push("cocktail.core.css.CoreStyle::get_fontVariant");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->computedValues->getTypedProperty("font-variant")->typedValue;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_fontFamily() {
		$GLOBALS['%s']->push("cocktail.core.css.CoreStyle::get_fontFamily");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->computedValues->getTypedProperty("font-family")->typedValue;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_fontStyle() {
		$GLOBALS['%s']->push("cocktail.core.css.CoreStyle::get_fontStyle");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->computedValues->getTypedProperty("font-style")->typedValue;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_fontWeight() {
		$GLOBALS['%s']->push("cocktail.core.css.CoreStyle::get_fontWeight");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->computedValues->getTypedProperty("font-weight")->typedValue;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_backgroundPosition() {
		$GLOBALS['%s']->push("cocktail.core.css.CoreStyle::get_backgroundPosition");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->computedValues->getTypedProperty("background-position")->typedValue;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_backgroundSize() {
		$GLOBALS['%s']->push("cocktail.core.css.CoreStyle::get_backgroundSize");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->computedValues->getTypedProperty("background-size")->typedValue;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_backgroundRepeat() {
		$GLOBALS['%s']->push("cocktail.core.css.CoreStyle::get_backgroundRepeat");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->computedValues->getTypedProperty("background-repeat")->typedValue;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_backgroundClip() {
		$GLOBALS['%s']->push("cocktail.core.css.CoreStyle::get_backgroundClip");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->computedValues->getTypedProperty("background-clip")->typedValue;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_backgroundOrigin() {
		$GLOBALS['%s']->push("cocktail.core.css.CoreStyle::get_backgroundOrigin");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->computedValues->getTypedProperty("background-origin")->typedValue;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_backgroundImage() {
		$GLOBALS['%s']->push("cocktail.core.css.CoreStyle::get_backgroundImage");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->computedValues->getTypedProperty("background-image")->typedValue;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_backgroundColor() {
		$GLOBALS['%s']->push("cocktail.core.css.CoreStyle::get_backgroundColor");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->computedValues->getTypedProperty("background-color")->typedValue;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_zIndex() {
		$GLOBALS['%s']->push("cocktail.core.css.CoreStyle::get_zIndex");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->computedValues->getTypedProperty("z-index")->typedValue;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_clear() {
		$GLOBALS['%s']->push("cocktail.core.css.CoreStyle::get_clear");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->computedValues->getTypedProperty("clear")->typedValue;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_cssFloat() {
		$GLOBALS['%s']->push("cocktail.core.css.CoreStyle::get_cssFloat");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->computedValues->getTypedProperty("float")->typedValue;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_position() {
		$GLOBALS['%s']->push("cocktail.core.css.CoreStyle::get_position");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->computedValues->getTypedProperty("position")->typedValue;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_display() {
		$GLOBALS['%s']->push("cocktail.core.css.CoreStyle::get_display");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->computedValues->getTypedProperty("display")->typedValue;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_fontSize() {
		$GLOBALS['%s']->push("cocktail.core.css.CoreStyle::get_fontSize");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getTransitionablePropertyValue("font-size");
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_right() {
		$GLOBALS['%s']->push("cocktail.core.css.CoreStyle::get_right");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getTransitionablePropertyValue("right");
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_bottom() {
		$GLOBALS['%s']->push("cocktail.core.css.CoreStyle::get_bottom");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getTransitionablePropertyValue("bottom");
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_left() {
		$GLOBALS['%s']->push("cocktail.core.css.CoreStyle::get_left");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getTransitionablePropertyValue("left");
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_top() {
		$GLOBALS['%s']->push("cocktail.core.css.CoreStyle::get_top");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getTransitionablePropertyValue("top");
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_maxWidth() {
		$GLOBALS['%s']->push("cocktail.core.css.CoreStyle::get_maxWidth");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getTransitionablePropertyValue("max-width");
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_minWidth() {
		$GLOBALS['%s']->push("cocktail.core.css.CoreStyle::get_minWidth");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getTransitionablePropertyValue("min-width");
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_maxHeight() {
		$GLOBALS['%s']->push("cocktail.core.css.CoreStyle::get_maxHeight");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getTransitionablePropertyValue("max-height");
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_minHeight() {
		$GLOBALS['%s']->push("cocktail.core.css.CoreStyle::get_minHeight");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getTransitionablePropertyValue("min-height");
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_height() {
		$GLOBALS['%s']->push("cocktail.core.css.CoreStyle::get_height");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getTransitionablePropertyValue("height");
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_width() {
		$GLOBALS['%s']->push("cocktail.core.css.CoreStyle::get_width");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getTransitionablePropertyValue("width");
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_paddingBottom() {
		$GLOBALS['%s']->push("cocktail.core.css.CoreStyle::get_paddingBottom");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getTransitionablePropertyValue("padding-bottom");
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_paddingTop() {
		$GLOBALS['%s']->push("cocktail.core.css.CoreStyle::get_paddingTop");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getTransitionablePropertyValue("padding-top");
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_paddingRight() {
		$GLOBALS['%s']->push("cocktail.core.css.CoreStyle::get_paddingRight");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getTransitionablePropertyValue("padding-right");
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_paddingLeft() {
		$GLOBALS['%s']->push("cocktail.core.css.CoreStyle::get_paddingLeft");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getTransitionablePropertyValue("padding-left");
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_marginBottom() {
		$GLOBALS['%s']->push("cocktail.core.css.CoreStyle::get_marginBottom");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getTransitionablePropertyValue("margin-bottom");
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_marginTop() {
		$GLOBALS['%s']->push("cocktail.core.css.CoreStyle::get_marginTop");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getTransitionablePropertyValue("margin-top");
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_marginRight() {
		$GLOBALS['%s']->push("cocktail.core.css.CoreStyle::get_marginRight");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getTransitionablePropertyValue("margin-right");
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_marginLeft() {
		$GLOBALS['%s']->push("cocktail.core.css.CoreStyle::get_marginLeft");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getTransitionablePropertyValue("margin-left");
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_opacity() {
		$GLOBALS['%s']->push("cocktail.core.css.CoreStyle::get_opacity");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getTransitionablePropertyValue("opacity");
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_fontMetricsData() {
		$GLOBALS['%s']->push("cocktail.core.css.CoreStyle::get_fontMetricsData");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->_fontManager->getFontMetrics($this->computedValues->get_fontFamily(), $this->getAbsoluteLength($this->get_fontSize()));
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function isNone($property) {
		$GLOBALS['%s']->push("cocktail.core.css.CoreStyle::isNone");
		$»spos = $GLOBALS['%s']->length;
		$»t = ($property);
		switch($»t->index) {
		case 4:
		$value = $»t->params[0];
		{
			$»t2 = ($value);
			switch($»t2->index) {
			case 18:
			{
				$GLOBALS['%s']->pop();
				return true;
			}break;
			default:{
				$GLOBALS['%s']->pop();
				return false;
			}break;
			}
		}break;
		default:{
			$GLOBALS['%s']->pop();
			return false;
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	public function isAuto($property) {
		$GLOBALS['%s']->push("cocktail.core.css.CoreStyle::isAuto");
		$»spos = $GLOBALS['%s']->length;
		$»t = ($property);
		switch($»t->index) {
		case 4:
		$value = $»t->params[0];
		{
			$»t2 = ($value);
			switch($»t2->index) {
			case 27:
			{
				$GLOBALS['%s']->pop();
				return true;
			}break;
			default:{
				$GLOBALS['%s']->pop();
				return false;
			}break;
			}
		}break;
		default:{
			$GLOBALS['%s']->pop();
			return false;
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	public function getColor($value) {
		$GLOBALS['%s']->push("cocktail.core.css.CoreStyle::getColor");
		$»spos = $GLOBALS['%s']->length;
		$»t = ($value);
		switch($»t->index) {
		case 12:
		$value1 = $»t->params[0];
		{
			$GLOBALS['%s']->pop();
			return $value1;
		}break;
		default:{
			throw new HException("not a color value");
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	public function getAbsoluteLength($value) {
		$GLOBALS['%s']->push("cocktail.core.css.CoreStyle::getAbsoluteLength");
		$»spos = $GLOBALS['%s']->length;
		$»t = ($value);
		switch($»t->index) {
		case 17:
		$value1 = $»t->params[0];
		{
			$GLOBALS['%s']->pop();
			return $value1;
		}break;
		default:{
			throw new HException("not an absolute length value");
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	public function getList($value) {
		$GLOBALS['%s']->push("cocktail.core.css.CoreStyle::getList");
		$»spos = $GLOBALS['%s']->length;
		$»t = ($value);
		switch($»t->index) {
		case 14:
		$value1 = $»t->params[0];
		{
			$GLOBALS['%s']->pop();
			return $value1;
		}break;
		default:{
			throw new HException("not a list value");
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	public function getNumber($value) {
		$GLOBALS['%s']->push("cocktail.core.css.CoreStyle::getNumber");
		$»spos = $GLOBALS['%s']->length;
		$»t = ($value);
		switch($»t->index) {
		case 1:
		$value1 = $»t->params[0];
		{
			$GLOBALS['%s']->pop();
			return $value1;
		}break;
		default:{
			throw new HException("not a number value");
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	public function getKeyword($value) {
		$GLOBALS['%s']->push("cocktail.core.css.CoreStyle::getKeyword");
		$»spos = $GLOBALS['%s']->length;
		$»t = ($value);
		switch($»t->index) {
		case 4:
		$value1 = $»t->params[0];
		{
			$GLOBALS['%s']->pop();
			return $value1;
		}break;
		default:{
			throw new HException("not a keyword value");
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	public function isInherited($propertyName) {
		$GLOBALS['%s']->push("cocktail.core.css.CoreStyle::isInherited");
		$»spos = $GLOBALS['%s']->length;
		switch($propertyName) {
		case "color":case "cursor":case "font-family":case "font-size":case "font-style":case "font-variant":case "font-weight":case "letter-spacing":case "line-height":case "text-align":case "text-indent":case "text-transform":case "visibility":case "white-space":case "word-spacing":{
			$GLOBALS['%s']->pop();
			return true;
		}break;
		default:{
			$GLOBALS['%s']->pop();
			return false;
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	public function getAnimatablePropertyValue($propertyName) {
		$GLOBALS['%s']->push("cocktail.core.css.CoreStyle::getAnimatablePropertyValue");
		$»spos = $GLOBALS['%s']->length;
		switch($propertyName) {
		case "opacity":{
			$»t = ($this->get_opacity());
			switch($»t->index) {
			case 1:
			$value = $»t->params[0];
			{
				$GLOBALS['%s']->pop();
				return $value;
			}break;
			case 17:
			$value = $»t->params[0];
			{
				$GLOBALS['%s']->pop();
				return $value;
			}break;
			default:{
				$GLOBALS['%s']->pop();
				return 0;
			}break;
			}
		}break;
		default:{
			$»tmp = Reflect::getProperty($this->usedValues, $this->getIDLName($propertyName));
			$GLOBALS['%s']->pop();
			return $»tmp;
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	public function isAnimatable($propertyName) {
		$GLOBALS['%s']->push("cocktail.core.css.CoreStyle::isAnimatable");
		$»spos = $GLOBALS['%s']->length;
		switch($propertyName) {
		case "width":case "height":case "top":case "bottom":case "left":case "right":case "opacity":{
			$GLOBALS['%s']->pop();
			return true;
		}break;
		default:{
			$GLOBALS['%s']->pop();
			return false;
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	public function getIDLName($propertyName) {
		$GLOBALS['%s']->push("cocktail.core.css.CoreStyle::getIDLName");
		$»spos = $GLOBALS['%s']->length;
		switch($propertyName) {
		default:{
			$GLOBALS['%s']->pop();
			return $propertyName;
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	public function getTransitionablePropertyValue($propertyName) {
		$GLOBALS['%s']->push("cocktail.core.css.CoreStyle::getTransitionablePropertyValue");
		$»spos = $GLOBALS['%s']->length;
		$transition = $this->_transitionManager->getTransition($propertyName, $this);
		if($transition !== null) {
			$»tmp = cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
			$GLOBALS['%s']->pop();
			return $»tmp;
		} else {
			$»tmp = $this->computedValues->getTypedProperty($propertyName)->typedValue;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function onTransitionUpdate($transition) {
		$GLOBALS['%s']->push("cocktail.core.css.CoreStyle::onTransitionUpdate");
		$»spos = $GLOBALS['%s']->length;
		$this->htmlElement->invalidate($transition->invalidationReason);
		$GLOBALS['%s']->pop();
	}
	public function onTransitionComplete($transition) {
		$GLOBALS['%s']->push("cocktail.core.css.CoreStyle::onTransitionComplete");
		$»spos = $GLOBALS['%s']->length;
		$this->htmlElement->invalidate($transition->invalidationReason);
		$transitionEvent = new cocktail_core_event_TransitionEvent();
		$transitionEvent->initTransitionEvent("transitionend", true, true, $transition->propertyName, $transition->transitionDuration, "");
		$this->_pendingTransitionEndEvents->push($transitionEvent);
		$GLOBALS['%s']->pop();
	}
	public function endPendingAnimation() {
		$GLOBALS['%s']->push("cocktail.core.css.CoreStyle::endPendingAnimation");
		$»spos = $GLOBALS['%s']->length;
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
		$GLOBALS['%s']->pop();
	}
	public function startPendingAnimations() {
		$GLOBALS['%s']->push("cocktail.core.css.CoreStyle::startPendingAnimations");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->_animator->startPendingAnimations($this);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function applyPositionFloatAndDisplayRelationship() {
		$GLOBALS['%s']->push("cocktail.core.css.CoreStyle::applyPositionFloatAndDisplayRelationship");
		$»spos = $GLOBALS['%s']->length;
		$»t = ($this->getKeyword($this->get_position()));
		switch($»t->index) {
		case 34:
		case 35:
		{
			$»t2 = ($this->getKeyword($this->get_display()));
			switch($»t2->index) {
			case 30:
			case 29:
			{
				$this->computedValues->setTypedProperty("display", cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$BLOCK), false);
			}break;
			default:{
			}break;
			}
			$»t2 = ($this->getKeyword($this->get_cssFloat()));
			switch($»t2->index) {
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
			$»t2 = ($this->getKeyword($this->get_cssFloat()));
			switch($»t2->index) {
			case 11:
			case 12:
			{
				$»t3 = ($this->getKeyword($this->get_display()));
				switch($»t3->index) {
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
		$GLOBALS['%s']->pop();
	}
	public function getComputedProperty($propertyName, $property, $parentFontSize, $parentXHeight, $fontSize, $xHeight) {
		$GLOBALS['%s']->push("cocktail.core.css.CoreStyle::getComputedProperty");
		$»spos = $GLOBALS['%s']->length;
		switch($propertyName) {
		case "min-width":case "min-height":case "max-height":case "max-width":case "left":case "right":case "top":case "bottom":case "padding-left":case "padding-right":case "padding-top":case "padding-bottom":case "margin-top":case "margin-left":case "margin-bottom":case "margin-right":case "width":case "height":{
			$»t = ($property);
			switch($»t->index) {
			case 7:
			$value = $»t->params[0];
			{
				$»tmp = cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH(cocktail_core_css_CSSValueConverter::getPixelFromLength($value, $fontSize, $xHeight));
				$GLOBALS['%s']->pop();
				return $»tmp;
			}break;
			case 0:
			$value = $»t->params[0];
			{
				$»tmp = cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($value);
				$GLOBALS['%s']->pop();
				return $»tmp;
			}break;
			default:{
			}break;
			}
		}break;
		case "transition-property":{
			$»t = ($property);
			switch($»t->index) {
			case 4:
			$value = $»t->params[0];
			{
				$»t2 = ($value);
				switch($»t2->index) {
				case 11:
				{
					$»tmp = cocktail_core_css_CSSPropertyValue::IDENTIFIER("left");
					$GLOBALS['%s']->pop();
					return $»tmp;
				}break;
				case 12:
				{
					$»tmp = cocktail_core_css_CSSPropertyValue::IDENTIFIER("right");
					$GLOBALS['%s']->pop();
					return $»tmp;
				}break;
				default:{
				}break;
				}
			}break;
			case 14:
			$value = $»t->params[0];
			{
				$length = $value->length;
				{
					$_g = 0;
					while($_g < $length) {
						$i = $_g++;
						$»t2 = ($value[$i]);
						switch($»t2->index) {
						case 4:
						$keyword = $»t2->params[0];
						{
							$»t3 = ($keyword);
							switch($»t3->index) {
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
			$»t = ($property);
			switch($»t->index) {
			case 1:
			$value = $»t->params[0];
			{
				if($value > 1) {
					$»tmp = cocktail_core_css_CSSPropertyValue::NUMBER(1);
					$GLOBALS['%s']->pop();
					return $»tmp;
				}
				if($value < 0) {
					$»tmp = cocktail_core_css_CSSPropertyValue::NUMBER(0);
					$GLOBALS['%s']->pop();
					return $»tmp;
				}
			}break;
			case 0:
			$value = $»t->params[0];
			{
				if($value < 0) {
					$»tmp = cocktail_core_css_CSSPropertyValue::NUMBER(0);
					$GLOBALS['%s']->pop();
					return $»tmp;
				}
				if($value > 1) {
					$»tmp = cocktail_core_css_CSSPropertyValue::NUMBER(1);
					$GLOBALS['%s']->pop();
					return $»tmp;
				}
				{
					$»tmp = cocktail_core_css_CSSPropertyValue::NUMBER($value);
					$GLOBALS['%s']->pop();
					return $»tmp;
				}
			}break;
			default:{
			}break;
			}
		}break;
		case "font-size":{
			$»t = ($property);
			switch($»t->index) {
			case 7:
			$value = $»t->params[0];
			{
				$»tmp = cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH(cocktail_core_css_CSSValueConverter::getPixelFromLength($value, $parentFontSize, $parentXHeight));
				$GLOBALS['%s']->pop();
				return $»tmp;
			}break;
			case 2:
			$value = $»t->params[0];
			{
				$»tmp = cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH(cocktail_core_css_CSSValueConverter::getPixelFromPercent($value, $parentFontSize));
				$GLOBALS['%s']->pop();
				return $»tmp;
			}break;
			case 4:
			$value = $»t->params[0];
			{
				$»t2 = ($value);
				switch($»t2->index) {
				case 58:
				case 59:
				case 60:
				case 61:
				case 62:
				case 63:
				case 64:
				{
					$»tmp = cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH(cocktail_core_css_CSSValueConverter::getFontSizeFromAbsoluteSizeValue($value));
					$GLOBALS['%s']->pop();
					return $»tmp;
				}break;
				case 65:
				case 66:
				{
					$»tmp = cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH(cocktail_core_css_CSSValueConverter::getFontSizeFromRelativeSizeValue($value, $parentFontSize));
					$GLOBALS['%s']->pop();
					return $»tmp;
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
			$»t = ($property);
			switch($»t->index) {
			case 4:
			$value = $»t->params[0];
			{
			}break;
			default:{
			}break;
			}
		}break;
		case "font-weight":{
			$»t = ($property);
			switch($»t->index) {
			case 4:
			$value = $»t->params[0];
			{
			}break;
			default:{
			}break;
			}
		}break;
		case "vertical-align":{
			$»t = ($property);
			switch($»t->index) {
			case 0:
			$value = $»t->params[0];
			{
				$»tmp = cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH(0);
				$GLOBALS['%s']->pop();
				return $»tmp;
			}break;
			case 7:
			$value = $»t->params[0];
			{
				$»tmp = cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH(cocktail_core_css_CSSValueConverter::getPixelFromLength($value, $fontSize, $xHeight));
				$GLOBALS['%s']->pop();
				return $»tmp;
			}break;
			default:{
			}break;
			}
		}break;
		case "cursor":{
			$»t = ($property);
			switch($»t->index) {
			case 5:
			$value = $»t->params[0];
			{
			}break;
			default:{
			}break;
			}
		}break;
		case "line-height":{
			$»t = ($property);
			switch($»t->index) {
			case 7:
			$value = $»t->params[0];
			{
				$»tmp = cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH(cocktail_core_css_CSSValueConverter::getPixelFromLength($value, $fontSize, $xHeight));
				$GLOBALS['%s']->pop();
				return $»tmp;
			}break;
			case 2:
			$value = $»t->params[0];
			{
				$»tmp = cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH(cocktail_core_css_CSSValueConverter::getPixelFromPercent($value, $fontSize));
				$GLOBALS['%s']->pop();
				return $»tmp;
			}break;
			default:{
			}break;
			}
		}break;
		case "text-indent":{
			$»t = ($property);
			switch($»t->index) {
			case 7:
			$value = $»t->params[0];
			{
				$»tmp = cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH(cocktail_core_css_CSSValueConverter::getPixelFromLength($value, $fontSize, $xHeight));
				$GLOBALS['%s']->pop();
				return $»tmp;
			}break;
			case 0:
			$value = $»t->params[0];
			{
				$»tmp = cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($value);
				$GLOBALS['%s']->pop();
				return $»tmp;
			}break;
			default:{
			}break;
			}
		}break;
		case "letter-spacing":{
			$»t = ($property);
			switch($»t->index) {
			case 7:
			$value = $»t->params[0];
			{
				$»tmp = cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH(cocktail_core_css_CSSValueConverter::getPixelFromLength($value, $fontSize, $xHeight));
				$GLOBALS['%s']->pop();
				return $»tmp;
			}break;
			default:{
			}break;
			}
		}break;
		case "word-spacing":{
			$»t = ($property);
			switch($»t->index) {
			case 7:
			$value = $»t->params[0];
			{
				$»tmp = cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH(cocktail_core_css_CSSValueConverter::getPixelFromLength($value, $fontSize, $xHeight));
				$GLOBALS['%s']->pop();
				return $»tmp;
			}break;
			case 4:
			$value = $»t->params[0];
			{
				$»tmp = cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH(0);
				$GLOBALS['%s']->pop();
				return $»tmp;
			}break;
			default:{
			}break;
			}
		}break;
		case "color":{
			$»t = ($property);
			switch($»t->index) {
			case 12:
			$value = $»t->params[0];
			{
				$»tmp = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSValueConverter::getComputedCSSColorFromCSSColor($value, $value));
				$GLOBALS['%s']->pop();
				return $»tmp;
			}break;
			default:{
			}break;
			}
		}break;
		case "background-color":{
			$»t = ($property);
			switch($»t->index) {
			case 12:
			$value = $»t->params[0];
			{
				$»tmp = cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSValueConverter::getComputedCSSColorFromCSSColor($value, $value));
				$GLOBALS['%s']->pop();
				return $»tmp;
			}break;
			default:{
			}break;
			}
		}break;
		case "background-image":{
			$»t = ($property);
			switch($»t->index) {
			case 4:
			$value = $»t->params[0];
			{
			}break;
			case 5:
			$value = $»t->params[0];
			{
			}break;
			default:{
			}break;
			}
		}break;
		case "background-position":{
			$»t = ($property);
			switch($»t->index) {
			case 4:
			$value = $»t->params[0];
			{
				$»tmp = cocktail_core_css_CSSPropertyValue::GROUP(new _hx_array(array(cocktail_core_css_CSSPropertyValue::KEYWORD($value), cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$CENTER))));
				$GLOBALS['%s']->pop();
				return $»tmp;
			}break;
			case 7:
			$value = $»t->params[0];
			{
				$»tmp = cocktail_core_css_CSSPropertyValue::GROUP(new _hx_array(array(cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH(cocktail_core_css_CSSValueConverter::getPixelFromLength($value, $fontSize, $xHeight)), cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$CENTER))));
				$GLOBALS['%s']->pop();
				return $»tmp;
			}break;
			case 2:
			$value = $»t->params[0];
			{
				$»tmp = cocktail_core_css_CSSPropertyValue::GROUP(new _hx_array(array(cocktail_core_css_CSSPropertyValue::PERCENTAGE($value), cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$CENTER))));
				$GLOBALS['%s']->pop();
				return $»tmp;
			}break;
			case 13:
			$value = $»t->params[0];
			{
				$backgroundPositionX = null;
				$backgroundPostionY = null;
				$»t2 = ($value[0]);
				switch($»t2->index) {
				case 7:
				$value1 = $»t2->params[0];
				{
					$backgroundPositionX = cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH(cocktail_core_css_CSSValueConverter::getPixelFromLength($value1, $fontSize, $xHeight));
				}break;
				default:{
					$backgroundPositionX = $value[0];
				}break;
				}
				$»t2 = ($value[1]);
				switch($»t2->index) {
				case 7:
				$value1 = $»t2->params[0];
				{
					$backgroundPostionY = cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH(cocktail_core_css_CSSValueConverter::getPixelFromLength($value1, $fontSize, $xHeight));
				}break;
				default:{
					$backgroundPostionY = $value[1];
				}break;
				}
				{
					$»tmp = cocktail_core_css_CSSPropertyValue::GROUP(new _hx_array(array($backgroundPositionX, $backgroundPostionY)));
					$GLOBALS['%s']->pop();
					return $»tmp;
				}
			}break;
			default:{
			}break;
			}
		}break;
		case "background-repeat":{
			$»t = ($property);
			switch($»t->index) {
			case 4:
			$value = $»t->params[0];
			{
				$»t2 = ($value);
				switch($»t2->index) {
				case 67:
				{
					$»tmp = cocktail_core_css_CSSPropertyValue::GROUP(new _hx_array(array(cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$REPEAT), cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$REPEAT))));
					$GLOBALS['%s']->pop();
					return $»tmp;
				}break;
				case 72:
				{
					$»tmp = cocktail_core_css_CSSPropertyValue::GROUP(new _hx_array(array(cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$NO_REPEAT), cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$NO_REPEAT))));
					$GLOBALS['%s']->pop();
					return $»tmp;
				}break;
				case 71:
				{
					$»tmp = cocktail_core_css_CSSPropertyValue::GROUP(new _hx_array(array(cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$ROUND), cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$ROUND))));
					$GLOBALS['%s']->pop();
					return $»tmp;
				}break;
				case 70:
				{
					$»tmp = cocktail_core_css_CSSPropertyValue::GROUP(new _hx_array(array(cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$SPACE), cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$SPACE))));
					$GLOBALS['%s']->pop();
					return $»tmp;
				}break;
				case 68:
				{
					$»tmp = cocktail_core_css_CSSPropertyValue::GROUP(new _hx_array(array(cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$REPEAT), cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$NO_REPEAT))));
					$GLOBALS['%s']->pop();
					return $»tmp;
				}break;
				case 69:
				{
					$»tmp = cocktail_core_css_CSSPropertyValue::GROUP(new _hx_array(array(cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$NO_REPEAT), cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$REPEAT))));
					$GLOBALS['%s']->pop();
					return $»tmp;
				}break;
				default:{
				}break;
				}
			}break;
			case 13:
			$value = $»t->params[0];
			{
			}break;
			default:{
			}break;
			}
		}break;
		case "background-size":{
			$»t = ($property);
			switch($»t->index) {
			case 7:
			$value = $»t->params[0];
			{
				$»tmp = cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH(cocktail_core_css_CSSValueConverter::getPixelFromLength($value, $fontSize, $xHeight));
				$GLOBALS['%s']->pop();
				return $»tmp;
			}break;
			case 13:
			$value = $»t->params[0];
			{
				$backgroundSizeX = null;
				$backgroundSizeY = null;
				$»t2 = ($value[0]);
				switch($»t2->index) {
				case 7:
				$value1 = $»t2->params[0];
				{
					$backgroundSizeX = cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH(cocktail_core_css_CSSValueConverter::getPixelFromLength($value1, $fontSize, $xHeight));
				}break;
				default:{
					$backgroundSizeX = $value[0];
				}break;
				}
				$»t2 = ($value[1]);
				switch($»t2->index) {
				case 7:
				$value1 = $»t2->params[0];
				{
					$backgroundSizeY = cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH(cocktail_core_css_CSSValueConverter::getPixelFromLength($value1, $fontSize, $xHeight));
				}break;
				default:{
					$backgroundSizeY = $value[1];
				}break;
				}
				{
					$»tmp = cocktail_core_css_CSSPropertyValue::GROUP(new _hx_array(array($backgroundSizeX, $backgroundSizeY)));
					$GLOBALS['%s']->pop();
					return $»tmp;
				}
			}break;
			default:{
			}break;
			}
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $property;
		}
		$GLOBALS['%s']->pop();
	}
	public function setProperty($propertyName, $styleDeclaration, $parentStyleDeclaration, $initialStyleDeclaration, $parentFontSize, $parentXHeight, $fontSize, $xHeight, $programmaticChange, $isInherited) {
		$GLOBALS['%s']->push("cocktail.core.css.CoreStyle::setProperty");
		$»spos = $GLOBALS['%s']->length;
		$propertyData = $styleDeclaration->getTypedProperty($propertyName);
		$property = $propertyData->typedValue;
		$specifiedProperty = $this->specifiedValues->getTypedProperty($propertyName);
		if($specifiedProperty !== null) {
			if(Type::enumEq($property, $specifiedProperty->typedValue) === true) {
				$GLOBALS['%s']->pop();
				return false;
			}
		}
		$this->specifiedValues->setTypedProperty($propertyName, $property, $propertyData->important);
		$computedProperty = null;
		$»t = ($property);
		switch($»t->index) {
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
		{
			$GLOBALS['%s']->pop();
			return true;
		}
		$GLOBALS['%s']->pop();
	}
	public function cascadeProperty($propertyName, $initialStyleDeclaration, $styleSheetDeclaration, $inlineStyleDeclaration, $parentStyleDeclaration, $parentFontSize, $parentXHeight, $fontSize, $xHeight, $programmaticChange) {
		$GLOBALS['%s']->push("cocktail.core.css.CoreStyle::cascadeProperty");
		$»spos = $GLOBALS['%s']->length;
		if($inlineStyleDeclaration->getTypedProperty($propertyName) !== null) {
			$»tmp = $this->setProperty($propertyName, $inlineStyleDeclaration, $parentStyleDeclaration, $initialStyleDeclaration, $parentFontSize, $parentXHeight, $fontSize, $xHeight, $programmaticChange, false);
			$GLOBALS['%s']->pop();
			return $»tmp;
		} else {
			if($styleSheetDeclaration->getTypedProperty($propertyName) !== null) {
				$»tmp = $this->setProperty($propertyName, $styleSheetDeclaration, $parentStyleDeclaration, $initialStyleDeclaration, $parentFontSize, $parentXHeight, $fontSize, $xHeight, $programmaticChange, false);
				$GLOBALS['%s']->pop();
				return $»tmp;
			} else {
				if($this->isInherited($propertyName) === true) {
					$»tmp = $this->setProperty($propertyName, $parentStyleDeclaration, $parentStyleDeclaration, $initialStyleDeclaration, $parentFontSize, $parentXHeight, $fontSize, $xHeight, $programmaticChange, true);
					$GLOBALS['%s']->pop();
					return $»tmp;
				} else {
					$»tmp = $this->setProperty($propertyName, $initialStyleDeclaration, $parentStyleDeclaration, $initialStyleDeclaration, $parentFontSize, $parentXHeight, $fontSize, $xHeight, $programmaticChange, false);
					$GLOBALS['%s']->pop();
					return $»tmp;
				}
			}
		}
		$GLOBALS['%s']->pop();
	}
	public function cascade($properties, $initialStyleDeclaration, $styleSheetDeclaration, $inlineStyleDeclaration, $parentStyleDeclaration, $parentFontSize, $parentXHeight, $programmaticChange) {
		$GLOBALS['%s']->push("cocktail.core.css.CoreStyle::cascade");
		$»spos = $GLOBALS['%s']->length;
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
		$»it = $properties->keys();
		while($»it->hasNext()) {
			$propertyName = $»it->next();
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
		{
			$GLOBALS['%s']->pop();
			return $changedProperties;
		}
		$GLOBALS['%s']->pop();
	}
	public function initUsedValues() {
		$GLOBALS['%s']->push("cocktail.core.css.CoreStyle::initUsedValues");
		$»spos = $GLOBALS['%s']->length;
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
		$GLOBALS['%s']->pop();
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
		else if(isset($this->»dynamics[$m]) && is_callable($this->»dynamics[$m]))
			return call_user_func_array($this->»dynamics[$m], $a);
		else if('toString' == $m)
			return $this->__toString();
		else
			throw new HException('Unable to call «'.$m.'»');
	}
	static $__properties__ = array("get_display" => "get_display","get_position" => "get_position","get_cssFloat" => "get_cssFloat","get_clear" => "get_clear","get_zIndex" => "get_zIndex","get_marginLeft" => "get_marginLeft","get_marginRight" => "get_marginRight","get_marginTop" => "get_marginTop","get_marginBottom" => "get_marginTop","get_paddingLeft" => "get_paddingLeft","get_paddingRight" => "get_paddingRight","get_paddingTop" => "get_paddingTop","get_paddingBottom" => "get_paddingBottom","get_width" => "get_width","get_height" => "get_height","get_minHeight" => "get_minHeight","get_maxHeight" => "get_maxHeight","get_minWidth" => "get_minWidth","get_maxWidth" => "get_maxWidth","get_top" => "get_top","get_left" => "get_left","get_bottom" => "get_bottom","get_right" => "get_right","get_backgroundColor" => "get_backgroundColor","get_backgroundImage" => "get_backgroundImage","get_backgroundRepeat" => "get_backgroundRepeat","get_backgroundOrigin" => "get_backgroundOrigin","get_backgroundSize" => "get_backgroundSize","get_backgroundPosition" => "get_backgroundPosition","get_backgroundClip" => "get_backgroundClip","get_fontSize" => "get_fontSize","get_fontWeight" => "get_fontWeight","get_fontStyle" => "get_fontStyle","get_fontFamily" => "get_fontFamily","get_fontVariant" => "get_fontVariant","get_color" => "get_color","get_lineHeight" => "get_lineHeight","get_textTransform" => "get_textTransform","get_letterSpacing" => "get_letterSpacing","get_wordSpacing" => "get_wordSpacing","get_whiteSpace" => "get_whiteSpace","get_textAlign" => "get_textAlign","get_textIndent" => "get_textIndent","get_verticalAlign" => "get_verticalAlign","get_opacity" => "get_opacity","get_visibility" => "get_visibility","get_overflowX" => "get_overflowX","get_overflowY" => "get_overflowY","get_transformOrigin" => "get_transformOrigin","get_transform" => "get_transform","get_cursor" => "get_cursor","get_transitionProperty" => "get_transitionProperty","get_transitionDuration" => "get_transitionDuration","get_transitionDelay" => "get_transitionDelay","get_transitionTimingFunction" => "get_transitionTimingFunction","get_fontMetrics" => "get_fontMetricsData");
	function __toString() { return 'cocktail.core.css.CoreStyle'; }
}

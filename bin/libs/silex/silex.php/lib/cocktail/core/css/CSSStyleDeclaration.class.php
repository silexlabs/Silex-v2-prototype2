<?php

class cocktail_core_css_CSSStyleDeclaration {
	public function __construct($parentRule = null, $onStyleChange = null) {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::new");
		$»spos = $GLOBALS['%s']->length;
		$this->_onStyleChange = $onStyleChange;
		$this->parentRule = $parentRule;
		$this->_properties = new _hx_array(array());
		$GLOBALS['%s']->pop();
	}}
	public function set_transformOrigin($value) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::set_transformOrigin");
		$»spos = $GLOBALS['%s']->length;
		$this->setProperty("transform-origin", $value, null);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_transformOrigin() {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::get_transformOrigin");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getPropertyValue("transform-origin");
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_transform($value) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::set_transform");
		$»spos = $GLOBALS['%s']->length;
		$this->setProperty("transform", $value, null);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_transform() {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::get_transform");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getPropertyValue("transform");
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_transitionTimingFunction($value) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::set_transitionTimingFunction");
		$»spos = $GLOBALS['%s']->length;
		$this->setProperty("transition-timing-function", $value, null);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_transitionTimingFunction() {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::get_transitionTimingFunction");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getPropertyValue("transition-timing-function");
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_transitionDelay($value) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::set_transitionDelay");
		$»spos = $GLOBALS['%s']->length;
		$this->setProperty("transition-delay", $value, null);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_transitionDelay() {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::get_transitionDelay");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getPropertyValue("transition-delay");
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_transitionDuration($value) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::set_transitionDuration");
		$»spos = $GLOBALS['%s']->length;
		$this->setProperty("transition-duration", $value, null);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_transitionDuration() {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::get_transitionDuration");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getPropertyValue("transition-duration");
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_transitionProperty($value) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::set_transitionProperty");
		$»spos = $GLOBALS['%s']->length;
		$this->setProperty("transition-property", $value, null);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_transitionProperty() {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::get_transitionProperty");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getPropertyValue("transition-property");
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_cursor() {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::get_cursor");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getPropertyValue("cursor");
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_cursor($value) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::set_cursor");
		$»spos = $GLOBALS['%s']->length;
		$this->setProperty("cursor", $value, null);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_overflowY($value) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::set_overflowY");
		$»spos = $GLOBALS['%s']->length;
		$this->setProperty("overflow-y", $value, null);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_overflowY() {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::get_overflowY");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getPropertyValue("overflow-y");
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_overflowX($value) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::set_overflowX");
		$»spos = $GLOBALS['%s']->length;
		$this->setProperty("overflow-x", $value, null);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_overflowX() {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::get_overflowX");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getPropertyValue("overflow-x");
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_overflow($value) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::set_overflow");
		$»spos = $GLOBALS['%s']->length;
		$this->setProperty("overflow", $value, null);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_overflow() {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::get_overflow");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getPropertyValue("overflow");
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_backgroundOrigin() {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::get_backgroundOrigin");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getPropertyValue("background-origin");
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_backgroundOrigin($value) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::set_backgroundOrigin");
		$»spos = $GLOBALS['%s']->length;
		$this->setProperty("background-origin", $value, null);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_backgroundPosition() {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::get_backgroundPosition");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getPropertyValue("background-position");
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_backgroundPosition($value) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::set_backgroundPosition");
		$»spos = $GLOBALS['%s']->length;
		$this->setProperty("background-position", $value, null);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_backgroundClip() {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::get_backgroundClip");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getPropertyValue("background-clip");
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_backgroundClip($value) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::set_backgroundClip");
		$»spos = $GLOBALS['%s']->length;
		$this->setProperty("background-clip", $value, null);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_backgroundSize() {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::get_backgroundSize");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getPropertyValue("background-size");
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_backgroundSize($value) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::set_backgroundSize");
		$»spos = $GLOBALS['%s']->length;
		$this->setProperty("background-size", $value, null);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_backgroundRepeat() {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::get_backgroundRepeat");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getPropertyValue("background-repeat");
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_backgroundRepeat($value) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::set_backgroundRepeat");
		$»spos = $GLOBALS['%s']->length;
		$this->setProperty("background-repeat", $value, null);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_backgroundImage() {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::get_backgroundImage");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getPropertyValue("background-image");
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_backgroundImage($value) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::set_backgroundImage");
		$»spos = $GLOBALS['%s']->length;
		$this->setProperty("background-image", $value, null);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_backgroundColor() {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::get_backgroundColor");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getPropertyValue("background-color");
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_backgroundColor($value) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::set_backgroundColor");
		$»spos = $GLOBALS['%s']->length;
		$this->setProperty("background-color", $value, null);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_textAlign($value) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::set_textAlign");
		$»spos = $GLOBALS['%s']->length;
		$this->setProperty("text-align", $value, null);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_textAlign() {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::get_textAlign");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getPropertyValue("text-align");
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_whiteSpace($value) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::set_whiteSpace");
		$»spos = $GLOBALS['%s']->length;
		$this->setProperty("white-space", $value, null);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_whiteSpace() {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::get_whiteSpace");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getPropertyValue("white-space");
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_textIndent($value) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::set_textIndent");
		$»spos = $GLOBALS['%s']->length;
		$this->setProperty("text-indent", $value, null);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_textIndent() {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::get_textIndent");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getPropertyValue("text-indent");
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_verticalAlign($value) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::set_verticalAlign");
		$»spos = $GLOBALS['%s']->length;
		$this->setProperty("vertical-align", $value, null);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_verticalAlign() {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::get_verticalAlign");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getPropertyValue("vertical-align");
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_lineHeight($value) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::set_lineHeight");
		$»spos = $GLOBALS['%s']->length;
		$this->setProperty("line-height", $value, null);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_lineHeight() {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::get_lineHeight");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getPropertyValue("line-height");
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_wordSpacing($value) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::set_wordSpacing");
		$»spos = $GLOBALS['%s']->length;
		$this->setProperty("word-spacing", $value, null);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_wordSpacing() {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::get_wordSpacing");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getPropertyValue("word-spacing");
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_color($value) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::set_color");
		$»spos = $GLOBALS['%s']->length;
		$this->setProperty("color", $value, null);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_color() {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::get_color");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getPropertyValue("color");
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_letterSpacing($value) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::set_letterSpacing");
		$»spos = $GLOBALS['%s']->length;
		$this->setProperty("letter-spacing", $value, null);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_letterSpacing() {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::get_letterSpacing");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getPropertyValue("letter-spacing");
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_textTransform($value) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::set_textTransform");
		$»spos = $GLOBALS['%s']->length;
		$this->setProperty("text-transform", $value, null);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_textTransform() {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::get_textTransform");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getPropertyValue("text-transform");
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_fontVariant($value) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::set_fontVariant");
		$»spos = $GLOBALS['%s']->length;
		$this->setProperty("font-variant", $value, null);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_fontVariant() {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::get_fontVariant");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getPropertyValue("font-variant");
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_fontFamily($value) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::set_fontFamily");
		$»spos = $GLOBALS['%s']->length;
		$this->setProperty("font-family", $value, null);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_fontFamily() {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::get_fontFamily");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getPropertyValue("font-family");
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_fontStyle($value) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::set_fontStyle");
		$»spos = $GLOBALS['%s']->length;
		$this->setProperty("font-style", $value, null);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_fontStyle() {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::get_fontStyle");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getPropertyValue("font-style");
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_fontWeight($value) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::set_fontWeight");
		$»spos = $GLOBALS['%s']->length;
		$this->setProperty("font-weight", $value, null);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_fontWeight() {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::get_fontWeight");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getPropertyValue("font-weight");
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_fontSize($value) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::set_fontSize");
		$»spos = $GLOBALS['%s']->length;
		$this->setProperty("font-size", $value, null);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_fontSize() {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::get_fontSize");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getPropertyValue("font-size");
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_clear($value) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::set_clear");
		$»spos = $GLOBALS['%s']->length;
		$this->setProperty("clear", $value, null);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_clear() {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::get_clear");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getPropertyValue("clear");
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_CSSFloat($value) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::set_CSSFloat");
		$»spos = $GLOBALS['%s']->length;
		$this->setProperty("float", $value, null);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_CSSFloat() {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::get_CSSFloat");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getPropertyValue("float");
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_right($value) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::set_right");
		$»spos = $GLOBALS['%s']->length;
		$this->setProperty("right", $value, null);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_right() {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::get_right");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getPropertyValue("right");
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_bottom($value) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::set_bottom");
		$»spos = $GLOBALS['%s']->length;
		$this->setProperty("bottom", $value, null);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_bottom() {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::get_bottom");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getPropertyValue("bottom");
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_left($value) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::set_left");
		$»spos = $GLOBALS['%s']->length;
		$this->setProperty("left", $value, null);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_left() {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::get_left");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getPropertyValue("left");
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_top($value) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::set_top");
		$»spos = $GLOBALS['%s']->length;
		$this->setProperty("top", $value, null);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_top() {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::get_top");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getPropertyValue("top");
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_maxWidth($value) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::set_maxWidth");
		$»spos = $GLOBALS['%s']->length;
		$this->setProperty("max-width", $value, null);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_maxWidth() {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::get_maxWidth");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getPropertyValue("max-width");
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_minWidth($value) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::set_minWidth");
		$»spos = $GLOBALS['%s']->length;
		$this->setProperty("min-width", $value, null);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_minWidth() {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::get_minWidth");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getPropertyValue("min-width");
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_maxHeight($value) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::set_maxHeight");
		$»spos = $GLOBALS['%s']->length;
		$this->setProperty("max-height", $value, null);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_maxHeight() {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::get_maxHeight");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getPropertyValue("max-height");
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_minHeight($value) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::set_minHeight");
		$»spos = $GLOBALS['%s']->length;
		$this->setProperty("min-height", $value, null);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_minHeight() {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::get_minHeight");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getPropertyValue("min-height");
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_height($value) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::set_height");
		$»spos = $GLOBALS['%s']->length;
		$this->setProperty("height", $value, null);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_height() {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::get_height");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getPropertyValue("height");
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_width($value) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::set_width");
		$»spos = $GLOBALS['%s']->length;
		$this->setProperty("width", $value, null);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_width() {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::get_width");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getPropertyValue("width");
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_zIndex($value) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::set_zIndex");
		$»spos = $GLOBALS['%s']->length;
		$this->setProperty("z-index", $value, null);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_zIndex() {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::get_zIndex");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getPropertyValue("z-index");
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_position($value) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::set_position");
		$»spos = $GLOBALS['%s']->length;
		$this->setProperty("position", $value, null);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_position() {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::get_position");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getPropertyValue("position");
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_display($value) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::set_display");
		$»spos = $GLOBALS['%s']->length;
		$this->setProperty("display", $value, null);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_display() {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::get_display");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getPropertyValue("display");
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_paddingBottom($value) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::set_paddingBottom");
		$»spos = $GLOBALS['%s']->length;
		$this->setProperty("padding-bottom", $value, null);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_paddingBottom() {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::get_paddingBottom");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getPropertyValue("padding-bottom");
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_paddingTop($value) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::set_paddingTop");
		$»spos = $GLOBALS['%s']->length;
		$this->setProperty("padding-top", $value, null);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_paddingTop() {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::get_paddingTop");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getPropertyValue("padding-top");
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_paddingRight($value) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::set_paddingRight");
		$»spos = $GLOBALS['%s']->length;
		$this->setProperty("padding-right", $value, null);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_paddingRight() {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::get_paddingRight");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getPropertyValue("padding-right");
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_paddingLeft($value) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::set_paddingLeft");
		$»spos = $GLOBALS['%s']->length;
		$this->setProperty("padding-left", $value, null);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_paddingLeft() {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::get_paddingLeft");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getPropertyValue("padding-left");
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_padding($value) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::set_padding");
		$»spos = $GLOBALS['%s']->length;
		$this->setProperty("padding", $value, null);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_padding() {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::get_padding");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getPropertyValue("padding");
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_marginBottom($value) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::set_marginBottom");
		$»spos = $GLOBALS['%s']->length;
		$this->setProperty("margin-bottom", $value, null);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_marginBottom() {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::get_marginBottom");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getPropertyValue("margin-bottom");
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_marginTop($value) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::set_marginTop");
		$»spos = $GLOBALS['%s']->length;
		$this->setProperty("margin-top", $value, null);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_marginTop() {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::get_marginTop");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getPropertyValue("margin-top");
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_marginRight($value) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::set_marginRight");
		$»spos = $GLOBALS['%s']->length;
		$this->setProperty("margin-right", $value, null);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_marginRight() {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::get_marginRight");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getPropertyValue("margin-right");
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_marginLeft($value) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::set_marginLeft");
		$»spos = $GLOBALS['%s']->length;
		$this->setProperty("margin-left", $value, null);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_marginLeft() {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::get_marginLeft");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getPropertyValue("margin-left");
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_margin($value) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::set_margin");
		$»spos = $GLOBALS['%s']->length;
		$this->setProperty("margin", $value, null);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_margin() {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::get_margin");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getPropertyValue("margin");
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_visibility($value) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::set_visibility");
		$»spos = $GLOBALS['%s']->length;
		$this->setProperty("visibility", $value, null);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_visibility() {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::get_visibility");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getPropertyValue("visibility");
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_opacity($value) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::set_opacity");
		$»spos = $GLOBALS['%s']->length;
		$this->setProperty("opacity", $value, null);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_opacity() {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::get_opacity");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getPropertyValue("opacity");
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_length() {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::get_length");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->_properties->length;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_cssText($value) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::set_cssText");
		$»spos = $GLOBALS['%s']->length;
		$this->_properties = cocktail_core_utils_Utils::clear($this->_properties);
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
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_cssText() {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::get_cssText");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->serializeStyleDeclaration();
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function serializeStyleDeclaration() {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::serializeStyleDeclaration");
		$»spos = $GLOBALS['%s']->length;
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
		{
			$GLOBALS['%s']->pop();
			return $serializedStyleDeclaration;
		}
		$GLOBALS['%s']->pop();
	}
	public function isPositiveLength($length) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::isPositiveLength");
		$»spos = $GLOBALS['%s']->length;
		$»t = ($length);
		switch($»t->index) {
		case 0:
		$value = $»t->params[0];
		{
			$»tmp = $value >= 0;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}break;
		case 6:
		$value = $»t->params[0];
		{
			$»tmp = $value >= 0;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}break;
		case 5:
		$value = $»t->params[0];
		{
			$»tmp = $value >= 0;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}break;
		case 4:
		$value = $»t->params[0];
		{
			$»tmp = $value >= 0;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}break;
		case 7:
		$value = $»t->params[0];
		{
			$»tmp = $value >= 0;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}break;
		case 3:
		$value = $»t->params[0];
		{
			$»tmp = $value >= 0;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}break;
		case 2:
		$value = $»t->params[0];
		{
			$»tmp = $value >= 0;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}break;
		case 1:
		$value = $»t->params[0];
		{
			$»tmp = $value >= 0;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	public function isValidPaddingProperty($styleValue) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::isValidPaddingProperty");
		$»spos = $GLOBALS['%s']->length;
		$»t = ($styleValue);
		switch($»t->index) {
		case 7:
		$value = $»t->params[0];
		{
			if($this->isPositiveLength($value) === true) {
				$GLOBALS['%s']->pop();
				return true;
			}
		}break;
		case 0:
		$value = $»t->params[0];
		{
			if($value === 0) {
				$GLOBALS['%s']->pop();
				return true;
			}
		}break;
		case 2:
		$value = $»t->params[0];
		{
			if($value >= 0) {
				$GLOBALS['%s']->pop();
				return true;
			}
		}break;
		case 15:
		{
			$GLOBALS['%s']->pop();
			return true;
		}break;
		default:{
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function isValidMarginProperty($styleValue) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::isValidMarginProperty");
		$»spos = $GLOBALS['%s']->length;
		$»t = ($styleValue);
		switch($»t->index) {
		case 7:
		$value = $»t->params[0];
		{
			$GLOBALS['%s']->pop();
			return true;
		}break;
		case 0:
		$value = $»t->params[0];
		{
			if($value === 0) {
				$GLOBALS['%s']->pop();
				return true;
			}
		}break;
		case 2:
		$value = $»t->params[0];
		{
			$GLOBALS['%s']->pop();
			return true;
		}break;
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
			}break;
			}
		}break;
		case 15:
		{
			$GLOBALS['%s']->pop();
			return true;
		}break;
		default:{
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function isValidOverflowValue($styleValue) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::isValidOverflowValue");
		$»spos = $GLOBALS['%s']->length;
		$»t = ($styleValue);
		switch($»t->index) {
		case 4:
		$value = $»t->params[0];
		{
			$»t2 = ($value);
			switch($»t2->index) {
			case 36:
			case 38:
			case 37:
			case 27:
			{
				$GLOBALS['%s']->pop();
				return true;
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
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function isValidTransitionGroup($styleValues) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::isValidTransitionGroup");
		$»spos = $GLOBALS['%s']->length;
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
						$GLOBALS['%s']->pop();
						return false;
					}
				}
			}
			if($this->isValidTransitionProperty($styleValues[1])) {
				if($hasTransitionProperty === true) {
					$GLOBALS['%s']->pop();
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
							$GLOBALS['%s']->pop();
							return false;
						}
					} else {
						$GLOBALS['%s']->pop();
						return false;
					}
				}
			}
			if($styleValues->length === 2) {
				$GLOBALS['%s']->pop();
				return true;
			}
			if($this->isValidTransitionProperty($styleValues[2])) {
				if($hasTransitionProperty === true) {
					$GLOBALS['%s']->pop();
					return false;
				}
			} else {
				if($this->isValidTransitionDelayOrDuration($styleValues[2])) {
					if($hasTransitionDuration === true) {
						if($hasTransitionDelay === true) {
							$GLOBALS['%s']->pop();
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
							$GLOBALS['%s']->pop();
							return false;
						}
					} else {
						$GLOBALS['%s']->pop();
						return false;
					}
				}
			}
			if($styleValues->length === 3) {
				$GLOBALS['%s']->pop();
				return true;
			}
			if($this->isValidTransitionProperty($styleValues[3])) {
				if($hasTransitionProperty === true) {
					$GLOBALS['%s']->pop();
					return false;
				}
			} else {
				if($this->isValidTransitionDelayOrDuration($styleValues[3])) {
					if($hasTransitionDuration === true) {
						if($hasTransitionDelay === true) {
							$GLOBALS['%s']->pop();
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
							$GLOBALS['%s']->pop();
							return false;
						}
					} else {
						$GLOBALS['%s']->pop();
						return false;
					}
				}
			}
			{
				$GLOBALS['%s']->pop();
				return true;
			}
		}
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function isValidTransitionShorthand($styleValue) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::isValidTransitionShorthand");
		$»spos = $GLOBALS['%s']->length;
		$»t = ($styleValue);
		switch($»t->index) {
		case 9:
		$value = $»t->params[0];
		{
			$»tmp = $this->isValidTransitionDelayOrDuration($styleValue);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}break;
		case 3:
		$value = $»t->params[0];
		{
			$GLOBALS['%s']->pop();
			return true;
		}break;
		case 4:
		$keyword = $»t->params[0];
		{
			$isValid = $this->isValidTransitionProperty($styleValue);
			if($isValid === true) {
				$GLOBALS['%s']->pop();
				return true;
			}
			{
				$»tmp = $this->isValidTransitionTimingFunction($styleValue);
				$GLOBALS['%s']->pop();
				return $»tmp;
			}
		}break;
		case 13:
		$value = $»t->params[0];
		{
			$»tmp = $this->isValidTransitionGroup($value);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}break;
		case 15:
		case 16:
		{
			$GLOBALS['%s']->pop();
			return true;
		}break;
		default:{
			$»tmp = $this->isValidTransitionTimingFunction($styleValue);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	public function isValidShorthand($propertyName, $styleValue) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::isValidShorthand");
		$»spos = $GLOBALS['%s']->length;
		switch($propertyName) {
		case "margin":{
			$»t = ($styleValue);
			switch($»t->index) {
			case 7:
			$value = $»t->params[0];
			{
				$»tmp = $this->isValidMarginProperty($styleValue);
				$GLOBALS['%s']->pop();
				return $»tmp;
			}break;
			case 2:
			$value = $»t->params[0];
			{
				$»tmp = $this->isValidMarginProperty($styleValue);
				$GLOBALS['%s']->pop();
				return $»tmp;
			}break;
			case 0:
			$value = $»t->params[0];
			{
				$»tmp = $this->isValidMarginProperty($styleValue);
				$GLOBALS['%s']->pop();
				return $»tmp;
			}break;
			case 4:
			$value = $»t->params[0];
			{
				$»tmp = $this->isValidMarginProperty($styleValue);
				$GLOBALS['%s']->pop();
				return $»tmp;
			}break;
			case 15:
			case 16:
			{
				$GLOBALS['%s']->pop();
				return true;
			}break;
			case 13:
			$value = $»t->params[0];
			{
				switch($value->length) {
				case 2:{
					$isValid = $this->isValidMarginProperty($value[0]);
					if($isValid === false) {
						$GLOBALS['%s']->pop();
						return false;
					}
					{
						$»tmp = $this->isValidMarginProperty($value[1]);
						$GLOBALS['%s']->pop();
						return $»tmp;
					}
				}break;
				case 3:{
					$isValid = $this->isValidMarginProperty($value[0]);
					if($isValid === false) {
						$GLOBALS['%s']->pop();
						return false;
					}
					$isValid = $this->isValidMarginProperty($value[1]);
					if($isValid === false) {
						$GLOBALS['%s']->pop();
						return false;
					}
					{
						$»tmp = $this->isValidMarginProperty($value[2]);
						$GLOBALS['%s']->pop();
						return $»tmp;
					}
				}break;
				case 4:{
					$isValid = $this->isValidMarginProperty($value[0]);
					if($isValid === false) {
						$GLOBALS['%s']->pop();
						return false;
					}
					$isValid = $this->isValidMarginProperty($value[1]);
					if($isValid === false) {
						$GLOBALS['%s']->pop();
						return false;
					}
					$isValid = $this->isValidMarginProperty($value[2]);
					if($isValid === false) {
						$GLOBALS['%s']->pop();
						return false;
					}
					{
						$»tmp = $this->isValidMarginProperty($value[3]);
						$GLOBALS['%s']->pop();
						return $»tmp;
					}
				}break;
				}
			}break;
			default:{
			}break;
			}
		}break;
		case "padding":{
			$»t = ($styleValue);
			switch($»t->index) {
			case 7:
			$value = $»t->params[0];
			{
				$»tmp = $this->isValidPaddingProperty($styleValue);
				$GLOBALS['%s']->pop();
				return $»tmp;
			}break;
			case 2:
			$value = $»t->params[0];
			{
				$»tmp = $this->isValidPaddingProperty($styleValue);
				$GLOBALS['%s']->pop();
				return $»tmp;
			}break;
			case 0:
			$value = $»t->params[0];
			{
				$»tmp = $this->isValidPaddingProperty($styleValue);
				$GLOBALS['%s']->pop();
				return $»tmp;
			}break;
			case 15:
			case 16:
			{
				$GLOBALS['%s']->pop();
				return true;
			}break;
			case 13:
			$value = $»t->params[0];
			{
				switch($value->length) {
				case 2:{
					$isValid = $this->isValidPaddingProperty($value[0]);
					if($isValid === false) {
						$GLOBALS['%s']->pop();
						return false;
					}
					{
						$»tmp = $this->isValidPaddingProperty($value[1]);
						$GLOBALS['%s']->pop();
						return $»tmp;
					}
				}break;
				case 3:{
					$isValid = $this->isValidPaddingProperty($value[0]);
					if($isValid === false) {
						$GLOBALS['%s']->pop();
						return false;
					}
					$isValid = $this->isValidPaddingProperty($value[1]);
					if($isValid === false) {
						$GLOBALS['%s']->pop();
						return false;
					}
					{
						$»tmp = $this->isValidPaddingProperty($value[2]);
						$GLOBALS['%s']->pop();
						return $»tmp;
					}
				}break;
				case 4:{
					$isValid = $this->isValidPaddingProperty($value[0]);
					if($isValid === false) {
						$GLOBALS['%s']->pop();
						return false;
					}
					$isValid = $this->isValidPaddingProperty($value[1]);
					if($isValid === false) {
						$GLOBALS['%s']->pop();
						return false;
					}
					$isValid = $this->isValidPaddingProperty($value[2]);
					if($isValid === false) {
						$GLOBALS['%s']->pop();
						return false;
					}
					{
						$»tmp = $this->isValidPaddingProperty($value[3]);
						$GLOBALS['%s']->pop();
						return $»tmp;
					}
				}break;
				}
			}break;
			default:{
			}break;
			}
		}break;
		case "overflow":{
			$»t = ($styleValue);
			switch($»t->index) {
			case 4:
			$value = $»t->params[0];
			{
				$»tmp = $this->isValidOverflowValue($styleValue);
				$GLOBALS['%s']->pop();
				return $»tmp;
			}break;
			case 15:
			case 16:
			{
				$GLOBALS['%s']->pop();
				return true;
			}break;
			case 13:
			$value = $»t->params[0];
			{
				$isValid = $this->isValidOverflowValue($value[0]);
				if($isValid === false) {
					$GLOBALS['%s']->pop();
					return false;
				}
				{
					$»tmp = $this->isValidOverflowValue($value[1]);
					$GLOBALS['%s']->pop();
					return $»tmp;
				}
			}break;
			default:{
			}break;
			}
		}break;
		case "transition":{
			$»t = ($styleValue);
			switch($»t->index) {
			case 14:
			$value = $»t->params[0];
			{
				$length = $value->length;
				{
					$_g = 0;
					while($_g < $length) {
						$i = $_g++;
						if($this->isValidTransitionShorthand($value[$i]) === false) {
							$GLOBALS['%s']->pop();
							return false;
						}
						unset($i);
					}
				}
				{
					$GLOBALS['%s']->pop();
					return true;
				}
			}break;
			default:{
				$»tmp = $this->isValidTransitionShorthand($styleValue);
				$GLOBALS['%s']->pop();
				return $»tmp;
			}break;
			}
		}break;
		default:{
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function setTransitionShorthand($styleValue, $useDelayForTime, $transitionProperty, $transitionDuration, $transitionDelay, $transitionTimingFunction) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::setTransitionShorthand");
		$»spos = $GLOBALS['%s']->length;
		$»t = ($styleValue);
		switch($»t->index) {
		case 3:
		$value = $»t->params[0];
		{
			$transitionProperty->push($styleValue);
		}break;
		case 9:
		$value = $»t->params[0];
		{
			if($useDelayForTime === false) {
				$transitionDuration->push($styleValue);
			} else {
				$transitionDelay->push($styleValue);
			}
		}break;
		case 4:
		$value = $»t->params[0];
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
		$GLOBALS['%s']->pop();
	}
	public function setTransitionGroupShorthand($styleValues, $transitionProperty, $transitionDuration, $transitionDelay, $transitionTimingFunction) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::setTransitionGroupShorthand");
		$»spos = $GLOBALS['%s']->length;
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
		$GLOBALS['%s']->pop();
	}
	public function setShorthand($propertyName, $styleValue, $important) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::setShorthand");
		$»spos = $GLOBALS['%s']->length;
		switch($propertyName) {
		case "margin":{
			$»t = ($styleValue);
			switch($»t->index) {
			case 7:
			$value = $»t->params[0];
			{
				$this->setTypedProperty("margin-left", $styleValue, $important);
				$this->setTypedProperty("margin-right", $styleValue, $important);
				$this->setTypedProperty("margin-top", $styleValue, $important);
				$this->setTypedProperty("margin-bottom", $styleValue, $important);
			}break;
			case 2:
			$value = $»t->params[0];
			{
				$this->setTypedProperty("margin-left", $styleValue, $important);
				$this->setTypedProperty("margin-right", $styleValue, $important);
				$this->setTypedProperty("margin-top", $styleValue, $important);
				$this->setTypedProperty("margin-bottom", $styleValue, $important);
			}break;
			case 0:
			$value = $»t->params[0];
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
			$value = $»t->params[0];
			{
				if($value === cocktail_core_css_CSSKeywordValue::$AUTO) {
					$this->setTypedProperty("margin-left", $styleValue, $important);
					$this->setTypedProperty("margin-right", $styleValue, $important);
					$this->setTypedProperty("margin-top", $styleValue, $important);
					$this->setTypedProperty("margin-bottom", $styleValue, $important);
				}
			}break;
			case 13:
			$value = $»t->params[0];
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
			$»t = ($styleValue);
			switch($»t->index) {
			case 7:
			$value = $»t->params[0];
			{
				$this->setTypedProperty("padding-left", $styleValue, $important);
				$this->setTypedProperty("padding-right", $styleValue, $important);
				$this->setTypedProperty("padding-top", $styleValue, $important);
				$this->setTypedProperty("padding-bottom", $styleValue, $important);
			}break;
			case 2:
			$value = $»t->params[0];
			{
				$this->setTypedProperty("padding-left", $styleValue, $important);
				$this->setTypedProperty("padding-right", $styleValue, $important);
				$this->setTypedProperty("padding-top", $styleValue, $important);
				$this->setTypedProperty("padding-bottom", $styleValue, $important);
			}break;
			case 0:
			$value = $»t->params[0];
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
			$value = $»t->params[0];
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
			$»t = ($styleValue);
			switch($»t->index) {
			case 4:
			$value = $»t->params[0];
			{
				$this->setTypedProperty("overflow-x", $styleValue, $important);
				$this->setTypedProperty("overflow-y", $styleValue, $important);
			}break;
			case 13:
			$value = $»t->params[0];
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
			$»t = ($styleValue);
			switch($»t->index) {
			case 14:
			$value = $»t->params[0];
			{
				$_g1 = 0; $_g = $value->length;
				while($_g1 < $_g) {
					$i = $_g1++;
					$»t2 = ($value[$i]);
					switch($»t2->index) {
					case 13:
					$value1 = $»t2->params[0];
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
			$value = $»t->params[0];
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
		$GLOBALS['%s']->pop();
	}
	public function isShorthand($propertyName) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::isShorthand");
		$»spos = $GLOBALS['%s']->length;
		switch($propertyName) {
		case "margin":case "padding":case "overflow":case "transition":{
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
	public function isValidBackgroundSize($property) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::isValidBackgroundSize");
		$»spos = $GLOBALS['%s']->length;
		$»t = ($property);
		switch($»t->index) {
		case 4:
		$value = $»t->params[0];
		{
			$»tmp = $value === cocktail_core_css_CSSKeywordValue::$AUTO;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}break;
		case 7:
		$value = $»t->params[0];
		{
			if($this->isPositiveLength($value)) {
				$GLOBALS['%s']->pop();
				return true;
			}
		}break;
		case 0:
		$value = $»t->params[0];
		{
			$»tmp = $value === 0;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}break;
		case 2:
		$value = $»t->params[0];
		{
			$GLOBALS['%s']->pop();
			return true;
		}break;
		case 15:
		case 16:
		{
			$GLOBALS['%s']->pop();
			return true;
		}break;
		default:{
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function isValidBackgroundPosition($property) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::isValidBackgroundPosition");
		$»spos = $GLOBALS['%s']->length;
		$»t = ($property);
		switch($»t->index) {
		case 7:
		$value = $»t->params[0];
		{
			$GLOBALS['%s']->pop();
			return true;
		}break;
		case 0:
		$value = $»t->params[0];
		{
			$»tmp = $value === 0;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}break;
		case 2:
		$value = $»t->params[0];
		{
			$GLOBALS['%s']->pop();
			return true;
		}break;
		case 4:
		$value = $»t->params[0];
		{
			$»t2 = ($value);
			switch($»t2->index) {
			case 11:
			case 13:
			case 12:
			{
				$GLOBALS['%s']->pop();
				return true;
			}break;
			default:{
			}break;
			}
		}break;
		case 15:
		case 16:
		{
			$GLOBALS['%s']->pop();
			return true;
		}break;
		default:{
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function isValidTransitionDelayOrDuration($property) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::isValidTransitionDelayOrDuration");
		$»spos = $GLOBALS['%s']->length;
		$»t = ($property);
		switch($»t->index) {
		case 0:
		$value = $»t->params[0];
		{
			if($value === 0) {
				$GLOBALS['%s']->pop();
				return true;
			}
		}break;
		case 9:
		$value = $»t->params[0];
		{
			$GLOBALS['%s']->pop();
			return true;
		}break;
		case 15:
		case 16:
		{
			$GLOBALS['%s']->pop();
			return true;
		}break;
		default:{
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function isValidTransitionProperty($property) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::isValidTransitionProperty");
		$»spos = $GLOBALS['%s']->length;
		$»t = ($property);
		switch($»t->index) {
		case 4:
		$value = $»t->params[0];
		{
			$»t2 = ($value);
			switch($»t2->index) {
			case 18:
			case 48:
			case 11:
			case 12:
			case 22:
			case 25:
			{
				$GLOBALS['%s']->pop();
				return true;
			}break;
			default:{
			}break;
			}
		}break;
		case 3:
		$value = $»t->params[0];
		{
			$GLOBALS['%s']->pop();
			return true;
		}break;
		case 15:
		case 16:
		{
			$GLOBALS['%s']->pop();
			return true;
		}break;
		default:{
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function isValidTransitionTimingFunction($property) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::isValidTransitionTimingFunction");
		$»spos = $GLOBALS['%s']->length;
		$»t = ($property);
		switch($»t->index) {
		case 4:
		$value = $»t->params[0];
		{
			$»t2 = ($value);
			switch($»t2->index) {
			case 49:
			case 51:
			case 50:
			case 52:
			case 53:
			case 54:
			case 55:
			{
				$GLOBALS['%s']->pop();
				return true;
			}break;
			default:{
			}break;
			}
		}break;
		case 18:
		$intervalChange = $»t->params[1]; $intervalNumbers = $»t->params[0];
		{
			$GLOBALS['%s']->pop();
			return true;
		}break;
		case 19:
		$y2 = $»t->params[3]; $x2 = $»t->params[2]; $y1 = $»t->params[1]; $x1 = $»t->params[0];
		{
			$GLOBALS['%s']->pop();
			return true;
		}break;
		default:{
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function isValidProperty($propertyName, $styleValue) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::isValidProperty");
		$»spos = $GLOBALS['%s']->length;
		switch($propertyName) {
		case "width":case "height":{
			$»t = ($styleValue);
			switch($»t->index) {
			case 7:
			$value = $»t->params[0];
			{
				if($this->isPositiveLength($value) === true) {
					$GLOBALS['%s']->pop();
					return true;
				}
			}break;
			case 0:
			$value = $»t->params[0];
			{
				if($value === 0) {
					$GLOBALS['%s']->pop();
					return true;
				}
			}break;
			case 2:
			$value = $»t->params[0];
			{
				if($value >= 0) {
					$GLOBALS['%s']->pop();
					return true;
				}
			}break;
			case 4:
			$value = $»t->params[0];
			{
				if($value === cocktail_core_css_CSSKeywordValue::$AUTO) {
					$GLOBALS['%s']->pop();
					return true;
				}
			}break;
			case 15:
			case 16:
			{
				$GLOBALS['%s']->pop();
				return true;
			}break;
			default:{
			}break;
			}
		}break;
		case "display":{
			$»t = ($styleValue);
			switch($»t->index) {
			case 4:
			$value = $»t->params[0];
			{
				$»t2 = ($value);
				switch($»t2->index) {
				case 30:
				case 29:
				case 18:
				case 28:
				{
					$GLOBALS['%s']->pop();
					return true;
				}break;
				default:{
				}break;
				}
			}break;
			case 15:
			case 16:
			{
				$GLOBALS['%s']->pop();
				return true;
			}break;
			default:{
			}break;
			}
		}break;
		case "visibility":{
			$»t = ($styleValue);
			switch($»t->index) {
			case 4:
			$value = $»t->params[0];
			{
				$»t2 = ($value);
				switch($»t2->index) {
				case 36:
				case 37:
				{
					$GLOBALS['%s']->pop();
					return true;
				}break;
				default:{
				}break;
				}
			}break;
			case 15:
			case 16:
			{
				$GLOBALS['%s']->pop();
				return true;
			}break;
			default:{
			}break;
			}
		}break;
		case "position":{
			$»t = ($styleValue);
			switch($»t->index) {
			case 4:
			$value = $»t->params[0];
			{
				$»t2 = ($value);
				switch($»t2->index) {
				case 32:
				case 35:
				case 34:
				case 33:
				{
					$GLOBALS['%s']->pop();
					return true;
				}break;
				default:{
				}break;
				}
			}break;
			case 15:
			case 16:
			{
				$GLOBALS['%s']->pop();
				return true;
			}break;
			default:{
			}break;
			}
		}break;
		case "font-size":{
			$»t = ($styleValue);
			switch($»t->index) {
			case 7:
			$value = $»t->params[0];
			{
				if($this->isPositiveLength($value) === true) {
					$GLOBALS['%s']->pop();
					return true;
				}
			}break;
			case 2:
			$value = $»t->params[0];
			{
				if($value >= 0) {
					$GLOBALS['%s']->pop();
					return true;
				}
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
				case 65:
				case 66:
				{
					$GLOBALS['%s']->pop();
					return true;
				}break;
				default:{
				}break;
				}
			}break;
			case 15:
			case 16:
			{
				$GLOBALS['%s']->pop();
				return true;
			}break;
			default:{
			}break;
			}
		}break;
		case "margin-top":case "margin-left":case "margin-bottom":case "margin-right":{
			$»tmp = $this->isValidMarginProperty($styleValue);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}break;
		case "padding-top":case "padding-bottom":case "padding-left":case "padding-right":{
			$»tmp = $this->isValidPaddingProperty($styleValue);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}break;
		case "max-width":case "max-height":{
			$»t = ($styleValue);
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
				}break;
				}
			}break;
			case 7:
			$value = $»t->params[0];
			{
				if($this->isPositiveLength($value) === true) {
					$GLOBALS['%s']->pop();
					return true;
				}
			}break;
			case 2:
			$value = $»t->params[0];
			{
				if($value >= 0) {
					$GLOBALS['%s']->pop();
					return true;
				}
			}break;
			case 15:
			case 16:
			{
				$GLOBALS['%s']->pop();
				return true;
			}break;
			default:{
			}break;
			}
		}break;
		case "opacity":{
			$»t = ($styleValue);
			switch($»t->index) {
			case 1:
			$value = $»t->params[0];
			{
				$GLOBALS['%s']->pop();
				return true;
			}break;
			case 0:
			$value = $»t->params[0];
			{
				$GLOBALS['%s']->pop();
				return true;
			}break;
			case 15:
			case 16:
			{
				$GLOBALS['%s']->pop();
				return true;
			}break;
			default:{
			}break;
			}
		}break;
		case "min-width":case "min-height":{
			$»t = ($styleValue);
			switch($»t->index) {
			case 7:
			$value = $»t->params[0];
			{
				if($this->isPositiveLength($value) === true) {
					$GLOBALS['%s']->pop();
					return true;
				}
			}break;
			case 2:
			$value = $»t->params[0];
			{
				if($value >= 0) {
					$GLOBALS['%s']->pop();
					return true;
				}
			}break;
			case 15:
			case 16:
			{
				$GLOBALS['%s']->pop();
				return true;
			}break;
			default:{
			}break;
			}
		}break;
		case "left":case "right":case "top":case "bottom":{
			$»t = ($styleValue);
			switch($»t->index) {
			case 7:
			$value = $»t->params[0];
			{
				$GLOBALS['%s']->pop();
				return true;
			}break;
			case 2:
			$value = $»t->params[0];
			{
				$GLOBALS['%s']->pop();
				return true;
			}break;
			case 0:
			$value = $»t->params[0];
			{
				if($value === 0) {
					$GLOBALS['%s']->pop();
					return true;
				}
			}break;
			case 4:
			$value = $»t->params[0];
			{
				if($value === cocktail_core_css_CSSKeywordValue::$AUTO) {
					$GLOBALS['%s']->pop();
					return true;
				}
			}break;
			case 15:
			case 16:
			{
				$GLOBALS['%s']->pop();
				return true;
			}break;
			default:{
			}break;
			}
		}break;
		case "font-style":{
			$»t = ($styleValue);
			switch($»t->index) {
			case 4:
			$value = $»t->params[0];
			{
				$»t2 = ($value);
				switch($»t2->index) {
				case 4:
				case 5:
				case 0:
				{
					$GLOBALS['%s']->pop();
					return true;
				}break;
				default:{
				}break;
				}
			}break;
			case 15:
			case 16:
			{
				$GLOBALS['%s']->pop();
				return true;
			}break;
			default:{
			}break;
			}
		}break;
		case "transform":{
			$»t = ($styleValue);
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
				}break;
				}
			}break;
			case 15:
			case 16:
			{
				$GLOBALS['%s']->pop();
				return true;
			}break;
			default:{
			}break;
			}
		}break;
		case "overflow-x":case "overflow-y":{
			$»t = ($styleValue);
			switch($»t->index) {
			case 4:
			$value = $»t->params[0];
			{
				$»t2 = ($value);
				switch($»t2->index) {
				case 36:
				case 38:
				case 37:
				case 27:
				{
					$GLOBALS['%s']->pop();
					return true;
				}break;
				default:{
				}break;
				}
			}break;
			case 15:
			case 16:
			{
				$GLOBALS['%s']->pop();
				return true;
			}break;
			default:{
			}break;
			}
		}break;
		case "font-family":{
			$»t = ($styleValue);
			switch($»t->index) {
			case 14:
			$values = $»t->params[0];
			{
				$GLOBALS['%s']->pop();
				return true;
			}break;
			case 3:
			$value = $»t->params[0];
			{
				$GLOBALS['%s']->pop();
				return true;
			}break;
			case 15:
			case 16:
			{
				$GLOBALS['%s']->pop();
				return true;
			}break;
			default:{
			}break;
			}
		}break;
		case "float":{
			$»t = ($styleValue);
			switch($»t->index) {
			case 4:
			$value = $»t->params[0];
			{
				$»t2 = ($value);
				switch($»t2->index) {
				case 11:
				case 12:
				case 31:
				case 18:
				{
					$GLOBALS['%s']->pop();
					return true;
				}break;
				default:{
				}break;
				}
			}break;
			case 15:
			case 16:
			{
				$GLOBALS['%s']->pop();
				return true;
			}break;
			default:{
			}break;
			}
		}break;
		case "white-space":{
			$»t = ($styleValue);
			switch($»t->index) {
			case 4:
			$value = $»t->params[0];
			{
				$»t2 = ($value);
				switch($»t2->index) {
				case 0:
				case 8:
				case 10:
				case 7:
				case 9:
				{
					$GLOBALS['%s']->pop();
					return true;
				}break;
				default:{
				}break;
				}
			}break;
			case 15:
			case 16:
			{
				$GLOBALS['%s']->pop();
				return true;
			}break;
			default:{
			}break;
			}
		}break;
		case "text-transform":{
			$»t = ($styleValue);
			switch($»t->index) {
			case 4:
			$value = $»t->params[0];
			{
				$»t2 = ($value);
				switch($»t2->index) {
				case 18:
				case 16:
				case 17:
				case 15:
				{
					$GLOBALS['%s']->pop();
					return true;
				}break;
				default:{
				}break;
				}
			}break;
			case 15:
			case 16:
			{
				$GLOBALS['%s']->pop();
				return true;
			}break;
			default:{
			}break;
			}
		}break;
		case "font-weight":{
			$»t = ($styleValue);
			switch($»t->index) {
			case 4:
			$value = $»t->params[0];
			{
				$»t2 = ($value);
				switch($»t2->index) {
				case 0:
				case 1:
				case 2:
				case 3:
				{
					$GLOBALS['%s']->pop();
					return true;
				}break;
				default:{
				}break;
				}
			}break;
			case 0:
			$value = $»t->params[0];
			{
				switch($value) {
				case 100:case 200:case 300:case 400:case 500:case 600:case 700:case 800:case 900:{
					$GLOBALS['%s']->pop();
					return true;
				}break;
				default:{
				}break;
				}
			}break;
			case 15:
			case 16:
			{
				$GLOBALS['%s']->pop();
				return true;
			}break;
			default:{
			}break;
			}
		}break;
		case "font-variant":{
			$»t = ($styleValue);
			switch($»t->index) {
			case 4:
			$value = $»t->params[0];
			{
				$»t2 = ($value);
				switch($»t2->index) {
				case 0:
				case 6:
				{
					$GLOBALS['%s']->pop();
					return true;
				}break;
				default:{
				}break;
				}
			}break;
			case 15:
			case 16:
			{
				$GLOBALS['%s']->pop();
				return true;
			}break;
			default:{
			}break;
			}
		}break;
		case "text-align":{
			$»t = ($styleValue);
			switch($»t->index) {
			case 4:
			$value = $»t->params[0];
			{
				$»t2 = ($value);
				switch($»t2->index) {
				case 11:
				case 12:
				case 13:
				case 14:
				{
					$GLOBALS['%s']->pop();
					return true;
				}break;
				default:{
				}break;
				}
			}break;
			case 15:
			case 16:
			{
				$GLOBALS['%s']->pop();
				return true;
			}break;
			default:{
			}break;
			}
		}break;
		case "vertical-align":{
			$»t = ($styleValue);
			switch($»t->index) {
			case 4:
			$value = $»t->params[0];
			{
				$»t2 = ($value);
				switch($»t2->index) {
				case 19:
				case 20:
				case 21:
				case 26:
				case 23:
				case 24:
				case 22:
				case 25:
				{
					$GLOBALS['%s']->pop();
					return true;
				}break;
				default:{
				}break;
				}
			}break;
			case 2:
			$value = $»t->params[0];
			{
				$GLOBALS['%s']->pop();
				return true;
			}break;
			case 7:
			$value = $»t->params[0];
			{
				$GLOBALS['%s']->pop();
				return true;
			}break;
			case 15:
			case 16:
			{
				$GLOBALS['%s']->pop();
				return true;
			}break;
			default:{
			}break;
			}
		}break;
		case "cursor":{
			$»t = ($styleValue);
			switch($»t->index) {
			case 4:
			$value = $»t->params[0];
			{
				$»t2 = ($value);
				switch($»t2->index) {
				case 27:
				case 44:
				case 45:
				case 46:
				case 47:
				{
					$GLOBALS['%s']->pop();
					return true;
				}break;
				default:{
				}break;
				}
			}break;
			case 5:
			$value = $»t->params[0];
			{
				$GLOBALS['%s']->pop();
				return true;
			}break;
			case 15:
			case 16:
			{
				$GLOBALS['%s']->pop();
				return true;
			}break;
			default:{
			}break;
			}
		}break;
		case "z-index":{
			$»t = ($styleValue);
			switch($»t->index) {
			case 4:
			$value = $»t->params[0];
			{
				if($value === cocktail_core_css_CSSKeywordValue::$AUTO) {
					$GLOBALS['%s']->pop();
					return true;
				}
			}break;
			case 0:
			$value = $»t->params[0];
			{
				$GLOBALS['%s']->pop();
				return true;
			}break;
			case 15:
			case 16:
			{
				$GLOBALS['%s']->pop();
				return true;
			}break;
			default:{
			}break;
			}
		}break;
		case "line-height":{
			$»t = ($styleValue);
			switch($»t->index) {
			case 4:
			$value = $»t->params[0];
			{
				if($value === cocktail_core_css_CSSKeywordValue::$NORMAL) {
					$GLOBALS['%s']->pop();
					return true;
				}
			}break;
			case 7:
			$value = $»t->params[0];
			{
				if($this->isPositiveLength($value) === true) {
					$GLOBALS['%s']->pop();
					return true;
				}
			}break;
			case 1:
			$value = $»t->params[0];
			{
				if($value >= 0) {
					$GLOBALS['%s']->pop();
					return true;
				}
			}break;
			case 2:
			$value = $»t->params[0];
			{
				if($value >= 0) {
					$GLOBALS['%s']->pop();
					return true;
				}
			}break;
			case 15:
			case 16:
			{
				$GLOBALS['%s']->pop();
				return true;
			}break;
			default:{
			}break;
			}
		}break;
		case "text-indent":{
			$»t = ($styleValue);
			switch($»t->index) {
			case 0:
			$value = $»t->params[0];
			{
				if($value === 0) {
					$GLOBALS['%s']->pop();
					return true;
				}
			}break;
			case 7:
			$value = $»t->params[0];
			{
				$GLOBALS['%s']->pop();
				return true;
			}break;
			case 2:
			$value = $»t->params[0];
			{
				$GLOBALS['%s']->pop();
				return true;
			}break;
			case 15:
			case 16:
			{
				$GLOBALS['%s']->pop();
				return true;
			}break;
			default:{
			}break;
			}
		}break;
		case "letter-spacing":case "word-spacing":{
			$»t = ($styleValue);
			switch($»t->index) {
			case 4:
			$value = $»t->params[0];
			{
				if($value === cocktail_core_css_CSSKeywordValue::$NORMAL) {
					$GLOBALS['%s']->pop();
					return true;
				}
			}break;
			case 7:
			$value = $»t->params[0];
			{
				$GLOBALS['%s']->pop();
				return true;
			}break;
			case 15:
			case 16:
			{
				$GLOBALS['%s']->pop();
				return true;
			}break;
			default:{
			}break;
			}
		}break;
		case "color":case "background-color":{
			$»t = ($styleValue);
			switch($»t->index) {
			case 12:
			$value = $»t->params[0];
			{
				$GLOBALS['%s']->pop();
				return true;
			}break;
			case 15:
			case 16:
			{
				$GLOBALS['%s']->pop();
				return true;
			}break;
			default:{
			}break;
			}
		}break;
		case "background-image":{
			$»t = ($styleValue);
			switch($»t->index) {
			case 4:
			$value = $»t->params[0];
			{
				if($value === cocktail_core_css_CSSKeywordValue::$NONE) {
					$GLOBALS['%s']->pop();
					return true;
				}
			}break;
			case 5:
			$value = $»t->params[0];
			{
				$GLOBALS['%s']->pop();
				return true;
			}break;
			case 14:
			$value = $»t->params[0];
			{
				$isImageList = true;
				{
					$_g1 = 0; $_g = $value->length;
					while($_g1 < $_g) {
						$i = $_g1++;
						$»t2 = ($value[$i]);
						switch($»t2->index) {
						case 5:
						$value1 = $»t2->params[0];
						{
						}break;
						case 4:
						$value1 = $»t2->params[0];
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
					$GLOBALS['%s']->pop();
					return true;
				}
			}break;
			case 15:
			case 16:
			{
				$GLOBALS['%s']->pop();
				return true;
			}break;
			default:{
			}break;
			}
		}break;
		case "background-position":{
			$»t = ($styleValue);
			switch($»t->index) {
			case 13:
			$value = $»t->params[0];
			{
				switch($value->length) {
				case 2:{
					$isValidHorizontalPosition = $this->isValidBackgroundPosition($value[0]);
					if($isValidHorizontalPosition === false) {
						$GLOBALS['%s']->pop();
						return false;
					}
					{
						$»tmp = $this->isValidBackgroundPosition($value[1]);
						$GLOBALS['%s']->pop();
						return $»tmp;
					}
				}break;
				}
			}break;
			default:{
				$»tmp = $this->isValidBackgroundPosition($styleValue);
				$GLOBALS['%s']->pop();
				return $»tmp;
			}break;
			}
		}break;
		case "background-repeat":{
			$»t = ($styleValue);
			switch($»t->index) {
			case 4:
			$value = $»t->params[0];
			{
				$»t2 = ($value);
				switch($»t2->index) {
				case 67:
				case 68:
				case 69:
				case 72:
				case 71:
				case 70:
				{
					$GLOBALS['%s']->pop();
					return true;
				}break;
				default:{
				}break;
				}
			}break;
			case 13:
			$value = $»t->params[0];
			{
				if($value->length === 2) {
					$isFirstValueValid = false;
					$»t2 = ($value[0]);
					switch($»t2->index) {
					case 4:
					$value1 = $»t2->params[0];
					{
						$»t3 = ($value1);
						switch($»t3->index) {
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
					$»t2 = ($value[1]);
					switch($»t2->index) {
					case 4:
					$value1 = $»t2->params[0];
					{
						$»t3 = ($value1);
						switch($»t3->index) {
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
						$GLOBALS['%s']->pop();
						return true;
					}
				}
			}break;
			case 15:
			case 16:
			{
				$GLOBALS['%s']->pop();
				return true;
			}break;
			default:{
			}break;
			}
		}break;
		case "background-size":{
			$»t = ($styleValue);
			switch($»t->index) {
			case 4:
			$value = $»t->params[0];
			{
				$»t2 = ($value);
				switch($»t2->index) {
				case 43:
				case 42:
				case 27:
				{
					$GLOBALS['%s']->pop();
					return true;
				}break;
				default:{
				}break;
				}
			}break;
			case 13:
			$value = $»t->params[0];
			{
				if($value->length === 2) {
					$isFirstValueValid = $this->isValidBackgroundSize($value[0]);
					if($isFirstValueValid === false) {
						$GLOBALS['%s']->pop();
						return false;
					}
					{
						$»tmp = $this->isValidBackgroundSize($value[1]);
						$GLOBALS['%s']->pop();
						return $»tmp;
					}
				}
			}break;
			default:{
				$»tmp = $this->isValidBackgroundSize($styleValue);
				$GLOBALS['%s']->pop();
				return $»tmp;
			}break;
			}
		}break;
		case "background-clip":case "background-origin":{
			$»t = ($styleValue);
			switch($»t->index) {
			case 4:
			$value = $»t->params[0];
			{
				$»t2 = ($value);
				switch($»t2->index) {
				case 39:
				case 40:
				case 41:
				{
					$GLOBALS['%s']->pop();
					return true;
				}break;
				default:{
				}break;
				}
			}break;
			case 15:
			case 16:
			{
				$GLOBALS['%s']->pop();
				return true;
			}break;
			default:{
			}break;
			}
		}break;
		case "transition-property":{
			$»t = ($styleValue);
			switch($»t->index) {
			case 14:
			$value = $»t->params[0];
			{
				$length = $value->length;
				{
					$_g = 0;
					while($_g < $length) {
						$i = $_g++;
						$isValid = $this->isValidTransitionProperty($value[$i]);
						if($isValid === false) {
							$GLOBALS['%s']->pop();
							return false;
						}
						unset($isValid,$i);
					}
				}
				{
					$GLOBALS['%s']->pop();
					return true;
				}
			}break;
			default:{
				$»tmp = $this->isValidTransitionProperty($styleValue);
				$GLOBALS['%s']->pop();
				return $»tmp;
			}break;
			}
		}break;
		case "transition-duration":case "transition-delay":{
			$»t = ($styleValue);
			switch($»t->index) {
			case 14:
			$value = $»t->params[0];
			{
				$length = $value->length;
				{
					$_g = 0;
					while($_g < $length) {
						$i = $_g++;
						$isValid = $this->isValidTransitionDelayOrDuration($value[$i]);
						if($isValid === false) {
							$GLOBALS['%s']->pop();
							return false;
						}
						unset($isValid,$i);
					}
				}
				{
					$GLOBALS['%s']->pop();
					return true;
				}
			}break;
			default:{
				$»tmp = $this->isValidTransitionDelayOrDuration($styleValue);
				$GLOBALS['%s']->pop();
				return $»tmp;
			}break;
			}
		}break;
		case "transition-timing-function":{
			$»t = ($styleValue);
			switch($»t->index) {
			case 14:
			$value = $»t->params[0];
			{
				$length = $value->length;
				{
					$_g = 0;
					while($_g < $length) {
						$i = $_g++;
						$isValid = $this->isValidTransitionTimingFunction($value[$i]);
						if($isValid === false) {
							$GLOBALS['%s']->pop();
							return false;
						}
						unset($isValid,$i);
					}
				}
			}break;
			default:{
				$»tmp = $this->isValidTransitionTimingFunction($styleValue);
				$GLOBALS['%s']->pop();
				return $»tmp;
			}break;
			}
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function applyProperty($propertyName, $styleValue, $important) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::applyProperty");
		$»spos = $GLOBALS['%s']->length;
		if($this->isShorthand($propertyName) === true) {
			if($this->isValidShorthand($propertyName, $styleValue) === true) {
				$this->setShorthand($propertyName, $styleValue, $important);
			}
		} else {
			if($this->isValidProperty($propertyName, $styleValue) === true) {
				$this->setTypedProperty($propertyName, $styleValue, $important);
			}
		}
		$GLOBALS['%s']->pop();
	}
	public function setTypedProperty($property, $typedValue, $important) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::setTypedProperty");
		$»spos = $GLOBALS['%s']->length;
		$currentProperty = cocktail_core_css_CSSStyleDeclaration_0($this, $important, $property, $typedValue);
		if($currentProperty === null) {
			$newProperty = cocktail_core_css_TypedPropertyVO::getPool()->get();
			$newProperty->important = $important;
			$newProperty->typedValue = $typedValue;
			$newProperty->name = $property;
			$this->_properties->push($newProperty);
			if($this->_onStyleChange !== null) {
				$this->_onStyleChange($property);
			}
			{
				$GLOBALS['%s']->pop();
				return;
			}
		}
		if($currentProperty->typedValue !== $typedValue || $currentProperty->important !== $important) {
			$currentProperty->typedValue = $typedValue;
			$currentProperty->important = $important;
			if($this->_onStyleChange !== null) {
				$this->_onStyleChange($property);
			}
		}
		$GLOBALS['%s']->pop();
	}
	public function getTypedProperty($property) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::getTypedProperty");
		$»spos = $GLOBALS['%s']->length;
		$typedProperty = null;
		$length = $this->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($this->_properties, $i)->name === $property) {
					$typedProperty = $this->_properties[$i];
				}
				unset($i);
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $typedProperty;
		}
		$GLOBALS['%s']->pop();
	}
	public function getPropertyPriority($property) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::getPropertyPriority");
		$»spos = $GLOBALS['%s']->length;
		$typedProperty = cocktail_core_css_CSSStyleDeclaration_1($this, $property);
		if($typedProperty !== null) {
			if($typedProperty->important === true) {
				$GLOBALS['%s']->pop();
				return "important";
			} else {
				$GLOBALS['%s']->pop();
				return "";
			}
		}
		{
			$GLOBALS['%s']->pop();
			return null;
		}
		$GLOBALS['%s']->pop();
	}
	public function removeProperty($property) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::removeProperty");
		$»spos = $GLOBALS['%s']->length;
		$typedProperty = cocktail_core_css_CSSStyleDeclaration_2($this, $property);
		if($typedProperty !== null) {
			$this->_properties->remove($typedProperty);
			cocktail_core_css_TypedPropertyVO::getPool()->release($typedProperty);
			if($this->_onStyleChange !== null) {
				$this->_onStyleChange($property);
			}
			{
				$GLOBALS['%s']->pop();
				return $property;
			}
		}
		{
			$GLOBALS['%s']->pop();
			return null;
		}
		$GLOBALS['%s']->pop();
	}
	public function setProperty($name, $value, $priority = null) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::setProperty");
		$»spos = $GLOBALS['%s']->length;
		if($value === null) {
			$this->removeProperty($name);
		} else {
			$typedProperty = cocktail_core_css_parsers_CSSStyleParser::parseStyleValue($name, $value, 0);
			if($typedProperty !== null) {
				$this->applyProperty($typedProperty->name, $typedProperty->typedValue, $typedProperty->important);
			}
		}
		$GLOBALS['%s']->pop();
	}
	public function getPropertyValue($property) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::getPropertyValue");
		$»spos = $GLOBALS['%s']->length;
		$typedProperty = cocktail_core_css_CSSStyleDeclaration_3($this, $property);
		if($typedProperty !== null) {
			$»tmp = cocktail_core_css_parsers_CSSStyleSerializer::serialize($typedProperty->typedValue);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		{
			$GLOBALS['%s']->pop();
			return null;
		}
		$GLOBALS['%s']->pop();
	}
	public function item($index) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::item");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = _hx_array_get($this->_properties, $index)->name;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function reset() {
		$GLOBALS['%s']->push("cocktail.core.css.CSSStyleDeclaration::reset");
		$»spos = $GLOBALS['%s']->length;
		$this->_onStyleChange = null;
		$this->parentRule = null;
		$length = $this->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				cocktail_core_css_TypedPropertyVO::getPool()->release($this->_properties[$i]);
				unset($i);
			}
		}
		$this->_properties = cocktail_core_utils_Utils::clear($this->_properties);
		$GLOBALS['%s']->pop();
	}
	public $_onStyleChange;
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
		else if(isset($this->»dynamics[$m]) && is_callable($this->»dynamics[$m]))
			return call_user_func_array($this->»dynamics[$m], $a);
		else if('toString' == $m)
			return $this->__toString();
		else
			throw new HException('Unable to call «'.$m.'»');
	}
	static $__properties__ = array("set_display" => "set_display","get_display" => "get_display","set_position" => "set_position","get_position" => "get_position","set_cssFloat" => "set_CSSFloat","get_cssFloat" => "get_CSSFloat","set_clear" => "set_clear","get_clear" => "get_clear","set_zIndex" => "set_zIndex","get_zIndex" => "get_zIndex","set_margin" => "set_margin","get_margin" => "get_margin","set_marginLeft" => "set_marginLeft","get_marginLeft" => "get_marginLeft","set_marginRight" => "set_marginRight","get_marginRight" => "get_marginRight","set_marginTop" => "set_marginTop","get_marginTop" => "get_marginTop","set_marginBottom" => "set_marginBottom","get_marginBottom" => "get_marginBottom","set_padding" => "set_padding","get_padding" => "get_padding","set_paddingLeft" => "set_paddingLeft","get_paddingLeft" => "get_paddingLeft","set_paddingRight" => "set_paddingRight","get_paddingRight" => "get_paddingRight","set_paddingTop" => "set_paddingTop","get_paddingTop" => "get_paddingTop","set_paddingBottom" => "set_paddingBottom","get_paddingBottom" => "get_paddingBottom","set_width" => "set_width","get_width" => "get_width","set_height" => "set_height","get_height" => "get_height","set_minHeight" => "set_minHeight","get_minHeight" => "get_minHeight","set_maxHeight" => "set_maxHeight","get_maxHeight" => "get_maxHeight","set_minWidth" => "set_minWidth","get_minWidth" => "get_minWidth","set_maxWidth" => "set_maxWidth","get_maxWidth" => "get_maxWidth","set_top" => "set_top","get_top" => "get_top","set_left" => "set_left","get_left" => "get_left","set_bottom" => "set_bottom","get_bottom" => "get_bottom","set_right" => "set_right","get_right" => "get_right","set_backgroundColor" => "set_backgroundColor","get_backgroundColor" => "get_backgroundColor","set_backgroundImage" => "set_backgroundImage","get_backgroundImage" => "get_backgroundImage","set_backgroundRepeat" => "set_backgroundRepeat","get_backgroundRepeat" => "get_backgroundRepeat","set_backgroundOrigin" => "set_backgroundOrigin","get_backgroundOrigin" => "get_backgroundOrigin","set_backgroundSize" => "set_backgroundSize","get_backgroundSize" => "get_backgroundSize","set_backgroundPosition" => "set_backgroundPosition","get_backgroundPosition" => "get_backgroundPosition","set_backgroundClip" => "set_backgroundClip","get_backgroundClip" => "get_backgroundClip","set_fontSize" => "set_fontSize","get_fontSize" => "get_fontSize","set_fontWeight" => "set_fontWeight","get_fontWeight" => "get_fontWeight","set_fontStyle" => "set_fontStyle","get_fontStyle" => "get_fontStyle","set_fontFamily" => "set_fontFamily","get_fontFamily" => "get_fontFamily","set_fontVariant" => "set_fontVariant","get_fontVariant" => "get_fontVariant","set_color" => "set_color","get_color" => "get_color","set_lineHeight" => "set_lineHeight","get_lineHeight" => "get_lineHeight","set_textTransform" => "set_textTransform","get_textTransform" => "get_textTransform","set_letterSpacing" => "set_letterSpacing","get_letterSpacing" => "get_letterSpacing","set_wordSpacing" => "set_wordSpacing","get_wordSpacing" => "get_wordSpacing","set_whiteSpace" => "set_whiteSpace","get_whiteSpace" => "get_whiteSpace","set_textAlign" => "set_textAlign","get_textAlign" => "get_textAlign","set_textIndent" => "set_textIndent","get_textIndent" => "get_textIndent","set_verticalAlign" => "set_verticalAlign","get_verticalAlign" => "get_verticalAlign","set_opacity" => "set_opacity","get_opacity" => "get_opacity","set_visibility" => "set_visibility","get_visibility" => "get_visibility","set_overflow" => "set_overflow","get_overflow" => "get_overflow","set_overflowX" => "set_overflowX","get_overflowX" => "get_overflowX","set_overflowY" => "set_overflowY","get_overflowY" => "get_overflowY","set_transitionProperty" => "set_transitionProperty","get_transitionProperty" => "get_transitionProperty","set_transitionDuration" => "set_transitionDuration","get_transitionDuration" => "get_transitionDuration","set_transitionTimingFunction" => "set_transitionTimingFunction","get_transitionTimingFunction" => "get_transitionTimingFunction","set_transitionDelay" => "set_transitionDelay","get_transitionDelay" => "get_transitionDelay","set_transform" => "set_transform","get_transform" => "get_transform","set_transformOrigin" => "set_transformOrigin","get_transformOrigin" => "get_transformOrigin","set_cursor" => "set_cursor","get_cursor" => "get_cursor","set_cssText" => "set_cssText","get_cssText" => "get_cssText","get_length" => "get_length");
	function __toString() { return 'cocktail.core.css.CSSStyleDeclaration'; }
}
function cocktail_core_css_CSSStyleDeclaration_0(&$»this, &$important, &$property, &$typedValue) {
	$»spos = $GLOBALS['%s']->length;
	{
		$typedProperty = null;
		$length = $»this->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($»this->_properties, $i)->name === $property) {
					$typedProperty = $»this->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}
function cocktail_core_css_CSSStyleDeclaration_1(&$»this, &$property) {
	$»spos = $GLOBALS['%s']->length;
	{
		$typedProperty = null;
		$length = $»this->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($»this->_properties, $i)->name === $property) {
					$typedProperty = $»this->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}
function cocktail_core_css_CSSStyleDeclaration_2(&$»this, &$property) {
	$»spos = $GLOBALS['%s']->length;
	{
		$typedProperty = null;
		$length = $»this->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($»this->_properties, $i)->name === $property) {
					$typedProperty = $»this->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}
function cocktail_core_css_CSSStyleDeclaration_3(&$»this, &$property) {
	$»spos = $GLOBALS['%s']->length;
	{
		$typedProperty = null;
		$length = $»this->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($»this->_properties, $i)->name === $property) {
					$typedProperty = $»this->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}

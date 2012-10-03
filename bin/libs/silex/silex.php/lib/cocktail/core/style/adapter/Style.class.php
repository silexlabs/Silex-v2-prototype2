<?php

class cocktail_core_style_adapter_Style {
	public function __construct($coreStyle) {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::new");
		$»spos = $GLOBALS['%s']->length;
		$this->_coreStyle = $coreStyle;
		$this->attributes = new cocktail_core_dom_NamedNodeMap();
		$GLOBALS['%s']->pop();
	}}
	public function set_transformOrigin($value) {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::set_transformOrigin");
		$»spos = $GLOBALS['%s']->length;
		$this->setAttribute("transform-origin", $value);
		$this->_coreStyle->setTransformOrigin(cocktail_core_unit_UnitManager::getTransformOrigin($value));
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_transformOrigin() {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::get_transformOrigin");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = cocktail_core_unit_UnitManager::getCSSTransformOrigin($this->_coreStyle->transformOrigin);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_transform($value) {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::set_transform");
		$»spos = $GLOBALS['%s']->length;
		$this->setAttribute("transform", $value);
		$this->_coreStyle->setTransform(cocktail_core_unit_UnitManager::getTransform($value));
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_transform() {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::get_transform");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = cocktail_core_unit_UnitManager::getCSSTransform($this->_coreStyle->transform);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_transitionTimingFunction($value) {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::set_transitionTimingFunction");
		$»spos = $GLOBALS['%s']->length;
		$this->setAttribute("transition-timing-function", $value);
		$this->_coreStyle->setTransitionTimingFunction(cocktail_core_unit_UnitManager::getTransitionTimingFunction($value));
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_transitionTimingFunction() {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::get_transitionTimingFunction");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = cocktail_core_unit_UnitManager::getCSSTransitionTimingFunction($this->_coreStyle->transitionTimingFunction);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_transitionDelay($value) {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::set_transitionDelay");
		$»spos = $GLOBALS['%s']->length;
		$this->setAttribute("transition-delay", $value);
		$this->_coreStyle->setTransitionDelay(cocktail_core_unit_UnitManager::getTransitionDelay($value));
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_transitionDelay() {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::get_transitionDelay");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = cocktail_core_unit_UnitManager::getCSSTransitionDelay($this->_coreStyle->transitionDelay);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_transitionDuration($value) {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::set_transitionDuration");
		$»spos = $GLOBALS['%s']->length;
		$this->setAttribute("transition-duration", $value);
		$this->_coreStyle->setTransitionDuration(cocktail_core_unit_UnitManager::getTransitionDuration($value));
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_transitionDuration() {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::get_transitionDuration");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = cocktail_core_unit_UnitManager::getCSSTransitionDuration($this->_coreStyle->transitionDuration);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_transitionProperty($value) {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::set_transitionProperty");
		$»spos = $GLOBALS['%s']->length;
		$this->setAttribute("transition-property", $value);
		$this->_coreStyle->setTransitionProperty(cocktail_core_unit_UnitManager::getTransitionProperty($value));
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_transitionProperty() {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::get_transitionProperty");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = cocktail_core_unit_UnitManager::getCSSTransitionProperty($this->_coreStyle->transitionProperty);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_cursor() {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::get_cursor");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = cocktail_core_unit_UnitManager::getCSSCursor($this->_coreStyle->cursor);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_cursor($value) {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::set_cursor");
		$»spos = $GLOBALS['%s']->length;
		$this->setAttribute("cursor", $value);
		$this->_coreStyle->setCursor(cocktail_core_unit_UnitManager::cursorEnum($value));
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_overflowY($value) {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::set_overflowY");
		$»spos = $GLOBALS['%s']->length;
		$this->setAttribute("overflow-y", $value);
		$this->_coreStyle->setOverflowY(cocktail_core_unit_UnitManager::overflowEnum($value));
		{
			$»tmp = cocktail_core_unit_UnitManager::getCSSOverflow($this->_coreStyle->overflowY);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_overflowY() {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::get_overflowY");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = cocktail_core_unit_UnitManager::getCSSOverflow($this->_coreStyle->overflowY);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_overflowX($value) {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::set_overflowX");
		$»spos = $GLOBALS['%s']->length;
		$this->setAttribute("overflow-x", $value);
		$this->_coreStyle->setOverflowX(cocktail_core_unit_UnitManager::overflowEnum($value));
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_overflowX() {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::get_overflowX");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = cocktail_core_unit_UnitManager::getCSSOverflow($this->_coreStyle->overflowX);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_backgroundOrigin() {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::get_backgroundOrigin");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = cocktail_core_unit_UnitManager::getCSSBackgroundOrigin($this->_coreStyle->backgroundOrigin);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_backgroundOrigin($value) {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::set_backgroundOrigin");
		$»spos = $GLOBALS['%s']->length;
		$this->setAttribute("background-origin", $value);
		$this->_coreStyle->setBackgroundOrigin(cocktail_core_unit_UnitManager::backgroundOriginEnum($value));
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_backgroundPosition() {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::get_backgroundPosition");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = cocktail_core_unit_UnitManager::getCSSBackgroundPosition($this->_coreStyle->backgroundPosition);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_backgroundPosition($value) {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::set_backgroundPosition");
		$»spos = $GLOBALS['%s']->length;
		$this->setAttribute("background-position", $value);
		$this->_coreStyle->setBackgroundPosition(cocktail_core_unit_UnitManager::backgroundPositionEnum($value));
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_backgroundClip() {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::get_backgroundClip");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = cocktail_core_unit_UnitManager::getCSSBackgroundClip($this->_coreStyle->backgroundClip);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_backgroundClip($value) {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::set_backgroundClip");
		$»spos = $GLOBALS['%s']->length;
		$this->setAttribute("background-clip", $value);
		$this->_coreStyle->setBackgroundClip(cocktail_core_unit_UnitManager::backgroundClipEnum($value));
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_backgroundSize() {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::get_backgroundSize");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = cocktail_core_unit_UnitManager::getCSSBackgroundSize($this->_coreStyle->backgroundSize);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_backgroundSize($value) {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::set_backgroundSize");
		$»spos = $GLOBALS['%s']->length;
		$this->setAttribute("background-size", $value);
		$this->_coreStyle->setBackgroundSize(cocktail_core_unit_UnitManager::backgroundSizeEnum($value));
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_backgroundRepeat() {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::get_backgroundRepeat");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = cocktail_core_unit_UnitManager::getCSSBackgroundRepeat($this->_coreStyle->backgroundRepeat);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_backgroundRepeat($value) {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::set_backgroundRepeat");
		$»spos = $GLOBALS['%s']->length;
		$this->setAttribute("background-repeat", $value);
		$this->_coreStyle->setBackgroundRepeat(cocktail_core_unit_UnitManager::backgroundRepeatEnum($value));
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_backgroundImage() {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::get_backgroundImage");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = cocktail_core_unit_UnitManager::getCSSBackgroundImage($this->_coreStyle->backgroundImage);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_backgroundImage($value) {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::set_backgroundImage");
		$»spos = $GLOBALS['%s']->length;
		$this->setAttribute("background-image", $value);
		$this->_coreStyle->setBackgroundImage(cocktail_core_unit_UnitManager::backgroundImageEnum($value));
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_backgroundColor() {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::get_backgroundColor");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = cocktail_core_unit_UnitManager::getCSSColor($this->_coreStyle->backgroundColor);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_backgroundColor($value) {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::set_backgroundColor");
		$»spos = $GLOBALS['%s']->length;
		$this->setAttribute("background-color", $value);
		$this->_coreStyle->setBackgroundColor(cocktail_core_unit_UnitManager::colorEnum($value));
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_textAlign($value) {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::set_textAlign");
		$»spos = $GLOBALS['%s']->length;
		$this->setAttribute("text-align", $value);
		$this->_coreStyle->setTextAlign(cocktail_core_unit_UnitManager::textAlignEnum($value));
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_textAlign() {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::get_textAlign");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = cocktail_core_unit_UnitManager::getCSSTextAlign($this->_coreStyle->textAlign);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_whiteSpace($value) {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::set_whiteSpace");
		$»spos = $GLOBALS['%s']->length;
		$this->setAttribute("white-space", $value);
		$this->_coreStyle->setWhiteSpace(cocktail_core_unit_UnitManager::whiteSpaceEnum($value));
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_whiteSpace() {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::get_whiteSpace");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = cocktail_core_unit_UnitManager::getCSSWhiteSpace($this->_coreStyle->whiteSpace);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_textIndent($value) {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::set_textIndent");
		$»spos = $GLOBALS['%s']->length;
		$this->setAttribute("text-indent", $value);
		$this->_coreStyle->setTextIndent(cocktail_core_unit_UnitManager::textIndentEnum($value));
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_textIndent() {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::get_textIndent");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = cocktail_core_unit_UnitManager::getCSSTextIndent($this->_coreStyle->textIndent);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_verticalAlign($value) {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::set_verticalAlign");
		$»spos = $GLOBALS['%s']->length;
		$this->setAttribute("vertical-align", $value);
		$this->_coreStyle->setVerticalAlign(cocktail_core_unit_UnitManager::verticalAlignEnum($value));
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_verticalAlign() {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::get_verticalAlign");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = cocktail_core_unit_UnitManager::getCSSVerticalAlign($this->_coreStyle->verticalAlign);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_lineHeight($value) {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::set_lineHeight");
		$»spos = $GLOBALS['%s']->length;
		$this->setAttribute("line-height", $value);
		$this->_coreStyle->setLineHeight(cocktail_core_unit_UnitManager::lineHeightEnum($value));
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_lineHeight() {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::get_lineHeight");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = cocktail_core_unit_UnitManager::getCSSLineHeight($this->_coreStyle->lineHeight);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_wordSpacing($value) {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::set_wordSpacing");
		$»spos = $GLOBALS['%s']->length;
		$this->setAttribute("word-spacing", $value);
		$this->_coreStyle->setWordSpacing(cocktail_core_unit_UnitManager::wordSpacingEnum($value));
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_wordSpacing() {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::get_wordSpacing");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = cocktail_core_unit_UnitManager::getCSSWordSpacing($this->_coreStyle->wordSpacing);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_color($value) {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::set_color");
		$»spos = $GLOBALS['%s']->length;
		$this->setAttribute("color", $value);
		$this->_coreStyle->setColor(cocktail_core_unit_UnitManager::colorEnum($value));
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_color() {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::get_color");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = cocktail_core_unit_UnitManager::getCSSColor($this->_coreStyle->color);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_letterSpacing($value) {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::set_letterSpacing");
		$»spos = $GLOBALS['%s']->length;
		$this->setAttribute("letter-spacing", $value);
		$this->_coreStyle->setLetterSpacing(cocktail_core_unit_UnitManager::letterSpacingEnum($value));
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_letterSpacing() {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::get_letterSpacing");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = cocktail_core_unit_UnitManager::getCSSLetterSpacing($this->_coreStyle->letterSpacing);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_textTransform($value) {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::set_textTransform");
		$»spos = $GLOBALS['%s']->length;
		$this->setAttribute("text-tranform", $value);
		$this->_coreStyle->setTextTransform(cocktail_core_unit_UnitManager::textTransformEnum($value));
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_textTransform() {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::get_textTransform");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = cocktail_core_unit_UnitManager::getCSSTextTransform($this->_coreStyle->textTransform);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_fontVariant($value) {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::set_fontVariant");
		$»spos = $GLOBALS['%s']->length;
		$this->setAttribute("font-variant", $value);
		$this->_coreStyle->setFontVariant(cocktail_core_unit_UnitManager::fontVariantEnum($value));
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_fontVariant() {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::get_fontVariant");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = cocktail_core_unit_UnitManager::getCSSFontVariant($this->_coreStyle->fontVariant);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_fontFamily($value) {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::set_fontFamily");
		$»spos = $GLOBALS['%s']->length;
		$this->setAttribute("font-family", $value);
		$this->_coreStyle->setFontFamily(cocktail_core_unit_UnitManager::fontFamilyEnum($value));
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_fontFamily() {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::get_fontFamily");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = cocktail_core_unit_UnitManager::getCSSFontFamily($this->_coreStyle->fontFamily);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_fontStyle($value) {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::set_fontStyle");
		$»spos = $GLOBALS['%s']->length;
		$this->setAttribute("font-style", $value);
		$this->_coreStyle->setFontStyle(cocktail_core_unit_UnitManager::fontStyleEnum($value));
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_fontStyle() {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::get_fontStyle");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = cocktail_core_unit_UnitManager::getCSSFontStyle($this->_coreStyle->fontStyle);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_fontWeight($value) {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::set_fontWeight");
		$»spos = $GLOBALS['%s']->length;
		$this->setAttribute("font-weight", $value);
		$this->_coreStyle->setFontWeight(cocktail_core_unit_UnitManager::fontWeightEnum($value));
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_fontWeight() {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::get_fontWeight");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = cocktail_core_unit_UnitManager::getCSSFontWeight($this->_coreStyle->fontWeight);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_fontSize($value) {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::set_fontSize");
		$»spos = $GLOBALS['%s']->length;
		$this->setAttribute("font-size", $value);
		$this->_coreStyle->setFontSize(cocktail_core_unit_UnitManager::fontSizeEnum($value));
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_fontSize() {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::get_fontSize");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = cocktail_core_unit_UnitManager::getCSSFontSize($this->_coreStyle->fontSize);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_clear($value) {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::set_clear");
		$»spos = $GLOBALS['%s']->length;
		$this->setAttribute("clear", $value);
		$this->_coreStyle->setClear(cocktail_core_unit_UnitManager::clearEnum($value));
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_clear() {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::get_clear");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = cocktail_core_unit_UnitManager::getCSSClear($this->_coreStyle->clear);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_CSSFloat($value) {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::set_CSSFloat");
		$»spos = $GLOBALS['%s']->length;
		$this->setAttribute("float", $value);
		$this->_coreStyle->setCSSFloat(cocktail_core_unit_UnitManager::cssFloatEnum($value));
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_CSSFloat() {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::get_CSSFloat");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = cocktail_core_unit_UnitManager::getCSSFloatAsString($this->_coreStyle->cssFloat);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_right($value) {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::set_right");
		$»spos = $GLOBALS['%s']->length;
		$this->setAttribute("right", $value);
		$this->_coreStyle->setRight(cocktail_core_unit_UnitManager::boxStyleEnum(_hx_qtype("cocktail.core.style.PositionOffset"), $value));
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_right() {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::get_right");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = cocktail_core_unit_UnitManager::getCSSPositionOffset($this->_coreStyle->right);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_bottom($value) {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::set_bottom");
		$»spos = $GLOBALS['%s']->length;
		$this->setAttribute("bottom", $value);
		$this->_coreStyle->setBottom(cocktail_core_unit_UnitManager::boxStyleEnum(_hx_qtype("cocktail.core.style.PositionOffset"), $value));
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_bottom() {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::get_bottom");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = cocktail_core_unit_UnitManager::getCSSPositionOffset($this->_coreStyle->bottom);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_left($value) {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::set_left");
		$»spos = $GLOBALS['%s']->length;
		$this->setAttribute("left", $value);
		$this->_coreStyle->setLeft(cocktail_core_unit_UnitManager::boxStyleEnum(_hx_qtype("cocktail.core.style.PositionOffset"), $value));
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_left() {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::get_left");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = cocktail_core_unit_UnitManager::getCSSPositionOffset($this->_coreStyle->left);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_top($value) {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::set_top");
		$»spos = $GLOBALS['%s']->length;
		$this->setAttribute("top", $value);
		$this->_coreStyle->setTop(cocktail_core_unit_UnitManager::boxStyleEnum(_hx_qtype("cocktail.core.style.PositionOffset"), $value));
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_top() {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::get_top");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = cocktail_core_unit_UnitManager::getCSSPositionOffset($this->_coreStyle->top);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_maxWidth($value) {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::set_maxWidth");
		$»spos = $GLOBALS['%s']->length;
		$this->setAttribute("max-width", $value);
		$this->_coreStyle->setMaxWidth(cocktail_core_unit_UnitManager::constrainedDimensionEnum($value));
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_maxWidth() {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::get_maxWidth");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = cocktail_core_unit_UnitManager::getCSSConstrainedDimension($this->_coreStyle->maxWidth);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_minWidth($value) {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::set_minWidth");
		$»spos = $GLOBALS['%s']->length;
		$this->setAttribute("min-width", $value);
		$this->_coreStyle->setMinWidth(cocktail_core_unit_UnitManager::constrainedDimensionEnum($value));
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_minWidth() {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::get_minWidth");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = cocktail_core_unit_UnitManager::getCSSConstrainedDimension($this->_coreStyle->minWidth);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_maxHeight($value) {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::set_maxHeight");
		$»spos = $GLOBALS['%s']->length;
		$this->setAttribute("max-height", $value);
		$this->_coreStyle->setMaxHeight(cocktail_core_unit_UnitManager::constrainedDimensionEnum($value));
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_maxHeight() {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::get_maxHeight");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = cocktail_core_unit_UnitManager::getCSSConstrainedDimension($this->_coreStyle->maxHeight);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_minHeight($value) {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::set_minHeight");
		$»spos = $GLOBALS['%s']->length;
		$this->setAttribute("min-height", $value);
		$this->_coreStyle->setMinHeight(cocktail_core_unit_UnitManager::constrainedDimensionEnum($value));
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_minHeight() {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::get_minHeight");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = cocktail_core_unit_UnitManager::getCSSConstrainedDimension($this->_coreStyle->minHeight);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_height($value) {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::set_height");
		$»spos = $GLOBALS['%s']->length;
		$this->setAttribute("height", $value);
		$this->_coreStyle->setHeight(cocktail_core_unit_UnitManager::boxStyleEnum(_hx_qtype("cocktail.core.style.Dimension"), $value));
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_height() {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::get_height");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = cocktail_core_unit_UnitManager::getCSSDimension($this->_coreStyle->height);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_width($value) {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::set_width");
		$»spos = $GLOBALS['%s']->length;
		$this->setAttribute("width", $value);
		$this->_coreStyle->setWidth(cocktail_core_unit_UnitManager::boxStyleEnum(_hx_qtype("cocktail.core.style.Dimension"), $value));
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_width() {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::get_width");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = cocktail_core_unit_UnitManager::getCSSDimension($this->_coreStyle->width);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_zIndex($value) {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::set_zIndex");
		$»spos = $GLOBALS['%s']->length;
		$this->setAttribute("z-index", $value);
		$this->_coreStyle->setZIndex(cocktail_core_unit_UnitManager::zIndexEnum($value));
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_zIndex() {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::get_zIndex");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = cocktail_core_unit_UnitManager::getCSSZIndex($this->_coreStyle->zIndex);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_position($value) {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::set_position");
		$»spos = $GLOBALS['%s']->length;
		$this->setAttribute("position", $value);
		$this->_coreStyle->setPosition(cocktail_core_unit_UnitManager::positionEnum($value));
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_position() {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::get_position");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = cocktail_core_unit_UnitManager::getCSSPosition($this->_coreStyle->position);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_display($value) {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::set_display");
		$»spos = $GLOBALS['%s']->length;
		$this->setAttribute("display", $value);
		$this->_coreStyle->setDisplay(cocktail_core_unit_UnitManager::displayEnum($value));
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_display() {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::get_display");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = cocktail_core_unit_UnitManager::getCSSDisplay($this->_coreStyle->display);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_paddingBottom($value) {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::set_paddingBottom");
		$»spos = $GLOBALS['%s']->length;
		$this->setAttribute("padding-bottom", $value);
		$this->_coreStyle->setPaddingBottom(cocktail_core_unit_UnitManager::boxStyleEnum(_hx_qtype("cocktail.core.style.Padding"), $value));
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_paddingBottom() {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::get_paddingBottom");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = cocktail_core_unit_UnitManager::getCSSPadding($this->_coreStyle->paddingBottom);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_paddingTop($value) {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::set_paddingTop");
		$»spos = $GLOBALS['%s']->length;
		$this->setAttribute("padding-top", $value);
		$this->_coreStyle->setPaddingTop(cocktail_core_unit_UnitManager::boxStyleEnum(_hx_qtype("cocktail.core.style.Padding"), $value));
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_paddingTop() {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::get_paddingTop");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = cocktail_core_unit_UnitManager::getCSSPadding($this->_coreStyle->paddingTop);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_paddingRight($value) {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::set_paddingRight");
		$»spos = $GLOBALS['%s']->length;
		$this->setAttribute("padding-right", $value);
		$this->_coreStyle->setPaddingRight(cocktail_core_unit_UnitManager::boxStyleEnum(_hx_qtype("cocktail.core.style.Padding"), $value));
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_paddingRight() {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::get_paddingRight");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = cocktail_core_unit_UnitManager::getCSSPadding($this->_coreStyle->paddingRight);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_paddingLeft($value) {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::set_paddingLeft");
		$»spos = $GLOBALS['%s']->length;
		$this->setAttribute("padding-left", $value);
		$this->_coreStyle->setPaddingLeft(cocktail_core_unit_UnitManager::boxStyleEnum(_hx_qtype("cocktail.core.style.Padding"), $value));
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_paddingLeft() {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::get_paddingLeft");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = cocktail_core_unit_UnitManager::getCSSPadding($this->_coreStyle->paddingLeft);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_marginBottom($value) {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::set_marginBottom");
		$»spos = $GLOBALS['%s']->length;
		$this->setAttribute("margin-bottom", $value);
		$this->_coreStyle->setMarginBottom(cocktail_core_unit_UnitManager::boxStyleEnum(_hx_qtype("cocktail.core.style.Margin"), $value));
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_marginBottom() {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::get_marginBottom");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = cocktail_core_unit_UnitManager::getCSSMargin($this->_coreStyle->marginBottom);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_marginTop($value) {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::set_marginTop");
		$»spos = $GLOBALS['%s']->length;
		$this->setAttribute("margin-top", $value);
		$this->_coreStyle->setMarginTop(cocktail_core_unit_UnitManager::boxStyleEnum(_hx_qtype("cocktail.core.style.Margin"), $value));
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_marginTop() {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::get_marginTop");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = cocktail_core_unit_UnitManager::getCSSMargin($this->_coreStyle->marginTop);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_marginRight($value) {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::set_marginRight");
		$»spos = $GLOBALS['%s']->length;
		$this->setAttribute("margin-right", $value);
		$this->_coreStyle->setMarginRight(cocktail_core_unit_UnitManager::boxStyleEnum(_hx_qtype("cocktail.core.style.Margin"), $value));
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_marginRight() {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::get_marginRight");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = cocktail_core_unit_UnitManager::getCSSMargin($this->_coreStyle->marginRight);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_marginLeft($value) {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::set_marginLeft");
		$»spos = $GLOBALS['%s']->length;
		$this->setAttribute("margin-left", $value);
		$this->_coreStyle->setMarginLeft(cocktail_core_unit_UnitManager::boxStyleEnum(_hx_qtype("cocktail.core.style.Margin"), $value));
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_marginLeft() {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::get_marginLeft");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = cocktail_core_unit_UnitManager::getCSSMargin($this->_coreStyle->marginLeft);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_visibility($value) {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::set_visibility");
		$»spos = $GLOBALS['%s']->length;
		$this->setAttribute("visibility", $value);
		$this->_coreStyle->setVisibility(cocktail_core_unit_UnitManager::visibilityEnum($value));
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_visibility() {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::get_visibility");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = cocktail_core_unit_UnitManager::getCSSVisibility($this->_coreStyle->visibility);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_opacity($value) {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::set_opacity");
		$»spos = $GLOBALS['%s']->length;
		$this->setAttribute("opacity", $value);
		$this->_coreStyle->setOpacity(Std::parseFloat($value));
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_opacity() {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::get_opacity");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = cocktail_core_unit_UnitManager::getCSSOpacity($this->_coreStyle->opacity);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function setAttribute($name, $value) {
		$GLOBALS['%s']->push("cocktail.core.style.adapter.Style::setAttribute");
		$»spos = $GLOBALS['%s']->length;
		if($value === null) {
			$this->attributes->removeNamedItem($name);
			{
				$GLOBALS['%s']->pop();
				return;
			}
		}
		$attr = new cocktail_core_dom_Attr($name);
		$attr->set_value($value);
		$this->attributes->setNamedItem($attr);
		$GLOBALS['%s']->pop();
	}
	public $attributes;
	public $_coreStyle;
	public $cursor;
	public $transformOrigin;
	public $transform;
	public $transitionDelay;
	public $transitionTimingFunction;
	public $transitionDuration;
	public $transitionProperty;
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
	static $__properties__ = array("set_display" => "set_display","get_display" => "get_display","set_position" => "set_position","get_position" => "get_position","set_cssFloat" => "set_CSSFloat","get_cssFloat" => "get_CSSFloat","set_clear" => "set_clear","get_clear" => "get_clear","set_zIndex" => "set_zIndex","get_zIndex" => "get_zIndex","set_marginLeft" => "set_marginLeft","get_marginLeft" => "get_marginLeft","set_marginRight" => "set_marginRight","get_marginRight" => "get_marginRight","set_marginTop" => "set_marginTop","get_marginTop" => "get_marginTop","set_marginBottom" => "set_marginBottom","get_marginBottom" => "get_marginBottom","set_paddingLeft" => "set_paddingLeft","get_paddingLeft" => "get_paddingLeft","set_paddingRight" => "set_paddingRight","get_paddingRight" => "get_paddingRight","set_paddingTop" => "set_paddingTop","get_paddingTop" => "get_paddingTop","set_paddingBottom" => "set_paddingBottom","get_paddingBottom" => "get_paddingBottom","set_width" => "set_width","get_width" => "get_width","set_height" => "set_height","get_height" => "get_height","set_minHeight" => "set_minHeight","get_minHeight" => "get_minHeight","set_maxHeight" => "set_maxHeight","get_maxHeight" => "get_maxHeight","set_minWidth" => "set_minWidth","get_minWidth" => "get_minWidth","set_maxWidth" => "set_maxWidth","get_maxWidth" => "get_maxWidth","set_top" => "set_top","get_top" => "get_top","set_left" => "set_left","get_left" => "get_left","set_bottom" => "set_bottom","get_bottom" => "get_bottom","set_right" => "set_right","get_right" => "get_right","set_backgroundColor" => "set_backgroundColor","get_backgroundColor" => "get_backgroundColor","set_backgroundImage" => "set_backgroundImage","get_backgroundImage" => "get_backgroundImage","set_backgroundRepeat" => "set_backgroundRepeat","get_backgroundRepeat" => "get_backgroundRepeat","set_backgroundOrigin" => "set_backgroundOrigin","get_backgroundOrigin" => "get_backgroundOrigin","set_backgroundSize" => "set_backgroundSize","get_backgroundSize" => "get_backgroundSize","set_backgroundPosition" => "set_backgroundPosition","get_backgroundPosition" => "get_backgroundPosition","set_backgroundClip" => "set_backgroundClip","get_backgroundClip" => "get_backgroundClip","set_fontSize" => "set_fontSize","get_fontSize" => "get_fontSize","set_fontWeight" => "set_fontWeight","get_fontWeight" => "get_fontWeight","set_fontStyle" => "set_fontStyle","get_fontStyle" => "get_fontStyle","set_fontFamily" => "set_fontFamily","get_fontFamily" => "get_fontFamily","set_fontVariant" => "set_fontVariant","get_fontVariant" => "get_fontVariant","set_color" => "set_color","get_color" => "get_color","set_lineHeight" => "set_lineHeight","get_lineHeight" => "get_lineHeight","set_textTransform" => "set_textTransform","get_textTransform" => "get_textTransform","set_letterSpacing" => "set_letterSpacing","get_letterSpacing" => "get_letterSpacing","set_wordSpacing" => "set_wordSpacing","get_wordSpacing" => "get_wordSpacing","set_whiteSpace" => "set_whiteSpace","get_whiteSpace" => "get_whiteSpace","set_textAlign" => "set_textAlign","get_textAlign" => "get_textAlign","set_textIndent" => "set_textIndent","get_textIndent" => "get_textIndent","set_verticalAlign" => "set_verticalAlign","get_verticalAlign" => "get_verticalAlign","set_opacity" => "set_opacity","get_opacity" => "get_opacity","set_visibility" => "set_visibility","get_visibility" => "get_visibility","set_overflowX" => "set_overflowX","get_overflowX" => "get_overflowX","set_overflowY" => "set_overflowY","get_overflowY" => "get_overflowY","set_transitionProperty" => "set_transitionProperty","get_transitionProperty" => "get_transitionProperty","set_transitionDuration" => "set_transitionDuration","get_transitionDuration" => "get_transitionDuration","set_transitionTimingFunction" => "set_transitionTimingFunction","get_transitionTimingFunction" => "get_transitionTimingFunction","set_transitionDelay" => "set_transitionDelay","get_transitionDelay" => "get_transitionDelay","set_transform" => "set_transform","get_transform" => "get_transform","set_transformOrigin" => "set_transformOrigin","get_transformOrigin" => "get_transformOrigin","set_cursor" => "set_cursor","get_cursor" => "get_cursor");
	function __toString() { return 'cocktail.core.style.adapter.Style'; }
}

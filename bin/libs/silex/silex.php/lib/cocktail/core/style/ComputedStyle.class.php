<?php

class cocktail_core_style_ComputedStyle {
	public function __construct($coreStyle) {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.style.ComputedStyle::new");
		$»spos = $GLOBALS['%s']->length;
		$this->_coreStyle = $coreStyle;
		$GLOBALS['%s']->pop();
	}}
	public function getTextIndent() {
		$GLOBALS['%s']->push("cocktail.core.style.ComputedStyle::getTextIndent");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getTransitionablePropertyValue("text-indent", $this->textIndent);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getLineHeight() {
		$GLOBALS['%s']->push("cocktail.core.style.ComputedStyle::getLineHeight");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getTransitionablePropertyValue("line-height", $this->lineHeight);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getWordSpacing() {
		$GLOBALS['%s']->push("cocktail.core.style.ComputedStyle::getWordSpacing");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getTransitionablePropertyValue("word-spacing", $this->wordSpacing);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getLetterSpacing() {
		$GLOBALS['%s']->push("cocktail.core.style.ComputedStyle::getLetterSpacing");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getTransitionablePropertyValue("letter-spacing", $this->letterSpacing);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getFontSize() {
		$GLOBALS['%s']->push("cocktail.core.style.ComputedStyle::getFontSize");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getTransitionablePropertyValue("font-size", $this->fontSize);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getRight() {
		$GLOBALS['%s']->push("cocktail.core.style.ComputedStyle::getRight");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getTransitionablePropertyValue("right", $this->right);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getBottom() {
		$GLOBALS['%s']->push("cocktail.core.style.ComputedStyle::getBottom");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getTransitionablePropertyValue("bottom", $this->bottom);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getLeft() {
		$GLOBALS['%s']->push("cocktail.core.style.ComputedStyle::getLeft");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getTransitionablePropertyValue("left", $this->left);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getTop() {
		$GLOBALS['%s']->push("cocktail.core.style.ComputedStyle::getTop");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getTransitionablePropertyValue("top", $this->top);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getMaxWidth() {
		$GLOBALS['%s']->push("cocktail.core.style.ComputedStyle::getMaxWidth");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getTransitionablePropertyValue("max-width", $this->maxWidth);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getMinWidth() {
		$GLOBALS['%s']->push("cocktail.core.style.ComputedStyle::getMinWidth");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getTransitionablePropertyValue("min-width", $this->minWidth);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getMaxHeight() {
		$GLOBALS['%s']->push("cocktail.core.style.ComputedStyle::getMaxHeight");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getTransitionablePropertyValue("max-height", $this->maxHeight);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getMinHeight() {
		$GLOBALS['%s']->push("cocktail.core.style.ComputedStyle::getMinHeight");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getTransitionablePropertyValue("min-height", $this->minHeight);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getHeight() {
		$GLOBALS['%s']->push("cocktail.core.style.ComputedStyle::getHeight");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getTransitionablePropertyValue("height", $this->height);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getWidth() {
		$GLOBALS['%s']->push("cocktail.core.style.ComputedStyle::getWidth");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getTransitionablePropertyValue("width", $this->width);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getPaddingBottom() {
		$GLOBALS['%s']->push("cocktail.core.style.ComputedStyle::getPaddingBottom");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getTransitionablePropertyValue("padding-bottom", $this->paddingBottom);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getPaddingTop() {
		$GLOBALS['%s']->push("cocktail.core.style.ComputedStyle::getPaddingTop");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getTransitionablePropertyValue("padding-top", $this->paddingTop);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getPaddingRight() {
		$GLOBALS['%s']->push("cocktail.core.style.ComputedStyle::getPaddingRight");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getTransitionablePropertyValue("padding-right", $this->paddingRight);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getPaddingLeft() {
		$GLOBALS['%s']->push("cocktail.core.style.ComputedStyle::getPaddingLeft");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getTransitionablePropertyValue("padding-left", $this->paddingLeft);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getMarginBottom() {
		$GLOBALS['%s']->push("cocktail.core.style.ComputedStyle::getMarginBottom");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getTransitionablePropertyValue("margin-bottom", $this->marginBottom);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getMarginTop() {
		$GLOBALS['%s']->push("cocktail.core.style.ComputedStyle::getMarginTop");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getTransitionablePropertyValue("margin-top", $this->marginTop);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getMarginRight() {
		$GLOBALS['%s']->push("cocktail.core.style.ComputedStyle::getMarginRight");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getTransitionablePropertyValue("margin-right", $this->marginRight);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getMarginLeft() {
		$GLOBALS['%s']->push("cocktail.core.style.ComputedStyle::getMarginLeft");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getTransitionablePropertyValue("margin-left", $this->marginLeft);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getOpacity() {
		$GLOBALS['%s']->push("cocktail.core.style.ComputedStyle::getOpacity");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getTransitionablePropertyValue("opacity", $this->opacity);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_opacity($value) {
		$GLOBALS['%s']->push("cocktail.core.style.ComputedStyle::set_opacity");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->opacity = $value;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_textIndent($value) {
		$GLOBALS['%s']->push("cocktail.core.style.ComputedStyle::set_textIndent");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->textIndent = $value;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_wordSpacing($value) {
		$GLOBALS['%s']->push("cocktail.core.style.ComputedStyle::set_wordSpacing");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->wordSpacing = $value;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_letterSpacing($value) {
		$GLOBALS['%s']->push("cocktail.core.style.ComputedStyle::set_letterSpacing");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->letterSpacing = $value;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_lineHeight($value) {
		$GLOBALS['%s']->push("cocktail.core.style.ComputedStyle::set_lineHeight");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->lineHeight = $value;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_fontSize($value) {
		$GLOBALS['%s']->push("cocktail.core.style.ComputedStyle::set_fontSize");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->fontSize = $value;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_right($value) {
		$GLOBALS['%s']->push("cocktail.core.style.ComputedStyle::set_right");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->right = $value;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_left($value) {
		$GLOBALS['%s']->push("cocktail.core.style.ComputedStyle::set_left");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->left = $value;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_bottom($value) {
		$GLOBALS['%s']->push("cocktail.core.style.ComputedStyle::set_bottom");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->bottom = $value;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_top($value) {
		$GLOBALS['%s']->push("cocktail.core.style.ComputedStyle::set_top");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->top = $value;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_maxWidth($value) {
		$GLOBALS['%s']->push("cocktail.core.style.ComputedStyle::set_maxWidth");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->maxWidth = $value;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_maxHeight($value) {
		$GLOBALS['%s']->push("cocktail.core.style.ComputedStyle::set_maxHeight");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->maxHeight = $value;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_minWidth($value) {
		$GLOBALS['%s']->push("cocktail.core.style.ComputedStyle::set_minWidth");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->minWidth = $value;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_minHeight($value) {
		$GLOBALS['%s']->push("cocktail.core.style.ComputedStyle::set_minHeight");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->minHeight = $value;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_paddingRight($value) {
		$GLOBALS['%s']->push("cocktail.core.style.ComputedStyle::set_paddingRight");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->paddingRight = $value;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_paddingLeft($value) {
		$GLOBALS['%s']->push("cocktail.core.style.ComputedStyle::set_paddingLeft");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->paddingLeft = $value;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_paddingBottom($value) {
		$GLOBALS['%s']->push("cocktail.core.style.ComputedStyle::set_paddingBottom");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->paddingBottom = $value;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_paddingTop($value) {
		$GLOBALS['%s']->push("cocktail.core.style.ComputedStyle::set_paddingTop");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->paddingTop = $value;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_marginRight($value) {
		$GLOBALS['%s']->push("cocktail.core.style.ComputedStyle::set_marginRight");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->marginRight = $value;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_marginBottom($value) {
		$GLOBALS['%s']->push("cocktail.core.style.ComputedStyle::set_marginBottom");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->marginBottom = $value;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_marginTop($value) {
		$GLOBALS['%s']->push("cocktail.core.style.ComputedStyle::set_marginTop");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->marginTop = $value;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_marginLeft($value) {
		$GLOBALS['%s']->push("cocktail.core.style.ComputedStyle::set_marginLeft");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->marginLeft = $value;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_height($value) {
		$GLOBALS['%s']->push("cocktail.core.style.ComputedStyle::set_height");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->height = $value;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_width($value) {
		$GLOBALS['%s']->push("cocktail.core.style.ComputedStyle::set_width");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->width = $value;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getTransitionablePropertyValue($propertyName, $propertyValue) {
		$GLOBALS['%s']->push("cocktail.core.style.ComputedStyle::getTransitionablePropertyValue");
		$»spos = $GLOBALS['%s']->length;
		$transition = cocktail_core_style_transition_TransitionManager::getInstance()->getTransition($propertyName, $this);
		if($transition !== null) {
			$»tmp = $transition->get_currentValue();
			$GLOBALS['%s']->pop();
			return $»tmp;
		} else {
			$GLOBALS['%s']->pop();
			return $propertyValue;
		}
		$GLOBALS['%s']->pop();
	}
	public function init() {
		$GLOBALS['%s']->push("cocktail.core.style.ComputedStyle::init");
		$»spos = $GLOBALS['%s']->length;
		$this->set_minHeight(0.0);
		$this->set_maxHeight(0.0);
		$this->set_minWidth(0.0);
		$this->set_maxWidth(0.0);
		$this->set_width(0.0);
		$this->set_height(0.0);
		$this->set_marginLeft(0.0);
		$this->set_marginRight(0.0);
		$this->set_marginTop(0.0);
		$this->set_marginBottom(0.0);
		$this->set_paddingLeft(0.0);
		$this->set_paddingRight(0.0);
		$this->set_paddingTop(0.0);
		$this->set_paddingBottom(0.0);
		$this->set_left(0.0);
		$this->set_right(0.0);
		$this->set_top(0.0);
		$this->set_bottom(0.0);
		$this->clear = cocktail_core_style_Clear::$none;
		$this->cssFloat = cocktail_core_style_CSSFloat::$none;
		$this->display = cocktail_core_style_Display::$cssInline;
		$this->position = cocktail_core_style_Position::$cssStatic;
		$this->verticalAlign = 0.0;
		$this->set_fontSize(16.0);
		$this->set_lineHeight(14.0);
		$this->fontWeight = cocktail_core_style_FontWeight::$normal;
		$this->fontStyle = cocktail_core_style_FontStyle::$normal;
		$this->fontFamily = new _hx_array(array("serif"));
		$this->fontVariant = cocktail_core_style_FontVariant::$normal;
		$this->textTransform = cocktail_core_style_TextTransform::$none;
		$this->set_letterSpacing(0);
		$this->set_wordSpacing(0);
		$this->set_textIndent(0);
		$this->whiteSpace = cocktail_core_style_WhiteSpace::$normal;
		$this->textAlign = cocktail_core_style_TextAlign::$left;
		$this->color = _hx_anonymous(array("color" => 0, "alpha" => 1.0));
		$this->visibility = cocktail_core_style_Visibility::$visible;
		$this->zIndex = cocktail_core_style_ZIndex::$cssAuto;
		$this->set_opacity(1.0);
		$this->overflowX = cocktail_core_style_Overflow::$visible;
		$this->overflowY = cocktail_core_style_Overflow::$visible;
		$this->transformOrigin = _hx_anonymous(array("x" => 0.0, "y" => 0.0));
		$this->transform = new cocktail_core_geom_Matrix(null);
		$this->backgroundColor = _hx_anonymous(array("color" => 0, "alpha" => 1.0));
		$this->backgroundSize = new _hx_array(array());
		$this->backgroundOrigin = new _hx_array(array());
		$this->backgroundImage = new _hx_array(array());
		$this->backgroundClip = new _hx_array(array());
		$this->backgroundPosition = new _hx_array(array());
		$this->backgroundRepeat = new _hx_array(array());
		$this->cursor = cocktail_core_style_Cursor::$cssDefault;
		$this->transitionDelay = new _hx_array(array(0.0));
		$this->transitionDuration = new _hx_array(array(0.0));
		$this->transitionProperty = cocktail_core_style_TransitionProperty::$all;
		$this->transitionTimingFunction = new _hx_array(array(cocktail_core_style_TransitionTimingFunctionValue::$ease));
		$GLOBALS['%s']->pop();
	}
	public $_coreStyle;
	public $transitionTimingFunction;
	public $transitionDelay;
	public $transitionDuration;
	public $transitionProperty;
	public $cursor;
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
	public $transform;
	public $transformOrigin;
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
	static $__properties__ = array("set_marginLeft" => "set_marginLeft","get_marginLeft" => "getMarginLeft","set_marginRight" => "set_marginRight","get_marginRight" => "getMarginRight","set_marginTop" => "set_marginTop","get_marginTop" => "getMarginTop","set_marginBottom" => "set_marginBottom","get_marginBottom" => "getMarginBottom","set_paddingLeft" => "set_paddingLeft","get_paddingLeft" => "getPaddingLeft","set_paddingRight" => "set_paddingRight","get_paddingRight" => "getPaddingRight","set_paddingTop" => "set_paddingTop","get_paddingTop" => "getPaddingTop","set_paddingBottom" => "set_paddingBottom","get_paddingBottom" => "getPaddingBottom","set_width" => "set_width","get_width" => "getWidth","set_height" => "set_height","get_height" => "getHeight","set_minHeight" => "set_minHeight","get_minHeight" => "getMinHeight","set_maxHeight" => "set_maxHeight","get_maxHeight" => "getMaxHeight","set_minWidth" => "set_minWidth","get_minWidth" => "getMinWidth","set_maxWidth" => "set_maxWidth","get_maxWidth" => "getMaxWidth","set_top" => "set_top","get_top" => "getTop","set_left" => "set_left","get_left" => "getLeft","set_bottom" => "set_bottom","get_bottom" => "getBottom","set_right" => "set_right","get_right" => "getRight","set_fontSize" => "set_fontSize","get_fontSize" => "getFontSize","set_lineHeight" => "set_lineHeight","get_lineHeight" => "getLineHeight","set_letterSpacing" => "set_letterSpacing","get_letterSpacing" => "getLetterSpacing","set_wordSpacing" => "set_wordSpacing","get_wordSpacing" => "getWordSpacing","set_textIndent" => "set_textIndent","get_textIndent" => "getTextIndent","set_opacity" => "set_opacity","get_opacity" => "getOpacity");
	function __toString() { return 'cocktail.core.style.ComputedStyle'; }
}

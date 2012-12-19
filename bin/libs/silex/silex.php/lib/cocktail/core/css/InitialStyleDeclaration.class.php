<?php

class cocktail_core_css_InitialStyleDeclaration extends cocktail_core_css_CSSStyleDeclaration {
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.css.InitialStyleDeclaration::new");
		$»spos = $GLOBALS['%s']->length;
		parent::__construct(null,null);
		$this->initSupportedCSSProperties();
		$this->initLengthCSSProperties();
		$this->initProperties();
		$GLOBALS['%s']->pop();
	}}
	public function pushProperty($name, $typedValue) {
		$GLOBALS['%s']->push("cocktail.core.css.InitialStyleDeclaration::pushProperty");
		$»spos = $GLOBALS['%s']->length;
		$typedProperty = cocktail_core_css_TypedPropertyVO::getPool()->get();
		$typedProperty->important = false;
		$typedProperty->name = $name;
		$typedProperty->typedValue = $typedValue;
		$this->_properties->push($typedProperty);
		$GLOBALS['%s']->pop();
	}
	public function initProperties() {
		$GLOBALS['%s']->push("cocktail.core.css.InitialStyleDeclaration::initProperties");
		$»spos = $GLOBALS['%s']->length;
		$this->pushProperty("width", cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$AUTO));
		$this->pushProperty("height", cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$AUTO));
		$this->pushProperty("display", cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$INLINE));
		$this->pushProperty("position", cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$STATIC));
		$this->pushProperty("float", cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$NONE));
		$this->pushProperty("clear", cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$NONE));
		$this->pushProperty("z-index", cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$AUTO));
		$this->pushProperty("overflow-x", cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$VISIBLE));
		$this->pushProperty("overflow-y", cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$VISIBLE));
		$this->pushProperty("visibility", cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$VISIBLE));
		$this->pushProperty("opacity", cocktail_core_css_CSSPropertyValue::NUMBER(1.0));
		$this->pushProperty("vertical-align", cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$BASELINE));
		$this->pushProperty("line-height", cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$NORMAL));
		$this->pushProperty("max-width", cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$NONE));
		$this->pushProperty("max-height", cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$NONE));
		$this->pushProperty("min-width", cocktail_core_css_CSSPropertyValue::INTEGER(0));
		$this->pushProperty("min-height", cocktail_core_css_CSSPropertyValue::INTEGER(0));
		$this->pushProperty("margin-left", cocktail_core_css_CSSPropertyValue::INTEGER(0));
		$this->pushProperty("margin-top", cocktail_core_css_CSSPropertyValue::INTEGER(0));
		$this->pushProperty("margin-right", cocktail_core_css_CSSPropertyValue::INTEGER(0));
		$this->pushProperty("margin-bottom", cocktail_core_css_CSSPropertyValue::INTEGER(0));
		$this->pushProperty("padding-left", cocktail_core_css_CSSPropertyValue::INTEGER(0));
		$this->pushProperty("padding-top", cocktail_core_css_CSSPropertyValue::INTEGER(0));
		$this->pushProperty("padding-right", cocktail_core_css_CSSPropertyValue::INTEGER(0));
		$this->pushProperty("padding-bottom", cocktail_core_css_CSSPropertyValue::INTEGER(0));
		$this->pushProperty("left", cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$AUTO));
		$this->pushProperty("right", cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$AUTO));
		$this->pushProperty("top", cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$AUTO));
		$this->pushProperty("bottom", cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$AUTO));
		$this->pushProperty("font-style", cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$NORMAL));
		$this->pushProperty("font-variant", cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$NORMAL));
		$this->pushProperty("font-weight", cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$NORMAL));
		$this->pushProperty("font-size", cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$MEDIUM));
		$this->pushProperty("letter-spacing", cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$NORMAL));
		$this->pushProperty("word-spacing", cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$NORMAL));
		$this->pushProperty("text-indent", cocktail_core_css_CSSPropertyValue::INTEGER(0));
		$this->pushProperty("text-align", cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$LEFT));
		$this->pushProperty("white-space", cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$NORMAL));
		$this->pushProperty("text-transform", cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$NONE));
		$this->pushProperty("transition-property", cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$ALL));
		$this->pushProperty("transition-duration", cocktail_core_css_CSSPropertyValue::TIME(cocktail_core_css_CSSTimeValue::SECONDS(0)));
		$this->pushProperty("transition-delay", cocktail_core_css_CSSPropertyValue::TIME(cocktail_core_css_CSSTimeValue::SECONDS(0)));
		$this->pushProperty("transition-timing-function", cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$EASE));
		$this->pushProperty("transform", cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$NONE));
		$this->pushProperty("transform-origin", cocktail_core_css_CSSPropertyValue::GROUP(new _hx_array(array(cocktail_core_css_CSSPropertyValue::PERCENTAGE(50), cocktail_core_css_CSSPropertyValue::PERCENTAGE(50)))));
		$this->pushProperty("background-color", cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::$TRANSPARENT));
		$this->pushProperty("background-image", cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$NONE));
		$this->pushProperty("background-position", cocktail_core_css_CSSPropertyValue::GROUP(new _hx_array(array(cocktail_core_css_CSSPropertyValue::PERCENTAGE(0.0), cocktail_core_css_CSSPropertyValue::PERCENTAGE(0.0)))));
		$this->pushProperty("background-size", cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$AUTO));
		$this->pushProperty("background-repeat", cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$REPEAT));
		$this->pushProperty("background-clip", cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$BORDER_BOX));
		$this->pushProperty("background-origin", cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$PADDING_BOX));
		$this->pushProperty("cursor", cocktail_core_css_CSSPropertyValue::KEYWORD(cocktail_core_css_CSSKeywordValue::$AUTO));
		$this->pushProperty("font-family", cocktail_core_css_CSSPropertyValue::CSS_LIST(new _hx_array(array(cocktail_core_css_CSSPropertyValue::STRING("serif")))));
		$this->pushProperty("color", cocktail_core_css_CSSPropertyValue::COLOR(cocktail_core_css_CSSColorValue::KEYWORD(cocktail_core_css_CSSColorKeyword::$BLACK)));
		$GLOBALS['%s']->pop();
	}
	public function initSupportedCSSProperties() {
		$GLOBALS['%s']->push("cocktail.core.css.InitialStyleDeclaration::initSupportedCSSProperties");
		$»spos = $GLOBALS['%s']->length;
		$this->supportedCSSProperties = new _hx_array(array("display", "position", "float", "clear", "z-index", "overflow-x", "overflow-y", "visibility", "opacity", "vertical-align", "line-height", "width", "height", "min-width", "min-height", "max-width", "max-height", "margin-left", "margin-top", "margin-right", "margin-bottom", "padding-left", "padding-top", "padding-right", "padding-bottom", "left", "right", "top", "bottom", "font-family", "font-size", "font-style", "font-variant", "font-weight", "letter-spacing", "word-spacing", "text-indent", "text-align", "white-space", "text-transform", "color", "transition-property", "transition-duration", "transition-delay", "transition-timing-function", "transform", "transform-origin", "background-color", "background-image", "background-position", "background-size", "background-repeat", "background-origin", "background-clip", "cursor"));
		$GLOBALS['%s']->pop();
	}
	public function initLengthCSSProperties() {
		$GLOBALS['%s']->push("cocktail.core.css.InitialStyleDeclaration::initLengthCSSProperties");
		$»spos = $GLOBALS['%s']->length;
		$this->lengthCSSProperties = new _hx_array(array("width", "height", "top", "left", "bottom", "right", "min-height", "max-height", "min-width", "max-width", "vertical-align", "line-height", "margin-left", "margin-right", "margin-top", "margin-bottom", "padding-left", "padding-right", "padding-top", "padding-bottom", "left", "right", "top", "bottom", "letter-spacing", "word-spacing", "text-indent", "transform", "transform-origin", "background-position", "background-size"));
		$GLOBALS['%s']->pop();
	}
	public $lengthCSSProperties;
	public $supportedCSSProperties;
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
	function __toString() { return 'cocktail.core.css.InitialStyleDeclaration'; }
}

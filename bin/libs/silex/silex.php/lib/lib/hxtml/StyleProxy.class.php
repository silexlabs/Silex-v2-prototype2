<?php

class lib_hxtml_StyleProxy implements lib_hxtml_IStyleProxy{
	public function __construct() { if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("lib.hxtml.StyleProxy::new");
		$�spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}}
	public function setTransitionTimingFunction($element, $value) {
		$GLOBALS['%s']->push("lib.hxtml.StyleProxy::setTransitionTimingFunction");
		$�spos = $GLOBALS['%s']->length;
		$element->style->set_transitionTimingFunction($value);
		$GLOBALS['%s']->pop();
	}
	public function setTransitionProperty($element, $value) {
		$GLOBALS['%s']->push("lib.hxtml.StyleProxy::setTransitionProperty");
		$�spos = $GLOBALS['%s']->length;
		$element->style->set_transitionProperty($value);
		$GLOBALS['%s']->pop();
	}
	public function setTransitionDelay($element, $value) {
		$GLOBALS['%s']->push("lib.hxtml.StyleProxy::setTransitionDelay");
		$�spos = $GLOBALS['%s']->length;
		$element->style->set_transitionDelay($value);
		$GLOBALS['%s']->pop();
	}
	public function setTransitionDuration($element, $value) {
		$GLOBALS['%s']->push("lib.hxtml.StyleProxy::setTransitionDuration");
		$�spos = $GLOBALS['%s']->length;
		$element->style->set_transitionDuration($value);
		$GLOBALS['%s']->pop();
	}
	public function setOverflowY($element, $value) {
		$GLOBALS['%s']->push("lib.hxtml.StyleProxy::setOverflowY");
		$�spos = $GLOBALS['%s']->length;
		$element->style->set_overflowY($value);
		$GLOBALS['%s']->pop();
	}
	public function setOverflowX($element, $value) {
		$GLOBALS['%s']->push("lib.hxtml.StyleProxy::setOverflowX");
		$�spos = $GLOBALS['%s']->length;
		$element->style->set_overflowX($value);
		$GLOBALS['%s']->pop();
	}
	public function setZIndex($element, $value) {
		$GLOBALS['%s']->push("lib.hxtml.StyleProxy::setZIndex");
		$�spos = $GLOBALS['%s']->length;
		$element->style->set_zIndex($value);
		$GLOBALS['%s']->pop();
	}
	public function setWhiteSpace($element, $value) {
		$GLOBALS['%s']->push("lib.hxtml.StyleProxy::setWhiteSpace");
		$�spos = $GLOBALS['%s']->length;
		$element->style->set_whiteSpace($value);
		$GLOBALS['%s']->pop();
	}
	public function setVerticalAlignKey($element, $value) {
		$GLOBALS['%s']->push("lib.hxtml.StyleProxy::setVerticalAlignKey");
		$�spos = $GLOBALS['%s']->length;
		$element->style->set_verticalAlign($value);
		$GLOBALS['%s']->pop();
	}
	public function setVerticalAlignNum($element, $value, $unit) {
		$GLOBALS['%s']->push("lib.hxtml.StyleProxy::setVerticalAlignNum");
		$�spos = $GLOBALS['%s']->length;
		$element->style->set_verticalAlign(_hx_string_rec($value, "") . $unit);
		$GLOBALS['%s']->pop();
	}
	public function setTextAlign($element, $value) {
		$GLOBALS['%s']->push("lib.hxtml.StyleProxy::setTextAlign");
		$�spos = $GLOBALS['%s']->length;
		$element->style->set_textAlign($value);
		$GLOBALS['%s']->pop();
	}
	public function setTextIndent($element, $value, $unit) {
		$GLOBALS['%s']->push("lib.hxtml.StyleProxy::setTextIndent");
		$�spos = $GLOBALS['%s']->length;
		$element->style->set_textIndent(_hx_string_rec($value, "") . $unit);
		$GLOBALS['%s']->pop();
	}
	public function setWordSpacingKey($element, $value) {
		$GLOBALS['%s']->push("lib.hxtml.StyleProxy::setWordSpacingKey");
		$�spos = $GLOBALS['%s']->length;
		$element->style->set_wordSpacing($value);
		$GLOBALS['%s']->pop();
	}
	public function setWordSpacingNum($element, $value, $unit) {
		$GLOBALS['%s']->push("lib.hxtml.StyleProxy::setWordSpacingNum");
		$�spos = $GLOBALS['%s']->length;
		$element->style->set_wordSpacing(_hx_string_rec($value, "") . $unit);
		$GLOBALS['%s']->pop();
	}
	public function setLetterSpacingKey($element, $value) {
		$GLOBALS['%s']->push("lib.hxtml.StyleProxy::setLetterSpacingKey");
		$�spos = $GLOBALS['%s']->length;
		$element->style->set_letterSpacing($value);
		$GLOBALS['%s']->pop();
	}
	public function setLetterSpacingNum($element, $value, $unit) {
		$GLOBALS['%s']->push("lib.hxtml.StyleProxy::setLetterSpacingNum");
		$�spos = $GLOBALS['%s']->length;
		$element->style->set_letterSpacing(_hx_string_rec($value, "") . $unit);
		$GLOBALS['%s']->pop();
	}
	public function setTextTransform($element, $value) {
		$GLOBALS['%s']->push("lib.hxtml.StyleProxy::setTextTransform");
		$�spos = $GLOBALS['%s']->length;
		$element->style->set_textTransform($value);
		$GLOBALS['%s']->pop();
	}
	public function setLineHeightNum($element, $value, $unit) {
		$GLOBALS['%s']->push("lib.hxtml.StyleProxy::setLineHeightNum");
		$�spos = $GLOBALS['%s']->length;
		$element->style->set_lineHeight(_hx_string_rec($value, "") . $unit);
		$GLOBALS['%s']->pop();
	}
	public function setLineHeightZero($element) {
		$GLOBALS['%s']->push("lib.hxtml.StyleProxy::setLineHeightZero");
		$�spos = $GLOBALS['%s']->length;
		$element->style->set_lineHeight("0");
		$GLOBALS['%s']->pop();
	}
	public function setLineHeightKey($element, $value) {
		$GLOBALS['%s']->push("lib.hxtml.StyleProxy::setLineHeightKey");
		$�spos = $GLOBALS['%s']->length;
		$element->style->set_lineHeight($value);
		$GLOBALS['%s']->pop();
	}
	public function setTextDecoration($element, $value) {
		$GLOBALS['%s']->push("lib.hxtml.StyleProxy::setTextDecoration");
		$�spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public function setTextColorRGB($element, $value) {
		$GLOBALS['%s']->push("lib.hxtml.StyleProxy::setTextColorRGB");
		$�spos = $GLOBALS['%s']->length;
		$element->style->set_color("rgb(" . $value . ")");
		$GLOBALS['%s']->pop();
	}
	public function setTextColorRGBA($element, $value) {
		$GLOBALS['%s']->push("lib.hxtml.StyleProxy::setTextColorRGBA");
		$�spos = $GLOBALS['%s']->length;
		$element->style->set_color("rgba(" . $value . ")");
		$GLOBALS['%s']->pop();
	}
	public function setTextColorNum($element, $value) {
		$GLOBALS['%s']->push("lib.hxtml.StyleProxy::setTextColorNum");
		$�spos = $GLOBALS['%s']->length;
		$element->style->set_color("#" . Std::string($value));
		$GLOBALS['%s']->pop();
	}
	public function setTextColorKey($element, $value) {
		$GLOBALS['%s']->push("lib.hxtml.StyleProxy::setTextColorKey");
		$�spos = $GLOBALS['%s']->length;
		$element->style->set_color($value);
		$GLOBALS['%s']->pop();
	}
	public function setFontVariant($element, $value) {
		$GLOBALS['%s']->push("lib.hxtml.StyleProxy::setFontVariant");
		$�spos = $GLOBALS['%s']->length;
		$element->style->set_fontVariant($value);
		$GLOBALS['%s']->pop();
	}
	public function setFontFamily($element, $value) {
		$GLOBALS['%s']->push("lib.hxtml.StyleProxy::setFontFamily");
		$�spos = $GLOBALS['%s']->length;
		if($value->length > 0) {
			$element->style->set_fontFamily($value->join(","));
		} else {
			$element->style->set_fontFamily("");
		}
		$GLOBALS['%s']->pop();
	}
	public function setFontStyle($element, $value) {
		$GLOBALS['%s']->push("lib.hxtml.StyleProxy::setFontStyle");
		$�spos = $GLOBALS['%s']->length;
		$element->style->set_fontStyle($value);
		$GLOBALS['%s']->pop();
	}
	public function setFontWeightKey($element, $value) {
		$GLOBALS['%s']->push("lib.hxtml.StyleProxy::setFontWeightKey");
		$�spos = $GLOBALS['%s']->length;
		$element->style->set_fontWeight($value);
		$GLOBALS['%s']->pop();
	}
	public function setFontWeightNum($element, $value) {
		$GLOBALS['%s']->push("lib.hxtml.StyleProxy::setFontWeightNum");
		$�spos = $GLOBALS['%s']->length;
		$element->style->set_fontWeight(Std::string($value));
		$GLOBALS['%s']->pop();
	}
	public function setFontSizeKey($element, $value) {
		$GLOBALS['%s']->push("lib.hxtml.StyleProxy::setFontSizeKey");
		$�spos = $GLOBALS['%s']->length;
		$element->style->set_fontSize($value);
		$GLOBALS['%s']->pop();
	}
	public function setFontSizeNum($element, $value, $unit) {
		$GLOBALS['%s']->push("lib.hxtml.StyleProxy::setFontSizeNum");
		$�spos = $GLOBALS['%s']->length;
		$element->style->set_fontSize(_hx_string_rec($value, "") . $unit);
		$GLOBALS['%s']->pop();
	}
	public function setBgPos($element, $value) {
		$GLOBALS['%s']->push("lib.hxtml.StyleProxy::setBgPos");
		$�spos = $GLOBALS['%s']->length;
		$element->style->set_backgroundPosition($value);
		$GLOBALS['%s']->pop();
	}
	public function setBgRepeat($element, $value) {
		$GLOBALS['%s']->push("lib.hxtml.StyleProxy::setBgRepeat");
		$�spos = $GLOBALS['%s']->length;
		$element->style->set_backgroundRepeat($value->join(","));
		$GLOBALS['%s']->pop();
	}
	public function setBgAttachment($element, $value) {
		$GLOBALS['%s']->push("lib.hxtml.StyleProxy::setBgAttachment");
		$�spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public function setBgImage($element, $value) {
		$GLOBALS['%s']->push("lib.hxtml.StyleProxy::setBgImage");
		$�spos = $GLOBALS['%s']->length;
		if($value->length === 1) {
			$element->style->set_backgroundImage("url(" . $value[0] . ")");
		} else {
			$element->style->set_backgroundImage("");
		}
		$GLOBALS['%s']->pop();
	}
	public function setBgColorKey($element, $value) {
		$GLOBALS['%s']->push("lib.hxtml.StyleProxy::setBgColorKey");
		$�spos = $GLOBALS['%s']->length;
		$element->style->set_backgroundColor($value);
		$GLOBALS['%s']->pop();
	}
	public function setBgColorRGB($element, $value) {
		$GLOBALS['%s']->push("lib.hxtml.StyleProxy::setBgColorRGB");
		$�spos = $GLOBALS['%s']->length;
		$element->style->set_backgroundColor("rgb(" . $value . ")");
		$GLOBALS['%s']->pop();
	}
	public function setBgColorRGBA($element, $value) {
		$GLOBALS['%s']->push("lib.hxtml.StyleProxy::setBgColorRGBA");
		$�spos = $GLOBALS['%s']->length;
		$element->style->set_backgroundColor("rgba(" . $value . ")");
		$GLOBALS['%s']->pop();
	}
	public function setBgColorHex($element, $value) {
		$GLOBALS['%s']->push("lib.hxtml.StyleProxy::setBgColorHex");
		$�spos = $GLOBALS['%s']->length;
		$element->style->set_backgroundColor("#" . Std::string($value));
		$GLOBALS['%s']->pop();
	}
	public function setRightKey($element, $value) {
		$GLOBALS['%s']->push("lib.hxtml.StyleProxy::setRightKey");
		$�spos = $GLOBALS['%s']->length;
		$element->style->set_right($value);
		$GLOBALS['%s']->pop();
	}
	public function setBottomKey($element, $value) {
		$GLOBALS['%s']->push("lib.hxtml.StyleProxy::setBottomKey");
		$�spos = $GLOBALS['%s']->length;
		$element->style->set_bottom($value);
		$GLOBALS['%s']->pop();
	}
	public function setLeftKey($element, $value) {
		$GLOBALS['%s']->push("lib.hxtml.StyleProxy::setLeftKey");
		$�spos = $GLOBALS['%s']->length;
		$element->style->set_left($value);
		$GLOBALS['%s']->pop();
	}
	public function setTopKey($element, $value) {
		$GLOBALS['%s']->push("lib.hxtml.StyleProxy::setTopKey");
		$�spos = $GLOBALS['%s']->length;
		$element->style->set_top($value);
		$GLOBALS['%s']->pop();
	}
	public function setRightZero($element) {
		$GLOBALS['%s']->push("lib.hxtml.StyleProxy::setRightZero");
		$�spos = $GLOBALS['%s']->length;
		$element->style->set_right("0");
		$GLOBALS['%s']->pop();
	}
	public function setRight($element, $value, $unit) {
		$GLOBALS['%s']->push("lib.hxtml.StyleProxy::setRight");
		$�spos = $GLOBALS['%s']->length;
		$element->style->set_right(_hx_string_rec($value, "") . $unit);
		$GLOBALS['%s']->pop();
	}
	public function setBottomZero($element) {
		$GLOBALS['%s']->push("lib.hxtml.StyleProxy::setBottomZero");
		$�spos = $GLOBALS['%s']->length;
		$element->style->set_bottom("0");
		$GLOBALS['%s']->pop();
	}
	public function setBottom($element, $value, $unit) {
		$GLOBALS['%s']->push("lib.hxtml.StyleProxy::setBottom");
		$�spos = $GLOBALS['%s']->length;
		$element->style->set_bottom(_hx_string_rec($value, "") . $unit);
		$GLOBALS['%s']->pop();
	}
	public function setLeftZero($element) {
		$GLOBALS['%s']->push("lib.hxtml.StyleProxy::setLeftZero");
		$�spos = $GLOBALS['%s']->length;
		$element->style->set_left("0");
		$GLOBALS['%s']->pop();
	}
	public function setLeft($element, $value, $unit) {
		$GLOBALS['%s']->push("lib.hxtml.StyleProxy::setLeft");
		$�spos = $GLOBALS['%s']->length;
		$element->style->set_left(_hx_string_rec($value, "") . $unit);
		$GLOBALS['%s']->pop();
	}
	public function setTopZero($element) {
		$GLOBALS['%s']->push("lib.hxtml.StyleProxy::setTopZero");
		$�spos = $GLOBALS['%s']->length;
		$element->style->set_top("0");
		$GLOBALS['%s']->pop();
	}
	public function setTop($element, $value, $unit) {
		$GLOBALS['%s']->push("lib.hxtml.StyleProxy::setTop");
		$�spos = $GLOBALS['%s']->length;
		$element->style->set_top(_hx_string_rec($value, "") . $unit);
		$GLOBALS['%s']->pop();
	}
	public function setMaxHeightKey($element, $value) {
		$GLOBALS['%s']->push("lib.hxtml.StyleProxy::setMaxHeightKey");
		$�spos = $GLOBALS['%s']->length;
		$element->style->set_maxHeight($value);
		$GLOBALS['%s']->pop();
	}
	public function setMaxWidthKey($element, $value) {
		$GLOBALS['%s']->push("lib.hxtml.StyleProxy::setMaxWidthKey");
		$�spos = $GLOBALS['%s']->length;
		$element->style->set_maxWidth($value);
		$GLOBALS['%s']->pop();
	}
	public function setMaxHeightZero($element) {
		$GLOBALS['%s']->push("lib.hxtml.StyleProxy::setMaxHeightZero");
		$�spos = $GLOBALS['%s']->length;
		$element->style->set_maxHeight("0");
		$GLOBALS['%s']->pop();
	}
	public function setMinHeightZero($element) {
		$GLOBALS['%s']->push("lib.hxtml.StyleProxy::setMinHeightZero");
		$�spos = $GLOBALS['%s']->length;
		$element->style->set_minHeight("0");
		$GLOBALS['%s']->pop();
	}
	public function setMaxWidthZero($element) {
		$GLOBALS['%s']->push("lib.hxtml.StyleProxy::setMaxWidthZero");
		$�spos = $GLOBALS['%s']->length;
		$element->style->set_maxWidth("0");
		$GLOBALS['%s']->pop();
	}
	public function setMinWidthZero($element) {
		$GLOBALS['%s']->push("lib.hxtml.StyleProxy::setMinWidthZero");
		$�spos = $GLOBALS['%s']->length;
		$element->style->set_minWidth("0");
		$GLOBALS['%s']->pop();
	}
	public function setMaxHeight($element, $value, $unit) {
		$GLOBALS['%s']->push("lib.hxtml.StyleProxy::setMaxHeight");
		$�spos = $GLOBALS['%s']->length;
		$element->style->set_maxHeight(_hx_string_rec($value, "") . $unit);
		$GLOBALS['%s']->pop();
	}
	public function setMaxWidth($element, $value, $unit) {
		$GLOBALS['%s']->push("lib.hxtml.StyleProxy::setMaxWidth");
		$�spos = $GLOBALS['%s']->length;
		$element->style->set_maxWidth(_hx_string_rec($value, "") . $unit);
		$GLOBALS['%s']->pop();
	}
	public function setMinHeight($element, $value, $unit) {
		$GLOBALS['%s']->push("lib.hxtml.StyleProxy::setMinHeight");
		$�spos = $GLOBALS['%s']->length;
		$element->style->set_minHeight(_hx_string_rec($value, "") . $unit);
		$GLOBALS['%s']->pop();
	}
	public function setMinWidth($element, $value, $unit) {
		$GLOBALS['%s']->push("lib.hxtml.StyleProxy::setMinWidth");
		$�spos = $GLOBALS['%s']->length;
		$element->style->set_minWidth(_hx_string_rec($value, "") . $unit);
		$GLOBALS['%s']->pop();
	}
	public function setHeightKey($element, $value) {
		$GLOBALS['%s']->push("lib.hxtml.StyleProxy::setHeightKey");
		$�spos = $GLOBALS['%s']->length;
		$element->style->set_height($value);
		$GLOBALS['%s']->pop();
	}
	public function setHeightZero($element) {
		$GLOBALS['%s']->push("lib.hxtml.StyleProxy::setHeightZero");
		$�spos = $GLOBALS['%s']->length;
		$element->style->set_height("0");
		$GLOBALS['%s']->pop();
	}
	public function setHeight($element, $value, $unit) {
		$GLOBALS['%s']->push("lib.hxtml.StyleProxy::setHeight");
		$�spos = $GLOBALS['%s']->length;
		$element->style->set_height(_hx_string_rec($value, "") . $unit);
		$GLOBALS['%s']->pop();
	}
	public function setWidthKey($element, $value) {
		$GLOBALS['%s']->push("lib.hxtml.StyleProxy::setWidthKey");
		$�spos = $GLOBALS['%s']->length;
		$element->style->set_width($value);
		$GLOBALS['%s']->pop();
	}
	public function setWidthZero($element) {
		$GLOBALS['%s']->push("lib.hxtml.StyleProxy::setWidthZero");
		$�spos = $GLOBALS['%s']->length;
		$element->style->set_width("0");
		$GLOBALS['%s']->pop();
	}
	public function setWidth($element, $value, $unit) {
		$GLOBALS['%s']->push("lib.hxtml.StyleProxy::setWidth");
		$�spos = $GLOBALS['%s']->length;
		$element->style->set_width(_hx_string_rec($value, "") . $unit);
		$GLOBALS['%s']->pop();
	}
	public function setPaddingBottom($element, $value, $unit) {
		$GLOBALS['%s']->push("lib.hxtml.StyleProxy::setPaddingBottom");
		$�spos = $GLOBALS['%s']->length;
		$element->style->set_paddingBottom(_hx_string_rec($value, "") . $unit);
		$GLOBALS['%s']->pop();
	}
	public function setPaddingRight($element, $value, $unit) {
		$GLOBALS['%s']->push("lib.hxtml.StyleProxy::setPaddingRight");
		$�spos = $GLOBALS['%s']->length;
		$element->style->set_paddingRight(_hx_string_rec($value, "") . $unit);
		$GLOBALS['%s']->pop();
	}
	public function setPaddingTop($element, $value, $unit) {
		$GLOBALS['%s']->push("lib.hxtml.StyleProxy::setPaddingTop");
		$�spos = $GLOBALS['%s']->length;
		$element->style->set_paddingTop(_hx_string_rec($value, "") . $unit);
		$GLOBALS['%s']->pop();
	}
	public function setPaddingLeft($element, $value, $unit) {
		$GLOBALS['%s']->push("lib.hxtml.StyleProxy::setPaddingLeft");
		$�spos = $GLOBALS['%s']->length;
		$element->style->set_paddingLeft(_hx_string_rec($value, "") . $unit);
		$GLOBALS['%s']->pop();
	}
	public function setMarginRightZero($element) {
		$GLOBALS['%s']->push("lib.hxtml.StyleProxy::setMarginRightZero");
		$�spos = $GLOBALS['%s']->length;
		$element->style->set_marginRight("0");
		$GLOBALS['%s']->pop();
	}
	public function setMarginTopZero($element) {
		$GLOBALS['%s']->push("lib.hxtml.StyleProxy::setMarginTopZero");
		$�spos = $GLOBALS['%s']->length;
		$element->style->set_marginTop("0");
		$GLOBALS['%s']->pop();
	}
	public function setMarginLeftZero($element) {
		$GLOBALS['%s']->push("lib.hxtml.StyleProxy::setMarginLeftZero");
		$�spos = $GLOBALS['%s']->length;
		$element->style->set_marginLeft("0");
		$GLOBALS['%s']->pop();
	}
	public function setMarginBottomZero($element) {
		$GLOBALS['%s']->push("lib.hxtml.StyleProxy::setMarginBottomZero");
		$�spos = $GLOBALS['%s']->length;
		$element->style->set_marginBottom("0");
		$GLOBALS['%s']->pop();
	}
	public function setMarginBottomKey($element, $value) {
		$GLOBALS['%s']->push("lib.hxtml.StyleProxy::setMarginBottomKey");
		$�spos = $GLOBALS['%s']->length;
		$element->style->set_marginBottom($value);
		$GLOBALS['%s']->pop();
	}
	public function setMarginBottomNum($element, $value, $unit) {
		$GLOBALS['%s']->push("lib.hxtml.StyleProxy::setMarginBottomNum");
		$�spos = $GLOBALS['%s']->length;
		$element->style->set_marginBottom(_hx_string_rec($value, "") . $unit);
		$GLOBALS['%s']->pop();
	}
	public function setMarginRightKey($element, $value) {
		$GLOBALS['%s']->push("lib.hxtml.StyleProxy::setMarginRightKey");
		$�spos = $GLOBALS['%s']->length;
		$element->style->set_marginRight($value);
		$GLOBALS['%s']->pop();
	}
	public function setMarginRightNum($element, $value, $unit) {
		$GLOBALS['%s']->push("lib.hxtml.StyleProxy::setMarginRightNum");
		$�spos = $GLOBALS['%s']->length;
		$element->style->set_marginRight(_hx_string_rec($value, "") . $unit);
		$GLOBALS['%s']->pop();
	}
	public function setMarginTopKey($element, $value) {
		$GLOBALS['%s']->push("lib.hxtml.StyleProxy::setMarginTopKey");
		$�spos = $GLOBALS['%s']->length;
		$element->style->set_marginTop($value);
		$GLOBALS['%s']->pop();
	}
	public function setMarginTopNum($element, $value, $unit) {
		$GLOBALS['%s']->push("lib.hxtml.StyleProxy::setMarginTopNum");
		$�spos = $GLOBALS['%s']->length;
		$element->style->set_marginTop(_hx_string_rec($value, "") . $unit);
		$GLOBALS['%s']->pop();
	}
	public function setMarginLeftKey($element, $value) {
		$GLOBALS['%s']->push("lib.hxtml.StyleProxy::setMarginLeftKey");
		$�spos = $GLOBALS['%s']->length;
		$element->style->set_marginLeft($value);
		$GLOBALS['%s']->pop();
	}
	public function setMarginLeftNum($element, $value, $unit) {
		$GLOBALS['%s']->push("lib.hxtml.StyleProxy::setMarginLeftNum");
		$�spos = $GLOBALS['%s']->length;
		$element->style->set_marginLeft(_hx_string_rec($value, "") . $unit);
		$GLOBALS['%s']->pop();
	}
	public function setTransformOrigin($element, $value) {
		$GLOBALS['%s']->push("lib.hxtml.StyleProxy::setTransformOrigin");
		$�spos = $GLOBALS['%s']->length;
		$element->style->set_transformOrigin($value);
		$GLOBALS['%s']->pop();
	}
	public function setTransform($element, $value) {
		$GLOBALS['%s']->push("lib.hxtml.StyleProxy::setTransform");
		$�spos = $GLOBALS['%s']->length;
		$element->style->set_transform($value);
		$GLOBALS['%s']->pop();
	}
	public function setClear($element, $value) {
		$GLOBALS['%s']->push("lib.hxtml.StyleProxy::setClear");
		$�spos = $GLOBALS['%s']->length;
		$element->style->set_clear($value);
		$GLOBALS['%s']->pop();
	}
	public function setCssFloat($element, $value) {
		$GLOBALS['%s']->push("lib.hxtml.StyleProxy::setCssFloat");
		$�spos = $GLOBALS['%s']->length;
		$element->style->set_CSSFloat($value);
		$GLOBALS['%s']->pop();
	}
	public function setPosition($element, $value) {
		$GLOBALS['%s']->push("lib.hxtml.StyleProxy::setPosition");
		$�spos = $GLOBALS['%s']->length;
		$element->style->set_position($value);
		$GLOBALS['%s']->pop();
	}
	public function setDisplay($element, $value) {
		$GLOBALS['%s']->push("lib.hxtml.StyleProxy::setDisplay");
		$�spos = $GLOBALS['%s']->length;
		$element->style->set_display($value);
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'lib.hxtml.StyleProxy'; }
}

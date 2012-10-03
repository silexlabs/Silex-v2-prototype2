<?php

class cocktail_core_unit_UnitManager {
	public function __construct() { if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::new");
		$»spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}}
	static function boxStyleEnum($enumType, $string) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::boxStyleEnum");
		$»spos = $GLOBALS['%s']->length;
		if($string === "auto") {
			$»tmp = Type::createEnum($enumType, "cssAuto", null);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$parsed = cocktail_core_unit_UnitManager::string2VUnit($string);
		{
			$»tmp = cocktail_core_unit_UnitManager_0($enumType, $parsed, $string);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function constrainedDimensionEnum($string) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::constrainedDimensionEnum");
		$»spos = $GLOBALS['%s']->length;
		if($string === "none") {
			$»tmp = cocktail_core_style_ConstrainedDimension::$none;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$parsed = cocktail_core_unit_UnitManager::string2VUnit($string);
		$constrainedDimension = null;
		switch($parsed->unit) {
		case "%":{
			$constrainedDimension = cocktail_core_style_ConstrainedDimension::percent(Std::parseInt($parsed->value));
		}break;
		default:{
			$constrainedDimension = cocktail_core_style_ConstrainedDimension::length(cocktail_core_unit_UnitManager::string2Length($parsed));
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $constrainedDimension;
		}
		$GLOBALS['%s']->pop();
	}
	static function displayEnum($string) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::displayEnum");
		$»spos = $GLOBALS['%s']->length;
		$parsed = cocktail_core_unit_UnitManager::trim($string);
		$display = null;
		switch($parsed) {
		case "inline":{
			$display = cocktail_core_style_Display::$cssInline;
		}break;
		case "block":{
			$display = cocktail_core_style_Display::$block;
		}break;
		case "inline-block":{
			$display = cocktail_core_style_Display::$inlineBlock;
		}break;
		case "none":{
			$display = cocktail_core_style_Display::$none;
		}break;
		default:{
			$display = null;
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $display;
		}
		$GLOBALS['%s']->pop();
	}
	static function overflowEnum($string) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::overflowEnum");
		$»spos = $GLOBALS['%s']->length;
		$parsed = cocktail_core_unit_UnitManager::trim($string);
		$overflow = null;
		switch($parsed) {
		case "visible":{
			$overflow = cocktail_core_style_Overflow::$visible;
		}break;
		case "scroll":{
			$overflow = cocktail_core_style_Overflow::$scroll;
		}break;
		case "auto":{
			$overflow = cocktail_core_style_Overflow::$cssAuto;
		}break;
		case "hidden":{
			$overflow = cocktail_core_style_Overflow::$hidden;
		}break;
		default:{
			$overflow = null;
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $overflow;
		}
		$GLOBALS['%s']->pop();
	}
	static function zIndexEnum($string) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::zIndexEnum");
		$»spos = $GLOBALS['%s']->length;
		$parsed = cocktail_core_unit_UnitManager::trim($string);
		$zIndex = null;
		switch($parsed) {
		case "auto":{
			$zIndex = cocktail_core_style_ZIndex::$cssAuto;
		}break;
		default:{
			$zIndex = cocktail_core_style_ZIndex::integer(Std::parseInt($parsed));
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $zIndex;
		}
		$GLOBALS['%s']->pop();
	}
	static function fontSizeEnum($string) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::fontSizeEnum");
		$»spos = $GLOBALS['%s']->length;
		$string = cocktail_core_unit_UnitManager::trim($string);
		switch($string) {
		case "small":{
			$»tmp = cocktail_core_style_FontSize::absoluteSize(cocktail_core_unit_FontSizeAbsoluteSize::$small);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}break;
		case "xx-small":{
			$»tmp = cocktail_core_style_FontSize::absoluteSize(cocktail_core_unit_FontSizeAbsoluteSize::$xxSmall);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}break;
		case "x-small":{
			$»tmp = cocktail_core_style_FontSize::absoluteSize(cocktail_core_unit_FontSizeAbsoluteSize::$xSmall);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}break;
		case "medium":{
			$»tmp = cocktail_core_style_FontSize::absoluteSize(cocktail_core_unit_FontSizeAbsoluteSize::$medium);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}break;
		case "large":{
			$»tmp = cocktail_core_style_FontSize::absoluteSize(cocktail_core_unit_FontSizeAbsoluteSize::$large);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}break;
		case "x-large":{
			$»tmp = cocktail_core_style_FontSize::absoluteSize(cocktail_core_unit_FontSizeAbsoluteSize::$xLarge);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}break;
		case "xx-large":{
			$»tmp = cocktail_core_style_FontSize::absoluteSize(cocktail_core_unit_FontSizeAbsoluteSize::$xxLarge);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}break;
		case "larger":{
			$»tmp = cocktail_core_style_FontSize::relativeSize(cocktail_core_unit_FontSizeRelativeSize::$larger);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}break;
		case "smaller":{
			$»tmp = cocktail_core_style_FontSize::relativeSize(cocktail_core_unit_FontSizeRelativeSize::$smaller);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}break;
		}
		$parsed = cocktail_core_unit_UnitManager::string2VUnit($string);
		switch($parsed->unit) {
		case "%":{
			$»tmp = cocktail_core_style_FontSize::percentage(Std::parseInt($parsed->value));
			$GLOBALS['%s']->pop();
			return $»tmp;
		}break;
		default:{
			$»tmp = cocktail_core_style_FontSize::length(cocktail_core_unit_UnitManager::string2Length($parsed));
			$GLOBALS['%s']->pop();
			return $»tmp;
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	static function verticalAlignEnum($string) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::verticalAlignEnum");
		$»spos = $GLOBALS['%s']->length;
		$string = cocktail_core_unit_UnitManager::trim($string);
		$verticalAlign = null;
		switch($string) {
		case "baseline":{
			$verticalAlign = cocktail_core_style_VerticalAlign::$baseline;
		}break;
		case "bottom":{
			$verticalAlign = cocktail_core_style_VerticalAlign::$bottom;
		}break;
		case "super":{
			$verticalAlign = cocktail_core_style_VerticalAlign::$cssSuper;
		}break;
		case "middle":{
			$verticalAlign = cocktail_core_style_VerticalAlign::$middle;
		}break;
		case "top":{
			$verticalAlign = cocktail_core_style_VerticalAlign::$top;
		}break;
		case "textBottom":{
			$verticalAlign = cocktail_core_style_VerticalAlign::$textBottom;
		}break;
		case "textTop":{
			$verticalAlign = cocktail_core_style_VerticalAlign::$textTop;
		}break;
		case "sub":{
			$verticalAlign = cocktail_core_style_VerticalAlign::$sub;
		}break;
		default:{
			$verticalAlign = null;
		}break;
		}
		if($verticalAlign === null) {
			$parsed = cocktail_core_unit_UnitManager::string2VUnit($string);
			switch($parsed->unit) {
			case "%":{
				$verticalAlign = cocktail_core_style_VerticalAlign::percent(Std::parseInt($parsed->value));
			}break;
			default:{
				$verticalAlign = cocktail_core_style_VerticalAlign::length(cocktail_core_unit_UnitManager::string2Length($parsed));
			}break;
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $verticalAlign;
		}
		$GLOBALS['%s']->pop();
	}
	static function clearEnum($string) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::clearEnum");
		$»spos = $GLOBALS['%s']->length;
		$parsed = cocktail_core_unit_UnitManager::trim($string);
		$clear = null;
		switch($parsed) {
		case "both":{
			$clear = cocktail_core_style_Clear::$both;
		}break;
		case "left":{
			$clear = cocktail_core_style_Clear::$left;
		}break;
		case "right":{
			$clear = cocktail_core_style_Clear::$right;
		}break;
		case "none":{
			$clear = cocktail_core_style_Clear::$none;
		}break;
		default:{
			$clear = null;
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $clear;
		}
		$GLOBALS['%s']->pop();
	}
	static function positionEnum($string) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::positionEnum");
		$»spos = $GLOBALS['%s']->length;
		$parsed = cocktail_core_unit_UnitManager::trim($string);
		$position = null;
		switch($parsed) {
		case "static":{
			$position = cocktail_core_style_Position::$cssStatic;
		}break;
		case "absolute":{
			$position = cocktail_core_style_Position::$absolute;
		}break;
		case "relative":{
			$position = cocktail_core_style_Position::$relative;
		}break;
		case "fixed":{
			$position = cocktail_core_style_Position::$fixed;
		}break;
		default:{
			$position = null;
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $position;
		}
		$GLOBALS['%s']->pop();
	}
	static function whiteSpaceEnum($string) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::whiteSpaceEnum");
		$»spos = $GLOBALS['%s']->length;
		$parsed = cocktail_core_unit_UnitManager::trim($string);
		$whiteSpace = null;
		switch($parsed) {
		case "normal":{
			$whiteSpace = cocktail_core_style_WhiteSpace::$normal;
		}break;
		case "nowrap":{
			$whiteSpace = cocktail_core_style_WhiteSpace::$nowrap;
		}break;
		case "pre":{
			$whiteSpace = cocktail_core_style_WhiteSpace::$pre;
		}break;
		case "preLine":{
			$whiteSpace = cocktail_core_style_WhiteSpace::$preLine;
		}break;
		case "preWrap":{
			$whiteSpace = cocktail_core_style_WhiteSpace::$preWrap;
		}break;
		default:{
			$whiteSpace = null;
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $whiteSpace;
		}
		$GLOBALS['%s']->pop();
	}
	static function textAlignEnum($string) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::textAlignEnum");
		$»spos = $GLOBALS['%s']->length;
		$parsed = cocktail_core_unit_UnitManager::trim($string);
		$textAlign = null;
		switch($parsed) {
		case "left":{
			$textAlign = cocktail_core_style_TextAlign::$left;
		}break;
		case "right":{
			$textAlign = cocktail_core_style_TextAlign::$right;
		}break;
		case "center":{
			$textAlign = cocktail_core_style_TextAlign::$center;
		}break;
		case "justify":{
			$textAlign = cocktail_core_style_TextAlign::$justify;
		}break;
		default:{
			$textAlign = null;
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $textAlign;
		}
		$GLOBALS['%s']->pop();
	}
	static function fontWeightEnum($string) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::fontWeightEnum");
		$»spos = $GLOBALS['%s']->length;
		$parsed = cocktail_core_unit_UnitManager::trim($string);
		$fontWeight = null;
		switch($parsed) {
		case "bold":{
			$fontWeight = cocktail_core_style_FontWeight::$bold;
		}break;
		case "bolder":{
			$fontWeight = cocktail_core_style_FontWeight::$bolder;
		}break;
		case "normal":{
			$fontWeight = cocktail_core_style_FontWeight::$normal;
		}break;
		case "lighter":{
			$fontWeight = cocktail_core_style_FontWeight::$lighter;
		}break;
		case "100":{
			$fontWeight = cocktail_core_style_FontWeight::$css100;
		}break;
		case "200":{
			$fontWeight = cocktail_core_style_FontWeight::$css200;
		}break;
		case "300":{
			$fontWeight = cocktail_core_style_FontWeight::$css300;
		}break;
		case "400":{
			$fontWeight = cocktail_core_style_FontWeight::$css400;
		}break;
		case "500":{
			$fontWeight = cocktail_core_style_FontWeight::$css500;
		}break;
		case "600":{
			$fontWeight = cocktail_core_style_FontWeight::$css600;
		}break;
		case "700":{
			$fontWeight = cocktail_core_style_FontWeight::$css700;
		}break;
		case "800":{
			$fontWeight = cocktail_core_style_FontWeight::$css800;
		}break;
		case "900":{
			$fontWeight = cocktail_core_style_FontWeight::$css900;
		}break;
		default:{
			$fontWeight = null;
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $fontWeight;
		}
		$GLOBALS['%s']->pop();
	}
	static function fontStyleEnum($string) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::fontStyleEnum");
		$»spos = $GLOBALS['%s']->length;
		$parsed = cocktail_core_unit_UnitManager::trim($string);
		$fontStyle = null;
		switch($parsed) {
		case "italic":{
			$fontStyle = cocktail_core_style_FontStyle::$italic;
		}break;
		case "normal":{
			$fontStyle = cocktail_core_style_FontStyle::$normal;
		}break;
		case "oblique":{
			$fontStyle = cocktail_core_style_FontStyle::$oblique;
		}break;
		default:{
			$fontStyle = null;
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $fontStyle;
		}
		$GLOBALS['%s']->pop();
	}
	static function fontVariantEnum($string) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::fontVariantEnum");
		$»spos = $GLOBALS['%s']->length;
		$parsed = cocktail_core_unit_UnitManager::trim($string);
		$fontVariant = null;
		switch($parsed) {
		case "normal":{
			$fontVariant = cocktail_core_style_FontVariant::$normal;
		}break;
		case "small-caps":{
			$fontVariant = cocktail_core_style_FontVariant::$smallCaps;
		}break;
		default:{
			$fontVariant = null;
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $fontVariant;
		}
		$GLOBALS['%s']->pop();
	}
	static function textTransformEnum($string) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::textTransformEnum");
		$»spos = $GLOBALS['%s']->length;
		$parsed = cocktail_core_unit_UnitManager::trim($string);
		$textTransform = null;
		switch($parsed) {
		case "capitalize":{
			$textTransform = cocktail_core_style_TextTransform::$capitalize;
		}break;
		case "lowercase":{
			$textTransform = cocktail_core_style_TextTransform::$lowercase;
		}break;
		case "uppercase":{
			$textTransform = cocktail_core_style_TextTransform::$uppercase;
		}break;
		case "none":{
			$textTransform = cocktail_core_style_TextTransform::$none;
		}break;
		default:{
			$textTransform = null;
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $textTransform;
		}
		$GLOBALS['%s']->pop();
	}
	static function visibilityEnum($string) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::visibilityEnum");
		$»spos = $GLOBALS['%s']->length;
		$parsed = cocktail_core_unit_UnitManager::trim($string);
		$visibility = null;
		switch($parsed) {
		case "hidden":{
			$visibility = cocktail_core_style_Visibility::$hidden;
		}break;
		case "visible":{
			$visibility = cocktail_core_style_Visibility::$visible;
		}break;
		default:{
			$visibility = null;
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $visibility;
		}
		$GLOBALS['%s']->pop();
	}
	static function cursorEnum($string) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::cursorEnum");
		$»spos = $GLOBALS['%s']->length;
		$parsed = cocktail_core_unit_UnitManager::trim($string);
		$cursor = null;
		switch($parsed) {
		case "auto":{
			$cursor = cocktail_core_style_Cursor::$cssAuto;
		}break;
		case "crosshair":{
			$cursor = cocktail_core_style_Cursor::$crosshair;
		}break;
		case "pointer":{
			$cursor = cocktail_core_style_Cursor::$pointer;
		}break;
		case "default":{
			$cursor = cocktail_core_style_Cursor::$cssDefault;
		}break;
		default:{
			$cursor = null;
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $cursor;
		}
		$GLOBALS['%s']->pop();
	}
	static function wordSpacingEnum($string) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::wordSpacingEnum");
		$»spos = $GLOBALS['%s']->length;
		if($string === "normal") {
			$»tmp = cocktail_core_style_WordSpacing::$normal;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$parsed = cocktail_core_unit_UnitManager::string2VUnit($string);
		$wordSpacing = null;
		switch($parsed->unit) {
		case "%":{
			$wordSpacing = null;
		}break;
		default:{
			$wordSpacing = cocktail_core_style_WordSpacing::length(cocktail_core_unit_UnitManager::string2Length($parsed));
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $wordSpacing;
		}
		$GLOBALS['%s']->pop();
	}
	static function backgroundImageEnum($string) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::backgroundImageEnum");
		$»spos = $GLOBALS['%s']->length;
		if($string === "none") {
			$»tmp = new _hx_array(array(cocktail_core_style_BackgroundImage::$none));
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$array = cocktail_core_unit_UnitManager::string2VList($string, ",");
		$arrayBgImg = new _hx_array(array());
		{
			$_g = 0;
			while($_g < $array->length) {
				$val = $array[$_g];
				++$_g;
				if($val === "none") {
					$arrayBgImg->push(cocktail_core_style_BackgroundImage::$none);
				} else {
					$arrayBgImg->push(cocktail_core_style_BackgroundImage::image(cocktail_core_unit_ImageValue::url(cocktail_core_unit_UnitManager::string2URLData($val))));
				}
				unset($val);
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $arrayBgImg;
		}
		$GLOBALS['%s']->pop();
	}
	static function backgroundRepeatEnum($string) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::backgroundRepeatEnum");
		$»spos = $GLOBALS['%s']->length;
		$parsed = cocktail_core_unit_UnitManager::trim($string);
		$backgroundRepeat = null;
		switch($parsed) {
		case "repeat":{
			$backgroundRepeat = _hx_anonymous(array("x" => cocktail_core_style_BackgroundRepeatValue::$repeat, "y" => cocktail_core_style_BackgroundRepeatValue::$repeat));
		}break;
		case "repeat-x":{
			$backgroundRepeat = _hx_anonymous(array("x" => cocktail_core_style_BackgroundRepeatValue::$repeat, "y" => cocktail_core_style_BackgroundRepeatValue::$noRepeat));
		}break;
		case "repeat-y":{
			$backgroundRepeat = _hx_anonymous(array("x" => cocktail_core_style_BackgroundRepeatValue::$noRepeat, "y" => cocktail_core_style_BackgroundRepeatValue::$repeat));
		}break;
		case "no-repeat":{
			$backgroundRepeat = _hx_anonymous(array("x" => cocktail_core_style_BackgroundRepeatValue::$noRepeat, "y" => cocktail_core_style_BackgroundRepeatValue::$noRepeat));
		}break;
		default:{
			$backgroundRepeat = null;
		}break;
		}
		{
			$»tmp = new _hx_array(array($backgroundRepeat));
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function backgroundOriginEnum($string) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::backgroundOriginEnum");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = new _hx_array(array());
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function backgroundSizeEnum($string) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::backgroundSizeEnum");
		$»spos = $GLOBALS['%s']->length;
		$string = cocktail_core_unit_UnitManager::trim($string);
		if($string === "contain") {
			$»tmp = new _hx_array(array(cocktail_core_style_BackgroundSize::$contain));
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		if($string === "cover") {
			$»tmp = new _hx_array(array(cocktail_core_style_BackgroundSize::$cover));
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$backgroundSizes = _hx_explode(" ", $string);
		$backgroundsizeX = null;
		switch($backgroundSizes[0]) {
		case "auto":{
			$backgroundsizeX = cocktail_core_style_BackgroundSizeDimension::$cssAuto;
		}break;
		default:{
			$parsedBackgroundsizeX = cocktail_core_unit_UnitManager::string2VUnit($backgroundSizes[0]);
			switch($parsedBackgroundsizeX->unit) {
			case "%":{
				$backgroundsizeX = cocktail_core_style_BackgroundSizeDimension::percent(Std::parseInt($parsedBackgroundsizeX->value));
			}break;
			default:{
				$backgroundsizeX = cocktail_core_style_BackgroundSizeDimension::length(cocktail_core_unit_UnitManager::string2Length($parsedBackgroundsizeX));
			}break;
			}
		}break;
		}
		$backgroundsizeY = null;
		switch($backgroundSizes[1]) {
		case "auto":{
			$backgroundsizeY = cocktail_core_style_BackgroundSizeDimension::$cssAuto;
		}break;
		default:{
			$parsedBackgroundsizeY = cocktail_core_unit_UnitManager::string2VUnit($backgroundSizes[0]);
			switch($parsedBackgroundsizeY->unit) {
			case "%":{
				$backgroundsizeY = cocktail_core_style_BackgroundSizeDimension::percent(Std::parseInt($parsedBackgroundsizeY->value));
			}break;
			default:{
				$backgroundsizeY = cocktail_core_style_BackgroundSizeDimension::length(cocktail_core_unit_UnitManager::string2Length($parsedBackgroundsizeY));
			}break;
			}
		}break;
		}
		{
			$»tmp = new _hx_array(array(cocktail_core_style_BackgroundSize::dimensions(_hx_anonymous(array("x" => $backgroundsizeX, "y" => $backgroundsizeY)))));
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function backgroundPositionEnum($string) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::backgroundPositionEnum");
		$»spos = $GLOBALS['%s']->length;
		if($string === null) {
			$»tmp = cocktail_core_style_CoreStyle::getBackgroundPositionDefaultValue();
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$backgroundPositions = _hx_explode(" ", $string);
		$backgroundPositionX = null;
		switch($backgroundPositions[0]) {
		case "left":{
			$backgroundPositionX = cocktail_core_style_BackgroundPositionX::$left;
		}break;
		case "center":{
			$backgroundPositionX = cocktail_core_style_BackgroundPositionX::$center;
		}break;
		case "right":{
			$backgroundPositionX = cocktail_core_style_BackgroundPositionX::$right;
		}break;
		default:{
			$parsedBgPosX = cocktail_core_unit_UnitManager::string2VUnit($backgroundPositions[0]);
			switch($parsedBgPosX->unit) {
			case "%":{
				$backgroundPositionX = cocktail_core_style_BackgroundPositionX::percent(Std::parseInt($parsedBgPosX->value));
			}break;
			default:{
				$backgroundPositionX = cocktail_core_style_BackgroundPositionX::length(cocktail_core_unit_UnitManager::string2Length($parsedBgPosX));
			}break;
			}
		}break;
		}
		$backgroundPositionY = null;
		switch($backgroundPositions[1]) {
		case "top":{
			$backgroundPositionY = cocktail_core_style_BackgroundPositionY::$top;
		}break;
		case "center":{
			$backgroundPositionY = cocktail_core_style_BackgroundPositionY::$center;
		}break;
		case "bottom":{
			$backgroundPositionY = cocktail_core_style_BackgroundPositionY::$bottom;
		}break;
		default:{
			$parsedBgPosY = cocktail_core_unit_UnitManager::string2VUnit($backgroundPositions[1]);
			switch($parsedBgPosY->unit) {
			case "%":{
				$backgroundPositionY = cocktail_core_style_BackgroundPositionY::percent(Std::parseInt($parsedBgPosY->value));
			}break;
			default:{
				$backgroundPositionY = cocktail_core_style_BackgroundPositionY::length(cocktail_core_unit_UnitManager::string2Length($parsedBgPosY));
			}break;
			}
		}break;
		}
		{
			$»tmp = new _hx_array(array(_hx_anonymous(array("x" => $backgroundPositionX, "y" => $backgroundPositionY))));
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function backgroundClipEnum($string) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::backgroundClipEnum");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = new _hx_array(array());
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function fontFamilyEnum($string) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::fontFamilyEnum");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = cocktail_core_unit_UnitManager::string2Array($string);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function letterSpacingEnum($string) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::letterSpacingEnum");
		$»spos = $GLOBALS['%s']->length;
		if($string === "normal") {
			$»tmp = cocktail_core_style_LetterSpacing::$normal;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$parsed = cocktail_core_unit_UnitManager::string2VUnit($string);
		$letterSpacing = null;
		switch($parsed->unit) {
		case "%":{
			$letterSpacing = null;
		}break;
		default:{
			$letterSpacing = cocktail_core_style_LetterSpacing::length(cocktail_core_unit_UnitManager::string2Length($parsed));
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $letterSpacing;
		}
		$GLOBALS['%s']->pop();
	}
	static function lineHeightEnum($string) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::lineHeightEnum");
		$»spos = $GLOBALS['%s']->length;
		if($string === "normal") {
			$»tmp = cocktail_core_style_LineHeight::$normal;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$parsed = cocktail_core_unit_UnitManager::string2VUnit($string);
		$lineHeight = null;
		switch($parsed->unit) {
		case "%":{
			$lineHeight = cocktail_core_style_LineHeight::percentage(Std::parseInt($parsed->value));
		}break;
		default:{
			$lineHeight = cocktail_core_style_LineHeight::length(cocktail_core_unit_UnitManager::string2Length($parsed));
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $lineHeight;
		}
		$GLOBALS['%s']->pop();
	}
	static function textIndentEnum($string) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::textIndentEnum");
		$»spos = $GLOBALS['%s']->length;
		$parsed = cocktail_core_unit_UnitManager::string2VUnit($string);
		$textIndent = null;
		switch($parsed->unit) {
		case "%":{
			$textIndent = cocktail_core_style_TextIndent::percentage(Std::parseInt($parsed->value));
		}break;
		default:{
			$textIndent = cocktail_core_style_TextIndent::length(cocktail_core_unit_UnitManager::string2Length($parsed));
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $textIndent;
		}
		$GLOBALS['%s']->pop();
	}
	static function cssFloatEnum($string) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::cssFloatEnum");
		$»spos = $GLOBALS['%s']->length;
		$parsed = cocktail_core_unit_UnitManager::trim($string);
		$cssFloat = null;
		switch($parsed) {
		case "left":{
			$cssFloat = cocktail_core_style_CSSFloat::$left;
		}break;
		case "right":{
			$cssFloat = cocktail_core_style_CSSFloat::$right;
		}break;
		case "none":{
			$cssFloat = cocktail_core_style_CSSFloat::$none;
		}break;
		default:{
			$cssFloat = null;
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $cssFloat;
		}
		$GLOBALS['%s']->pop();
	}
	static function colorEnum($string) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::colorEnum");
		$»spos = $GLOBALS['%s']->length;
		if($string === null) {
			$»tmp = cocktail_core_style_CoreStyle::getColorDefaultValue();
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$string = cocktail_core_unit_UnitManager::trim($string);
		if(StringTools::startsWith($string, "#")) {
			$»tmp = cocktail_core_unit_CSSColor::hex($string);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		if(StringTools::startsWith($string, "rgba")) {
			$vcol = cocktail_core_unit_UnitManager::string2RGBA($string);
			{
				$»tmp = cocktail_core_unit_CSSColor::rgba($vcol->r, $vcol->g, $vcol->b, $vcol->a);
				$GLOBALS['%s']->pop();
				return $»tmp;
			}
		}
		if(StringTools::startsWith($string, "rgb")) {
			$vcol = cocktail_core_unit_UnitManager::string2RGB($string);
			{
				$»tmp = cocktail_core_unit_CSSColor::rgb($vcol->r, $vcol->g, $vcol->b);
				$GLOBALS['%s']->pop();
				return $»tmp;
			}
		}
		{
			$»tmp = cocktail_core_unit_UnitManager_1($string);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function string2RGBA($string) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::string2RGBA");
		$»spos = $GLOBALS['%s']->length;
		$string = _hx_substr($string, 5, strlen($string) - 6);
		$rgba = _hx_explode(",", $string);
		while($rgba->length < 4) {
			$rgba->push("0");
		}
		{
			$»tmp = _hx_anonymous(array("r" => Std::parseInt(cocktail_core_unit_UnitManager::trim($rgba[0])), "g" => Std::parseInt(cocktail_core_unit_UnitManager::trim($rgba[1])), "b" => Std::parseInt(cocktail_core_unit_UnitManager::trim($rgba[2])), "a" => Std::parseFloat(cocktail_core_unit_UnitManager::trim($rgba[3]))));
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function string2RGB($string) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::string2RGB");
		$»spos = $GLOBALS['%s']->length;
		$string = _hx_substr($string, 4, strlen($string) - 5);
		$rgba = _hx_explode(",", $string);
		while($rgba->length < 3) {
			$rgba->push("0");
		}
		{
			$»tmp = _hx_anonymous(array("r" => Std::parseInt(cocktail_core_unit_UnitManager::trim($rgba[0])), "g" => Std::parseInt(cocktail_core_unit_UnitManager::trim($rgba[1])), "b" => Std::parseInt(cocktail_core_unit_UnitManager::trim($rgba[2])), "a" => null));
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function trim($string) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::trim");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = ltrim(rtrim($string));
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function string2VUnit($string) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::string2VUnit");
		$»spos = $GLOBALS['%s']->length;
		$r = new EReg("^(-?[0-9]+\\.?[0-9]*)(.*)", "");
		$r->match($string);
		{
			$»tmp = _hx_anonymous(array("value" => $r->matched(1), "unit" => cocktail_core_unit_UnitManager::trim($r->matched(2))));
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function string2TimeValue($string) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::string2TimeValue");
		$»spos = $GLOBALS['%s']->length;
		$string = cocktail_core_unit_UnitManager::trim($string);
		$ts = 0;
		$tms = 0;
		$tv = null;
		$r = new EReg("^([0-9\\.]+)(ms|s)\$", "");
		$r->match($string);
		if($r->matched(2) === "s") {
			$tv = cocktail_core_unit_TimeValue::seconds(Std::parseFloat($r->matched(1)));
		} else {
			$tv = cocktail_core_unit_TimeValue::milliSeconds(Std::parseFloat($r->matched(1)));
		}
		{
			$GLOBALS['%s']->pop();
			return $tv;
		}
		$GLOBALS['%s']->pop();
	}
	static function string2Length($parsed) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::string2Length");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = cocktail_core_unit_UnitManager_2($parsed);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function string2URLData($string) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::string2URLData");
		$»spos = $GLOBALS['%s']->length;
		$string = cocktail_core_unit_UnitManager::trim($string);
		$string = cocktail_core_unit_UnitManager::trim(_hx_substr($string, 4, strlen($string) - 5));
		if(StringTools::startsWith($string, "\"")) {
			$string = _hx_substr($string, 1, null);
		}
		if(StringTools::endsWith($string, "\"")) {
			$string = _hx_substr($string, 0, strlen($string) - 1);
		}
		if(StringTools::startsWith($string, "'")) {
			$string = _hx_substr($string, 1, null);
		}
		if(StringTools::endsWith($string, "'")) {
			$string = _hx_substr($string, 0, strlen($string) - 1);
		}
		{
			$GLOBALS['%s']->pop();
			return $string;
		}
		$GLOBALS['%s']->pop();
	}
	static function string2VList($string, $sep = null) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::string2VList");
		$»spos = $GLOBALS['%s']->length;
		if($sep === null) {
			$sep = " ";
		}
		if($sep === " ") {
			$string = _hx_deref(new EReg("[ ]{2,}", "g"))->replace($string, " ");
		} else {
			$string = str_replace(" ", "", $string);
		}
		$string = cocktail_core_unit_UnitManager::trim($string);
		$array = _hx_explode($sep, $string);
		{
			$GLOBALS['%s']->pop();
			return $array;
		}
		$GLOBALS['%s']->pop();
	}
	static function string2Array($string) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::string2Array");
		$»spos = $GLOBALS['%s']->length;
		$r = new EReg("[ \"]*[,\"][ \"]*", "g");
		$res = $r->split($string);
		if($res[0] === "") {
			$res->shift();
		}
		{
			$GLOBALS['%s']->pop();
			return $res;
		}
		$GLOBALS['%s']->pop();
	}
	static function getPixelFromLength($length, $emReference, $exReference) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::getPixelFromLength");
		$»spos = $GLOBALS['%s']->length;
		$lengthValue = null;
		$»t = ($length);
		switch($»t->index) {
		case 0:
		$value = $»t->params[0];
		{
			$lengthValue = $value;
		}break;
		case 2:
		$value = $»t->params[0];
		{
			$lengthValue = $value * (72 * (1 / 0.75) / 2.54) / 10;
		}break;
		case 1:
		$value = $»t->params[0];
		{
			$lengthValue = $value * (72 * (1 / 0.75) / 2.54);
		}break;
		case 3:
		$value = $»t->params[0];
		{
			$lengthValue = $value / 0.75;
		}break;
		case 5:
		$value = $»t->params[0];
		{
			$lengthValue = $value * (72 * (1 / 0.75));
		}break;
		case 4:
		$value = $»t->params[0];
		{
			$lengthValue = $value * (12 * (1 / 0.75));
		}break;
		case 6:
		$value = $»t->params[0];
		{
			$lengthValue = $emReference * $value;
		}break;
		case 7:
		$value = $»t->params[0];
		{
			$lengthValue = $exReference * $value;
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $lengthValue;
		}
		$GLOBALS['%s']->pop();
	}
	static function getFontSizeFromAbsoluteSizeValue($absoluteSize) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::getFontSizeFromAbsoluteSizeValue");
		$»spos = $GLOBALS['%s']->length;
		$fontSize = null;
		$mediumFontSize = 16;
		$»t = ($absoluteSize);
		switch($»t->index) {
		case 0:
		{
			$fontSize = 9;
		}break;
		case 1:
		{
			$fontSize = 10;
		}break;
		case 2:
		{
			$fontSize = 13;
		}break;
		case 3:
		{
			$fontSize = 16;
		}break;
		case 4:
		{
			$fontSize = 18;
		}break;
		case 5:
		{
			$fontSize = 24;
		}break;
		case 6:
		{
			$fontSize = 32;
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $fontSize;
		}
		$GLOBALS['%s']->pop();
	}
	static function getFontSizeFromRelativeSizeValue($relativeSize, $parentFontSize) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::getFontSizeFromRelativeSizeValue");
		$»spos = $GLOBALS['%s']->length;
		$fontSize = null;
		$»t = ($relativeSize);
		switch($»t->index) {
		case 0:
		{
			$fontSize = cocktail_core_unit_UnitManager::getLargerFontSize($parentFontSize);
		}break;
		case 1:
		{
			$fontSize = cocktail_core_unit_UnitManager::getSmallerFontSize($parentFontSize);
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $fontSize;
		}
		$GLOBALS['%s']->pop();
	}
	static function getPixelFromPercent($percent, $reference) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::getPixelFromPercent");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $reference * ($percent * 0.01);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function getPercentFromPixel($pixel, $reference) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::getPercentFromPixel");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $reference / $pixel * 100;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function getColorDataFromCSSColor($value) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::getColorDataFromCSSColor");
		$»spos = $GLOBALS['%s']->length;
		$colorValue = null;
		$alphaValue = null;
		$»t = ($value);
		switch($»t->index) {
		case 0:
		$blue = $»t->params[2]; $green = $»t->params[1]; $red = $»t->params[0];
		{
			$colorValue = $red;
			$colorValue = ($colorValue << 8) + $green;
			$colorValue = ($colorValue << 8) + $blue;
			$alphaValue = 1.0;
		}break;
		case 1:
		$alpha = $»t->params[3]; $blue = $»t->params[2]; $green = $»t->params[1]; $red = $»t->params[0];
		{
			$colorValue = $red;
			$colorValue = ($colorValue << 8) + $green;
			$colorValue = ($colorValue << 8) + $blue;
			$alphaValue = $alpha;
		}break;
		case 2:
		$value1 = $»t->params[0];
		{
			$colorValue = Std::parseInt(str_replace("#", "0x", $value1));
			$alphaValue = 1.0;
		}break;
		case 3:
		$value1 = $»t->params[0];
		{
			$colorValue = cocktail_core_unit_UnitManager::getColorDataFromColorKeyword($value1)->color;
			$alphaValue = 1.0;
		}break;
		case 4:
		{
			$colorValue = 16777215;
			$alphaValue = 0.0;
		}break;
		}
		$colorData = _hx_anonymous(array("color" => $colorValue, "alpha" => $alphaValue));
		{
			$GLOBALS['%s']->pop();
			return $colorData;
		}
		$GLOBALS['%s']->pop();
	}
	static function getRadFromAngle($value) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::getRadFromAngle");
		$»spos = $GLOBALS['%s']->length;
		$angle = null;
		$»t = ($value);
		switch($»t->index) {
		case 0:
		$value1 = $»t->params[0];
		{
			$angle = $value1 * (Math::$PI / 180);
		}break;
		case 2:
		$value1 = $»t->params[0];
		{
			$angle = $value1;
		}break;
		case 3:
		$value1 = $»t->params[0];
		{
			$angle = $value1 * 360 * (Math::$PI / 180);
		}break;
		case 1:
		$value1 = $»t->params[0];
		{
			$angle = $value1 * (Math::$PI / 200);
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $angle;
		}
		$GLOBALS['%s']->pop();
	}
	static function getDegreeFromAngle($value) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::getDegreeFromAngle");
		$»spos = $GLOBALS['%s']->length;
		$angle = null;
		$»t = ($value);
		switch($»t->index) {
		case 0:
		$value1 = $»t->params[0];
		{
			$angle = $value1;
		}break;
		case 2:
		$value1 = $»t->params[0];
		{
			$angle = $value1 * (180 / Math::$PI);
		}break;
		case 3:
		$value1 = $»t->params[0];
		{
			$angle = $value1 * 360;
		}break;
		case 1:
		$value1 = $»t->params[0];
		{
			$angle = $value1 * 0.9;
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $angle;
		}
		$GLOBALS['%s']->pop();
	}
	static function getColorDataFromColorKeyword($value) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::getColorDataFromColorKeyword");
		$»spos = $GLOBALS['%s']->length;
		$hexColor = null;
		$»t = ($value);
		switch($»t->index) {
		case 0:
		{
			$hexColor = "#00FFFF";
		}break;
		case 1:
		{
			$hexColor = "#000000";
		}break;
		case 2:
		{
			$hexColor = "#0000FF";
		}break;
		case 3:
		{
			$hexColor = "#FF00FF";
		}break;
		case 4:
		{
			$hexColor = "#808080";
		}break;
		case 5:
		{
			$hexColor = "#008000";
		}break;
		case 6:
		{
			$hexColor = "#00FF00";
		}break;
		case 7:
		{
			$hexColor = "#800000";
		}break;
		case 8:
		{
			$hexColor = "#000080";
		}break;
		case 9:
		{
			$hexColor = "#808000";
		}break;
		case 10:
		{
			$hexColor = "#FFA500";
		}break;
		case 11:
		{
			$hexColor = "#800080";
		}break;
		case 12:
		{
			$hexColor = "#FF0000";
		}break;
		case 13:
		{
			$hexColor = "#C0C0C0";
		}break;
		case 14:
		{
			$hexColor = "#008080";
		}break;
		case 15:
		{
			$hexColor = "#FFFFFF";
		}break;
		case 16:
		{
			$hexColor = "#FFFF00";
		}break;
		}
		{
			$»tmp = cocktail_core_unit_UnitManager::getColorDataFromCSSColor(cocktail_core_unit_CSSColor::hex($hexColor));
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function getLargerFontSize($parentFontSize) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::getLargerFontSize");
		$»spos = $GLOBALS['%s']->length;
		$fontSizeTable = new _hx_array(array(9, 10, 13, 16, 18, 24, 32));
		$fontSize = $fontSizeTable[$fontSizeTable->length - 1];
		{
			$_g1 = 0; $_g = $fontSizeTable->length;
			while($_g1 < $_g) {
				$i = $_g1++;
				if($fontSizeTable->»a[$i] > $parentFontSize) {
					$fontSize = $fontSizeTable[$i];
					break;
				}
				unset($i);
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $fontSize;
		}
		$GLOBALS['%s']->pop();
	}
	static function getSmallerFontSize($parentFontSize) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::getSmallerFontSize");
		$»spos = $GLOBALS['%s']->length;
		$fontSizeTable = new _hx_array(array(9, 10, 13, 16, 18, 24, 32));
		$fontSize = $fontSizeTable[0];
		$i = $fontSizeTable->length - 1;
		while($i > 0) {
			if($fontSizeTable->»a[$i] < $parentFontSize) {
				$fontSize = $fontSizeTable[$i];
				break;
			}
			$i--;
		}
		{
			$GLOBALS['%s']->pop();
			return $fontSize;
		}
		$GLOBALS['%s']->pop();
	}
	static function getCSSDisplay($value) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::getCSSDisplay");
		$»spos = $GLOBALS['%s']->length;
		$cssDisplayValue = null;
		$»t = ($value);
		switch($»t->index) {
		case 0:
		{
			$cssDisplayValue = "block";
		}break;
		case 2:
		{
			$cssDisplayValue = "inline";
		}break;
		case 1:
		{
			$cssDisplayValue = "inline-block";
		}break;
		case 3:
		{
			$cssDisplayValue = "none";
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $cssDisplayValue;
		}
		$GLOBALS['%s']->pop();
	}
	static function getCSSFloatAsString($value) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::getCSSFloatAsString");
		$»spos = $GLOBALS['%s']->length;
		$cssCSSFloat = null;
		$»t = ($value);
		switch($»t->index) {
		case 0:
		{
			$cssCSSFloat = "left";
		}break;
		case 1:
		{
			$cssCSSFloat = "right";
		}break;
		case 2:
		{
			$cssCSSFloat = "none";
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $cssCSSFloat;
		}
		$GLOBALS['%s']->pop();
	}
	static function getCSSClear($value) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::getCSSClear");
		$»spos = $GLOBALS['%s']->length;
		$cssClearValue = null;
		$»t = ($value);
		switch($»t->index) {
		case 1:
		{
			$cssClearValue = "left";
		}break;
		case 2:
		{
			$cssClearValue = "right";
		}break;
		case 3:
		{
			$cssClearValue = "both";
		}break;
		case 0:
		{
			$cssClearValue = "none";
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $cssClearValue;
		}
		$GLOBALS['%s']->pop();
	}
	static function getCSSZIndex($value) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::getCSSZIndex");
		$»spos = $GLOBALS['%s']->length;
		$cssZIndexValue = null;
		$»t = ($value);
		switch($»t->index) {
		case 0:
		{
			$cssZIndexValue = "auto";
		}break;
		case 1:
		$value1 = $»t->params[0];
		{
			$cssZIndexValue = Std::string($value1);
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $cssZIndexValue;
		}
		$GLOBALS['%s']->pop();
	}
	static function getCSSPosition($value) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::getCSSPosition");
		$»spos = $GLOBALS['%s']->length;
		$cssPositionValue = null;
		$»t = ($value);
		switch($»t->index) {
		case 0:
		{
			$cssPositionValue = "static";
		}break;
		case 1:
		{
			$cssPositionValue = "relative";
		}break;
		case 2:
		{
			$cssPositionValue = "absolute";
		}break;
		case 3:
		{
			$cssPositionValue = "fixed";
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $cssPositionValue;
		}
		$GLOBALS['%s']->pop();
	}
	static function getCSSOverflow($value) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::getCSSOverflow");
		$»spos = $GLOBALS['%s']->length;
		$cssOverflowValue = null;
		$»t = ($value);
		switch($»t->index) {
		case 0:
		{
			$cssOverflowValue = "visible";
		}break;
		case 1:
		{
			$cssOverflowValue = "hidden";
		}break;
		case 2:
		{
			$cssOverflowValue = "scroll";
		}break;
		case 3:
		{
			$cssOverflowValue = "auto";
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $cssOverflowValue;
		}
		$GLOBALS['%s']->pop();
	}
	static function getCSSOpacity($value) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::getCSSOpacity");
		$»spos = $GLOBALS['%s']->length;
		$cssOpacityValue = null;
		$cssOpacityValue = Std::string($value);
		{
			$GLOBALS['%s']->pop();
			return $cssOpacityValue;
		}
		$GLOBALS['%s']->pop();
	}
	static function getCSSVisibility($value) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::getCSSVisibility");
		$»spos = $GLOBALS['%s']->length;
		$cssVisibilityValue = null;
		$»t = ($value);
		switch($»t->index) {
		case 0:
		{
			$cssVisibilityValue = "visible";
		}break;
		case 1:
		{
			$cssVisibilityValue = "hidden";
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $cssVisibilityValue;
		}
		$GLOBALS['%s']->pop();
	}
	static function getCSSTransform($value) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::getCSSTransform");
		$»spos = $GLOBALS['%s']->length;
		$cssTransformValue = null;
		$»t = ($value);
		switch($»t->index) {
		case 0:
		{
			$cssTransformValue = "none";
		}break;
		case 1:
		$value1 = $»t->params[0];
		{
			$cssTransformValue = "";
			{
				$_g1 = 0; $_g = $value1->length;
				while($_g1 < $_g) {
					$i = $_g1++;
					$cssTransformValue .= cocktail_core_unit_UnitManager::getCSSTransformFunction($value1[$i]);
					if($i < $value1->length - 1) {
						$cssTransformValue .= " ";
					}
					unset($i);
				}
			}
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $cssTransformValue;
		}
		$GLOBALS['%s']->pop();
	}
	static function getCSSTransformFunction($transformFunction) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::getCSSTransformFunction");
		$»spos = $GLOBALS['%s']->length;
		$cssTransformFunction = null;
		$»t = ($transformFunction);
		switch($»t->index) {
		case 0:
		$value = $»t->params[0];
		{
			$cssTransformFunction = "matrix(" . _hx_string_rec($value->a, "") . "," . _hx_string_rec($value->b, "") . "," . _hx_string_rec($value->c, "") . "," . _hx_string_rec($value->d, "") . "," . _hx_string_rec($value->e, "") . "," . _hx_string_rec($value->f, "") . ")";
		}break;
		case 7:
		$angle = $»t->params[0];
		{
			$cssTransformFunction = "rotate(" . cocktail_core_unit_UnitManager::getCSSAngle($angle) . ")";
		}break;
		case 4:
		$sy = $»t->params[1]; $sx = $»t->params[0];
		{
			$cssTransformFunction = "scale(" . _hx_string_rec($sx, "") . "," . _hx_string_rec($sy, "") . ")";
		}break;
		case 5:
		$sx = $»t->params[0];
		{
			$cssTransformFunction = "scaleX(" . _hx_string_rec($sx, "") . ")";
		}break;
		case 6:
		$sy = $»t->params[0];
		{
			$cssTransformFunction = "scaleY(" . _hx_string_rec($sy, "") . ")";
		}break;
		case 10:
		$skewY = $»t->params[1]; $skewX = $»t->params[0];
		{
			$cssTransformFunction = "skew(" . cocktail_core_unit_UnitManager::getCSSAngle($skewX) . "," . cocktail_core_unit_UnitManager::getCSSAngle($skewY) . ")";
		}break;
		case 8:
		$skewX = $»t->params[0];
		{
			$cssTransformFunction = "skewX(" . cocktail_core_unit_UnitManager::getCSSAngle($skewX) . ")";
		}break;
		case 9:
		$skewY = $»t->params[0];
		{
			$cssTransformFunction = "skewY(" . cocktail_core_unit_UnitManager::getCSSAngle($skewY) . ")";
		}break;
		case 1:
		$ty = $»t->params[1]; $tx = $»t->params[0];
		{
			$cssTransformFunction = "translate(" . cocktail_core_unit_UnitManager::getCSSTranslation($tx) . "," . cocktail_core_unit_UnitManager::getCSSTranslation($ty) . ")";
		}break;
		case 2:
		$tx = $»t->params[0];
		{
			$cssTransformFunction = "translateX(" . cocktail_core_unit_UnitManager::getCSSTranslation($tx) . ")";
		}break;
		case 3:
		$ty = $»t->params[0];
		{
			$cssTransformFunction = "translateY(" . cocktail_core_unit_UnitManager::getCSSTranslation($ty) . ")";
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $cssTransformFunction;
		}
		$GLOBALS['%s']->pop();
	}
	static function getCSSTranslation($translation) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::getCSSTranslation");
		$»spos = $GLOBALS['%s']->length;
		$cssTranslation = null;
		$»t = ($translation);
		switch($»t->index) {
		case 0:
		$value = $»t->params[0];
		{
			$cssTranslation = cocktail_core_unit_UnitManager::getCSSLength($value);
		}break;
		case 1:
		$value = $»t->params[0];
		{
			$cssTranslation = cocktail_core_unit_UnitManager::getCSSPercentValue($value);
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $cssTranslation;
		}
		$GLOBALS['%s']->pop();
	}
	static function getCSSTransformOrigin($value) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::getCSSTransformOrigin");
		$»spos = $GLOBALS['%s']->length;
		$cssTransformOriginValue = null;
		$»t = ($value->x);
		switch($»t->index) {
		case 0:
		$value1 = $»t->params[0];
		{
			$cssTransformOriginValue = cocktail_core_unit_UnitManager::getCSSLength($value1);
		}break;
		case 1:
		$value1 = $»t->params[0];
		{
			$cssTransformOriginValue = cocktail_core_unit_UnitManager::getCSSPercentValue($value1);
		}break;
		case 2:
		{
			$cssTransformOriginValue = "left";
		}break;
		case 3:
		{
			$cssTransformOriginValue = "center";
		}break;
		case 4:
		{
			$cssTransformOriginValue = "right";
		}break;
		}
		$cssTransformOriginValue .= " ";
		$»t = ($value->y);
		switch($»t->index) {
		case 0:
		$value1 = $»t->params[0];
		{
			$cssTransformOriginValue .= cocktail_core_unit_UnitManager::getCSSLength($value1);
		}break;
		case 1:
		$value1 = $»t->params[0];
		{
			$cssTransformOriginValue .= cocktail_core_unit_UnitManager::getCSSPercentValue($value1);
		}break;
		case 2:
		{
			$cssTransformOriginValue .= "top";
		}break;
		case 3:
		{
			$cssTransformOriginValue .= "center";
		}break;
		case 4:
		{
			$cssTransformOriginValue .= "bottom";
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $cssTransformOriginValue;
		}
		$GLOBALS['%s']->pop();
	}
	static function getCSSMargin($value) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::getCSSMargin");
		$»spos = $GLOBALS['%s']->length;
		$cssMarginValue = null;
		$»t = ($value);
		switch($»t->index) {
		case 0:
		$unit = $»t->params[0];
		{
			$cssMarginValue = cocktail_core_unit_UnitManager::getCSSLength($unit);
		}break;
		case 1:
		$percentValue = $»t->params[0];
		{
			$cssMarginValue = cocktail_core_unit_UnitManager::getCSSPercentValue($percentValue);
		}break;
		case 2:
		{
			$cssMarginValue = "auto";
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $cssMarginValue;
		}
		$GLOBALS['%s']->pop();
	}
	static function getCSSPadding($value) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::getCSSPadding");
		$»spos = $GLOBALS['%s']->length;
		$cssPaddingValue = null;
		$»t = ($value);
		switch($»t->index) {
		case 0:
		$unit = $»t->params[0];
		{
			$cssPaddingValue = cocktail_core_unit_UnitManager::getCSSLength($unit);
		}break;
		case 1:
		$percentValue = $»t->params[0];
		{
			$cssPaddingValue = cocktail_core_unit_UnitManager::getCSSPercentValue($percentValue);
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $cssPaddingValue;
		}
		$GLOBALS['%s']->pop();
	}
	static function getCSSDimension($value) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::getCSSDimension");
		$»spos = $GLOBALS['%s']->length;
		$cssDimensionValue = null;
		$»t = ($value);
		switch($»t->index) {
		case 0:
		$unit = $»t->params[0];
		{
			$cssDimensionValue = cocktail_core_unit_UnitManager::getCSSLength($unit);
		}break;
		case 1:
		$percentValue = $»t->params[0];
		{
			$cssDimensionValue = cocktail_core_unit_UnitManager::getCSSPercentValue($percentValue);
		}break;
		case 2:
		{
			$cssDimensionValue = "auto";
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $cssDimensionValue;
		}
		$GLOBALS['%s']->pop();
	}
	static function getCSSPositionOffset($value) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::getCSSPositionOffset");
		$»spos = $GLOBALS['%s']->length;
		$cssPositionOffsetValue = null;
		$»t = ($value);
		switch($»t->index) {
		case 0:
		$unit = $»t->params[0];
		{
			$cssPositionOffsetValue = cocktail_core_unit_UnitManager::getCSSLength($unit);
		}break;
		case 1:
		$percentValue = $»t->params[0];
		{
			$cssPositionOffsetValue = cocktail_core_unit_UnitManager::getCSSPercentValue($percentValue);
		}break;
		case 2:
		{
			$cssPositionOffsetValue = "auto";
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $cssPositionOffsetValue;
		}
		$GLOBALS['%s']->pop();
	}
	static function getCSSConstrainedDimension($value) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::getCSSConstrainedDimension");
		$»spos = $GLOBALS['%s']->length;
		$cssConstrainedValue = null;
		$»t = ($value);
		switch($»t->index) {
		case 0:
		$unit = $»t->params[0];
		{
			$cssConstrainedValue = cocktail_core_unit_UnitManager::getCSSLength($unit);
		}break;
		case 1:
		$percentValue = $»t->params[0];
		{
			$cssConstrainedValue = cocktail_core_unit_UnitManager::getCSSPercentValue($percentValue);
		}break;
		case 2:
		{
			$cssConstrainedValue = "none";
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $cssConstrainedValue;
		}
		$GLOBALS['%s']->pop();
	}
	static function getCSSVerticalAlign($value) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::getCSSVerticalAlign");
		$»spos = $GLOBALS['%s']->length;
		$cssVerticalAlignValue = null;
		$»t = ($value);
		switch($»t->index) {
		case 0:
		{
			$cssVerticalAlignValue = "baseline";
		}break;
		case 5:
		{
			$cssVerticalAlignValue = "middle";
		}break;
		case 1:
		{
			$cssVerticalAlignValue = "sub";
		}break;
		case 2:
		{
			$cssVerticalAlignValue = "super";
		}break;
		case 4:
		{
			$cssVerticalAlignValue = "text-top";
		}break;
		case 7:
		{
			$cssVerticalAlignValue = "text-bottom";
		}break;
		case 3:
		{
			$cssVerticalAlignValue = "top";
		}break;
		case 6:
		{
			$cssVerticalAlignValue = "bottom";
		}break;
		case 8:
		$value1 = $»t->params[0];
		{
			$cssVerticalAlignValue = cocktail_core_unit_UnitManager::getCSSPercentValue($value1);
		}break;
		case 9:
		$value1 = $»t->params[0];
		{
			$cssVerticalAlignValue = cocktail_core_unit_UnitManager::getCSSLength($value1);
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $cssVerticalAlignValue;
		}
		$GLOBALS['%s']->pop();
	}
	static function getCSSLineHeight($value) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::getCSSLineHeight");
		$»spos = $GLOBALS['%s']->length;
		$cssLineHeightValue = null;
		$»t = ($value);
		switch($»t->index) {
		case 2:
		$unit = $»t->params[0];
		{
			$cssLineHeightValue = cocktail_core_unit_UnitManager::getCSSLength($unit);
		}break;
		case 0:
		{
			$cssLineHeightValue = "normal";
		}break;
		case 3:
		$value1 = $»t->params[0];
		{
			$cssLineHeightValue = cocktail_core_unit_UnitManager::getCSSPercentValue($value1);
		}break;
		case 1:
		$value1 = $»t->params[0];
		{
			$cssLineHeightValue = Std::string($value1);
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $cssLineHeightValue;
		}
		$GLOBALS['%s']->pop();
	}
	static function getCSSFontSize($value) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::getCSSFontSize");
		$»spos = $GLOBALS['%s']->length;
		$cssFontSizeValue = null;
		$»t = ($value);
		switch($»t->index) {
		case 0:
		$unit = $»t->params[0];
		{
			$cssFontSizeValue = cocktail_core_unit_UnitManager::getCSSLength($unit);
		}break;
		case 1:
		$percent = $»t->params[0];
		{
			$cssFontSizeValue = cocktail_core_unit_UnitManager::getCSSPercentValue($percent);
		}break;
		case 2:
		$value1 = $»t->params[0];
		{
			$»t2 = ($value1);
			switch($»t2->index) {
			case 0:
			{
				$cssFontSizeValue = "xx-small";
			}break;
			case 1:
			{
				$cssFontSizeValue = "x-small";
			}break;
			case 2:
			{
				$cssFontSizeValue = "small";
			}break;
			case 3:
			{
				$cssFontSizeValue = "medium";
			}break;
			case 4:
			{
				$cssFontSizeValue = "large";
			}break;
			case 5:
			{
				$cssFontSizeValue = "x-large";
			}break;
			case 6:
			{
				$cssFontSizeValue = "xx-large";
			}break;
			}
		}break;
		case 3:
		$value1 = $»t->params[0];
		{
			$»t2 = ($value1);
			switch($»t2->index) {
			case 0:
			{
				$cssFontSizeValue = "larger";
			}break;
			case 1:
			{
				$cssFontSizeValue = "smaller";
			}break;
			}
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $cssFontSizeValue;
		}
		$GLOBALS['%s']->pop();
	}
	static function getCSSFontWeight($value) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::getCSSFontWeight");
		$»spos = $GLOBALS['%s']->length;
		$cssFontWeightValue = null;
		$»t = ($value);
		switch($»t->index) {
		case 0:
		{
			$cssFontWeightValue = "normal";
		}break;
		case 1:
		{
			$cssFontWeightValue = "bold";
		}break;
		case 2:
		{
			$cssFontWeightValue = "bolder";
		}break;
		case 3:
		{
			$cssFontWeightValue = "lighter";
		}break;
		case 4:
		{
			$cssFontWeightValue = "100";
		}break;
		case 5:
		{
			$cssFontWeightValue = "200";
		}break;
		case 6:
		{
			$cssFontWeightValue = "300";
		}break;
		case 7:
		{
			$cssFontWeightValue = "400";
		}break;
		case 8:
		{
			$cssFontWeightValue = "500";
		}break;
		case 9:
		{
			$cssFontWeightValue = "600";
		}break;
		case 10:
		{
			$cssFontWeightValue = "700";
		}break;
		case 11:
		{
			$cssFontWeightValue = "800";
		}break;
		case 12:
		{
			$cssFontWeightValue = "900";
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $cssFontWeightValue;
		}
		$GLOBALS['%s']->pop();
	}
	static function getCSSFontStyle($value) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::getCSSFontStyle");
		$»spos = $GLOBALS['%s']->length;
		$cssFontStyleValue = null;
		$»t = ($value);
		switch($»t->index) {
		case 0:
		{
			$cssFontStyleValue = "normal";
		}break;
		case 1:
		{
			$cssFontStyleValue = "italic";
		}break;
		case 2:
		{
			$cssFontStyleValue = "obllique";
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $cssFontStyleValue;
		}
		$GLOBALS['%s']->pop();
	}
	static function getCSSFontVariant($value) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::getCSSFontVariant");
		$»spos = $GLOBALS['%s']->length;
		$cssFontVariantValue = null;
		$»t = ($value);
		switch($»t->index) {
		case 0:
		{
			$cssFontVariantValue = "normal";
		}break;
		case 1:
		{
			$cssFontVariantValue = "small-caps";
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $cssFontVariantValue;
		}
		$GLOBALS['%s']->pop();
	}
	static function getCSSFontFamily($value) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::getCSSFontFamily");
		$»spos = $GLOBALS['%s']->length;
		$cssFontFamilyValue = "";
		{
			$_g1 = 0; $_g = $value->length;
			while($_g1 < $_g) {
				$i = $_g1++;
				$fontName = $value[$i];
				if(_hx_index_of($fontName, " ", null) !== -1) {
					$fontName = "'" . $fontName . "'";
				}
				$cssFontFamilyValue .= $fontName;
				if($i < $value->length - 1) {
					$cssFontFamilyValue .= ",";
				}
				unset($i,$fontName);
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $cssFontFamilyValue;
		}
		$GLOBALS['%s']->pop();
	}
	static function getCSSTextAlign($value) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::getCSSTextAlign");
		$»spos = $GLOBALS['%s']->length;
		$cssTextAlignValue = null;
		$»t = ($value);
		switch($»t->index) {
		case 0:
		{
			$cssTextAlignValue = "left";
		}break;
		case 1:
		{
			$cssTextAlignValue = "right";
		}break;
		case 2:
		{
			$cssTextAlignValue = "center";
		}break;
		case 3:
		{
			$cssTextAlignValue = "justify";
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $cssTextAlignValue;
		}
		$GLOBALS['%s']->pop();
	}
	static function getCSSWhiteSpace($value) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::getCSSWhiteSpace");
		$»spos = $GLOBALS['%s']->length;
		$cssWhiteSpaceValue = null;
		$»t = ($value);
		switch($»t->index) {
		case 0:
		{
			$cssWhiteSpaceValue = "normal";
		}break;
		case 1:
		{
			$cssWhiteSpaceValue = "pre";
		}break;
		case 2:
		{
			$cssWhiteSpaceValue = "nowrap";
		}break;
		case 3:
		{
			$cssWhiteSpaceValue = "pre-wrap";
		}break;
		case 4:
		{
			$cssWhiteSpaceValue = "pre-line";
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $cssWhiteSpaceValue;
		}
		$GLOBALS['%s']->pop();
	}
	static function getCSSTextTransform($value) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::getCSSTextTransform");
		$»spos = $GLOBALS['%s']->length;
		$cssTextTransformValue = null;
		$»t = ($value);
		switch($»t->index) {
		case 3:
		{
			$cssTextTransformValue = "none";
		}break;
		case 1:
		{
			$cssTextTransformValue = "uppercase";
		}break;
		case 2:
		{
			$cssTextTransformValue = "lowercase";
		}break;
		case 0:
		{
			$cssTextTransformValue = "capitalize";
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $cssTextTransformValue;
		}
		$GLOBALS['%s']->pop();
	}
	static function getCSSTextIndent($value) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::getCSSTextIndent");
		$»spos = $GLOBALS['%s']->length;
		$cssTextIndentValue = null;
		$»t = ($value);
		switch($»t->index) {
		case 0:
		$value1 = $»t->params[0];
		{
			$cssTextIndentValue = cocktail_core_unit_UnitManager::getCSSLength($value1);
		}break;
		case 1:
		$value1 = $»t->params[0];
		{
			$cssTextIndentValue = cocktail_core_unit_UnitManager::getCSSPercentValue($value1);
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $cssTextIndentValue;
		}
		$GLOBALS['%s']->pop();
	}
	static function getCSSLetterSpacing($value) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::getCSSLetterSpacing");
		$»spos = $GLOBALS['%s']->length;
		$cssLetterSpacingValue = null;
		$»t = ($value);
		switch($»t->index) {
		case 0:
		{
			$cssLetterSpacingValue = "normal";
		}break;
		case 1:
		$unit = $»t->params[0];
		{
			$cssLetterSpacingValue = cocktail_core_unit_UnitManager::getCSSLength($unit);
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $cssLetterSpacingValue;
		}
		$GLOBALS['%s']->pop();
	}
	static function getCSSWordSpacing($value) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::getCSSWordSpacing");
		$»spos = $GLOBALS['%s']->length;
		$cssWordSpacingValue = null;
		$»t = ($value);
		switch($»t->index) {
		case 0:
		{
			$cssWordSpacingValue = "normal";
		}break;
		case 1:
		$unit = $»t->params[0];
		{
			$cssWordSpacingValue = cocktail_core_unit_UnitManager::getCSSLength($unit);
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $cssWordSpacingValue;
		}
		$GLOBALS['%s']->pop();
	}
	static function getCSSBackgroundColor($value) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::getCSSBackgroundColor");
		$»spos = $GLOBALS['%s']->length;
		$cssBackgroundColor = null;
		$cssBackgroundColor = cocktail_core_unit_UnitManager::getCSSColor($value);
		{
			$GLOBALS['%s']->pop();
			return $cssBackgroundColor;
		}
		$GLOBALS['%s']->pop();
	}
	static function getCSSBackgroundOrigin($value) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::getCSSBackgroundOrigin");
		$»spos = $GLOBALS['%s']->length;
		$cssBackgroundOrigin = "";
		{
			$_g1 = 0; $_g = $value->length;
			while($_g1 < $_g) {
				$i = $_g1++;
				$»t = ($value[$i]);
				switch($»t->index) {
				case 0:
				{
					$cssBackgroundOrigin .= "border-box";
				}break;
				case 2:
				{
					$cssBackgroundOrigin .= "content-box";
				}break;
				case 1:
				{
					$cssBackgroundOrigin .= "padding-box";
				}break;
				}
				if($i < $value->length - 1) {
					$cssBackgroundOrigin .= ",";
				}
				unset($i);
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $cssBackgroundOrigin;
		}
		$GLOBALS['%s']->pop();
	}
	static function getCSSBackgroundClip($value) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::getCSSBackgroundClip");
		$»spos = $GLOBALS['%s']->length;
		$cssBackgroundClip = "";
		{
			$_g1 = 0; $_g = $value->length;
			while($_g1 < $_g) {
				$i = $_g1++;
				$»t = ($value[$i]);
				switch($»t->index) {
				case 0:
				{
					$cssBackgroundClip .= "border-box";
				}break;
				case 2:
				{
					$cssBackgroundClip .= "content-box";
				}break;
				case 1:
				{
					$cssBackgroundClip .= "padding-box";
				}break;
				}
				if($i < $value->length - 1) {
					$cssBackgroundClip .= ",";
				}
				unset($i);
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $cssBackgroundClip;
		}
		$GLOBALS['%s']->pop();
	}
	static function getCSSBackgroundImage($value) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::getCSSBackgroundImage");
		$»spos = $GLOBALS['%s']->length;
		$cssBackgroundImage = "";
		{
			$_g1 = 0; $_g = $value->length;
			while($_g1 < $_g) {
				$i = $_g1++;
				$»t = ($value[$i]);
				switch($»t->index) {
				case 0:
				{
					$cssBackgroundImage .= "none";
				}break;
				case 1:
				$value1 = $»t->params[0];
				{
					$cssBackgroundImage .= cocktail_core_unit_UnitManager::getCSSImageValue($value1);
				}break;
				}
				if($i < $value->length - 1) {
					$cssBackgroundImage .= ",";
				}
				unset($i);
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $cssBackgroundImage;
		}
		$GLOBALS['%s']->pop();
	}
	static function getCSSBackgroundSize($value) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::getCSSBackgroundSize");
		$»spos = $GLOBALS['%s']->length;
		$cssBackgroundSize = "";
		{
			$_g1 = 0; $_g = $value->length;
			while($_g1 < $_g) {
				$i = $_g1++;
				$»t = ($value[$i]);
				switch($»t->index) {
				case 0:
				{
					$cssBackgroundSize .= "contain";
				}break;
				case 1:
				{
					$cssBackgroundSize .= "cover";
				}break;
				case 2:
				$value1 = $»t->params[0];
				{
					$cssBackgroundSize .= cocktail_core_unit_UnitManager::getCSSBackgroundSizeDimensions($value1);
				}break;
				}
				if($i < $value->length - 1) {
					$cssBackgroundSize .= ",";
				}
				unset($i);
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $cssBackgroundSize;
		}
		$GLOBALS['%s']->pop();
	}
	static function getCSSBackgroundSizeDimensions($value) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::getCSSBackgroundSizeDimensions");
		$»spos = $GLOBALS['%s']->length;
		$cssBackgroundSizeDimensions = cocktail_core_unit_UnitManager::getCSSBackgroundSizeDimension($value->x) . " " . cocktail_core_unit_UnitManager::getCSSBackgroundSizeDimension($value->y);
		{
			$GLOBALS['%s']->pop();
			return $cssBackgroundSizeDimensions;
		}
		$GLOBALS['%s']->pop();
	}
	static function getCSSBackgroundSizeDimension($value) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::getCSSBackgroundSizeDimension");
		$»spos = $GLOBALS['%s']->length;
		$cssBackgroundSizeDimension = null;
		$»t = ($value);
		switch($»t->index) {
		case 0:
		$value1 = $»t->params[0];
		{
			$cssBackgroundSizeDimension = cocktail_core_unit_UnitManager::getCSSLength($value1);
		}break;
		case 1:
		$value1 = $»t->params[0];
		{
			$cssBackgroundSizeDimension = cocktail_core_unit_UnitManager::getCSSPercentValue($value1);
		}break;
		case 2:
		{
			$cssBackgroundSizeDimension = "auto";
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $cssBackgroundSizeDimension;
		}
		$GLOBALS['%s']->pop();
	}
	static function getCSSBackgroundPosition($value) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::getCSSBackgroundPosition");
		$»spos = $GLOBALS['%s']->length;
		$cssBackgroundPositionData = "";
		{
			$_g1 = 0; $_g = $value->length;
			while($_g1 < $_g) {
				$i = $_g1++;
				$cssBackgroundPositionData .= cocktail_core_unit_UnitManager::getCSSBackgroundPositionX(_hx_array_get($value, $i)->x) . " " . cocktail_core_unit_UnitManager::getCSSBackgroundPositionY(_hx_array_get($value, $i)->y);
				if($i < $value->length - 1) {
					$cssBackgroundPositionData .= ",";
				}
				unset($i);
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $cssBackgroundPositionData;
		}
		$GLOBALS['%s']->pop();
	}
	static function getCSSBackgroundPositionX($value) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::getCSSBackgroundPositionX");
		$»spos = $GLOBALS['%s']->length;
		$cssBackgroundPositionX = null;
		$»t = ($value);
		switch($»t->index) {
		case 0:
		$value1 = $»t->params[0];
		{
			$cssBackgroundPositionX = cocktail_core_unit_UnitManager::getCSSLength($value1);
		}break;
		case 1:
		$value1 = $»t->params[0];
		{
			$cssBackgroundPositionX = cocktail_core_unit_UnitManager::getCSSPercentValue($value1);
		}break;
		case 3:
		{
			$cssBackgroundPositionX = "center";
		}break;
		case 2:
		{
			$cssBackgroundPositionX = "left";
		}break;
		case 4:
		{
			$cssBackgroundPositionX = "right";
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $cssBackgroundPositionX;
		}
		$GLOBALS['%s']->pop();
	}
	static function getCSSBackgroundPositionY($value) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::getCSSBackgroundPositionY");
		$»spos = $GLOBALS['%s']->length;
		$cssBackgroundPositionY = null;
		$»t = ($value);
		switch($»t->index) {
		case 0:
		$value1 = $»t->params[0];
		{
			$cssBackgroundPositionY = cocktail_core_unit_UnitManager::getCSSLength($value1);
		}break;
		case 1:
		$value1 = $»t->params[0];
		{
			$cssBackgroundPositionY = cocktail_core_unit_UnitManager::getCSSPercentValue($value1);
		}break;
		case 4:
		{
			$cssBackgroundPositionY = "bottom";
		}break;
		case 2:
		{
			$cssBackgroundPositionY = "top";
		}break;
		case 3:
		{
			$cssBackgroundPositionY = "center";
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $cssBackgroundPositionY;
		}
		$GLOBALS['%s']->pop();
	}
	static function getCSSBackgroundRepeat($value) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::getCSSBackgroundRepeat");
		$»spos = $GLOBALS['%s']->length;
		$cssBackgroundRepeat = "";
		{
			$_g1 = 0; $_g = $value->length;
			while($_g1 < $_g) {
				$i = $_g1++;
				$cssBackgroundRepeat .= cocktail_core_unit_UnitManager::getCSSBackgroundRepeatValue(_hx_array_get($value, $i)->x) . " " . cocktail_core_unit_UnitManager::getCSSBackgroundRepeatValue(_hx_array_get($value, $i)->y);
				if($i < $value->length - 1) {
					$cssBackgroundRepeat .= ",";
				}
				unset($i);
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $cssBackgroundRepeat;
		}
		$GLOBALS['%s']->pop();
	}
	static function getCSSBackgroundRepeatValue($value) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::getCSSBackgroundRepeatValue");
		$»spos = $GLOBALS['%s']->length;
		$cssBackgroundRepeatValue = null;
		$»t = ($value);
		switch($»t->index) {
		case 3:
		{
			$cssBackgroundRepeatValue = "no-repeat";
		}break;
		case 0:
		{
			$cssBackgroundRepeatValue = "repeat";
		}break;
		case 2:
		{
			$cssBackgroundRepeatValue = "round";
		}break;
		case 1:
		{
			$cssBackgroundRepeatValue = "space";
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $cssBackgroundRepeatValue;
		}
		$GLOBALS['%s']->pop();
	}
	static function getCSSCursor($value) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::getCSSCursor");
		$»spos = $GLOBALS['%s']->length;
		$cssCursorValue = null;
		$»t = ($value);
		switch($»t->index) {
		case 0:
		{
			$cssCursorValue = "auto";
		}break;
		case 1:
		{
			$cssCursorValue = "crosshair";
		}break;
		case 2:
		{
			$cssCursorValue = "default";
		}break;
		case 3:
		{
			$cssCursorValue = "pointer";
		}break;
		case 4:
		{
			$cssCursorValue = "text";
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $cssCursorValue;
		}
		$GLOBALS['%s']->pop();
	}
	static function getCSSImageValue($value) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::getCSSImageValue");
		$»spos = $GLOBALS['%s']->length;
		$cssImageValue = null;
		$»t = ($value);
		switch($»t->index) {
		case 0:
		$value1 = $»t->params[0];
		{
			$cssImageValue = "url(\"" . $value1 . "\")";
		}break;
		case 1:
		$value1 = $»t->params[0];
		{
			$cssImageValue = "image(" . cocktail_core_unit_UnitManager::getCSSImageList($value1) . ")";
		}break;
		case 2:
		$value1 = $»t->params[0];
		{
			$cssImageValue = cocktail_core_unit_UnitManager::getCSSGradientValue($value1);
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $cssImageValue;
		}
		$GLOBALS['%s']->pop();
	}
	static function getCSSImageList($value) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::getCSSImageList");
		$»spos = $GLOBALS['%s']->length;
		$cssImageList = "";
		{
			$_g1 = 0; $_g = $value->urls->length;
			while($_g1 < $_g) {
				$i = $_g1++;
				$cssImageList .= "\"" . $value->urls[$i] . "\"";
				if($i < $value->urls->length - 1) {
					$cssImageList .= ",";
				} else {
					$cssImageList .= "," . cocktail_core_unit_UnitManager::getCSSColor($value->fallbackColor);
				}
				unset($i);
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $cssImageList;
		}
		$GLOBALS['%s']->pop();
	}
	static function getCSSGradientValue($value) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::getCSSGradientValue");
		$»spos = $GLOBALS['%s']->length;
		$cssGradientValue = null;
		$»t = ($value);
		switch($»t->index) {
		case 0:
		$value1 = $»t->params[0];
		{
			$cssGradientValue = "linear-gradient(" . cocktail_core_unit_UnitManager::getCSSLinearGradientValue($value1) . ")";
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $cssGradientValue;
		}
		$GLOBALS['%s']->pop();
	}
	static function getCSSLinearGradientValue($value) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::getCSSLinearGradientValue");
		$»spos = $GLOBALS['%s']->length;
		$cssLinearGradientValue = cocktail_core_unit_UnitManager::getCSSGradientAngle($value->angle) . "," . cocktail_core_unit_UnitManager::getCSSColorStopsValue($value->colorStops);
		{
			$GLOBALS['%s']->pop();
			return $cssLinearGradientValue;
		}
		$GLOBALS['%s']->pop();
	}
	static function getCSSColorStopsValue($value) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::getCSSColorStopsValue");
		$»spos = $GLOBALS['%s']->length;
		$cssColorStopsData = "";
		{
			$_g1 = 0; $_g = $value->length;
			while($_g1 < $_g) {
				$i = $_g1++;
				$cssColorStopsData .= cocktail_core_unit_UnitManager::getCSSColor(_hx_array_get($value, $i)->color) . " " . cocktail_core_unit_UnitManager::getCSSColorStopValue(_hx_array_get($value, $i)->stop);
				if($i < $value->length - 1) {
					$cssColorStopsData .= ",";
				}
				unset($i);
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $cssColorStopsData;
		}
		$GLOBALS['%s']->pop();
	}
	static function getCSSColorStopValue($value) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::getCSSColorStopValue");
		$»spos = $GLOBALS['%s']->length;
		$cssColorStopValue = null;
		$»t = ($value);
		switch($»t->index) {
		case 1:
		$value1 = $»t->params[0];
		{
			$cssColorStopValue = cocktail_core_unit_UnitManager::getCSSPercentValue($value1);
		}break;
		case 0:
		$value1 = $»t->params[0];
		{
			$cssColorStopValue = cocktail_core_unit_UnitManager::getCSSLength($value1);
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $cssColorStopValue;
		}
		$GLOBALS['%s']->pop();
	}
	static function getCSSGradientAngle($value) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::getCSSGradientAngle");
		$»spos = $GLOBALS['%s']->length;
		$cssGradientAngle = null;
		$»t = ($value);
		switch($»t->index) {
		case 0:
		$value1 = $»t->params[0];
		{
			$cssGradientAngle = cocktail_core_unit_UnitManager::getCSSAngle($value1);
		}break;
		case 2:
		$value1 = $»t->params[0];
		{
			$cssGradientAngle = cocktail_core_unit_UnitManager::getCSSCornerValue($value1);
		}break;
		case 1:
		$value1 = $»t->params[0];
		{
			$cssGradientAngle = cocktail_core_unit_UnitManager::getCSSSideValue($value1);
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $cssGradientAngle;
		}
		$GLOBALS['%s']->pop();
	}
	static function getCSSSideValue($value) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::getCSSSideValue");
		$»spos = $GLOBALS['%s']->length;
		$cssSideValue = null;
		$»t = ($value);
		switch($»t->index) {
		case 2:
		{
			$cssSideValue = "bottom";
		}break;
		case 1:
		{
			$cssSideValue = "left";
		}break;
		case 3:
		{
			$cssSideValue = "right";
		}break;
		case 0:
		{
			$cssSideValue = "top";
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $cssSideValue;
		}
		$GLOBALS['%s']->pop();
	}
	static function getCSSCornerValue($value) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::getCSSCornerValue");
		$»spos = $GLOBALS['%s']->length;
		$cssCornerValue = null;
		$»t = ($value);
		switch($»t->index) {
		case 2:
		{
			$cssCornerValue = "left bottom";
		}break;
		case 1:
		{
			$cssCornerValue = "right bottom";
		}break;
		case 3:
		{
			$cssCornerValue = "left top";
		}break;
		case 0:
		{
			$cssCornerValue = "right top";
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $cssCornerValue;
		}
		$GLOBALS['%s']->pop();
	}
	static function getCSSColor($value) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::getCSSColor");
		$»spos = $GLOBALS['%s']->length;
		$cssColor = null;
		$»t = ($value);
		switch($»t->index) {
		case 2:
		$value1 = $»t->params[0];
		{
			$cssColor = $value1;
		}break;
		case 0:
		$blue = $»t->params[2]; $green = $»t->params[1]; $red = $»t->params[0];
		{
			$cssColor = "rgb(" . _hx_string_rec($red, "") . "," . _hx_string_rec($green, "") . "," . _hx_string_rec($blue, "") . ")";
		}break;
		case 1:
		$alpha = $»t->params[3]; $blue = $»t->params[2]; $green = $»t->params[1]; $red = $»t->params[0];
		{
			$cssColor = "rgba(" . _hx_string_rec($red, "") . "," . _hx_string_rec($green, "") . "," . _hx_string_rec($blue, "") . "," . _hx_string_rec($alpha, "") . ")";
		}break;
		case 3:
		$value1 = $»t->params[0];
		{
			$cssColor = cocktail_core_unit_UnitManager::getColorFromKeyword($value1);
		}break;
		case 4:
		{
			$cssColor = "transparent";
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $cssColor;
		}
		$GLOBALS['%s']->pop();
	}
	static function getCSSLength($lengthValue) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::getCSSLength");
		$»spos = $GLOBALS['%s']->length;
		$cssLength = null;
		$»t = ($lengthValue);
		switch($»t->index) {
		case 0:
		$pixelValue = $»t->params[0];
		{
			$cssLength = Std::string($pixelValue) . "px";
		}break;
		case 3:
		$pointValue = $»t->params[0];
		{
			$cssLength = Std::string($pointValue) . "pt";
		}break;
		case 2:
		$milimetersValue = $»t->params[0];
		{
			$cssLength = Std::string($milimetersValue) . "mm";
		}break;
		case 4:
		$picasValue = $»t->params[0];
		{
			$cssLength = Std::string($picasValue) . "pc";
		}break;
		case 1:
		$centimetersValue = $»t->params[0];
		{
			$cssLength = Std::string($centimetersValue) . "cm";
		}break;
		case 5:
		$inchesValue = $»t->params[0];
		{
			$cssLength = Std::string($inchesValue) . "in";
		}break;
		case 6:
		$emValue = $»t->params[0];
		{
			$cssLength = Std::string($emValue) . "em";
		}break;
		case 7:
		$exValue = $»t->params[0];
		{
			$cssLength = Std::string($exValue) . "ex";
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $cssLength;
		}
		$GLOBALS['%s']->pop();
	}
	static function getCSSPercentValue($value) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::getCSSPercentValue");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = Std::string($value) . "%";
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function getCSSAngle($value) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::getCSSAngle");
		$»spos = $GLOBALS['%s']->length;
		$cssAngle = null;
		$»t = ($value);
		switch($»t->index) {
		case 0:
		$value1 = $»t->params[0];
		{
			$cssAngle = Std::string($value1) . "deg";
		}break;
		case 2:
		$value1 = $»t->params[0];
		{
			$cssAngle = Std::string($value1) . "rad";
		}break;
		case 1:
		$value1 = $»t->params[0];
		{
			$cssAngle = Std::string($value1) . "grad";
		}break;
		case 3:
		$value1 = $»t->params[0];
		{
			$cssAngle = Std::string($value1) . "turn";
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $cssAngle;
		}
		$GLOBALS['%s']->pop();
	}
	static function getColorFromKeyword($value) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::getColorFromKeyword");
		$»spos = $GLOBALS['%s']->length;
		$cssColor = null;
		$»t = ($value);
		switch($»t->index) {
		case 0:
		{
			$cssColor = "aqua";
		}break;
		case 1:
		{
			$cssColor = "black";
		}break;
		case 2:
		{
			$cssColor = "blue";
		}break;
		case 3:
		{
			$cssColor = "fuchsia";
		}break;
		case 4:
		{
			$cssColor = "gray";
		}break;
		case 5:
		{
			$cssColor = "green";
		}break;
		case 6:
		{
			$cssColor = "lime";
		}break;
		case 7:
		{
			$cssColor = "maroon";
		}break;
		case 8:
		{
			$cssColor = "navy";
		}break;
		case 9:
		{
			$cssColor = "olive";
		}break;
		case 10:
		{
			$cssColor = "orange";
		}break;
		case 11:
		{
			$cssColor = "purple";
		}break;
		case 12:
		{
			$cssColor = "red";
		}break;
		case 13:
		{
			$cssColor = "silver";
		}break;
		case 14:
		{
			$cssColor = "teal";
		}break;
		case 15:
		{
			$cssColor = "white";
		}break;
		case 16:
		{
			$cssColor = "yellow";
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $cssColor;
		}
		$GLOBALS['%s']->pop();
	}
	static function getTimeValueArray($value) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::getTimeValueArray");
		$»spos = $GLOBALS['%s']->length;
		$tResult = new _hx_array(array());
		$tValues = _hx_explode(",", $value);
		{
			$_g1 = 0; $_g = $tValues->length;
			while($_g1 < $_g) {
				$i = $_g1++;
				$tResult->push(cocktail_core_unit_UnitManager::string2TimeValue($tValues[$i]));
				unset($i);
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $tResult;
		}
		$GLOBALS['%s']->pop();
	}
	static function getCSSTimeValueArray($value) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::getCSSTimeValueArray");
		$»spos = $GLOBALS['%s']->length;
		$tResult = new _hx_array(array());
		{
			$_g = 0;
			while($_g < $value->length) {
				$val = $value[$_g];
				++$_g;
				$»t = ($val);
				switch($»t->index) {
				case 0:
				$timeval = $»t->params[0];
				{
					$tResult->push(Std::string($timeval) . "s");
				}break;
				case 1:
				$timeval = $»t->params[0];
				{
					$tResult->push(Std::string($timeval) . "ms");
				}break;
				}
				unset($val);
			}
		}
		{
			$»tmp = $tResult->join(",");
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function getTransitionDuration($value) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::getTransitionDuration");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = cocktail_core_unit_UnitManager::getTimeValueArray($value);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function getCSSTransitionDuration($value) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::getCSSTransitionDuration");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = cocktail_core_unit_UnitManager::getCSSTimeValueArray($value);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function getTransitionDelay($value) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::getTransitionDelay");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = cocktail_core_unit_UnitManager::getTimeValueArray($value);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function getCSSTransitionDelay($value) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::getCSSTransitionDelay");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = cocktail_core_unit_UnitManager::getCSSTimeValueArray($value);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function getTransitionProperty($value) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::getTransitionProperty");
		$»spos = $GLOBALS['%s']->length;
		$value = cocktail_core_unit_UnitManager::trim($value);
		$tr = null;
		$array = cocktail_core_unit_UnitManager::string2VList($value, ",");
		$arrayProperties = new _hx_array(array());
		if($value === "none") {
			$tr = cocktail_core_style_TransitionProperty::$none;
		} else {
			if($value === "all") {
				$tr = cocktail_core_style_TransitionProperty::$all;
			} else {
				{
					$_g = 0;
					while($_g < $array->length) {
						$val = $array[$_g];
						++$_g;
						$arrayProperties->push($val);
						unset($val);
					}
				}
				$tr = cocktail_core_style_TransitionProperty::cssList($arrayProperties);
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $tr;
		}
		$GLOBALS['%s']->pop();
	}
	static function getCSSTransitionProperty($value) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::getCSSTransitionProperty");
		$»spos = $GLOBALS['%s']->length;
		$result = null;
		$»t = ($value);
		switch($»t->index) {
		case 2:
		$value1 = $»t->params[0];
		{
			$result = $value1->join(",");
		}break;
		case 0:
		{
			$result = "none";
		}break;
		case 1:
		{
			$result = "all";
		}break;
		default:{
			$result = "none";
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $result;
		}
		$GLOBALS['%s']->pop();
	}
	static function getTransitionTimingFunction($string) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::getTransitionTimingFunction");
		$»spos = $GLOBALS['%s']->length;
		$rSplit = new EReg("[^\\(][^0-9]*)],", "g");
		$tSplit = $rSplit->split($string);
		$tFunctions = new _hx_array(array());
		$tResult = new _hx_array(array());
		$rgB = new EReg("cubic-bezier[ ]*\\([ ]*([0-9]+)[ ]*,[ ]*([0-9]+)[ ]*,[ ]*([0-9]+)[ ]*,[ ]*([0-9]+)[ ]*\\)\$", "");
		$rgS = new EReg("steps[ ]*\\([ ]*([0-9]+)[ ]*,[ ]*(start|end)[ ]*\\)", "");
		$tr = cocktail_core_style_TransitionTimingFunctionValue::$ease;
		{
			$_g = 0;
			while($_g < $tSplit->length) {
				$func = $tSplit[$_g];
				++$_g;
				if(!$rgB->match($func) && !$rgS->match($func)) {
					$tFunctions = $tFunctions->concat(_hx_explode(",", $func));
				} else {
					$tFunctions->push($func);
				}
				unset($func);
			}
		}
		{
			$_g = 0;
			while($_g < $tFunctions->length) {
				$func = $tFunctions[$_g];
				++$_g;
				$func = cocktail_core_unit_UnitManager::trim($func);
				if($rgS->match($func)) {
					if($rgS->matched(2) === "start") {
						$tr = cocktail_core_style_TransitionTimingFunctionValue::steps(Std::parseInt($rgS->matched(1)), cocktail_core_style_IntervalChangeValue::$start);
					} else {
						$tr = cocktail_core_style_TransitionTimingFunctionValue::steps(Std::parseInt($rgS->matched(1)), cocktail_core_style_IntervalChangeValue::$end);
					}
				} else {
					if($rgB->match($func)) {
						$tr = cocktail_core_style_TransitionTimingFunctionValue::cubicBezier(Std::parseFloat($rgB->matched(1)), Std::parseFloat($rgB->matched(2)), Std::parseFloat($rgB->matched(3)), Std::parseFloat($rgB->matched(4)));
					} else {
						switch($func) {
						case "ease":{
							$tr = cocktail_core_style_TransitionTimingFunctionValue::$ease;
						}break;
						case "linear":{
							$tr = cocktail_core_style_TransitionTimingFunctionValue::$linear;
						}break;
						case "ease-in":{
							$tr = cocktail_core_style_TransitionTimingFunctionValue::$easeIn;
						}break;
						case "ease-out":{
							$tr = cocktail_core_style_TransitionTimingFunctionValue::$easeOut;
						}break;
						case "ease-in-out":{
							$tr = cocktail_core_style_TransitionTimingFunctionValue::$easeInOut;
						}break;
						case "step-start":{
							$tr = cocktail_core_style_TransitionTimingFunctionValue::$stepStart;
						}break;
						case "step-end":{
							$tr = cocktail_core_style_TransitionTimingFunctionValue::$stepEnd;
						}break;
						}
					}
				}
				$tResult->push($tr);
				unset($func);
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $tResult;
		}
		$GLOBALS['%s']->pop();
	}
	static function getCSSTransitionTimingFunction($functions) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::getCSSTransitionTimingFunction");
		$»spos = $GLOBALS['%s']->length;
		$tResult = new _hx_array(array());
		$r = null;
		$func = null;
		{
			$_g1 = 0; $_g = $functions->length;
			while($_g1 < $_g) {
				$i = $_g1++;
				$func = $functions[$i];
				$»t = ($func);
				switch($»t->index) {
				case 7:
				$intervalChange = $»t->params[1]; $intervalNumbers = $»t->params[0];
				{
					$interval = "start";
					$»t2 = ($intervalChange);
					switch($»t2->index) {
					case 0:
					{
						$interval = "start";
					}break;
					case 1:
					{
						$interval = "end";
					}break;
					}
					$r = "steps(" . Std::string($intervalNumbers) . "," . $interval;
				}break;
				case 8:
				$y2 = $»t->params[3]; $x2 = $»t->params[2]; $y1 = $»t->params[1]; $x1 = $»t->params[0];
				{
					$r = "cubic-bezier(" . Std::string($x1) . "," . Std::string($y1) . "," . Std::string($x2) . "," . Std::string($y2) . ")";
				}break;
				case 0:
				{
					$r = "ease";
				}break;
				case 1:
				{
					$r = "linear";
				}break;
				case 2:
				{
					$r = "easeIn";
				}break;
				case 3:
				{
					$r = "easeOut";
				}break;
				case 4:
				{
					$r = "easeInOut";
				}break;
				case 5:
				{
					$r = "stepStart";
				}break;
				case 6:
				{
					$r = "stepEnd";
				}break;
				}
				$tResult->push($r);
				unset($i);
			}
		}
		{
			$»tmp = $tResult->join(",");
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function getTransform($value) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::getTransform");
		$»spos = $GLOBALS['%s']->length;
		$tFunctions = null;
		$tFresult = new _hx_array(array());
		$res = null;
		$func = null;
		$rMatrix = new EReg("matrix[ ]*\\([ ]*([0-9\\.\\-]+)[ ]*,[ ]*([0-9\\.\\-]+)[ ]*,[ ]*([0-9\\.\\-]+)[ ]*,[ ]*([0-9\\.\\-]+)[ ]*,[ ]*([0-9\\.\\-]+)[ ]*,[ ]*([0-9\\.\\-]+)[ ]*\\)", "i");
		$rTranslate = new EReg("translate[ ]*\\([ ]*([0-9]+(%|px))[ ]*,[ ]*([0-9]+(%|px))[ ]*\\)", "i");
		$rTranslateX = new EReg("translatex[ ]*\\([ ]*([0-9]+(%|px))[ ]*\\)", "i");
		$rTranslateY = new EReg("translatey[ ]*\\([ ]*([0-9]+(%|px))[ ]*\\)", "i");
		$rScale = new EReg("scale[ ]*\\([ ]*([0-9].+)[ ]*,[ ]*([0-9].+)[ ]*\\)", "i");
		$rScaleX = new EReg("scaleX[ ]*\\([ ]*([0-9].+)[ ]*\\)", "i");
		$rScaleY = new EReg("scaleY[ ]*\\([ ]*([0-9].+)[ ]*\\)", "i");
		$rRotate = new EReg("rotate[ ]*\\([ ]*([0-9].+)deg[ ]*\\)", "i");
		$rSkewX = new EReg("skewX[ ]*\\([ ]*([0-9].+)deg[ ]*\\)", "i");
		$rSkewY = new EReg("skewY[ ]*\\([ ]*([0-9].+)deg[ ]*\\)", "i");
		$rSkew = new EReg("skew[ ]*\\([ ]*([0-9].+)deg[ ]*,[ ]*([0-9].+)deg[ ]*\\)", "i");
		$tFunctions = _hx_explode(" ", $value);
		$func = cocktail_core_unit_UnitManager::trim($value);
		if($func === "none") {
			$res = cocktail_core_style_Transform::$none;
			{
				$GLOBALS['%s']->pop();
				return $res;
			}
		}
		if($rMatrix->match($func)) {
			$tMatrixData = _hx_anonymous(array("a" => Std::parseFloat($rMatrix->matched(1)), "b" => Std::parseFloat($rMatrix->matched(2)), "c" => Std::parseFloat($rMatrix->matched(3)), "d" => Std::parseFloat($rMatrix->matched(4)), "e" => Std::parseFloat($rMatrix->matched(5)), "f" => Std::parseFloat($rMatrix->matched(6))));
			$tFresult->push(cocktail_core_style_TransformFunction::matrix($tMatrixData));
		}
		if($rTranslate->match($func)) {
			$parsed = cocktail_core_unit_UnitManager::string2VUnit($rTranslate->matched(1));
			$tx = null;
			$ty = null;
			switch($parsed->unit) {
			case "%":{
				$tx = cocktail_core_style_Translation::percent(Std::parseInt($parsed->value));
			}break;
			default:{
				$tx = cocktail_core_style_Translation::length(cocktail_core_unit_UnitManager::string2Length($parsed));
			}break;
			}
			$parsed = cocktail_core_unit_UnitManager::string2VUnit($rTranslate->matched(3));
			switch($parsed->unit) {
			case "%":{
				$ty = cocktail_core_style_Translation::percent(Std::parseInt($parsed->value));
			}break;
			default:{
				$ty = cocktail_core_style_Translation::length(cocktail_core_unit_UnitManager::string2Length($parsed));
			}break;
			}
			$tFresult->push(cocktail_core_style_TransformFunction::translate($tx, $ty));
		}
		if($rTranslateX->match($func)) {
			$parsed = cocktail_core_unit_UnitManager::string2VUnit($rTranslateX->matched(1));
			$tx = null;
			switch($parsed->unit) {
			case "%":{
				$tx = cocktail_core_style_Translation::percent(Std::parseInt($parsed->value));
			}break;
			default:{
				$tx = cocktail_core_style_Translation::length(cocktail_core_unit_UnitManager::string2Length($parsed));
			}break;
			}
			$tFresult->push(cocktail_core_style_TransformFunction::translateX($tx));
		}
		if($rTranslateY->match($func)) {
			$parsed = cocktail_core_unit_UnitManager::string2VUnit($rTranslateY->matched(1));
			$ty = null;
			switch($parsed->unit) {
			case "%":{
				$ty = cocktail_core_style_Translation::percent(Std::parseInt($parsed->value));
			}break;
			default:{
				$ty = cocktail_core_style_Translation::length(cocktail_core_unit_UnitManager::string2Length($parsed));
			}break;
			}
			$tFresult->push(cocktail_core_style_TransformFunction::translateY($ty));
		}
		if($rScale->match($func)) {
			$tFresult->push(cocktail_core_style_TransformFunction::scale(Std::parseFloat($rScale->matched(1)), Std::parseFloat($rScale->matched(2))));
		}
		if($rScaleX->match($func)) {
			$tFresult->push(cocktail_core_style_TransformFunction::scaleX(Std::parseFloat($rScaleX->matched(1))));
		}
		if($rScaleY->match($func)) {
			$tFresult->push(cocktail_core_style_TransformFunction::scaleY(Std::parseFloat($rScaleY->matched(1))));
		}
		if($rRotate->match($func)) {
			$tFresult->push(cocktail_core_style_TransformFunction::rotate(cocktail_core_unit_Angle::deg(Std::parseFloat($rRotate->matched(1)))));
		}
		if($rSkewX->match($func)) {
			$tFresult->push(cocktail_core_style_TransformFunction::skewX(cocktail_core_unit_Angle::deg(Std::parseFloat($rSkewX->matched(1)))));
		}
		if($rSkewY->match($func)) {
			$tFresult->push(cocktail_core_style_TransformFunction::skewY(cocktail_core_unit_Angle::deg(Std::parseFloat($rSkewY->matched(1)))));
		}
		if($rSkew->match($func)) {
			$tFresult->push(cocktail_core_style_TransformFunction::skew(cocktail_core_unit_Angle::deg(Std::parseFloat($rSkew->matched(1))), cocktail_core_unit_Angle::deg(Std::parseFloat($rSkew->matched(2)))));
		}
		$res = cocktail_core_style_Transform::transformFunctions($tFresult);
		{
			$GLOBALS['%s']->pop();
			return $res;
		}
		$GLOBALS['%s']->pop();
	}
	static function getTransformOrigin($string) {
		$GLOBALS['%s']->push("cocktail.core.unit.UnitManager::getTransformOrigin");
		$»spos = $GLOBALS['%s']->length;
		$tAxis = new _hx_array(array());
		$string = cocktail_core_unit_UnitManager::trim($string);
		$tAxis = _hx_explode(" ", $string);
		$result = null;
		$result = _hx_anonymous(array("x" => cocktail_core_style_TransformOriginX::percent(50), "y" => cocktail_core_style_TransformOriginY::percent(50)));
		switch($tAxis[0]) {
		case "left":{
			$result->x = cocktail_core_style_TransformOriginX::$left;
		}break;
		case "center":{
			$result->x = cocktail_core_style_TransformOriginX::$center;
		}break;
		case "right":{
			$result->x = cocktail_core_style_TransformOriginX::$right;
		}break;
		default:{
			$parsed = cocktail_core_unit_UnitManager::string2VUnit($tAxis[0]);
			switch($parsed->unit) {
			case "%":{
				$result->x = cocktail_core_style_TransformOriginX::percent(Std::parseInt($parsed->value));
			}break;
			default:{
				$result->x = cocktail_core_style_TransformOriginX::length(cocktail_core_unit_UnitManager::string2Length($parsed));
			}break;
			}
		}break;
		}
		switch($tAxis[1]) {
		case "top":{
			$result->y = cocktail_core_style_TransformOriginY::$top;
		}break;
		case "center":{
			$result->y = cocktail_core_style_TransformOriginY::$center;
		}break;
		case "bottom":{
			$result->y = cocktail_core_style_TransformOriginY::$bottom;
		}break;
		default:{
			$parsed = cocktail_core_unit_UnitManager::string2VUnit($tAxis[1]);
			switch($parsed->unit) {
			case "%":{
				$result->y = cocktail_core_style_TransformOriginY::percent(Std::parseInt($parsed->value));
			}break;
			default:{
				$result->y = cocktail_core_style_TransformOriginY::length(cocktail_core_unit_UnitManager::string2Length($parsed));
			}break;
			}
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $result;
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'cocktail.core.unit.UnitManager'; }
}
function cocktail_core_unit_UnitManager_0(&$enumType, &$parsed, &$string) {
	$»spos = $GLOBALS['%s']->length;
	switch($parsed->unit) {
	case "%":{
		return Type::createEnum($enumType, "percent", new _hx_array(array(Std::parseInt($parsed->value))));
	}break;
	default:{
		return Type::createEnum($enumType, "length", new _hx_array(array(cocktail_core_unit_UnitManager::string2Length($parsed))));
	}break;
	}
}
function cocktail_core_unit_UnitManager_1(&$string) {
	$»spos = $GLOBALS['%s']->length;
	switch($string) {
	case "transparent":{
		return cocktail_core_unit_CSSColor::$transparent;
	}break;
	case "aqua":{
		return cocktail_core_unit_CSSColor::keyword(cocktail_core_unit_ColorKeyword::$aqua);
	}break;
	case "black":{
		return cocktail_core_unit_CSSColor::keyword(cocktail_core_unit_ColorKeyword::$black);
	}break;
	case "blue":{
		return cocktail_core_unit_CSSColor::keyword(cocktail_core_unit_ColorKeyword::$blue);
	}break;
	case "fuchsia":{
		return cocktail_core_unit_CSSColor::keyword(cocktail_core_unit_ColorKeyword::$fuchsia);
	}break;
	case "gray":{
		return cocktail_core_unit_CSSColor::keyword(cocktail_core_unit_ColorKeyword::$gray);
	}break;
	case "green":{
		return cocktail_core_unit_CSSColor::keyword(cocktail_core_unit_ColorKeyword::$green);
	}break;
	case "lime":{
		return cocktail_core_unit_CSSColor::keyword(cocktail_core_unit_ColorKeyword::$lime);
	}break;
	case "maroon":{
		return cocktail_core_unit_CSSColor::keyword(cocktail_core_unit_ColorKeyword::$maroon);
	}break;
	case "navy":{
		return cocktail_core_unit_CSSColor::keyword(cocktail_core_unit_ColorKeyword::$navy);
	}break;
	case "olive":{
		return cocktail_core_unit_CSSColor::keyword(cocktail_core_unit_ColorKeyword::$olive);
	}break;
	case "orange":{
		return cocktail_core_unit_CSSColor::keyword(cocktail_core_unit_ColorKeyword::$orange);
	}break;
	case "purple":{
		return cocktail_core_unit_CSSColor::keyword(cocktail_core_unit_ColorKeyword::$purple);
	}break;
	case "red":{
		return cocktail_core_unit_CSSColor::keyword(cocktail_core_unit_ColorKeyword::$red);
	}break;
	case "silver":{
		return cocktail_core_unit_CSSColor::keyword(cocktail_core_unit_ColorKeyword::$silver);
	}break;
	case "teal":{
		return cocktail_core_unit_CSSColor::keyword(cocktail_core_unit_ColorKeyword::$teal);
	}break;
	case "white":{
		return cocktail_core_unit_CSSColor::keyword(cocktail_core_unit_ColorKeyword::$white);
	}break;
	case "yellow":{
		return cocktail_core_unit_CSSColor::keyword(cocktail_core_unit_ColorKeyword::$yellow);
	}break;
	default:{
		throw new HException("unknown color \"" . $string . "\"");
	}break;
	}
}
function cocktail_core_unit_UnitManager_2(&$parsed) {
	$»spos = $GLOBALS['%s']->length;
	switch($parsed->unit) {
	case "in":{
		return cocktail_core_unit_Length::cssIn(Std::parseFloat($parsed->value));
	}break;
	case "cm":{
		return cocktail_core_unit_Length::cm(Std::parseFloat($parsed->value));
	}break;
	case "em":{
		return cocktail_core_unit_Length::em(Std::parseFloat($parsed->value));
	}break;
	case "ex":{
		return cocktail_core_unit_Length::ex(Std::parseFloat($parsed->value));
	}break;
	case "mm":{
		return cocktail_core_unit_Length::mm(Std::parseFloat($parsed->value));
	}break;
	case "pc":{
		return cocktail_core_unit_Length::pc(Std::parseFloat($parsed->value));
	}break;
	case "pt":{
		return cocktail_core_unit_Length::pt(Std::parseFloat($parsed->value));
	}break;
	case "px":{
		return cocktail_core_unit_Length::px(Std::parseFloat($parsed->value));
	}break;
	case "":{
		$v = Std::parseInt($parsed->value);
		if($v === 0) {
			return cocktail_core_unit_Length::px($v);
		} else {
			throw new HException("Bad unit \"" . $parsed->unit . "\"");
		}
		unset($v);
	}break;
	default:{
		throw new HException("Bad unit \"" . $parsed->unit . "\"");
	}break;
	}
}

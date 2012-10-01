<?php

class cocktail_core_css_parsers_CSSStyleSerializer {
	public function __construct() { if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.css.parsers.CSSStyleSerializer::new");
		$퍀pos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}}
	static function serialize($property) {
		$GLOBALS['%s']->push("cocktail.core.css.parsers.CSSStyleSerializer::serialize");
		$퍀pos = $GLOBALS['%s']->length;
		$퍁 = ($property);
		switch($퍁->index) {
		case 4:
		$value = $퍁->params[0];
		{
			$퍁mp = cocktail_core_css_parsers_CSSStyleSerializer::serializeKeyword($value);
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		case 3:
		$value = $퍁->params[0];
		{
			$GLOBALS['%s']->pop();
			return $value;
		}break;
		case 6:
		$value = $퍁->params[0];
		{
			$GLOBALS['%s']->pop();
			return $value;
		}break;
		case 5:
		$value = $퍁->params[0];
		{
			$퍁mp = "url(" . $value . ")";
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		case 15:
		{
			$GLOBALS['%s']->pop();
			return "inherit";
		}break;
		case 16:
		{
			$GLOBALS['%s']->pop();
			return "initial";
		}break;
		case 9:
		$value = $퍁->params[0];
		{
			$퍁mp = cocktail_core_css_parsers_CSSStyleSerializer::serializeTime($value);
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		case 2:
		$value = $퍁->params[0];
		{
			$퍁mp = _hx_string_rec($value, "") . "%";
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		case 8:
		$value = $퍁->params[0];
		{
			$퍁mp = cocktail_core_css_parsers_CSSStyleSerializer::serializeAngle($value);
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		case 0:
		$value = $퍁->params[0];
		{
			$퍁mp = Std::string($value);
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		case 1:
		$value = $퍁->params[0];
		{
			$퍁mp = Std::string($value);
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		case 17:
		$value = $퍁->params[0];
		{
			$퍁mp = Std::string($value);
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		case 18:
		$intervalChange = $퍁->params[1]; $intervalNumber = $퍁->params[0];
		{
			$퍁mp = "steps(" . Std::string($intervalNumber) . "," . cocktail_core_css_parsers_CSSStyleSerializer::serializeKeyword($intervalChange) . ")";
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		case 19:
		$y2 = $퍁->params[3]; $x2 = $퍁->params[2]; $y1 = $퍁->params[1]; $x1 = $퍁->params[0];
		{
			$퍁mp = "cubic-bezier(" . Std::string($x1) . "," . Std::string($y1) . "," . Std::string($x2) . "," . Std::string($y2) . ")";
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		case 10:
		$value = $퍁->params[0];
		{
			$퍁mp = cocktail_core_css_parsers_CSSStyleSerializer::serializeFrequency($value);
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		case 7:
		$value = $퍁->params[0];
		{
			$퍁mp = cocktail_core_css_parsers_CSSStyleSerializer::serializeLength($value);
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		case 11:
		$value = $퍁->params[0];
		{
			$퍁mp = cocktail_core_css_parsers_CSSStyleSerializer::serializeResolution($value);
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		case 12:
		$value = $퍁->params[0];
		{
			$퍁mp = cocktail_core_css_parsers_CSSStyleSerializer::serializeColor($value);
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		case 20:
		$value = $퍁->params[0];
		{
			$퍁mp = cocktail_core_css_parsers_CSSStyleSerializer::serializeTransformFunction($value);
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		case 13:
		$value = $퍁->params[0];
		{
			$퍁mp = cocktail_core_css_parsers_CSSStyleSerializer::serializeGroup($value);
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		case 14:
		$value = $퍁->params[0];
		{
			$퍁mp = cocktail_core_css_parsers_CSSStyleSerializer::serializeList($value);
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	static function serializeList($list) {
		$GLOBALS['%s']->push("cocktail.core.css.parsers.CSSStyleSerializer::serializeList");
		$퍀pos = $GLOBALS['%s']->length;
		$serializedList = "";
		{
			$_g1 = 0; $_g = $list->length;
			while($_g1 < $_g) {
				$i = $_g1++;
				$serializedList .= cocktail_core_css_parsers_CSSStyleSerializer::serialize($list[$i]);
				if($i < $list->length) {
					$serializedList .= ",";
				}
				unset($i);
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $serializedList;
		}
		$GLOBALS['%s']->pop();
	}
	static function serializeGroup($group) {
		$GLOBALS['%s']->push("cocktail.core.css.parsers.CSSStyleSerializer::serializeGroup");
		$퍀pos = $GLOBALS['%s']->length;
		$serializedGroup = "";
		{
			$_g1 = 0; $_g = $group->length;
			while($_g1 < $_g) {
				$i = $_g1++;
				$serializedGroup .= cocktail_core_css_parsers_CSSStyleSerializer::serialize($group[$i]);
				if($i < $group->length) {
					$serializedGroup .= " ";
				}
				unset($i);
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $serializedGroup;
		}
		$GLOBALS['%s']->pop();
	}
	static function serializeTransformFunction($transformFunction) {
		$GLOBALS['%s']->push("cocktail.core.css.parsers.CSSStyleSerializer::serializeTransformFunction");
		$퍀pos = $GLOBALS['%s']->length;
		$퍁 = ($transformFunction);
		switch($퍁->index) {
		case 0:
		$data = $퍁->params[0];
		{
			$퍁mp = "matrix(" . Std::string($data->a) . "," . Std::string($data->b) . "," . Std::string($data->c) . "," . Std::string($data->d) . "," . Std::string($data->e) . "," . Std::string($data->f) . ")";
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		case 1:
		$ty = $퍁->params[1]; $tx = $퍁->params[0];
		{
			$퍁mp = "translate(" . cocktail_core_css_parsers_CSSStyleSerializer::serializeTranslation($tx) . "," . cocktail_core_css_parsers_CSSStyleSerializer::serializeTranslation($ty) . ")";
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		case 2:
		$tx = $퍁->params[0];
		{
			$퍁mp = "translateX(" . cocktail_core_css_parsers_CSSStyleSerializer::serializeTranslation($tx) . ")";
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		case 3:
		$ty = $퍁->params[0];
		{
			$퍁mp = "translateY(" . cocktail_core_css_parsers_CSSStyleSerializer::serializeTranslation($ty) . ")";
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		case 10:
		$angleY = $퍁->params[1]; $angleX = $퍁->params[0];
		{
			$퍁mp = "skew(" . cocktail_core_css_parsers_CSSStyleSerializer::serializeAngle($angleX) . "," . cocktail_core_css_parsers_CSSStyleSerializer::serializeAngle($angleY) . ")";
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		case 8:
		$angleX = $퍁->params[0];
		{
			$퍁mp = "skewX(" . cocktail_core_css_parsers_CSSStyleSerializer::serializeAngle($angleX) . ")";
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		case 9:
		$angleY = $퍁->params[0];
		{
			$퍁mp = "skewY(" . cocktail_core_css_parsers_CSSStyleSerializer::serializeAngle($angleY) . ")";
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		case 7:
		$angle = $퍁->params[0];
		{
			$퍁mp = "rotate(" . cocktail_core_css_parsers_CSSStyleSerializer::serializeAngle($angle) . ")";
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		case 4:
		$sy = $퍁->params[1]; $sx = $퍁->params[0];
		{
			$퍁mp = "scale(" . Std::string($sx) . "," . Std::string($sy) . ")";
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		case 5:
		$sx = $퍁->params[0];
		{
			$퍁mp = "scaleX(" . Std::string($sx) . ")";
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		case 6:
		$sy = $퍁->params[0];
		{
			$퍁mp = "scaleY(" . Std::string($sy) . ")";
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	static function serializeTranslation($translation) {
		$GLOBALS['%s']->push("cocktail.core.css.parsers.CSSStyleSerializer::serializeTranslation");
		$퍀pos = $GLOBALS['%s']->length;
		$퍁 = ($translation);
		switch($퍁->index) {
		case 1:
		$value = $퍁->params[0];
		{
			$퍁mp = cocktail_core_css_parsers_CSSStyleSerializer::serializeLength($value);
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		case 2:
		$value = $퍁->params[0];
		{
			$퍁mp = _hx_string_rec($value, "") . "%";
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		case 0:
		$value = $퍁->params[0];
		{
			$퍁mp = Std::string($value);
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	static function serializeColor($color) {
		$GLOBALS['%s']->push("cocktail.core.css.parsers.CSSStyleSerializer::serializeColor");
		$퍀pos = $GLOBALS['%s']->length;
		$퍁 = ($color);
		switch($퍁->index) {
		case 7:
		$value = $퍁->params[0];
		{
			$퍁mp = cocktail_core_css_parsers_CSSStyleSerializer::serializeColorKeyword($value);
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		case 0:
		$blue = $퍁->params[2]; $green = $퍁->params[1]; $red = $퍁->params[0];
		{
			$퍁mp = "rgb(" . Std::string($red) . "," . Std::string($green) . "," . Std::string($blue) . ")";
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		case 1:
		$blue = $퍁->params[2]; $green = $퍁->params[1]; $red = $퍁->params[0];
		{
			$퍁mp = "rgb(" . Std::string($red) . "%," . Std::string($green) . "%," . Std::string($blue) . "%)";
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		case 2:
		$alpha = $퍁->params[3]; $blue = $퍁->params[2]; $green = $퍁->params[1]; $red = $퍁->params[0];
		{
			$퍁mp = "rgba(" . Std::string($red) . "," . Std::string($green) . "," . Std::string($blue) . "," . Std::string($alpha) . ")";
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		case 3:
		$alpha = $퍁->params[3]; $blue = $퍁->params[2]; $green = $퍁->params[1]; $red = $퍁->params[0];
		{
			$퍁mp = "rgba(" . Std::string($red) . "%," . Std::string($green) . "%," . Std::string($blue) . "%," . Std::string($alpha) . "%)";
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		case 8:
		{
			$GLOBALS['%s']->pop();
			return "transparent";
		}break;
		case 5:
		$lightness = $퍁->params[2]; $saturation = $퍁->params[1]; $hue = $퍁->params[0];
		{
			$퍁mp = "hsl(" . Std::string($hue) . "," . Std::string($saturation) . "," . Std::string($lightness) . ")";
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		case 6:
		$alpha = $퍁->params[3]; $lightness = $퍁->params[2]; $saturation = $퍁->params[1]; $hue = $퍁->params[0];
		{
			$퍁mp = "hsl(" . Std::string($hue) . "," . Std::string($saturation) . "," . Std::string($lightness) . "," . Std::string($alpha) . ")";
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		case 4:
		$value = $퍁->params[0];
		{
			$GLOBALS['%s']->pop();
			return $value;
		}break;
		case 9:
		{
			$GLOBALS['%s']->pop();
			return "currentColor";
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	static function serializeColorKeyword($keyword) {
		$GLOBALS['%s']->push("cocktail.core.css.parsers.CSSStyleSerializer::serializeColorKeyword");
		$퍀pos = $GLOBALS['%s']->length;
		$퍁 = ($keyword);
		switch($퍁->index) {
		case 0:
		{
			$GLOBALS['%s']->pop();
			return "aliceblue";
		}break;
		case 1:
		{
			$GLOBALS['%s']->pop();
			return "antiquewhite";
		}break;
		case 2:
		{
			$GLOBALS['%s']->pop();
			return "aqua";
		}break;
		case 3:
		{
			$GLOBALS['%s']->pop();
			return "aquamarine";
		}break;
		case 4:
		{
			$GLOBALS['%s']->pop();
			return "azure";
		}break;
		case 5:
		{
			$GLOBALS['%s']->pop();
			return "beige";
		}break;
		case 6:
		{
			$GLOBALS['%s']->pop();
			return "bisque";
		}break;
		case 9:
		{
			$GLOBALS['%s']->pop();
			return "blue";
		}break;
		case 7:
		{
			$GLOBALS['%s']->pop();
			return "black";
		}break;
		case 8:
		{
			$GLOBALS['%s']->pop();
			return "blanchedalmond";
		}break;
		case 10:
		{
			$GLOBALS['%s']->pop();
			return "blueviolet";
		}break;
		case 11:
		{
			$GLOBALS['%s']->pop();
			return "brown";
		}break;
		case 12:
		{
			$GLOBALS['%s']->pop();
			return "burlywood";
		}break;
		case 13:
		{
			$GLOBALS['%s']->pop();
			return "cadetblue";
		}break;
		case 14:
		{
			$GLOBALS['%s']->pop();
			return "chartreuse";
		}break;
		case 15:
		{
			$GLOBALS['%s']->pop();
			return "chocolate";
		}break;
		case 16:
		{
			$GLOBALS['%s']->pop();
			return "coral";
		}break;
		case 17:
		{
			$GLOBALS['%s']->pop();
			return "cornflowerblue";
		}break;
		case 18:
		{
			$GLOBALS['%s']->pop();
			return "cornsilk";
		}break;
		case 19:
		{
			$GLOBALS['%s']->pop();
			return "crimson";
		}break;
		case 20:
		{
			$GLOBALS['%s']->pop();
			return "cyan";
		}break;
		case 21:
		{
			$GLOBALS['%s']->pop();
			return "darkblue";
		}break;
		case 22:
		{
			$GLOBALS['%s']->pop();
			return "darkcyan";
		}break;
		case 23:
		{
			$GLOBALS['%s']->pop();
			return "darkgoldenrod";
		}break;
		case 24:
		{
			$GLOBALS['%s']->pop();
			return "darkgray";
		}break;
		case 25:
		{
			$GLOBALS['%s']->pop();
			return "darkgreen";
		}break;
		case 26:
		{
			$GLOBALS['%s']->pop();
			return "darkgrey";
		}break;
		case 27:
		{
			$GLOBALS['%s']->pop();
			return "darkkhaki";
		}break;
		case 28:
		{
			$GLOBALS['%s']->pop();
			return "darkmagenta";
		}break;
		case 29:
		{
			$GLOBALS['%s']->pop();
			return "darkolivegreen";
		}break;
		case 30:
		{
			$GLOBALS['%s']->pop();
			return "darkorange";
		}break;
		case 31:
		{
			$GLOBALS['%s']->pop();
			return "darkorchid";
		}break;
		case 32:
		{
			$GLOBALS['%s']->pop();
			return "darkred";
		}break;
		case 33:
		{
			$GLOBALS['%s']->pop();
			return "darksalmon";
		}break;
		case 34:
		{
			$GLOBALS['%s']->pop();
			return "darkseagreen";
		}break;
		case 35:
		{
			$GLOBALS['%s']->pop();
			return "darkslateblue";
		}break;
		case 36:
		{
			$GLOBALS['%s']->pop();
			return "darkslategray";
		}break;
		case 37:
		{
			$GLOBALS['%s']->pop();
			return "darkslategrey";
		}break;
		case 38:
		{
			$GLOBALS['%s']->pop();
			return "darkturquoise";
		}break;
		case 39:
		{
			$GLOBALS['%s']->pop();
			return "darkviolet";
		}break;
		case 40:
		{
			$GLOBALS['%s']->pop();
			return "deeppink";
		}break;
		case 41:
		{
			$GLOBALS['%s']->pop();
			return "deepskyblue";
		}break;
		case 42:
		{
			$GLOBALS['%s']->pop();
			return "dimgray";
		}break;
		case 43:
		{
			$GLOBALS['%s']->pop();
			return "dimgrey";
		}break;
		case 44:
		{
			$GLOBALS['%s']->pop();
			return "dodgerblue";
		}break;
		case 45:
		{
			$GLOBALS['%s']->pop();
			return "firebrick";
		}break;
		case 46:
		{
			$GLOBALS['%s']->pop();
			return "floralwhite";
		}break;
		case 47:
		{
			$GLOBALS['%s']->pop();
			return "forestgreen";
		}break;
		case 48:
		{
			$GLOBALS['%s']->pop();
			return "fuchsia";
		}break;
		case 49:
		{
			$GLOBALS['%s']->pop();
			return "gainsboro";
		}break;
		case 50:
		{
			$GLOBALS['%s']->pop();
			return "ghostwhite";
		}break;
		case 51:
		{
			$GLOBALS['%s']->pop();
			return "gold";
		}break;
		case 52:
		{
			$GLOBALS['%s']->pop();
			return "goldenrod";
		}break;
		case 53:
		{
			$GLOBALS['%s']->pop();
			return "gray";
		}break;
		case 56:
		{
			$GLOBALS['%s']->pop();
			return "grey";
		}break;
		case 55:
		{
			$GLOBALS['%s']->pop();
			return "greenyellow";
		}break;
		case 57:
		{
			$GLOBALS['%s']->pop();
			return "honeydew";
		}break;
		case 58:
		{
			$GLOBALS['%s']->pop();
			return "hotpink";
		}break;
		case 60:
		{
			$GLOBALS['%s']->pop();
			return "indigo";
		}break;
		case 61:
		{
			$GLOBALS['%s']->pop();
			return "ivory";
		}break;
		case 59:
		{
			$GLOBALS['%s']->pop();
			return "indianred";
		}break;
		case 62:
		{
			$GLOBALS['%s']->pop();
			return "khaki";
		}break;
		case 63:
		{
			$GLOBALS['%s']->pop();
			return "lavender";
		}break;
		case 64:
		{
			$GLOBALS['%s']->pop();
			return "lavenderblush";
		}break;
		case 65:
		{
			$GLOBALS['%s']->pop();
			return "lawngreen";
		}break;
		case 66:
		{
			$GLOBALS['%s']->pop();
			return "lemonchiffon";
		}break;
		case 67:
		{
			$GLOBALS['%s']->pop();
			return "lightblue";
		}break;
		case 68:
		{
			$GLOBALS['%s']->pop();
			return "lightcoral";
		}break;
		case 69:
		{
			$GLOBALS['%s']->pop();
			return "lightcyan";
		}break;
		case 70:
		{
			$GLOBALS['%s']->pop();
			return "lightgoldenrodyellow";
		}break;
		case 71:
		{
			$GLOBALS['%s']->pop();
			return "lightgray";
		}break;
		case 72:
		{
			$GLOBALS['%s']->pop();
			return "lightgreen";
		}break;
		case 73:
		{
			$GLOBALS['%s']->pop();
			return "lightgrey";
		}break;
		case 74:
		{
			$GLOBALS['%s']->pop();
			return "lightpink";
		}break;
		case 75:
		{
			$GLOBALS['%s']->pop();
			return "lightsalmon";
		}break;
		case 76:
		{
			$GLOBALS['%s']->pop();
			return "lightseagreen";
		}break;
		case 77:
		{
			$GLOBALS['%s']->pop();
			return "lightskyblue";
		}break;
		case 78:
		{
			$GLOBALS['%s']->pop();
			return "lightslategray";
		}break;
		case 79:
		{
			$GLOBALS['%s']->pop();
			return "lightslategrey";
		}break;
		case 80:
		{
			$GLOBALS['%s']->pop();
			return "lightsteelblue";
		}break;
		case 81:
		{
			$GLOBALS['%s']->pop();
			return "lightyellow";
		}break;
		case 82:
		{
			$GLOBALS['%s']->pop();
			return "lime";
		}break;
		case 83:
		{
			$GLOBALS['%s']->pop();
			return "limegreen";
		}break;
		case 84:
		{
			$GLOBALS['%s']->pop();
			return "linen";
		}break;
		case 85:
		{
			$GLOBALS['%s']->pop();
			return "magenta";
		}break;
		case 86:
		{
			$GLOBALS['%s']->pop();
			return "marron";
		}break;
		case 87:
		{
			$GLOBALS['%s']->pop();
			return "mediumaquamarine";
		}break;
		case 88:
		{
			$GLOBALS['%s']->pop();
			return "mediumblue";
		}break;
		case 89:
		{
			$GLOBALS['%s']->pop();
			return "mediumorchid";
		}break;
		case 90:
		{
			$GLOBALS['%s']->pop();
			return "mediumpurple";
		}break;
		case 91:
		{
			$GLOBALS['%s']->pop();
			return "mediumseagreen";
		}break;
		case 92:
		{
			$GLOBALS['%s']->pop();
			return "mediumslateblue";
		}break;
		case 93:
		{
			$GLOBALS['%s']->pop();
			return "mediumspringgreen";
		}break;
		case 94:
		{
			$GLOBALS['%s']->pop();
			return "mediumturquoise";
		}break;
		case 95:
		{
			$GLOBALS['%s']->pop();
			return "mediumvioletred";
		}break;
		case 96:
		{
			$GLOBALS['%s']->pop();
			return "midnightblue";
		}break;
		case 97:
		{
			$GLOBALS['%s']->pop();
			return "mintcream";
		}break;
		case 98:
		{
			$GLOBALS['%s']->pop();
			return "mistyrose";
		}break;
		case 99:
		{
			$GLOBALS['%s']->pop();
			return "moccasin";
		}break;
		case 100:
		{
			$GLOBALS['%s']->pop();
			return "navajowhite";
		}break;
		case 102:
		{
			$GLOBALS['%s']->pop();
			return "oldlace";
		}break;
		case 104:
		{
			$GLOBALS['%s']->pop();
			return "olivedrab";
		}break;
		case 106:
		{
			$GLOBALS['%s']->pop();
			return "orangered";
		}break;
		case 107:
		{
			$GLOBALS['%s']->pop();
			return "orchid";
		}break;
		case 108:
		{
			$GLOBALS['%s']->pop();
			return "palegoldenrod";
		}break;
		case 109:
		{
			$GLOBALS['%s']->pop();
			return "palegreen";
		}break;
		case 110:
		{
			$GLOBALS['%s']->pop();
			return "paleturquoise";
		}break;
		case 111:
		{
			$GLOBALS['%s']->pop();
			return "palevioletred";
		}break;
		case 112:
		{
			$GLOBALS['%s']->pop();
			return "papayawhip";
		}break;
		case 113:
		{
			$GLOBALS['%s']->pop();
			return "peachpuff";
		}break;
		case 114:
		{
			$GLOBALS['%s']->pop();
			return "peru";
		}break;
		case 115:
		{
			$GLOBALS['%s']->pop();
			return "pink";
		}break;
		case 116:
		{
			$GLOBALS['%s']->pop();
			return "plum";
		}break;
		case 117:
		{
			$GLOBALS['%s']->pop();
			return "powderblue";
		}break;
		case 120:
		{
			$GLOBALS['%s']->pop();
			return "rosybrown";
		}break;
		case 121:
		{
			$GLOBALS['%s']->pop();
			return "royalblue";
		}break;
		case 122:
		{
			$GLOBALS['%s']->pop();
			return "saddlebrown";
		}break;
		case 123:
		{
			$GLOBALS['%s']->pop();
			return "salmon";
		}break;
		case 124:
		{
			$GLOBALS['%s']->pop();
			return "sandybrown";
		}break;
		case 125:
		{
			$GLOBALS['%s']->pop();
			return "seagreen";
		}break;
		case 126:
		{
			$GLOBALS['%s']->pop();
			return "seashell";
		}break;
		case 127:
		{
			$GLOBALS['%s']->pop();
			return "sienna";
		}break;
		case 128:
		{
			$GLOBALS['%s']->pop();
			return "silver";
		}break;
		case 129:
		{
			$GLOBALS['%s']->pop();
			return "skyblue";
		}break;
		case 130:
		{
			$GLOBALS['%s']->pop();
			return "slateblue";
		}break;
		case 131:
		{
			$GLOBALS['%s']->pop();
			return "slategray";
		}break;
		case 132:
		{
			$GLOBALS['%s']->pop();
			return "slategrey";
		}break;
		case 133:
		{
			$GLOBALS['%s']->pop();
			return "snow";
		}break;
		case 134:
		{
			$GLOBALS['%s']->pop();
			return "springgreen";
		}break;
		case 135:
		{
			$GLOBALS['%s']->pop();
			return "steelblue";
		}break;
		case 136:
		{
			$GLOBALS['%s']->pop();
			return "tan";
		}break;
		case 138:
		{
			$GLOBALS['%s']->pop();
			return "thisle";
		}break;
		case 139:
		{
			$GLOBALS['%s']->pop();
			return "tomato";
		}break;
		case 140:
		{
			$GLOBALS['%s']->pop();
			return "turquoise";
		}break;
		case 141:
		{
			$GLOBALS['%s']->pop();
			return "violet";
		}break;
		case 142:
		{
			$GLOBALS['%s']->pop();
			return "wheat";
		}break;
		case 143:
		{
			$GLOBALS['%s']->pop();
			return "white";
		}break;
		case 144:
		{
			$GLOBALS['%s']->pop();
			return "whitesmoke";
		}break;
		case 146:
		{
			$GLOBALS['%s']->pop();
			return "yellowgreen";
		}break;
		case 119:
		{
			$GLOBALS['%s']->pop();
			return "red";
		}break;
		case 118:
		{
			$GLOBALS['%s']->pop();
			return "purple";
		}break;
		case 54:
		{
			$GLOBALS['%s']->pop();
			return "green";
		}break;
		case 103:
		{
			$GLOBALS['%s']->pop();
			return "olive";
		}break;
		case 145:
		{
			$GLOBALS['%s']->pop();
			return "yellow";
		}break;
		case 101:
		{
			$GLOBALS['%s']->pop();
			return "navy";
		}break;
		case 105:
		{
			$GLOBALS['%s']->pop();
			return "orange";
		}break;
		case 137:
		{
			$GLOBALS['%s']->pop();
			return "teal";
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	static function serializeResolution($resolution) {
		$GLOBALS['%s']->push("cocktail.core.css.parsers.CSSStyleSerializer::serializeResolution");
		$퍀pos = $GLOBALS['%s']->length;
		$퍁 = ($resolution);
		switch($퍁->index) {
		case 1:
		$value = $퍁->params[0];
		{
			$퍁mp = _hx_string_rec($value, "") . "dcpm";
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		case 0:
		$value = $퍁->params[0];
		{
			$퍁mp = _hx_string_rec($value, "") . "dpi";
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		case 2:
		$value = $퍁->params[0];
		{
			$퍁mp = _hx_string_rec($value, "") . "dppx";
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	static function serializeLength($length) {
		$GLOBALS['%s']->push("cocktail.core.css.parsers.CSSStyleSerializer::serializeLength");
		$퍀pos = $GLOBALS['%s']->length;
		$퍁 = ($length);
		switch($퍁->index) {
		case 0:
		$value = $퍁->params[0];
		{
			$퍁mp = _hx_string_rec($value, "") . "px";
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		case 6:
		$value = $퍁->params[0];
		{
			$퍁mp = _hx_string_rec($value, "") . "em";
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		case 5:
		$value = $퍁->params[0];
		{
			$퍁mp = _hx_string_rec($value, "") . "in";
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		case 4:
		$value = $퍁->params[0];
		{
			$퍁mp = _hx_string_rec($value, "") . "pc";
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		case 7:
		$value = $퍁->params[0];
		{
			$퍁mp = _hx_string_rec($value, "") . "ex";
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		case 3:
		$value = $퍁->params[0];
		{
			$퍁mp = _hx_string_rec($value, "") . "pt";
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		case 2:
		$value = $퍁->params[0];
		{
			$퍁mp = _hx_string_rec($value, "") . "mm";
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		case 1:
		$value = $퍁->params[0];
		{
			$퍁mp = _hx_string_rec($value, "") . "cm";
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	static function serializeFrequency($frequency) {
		$GLOBALS['%s']->push("cocktail.core.css.parsers.CSSStyleSerializer::serializeFrequency");
		$퍀pos = $GLOBALS['%s']->length;
		$퍁 = ($frequency);
		switch($퍁->index) {
		case 0:
		$value = $퍁->params[0];
		{
			$퍁mp = _hx_string_rec($value, "") . "hz";
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		case 1:
		$value = $퍁->params[0];
		{
			$퍁mp = _hx_string_rec($value, "") . "khz";
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	static function serializeAngle($angle) {
		$GLOBALS['%s']->push("cocktail.core.css.parsers.CSSStyleSerializer::serializeAngle");
		$퍀pos = $GLOBALS['%s']->length;
		$퍁 = ($angle);
		switch($퍁->index) {
		case 0:
		$value = $퍁->params[0];
		{
			$퍁mp = _hx_string_rec($value, "") . "deg";
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		case 2:
		$value = $퍁->params[0];
		{
			$퍁mp = _hx_string_rec($value, "") . "rad";
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		case 3:
		$value = $퍁->params[0];
		{
			$퍁mp = _hx_string_rec($value, "") . "turn";
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		case 1:
		$value = $퍁->params[0];
		{
			$퍁mp = _hx_string_rec($value, "") . "grad";
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	static function serializeTime($time) {
		$GLOBALS['%s']->push("cocktail.core.css.parsers.CSSStyleSerializer::serializeTime");
		$퍀pos = $GLOBALS['%s']->length;
		$퍁 = ($time);
		switch($퍁->index) {
		case 0:
		$value = $퍁->params[0];
		{
			$퍁mp = _hx_string_rec($value, "") . "s";
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		case 1:
		$value = $퍁->params[0];
		{
			$퍁mp = _hx_string_rec($value, "") . "ms";
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	static function serializeKeyword($keyword) {
		$GLOBALS['%s']->push("cocktail.core.css.parsers.CSSStyleSerializer::serializeKeyword");
		$퍀pos = $GLOBALS['%s']->length;
		$퍁 = ($keyword);
		switch($퍁->index) {
		case 0:
		{
			$GLOBALS['%s']->pop();
			return "normal";
		}break;
		case 1:
		{
			$GLOBALS['%s']->pop();
			return "bold";
		}break;
		case 2:
		{
			$GLOBALS['%s']->pop();
			return "bolder";
		}break;
		case 3:
		{
			$GLOBALS['%s']->pop();
			return "lighter";
		}break;
		case 5:
		{
			$GLOBALS['%s']->pop();
			return "oblique";
		}break;
		case 4:
		{
			$GLOBALS['%s']->pop();
			return "italic";
		}break;
		case 6:
		{
			$GLOBALS['%s']->pop();
			return "small-caps";
		}break;
		case 7:
		{
			$GLOBALS['%s']->pop();
			return "pre";
		}break;
		case 8:
		{
			$GLOBALS['%s']->pop();
			return "no-wrap";
		}break;
		case 9:
		{
			$GLOBALS['%s']->pop();
			return "pre-wrap";
		}break;
		case 10:
		{
			$GLOBALS['%s']->pop();
			return "pre-line";
		}break;
		case 11:
		{
			$GLOBALS['%s']->pop();
			return "left";
		}break;
		case 12:
		{
			$GLOBALS['%s']->pop();
			return "right";
		}break;
		case 13:
		{
			$GLOBALS['%s']->pop();
			return "center";
		}break;
		case 14:
		{
			$GLOBALS['%s']->pop();
			return "justify";
		}break;
		case 15:
		{
			$GLOBALS['%s']->pop();
			return "capitalize";
		}break;
		case 16:
		{
			$GLOBALS['%s']->pop();
			return "uppercase";
		}break;
		case 17:
		{
			$GLOBALS['%s']->pop();
			return "lowercase";
		}break;
		case 18:
		{
			$GLOBALS['%s']->pop();
			return "none";
		}break;
		case 19:
		{
			$GLOBALS['%s']->pop();
			return "baseline";
		}break;
		case 20:
		{
			$GLOBALS['%s']->pop();
			return "sub";
		}break;
		case 21:
		{
			$GLOBALS['%s']->pop();
			return "super";
		}break;
		case 22:
		{
			$GLOBALS['%s']->pop();
			return "top";
		}break;
		case 23:
		{
			$GLOBALS['%s']->pop();
			return "text-top";
		}break;
		case 24:
		{
			$GLOBALS['%s']->pop();
			return "middle";
		}break;
		case 25:
		{
			$GLOBALS['%s']->pop();
			return "bottom";
		}break;
		case 26:
		{
			$GLOBALS['%s']->pop();
			return "text-bottom";
		}break;
		case 27:
		{
			$GLOBALS['%s']->pop();
			return "auto";
		}break;
		case 28:
		{
			$GLOBALS['%s']->pop();
			return "block";
		}break;
		case 29:
		{
			$GLOBALS['%s']->pop();
			return "inline-block";
		}break;
		case 30:
		{
			$GLOBALS['%s']->pop();
			return "inline";
		}break;
		case 31:
		{
			$GLOBALS['%s']->pop();
			return "both";
		}break;
		case 32:
		{
			$GLOBALS['%s']->pop();
			return "static";
		}break;
		case 33:
		{
			$GLOBALS['%s']->pop();
			return "relative";
		}break;
		case 34:
		{
			$GLOBALS['%s']->pop();
			return "absolute";
		}break;
		case 35:
		{
			$GLOBALS['%s']->pop();
			return "fixed";
		}break;
		case 36:
		{
			$GLOBALS['%s']->pop();
			return "visible";
		}break;
		case 37:
		{
			$GLOBALS['%s']->pop();
			return "hidden";
		}break;
		case 38:
		{
			$GLOBALS['%s']->pop();
			return "scroll";
		}break;
		case 39:
		{
			$GLOBALS['%s']->pop();
			return "border-box";
		}break;
		case 40:
		{
			$GLOBALS['%s']->pop();
			return "padding-box";
		}break;
		case 41:
		{
			$GLOBALS['%s']->pop();
			return "content-box";
		}break;
		case 42:
		{
			$GLOBALS['%s']->pop();
			return "contain";
		}break;
		case 43:
		{
			$GLOBALS['%s']->pop();
			return "cover";
		}break;
		case 44:
		{
			$GLOBALS['%s']->pop();
			return "crosshair";
		}break;
		case 45:
		{
			$GLOBALS['%s']->pop();
			return "default";
		}break;
		case 46:
		{
			$GLOBALS['%s']->pop();
			return "pointer";
		}break;
		case 47:
		{
			$GLOBALS['%s']->pop();
			return "text";
		}break;
		case 48:
		{
			$GLOBALS['%s']->pop();
			return "all";
		}break;
		case 49:
		{
			$GLOBALS['%s']->pop();
			return "ease";
		}break;
		case 50:
		{
			$GLOBALS['%s']->pop();
			return "linear";
		}break;
		case 51:
		{
			$GLOBALS['%s']->pop();
			return "ease-in";
		}break;
		case 52:
		{
			$GLOBALS['%s']->pop();
			return "ease-out";
		}break;
		case 53:
		{
			$GLOBALS['%s']->pop();
			return "ease-in-out";
		}break;
		case 54:
		{
			$GLOBALS['%s']->pop();
			return "step-start";
		}break;
		case 55:
		{
			$GLOBALS['%s']->pop();
			return "step-end";
		}break;
		case 56:
		{
			$GLOBALS['%s']->pop();
			return "start";
		}break;
		case 57:
		{
			$GLOBALS['%s']->pop();
			return "end";
		}break;
		case 58:
		{
			$GLOBALS['%s']->pop();
			return "xx-small";
		}break;
		case 59:
		{
			$GLOBALS['%s']->pop();
			return "x-small";
		}break;
		case 60:
		{
			$GLOBALS['%s']->pop();
			return "small";
		}break;
		case 64:
		{
			$GLOBALS['%s']->pop();
			return "xx-large";
		}break;
		case 63:
		{
			$GLOBALS['%s']->pop();
			return "x-large";
		}break;
		case 62:
		{
			$GLOBALS['%s']->pop();
			return "large";
		}break;
		case 61:
		{
			$GLOBALS['%s']->pop();
			return "medium";
		}break;
		case 65:
		{
			$GLOBALS['%s']->pop();
			return "larger";
		}break;
		case 66:
		{
			$GLOBALS['%s']->pop();
			return "smaller";
		}break;
		case 70:
		{
			$GLOBALS['%s']->pop();
			return "space";
		}break;
		case 71:
		{
			$GLOBALS['%s']->pop();
			return "round";
		}break;
		case 69:
		{
			$GLOBALS['%s']->pop();
			return "repeat-y";
		}break;
		case 68:
		{
			$GLOBALS['%s']->pop();
			return "repeat-x";
		}break;
		case 72:
		{
			$GLOBALS['%s']->pop();
			return "no-repeat";
		}break;
		case 67:
		{
			$GLOBALS['%s']->pop();
			return "repeat";
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'cocktail.core.css.parsers.CSSStyleSerializer'; }
}

<?php

class cocktail_core_css_parsers_CSSStyleSerializer {
	public function __construct() { 
	}
	static function serialize($property) {
		$퍁 = ($property);
		switch($퍁->index) {
		case 4:
		$value = $퍁->params[0];
		{
			return cocktail_core_css_parsers_CSSStyleSerializer::serializeKeyword($value);
		}break;
		case 3:
		$value = $퍁->params[0];
		{
			return $value;
		}break;
		case 6:
		$value = $퍁->params[0];
		{
			return $value;
		}break;
		case 5:
		$value = $퍁->params[0];
		{
			return "url(" . $value . ")";
		}break;
		case 15:
		{
			return "inherit";
		}break;
		case 16:
		{
			return "initial";
		}break;
		case 9:
		$value = $퍁->params[0];
		{
			return cocktail_core_css_parsers_CSSStyleSerializer::serializeTime($value);
		}break;
		case 2:
		$value = $퍁->params[0];
		{
			return _hx_string_rec($value, "") . "%";
		}break;
		case 8:
		$value = $퍁->params[0];
		{
			return cocktail_core_css_parsers_CSSStyleSerializer::serializeAngle($value);
		}break;
		case 0:
		$value = $퍁->params[0];
		{
			return Std::string($value);
		}break;
		case 1:
		$value = $퍁->params[0];
		{
			return Std::string($value);
		}break;
		case 17:
		$value = $퍁->params[0];
		{
			return Std::string($value);
		}break;
		case 18:
		$intervalChange = $퍁->params[1]; $intervalNumber = $퍁->params[0];
		{
			return "steps(" . Std::string($intervalNumber) . "," . cocktail_core_css_parsers_CSSStyleSerializer::serializeKeyword($intervalChange) . ")";
		}break;
		case 19:
		$y2 = $퍁->params[3]; $x2 = $퍁->params[2]; $y1 = $퍁->params[1]; $x1 = $퍁->params[0];
		{
			return "cubic-bezier(" . Std::string($x1) . "," . Std::string($y1) . "," . Std::string($x2) . "," . Std::string($y2) . ")";
		}break;
		case 10:
		$value = $퍁->params[0];
		{
			return cocktail_core_css_parsers_CSSStyleSerializer::serializeFrequency($value);
		}break;
		case 7:
		$value = $퍁->params[0];
		{
			return cocktail_core_css_parsers_CSSStyleSerializer::serializeLength($value);
		}break;
		case 11:
		$value = $퍁->params[0];
		{
			return cocktail_core_css_parsers_CSSStyleSerializer::serializeResolution($value);
		}break;
		case 12:
		$value = $퍁->params[0];
		{
			return cocktail_core_css_parsers_CSSStyleSerializer::serializeColor($value);
		}break;
		case 20:
		$value = $퍁->params[0];
		{
			return cocktail_core_css_parsers_CSSStyleSerializer::serializeTransformFunction($value);
		}break;
		case 13:
		$value = $퍁->params[0];
		{
			return cocktail_core_css_parsers_CSSStyleSerializer::serializeGroup($value);
		}break;
		case 14:
		$value = $퍁->params[0];
		{
			return cocktail_core_css_parsers_CSSStyleSerializer::serializeList($value);
		}break;
		}
	}
	static function serializeList($list) {
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
		return $serializedList;
	}
	static function serializeGroup($group) {
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
		return $serializedGroup;
	}
	static function serializeTransformFunction($transformFunction) {
		$퍁 = ($transformFunction);
		switch($퍁->index) {
		case 0:
		$data = $퍁->params[0];
		{
			return "matrix(" . Std::string($data->a) . "," . Std::string($data->b) . "," . Std::string($data->c) . "," . Std::string($data->d) . "," . Std::string($data->e) . "," . Std::string($data->f) . ")";
		}break;
		case 1:
		$ty = $퍁->params[1]; $tx = $퍁->params[0];
		{
			return "translate(" . cocktail_core_css_parsers_CSSStyleSerializer::serializeTranslation($tx) . "," . cocktail_core_css_parsers_CSSStyleSerializer::serializeTranslation($ty) . ")";
		}break;
		case 2:
		$tx = $퍁->params[0];
		{
			return "translateX(" . cocktail_core_css_parsers_CSSStyleSerializer::serializeTranslation($tx) . ")";
		}break;
		case 3:
		$ty = $퍁->params[0];
		{
			return "translateY(" . cocktail_core_css_parsers_CSSStyleSerializer::serializeTranslation($ty) . ")";
		}break;
		case 10:
		$angleY = $퍁->params[1]; $angleX = $퍁->params[0];
		{
			return "skew(" . cocktail_core_css_parsers_CSSStyleSerializer::serializeAngle($angleX) . "," . cocktail_core_css_parsers_CSSStyleSerializer::serializeAngle($angleY) . ")";
		}break;
		case 8:
		$angleX = $퍁->params[0];
		{
			return "skewX(" . cocktail_core_css_parsers_CSSStyleSerializer::serializeAngle($angleX) . ")";
		}break;
		case 9:
		$angleY = $퍁->params[0];
		{
			return "skewY(" . cocktail_core_css_parsers_CSSStyleSerializer::serializeAngle($angleY) . ")";
		}break;
		case 7:
		$angle = $퍁->params[0];
		{
			return "rotate(" . cocktail_core_css_parsers_CSSStyleSerializer::serializeAngle($angle) . ")";
		}break;
		case 4:
		$sy = $퍁->params[1]; $sx = $퍁->params[0];
		{
			return "scale(" . Std::string($sx) . "," . Std::string($sy) . ")";
		}break;
		case 5:
		$sx = $퍁->params[0];
		{
			return "scaleX(" . Std::string($sx) . ")";
		}break;
		case 6:
		$sy = $퍁->params[0];
		{
			return "scaleY(" . Std::string($sy) . ")";
		}break;
		}
	}
	static function serializeTranslation($translation) {
		$퍁 = ($translation);
		switch($퍁->index) {
		case 1:
		$value = $퍁->params[0];
		{
			return cocktail_core_css_parsers_CSSStyleSerializer::serializeLength($value);
		}break;
		case 2:
		$value = $퍁->params[0];
		{
			return _hx_string_rec($value, "") . "%";
		}break;
		case 0:
		$value = $퍁->params[0];
		{
			return Std::string($value);
		}break;
		}
	}
	static function serializeColor($color) {
		$퍁 = ($color);
		switch($퍁->index) {
		case 7:
		$value = $퍁->params[0];
		{
			return cocktail_core_css_parsers_CSSStyleSerializer::serializeColorKeyword($value);
		}break;
		case 0:
		$blue = $퍁->params[2]; $green = $퍁->params[1]; $red = $퍁->params[0];
		{
			return "rgb(" . Std::string($red) . "," . Std::string($green) . "," . Std::string($blue) . ")";
		}break;
		case 1:
		$blue = $퍁->params[2]; $green = $퍁->params[1]; $red = $퍁->params[0];
		{
			return "rgb(" . Std::string($red) . "%," . Std::string($green) . "%," . Std::string($blue) . "%)";
		}break;
		case 2:
		$alpha = $퍁->params[3]; $blue = $퍁->params[2]; $green = $퍁->params[1]; $red = $퍁->params[0];
		{
			return "rgba(" . Std::string($red) . "," . Std::string($green) . "," . Std::string($blue) . "," . Std::string($alpha) . ")";
		}break;
		case 3:
		$alpha = $퍁->params[3]; $blue = $퍁->params[2]; $green = $퍁->params[1]; $red = $퍁->params[0];
		{
			return "rgba(" . Std::string($red) . "%," . Std::string($green) . "%," . Std::string($blue) . "%," . Std::string($alpha) . "%)";
		}break;
		case 8:
		{
			return "transparent";
		}break;
		case 5:
		$lightness = $퍁->params[2]; $saturation = $퍁->params[1]; $hue = $퍁->params[0];
		{
			return "hsl(" . Std::string($hue) . "," . Std::string($saturation) . "," . Std::string($lightness) . ")";
		}break;
		case 6:
		$alpha = $퍁->params[3]; $lightness = $퍁->params[2]; $saturation = $퍁->params[1]; $hue = $퍁->params[0];
		{
			return "hsl(" . Std::string($hue) . "," . Std::string($saturation) . "," . Std::string($lightness) . "," . Std::string($alpha) . ")";
		}break;
		case 4:
		$value = $퍁->params[0];
		{
			return $value;
		}break;
		case 9:
		{
			return "currentColor";
		}break;
		}
	}
	static function serializeColorKeyword($keyword) {
		$퍁 = ($keyword);
		switch($퍁->index) {
		case 0:
		{
			return "aliceblue";
		}break;
		case 1:
		{
			return "antiquewhite";
		}break;
		case 2:
		{
			return "aqua";
		}break;
		case 3:
		{
			return "aquamarine";
		}break;
		case 4:
		{
			return "azure";
		}break;
		case 5:
		{
			return "beige";
		}break;
		case 6:
		{
			return "bisque";
		}break;
		case 9:
		{
			return "blue";
		}break;
		case 7:
		{
			return "black";
		}break;
		case 8:
		{
			return "blanchedalmond";
		}break;
		case 10:
		{
			return "blueviolet";
		}break;
		case 11:
		{
			return "brown";
		}break;
		case 12:
		{
			return "burlywood";
		}break;
		case 13:
		{
			return "cadetblue";
		}break;
		case 14:
		{
			return "chartreuse";
		}break;
		case 15:
		{
			return "chocolate";
		}break;
		case 16:
		{
			return "coral";
		}break;
		case 17:
		{
			return "cornflowerblue";
		}break;
		case 18:
		{
			return "cornsilk";
		}break;
		case 19:
		{
			return "crimson";
		}break;
		case 20:
		{
			return "cyan";
		}break;
		case 21:
		{
			return "darkblue";
		}break;
		case 22:
		{
			return "darkcyan";
		}break;
		case 23:
		{
			return "darkgoldenrod";
		}break;
		case 24:
		{
			return "darkgray";
		}break;
		case 25:
		{
			return "darkgreen";
		}break;
		case 26:
		{
			return "darkgrey";
		}break;
		case 27:
		{
			return "darkkhaki";
		}break;
		case 28:
		{
			return "darkmagenta";
		}break;
		case 29:
		{
			return "darkolivegreen";
		}break;
		case 30:
		{
			return "darkorange";
		}break;
		case 31:
		{
			return "darkorchid";
		}break;
		case 32:
		{
			return "darkred";
		}break;
		case 33:
		{
			return "darksalmon";
		}break;
		case 34:
		{
			return "darkseagreen";
		}break;
		case 35:
		{
			return "darkslateblue";
		}break;
		case 36:
		{
			return "darkslategray";
		}break;
		case 37:
		{
			return "darkslategrey";
		}break;
		case 38:
		{
			return "darkturquoise";
		}break;
		case 39:
		{
			return "darkviolet";
		}break;
		case 40:
		{
			return "deeppink";
		}break;
		case 41:
		{
			return "deepskyblue";
		}break;
		case 42:
		{
			return "dimgray";
		}break;
		case 43:
		{
			return "dimgrey";
		}break;
		case 44:
		{
			return "dodgerblue";
		}break;
		case 45:
		{
			return "firebrick";
		}break;
		case 46:
		{
			return "floralwhite";
		}break;
		case 47:
		{
			return "forestgreen";
		}break;
		case 48:
		{
			return "fuchsia";
		}break;
		case 49:
		{
			return "gainsboro";
		}break;
		case 50:
		{
			return "ghostwhite";
		}break;
		case 51:
		{
			return "gold";
		}break;
		case 52:
		{
			return "goldenrod";
		}break;
		case 53:
		{
			return "gray";
		}break;
		case 56:
		{
			return "grey";
		}break;
		case 55:
		{
			return "greenyellow";
		}break;
		case 57:
		{
			return "honeydew";
		}break;
		case 58:
		{
			return "hotpink";
		}break;
		case 60:
		{
			return "indigo";
		}break;
		case 61:
		{
			return "ivory";
		}break;
		case 59:
		{
			return "indianred";
		}break;
		case 62:
		{
			return "khaki";
		}break;
		case 63:
		{
			return "lavender";
		}break;
		case 64:
		{
			return "lavenderblush";
		}break;
		case 65:
		{
			return "lawngreen";
		}break;
		case 66:
		{
			return "lemonchiffon";
		}break;
		case 67:
		{
			return "lightblue";
		}break;
		case 68:
		{
			return "lightcoral";
		}break;
		case 69:
		{
			return "lightcyan";
		}break;
		case 70:
		{
			return "lightgoldenrodyellow";
		}break;
		case 71:
		{
			return "lightgray";
		}break;
		case 72:
		{
			return "lightgreen";
		}break;
		case 73:
		{
			return "lightgrey";
		}break;
		case 74:
		{
			return "lightpink";
		}break;
		case 75:
		{
			return "lightsalmon";
		}break;
		case 76:
		{
			return "lightseagreen";
		}break;
		case 77:
		{
			return "lightskyblue";
		}break;
		case 78:
		{
			return "lightslategray";
		}break;
		case 79:
		{
			return "lightslategrey";
		}break;
		case 80:
		{
			return "lightsteelblue";
		}break;
		case 81:
		{
			return "lightyellow";
		}break;
		case 82:
		{
			return "lime";
		}break;
		case 83:
		{
			return "limegreen";
		}break;
		case 84:
		{
			return "linen";
		}break;
		case 85:
		{
			return "magenta";
		}break;
		case 86:
		{
			return "marron";
		}break;
		case 87:
		{
			return "mediumaquamarine";
		}break;
		case 88:
		{
			return "mediumblue";
		}break;
		case 89:
		{
			return "mediumorchid";
		}break;
		case 90:
		{
			return "mediumpurple";
		}break;
		case 91:
		{
			return "mediumseagreen";
		}break;
		case 92:
		{
			return "mediumslateblue";
		}break;
		case 93:
		{
			return "mediumspringgreen";
		}break;
		case 94:
		{
			return "mediumturquoise";
		}break;
		case 95:
		{
			return "mediumvioletred";
		}break;
		case 96:
		{
			return "midnightblue";
		}break;
		case 97:
		{
			return "mintcream";
		}break;
		case 98:
		{
			return "mistyrose";
		}break;
		case 99:
		{
			return "moccasin";
		}break;
		case 100:
		{
			return "navajowhite";
		}break;
		case 102:
		{
			return "oldlace";
		}break;
		case 104:
		{
			return "olivedrab";
		}break;
		case 106:
		{
			return "orangered";
		}break;
		case 107:
		{
			return "orchid";
		}break;
		case 108:
		{
			return "palegoldenrod";
		}break;
		case 109:
		{
			return "palegreen";
		}break;
		case 110:
		{
			return "paleturquoise";
		}break;
		case 111:
		{
			return "palevioletred";
		}break;
		case 112:
		{
			return "papayawhip";
		}break;
		case 113:
		{
			return "peachpuff";
		}break;
		case 114:
		{
			return "peru";
		}break;
		case 115:
		{
			return "pink";
		}break;
		case 116:
		{
			return "plum";
		}break;
		case 117:
		{
			return "powderblue";
		}break;
		case 120:
		{
			return "rosybrown";
		}break;
		case 121:
		{
			return "royalblue";
		}break;
		case 122:
		{
			return "saddlebrown";
		}break;
		case 123:
		{
			return "salmon";
		}break;
		case 124:
		{
			return "sandybrown";
		}break;
		case 125:
		{
			return "seagreen";
		}break;
		case 126:
		{
			return "seashell";
		}break;
		case 127:
		{
			return "sienna";
		}break;
		case 128:
		{
			return "silver";
		}break;
		case 129:
		{
			return "skyblue";
		}break;
		case 130:
		{
			return "slateblue";
		}break;
		case 131:
		{
			return "slategray";
		}break;
		case 132:
		{
			return "slategrey";
		}break;
		case 133:
		{
			return "snow";
		}break;
		case 134:
		{
			return "springgreen";
		}break;
		case 135:
		{
			return "steelblue";
		}break;
		case 136:
		{
			return "tan";
		}break;
		case 138:
		{
			return "thisle";
		}break;
		case 139:
		{
			return "tomato";
		}break;
		case 140:
		{
			return "turquoise";
		}break;
		case 141:
		{
			return "violet";
		}break;
		case 142:
		{
			return "wheat";
		}break;
		case 143:
		{
			return "white";
		}break;
		case 144:
		{
			return "whitesmoke";
		}break;
		case 146:
		{
			return "yellowgreen";
		}break;
		case 119:
		{
			return "red";
		}break;
		case 118:
		{
			return "purple";
		}break;
		case 54:
		{
			return "green";
		}break;
		case 103:
		{
			return "olive";
		}break;
		case 145:
		{
			return "yellow";
		}break;
		case 101:
		{
			return "navy";
		}break;
		case 105:
		{
			return "orange";
		}break;
		case 137:
		{
			return "teal";
		}break;
		}
	}
	static function serializeResolution($resolution) {
		$퍁 = ($resolution);
		switch($퍁->index) {
		case 1:
		$value = $퍁->params[0];
		{
			return _hx_string_rec($value, "") . "dcpm";
		}break;
		case 0:
		$value = $퍁->params[0];
		{
			return _hx_string_rec($value, "") . "dpi";
		}break;
		case 2:
		$value = $퍁->params[0];
		{
			return _hx_string_rec($value, "") . "dppx";
		}break;
		}
	}
	static function serializeLength($length) {
		$퍁 = ($length);
		switch($퍁->index) {
		case 0:
		$value = $퍁->params[0];
		{
			return _hx_string_rec($value, "") . "px";
		}break;
		case 6:
		$value = $퍁->params[0];
		{
			return _hx_string_rec($value, "") . "em";
		}break;
		case 5:
		$value = $퍁->params[0];
		{
			return _hx_string_rec($value, "") . "in";
		}break;
		case 4:
		$value = $퍁->params[0];
		{
			return _hx_string_rec($value, "") . "pc";
		}break;
		case 7:
		$value = $퍁->params[0];
		{
			return _hx_string_rec($value, "") . "ex";
		}break;
		case 3:
		$value = $퍁->params[0];
		{
			return _hx_string_rec($value, "") . "pt";
		}break;
		case 2:
		$value = $퍁->params[0];
		{
			return _hx_string_rec($value, "") . "mm";
		}break;
		case 1:
		$value = $퍁->params[0];
		{
			return _hx_string_rec($value, "") . "cm";
		}break;
		}
	}
	static function serializeFrequency($frequency) {
		$퍁 = ($frequency);
		switch($퍁->index) {
		case 0:
		$value = $퍁->params[0];
		{
			return _hx_string_rec($value, "") . "hz";
		}break;
		case 1:
		$value = $퍁->params[0];
		{
			return _hx_string_rec($value, "") . "khz";
		}break;
		}
	}
	static function serializeAngle($angle) {
		$퍁 = ($angle);
		switch($퍁->index) {
		case 0:
		$value = $퍁->params[0];
		{
			return _hx_string_rec($value, "") . "deg";
		}break;
		case 2:
		$value = $퍁->params[0];
		{
			return _hx_string_rec($value, "") . "rad";
		}break;
		case 3:
		$value = $퍁->params[0];
		{
			return _hx_string_rec($value, "") . "turn";
		}break;
		case 1:
		$value = $퍁->params[0];
		{
			return _hx_string_rec($value, "") . "grad";
		}break;
		}
	}
	static function serializeTime($time) {
		$퍁 = ($time);
		switch($퍁->index) {
		case 0:
		$value = $퍁->params[0];
		{
			return _hx_string_rec($value, "") . "s";
		}break;
		case 1:
		$value = $퍁->params[0];
		{
			return _hx_string_rec($value, "") . "ms";
		}break;
		}
	}
	static function serializeKeyword($keyword) {
		$퍁 = ($keyword);
		switch($퍁->index) {
		case 0:
		{
			return "normal";
		}break;
		case 1:
		{
			return "bold";
		}break;
		case 2:
		{
			return "bolder";
		}break;
		case 3:
		{
			return "lighter";
		}break;
		case 5:
		{
			return "oblique";
		}break;
		case 4:
		{
			return "italic";
		}break;
		case 6:
		{
			return "small-caps";
		}break;
		case 7:
		{
			return "pre";
		}break;
		case 8:
		{
			return "no-wrap";
		}break;
		case 9:
		{
			return "pre-wrap";
		}break;
		case 10:
		{
			return "pre-line";
		}break;
		case 11:
		{
			return "left";
		}break;
		case 12:
		{
			return "right";
		}break;
		case 13:
		{
			return "center";
		}break;
		case 14:
		{
			return "justify";
		}break;
		case 15:
		{
			return "capitalize";
		}break;
		case 16:
		{
			return "uppercase";
		}break;
		case 17:
		{
			return "lowercase";
		}break;
		case 18:
		{
			return "none";
		}break;
		case 19:
		{
			return "baseline";
		}break;
		case 20:
		{
			return "sub";
		}break;
		case 21:
		{
			return "super";
		}break;
		case 22:
		{
			return "top";
		}break;
		case 23:
		{
			return "text-top";
		}break;
		case 24:
		{
			return "middle";
		}break;
		case 25:
		{
			return "bottom";
		}break;
		case 26:
		{
			return "text-bottom";
		}break;
		case 27:
		{
			return "auto";
		}break;
		case 28:
		{
			return "block";
		}break;
		case 29:
		{
			return "inline-block";
		}break;
		case 30:
		{
			return "inline";
		}break;
		case 31:
		{
			return "both";
		}break;
		case 32:
		{
			return "static";
		}break;
		case 33:
		{
			return "relative";
		}break;
		case 34:
		{
			return "absolute";
		}break;
		case 35:
		{
			return "fixed";
		}break;
		case 36:
		{
			return "visible";
		}break;
		case 37:
		{
			return "hidden";
		}break;
		case 38:
		{
			return "scroll";
		}break;
		case 39:
		{
			return "border-box";
		}break;
		case 40:
		{
			return "padding-box";
		}break;
		case 41:
		{
			return "content-box";
		}break;
		case 42:
		{
			return "contain";
		}break;
		case 43:
		{
			return "cover";
		}break;
		case 44:
		{
			return "crosshair";
		}break;
		case 45:
		{
			return "default";
		}break;
		case 46:
		{
			return "pointer";
		}break;
		case 47:
		{
			return "text";
		}break;
		case 48:
		{
			return "all";
		}break;
		case 49:
		{
			return "ease";
		}break;
		case 50:
		{
			return "linear";
		}break;
		case 51:
		{
			return "ease-in";
		}break;
		case 52:
		{
			return "ease-out";
		}break;
		case 53:
		{
			return "ease-in-out";
		}break;
		case 54:
		{
			return "step-start";
		}break;
		case 55:
		{
			return "step-end";
		}break;
		case 56:
		{
			return "start";
		}break;
		case 57:
		{
			return "end";
		}break;
		case 58:
		{
			return "xx-small";
		}break;
		case 59:
		{
			return "x-small";
		}break;
		case 60:
		{
			return "small";
		}break;
		case 64:
		{
			return "xx-large";
		}break;
		case 63:
		{
			return "x-large";
		}break;
		case 62:
		{
			return "large";
		}break;
		case 61:
		{
			return "medium";
		}break;
		case 65:
		{
			return "larger";
		}break;
		case 66:
		{
			return "smaller";
		}break;
		case 70:
		{
			return "space";
		}break;
		case 71:
		{
			return "round";
		}break;
		case 69:
		{
			return "repeat-y";
		}break;
		case 68:
		{
			return "repeat-x";
		}break;
		case 72:
		{
			return "no-repeat";
		}break;
		case 67:
		{
			return "repeat";
		}break;
		}
	}
	function __toString() { return 'cocktail.core.css.parsers.CSSStyleSerializer'; }
}

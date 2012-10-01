<?php

class org_slplayer_util_DomTools {
	public function __construct(){}
	static function doLater($callbackFunction, $nFrames = null) {
		if($nFrames === null) {
			$nFrames = 1;
		}
		call_user_func($callbackFunction);
	}
	static function getElementsByAttribute($elt, $attr, $value) {
		$childElts = $elt->getElementsByTagName("*");
		$filteredChildElts = new _hx_array(array());
		{
			$_g1 = 0; $_g = $childElts->length;
			while($_g1 < $_g) {
				$cCount = $_g1++;
				if(_hx_array_get($childElts, $cCount)->getAttribute($attr) !== null && ($value === "*" || _hx_array_get($childElts, $cCount)->getAttribute($attr) === $value)) {
					$filteredChildElts->push($childElts[$cCount]);
				}
				unset($cCount);
			}
		}
		return $filteredChildElts;
	}
	static function getSingleElement($rootElement, $className, $required = null) {
		if($required === null) {
			$required = true;
		}
		$domElements = $rootElement->getElementsByClassName($className);
		if($domElements->length > 1) {
			throw new HException("Error: search for the element with class name \"" . $className . "\" gave " . _hx_string_rec($domElements->length, "") . " results");
		}
		if($domElements !== null && $domElements->length === 1) {
			return $domElements[0];
		} else {
			if($required) {
				throw new HException("Error: search for the element with class name \"" . $className . "\" gave " . _hx_string_rec($domElements->length, "") . " results");
			}
			return null;
		}
	}
	static function getElementBoundingBox($htmlDom) {
		$halfBorderH = 0;
		$halfBorderV = 0;
		$scrollTop = 0;
		$scrollLeft = 0;
		$element = $htmlDom;
		while($element->parentNode !== null && strtolower($element->tagName) !== "body") {
			$scrollTop -= $element->get_scrollTop();
			$scrollLeft -= $element->get_scrollLeft();
			$element = $element->parentNode;
		}
		$scrollTop -= $element->get_scrollTop();
		$scrollLeft -= $element->get_scrollLeft();
		return _hx_anonymous(array("x" => Math::floor($htmlDom->get_offsetLeft() - $halfBorderH) + $scrollLeft, "y" => Math::floor($htmlDom->get_offsetTop() - $halfBorderV) + $scrollTop, "w" => Math::floor($htmlDom->get_offsetWidth() - $halfBorderH), "h" => Math::floor($htmlDom->get_offsetHeight() - $halfBorderV)));
	}
	static function localToGlobal($x, $y, $htmlDom) {
		$element = $htmlDom;
		while($element->parentNode !== null && strtolower($element->tagName) !== "body") {
			$x -= $element->get_offsetLeft();
			$y -= $element->get_offsetTop();
			$element = $element->parentNode;
		}
		$x -= $element->get_offsetLeft();
		$y -= $element->get_offsetTop();
		return _hx_anonymous(array("x" => $x, "y" => $y));
	}
	static function inspectTrace($obj, $callingClass) {
		haxe_Log::trace("-- " . $callingClass . " inspecting element --", _hx_anonymous(array("fileName" => "DomTools.hx", "lineNumber" => 156, "className" => "org.slplayer.util.DomTools", "methodName" => "inspectTrace")));
		{
			$_g = 0; $_g1 = Reflect::fields($obj);
			while($_g < $_g1->length) {
				$prop = $_g1[$_g];
				++$_g;
				haxe_Log::trace("- " . $prop . " = " . Std::string(Reflect::field($obj, $prop)), _hx_anonymous(array("fileName" => "DomTools.hx", "lineNumber" => 159, "className" => "org.slplayer.util.DomTools", "methodName" => "inspectTrace")));
				unset($prop);
			}
		}
		haxe_Log::trace("-- --", _hx_anonymous(array("fileName" => "DomTools.hx", "lineNumber" => 161, "className" => "org.slplayer.util.DomTools", "methodName" => "inspectTrace")));
	}
	static function toggleClass($element, $className) {
		if(org_slplayer_util_DomTools::hasClass($element, $className)) {
			org_slplayer_util_DomTools::removeClass($element, $className);
		} else {
			org_slplayer_util_DomTools::addClass($element, $className);
		}
	}
	static function addClass($element, $className) {
		if($element->get_className() === null) {
			$element->set_className("");
		}
		if(!org_slplayer_util_DomTools::hasClass($element, $className)) {
			if($element->get_className() !== "") {
				$_g = $element;
				$_g->set_className($_g->get_className() . " ");
			}
			{
				$_g = $element;
				$_g->set_className($_g->get_className() . $className);
			}
		}
	}
	static function removeClass($element, $className) {
		if($element->get_className() === null) {
			return;
		}
		if(org_slplayer_util_DomTools::hasClass($element, $className)) {
			$arr = _hx_explode(" ", $element->get_className());
			{
				$_g1 = 0; $_g = $arr->length;
				while($_g1 < $_g) {
					$idx = $_g1++;
					if($arr[$idx] === $className) {
						$arr[$idx] = "";
					}
					unset($idx);
				}
			}
			$element->set_className($arr->join(" "));
		}
	}
	static function hasClass($element, $className) {
		if($element->get_className() === null) {
			return false;
		}
		return Lambda::has(_hx_explode(" ", $element->get_className()), $className, null);
	}
	static function setMeta($metaName, $metaValue, $attributeName = null) {
		if($attributeName === null) {
			$attributeName = "content";
		}
		$res = new Hash();
		$metaTags = cocktail_Lib::get_document()->getElementsByTagName("META");
		$found = false;
		{
			$_g1 = 0; $_g = $metaTags->length;
			while($_g1 < $_g) {
				$idxNode = $_g1++;
				$node = $metaTags[$idxNode];
				$configName = $node->getAttribute("name");
				$configValue = $node->getAttribute($attributeName);
				if($configName !== null && $configValue !== null) {
					if($configName === $metaName) {
						$configValue = $metaValue;
						$node->setAttribute($attributeName, $metaValue);
						$found = true;
					}
					$res->set($configName, $configValue);
				}
				unset($node,$idxNode,$configValue,$configName);
			}
		}
		if(!$found) {
			$node = cocktail_Lib::get_document()->createElement("meta");
			$node->setAttribute("name", $metaName);
			$node->setAttribute("content", $metaValue);
			$head = _hx_array_get(cocktail_Lib::get_document()->getElementsByTagName("head"), 0);
			$head->appendChild($node);
			$res->set($metaName, $metaValue);
		}
		return $res;
	}
	static function getMeta($name, $attributeName = null, $head = null) {
		if($attributeName === null) {
			$attributeName = "content";
		}
		if($head === null) {
			$head = _hx_array_get(cocktail_Lib::get_document()->documentElement->getElementsByTagName("head"), 0);
		}
		$metaTags = $head->getElementsByTagName("meta");
		{
			$_g1 = 0; $_g = $metaTags->length;
			while($_g1 < $_g) {
				$idxNode = $_g1++;
				$node = $metaTags[$idxNode];
				$configName = $node->getAttribute("name");
				$configValue = $node->getAttribute($attributeName);
				if($configName === $name) {
					return $configValue;
				}
				unset($node,$idxNode,$configValue,$configName);
			}
		}
		return null;
	}
	static function addCssRules($css, $head = null) {
		if($head === null) {
			$head = _hx_array_get(cocktail_Lib::get_document()->documentElement->getElementsByTagName("head"), 0);
		}
		$node = cocktail_Lib::get_document()->createElement("style");
		$node->setAttribute("type", "text/css");
		$node->appendChild(cocktail_Lib::get_document()->createTextNode($css));
		$head->appendChild($node);
		return $node;
	}
	static function embedScript($src) {
		$head = _hx_array_get(cocktail_Lib::get_document()->getElementsByTagName("head"), 0);
		$scriptNodes = cocktail_Lib::get_document()->getElementsByTagName("script");
		{
			$_g1 = 0; $_g = $scriptNodes->length;
			while($_g1 < $_g) {
				$idxNode = $_g1++;
				$node = $scriptNodes[$idxNode];
				if($node->getAttribute("src") === $src) {
					return $node;
				}
				unset($node,$idxNode);
			}
		}
		$node = cocktail_Lib::get_document()->createElement("script");
		$node->setAttribute("src", $src);
		$head->appendChild($node);
		return $node;
	}
	static function getBaseTag() {
		$head = _hx_array_get(cocktail_Lib::get_document()->getElementsByTagName("head"), 0);
		$baseNodes = cocktail_Lib::get_document()->getElementsByTagName("base");
		if($baseNodes->length > 0) {
			return _hx_array_get($baseNodes, 0)->getAttribute("href");
		} else {
			return null;
		}
	}
	static function setBaseTag($href) {
		$head = _hx_array_get(cocktail_Lib::get_document()->getElementsByTagName("head"), 0);
		$baseNodes = cocktail_Lib::get_document()->getElementsByTagName("base");
		if($baseNodes->length > 0) {
			haxe_Log::trace("Warning: base tag already set in the head section. Current value (\"" . _hx_array_get($baseNodes, 0)->getAttribute("href") . "\") will be replaced by \"" . $href . "\"", _hx_anonymous(array("fileName" => "DomTools.hx", "lineNumber" => 340, "className" => "org.slplayer.util.DomTools", "methodName" => "setBaseTag")));
			_hx_array_get($baseNodes, 0)->setAttribute("href", $href);
		} else {
			$node = cocktail_Lib::get_document()->createElement("base");
			$node->setAttribute("href", $href);
			$node->setAttribute("target", "_self");
			if($head->childNodes->length > 0) {
				$head->insertBefore($node, $head->childNodes[0]);
			} else {
				$head->appendChild($node);
			}
		}
	}
	function __toString() { return 'org.slplayer.util.DomTools'; }
}

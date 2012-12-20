<?php

class brix_util_DomTools {
	public function __construct(){}
	static function doLater($callbackFunction, $frames = null) {
		$GLOBALS['%s']->push("brix.util.DomTools::doLater");
		$製pos = $GLOBALS['%s']->length;
		if($frames === null) {
			$frames = 1;
		}
		call_user_func($callbackFunction);
		$GLOBALS['%s']->pop();
	}
	static function abs2rel($url) {
		$GLOBALS['%s']->push("brix.util.DomTools::abs2rel");
		$製pos = $GLOBALS['%s']->length;
		$initialUrl = $url;
		$base = brix_util_DomTools::getBaseUrl();
		$idx = _hx_index_of($base, "://", null);
		if($idx === -1) {
			$GLOBALS['%s']->pop();
			return $initialUrl;
		} else {
			$base = _hx_substr($base, $idx + 3, null);
		}
		$idx1 = _hx_index_of($url, "://", null);
		if($idx1 === -1) {
			$GLOBALS['%s']->pop();
			return $initialUrl;
		} else {
			$url = _hx_substr($url, $idx1 + 3, null);
		}
		$baseArray = _hx_explode("/", $base);
		$urlArray = _hx_explode("/", $url);
		if($baseArray[0] !== $urlArray[0]) {
			$GLOBALS['%s']->pop();
			return $initialUrl;
		}
		$diffIdx = 0;
		{
			$_g1 = 0; $_g = $baseArray->length;
			while($_g1 < $_g) {
				$idx2 = $_g1++;
				if($urlArray->length < $idx2 || $baseArray[$idx2] !== $urlArray[$idx2]) {
					$diffIdx = $idx2;
					break;
				}
				unset($idx2);
			}
		}
		$resUrl = "";
		if($baseArray->length > $diffIdx + 1) {
			$_g1 = $diffIdx; $_g = $baseArray->length - 1;
			while($_g1 < $_g) {
				$idx2 = $_g1++;
				$resUrl .= "../";
				unset($idx2);
			}
		} else {
		}
		{
			$_g1 = $diffIdx; $_g = $urlArray->length;
			while($_g1 < $_g) {
				$idx2 = $_g1++;
				$resUrl .= $urlArray[$idx2];
				if($idx2 !== $urlArray->length - 1) {
					$resUrl .= "/";
				}
				unset($idx2);
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $resUrl;
		}
		$GLOBALS['%s']->pop();
	}
	static function rel2abs($url, $base = null) {
		$GLOBALS['%s']->push("brix.util.DomTools::rel2abs");
		$製pos = $GLOBALS['%s']->length;
		if($base === null) {
			$base = brix_util_DomTools::getBaseUrl();
		}
		$url = str_replace("\\", "/", $url);
		$idxBase = _hx_index_of($url, "://", null);
		if($idxBase === -1) {
			$url = $base . $url;
		}
		$urlArray = _hx_explode("/", $url);
		$absoluteUrlArray = new _hx_array(array());
		{
			$_g1 = 0; $_g = $urlArray->length;
			while($_g1 < $_g) {
				$idx = $_g1++;
				if($urlArray[$idx] === "..") {
					$absoluteUrlArray->pop();
				} else {
					$absoluteUrlArray->push($urlArray[$idx]);
				}
				unset($idx);
			}
		}
		$url = $absoluteUrlArray->join("/");
		{
			$GLOBALS['%s']->pop();
			return $url;
		}
		$GLOBALS['%s']->pop();
	}
	static function getElementsByAttribute($elt, $attr, $value) {
		$GLOBALS['%s']->push("brix.util.DomTools::getElementsByAttribute");
		$製pos = $GLOBALS['%s']->length;
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
		{
			$GLOBALS['%s']->pop();
			return $filteredChildElts;
		}
		$GLOBALS['%s']->pop();
	}
	static function getSingleElement($rootElement, $className, $required = null) {
		$GLOBALS['%s']->push("brix.util.DomTools::getSingleElement");
		$製pos = $GLOBALS['%s']->length;
		if($required === null) {
			$required = true;
		}
		$domElements = $rootElement->getElementsByClassName($className);
		if($domElements->length > 1) {
			throw new HException("Error: search for the element with class name \"" . $className . "\" gave " . _hx_string_rec($domElements->length, "") . " results");
		}
		if($domElements !== null && $domElements->length === 1) {
			$裨mp = $domElements[0];
			$GLOBALS['%s']->pop();
			return $裨mp;
		} else {
			if($required) {
				throw new HException("Error: search for the element with class name \"" . $className . "\" gave " . _hx_string_rec($domElements->length, "") . " results");
			}
			{
				$GLOBALS['%s']->pop();
				return null;
			}
		}
		$GLOBALS['%s']->pop();
	}
	static function getElementBoundingBox($htmlDom) {
		$GLOBALS['%s']->push("brix.util.DomTools::getElementBoundingBox");
		$製pos = $GLOBALS['%s']->length;
		if($htmlDom->get_nodeType() !== 1) {
			$GLOBALS['%s']->pop();
			return null;
		}
		$offsetTop = 0;
		$offsetLeft = 0;
		$offsetWidth = 0.0;
		$offsetHeight = 0.0;
		$element = $htmlDom;
		while($element !== null) {
			$borderH = ($element->get_offsetWidth() - $element->get_clientWidth()) / 2;
			$borderV = ($element->get_offsetHeight() - $element->get_clientHeight()) / 2;
			$offsetWidth += $borderH;
			$offsetHeight += $borderV;
			$offsetWidth -= $borderH;
			$offsetHeight -= $borderV;
			$offsetTop -= Math::round($borderV / 2.0);
			$offsetLeft -= Math::round($borderH / 2.0);
			$offsetTop -= $element->get_scrollTop();
			$offsetLeft -= $element->get_scrollLeft();
			$offsetTop += $element->get_offsetTop();
			$offsetLeft += $element->get_offsetLeft();
			$element = $element->get_offsetParent();
			unset($borderV,$borderH);
		}
		{
			$裨mp = _hx_anonymous(array("x" => Math::round($offsetLeft), "y" => Math::round($offsetTop), "w" => Math::round($htmlDom->get_offsetWidth() + $offsetWidth), "h" => Math::round($htmlDom->get_offsetHeight() + $offsetHeight)));
			$GLOBALS['%s']->pop();
			return $裨mp;
		}
		$GLOBALS['%s']->pop();
	}
	static function getElementIndex($childNode) {
		$GLOBALS['%s']->push("brix.util.DomTools::getElementIndex");
		$製pos = $GLOBALS['%s']->length;
		$i = 0;
		$child = $childNode;
		while(($child = $child->get_previousSibling()) !== null) {
			$i++;
		}
		{
			$GLOBALS['%s']->pop();
			return $i;
		}
		$GLOBALS['%s']->pop();
	}
	static function moveTo($htmlDom, $x, $y) {
		$GLOBALS['%s']->push("brix.util.DomTools::moveTo");
		$製pos = $GLOBALS['%s']->length;
		$elementBox = brix_util_DomTools::getElementBoundingBox($htmlDom);
		if($x !== null) {
			$newPosX = $htmlDom->get_offsetLeft() + ($x - $elementBox->x);
			$htmlDom->style->set_left(_hx_string_rec(Math::round($newPosX), "") . "px");
		}
		if($y !== null) {
			$newPosY = $htmlDom->get_offsetTop() + ($y - $elementBox->y);
			$htmlDom->style->set_top(_hx_string_rec(Math::round($newPosY), "") . "px");
		}
		$GLOBALS['%s']->pop();
	}
	static function inspectTrace($obj, $callingClass) {
		$GLOBALS['%s']->push("brix.util.DomTools::inspectTrace");
		$製pos = $GLOBALS['%s']->length;
		{
			$_g = 0; $_g1 = Reflect::fields($obj);
			while($_g < $_g1->length) {
				$prop = $_g1[$_g];
				++$_g;
				null;
				unset($prop);
			}
		}
		null;
		$GLOBALS['%s']->pop();
	}
	static function toggleClass($element, $className) {
		$GLOBALS['%s']->push("brix.util.DomTools::toggleClass");
		$製pos = $GLOBALS['%s']->length;
		if(brix_util_DomTools::hasClass($element, $className, null)) {
			brix_util_DomTools::removeClass($element, $className);
		} else {
			brix_util_DomTools::addClass($element, $className);
		}
		$GLOBALS['%s']->pop();
	}
	static function addClass($element, $className) {
		$GLOBALS['%s']->push("brix.util.DomTools::addClass");
		$製pos = $GLOBALS['%s']->length;
		if($element->get_className() === null) {
			$element->set_className("");
		}
		Lambda::iter(_hx_explode(" ", $className), array(new _hx_lambda(array(&$className, &$element), "brix_util_DomTools_0"), 'execute'));
		$GLOBALS['%s']->pop();
	}
	static function removeClass($element, $className) {
		$GLOBALS['%s']->push("brix.util.DomTools::removeClass");
		$製pos = $GLOBALS['%s']->length;
		if($element->get_className() === null || trim($element->get_className()) === "") {
			$GLOBALS['%s']->pop();
			return;
		}
		$classNamesToKeep = new _hx_array(array());
		$cns = _hx_explode(" ", $className);
		Lambda::iter(_hx_explode(" ", $element->get_className()), array(new _hx_lambda(array(&$className, &$classNamesToKeep, &$cns, &$element), "brix_util_DomTools_1"), 'execute'));
		$element->set_className($classNamesToKeep->join(" "));
		$GLOBALS['%s']->pop();
	}
	static function hasClass($element, $className, $orderedClassName = null) {
		$GLOBALS['%s']->push("brix.util.DomTools::hasClass");
		$製pos = $GLOBALS['%s']->length;
		if($orderedClassName === null) {
			$orderedClassName = false;
		}
		if($element->get_className() === null || trim($element->get_className()) === "" || $className === null || trim($className) === "") {
			$GLOBALS['%s']->pop();
			return false;
		}
		if($orderedClassName) {
			$cns = _hx_explode(" ", $className);
			$ecns = _hx_explode(" ", $element->get_className());
			$result = Lambda::map($cns, array(new _hx_lambda(array(&$className, &$cns, &$ecns, &$element, &$orderedClassName), "brix_util_DomTools_2"), 'execute'));
			$prevR = 0;
			if(null == $result) throw new HException('null iterable');
			$蜴t = $result->iterator();
			while($蜴t->hasNext()) {
				$r = $蜴t->next();
				if($r < $prevR) {
					$GLOBALS['%s']->pop();
					return false;
				}
				$prevR = $r;
			}
			{
				$GLOBALS['%s']->pop();
				return true;
			}
		} else {
			{
				$_g = 0; $_g1 = _hx_explode(" ", $className);
				while($_g < $_g1->length) {
					$cn = $_g1[$_g];
					++$_g;
					if($cn === null || trim($cn) === "") {
						continue;
					}
					$found = Lambda::has(_hx_explode(" ", $element->get_className()), $cn, null);
					if(!$found) {
						$GLOBALS['%s']->pop();
						return false;
					}
					unset($found,$cn);
				}
			}
			{
				$GLOBALS['%s']->pop();
				return true;
			}
		}
		$GLOBALS['%s']->pop();
	}
	static function setMeta($metaName, $metaValue, $attributeName = null, $head = null) {
		$GLOBALS['%s']->push("brix.util.DomTools::setMeta");
		$製pos = $GLOBALS['%s']->length;
		if($attributeName === null) {
			$attributeName = "content";
		}
		$res = new Hash();
		if($head === null) {
			$head = _hx_array_get(cocktail_Lib::get_document()->documentElement->getElementsByTagName("head"), 0);
		}
		$metaTags = $head->getElementsByTagName("META");
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
			$head->appendChild($node);
			$res->set($metaName, $metaValue);
		}
		{
			$GLOBALS['%s']->pop();
			return $res;
		}
		$GLOBALS['%s']->pop();
	}
	static function getMeta($name, $attributeName = null, $head = null) {
		$GLOBALS['%s']->push("brix.util.DomTools::getMeta");
		$製pos = $GLOBALS['%s']->length;
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
					$GLOBALS['%s']->pop();
					return $configValue;
				}
				unset($node,$idxNode,$configValue,$configName);
			}
		}
		{
			$GLOBALS['%s']->pop();
			return null;
		}
		$GLOBALS['%s']->pop();
	}
	static function addCssRules($css, $head = null) {
		$GLOBALS['%s']->push("brix.util.DomTools::addCssRules");
		$製pos = $GLOBALS['%s']->length;
		if($head === null) {
			$head = _hx_array_get(cocktail_Lib::get_document()->documentElement->getElementsByTagName("head"), 0);
		}
		$node = cocktail_Lib::get_document()->createElement("style");
		$node->setAttribute("type", "text/css");
		$node->appendChild(cocktail_Lib::get_document()->createTextNode($css));
		$head->appendChild($node);
		{
			$裨mp = $node;
			$GLOBALS['%s']->pop();
			return $裨mp;
		}
		$GLOBALS['%s']->pop();
	}
	static function embedScript($src) {
		$GLOBALS['%s']->push("brix.util.DomTools::embedScript");
		$製pos = $GLOBALS['%s']->length;
		$head = _hx_array_get(cocktail_Lib::get_document()->getElementsByTagName("head"), 0);
		$scriptNodes = cocktail_Lib::get_document()->getElementsByTagName("script");
		{
			$_g1 = 0; $_g = $scriptNodes->length;
			while($_g1 < $_g) {
				$idxNode = $_g1++;
				$node = $scriptNodes[$idxNode];
				if($node->getAttribute("src") === $src) {
					$GLOBALS['%s']->pop();
					return $node;
				}
				unset($node,$idxNode);
			}
		}
		$node = cocktail_Lib::get_document()->createElement("script");
		$node->setAttribute("src", $src);
		$head->appendChild($node);
		{
			$裨mp = $node;
			$GLOBALS['%s']->pop();
			return $裨mp;
		}
		$GLOBALS['%s']->pop();
	}
	static function getBaseTag() {
		$GLOBALS['%s']->push("brix.util.DomTools::getBaseTag");
		$製pos = $GLOBALS['%s']->length;
		$baseNodes = cocktail_Lib::get_document()->getElementsByTagName("base");
		if($baseNodes->length > 0) {
			$裨mp = _hx_array_get($baseNodes, 0)->getAttribute("href");
			$GLOBALS['%s']->pop();
			return $裨mp;
		} else {
			$GLOBALS['%s']->pop();
			return null;
		}
		$GLOBALS['%s']->pop();
	}
	static function setBaseTag($href) {
		$GLOBALS['%s']->push("brix.util.DomTools::setBaseTag");
		$製pos = $GLOBALS['%s']->length;
		$head = _hx_array_get(cocktail_Lib::get_document()->getElementsByTagName("head"), 0);
		$baseNodes = cocktail_Lib::get_document()->getElementsByTagName("base");
		$href = brix_util_DomTools::rel2abs($href, null);
		if($baseNodes->length > 0) {
			_hx_array_get($baseNodes, 0)->setAttribute("href", $href);
		} else {
			$node = cocktail_Lib::get_document()->createElement("base");
			$node->setAttribute("href", $href);
			if($head->childNodes->length > 0) {
				$head->insertBefore($node, $head->childNodes[0]);
			} else {
				$head->appendChild($node);
			}
		}
		$GLOBALS['%s']->pop();
	}
	static function removeBaseTag() {
		$GLOBALS['%s']->push("brix.util.DomTools::removeBaseTag");
		$製pos = $GLOBALS['%s']->length;
		$baseNodes = cocktail_Lib::get_document()->getElementsByTagName("base");
		while($baseNodes->length > 0) {
			_hx_array_get($baseNodes, 0)->parentNode->removeChild($baseNodes[0]);
		}
		$GLOBALS['%s']->pop();
	}
	static function getBaseUrl() {
		$GLOBALS['%s']->push("brix.util.DomTools::getBaseUrl");
		$製pos = $GLOBALS['%s']->length;
		$base = brix_util_DomTools::getBaseTag();
		{
			$GLOBALS['%s']->pop();
			return $base;
		}
		$GLOBALS['%s']->pop();
	}
	static function isUndefined($value) {
		$GLOBALS['%s']->push("brix.util.DomTools::isUndefined");
		$製pos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'brix.util.DomTools'; }
}
function brix_util_DomTools_0(&$className, &$element, $cn) {
	$製pos = $GLOBALS['%s']->length;
	{
		$GLOBALS['%s']->push("brix.util.DomTools::addClass@359");
		$製pos2 = $GLOBALS['%s']->length;
		if(!Lambda::has(_hx_explode(" ", $element->get_className()), $cn, null)) {
			if($element->get_className() !== "") {
				$_g = $element;
				$_g->set_className($_g->get_className() . " ");
			}
			{
				$_g = $element;
				$_g->set_className($_g->get_className() . $cn);
			}
		}
		$GLOBALS['%s']->pop();
	}
}
function brix_util_DomTools_1(&$className, &$classNamesToKeep, &$cns, &$element, $ecn) {
	$製pos = $GLOBALS['%s']->length;
	{
		$GLOBALS['%s']->push("brix.util.DomTools::removeClass@374");
		$製pos2 = $GLOBALS['%s']->length;
		if(!Lambda::has($cns, $ecn, null)) {
			$classNamesToKeep->push($ecn);
		}
		$GLOBALS['%s']->pop();
	}
}
function brix_util_DomTools_2(&$className, &$cns, &$ecns, &$element, &$orderedClassName, $cn) {
	$製pos = $GLOBALS['%s']->length;
	{
		$GLOBALS['%s']->push("brix.util.DomTools::hasClass@399");
		$製pos2 = $GLOBALS['%s']->length;
		{
			$裨mp = Lambda::indexOf($ecns, $cn);
			$GLOBALS['%s']->pop();
			return $裨mp;
		}
		$GLOBALS['%s']->pop();
	}
}

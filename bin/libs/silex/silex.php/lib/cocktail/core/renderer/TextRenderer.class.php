<?php

class cocktail_core_renderer_TextRenderer extends cocktail_core_renderer_InvalidatingElementRenderer {
	public function __construct($node) {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.renderer.TextRenderer::new");
		$»spos = $GLOBALS['%s']->length;
		parent::__construct($node);
		$this->_text = $node;
		$this->_textNeedsRendering = true;
		$this->_textTokensNeedParsing = true;
		$GLOBALS['%s']->pop();
	}}
	public function isInlineLevel() {
		$GLOBALS['%s']->push("cocktail.core.renderer.TextRenderer::isInlineLevel");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return true;
		}
		$GLOBALS['%s']->pop();
	}
	public function isText() {
		$GLOBALS['%s']->push("cocktail.core.renderer.TextRenderer::isText");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return true;
		}
		$GLOBALS['%s']->pop();
	}
	public function isPositioned() {
		$GLOBALS['%s']->push("cocktail.core.renderer.TextRenderer::isPositioned");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function isFloat() {
		$GLOBALS['%s']->push("cocktail.core.renderer.TextRenderer::isFloat");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function createTextLineBoxFromTextToken($textToken, $fontMetrics, $fontManager) {
		$GLOBALS['%s']->push("cocktail.core.renderer.TextRenderer::createTextLineBoxFromTextToken");
		$»spos = $GLOBALS['%s']->length;
		$text = null;
		$textLineBox = null;
		$»t = ($textToken);
		switch($»t->index) {
		case 0:
		$value = $»t->params[0];
		{
			$text = $value;
			$textLineBox = new cocktail_core_linebox_TextLineBox($this, $text, $fontMetrics, $fontManager);
		}break;
		case 1:
		{
			$textLineBox = new cocktail_core_linebox_SpaceLineBox($this, $fontMetrics, $fontManager);
		}break;
		case 2:
		{
			$textLineBox = new cocktail_core_linebox_TextLineBox($this, "", $fontMetrics, $fontManager);
		}break;
		case 3:
		{
			$textLineBox = new cocktail_core_linebox_TextLineBox($this, "", $fontMetrics, $fontManager);
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $textLineBox;
		}
		$GLOBALS['%s']->pop();
	}
	public function createTextLines() {
		$GLOBALS['%s']->push("cocktail.core.renderer.TextRenderer::createTextLines");
		$»spos = $GLOBALS['%s']->length;
		if($this->_textTokensNeedParsing === true) {
			$processedText = $this->_text->get_nodeValue();
			$processedText = $this->applyWhiteSpace($processedText, $this->coreStyle->getKeyword(_hx_deref((cocktail_core_renderer_TextRenderer_0($this, $processedText)))->typedValue));
			$processedText = $this->applyTextTransform($processedText, $this->coreStyle->getKeyword(_hx_deref((cocktail_core_renderer_TextRenderer_1($this, $processedText)))->typedValue));
			$this->_textTokens = $this->doGetTextTokens($processedText);
		}
		$this->lineBoxes = new _hx_array(array());
		$fontMetrics = $this->coreStyle->fontMetrics;
		$fontManager = cocktail_core_font_FontManager::getInstance();
		$length = $this->_textTokens->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				$this->lineBoxes->push($this->createTextLineBoxFromTextToken($this->_textTokens[$i], $fontMetrics, $fontManager));
				unset($i);
			}
		}
		$GLOBALS['%s']->pop();
	}
	public function capitalizeText($text) {
		$GLOBALS['%s']->push("cocktail.core.renderer.TextRenderer::capitalizeText");
		$»spos = $GLOBALS['%s']->length;
		$capitalizedText = "";
		{
			$_g1 = 0; $_g = strlen($text);
			while($_g1 < $_g) {
				$i = $_g1++;
				if($i === 0) {
					$capitalizedText .= strtoupper(_hx_char_at($text, $i));
				} else {
					$capitalizedText .= _hx_char_at($text, $i);
				}
				unset($i);
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $capitalizedText;
		}
		$GLOBALS['%s']->pop();
	}
	public function applyTextTransform($text, $textTransform) {
		$GLOBALS['%s']->push("cocktail.core.renderer.TextRenderer::applyTextTransform");
		$»spos = $GLOBALS['%s']->length;
		$»t = ($textTransform);
		switch($»t->index) {
		case 16:
		{
			$text = strtoupper($text);
		}break;
		case 17:
		{
			$text = strtolower($text);
		}break;
		case 15:
		{
			$text = $this->capitalizeText($text);
		}break;
		case 18:
		{
		}break;
		default:{
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $text;
		}
		$GLOBALS['%s']->pop();
	}
	public function applyWhiteSpace($text, $whiteSpace) {
		$GLOBALS['%s']->push("cocktail.core.renderer.TextRenderer::applyWhiteSpace");
		$»spos = $GLOBALS['%s']->length;
		$»t = ($whiteSpace);
		switch($»t->index) {
		case 0:
		case 8:
		{
			$er1 = new EReg("[ \x09]+", "");
			$er2 = new EReg("\x0D+", "g");
			$er3 = new EReg("\x0A+", "g");
			$er4 = new EReg("\\s+", "g");
			$text = $er4->replace($er3->replace($er2->replace($er1->replace($text, " "), " "), " "), " ");
		}break;
		case 10:
		{
			$er1 = new EReg(" *\$^ *", "m");
			$er2 = new EReg("[ \x09]+", "");
			$text = $er2->replace($er1->replace($text, "\x0A"), " ");
		}break;
		default:{
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $text;
		}
		$GLOBALS['%s']->pop();
	}
	public function doGetTextTokens($text) {
		$GLOBALS['%s']->push("cocktail.core.renderer.TextRenderer::doGetTextTokens");
		$»spos = $GLOBALS['%s']->length;
		$textTokens = new _hx_array(array());
		$textToken = null;
		$lastCharacterIsSpace = false;
		$i = 0;
		while($i < strlen($text)) {
			if(_hx_char_at($text, $i) === "\\") {
				if($i < strlen($text) - 1) {
					if(_hx_char_at($text, $i + 1) === "n") {
						if($textToken !== null) {
							$textTokens->push(cocktail_core_renderer_TextToken::word($textToken));
							$textToken = null;
						}
						$textTokens->push(cocktail_core_renderer_TextToken::$lineFeed);
						$i++;
					} else {
						if(_hx_char_at($text, $i + 1) === "t") {
							if($textToken !== null) {
								$textTokens->push(cocktail_core_renderer_TextToken::word($textToken));
								$textToken = null;
							}
							$textTokens->push(cocktail_core_renderer_TextToken::$tab);
							$i++;
						}
					}
				}
			} else {
				if(StringTools::isSpace($text, $i) === true) {
					if($textToken !== null) {
						$textTokens->push(cocktail_core_renderer_TextToken::word($textToken));
						$textToken = null;
					}
					$textTokens->push(cocktail_core_renderer_TextToken::$space);
					$lastCharacterIsSpace = true;
				} else {
					$lastCharacterIsSpace = false;
					if($textToken === null) {
						$textToken = "";
					}
					$textToken .= _hx_char_at($text, $i);
				}
			}
			$i++;
		}
		if($textToken !== null) {
			$textTokens->push(cocktail_core_renderer_TextToken::word($textToken));
		}
		{
			$GLOBALS['%s']->pop();
			return $textTokens;
		}
		$GLOBALS['%s']->pop();
	}
	public function updateBounds() {
		$GLOBALS['%s']->push("cocktail.core.renderer.TextRenderer::updateBounds");
		$»spos = $GLOBALS['%s']->length;
		$this->getLineBoxesBounds($this->lineBoxes, $this->get_bounds());
		$GLOBALS['%s']->pop();
	}
	public function invalidate() {
		$GLOBALS['%s']->push("cocktail.core.renderer.TextRenderer::invalidate");
		$»spos = $GLOBALS['%s']->length;
		$this->_textNeedsRendering = true;
		$GLOBALS['%s']->pop();
	}
	public function layout($forceLayout) {
		$GLOBALS['%s']->push("cocktail.core.renderer.TextRenderer::layout");
		$»spos = $GLOBALS['%s']->length;
		if($this->_textNeedsRendering === true) {
			$this->createTextLines();
			$this->_textNeedsRendering = false;
		}
		$GLOBALS['%s']->pop();
	}
	public function initCoreStyle() {
		$GLOBALS['%s']->push("cocktail.core.renderer.TextRenderer::initCoreStyle");
		$»spos = $GLOBALS['%s']->length;
		$this->coreStyle = $this->domNode->parentNode->coreStyle;
		$GLOBALS['%s']->pop();
	}
	public $_textTokensNeedParsing;
	public $_textNeedsRendering;
	public $_text;
	public $_textTokens;
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
	static $__properties__ = array("get_bounds" => "get_bounds","get_globalBounds" => "get_globalBounds","get_scrollableBounds" => "get_scrollableBounds","set_scrollLeft" => "set_scrollLeft","get_scrollLeft" => "get_scrollLeft","set_scrollTop" => "set_scrollTop","get_scrollTop" => "get_scrollTop","get_scrollWidth" => "get_scrollWidth","get_scrollHeight" => "get_scrollHeight");
	function __toString() { return 'cocktail.core.renderer.TextRenderer'; }
}
function cocktail_core_renderer_TextRenderer_0(&$»this, &$processedText) {
	$»spos = $GLOBALS['%s']->length;
	{
		$_this = $»this->coreStyle->computedValues;
		$typedProperty = null;
		$length = $_this->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($_this->_properties, $i)->name === "white-space") {
					$typedProperty = $_this->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}
function cocktail_core_renderer_TextRenderer_1(&$»this, &$processedText) {
	$»spos = $GLOBALS['%s']->length;
	{
		$_this = $»this->coreStyle->computedValues;
		$typedProperty = null;
		$length = $_this->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($_this->_properties, $i)->name === "text-transform") {
					$typedProperty = $_this->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}

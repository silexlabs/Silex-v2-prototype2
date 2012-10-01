<?php

class cocktail_core_css_CSSStyleRule extends cocktail_core_css_CSSRule {
	public function __construct($parentStyleSheet = null, $parentRule = null) {
		if(!php_Boot::$skip_constructor) {
		parent::__construct($parentStyleSheet,$parentRule);
		$this->style = new cocktail_core_css_CSSStyleDeclaration($this, null);
		$this->_selectorParser = new cocktail_core_css_parsers_CSSSelectorParser();
		$this->selectors = new _hx_array(array());
	}}
	public function set_selectorText($value) {
		$this->selectors = new _hx_array(array());
		$this->_selectorParser->parseSelector($value, $this->selectors);
		return $value;
	}
	public function get_selectorText() {
		return $this->serializeSelectors($this->selectors);
	}
	public function get_type() {
		return 1;
	}
	public function get_cssText() {
		return $this->serializeStyleRule();
	}
	public function set_cssText($value) {
		$this->parse($value);
		return $value;
	}
	public function serializeSelectors($selectors) {
		$serializedSelectors = "";
		{
			$_g1 = 0; $_g = $selectors->length;
			while($_g1 < $_g) {
				$i = $_g1++;
				$selector = $selectors[$i];
				$serializedSelectors .= cocktail_core_css_parsers_SelectorSerializer::serialize($selector);
				if($i < $selectors->length - 1) {
					$serializedSelectors .= ", ";
				}
				unset($selector,$i);
			}
		}
		return $serializedSelectors;
	}
	public function serializeStyleRule() {
		$serializedStyleRule = $this->serializeSelectors($this->selectors);
		$serializedStyleRule .= "{" . $this->style->get_cssText() . "}";
		return $serializedStyleRule;
	}
	public function parse($css) {
		$this->selectors = new _hx_array(array());
		$state = cocktail_core_css_parsers_StyleRuleParserState::$IGNORE_SPACES;
		$next = cocktail_core_css_parsers_StyleRuleParserState::$BEGIN_SELECTOR;
		$start = 0;
		$position = 0;
		$c = ord(substr($css,$position,1));
		while(!($c === 0)) {
			$»t = ($state);
			switch($»t->index) {
			case 0:
			{
				switch($c) {
				case 10:case 13:case 9:case 32:{
				}break;
				default:{
					$state = $next;
					continue 3;
				}break;
				}
			}break;
			case 1:
			{
				$state = cocktail_core_css_parsers_StyleRuleParserState::$SELECTOR;
				$next = cocktail_core_css_parsers_StyleRuleParserState::$END_SELECTOR;
				$start = $position;
				continue 2;
			}break;
			case 3:
			{
				if(!($c >= 97 && $c <= 122 || $c >= 65 && $c <= 90 || $c >= 48 && $c <= 57 || $c === 58 || $c === 46 || $c === 42)) {
					switch($c) {
					case 123:{
						$state = cocktail_core_css_parsers_StyleRuleParserState::$END_SELECTOR;
						$next = cocktail_core_css_parsers_StyleRuleParserState::$BEGIN_STYLES;
						continue 3;
					}break;
					case 44:{
						$state = cocktail_core_css_parsers_StyleRuleParserState::$END_SELECTOR;
						$next = cocktail_core_css_parsers_StyleRuleParserState::$BEGIN_SELECTOR;
						continue 3;
					}break;
					}
				}
			}break;
			case 2:
			{
				$selector = _hx_substr($css, $start, $position - $start);
				$this->_selectorParser->parseSelector($selector, $this->selectors);
				$state = $next;
			}break;
			case 4:
			{
				$state = cocktail_core_css_parsers_StyleRuleParserState::$STYLES;
				$next = cocktail_core_css_parsers_StyleRuleParserState::$END_STYLES;
				$start = $position;
				continue 2;
			}break;
			case 5:
			{
				if(!($c >= 97 && $c <= 122 || $c >= 65 && $c <= 90 || $c >= 48 && $c <= 57 || $c === 58 || $c === 40 || $c === 41)) {
					switch($c) {
					case 125:{
						$state = $next;
						continue 3;
					}break;
					}
				}
			}break;
			case 6:
			{
				$styleDeclaration = _hx_substr($css, $start, $position - $start);
				$this->style->set_cssText($styleDeclaration);
				$state = cocktail_core_css_parsers_StyleRuleParserState::$IGNORE_SPACES;
				$next = cocktail_core_css_parsers_StyleRuleParserState::$IGNORE_SPACES;
			}break;
			}
			$c = ord(substr($css,++$position,1));
		}
	}
	public $_selectorParser;
	public $style;
	public $selectors;
	public $selectorText;
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
	static function isSelectorChar($c) {
		return $c >= 97 && $c <= 122 || $c >= 65 && $c <= 90 || $c >= 48 && $c <= 57 || $c === 58 || $c === 46 || $c === 42;
	}
	static function isStyleChar($c) {
		return $c >= 97 && $c <= 122 || $c >= 65 && $c <= 90 || $c >= 48 && $c <= 57 || $c === 58 || $c === 40 || $c === 41;
	}
	static function isAsciiChar($c) {
		return $c >= 97 && $c <= 122 || $c >= 65 && $c <= 90 || $c >= 48 && $c <= 57;
	}
	static $__properties__ = array("set_selectorText" => "set_selectorText","get_selectorText" => "get_selectorText","get_type" => "get_type","set_cssText" => "set_cssText","get_cssText" => "get_cssText");
	function __toString() { return 'cocktail.core.css.CSSStyleRule'; }
}

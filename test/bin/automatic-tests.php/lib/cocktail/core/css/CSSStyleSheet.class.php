<?php

class cocktail_core_css_CSSStyleSheet extends cocktail_core_css_StyleSheet {
	public function __construct($stylesheet, $origin, $ownerNode = null, $href = null, $parentStyleSheet = null, $ownerRule = null) {
		if(!php_Boot::$skip_constructor) {
		parent::__construct($stylesheet,$ownerNode,$href,$parentStyleSheet);
		$this->cssRules = new _hx_array(array());
		$this->ownerRule = $ownerRule;
		$this->origin = $origin;
		$this->_cssRulesParser = new cocktail_core_css_parsers_CSSRulesParser();
		$rules = $this->_cssRulesParser->parseRules($stylesheet);
		{
			$_g1 = 0; $_g = $rules->length;
			while($_g1 < $_g) {
				$i = $_g1++;
				$this->insertRule($rules[$i], $this->cssRules->length - 1);
				unset($i);
			}
		}
	}}
	public function deleteRule($index) {
		$this->cssRules->remove($this->cssRules[$index]);
	}
	public function insertRule($rule, $index) {
		$cssRule = $this->_cssRulesParser->parseRule($rule, $this);
		$this->cssRules->insert($index, $cssRule);
		return $index;
	}
	public $origin;
	public $_cssRulesParser;
	public $cssRules;
	public $ownerRule;
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
	function __toString() { return 'cocktail.core.css.CSSStyleSheet'; }
}

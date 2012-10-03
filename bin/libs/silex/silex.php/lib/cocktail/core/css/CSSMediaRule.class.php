<?php

class cocktail_core_css_CSSMediaRule extends cocktail_core_css_CSSRule {
	public function __construct($parentStyleSheet = null, $parentRule = null) {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSMediaRule::new");
		$»spos = $GLOBALS['%s']->length;
		parent::__construct($parentStyleSheet,$parentRule);
		$GLOBALS['%s']->pop();
	}}
	public function deleteRule($index) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSMediaRule::deleteRule");
		$»spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public function insertRule($rule, $index) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSMediaRule::insertRule");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return -1;
		}
		$GLOBALS['%s']->pop();
	}
	public $cssRules;
	public $media;
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
	static $__properties__ = array("get_type" => "get_type","set_cssText" => "set_cssText","get_cssText" => "get_cssText");
	function __toString() { return 'cocktail.core.css.CSSMediaRule'; }
}

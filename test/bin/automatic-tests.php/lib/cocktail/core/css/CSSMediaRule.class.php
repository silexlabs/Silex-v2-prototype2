<?php

class cocktail_core_css_CSSMediaRule extends cocktail_core_css_CSSRule {
	public function __construct($parentStyleSheet = null, $parentRule = null) {
		if(!php_Boot::$skip_constructor) {
		parent::__construct($parentStyleSheet,$parentRule);
	}}
	public function deleteRule($index) {
	}
	public function insertRule($rule, $index) {
		return -1;
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

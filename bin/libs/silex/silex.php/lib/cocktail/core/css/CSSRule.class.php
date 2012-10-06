<?php

class cocktail_core_css_CSSRule {
	public function __construct($parentStyleSheet = null, $parentRule = null) {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSRule::new");
		$»spos = $GLOBALS['%s']->length;
		$this->parentStyleSheet = $parentStyleSheet;
		$this->parentRule = $parentRule;
		$GLOBALS['%s']->pop();
	}}
	public function get_type() {
		$GLOBALS['%s']->push("cocktail.core.css.CSSRule::get_type");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return -1;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_cssText($value) {
		$GLOBALS['%s']->push("cocktail.core.css.CSSRule::set_cssText");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->cssText = $value;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_cssText() {
		$GLOBALS['%s']->push("cocktail.core.css.CSSRule::get_cssText");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->cssText;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public $parentStyleSheet;
	public $parentRule;
	public $cssText;
	public $type;
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
	static $STYLE_RULE = 1;
	static $IMPORT_RULE = 3;
	static $MEDIA_RULE = 4;
	static $FONT_FACE_RULE = 5;
	static $__properties__ = array("get_type" => "get_type","set_cssText" => "set_cssText","get_cssText" => "get_cssText");
	function __toString() { return 'cocktail.core.css.CSSRule'; }
}

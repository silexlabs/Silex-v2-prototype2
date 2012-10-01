<?php

class cocktail_core_css_SelectorVO {
	public function __construct($components, $pseudoElement) {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.css.SelectorVO::new");
		$»spos = $GLOBALS['%s']->length;
		$this->components = $components;
		$this->pseudoElement = $pseudoElement;
		$GLOBALS['%s']->pop();
	}}
	public $pseudoElement;
	public $components;
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
	function __toString() { return 'cocktail.core.css.SelectorVO'; }
}

<?php

class cocktail_core_css_PropertyVO {
	public function __construct($selector, $typedValue, $origin, $important) {
		if(!php_Boot::$skip_constructor) {
		$this->important = $important;
		$this->origin = $origin;
		$this->typedValue = $typedValue;
		$this->selector = $selector;
	}}
	public $selector;
	public $typedValue;
	public $origin;
	public $important;
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
	function __toString() { return 'cocktail.core.css.PropertyVO'; }
}

<?php

class cocktail_core_css_TypedPropertyVO {
	public function __construct($name, $typedValue, $important) {
		if(!php_Boot::$skip_constructor) {
		$this->name = $name;
		$this->typedValue = $typedValue;
		$this->important = $important;
	}}
	public $important;
	public $typedValue;
	public $name;
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
	function __toString() { return 'cocktail.core.css.TypedPropertyVO'; }
}

<?php

class cocktail_core_layout_ContainingBlockVO {
	public function __construct($width, $isWidthAuto, $height, $isHeightAuto) {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.layout.ContainingBlockVO::new");
		$»spos = $GLOBALS['%s']->length;
		$this->width = $width;
		$this->isWidthAuto = $isWidthAuto;
		$this->height = $height;
		$this->isHeightAuto = $isHeightAuto;
		$GLOBALS['%s']->pop();
	}}
	public $isHeightAuto;
	public $height;
	public $isWidthAuto;
	public $width;
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
	function __toString() { return 'cocktail.core.layout.ContainingBlockVO'; }
}

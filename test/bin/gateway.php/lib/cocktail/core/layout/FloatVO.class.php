<?php

class cocktail_core_layout_FloatVO {
	public function __construct($node, $bounds) {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.layout.FloatVO::new");
		$»spos = $GLOBALS['%s']->length;
		$this->node = $node;
		$this->bounds = $bounds;
		$GLOBALS['%s']->pop();
	}}
	public $bounds;
	public $node;
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
	function __toString() { return 'cocktail.core.layout.FloatVO'; }
}

<?php

class cocktail_core_layout_FloatsVO {
	public function __construct($left, $right) {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.layout.FloatsVO::new");
		$»spos = $GLOBALS['%s']->length;
		$this->left = $left;
		$this->right = $right;
		$GLOBALS['%s']->pop();
	}}
	public $right;
	public $left;
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
	function __toString() { return 'cocktail.core.layout.FloatsVO'; }
}

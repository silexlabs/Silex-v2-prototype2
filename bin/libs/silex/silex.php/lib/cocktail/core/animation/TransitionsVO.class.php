<?php

class cocktail_core_animation_TransitionsVO {
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.animation.TransitionsVO::new");
		$�spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}}
	public $propertyName;
	public $transitions;
	public function __call($m, $a) {
		if(isset($this->$m) && is_callable($this->$m))
			return call_user_func_array($this->$m, $a);
		else if(isset($this->�dynamics[$m]) && is_callable($this->�dynamics[$m]))
			return call_user_func_array($this->�dynamics[$m], $a);
		else if('toString' == $m)
			return $this->__toString();
		else
			throw new HException('Unable to call �'.$m.'�');
	}
	function __toString() { return 'cocktail.core.animation.TransitionsVO'; }
}

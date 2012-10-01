<?php

class cocktail_core_geom_PointVO {
	public function __construct($x, $y) {
		if(!php_Boot::$skip_constructor) {
		$this->x = $x;
		$this->y = $y;
	}}
	public $y;
	public $x;
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
	function __toString() { return 'cocktail.core.geom.PointVO'; }
}

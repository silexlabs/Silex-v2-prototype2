<?php

class cocktail_core_geom_RectangleVO {
	public function __construct($x, $y, $width, $height) {
		if(!php_Boot::$skip_constructor) {
		$this->x = $x;
		$this->y = $y;
		$this->width = $width;
		$this->height = $height;
	}}
	public $height;
	public $width;
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
	function __toString() { return 'cocktail.core.geom.RectangleVO'; }
}

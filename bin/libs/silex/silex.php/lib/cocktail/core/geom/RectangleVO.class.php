<?php

class cocktail_core_geom_RectangleVO implements cocktail_core_utils_IPoolable{
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.geom.RectangleVO::new");
		$»spos = $GLOBALS['%s']->length;
		$this->reset();
		$GLOBALS['%s']->pop();
	}}
	public function reset() {
		$GLOBALS['%s']->push("cocktail.core.geom.RectangleVO::reset");
		$»spos = $GLOBALS['%s']->length;
		$this->x = 0;
		$this->y = 0;
		$this->width = 0;
		$this->height = 0;
		$GLOBALS['%s']->pop();
	}
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
	static $_pool;
	static function getPool() {
		$GLOBALS['%s']->push("cocktail.core.geom.RectangleVO::getPool");
		$»spos = $GLOBALS['%s']->length;
		if(cocktail_core_geom_RectangleVO::$_pool === null) {
			cocktail_core_geom_RectangleVO::$_pool = new cocktail_core_utils_ObjectPool(_hx_qtype("cocktail.core.geom.RectangleVO"));
		}
		{
			$»tmp = cocktail_core_geom_RectangleVO::$_pool;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'cocktail.core.geom.RectangleVO'; }
}

<?php

class cocktail_core_geom_CubicBezier {
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.geom.CubicBezier::new");
		$»spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}}
	public function bezierY($t) {
		$GLOBALS['%s']->push("cocktail.core.geom.CubicBezier::bezierY");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $t * ($this->_cy + $t * ($this->_by + $t * $this->_ay));
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function bezierX($t) {
		$GLOBALS['%s']->push("cocktail.core.geom.CubicBezier::bezierX");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $t * ($this->_cx + $t * ($this->_bx + $t * $this->_ax));
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function init($x1, $y1, $x2, $y2) {
		$GLOBALS['%s']->push("cocktail.core.geom.CubicBezier::init");
		$»spos = $GLOBALS['%s']->length;
		$this->_x1 = $x1;
		$this->_y1 = $y1;
		$this->_x2 = $x2;
		$this->_y2 = $y2;
		$this->_cx = 3 * $this->_x1;
		$this->_bx = 3 * ($this->_x2 - $this->_x1) - $this->_cx;
		$this->_ax = 1 - $this->_cx - $this->_bx;
		$this->_cy = 3 * $this->_y1;
		$this->_by = 3 * ($this->_y2 - $this->_y1) - $this->_cy;
		$this->_ay = 1 - $this->_cy - $this->_by;
		$GLOBALS['%s']->pop();
	}
	public $_ay;
	public $_by;
	public $_cy;
	public $_ax;
	public $_bx;
	public $_cx;
	public $_y2;
	public $_x2;
	public $_y1;
	public $_x1;
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
	function __toString() { return 'cocktail.core.geom.CubicBezier'; }
}

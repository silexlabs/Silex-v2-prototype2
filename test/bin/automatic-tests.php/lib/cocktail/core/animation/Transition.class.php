<?php

class cocktail_core_animation_Transition {
	public function __construct($propertyName, $target, $transitionDuration, $transitionDelay, $transitionTimingFunction, $startValue, $endValue, $onComplete, $onUpdate, $invalidationReason) {
		if(!php_Boot::$skip_constructor) {
		$this->invalidationReason = $invalidationReason;
		$this->_transitionDelay = $transitionDelay;
		$this->transitionDuration = $transitionDuration;
		$this->_transitionTimingFunction = $transitionTimingFunction;
		$this->_startValue = $startValue;
		$this->_endValue = $endValue;
		$this->target = $target;
		$this->propertyName = $propertyName;
		$this->onComplete = $onComplete;
		$this->onUpdate = $onUpdate;
		$this->_elapsedTime = 0;
		$this->_cubicBezier = new cocktail_core_geom_CubicBezier();
	}}
	public function get_currentValue() {
		$transitionTime = $this->_elapsedTime - $this->_transitionDelay;
		if($transitionTime < 0) {
			return $this->_startValue;
		}
		$completePercent = $transitionTime / $this->transitionDuration;
		$»t = ($this->_transitionTimingFunction);
		switch($»t->index) {
		case 4:
		$value = $»t->params[0];
		{
			$»t2 = ($value);
			switch($»t2->index) {
			case 49:
			{
				$this->_cubicBezier->init(0.25, 0.1, 0.25, 1.0);
				return ($this->_endValue - $this->_startValue) * $this->_cubicBezier->bezierY($completePercent) + $this->_startValue;
			}break;
			case 51:
			{
				$this->_cubicBezier->init(0.25, 0.1, 0.25, 1.0);
				return ($this->_endValue - $this->_startValue) * $this->_cubicBezier->bezierY($completePercent) + $this->_startValue;
			}break;
			case 52:
			{
				$this->_cubicBezier->init(0.25, 0.1, 0.25, 1.0);
				return ($this->_endValue - $this->_startValue) * $this->_cubicBezier->bezierY($completePercent) + $this->_startValue;
			}break;
			case 53:
			{
				$this->_cubicBezier->init(0.25, 0.1, 0.25, 1.0);
				return ($this->_endValue - $this->_startValue) * $this->_cubicBezier->bezierY($completePercent) + $this->_startValue;
			}break;
			case 54:
			{
				return $this->_endValue - $this->_startValue + $this->_startValue;
			}break;
			case 55:
			{
				return ($this->_endValue - $this->_startValue) * 0 + $this->_startValue;
			}break;
			case 50:
			{
				return ($this->_endValue - $this->_startValue) * $completePercent + $this->_startValue;
			}break;
			default:{
				throw new HException("Illegal keyword value for transition timing function style");
			}break;
			}
		}break;
		case 19:
		$y2 = $»t->params[3]; $x2 = $»t->params[2]; $y1 = $»t->params[1]; $x1 = $»t->params[0];
		{
			$this->_cubicBezier->init($x1, $y1, $x2, $y2);
			return ($this->_endValue - $this->_startValue) * $this->_cubicBezier->bezierY($completePercent) + $this->_startValue;
		}break;
		case 18:
		$intervalChange = $»t->params[1]; $intervalNumbers = $»t->params[0];
		{
			return ($this->_endValue - $this->_startValue) * $completePercent + $this->_startValue;
		}break;
		default:{
			throw new HException("Illegal value for transition timing function style");
		}break;
		}
	}
	public function get_complete() {
		if($this->_elapsedTime >= $this->_transitionDelay + $this->transitionDuration) {
			return true;
		}
		return false;
	}
	public function dispose() {
		$this->onComplete = null;
		$this->onUpdate = null;
		$this->_transitionTimingFunction = null;
	}
	public function updateTime($delta) {
		$this->_elapsedTime += $delta;
	}
	public $invalidationReason;
	public $complete;
	public $target;
	public $transitionDuration;
	public $onUpdate;
	public $onComplete;
	public $currentValue;
	public $propertyName;
	public $_cubicBezier;
	public $_elapsedTime;
	public $_endValue;
	public $_startValue;
	public $_transitionTimingFunction;
	public $_transitionDelay;
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
	static $__properties__ = array("get_currentValue" => "get_currentValue","get_complete" => "get_complete");
	function __toString() { return 'cocktail.core.animation.Transition'; }
}

<?php

class cocktail_core_html_TimeRanges {
	public function __construct($ranges) {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.html.TimeRanges::new");
		$»spos = $GLOBALS['%s']->length;
		$this->_ranges = $ranges;
		$GLOBALS['%s']->pop();
	}}
	public function get_length() {
		$GLOBALS['%s']->push("cocktail.core.html.TimeRanges::get_length");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->_ranges->length;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function end($index) {
		$GLOBALS['%s']->push("cocktail.core.html.TimeRanges::end");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = _hx_array_get($this->_ranges, $index)->end;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function start($index) {
		$GLOBALS['%s']->push("cocktail.core.html.TimeRanges::start");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = _hx_array_get($this->_ranges, $index)->start;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public $_ranges;
	public $length;
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
	static $__properties__ = array("get_length" => "get_length");
	function __toString() { return 'cocktail.core.html.TimeRanges'; }
}

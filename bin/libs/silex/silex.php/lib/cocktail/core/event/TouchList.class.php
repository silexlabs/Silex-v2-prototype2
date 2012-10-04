<?php

class cocktail_core_event_TouchList {
	public function __construct($touches) {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.event.TouchList::new");
		$»spos = $GLOBALS['%s']->length;
		$this->_touches = $touches;
		$GLOBALS['%s']->pop();
	}}
	public function get_length() {
		$GLOBALS['%s']->push("cocktail.core.event.TouchList::get_length");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->_touches->length;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function identifiedTouch($identifier) {
		$GLOBALS['%s']->push("cocktail.core.event.TouchList::identifiedTouch");
		$»spos = $GLOBALS['%s']->length;
		{
			$_g1 = 0; $_g = $this->get_length();
			while($_g1 < $_g) {
				$i = $_g1++;
				if(_hx_array_get($this->_touches, $i)->identifier === $identifier) {
					$»tmp = $this->_touches[$i];
					$GLOBALS['%s']->pop();
					return $»tmp;
					unset($»tmp);
				}
				unset($i);
			}
		}
		{
			$GLOBALS['%s']->pop();
			return null;
		}
		$GLOBALS['%s']->pop();
	}
	public function item($index) {
		$GLOBALS['%s']->push("cocktail.core.event.TouchList::item");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->_touches[$index];
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public $length;
	public $_touches;
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
	function __toString() { return 'cocktail.core.event.TouchList'; }
}

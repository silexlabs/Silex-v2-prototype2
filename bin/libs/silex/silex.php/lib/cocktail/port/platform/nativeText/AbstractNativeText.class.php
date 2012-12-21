<?php

class cocktail_port_platform_nativeText_AbstractNativeText {
	public function __construct($nativeElement) {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.port.platform.nativeText.AbstractNativeText::new");
		$»spos = $GLOBALS['%s']->length;
		$this->_nativeElement = $nativeElement;
		$GLOBALS['%s']->pop();
	}}
	public function get_width() {
		$GLOBALS['%s']->push("cocktail.port.platform.nativeText.AbstractNativeText::get_width");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return 0.0;
		}
		$GLOBALS['%s']->pop();
	}
	public function getBitmap($bounds) {
		$GLOBALS['%s']->push("cocktail.port.platform.nativeText.AbstractNativeText::getBitmap");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return null;
		}
		$GLOBALS['%s']->pop();
	}
	public function dispose() {
		$GLOBALS['%s']->push("cocktail.port.platform.nativeText.AbstractNativeText::dispose");
		$»spos = $GLOBALS['%s']->length;
		$this->_nativeElement = null;
		$GLOBALS['%s']->pop();
	}
	public $_nativeElement;
	public $width;
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
	static $__properties__ = array("get_width" => "get_width");
	function __toString() { return 'cocktail.port.platform.nativeText.AbstractNativeText'; }
}

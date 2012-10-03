<?php

class cocktail_core_resource_AbstractMediaLoader extends cocktail_core_resource_ResourceLoader {
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.resource.AbstractMediaLoader::new");
		$»spos = $GLOBALS['%s']->length;
		parent::__construct();
		$GLOBALS['%s']->pop();
	}}
	public function getIntrinsicRatio() {
		$GLOBALS['%s']->push("cocktail.core.resource.AbstractMediaLoader::getIntrinsicRatio");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->_intrinsicRatio;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getIntrinsicHeight() {
		$GLOBALS['%s']->push("cocktail.core.resource.AbstractMediaLoader::getIntrinsicHeight");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->_intrinsicHeight;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getIntrinsicWidth() {
		$GLOBALS['%s']->push("cocktail.core.resource.AbstractMediaLoader::getIntrinsicWidth");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->_intrinsicWidth;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getNativeElement() {
		$GLOBALS['%s']->push("cocktail.core.resource.AbstractMediaLoader::getNativeElement");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->_nativeElement;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public $intrinsicRatio;
	public $_intrinsicRatio;
	public $intrinsicHeight;
	public $_intrinsicHeight;
	public $intrinsicWidth;
	public $_intrinsicWidth;
	public $nativeElement;
	public $_nativeElement;
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
	static $__properties__ = array("get_nativeElement" => "getNativeElement","get_intrinsicWidth" => "getIntrinsicWidth","get_intrinsicHeight" => "getIntrinsicHeight","get_intrinsicRatio" => "getIntrinsicRatio");
	function __toString() { return 'cocktail.core.resource.AbstractMediaLoader'; }
}

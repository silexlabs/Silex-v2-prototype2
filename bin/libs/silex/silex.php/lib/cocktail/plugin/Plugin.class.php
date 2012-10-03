<?php

class cocktail_plugin_Plugin {
	public function __construct($elementAttributes, $params, $loadComplete, $loadError) {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.plugin.Plugin::new");
		$»spos = $GLOBALS['%s']->length;
		$this->set_viewport(new cocktail_core_geom_RectangleVO(0.0, 0.0, 0.0, 0.0));
		$this->_loadComplete = $loadComplete;
		$this->_loadError = $loadError;
		$this->_elementAttributes = $elementAttributes;
		$this->_params = $params;
		$GLOBALS['%s']->pop();
	}}
	public function set_viewport($value) {
		$GLOBALS['%s']->push("cocktail.plugin.Plugin::set_viewport");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->viewport = $value;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_viewport() {
		$GLOBALS['%s']->push("cocktail.plugin.Plugin::get_viewport");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->viewport;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function detach($graphicsContext) {
		$GLOBALS['%s']->push("cocktail.plugin.Plugin::detach");
		$»spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public function attach($graphicsContext) {
		$GLOBALS['%s']->push("cocktail.plugin.Plugin::attach");
		$»spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public function dispose() {
		$GLOBALS['%s']->push("cocktail.plugin.Plugin::dispose");
		$»spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public $_params;
	public $_elementAttributes;
	public $_loadError;
	public $_loadComplete;
	public $viewport;
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
	static $__properties__ = array("set_viewport" => "set_viewport","get_viewport" => "get_viewport");
	function __toString() { return 'cocktail.plugin.Plugin'; }
}

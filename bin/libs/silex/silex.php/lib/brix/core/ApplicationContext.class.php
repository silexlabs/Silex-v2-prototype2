<?php

class brix_core_ApplicationContext {
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("brix.core.ApplicationContext::new");
		$»spos = $GLOBALS['%s']->length;
		$this->registeredUIComponents = new _hx_array(array());
		$this->registeredGlobalComponents = new _hx_array(array());
		$this->registerComponentsforInit();
		$GLOBALS['%s']->pop();
	}}
	public function registerComponentsforInit() {
		$GLOBALS['%s']->push("brix.core.ApplicationContext::registerComponentsforInit");
		$»spos = $GLOBALS['%s']->length;
		_hx_qtype("brix.component.navigation.link.LinkClosePage");
		$this->registeredUIComponents->push(_hx_anonymous(array("classname" => "brix.component.navigation.link.LinkClosePage", "args" => null)));
		_hx_qtype("brix.component.navigation.link.LinkToPage");
		$this->registeredUIComponents->push(_hx_anonymous(array("classname" => "brix.component.navigation.link.LinkToPage", "args" => null)));
		_hx_qtype("brix.component.navigation.Layer");
		$this->registeredUIComponents->push(_hx_anonymous(array("classname" => "brix.component.navigation.Layer", "args" => null)));
		_hx_qtype("brix.component.navigation.Page");
		$this->registeredUIComponents->push(_hx_anonymous(array("classname" => "brix.component.navigation.Page", "args" => null)));
		_hx_qtype("brix.component.sound.SoundOn");
		$this->registeredUIComponents->push(_hx_anonymous(array("classname" => "brix.component.sound.SoundOn", "args" => null)));
		_hx_qtype("brix.component.sound.SoundOff");
		$this->registeredUIComponents->push(_hx_anonymous(array("classname" => "brix.component.sound.SoundOff", "args" => null)));
		_hx_qtype("silex.ui.link.SilexLink");
		$this->registeredUIComponents->push(_hx_anonymous(array("classname" => "silex.ui.link.SilexLink", "args" => null)));
		$GLOBALS['%s']->pop();
	}
	public $registeredGlobalComponents;
	public $registeredUIComponents;
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
	function __toString() { return 'brix.core.ApplicationContext'; }
}

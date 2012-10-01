<?php

class org_slplayer_core_ApplicationContext {
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		$this->registeredUIComponents = new _hx_array(array());
		$this->registeredNonUIComponents = new _hx_array(array());
		$this->registerComponentsforInit();
	}}
	public function registerComponentsforInit() {
	}
	public $registeredNonUIComponents;
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
	function __toString() { return 'org.slplayer.core.ApplicationContext'; }
}

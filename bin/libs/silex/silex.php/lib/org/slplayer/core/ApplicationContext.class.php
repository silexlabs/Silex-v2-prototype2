<?php

class org_slplayer_core_ApplicationContext {
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("org.slplayer.core.ApplicationContext::new");
		$»spos = $GLOBALS['%s']->length;
		$this->registeredUIComponents = new _hx_array(array());
		$this->registeredNonUIComponents = new _hx_array(array());
		$this->registerComponentsforInit();
		$GLOBALS['%s']->pop();
	}}
	public function registerComponentsforInit() {
		$GLOBALS['%s']->push("org.slplayer.core.ApplicationContext::registerComponentsforInit");
		$»spos = $GLOBALS['%s']->length;
		_hx_qtype("org.slplayer.component.navigation.Layer");
		$this->registeredUIComponents->push(_hx_anonymous(array("classname" => "org.slplayer.component.navigation.Layer", "args" => null)));
		_hx_qtype("org.slplayer.component.navigation.link.LinkToPage");
		$this->registeredUIComponents->push(_hx_anonymous(array("classname" => "org.slplayer.component.navigation.link.LinkToPage", "args" => null)));
		_hx_qtype("org.slplayer.component.navigation.link.LinkToContext");
		$this->registeredUIComponents->push(_hx_anonymous(array("classname" => "org.slplayer.component.navigation.link.LinkToContext", "args" => null)));
		_hx_qtype("org.slplayer.component.sound.SoundOff");
		$this->registeredUIComponents->push(_hx_anonymous(array("classname" => "org.slplayer.component.sound.SoundOff", "args" => null)));
		_hx_qtype("org.slplayer.component.sound.SoundOn");
		$this->registeredUIComponents->push(_hx_anonymous(array("classname" => "org.slplayer.component.sound.SoundOn", "args" => null)));
		_hx_qtype("org.slplayer.component.navigation.link.LinkClosePage");
		$this->registeredUIComponents->push(_hx_anonymous(array("classname" => "org.slplayer.component.navigation.link.LinkClosePage", "args" => null)));
		_hx_qtype("org.slplayer.component.navigation.Page");
		$this->registeredUIComponents->push(_hx_anonymous(array("classname" => "org.slplayer.component.navigation.Page", "args" => null)));
		$GLOBALS['%s']->pop();
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

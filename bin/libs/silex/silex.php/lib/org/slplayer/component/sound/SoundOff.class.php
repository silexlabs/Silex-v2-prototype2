<?php

class org_slplayer_component_sound_SoundOff extends org_slplayer_component_sound_SoundOn {
	public function __construct($rootElement, $SLPId) { if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("org.slplayer.component.sound.SoundOff::new");
		$»spos = $GLOBALS['%s']->length;
		parent::__construct($rootElement,$SLPId);
		$GLOBALS['%s']->pop();
	}}
	public function onClick($e) {
		$GLOBALS['%s']->push("org.slplayer.component.sound.SoundOff::onClick");
		$»spos = $GLOBALS['%s']->length;
		org_slplayer_component_sound_SoundOn::mute(true);
		$GLOBALS['%s']->pop();
	}
	static function __meta__() { $»args = func_get_args(); return call_user_func_array(self::$__meta__, $»args); }
	static $__meta__;
	static $CLASS_NAME = "SoundOff";
	function __toString() { return 'org.slplayer.component.sound.SoundOff'; }
}
org_slplayer_component_sound_SoundOff::$__meta__ = _hx_anonymous(array("obj" => _hx_anonymous(array("tagNameFilter" => new _hx_array(array("a"))))));

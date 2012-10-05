<?php

class brix_component_sound_SoundOn extends brix_component_ui_DisplayObject {
	public function __construct($rootElement, $BrixId) { if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("brix.component.sound.SoundOn::new");
		$製pos = $GLOBALS['%s']->length;
		parent::__construct($rootElement,$BrixId);
		$rootElement->set_onClick((isset($this->onClick) ? $this->onClick: array($this, "onClick")));
		$GLOBALS['%s']->pop();
	}}
	public function onClick($e) {
		$GLOBALS['%s']->push("brix.component.sound.SoundOn::onClick");
		$製pos = $GLOBALS['%s']->length;
		brix_component_sound_SoundOn::mute(false);
		$GLOBALS['%s']->pop();
	}
	public function init() {
		$GLOBALS['%s']->push("brix.component.sound.SoundOn::init");
		$製pos = $GLOBALS['%s']->length;
		brix_component_sound_SoundOn::mute(false);
		$GLOBALS['%s']->pop();
	}
	static function __meta__() { $蒼rgs = func_get_args(); return call_user_func_array(self::$__meta__, $蒼rgs); }
	static $__meta__;
	static $CLASS_NAME = "SoundOn";
	static $isMuted = false;
	static function mute($doMute) {
		$GLOBALS['%s']->push("brix.component.sound.SoundOn::mute");
		$製pos = $GLOBALS['%s']->length;
		brix_component_sound_SoundOn::$isMuted = $doMute;
		$soundOffButtons = cocktail_Lib::get_document()->getElementsByClassName("SoundOff");
		$soundOnButtons = cocktail_Lib::get_document()->getElementsByClassName("SoundOn");
		{
			$_g1 = 0; $_g = $soundOffButtons->length;
			while($_g1 < $_g) {
				$idx = $_g1++;
				if($doMute) {
					_hx_array_get($soundOffButtons, $idx)->style->set_visibility("hidden");
				} else {
					_hx_array_get($soundOffButtons, $idx)->style->set_visibility("visible");
				}
				unset($idx);
			}
		}
		{
			$_g1 = 0; $_g = $soundOnButtons->length;
			while($_g1 < $_g) {
				$idx = $_g1++;
				if(!$doMute) {
					_hx_array_get($soundOnButtons, $idx)->style->set_visibility("hidden");
				} else {
					_hx_array_get($soundOnButtons, $idx)->style->set_visibility("visible");
				}
				unset($idx);
			}
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'brix.component.sound.SoundOn'; }
}
brix_component_sound_SoundOn::$__meta__ = _hx_anonymous(array("obj" => _hx_anonymous(array("tagNameFilter" => new _hx_array(array("a"))))));

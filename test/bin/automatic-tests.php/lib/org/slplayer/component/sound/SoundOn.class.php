<?php

class org_slplayer_component_sound_SoundOn extends org_slplayer_component_ui_DisplayObject {
	public function __construct($rootElement, $SLPId) { if(!php_Boot::$skip_constructor) {
		parent::__construct($rootElement,$SLPId);
		$rootElement->set_onClick((isset($this->onClick) ? $this->onClick: array($this, "onClick")));
	}}
	public function onClick($e) {
		org_slplayer_component_sound_SoundOn::mute(false);
	}
	public function init() {
		org_slplayer_component_sound_SoundOn::mute(false);
	}
	static function __meta__() { $»args = func_get_args(); return call_user_func_array(self::$__meta__, $»args); }
	static $__meta__;
	static $CLASS_NAME = "SoundOn";
	static $isMuted = false;
	static function mute($doMute) {
		haxe_Log::trace("Sound mute " . Std::string($doMute), _hx_anonymous(array("fileName" => "SoundOn.hx", "lineNumber" => 54, "className" => "org.slplayer.component.sound.SoundOn", "methodName" => "mute")));
		org_slplayer_component_sound_SoundOn::$isMuted = $doMute;
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
	}
	function __toString() { return 'org.slplayer.component.sound.SoundOn'; }
}
org_slplayer_component_sound_SoundOn::$__meta__ = _hx_anonymous(array("obj" => _hx_anonymous(array("tagNameFilter" => new _hx_array(array("a"))))));

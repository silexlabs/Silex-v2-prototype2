<?php

class cocktail_port_platform_keyboard_AbstractKeyboard {
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.port.platform.keyboard.AbstractKeyboard::new");
		$»spos = $GLOBALS['%s']->length;
		$this->setNativeListeners();
		$GLOBALS['%s']->pop();
	}}
	public function getKeyData($event) {
		$GLOBALS['%s']->push("cocktail.port.platform.keyboard.AbstractKeyboard::getKeyData");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return null;
		}
		$GLOBALS['%s']->pop();
	}
	public function removeNativeListeners() {
		$GLOBALS['%s']->push("cocktail.port.platform.keyboard.AbstractKeyboard::removeNativeListeners");
		$»spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public function setNativeListeners() {
		$GLOBALS['%s']->push("cocktail.port.platform.keyboard.AbstractKeyboard::setNativeListeners");
		$»spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public function onNativeKeyUp($event) {
		$GLOBALS['%s']->push("cocktail.port.platform.keyboard.AbstractKeyboard::onNativeKeyUp");
		$»spos = $GLOBALS['%s']->length;
		if($this->onKeyUp !== null) {
			$this->onKeyUp($this->getKeyData($event));
		}
		$GLOBALS['%s']->pop();
	}
	public function onNativeKeyDown($event) {
		$GLOBALS['%s']->push("cocktail.port.platform.keyboard.AbstractKeyboard::onNativeKeyDown");
		$»spos = $GLOBALS['%s']->length;
		if($this->onKeyDown !== null) {
			$this->onKeyDown($this->getKeyData($event));
		}
		$GLOBALS['%s']->pop();
	}
	public $onKeyUp;
	public $onKeyDown;
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
	function __toString() { return 'cocktail.port.platform.keyboard.AbstractKeyboard'; }
}

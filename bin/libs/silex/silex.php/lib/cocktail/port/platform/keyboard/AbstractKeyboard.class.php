<?php

class cocktail_port_platform_keyboard_AbstractKeyboard {
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.port.platform.keyboard.AbstractKeyboard::new");
		$製pos = $GLOBALS['%s']->length;
		$this->setNativeListeners();
		$GLOBALS['%s']->pop();
	}}
	public function getKeyData($event) {
		$GLOBALS['%s']->push("cocktail.port.platform.keyboard.AbstractKeyboard::getKeyData");
		$製pos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return null;
		}
		$GLOBALS['%s']->pop();
	}
	public function removeNativeListeners() {
		$GLOBALS['%s']->push("cocktail.port.platform.keyboard.AbstractKeyboard::removeNativeListeners");
		$製pos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public function setNativeListeners() {
		$GLOBALS['%s']->push("cocktail.port.platform.keyboard.AbstractKeyboard::setNativeListeners");
		$製pos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public function onNativeKeyUp($event) {
		$GLOBALS['%s']->push("cocktail.port.platform.keyboard.AbstractKeyboard::onNativeKeyUp");
		$製pos = $GLOBALS['%s']->length;
		if($this->onKeyUp !== null) {
			$this->onKeyUp($this->getKeyData($event));
		}
		$GLOBALS['%s']->pop();
	}
	public function onNativeKeyDown($event) {
		$GLOBALS['%s']->push("cocktail.port.platform.keyboard.AbstractKeyboard::onNativeKeyDown");
		$製pos = $GLOBALS['%s']->length;
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
		else if(isset($this->蜿ynamics[$m]) && is_callable($this->蜿ynamics[$m]))
			return call_user_func_array($this->蜿ynamics[$m], $a);
		else if('toString' == $m)
			return $this->__toString();
		else
			throw new HException('Unable to call �'.$m.'�');
	}
	function __toString() { return 'cocktail.port.platform.keyboard.AbstractKeyboard'; }
}

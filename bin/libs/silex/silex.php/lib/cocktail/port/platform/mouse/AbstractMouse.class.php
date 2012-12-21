<?php

class cocktail_port_platform_mouse_AbstractMouse {
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.port.platform.mouse.AbstractMouse::new");
		$»spos = $GLOBALS['%s']->length;
		$this->setNativeListeners();
		$GLOBALS['%s']->pop();
	}}
	public function getWheelEvent($event) {
		$GLOBALS['%s']->push("cocktail.port.platform.mouse.AbstractMouse::getWheelEvent");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return null;
		}
		$GLOBALS['%s']->pop();
	}
	public function getMouseEvent($event) {
		$GLOBALS['%s']->push("cocktail.port.platform.mouse.AbstractMouse::getMouseEvent");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return null;
		}
		$GLOBALS['%s']->pop();
	}
	public function removeNativeListeners() {
		$GLOBALS['%s']->push("cocktail.port.platform.mouse.AbstractMouse::removeNativeListeners");
		$»spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public function setNativeListeners() {
		$GLOBALS['%s']->push("cocktail.port.platform.mouse.AbstractMouse::setNativeListeners");
		$»spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public function onNativeMouseWheel($event) {
		$GLOBALS['%s']->push("cocktail.port.platform.mouse.AbstractMouse::onNativeMouseWheel");
		$»spos = $GLOBALS['%s']->length;
		if($this->onMouseWheel !== null) {
			$this->onMouseWheel($this->getWheelEvent($event));
		}
		$GLOBALS['%s']->pop();
	}
	public function onNativeMouseMove($event) {
		$GLOBALS['%s']->push("cocktail.port.platform.mouse.AbstractMouse::onNativeMouseMove");
		$»spos = $GLOBALS['%s']->length;
		if($this->onMouseMove !== null) {
			$this->onMouseMove($this->getMouseEvent($event));
		}
		$GLOBALS['%s']->pop();
	}
	public function onNativeMouseUp($event) {
		$GLOBALS['%s']->push("cocktail.port.platform.mouse.AbstractMouse::onNativeMouseUp");
		$»spos = $GLOBALS['%s']->length;
		if($this->onMouseUp !== null) {
			$this->onMouseUp($this->getMouseEvent($event));
		}
		$GLOBALS['%s']->pop();
	}
	public function onNativeMouseDown($event) {
		$GLOBALS['%s']->push("cocktail.port.platform.mouse.AbstractMouse::onNativeMouseDown");
		$»spos = $GLOBALS['%s']->length;
		if($this->onMouseDown !== null) {
			$this->onMouseDown($this->getMouseEvent($event));
		}
		$GLOBALS['%s']->pop();
	}
	public function setMouseCursor($cursor) {
		$GLOBALS['%s']->push("cocktail.port.platform.mouse.AbstractMouse::setMouseCursor");
		$»spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public $onMouseWheel;
	public $onMouseMove;
	public $onMouseUp;
	public $onMouseDown;
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
	function __toString() { return 'cocktail.port.platform.mouse.AbstractMouse'; }
}

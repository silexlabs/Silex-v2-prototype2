<?php

class cocktail_port_platform_nativeWindow_AbstractNativeWindow {
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.port.platform.nativeWindow.AbstractNativeWindow::new");
		$»spos = $GLOBALS['%s']->length;
		$this->setNativeListeners();
		$GLOBALS['%s']->pop();
	}}
	public function get_innerWidth() {
		$GLOBALS['%s']->push("cocktail.port.platform.nativeWindow.AbstractNativeWindow::get_innerWidth");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return -1;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_innerHeight() {
		$GLOBALS['%s']->push("cocktail.port.platform.nativeWindow.AbstractNativeWindow::get_innerHeight");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return -1;
		}
		$GLOBALS['%s']->pop();
	}
	public function getEvent($event) {
		$GLOBALS['%s']->push("cocktail.port.platform.nativeWindow.AbstractNativeWindow::getEvent");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return null;
		}
		$GLOBALS['%s']->pop();
	}
	public function getUIEvent($event) {
		$GLOBALS['%s']->push("cocktail.port.platform.nativeWindow.AbstractNativeWindow::getUIEvent");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return null;
		}
		$GLOBALS['%s']->pop();
	}
	public function removeNativeListeners() {
		$GLOBALS['%s']->push("cocktail.port.platform.nativeWindow.AbstractNativeWindow::removeNativeListeners");
		$»spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public function setNativeListeners() {
		$GLOBALS['%s']->push("cocktail.port.platform.nativeWindow.AbstractNativeWindow::setNativeListeners");
		$»spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public function onNativeFullScreenChange($event) {
		$GLOBALS['%s']->push("cocktail.port.platform.nativeWindow.AbstractNativeWindow::onNativeFullScreenChange");
		$»spos = $GLOBALS['%s']->length;
		if($this->onFullScreenChange !== null) {
			$this->onFullScreenChange($this->getEvent($event));
		}
		$GLOBALS['%s']->pop();
	}
	public function onNativeResize($event) {
		$GLOBALS['%s']->push("cocktail.port.platform.nativeWindow.AbstractNativeWindow::onNativeResize");
		$»spos = $GLOBALS['%s']->length;
		if($this->onResize !== null) {
			$this->onResize($this->getUIEvent($event));
		}
		$GLOBALS['%s']->pop();
	}
	public function getInitialNativeLayer() {
		$GLOBALS['%s']->push("cocktail.port.platform.nativeWindow.AbstractNativeWindow::getInitialNativeLayer");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return null;
		}
		$GLOBALS['%s']->pop();
	}
	public function fullscreen() {
		$GLOBALS['%s']->push("cocktail.port.platform.nativeWindow.AbstractNativeWindow::fullscreen");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function fullScreenEnabled() {
		$GLOBALS['%s']->push("cocktail.port.platform.nativeWindow.AbstractNativeWindow::fullScreenEnabled");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function exitFullscreen() {
		$GLOBALS['%s']->push("cocktail.port.platform.nativeWindow.AbstractNativeWindow::exitFullscreen");
		$»spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public function enterFullscreen() {
		$GLOBALS['%s']->push("cocktail.port.platform.nativeWindow.AbstractNativeWindow::enterFullscreen");
		$»spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public function open($url, $name) {
		$GLOBALS['%s']->push("cocktail.port.platform.nativeWindow.AbstractNativeWindow::open");
		$»spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public $innerWidth;
	public $innerHeight;
	public $onFullScreenChange;
	public $onResize;
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
	static $__properties__ = array("get_innerHeight" => "get_innerHeight","get_innerWidth" => "get_innerWidth");
	function __toString() { return 'cocktail.port.platform.nativeWindow.AbstractNativeWindow'; }
}

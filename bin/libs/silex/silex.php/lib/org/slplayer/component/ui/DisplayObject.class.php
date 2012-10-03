<?php

class org_slplayer_component_ui_DisplayObject implements org_slplayer_component_ui_IDisplayObject{
	public function __construct($rootElement, $SLPId) {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("org.slplayer.component.ui.DisplayObject::new");
		$»spos = $GLOBALS['%s']->length;
		$this->rootElement = $rootElement;
		org_slplayer_component_SLPlayerComponent::initSLPlayerComponent($this, $SLPId);
		$this->getSLPlayer()->addAssociatedComponent($rootElement, $this);
		$GLOBALS['%s']->pop();
	}}
	public function clean() {
		$GLOBALS['%s']->push("org.slplayer.component.ui.DisplayObject::clean");
		$»spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public function init() {
		$GLOBALS['%s']->push("org.slplayer.component.ui.DisplayObject::init");
		$»spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public function remove() {
		$GLOBALS['%s']->push("org.slplayer.component.ui.DisplayObject::remove");
		$»spos = $GLOBALS['%s']->length;
		$this->clean();
		$this->getSLPlayer()->removeAssociatedComponent($this->rootElement, $this);
		$GLOBALS['%s']->pop();
	}
	public function getSLPlayer() {
		$GLOBALS['%s']->push("org.slplayer.component.ui.DisplayObject::getSLPlayer");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = org_slplayer_component_SLPlayerComponent::getSLPlayer($this);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public $rootElement;
	public $SLPlayerInstanceId;
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
	static function isDisplayObject($cmpClass) {
		$GLOBALS['%s']->push("org.slplayer.component.ui.DisplayObject::isDisplayObject");
		$»spos = $GLOBALS['%s']->length;
		if($cmpClass === Type::resolveClass("org.slplayer.component.ui.DisplayObject")) {
			$GLOBALS['%s']->pop();
			return true;
		}
		if(Type::getSuperClass($cmpClass) !== null) {
			$»tmp = org_slplayer_component_ui_DisplayObject::isDisplayObject(Type::getSuperClass($cmpClass));
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	static function checkFilterOnElt($cmpClass, $elt) {
		$GLOBALS['%s']->push("org.slplayer.component.ui.DisplayObject::checkFilterOnElt");
		$»spos = $GLOBALS['%s']->length;
		if($elt->get_nodeType() !== cocktail_Lib::get_document()->body->get_nodeType()) {
			throw new HException("cannot instantiate " . Type::getClassName($cmpClass) . " on a non element node.");
		}
		$tagFilter = org_slplayer_component_ui_DisplayObject_0($cmpClass, $elt);
		if($tagFilter === null) {
			$GLOBALS['%s']->pop();
			return;
		}
		if(Lambda::exists($tagFilter, array(new _hx_lambda(array(&$cmpClass, &$elt, &$tagFilter), "org_slplayer_component_ui_DisplayObject_1"), 'execute'))) {
			$GLOBALS['%s']->pop();
			return;
		}
		throw new HException("cannot instantiate " . Type::getClassName($cmpClass) . " on this type of HTML element: " . strtolower($elt->get_nodeName()));
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'org.slplayer.component.ui.DisplayObject'; }
}
function org_slplayer_component_ui_DisplayObject_0(&$cmpClass, &$elt) {
	$»spos = $GLOBALS['%s']->length;
	if(haxe_rtti_Meta::getType($cmpClass) !== null) {
		return haxe_rtti_Meta::getType($cmpClass)->tagNameFilter;
	}
}
function org_slplayer_component_ui_DisplayObject_1(&$cmpClass, &$elt, &$tagFilter, $s) {
	$»spos = $GLOBALS['%s']->length;
	{
		$GLOBALS['%s']->push("org.slplayer.component.ui.DisplayObject::checkFilterOnElt@147");
		$»spos2 = $GLOBALS['%s']->length;
		{
			$»tmp = strtolower($elt->get_nodeName()) === strtolower(Std::string($s));
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
}

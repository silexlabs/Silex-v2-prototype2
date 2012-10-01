<?php

class org_slplayer_component_ui_DisplayObject implements org_slplayer_component_ui_IDisplayObject{
	public function __construct($rootElement, $SLPId) {
		if(!php_Boot::$skip_constructor) {
		$this->rootElement = $rootElement;
		org_slplayer_component_SLPlayerComponent::initSLPlayerComponent($this, $SLPId);
		$this->getSLPlayer()->addAssociatedComponent($rootElement, $this);
	}}
	public function clean() {
	}
	public function init() {
	}
	public function remove() {
		$this->clean();
		$this->getSLPlayer()->removeAssociatedComponent($this->rootElement, $this);
	}
	public function getSLPlayer() {
		return org_slplayer_component_SLPlayerComponent::getSLPlayer($this);
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
		if($cmpClass === Type::resolveClass("org.slplayer.component.ui.DisplayObject")) {
			return true;
		}
		if(Type::getSuperClass($cmpClass) !== null) {
			return org_slplayer_component_ui_DisplayObject::isDisplayObject(Type::getSuperClass($cmpClass));
		}
		return false;
	}
	static function checkFilterOnElt($cmpClass, $elt) {
		if($elt->get_nodeType() !== cocktail_Lib::get_document()->body->get_nodeType()) {
			throw new HException("cannot instantiate " . Type::getClassName($cmpClass) . " on a non element node.");
		}
		$tagFilter = org_slplayer_component_ui_DisplayObject_0($cmpClass, $elt);
		if($tagFilter === null) {
			return;
		}
		if(Lambda::exists($tagFilter, array(new _hx_lambda(array(&$cmpClass, &$elt, &$tagFilter), "org_slplayer_component_ui_DisplayObject_1"), 'execute'))) {
			return;
		}
		throw new HException("cannot instantiate " . Type::getClassName($cmpClass) . " on this type of HTML element: " . strtolower($elt->get_nodeName()));
	}
	function __toString() { return 'org.slplayer.component.ui.DisplayObject'; }
}
function org_slplayer_component_ui_DisplayObject_0(&$cmpClass, &$elt) {
	if(haxe_rtti_Meta::getType($cmpClass) !== null) {
		return haxe_rtti_Meta::getType($cmpClass)->tagNameFilter;
	}
}
function org_slplayer_component_ui_DisplayObject_1(&$cmpClass, &$elt, &$tagFilter, $s) {
	{
		return strtolower($elt->get_nodeName()) === strtolower(Std::string($s));
	}
}

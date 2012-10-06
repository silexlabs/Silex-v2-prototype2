<?php

class brix_component_ui_DisplayObject implements brix_component_ui_IDisplayObject{
	public function __construct($rootElement, $BrixId) {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("brix.component.ui.DisplayObject::new");
		$»spos = $GLOBALS['%s']->length;
		$this->rootElement = $rootElement;
		brix_component_BrixComponent::initBrixComponent($this, $BrixId);
		$this->getBrixApplication()->addAssociatedComponent($rootElement, $this);
		$GLOBALS['%s']->pop();
	}}
	public function clean() {
		$GLOBALS['%s']->push("brix.component.ui.DisplayObject::clean");
		$»spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public function init() {
		$GLOBALS['%s']->push("brix.component.ui.DisplayObject::init");
		$»spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public function remove() {
		$GLOBALS['%s']->push("brix.component.ui.DisplayObject::remove");
		$»spos = $GLOBALS['%s']->length;
		$this->clean();
		$this->getBrixApplication()->removeAssociatedComponent($this->rootElement, $this);
		$GLOBALS['%s']->pop();
	}
	public function getBrixApplication() {
		$GLOBALS['%s']->push("brix.component.ui.DisplayObject::getBrixApplication");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = brix_component_BrixComponent::getBrixApplication($this);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public $rootElement;
	public $brixInstanceId;
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
		$GLOBALS['%s']->push("brix.component.ui.DisplayObject::isDisplayObject");
		$»spos = $GLOBALS['%s']->length;
		if($cmpClass === Type::resolveClass("brix.component.ui.DisplayObject")) {
			$GLOBALS['%s']->pop();
			return true;
		}
		if(Type::getSuperClass($cmpClass) !== null) {
			$»tmp = brix_component_ui_DisplayObject::isDisplayObject(Type::getSuperClass($cmpClass));
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
		$GLOBALS['%s']->push("brix.component.ui.DisplayObject::checkFilterOnElt");
		$»spos = $GLOBALS['%s']->length;
		if($elt->get_nodeType() !== cocktail_Lib::get_document()->body->get_nodeType()) {
			throw new HException("cannot instantiate " . Type::getClassName($cmpClass) . " on a non element node.");
		}
		$tagFilter = brix_component_ui_DisplayObject_0($cmpClass, $elt);
		if($tagFilter === null) {
			$GLOBALS['%s']->pop();
			return;
		}
		if(Lambda::exists($tagFilter, array(new _hx_lambda(array(&$cmpClass, &$elt, &$tagFilter), "brix_component_ui_DisplayObject_1"), 'execute'))) {
			$GLOBALS['%s']->pop();
			return;
		}
		throw new HException("cannot instantiate " . Type::getClassName($cmpClass) . " on this type of HTML element: " . strtolower($elt->get_nodeName()));
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'brix.component.ui.DisplayObject'; }
}
function brix_component_ui_DisplayObject_0(&$cmpClass, &$elt) {
	$»spos = $GLOBALS['%s']->length;
	if(haxe_rtti_Meta::getType($cmpClass) !== null) {
		return haxe_rtti_Meta::getType($cmpClass)->tagNameFilter;
	}
}
function brix_component_ui_DisplayObject_1(&$cmpClass, &$elt, &$tagFilter, $s) {
	$»spos = $GLOBALS['%s']->length;
	{
		$GLOBALS['%s']->push("brix.component.ui.DisplayObject::checkFilterOnElt@140");
		$»spos2 = $GLOBALS['%s']->length;
		{
			$»tmp = strtolower($elt->get_nodeName()) === strtolower(Std::string($s));
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
}

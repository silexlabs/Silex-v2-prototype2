<?php

class brix_component_BrixComponent {
	public function __construct(){}
	static function initBrixComponent($component, $brixInstanceId) {
		$GLOBALS['%s']->push("brix.component.BrixComponent::initBrixComponent");
		$»spos = $GLOBALS['%s']->length;
		$component->brixInstanceId = $brixInstanceId;
		$GLOBALS['%s']->pop();
	}
	static function getBrixApplication($component) {
		$GLOBALS['%s']->push("brix.component.BrixComponent::getBrixApplication");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = brix_core_Application::get($component->brixInstanceId);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function checkRequiredParameters($cmpClass, $elt) {
		$GLOBALS['%s']->push("brix.component.BrixComponent::checkRequiredParameters");
		$»spos = $GLOBALS['%s']->length;
		$requires = haxe_rtti_Meta::getType($cmpClass)->requires;
		if($requires === null) {
			$GLOBALS['%s']->pop();
			return;
		}
		{
			$_g = 0;
			while($_g < $requires->length) {
				$r = $requires[$_g];
				++$_g;
				if($elt->getAttribute(Std::string($r)) === null || trim($elt->getAttribute(Std::string($r))) === "") {
					throw new HException(Std::string($r) . " parameter is required for " . Type::getClassName($cmpClass));
				}
				unset($r);
			}
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'brix.component.BrixComponent'; }
}

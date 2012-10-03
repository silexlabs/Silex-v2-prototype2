<?php

class org_slplayer_component_SLPlayerComponent {
	public function __construct(){}
	static function initSLPlayerComponent($component, $SLPlayerInstanceId) {
		$GLOBALS['%s']->push("org.slplayer.component.SLPlayerComponent::initSLPlayerComponent");
		$»spos = $GLOBALS['%s']->length;
		$component->SLPlayerInstanceId = $SLPlayerInstanceId;
		$GLOBALS['%s']->pop();
	}
	static function getSLPlayer($component) {
		$GLOBALS['%s']->push("org.slplayer.component.SLPlayerComponent::getSLPlayer");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = org_slplayer_core_Application::get($component->SLPlayerInstanceId);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function checkRequiredParameters($cmpClass, $elt) {
		$GLOBALS['%s']->push("org.slplayer.component.SLPlayerComponent::checkRequiredParameters");
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
	function __toString() { return 'org.slplayer.component.SLPlayerComponent'; }
}

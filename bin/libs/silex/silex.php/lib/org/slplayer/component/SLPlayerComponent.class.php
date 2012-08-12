<?php

class org_slplayer_component_SLPlayerComponent {
	public function __construct(){}
	static function initSLPlayerComponent($component, $SLPlayerInstanceId) {
		$component->SLPlayerInstanceId = $SLPlayerInstanceId;
	}
	static function getSLPlayer($component) {
		return org_slplayer_core_Application::get($component->SLPlayerInstanceId);
	}
	static function checkRequiredParameters($cmpClass, $elt) {
		$requires = haxe_rtti_Meta::getType($cmpClass)->requires;
		if($requires === null) {
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
	}
	function __toString() { return 'org.slplayer.component.SLPlayerComponent'; }
}

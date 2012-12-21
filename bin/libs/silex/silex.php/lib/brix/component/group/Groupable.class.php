<?php

class brix_component_group_Groupable {
	public function __construct(){}
	static function startGroupable($groupable, $rootElement = null) {
		$GLOBALS['%s']->push("brix.component.group.Groupable::startGroupable");
		$»spos = $GLOBALS['%s']->length;
		$groupId = $groupable->rootElement->getAttribute("data-group-id");
		if($groupId === null) {
			$GLOBALS['%s']->pop();
			return;
		}
		if($rootElement === null) {
			$groupElements = $groupable->getBrixApplication()->body->getElementsByClassName($groupId);
			if($groupElements->length < 1) {
				$GLOBALS['%s']->pop();
				return;
			}
			if($groupElements->length > 1) {
				throw new HException("ERROR " . _hx_string_rec($groupElements->length, "") . " Group components are declared with the same group id " . $groupId);
			}
			$groupable->groupElement = $groupElements[0];
		} else {
			$domElement = $rootElement;
			while($domElement !== null && !brix_util_DomTools::hasClass($domElement, $groupId, null)) {
				$domElement = $domElement->parentNode;
			}
			if($domElement !== null) {
				$groupable->groupElement = $domElement;
			} else {
				$GLOBALS['%s']->pop();
				return;
			}
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'brix.component.group.Groupable'; }
}

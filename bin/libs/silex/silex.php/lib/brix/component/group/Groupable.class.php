<?php

class brix_component_group_Groupable {
	public function __construct(){}
	static function startGroupable($groupable) {
		$GLOBALS['%s']->push("brix.component.group.Groupable::startGroupable");
		$»spos = $GLOBALS['%s']->length;
		$groupId = $groupable->rootElement->getAttribute("data-group-id");
		if($groupId === null) {
			$GLOBALS['%s']->pop();
			return;
		}
		$groupElements = cocktail_Lib::get_document()->getElementsByClassName($groupId);
		if($groupElements->length < 1) {
			$GLOBALS['%s']->pop();
			return;
		}
		if($groupElements->length > 1) {
			throw new HException("ERROR " . _hx_string_rec($groupElements->length, "") . " Group components are declared with the same group id " . $groupId);
		}
		$groupable->groupElement = $groupElements[0];
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'brix.component.group.Groupable'; }
}

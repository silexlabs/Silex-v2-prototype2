<?php

class org_slplayer_component_group_Groupable {
	public function __construct(){}
	static function startGroupable($groupable) {
		$groupId = $groupable->rootElement->getAttribute("data-group-id");
		if($groupId === null) {
			return;
		}
		$groupElements = cocktail_Lib::get_document()->getElementsByClassName($groupId);
		if($groupElements->length < 1) {
			haxe_Log::trace("WARNING: could not find the group component " . $groupId, _hx_anonymous(array("fileName" => "IGroupable.hx", "lineNumber" => 57, "className" => "org.slplayer.component.group.Groupable", "methodName" => "startGroupable")));
			return;
		}
		if($groupElements->length > 1) {
			throw new HException("ERROR " . _hx_string_rec($groupElements->length, "") . " Group components are declared with the same group id " . $groupId);
		}
		$groupable->groupElement = $groupElements[0];
	}
	function __toString() { return 'org.slplayer.component.group.Groupable'; }
}

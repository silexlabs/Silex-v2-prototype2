<?php

class org_slplayer_component_navigation_transition_TransitionTools {
	public function __construct(){}
	static $SHOW_START_STYLE_ATTR_NAME = "data-show-start-style";
	static $SHOW_END_STYLE_ATTR_NAME = "data-show-end-style";
	static $HIDE_START_STYLE_ATTR_NAME = "data-hide-start-style";
	static $HIDE_END_STYLE_ATTR_NAME = "data-hide-end-style";
	static $EVENT_TYPE_REQUEST = "transitionEventTypeRequest";
	static $EVENT_TYPE_STARTED = "transitionEventTypeStarted";
	static $EVENT_TYPE_ENDED = "transitionEventTypeEnded";
	static function getTransitionData($rootElement, $type) {
		$res = null;
		if($type === org_slplayer_component_navigation_transition_TransitionType::$show) {
			$start = $rootElement->getAttribute("data-show-start-style");
			$end = $rootElement->getAttribute("data-show-end-style");
			if($start !== null && $end !== null) {
				$res = _hx_anonymous(array("startStyleName" => $start, "endStyleName" => $end));
			}
		} else {
			$start = $rootElement->getAttribute("data-hide-start-style");
			$end = $rootElement->getAttribute("data-hide-end-style");
			if($start !== null && $end !== null) {
				$res = _hx_anonymous(array("startStyleName" => $start, "endStyleName" => $end));
			}
		}
		return $res;
	}
	static function setTransitionProperty($rootElement, $name, $value) {
		Reflect::setProperty($rootElement->style, $name, $value);
	}
	function __toString() { return 'org.slplayer.component.navigation.transition.TransitionTools'; }
}

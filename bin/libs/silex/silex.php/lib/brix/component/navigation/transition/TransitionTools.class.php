<?php

class brix_component_navigation_transition_TransitionTools {
	public function __construct(){}
	static $SHOW_START_STYLE_ATTR_NAME = "data-show-start-style";
	static $SHOW_END_STYLE_ATTR_NAME = "data-show-end-style";
	static $HIDE_START_STYLE_ATTR_NAME = "data-hide-start-style";
	static $HIDE_END_STYLE_ATTR_NAME = "data-hide-end-style";
	static $EVENT_TYPE_REQUEST = "transitionEventTypeRequest";
	static $EVENT_TYPE_STARTED = "transitionEventTypeStarted";
	static $EVENT_TYPE_ENDED = "transitionEventTypeEnded";
	static function getTransitionData($rootElement, $type) {
		$GLOBALS['%s']->push("brix.component.navigation.transition.TransitionTools::getTransitionData");
		$»spos = $GLOBALS['%s']->length;
		$res = null;
		if($type === brix_component_navigation_transition_TransitionType::$show) {
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
		{
			$GLOBALS['%s']->pop();
			return $res;
		}
		$GLOBALS['%s']->pop();
	}
	static function setTransitionProperty($rootElement, $name, $value) {
		$GLOBALS['%s']->push("brix.component.navigation.transition.TransitionTools::setTransitionProperty");
		$»spos = $GLOBALS['%s']->length;
		Reflect::setProperty($rootElement->style, $name, $value);
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'brix.component.navigation.transition.TransitionTools'; }
}

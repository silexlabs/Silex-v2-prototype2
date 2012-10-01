<?php

class org_slplayer_component_navigation_transition_TransitionData {
	public function __construct($transitionType = null, $transitionDuration = null, $transitionTimingFunction = null, $transitionDelay = null, $transitionIsReversed = null) {
		if(!php_Boot::$skip_constructor) {
		if($transitionIsReversed === null) {
			$transitionIsReversed = false;
		}
		if($transitionDelay === null) {
			$transitionDelay = "0";
		}
		if($transitionTimingFunction === null) {
			$transitionTimingFunction = "linear";
		}
		if($transitionDuration === null) {
			$transitionDuration = ".5s";
		}
		$this->type = $transitionType;
		$this->duration = $transitionDuration;
		$this->timingFunction = $transitionTimingFunction;
		$this->delay = $transitionDelay;
		$this->isReversed = $transitionIsReversed;
	}}
	public $isReversed;
	public $type;
	public $delay;
	public $timingFunction;
	public $duration;
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
	static $EVENT_TYPE_REQUEST = "transitionEventTypeRequest";
	static $EVENT_TYPE_STARTED = "transitionEventTypeStarted";
	static $EVENT_TYPE_ENDED = "transitionEventTypeEnded";
	static $LINEAR = "linear";
	static $EASE = "ease";
	static $EASE_IN = "ease-in";
	static $EASE_OUT = "ease-out";
	static $EASE_IN_OUT = "ease-in-out";
	function __toString() { return 'org.slplayer.component.navigation.transition.TransitionData'; }
}

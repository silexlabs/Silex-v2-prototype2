<?php

class cocktail_core_event_EventConstants {
	public function __construct() { 
	}
	static $PLAY = "play";
	static $PLAYING = "playing";
	static $PAUSE = "pause";
	static $ABORT = "abort";
	static $LOAD_START = "loadstart";
	static $WAITING = "waiting";
	static $TIME_UPDATE = "timeupdate";
	static $ENDED = "ended";
	static $LOADED_DATA = "loadeddata";
	static $SEEKING = "seeking";
	static $SEEKED = "seeked";
	static $PROGRESS = "progress";
	static $CAN_PLAY = "canplay";
	static $EMPTIED = "emptied";
	static $LOADED_METADATA = "loadedmetadata";
	static $DURATION_CHANGE = "durationchange";
	static $VOLUME_CHANGE = "volumechange";
	static $SUSPEND = "suspend";
	static $STALLED = "stalled";
	static $CAN_PLAY_THROUGH = "canplaythrough";
	static $READY_STATE_CHANGE = "readystatechange";
	static $TIME_OUT = "timeout";
	static $LOAD_END = "loadend";
	static $FULL_SCREEN_CHANGE = "fullscreenchange";
	static $FOCUS = "focus";
	static $BLUR = "blur";
	static $FOCUS_IN = "focusin";
	static $FOCUS_OUT = "focusout";
	static $KEY_DOWN = "keydown";
	static $KEY_UP = "keyup";
	static $CLICK = "click";
	static $DOUBLE_CLICK = "dblclick";
	static $MOUSE_UP = "mouseup";
	static $MOUSE_DOWN = "mousedown";
	static $MOUSE_OVER = "mouseover";
	static $MOUSE_OUT = "mouseout";
	static $MOUSE_MOVE = "mousemove";
	static $TOUCH_START = "touchstart";
	static $TOUCH_END = "touchend";
	static $TOUCH_MOVE = "touchmove";
	static $TOUCH_CANCEL = "touchcancel";
	static $TRANSITION_END = "transitionend";
	static $SCROLL = "scroll";
	static $RESIZE = "resize";
	static $LOAD = "load";
	static $ERROR = "error";
	static $MOUSE_WHEEL = "wheel";
	function __toString() { return 'cocktail.core.event.EventConstants'; }
}

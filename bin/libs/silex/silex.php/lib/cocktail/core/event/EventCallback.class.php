<?php

class cocktail_core_event_EventCallback extends cocktail_core_event_EventTarget {
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.event.EventCallback::new");
		$»spos = $GLOBALS['%s']->length;
		parent::__construct();
		$GLOBALS['%s']->pop();
	}}
	public function set_onPopState($value) {
		$GLOBALS['%s']->push("cocktail.core.event.EventCallback::set_onPopState");
		$»spos = $GLOBALS['%s']->length;
		$this->updateCallbackListener("popstate", $value, (isset($this->onpopstate) ? $this->onpopstate: array($this, "onpopstate")));
		{
			$»tmp = $this->onpopstate = $value;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_onTransitionEnd($value) {
		$GLOBALS['%s']->push("cocktail.core.event.EventCallback::set_onTransitionEnd");
		$»spos = $GLOBALS['%s']->length;
		$this->updateCallbackListener("transitionend", $value, (isset($this->ontransitionend) ? $this->ontransitionend: array($this, "ontransitionend")));
		{
			$»tmp = $this->ontransitionend = $value;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_onVolumeChange($value) {
		$GLOBALS['%s']->push("cocktail.core.event.EventCallback::set_onVolumeChange");
		$»spos = $GLOBALS['%s']->length;
		$this->updateCallbackListener("volumechange", $value, (isset($this->onvolumechange) ? $this->onvolumechange: array($this, "onvolumechange")));
		{
			$»tmp = $this->onvolumechange = $value;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_onPause($value) {
		$GLOBALS['%s']->push("cocktail.core.event.EventCallback::set_onPause");
		$»spos = $GLOBALS['%s']->length;
		$this->updateCallbackListener("pause", $value, (isset($this->onpause) ? $this->onpause: array($this, "onpause")));
		{
			$»tmp = $this->onpause = $value;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_onPlay($value) {
		$GLOBALS['%s']->push("cocktail.core.event.EventCallback::set_onPlay");
		$»spos = $GLOBALS['%s']->length;
		$this->updateCallbackListener("play", $value, (isset($this->onplay) ? $this->onplay: array($this, "onplay")));
		{
			$»tmp = $this->onplay = $value;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_onTimeUpdate($value) {
		$GLOBALS['%s']->push("cocktail.core.event.EventCallback::set_onTimeUpdate");
		$»spos = $GLOBALS['%s']->length;
		$this->updateCallbackListener("timeupdate", $value, (isset($this->ontimeupdate) ? $this->ontimeupdate: array($this, "ontimeupdate")));
		{
			$»tmp = $this->ontimeupdate = $value;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_onDurationChanged($value) {
		$GLOBALS['%s']->push("cocktail.core.event.EventCallback::set_onDurationChanged");
		$»spos = $GLOBALS['%s']->length;
		$this->updateCallbackListener("durationchange", $value, (isset($this->ondurationchange) ? $this->ondurationchange: array($this, "ondurationchange")));
		{
			$»tmp = $this->ondurationchange = $value;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_onEnded($value) {
		$GLOBALS['%s']->push("cocktail.core.event.EventCallback::set_onEnded");
		$»spos = $GLOBALS['%s']->length;
		$this->updateCallbackListener("ended", $value, (isset($this->onended) ? $this->onended: array($this, "onended")));
		{
			$»tmp = $this->onended = $value;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_onSeeked($value) {
		$GLOBALS['%s']->push("cocktail.core.event.EventCallback::set_onSeeked");
		$»spos = $GLOBALS['%s']->length;
		$this->updateCallbackListener("seeked", $value, (isset($this->onseeked) ? $this->onseeked: array($this, "onseeked")));
		{
			$»tmp = $this->onseeked = $value;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_onSeeking($value) {
		$GLOBALS['%s']->push("cocktail.core.event.EventCallback::set_onSeeking");
		$»spos = $GLOBALS['%s']->length;
		$this->updateCallbackListener("seeking", $value, (isset($this->onseeking) ? $this->onseeking: array($this, "onseeking")));
		{
			$»tmp = $this->set_onWaiting($value);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_onWaiting($value) {
		$GLOBALS['%s']->push("cocktail.core.event.EventCallback::set_onWaiting");
		$»spos = $GLOBALS['%s']->length;
		$this->updateCallbackListener("waiting", $value, (isset($this->onwaiting) ? $this->onwaiting: array($this, "onwaiting")));
		{
			$»tmp = $this->onwaiting = $value;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_onPlaying($value) {
		$GLOBALS['%s']->push("cocktail.core.event.EventCallback::set_onPlaying");
		$»spos = $GLOBALS['%s']->length;
		$this->updateCallbackListener("playing", $value, (isset($this->onplaying) ? $this->onplaying: array($this, "onplaying")));
		{
			$»tmp = $this->onplaying = $value;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_onCanPlayThrough($value) {
		$GLOBALS['%s']->push("cocktail.core.event.EventCallback::set_onCanPlayThrough");
		$»spos = $GLOBALS['%s']->length;
		$this->updateCallbackListener("canplaythrough", $value, (isset($this->oncanplaythrough) ? $this->oncanplaythrough: array($this, "oncanplaythrough")));
		{
			$»tmp = $this->oncanplaythrough = $value;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_onCanPlay($value) {
		$GLOBALS['%s']->push("cocktail.core.event.EventCallback::set_onCanPlay");
		$»spos = $GLOBALS['%s']->length;
		$this->updateCallbackListener("canplay", $value, (isset($this->oncanplay) ? $this->oncanplay: array($this, "oncanplay")));
		{
			$»tmp = $this->oncanplay = $value;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_onLoadedData($value) {
		$GLOBALS['%s']->push("cocktail.core.event.EventCallback::set_onLoadedData");
		$»spos = $GLOBALS['%s']->length;
		$this->updateCallbackListener("loadeddata", $value, (isset($this->onloadeddata) ? $this->onloadeddata: array($this, "onloadeddata")));
		{
			$»tmp = $this->onloadeddata = $value;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_onLoadedMetadata($value) {
		$GLOBALS['%s']->push("cocktail.core.event.EventCallback::set_onLoadedMetadata");
		$»spos = $GLOBALS['%s']->length;
		$this->updateCallbackListener("loadedmetadata", $value, (isset($this->onloadedmetadata) ? $this->onloadedmetadata: array($this, "onloadedmetadata")));
		{
			$»tmp = $this->onloadedmetadata = $value;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_onStalled($value) {
		$GLOBALS['%s']->push("cocktail.core.event.EventCallback::set_onStalled");
		$»spos = $GLOBALS['%s']->length;
		$this->updateCallbackListener("stalled", $value, (isset($this->onstalled) ? $this->onstalled: array($this, "onstalled")));
		{
			$»tmp = $this->onstalled = $value;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_onEmptied($value) {
		$GLOBALS['%s']->push("cocktail.core.event.EventCallback::set_onEmptied");
		$»spos = $GLOBALS['%s']->length;
		$this->updateCallbackListener("emptied", $value, (isset($this->onemptied) ? $this->onemptied: array($this, "onemptied")));
		{
			$»tmp = $this->onemptied = $value;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_onSuspend($value) {
		$GLOBALS['%s']->push("cocktail.core.event.EventCallback::set_onSuspend");
		$»spos = $GLOBALS['%s']->length;
		$this->updateCallbackListener("suspend", $value, (isset($this->onsuspend) ? $this->onsuspend: array($this, "onsuspend")));
		{
			$»tmp = $this->onsuspend = $value;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_onProgress($value) {
		$GLOBALS['%s']->push("cocktail.core.event.EventCallback::set_onProgress");
		$»spos = $GLOBALS['%s']->length;
		$this->updateCallbackListener("progress", $value, (isset($this->onprogress) ? $this->onprogress: array($this, "onprogress")));
		{
			$»tmp = $this->onprogress = $value;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_onLoadStart($value) {
		$GLOBALS['%s']->push("cocktail.core.event.EventCallback::set_onLoadStart");
		$»spos = $GLOBALS['%s']->length;
		$this->updateCallbackListener("loadstart", $value, (isset($this->onloadstart) ? $this->onloadstart: array($this, "onloadstart")));
		{
			$»tmp = $this->onloadstart = $value;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_onError($value) {
		$GLOBALS['%s']->push("cocktail.core.event.EventCallback::set_onError");
		$»spos = $GLOBALS['%s']->length;
		$this->updateCallbackListener("error", $value, (isset($this->onerror) ? $this->onerror: array($this, "onerror")));
		{
			$»tmp = $this->onerror = $value;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_onLoad($value) {
		$GLOBALS['%s']->push("cocktail.core.event.EventCallback::set_onLoad");
		$»spos = $GLOBALS['%s']->length;
		$this->updateCallbackListener("load", $value, (isset($this->onload) ? $this->onload: array($this, "onload")));
		{
			$»tmp = $this->onload = $value;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_onScroll($value) {
		$GLOBALS['%s']->push("cocktail.core.event.EventCallback::set_onScroll");
		$»spos = $GLOBALS['%s']->length;
		$this->updateCallbackListener("scroll", $value, (isset($this->onscroll) ? $this->onscroll: array($this, "onscroll")));
		{
			$»tmp = $this->onscroll = $value;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_onFullScreenChange($value) {
		$GLOBALS['%s']->push("cocktail.core.event.EventCallback::set_onFullScreenChange");
		$»spos = $GLOBALS['%s']->length;
		$this->updateCallbackListener("fullscreenchange", $value, (isset($this->onfullscreenchange) ? $this->onfullscreenchange: array($this, "onfullscreenchange")));
		{
			$»tmp = $this->onfullscreenchange = $value;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_onResize($value) {
		$GLOBALS['%s']->push("cocktail.core.event.EventCallback::set_onResize");
		$»spos = $GLOBALS['%s']->length;
		$this->updateCallbackListener("resize", $value, (isset($this->onresize) ? $this->onresize: array($this, "onresize")));
		{
			$»tmp = $this->onresize = $value;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_onBlur($value) {
		$GLOBALS['%s']->push("cocktail.core.event.EventCallback::set_onBlur");
		$»spos = $GLOBALS['%s']->length;
		$this->updateCallbackListener("blur", $value, (isset($this->onblur) ? $this->onblur: array($this, "onblur")));
		{
			$»tmp = $this->onblur = $value;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_onFocus($value) {
		$GLOBALS['%s']->push("cocktail.core.event.EventCallback::set_onFocus");
		$»spos = $GLOBALS['%s']->length;
		$this->updateCallbackListener("focus", $value, (isset($this->onfocus) ? $this->onfocus: array($this, "onfocus")));
		{
			$»tmp = $this->onfocus = $value;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_onKeyUp($value) {
		$GLOBALS['%s']->push("cocktail.core.event.EventCallback::set_onKeyUp");
		$»spos = $GLOBALS['%s']->length;
		$this->updateCallbackListener("keyup", $value, (isset($this->onkeyup) ? $this->onkeyup: array($this, "onkeyup")));
		{
			$»tmp = $this->onkeyup = $value;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_onKeyDown($value) {
		$GLOBALS['%s']->push("cocktail.core.event.EventCallback::set_onKeyDown");
		$»spos = $GLOBALS['%s']->length;
		$this->updateCallbackListener("keydown", $value, (isset($this->onkeydown) ? $this->onkeydown: array($this, "onkeydown")));
		{
			$»tmp = $this->onkeydown = $value;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_onMouseWheel($value) {
		$GLOBALS['%s']->push("cocktail.core.event.EventCallback::set_onMouseWheel");
		$»spos = $GLOBALS['%s']->length;
		$this->updateCallbackListener("wheel", $value, (isset($this->onmousewheel) ? $this->onmousewheel: array($this, "onmousewheel")));
		{
			$»tmp = $this->onmousewheel = $value;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_onMouseMove($value) {
		$GLOBALS['%s']->push("cocktail.core.event.EventCallback::set_onMouseMove");
		$»spos = $GLOBALS['%s']->length;
		$this->updateCallbackListener("mousemove", $value, (isset($this->onmousemove) ? $this->onmousemove: array($this, "onmousemove")));
		{
			$»tmp = $this->onmousemove = $value;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_onMouseOut($value) {
		$GLOBALS['%s']->push("cocktail.core.event.EventCallback::set_onMouseOut");
		$»spos = $GLOBALS['%s']->length;
		$this->updateCallbackListener("mouseout", $value, (isset($this->onmouseout) ? $this->onmouseout: array($this, "onmouseout")));
		{
			$»tmp = $this->onmouseout = $value;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_onMouseOver($value) {
		$GLOBALS['%s']->push("cocktail.core.event.EventCallback::set_onMouseOver");
		$»spos = $GLOBALS['%s']->length;
		$this->updateCallbackListener("mouseover", $value, (isset($this->onmouseover) ? $this->onmouseover: array($this, "onmouseover")));
		{
			$»tmp = $this->onmouseover = $value;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_onMouseUp($value) {
		$GLOBALS['%s']->push("cocktail.core.event.EventCallback::set_onMouseUp");
		$»spos = $GLOBALS['%s']->length;
		$this->updateCallbackListener("mouseup", $value, (isset($this->onmouseup) ? $this->onmouseup: array($this, "onmouseup")));
		{
			$»tmp = $this->onmouseup = $value;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_onMouseDown($value) {
		$GLOBALS['%s']->push("cocktail.core.event.EventCallback::set_onMouseDown");
		$»spos = $GLOBALS['%s']->length;
		$this->updateCallbackListener("mousedown", $value, (isset($this->onmousedown) ? $this->onmousedown: array($this, "onmousedown")));
		{
			$»tmp = $this->onmousedown = $value;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_onDblClick($value) {
		$GLOBALS['%s']->push("cocktail.core.event.EventCallback::set_onDblClick");
		$»spos = $GLOBALS['%s']->length;
		$this->updateCallbackListener("dblclick", $value, (isset($this->ondblclick) ? $this->ondblclick: array($this, "ondblclick")));
		{
			$»tmp = $this->ondblclick = $value;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_onClick($value) {
		$GLOBALS['%s']->push("cocktail.core.event.EventCallback::set_onClick");
		$»spos = $GLOBALS['%s']->length;
		$this->updateCallbackListener("click", $value, (isset($this->onclick) ? $this->onclick: array($this, "onclick")));
		{
			$»tmp = $this->onclick = $value;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function updateCallbackListener($eventType, $newListener, $oldListener) {
		$GLOBALS['%s']->push("cocktail.core.event.EventCallback::updateCallbackListener");
		$»spos = $GLOBALS['%s']->length;
		if($oldListener !== null) {
			$this->removeEventListener($eventType, $oldListener, null);
		}
		if($newListener !== null) {
			$this->addEventListener($eventType, $newListener, null);
		}
		$GLOBALS['%s']->pop();
	}
	public $onpopstate;
	public $ontransitionend;
	public $onvolumechange;
	public $onpause;
	public $onplay;
	public $ontimeupdate;
	public $ondurationchange;
	public $onended;
	public $onseeked;
	public $onseeking;
	public $onwaiting;
	public $onplaying;
	public $oncanplaythrough;
	public $oncanplay;
	public $onloadeddata;
	public $onloadedmetadata;
	public $onstalled;
	public $onemptied;
	public $onsuspend;
	public $onprogress;
	public $onloadstart;
	public $onerror;
	public $onload;
	public $onscroll;
	public $onfullscreenchange;
	public $onresize;
	public $onblur;
	public $onfocus;
	public $onkeyup;
	public $onkeydown;
	public $onmousewheel;
	public $onmousemove;
	public $onmouseout;
	public $onmouseover;
	public $onmouseup;
	public $onmousedown;
	public $ondblclick;
	public $onclick;
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
	static $__properties__ = array("set_onclick" => "set_onClick","set_ondblclick" => "set_onDblClick","set_onmousedown" => "set_onMouseDown","set_onmouseup" => "set_onMouseUp","set_onmouseover" => "set_onMouseOver","set_onmouseout" => "set_onMouseOut","set_onmousemove" => "set_onMouseMove","set_onmousewheel" => "set_onMouseWheel","set_onkeydown" => "set_onKeyDown","set_onkeyup" => "set_onKeyUp","set_onfocus" => "set_onFocus","set_onblur" => "set_onBlur","set_onresize" => "set_onResize","set_onfullscreenchange" => "set_onFullScreenChange","set_onscroll" => "set_onScroll","set_onload" => "set_onLoad","set_onerror" => "set_onError","set_onloadstart" => "set_onLoadStart","set_onprogress" => "set_onProgress","set_onsuspend" => "set_onSuspend","set_onemptied" => "set_onEmptied","set_onstalled" => "set_onStalled","set_onloadedmetadata" => "set_onLoadedMetadata","set_onloadeddata" => "set_onLoadedData","set_oncanplay" => "set_onCanPlay","set_oncanplaythrough" => "set_onCanPlayThrough","set_onplaying" => "set_onPlaying","set_onwaiting" => "set_onWaiting","set_onseeking" => "set_onSeeking","set_onseeked" => "set_onSeeked","set_onended" => "set_onEnded","set_ondurationchange" => "set_onDurationChanged","set_ontimeupdate" => "set_onTimeUpdate","set_onplay" => "set_onPlay","set_onpause" => "set_onPause","set_onvolumechange" => "set_onVolumeChange","set_ontransitionend" => "set_onTransitionEnd","set_onpopstate" => "set_onPopState");
	function __toString() { return 'cocktail.core.event.EventCallback'; }
}

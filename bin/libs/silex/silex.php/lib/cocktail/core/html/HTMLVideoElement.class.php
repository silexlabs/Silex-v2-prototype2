<?php

class cocktail_core_html_HTMLVideoElement extends cocktail_core_html_HTMLMediaElement {
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLVideoElement::new");
		$»spos = $GLOBALS['%s']->length;
		parent::__construct("VIDEO");
		$this->initPosterFrame();
		$GLOBALS['%s']->pop();
	}}
	public function get_videoHeight() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLVideoElement::get_videoHeight");
		$»spos = $GLOBALS['%s']->length;
		if($this->nativeMedia->get_height() !== null) {
			$»tmp = Math::round($this->nativeMedia->get_height());
			$GLOBALS['%s']->pop();
			return $»tmp;
		} else {
			$GLOBALS['%s']->pop();
			return 150;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_videoWidth() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLVideoElement::get_videoWidth");
		$»spos = $GLOBALS['%s']->length;
		if($this->nativeMedia->get_width() !== null) {
			$»tmp = Math::round($this->nativeMedia->get_width());
			$GLOBALS['%s']->pop();
			return $»tmp;
		} else {
			$GLOBALS['%s']->pop();
			return 300;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_poster() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLVideoElement::get_poster");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getAttribute("poster");
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_poster($value) {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLVideoElement::set_poster");
		$»spos = $GLOBALS['%s']->length;
		parent::setAttribute("poster",$value);
		$this->_onPosterLoadComplete = (isset($this->onPosterLoadComplete) ? $this->onPosterLoadComplete: array($this, "onPosterLoadComplete"));
		$this->_onPosterLoadError = (isset($this->onPosterLoadError) ? $this->onPosterLoadError: array($this, "onPosterLoadError"));
		$this->_posterImage->addEventListener("load", (isset($this->_onPosterLoadComplete) ? $this->_onPosterLoadComplete: array($this, "_onPosterLoadComplete")), null);
		$this->_posterImage->addEventListener("error", (isset($this->_onPosterLoadError) ? $this->_onPosterLoadError: array($this, "_onPosterLoadError")), null);
		$this->_posterImage->set_src($value);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function removeListeners() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLVideoElement::removeListeners");
		$»spos = $GLOBALS['%s']->length;
		$this->_posterImage->removeEventListener("load", (isset($this->_onPosterLoadComplete) ? $this->_onPosterLoadComplete: array($this, "_onPosterLoadComplete")), null);
		$this->_posterImage->removeEventListener("error", (isset($this->_onPosterLoadError) ? $this->_onPosterLoadError: array($this, "_onPosterLoadError")), null);
		$GLOBALS['%s']->pop();
	}
	public function onPosterLoadError($e) {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLVideoElement::onPosterLoadError");
		$»spos = $GLOBALS['%s']->length;
		$this->removeListeners();
		$GLOBALS['%s']->pop();
	}
	public function onPosterLoadComplete($e) {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLVideoElement::onPosterLoadComplete");
		$»spos = $GLOBALS['%s']->length;
		$this->removeListeners();
		$this->invalidate();
		$GLOBALS['%s']->pop();
	}
	public function shouldRenderPosterFrame() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLVideoElement::shouldRenderPosterFrame");
		$»spos = $GLOBALS['%s']->length;
		if($this->get_poster() === null) {
			$GLOBALS['%s']->pop();
			return false;
		}
		switch($this->readyState) {
		case 0:case 1:{
			$GLOBALS['%s']->pop();
			return true;
		}break;
		}
		if($this->paused === true && $this->_currentPlaybackPosition === 0.0) {
			$GLOBALS['%s']->pop();
			return true;
		}
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function createElementRenderer() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLVideoElement::createElementRenderer");
		$»spos = $GLOBALS['%s']->length;
		$this->elementRenderer = new cocktail_core_renderer_VideoRenderer($this);
		$GLOBALS['%s']->pop();
	}
	public function setAttribute($name, $value) {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLVideoElement::setAttribute");
		$»spos = $GLOBALS['%s']->length;
		if($name === "poster") {
			$this->set_poster($value);
		} else {
			parent::setAttribute($name,$value);
		}
		$GLOBALS['%s']->pop();
	}
	public function initPosterFrame() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLVideoElement::initPosterFrame");
		$»spos = $GLOBALS['%s']->length;
		$this->_posterImage = new cocktail_core_html_HTMLImageElement();
		$GLOBALS['%s']->pop();
	}
	public function initEmbeddedAsset() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLVideoElement::initEmbeddedAsset");
		$»spos = $GLOBALS['%s']->length;
		$this->embeddedAsset = $this->nativeMedia->get_nativeElement();
		$GLOBALS['%s']->pop();
	}
	public function initNativeMedia() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLVideoElement::initNativeMedia");
		$»spos = $GLOBALS['%s']->length;
		$this->nativeMedia = new cocktail_port_platform_nativeMedia_NativeMedia();
		$GLOBALS['%s']->pop();
	}
	public $videoHeight;
	public $videoWidth;
	public $_onPosterLoadError;
	public $_onPosterLoadComplete;
	public $posterFrameEmbeddedAsset;
	public $_posterImage;
	public $poster;
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
	static $HTML_VIDEO_DEFAULT_WIDTH = 300;
	static $HTML_VIDEO_DEFAULT_HEIGHT = 150;
	static $__properties__ = array("set_poster" => "set_poster","get_poster" => "get_poster","get_videoWidth" => "get_videoWidth","get_videoHeight" => "get_videoHeight","set_src" => "set_src","get_src" => "get_src","set_autoplay" => "set_autoplay","get_autoplay" => "get_autoplay","set_loop" => "set_loop","get_loop" => "get_loop","set_preload" => "set_preload","get_preload" => "get_preload","set_currentTime" => "set_currentTime","get_currentTime" => "get_currentTime","get_buffered" => "get_buffered","set_muted" => "set_muted","set_volume" => "set_volume","set_height" => "set_height","get_height" => "get_height","set_width" => "set_width","get_width" => "get_width","get_intrinsicHeight" => "get_intrinsicHeight","get_intrinsicWidth" => "get_intrinsicWidth","get_intrinsicRatio" => "get_intrinsicRatio","set_tabIndex" => "set_tabIndex","get_tabIndex" => "get_tabIndex","set_id" => "set_id","get_id" => "get_id","set_className" => "set_className","get_className" => "get_className","set_hidden" => "set_hidden","get_hidden" => "get_hidden","set_scrollTop" => "set_scrollTop","get_scrollTop" => "get_scrollTop","set_scrollLeft" => "set_scrollLeft","get_scrollLeft" => "get_scrollLeft","get_scrollHeight" => "get_scrollHeight","get_scrollWidth" => "get_scrollWidth","set_innerHTML" => "set_innerHTML","get_innerHTML" => "get_innerHTML","set_outerHTML" => "set_outerHTML","get_outerHTML" => "get_outerHTML","get_offsetParent" => "get_offsetParent","get_offsetWidth" => "get_offsetWidth","get_offsetHeight" => "get_offsetHeight","get_offsetLeft" => "get_offsetLeft","get_offsetTop" => "get_offsetTop","get_clientWidth" => "get_clientWidth","get_clientHeight" => "get_clientHeight","get_clientLeft" => "get_clientLeft","get_clientTop" => "get_clientTop","get_attachedToDOM" => "get_attachedToDOM","get_firstElementChild" => "get_firstElementChild","get_lastElementChild" => "get_lastElementChild","get_previousElementSibling" => "get_previousElementSibling","get_nextElementSibling" => "get_nextElementSibling","get_childElementCount" => "get_childElementCount","get_firstChild" => "get_firstChild","get_lastChild" => "get_lastChild","get_nextSibling" => "get_nextSibling","get_previousSibling" => "get_previousSibling","get_nodeType" => "get_nodeType","set_nodeValue" => "set_nodeValue","get_nodeValue" => "get_nodeValue","get_nodeName" => "get_nodeName","set_ownerDocument" => "set_ownerDocument","set_onclick" => "set_onClick","set_ondblclick" => "set_onDblClick","set_onmousedown" => "set_onMouseDown","set_onmouseup" => "set_onMouseUp","set_onmouseover" => "set_onMouseOver","set_onmouseout" => "set_onMouseOut","set_onmousemove" => "set_onMouseMove","set_onmousewheel" => "set_onMouseWheel","set_onkeydown" => "set_onKeyDown","set_onkeyup" => "set_onKeyUp","set_onfocus" => "set_onFocus","set_onblur" => "set_onBlur","set_onresize" => "set_onResize","set_onfullscreenchange" => "set_onFullScreenChange","set_onscroll" => "set_onScroll","set_onload" => "set_onLoad","set_onerror" => "set_onError","set_onloadstart" => "set_onLoadStart","set_onprogress" => "set_onProgress","set_onsuspend" => "set_onSuspend","set_onemptied" => "set_onEmptied","set_onstalled" => "set_onStalled","set_onloadedmetadata" => "set_onLoadedMetadata","set_onloadeddata" => "set_onLoadedData","set_oncanplay" => "set_onCanPlay","set_oncanplaythrough" => "set_onCanPlayThrough","set_onplaying" => "set_onPlaying","set_onwaiting" => "set_onWaiting","set_onseeking" => "set_onSeeking","set_onseeked" => "set_onSeeked","set_onended" => "set_onEnded","set_ondurationchange" => "set_onDurationChanged","set_ontimeupdate" => "set_onTimeUpdate","set_onplay" => "set_onPlay","set_onpause" => "set_onPause","set_onvolumechange" => "set_onVolumeChange","set_ontransitionend" => "set_onTransitionEnd","set_onpopstate" => "set_onPopState");
	function __toString() { return 'cocktail.core.html.HTMLVideoElement'; }
}

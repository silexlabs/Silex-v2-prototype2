<?php

class cocktail_core_html_HTMLImageElement extends cocktail_core_html_EmbeddedElement {
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLImageElement::new");
		$»spos = $GLOBALS['%s']->length;
		parent::__construct("IMG");
		$GLOBALS['%s']->pop();
	}}
	public function get_naturalWidth() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLImageElement::get_naturalWidth");
		$»spos = $GLOBALS['%s']->length;
		if($this->get_intrinsicWidth() === null) {
			$GLOBALS['%s']->pop();
			return 0;
		}
		{
			$»tmp = Math::round($this->get_intrinsicWidth());
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_naturalHeight() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLImageElement::get_naturalHeight");
		$»spos = $GLOBALS['%s']->length;
		if($this->get_intrinsicHeight() === null) {
			$GLOBALS['%s']->pop();
			return 0;
		}
		{
			$»tmp = Math::round($this->get_intrinsicHeight());
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_src() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLImageElement::get_src");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getAttribute("src");
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function onLoadError() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLImageElement::onLoadError");
		$»spos = $GLOBALS['%s']->length;
		$errorEvent = new cocktail_core_event_UIEvent();
		$errorEvent->initUIEvent("error", false, false, null, 0.0);
		$this->dispatchEvent($errorEvent);
		$GLOBALS['%s']->pop();
	}
	public function onLoadComplete($resource) {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLImageElement::onLoadComplete");
		$»spos = $GLOBALS['%s']->length;
		$this->intrinsicHeight = $resource->intrinsicHeight;
		$this->intrinsicWidth = $resource->intrinsicWidth;
		$this->intrinsicRatio = $this->get_intrinsicHeight() / $this->get_intrinsicWidth();
		$this->invalidate();
		$loadEvent = new cocktail_core_event_UIEvent();
		$loadEvent->initUIEvent("load", false, false, null, 0.0);
		$this->dispatchEvent($loadEvent);
		$GLOBALS['%s']->pop();
	}
	public function removeListeners($resource) {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLImageElement::removeListeners");
		$»spos = $GLOBALS['%s']->length;
		$resource->removeEventListener("load", (isset($this->_resourceLoadedCallback) ? $this->_resourceLoadedCallback: array($this, "_resourceLoadedCallback")), null);
		$resource->removeEventListener("error", (isset($this->_resourceLoadError) ? $this->_resourceLoadError: array($this, "_resourceLoadError")), null);
		$GLOBALS['%s']->pop();
	}
	public function onResourceLoadError($e) {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLImageElement::onResourceLoadError");
		$»spos = $GLOBALS['%s']->length;
		$this->removeListeners($e->target);
		$this->onLoadError();
		$GLOBALS['%s']->pop();
	}
	public function onResourceLoaded($e) {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLImageElement::onResourceLoaded");
		$»spos = $GLOBALS['%s']->length;
		$this->removeListeners($e->target);
		$this->onLoadComplete($e->target);
		$GLOBALS['%s']->pop();
	}
	public function set_src($value) {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLImageElement::set_src");
		$»spos = $GLOBALS['%s']->length;
		parent::setAttribute("src",$value);
		$resource = cocktail_core_resource_ResourceManager::getImageResource($value);
		if($resource->loaded === false) {
			$this->_resourceLoadedCallback = (isset($this->onResourceLoaded) ? $this->onResourceLoaded: array($this, "onResourceLoaded"));
			$this->_resourceLoadError = (isset($this->onResourceLoadError) ? $this->onResourceLoadError: array($this, "onResourceLoadError"));
			$resource->addEventListener("load", (isset($this->_resourceLoadedCallback) ? $this->_resourceLoadedCallback: array($this, "_resourceLoadedCallback")), null);
			$resource->addEventListener("error", (isset($this->_resourceLoadError) ? $this->_resourceLoadError: array($this, "_resourceLoadError")), null);
		} else {
			if($resource->loadedWithError === true) {
				$this->onLoadError();
			} else {
				$this->onLoadComplete($resource);
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function isVoidElement() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLImageElement::isVoidElement");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return true;
		}
		$GLOBALS['%s']->pop();
	}
	public function createElementRenderer() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLImageElement::createElementRenderer");
		$»spos = $GLOBALS['%s']->length;
		$this->elementRenderer = new cocktail_core_renderer_ImageRenderer($this);
		$GLOBALS['%s']->pop();
	}
	public function setAttribute($name, $value) {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLImageElement::setAttribute");
		$»spos = $GLOBALS['%s']->length;
		if($name === "src") {
			$this->set_src($value);
		} else {
			parent::setAttribute($name,$value);
		}
		$GLOBALS['%s']->pop();
	}
	public $_resourceLoadError;
	public $_resourceLoadedCallback;
	public $naturalHeight;
	public $naturalWidth;
	public $src;
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
	static $__properties__ = array("set_src" => "set_src","get_src" => "get_src","get_naturalWidth" => "get_naturalWidth","get_naturalHeight" => "get_naturalHeight","set_height" => "set_height","get_height" => "get_height","set_width" => "set_width","get_width" => "get_width","get_intrinsicHeight" => "get_intrinsicHeight","get_intrinsicWidth" => "get_intrinsicWidth","get_intrinsicRatio" => "get_intrinsicRatio","set_tabIndex" => "set_tabIndex","get_tabIndex" => "get_tabIndex","set_id" => "set_id","get_id" => "get_id","set_className" => "set_className","get_className" => "get_className","set_hidden" => "set_hidden","get_hidden" => "get_hidden","set_scrollTop" => "set_scrollTop","get_scrollTop" => "get_scrollTop","set_scrollLeft" => "set_scrollLeft","get_scrollLeft" => "get_scrollLeft","get_scrollHeight" => "get_scrollHeight","get_scrollWidth" => "get_scrollWidth","set_innerHTML" => "set_innerHTML","get_innerHTML" => "get_innerHTML","set_outerHTML" => "set_outerHTML","get_outerHTML" => "get_outerHTML","get_offsetParent" => "get_offsetParent","get_offsetWidth" => "get_offsetWidth","get_offsetHeight" => "get_offsetHeight","get_offsetLeft" => "get_offsetLeft","get_offsetTop" => "get_offsetTop","get_clientWidth" => "get_clientWidth","get_clientHeight" => "get_clientHeight","get_clientLeft" => "get_clientLeft","get_clientTop" => "get_clientTop","get_attachedToDOM" => "get_attachedToDOM","get_firstElementChild" => "get_firstElementChild","get_lastElementChild" => "get_lastElementChild","get_previousElementSibling" => "get_previousElementSibling","get_nextElementSibling" => "get_nextElementSibling","get_childElementCount" => "get_childElementCount","get_firstChild" => "get_firstChild","get_lastChild" => "get_lastChild","get_nextSibling" => "get_nextSibling","get_previousSibling" => "get_previousSibling","get_nodeType" => "get_nodeType","set_nodeValue" => "set_nodeValue","get_nodeValue" => "get_nodeValue","get_nodeName" => "get_nodeName","set_ownerDocument" => "set_ownerDocument","set_onclick" => "set_onClick","set_ondblclick" => "set_onDblClick","set_onmousedown" => "set_onMouseDown","set_onmouseup" => "set_onMouseUp","set_onmouseover" => "set_onMouseOver","set_onmouseout" => "set_onMouseOut","set_onmousemove" => "set_onMouseMove","set_onmousewheel" => "set_onMouseWheel","set_onkeydown" => "set_onKeyDown","set_onkeyup" => "set_onKeyUp","set_onfocus" => "set_onFocus","set_onblur" => "set_onBlur","set_onresize" => "set_onResize","set_onfullscreenchange" => "set_onFullScreenChange","set_onscroll" => "set_onScroll","set_onload" => "set_onLoad","set_onerror" => "set_onError","set_onloadstart" => "set_onLoadStart","set_onprogress" => "set_onProgress","set_onsuspend" => "set_onSuspend","set_onemptied" => "set_onEmptied","set_onstalled" => "set_onStalled","set_onloadedmetadata" => "set_onLoadedMetadata","set_onloadeddata" => "set_onLoadedData","set_oncanplay" => "set_onCanPlay","set_oncanplaythrough" => "set_onCanPlayThrough","set_onplaying" => "set_onPlaying","set_onwaiting" => "set_onWaiting","set_onseeking" => "set_onSeeking","set_onseeked" => "set_onSeeked","set_onended" => "set_onEnded","set_ondurationchange" => "set_onDurationChanged","set_ontimeupdate" => "set_onTimeUpdate","set_onplay" => "set_onPlay","set_onpause" => "set_onPause","set_onvolumechange" => "set_onVolumeChange","set_ontransitionend" => "set_onTransitionEnd","set_onpopstate" => "set_onPopState");
	function __toString() { return 'cocktail.core.html.HTMLImageElement'; }
}

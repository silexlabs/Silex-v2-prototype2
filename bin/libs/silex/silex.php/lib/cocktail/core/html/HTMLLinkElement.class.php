<?php

class cocktail_core_html_HTMLLinkElement extends cocktail_core_html_HTMLElement {
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLLinkElement::new");
		$製pos = $GLOBALS['%s']->length;
		parent::__construct("LINK");
		$this->_hasLoadedResource = false;
		$GLOBALS['%s']->pop();
	}}
	public function set_type($value) {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLLinkElement::set_type");
		$製pos = $GLOBALS['%s']->length;
		$this->setAttribute("type", $value);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_type() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLLinkElement::get_type");
		$製pos = $GLOBALS['%s']->length;
		{
			$裨mp = $this->getAttribute("type");
			$GLOBALS['%s']->pop();
			return $裨mp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_hreflang($value) {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLLinkElement::set_hreflang");
		$製pos = $GLOBALS['%s']->length;
		$this->setAttribute("hreflang", $value);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_hreflang() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLLinkElement::get_hreflang");
		$製pos = $GLOBALS['%s']->length;
		{
			$裨mp = $this->getAttribute("hreflang");
			$GLOBALS['%s']->pop();
			return $裨mp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_media($value) {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLLinkElement::set_media");
		$製pos = $GLOBALS['%s']->length;
		$this->setAttribute("media", $value);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_media() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLLinkElement::get_media");
		$製pos = $GLOBALS['%s']->length;
		{
			$裨mp = $this->getAttribute("media");
			$GLOBALS['%s']->pop();
			return $裨mp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_relList() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLLinkElement::get_relList");
		$製pos = $GLOBALS['%s']->length;
		{
			$裨mp = new _hx_array(array());
			$GLOBALS['%s']->pop();
			return $裨mp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_rel($value) {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLLinkElement::set_rel");
		$製pos = $GLOBALS['%s']->length;
		$this->setAttribute("rel", $value);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_rel() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLLinkElement::get_rel");
		$製pos = $GLOBALS['%s']->length;
		{
			$裨mp = $this->getAttribute("rel");
			$GLOBALS['%s']->pop();
			return $裨mp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_href($value) {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLLinkElement::set_href");
		$製pos = $GLOBALS['%s']->length;
		$this->setAttribute("href", $value);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_href() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLLinkElement::get_href");
		$製pos = $GLOBALS['%s']->length;
		{
			$裨mp = $this->getAttribute("href");
			$GLOBALS['%s']->pop();
			return $裨mp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_disabled($value) {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLLinkElement::set_disabled");
		$製pos = $GLOBALS['%s']->length;
		parent::setAttribute("disabled",Std::string($value));
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_disabled() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLLinkElement::get_disabled");
		$製pos = $GLOBALS['%s']->length;
		if($this->getAttribute("disabled") !== null) {
			$GLOBALS['%s']->pop();
			return true;
		} else {
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function createStyleSheet($css) {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLLinkElement::createStyleSheet");
		$製pos = $GLOBALS['%s']->length;
		$this->sheet = new cocktail_core_css_CSSStyleSheet($css, cocktail_core_css_PropertyOriginValue::$AUTHOR, null, null, null, null);
		$htmlDocument = $this->ownerDocument;
		$htmlDocument->addStyleSheet($this->sheet);
		$GLOBALS['%s']->pop();
	}
	public function onCSSLoaded($event) {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLLinkElement::onCSSLoaded");
		$製pos = $GLOBALS['%s']->length;
		$xmlHttpRequest = $event->target;
		$this->createStyleSheet($xmlHttpRequest->get_responseText());
		$GLOBALS['%s']->pop();
	}
	public function unloadLinkedResource() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLLinkElement::unloadLinkedResource");
		$製pos = $GLOBALS['%s']->length;
		if($this->sheet !== null) {
			$htmlDocument = $this->ownerDocument;
			$htmlDocument->removeStyleSheet($this->sheet);
			$this->sheet = null;
			$this->_hasLoadedResource = false;
		}
		$GLOBALS['%s']->pop();
	}
	public function loadLinkedResource() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLLinkElement::loadLinkedResource");
		$製pos = $GLOBALS['%s']->length;
		if($this->get_type() === "text/css" && $this->get_href() !== null && $this->get_rel() === "stylesheet") {
			$this->_hasLoadedResource = true;
			$xmlHttpRequest = new cocktail_core_http_XMLHTTPRequest();
			$xmlHttpRequest->open("get", $this->get_href(), null, null, null);
			$xmlHttpRequest->addEventListener("loadend", (isset($this->onCSSLoaded) ? $this->onCSSLoaded: array($this, "onCSSLoaded")), null);
			$xmlHttpRequest->send(null);
		}
		$GLOBALS['%s']->pop();
	}
	public function createElementRenderer() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLLinkElement::createElementRenderer");
		$製pos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public function removedFromDOM() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLLinkElement::removedFromDOM");
		$製pos = $GLOBALS['%s']->length;
		parent::removedFromDOM();
		if($this->_hasLoadedResource === true) {
			$this->unloadLinkedResource();
		}
		$GLOBALS['%s']->pop();
	}
	public function addedToDOM() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLLinkElement::addedToDOM");
		$製pos = $GLOBALS['%s']->length;
		if($this->_hasLoadedResource === false) {
			$this->loadLinkedResource();
		}
		parent::addedToDOM();
		$GLOBALS['%s']->pop();
	}
	public $_hasLoadedResource;
	public $sheet;
	public $type;
	public $hreflang;
	public $media;
	public $relList;
	public $rel;
	public $href;
	public $disabled;
	public function __call($m, $a) {
		if(isset($this->$m) && is_callable($this->$m))
			return call_user_func_array($this->$m, $a);
		else if(isset($this->蜿ynamics[$m]) && is_callable($this->蜿ynamics[$m]))
			return call_user_func_array($this->蜿ynamics[$m], $a);
		else if('toString' == $m)
			return $this->__toString();
		else
			throw new HException('Unable to call �'.$m.'�');
	}
	static $__properties__ = array("set_disabled" => "set_disabled","get_disabled" => "get_disabled","set_href" => "set_href","get_href" => "get_href","set_rel" => "set_rel","get_rel" => "get_rel","get_relList" => "get_relList","set_media" => "set_media","get_media" => "get_media","set_hreflang" => "set_hreflang","get_hreflang" => "get_hreflang","set_type" => "set_type","get_type" => "get_type","set_tabIndex" => "set_tabIndex","get_tabIndex" => "get_tabIndex","set_id" => "set_id","get_id" => "get_id","set_className" => "set_className","get_className" => "get_className","set_hidden" => "set_hidden","get_hidden" => "get_hidden","set_scrollTop" => "set_scrollTop","get_scrollTop" => "get_scrollTop","set_scrollLeft" => "set_scrollLeft","get_scrollLeft" => "get_scrollLeft","get_scrollHeight" => "get_scrollHeight","get_scrollWidth" => "get_scrollWidth","set_innerHTML" => "set_innerHTML","get_innerHTML" => "get_innerHTML","set_outerHTML" => "set_outerHTML","get_outerHTML" => "get_outerHTML","get_offsetParent" => "get_offsetParent","get_offsetWidth" => "get_offsetWidth","get_offsetHeight" => "get_offsetHeight","get_offsetLeft" => "get_offsetLeft","get_offsetTop" => "get_offsetTop","get_clientWidth" => "get_clientWidth","get_clientHeight" => "get_clientHeight","get_clientLeft" => "get_clientLeft","get_clientTop" => "get_clientTop","get_attachedToDOM" => "get_attachedToDOM","get_firstElementChild" => "get_firstElementChild","get_lastElementChild" => "get_lastElementChild","get_previousElementSibling" => "get_previousElementSibling","get_nextElementSibling" => "get_nextElementSibling","get_childElementCount" => "get_childElementCount","get_firstChild" => "get_firstChild","get_lastChild" => "get_lastChild","get_nextSibling" => "get_nextSibling","get_previousSibling" => "get_previousSibling","get_nodeType" => "get_nodeType","set_nodeValue" => "set_nodeValue","get_nodeValue" => "get_nodeValue","get_nodeName" => "get_nodeName","set_ownerDocument" => "set_ownerDocument","set_onclick" => "set_onClick","set_ondblclick" => "set_onDblClick","set_onmousedown" => "set_onMouseDown","set_onmouseup" => "set_onMouseUp","set_onmouseover" => "set_onMouseOver","set_onmouseout" => "set_onMouseOut","set_onmousemove" => "set_onMouseMove","set_onmousewheel" => "set_onMouseWheel","set_onkeydown" => "set_onKeyDown","set_onkeyup" => "set_onKeyUp","set_onfocus" => "set_onFocus","set_onblur" => "set_onBlur","set_onresize" => "set_onResize","set_onfullscreenchange" => "set_onFullScreenChange","set_onscroll" => "set_onScroll","set_onload" => "set_onLoad","set_onerror" => "set_onError","set_onloadstart" => "set_onLoadStart","set_onprogress" => "set_onProgress","set_onsuspend" => "set_onSuspend","set_onemptied" => "set_onEmptied","set_onstalled" => "set_onStalled","set_onloadedmetadata" => "set_onLoadedMetadata","set_onloadeddata" => "set_onLoadedData","set_oncanplay" => "set_onCanPlay","set_oncanplaythrough" => "set_onCanPlayThrough","set_onplaying" => "set_onPlaying","set_onwaiting" => "set_onWaiting","set_onseeking" => "set_onSeeking","set_onseeked" => "set_onSeeked","set_onended" => "set_onEnded","set_ondurationchange" => "set_onDurationChanged","set_ontimeupdate" => "set_onTimeUpdate","set_onplay" => "set_onPlay","set_onpause" => "set_onPause","set_onvolumechange" => "set_onVolumeChange","set_ontransitionend" => "set_onTransitionEnd","set_onpopstate" => "set_onPopState");
	function __toString() { return 'cocktail.core.html.HTMLLinkElement'; }
}

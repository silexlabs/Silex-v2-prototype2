<?php

class cocktail_core_html_HTMLHtmlElement extends cocktail_core_html_HTMLElement {
	public function __construct() { if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLHtmlElement::new");
		$製pos = $GLOBALS['%s']->length;
		parent::__construct("HTML");
		$GLOBALS['%s']->pop();
	}}
	public function get_offsetParent() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLHtmlElement::get_offsetParent");
		$製pos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return null;
		}
		$GLOBALS['%s']->pop();
	}
	public function detachFromParentElementRenderer() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLHtmlElement::detachFromParentElementRenderer");
		$製pos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public function attachToParentElementRenderer() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLHtmlElement::attachToParentElementRenderer");
		$製pos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public function createElementRenderer() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLHtmlElement::createElementRenderer");
		$製pos = $GLOBALS['%s']->length;
		$this->elementRenderer = new cocktail_core_renderer_InitialBlockRenderer($this);
		$GLOBALS['%s']->pop();
	}
	public function isParentRendered() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLHtmlElement::isParentRendered");
		$製pos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return true;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_outerHTML($value) {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLHtmlElement::set_outerHTML");
		$製pos = $GLOBALS['%s']->length;
		throw new HException(7);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_innerHTML($value) {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLHtmlElement::set_innerHTML");
		$製pos = $GLOBALS['%s']->length;
		parent::set_innerHTML($value);
		$htmlDocument = $this->ownerDocument;
		$htmlDocument->initBody(_hx_array_get($this->getElementsByTagName("BODY"), 0));
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	static $__properties__ = array("set_tabIndex" => "set_tabIndex","get_tabIndex" => "get_tabIndex","set_id" => "set_id","get_id" => "get_id","set_className" => "set_className","get_className" => "get_className","set_hidden" => "set_hidden","get_hidden" => "get_hidden","set_scrollTop" => "set_scrollTop","get_scrollTop" => "get_scrollTop","set_scrollLeft" => "set_scrollLeft","get_scrollLeft" => "get_scrollLeft","get_scrollHeight" => "get_scrollHeight","get_scrollWidth" => "get_scrollWidth","set_innerHTML" => "set_innerHTML","get_innerHTML" => "get_innerHTML","set_outerHTML" => "set_outerHTML","get_outerHTML" => "get_outerHTML","get_offsetParent" => "get_offsetParent","get_offsetWidth" => "get_offsetWidth","get_offsetHeight" => "get_offsetHeight","get_offsetLeft" => "get_offsetLeft","get_offsetTop" => "get_offsetTop","get_clientWidth" => "get_clientWidth","get_clientHeight" => "get_clientHeight","get_clientLeft" => "get_clientLeft","get_clientTop" => "get_clientTop","get_attachedToDOM" => "get_attachedToDOM","get_firstElementChild" => "get_firstElementChild","get_lastElementChild" => "get_lastElementChild","get_previousElementSibling" => "get_previousElementSibling","get_nextElementSibling" => "get_nextElementSibling","get_childElementCount" => "get_childElementCount","get_firstChild" => "get_firstChild","get_lastChild" => "get_lastChild","get_nextSibling" => "get_nextSibling","get_previousSibling" => "get_previousSibling","get_nodeType" => "get_nodeType","set_nodeValue" => "set_nodeValue","get_nodeValue" => "get_nodeValue","get_nodeName" => "get_nodeName","set_ownerDocument" => "set_ownerDocument","set_onclick" => "set_onClick","set_ondblclick" => "set_onDblClick","set_onmousedown" => "set_onMouseDown","set_onmouseup" => "set_onMouseUp","set_onmouseover" => "set_onMouseOver","set_onmouseout" => "set_onMouseOut","set_onmousemove" => "set_onMouseMove","set_onmousewheel" => "set_onMouseWheel","set_onkeydown" => "set_onKeyDown","set_onkeyup" => "set_onKeyUp","set_onfocus" => "set_onFocus","set_onblur" => "set_onBlur","set_onresize" => "set_onResize","set_onfullscreenchange" => "set_onFullScreenChange","set_onscroll" => "set_onScroll","set_onload" => "set_onLoad","set_onerror" => "set_onError","set_onloadstart" => "set_onLoadStart","set_onprogress" => "set_onProgress","set_onsuspend" => "set_onSuspend","set_onemptied" => "set_onEmptied","set_onstalled" => "set_onStalled","set_onloadedmetadata" => "set_onLoadedMetadata","set_onloadeddata" => "set_onLoadedData","set_oncanplay" => "set_onCanPlay","set_oncanplaythrough" => "set_onCanPlayThrough","set_onplaying" => "set_onPlaying","set_onwaiting" => "set_onWaiting","set_onseeking" => "set_onSeeking","set_onseeked" => "set_onSeeked","set_onended" => "set_onEnded","set_ondurationchange" => "set_onDurationChanged","set_ontimeupdate" => "set_onTimeUpdate","set_onplay" => "set_onPlay","set_onpause" => "set_onPause","set_onvolumechange" => "set_onVolumeChange","set_ontransitionend" => "set_onTransitionEnd","set_onpopstate" => "set_onPopState");
	function __toString() { return 'cocktail.core.html.HTMLHtmlElement'; }
}

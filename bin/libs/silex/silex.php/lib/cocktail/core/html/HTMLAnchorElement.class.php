<?php

class cocktail_core_html_HTMLAnchorElement extends cocktail_core_html_HTMLElement {
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLAnchorElement::new");
		$»spos = $GLOBALS['%s']->length;
		parent::__construct("A");
		$GLOBALS['%s']->pop();
	}}
	public function get_target() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLAnchorElement::get_target");
		$»spos = $GLOBALS['%s']->length;
		$target = parent::getAttribute("target");
		if($target === null) {
			$GLOBALS['%s']->pop();
			return "_self";
		}
		{
			$GLOBALS['%s']->pop();
			return $target;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_target($value) {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLAnchorElement::set_target");
		$»spos = $GLOBALS['%s']->length;
		$this->setAttribute("target", $value);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_href() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLAnchorElement::get_href");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getAttribute("href");
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_href($value) {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLAnchorElement::set_href");
		$»spos = $GLOBALS['%s']->length;
		$this->setAttribute("href", $value);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function openDocument() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLAnchorElement::openDocument");
		$»spos = $GLOBALS['%s']->length;
		if($this->get_href() !== null) {
			cocktail_Lib::get_window()->open($this->get_href(), $this->get_target());
		}
		$GLOBALS['%s']->pop();
	}
	public function isDefaultFocusable() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLAnchorElement::isDefaultFocusable");
		$»spos = $GLOBALS['%s']->length;
		if($this->get_href() !== null) {
			$GLOBALS['%s']->pop();
			return true;
		} else {
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function getAttribute($name) {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLAnchorElement::getAttribute");
		$»spos = $GLOBALS['%s']->length;
		if($name === "target") {
			$»tmp = $this->get_target();
			$GLOBALS['%s']->pop();
			return $»tmp;
		} else {
			$»tmp = parent::getAttribute($name);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function runPostClickActivationStep($event) {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLAnchorElement::runPostClickActivationStep");
		$»spos = $GLOBALS['%s']->length;
		if($event->defaultPrevented === true) {
			$GLOBALS['%s']->pop();
			return;
		}
		$this->openDocument();
		$GLOBALS['%s']->pop();
	}
	public function hasActivationBehaviour() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLAnchorElement::hasActivationBehaviour");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return true;
		}
		$GLOBALS['%s']->pop();
	}
	public $target;
	public $href;
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
	static $__properties__ = array("set_href" => "set_href","get_href" => "get_href","set_target" => "set_target","get_target" => "get_target","set_tabIndex" => "set_tabIndex","get_tabIndex" => "get_tabIndex","set_id" => "set_id","get_id" => "get_id","set_className" => "set_className","get_className" => "get_className","set_hidden" => "set_hidden","get_hidden" => "get_hidden","set_scrollTop" => "set_scrollTop","get_scrollTop" => "get_scrollTop","set_scrollLeft" => "set_scrollLeft","get_scrollLeft" => "get_scrollLeft","get_scrollHeight" => "get_scrollHeight","get_scrollWidth" => "get_scrollWidth","set_innerHTML" => "set_innerHTML","get_innerHTML" => "get_innerHTML","set_outerHTML" => "set_outerHTML","get_outerHTML" => "get_outerHTML","get_offsetParent" => "get_offsetParent","get_offsetWidth" => "get_offsetWidth","get_offsetHeight" => "get_offsetHeight","get_offsetLeft" => "get_offsetLeft","get_offsetTop" => "get_offsetTop","get_clientWidth" => "get_clientWidth","get_clientHeight" => "get_clientHeight","get_clientLeft" => "get_clientLeft","get_clientTop" => "get_clientTop","get_attachedToDOM" => "get_attachedToDOM","get_firstElementChild" => "get_firstElementChild","get_lastElementChild" => "get_lastElementChild","get_previousElementSibling" => "get_previousElementSibling","get_nextElementSibling" => "get_nextElementSibling","get_childElementCount" => "get_childElementCount","get_firstChild" => "get_firstChild","get_lastChild" => "get_lastChild","get_nextSibling" => "get_nextSibling","get_previousSibling" => "get_previousSibling","get_nodeType" => "get_nodeType","set_nodeValue" => "set_nodeValue","get_nodeValue" => "get_nodeValue","get_nodeName" => "get_nodeName","set_ownerDocument" => "set_ownerDocument","set_onclick" => "set_onClick","set_ondblclick" => "set_onDblClick","set_onmousedown" => "set_onMouseDown","set_onmouseup" => "set_onMouseUp","set_onmouseover" => "set_onMouseOver","set_onmouseout" => "set_onMouseOut","set_onmousemove" => "set_onMouseMove","set_onmousewheel" => "set_onMouseWheel","set_onkeydown" => "set_onKeyDown","set_onkeyup" => "set_onKeyUp","set_onfocus" => "set_onFocus","set_onblur" => "set_onBlur","set_onresize" => "set_onResize","set_onfullscreenchange" => "set_onFullScreenChange","set_onscroll" => "set_onScroll","set_onload" => "set_onLoad","set_onerror" => "set_onError","set_onloadstart" => "set_onLoadStart","set_onprogress" => "set_onProgress","set_onsuspend" => "set_onSuspend","set_onemptied" => "set_onEmptied","set_onstalled" => "set_onStalled","set_onloadedmetadata" => "set_onLoadedMetadata","set_onloadeddata" => "set_onLoadedData","set_oncanplay" => "set_onCanPlay","set_oncanplaythrough" => "set_onCanPlayThrough","set_onplaying" => "set_onPlaying","set_onwaiting" => "set_onWaiting","set_onseeking" => "set_onSeeking","set_onseeked" => "set_onSeeked","set_onended" => "set_onEnded","set_ondurationchange" => "set_onDurationChanged","set_ontimeupdate" => "set_onTimeUpdate","set_onplay" => "set_onPlay","set_onpause" => "set_onPause","set_onvolumechange" => "set_onVolumeChange","set_ontransitionend" => "set_onTransitionEnd","set_onpopstate" => "set_onPopState");
	function __toString() { return 'cocktail.core.html.HTMLAnchorElement'; }
}

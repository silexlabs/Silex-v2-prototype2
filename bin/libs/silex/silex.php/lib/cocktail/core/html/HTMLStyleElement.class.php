<?php

class cocktail_core_html_HTMLStyleElement extends cocktail_core_html_HTMLElement {
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLStyleElement::new");
		$製pos = $GLOBALS['%s']->length;
		parent::__construct("STYLE");
		$GLOBALS['%s']->pop();
	}}
	public function set_disabled($value) {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLStyleElement::set_disabled");
		$製pos = $GLOBALS['%s']->length;
		parent::setAttribute("disabled",Std::string($value));
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_disabled() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLStyleElement::get_disabled");
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
	public function createElementRenderer() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLStyleElement::createElementRenderer");
		$製pos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public function removeStyleSheet() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLStyleElement::removeStyleSheet");
		$製pos = $GLOBALS['%s']->length;
		if($this->sheet !== null) {
			$htmlDocument = $this->ownerDocument;
			$htmlDocument->removeStyleSheet($this->sheet);
			$this->sheet = null;
		}
		$GLOBALS['%s']->pop();
	}
	public function addStyleSheet() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLStyleElement::addStyleSheet");
		$製pos = $GLOBALS['%s']->length;
		if($this->hasChildNodes() === true) {
			if(_hx_array_get($this->childNodes, 0)->get_nodeType() === 3) {
				if($this->sheet === null) {
					$this->sheet = new cocktail_core_css_CSSStyleSheet(_hx_array_get($this->childNodes, 0)->get_nodeValue(), cocktail_core_css_PropertyOriginValue::$AUTHOR, $this, null, null, null);
					$htmlDocument = $this->ownerDocument;
					$htmlDocument->addStyleSheet($this->sheet);
				}
			}
		}
		$GLOBALS['%s']->pop();
	}
	public function removedFromDOM() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLStyleElement::removedFromDOM");
		$製pos = $GLOBALS['%s']->length;
		parent::removedFromDOM();
		$this->removeStyleSheet();
		$GLOBALS['%s']->pop();
	}
	public function addedToDOM() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLStyleElement::addedToDOM");
		$製pos = $GLOBALS['%s']->length;
		parent::addedToDOM();
		$this->addStyleSheet();
		$GLOBALS['%s']->pop();
	}
	public function removeChild($oldChild) {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLStyleElement::removeChild");
		$製pos = $GLOBALS['%s']->length;
		parent::removeChild($oldChild);
		if($oldChild->get_nodeType() === 3) {
			$this->removeStyleSheet();
		}
		{
			$GLOBALS['%s']->pop();
			return $oldChild;
		}
		$GLOBALS['%s']->pop();
	}
	public function appendChild($newChild) {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLStyleElement::appendChild");
		$製pos = $GLOBALS['%s']->length;
		parent::appendChild($newChild);
		if($newChild->get_nodeType() === 3 && $this->parentNode !== null) {
			$this->addStyleSheet();
		}
		{
			$GLOBALS['%s']->pop();
			return $newChild;
		}
		$GLOBALS['%s']->pop();
	}
	public $sheet;
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
	static $__properties__ = array("set_disabled" => "set_disabled","get_disabled" => "get_disabled","set_tabIndex" => "set_tabIndex","get_tabIndex" => "get_tabIndex","set_id" => "set_id","get_id" => "get_id","set_className" => "set_className","get_className" => "get_className","set_hidden" => "set_hidden","get_hidden" => "get_hidden","set_scrollTop" => "set_scrollTop","get_scrollTop" => "get_scrollTop","set_scrollLeft" => "set_scrollLeft","get_scrollLeft" => "get_scrollLeft","get_scrollHeight" => "get_scrollHeight","get_scrollWidth" => "get_scrollWidth","set_innerHTML" => "set_innerHTML","get_innerHTML" => "get_innerHTML","set_outerHTML" => "set_outerHTML","get_outerHTML" => "get_outerHTML","get_offsetParent" => "get_offsetParent","get_offsetWidth" => "get_offsetWidth","get_offsetHeight" => "get_offsetHeight","get_offsetLeft" => "get_offsetLeft","get_offsetTop" => "get_offsetTop","get_clientWidth" => "get_clientWidth","get_clientHeight" => "get_clientHeight","get_clientLeft" => "get_clientLeft","get_clientTop" => "get_clientTop","get_attachedToDOM" => "get_attachedToDOM","get_firstElementChild" => "get_firstElementChild","get_lastElementChild" => "get_lastElementChild","get_previousElementSibling" => "get_previousElementSibling","get_nextElementSibling" => "get_nextElementSibling","get_childElementCount" => "get_childElementCount","get_firstChild" => "get_firstChild","get_lastChild" => "get_lastChild","get_nextSibling" => "get_nextSibling","get_previousSibling" => "get_previousSibling","get_nodeType" => "get_nodeType","set_nodeValue" => "set_nodeValue","get_nodeValue" => "get_nodeValue","get_nodeName" => "get_nodeName","set_ownerDocument" => "set_ownerDocument","set_onclick" => "set_onClick","set_ondblclick" => "set_onDblClick","set_onmousedown" => "set_onMouseDown","set_onmouseup" => "set_onMouseUp","set_onmouseover" => "set_onMouseOver","set_onmouseout" => "set_onMouseOut","set_onmousemove" => "set_onMouseMove","set_onmousewheel" => "set_onMouseWheel","set_onkeydown" => "set_onKeyDown","set_onkeyup" => "set_onKeyUp","set_onfocus" => "set_onFocus","set_onblur" => "set_onBlur","set_onresize" => "set_onResize","set_onfullscreenchange" => "set_onFullScreenChange","set_onscroll" => "set_onScroll","set_onload" => "set_onLoad","set_onerror" => "set_onError","set_onloadstart" => "set_onLoadStart","set_onprogress" => "set_onProgress","set_onsuspend" => "set_onSuspend","set_onemptied" => "set_onEmptied","set_onstalled" => "set_onStalled","set_onloadedmetadata" => "set_onLoadedMetadata","set_onloadeddata" => "set_onLoadedData","set_oncanplay" => "set_onCanPlay","set_oncanplaythrough" => "set_onCanPlayThrough","set_onplaying" => "set_onPlaying","set_onwaiting" => "set_onWaiting","set_onseeking" => "set_onSeeking","set_onseeked" => "set_onSeeked","set_onended" => "set_onEnded","set_ondurationchange" => "set_onDurationChanged","set_ontimeupdate" => "set_onTimeUpdate","set_onplay" => "set_onPlay","set_onpause" => "set_onPause","set_onvolumechange" => "set_onVolumeChange","set_ontransitionend" => "set_onTransitionEnd","set_onpopstate" => "set_onPopState");
	function __toString() { return 'cocktail.core.html.HTMLStyleElement'; }
}

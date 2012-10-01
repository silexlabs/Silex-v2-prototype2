<?php

class cocktail_core_html_HTMLStyleElement extends cocktail_core_html_HTMLElement {
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		parent::__construct("STYLE");
	}}
	public function set_disabled($value) {
		parent::setAttribute("disabled",Std::string($value));
		return $value;
	}
	public function get_disabled() {
		if($this->getAttribute("disabled") !== null) {
			return true;
		} else {
			return false;
		}
	}
	public function createElementRenderer() {
	}
	public function removeStyleSheet() {
		if($this->sheet !== null) {
			$htmlDocument = $this->ownerDocument;
			$htmlDocument->removeStyleSheet($this->sheet);
			$this->sheet = null;
		}
	}
	public function addStyleSheet() {
		if($this->hasChildNodes() === true) {
			if(_hx_array_get($this->childNodes, 0)->get_nodeType() === 3) {
				if($this->sheet === null) {
					$this->sheet = new cocktail_core_css_CSSStyleSheet(_hx_array_get($this->childNodes, 0)->get_nodeValue(), cocktail_core_css_PropertyOriginValue::$AUTHOR, $this, null, null, null);
					$htmlDocument = $this->ownerDocument;
					$htmlDocument->addStyleSheet($this->sheet);
				}
			}
		}
	}
	public function detach() {
		parent::detach();
		$this->removeStyleSheet();
	}
	public function attach() {
		$this->addStyleSheet();
		parent::attach();
	}
	public function removeChild($oldChild) {
		parent::removeChild($oldChild);
		if($oldChild->get_nodeType() === 3) {
			$this->removeStyleSheet();
		}
		return $oldChild;
	}
	public function appendChild($newChild) {
		parent::appendChild($newChild);
		if($newChild->get_nodeType() === 3) {
			$this->addStyleSheet();
		}
		return $newChild;
	}
	public $sheet;
	public $disabled;
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
	static $__properties__ = array("set_disabled" => "set_disabled","get_disabled" => "get_disabled","set_tabIndex" => "set_tabIndex","get_tabIndex" => "get_tabIndex","set_id" => "set_id","get_id" => "get_id","set_className" => "set_className","get_className" => "get_className","set_hidden" => "set_hidden","get_hidden" => "get_hidden","set_scrollTop" => "set_scrollTop","get_scrollTop" => "get_scrollTop","set_scrollLeft" => "set_scrollLeft","get_scrollLeft" => "get_scrollLeft","get_scrollHeight" => "get_scrollHeight","get_scrollWidth" => "get_scrollWidth","set_innerHTML" => "set_innerHTML","get_innerHTML" => "get_innerHTML","get_offsetParent" => "get_offsetParent","get_offsetWidth" => "get_offsetWidth","get_offsetHeight" => "get_offsetHeight","get_offsetLeft" => "get_offsetLeft","get_offsetTop" => "get_offsetTop","get_clientWidth" => "get_clientWidth","get_clientHeight" => "get_clientHeight","get_clientLeft" => "get_clientLeft","get_clientTop" => "get_clientTop","get_firstElementChild" => "get_firstElementChild","get_lastElementChild" => "get_lastElementChild","get_previousElementSibling" => "get_previousElementSibling","get_nextElementSibling" => "get_nextElementSibling","get_childElementCount" => "get_childElementCount","get_nodeType" => "get_nodeType","set_nodeValue" => "set_nodeValue","get_nodeValue" => "get_nodeValue","get_nodeName" => "get_nodeName","set_ownerDocument" => "set_ownerDocument","get_firstChild" => "get_firstChild","get_lastChild" => "get_lastChild","get_nextSibling" => "get_nextSibling","get_previousSibling" => "get_previousSibling","set_onclick" => "set_onClick","set_ondblclick" => "set_onDblClick","set_onmousedown" => "set_onMouseDown","set_onmouseup" => "set_onMouseUp","set_onmouseover" => "set_onMouseOver","set_onmouseout" => "set_onMouseOut","set_onmousemove" => "set_onMouseMove","set_onmousewheel" => "set_onMouseWheel","set_onkeydown" => "set_onKeyDown","set_onkeyup" => "set_onKeyUp","set_onfocus" => "set_onFocus","set_onblur" => "set_onBlur","set_onresize" => "set_onResize","set_onfullscreenchange" => "set_onFullScreenChange","set_onscroll" => "set_onScroll","set_onload" => "set_onLoad","set_onerror" => "set_onError","set_onloadstart" => "set_onLoadStart","set_onprogress" => "set_onProgress","set_onsuspend" => "set_onSuspend","set_onemptied" => "set_onEmptied","set_onstalled" => "set_onStalled","set_onloadedmetadata" => "set_onLoadedMetadata","set_onloadeddata" => "set_onLoadedData","set_oncanplay" => "set_onCanPlay","set_oncanplaythrough" => "set_onCanPlayThrough","set_onplaying" => "set_onPlaying","set_onwaiting" => "set_onWaiting","set_onseeking" => "set_onSeeking","set_onseeked" => "set_onSeeked","set_onended" => "set_onEnded","set_ondurationchange" => "set_onDurationChanged","set_ontimeupdate" => "set_onTimeUpdate","set_onplay" => "set_onPlay","set_onpause" => "set_onPause","set_onvolumechange" => "set_onVolumeChange","set_ontransitionend" => "set_onTransitionEnd");
	function __toString() { return 'cocktail.core.html.HTMLStyleElement'; }
}

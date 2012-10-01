<?php

class cocktail_core_html_HTMLObjectElement extends cocktail_core_html_EmbeddedElement {
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		parent::__construct("OBJECT");
		$this->_pluginReady = false;
		$this->intrinsicHeight = 150;
		$this->intrinsicWidth = 300;
		$this->intrinsicRatio = $this->get_intrinsicWidth() / $this->get_intrinsicHeight();
	}}
	public function get_data() {
		return $this->getAttribute("data");
	}
	public function set_data($value) {
		parent::setAttribute("data",$value);
		return $value;
	}
	public function onLoadError() {
		$this->_pluginReady = false;
		$errorEvent = new cocktail_core_event_UIEvent();
		$errorEvent->initUIEvent("error", false, false, null, 0.0);
		$this->dispatchEvent($errorEvent);
	}
	public function onLoadComplete() {
		$this->_pluginReady = true;
		$this->invalidateElementRenderer();
		$loadEvent = new cocktail_core_event_UIEvent();
		$loadEvent->initUIEvent("load", false, false, null, 0.0);
		$this->dispatchEvent($loadEvent);
	}
	public function createElementRenderer() {
		if($this->_pluginReady === true) {
			$this->elementRenderer = new cocktail_core_renderer_ObjectRenderer($this);
		}
	}
	public function deletePlugin() {
		if($this->parentNode !== null) {
			return;
		}
		if($this->plugin !== null) {
			$this->plugin->dispose();
			$this->plugin = null;
		}
	}
	public function createPlugin() {
		if($this->plugin !== null) {
			return;
		}
		if($this->get_data() !== null) {
			if(_hx_index_of($this->get_data(), ".swf", null) !== -1) {
				$params = new Hash();
				{
					$_g1 = 0; $_g = $this->childNodes->length;
					while($_g1 < $_g) {
						$i = $_g1++;
						$child = $this->childNodes[$i];
						if($child->tagName === "PARAM") {
							$name = $child->getAttribute("name");
							$value = $child->getAttribute("value");
							if($name !== null && $value !== null) {
								$params->set($name, $value);
							}
							unset($value,$name);
						}
						unset($i,$child);
					}
				}
				$elementAttributes = new Hash();
				{
					$_g1 = 0; $_g = $this->attributes->get_length();
					while($_g1 < $_g) {
						$i = $_g1++;
						$attr = $this->attributes->item($i);
						$elementAttributes->set($attr->name, $attr->get_value());
						unset($i,$attr);
					}
				}
				$this->plugin = new cocktail_plugin_swf_SWFPlugin($elementAttributes, $params, (isset($this->onLoadComplete) ? $this->onLoadComplete: array($this, "onLoadComplete")), (isset($this->onLoadError) ? $this->onLoadError: array($this, "onLoadError")));
			}
		}
	}
	public function detach() {
		parent::detach();
		$this->deletePlugin();
	}
	public function attach() {
		$this->createPlugin();
		parent::attach();
	}
	public function setAttribute($name, $value) {
		if($name === "data") {
			$this->set_data($value);
		} else {
			parent::setAttribute($name,$value);
		}
	}
	public $_pluginReady;
	public $plugin;
	public $data;
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
	static $HTML_OBJECT_INTRISIC_WIDTH = 300;
	static $HTML_OBJECT_INTRINSIC_HEIGHT = 150;
	static $SWF_FILE_EXTENSION = ".swf";
	static $__properties__ = array("set_data" => "set_data","get_data" => "get_data","set_height" => "set_height","get_height" => "get_height","set_width" => "set_width","get_width" => "get_width","get_intrinsicHeight" => "get_intrinsicHeight","get_intrinsicWidth" => "get_intrinsicWidth","get_intrinsicRatio" => "get_intrinsicRatio","set_tabIndex" => "set_tabIndex","get_tabIndex" => "get_tabIndex","set_id" => "set_id","get_id" => "get_id","set_className" => "set_className","get_className" => "get_className","set_hidden" => "set_hidden","get_hidden" => "get_hidden","set_scrollTop" => "set_scrollTop","get_scrollTop" => "get_scrollTop","set_scrollLeft" => "set_scrollLeft","get_scrollLeft" => "get_scrollLeft","get_scrollHeight" => "get_scrollHeight","get_scrollWidth" => "get_scrollWidth","set_innerHTML" => "set_innerHTML","get_innerHTML" => "get_innerHTML","get_offsetParent" => "get_offsetParent","get_offsetWidth" => "get_offsetWidth","get_offsetHeight" => "get_offsetHeight","get_offsetLeft" => "get_offsetLeft","get_offsetTop" => "get_offsetTop","get_clientWidth" => "get_clientWidth","get_clientHeight" => "get_clientHeight","get_clientLeft" => "get_clientLeft","get_clientTop" => "get_clientTop","get_firstElementChild" => "get_firstElementChild","get_lastElementChild" => "get_lastElementChild","get_previousElementSibling" => "get_previousElementSibling","get_nextElementSibling" => "get_nextElementSibling","get_childElementCount" => "get_childElementCount","get_nodeType" => "get_nodeType","set_nodeValue" => "set_nodeValue","get_nodeValue" => "get_nodeValue","get_nodeName" => "get_nodeName","set_ownerDocument" => "set_ownerDocument","get_firstChild" => "get_firstChild","get_lastChild" => "get_lastChild","get_nextSibling" => "get_nextSibling","get_previousSibling" => "get_previousSibling","set_onclick" => "set_onClick","set_ondblclick" => "set_onDblClick","set_onmousedown" => "set_onMouseDown","set_onmouseup" => "set_onMouseUp","set_onmouseover" => "set_onMouseOver","set_onmouseout" => "set_onMouseOut","set_onmousemove" => "set_onMouseMove","set_onmousewheel" => "set_onMouseWheel","set_onkeydown" => "set_onKeyDown","set_onkeyup" => "set_onKeyUp","set_onfocus" => "set_onFocus","set_onblur" => "set_onBlur","set_onresize" => "set_onResize","set_onfullscreenchange" => "set_onFullScreenChange","set_onscroll" => "set_onScroll","set_onload" => "set_onLoad","set_onerror" => "set_onError","set_onloadstart" => "set_onLoadStart","set_onprogress" => "set_onProgress","set_onsuspend" => "set_onSuspend","set_onemptied" => "set_onEmptied","set_onstalled" => "set_onStalled","set_onloadedmetadata" => "set_onLoadedMetadata","set_onloadeddata" => "set_onLoadedData","set_oncanplay" => "set_onCanPlay","set_oncanplaythrough" => "set_onCanPlayThrough","set_onplaying" => "set_onPlaying","set_onwaiting" => "set_onWaiting","set_onseeking" => "set_onSeeking","set_onseeked" => "set_onSeeked","set_onended" => "set_onEnded","set_ondurationchange" => "set_onDurationChanged","set_ontimeupdate" => "set_onTimeUpdate","set_onplay" => "set_onPlay","set_onpause" => "set_onPause","set_onvolumechange" => "set_onVolumeChange","set_ontransitionend" => "set_onTransitionEnd");
	function __toString() { return 'cocktail.core.html.HTMLObjectElement'; }
}

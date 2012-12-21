<?php

class cocktail_core_html_HTMLObjectElement extends cocktail_core_html_EmbeddedElement {
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLObjectElement::new");
		$»spos = $GLOBALS['%s']->length;
		parent::__construct("OBJECT");
		$this->_pluginReady = false;
		$this->intrinsicHeight = 150;
		$this->intrinsicWidth = 300;
		$this->intrinsicRatio = $this->get_intrinsicWidth() / $this->get_intrinsicHeight();
		$GLOBALS['%s']->pop();
	}}
	public function get_data() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLObjectElement::get_data");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getAttribute("data");
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_data($value) {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLObjectElement::set_data");
		$»spos = $GLOBALS['%s']->length;
		parent::setAttribute("data",$value);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function onLoadError() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLObjectElement::onLoadError");
		$»spos = $GLOBALS['%s']->length;
		$this->_pluginReady = false;
		$errorEvent = new cocktail_core_event_UIEvent();
		$errorEvent->initUIEvent("error", false, false, null, 0.0);
		$this->dispatchEvent($errorEvent);
		$GLOBALS['%s']->pop();
	}
	public function onLoadComplete() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLObjectElement::onLoadComplete");
		$»spos = $GLOBALS['%s']->length;
		$this->_pluginReady = true;
		$this->invalidateElementRenderer();
		$loadEvent = new cocktail_core_event_UIEvent();
		$loadEvent->initUIEvent("load", false, false, null, 0.0);
		$this->dispatchEvent($loadEvent);
		$GLOBALS['%s']->pop();
	}
	public function createElementRenderer() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLObjectElement::createElementRenderer");
		$»spos = $GLOBALS['%s']->length;
		if($this->_pluginReady === true) {
			$this->elementRenderer = new cocktail_core_renderer_ObjectRenderer($this);
		}
		$GLOBALS['%s']->pop();
	}
	public function onPluginResourceLoaded($e) {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLObjectElement::onPluginResourceLoaded");
		$»spos = $GLOBALS['%s']->length;
		$e->target->removeEventListener("load", (isset($this->onPluginResourceLoaded) ? $this->onPluginResourceLoaded: array($this, "onPluginResourceLoaded")), null);
		$this->createPlugin();
		$GLOBALS['%s']->pop();
	}
	public function deletePlugin() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLObjectElement::deletePlugin");
		$»spos = $GLOBALS['%s']->length;
		if($this->parentNode !== null) {
			$GLOBALS['%s']->pop();
			return;
		}
		if($this->plugin !== null) {
			$this->_pluginReady = false;
			$this->plugin->dispose();
			$this->plugin = null;
		}
		$GLOBALS['%s']->pop();
	}
	public function createPlugin() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLObjectElement::createPlugin");
		$»spos = $GLOBALS['%s']->length;
		if($this->plugin !== null) {
			$GLOBALS['%s']->pop();
			return;
		}
		if($this->get_data() !== null) {
			if(_hx_index_of($this->get_data(), ".swf", null) !== -1) {
				$resource = cocktail_core_resource_ResourceManager::getSWFResource($this->get_data());
				if($resource->error === true) {
					$GLOBALS['%s']->pop();
					return;
				}
				if($resource->complete === false) {
					$resource->addEventListener("load", (isset($this->onPluginResourceLoaded) ? $this->onPluginResourceLoaded: array($this, "onPluginResourceLoaded")), null);
					{
						$GLOBALS['%s']->pop();
						return;
					}
				}
				$params = new Hash();
				$length = $this->childNodes->length;
				{
					$_g = 0;
					while($_g < $length) {
						$i = $_g++;
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
		$GLOBALS['%s']->pop();
	}
	public function removedFromDOM() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLObjectElement::removedFromDOM");
		$»spos = $GLOBALS['%s']->length;
		parent::removedFromDOM();
		$this->deletePlugin();
		$GLOBALS['%s']->pop();
	}
	public function addedToDOM() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLObjectElement::addedToDOM");
		$»spos = $GLOBALS['%s']->length;
		parent::addedToDOM();
		if($this->get_data() !== null) {
			if(_hx_index_of($this->get_data(), ".swf", null) !== -1) {
				cocktail_core_resource_ResourceManager::getSWFResource($this->get_data());
			}
		}
		$GLOBALS['%s']->pop();
	}
	public function attach($recursive) {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLObjectElement::attach");
		$»spos = $GLOBALS['%s']->length;
		parent::attach($recursive);
		if($this->isRendered() === true) {
			$this->createPlugin();
		}
		$GLOBALS['%s']->pop();
	}
	public function setAttribute($name, $value) {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLObjectElement::setAttribute");
		$»spos = $GLOBALS['%s']->length;
		if($name === "data") {
			$this->set_data($value);
		} else {
			parent::setAttribute($name,$value);
		}
		$GLOBALS['%s']->pop();
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
	static $__properties__ = array("set_data" => "set_data","get_data" => "get_data","set_height" => "set_height","get_height" => "get_height","set_width" => "set_width","get_width" => "get_width","get_intrinsicHeight" => "get_intrinsicHeight","get_intrinsicWidth" => "get_intrinsicWidth","get_intrinsicRatio" => "get_intrinsicRatio","set_tabIndex" => "set_tabIndex","get_tabIndex" => "get_tabIndex","set_id" => "set_id","get_id" => "get_id","set_className" => "set_className","get_className" => "get_className","set_hidden" => "set_hidden","get_hidden" => "get_hidden","set_scrollTop" => "set_scrollTop","get_scrollTop" => "get_scrollTop","set_scrollLeft" => "set_scrollLeft","get_scrollLeft" => "get_scrollLeft","get_scrollHeight" => "get_scrollHeight","get_scrollWidth" => "get_scrollWidth","set_innerHTML" => "set_innerHTML","get_innerHTML" => "get_innerHTML","set_outerHTML" => "set_outerHTML","get_outerHTML" => "get_outerHTML","get_offsetParent" => "get_offsetParent","get_offsetWidth" => "get_offsetWidth","get_offsetHeight" => "get_offsetHeight","get_offsetLeft" => "get_offsetLeft","get_offsetTop" => "get_offsetTop","get_clientWidth" => "get_clientWidth","get_clientHeight" => "get_clientHeight","get_clientLeft" => "get_clientLeft","get_clientTop" => "get_clientTop","get_attachedToDOM" => "get_attachedToDOM","get_firstElementChild" => "get_firstElementChild","get_lastElementChild" => "get_lastElementChild","get_previousElementSibling" => "get_previousElementSibling","get_nextElementSibling" => "get_nextElementSibling","get_childElementCount" => "get_childElementCount","get_firstChild" => "get_firstChild","get_lastChild" => "get_lastChild","get_nextSibling" => "get_nextSibling","get_previousSibling" => "get_previousSibling","get_nodeType" => "get_nodeType","set_nodeValue" => "set_nodeValue","get_nodeValue" => "get_nodeValue","get_nodeName" => "get_nodeName","set_ownerDocument" => "set_ownerDocument","set_onclick" => "set_onClick","set_ondblclick" => "set_onDblClick","set_onmousedown" => "set_onMouseDown","set_onmouseup" => "set_onMouseUp","set_onmouseover" => "set_onMouseOver","set_onmouseout" => "set_onMouseOut","set_onmousemove" => "set_onMouseMove","set_onmousewheel" => "set_onMouseWheel","set_onkeydown" => "set_onKeyDown","set_onkeyup" => "set_onKeyUp","set_onfocus" => "set_onFocus","set_onblur" => "set_onBlur","set_onresize" => "set_onResize","set_onfullscreenchange" => "set_onFullScreenChange","set_onscroll" => "set_onScroll","set_onload" => "set_onLoad","set_onerror" => "set_onError","set_onloadstart" => "set_onLoadStart","set_onprogress" => "set_onProgress","set_onsuspend" => "set_onSuspend","set_onemptied" => "set_onEmptied","set_onstalled" => "set_onStalled","set_onloadedmetadata" => "set_onLoadedMetadata","set_onloadeddata" => "set_onLoadedData","set_oncanplay" => "set_onCanPlay","set_oncanplaythrough" => "set_onCanPlayThrough","set_onplaying" => "set_onPlaying","set_onwaiting" => "set_onWaiting","set_onseeking" => "set_onSeeking","set_onseeked" => "set_onSeeked","set_onended" => "set_onEnded","set_ondurationchange" => "set_onDurationChanged","set_ontimeupdate" => "set_onTimeUpdate","set_onplay" => "set_onPlay","set_onpause" => "set_onPause","set_onvolumechange" => "set_onVolumeChange","set_ontransitionend" => "set_onTransitionEnd","set_onpopstate" => "set_onPopState");
	function __toString() { return 'cocktail.core.html.HTMLObjectElement'; }
}

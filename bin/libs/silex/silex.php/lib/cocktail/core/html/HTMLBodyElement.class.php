<?php

class cocktail_core_html_HTMLBodyElement extends cocktail_core_html_HTMLElement {
	public function __construct() { if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLBodyElement::new");
		$製pos = $GLOBALS['%s']->length;
		parent::__construct("BODY");
		$GLOBALS['%s']->pop();
	}}
	public function cascadeSelf($cascadeManager, $programmaticChange) {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLBodyElement::cascadeSelf");
		$製pos = $GLOBALS['%s']->length;
		parent::cascadeSelf($cascadeManager,$programmaticChange);
		$parentCoreStyle = $this->parentNode->coreStyle;
		if($parentCoreStyle->computedValues->get_overflowX() !== null) {
			$裨 = ($parentCoreStyle->getKeyword(_hx_deref((cocktail_core_html_HTMLBodyElement_0($this, $cascadeManager, $parentCoreStyle, $programmaticChange)))->typedValue));
			switch($裨->index) {
			case 36:
			{
				$parentCoreStyle->computedValues->set_overflowX($this->coreStyle->computedValues->get_overflowX());
			}break;
			default:{
			}break;
			}
		}
		if($parentCoreStyle->computedValues->get_overflowY() !== null) {
			$裨 = ($parentCoreStyle->getKeyword(_hx_deref((cocktail_core_html_HTMLBodyElement_1($this, $cascadeManager, $parentCoreStyle, $programmaticChange)))->typedValue));
			switch($裨->index) {
			case 36:
			{
				$parentCoreStyle->computedValues->set_overflowY($this->coreStyle->computedValues->get_overflowY());
			}break;
			default:{
			}break;
			}
		}
		$GLOBALS['%s']->pop();
	}
	public function createElementRenderer() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLBodyElement::createElementRenderer");
		$製pos = $GLOBALS['%s']->length;
		$this->elementRenderer = new cocktail_core_renderer_BodyBoxRenderer($this);
		$GLOBALS['%s']->pop();
	}
	static $__properties__ = array("set_tabIndex" => "set_tabIndex","get_tabIndex" => "get_tabIndex","set_id" => "set_id","get_id" => "get_id","set_className" => "set_className","get_className" => "get_className","set_hidden" => "set_hidden","get_hidden" => "get_hidden","set_scrollTop" => "set_scrollTop","get_scrollTop" => "get_scrollTop","set_scrollLeft" => "set_scrollLeft","get_scrollLeft" => "get_scrollLeft","get_scrollHeight" => "get_scrollHeight","get_scrollWidth" => "get_scrollWidth","set_innerHTML" => "set_innerHTML","get_innerHTML" => "get_innerHTML","set_outerHTML" => "set_outerHTML","get_outerHTML" => "get_outerHTML","get_offsetParent" => "get_offsetParent","get_offsetWidth" => "get_offsetWidth","get_offsetHeight" => "get_offsetHeight","get_offsetLeft" => "get_offsetLeft","get_offsetTop" => "get_offsetTop","get_clientWidth" => "get_clientWidth","get_clientHeight" => "get_clientHeight","get_clientLeft" => "get_clientLeft","get_clientTop" => "get_clientTop","get_attachedToDOM" => "get_attachedToDOM","get_firstElementChild" => "get_firstElementChild","get_lastElementChild" => "get_lastElementChild","get_previousElementSibling" => "get_previousElementSibling","get_nextElementSibling" => "get_nextElementSibling","get_childElementCount" => "get_childElementCount","get_firstChild" => "get_firstChild","get_lastChild" => "get_lastChild","get_nextSibling" => "get_nextSibling","get_previousSibling" => "get_previousSibling","get_nodeType" => "get_nodeType","set_nodeValue" => "set_nodeValue","get_nodeValue" => "get_nodeValue","get_nodeName" => "get_nodeName","set_ownerDocument" => "set_ownerDocument","set_onclick" => "set_onClick","set_ondblclick" => "set_onDblClick","set_onmousedown" => "set_onMouseDown","set_onmouseup" => "set_onMouseUp","set_onmouseover" => "set_onMouseOver","set_onmouseout" => "set_onMouseOut","set_onmousemove" => "set_onMouseMove","set_onmousewheel" => "set_onMouseWheel","set_onkeydown" => "set_onKeyDown","set_onkeyup" => "set_onKeyUp","set_onfocus" => "set_onFocus","set_onblur" => "set_onBlur","set_onresize" => "set_onResize","set_onfullscreenchange" => "set_onFullScreenChange","set_onscroll" => "set_onScroll","set_onload" => "set_onLoad","set_onerror" => "set_onError","set_onloadstart" => "set_onLoadStart","set_onprogress" => "set_onProgress","set_onsuspend" => "set_onSuspend","set_onemptied" => "set_onEmptied","set_onstalled" => "set_onStalled","set_onloadedmetadata" => "set_onLoadedMetadata","set_onloadeddata" => "set_onLoadedData","set_oncanplay" => "set_onCanPlay","set_oncanplaythrough" => "set_onCanPlayThrough","set_onplaying" => "set_onPlaying","set_onwaiting" => "set_onWaiting","set_onseeking" => "set_onSeeking","set_onseeked" => "set_onSeeked","set_onended" => "set_onEnded","set_ondurationchange" => "set_onDurationChanged","set_ontimeupdate" => "set_onTimeUpdate","set_onplay" => "set_onPlay","set_onpause" => "set_onPause","set_onvolumechange" => "set_onVolumeChange","set_ontransitionend" => "set_onTransitionEnd","set_onpopstate" => "set_onPopState");
	function __toString() { return 'cocktail.core.html.HTMLBodyElement'; }
}
function cocktail_core_html_HTMLBodyElement_0(&$裨his, &$cascadeManager, &$parentCoreStyle, &$programmaticChange) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this = $parentCoreStyle->computedValues;
		$typedProperty = null;
		$length = $_this->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($_this->_properties, $i)->name === "overflow-x") {
					$typedProperty = $_this->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}
function cocktail_core_html_HTMLBodyElement_1(&$裨his, &$cascadeManager, &$parentCoreStyle, &$programmaticChange) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this = $parentCoreStyle->computedValues;
		$typedProperty = null;
		$length = $_this->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($_this->_properties, $i)->name === "overflow-y") {
					$typedProperty = $_this->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}

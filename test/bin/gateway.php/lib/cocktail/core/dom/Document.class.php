<?php

class cocktail_core_dom_Document extends cocktail_core_dom_Node {
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.dom.Document::new");
		$»spos = $GLOBALS['%s']->length;
		parent::__construct();
		$GLOBALS['%s']->pop();
	}}
	public function get_nodeType() {
		$GLOBALS['%s']->push("cocktail.core.dom.Document::get_nodeType");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return 9;
		}
		$GLOBALS['%s']->pop();
	}
	public function getElementsByClassName($className) {
		$GLOBALS['%s']->push("cocktail.core.dom.Document::getElementsByClassName");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->documentElement->getElementsByClassName($className);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getElementsByTagName($tagName) {
		$GLOBALS['%s']->push("cocktail.core.dom.Document::getElementsByTagName");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->documentElement->getElementsByTagName($tagName);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function doGetElementById($node, $elementId) {
		$GLOBALS['%s']->push("cocktail.core.dom.Document::doGetElementById");
		$»spos = $GLOBALS['%s']->length;
		if($node->hasChildNodes() === true && $node->get_nodeType() === 1) {
			$length = $node->childNodes->length;
			{
				$_g = 0;
				while($_g < $length) {
					$i = $_g++;
					$matchingElement = $this->doGetElementById($node->childNodes[$i], $elementId);
					if($matchingElement !== null) {
						$GLOBALS['%s']->pop();
						return $matchingElement;
					}
					unset($matchingElement,$i);
				}
			}
		}
		if($node->hasAttributes() === true) {
			$attributes = $node->attributes;
			$element = $node;
			$attributesLength = $attributes->get_length();
			{
				$_g = 0;
				while($_g < $attributesLength) {
					$i = $_g++;
					$attribute = $element->getAttributeNode($attributes->item($i)->get_nodeName());
					if($attribute->isId === true && $attribute->specified === true) {
						if($attribute->get_value() === $elementId) {
							$GLOBALS['%s']->pop();
							return $element;
						}
					}
					unset($i,$attribute);
				}
			}
		}
		{
			$GLOBALS['%s']->pop();
			return null;
		}
		$GLOBALS['%s']->pop();
	}
	public function getElementById($elementId) {
		$GLOBALS['%s']->push("cocktail.core.dom.Document::getElementById");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->doGetElementById($this->documentElement, $elementId);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function createEvent($eventInterface) {
		$GLOBALS['%s']->push("cocktail.core.dom.Document::createEvent");
		$»spos = $GLOBALS['%s']->length;
		switch($eventInterface) {
		case "Event":{
			$»tmp = new cocktail_core_event_Event();
			$GLOBALS['%s']->pop();
			return $»tmp;
		}break;
		case "UIEvent":{
			$»tmp = new cocktail_core_event_UIEvent();
			$GLOBALS['%s']->pop();
			return $»tmp;
		}break;
		case "CustomEvent":{
			$»tmp = new cocktail_core_event_CustomEvent();
			$GLOBALS['%s']->pop();
			return $»tmp;
		}break;
		case "MouseEvent":{
			$»tmp = new cocktail_core_event_MouseEvent();
			$GLOBALS['%s']->pop();
			return $»tmp;
		}break;
		case "KeyboardEvent":{
			$»tmp = new cocktail_core_event_KeyboardEvent();
			$GLOBALS['%s']->pop();
			return $»tmp;
		}break;
		case "FocusEvent":{
			$»tmp = new cocktail_core_event_FocusEvent();
			$GLOBALS['%s']->pop();
			return $»tmp;
		}break;
		case "WheelEvent":{
			$»tmp = new cocktail_core_event_WheelEvent();
			$GLOBALS['%s']->pop();
			return $»tmp;
		}break;
		case "TransitionEvent":{
			$»tmp = new cocktail_core_event_TransitionEvent();
			$GLOBALS['%s']->pop();
			return $»tmp;
		}break;
		default:{
			throw new HException(9);
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return null;
		}
		$GLOBALS['%s']->pop();
	}
	public function createAttribute($name) {
		$GLOBALS['%s']->push("cocktail.core.dom.Document::createAttribute");
		$»spos = $GLOBALS['%s']->length;
		$attribute = new cocktail_core_dom_Attr($name);
		{
			$GLOBALS['%s']->pop();
			return $attribute;
		}
		$GLOBALS['%s']->pop();
	}
	public function createComment($data) {
		$GLOBALS['%s']->push("cocktail.core.dom.Document::createComment");
		$»spos = $GLOBALS['%s']->length;
		$comment = new cocktail_core_dom_Comment();
		$comment->set_nodeValue($data);
		{
			$GLOBALS['%s']->pop();
			return $comment;
		}
		$GLOBALS['%s']->pop();
	}
	public function createTextNode($data) {
		$GLOBALS['%s']->push("cocktail.core.dom.Document::createTextNode");
		$»spos = $GLOBALS['%s']->length;
		$text = new cocktail_core_dom_Text();
		$text->set_nodeValue($data);
		{
			$GLOBALS['%s']->pop();
			return $text;
		}
		$GLOBALS['%s']->pop();
	}
	public function createElement($tagName) {
		$GLOBALS['%s']->push("cocktail.core.dom.Document::createElement");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return null;
		}
		$GLOBALS['%s']->pop();
	}
	public $documentElement;
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
	static $__properties__ = array("get_nodeType" => "get_nodeType","set_nodeValue" => "set_nodeValue","get_nodeValue" => "get_nodeValue","get_nodeName" => "get_nodeName","set_ownerDocument" => "set_ownerDocument","get_firstChild" => "get_firstChild","get_lastChild" => "get_lastChild","get_nextSibling" => "get_nextSibling","get_previousSibling" => "get_previousSibling","set_onclick" => "set_onClick","set_ondblclick" => "set_onDblClick","set_onmousedown" => "set_onMouseDown","set_onmouseup" => "set_onMouseUp","set_onmouseover" => "set_onMouseOver","set_onmouseout" => "set_onMouseOut","set_onmousemove" => "set_onMouseMove","set_onmousewheel" => "set_onMouseWheel","set_onkeydown" => "set_onKeyDown","set_onkeyup" => "set_onKeyUp","set_onfocus" => "set_onFocus","set_onblur" => "set_onBlur","set_onresize" => "set_onResize","set_onfullscreenchange" => "set_onFullScreenChange","set_onscroll" => "set_onScroll","set_onload" => "set_onLoad","set_onerror" => "set_onError","set_onloadstart" => "set_onLoadStart","set_onprogress" => "set_onProgress","set_onsuspend" => "set_onSuspend","set_onemptied" => "set_onEmptied","set_onstalled" => "set_onStalled","set_onloadedmetadata" => "set_onLoadedMetadata","set_onloadeddata" => "set_onLoadedData","set_oncanplay" => "set_onCanPlay","set_oncanplaythrough" => "set_onCanPlayThrough","set_onplaying" => "set_onPlaying","set_onwaiting" => "set_onWaiting","set_onseeking" => "set_onSeeking","set_onseeked" => "set_onSeeked","set_onended" => "set_onEnded","set_ondurationchange" => "set_onDurationChanged","set_ontimeupdate" => "set_onTimeUpdate","set_onplay" => "set_onPlay","set_onpause" => "set_onPause","set_onvolumechange" => "set_onVolumeChange","set_ontransitionend" => "set_onTransitionEnd");
	function __toString() { return 'cocktail.core.dom.Document'; }
}

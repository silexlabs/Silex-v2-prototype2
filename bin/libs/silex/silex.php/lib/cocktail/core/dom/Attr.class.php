<?php

class cocktail_core_dom_Attr extends cocktail_core_dom_Node {
	public function __construct($name) {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.dom.Attr::new");
		$»spos = $GLOBALS['%s']->length;
		$this->name = $name;
		$this->specified = false;
		parent::__construct();
		$GLOBALS['%s']->pop();
	}}
	public function set_value($value) {
		$GLOBALS['%s']->push("cocktail.core.dom.Attr::set_value");
		$»spos = $GLOBALS['%s']->length;
		$this->specified = true;
		{
			$»tmp = $this->value = $value;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_value() {
		$GLOBALS['%s']->push("cocktail.core.dom.Attr::get_value");
		$»spos = $GLOBALS['%s']->length;
		if($this->value === null) {
			$GLOBALS['%s']->pop();
			return "";
		}
		{
			$»tmp = $this->value;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_nodeValue($value) {
		$GLOBALS['%s']->push("cocktail.core.dom.Attr::set_nodeValue");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->set_value($value);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_nodeValue() {
		$GLOBALS['%s']->push("cocktail.core.dom.Attr::get_nodeValue");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->get_value();
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_nodeType() {
		$GLOBALS['%s']->push("cocktail.core.dom.Attr::get_nodeType");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return 2;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_nodeName() {
		$GLOBALS['%s']->push("cocktail.core.dom.Attr::get_nodeName");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->name;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function doCloneNode() {
		$GLOBALS['%s']->push("cocktail.core.dom.Attr::doCloneNode");
		$»spos = $GLOBALS['%s']->length;
		$clonedAttr = new cocktail_core_dom_Attr($this->name);
		$clonedAttr->specified = $this->specified;
		$clonedAttr->isId = $this->isId;
		$clonedAttr->set_value($this->get_value());
		{
			$GLOBALS['%s']->pop();
			return $clonedAttr;
		}
		$GLOBALS['%s']->pop();
	}
	public function initChildNodes() {
		$GLOBALS['%s']->push("cocktail.core.dom.Attr::initChildNodes");
		$»spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public $ownerElement;
	public $isId;
	public $specified;
	public $value;
	public $name;
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
	static $__properties__ = array("set_value" => "set_value","get_value" => "get_value","get_firstChild" => "get_firstChild","get_lastChild" => "get_lastChild","get_nextSibling" => "get_nextSibling","get_previousSibling" => "get_previousSibling","get_nodeType" => "get_nodeType","set_nodeValue" => "set_nodeValue","get_nodeValue" => "get_nodeValue","get_nodeName" => "get_nodeName","set_ownerDocument" => "set_ownerDocument","set_onclick" => "set_onClick","set_ondblclick" => "set_onDblClick","set_onmousedown" => "set_onMouseDown","set_onmouseup" => "set_onMouseUp","set_onmouseover" => "set_onMouseOver","set_onmouseout" => "set_onMouseOut","set_onmousemove" => "set_onMouseMove","set_onmousewheel" => "set_onMouseWheel","set_onkeydown" => "set_onKeyDown","set_onkeyup" => "set_onKeyUp","set_onfocus" => "set_onFocus","set_onblur" => "set_onBlur","set_onresize" => "set_onResize","set_onfullscreenchange" => "set_onFullScreenChange","set_onscroll" => "set_onScroll","set_onload" => "set_onLoad","set_onerror" => "set_onError","set_onloadstart" => "set_onLoadStart","set_onprogress" => "set_onProgress","set_onsuspend" => "set_onSuspend","set_onemptied" => "set_onEmptied","set_onstalled" => "set_onStalled","set_onloadedmetadata" => "set_onLoadedMetadata","set_onloadeddata" => "set_onLoadedData","set_oncanplay" => "set_onCanPlay","set_oncanplaythrough" => "set_onCanPlayThrough","set_onplaying" => "set_onPlaying","set_onwaiting" => "set_onWaiting","set_onseeking" => "set_onSeeking","set_onseeked" => "set_onSeeked","set_onended" => "set_onEnded","set_ondurationchange" => "set_onDurationChanged","set_ontimeupdate" => "set_onTimeUpdate","set_onplay" => "set_onPlay","set_onpause" => "set_onPause","set_onvolumechange" => "set_onVolumeChange","set_ontransitionend" => "set_onTransitionEnd","set_onpopstate" => "set_onPopState");
	function __toString() { return 'cocktail.core.dom.Attr'; }
}

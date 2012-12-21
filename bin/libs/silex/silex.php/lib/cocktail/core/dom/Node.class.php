<?php

class cocktail_core_dom_Node extends cocktail_core_event_EventCallback {
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.dom.Node::new");
		$»spos = $GLOBALS['%s']->length;
		parent::__construct();
		$this->initChildNodes();
		$GLOBALS['%s']->pop();
	}}
	public function get_nodeName() {
		$GLOBALS['%s']->push("cocktail.core.dom.Node::get_nodeName");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return null;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_ownerDocument($value) {
		$GLOBALS['%s']->push("cocktail.core.dom.Node::set_ownerDocument");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->ownerDocument = $value;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_nodeValue($value) {
		$GLOBALS['%s']->push("cocktail.core.dom.Node::set_nodeValue");
		$»spos = $GLOBALS['%s']->length;
		if($value !== null) {
			throw new HException(7);
		}
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_nodeValue() {
		$GLOBALS['%s']->push("cocktail.core.dom.Node::get_nodeValue");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return null;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_nodeType() {
		$GLOBALS['%s']->push("cocktail.core.dom.Node::get_nodeType");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return -1;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_previousSibling() {
		$GLOBALS['%s']->push("cocktail.core.dom.Node::get_previousSibling");
		$»spos = $GLOBALS['%s']->length;
		if($this->parentNode === null) {
			$GLOBALS['%s']->pop();
			return null;
		} else {
			if($this->parentNode->get_firstChild() != $this) {
				$length = $this->parentNode->childNodes->length;
				{
					$_g = 0;
					while($_g < $length) {
						$i = $_g++;
						if($this->parentNode->childNodes[$i] == $this) {
							$»tmp = $this->parentNode->childNodes[$i - 1];
							$GLOBALS['%s']->pop();
							return $»tmp;
							unset($»tmp);
						}
						unset($i);
					}
				}
			}
		}
		{
			$GLOBALS['%s']->pop();
			return null;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_nextSibling() {
		$GLOBALS['%s']->push("cocktail.core.dom.Node::get_nextSibling");
		$»spos = $GLOBALS['%s']->length;
		if($this->parentNode === null) {
			$GLOBALS['%s']->pop();
			return null;
		} else {
			if($this->parentNode->get_lastChild() != $this) {
				$parentChildNodes = $this->parentNode->childNodes;
				$length = $parentChildNodes->length;
				{
					$_g = 0;
					while($_g < $length) {
						$i = $_g++;
						if(($parentChildNodes[$i] === $this)) {
							$»tmp = $parentChildNodes[$i + 1];
							$GLOBALS['%s']->pop();
							return $»tmp;
							unset($»tmp);
						}
						unset($i);
					}
				}
			}
		}
		{
			$GLOBALS['%s']->pop();
			return null;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_lastChild() {
		$GLOBALS['%s']->push("cocktail.core.dom.Node::get_lastChild");
		$»spos = $GLOBALS['%s']->length;
		if($this->hasChildNodes() === true) {
			$»tmp = $this->childNodes[$this->childNodes->length - 1];
			$GLOBALS['%s']->pop();
			return $»tmp;
		} else {
			$GLOBALS['%s']->pop();
			return null;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_firstChild() {
		$GLOBALS['%s']->push("cocktail.core.dom.Node::get_firstChild");
		$»spos = $GLOBALS['%s']->length;
		if($this->hasChildNodes() === true) {
			$»tmp = $this->childNodes[0];
			$GLOBALS['%s']->pop();
			return $»tmp;
		} else {
			$GLOBALS['%s']->pop();
			return null;
		}
		$GLOBALS['%s']->pop();
	}
	public function removeFromParentIfNecessary($newChild) {
		$GLOBALS['%s']->push("cocktail.core.dom.Node::removeFromParentIfNecessary");
		$»spos = $GLOBALS['%s']->length;
		if($newChild->parentNode !== null) {
			$parentNode = $newChild->parentNode;
			$parentNode->removeChild($newChild);
		}
		$GLOBALS['%s']->pop();
	}
	public function doCloneNode() {
		$GLOBALS['%s']->push("cocktail.core.dom.Node::doCloneNode");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = new cocktail_core_dom_Node();
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getTargetAncestors() {
		$GLOBALS['%s']->push("cocktail.core.dom.Node::getTargetAncestors");
		$»spos = $GLOBALS['%s']->length;
		$parent = $this->parentNode;
		$targetAncestors = parent::getTargetAncestors();
		while($parent !== null) {
			$targetAncestors->push($parent);
			$parent = $parent->parentNode;
		}
		{
			$GLOBALS['%s']->pop();
			return $targetAncestors;
		}
		$GLOBALS['%s']->pop();
	}
	public function hasAttributes() {
		$GLOBALS['%s']->push("cocktail.core.dom.Node::hasAttributes");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function cloneNode($deep) {
		$GLOBALS['%s']->push("cocktail.core.dom.Node::cloneNode");
		$»spos = $GLOBALS['%s']->length;
		$clonedNode = $this->doCloneNode();
		if($deep === true) {
			$childLength = $this->childNodes->length;
			{
				$_g = 0;
				while($_g < $childLength) {
					$i = $_g++;
					$clonedNode->appendChild(_hx_array_get($this->childNodes, $i)->cloneNode($deep));
					unset($i);
				}
			}
		}
		{
			$»tmp = $clonedNode;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function hasChildNodes() {
		$GLOBALS['%s']->push("cocktail.core.dom.Node::hasChildNodes");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->childNodes->length > 0;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function replaceChild($newChild, $oldChild) {
		$GLOBALS['%s']->push("cocktail.core.dom.Node::replaceChild");
		$»spos = $GLOBALS['%s']->length;
		$length = $this->childNodes->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if($this->childNodes[$i] == $oldChild) {
					$this->removeChild($oldChild);
					$this->appendChild($newChild);
				}
				unset($i);
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $oldChild;
		}
		$GLOBALS['%s']->pop();
	}
	public function isSameNode($other) {
		$GLOBALS['%s']->push("cocktail.core.dom.Node::isSameNode");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $other == $this;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function insertBefore($newChild, $refChild) {
		$GLOBALS['%s']->push("cocktail.core.dom.Node::insertBefore");
		$»spos = $GLOBALS['%s']->length;
		if($refChild === null) {
			$this->appendChild($newChild);
		} else {
			$length = $this->childNodes->length;
			{
				$_g = 0;
				while($_g < $length) {
					$i = $_g++;
					if($this->childNodes[$i] == $refChild) {
						$this->childNodes->insert($i, $newChild);
						$this->removeFromParentIfNecessary($newChild);
						$newChild->parentNode = $this;
						{
							$GLOBALS['%s']->pop();
							return $newChild;
						}
					}
					unset($i);
				}
			}
			throw new HException(8);
		}
		{
			$GLOBALS['%s']->pop();
			return $newChild;
		}
		$GLOBALS['%s']->pop();
	}
	public function appendChild($newChild) {
		$GLOBALS['%s']->push("cocktail.core.dom.Node::appendChild");
		$»spos = $GLOBALS['%s']->length;
		$this->removeFromParentIfNecessary($newChild);
		$newChild->parentNode = $this;
		$this->childNodes->push($newChild);
		{
			$GLOBALS['%s']->pop();
			return $newChild;
		}
		$GLOBALS['%s']->pop();
	}
	public function removeChild($oldChild) {
		$GLOBALS['%s']->push("cocktail.core.dom.Node::removeChild");
		$»spos = $GLOBALS['%s']->length;
		$oldChild->parentNode = null;
		$this->childNodes->remove($oldChild);
		{
			$GLOBALS['%s']->pop();
			return $oldChild;
		}
		$GLOBALS['%s']->pop();
	}
	public function initChildNodes() {
		$GLOBALS['%s']->push("cocktail.core.dom.Node::initChildNodes");
		$»spos = $GLOBALS['%s']->length;
		$this->childNodes = new _hx_array(array());
		$GLOBALS['%s']->pop();
	}
	public $ownerDocument;
	public $attributes;
	public $nodeName;
	public $nodeValue;
	public $nodeType;
	public $previousSibling;
	public $nextSibling;
	public $lastChild;
	public $firstChild;
	public $childNodes;
	public $parentNode;
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
	static $__properties__ = array("get_firstChild" => "get_firstChild","get_lastChild" => "get_lastChild","get_nextSibling" => "get_nextSibling","get_previousSibling" => "get_previousSibling","get_nodeType" => "get_nodeType","set_nodeValue" => "set_nodeValue","get_nodeValue" => "get_nodeValue","get_nodeName" => "get_nodeName","set_ownerDocument" => "set_ownerDocument","set_onclick" => "set_onClick","set_ondblclick" => "set_onDblClick","set_onmousedown" => "set_onMouseDown","set_onmouseup" => "set_onMouseUp","set_onmouseover" => "set_onMouseOver","set_onmouseout" => "set_onMouseOut","set_onmousemove" => "set_onMouseMove","set_onmousewheel" => "set_onMouseWheel","set_onkeydown" => "set_onKeyDown","set_onkeyup" => "set_onKeyUp","set_onfocus" => "set_onFocus","set_onblur" => "set_onBlur","set_onresize" => "set_onResize","set_onfullscreenchange" => "set_onFullScreenChange","set_onscroll" => "set_onScroll","set_onload" => "set_onLoad","set_onerror" => "set_onError","set_onloadstart" => "set_onLoadStart","set_onprogress" => "set_onProgress","set_onsuspend" => "set_onSuspend","set_onemptied" => "set_onEmptied","set_onstalled" => "set_onStalled","set_onloadedmetadata" => "set_onLoadedMetadata","set_onloadeddata" => "set_onLoadedData","set_oncanplay" => "set_onCanPlay","set_oncanplaythrough" => "set_onCanPlayThrough","set_onplaying" => "set_onPlaying","set_onwaiting" => "set_onWaiting","set_onseeking" => "set_onSeeking","set_onseeked" => "set_onSeeked","set_onended" => "set_onEnded","set_ondurationchange" => "set_onDurationChanged","set_ontimeupdate" => "set_onTimeUpdate","set_onplay" => "set_onPlay","set_onpause" => "set_onPause","set_onvolumechange" => "set_onVolumeChange","set_ontransitionend" => "set_onTransitionEnd","set_onpopstate" => "set_onPopState");
	function __toString() { return 'cocktail.core.dom.Node'; }
}

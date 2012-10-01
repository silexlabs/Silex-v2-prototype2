<?php

class cocktail_core_dom_Element extends cocktail_core_dom_Node {
	public function __construct($tagName) {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.dom.Element::new");
		$»spos = $GLOBALS['%s']->length;
		$this->tagName = $tagName;
		$this->attributes = new cocktail_core_dom_NamedNodeMap();
		parent::__construct();
		$GLOBALS['%s']->pop();
	}}
	public function get_childElementCount() {
		$GLOBALS['%s']->push("cocktail.core.dom.Element::get_childElementCount");
		$»spos = $GLOBALS['%s']->length;
		$childElementCount = 0;
		$length = $this->childNodes->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($this->childNodes, $i)->get_nodeType() === 1) {
					$childElementCount++;
				}
				unset($i);
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $childElementCount;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_previousElementSibling() {
		$GLOBALS['%s']->push("cocktail.core.dom.Element::get_previousElementSibling");
		$»spos = $GLOBALS['%s']->length;
		if($this->get_previousSibling() === null) {
			$GLOBALS['%s']->pop();
			return null;
		}
		$previousElementSibling = $this->get_previousSibling();
		while($previousElementSibling->get_nodeType() !== 1) {
			$previousElementSibling = $previousElementSibling->get_previousSibling();
			if($previousElementSibling === null) {
				$GLOBALS['%s']->pop();
				return null;
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $previousElementSibling;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_nextElementSibling() {
		$GLOBALS['%s']->push("cocktail.core.dom.Element::get_nextElementSibling");
		$»spos = $GLOBALS['%s']->length;
		if($this->get_nextSibling() === null) {
			$GLOBALS['%s']->pop();
			return null;
		}
		$nextElementSibling = $this->get_nextSibling();
		while($nextElementSibling->get_nodeType() !== 1) {
			$nextElementSibling = $nextElementSibling->get_nextSibling();
			if($nextElementSibling === null) {
				$GLOBALS['%s']->pop();
				return null;
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $nextElementSibling;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_lastElementChild() {
		$GLOBALS['%s']->push("cocktail.core.dom.Element::get_lastElementChild");
		$»spos = $GLOBALS['%s']->length;
		if($this->hasChildNodes() === false) {
			$GLOBALS['%s']->pop();
			return null;
		}
		if($this->get_lastChild()->get_nodeType() === 1) {
			$»tmp = $this->get_lastChild();
			$GLOBALS['%s']->pop();
			return $»tmp;
		} else {
			$length = $this->childNodes->length;
			{
				$_g = $length;
				while($_g < 0) {
					$i = $_g++;
					if(_hx_array_get($this->childNodes, $i)->get_nodeType() === 1) {
						$»tmp = $this->childNodes[$i];
						$GLOBALS['%s']->pop();
						return $»tmp;
						unset($»tmp);
					}
					unset($i);
				}
			}
		}
		{
			$GLOBALS['%s']->pop();
			return null;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_firstElementChild() {
		$GLOBALS['%s']->push("cocktail.core.dom.Element::get_firstElementChild");
		$»spos = $GLOBALS['%s']->length;
		if($this->hasChildNodes() === false) {
			$GLOBALS['%s']->pop();
			return null;
		}
		if($this->get_firstChild()->get_nodeType() === 1) {
			$»tmp = $this->get_firstChild();
			$GLOBALS['%s']->pop();
			return $»tmp;
		} else {
			$length = $this->childNodes->length;
			{
				$_g = 0;
				while($_g < $length) {
					$i = $_g++;
					if(_hx_array_get($this->childNodes, $i)->get_nodeType() === 1) {
						$»tmp = $this->childNodes[$i];
						$GLOBALS['%s']->pop();
						return $»tmp;
						unset($»tmp);
					}
					unset($i);
				}
			}
		}
		{
			$GLOBALS['%s']->pop();
			return null;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_nodeType() {
		$GLOBALS['%s']->push("cocktail.core.dom.Element::get_nodeType");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return 1;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_nodeName() {
		$GLOBALS['%s']->push("cocktail.core.dom.Element::get_nodeName");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->tagName;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function hasAttributes() {
		$GLOBALS['%s']->push("cocktail.core.dom.Element::hasAttributes");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->attributes->get_length() > 0;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function doGetElementsByClassName($node, $className, $elements) {
		$GLOBALS['%s']->push("cocktail.core.dom.Element::doGetElementsByClassName");
		$»spos = $GLOBALS['%s']->length;
		if($node->hasChildNodes() === true) {
			$length = $node->childNodes->length;
			{
				$_g = 0;
				while($_g < $length) {
					$i = $_g++;
					$childNode = $node->childNodes[$i];
					switch($childNode->get_nodeType()) {
					case 1:{
						$elementNode = $childNode;
						$elementClassName = $elementNode->getAttribute("class");
						if($elementClassName !== null) {
							$elementClassNames = _hx_explode(" ", $elementClassName);
							$foundFlag = false;
							{
								$_g2 = 0; $_g1 = $elementClassNames->length;
								while($_g2 < $_g1) {
									$j = $_g2++;
									if($elementClassNames[$j] === $className && $foundFlag === false) {
										$elements->push($elementNode);
										$foundFlag = true;
									}
									unset($j);
								}
							}
						}
					}break;
					}
					$this->doGetElementsByClassName($childNode, $className, $elements);
					unset($i,$childNode);
				}
			}
		}
		$GLOBALS['%s']->pop();
	}
	public function doGetElementsByTagName($node, $tagName, $elements) {
		$GLOBALS['%s']->push("cocktail.core.dom.Element::doGetElementsByTagName");
		$»spos = $GLOBALS['%s']->length;
		if($node->hasChildNodes() === true) {
			$length = $node->childNodes->length;
			{
				$_g = 0;
				while($_g < $length) {
					$i = $_g++;
					$childNode = $node->childNodes[$i];
					if($childNode->get_nodeName() === $tagName) {
						$elements->push($childNode);
					} else {
						if($tagName === "*" && $childNode->get_nodeType() === 1) {
							$elements->push($childNode);
						}
					}
					$this->doGetElementsByTagName($childNode, $tagName, $elements);
					unset($i,$childNode);
				}
			}
		}
		$GLOBALS['%s']->pop();
	}
	public function doCloneNode() {
		$GLOBALS['%s']->push("cocktail.core.dom.Element::doCloneNode");
		$»spos = $GLOBALS['%s']->length;
		$clonedElement = new cocktail_core_dom_Element($this->tagName);
		$length = $this->attributes->get_length();
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				$clonedAttr = $this->attributes->item($i)->cloneNode(false);
				$clonedElement->setAttributeNode($clonedAttr);
				unset($i,$clonedAttr);
			}
		}
		{
			$»tmp = $clonedElement;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getElementsByClassName($className) {
		$GLOBALS['%s']->push("cocktail.core.dom.Element::getElementsByClassName");
		$»spos = $GLOBALS['%s']->length;
		$elements = new _hx_array(array());
		$this->doGetElementsByClassName($this, $className, $elements);
		{
			$GLOBALS['%s']->pop();
			return $elements;
		}
		$GLOBALS['%s']->pop();
	}
	public function getElementsByTagName($tagName) {
		$GLOBALS['%s']->push("cocktail.core.dom.Element::getElementsByTagName");
		$»spos = $GLOBALS['%s']->length;
		$elements = new _hx_array(array());
		$this->doGetElementsByTagName($this, $tagName, $elements);
		{
			$GLOBALS['%s']->pop();
			return $elements;
		}
		$GLOBALS['%s']->pop();
	}
	public function hasAttribute($name) {
		$GLOBALS['%s']->push("cocktail.core.dom.Element::hasAttribute");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->attributes->getNamedItem($name) !== null;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function setIdAttributeNode($idAttr, $isId) {
		$GLOBALS['%s']->push("cocktail.core.dom.Element::setIdAttributeNode");
		$»spos = $GLOBALS['%s']->length;
		$idAttr->isId = $isId;
		$this->attributes->setNamedItem($idAttr);
		$GLOBALS['%s']->pop();
	}
	public function setIdAttribute($name, $isId) {
		$GLOBALS['%s']->push("cocktail.core.dom.Element::setIdAttribute");
		$»spos = $GLOBALS['%s']->length;
		$idAttribute = $this->attributes->getNamedItem($name);
		if($idAttribute === null) {
			$idAttribute = new cocktail_core_dom_Attr($name);
			$this->attributes->setNamedItem($idAttribute);
			$idAttribute->ownerElement = $this;
		}
		$idAttribute->isId = $isId;
		$GLOBALS['%s']->pop();
	}
	public function removeAttribute($name) {
		$GLOBALS['%s']->push("cocktail.core.dom.Element::removeAttribute");
		$»spos = $GLOBALS['%s']->length;
		$removedAttribute = $this->attributes->removeNamedItem($name);
		if($removedAttribute !== null) {
			$removedAttribute->ownerElement = null;
		}
		$GLOBALS['%s']->pop();
	}
	public function setAttributeNode($newAttr) {
		$GLOBALS['%s']->push("cocktail.core.dom.Element::setAttributeNode");
		$»spos = $GLOBALS['%s']->length;
		$newAttr->ownerElement = $this;
		{
			$»tmp = $this->attributes->setNamedItem($newAttr);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getAttributeNode($name) {
		$GLOBALS['%s']->push("cocktail.core.dom.Element::getAttributeNode");
		$»spos = $GLOBALS['%s']->length;
		$attribute = $this->attributes->getNamedItem($name);
		if($attribute !== null) {
			$GLOBALS['%s']->pop();
			return $attribute;
		}
		{
			$GLOBALS['%s']->pop();
			return null;
		}
		$GLOBALS['%s']->pop();
	}
	public function setAttribute($name, $value) {
		$GLOBALS['%s']->push("cocktail.core.dom.Element::setAttribute");
		$»spos = $GLOBALS['%s']->length;
		$attribute = $this->attributes->getNamedItem($name);
		if($attribute === null) {
			$attribute = new cocktail_core_dom_Attr($name);
			$this->attributes->setNamedItem($attribute);
			$attribute->ownerElement = $this;
		}
		$attribute->set_value($value);
		$GLOBALS['%s']->pop();
	}
	public function getAttribute($name) {
		$GLOBALS['%s']->push("cocktail.core.dom.Element::getAttribute");
		$»spos = $GLOBALS['%s']->length;
		$attribute = $this->getAttributeNode($name);
		if($attribute !== null) {
			$»tmp = $attribute->get_value();
			$GLOBALS['%s']->pop();
			return $»tmp;
		} else {
			$GLOBALS['%s']->pop();
			return null;
		}
		$GLOBALS['%s']->pop();
	}
	public $childElementCount;
	public $nextElementSibling;
	public $previousElementSibling;
	public $lastElementChild;
	public $firstElementChild;
	public $tagName;
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
	static $__properties__ = array("get_firstElementChild" => "get_firstElementChild","get_lastElementChild" => "get_lastElementChild","get_previousElementSibling" => "get_previousElementSibling","get_nextElementSibling" => "get_nextElementSibling","get_childElementCount" => "get_childElementCount","get_nodeType" => "get_nodeType","set_nodeValue" => "set_nodeValue","get_nodeValue" => "get_nodeValue","get_nodeName" => "get_nodeName","set_ownerDocument" => "set_ownerDocument","get_firstChild" => "get_firstChild","get_lastChild" => "get_lastChild","get_nextSibling" => "get_nextSibling","get_previousSibling" => "get_previousSibling","set_onclick" => "set_onClick","set_ondblclick" => "set_onDblClick","set_onmousedown" => "set_onMouseDown","set_onmouseup" => "set_onMouseUp","set_onmouseover" => "set_onMouseOver","set_onmouseout" => "set_onMouseOut","set_onmousemove" => "set_onMouseMove","set_onmousewheel" => "set_onMouseWheel","set_onkeydown" => "set_onKeyDown","set_onkeyup" => "set_onKeyUp","set_onfocus" => "set_onFocus","set_onblur" => "set_onBlur","set_onresize" => "set_onResize","set_onfullscreenchange" => "set_onFullScreenChange","set_onscroll" => "set_onScroll","set_onload" => "set_onLoad","set_onerror" => "set_onError","set_onloadstart" => "set_onLoadStart","set_onprogress" => "set_onProgress","set_onsuspend" => "set_onSuspend","set_onemptied" => "set_onEmptied","set_onstalled" => "set_onStalled","set_onloadedmetadata" => "set_onLoadedMetadata","set_onloadeddata" => "set_onLoadedData","set_oncanplay" => "set_onCanPlay","set_oncanplaythrough" => "set_onCanPlayThrough","set_onplaying" => "set_onPlaying","set_onwaiting" => "set_onWaiting","set_onseeking" => "set_onSeeking","set_onseeked" => "set_onSeeked","set_onended" => "set_onEnded","set_ondurationchange" => "set_onDurationChanged","set_ontimeupdate" => "set_onTimeUpdate","set_onplay" => "set_onPlay","set_onpause" => "set_onPause","set_onvolumechange" => "set_onVolumeChange","set_ontransitionend" => "set_onTransitionEnd");
	function __toString() { return 'cocktail.core.dom.Element'; }
}

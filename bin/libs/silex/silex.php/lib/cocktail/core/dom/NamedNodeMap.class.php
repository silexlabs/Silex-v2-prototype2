<?php

class cocktail_core_dom_NamedNodeMap {
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.dom.NamedNodeMap::new");
		$»spos = $GLOBALS['%s']->length;
		$this->_nodes = new _hx_array(array());
		$GLOBALS['%s']->pop();
	}}
	public function get_length() {
		$GLOBALS['%s']->push("cocktail.core.dom.NamedNodeMap::get_length");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->_nodes->length;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function item($index) {
		$GLOBALS['%s']->push("cocktail.core.dom.NamedNodeMap::item");
		$»spos = $GLOBALS['%s']->length;
		if($index > $this->get_length() - 1) {
			$GLOBALS['%s']->pop();
			return null;
		} else {
			$»tmp = $this->_nodes[$index];
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function removeNamedItem($name) {
		$GLOBALS['%s']->push("cocktail.core.dom.NamedNodeMap::removeNamedItem");
		$»spos = $GLOBALS['%s']->length;
		$removedNode = $this->getNamedItem($name);
		if($removedNode === null) {
			$GLOBALS['%s']->pop();
			return null;
		}
		$this->_nodes->remove($removedNode);
		{
			$GLOBALS['%s']->pop();
			return $removedNode;
		}
		$GLOBALS['%s']->pop();
	}
	public function setNamedItem($arg) {
		$GLOBALS['%s']->push("cocktail.core.dom.NamedNodeMap::setNamedItem");
		$»spos = $GLOBALS['%s']->length;
		$replacedNode = $this->getNamedItem($arg->get_nodeName());
		if($replacedNode !== null) {
			$_g1 = 0; $_g = $this->get_length();
			while($_g1 < $_g) {
				$i = $_g1++;
				if($this->_nodes[$i] === $replacedNode) {
					$this->_nodes[$i] = $arg;
					{
						$GLOBALS['%s']->pop();
						return $replacedNode;
					}
				}
				unset($i);
			}
		} else {
			$this->_nodes->push($arg);
		}
		{
			$GLOBALS['%s']->pop();
			return $replacedNode;
		}
		$GLOBALS['%s']->pop();
	}
	public function getNamedItem($name) {
		$GLOBALS['%s']->push("cocktail.core.dom.NamedNodeMap::getNamedItem");
		$»spos = $GLOBALS['%s']->length;
		$length = $this->_nodes->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($this->_nodes, $i)->name === $name) {
					$»tmp = $this->_nodes[$i];
					$GLOBALS['%s']->pop();
					return $»tmp;
					unset($»tmp);
				}
				unset($i);
			}
		}
		{
			$GLOBALS['%s']->pop();
			return null;
		}
		$GLOBALS['%s']->pop();
	}
	public $length;
	public $_nodes;
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
	static $__properties__ = array("get_length" => "get_length");
	function __toString() { return 'cocktail.core.dom.NamedNodeMap'; }
}

<?php

class haxe_xml_Fast {
	public function __construct($x) {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("haxe.xml.Fast::new");
		$�spos = $GLOBALS['%s']->length;
		if($x->nodeType != Xml::$Document && $x->nodeType != Xml::$Element) {
			throw new HException("Invalid nodeType " . Std::string($x->nodeType));
		}
		$this->x = $x;
		$this->node = new haxe_xml__Fast_NodeAccess($x);
		$this->nodes = new haxe_xml__Fast_NodeListAccess($x);
		$this->att = new haxe_xml__Fast_AttribAccess($x);
		$this->has = new haxe_xml__Fast_HasAttribAccess($x);
		$this->hasNode = new haxe_xml__Fast_HasNodeAccess($x);
		$GLOBALS['%s']->pop();
	}}
	public function getElements() {
		$GLOBALS['%s']->push("haxe.xml.Fast::getElements");
		$�spos = $GLOBALS['%s']->length;
		$it = $this->x->elements();
		{
			$�tmp = _hx_anonymous(array("hasNext" => (isset($it->hasNext) ? $it->hasNext: array($it, "hasNext")), "next" => array(new _hx_lambda(array(&$it), "haxe_xml_Fast_0"), 'execute')));
			$GLOBALS['%s']->pop();
			return $�tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getInnerHTML() {
		$GLOBALS['%s']->push("haxe.xml.Fast::getInnerHTML");
		$�spos = $GLOBALS['%s']->length;
		$s = new StringBuf();
		if(null == $this->x) throw new HException('null iterable');
		$�it = $this->x->iterator();
		while($�it->hasNext()) {
			$x = $�it->next();
			$s->add($x->toString());
		}
		{
			$�tmp = $s->b;
			$GLOBALS['%s']->pop();
			return $�tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getInnerData() {
		$GLOBALS['%s']->push("haxe.xml.Fast::getInnerData");
		$�spos = $GLOBALS['%s']->length;
		$it = $this->x->iterator();
		if(!$it->hasNext()) {
			throw new HException($this->getName() . " does not have data");
		}
		$v = $it->next();
		$n = $it->next();
		if($n !== null) {
			if($v->nodeType == Xml::$PCData && $n->nodeType == Xml::$CData && trim($v->getNodeValue()) === "") {
				$n2 = $it->next();
				if($n2 === null || $n2->nodeType == Xml::$PCData && trim($n2->getNodeValue()) === "" && $it->next() === null) {
					$�tmp = $n->getNodeValue();
					$GLOBALS['%s']->pop();
					return $�tmp;
				}
			}
			throw new HException($this->getName() . " does not only have data");
		}
		if($v->nodeType != Xml::$PCData && $v->nodeType != Xml::$CData) {
			throw new HException($this->getName() . " does not have data");
		}
		{
			$�tmp = $v->getNodeValue();
			$GLOBALS['%s']->pop();
			return $�tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getName() {
		$GLOBALS['%s']->push("haxe.xml.Fast::getName");
		$�spos = $GLOBALS['%s']->length;
		{
			$�tmp = (($this->x->nodeType == Xml::$Document) ? "Document" : $this->x->getNodeName());
			$GLOBALS['%s']->pop();
			return $�tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public $elements;
	public $hasNode;
	public $has;
	public $att;
	public $nodes;
	public $node;
	public $innerHTML;
	public $innerData;
	public $name;
	public $x;
	public function __call($m, $a) {
		if(isset($this->$m) && is_callable($this->$m))
			return call_user_func_array($this->$m, $a);
		else if(isset($this->�dynamics[$m]) && is_callable($this->�dynamics[$m]))
			return call_user_func_array($this->�dynamics[$m], $a);
		else if('toString' == $m)
			return $this->__toString();
		else
			throw new HException('Unable to call �'.$m.'�');
	}
	static $__properties__ = array("get_name" => "getName","get_innerData" => "getInnerData","get_innerHTML" => "getInnerHTML","get_elements" => "getElements");
	function __toString() { return 'haxe.xml.Fast'; }
}
function haxe_xml_Fast_0(&$it) {
	$�spos = $GLOBALS['%s']->length;
	{
		$GLOBALS['%s']->push("haxe.xml.Fast::getElements@171");
		$�spos2 = $GLOBALS['%s']->length;
		$x = $it->next();
		if($x === null) {
			$GLOBALS['%s']->pop();
			return null;
		}
		{
			$�tmp = new haxe_xml_Fast($x);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}
		$GLOBALS['%s']->pop();
	}
}

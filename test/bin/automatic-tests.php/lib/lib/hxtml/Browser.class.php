<?php

class lib_hxtml_Browser {
	public function __construct($createElement, $createTextNode, $appendChild, $setAttribute, $invalidate, $styleProxy) {
		if(!php_Boot::$skip_constructor) {
		$this->createElement = $createElement;
		$this->createTextNode = $createTextNode;
		$this->appendChild = $appendChild;
		$this->setAttribute = $setAttribute;
		$this->invalidate = $invalidate;
		$this->styleProxy = $styleProxy;
	}}
	public function make($x) {
		switch($x->nodeType) {
		case Xml::$CData:{
			throw new HException("assert");
		}break;
		case Xml::$PCData:case Xml::$Comment:{
			return $this->createTextNode($x->getNodeValue());
		}break;
		case Xml::$DocType:{
			return null;
		}break;
		}
		$d = null;
		$name = strtolower($x->getNodeName());
		$d = $this->createElement($name);
		$allowComments = $name === "style";
		$prev = null;
		if(null == $x) throw new HException('null iterable');
		$»it = $x->iterator();
		while($»it->hasNext()) {
			$c = $»it->next();
			switch($c->nodeType) {
			case Xml::$PCData:{
				if(_hx_deref(new EReg("^[ \x0A\x0D\x09]*\$", ""))->match($c->getNodeValue())) {
				}
			}break;
			case Xml::$Comment:{
				if(!$allowComments) {
					continue 2;
				}
			}break;
			default:{
			}break;
			}
			if($name === "ul") {
				haxe_Log::trace($c, _hx_anonymous(array("fileName" => "Browser.hx", "lineNumber" => 124, "className" => "lib.hxtml.Browser", "methodName" => "make")));
			}
			$prev = $this->make($c);
			$this->appendChild($d, $prev);
		}
		if(null == $x) throw new HException('null iterable');
		$»it = $x->attributes();
		while($»it->hasNext()) {
			$a = $»it->next();
			$a = strtolower($a);
			$v = $x->get($a);
			switch($a) {
			case "id":{
				$this->register($v, $d);
				$this->setAttribute($d, $a, $v);
			}break;
			case "style":{
				_hx_deref(new lib_hxtml_CssParser())->parse($v, $d, $this->styleProxy);
			}break;
			default:{
				$this->setAttribute($d, $a, $v);
			}break;
			}
			unset($v);
		}
		return $d;
	}
	public function getById($id) {
		return $this->ids->get($id);
	}
	public function refresh() {
		$this->invalid = false;
		if($this->invalidate !== null) {
			$this->invalidate();
		}
	}
	public function setHtml($data) {
		$x = lib_haxe_xml_Parser::parse($data)->firstElement();
		$this->ids = new Hash();
		$this->domRoot = $this->make($x);
		$this->refresh();
	}
	public function register($id, $d) {
		$this->ids->set($id, $d);
	}
	public $styleProxy;
	public $invalidate;
	public $setAttribute;
	public $appendChild;
	public $createTextNode;
	public $createElement;
	public $invalid;
	public $ids;
	public $domRoot;
	public $html;
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
	function __toString() { return 'lib.hxtml.Browser'; }
}

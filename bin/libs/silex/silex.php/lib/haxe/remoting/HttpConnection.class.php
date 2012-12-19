<?php

class haxe_remoting_HttpConnection implements haxe_remoting_Connection{
	public function __construct($url, $path) {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("haxe.remoting.HttpConnection::new");
		$»spos = $GLOBALS['%s']->length;
		$this->__url = $url;
		$this->__path = $path;
		$GLOBALS['%s']->pop();
	}}
	public function call($params) {
		$GLOBALS['%s']->push("haxe.remoting.HttpConnection::call");
		$»spos = $GLOBALS['%s']->length;
		$data = null;
		$h = new haxe_Http($this->__url);
		$h->cnxTimeout = haxe_remoting_HttpConnection::$TIMEOUT;
		$s = new haxe_Serializer();
		$s->serialize($this->__path);
		$s->serialize($params);
		$h->setHeader("X-Haxe-Remoting", "1");
		$h->setParameter("__x", $s->toString());
		$h->onData = array(new _hx_lambda(array(&$data, &$h, &$params, &$s), "haxe_remoting_HttpConnection_0"), 'execute');
		$h->onError = array(new _hx_lambda(array(&$data, &$h, &$params, &$s), "haxe_remoting_HttpConnection_1"), 'execute');
		$h->request(true);
		if(_hx_substr($data, 0, 3) !== "hxr") {
			throw new HException("Invalid response : '" . $data . "'");
		}
		$data = _hx_substr($data, 3, null);
		{
			$»tmp = _hx_deref(new haxe_Unserializer($data))->unserialize();
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function resolve($name) {
		$GLOBALS['%s']->push("haxe.remoting.HttpConnection::resolve");
		$»spos = $GLOBALS['%s']->length;
		$c = new haxe_remoting_HttpConnection($this->__url, $this->__path->copy());
		$c->__path->push($name);
		{
			$GLOBALS['%s']->pop();
			return $c;
		}
		$GLOBALS['%s']->pop();
	}
	public $__path;
	public $__url;
	public $»dynamics = array();
	public function __get($n) {
		if(isset($this->»dynamics[$n]))
			return $this->»dynamics[$n];
	}
	public function __set($n, $v) {
		$this->»dynamics[$n] = $v;
	}
	public function __call($n, $a) {
		if(isset($this->»dynamics[$n]) && is_callable($this->»dynamics[$n]))
			return call_user_func_array($this->»dynamics[$n], $a);
		if('toString' == $n)
			return $this->__toString();
		throw new HException("Unable to call «".$n."»");
	}
	static $TIMEOUT = 10;
	static function urlConnect($url) {
		$GLOBALS['%s']->push("haxe.remoting.HttpConnection::urlConnect");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = new haxe_remoting_HttpConnection($url, new _hx_array(array()));
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function handleRequest($ctx) {
		$GLOBALS['%s']->push("haxe.remoting.HttpConnection::handleRequest");
		$»spos = $GLOBALS['%s']->length;
		$v = php_Web::getParams()->get("__x");
		if(php_Web::getClientHeader("X-Haxe-Remoting") === null || $v === null) {
			$GLOBALS['%s']->pop();
			return false;
		}
		php_Lib::hprint(haxe_remoting_HttpConnection::processRequest($v, $ctx));
		{
			$GLOBALS['%s']->pop();
			return true;
		}
		$GLOBALS['%s']->pop();
	}
	static function processRequest($requestData, $ctx) {
		$GLOBALS['%s']->push("haxe.remoting.HttpConnection::processRequest");
		$»spos = $GLOBALS['%s']->length;
		try {
			$u = new haxe_Unserializer($requestData);
			$path = $u->unserialize();
			$args = $u->unserialize();
			$data = $ctx->call($path, $args);
			$s = new haxe_Serializer();
			$s->serialize($data);
			{
				$»tmp = "hxr" . $s->toString();
				$GLOBALS['%s']->pop();
				return $»tmp;
			}
		}catch(Exception $»e) {
			$_ex_ = ($»e instanceof HException) ? $»e->e : $»e;
			$e = $_ex_;
			{
				$GLOBALS['%e'] = new _hx_array(array());
				while($GLOBALS['%s']->length >= $»spos) {
					$GLOBALS['%e']->unshift($GLOBALS['%s']->pop());
				}
				$GLOBALS['%s']->push($GLOBALS['%e'][0]);
				$s = new haxe_Serializer();
				$s->serializeException($e);
				{
					$»tmp = "hxr" . $s->toString();
					$GLOBALS['%s']->pop();
					return $»tmp;
				}
			}
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'haxe.remoting.HttpConnection'; }
}
function haxe_remoting_HttpConnection_0(&$data, &$h, &$params, &$s, $d) {
	$»spos = $GLOBALS['%s']->length;
	{
		$GLOBALS['%s']->push("haxe.remoting.HttpConnection::call@62");
		$»spos2 = $GLOBALS['%s']->length;
		$data = $d;
		$GLOBALS['%s']->pop();
	}
}
function haxe_remoting_HttpConnection_1(&$data, &$h, &$params, &$s, $e) {
	$»spos = $GLOBALS['%s']->length;
	{
		$GLOBALS['%s']->push("haxe.remoting.HttpConnection::call@63");
		$»spos2 = $GLOBALS['%s']->length;
		throw new HException($e);
		$GLOBALS['%s']->pop();
	}
}

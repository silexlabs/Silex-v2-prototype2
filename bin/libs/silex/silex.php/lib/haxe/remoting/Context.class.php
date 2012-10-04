<?php

class haxe_remoting_Context {
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("haxe.remoting.Context::new");
		$»spos = $GLOBALS['%s']->length;
		$this->objects = new Hash();
		$GLOBALS['%s']->pop();
	}}
	public function call($path, $params) {
		$GLOBALS['%s']->push("haxe.remoting.Context::call");
		$»spos = $GLOBALS['%s']->length;
		if($path->length < 2) {
			throw new HException("Invalid path '" . $path->join(".") . "'");
		}
		$inf = $this->objects->get($path[0]);
		if($inf === null) {
			throw new HException("No such object " . $path[0]);
		}
		$o = $inf->obj;
		$m = Reflect::field($o, $path[1]);
		if($path->length > 2) {
			if(!$inf->rec) {
				throw new HException("Can't access " . $path->join("."));
			}
			{
				$_g1 = 2; $_g = $path->length;
				while($_g1 < $_g) {
					$i = $_g1++;
					$o = $m;
					$m = Reflect::field($o, $path[$i]);
					unset($i);
				}
			}
		}
		if(!Reflect::isFunction($m)) {
			throw new HException("No such method " . $path->join("."));
		}
		{
			$»tmp = Reflect::callMethod($o, $m, $params);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function addObject($name, $obj, $recursive = null) {
		$GLOBALS['%s']->push("haxe.remoting.Context::addObject");
		$»spos = $GLOBALS['%s']->length;
		$this->objects->set($name, _hx_anonymous(array("obj" => $obj, "rec" => $recursive)));
		$GLOBALS['%s']->pop();
	}
	public $objects;
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
	static function share($name, $obj) {
		$GLOBALS['%s']->push("haxe.remoting.Context::share");
		$»spos = $GLOBALS['%s']->length;
		$ctx = new haxe_remoting_Context();
		$ctx->addObject($name, $obj, null);
		{
			$GLOBALS['%s']->pop();
			return $ctx;
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'haxe.remoting.Context'; }
}

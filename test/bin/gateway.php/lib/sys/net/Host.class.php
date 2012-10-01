<?php

class sys_net_Host {
	public function __construct($name) {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("sys.net.Host::new");
		$»spos = $GLOBALS['%s']->length;
		if(_hx_deref(new EReg("^(\\d{1,3}\\.){3}\\d{1,3}\$", ""))->match($name)) {
			$this->_ip = $name;
		} else {
			$this->_ip = gethostbyname($name);
			if($this->_ip === $name) {
				$this->ip = 0 | 0;
				{
					$GLOBALS['%s']->pop();
					return;
				}
			}
		}
		$p = _hx_explode(".", $this->_ip);
		$this->ip = intval(sprintf("%02X%02X%02X%02X", $p[3], $p[2], $p[1], $p[0]), 16) | 0;
		$GLOBALS['%s']->pop();
	}}
	public function reverse() {
		$GLOBALS['%s']->push("sys.net.Host::reverse");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = gethostbyaddress($this->_ip);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function toString() {
		$GLOBALS['%s']->push("sys.net.Host::toString");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->_ip;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public $ip;
	public $_ip;
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
	static function localhost() {
		$GLOBALS['%s']->push("sys.net.Host::localhost");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $_SERVER["HTTP_HOST"];
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return $this->toString(); }
}

<?php

class sys_net_Socket {
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("sys.net.Socket::new");
		$»spos = $GLOBALS['%s']->length;
		$this->input = new sys_io_FileInput(null);
		$this->output = new sys_io_FileOutput(null);
		$this->protocol = "tcp";
		$GLOBALS['%s']->pop();
	}}
	public function waitForRead() {
		$GLOBALS['%s']->push("sys.net.Socket::waitForRead");
		$»spos = $GLOBALS['%s']->length;
		sys_net_Socket::select(new _hx_array(array($this)), null, null, null);
		$GLOBALS['%s']->pop();
	}
	public function setFastSend($b) {
		$GLOBALS['%s']->push("sys.net.Socket::setFastSend");
		$»spos = $GLOBALS['%s']->length;
		throw new HException("Not implemented");
		$GLOBALS['%s']->pop();
	}
	public function setBlocking($b) {
		$GLOBALS['%s']->push("sys.net.Socket::setBlocking");
		$»spos = $GLOBALS['%s']->length;
		$r = stream_set_blocking($this->__s, $b);
		sys_net_Socket::checkError($r, 0, "Unable to block");
		$GLOBALS['%s']->pop();
	}
	public function setTimeout($timeout) {
		$GLOBALS['%s']->push("sys.net.Socket::setTimeout");
		$»spos = $GLOBALS['%s']->length;
		$s = intval($timeout);
		$ms = intval(($timeout - $s) * 1000000);
		$r = stream_set_timeout($this->__s, $s, $ms);
		sys_net_Socket::checkError($r, 0, "Unable to set timeout");
		$GLOBALS['%s']->pop();
	}
	public function host() {
		$GLOBALS['%s']->push("sys.net.Socket::host");
		$»spos = $GLOBALS['%s']->length;
		$r = stream_socket_get_name($this->__s, false);
		sys_net_Socket::checkError($r, 0, "Unable to retrieve the host name");
		{
			$»tmp = $this->hpOfString($r);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function peer() {
		$GLOBALS['%s']->push("sys.net.Socket::peer");
		$»spos = $GLOBALS['%s']->length;
		$r = stream_socket_get_name($this->__s, true);
		sys_net_Socket::checkError($r, 0, "Unable to retrieve the peer name");
		{
			$»tmp = $this->hpOfString($r);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function hpOfString($s) {
		$GLOBALS['%s']->push("sys.net.Socket::hpOfString");
		$»spos = $GLOBALS['%s']->length;
		$parts = _hx_explode(":", $s);
		if($parts->length === 2) {
			$»tmp = _hx_anonymous(array("host" => new sys_net_Host($parts[0]), "port" => Std::parseInt($parts[1])));
			$GLOBALS['%s']->pop();
			return $»tmp;
		} else {
			$»tmp = _hx_anonymous(array("host" => new sys_net_Host(_hx_substr($parts[1], 2, null)), "port" => Std::parseInt($parts[2])));
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function accept() {
		$GLOBALS['%s']->push("sys.net.Socket::accept");
		$»spos = $GLOBALS['%s']->length;
		$r = stream_socket_accept($this->__s);
		sys_net_Socket::checkError($r, 0, "Unable to accept connections on socket");
		$s = new sys_net_Socket();
		$s->__s = $r;
		$s->assignHandler();
		{
			$GLOBALS['%s']->pop();
			return $s;
		}
		$GLOBALS['%s']->pop();
	}
	public function bind($host, $port) {
		$GLOBALS['%s']->push("sys.net.Socket::bind");
		$»spos = $GLOBALS['%s']->length;
		$errs = null;
		$errn = null;
		$r = stream_socket_server($this->protocol . "://" . $host->_ip . ":" . _hx_string_rec($port, ""), $errn, $errs, (($this->protocol === "udp") ? STREAM_SERVER_BIND : STREAM_SERVER_BIND | STREAM_SERVER_LISTEN));
		sys_net_Socket::checkError($r, $errn, $errs);
		$this->__s = $r;
		$this->assignHandler();
		$GLOBALS['%s']->pop();
	}
	public function shutdown($read, $write) {
		$GLOBALS['%s']->push("sys.net.Socket::shutdown");
		$»spos = $GLOBALS['%s']->length;
		$r = null;
		if(function_exists("stream_socket_shutdown")) {
			$rw = (($read && $write) ? 2 : (($write) ? 1 : (($read) ? 0 : 2)));
			$r = stream_socket_shutdown($this->__s, $rw);
		} else {
			$r = fclose($this->__s);
		}
		sys_net_Socket::checkError($r, 0, "Unable to Shutdown");
		$GLOBALS['%s']->pop();
	}
	public function listen($connections) {
		$GLOBALS['%s']->push("sys.net.Socket::listen");
		$»spos = $GLOBALS['%s']->length;
		throw new HException("Not implemented");
		$GLOBALS['%s']->pop();
	}
	public function connect($host, $port) {
		$GLOBALS['%s']->push("sys.net.Socket::connect");
		$»spos = $GLOBALS['%s']->length;
		$errs = null;
		$errn = null;
		$r = stream_socket_client($this->protocol . "://" . $host->_ip . ":" . _hx_string_rec($port, ""), $errn, $errs);
		sys_net_Socket::checkError($r, $errn, $errs);
		$this->__s = $r;
		$this->assignHandler();
		$GLOBALS['%s']->pop();
	}
	public function write($content) {
		$GLOBALS['%s']->push("sys.net.Socket::write");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = fwrite($this->__s, $content);
			$GLOBALS['%s']->pop();
			$»tmp;
			return;
		}
		$GLOBALS['%s']->pop();
	}
	public function read() {
		$GLOBALS['%s']->push("sys.net.Socket::read");
		$»spos = $GLOBALS['%s']->length;
		$b = "";
		while (!feof($this->__s)) $b .= fgets($this->__s);
		{
			$GLOBALS['%s']->pop();
			return $b;
		}
		$GLOBALS['%s']->pop();
	}
	public function close() {
		$GLOBALS['%s']->push("sys.net.Socket::close");
		$»spos = $GLOBALS['%s']->length;
		fclose($this->__s);
		{
			$this->input->__f = null;
			$this->output->__f = null;
		}
		$this->input->close();
		$this->output->close();
		$GLOBALS['%s']->pop();
	}
	public function assignHandler() {
		$GLOBALS['%s']->push("sys.net.Socket::assignHandler");
		$»spos = $GLOBALS['%s']->length;
		$this->input->__f = $this->__s;
		$this->output->__f = $this->__s;
		$GLOBALS['%s']->pop();
	}
	public $custom;
	public $output;
	public $input;
	public $protocol;
	public $__s;
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
	static function checkError($r, $code, $msg) {
		$GLOBALS['%s']->push("sys.net.Socket::checkError");
		$»spos = $GLOBALS['%s']->length;
		if(!($r === false)) {
			$GLOBALS['%s']->pop();
			return;
		}
		throw new HException(haxe_io_Error::Custom("Error [" . _hx_string_rec($code, "") . "]: " . $msg));
		$GLOBALS['%s']->pop();
	}
	static function getType($isUdp) {
		$GLOBALS['%s']->push("sys.net.Socket::getType");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = (($isUdp) ? SOCK_DGRAM : SOCK_STREAM);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function getProtocol($protocol) {
		$GLOBALS['%s']->push("sys.net.Socket::getProtocol");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = getprotobyname($protocol);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function select($read, $write, $others, $timeout = null) {
		$GLOBALS['%s']->push("sys.net.Socket::select");
		$»spos = $GLOBALS['%s']->length;
		throw new HException("Not implemented");
		{
			$GLOBALS['%s']->pop();
			return null;
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'sys.net.Socket'; }
}

<?php

class silex_file_server_FileService extends silex_ServiceBase {
	public function __construct($serverConfig) {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("silex.file.server.FileService::new");
		$»spos = $GLOBALS['%s']->length;
		parent::__construct(silex_file_server_FileService::$SERVICE_NAME);
		$this->serverConfig = $serverConfig;
		$GLOBALS['%s']->pop();
	}}
	public function save($name, $content) {
		$GLOBALS['%s']->push("silex.file.server.FileService::save");
		$»spos = $GLOBALS['%s']->length;
		try {
			sys_io_File::saveContent($this->serverConfig->userFolder . $name, $content);
		}catch(Exception $»e) {
			$_ex_ = ($»e instanceof HException) ? $»e->e : $»e;
			$e = $_ex_;
			{
				$GLOBALS['%e'] = new _hx_array(array());
				while($GLOBALS['%s']->length >= $»spos) {
					$GLOBALS['%e']->unshift($GLOBALS['%s']->pop());
				}
				$GLOBALS['%s']->push($GLOBALS['%e'][0]);
				throw new HException("save(" . $name . ", " . $content . ") error: " . Std::string($e));
			}
		}
		$GLOBALS['%s']->pop();
	}
	public function trash($name) {
		$GLOBALS['%s']->push("silex.file.server.FileService::trash");
		$»spos = $GLOBALS['%s']->length;
		try {
			@unlink($this->serverConfig->userFolder . $name);
		}catch(Exception $»e) {
			$_ex_ = ($»e instanceof HException) ? $»e->e : $»e;
			$e = $_ex_;
			{
				$GLOBALS['%e'] = new _hx_array(array());
				while($GLOBALS['%s']->length >= $»spos) {
					$GLOBALS['%e']->unshift($GLOBALS['%s']->pop());
				}
				$GLOBALS['%s']->push($GLOBALS['%e'][0]);
				throw new HException("trash(" . $name . ") error: " . Std::string($e));
			}
		}
		$GLOBALS['%s']->pop();
	}
	public function rename($src, $dst) {
		$GLOBALS['%s']->push("silex.file.server.FileService::rename");
		$»spos = $GLOBALS['%s']->length;
		try {
			rename($this->serverConfig->userFolder . $src, $this->serverConfig->userFolder . $dst);
		}catch(Exception $»e) {
			$_ex_ = ($»e instanceof HException) ? $»e->e : $»e;
			$e = $_ex_;
			{
				$GLOBALS['%e'] = new _hx_array(array());
				while($GLOBALS['%s']->length >= $»spos) {
					$GLOBALS['%e']->unshift($GLOBALS['%s']->pop());
				}
				$GLOBALS['%s']->push($GLOBALS['%e'][0]);
				throw new HException("rename(" . $src . ", " . $dst . ") error: " . Std::string($e));
			}
		}
		$GLOBALS['%s']->pop();
	}
	public function duplicate($src, $dst) {
		$GLOBALS['%s']->push("silex.file.server.FileService::duplicate");
		$»spos = $GLOBALS['%s']->length;
		try {
			sys_io_File::copy($this->serverConfig->userFolder . $src, $this->serverConfig->userFolder . $dst);
		}catch(Exception $»e) {
			$_ex_ = ($»e instanceof HException) ? $»e->e : $»e;
			$e = $_ex_;
			{
				$GLOBALS['%e'] = new _hx_array(array());
				while($GLOBALS['%s']->length >= $»spos) {
					$GLOBALS['%e']->unshift($GLOBALS['%s']->pop());
				}
				$GLOBALS['%s']->push($GLOBALS['%e'][0]);
				throw new HException("duplicate(" . $src . ", " . $dst . ") error: " . Std::string($e));
			}
		}
		$GLOBALS['%s']->pop();
	}
	public function load($name) {
		$GLOBALS['%s']->push("silex.file.server.FileService::load");
		$»spos = $GLOBALS['%s']->length;
		$content = "";
		try {
			$content = sys_io_File::getContent($this->serverConfig->userFolder . $name);
		}catch(Exception $»e) {
			$_ex_ = ($»e instanceof HException) ? $»e->e : $»e;
			$e = $_ex_;
			{
				$GLOBALS['%e'] = new _hx_array(array());
				while($GLOBALS['%s']->length >= $»spos) {
					$GLOBALS['%e']->unshift($GLOBALS['%s']->pop());
				}
				$GLOBALS['%s']->push($GLOBALS['%e'][0]);
				throw new HException("load(" . $name . ") error: " . Std::string($e) . " - current directory: " . (dirname($_SERVER["SCRIPT_FILENAME"]) . "/"));
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $content;
		}
		$GLOBALS['%s']->pop();
	}
	public $serverConfig;
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
	static $SERVICE_NAME = "FileService";
	function __toString() { return 'silex.file.server.FileService'; }
}

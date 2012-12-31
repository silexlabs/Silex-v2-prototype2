<?php

class silex_file_dropbox_FileService extends silex_ServiceBase {
	public function __construct($serverConfig) {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("silex.file.dropbox.FileService::new");
		$»spos = $GLOBALS['%s']->length;
		parent::__construct(silex_file_dropbox_FileService::$SERVICE_NAME);
		$this->serverConfig = $serverConfig;
		require_once("libs/dropbox/functions.php");
		initDropbox($serverConfig->key, $serverConfig->secret, $serverConfig->encrypter, $serverConfig->dbHost, $serverConfig->dbName, $serverConfig->dbUser, $serverConfig->dbPass, $serverConfig->dbPort);
		$GLOBALS['%s']->pop();
	}}
	public function importFile($url, $name) {
		$GLOBALS['%s']->push("silex.file.dropbox.FileService::importFile");
		$»spos = $GLOBALS['%s']->length;
		$content = haxe_Http::requestUrl($url);
		$resObj = putFile($name, $content);
		if($resObj === false) {
			throw new HException("There was an error importing the file.");
		}
		$GLOBALS['%s']->pop();
	}
	public function save($name, $content) {
		$GLOBALS['%s']->push("silex.file.dropbox.FileService::save");
		$»spos = $GLOBALS['%s']->length;
		$resObj = putFile($name, $content);
		if($resObj === false) {
			throw new HException("There was an error saving the file. Did you authorize Silex application in your dropbox account?");
		}
		$GLOBALS['%s']->pop();
	}
	public function trash($name) {
		$GLOBALS['%s']->push("silex.file.dropbox.FileService::trash");
		$»spos = $GLOBALS['%s']->length;
		$resObj = deleteFile($name);
		if($resObj === false) {
			throw new HException("There was an error deleting the file. ");
		}
		$GLOBALS['%s']->pop();
	}
	public function rename($src, $dst) {
		$GLOBALS['%s']->push("silex.file.dropbox.FileService::rename");
		$»spos = $GLOBALS['%s']->length;
		throw new HException("rename is not implemented for dropbox");
		$GLOBALS['%s']->pop();
	}
	public function duplicate($src, $dst) {
		$GLOBALS['%s']->push("silex.file.dropbox.FileService::duplicate");
		$»spos = $GLOBALS['%s']->length;
		if(file_exists($this->serverConfig->userFolder . $dst)) {
			throw new HException("The file name " . $dst . " exists on the server, it is a reserved name.");
		} else {
			$resObj = getFile($src);
			$content = $resObj->data;
			$resObj1 = putFile($dst, $content);
		}
		$GLOBALS['%s']->pop();
	}
	public function load($name) {
		$GLOBALS['%s']->push("silex.file.dropbox.FileService::load");
		$»spos = $GLOBALS['%s']->length;
		$content = "";
		if(file_exists($this->serverConfig->userFolder . $name)) {
			$content = sys_io_File::getContent($this->serverConfig->userFolder . $name);
		} else {
			$resObj = php_Lib::objectOfAssociativeArray(getFile($name));
			if(_hx_has_field($resObj, "data")) {
				$content = $resObj->data;
			} else {
				throw new HException("file not found " . Std::string(php_Lib::dump($resObj)));
				{
					$GLOBALS['%s']->pop();
					return null;
				}
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $content;
		}
		$GLOBALS['%s']->pop();
	}
	public function checkInstall() {
		$GLOBALS['%s']->push("silex.file.dropbox.FileService::checkInstall");
		$»spos = $GLOBALS['%s']->length;
		$res = checkInstall();
		if($res === null) {
			throw new HException("Silex could not be initialized");
		} else {
			$»tmp = php_Lib::objectOfAssociativeArray($res);
			$GLOBALS['%s']->pop();
			return $»tmp;
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
	function __toString() { return 'silex.file.dropbox.FileService'; }
}

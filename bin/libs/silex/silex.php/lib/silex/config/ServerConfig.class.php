<?php

class silex_config_ServerConfig extends silex_config_ConfigBase {
	public function __construct($configFile = null) {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("silex.config.ServerConfig::new");
		$»spos = $GLOBALS['%s']->length;
		if($configFile === null) {
			$configFile = "conf/server-config.xml.php";
		}
		parent::__construct($configFile);
		$GLOBALS['%s']->pop();
	}}
	public function confDataToXml($xml) {
		$GLOBALS['%s']->push("silex.config.ServerConfig::confDataToXml");
		$»spos = $GLOBALS['%s']->length;
		$node = $xml->x->firstChild();
		$node->addChild(Xml::parse("\x0A\x09\x09\x09<defaultFile>" . $this->defaultFile . "</defaultFile>\x0A"));
		$node->addChild(Xml::parse("\x0A\x09\x09\x09<userFolder>" . $this->userFolder . "</userFolder>\x0A"));
		{
			$GLOBALS['%s']->pop();
			return $xml;
		}
		$GLOBALS['%s']->pop();
	}
	public function xmlToConfData($xml) {
		$GLOBALS['%s']->push("silex.config.ServerConfig::xmlToConfData");
		$»spos = $GLOBALS['%s']->length;
		if($xml->hasNode->resolve("defaultFile")) {
			$this->defaultFile = $xml->node->resolve("defaultFile")->getInnerData();
		}
		if($xml->hasNode->resolve("userFolder")) {
			$this->userFolder = $xml->node->resolve("userFolder")->getInnerData();
		}
		if($xml->hasNode->resolve("key")) {
			$this->key = $xml->node->resolve("key")->getInnerData();
		}
		if($xml->hasNode->resolve("secret")) {
			$this->secret = $xml->node->resolve("secret")->getInnerData();
		}
		$GLOBALS['%s']->pop();
	}
	public $secret;
	public $key;
	public $userFolder;
	public $defaultFile;
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
	static $SERVER_CONFIG_FILE = "conf/server-config.xml.php";
	function __toString() { return 'silex.config.ServerConfig'; }
}

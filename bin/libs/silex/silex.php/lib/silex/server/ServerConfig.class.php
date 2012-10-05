<?php

class silex_server_ServerConfig extends silex_ConfigBase {
	public function __construct($configFile = null) {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("silex.server.ServerConfig::new");
		$»spos = $GLOBALS['%s']->length;
		if($configFile === null) {
			$configFile = "conf/server-config.xml.php";
		}
		parent::__construct($configFile);
		$GLOBALS['%s']->pop();
	}}
	public function confDataToXml($xml) {
		$GLOBALS['%s']->push("silex.server.ServerConfig::confDataToXml");
		$»spos = $GLOBALS['%s']->length;
		$node = $xml->x->firstChild();
		$node->addChild(Xml::parse("\x0A\x09\x09\x09<defaultPublication>" . $this->defaultPublication . "</defaultPublication>\x0A"));
		$node->addChild(Xml::parse("\x0A\x09\x09\x09<admin>" . $this->admin . "</admin>\x0A"));
		$node->addChild(Xml::parse("\x0A\x09\x09\x09<debugModeAction>" . $this->debugModeAction . "</debugModeAction>\x0A"));
		{
			$GLOBALS['%s']->pop();
			return $xml;
		}
		$GLOBALS['%s']->pop();
	}
	public function xmlToConfData($xml) {
		$GLOBALS['%s']->push("silex.server.ServerConfig::xmlToConfData");
		$»spos = $GLOBALS['%s']->length;
		if($xml->hasNode->resolve("defaultPublication")) {
			$this->defaultPublication = $xml->node->resolve("defaultPublication")->getInnerData();
		}
		if($xml->hasNode->resolve("admin")) {
			$this->admin = $xml->node->resolve("admin")->getInnerData();
		}
		if($xml->hasNode->resolve("debugModeAction")) {
			$this->debugModeAction = $xml->node->resolve("debugModeAction")->getInnerData();
		} else {
			$this->debugModeAction = "";
		}
		$GLOBALS['%s']->pop();
	}
	public $debugModeAction;
	public $admin;
	public $defaultPublication;
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
	function __toString() { return 'silex.server.ServerConfig'; }
}

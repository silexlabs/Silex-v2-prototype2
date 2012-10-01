<?php

class org_silex_core_ServerConfig extends org_silex_config_ConfigBase {
	public function __construct($configFile = null) {
		if(!php_Boot::$skip_constructor) {
		if($configFile === null) {
			$configFile = "conf/server-config.xml.php";
		}
		parent::__construct($configFile);
	}}
	public function confDataToXml($xml) {
		$node = $xml->x->firstChild();
		$node->addChild(Xml::parse("\x0A\x09\x09\x09<defaultPublication>" . $this->defaultPublication . "</defaultPublication>\x0A"));
		$node->addChild(Xml::parse("\x0A\x09\x09\x09<admin>" . $this->admin . "</admin>\x0A"));
		$node->addChild(Xml::parse("\x0A\x09\x09\x09<debugModeAction>" . $this->debugModeAction . "</debugModeAction>\x0A"));
		return $xml;
	}
	public function xmlToConfData($xml) {
		if($xml->hasNode->resolve("defaultPublication")) {
			$this->defaultPublication = $xml->node->resolve("defaultPublication")->getInnerData();
		} else {
			haxe_Log::trace("Warning: missing defaultPublication in config file ", _hx_anonymous(array("fileName" => "ServerConfig.hx", "lineNumber" => 46, "className" => "org.silex.core.ServerConfig", "methodName" => "xmlToConfData")));
		}
		if($xml->hasNode->resolve("admin")) {
			$this->admin = $xml->node->resolve("admin")->getInnerData();
		} else {
			haxe_Log::trace("Warning: missing admin in config file ", _hx_anonymous(array("fileName" => "ServerConfig.hx", "lineNumber" => 51, "className" => "org.silex.core.ServerConfig", "methodName" => "xmlToConfData")));
		}
		if($xml->hasNode->resolve("debugModeAction")) {
			$this->debugModeAction = $xml->node->resolve("debugModeAction")->getInnerData();
		} else {
			$this->debugModeAction = "";
		}
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
	function __toString() { return 'org.silex.core.ServerConfig'; }
}

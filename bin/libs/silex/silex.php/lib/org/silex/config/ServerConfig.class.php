<?php

class org_silex_config_ServerConfig extends org_silex_config_Config {
	public function __construct($configFile = null) {
		if(!php_Boot::$skip_constructor) {
		if($configFile === null) {
			$configFile = "conf/server-config.xml.php";
		}
		parent::__construct($configFile);
	}}
	public function confDataToXml($xml) {
		$configNodes = new _hx_array(array());
		$configNodes->push(Xml::parse("\x0A\x09\x09\x09<defaultPublication>" . $this->defaultPublication . "</defaultPublication>\x0A"));
		{
			$_g = 0;
			while($_g < $configNodes->length) {
				$node = $configNodes[$_g];
				++$_g;
				haxe_Log::trace("add node " . Std::string($node), _hx_anonymous(array("fileName" => "ServerConfig.hx", "lineNumber" => 57, "className" => "org.silex.config.ServerConfig", "methodName" => "confDataToXml")));
				$xml->firstChild()->addChild($node);
				unset($node);
			}
		}
		return $xml;
	}
	public function xmlToConfData($xml) {
		$children = $xml->firstChild()->elements();
		$»it = $children;
		while($»it->hasNext()) {
			$child = $»it->next();
			switch($child->getNodeName()) {
			case "defaultPublication":{
				$this->defaultPublication = $child->firstChild()->getNodeValue();
			}break;
			default:{
				haxe_Log::trace("Warning: unknown config tag " . Std::string($child), _hx_anonymous(array("fileName" => "ServerConfig.hx", "lineNumber" => 38, "className" => "org.silex.config.ServerConfig", "methodName" => "xmlToConfData")));
			}break;
			}
		}
	}
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
	function __toString() { return 'org.silex.config.ServerConfig'; }
}

<?php

class org_silex_publication_PublicationConfig extends org_silex_config_ConfigBase {
	public function __construct($configFile = null) {
		if(!php_Boot::$skip_constructor) {
		$this->configData = _hx_anonymous(array("state" => org_silex_publication_PublicationState::$Private, "category" => org_silex_publication_PublicationCategory::$Publication, "creation" => _hx_anonymous(array("author" => "", "date" => new Date(0, 0, 0, 0, 0, 0))), "lastChange" => _hx_anonymous(array("author" => "", "date" => new Date(0, 0, 0, 0, 0, 0))), "debugModeAction" => null));
		parent::__construct($configFile);
	}}
	public function confDataToXml($xml) {
		$node = $xml->x->firstChild();
		$»t = ($this->configData->state);
		switch($»t->index) {
		case 2:
		{
			$node->addChild(Xml::parse("\x0A\x09\x09\x09<state>Private</state>\x0A"));
		}break;
		case 0:
		$changeData = $»t->params[0];
		{
			$node->addChild(Xml::parse("\x0A\x09\x09\x09<state author=\"" . $changeData->author . "\" date=\"" . $changeData->date->toString() . "\" >Trashed</state>\x0A"));
		}break;
		case 1:
		$changeData = $»t->params[0];
		{
			$node->addChild(Xml::parse("\x0A\x09\x09\x09<state author=\"" . $changeData->author . "\" date=\"" . $changeData->date->toString() . "\" >Published</state>\x0A"));
		}break;
		}
		$»t = ($this->configData->category);
		switch($»t->index) {
		case 0:
		{
			$node->addChild(Xml::parse("\x0A\x09\x09\x09<category>Publication</category>\x0A"));
		}break;
		case 1:
		{
			$node->addChild(Xml::parse("\x0A\x09\x09\x09<category>Utility</category>\x0A"));
		}break;
		case 2:
		{
			$node->addChild(Xml::parse("\x0A\x09\x09\x09<category>Theme</category>\x0A"));
		}break;
		}
		$node->addChild(Xml::parse("\x0A<creation>\x0A\x09<author>" . $this->configData->creation->author . "</author>\x0A\x09<date>" . $this->configData->creation->date->toString() . "</date>\x0A</creation>\x0A"));
		$node->addChild(Xml::parse("\x0A<lastChange>\x0A\x09<author>" . $this->configData->lastChange->author . "</author>\x0A\x09<date>" . $this->configData->lastChange->date->toString() . "</date>\x0A</lastChange>\x0A"));
		if($this->configData->debugModeAction !== null) {
			$node->addChild(Xml::parse("\x0A<debugModeAction>" . $this->configData->debugModeAction . "</debugModeAction>\x0A"));
		}
		return $xml;
	}
	public function getChangeDataFromXML($xml) {
		$author = "";
		if($xml->hasNode->resolve("author")) {
			$author = $xml->node->resolve("author")->getInnerData();
		} else {
			if($xml->has->resolve("author")) {
				$author = $xml->att->resolve("author");
			} else {
				haxe_Log::trace("Warning: missing author in config file ", _hx_anonymous(array("fileName" => "PublicationConfig.hx", "lineNumber" => 129, "className" => "org.silex.publication.PublicationConfig", "methodName" => "getChangeDataFromXML")));
			}
		}
		$date = null;
		if($xml->hasNode->resolve("date")) {
			$date = Date::fromString($xml->node->resolve("date")->getInnerData());
		} else {
			if($xml->has->resolve("date")) {
				$date = Date::fromString($xml->att->resolve("date"));
			} else {
				haxe_Log::trace("Warning: missing date in config file ", _hx_anonymous(array("fileName" => "PublicationConfig.hx", "lineNumber" => 139, "className" => "org.silex.publication.PublicationConfig", "methodName" => "getChangeDataFromXML")));
			}
		}
		return _hx_anonymous(array("author" => $author, "date" => $date));
	}
	public function xmlToConfData($xml) {
		if($xml->hasNode->resolve("creation")) {
			$this->configData->creation = $this->getChangeDataFromXML($xml->node->resolve("creation"));
		} else {
			haxe_Log::trace("Warning: missing creation tag in config file ", _hx_anonymous(array("fileName" => "PublicationConfig.hx", "lineNumber" => 68, "className" => "org.silex.publication.PublicationConfig", "methodName" => "xmlToConfData")));
		}
		if($xml->hasNode->resolve("lastChange")) {
			$this->configData->lastChange = $this->getChangeDataFromXML($xml->node->resolve("lastChange"));
		} else {
			haxe_Log::trace("Warning: missing lastChange tag in config file ", _hx_anonymous(array("fileName" => "PublicationConfig.hx", "lineNumber" => 73, "className" => "org.silex.publication.PublicationConfig", "methodName" => "xmlToConfData")));
		}
		if($xml->hasNode->resolve("debugModeAction")) {
			$this->configData->debugModeAction = $xml->node->resolve("debugModeAction")->getInnerData();
		} else {
			$this->configData->debugModeAction = null;
		}
		if($xml->hasNode->resolve("state")) {
			switch($xml->node->resolve("state")->getInnerData()) {
			case "Trashed":{
				$changeData = $this->getChangeDataFromXML($xml->node->resolve("state"));
				$this->configData->state = org_silex_publication_PublicationState::Trashed(_hx_anonymous(array("author" => $changeData->author, "date" => $changeData->date)));
			}break;
			case "Published":{
				$changeData = $this->getChangeDataFromXML($xml->node->resolve("state"));
				$this->configData->state = org_silex_publication_PublicationState::Published(_hx_anonymous(array("author" => $changeData->author, "date" => $changeData->date)));
			}break;
			case "Private":{
				$this->configData->state = org_silex_publication_PublicationState::$Private;
			}break;
			}
		} else {
			haxe_Log::trace("Warning: missing state tag in config file ", _hx_anonymous(array("fileName" => "PublicationConfig.hx", "lineNumber" => 99, "className" => "org.silex.publication.PublicationConfig", "methodName" => "xmlToConfData")));
		}
		if($xml->hasNode->resolve("category")) {
			switch($xml->node->resolve("category")->getInnerData()) {
			case "Publication":{
				$this->configData->category = org_silex_publication_PublicationCategory::$Publication;
			}break;
			case "Theme":{
				$this->configData->category = org_silex_publication_PublicationCategory::$Theme;
			}break;
			case "Utility":{
				$this->configData->category = org_silex_publication_PublicationCategory::$Utility;
			}break;
			}
		} else {
			haxe_Log::trace("Warning: missing category tag in config file ", _hx_anonymous(array("fileName" => "PublicationConfig.hx", "lineNumber" => 112, "className" => "org.silex.publication.PublicationConfig", "methodName" => "xmlToConfData")));
		}
	}
	public $configData;
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
	static $DEFAULT_PUBLICATION_FOLDER = "publications/";
	static $PUBLICATION_HTML_FILE = "index.html";
	static $PUBLICATION_CSS_FILE = "app.css";
	static $PUBLICATION_CONFIG_FOLDER = "conf/";
	static $PUBLICATION_CONFIG_FILE = "config.xml.php";
	function __toString() { return 'org.silex.publication.PublicationConfig'; }
}

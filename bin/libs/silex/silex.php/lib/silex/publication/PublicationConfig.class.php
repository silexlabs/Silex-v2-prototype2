<?php

class silex_publication_PublicationConfig extends silex_ConfigBase {
	public function __construct($configFile = null) {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("silex.publication.PublicationConfig::new");
		$»spos = $GLOBALS['%s']->length;
		$this->configData = _hx_anonymous(array("state" => silex_publication_PublicationState::$Private, "category" => silex_publication_PublicationCategory::$Publication, "creation" => _hx_anonymous(array("author" => "", "date" => new Date(0, 0, 0, 0, 0, 0))), "lastChange" => _hx_anonymous(array("author" => "", "date" => new Date(0, 0, 0, 0, 0, 0))), "debugModeAction" => null));
		parent::__construct($configFile);
		$GLOBALS['%s']->pop();
	}}
	public function confDataToXml($xml) {
		$GLOBALS['%s']->push("silex.publication.PublicationConfig::confDataToXml");
		$»spos = $GLOBALS['%s']->length;
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
		{
			$GLOBALS['%s']->pop();
			return $xml;
		}
		$GLOBALS['%s']->pop();
	}
	public function getChangeDataFromXML($xml) {
		$GLOBALS['%s']->push("silex.publication.PublicationConfig::getChangeDataFromXML");
		$»spos = $GLOBALS['%s']->length;
		$author = "";
		if($xml->hasNode->resolve("author")) {
			$author = $xml->node->resolve("author")->getInnerData();
		} else {
			if($xml->has->resolve("author")) {
				$author = $xml->att->resolve("author");
			}
		}
		$date = null;
		if($xml->hasNode->resolve("date")) {
			$date = Date::fromString($xml->node->resolve("date")->getInnerData());
		} else {
			if($xml->has->resolve("date")) {
				$date = Date::fromString($xml->att->resolve("date"));
			}
		}
		{
			$»tmp = _hx_anonymous(array("author" => $author, "date" => $date));
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function xmlToConfData($xml) {
		$GLOBALS['%s']->push("silex.publication.PublicationConfig::xmlToConfData");
		$»spos = $GLOBALS['%s']->length;
		if($xml->hasNode->resolve("creation")) {
			$this->configData->creation = $this->getChangeDataFromXML($xml->node->resolve("creation"));
		}
		if($xml->hasNode->resolve("lastChange")) {
			$this->configData->lastChange = $this->getChangeDataFromXML($xml->node->resolve("lastChange"));
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
				$this->configData->state = silex_publication_PublicationState::Trashed(_hx_anonymous(array("author" => $changeData->author, "date" => $changeData->date)));
			}break;
			case "Published":{
				$changeData = $this->getChangeDataFromXML($xml->node->resolve("state"));
				$this->configData->state = silex_publication_PublicationState::Published(_hx_anonymous(array("author" => $changeData->author, "date" => $changeData->date)));
			}break;
			case "Private":{
				$this->configData->state = silex_publication_PublicationState::$Private;
			}break;
			}
		}
		if($xml->hasNode->resolve("category")) {
			switch($xml->node->resolve("category")->getInnerData()) {
			case "Publication":{
				$this->configData->category = silex_publication_PublicationCategory::$Publication;
			}break;
			case "Theme":{
				$this->configData->category = silex_publication_PublicationCategory::$Theme;
			}break;
			case "Utility":{
				$this->configData->category = silex_publication_PublicationCategory::$Utility;
			}break;
			}
		}
		$GLOBALS['%s']->pop();
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
	static $PUBLICATION_HTML_FILE = "index.html";
	static $PUBLICATION_CSS_FILE = "app.css";
	static $PUBLICATION_CONFIG_FOLDER = "conf/";
	static $PUBLICATION_CONFIG_FILE = "config.xml.php";
	function __toString() { return 'silex.publication.PublicationConfig'; }
}

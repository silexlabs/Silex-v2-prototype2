<?php

class org_silex_config_PublicationConfigManager extends org_silex_config_ConfigBase {
	public function __construct($configFile = null) {
		if(!php_Boot::$skip_constructor) {
		$this->publicationConfig = _hx_anonymous(array("publicationFolder" => "", "state" => org_silex_publication_PublicationState::$Private, "creation" => _hx_anonymous(array("author" => "", "date" => new Date(0, 0, 0, 0, 0, 0))), "lastChange" => _hx_anonymous(array("author" => "", "date" => new Date(0, 0, 0, 0, 0, 0)))));
		parent::__construct($configFile);
	}}
	public function confDataToXml($xml) {
		$node = $xml->x->firstChild();
		$»t = ($this->publicationConfig->state);
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
		$node->addChild(Xml::parse("\x0A\x09\x09\x09<publicationFolder>" . $this->publicationConfig->publicationFolder . "</publicationFolder>\x0A"));
		$node->addChild(Xml::parse("\x0A<creation>\x0A\x09<author>" . $this->publicationConfig->creation->author . "</author>\x0A\x09<date>" . $this->publicationConfig->creation->date->toString() . "</date>\x0A</creation>\x0A"));
		$node->addChild(Xml::parse("\x0A<lastChange>\x0A\x09<author>" . $this->publicationConfig->lastChange->author . "</author>\x0A\x09<date>" . $this->publicationConfig->lastChange->date->toString() . "</date>\x0A</lastChange>\x0A"));
		return $xml;
	}
	public function getChangeDataFromXML($xml) {
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
		return _hx_anonymous(array("author" => $author, "date" => $date));
	}
	public function xmlToConfData($xml) {
		if($xml->hasNode->resolve("creation")) {
			$this->publicationConfig->creation = $this->getChangeDataFromXML($xml->node->resolve("creation"));
		}
		if($xml->hasNode->resolve("lastChange")) {
			$this->publicationConfig->lastChange = $this->getChangeDataFromXML($xml->node->resolve("lastChange"));
		}
		if($xml->hasNode->resolve("publicationFolder")) {
			try {
				$this->publicationConfig->publicationFolder = $xml->node->resolve("publicationFolder")->getInnerData();
			}catch(Exception $»e) {
				$_ex_ = ($»e instanceof HException) ? $»e->e : $»e;
				$d = $_ex_;
				{
					$this->publicationConfig->publicationFolder = "";
				}
			}
		}
		if($xml->hasNode->resolve("state")) {
			switch($xml->node->resolve("state")->getInnerData()) {
			case "Trashed":{
				$changeData = $this->getChangeDataFromXML($xml->node->resolve("state"));
				$this->publicationConfig->state = org_silex_publication_PublicationState::Trashed(_hx_anonymous(array("author" => $changeData->author, "date" => $changeData->date)));
			}break;
			case "Published":{
				$changeData = $this->getChangeDataFromXML($xml->node->resolve("state"));
				$this->publicationConfig->state = org_silex_publication_PublicationState::Published(_hx_anonymous(array("author" => $changeData->author, "date" => $changeData->date)));
			}break;
			case "Private":{
				$this->publicationConfig->state = org_silex_publication_PublicationState::$Private;
			}break;
			}
		}
	}
	public $publicationConfig;
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
	function __toString() { return 'org.silex.config.PublicationConfigManager'; }
}

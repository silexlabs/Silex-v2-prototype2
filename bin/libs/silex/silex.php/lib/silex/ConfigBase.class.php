<?php

class silex_ConfigBase {
	public function __construct($configFile = null) { if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("silex.ConfigBase::new");
		$製pos = $GLOBALS['%s']->length;
		if($configFile !== null) {
			$this->loadData($configFile);
		}
		$GLOBALS['%s']->pop();
	}}
	public function saveData($configFile) {
		$GLOBALS['%s']->push("silex.ConfigBase::saveData");
		$製pos = $GLOBALS['%s']->length;
		$xml = new haxe_xml_Fast(Xml::parse("<xml>\x0A\x09<!--\x0A\x09\x09<?php\x0A\x09\x09\x09exit(\"access denied\x0A\x09-\".\"->\x0A</\".\"xml>\");\x0A\x09\x09?>\x0A\x09-->\x0A</xml>"));
		sys_io_File::saveContent($configFile, $this->confDataToXml($xml)->getInnerHTML());
		$GLOBALS['%s']->pop();
	}
	public function loadData($configFile) {
		$GLOBALS['%s']->push("silex.ConfigBase::loadData");
		$製pos = $GLOBALS['%s']->length;
		$xml = new haxe_xml_Fast(Xml::parse(sys_io_File::getContent($configFile))->firstElement());
		$this->xmlToConfData($xml);
		$GLOBALS['%s']->pop();
	}
	public function confDataToXml($xml) {
		$GLOBALS['%s']->push("silex.ConfigBase::confDataToXml");
		$製pos = $GLOBALS['%s']->length;
		throw new HException("This virtual method has to be implemented in the derived class");
		{
			$GLOBALS['%s']->pop();
			return $xml;
		}
		$GLOBALS['%s']->pop();
	}
	public function xmlToConfData($xml) {
		$GLOBALS['%s']->push("silex.ConfigBase::xmlToConfData");
		$製pos = $GLOBALS['%s']->length;
		throw new HException("This virtual method has to be implemented in the derived class");
		$GLOBALS['%s']->pop();
	}
	static $SECURITY_STRING = "<xml>\x0A\x09<!--\x0A\x09\x09<?php\x0A\x09\x09\x09exit(\"access denied\x0A\x09-\".\"->\x0A</\".\"xml>\");\x0A\x09\x09?>\x0A\x09-->\x0A</xml>";
	function __toString() { return 'silex.ConfigBase'; }
}

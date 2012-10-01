<?php

class org_silex_config_ConfigBase {
	public function __construct($configFile = null) { if(!php_Boot::$skip_constructor) {
		if($configFile !== null) {
			$this->loadData($configFile);
		}
	}}
	public function saveData($configFile) {
		$xml = new haxe_xml_Fast(Xml::parse("<xml>\x0A\x09<!--\x0A\x09\x09<?php\x0A\x09\x09\x09exit(\"access denied\x0A\x09-\".\"->\x0A</\".\"xml>\");\x0A\x09\x09?>\x0A\x09-->\x0A</xml>"));
		sys_io_File::saveContent($configFile, $this->confDataToXml($xml)->getInnerHTML());
	}
	public function loadData($configFile) {
		$xml = new haxe_xml_Fast(Xml::parse(sys_io_File::getContent($configFile))->firstElement());
		$this->xmlToConfData($xml);
	}
	public function confDataToXml($xml) {
		throw new HException("This virtual method has to be implemented in the derived class");
		return $xml;
	}
	public function xmlToConfData($xml) {
		throw new HException("This virtual method has to be implemented in the derived class");
	}
	static $SECURITY_STRING = "<xml>\x0A\x09<!--\x0A\x09\x09<?php\x0A\x09\x09\x09exit(\"access denied\x0A\x09-\".\"->\x0A</\".\"xml>\");\x0A\x09\x09?>\x0A\x09-->\x0A</xml>";
	function __toString() { return 'org.silex.config.ConfigBase'; }
}

<?php

class org_silex_config_Config {
	public function __construct($configFile) { if(!php_Boot::$skip_constructor) {
		$this->loadData($configFile);
	}}
	public function saveData($configFile) {
		$xml = Xml::parse("<xml>\x0A\x09<!--\x0A\x09\x09<?php\x0A\x09\x09\x09exit(\"access denied\x0A\x09-\".\"->\x0A</\".\"xml>\");\x0A\x09\x09?>\x0A\x09-->\x0A</xml>");
		sys_io_File::saveContent($configFile, $this->confDataToXml($xml)->toString());
	}
	public function loadData($configFile) {
		$xml = Xml::parse(sys_io_File::getContent($configFile));
		$this->xmlToConfData($xml);
	}
	public function confDataToXml($xml) {
		throw new HException("This virtual method has to be implemented in the derived class");
		return $xml;
	}
	public function xmlToConfData($xml) {
		throw new HException("This virtual method has to be implemented in the derived class");
	}
	function __toString() { return 'org.silex.config.Config'; }
}

<?php

class config_Test {
	public function __construct() { 
	}
	public function testServerConfigWrite() {
		$serverConfig = new org_silex_config_ServerConfig("../data/server-config-write.xml.php");
		$serverConfig->saveData("../data/server-config-tmp.xml.php");
		utest_Assert::equals(sys_io_File::getContent("../data/server-config-write.xml.php"), sys_io_File::getContent("../data/server-config-tmp.xml.php"), null, _hx_anonymous(array("fileName" => "Test.hx", "lineNumber" => 31, "className" => "config.Test", "methodName" => "testServerConfigWrite")));
	}
	public function testServerConfigRead() {
		$serverConfig = new org_silex_config_ServerConfig("../data/server-config.xml.php");
		utest_Assert::equals("test1", $serverConfig->defaultPublication, null, _hx_anonymous(array("fileName" => "Test.hx", "lineNumber" => 25, "className" => "config.Test", "methodName" => "testServerConfigRead")));
	}
	static function main() {
		$runner = new utest_Runner();
		$runner->addCase(new config_Test(), null, null, null, null);
		utest_ui_Report::create($runner, null, null);
		$runner->run();
	}
	function __toString() { return 'config.Test'; }
}

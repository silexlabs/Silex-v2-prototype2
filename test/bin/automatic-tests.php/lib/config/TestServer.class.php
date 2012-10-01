<?php

class config_TestServer {
	public function __construct() { 
	}
	public function testPublicationConfigWrite() {
		haxe_Log::trace("testPublicationConfigWrite", _hx_anonymous(array("fileName" => "TestServer.hx", "lineNumber" => 62, "className" => "config.TestServer", "methodName" => "testPublicationConfigWrite")));
		$config = new silex_publication_PublicationConfig("../" . "config-data/" . "publication-config.xml.php");
		$config->configData = _hx_anonymous(array("state" => silex_publication_PublicationState::$Private, "category" => silex_publication_PublicationCategory::$Publication, "creation" => _hx_anonymous(array("author" => "silexlabs", "date" => Date::fromString("2021-12-02"))), "lastChange" => _hx_anonymous(array("author" => "silexlabs", "date" => Date::fromString("2021-12-02"))), "debugModeAction" => null));
		$config->saveData("../" . "config-data/" . "publication-config-tmp.xml.php");
		utest_Assert::equals(sys_io_File::getContent("../" . "config-data/" . "publication-config.xml.php"), sys_io_File::getContent("../" . "config-data/" . "publication-config-tmp.xml.php"), null, _hx_anonymous(array("fileName" => "TestServer.hx", "lineNumber" => 67, "className" => "config.TestServer", "methodName" => "testPublicationConfigWrite")));
	}
	public function testPublicationConfigRead() {
		haxe_Log::trace("testPublicationConfigRead", _hx_anonymous(array("fileName" => "TestServer.hx", "lineNumber" => 49, "className" => "config.TestServer", "methodName" => "testPublicationConfigRead")));
		$config = new silex_publication_PublicationConfig("../" . "config-data/" . "publication-config.xml.php");
		utest_Assert::equals(_hx_deref(_hx_anonymous(array("state" => silex_publication_PublicationState::$Private, "category" => silex_publication_PublicationCategory::$Publication, "creation" => _hx_anonymous(array("author" => "silexlabs", "date" => Date::fromString("2021-12-02"))), "lastChange" => _hx_anonymous(array("author" => "silexlabs", "date" => Date::fromString("2021-12-02"))), "debugModeAction" => null)))->state, $config->configData->state, null, _hx_anonymous(array("fileName" => "TestServer.hx", "lineNumber" => 52, "className" => "config.TestServer", "methodName" => "testPublicationConfigRead")));
		utest_Assert::equals(_hx_deref(_hx_anonymous(array("state" => silex_publication_PublicationState::$Private, "category" => silex_publication_PublicationCategory::$Publication, "creation" => _hx_anonymous(array("author" => "silexlabs", "date" => Date::fromString("2021-12-02"))), "lastChange" => _hx_anonymous(array("author" => "silexlabs", "date" => Date::fromString("2021-12-02"))), "debugModeAction" => null)))->category, $config->configData->category, null, _hx_anonymous(array("fileName" => "TestServer.hx", "lineNumber" => 53, "className" => "config.TestServer", "methodName" => "testPublicationConfigRead")));
		utest_Assert::equals(_hx_deref(_hx_anonymous(array("state" => silex_publication_PublicationState::$Private, "category" => silex_publication_PublicationCategory::$Publication, "creation" => _hx_anonymous(array("author" => "silexlabs", "date" => Date::fromString("2021-12-02"))), "lastChange" => _hx_anonymous(array("author" => "silexlabs", "date" => Date::fromString("2021-12-02"))), "debugModeAction" => null)))->creation->author, $config->configData->creation->author, null, _hx_anonymous(array("fileName" => "TestServer.hx", "lineNumber" => 54, "className" => "config.TestServer", "methodName" => "testPublicationConfigRead")));
		utest_Assert::equals(_hx_deref(_hx_anonymous(array("state" => silex_publication_PublicationState::$Private, "category" => silex_publication_PublicationCategory::$Publication, "creation" => _hx_anonymous(array("author" => "silexlabs", "date" => Date::fromString("2021-12-02"))), "lastChange" => _hx_anonymous(array("author" => "silexlabs", "date" => Date::fromString("2021-12-02"))), "debugModeAction" => null)))->creation->date->getTime(), $config->configData->creation->date->getTime(), null, _hx_anonymous(array("fileName" => "TestServer.hx", "lineNumber" => 55, "className" => "config.TestServer", "methodName" => "testPublicationConfigRead")));
		utest_Assert::equals(_hx_deref(_hx_anonymous(array("state" => silex_publication_PublicationState::$Private, "category" => silex_publication_PublicationCategory::$Publication, "creation" => _hx_anonymous(array("author" => "silexlabs", "date" => Date::fromString("2021-12-02"))), "lastChange" => _hx_anonymous(array("author" => "silexlabs", "date" => Date::fromString("2021-12-02"))), "debugModeAction" => null)))->lastChange->author, $config->configData->lastChange->author, null, _hx_anonymous(array("fileName" => "TestServer.hx", "lineNumber" => 56, "className" => "config.TestServer", "methodName" => "testPublicationConfigRead")));
		utest_Assert::equals(_hx_deref(_hx_anonymous(array("state" => silex_publication_PublicationState::$Private, "category" => silex_publication_PublicationCategory::$Publication, "creation" => _hx_anonymous(array("author" => "silexlabs", "date" => Date::fromString("2021-12-02"))), "lastChange" => _hx_anonymous(array("author" => "silexlabs", "date" => Date::fromString("2021-12-02"))), "debugModeAction" => null)))->lastChange->date->getTime(), $config->configData->lastChange->date->getTime(), null, _hx_anonymous(array("fileName" => "TestServer.hx", "lineNumber" => 57, "className" => "config.TestServer", "methodName" => "testPublicationConfigRead")));
	}
	public function testServerConfigWrite() {
		haxe_Log::trace("testServerConfigWrite", _hx_anonymous(array("fileName" => "TestServer.hx", "lineNumber" => 36, "className" => "config.TestServer", "methodName" => "testServerConfigWrite")));
		$config = new silex_server_ServerConfig("../" . "config-data/" . "server-config-write.xml.php");
		$config->saveData("../" . "config-data/" . "server-config-tmp.xml.php");
		utest_Assert::equals(sys_io_File::getContent("../" . "config-data/" . "server-config-write.xml.php"), sys_io_File::getContent("../" . "config-data/" . "server-config-tmp.xml.php"), null, _hx_anonymous(array("fileName" => "TestServer.hx", "lineNumber" => 40, "className" => "config.TestServer", "methodName" => "testServerConfigWrite")));
	}
	public function testServerConfigRead() {
		haxe_Log::trace("testServerConfigRead", _hx_anonymous(array("fileName" => "TestServer.hx", "lineNumber" => 30, "className" => "config.TestServer", "methodName" => "testServerConfigRead")));
		$config = new silex_server_ServerConfig("../" . "config-data/" . "server-config-read.xml.php");
		utest_Assert::equals("test1", $config->defaultPublication, null, _hx_anonymous(array("fileName" => "TestServer.hx", "lineNumber" => 32, "className" => "config.TestServer", "methodName" => "testServerConfigRead")));
	}
	static $THIS_TEST_PATH = "config-data/";
	static $TEST_PUBLICATION_CONFIG;
	function __toString() { return 'config.TestServer'; }
}
config_TestServer::$TEST_PUBLICATION_CONFIG = _hx_anonymous(array("state" => silex_publication_PublicationState::$Private, "category" => silex_publication_PublicationCategory::$Publication, "creation" => _hx_anonymous(array("author" => "silexlabs", "date" => Date::fromString("2021-12-02"))), "lastChange" => _hx_anonymous(array("author" => "silexlabs", "date" => Date::fromString("2021-12-02"))), "debugModeAction" => null));

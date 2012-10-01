<?php

class AllTestsServer {
	public function __construct() { 
	}
	static $TEST_ROOT_PATH = "../";
	static function main() {
		$runner = new utest_Runner();
		$runner->addCase(new interpreter_TestCross(), null, null, null, null);
		$runner->addCase(new util_TestServer(), null, null, null, null);
		$runner->addCase(new config_TestServer(), null, null, null, null);
		$runner->addCase(new publication_TestServer(), null, null, null, null);
		silex_publication_PublicationService::$PUBLICATION_FOLDER = "../publication-data/";
		if(haxe_remoting_HttpConnection::handleRequest(silex_ServiceBase::$context)) {
			return;
		}
		utest_ui_Report::create($runner, null, null);
		$runner->run();
	}
	function __toString() { return 'AllTestsServer'; }
}

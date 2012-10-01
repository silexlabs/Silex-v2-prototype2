<?php

class PublicationsTestGateway {
	public function __construct(){}
	static function main() {
		$GLOBALS['%s']->push("PublicationsTestGateway::main");
		$»spos = $GLOBALS['%s']->length;
		silex_publication_PublicationService::$PUBLICATION_FOLDER = "../publications-test/";
		$publicationService = new silex_publication_PublicationService();
		if(haxe_remoting_HttpConnection::handleRequest(silex_ServiceBase::$context)) {
			$GLOBALS['%s']->pop();
			return;
		}
		php_Lib::hprint("This is a haxe remoting gateway. Go to the <a href='../publications-test/'>tests here</a>!");
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'PublicationsTestGateway'; }
}

<?php

class silex_Silex {
	public function __construct(){}
	static $CONFIG_PUBLICATION_BODY = "publicationBody";
	static $CONFIG_USE_DEEPLINK = "useDeeplink";
	static $LOADER_SCRIPT_PATH = "../../libs/silex/loader.js";
	static function main() {
		$GLOBALS['%s']->push("silex.Silex::main");
		$»spos = $GLOBALS['%s']->length;
		$serverConfig = new silex_server_ServerConfig(null);
		$publicationService = new silex_publication_PublicationService();
		if(haxe_remoting_HttpConnection::handleRequest(silex_ServiceBase::$context)) {
			$GLOBALS['%s']->pop();
			return;
		}
		header("Location" . ": " . (silex_publication_PublicationService::$PUBLICATION_FOLDER . silex_publication_PublicationService::$BUILDER_PUBLICATION_NAME));
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'silex.Silex'; }
}

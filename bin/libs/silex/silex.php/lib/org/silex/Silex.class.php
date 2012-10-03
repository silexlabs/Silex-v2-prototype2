<?php

class org_silex_Silex {
	public function __construct(){}
	static $CONFIG_PUBLICATION_NAME = "publicationName";
	static $CONFIG_PUBLICATION_BODY = "publicationBody";
	static $CONFIG_USE_DEEPLINK = "useDeeplink";
	static $LOADER_SCRIPT_PATH = "loader.js";
	static $publicationName;
	static function main() {
		$GLOBALS['%s']->push("org.silex.Silex::main");
		$»spos = $GLOBALS['%s']->length;
		$serverConfig = new org_silex_server_ServerConfig(null);
		$publicationService = new org_silex_publication_PublicationService();
		if(haxe_remoting_HttpConnection::handleRequest(org_silex_ServiceBase::$context)) {
			$GLOBALS['%s']->pop();
			return;
		}
		$urlParamsString = php_Web::getParamsString();
		$params = _hx_explode("/", _hx_array_get(_hx_explode("&", $urlParamsString), 0));
		org_silex_Silex::$publicationName = $params[0];
		if(org_silex_Silex::$publicationName === "") {
			org_silex_Silex::$publicationName = $serverConfig->defaultPublication;
		}
		$publicationData = $publicationService->getPublicationData(org_silex_Silex::$publicationName, null);
		$publicationConfig = $publicationService->getPublicationConfig(org_silex_Silex::$publicationName, null);
		$initialPageName = "";
		if($params->length === 1) {
			$initialPageName = "";
		} else {
			$initialPageName = $params[1];
		}
		cocktail_Lib::get_document()->set_innerHTML($publicationData->html);
		org_slplayer_util_DomTools::addCssRules($publicationData->css, null);
		org_slplayer_util_DomTools::setMeta("publicationName", org_silex_Silex::$publicationName, null);
		org_slplayer_util_DomTools::setMeta("publicationBody", StringTools::htmlEscape(cocktail_Lib::get_document()->body->get_innerHTML()), null);
		$scripts = StringTools::htmlEscape($serverConfig->debugModeAction . $publicationConfig->debugModeAction);
		org_slplayer_util_DomTools::setMeta("debugModeAction", $scripts, null);
		if($initialPageName !== "" && org_slplayer_util_DomTools::getMeta("useDeeplink", null, null) !== "false") {
			org_slplayer_util_DomTools::setMeta("initialPageName", $initialPageName, null);
		}
		org_slplayer_util_DomTools::embedScript("loader.js");
		$application = org_slplayer_core_Application::createApplication(null);
		$application->init(cocktail_Lib::get_document()->body);
		php_Lib::hprint(cocktail_Lib::get_document()->get_innerHTML());
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'org.silex.Silex'; }
}

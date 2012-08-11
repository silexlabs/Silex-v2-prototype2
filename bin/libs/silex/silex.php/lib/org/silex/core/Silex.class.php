<?php

class org_silex_core_Silex {
	public function __construct(){}
	static $CONFIG_INITIAL_PAGE_NAME = "InitialPageName";
	static $CONFIG_PUBLICATION_NAME = "PublicationName";
	static $CONFIG_PUBLICATION_BODY = "PublicationBody";
	static $PUBLICATIONS_FOLDER = "publications/";
	static $PUBLICATION_HTML_FILE = "content/index.html";
	static $LOADER_SCRIPT_PATH = "loader.js";
	static $publicationName;
	static $initialPageName;
	static function main() {
		$application = org_slplayer_core_Application::createApplication(null);
		$serverConfig = new org_silex_config_ServerConfig(null);
		$urlParamsString = php_Web::getParamsString();
		$params = _hx_explode("/", _hx_array_get(_hx_explode("&", $urlParamsString), 0));
		haxe_Log::trace("Silex loading " . Std::string($params) . " - " . Std::string(Type::typeof($params[0])), _hx_anonymous(array("fileName" => "Silex.hx", "lineNumber" => 127, "className" => "org.silex.core.Silex", "methodName" => "main")));
		if($params->length === 1) {
			if($params[0] === "") {
				org_silex_core_Silex::$publicationName = $serverConfig->defaultPublication;
			} else {
				org_silex_core_Silex::$publicationName = $params[0];
			}
			org_silex_core_Silex::$initialPageName = "";
		} else {
			org_silex_core_Silex::$publicationName = $params[0];
			org_silex_core_Silex::$initialPageName = $params[1];
		}
		$htmlContent = sys_io_File::getContent("publications/" . org_silex_core_Silex::$publicationName . "/" . "content/index.html");
		cocktail_Lib::get_document()->documentElement->set_innerHTML($htmlContent);
		org_silex_core_Silex::setConfig(cocktail_Lib::get_document(), "PublicationName", org_silex_core_Silex::$publicationName);
		org_silex_core_Silex::setConfig(cocktail_Lib::get_document(), "PublicationBody", StringTools::htmlEscape(cocktail_Lib::get_document()->body->get_innerHTML()));
		if(org_silex_core_Silex::$initialPageName !== "") {
			org_silex_core_Silex::setConfig(cocktail_Lib::get_document(), "InitialPageName", org_silex_core_Silex::$initialPageName);
		}
		$node = cocktail_Lib::get_document()->createElement("script");
		$node->setAttribute("src", "loader.js");
		$head = _hx_array_get(cocktail_Lib::get_document()->getElementsByTagName("head"), 0);
		$head->appendChild($node);
		$application->init(null);
		php_Lib::hprint(cocktail_Lib::get_document()->documentElement->get_innerHTML());
	}
	static function setConfig($document, $metaName, $metaValue) {
		$res = new Hash();
		$metaTags = $document->getElementsByTagName("META");
		$found = false;
		{
			$_g1 = 0; $_g = $metaTags->length;
			while($_g1 < $_g) {
				$idxNode = $_g1++;
				$node = $metaTags[$idxNode];
				$configName = $node->getAttribute("name");
				$configValue = $node->getAttribute("content");
				if($configName !== null && $configValue !== null) {
					if($configName === $metaName) {
						$configValue = $metaValue;
						$node->setAttribute("content", $metaValue);
						$found = true;
					}
					$res->set($configName, $configValue);
				}
				unset($node,$idxNode,$configValue,$configName);
			}
		}
		if(!$found) {
			$node = $document->createElement("meta");
			$node->setAttribute("name", $metaName);
			$node->setAttribute("content", $metaValue);
			$head = _hx_array_get($document->getElementsByTagName("head"), 0);
			$head->appendChild($node);
			$res->set($metaName, $metaValue);
		}
		return $res;
	}
	function __toString() { return 'org.silex.core.Silex'; }
}

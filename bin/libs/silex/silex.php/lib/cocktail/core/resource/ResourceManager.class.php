<?php

class cocktail_core_resource_ResourceManager {
	public function __construct() { if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.resource.ResourceManager::new");
		$�spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}}
	static $_resources;
	static $_swfResources;
	static function init() {
		$GLOBALS['%s']->push("cocktail.core.resource.ResourceManager::init");
		$�spos = $GLOBALS['%s']->length;
		if(cocktail_core_resource_ResourceManager::$_resources === null) {
			cocktail_core_resource_ResourceManager::$_resources = new Hash();
		}
		if(cocktail_core_resource_ResourceManager::$_swfResources === null) {
			cocktail_core_resource_ResourceManager::$_swfResources = new Hash();
		}
		$GLOBALS['%s']->pop();
	}
	static function getImageResource($url) {
		$GLOBALS['%s']->push("cocktail.core.resource.ResourceManager::getImageResource");
		$�spos = $GLOBALS['%s']->length;
		cocktail_core_resource_ResourceManager::init();
		if(cocktail_core_resource_ResourceManager::$_resources->exists($url) === false) {
			$resource = new cocktail_core_resource_AbstractResource($url);
			cocktail_core_resource_ResourceManager::$_resources->set($url, $resource);
		}
		{
			$�tmp = cocktail_core_resource_ResourceManager::$_resources->get($url);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function getSWFResource($url) {
		$GLOBALS['%s']->push("cocktail.core.resource.ResourceManager::getSWFResource");
		$�spos = $GLOBALS['%s']->length;
		cocktail_core_resource_ResourceManager::init();
		if(cocktail_core_resource_ResourceManager::$_swfResources->exists($url) === false) {
			$resource = new cocktail_port_platform_nativeHttp_AbstractNativeHttp();
			$resource->load($url, "get", null, null, cocktail_port_platform_nativeHttp_DataFormatValue::$BINARY);
			cocktail_core_resource_ResourceManager::$_swfResources->set($url, $resource);
		}
		{
			$�tmp = cocktail_core_resource_ResourceManager::$_swfResources->get($url);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'cocktail.core.resource.ResourceManager'; }
}

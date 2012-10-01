<?php

class cocktail_core_resource_ResourceManager {
	public function __construct() { if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.resource.ResourceManager::new");
		$»spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}}
	static $_resources;
	static function getImageResource($url) {
		$GLOBALS['%s']->push("cocktail.core.resource.ResourceManager::getImageResource");
		$»spos = $GLOBALS['%s']->length;
		if(cocktail_core_resource_ResourceManager::$_resources === null) {
			cocktail_core_resource_ResourceManager::$_resources = new Hash();
		}
		if(cocktail_core_resource_ResourceManager::$_resources->exists($url) === false) {
			$resource = new cocktail_core_resource_AbstractResource($url);
			cocktail_core_resource_ResourceManager::$_resources->set($url, $resource);
		}
		{
			$»tmp = cocktail_core_resource_ResourceManager::$_resources->get($url);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'cocktail.core.resource.ResourceManager'; }
}

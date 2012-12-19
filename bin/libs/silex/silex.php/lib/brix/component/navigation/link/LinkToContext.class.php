<?php

class brix_component_navigation_link_LinkToContext extends brix_component_navigation_link_LinkBase {
	public function __construct($rootElement, $brixId) { if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("brix.component.navigation.link.LinkToContext::new");
		$»spos = $GLOBALS['%s']->length;
		parent::__construct($rootElement,$brixId);
		if($rootElement->getAttribute("data-context") !== null) {
			$this->linkName = $rootElement->getAttribute("data-context");
		}
		null;
		$GLOBALS['%s']->pop();
	}}
	public function onClick($e) {
		$GLOBALS['%s']->push("brix.component.navigation.link.LinkToContext::onClick");
		$»spos = $GLOBALS['%s']->length;
		parent::onClick($e);
		if(brix_component_navigation_link_LinkToContext::$styleSheet !== null) {
			_hx_array_get(cocktail_Lib::get_document()->getElementsByTagName("head"), 0)->removeChild(brix_component_navigation_link_LinkToContext::$styleSheet);
		}
		$cssText = "." . $this->linkName . " { display : inline; visibility : visible; }";
		brix_component_navigation_link_LinkToContext::$styleSheet = brix_util_DomTools::addCssRules($cssText, null);
		$GLOBALS['%s']->pop();
	}
	static function __meta__() { $»args = func_get_args(); return call_user_func_array(self::$__meta__, $»args); }
	static $__meta__;
	static $CONFIG_TRANSITION_DURATION = "data-context";
	static $styleSheet;
	function __toString() { return 'brix.component.navigation.link.LinkToContext'; }
}
brix_component_navigation_link_LinkToContext::$__meta__ = _hx_anonymous(array("obj" => _hx_anonymous(array("tagNameFilter" => new _hx_array(array("a"))))));

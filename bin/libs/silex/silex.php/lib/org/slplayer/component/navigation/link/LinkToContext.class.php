<?php

class org_slplayer_component_navigation_link_LinkToContext extends org_slplayer_component_navigation_link_LinkBase {
	public function __construct($rootElement, $SLPId) { if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("org.slplayer.component.navigation.link.LinkToContext::new");
		$»spos = $GLOBALS['%s']->length;
		parent::__construct($rootElement,$SLPId);
		if($rootElement->getAttribute("data-context") !== null) {
			$this->linkName = $rootElement->getAttribute("data-context");
		}
		null;
		$GLOBALS['%s']->pop();
	}}
	public function onClick($e) {
		$GLOBALS['%s']->push("org.slplayer.component.navigation.link.LinkToContext::onClick");
		$»spos = $GLOBALS['%s']->length;
		parent::onClick($e);
		if(org_slplayer_component_navigation_link_LinkToContext::$styleSheet !== null) {
			_hx_array_get(cocktail_Lib::get_document()->getElementsByTagName("head"), 0)->removeChild(org_slplayer_component_navigation_link_LinkToContext::$styleSheet);
		}
		$cssText = "." . $this->linkName . " { display : inline; visibility : visible; }";
		org_slplayer_component_navigation_link_LinkToContext::$styleSheet = org_slplayer_util_DomTools::addCssRules($cssText, null);
		$GLOBALS['%s']->pop();
	}
	static function __meta__() { $»args = func_get_args(); return call_user_func_array(self::$__meta__, $»args); }
	static $__meta__;
	static $CONFIG_TRANSITION_DURATION = "data-context";
	static $styleSheet;
	function __toString() { return 'org.slplayer.component.navigation.link.LinkToContext'; }
}
org_slplayer_component_navigation_link_LinkToContext::$__meta__ = _hx_anonymous(array("obj" => _hx_anonymous(array("tagNameFilter" => new _hx_array(array("a"))))));

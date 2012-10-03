<?php

class org_slplayer_component_navigation_LinkToPage extends org_slplayer_component_navigation_LinkBase {
	public function __construct($rootElement, $SLPId) { if(!php_Boot::$skip_constructor) {
		parent::__construct($rootElement,$SLPId);
	}}
	public function linkToPage($page, $targetAttr = null) {
		$page->open($this->transitionData, $targetAttr !== "_top");
	}
	static function __meta__() { $»args = func_get_args(); return call_user_func_array(self::$__meta__, $»args); }
	static $__meta__;
	static $CONFIG_TARGET_IS_POPUP = "_top";
	function __toString() { return 'org.slplayer.component.navigation.LinkToPage'; }
}
org_slplayer_component_navigation_LinkToPage::$__meta__ = _hx_anonymous(array("obj" => _hx_anonymous(array("tagNameFilter" => new _hx_array(array("a"))))));

<?php

class org_slplayer_component_navigation_LinkClosePage extends org_slplayer_component_navigation_LinkBase {
	public function __construct($rootElement, $SLPId) { if(!php_Boot::$skip_constructor) {
		parent::__construct($rootElement,$SLPId);
	}}
	public function linkToPage($page, $targetAttr = null) {
		$page->close($this->transitionData, null);
	}
	static function __meta__() { $»args = func_get_args(); return call_user_func_array(self::$__meta__, $»args); }
	static $__meta__;
	function __toString() { return 'org.slplayer.component.navigation.LinkClosePage'; }
}
org_slplayer_component_navigation_LinkClosePage::$__meta__ = _hx_anonymous(array("obj" => _hx_anonymous(array("tagNameFilter" => new _hx_array(array("a"))))));

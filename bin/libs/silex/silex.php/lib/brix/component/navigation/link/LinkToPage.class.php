<?php

class brix_component_navigation_link_LinkToPage extends brix_component_navigation_link_LinkBase {
	public function __construct($rootElement, $brixId) { if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("brix.component.navigation.link.LinkToPage::new");
		$»spos = $GLOBALS['%s']->length;
		parent::__construct($rootElement,$brixId);
		$GLOBALS['%s']->pop();
	}}
	public function onClick($e) {
		$GLOBALS['%s']->push("brix.component.navigation.link.LinkToPage::onClick");
		$»spos = $GLOBALS['%s']->length;
		parent::onClick($e);
		brix_component_navigation_Page::openPage($this->linkName, $this->targetAttr === "_top", $this->transitionDataShow, $this->transitionDataHide, $this->brixInstanceId, $this->groupElement);
		$GLOBALS['%s']->pop();
	}
	static function __meta__() { $»args = func_get_args(); return call_user_func_array(self::$__meta__, $»args); }
	static $__meta__;
	function __toString() { return 'brix.component.navigation.link.LinkToPage'; }
}
brix_component_navigation_link_LinkToPage::$__meta__ = _hx_anonymous(array("obj" => _hx_anonymous(array("tagNameFilter" => new _hx_array(array("a"))))));

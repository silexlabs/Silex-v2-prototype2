<?php

class silex_ui_link_SilexLink extends brix_component_navigation_link_LinkBase {
	public function __construct($rootElement, $brixId) { if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("silex.ui.link.SilexLink::new");
		$�spos = $GLOBALS['%s']->length;
		parent::__construct($rootElement,$brixId);
		$GLOBALS['%s']->pop();
	}}
	public function onClick($e) {
		$GLOBALS['%s']->push("silex.ui.link.SilexLink::onClick");
		$�spos = $GLOBALS['%s']->length;
		parent::onClick($e);
		if($this->linkName === null) {
			$GLOBALS['%s']->pop();
			return;
		}
		if(silex_ui_link_SilexLink::isUrl($this->linkName)) {
			cocktail_Lib::get_window()->open($this->linkName, $this->targetAttr);
		} else {
			if(silex_ui_link_SilexLink::isPage($this->linkName, $this->brixInstanceId)) {
				brix_component_navigation_Page::openPage($this->linkName, $this->targetAttr === "_top", $this->transitionDataShow, $this->transitionDataHide, $this->brixInstanceId, $this->groupElement);
			}
		}
		$GLOBALS['%s']->pop();
	}
	static function isUrl($value) {
		$GLOBALS['%s']->push("silex.ui.link.SilexLink::isUrl");
		$�spos = $GLOBALS['%s']->length;
		if($value === null) {
			$GLOBALS['%s']->pop();
			return false;
		}
		{
			$�tmp = StringTools::startsWith($value, "./") || StringTools::startsWith($value, "http://");
			$GLOBALS['%s']->pop();
			return $�tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function isPage($value, $brixInstanceId) {
		$GLOBALS['%s']->push("silex.ui.link.SilexLink::isPage");
		$�spos = $GLOBALS['%s']->length;
		if($value === null) {
			$GLOBALS['%s']->pop();
			return false;
		}
		$pageList = brix_component_navigation_Page::getPageNodes($brixInstanceId, null);
		{
			$�tmp = $pageList->length > 0;
			$GLOBALS['%s']->pop();
			return $�tmp;
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'silex.ui.link.SilexLink'; }
}

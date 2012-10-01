<?php

class org_silex_component_builder_Builder extends org_slplayer_component_ui_DisplayObject {
	public function __construct($rootElement, $SLPId) { if(!php_Boot::$skip_constructor) {
		parent::__construct($rootElement,$SLPId);
	}}
	static $BUILDER_MODE_PAGE_NAME = "Builder";
	function __toString() { return 'org.silex.component.builder.Builder'; }
}

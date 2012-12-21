<?php

class cocktail_core_graphics_InitialGraphicsContext extends cocktail_core_graphics_GraphicsContext {
	public function __construct($layerRenderer) { if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.graphics.InitialGraphicsContext::new");
		$»spos = $GLOBALS['%s']->length;
		parent::__construct($layerRenderer);
		$GLOBALS['%s']->pop();
	}}
	public function doDetach() {
		$GLOBALS['%s']->push("cocktail.core.graphics.InitialGraphicsContext::doDetach");
		$»spos = $GLOBALS['%s']->length;
		$this->graphics->detachFromRoot();
		$GLOBALS['%s']->pop();
	}
	public function doAttach() {
		$GLOBALS['%s']->push("cocktail.core.graphics.InitialGraphicsContext::doAttach");
		$»spos = $GLOBALS['%s']->length;
		$this->graphics->attachToRoot();
		$GLOBALS['%s']->pop();
	}
	static $__properties__ = array("get_nativeLayer" => "get_nativeLayer");
	function __toString() { return 'cocktail.core.graphics.InitialGraphicsContext'; }
}

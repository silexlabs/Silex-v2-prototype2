<?php

class cocktail_core_linebox_StaticPositionLineBox extends cocktail_core_linebox_LineBox {
	public function __construct($elementRenderer) { if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.linebox.StaticPositionLineBox::new");
		$�spos = $GLOBALS['%s']->length;
		parent::__construct($elementRenderer);
		$GLOBALS['%s']->pop();
	}}
	public function get_bounds() {
		$GLOBALS['%s']->push("cocktail.core.linebox.StaticPositionLineBox::get_bounds");
		$�spos = $GLOBALS['%s']->length;
		{
			$�tmp = $this->elementRenderer->get_bounds();
			$GLOBALS['%s']->pop();
			return $�tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function isStaticPosition() {
		$GLOBALS['%s']->push("cocktail.core.linebox.StaticPositionLineBox::isStaticPosition");
		$�spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return true;
		}
		$GLOBALS['%s']->pop();
	}
	public function render($graphicContext) {
		$GLOBALS['%s']->push("cocktail.core.linebox.StaticPositionLineBox::render");
		$�spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	static $__properties__ = array("get_bounds" => "get_bounds");
	function __toString() { return 'cocktail.core.linebox.StaticPositionLineBox'; }
}

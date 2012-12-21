<?php

class cocktail_core_linebox_RootLineBox extends cocktail_core_linebox_LineBox {
	public function __construct($elementRenderer) { if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.linebox.RootLineBox::new");
		$»spos = $GLOBALS['%s']->length;
		parent::__construct($elementRenderer);
		$GLOBALS['%s']->pop();
	}}
	public function get_bounds() {
		$GLOBALS['%s']->push("cocktail.core.linebox.RootLineBox::get_bounds");
		$»spos = $GLOBALS['%s']->length;
		$this->getLineBoxesBounds($this, $this->bounds);
		{
			$»tmp = $this->bounds;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static $__properties__ = array("get_bounds" => "get_bounds");
	function __toString() { return 'cocktail.core.linebox.RootLineBox'; }
}

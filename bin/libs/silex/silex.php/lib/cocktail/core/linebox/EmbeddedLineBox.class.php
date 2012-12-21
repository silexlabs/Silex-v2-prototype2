<?php

class cocktail_core_linebox_EmbeddedLineBox extends cocktail_core_linebox_LineBox {
	public function __construct($elementRenderer) { if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.linebox.EmbeddedLineBox::new");
		$�spos = $GLOBALS['%s']->length;
		parent::__construct($elementRenderer);
		$GLOBALS['%s']->pop();
	}}
	public function get_bounds() {
		$GLOBALS['%s']->push("cocktail.core.linebox.EmbeddedLineBox::get_bounds");
		$�spos = $GLOBALS['%s']->length;
		{
			$�tmp = $this->elementRenderer->get_bounds();
			$GLOBALS['%s']->pop();
			return $�tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getLeadedDescent() {
		$GLOBALS['%s']->push("cocktail.core.linebox.EmbeddedLineBox::getLeadedDescent");
		$�spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return 0;
		}
		$GLOBALS['%s']->pop();
	}
	public function getLeadedAscent() {
		$GLOBALS['%s']->push("cocktail.core.linebox.EmbeddedLineBox::getLeadedAscent");
		$�spos = $GLOBALS['%s']->length;
		$usedValues = $this->elementRenderer->coreStyle->usedValues;
		{
			$�tmp = $this->get_bounds()->height + $usedValues->marginTop + $usedValues->marginBottom;
			$GLOBALS['%s']->pop();
			return $�tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function isEmbedded() {
		$GLOBALS['%s']->push("cocktail.core.linebox.EmbeddedLineBox::isEmbedded");
		$�spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return true;
		}
		$GLOBALS['%s']->pop();
	}
	public function render($graphicContext) {
		$GLOBALS['%s']->push("cocktail.core.linebox.EmbeddedLineBox::render");
		$�spos = $GLOBALS['%s']->length;
		$this->elementRenderer->render($graphicContext);
		$GLOBALS['%s']->pop();
	}
	static $__properties__ = array("get_bounds" => "get_bounds");
	function __toString() { return 'cocktail.core.linebox.EmbeddedLineBox'; }
}

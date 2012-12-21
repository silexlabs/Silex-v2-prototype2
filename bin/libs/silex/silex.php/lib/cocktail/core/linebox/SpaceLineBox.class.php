<?php

class cocktail_core_linebox_SpaceLineBox extends cocktail_core_linebox_TextLineBox {
	public function __construct($elementRenderer, $fontMetrics, $fontManager) { if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.linebox.SpaceLineBox::new");
		$�spos = $GLOBALS['%s']->length;
		parent::__construct($elementRenderer,"",$fontMetrics,null);
		$GLOBALS['%s']->pop();
	}}
	public function getTextWidth() {
		$GLOBALS['%s']->push("cocktail.core.linebox.SpaceLineBox::getTextWidth");
		$�spos = $GLOBALS['%s']->length;
		$letterSpacing = $this->elementRenderer->coreStyle->usedValues->letterSpacing;
		$wordSpacing = $this->elementRenderer->coreStyle->getAbsoluteLength(cocktail_core_linebox_SpaceLineBox_0($this, $letterSpacing));
		{
			$�tmp = $this->_fontMetrics->spaceWidth + $letterSpacing + $wordSpacing;
			$GLOBALS['%s']->pop();
			return $�tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function isSpace() {
		$GLOBALS['%s']->push("cocktail.core.linebox.SpaceLineBox::isSpace");
		$�spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return true;
		}
		$GLOBALS['%s']->pop();
	}
	public function render($graphicContext) {
		$GLOBALS['%s']->push("cocktail.core.linebox.SpaceLineBox::render");
		$�spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public function initTextBitmap() {
		$GLOBALS['%s']->push("cocktail.core.linebox.SpaceLineBox::initTextBitmap");
		$�spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public function initNativeTextElement($text, $fontManager, $style) {
		$GLOBALS['%s']->push("cocktail.core.linebox.SpaceLineBox::initNativeTextElement");
		$�spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	static $__properties__ = array("get_bounds" => "get_bounds");
	function __toString() { return 'cocktail.core.linebox.SpaceLineBox'; }
}
function cocktail_core_linebox_SpaceLineBox_0(&$�this, &$letterSpacing) {
	$�spos = $GLOBALS['%s']->length;
	{
		$_this = $�this->elementRenderer->coreStyle;
		{
			$transition = $_this->_transitionManager->getTransition("word-spacing", $_this);
			if($transition !== null) {
				return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
			} else {
				return _hx_deref((cocktail_core_linebox_SpaceLineBox_1($�this, $_this, $letterSpacing, $transition)))->typedValue;
			}
			unset($transition);
		}
		unset($_this);
	}
}
function cocktail_core_linebox_SpaceLineBox_1(&$�this, &$_this, &$letterSpacing, &$transition) {
	$�spos = $GLOBALS['%s']->length;
	{
		$_this1 = $_this->computedValues;
		$typedProperty = null;
		$length = $_this1->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($_this1->_properties, $i)->name === "word-spacing") {
					$typedProperty = $_this1->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}

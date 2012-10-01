<?php

class cocktail_core_layout_formatter_FormattingContext {
	public function __construct($floatsManager) {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.layout.formatter.FormattingContext::new");
		$»spos = $GLOBALS['%s']->length;
		$this->_formattingContextData = new cocktail_core_geom_RectangleVO(0.0, 0.0, 0.0, 0.0);
		$this->_floatsManager = $floatsManager;
		$GLOBALS['%s']->pop();
	}}
	public function applyShrinkToFitIfNeeded($elementRenderer, $minimumWidth) {
		$GLOBALS['%s']->push("cocktail.core.layout.formatter.FormattingContext::applyShrinkToFitIfNeeded");
		$»spos = $GLOBALS['%s']->length;
		$style = $elementRenderer->coreStyle;
		$shrinkedWidth = $style->usedValues->width;
		if($style->isAuto($style->get_width()) === true) {
			if($elementRenderer->isFloat() === true || $style->getKeyword($style->get_display()) == cocktail_core_css_CSSKeywordValue::$INLINE_BLOCK) {
				$shrinkedWidth = $minimumWidth;
			} else {
				if($elementRenderer->isPositioned() === true && $elementRenderer->isRelativePositioned() === false) {
					if($style->isAuto($style->get_left()) === true || $style->isAuto($style->get_right()) === true) {
						$shrinkedWidth = $minimumWidth;
					}
				}
			}
		} else {
			$shrinkedWidth = $style->usedValues->width;
		}
		$style->usedValues->width = $shrinkedWidth;
		$GLOBALS['%s']->pop();
	}
	public function startFormatting() {
		$GLOBALS['%s']->push("cocktail.core.layout.formatter.FormattingContext::startFormatting");
		$»spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public function format($formattingContextRoot, $resetFloats) {
		$GLOBALS['%s']->push("cocktail.core.layout.formatter.FormattingContext::format");
		$»spos = $GLOBALS['%s']->length;
		$this->_formattingContextRoot = $formattingContextRoot;
		if($resetFloats === true) {
			$this->_floatsManager->init();
		}
		$this->initFormattingContextData();
		$this->startFormatting();
		$this->applyShrinkToFitIfNeeded($this->_formattingContextRoot, $this->_formattingContextData->width);
		$GLOBALS['%s']->pop();
	}
	public function initFormattingContextData() {
		$GLOBALS['%s']->push("cocktail.core.layout.formatter.FormattingContext::initFormattingContextData");
		$»spos = $GLOBALS['%s']->length;
		$this->_formattingContextData->x = $this->_formattingContextRoot->coreStyle->usedValues->paddingLeft;
		$this->_formattingContextData->y = $this->_formattingContextRoot->coreStyle->usedValues->paddingTop;
		$this->_formattingContextData->width = 0.0;
		$this->_formattingContextData->height = 0.0;
		$GLOBALS['%s']->pop();
	}
	public $_formattingContextData;
	public $_floatsManager;
	public $_formattingContextRoot;
	public function __call($m, $a) {
		if(isset($this->$m) && is_callable($this->$m))
			return call_user_func_array($this->$m, $a);
		else if(isset($this->»dynamics[$m]) && is_callable($this->»dynamics[$m]))
			return call_user_func_array($this->»dynamics[$m], $a);
		else if('toString' == $m)
			return $this->__toString();
		else
			throw new HException('Unable to call «'.$m.'»');
	}
	function __toString() { return 'cocktail.core.layout.formatter.FormattingContext'; }
}

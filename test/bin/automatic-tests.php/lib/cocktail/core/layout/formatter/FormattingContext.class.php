<?php

class cocktail_core_layout_formatter_FormattingContext {
	public function __construct($floatsManager) {
		if(!php_Boot::$skip_constructor) {
		$this->_formattingContextData = new cocktail_core_geom_RectangleVO(0.0, 0.0, 0.0, 0.0);
		$this->_floatsManager = $floatsManager;
	}}
	public function applyShrinkToFitIfNeeded($elementRenderer, $minimumWidth) {
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
	}
	public function startFormatting() {
	}
	public function format($formattingContextRoot, $resetFloats) {
		$this->_formattingContextRoot = $formattingContextRoot;
		if($resetFloats === true) {
			$this->_floatsManager->init();
		}
		$this->initFormattingContextData();
		$this->startFormatting();
		$this->applyShrinkToFitIfNeeded($this->_formattingContextRoot, $this->_formattingContextData->width);
	}
	public function initFormattingContextData() {
		$this->_formattingContextData->x = $this->_formattingContextRoot->coreStyle->usedValues->paddingLeft;
		$this->_formattingContextData->y = $this->_formattingContextRoot->coreStyle->usedValues->paddingTop;
		$this->_formattingContextData->width = 0.0;
		$this->_formattingContextData->height = 0.0;
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

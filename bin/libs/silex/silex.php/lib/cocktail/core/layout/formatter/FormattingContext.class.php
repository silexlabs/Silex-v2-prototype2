<?php

class cocktail_core_layout_formatter_FormattingContext {
	public function __construct($floatsManager) {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.layout.formatter.FormattingContext::new");
		$»spos = $GLOBALS['%s']->length;
		$this->_formattingContextData = new cocktail_core_geom_RectangleVO();
		$this->_floatsManager = $floatsManager;
		$GLOBALS['%s']->pop();
	}}
	public function applyShrinkToFitIfNeeded($elementRenderer, $minimumWidth) {
		$GLOBALS['%s']->push("cocktail.core.layout.formatter.FormattingContext::applyShrinkToFitIfNeeded");
		$»spos = $GLOBALS['%s']->length;
		$style = $elementRenderer->coreStyle;
		$shrinkedWidth = $style->usedValues->width;
		if($style->isAuto(cocktail_core_layout_formatter_FormattingContext_0($this, $elementRenderer, $minimumWidth, $shrinkedWidth, $style)) === true) {
			if($elementRenderer->isFloat() === true || $style->getKeyword(_hx_deref((cocktail_core_layout_formatter_FormattingContext_1($this, $elementRenderer, $minimumWidth, $shrinkedWidth, $style)))->typedValue) == cocktail_core_css_CSSKeywordValue::$INLINE_BLOCK) {
				$shrinkedWidth = $minimumWidth;
			} else {
				if($elementRenderer->isPositioned() === true && $elementRenderer->isRelativePositioned() === false) {
					if($style->isAuto(cocktail_core_layout_formatter_FormattingContext_2($this, $elementRenderer, $minimumWidth, $shrinkedWidth, $style)) === true || $style->isAuto(cocktail_core_layout_formatter_FormattingContext_3($this, $elementRenderer, $minimumWidth, $shrinkedWidth, $style)) === true) {
						$shrinkedWidth = $minimumWidth;
					}
				} else {
					$containingBlock = $elementRenderer->containingBlock;
					if($containingBlock->isPositioned() && $containingBlock->isRelativePositioned() === false) {
						if($style->isAuto(cocktail_core_layout_formatter_FormattingContext_4($this, $containingBlock, $elementRenderer, $minimumWidth, $shrinkedWidth, $style))) {
							$shrinkedWidth = $minimumWidth;
						}
					}
				}
			}
		} else {
			$shrinkedWidth = $style->usedValues->width;
		}
		$style->usedValues->width = $shrinkedWidth;
		$elementRenderer->get_bounds()->width = $shrinkedWidth;
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
function cocktail_core_layout_formatter_FormattingContext_0(&$»this, &$elementRenderer, &$minimumWidth, &$shrinkedWidth, &$style) {
	$»spos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("width", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_formatter_FormattingContext_5($»this, $elementRenderer, $minimumWidth, $shrinkedWidth, $style, $transition)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_formatter_FormattingContext_1(&$»this, &$elementRenderer, &$minimumWidth, &$shrinkedWidth, &$style) {
	$»spos = $GLOBALS['%s']->length;
	{
		$_this = $style->computedValues;
		$typedProperty = null;
		$length = $_this->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($_this->_properties, $i)->name === "display") {
					$typedProperty = $_this->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}
function cocktail_core_layout_formatter_FormattingContext_2(&$»this, &$elementRenderer, &$minimumWidth, &$shrinkedWidth, &$style) {
	$»spos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("left", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_formatter_FormattingContext_6($»this, $elementRenderer, $minimumWidth, $shrinkedWidth, $style, $transition)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_formatter_FormattingContext_3(&$»this, &$elementRenderer, &$minimumWidth, &$shrinkedWidth, &$style) {
	$»spos = $GLOBALS['%s']->length;
	{
		$transition = $style->_transitionManager->getTransition("right", $style);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_formatter_FormattingContext_7($»this, $elementRenderer, $minimumWidth, $shrinkedWidth, $style, $transition)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_formatter_FormattingContext_4(&$»this, &$containingBlock, &$elementRenderer, &$minimumWidth, &$shrinkedWidth, &$style) {
	$»spos = $GLOBALS['%s']->length;
	{
		$_this = $containingBlock->coreStyle;
		{
			$transition = $_this->_transitionManager->getTransition("width", $_this);
			if($transition !== null) {
				return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
			} else {
				return _hx_deref((cocktail_core_layout_formatter_FormattingContext_8($»this, $_this, $containingBlock, $elementRenderer, $minimumWidth, $shrinkedWidth, $style, $transition)))->typedValue;
			}
			unset($transition);
		}
		unset($_this);
	}
}
function cocktail_core_layout_formatter_FormattingContext_5(&$»this, &$elementRenderer, &$minimumWidth, &$shrinkedWidth, &$style, &$transition) {
	$»spos = $GLOBALS['%s']->length;
	{
		$_this = $style->computedValues;
		$typedProperty = null;
		$length = $_this->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($_this->_properties, $i)->name === "width") {
					$typedProperty = $_this->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}
function cocktail_core_layout_formatter_FormattingContext_6(&$»this, &$elementRenderer, &$minimumWidth, &$shrinkedWidth, &$style, &$transition) {
	$»spos = $GLOBALS['%s']->length;
	{
		$_this = $style->computedValues;
		$typedProperty = null;
		$length = $_this->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($_this->_properties, $i)->name === "left") {
					$typedProperty = $_this->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}
function cocktail_core_layout_formatter_FormattingContext_7(&$»this, &$elementRenderer, &$minimumWidth, &$shrinkedWidth, &$style, &$transition) {
	$»spos = $GLOBALS['%s']->length;
	{
		$_this = $style->computedValues;
		$typedProperty = null;
		$length = $_this->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($_this->_properties, $i)->name === "right") {
					$typedProperty = $_this->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}
function cocktail_core_layout_formatter_FormattingContext_8(&$»this, &$_this, &$containingBlock, &$elementRenderer, &$minimumWidth, &$shrinkedWidth, &$style, &$transition) {
	$»spos = $GLOBALS['%s']->length;
	{
		$_this1 = $_this->computedValues;
		$typedProperty = null;
		$length = $_this1->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($_this1->_properties, $i)->name === "width") {
					$typedProperty = $_this1->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}

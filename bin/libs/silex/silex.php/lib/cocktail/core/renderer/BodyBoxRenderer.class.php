<?php

class cocktail_core_renderer_BodyBoxRenderer extends cocktail_core_renderer_BlockBoxRenderer {
	public function __construct($node) { if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.renderer.BodyBoxRenderer::new");
		$製pos = $GLOBALS['%s']->length;
		parent::__construct($node);
		$GLOBALS['%s']->pop();
	}}
	public function getBackgroundBounds() {
		$GLOBALS['%s']->push("cocktail.core.renderer.BodyBoxRenderer::getBackgroundBounds");
		$製pos = $GLOBALS['%s']->length;
		$windowData = $this->getWindowData();
		$width = $windowData->width;
		$height = $windowData->height;
		$this->get_bounds()->width = $width;
		$this->get_bounds()->height = $height;
		$this->get_bounds()->x = 0.0;
		$this->get_bounds()->y = 0.0;
		{
			$裨mp = $this->get_bounds();
			$GLOBALS['%s']->pop();
			return $裨mp;
		}
		$GLOBALS['%s']->pop();
	}
	public function layoutSelf() {
		$GLOBALS['%s']->push("cocktail.core.renderer.BodyBoxRenderer::layoutSelf");
		$製pos = $GLOBALS['%s']->length;
		parent::layoutSelf();
		if($this->coreStyle->isAuto(cocktail_core_renderer_BodyBoxRenderer_0($this)) === true && ($this->isPositioned() === false || $this->isRelativePositioned() === true)) {
			$usedValues = $this->coreStyle->usedValues;
			$usedValues->height = $this->containingBlock->getContainerBlockData()->height - $usedValues->marginTop - $usedValues->marginBottom - $usedValues->paddingTop - $usedValues->paddingBottom;
		}
		$GLOBALS['%s']->pop();
	}
	static $__properties__ = array("get_bounds" => "get_bounds","get_globalBounds" => "get_globalBounds","get_scrollableBounds" => "get_scrollableBounds","set_scrollLeft" => "set_scrollLeft","get_scrollLeft" => "get_scrollLeft","set_scrollTop" => "set_scrollTop","get_scrollTop" => "get_scrollTop","get_scrollWidth" => "get_scrollWidth","get_scrollHeight" => "get_scrollHeight");
	function __toString() { return 'cocktail.core.renderer.BodyBoxRenderer'; }
}
function cocktail_core_renderer_BodyBoxRenderer_0(&$裨his) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this = $裨his->coreStyle;
		{
			$transition = $_this->_transitionManager->getTransition("height", $_this);
			if($transition !== null) {
				return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
			} else {
				return _hx_deref((cocktail_core_renderer_BodyBoxRenderer_1($裨his, $_this, $transition)))->typedValue;
			}
			unset($transition);
		}
		unset($_this);
	}
}
function cocktail_core_renderer_BodyBoxRenderer_1(&$裨his, &$_this, &$transition) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this1 = $_this->computedValues;
		$typedProperty = null;
		$length = $_this1->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($_this1->_properties, $i)->name === "height") {
					$typedProperty = $_this1->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}

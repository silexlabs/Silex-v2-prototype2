<?php

class cocktail_core_layer_InitialLayerRenderer extends cocktail_core_layer_LayerRenderer {
	public function __construct($rootElementRenderer) { if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.layer.InitialLayerRenderer::new");
		$�spos = $GLOBALS['%s']->length;
		parent::__construct($rootElementRenderer);
		$GLOBALS['%s']->pop();
	}}
	public function establishesNewStackingContext() {
		$GLOBALS['%s']->push("cocktail.core.layer.InitialLayerRenderer::establishesNewStackingContext");
		$�spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return true;
		}
		$GLOBALS['%s']->pop();
	}
	public function establishesNewGraphicsContext() {
		$GLOBALS['%s']->push("cocktail.core.layer.InitialLayerRenderer::establishesNewGraphicsContext");
		$�spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return true;
		}
		$GLOBALS['%s']->pop();
	}
	public function attachGraphicsContext() {
		$GLOBALS['%s']->push("cocktail.core.layer.InitialLayerRenderer::attachGraphicsContext");
		$�spos = $GLOBALS['%s']->length;
		$this->graphicsContext = new cocktail_core_graphics_InitialGraphicsContext($this);
		$this->_needsBitmapSizeUpdate = true;
		$this->hasOwnGraphicsContext = true;
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'cocktail.core.layer.InitialLayerRenderer'; }
}

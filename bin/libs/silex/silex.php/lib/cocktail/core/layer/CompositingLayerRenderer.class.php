<?php

class cocktail_core_layer_CompositingLayerRenderer extends cocktail_core_layer_LayerRenderer {
	public function __construct($rootElementRenderer) { if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.layer.CompositingLayerRenderer::new");
		$»spos = $GLOBALS['%s']->length;
		parent::__construct($rootElementRenderer);
		$GLOBALS['%s']->pop();
	}}
	public function isCompositingLayer() {
		$GLOBALS['%s']->push("cocktail.core.layer.CompositingLayerRenderer::isCompositingLayer");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return true;
		}
		$GLOBALS['%s']->pop();
	}
	public function establishesNewGraphicsContext() {
		$GLOBALS['%s']->push("cocktail.core.layer.CompositingLayerRenderer::establishesNewGraphicsContext");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return true;
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'cocktail.core.layer.CompositingLayerRenderer'; }
}

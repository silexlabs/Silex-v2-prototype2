<?php

class cocktail_core_layer_PluginLayerRenderer extends cocktail_core_layer_CompositingLayerRenderer {
	public function __construct($rootElementRenderer) { if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.layer.PluginLayerRenderer::new");
		$製pos = $GLOBALS['%s']->length;
		parent::__construct($rootElementRenderer);
		$GLOBALS['%s']->pop();
	}}
	public function clear() {
		$GLOBALS['%s']->push("cocktail.core.layer.PluginLayerRenderer::clear");
		$製pos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public function initBitmapData($width, $height) {
		$GLOBALS['%s']->push("cocktail.core.layer.PluginLayerRenderer::initBitmapData");
		$製pos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public function detach() {
		$GLOBALS['%s']->push("cocktail.core.layer.PluginLayerRenderer::detach");
		$製pos = $GLOBALS['%s']->length;
		if($this->hasOwnGraphicsContext === true) {
			$htmlObjectElement = $this->rootElementRenderer->domNode;
			$htmlObjectElement->plugin->detach($this->graphicsContext);
		}
		parent::detach();
		$GLOBALS['%s']->pop();
	}
	public function attach() {
		$GLOBALS['%s']->push("cocktail.core.layer.PluginLayerRenderer::attach");
		$製pos = $GLOBALS['%s']->length;
		parent::attach();
		$htmlObjectElement = $this->rootElementRenderer->domNode;
		$htmlObjectElement->plugin->attach($this->graphicsContext);
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'cocktail.core.layer.PluginLayerRenderer'; }
}

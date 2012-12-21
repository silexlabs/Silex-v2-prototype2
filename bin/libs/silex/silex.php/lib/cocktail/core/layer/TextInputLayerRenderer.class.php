<?php

class cocktail_core_layer_TextInputLayerRenderer extends cocktail_core_layer_CompositingLayerRenderer {
	public function __construct($rootElementRenderer) { if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.layer.TextInputLayerRenderer::new");
		$製pos = $GLOBALS['%s']->length;
		parent::__construct($rootElementRenderer);
		$GLOBALS['%s']->pop();
	}}
	public function initBitmapData($width, $height) {
		$GLOBALS['%s']->push("cocktail.core.layer.TextInputLayerRenderer::initBitmapData");
		$製pos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public function detach() {
		$GLOBALS['%s']->push("cocktail.core.layer.TextInputLayerRenderer::detach");
		$製pos = $GLOBALS['%s']->length;
		if($this->hasOwnGraphicsContext === true) {
			$htmlInputElement = $this->rootElementRenderer->domNode;
			if($htmlInputElement->elementRenderer !== null) {
				$textInputRenderer = $htmlInputElement->elementRenderer;
				$textInputRenderer->nativeTextInput->detach($this->graphicsContext);
			}
		}
		parent::detach();
		$GLOBALS['%s']->pop();
	}
	public function attach() {
		$GLOBALS['%s']->push("cocktail.core.layer.TextInputLayerRenderer::attach");
		$製pos = $GLOBALS['%s']->length;
		parent::attach();
		$htmlInputElement = $this->rootElementRenderer->domNode;
		if($htmlInputElement->elementRenderer !== null) {
			$textInputRenderer = $htmlInputElement->elementRenderer;
			$textInputRenderer->nativeTextInput->attach($this->graphicsContext);
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'cocktail.core.layer.TextInputLayerRenderer'; }
}

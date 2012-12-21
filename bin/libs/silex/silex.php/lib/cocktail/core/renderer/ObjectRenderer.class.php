<?php

class cocktail_core_renderer_ObjectRenderer extends cocktail_core_renderer_EmbeddedBoxRenderer {
	public function __construct($node) { if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.renderer.ObjectRenderer::new");
		$製pos = $GLOBALS['%s']->length;
		parent::__construct($node);
		$GLOBALS['%s']->pop();
	}}
	public function renderEmbeddedAsset($graphicContext) {
		$GLOBALS['%s']->push("cocktail.core.renderer.ObjectRenderer::renderEmbeddedAsset");
		$製pos = $GLOBALS['%s']->length;
		$htmlObjectElement = $this->domNode;
		$htmlObjectElement->plugin->updateViewport($this->get_globalBounds()->x + $this->coreStyle->usedValues->paddingLeft, $this->get_globalBounds()->y + $this->coreStyle->usedValues->paddingTop, $this->get_globalBounds()->width, $this->get_globalBounds()->height);
		$GLOBALS['%s']->pop();
	}
	public function doCreateLayer() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ObjectRenderer::doCreateLayer");
		$製pos = $GLOBALS['%s']->length;
		$this->layerRenderer = new cocktail_core_layer_PluginLayerRenderer($this);
		$GLOBALS['%s']->pop();
	}
	public function createOwnLayer() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ObjectRenderer::createOwnLayer");
		$製pos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return true;
		}
		$GLOBALS['%s']->pop();
	}
	static $__properties__ = array("get_bounds" => "get_bounds","get_globalBounds" => "get_globalBounds","get_scrollableBounds" => "get_scrollableBounds","set_scrollLeft" => "set_scrollLeft","get_scrollLeft" => "get_scrollLeft","set_scrollTop" => "set_scrollTop","get_scrollTop" => "get_scrollTop","get_scrollWidth" => "get_scrollWidth","get_scrollHeight" => "get_scrollHeight");
	function __toString() { return 'cocktail.core.renderer.ObjectRenderer'; }
}

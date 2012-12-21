<?php

class cocktail_core_renderer_EmbeddedBoxRenderer extends cocktail_core_renderer_BoxRenderer {
	public function __construct($node) { if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.renderer.EmbeddedBoxRenderer::new");
		$製pos = $GLOBALS['%s']->length;
		parent::__construct($node);
		$GLOBALS['%s']->pop();
	}}
	public function getAssetBounds($availableWidth, $availableHeight, $assetWidth, $assetHeight) {
		$GLOBALS['%s']->push("cocktail.core.renderer.EmbeddedBoxRenderer::getAssetBounds");
		$製pos = $GLOBALS['%s']->length;
		$width = null;
		$height = null;
		if($availableWidth > $availableHeight) {
			$ratio = $assetHeight / $availableHeight;
			if($assetWidth / $ratio < $availableWidth) {
				$width = $assetWidth / $ratio;
				$height = $availableHeight;
			} else {
				$ratio = $assetWidth / $availableWidth;
				$width = $availableWidth;
				$height = $assetHeight / $ratio;
			}
		} else {
			$ratio = $assetWidth / $availableWidth;
			if($assetHeight / $ratio < $availableHeight) {
				$height = $assetHeight / $ratio;
				$width = $availableWidth;
			} else {
				$ratio = $assetHeight / $availableHeight;
				$width = $assetWidth / $ratio;
				$height = $availableHeight;
			}
		}
		$xOffset = ($availableWidth - $width) / 2;
		$yOffset = ($availableHeight - $height) / 2;
		$rect = new cocktail_core_geom_RectangleVO();
		$rect->x = $xOffset;
		$rect->y = $yOffset;
		$rect->width = $width;
		$rect->height = $height;
		{
			$GLOBALS['%s']->pop();
			return $rect;
		}
		$GLOBALS['%s']->pop();
	}
	public function renderEmbeddedAsset($graphicContext) {
		$GLOBALS['%s']->push("cocktail.core.renderer.EmbeddedBoxRenderer::renderEmbeddedAsset");
		$製pos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public function isReplaced() {
		$GLOBALS['%s']->push("cocktail.core.renderer.EmbeddedBoxRenderer::isReplaced");
		$製pos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return true;
		}
		$GLOBALS['%s']->pop();
	}
	public function renderSelf($graphicContext) {
		$GLOBALS['%s']->push("cocktail.core.renderer.EmbeddedBoxRenderer::renderSelf");
		$製pos = $GLOBALS['%s']->length;
		parent::renderSelf($graphicContext);
		$this->renderEmbeddedAsset($graphicContext);
		$GLOBALS['%s']->pop();
	}
	static $__properties__ = array("get_bounds" => "get_bounds","get_globalBounds" => "get_globalBounds","get_scrollableBounds" => "get_scrollableBounds","set_scrollLeft" => "set_scrollLeft","get_scrollLeft" => "get_scrollLeft","set_scrollTop" => "set_scrollTop","get_scrollTop" => "get_scrollTop","get_scrollWidth" => "get_scrollWidth","get_scrollHeight" => "get_scrollHeight");
	function __toString() { return 'cocktail.core.renderer.EmbeddedBoxRenderer'; }
}

<?php

class cocktail_core_renderer_VideoRenderer extends cocktail_core_renderer_ImageRenderer {
	public function __construct($domNode) { if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.renderer.VideoRenderer::new");
		$製pos = $GLOBALS['%s']->length;
		parent::__construct($domNode);
		$GLOBALS['%s']->pop();
	}}
	public function renderPosterFrame($htmlVideoElement, $graphicContext) {
		$GLOBALS['%s']->push("cocktail.core.renderer.VideoRenderer::renderPosterFrame");
		$製pos = $GLOBALS['%s']->length;
		$resource = cocktail_core_resource_ResourceManager::getImageResource($this->domNode->getAttribute("poster"));
		if($resource->loaded === false || $resource->loadedWithError === true) {
			$GLOBALS['%s']->pop();
			return;
		}
		$posterBounds = $this->getAssetBounds($this->coreStyle->usedValues->width, $this->coreStyle->usedValues->height, $resource->intrinsicWidth, $resource->intrinsicHeight);
		$x = $this->get_globalBounds()->x + $this->coreStyle->usedValues->paddingLeft + $posterBounds->x - $this->scrollOffset->x;
		$y = $this->get_globalBounds()->y + $this->coreStyle->usedValues->paddingTop + $posterBounds->y - $this->scrollOffset->y;
		$width = $posterBounds->width;
		$height = $posterBounds->height;
		$paintBounds = new cocktail_core_geom_RectangleVO();
		$paintBounds->x = $x;
		$paintBounds->y = $y;
		$paintBounds->width = $width;
		$paintBounds->height = $height;
		$this->paintResource($graphicContext, $resource->nativeResource, $paintBounds, $resource->intrinsicWidth, $resource->intrinsicHeight);
		$GLOBALS['%s']->pop();
	}
	public function renderVideo($htmlVideoElement, $graphicContext) {
		$GLOBALS['%s']->push("cocktail.core.renderer.VideoRenderer::renderVideo");
		$製pos = $GLOBALS['%s']->length;
		$videoBounds = $this->getAssetBounds($this->coreStyle->usedValues->width, $this->coreStyle->usedValues->height, $htmlVideoElement->get_videoWidth(), $htmlVideoElement->get_videoHeight());
		$globalBounds = $this->get_globalBounds();
		$nativeVideo = $htmlVideoElement->nativeMedia;
		$videoViewport = $nativeVideo->get_viewport();
		$videoViewport->x = $globalBounds->x + $this->coreStyle->usedValues->paddingLeft + $videoBounds->x - $this->scrollOffset->x;
		$videoViewport->y = $globalBounds->y + $this->coreStyle->usedValues->paddingTop + $videoBounds->y - $this->scrollOffset->y;
		$videoViewport->width = $videoBounds->width;
		$videoViewport->height = $videoBounds->height;
		$nativeVideo->set_viewport($videoViewport);
		$nativeVideo->attach($graphicContext);
		$GLOBALS['%s']->pop();
	}
	public function renderEmbeddedAsset($graphicContext) {
		$GLOBALS['%s']->push("cocktail.core.renderer.VideoRenderer::renderEmbeddedAsset");
		$製pos = $GLOBALS['%s']->length;
		$htmlVideoElement = $this->domNode;
		if($htmlVideoElement->shouldRenderPosterFrame() === true) {
			$this->renderPosterFrame($htmlVideoElement, $graphicContext);
		} else {
			$this->renderVideo($htmlVideoElement, $graphicContext);
		}
		$GLOBALS['%s']->pop();
	}
	public function doCreateLayer() {
		$GLOBALS['%s']->push("cocktail.core.renderer.VideoRenderer::doCreateLayer");
		$製pos = $GLOBALS['%s']->length;
		$this->layerRenderer = new cocktail_core_layer_CompositingLayerRenderer($this);
		$GLOBALS['%s']->pop();
	}
	public function createOwnLayer() {
		$GLOBALS['%s']->push("cocktail.core.renderer.VideoRenderer::createOwnLayer");
		$製pos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return true;
		}
		$GLOBALS['%s']->pop();
	}
	static $__properties__ = array("get_bounds" => "get_bounds","get_globalBounds" => "get_globalBounds","get_scrollableBounds" => "get_scrollableBounds","set_scrollLeft" => "set_scrollLeft","get_scrollLeft" => "get_scrollLeft","set_scrollTop" => "set_scrollTop","get_scrollTop" => "get_scrollTop","get_scrollWidth" => "get_scrollWidth","get_scrollHeight" => "get_scrollHeight");
	function __toString() { return 'cocktail.core.renderer.VideoRenderer'; }
}

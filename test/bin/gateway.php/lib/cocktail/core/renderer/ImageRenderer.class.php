<?php

class cocktail_core_renderer_ImageRenderer extends cocktail_core_renderer_EmbeddedBoxRenderer {
	public function __construct($domNode) {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.renderer.ImageRenderer::new");
		$»spos = $GLOBALS['%s']->length;
		parent::__construct($domNode);
		$this->_paintBounds = new cocktail_core_geom_RectangleVO(0.0, 0.0, 0.0, 0.0);
		$this->_destinationPoint = new cocktail_core_geom_PointVO(0.0, 0.0);
		$GLOBALS['%s']->pop();
	}}
	public function paintResource($graphicContext, $nativeBitmapData, $bounds, $intrinsicWidth, $intrinsicHeight) {
		$GLOBALS['%s']->push("cocktail.core.renderer.ImageRenderer::paintResource");
		$»spos = $GLOBALS['%s']->length;
		if($intrinsicWidth !== $bounds->width || $intrinsicHeight !== $bounds->height) {
			$matrix = new cocktail_core_geom_Matrix(null);
			$matrix->translate($bounds->x, $bounds->y);
			$matrix->scale($bounds->width / $intrinsicWidth, $bounds->height / $intrinsicHeight);
			$graphicContext->drawImage($nativeBitmapData, $matrix, $bounds);
		} else {
			$width = $intrinsicWidth;
			$height = $intrinsicHeight;
			$this->_destinationPoint->x = $bounds->x;
			$this->_destinationPoint->y = $bounds->y;
			$bounds->width = $width;
			$bounds->height = $height;
			$bounds->x = 0.0;
			$bounds->y = 0.0;
			$graphicContext->copyPixels($nativeBitmapData, $bounds, $this->_destinationPoint);
		}
		$GLOBALS['%s']->pop();
	}
	public function renderEmbeddedAsset($graphicContext) {
		$GLOBALS['%s']->push("cocktail.core.renderer.ImageRenderer::renderEmbeddedAsset");
		$»spos = $GLOBALS['%s']->length;
		$resource = cocktail_core_resource_ResourceManager::getImageResource($this->domNode->getAttribute("src"));
		if($resource->loaded === false || $resource->loadedWithError === true) {
			$GLOBALS['%s']->pop();
			return;
		}
		$usedValues = $this->coreStyle->usedValues;
		$this->_paintBounds->x = $this->get_globalBounds()->x + $usedValues->paddingLeft - $this->scrollOffset->x;
		$this->_paintBounds->y = $this->get_globalBounds()->y + $usedValues->paddingTop - $this->scrollOffset->y;
		$this->_paintBounds->width = $usedValues->width;
		$this->_paintBounds->height = $usedValues->height;
		$this->paintResource($graphicContext, $resource->nativeResource, $this->_paintBounds, $resource->intrinsicWidth, $resource->intrinsicHeight);
		$GLOBALS['%s']->pop();
	}
	public $_destinationPoint;
	public $_paintBounds;
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
	static $__properties__ = array("set_bounds" => "set_bounds","get_bounds" => "get_bounds","get_globalBounds" => "get_globalBounds","get_scrollableBounds" => "get_scrollableBounds","set_scrollLeft" => "set_scrollLeft","get_scrollLeft" => "get_scrollLeft","set_scrollTop" => "set_scrollTop","get_scrollTop" => "get_scrollTop","get_scrollWidth" => "get_scrollWidth","get_scrollHeight" => "get_scrollHeight","get_firstChild" => "get_firstChild","get_lastChild" => "get_lastChild","get_nextSibling" => "get_nextSibling","get_previousSibling" => "get_previousSibling","set_onclick" => "set_onClick","set_ondblclick" => "set_onDblClick","set_onmousedown" => "set_onMouseDown","set_onmouseup" => "set_onMouseUp","set_onmouseover" => "set_onMouseOver","set_onmouseout" => "set_onMouseOut","set_onmousemove" => "set_onMouseMove","set_onmousewheel" => "set_onMouseWheel","set_onkeydown" => "set_onKeyDown","set_onkeyup" => "set_onKeyUp","set_onfocus" => "set_onFocus","set_onblur" => "set_onBlur","set_onresize" => "set_onResize","set_onfullscreenchange" => "set_onFullScreenChange","set_onscroll" => "set_onScroll","set_onload" => "set_onLoad","set_onerror" => "set_onError","set_onloadstart" => "set_onLoadStart","set_onprogress" => "set_onProgress","set_onsuspend" => "set_onSuspend","set_onemptied" => "set_onEmptied","set_onstalled" => "set_onStalled","set_onloadedmetadata" => "set_onLoadedMetadata","set_onloadeddata" => "set_onLoadedData","set_oncanplay" => "set_onCanPlay","set_oncanplaythrough" => "set_onCanPlayThrough","set_onplaying" => "set_onPlaying","set_onwaiting" => "set_onWaiting","set_onseeking" => "set_onSeeking","set_onseeked" => "set_onSeeked","set_onended" => "set_onEnded","set_ondurationchange" => "set_onDurationChanged","set_ontimeupdate" => "set_onTimeUpdate","set_onplay" => "set_onPlay","set_onpause" => "set_onPause","set_onvolumechange" => "set_onVolumeChange","set_ontransitionend" => "set_onTransitionEnd");
	function __toString() { return 'cocktail.core.renderer.ImageRenderer'; }
}

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
		{
			$裨mp = new cocktail_core_geom_RectangleVO($xOffset, $yOffset, $width, $height);
			$GLOBALS['%s']->pop();
			return $裨mp;
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
	static $__properties__ = array("set_bounds" => "set_bounds","get_bounds" => "get_bounds","get_globalBounds" => "get_globalBounds","get_scrollableBounds" => "get_scrollableBounds","set_scrollLeft" => "set_scrollLeft","get_scrollLeft" => "get_scrollLeft","set_scrollTop" => "set_scrollTop","get_scrollTop" => "get_scrollTop","get_scrollWidth" => "get_scrollWidth","get_scrollHeight" => "get_scrollHeight","get_firstChild" => "get_firstChild","get_lastChild" => "get_lastChild","get_nextSibling" => "get_nextSibling","get_previousSibling" => "get_previousSibling","set_onclick" => "set_onClick","set_ondblclick" => "set_onDblClick","set_onmousedown" => "set_onMouseDown","set_onmouseup" => "set_onMouseUp","set_onmouseover" => "set_onMouseOver","set_onmouseout" => "set_onMouseOut","set_onmousemove" => "set_onMouseMove","set_onmousewheel" => "set_onMouseWheel","set_onkeydown" => "set_onKeyDown","set_onkeyup" => "set_onKeyUp","set_onfocus" => "set_onFocus","set_onblur" => "set_onBlur","set_onresize" => "set_onResize","set_onfullscreenchange" => "set_onFullScreenChange","set_onscroll" => "set_onScroll","set_onload" => "set_onLoad","set_onerror" => "set_onError","set_onloadstart" => "set_onLoadStart","set_onprogress" => "set_onProgress","set_onsuspend" => "set_onSuspend","set_onemptied" => "set_onEmptied","set_onstalled" => "set_onStalled","set_onloadedmetadata" => "set_onLoadedMetadata","set_onloadeddata" => "set_onLoadedData","set_oncanplay" => "set_onCanPlay","set_oncanplaythrough" => "set_onCanPlayThrough","set_onplaying" => "set_onPlaying","set_onwaiting" => "set_onWaiting","set_onseeking" => "set_onSeeking","set_onseeked" => "set_onSeeked","set_onended" => "set_onEnded","set_ondurationchange" => "set_onDurationChanged","set_ontimeupdate" => "set_onTimeUpdate","set_onplay" => "set_onPlay","set_onpause" => "set_onPause","set_onvolumechange" => "set_onVolumeChange","set_ontransitionend" => "set_onTransitionEnd");
	function __toString() { return 'cocktail.core.renderer.EmbeddedBoxRenderer'; }
}

<?php

class cocktail_core_linebox_SpaceLineBox extends cocktail_core_linebox_TextLineBox {
	public function __construct($elementRenderer, $fontMetrics, $fontManager) { if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.linebox.SpaceLineBox::new");
		$製pos = $GLOBALS['%s']->length;
		parent::__construct($elementRenderer,"",$fontMetrics,null);
		$GLOBALS['%s']->pop();
	}}
	public function getTextWidth() {
		$GLOBALS['%s']->push("cocktail.core.linebox.SpaceLineBox::getTextWidth");
		$製pos = $GLOBALS['%s']->length;
		$letterSpacing = $this->elementRenderer->coreStyle->usedValues->letterSpacing;
		$wordSpacing = $this->elementRenderer->coreStyle->getAbsoluteLength($this->elementRenderer->coreStyle->get_wordSpacing());
		{
			$裨mp = $this->_fontMetrics->spaceWidth + $letterSpacing + $wordSpacing;
			$GLOBALS['%s']->pop();
			return $裨mp;
		}
		$GLOBALS['%s']->pop();
	}
	public function isSpace() {
		$GLOBALS['%s']->push("cocktail.core.linebox.SpaceLineBox::isSpace");
		$製pos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return true;
		}
		$GLOBALS['%s']->pop();
	}
	public function render($graphicContext) {
		$GLOBALS['%s']->push("cocktail.core.linebox.SpaceLineBox::render");
		$製pos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public function initTextBitmap() {
		$GLOBALS['%s']->push("cocktail.core.linebox.SpaceLineBox::initTextBitmap");
		$製pos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public function initNativeTextElement($text, $fontManager, $style) {
		$GLOBALS['%s']->push("cocktail.core.linebox.SpaceLineBox::initNativeTextElement");
		$製pos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	static $__properties__ = array("get_bounds" => "get_bounds","get_firstChild" => "get_firstChild","get_lastChild" => "get_lastChild","get_nextSibling" => "get_nextSibling","get_previousSibling" => "get_previousSibling","set_onclick" => "set_onClick","set_ondblclick" => "set_onDblClick","set_onmousedown" => "set_onMouseDown","set_onmouseup" => "set_onMouseUp","set_onmouseover" => "set_onMouseOver","set_onmouseout" => "set_onMouseOut","set_onmousemove" => "set_onMouseMove","set_onmousewheel" => "set_onMouseWheel","set_onkeydown" => "set_onKeyDown","set_onkeyup" => "set_onKeyUp","set_onfocus" => "set_onFocus","set_onblur" => "set_onBlur","set_onresize" => "set_onResize","set_onfullscreenchange" => "set_onFullScreenChange","set_onscroll" => "set_onScroll","set_onload" => "set_onLoad","set_onerror" => "set_onError","set_onloadstart" => "set_onLoadStart","set_onprogress" => "set_onProgress","set_onsuspend" => "set_onSuspend","set_onemptied" => "set_onEmptied","set_onstalled" => "set_onStalled","set_onloadedmetadata" => "set_onLoadedMetadata","set_onloadeddata" => "set_onLoadedData","set_oncanplay" => "set_onCanPlay","set_oncanplaythrough" => "set_onCanPlayThrough","set_onplaying" => "set_onPlaying","set_onwaiting" => "set_onWaiting","set_onseeking" => "set_onSeeking","set_onseeked" => "set_onSeeked","set_onended" => "set_onEnded","set_ondurationchange" => "set_onDurationChanged","set_ontimeupdate" => "set_onTimeUpdate","set_onplay" => "set_onPlay","set_onpause" => "set_onPause","set_onvolumechange" => "set_onVolumeChange","set_ontransitionend" => "set_onTransitionEnd");
	function __toString() { return 'cocktail.core.linebox.SpaceLineBox'; }
}

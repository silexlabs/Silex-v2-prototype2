<?php

class cocktail_core_html_HTMLDocument extends cocktail_core_dom_Document {
	public function __construct($window = null) {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLDocument::new");
		$»spos = $GLOBALS['%s']->length;
		parent::__construct();
		$this->timer = new cocktail_core_timer_Timer();
		$this->initStyleManager();
		$this->invalidationManager = new cocktail_core_invalidation_InvalidationManager($this);
		$this->cascadeManager = new cocktail_core_css_CascadeManager();
		if($window === null) {
			$window = new cocktail_core_window_Window();
		}
		$this->_matchedPseudoClasses = new cocktail_core_css_MatchedPseudoClassesVO(false, false, false, false, false, false, false);
		$this->window = $window;
		$this->_focusManager = new cocktail_core_focus_FocusManager();
		$this->_hitTestManager = new cocktail_core_hittest_HitTestManager();
		$this->_multiTouchManager = new cocktail_core_multitouch_MultiTouchManager();
		$this->documentElement = $this->createElement("HTML");
		$this->initBody($this->createElement("BODY"));
		$this->_shouldDispatchClickOnNextMouseUp = false;
		$this->layoutManager = new cocktail_core_layout_LayoutManager();
		$GLOBALS['%s']->pop();
	}}
	public function get_activeElement() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLDocument::get_activeElement");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->_focusManager->activeElement;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_activeElement($newActiveElement) {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLDocument::set_activeElement");
		$»spos = $GLOBALS['%s']->length;
		$this->_focusManager->setActiveElement($newActiveElement, $this->body);
		{
			$»tmp = $this->get_activeElement();
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getFirstVerticallyScrollableHTMLElement($htmlElement, $scrollOffset) {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLDocument::getFirstVerticallyScrollableHTMLElement");
		$»spos = $GLOBALS['%s']->length;
		while($htmlElement->isVerticallyScrollable($scrollOffset) === false) {
			$htmlElement = $htmlElement->parentNode;
			if($htmlElement === null) {
				$GLOBALS['%s']->pop();
				return null;
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $htmlElement;
		}
		$GLOBALS['%s']->pop();
	}
	public function getFirstElementRendererWhichCanDispatchMouseEvent($x, $y) {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLDocument::getFirstElementRendererWhichCanDispatchMouseEvent");
		$»spos = $GLOBALS['%s']->length;
		$elementRendererAtPoint = $this->_hitTestManager->getTopMostElementRendererAtPoint($this->documentElement->elementRenderer->layerRenderer, $x, $y, 0, 0);
		if($elementRendererAtPoint === null) {
			$»tmp = $this->body->elementRenderer;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		while($elementRendererAtPoint->domNode->get_nodeType() !== 1 || $elementRendererAtPoint->isAnonymousBlockBox() === true) {
			$elementRendererAtPoint = $elementRendererAtPoint->parentNode;
			if($elementRendererAtPoint === null) {
				$GLOBALS['%s']->pop();
				return null;
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $elementRendererAtPoint;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_fullscreenElement($value) {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLDocument::set_fullscreenElement");
		$»spos = $GLOBALS['%s']->length;
		if($value === null) {
			$this->fullscreenElement = null;
			{
				$GLOBALS['%s']->pop();
				return $value;
			}
		}
		if($this->fullscreenElement !== null) {
			$»tmp = $this->fullscreenElement;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$this->fullscreenElement = $value;
		if($this->onEnterFullscreen !== null) {
			$this->onEnterFullscreen();
		}
		$fullscreenEvent = new cocktail_core_event_Event();
		$fullscreenEvent->initEvent("fullscreenchange", true, false);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_fullscreenEnabled() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLDocument::get_fullscreenEnabled");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->window->platform->nativeWindow->fullScreenEnabled();
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function exitFullscreen() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLDocument::exitFullscreen");
		$»spos = $GLOBALS['%s']->length;
		if($this->fullscreenElement === null) {
			$GLOBALS['%s']->pop();
			return;
		}
		$this->set_fullscreenElement(null);
		if($this->onExitFullscreen !== null) {
			$this->onExitFullscreen();
		}
		$fullscreenEvent = new cocktail_core_event_Event();
		$fullscreenEvent->initEvent("fullscreenchange", true, false);
		$GLOBALS['%s']->pop();
	}
	public function setMouseCursor($cursor) {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLDocument::setMouseCursor");
		$»spos = $GLOBALS['%s']->length;
		if($this->onSetMouseCursor !== null) {
			$this->onSetMouseCursor($cursor);
		}
		$GLOBALS['%s']->pop();
	}
	public function dispatchClickEvent($mouseEvent) {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLDocument::dispatchClickEvent");
		$»spos = $GLOBALS['%s']->length;
		$elementRendererAtPoint = $this->getFirstElementRendererWhichCanDispatchMouseEvent($mouseEvent->screenX, $mouseEvent->screenY);
		$htmlElement = $elementRendererAtPoint->domNode;
		$nearestActivatableElement = $htmlElement->getNearestActivatableElement();
		if($nearestActivatableElement !== null) {
			$nearestActivatableElement->runPreClickActivation();
		}
		$clickEvent = new cocktail_core_event_MouseEvent();
		$clickEvent->initMouseEvent("click", true, true, null, 0.0, $mouseEvent->screenX, $mouseEvent->screenY, $mouseEvent->clientX, $mouseEvent->clientY, $mouseEvent->ctrlKey, $mouseEvent->altKey, $mouseEvent->shiftKey, $mouseEvent->metaKey, $mouseEvent->button, null);
		$htmlElement->dispatchEvent($clickEvent);
		if($nearestActivatableElement !== null) {
			if($clickEvent->defaultPrevented === true) {
				$nearestActivatableElement->runCanceledActivationStep();
			} else {
				$nearestActivatableElement->runPostClickActivationStep($clickEvent);
			}
		}
		$GLOBALS['%s']->pop();
	}
	public function onPlatformTouchEvent($touchEvent) {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLDocument::onPlatformTouchEvent");
		$»spos = $GLOBALS['%s']->length;
		$touch = $touchEvent->touches->item(0);
		$elementAtTouchPoint = $this->getFirstElementRendererWhichCanDispatchMouseEvent($touch->screenX, $touch->screenY);
		$this->_multiTouchManager->setUpTouchEvent($touchEvent, $elementAtTouchPoint->domNode);
		$elementAtTouchPoint->domNode->dispatchEvent($touchEvent);
		switch($touchEvent->type) {
		case "touchstart":case "touchmove":{
			if($touchEvent->defaultPrevented === true) {
				$this->_shouldDispatchClickOnNextMouseUp = false;
			}
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	public function onPlatformKeyUpEvent($keyboardEvent) {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLDocument::onPlatformKeyUpEvent");
		$»spos = $GLOBALS['%s']->length;
		$this->get_activeElement()->dispatchEvent($keyboardEvent);
		$GLOBALS['%s']->pop();
	}
	public function onPlatformKeyDownEvent($keyboardEvent) {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLDocument::onPlatformKeyDownEvent");
		$»spos = $GLOBALS['%s']->length;
		$this->get_activeElement()->dispatchEvent($keyboardEvent);
		switch(Std::parseInt($keyboardEvent->keyChar)) {
		case 9:{
			if($keyboardEvent->defaultPrevented === false) {
				$this->set_activeElement($this->_focusManager->getNextFocusedElement($keyboardEvent->shiftKey === true, $this->body, $this->get_activeElement()));
			}
		}break;
		case 13:case 32:{
			if($keyboardEvent->defaultPrevented === false) {
				$this->get_activeElement()->click();
			}
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	public function onPlatformMouseMoveEvent($mouseEvent) {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLDocument::onPlatformMouseMoveEvent");
		$»spos = $GLOBALS['%s']->length;
		if($this->documentElement->elementRenderer === null) {
			$GLOBALS['%s']->pop();
			return;
		}
		if($this->_hoveredElementRenderer === null) {
			$this->_hoveredElementRenderer = $this->body->elementRenderer;
		}
		$elementRendererAtPoint = $this->getFirstElementRendererWhichCanDispatchMouseEvent($mouseEvent->screenX, $mouseEvent->screenY);
		if($this->_hoveredElementRenderer !== $elementRendererAtPoint) {
			$mouseOutEvent = new cocktail_core_event_MouseEvent();
			$mouseOutEvent->initMouseEvent("mouseout", true, true, null, 0.0, $mouseEvent->screenX, $mouseEvent->screenY, $mouseEvent->clientX, $mouseEvent->clientY, $mouseEvent->ctrlKey, $mouseEvent->altKey, $mouseEvent->shiftKey, $mouseEvent->metaKey, $mouseEvent->button, $elementRendererAtPoint->domNode);
			$this->_hoveredElementRenderer->domNode->dispatchEvent($mouseOutEvent);
			$oldHoveredElementRenderer = $this->_hoveredElementRenderer;
			$oldHoveredElementRenderer->domNode->invalidateStyleDeclaration(false);
			$this->_hoveredElementRenderer = $elementRendererAtPoint;
			$mouseOverEvent = new cocktail_core_event_MouseEvent();
			$mouseOverEvent->initMouseEvent("mouseover", true, true, null, 0.0, $mouseEvent->screenX, $mouseEvent->screenY, $mouseEvent->clientX, $mouseEvent->clientY, $mouseEvent->ctrlKey, $mouseEvent->shiftKey, $mouseEvent->altKey, $mouseEvent->metaKey, $mouseEvent->button, $oldHoveredElementRenderer->domNode);
			$elementRendererAtPoint->domNode->dispatchEvent($mouseOverEvent);
			$elementRendererAtPoint->domNode->invalidateStyleDeclaration(false);
			$this->_shouldDispatchClickOnNextMouseUp = false;
			$this->setMouseCursor(_hx_deref((cocktail_core_html_HTMLDocument_0($this, $elementRendererAtPoint, $mouseEvent, $mouseOutEvent, $mouseOverEvent, $oldHoveredElementRenderer)))->typedValue);
		}
		$elementRendererAtPoint->domNode->dispatchEvent($mouseEvent);
		$GLOBALS['%s']->pop();
	}
	public function onPlatformMouseWheelEvent($wheelEvent) {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLDocument::onPlatformMouseWheelEvent");
		$»spos = $GLOBALS['%s']->length;
		$elementRendererAtPoint = $this->getFirstElementRendererWhichCanDispatchMouseEvent($wheelEvent->screenX, $wheelEvent->screenY);
		$elementRendererAtPoint->domNode->dispatchEvent($wheelEvent);
		if($wheelEvent->defaultPrevented === false) {
			$htmlElement = $elementRendererAtPoint->domNode;
			$scrollOffset = Math::round($wheelEvent->deltaY * 10);
			$scrollableHTMLElement = $this->getFirstVerticallyScrollableHTMLElement($htmlElement, $scrollOffset);
			if($scrollableHTMLElement !== null) {
				$_g = $scrollableHTMLElement;
				$_g->set_scrollTop($_g->get_scrollTop() - $scrollOffset);
			}
		}
		$GLOBALS['%s']->pop();
	}
	public function onPlatformMouseEvent($mouseEvent) {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLDocument::onPlatformMouseEvent");
		$»spos = $GLOBALS['%s']->length;
		$eventType = $mouseEvent->type;
		$elementRendererAtPoint = $this->getFirstElementRendererWhichCanDispatchMouseEvent($mouseEvent->screenX, $mouseEvent->screenY);
		$elementRendererAtPoint->domNode->dispatchEvent($mouseEvent);
		switch($eventType) {
		case "mousedown":{
			$this->_shouldDispatchClickOnNextMouseUp = true;
			$this->_mousedDownedElementRenderer = $elementRendererAtPoint;
			$elementRendererAtPoint->domNode->invalidateStyleDeclaration(false);
		}break;
		case "mouseup":{
			if($this->_shouldDispatchClickOnNextMouseUp === true) {
				$this->dispatchClickEvent($mouseEvent);
			}
			if($this->_mousedDownedElementRenderer !== null) {
				$this->_mousedDownedElementRenderer = null;
				$elementRendererAtPoint->domNode->invalidateStyleDeclaration(false);
			}
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_innerHTML() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLDocument::get_innerHTML");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = cocktail_core_parser_DOMParser::serialize($this->documentElement);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_innerHTML($value) {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLDocument::set_innerHTML");
		$»spos = $GLOBALS['%s']->length;
		$node = cocktail_core_parser_DOMParser::parse($value, $this);
		$this->documentElement = $node;
		$this->initBody(_hx_array_get($this->documentElement->getElementsByTagName("BODY"), 0));
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function getMatchedPseudoClassesVO($node) {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLDocument::getMatchedPseudoClassesVO");
		$»spos = $GLOBALS['%s']->length;
		$hover = false;
		$focus = false;
		$active = false;
		$link = false;
		$enabled = false;
		$disabled = false;
		$checked = false;
		if($this->_hoveredElementRenderer !== null) {
			$hover = $this->_hoveredElementRenderer->domNode === $node;
		}
		if($this->get_activeElement() !== null) {
			$focus = $this->get_activeElement() === $node;
		}
		if($this->_mousedDownedElementRenderer !== null) {
			$active = $this->_mousedDownedElementRenderer->domNode === $node;
		}
		if($node->tagName === "A" && $node->getAttribute("href") !== null) {
			$link = true;
		}
		if($node->tagName === "INPUT") {
			if($node->getAttribute("disabled") === null) {
				$enabled = true;
				$disabled = false;
			} else {
				$disabled = true;
				$enabled = false;
			}
			if($node->getAttribute("checked") !== null) {
				$checked = true;
			}
		}
		$this->_matchedPseudoClasses->hover = $hover;
		$this->_matchedPseudoClasses->focus = $focus;
		$this->_matchedPseudoClasses->active = $active;
		$this->_matchedPseudoClasses->link = $link;
		$this->_matchedPseudoClasses->enabled = $enabled;
		$this->_matchedPseudoClasses->disabled = $disabled;
		$this->_matchedPseudoClasses->checked = $checked;
		{
			$»tmp = $this->_matchedPseudoClasses;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getStyleDeclaration($node) {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLDocument::getStyleDeclaration");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->_styleManager->getStyleDeclaration($node, $this->getMatchedPseudoClassesVO($node));
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function removeStyleSheet($stylesheet) {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLDocument::removeStyleSheet");
		$»spos = $GLOBALS['%s']->length;
		$this->_styleManager->removeStyleSheet($stylesheet);
		$this->documentElement->invalidateStyleDeclaration(true);
		$this->documentElement->cascade($this->cascadeManager, false);
		$GLOBALS['%s']->pop();
	}
	public function addStyleSheet($stylesheet) {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLDocument::addStyleSheet");
		$»spos = $GLOBALS['%s']->length;
		$this->_styleManager->addStyleSheet($stylesheet);
		$this->documentElement->invalidateStyleDeclaration(true);
		$this->documentElement->cascade($this->cascadeManager, false);
		$GLOBALS['%s']->pop();
	}
	public function createElement($tagName) {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLDocument::createElement");
		$»spos = $GLOBALS['%s']->length;
		$element = null;
		$tagName = strtoupper($tagName);
		switch($tagName) {
		case "IMG":{
			$element = new cocktail_core_html_HTMLImageElement();
		}break;
		case "INPUT":{
			$element = new cocktail_core_html_HTMLInputElement();
		}break;
		case "A":{
			$element = new cocktail_core_html_HTMLAnchorElement();
		}break;
		case "HTML":{
			$element = new cocktail_core_html_HTMLHtmlElement();
		}break;
		case "BODY":{
			$element = new cocktail_core_html_HTMLBodyElement();
		}break;
		case "VIDEO":{
			$element = new cocktail_core_html_HTMLVideoElement();
		}break;
		case "AUDIO":{
			$element = new cocktail_core_html_HTMLAudioElement();
		}break;
		case "SOURCE":{
			$element = new cocktail_core_html_HTMLSourceElement();
		}break;
		case "OBJECT":{
			$element = new cocktail_core_html_HTMLObjectElement();
		}break;
		case "PARAM":{
			$element = new cocktail_core_html_HTMLParamElement();
		}break;
		case "LINK":{
			$element = new cocktail_core_html_HTMLLinkElement();
		}break;
		case "STYLE":{
			$element = new cocktail_core_html_HTMLStyleElement();
		}break;
		case "BR":{
			$element = new cocktail_core_html_HTMLBRElement();
		}break;
		default:{
			$element = new cocktail_core_html_HTMLElement($tagName);
		}break;
		}
		$element->set_ownerDocument($this);
		{
			$GLOBALS['%s']->pop();
			return $element;
		}
		$GLOBALS['%s']->pop();
	}
	public function initStyleManager() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLDocument::initStyleManager");
		$»spos = $GLOBALS['%s']->length;
		$this->initialStyleDeclaration = new cocktail_core_css_InitialStyleDeclaration();
		$this->_styleManager = new cocktail_core_css_StyleManager();
		$this->_styleManager->addStyleSheet(new cocktail_core_css_DefaultCSSStyleSheet());
		$GLOBALS['%s']->pop();
	}
	public function initBody($htmlBodyElement) {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLDocument::initBody");
		$»spos = $GLOBALS['%s']->length;
		if($htmlBodyElement !== null) {
			$this->body = $htmlBodyElement;
			$this->documentElement->appendChild($this->body);
			$this->_hoveredElementRenderer = $this->body->elementRenderer;
			$this->set_activeElement($this->body);
		}
		$GLOBALS['%s']->pop();
	}
	public $innerHTML;
	public $cascadeManager;
	public $_matchedPseudoClasses;
	public $invalidationManager;
	public $layoutManager;
	public $initialStyleDeclaration;
	public $_styleManager;
	public $window;
	public $_hitTestManager;
	public $_multiTouchManager;
	public $timer;
	public $_shouldDispatchClickOnNextMouseUp;
	public $onSetMouseCursor;
	public $onExitFullscreen;
	public $onEnterFullscreen;
	public $fullscreenElement;
	public $fullscreenEnabled;
	public $_mousedDownedElementRenderer;
	public $_hoveredElementRenderer;
	public $_focusManager;
	public $activeElement;
	public $body;
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
	static $TAB_KEY_CODE = 9;
	static $ENTER_KEY_CODE = 13;
	static $SPACE_KEY_CODE = 32;
	static $MOUSE_WHEEL_DELTA_MULTIPLIER = 10;
	static $__properties__ = array("set_activeElement" => "set_activeElement","get_activeElement" => "get_activeElement","get_fullscreenEnabled" => "get_fullscreenEnabled","set_fullscreenElement" => "set_fullscreenElement","set_innerHTML" => "set_innerHTML","get_innerHTML" => "get_innerHTML","get_firstChild" => "get_firstChild","get_lastChild" => "get_lastChild","get_nextSibling" => "get_nextSibling","get_previousSibling" => "get_previousSibling","get_nodeType" => "get_nodeType","set_nodeValue" => "set_nodeValue","get_nodeValue" => "get_nodeValue","get_nodeName" => "get_nodeName","set_ownerDocument" => "set_ownerDocument","set_onclick" => "set_onClick","set_ondblclick" => "set_onDblClick","set_onmousedown" => "set_onMouseDown","set_onmouseup" => "set_onMouseUp","set_onmouseover" => "set_onMouseOver","set_onmouseout" => "set_onMouseOut","set_onmousemove" => "set_onMouseMove","set_onmousewheel" => "set_onMouseWheel","set_onkeydown" => "set_onKeyDown","set_onkeyup" => "set_onKeyUp","set_onfocus" => "set_onFocus","set_onblur" => "set_onBlur","set_onresize" => "set_onResize","set_onfullscreenchange" => "set_onFullScreenChange","set_onscroll" => "set_onScroll","set_onload" => "set_onLoad","set_onerror" => "set_onError","set_onloadstart" => "set_onLoadStart","set_onprogress" => "set_onProgress","set_onsuspend" => "set_onSuspend","set_onemptied" => "set_onEmptied","set_onstalled" => "set_onStalled","set_onloadedmetadata" => "set_onLoadedMetadata","set_onloadeddata" => "set_onLoadedData","set_oncanplay" => "set_onCanPlay","set_oncanplaythrough" => "set_onCanPlayThrough","set_onplaying" => "set_onPlaying","set_onwaiting" => "set_onWaiting","set_onseeking" => "set_onSeeking","set_onseeked" => "set_onSeeked","set_onended" => "set_onEnded","set_ondurationchange" => "set_onDurationChanged","set_ontimeupdate" => "set_onTimeUpdate","set_onplay" => "set_onPlay","set_onpause" => "set_onPause","set_onvolumechange" => "set_onVolumeChange","set_ontransitionend" => "set_onTransitionEnd","set_onpopstate" => "set_onPopState");
	function __toString() { return 'cocktail.core.html.HTMLDocument'; }
}
function cocktail_core_html_HTMLDocument_0(&$»this, &$elementRendererAtPoint, &$mouseEvent, &$mouseOutEvent, &$mouseOverEvent, &$oldHoveredElementRenderer) {
	$»spos = $GLOBALS['%s']->length;
	{
		$_this = $elementRendererAtPoint->domNode->coreStyle->computedValues;
		$typedProperty = null;
		$length = $_this->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($_this->_properties, $i)->name === "cursor") {
					$typedProperty = $_this->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}

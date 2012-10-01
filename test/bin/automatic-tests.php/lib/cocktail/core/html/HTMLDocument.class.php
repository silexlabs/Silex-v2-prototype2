<?php

class cocktail_core_html_HTMLDocument extends cocktail_core_dom_Document {
	public function __construct($window = null) {
		if(!php_Boot::$skip_constructor) {
		parent::__construct();
		$this->initStyleManager();
		if($window === null) {
			$window = new cocktail_core_window_Window();
		}
		$this->_window = $window;
		$this->_focusManager = new cocktail_core_focus_FocusManager();
		$this->_multiTouchManager = new cocktail_core_multitouch_MultiTouchManager();
		$this->documentElement = $this->createElement("HTML");
		$this->initBody($this->createElement("BODY"));
		$this->_shouldDispatchClickOnNextMouseUp = false;
		$this->_invalidationScheduled = false;
		$this->_documentNeedsLayout = true;
		$this->_documentNeedsRendering = true;
		$this->_documentNeedsCascading = true;
		$this->_graphicsContextTreeNeedsUpdate = true;
		$this->_renderingTreeNeedsUpdate = true;
		$this->_mousePoint = new cocktail_core_geom_PointVO(0.0, 0.0);
		$this->layoutManager = new cocktail_core_layout_LayoutManager();
	}}
	public function get_activeElement() {
		return $this->_focusManager->activeElement;
	}
	public function set_activeElement($newActiveElement) {
		$this->_focusManager->setActiveElement($newActiveElement, $this->body);
		return $this->get_activeElement();
	}
	public function getFirstVerticallyScrollableHTMLElement($htmlElement, $scrollOffset) {
		while($htmlElement->isVerticallyScrollable($scrollOffset) === false) {
			$htmlElement = $htmlElement->parentNode;
			if($htmlElement === null) {
				return null;
			}
		}
		return $htmlElement;
	}
	public function getFirstElementRendererWhichCanDispatchMouseEvent($x, $y) {
		$this->_mousePoint->x = $x;
		$this->_mousePoint->y = $y;
		$elementRendererAtPoint = $this->documentElement->elementRenderer->layerRenderer->getTopMostElementRendererAtPoint($this->_mousePoint, 0, 0);
		if($elementRendererAtPoint === null) {
			return $this->body->elementRenderer;
		}
		while($elementRendererAtPoint->domNode->get_nodeType() !== 1 || $elementRendererAtPoint->isAnonymousBlockBox() === true) {
			$elementRendererAtPoint = $elementRendererAtPoint->parentNode;
			if($elementRendererAtPoint === null) {
				return null;
			}
		}
		return $elementRendererAtPoint;
	}
	public function scheduleCascadeLayoutAndRender() {
		$onLayoutScheduleDelegate = (isset($this->onLayoutSchedule) ? $this->onLayoutSchedule: array($this, "onLayoutSchedule"));
	}
	public function startLayout($forceLayout) {
		$this->documentElement->elementRenderer->layout($forceLayout);
		$this->documentElement->elementRenderer->setGlobalOrigins(0, 0, 0, 0, 0, 0);
	}
	public function startCascade($programmaticChange) {
		$this->documentElement->cascade(new Hash(), $programmaticChange);
		$this->_documentNeedsCascading = false;
	}
	public function endPendingAnimation() {
		$this->documentElement->endPendingAnimation();
	}
	public function startPendingAnimation() {
		return $this->documentElement->startPendingAnimation();
	}
	public function startRendering() {
		$this->documentElement->elementRenderer->layerRenderer->render($this->_window->get_innerWidth(), $this->_window->get_innerHeight());
	}
	public function onLayoutSchedule() {
		$this->cascadeLayoutAndRender();
		$this->_invalidationScheduled = false;
	}
	public function cascadeLayoutAndRender() {
		if($this->_documentNeedsCascading === true) {
			$this->startCascade(true);
		}
		if($this->_renderingTreeNeedsUpdate === true) {
			$this->documentElement->updateElementRenderer();
			$this->_renderingTreeNeedsUpdate = false;
		}
		if($this->_documentNeedsLayout === true) {
			$this->startLayout(false);
			$atLeastOneAnimationStarted = $this->startPendingAnimation();
			if($atLeastOneAnimationStarted === true) {
				$this->startLayout(true);
			}
		}
		if($this->_graphicsContextTreeNeedsUpdate === true) {
			$this->documentElement->elementRenderer->layerRenderer->updateGraphicsContext();
			$this->_graphicsContextTreeNeedsUpdate = false;
		}
		if($this->_documentNeedsRendering === true) {
			$this->startRendering();
			$this->_documentNeedsRendering = false;
		}
		if($this->_documentNeedsLayout === true) {
			$this->endPendingAnimation();
			$this->_documentNeedsLayout = false;
		}
	}
	public function doInvalidate() {
		$this->_invalidationScheduled = true;
		$this->scheduleCascadeLayoutAndRender();
	}
	public function invalidate() {
		if($this->_invalidationScheduled === false) {
			$this->doInvalidate();
		}
	}
	public function invalidateCascade() {
		$this->_documentNeedsCascading = true;
		$this->invalidate();
	}
	public function invalidateGraphicsContextTree() {
		$this->_graphicsContextTreeNeedsUpdate = true;
		$this->invalidate();
	}
	public function invalidateRenderingTree() {
		$this->_renderingTreeNeedsUpdate = true;
		$this->invalidate();
	}
	public function invalidateRendering() {
		$this->_documentNeedsRendering = true;
		$this->invalidate();
	}
	public function invalidateLayout($immediate) {
		$this->_documentNeedsLayout = true;
		if($immediate === false) {
			$this->invalidate();
		} else {
			$this->cascadeLayoutAndRender();
		}
	}
	public function set_fullscreenElement($value) {
		if($value === null) {
			$this->fullscreenElement = null;
			return $value;
		}
		if($this->fullscreenElement !== null) {
			return $this->fullscreenElement;
		}
		$this->fullscreenElement = $value;
		if($this->onEnterFullscreen !== null) {
			$this->onEnterFullscreen();
		}
		$fullscreenEvent = new cocktail_core_event_Event();
		$fullscreenEvent->initEvent("fullscreenchange", true, false);
		return $value;
	}
	public function get_fullscreenEnabled() {
		return $this->_window->platform->nativeWindow->fullScreenEnabled();
	}
	public function exitFullscreen() {
		if($this->fullscreenElement === null) {
			return;
		}
		$this->set_fullscreenElement(null);
		if($this->onExitFullscreen !== null) {
			$this->onExitFullscreen();
		}
		$fullscreenEvent = new cocktail_core_event_Event();
		$fullscreenEvent->initEvent("fullscreenchange", true, false);
	}
	public function setMouseCursor($cursor) {
		if($this->onSetMouseCursor !== null) {
			$this->onSetMouseCursor($cursor);
		}
	}
	public function dispatchClickEvent($mouseEvent) {
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
	}
	public function onPlatformTouchEvent($touchEvent) {
		$touch = $touchEvent->touches->item(0);
		$elementAtTouchPoint = $this->getFirstElementRendererWhichCanDispatchMouseEvent($touch->screenX, $touch->screenY);
		$this->_multiTouchManager->setUpTouchEvent($touchEvent, $elementAtTouchPoint->domNode);
		$elementAtTouchPoint->domNode->dispatchEvent($touchEvent);
	}
	public function onPlatformResizeEvent($event) {
		$this->documentElement->invalidate(cocktail_core_renderer_InvalidationReason::$windowResize);
	}
	public function onPlatformKeyUpEvent($keyboardEvent) {
		$this->get_activeElement()->dispatchEvent($keyboardEvent);
	}
	public function onPlatformKeyDownEvent($keyboardEvent) {
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
	}
	public function onPlatformMouseMoveEvent($mouseEvent) {
		if($this->documentElement->elementRenderer === null) {
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
			$this->setMouseCursor($elementRendererAtPoint->domNode->coreStyle->get_cursor());
		}
		$elementRendererAtPoint->domNode->dispatchEvent($mouseEvent);
	}
	public function onPlatformMouseWheelEvent($wheelEvent) {
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
	}
	public function onPlatformMouseEvent($mouseEvent) {
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
	}
	public function getMatchedPseudoClassesVO($node) {
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
		return new cocktail_core_css_MatchedPseudoClassesVO($hover, $focus, $active, $link, $enabled, $disabled, $checked);
	}
	public function getStyleDeclaration($node) {
		return $this->_styleManager->getStyleDeclaration($node, $this->getMatchedPseudoClassesVO($node));
	}
	public function removeStyleSheet($stylesheet) {
		$this->_styleManager->removeStyleSheet($stylesheet);
		$this->documentElement->invalidateStyleDeclaration(true);
		$this->startCascade(false);
	}
	public function addStyleSheet($stylesheet) {
		$this->_styleManager->addStyleSheet($stylesheet);
		$this->documentElement->invalidateStyleDeclaration(true);
		$this->startCascade(false);
	}
	public function get_innerHTML() {
		return cocktail_core_parser_DOMParser::serialize($this->documentElement);
	}
	public function set_innerHTML($value) {
		$node = cocktail_core_parser_DOMParser::parse($value, $this);
		$this->documentElement = $node;
		$this->initBody(_hx_array_get($this->documentElement->getElementsByTagName("BODY"), 0));
		return $value;
	}
	public function createElement($tagName) {
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
		default:{
			$element = new cocktail_core_html_HTMLElement($tagName);
		}break;
		}
		$element->set_ownerDocument($this);
		return $element;
	}
	public function initStyleManager() {
		$this->initialStyleDeclaration = new cocktail_core_css_InitialStyleDeclaration();
		$this->_styleManager = new cocktail_core_css_StyleManager();
		$this->_styleManager->addStyleSheet(new cocktail_core_css_DefaultCSSStyleSheet());
	}
	public function initBody($htmlBodyElement) {
		$this->body = $htmlBodyElement;
		$this->documentElement->appendChild($this->body);
		$this->_hoveredElementRenderer = $this->body->elementRenderer;
		$this->set_activeElement($this->body);
	}
	public $_mousePoint;
	public $layoutManager;
	public $initialStyleDeclaration;
	public $_styleManager;
	public $_window;
	public $_multiTouchManager;
	public $_graphicsContextTreeNeedsUpdate;
	public $_renderingTreeNeedsUpdate;
	public $_documentNeedsCascading;
	public $_documentNeedsRendering;
	public $_documentNeedsLayout;
	public $_invalidationScheduled;
	public $_shouldDispatchClickOnNextMouseUp;
	public $onSetMouseCursor;
	public $onExitFullscreen;
	public $onEnterFullscreen;
	public $innerHTML;
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
	static $INVALIDATION_INTERVAL = 20;
	static $__properties__ = array("set_activeElement" => "set_activeElement","get_activeElement" => "get_activeElement","get_fullscreenEnabled" => "get_fullscreenEnabled","set_fullscreenElement" => "set_fullscreenElement","set_innerHTML" => "set_innerHTML","get_innerHTML" => "get_innerHTML","get_nodeType" => "get_nodeType","set_nodeValue" => "set_nodeValue","get_nodeValue" => "get_nodeValue","get_nodeName" => "get_nodeName","set_ownerDocument" => "set_ownerDocument","get_firstChild" => "get_firstChild","get_lastChild" => "get_lastChild","get_nextSibling" => "get_nextSibling","get_previousSibling" => "get_previousSibling","set_onclick" => "set_onClick","set_ondblclick" => "set_onDblClick","set_onmousedown" => "set_onMouseDown","set_onmouseup" => "set_onMouseUp","set_onmouseover" => "set_onMouseOver","set_onmouseout" => "set_onMouseOut","set_onmousemove" => "set_onMouseMove","set_onmousewheel" => "set_onMouseWheel","set_onkeydown" => "set_onKeyDown","set_onkeyup" => "set_onKeyUp","set_onfocus" => "set_onFocus","set_onblur" => "set_onBlur","set_onresize" => "set_onResize","set_onfullscreenchange" => "set_onFullScreenChange","set_onscroll" => "set_onScroll","set_onload" => "set_onLoad","set_onerror" => "set_onError","set_onloadstart" => "set_onLoadStart","set_onprogress" => "set_onProgress","set_onsuspend" => "set_onSuspend","set_onemptied" => "set_onEmptied","set_onstalled" => "set_onStalled","set_onloadedmetadata" => "set_onLoadedMetadata","set_onloadeddata" => "set_onLoadedData","set_oncanplay" => "set_onCanPlay","set_oncanplaythrough" => "set_onCanPlayThrough","set_onplaying" => "set_onPlaying","set_onwaiting" => "set_onWaiting","set_onseeking" => "set_onSeeking","set_onseeked" => "set_onSeeked","set_onended" => "set_onEnded","set_ondurationchange" => "set_onDurationChanged","set_ontimeupdate" => "set_onTimeUpdate","set_onplay" => "set_onPlay","set_onpause" => "set_onPause","set_onvolumechange" => "set_onVolumeChange","set_ontransitionend" => "set_onTransitionEnd");
	function __toString() { return 'cocktail.core.html.HTMLDocument'; }
}

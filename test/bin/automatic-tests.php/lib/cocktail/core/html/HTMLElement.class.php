<?php

class cocktail_core_html_HTMLElement extends cocktail_core_dom_Element {
	public function __construct($tagName) {
		if(!php_Boot::$skip_constructor) {
		parent::__construct($tagName);
		$this->init();
		$this->_needsCascading = false;
		$this->_needsStyleDeclarationUpdate = false;
		$this->_pendingChangedProperties = new Hash();
		$this->_needsElementRendererUpdate = false;
	}}
	public function get_clientLeft() {
		$this->invalidate(cocktail_core_renderer_InvalidationReason::$needsImmediateLayout);
		return 0;
	}
	public function get_clientTop() {
		$this->invalidate(cocktail_core_renderer_InvalidationReason::$needsImmediateLayout);
		return 0;
	}
	public function get_clientHeight() {
		$this->invalidate(cocktail_core_renderer_InvalidationReason::$needsImmediateLayout);
		$usedValues = $this->coreStyle->usedValues;
		return Math::round($usedValues->height + $usedValues->paddingTop + $usedValues->paddingBottom);
	}
	public function get_clientWidth() {
		$this->invalidate(cocktail_core_renderer_InvalidationReason::$needsImmediateLayout);
		$usedValues = $this->coreStyle->usedValues;
		return Math::round($usedValues->width + $usedValues->paddingLeft + $usedValues->paddingRight);
	}
	public function get_offsetTop() {
		$this->invalidate(cocktail_core_renderer_InvalidationReason::$needsImmediateLayout);
		if($this->elementRenderer !== null) {
			return Math::round($this->elementRenderer->positionedOrigin->y);
		}
		return 0;
	}
	public function get_offsetLeft() {
		$this->invalidate(cocktail_core_renderer_InvalidationReason::$needsImmediateLayout);
		if($this->elementRenderer !== null) {
			return Math::round($this->elementRenderer->positionedOrigin->x);
		}
		return 0;
	}
	public function get_offsetHeight() {
		$this->invalidate(cocktail_core_renderer_InvalidationReason::$needsImmediateLayout);
		$usedValues = $this->coreStyle->usedValues;
		return Math::round($usedValues->height + $usedValues->paddingTop + $usedValues->paddingBottom);
	}
	public function get_offsetWidth() {
		$this->invalidate(cocktail_core_renderer_InvalidationReason::$needsImmediateLayout);
		$usedValues = $this->coreStyle->usedValues;
		return Math::round($usedValues->width + $usedValues->paddingLeft + $usedValues->paddingRight);
	}
	public function get_offsetParent() {
		if($this->parentNode === null) {
			return null;
		}
		$parent = $this->parentNode;
		if($parent->elementRenderer === null) {
			return null;
		}
		$isOffsetParent = $parent->elementRenderer->isPositioned();
		while($isOffsetParent === false) {
			if($parent->parentNode !== null) {
				$parent = $parent->parentNode;
				$isOffsetParent = $parent->elementRenderer->isPositioned();
			} else {
				$isOffsetParent = true;
			}
		}
		return $parent;
	}
	public function isVoidElement() {
		return false;
	}
	public function get_innerHTML() {
		$str = cocktail_core_parser_DOMParser::serialize($this);
		$str = _hx_substr($str, _hx_index_of($str, ">", null) + 1, _hx_last_index_of($str, "<", null) - _hx_index_of($str, ">", null) - 1);
		return $str;
	}
	public function set_innerHTML($value) {
		$childLength = $this->childNodes->length;
		{
			$_g = 0;
			while($_g < $childLength) {
				$i = $_g++;
				$this->removeChild($this->childNodes[0]);
				unset($i);
			}
		}
		$wrappedHTML = "<" . "DIV" . ">";
		$wrappedHTML .= $value;
		$wrappedHTML .= "<" . "/" . "DIV" . ">";
		$node = cocktail_core_parser_DOMParser::parse($wrappedHTML, $this->ownerDocument);
		if($node === null) {
			return $value;
		}
		$length = $node->childNodes->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				$this->appendChild($node->childNodes[0]);
				unset($i);
			}
		}
		return $value;
	}
	public function set_hidden($value) {
		parent::setAttribute("hidden",Std::string($value));
		return $value;
	}
	public function get_hidden() {
		if($this->getAttribute("hidden") !== null) {
			return true;
		} else {
			return false;
		}
	}
	public function set_className($value) {
		parent::setAttribute("class",$value);
		$this->classList = _hx_explode(" ", $value);
		$this->invalidateStyleDeclaration(true);
		return $value;
	}
	public function get_className() {
		return $this->getAttribute("class");
	}
	public function set_id($value) {
		$this->setAttribute("id", $value);
		return $value;
	}
	public function get_id() {
		return $this->getAttribute("id");
	}
	public function get_tabIndex() {
		$tabIndex = parent::getAttribute("tabindex");
		if($tabIndex === "") {
			if($this->isDefaultFocusable() === true) {
				return 0;
			} else {
				return -1;
			}
		} else {
			return Std::parseInt($tabIndex);
		}
	}
	public function set_tabIndex($value) {
		$this->setAttribute("tabindex", Std::string($value));
		return $value;
	}
	public function get_scrollTop() {
		if($this->elementRenderer !== null) {
			return Math::round($this->elementRenderer->get_scrollTop());
		}
		return 0;
	}
	public function set_scrollTop($value) {
		if($this->elementRenderer !== null) {
			$this->elementRenderer->set_scrollTop($value);
		}
		return $value;
	}
	public function get_scrollLeft() {
		if($this->elementRenderer !== null) {
			return Math::round($this->elementRenderer->get_scrollLeft());
		}
		return 0;
	}
	public function set_scrollLeft($value) {
		if($this->elementRenderer !== null) {
			$this->elementRenderer->set_scrollLeft($value);
		}
		return $value;
	}
	public function get_scrollWidth() {
		if($this->elementRenderer !== null) {
			return Math::round($this->elementRenderer->get_scrollWidth());
		}
		return 0;
	}
	public function get_scrollHeight() {
		if($this->elementRenderer !== null) {
			return Math::round($this->elementRenderer->get_scrollHeight());
		}
		return 0;
	}
	public function isHorizontallyScrollable($scrollOffset = null) {
		if($scrollOffset === null) {
			$scrollOffset = 0;
		}
		if($this->elementRenderer !== null) {
			return $this->elementRenderer->isHorizontallyScrollable($scrollOffset);
		}
		return false;
	}
	public function isVerticallyScrollable($scrollOffset = null) {
		if($scrollOffset === null) {
			$scrollOffset = 0;
		}
		if($this->elementRenderer !== null) {
			return $this->elementRenderer->isVerticallyScrollable($scrollOffset);
		}
		return false;
	}
	public function getNearestActivatableElement() {
		$htmlElement = $this;
		while($htmlElement->hasActivationBehaviour() === false) {
			if($htmlElement->parentNode === null) {
				return null;
			}
			$htmlElement = $htmlElement->parentNode;
		}
		return $htmlElement;
	}
	public function runPostClickActivationStep($event) {
	}
	public function runCanceledActivationStep() {
	}
	public function runPreClickActivation() {
	}
	public function hasActivationBehaviour() {
		return false;
	}
	public function requestFullScreen() {
		$this->_ownerHTMLDocument->set_fullscreenElement($this);
	}
	public function blur() {
		$this->_ownerHTMLDocument->body->focus();
	}
	public function focus() {
		$this->_ownerHTMLDocument->set_activeElement($this);
	}
	public function isDefaultFocusable() {
		return false;
	}
	public function isFocusable() {
		if($this->parentNode === null) {
			return false;
		} else {
			if($this->isDefaultFocusable() === true) {
				return true;
			} else {
				if($this->get_tabIndex() > 0) {
					return true;
				}
			}
		}
		return false;
	}
	public function fireEvent($eventTye, $bubbles, $cancelable) {
		$event = new cocktail_core_event_Event();
		$event->initEvent($eventTye, $bubbles, $cancelable);
		$this->dispatchEvent($event);
	}
	public function click() {
		$mouseEvent = new cocktail_core_event_MouseEvent();
		$mouseEvent->initMouseEvent("click", false, false, null, 0, 0, 0, 0, 0, false, false, false, false, 0, null);
		$this->dispatchEvent($mouseEvent);
	}
	public function endPendingAnimation() {
		$this->coreStyle->endPendingAnimation();
		$length = $this->childNodes->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				_hx_array_get($this->childNodes, $i)->endPendingAnimation();
				unset($i);
			}
		}
	}
	public function startPendingAnimation() {
		$atLeastOneAnimationStarted = false;
		$animationStarted = $this->coreStyle->startPendingAnimations();
		if($animationStarted === true) {
			$atLeastOneAnimationStarted = true;
		}
		$length = $this->childNodes->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				$animationStarted1 = _hx_array_get($this->childNodes, $i)->startPendingAnimation();
				if($animationStarted1 === true) {
					$atLeastOneAnimationStarted = true;
				}
				unset($i,$animationStarted1);
			}
		}
		return $atLeastOneAnimationStarted;
	}
	public function isParentRendered() {
		if($this->parentNode === null) {
			return false;
		}
		$htmlParent = $this->parentNode;
		if($htmlParent->elementRenderer !== null) {
			return true;
		} else {
			return false;
		}
	}
	public function isRendered() {
		if($this->get_hidden() === true) {
			return false;
		}
		if($this->coreStyle->isNone($this->coreStyle->get_display())) {
			return false;
		}
		return true;
	}
	public function attachCoreStyle() {
		$this->elementRenderer->coreStyle = $this->coreStyle;
	}
	public function createElementRenderer() {
		$»t = ($this->coreStyle->getKeyword($this->coreStyle->get_display()));
		switch($»t->index) {
		case 28:
		case 29:
		{
			$this->elementRenderer = new cocktail_core_renderer_BlockBoxRenderer($this);
		}break;
		case 30:
		{
			$this->elementRenderer = new cocktail_core_renderer_InlineBoxRenderer($this);
		}break;
		case 18:
		{
		}break;
		default:{
			throw new HException("Illegal value for display style");
		}break;
		}
	}
	public function detachFromParentElementRenderer() {
		$this->elementRenderer->parentNode->removeChild($this->elementRenderer);
	}
	public function attachToParentElementRenderer() {
		$this->parentNode->elementRenderer->insertBefore($this->elementRenderer, $this->getNextElementRendererSibling());
	}
	public function getNextElementRendererSibling() {
		$nextSibling = $this->get_nextSibling();
		if($nextSibling === null) {
			return null;
		} else {
			while($nextSibling !== null) {
				if($nextSibling->elementRenderer !== null) {
					$elementRenderParent = $nextSibling->elementRenderer->parentNode;
					if($elementRenderParent->isAnonymousBlockBox() === true) {
						return $elementRenderParent;
					}
					return $nextSibling->elementRenderer;
					unset($elementRenderParent);
				}
				$nextSibling = $nextSibling->get_nextSibling();
			}
		}
		return null;
	}
	public function onInlineStyleChange($changedProperty) {
		$this->_pendingChangedProperties->set($changedProperty, null);
		$this->invalidateCascade();
	}
	public function cascadeSelf($parentChangedProperties, $programmaticChange) {
		$initialStyleDeclaration = $this->_ownerHTMLDocument->initialStyleDeclaration;
		$changedProperties = new Hash();
		if($this->parentNode !== null) {
			if($this->parentNode->styleManagerCSSDeclaration !== null) {
				if($this->_needsStyleDeclarationUpdate === true || $this->styleManagerCSSDeclaration === null) {
					$this->getStyleDeclaration();
					$this->_needsStyleDeclarationUpdate = false;
				}
				$parentStyleDeclaration = $this->parentNode->coreStyle->computedValues;
				$parentFontMetrics = $this->parentNode->coreStyle->get_fontMetricsData();
				if(null == $parentChangedProperties) throw new HException('null iterable');
				$»it = $parentChangedProperties->keys();
				while($»it->hasNext()) {
					$propertyName = $»it->next();
					$this->_pendingChangedProperties->set($propertyName, null);
				}
				$changedProperties = $this->coreStyle->cascade($this->_pendingChangedProperties, $initialStyleDeclaration, $this->styleManagerCSSDeclaration, $this->style, $parentStyleDeclaration, $parentFontMetrics->fontSize, $parentFontMetrics->xHeight, $programmaticChange);
			}
		} else {
			if($this->_needsStyleDeclarationUpdate === true || $this->styleManagerCSSDeclaration === null) {
				$this->getStyleDeclaration();
				$this->_needsStyleDeclarationUpdate = false;
			}
			$changedProperties = $this->coreStyle->cascade($this->_pendingChangedProperties, $initialStyleDeclaration, $this->styleManagerCSSDeclaration, $this->style, $initialStyleDeclaration, 12, 12, $programmaticChange);
		}
		$this->_pendingChangedProperties = new Hash();
		return $changedProperties;
	}
	public function getStyleDeclaration() {
		$this->_pendingChangedProperties = $this->_ownerHTMLDocument->initialStyleDeclaration->get_supportedCSSProperties();
		$this->styleManagerCSSDeclaration = $this->_ownerHTMLDocument->getStyleDeclaration($this);
	}
	public function cascade($parentChangedProperties, $programmaticChange) {
		$changedProperties = new Hash();
		if($this->_needsCascading === true || $parentChangedProperties->keys()->hasNext() === true) {
			$changedProperties = $this->cascadeSelf($parentChangedProperties, $programmaticChange);
			$this->_needsCascading = false;
		}
		if($changedProperties->exists("display") || $changedProperties->exists("position") || $changedProperties->exists("float") || $changedProperties->exists("transform") || $changedProperties->exists("z-index") || $changedProperties->exists("overflow-x") || $changedProperties->exists("overflow-y")) {
			$this->invalidatePositioningScheme();
		}
		$childNodes = $this->childNodes;
		$childLength = $childNodes->length;
		{
			$_g = 0;
			while($_g < $childLength) {
				$i = $_g++;
				$childNode = $childNodes[$i];
				$childNode->cascade($changedProperties, $programmaticChange);
				unset($i,$childNode);
			}
		}
	}
	public function detach() {
		if($this->isParentRendered() === true) {
			if($this->elementRenderer !== null) {
				$length = $this->childNodes->length;
				{
					$_g = 0;
					while($_g < $length) {
						$i = $_g++;
						switch(_hx_array_get($this->childNodes, $i)->get_nodeType()) {
						case 1:{
							$child = $this->childNodes[$i];
							$child->detach();
						}break;
						case 3:{
							$child = $this->childNodes[$i];
							$child->detach();
						}break;
						}
						unset($i);
					}
				}
				$this->detachFromParentElementRenderer();
				$this->elementRenderer = null;
			}
		}
	}
	public function attach() {
		if($this->isParentRendered() === true) {
			if($this->elementRenderer === null && $this->isRendered() === true) {
				$this->createElementRenderer();
				if($this->elementRenderer !== null) {
					$this->attachCoreStyle();
				}
			}
			if($this->elementRenderer !== null) {
				$this->attachToParentElementRenderer();
			}
		}
		$length = $this->childNodes->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				switch(_hx_array_get($this->childNodes, $i)->get_nodeType()) {
				case 1:{
					$child = $this->childNodes[$i];
					$child->attach();
				}break;
				case 3:{
					$child = $this->childNodes[$i];
					$child->attach();
				}break;
				}
				unset($i);
			}
		}
		$this->_needsElementRendererUpdate = false;
	}
	public function updateElementRenderer() {
		if($this->_needsElementRendererUpdate === true) {
			if($this->elementRenderer !== null) {
				$this->detach();
			}
			$this->attach();
		} else {
			$_g1 = 0; $_g = $this->childNodes->length;
			while($_g1 < $_g) {
				$i = $_g1++;
				_hx_array_get($this->childNodes, $i)->updateElementRenderer();
				unset($i);
			}
		}
	}
	public function invalidateCascade() {
		$this->_needsCascading = true;
		if($this->_ownerHTMLDocument !== null) {
			$this->_ownerHTMLDocument->invalidateCascade();
		}
	}
	public function invalidateStyleDeclaration($recursive) {
		$this->_needsStyleDeclarationUpdate = true;
		if($recursive === true) {
			$length = $this->childNodes->length;
			{
				$_g = 0;
				while($_g < $length) {
					$i = $_g++;
					_hx_array_get($this->childNodes, $i)->invalidateStyleDeclaration(true);
					unset($i);
				}
			}
		}
		$this->invalidateCascade();
	}
	public function invalidatePositioningScheme() {
		if($this->parentNode !== null) {
			$this->parentNode->invalidateElementRenderer();
		}
	}
	public function invalidateElementRenderer() {
		$this->_needsElementRendererUpdate = true;
		if($this->_ownerHTMLDocument !== null) {
			$this->_ownerHTMLDocument->invalidateRenderingTree();
		}
	}
	public function invalidate($invalidationReason) {
		if($this->elementRenderer !== null) {
			$this->elementRenderer->invalidate($invalidationReason);
		}
	}
	public function set_ownerDocument($value) {
		parent::set_ownerDocument($value);
		$this->_ownerHTMLDocument = $value;
		return $value;
	}
	public function executeDefaultActionIfNeeded($defaultPrevented, $event) {
		if($defaultPrevented === false) {
			switch($event->type) {
			case "mousedown":{
				$this->focus();
			}break;
			}
		}
	}
	public function getTargetAncestors() {
		$targetAncestors = parent::getTargetAncestors();
		$targetAncestors->push(cocktail_Lib::get_document());
		$targetAncestors->push(cocktail_Lib::get_window());
		return $targetAncestors;
	}
	public function getAttribute($name) {
		if($name === "tabindex") {
			return Std::string($this->get_tabIndex());
		} else {
			if($name === "style") {
				return $this->style->get_cssText();
			} else {
				return parent::getAttribute($name);
			}
		}
	}
	public function setAttribute($name, $value) {
		if($name === "style") {
			$this->style->set_cssText($value);
			parent::setAttribute($name,$value);
			$this->invalidateCascade();
		} else {
			if($name === "class") {
				$this->set_className($value);
			} else {
				parent::setAttribute($name,$value);
				$this->invalidateStyleDeclaration(true);
			}
		}
	}
	public function getElementsByTagName($tagName) {
		return parent::getElementsByTagName(strtoupper($tagName));
	}
	public function removeChild($oldChild) {
		switch($oldChild->get_nodeType()) {
		case 1:case 3:{
			$this->invalidateElementRenderer();
			$oldChild->detach();
		}break;
		}
		parent::removeChild($oldChild);
		return $oldChild;
	}
	public function appendChild($newChild) {
		parent::appendChild($newChild);
		switch($newChild->get_nodeType()) {
		case 1:case 3:{
			$this->invalidateElementRenderer();
			$newChild->invalidateStyleDeclaration(false);
			$newChild->invalidateCascade();
			$this->invalidateCascade();
		}break;
		}
		return $newChild;
	}
	public function initId() {
		$id = new cocktail_core_dom_Attr("id");
		$this->setIdAttributeNode($id, true);
	}
	public function initStyle() {
		$this->style = new cocktail_core_css_CSSStyleDeclaration(null, (isset($this->onInlineStyleChange) ? $this->onInlineStyleChange: array($this, "onInlineStyleChange")));
	}
	public function initCoreStyle() {
		$this->coreStyle = new cocktail_core_css_CoreStyle($this);
	}
	public function init() {
		$this->initCoreStyle();
		$this->initStyle();
		$this->initId();
	}
	public $_ownerHTMLDocument;
	public $_pendingChangedProperties;
	public $_needsElementRendererUpdate;
	public $_needsStyleDeclarationUpdate;
	public $_needsCascading;
	public $styleManagerCSSDeclaration;
	public $style;
	public $coreStyle;
	public $clientTop;
	public $clientLeft;
	public $clientHeight;
	public $clientWidth;
	public $offsetTop;
	public $offsetLeft;
	public $offsetHeight;
	public $offsetWidth;
	public $offsetParent;
	public $elementRenderer;
	public $innerHTML;
	public $scrollWidth;
	public $scrollHeight;
	public $scrollLeft;
	public $scrollTop;
	public $hidden;
	public $classList;
	public $className;
	public $id;
	public $tabIndex;
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
	static $__properties__ = array("set_tabIndex" => "set_tabIndex","get_tabIndex" => "get_tabIndex","set_id" => "set_id","get_id" => "get_id","set_className" => "set_className","get_className" => "get_className","set_hidden" => "set_hidden","get_hidden" => "get_hidden","set_scrollTop" => "set_scrollTop","get_scrollTop" => "get_scrollTop","set_scrollLeft" => "set_scrollLeft","get_scrollLeft" => "get_scrollLeft","get_scrollHeight" => "get_scrollHeight","get_scrollWidth" => "get_scrollWidth","set_innerHTML" => "set_innerHTML","get_innerHTML" => "get_innerHTML","get_offsetParent" => "get_offsetParent","get_offsetWidth" => "get_offsetWidth","get_offsetHeight" => "get_offsetHeight","get_offsetLeft" => "get_offsetLeft","get_offsetTop" => "get_offsetTop","get_clientWidth" => "get_clientWidth","get_clientHeight" => "get_clientHeight","get_clientLeft" => "get_clientLeft","get_clientTop" => "get_clientTop","get_firstElementChild" => "get_firstElementChild","get_lastElementChild" => "get_lastElementChild","get_previousElementSibling" => "get_previousElementSibling","get_nextElementSibling" => "get_nextElementSibling","get_childElementCount" => "get_childElementCount","get_nodeType" => "get_nodeType","set_nodeValue" => "set_nodeValue","get_nodeValue" => "get_nodeValue","get_nodeName" => "get_nodeName","set_ownerDocument" => "set_ownerDocument","get_firstChild" => "get_firstChild","get_lastChild" => "get_lastChild","get_nextSibling" => "get_nextSibling","get_previousSibling" => "get_previousSibling","set_onclick" => "set_onClick","set_ondblclick" => "set_onDblClick","set_onmousedown" => "set_onMouseDown","set_onmouseup" => "set_onMouseUp","set_onmouseover" => "set_onMouseOver","set_onmouseout" => "set_onMouseOut","set_onmousemove" => "set_onMouseMove","set_onmousewheel" => "set_onMouseWheel","set_onkeydown" => "set_onKeyDown","set_onkeyup" => "set_onKeyUp","set_onfocus" => "set_onFocus","set_onblur" => "set_onBlur","set_onresize" => "set_onResize","set_onfullscreenchange" => "set_onFullScreenChange","set_onscroll" => "set_onScroll","set_onload" => "set_onLoad","set_onerror" => "set_onError","set_onloadstart" => "set_onLoadStart","set_onprogress" => "set_onProgress","set_onsuspend" => "set_onSuspend","set_onemptied" => "set_onEmptied","set_onstalled" => "set_onStalled","set_onloadedmetadata" => "set_onLoadedMetadata","set_onloadeddata" => "set_onLoadedData","set_oncanplay" => "set_onCanPlay","set_oncanplaythrough" => "set_onCanPlayThrough","set_onplaying" => "set_onPlaying","set_onwaiting" => "set_onWaiting","set_onseeking" => "set_onSeeking","set_onseeked" => "set_onSeeked","set_onended" => "set_onEnded","set_ondurationchange" => "set_onDurationChanged","set_ontimeupdate" => "set_onTimeUpdate","set_onplay" => "set_onPlay","set_onpause" => "set_onPause","set_onvolumechange" => "set_onVolumeChange","set_ontransitionend" => "set_onTransitionEnd");
	function __toString() { return 'cocktail.core.html.HTMLElement'; }
}

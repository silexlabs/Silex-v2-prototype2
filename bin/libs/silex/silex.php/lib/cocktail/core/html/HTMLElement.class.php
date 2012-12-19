<?php

class cocktail_core_html_HTMLElement extends cocktail_core_dom_Element {
	public function __construct($tagName) {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLElement::new");
		$»spos = $GLOBALS['%s']->length;
		parent::__construct($tagName);
		$this->init();
		$this->attachedToDOM = false;
		$this->_needsCascading = false;
		$this->_needsStyleDeclarationUpdate = false;
		$this->_shouldCascadeAllProperties = true;
		$this->_needsElementRendererUpdate = true;
		$this->_pendingChangedProperties = new _hx_array(array());
		$GLOBALS['%s']->pop();
	}}
	public function get_attachedToDOM() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLElement::get_attachedToDOM");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->attachedToDOM;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_clientLeft() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLElement::get_clientLeft");
		$»spos = $GLOBALS['%s']->length;
		$this->updateDocumentImmediately();
		{
			$GLOBALS['%s']->pop();
			return 0;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_clientTop() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLElement::get_clientTop");
		$»spos = $GLOBALS['%s']->length;
		$this->updateDocumentImmediately();
		{
			$GLOBALS['%s']->pop();
			return 0;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_clientHeight() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLElement::get_clientHeight");
		$»spos = $GLOBALS['%s']->length;
		$this->updateDocumentImmediately();
		$usedValues = $this->coreStyle->usedValues;
		{
			$»tmp = Math::round($usedValues->height + $usedValues->paddingTop + $usedValues->paddingBottom);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_clientWidth() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLElement::get_clientWidth");
		$»spos = $GLOBALS['%s']->length;
		$this->updateDocumentImmediately();
		$usedValues = $this->coreStyle->usedValues;
		{
			$»tmp = Math::round($usedValues->width + $usedValues->paddingLeft + $usedValues->paddingRight);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_offsetTop() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLElement::get_offsetTop");
		$»spos = $GLOBALS['%s']->length;
		$this->updateDocumentImmediately();
		if($this->elementRenderer !== null) {
			$»tmp = Math::round($this->elementRenderer->positionedOrigin->y);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		{
			$GLOBALS['%s']->pop();
			return 0;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_offsetLeft() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLElement::get_offsetLeft");
		$»spos = $GLOBALS['%s']->length;
		$this->updateDocumentImmediately();
		if($this->elementRenderer !== null) {
			$»tmp = Math::round($this->elementRenderer->positionedOrigin->x);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		{
			$GLOBALS['%s']->pop();
			return 0;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_offsetHeight() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLElement::get_offsetHeight");
		$»spos = $GLOBALS['%s']->length;
		$this->updateDocumentImmediately();
		$usedValues = $this->coreStyle->usedValues;
		{
			$»tmp = Math::round($usedValues->height + $usedValues->paddingTop + $usedValues->paddingBottom);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_offsetWidth() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLElement::get_offsetWidth");
		$»spos = $GLOBALS['%s']->length;
		$this->updateDocumentImmediately();
		$usedValues = $this->coreStyle->usedValues;
		{
			$»tmp = Math::round($usedValues->width + $usedValues->paddingLeft + $usedValues->paddingRight);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_offsetParent() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLElement::get_offsetParent");
		$»spos = $GLOBALS['%s']->length;
		if($this->parentNode === null) {
			$GLOBALS['%s']->pop();
			return null;
		}
		$parent = $this->parentNode;
		if($parent->elementRenderer === null) {
			$GLOBALS['%s']->pop();
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
		{
			$GLOBALS['%s']->pop();
			return $parent;
		}
		$GLOBALS['%s']->pop();
	}
	public function isVoidElement() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLElement::isVoidElement");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_outerHTML() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLElement::get_outerHTML");
		$»spos = $GLOBALS['%s']->length;
		$str = cocktail_core_parser_DOMParser::serialize($this);
		{
			$GLOBALS['%s']->pop();
			return $str;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_innerHTML() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLElement::get_innerHTML");
		$»spos = $GLOBALS['%s']->length;
		$str = cocktail_core_parser_DOMParser::serialize($this);
		$str = _hx_substr($str, _hx_index_of($str, ">", null) + 1, _hx_last_index_of($str, "<", null) - _hx_index_of($str, ">", null) - 1);
		{
			$GLOBALS['%s']->pop();
			return $str;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_outerHTML($value) {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLElement::set_outerHTML");
		$»spos = $GLOBALS['%s']->length;
		$node = cocktail_core_parser_DOMParser::parse($value, $this->ownerDocument);
		$oldNextSibling = $this->get_nextSibling();
		$this->parentNode->removeChild($this);
		if($node === null) {
			$GLOBALS['%s']->pop();
			return $value;
		}
		$this->parentNode->insertBefore($node, $oldNextSibling);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_innerHTML($value) {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLElement::set_innerHTML");
		$»spos = $GLOBALS['%s']->length;
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
			$GLOBALS['%s']->pop();
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
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_hidden($value) {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLElement::set_hidden");
		$»spos = $GLOBALS['%s']->length;
		parent::setAttribute("hidden",Std::string($value));
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_hidden() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLElement::get_hidden");
		$»spos = $GLOBALS['%s']->length;
		if($this->getAttribute("hidden") !== null) {
			$GLOBALS['%s']->pop();
			return true;
		} else {
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_className($value) {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLElement::set_className");
		$»spos = $GLOBALS['%s']->length;
		parent::setAttribute("class",$value);
		$this->classList = _hx_explode(" ", $value);
		$this->invalidateStyleDeclaration(true);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_className() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLElement::get_className");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getAttribute("class");
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_id($value) {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLElement::set_id");
		$»spos = $GLOBALS['%s']->length;
		$this->setAttribute("id", $value);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_id() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLElement::get_id");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->getAttribute("id");
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_tabIndex() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLElement::get_tabIndex");
		$»spos = $GLOBALS['%s']->length;
		$tabIndex = parent::getAttribute("tabindex");
		if($tabIndex === "") {
			if($this->isDefaultFocusable() === true) {
				$GLOBALS['%s']->pop();
				return 0;
			} else {
				$GLOBALS['%s']->pop();
				return -1;
			}
		} else {
			$»tmp = Std::parseInt($tabIndex);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_tabIndex($value) {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLElement::set_tabIndex");
		$»spos = $GLOBALS['%s']->length;
		$this->setAttribute("tabindex", Std::string($value));
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_scrollTop() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLElement::get_scrollTop");
		$»spos = $GLOBALS['%s']->length;
		if($this->elementRenderer !== null) {
			$»tmp = Math::round($this->elementRenderer->get_scrollTop());
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		{
			$GLOBALS['%s']->pop();
			return 0;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_scrollTop($value) {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLElement::set_scrollTop");
		$»spos = $GLOBALS['%s']->length;
		if($this->elementRenderer !== null) {
			$this->elementRenderer->set_scrollTop($value);
		}
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_scrollLeft() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLElement::get_scrollLeft");
		$»spos = $GLOBALS['%s']->length;
		if($this->elementRenderer !== null) {
			$»tmp = Math::round($this->elementRenderer->get_scrollLeft());
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		{
			$GLOBALS['%s']->pop();
			return 0;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_scrollLeft($value) {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLElement::set_scrollLeft");
		$»spos = $GLOBALS['%s']->length;
		if($this->elementRenderer !== null) {
			$this->elementRenderer->set_scrollLeft($value);
		}
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_scrollWidth() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLElement::get_scrollWidth");
		$»spos = $GLOBALS['%s']->length;
		if($this->elementRenderer !== null) {
			$»tmp = Math::round($this->elementRenderer->get_scrollWidth());
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		{
			$GLOBALS['%s']->pop();
			return 0;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_scrollHeight() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLElement::get_scrollHeight");
		$»spos = $GLOBALS['%s']->length;
		if($this->elementRenderer !== null) {
			$»tmp = Math::round($this->elementRenderer->get_scrollHeight());
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		{
			$GLOBALS['%s']->pop();
			return 0;
		}
		$GLOBALS['%s']->pop();
	}
	public function isHorizontallyScrollable($scrollOffset = null) {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLElement::isHorizontallyScrollable");
		$»spos = $GLOBALS['%s']->length;
		if($scrollOffset === null) {
			$scrollOffset = 0;
		}
		if($this->elementRenderer !== null) {
			$»tmp = $this->elementRenderer->isHorizontallyScrollable($scrollOffset);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function isVerticallyScrollable($scrollOffset = null) {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLElement::isVerticallyScrollable");
		$»spos = $GLOBALS['%s']->length;
		if($scrollOffset === null) {
			$scrollOffset = 0;
		}
		if($this->elementRenderer !== null) {
			$»tmp = $this->elementRenderer->isVerticallyScrollable($scrollOffset);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function getNearestActivatableElement() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLElement::getNearestActivatableElement");
		$»spos = $GLOBALS['%s']->length;
		$htmlElement = $this;
		while($htmlElement->hasActivationBehaviour() === false) {
			if($htmlElement->parentNode === null) {
				$GLOBALS['%s']->pop();
				return null;
			}
			$htmlElement = $htmlElement->parentNode;
		}
		{
			$GLOBALS['%s']->pop();
			return $htmlElement;
		}
		$GLOBALS['%s']->pop();
	}
	public function runPostClickActivationStep($event) {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLElement::runPostClickActivationStep");
		$»spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public function runCanceledActivationStep() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLElement::runCanceledActivationStep");
		$»spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public function runPreClickActivation() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLElement::runPreClickActivation");
		$»spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public function hasActivationBehaviour() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLElement::hasActivationBehaviour");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function requestFullScreen() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLElement::requestFullScreen");
		$»spos = $GLOBALS['%s']->length;
		$this->_ownerHTMLDocument->set_fullscreenElement($this);
		$GLOBALS['%s']->pop();
	}
	public function blur() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLElement::blur");
		$»spos = $GLOBALS['%s']->length;
		$this->_ownerHTMLDocument->body->focus();
		$GLOBALS['%s']->pop();
	}
	public function focus() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLElement::focus");
		$»spos = $GLOBALS['%s']->length;
		$this->_ownerHTMLDocument->set_activeElement($this);
		$GLOBALS['%s']->pop();
	}
	public function isDefaultFocusable() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLElement::isDefaultFocusable");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function isFocusable() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLElement::isFocusable");
		$»spos = $GLOBALS['%s']->length;
		if($this->parentNode === null) {
			$GLOBALS['%s']->pop();
			return false;
		} else {
			if($this->isDefaultFocusable() === true) {
				$GLOBALS['%s']->pop();
				return true;
			} else {
				if($this->get_tabIndex() > 0) {
					$GLOBALS['%s']->pop();
					return true;
				}
			}
		}
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function fireEvent($eventType, $bubbles, $cancelable) {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLElement::fireEvent");
		$»spos = $GLOBALS['%s']->length;
		$event = new cocktail_core_event_Event();
		$event->initEvent($eventType, $bubbles, $cancelable);
		$this->dispatchEvent($event);
		$GLOBALS['%s']->pop();
	}
	public function click() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLElement::click");
		$»spos = $GLOBALS['%s']->length;
		$mouseEvent = new cocktail_core_event_MouseEvent();
		$mouseEvent->initMouseEvent("click", false, false, null, 0, 0, 0, 0, 0, false, false, false, false, 0, null);
		$this->dispatchEvent($mouseEvent);
		$GLOBALS['%s']->pop();
	}
	public function endPendingAnimation() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLElement::endPendingAnimation");
		$»spos = $GLOBALS['%s']->length;
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
		$GLOBALS['%s']->pop();
	}
	public function startPendingAnimation() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLElement::startPendingAnimation");
		$»spos = $GLOBALS['%s']->length;
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
		{
			$GLOBALS['%s']->pop();
			return $atLeastOneAnimationStarted;
		}
		$GLOBALS['%s']->pop();
	}
	public function isParentRendered() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLElement::isParentRendered");
		$»spos = $GLOBALS['%s']->length;
		if($this->parentNode === null) {
			$GLOBALS['%s']->pop();
			return false;
		}
		{
			$»tmp = $this->parentNode->elementRenderer !== null;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function isRendered() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLElement::isRendered");
		$»spos = $GLOBALS['%s']->length;
		if($this->get_hidden() === true) {
			$GLOBALS['%s']->pop();
			return false;
		}
		if($this->coreStyle->isNone(_hx_deref((cocktail_core_html_HTMLElement_0($this)))->typedValue)) {
			$GLOBALS['%s']->pop();
			return false;
		}
		{
			$GLOBALS['%s']->pop();
			return true;
		}
		$GLOBALS['%s']->pop();
	}
	public function createElementRenderer() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLElement::createElementRenderer");
		$»spos = $GLOBALS['%s']->length;
		$»t = ($this->coreStyle->getKeyword(_hx_deref((cocktail_core_html_HTMLElement_1($this)))->typedValue));
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
		$GLOBALS['%s']->pop();
	}
	public function detachFromParentElementRenderer() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLElement::detachFromParentElementRenderer");
		$»spos = $GLOBALS['%s']->length;
		$this->elementRenderer->parentNode->removeChild($this->elementRenderer);
		$GLOBALS['%s']->pop();
	}
	public function attachToParentElementRenderer() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLElement::attachToParentElementRenderer");
		$»spos = $GLOBALS['%s']->length;
		$this->parentNode->elementRenderer->insertBefore($this->elementRenderer, $this->getNextElementRendererSibling());
		$GLOBALS['%s']->pop();
	}
	public function getNextElementRendererSibling() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLElement::getNextElementRendererSibling");
		$»spos = $GLOBALS['%s']->length;
		$nextSibling = $this->get_nextSibling();
		if($nextSibling === null) {
			$GLOBALS['%s']->pop();
			return null;
		} else {
			while($nextSibling !== null) {
				if($nextSibling->elementRenderer !== null) {
					$elementRenderParent = $nextSibling->elementRenderer->parentNode;
					if($elementRenderParent->isAnonymousBlockBox() === true) {
						$GLOBALS['%s']->pop();
						return $elementRenderParent;
					}
					{
						$»tmp = $nextSibling->elementRenderer;
						$GLOBALS['%s']->pop();
						return $»tmp;
						unset($»tmp);
					}
					unset($elementRenderParent);
				}
				$nextSibling = $nextSibling->get_nextSibling();
			}
		}
		{
			$GLOBALS['%s']->pop();
			return null;
		}
		$GLOBALS['%s']->pop();
	}
	public function onInlineStyleChange($changedProperty) {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLElement::onInlineStyleChange");
		$»spos = $GLOBALS['%s']->length;
		if($this->_shouldCascadeAllProperties === false) {
			$this->_pendingChangedProperties->push($changedProperty);
		}
		$this->invalidateCascade();
		$GLOBALS['%s']->pop();
	}
	public function cascadeSelf($cascadeManager, $programmaticChange) {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLElement::cascadeSelf");
		$»spos = $GLOBALS['%s']->length;
		$initialStyleDeclaration = $this->_ownerHTMLDocument->initialStyleDeclaration;
		if($this->parentNode !== null) {
			if($this->parentNode->styleManagerCSSDeclaration !== null) {
				if($this->_needsStyleDeclarationUpdate === true || $this->styleManagerCSSDeclaration === null) {
					$this->getStyleDeclaration();
					$this->_needsStyleDeclarationUpdate = false;
				}
				$parentStyleDeclaration = $this->parentNode->coreStyle->computedValues;
				$parentFontMetrics = $this->parentNode->coreStyle->fontMetrics;
				if($this->_shouldCascadeAllProperties === true) {
					$cascadeManager->shouldCascadeAll();
				} else {
					$length = $this->_pendingChangedProperties->length;
					{
						$_g = 0;
						while($_g < $length) {
							$i = $_g++;
							$cascadeManager->addPropertyToCascade($this->_pendingChangedProperties[$i]);
							unset($i);
						}
					}
				}
				$this->coreStyle->cascade($cascadeManager, $initialStyleDeclaration, $this->styleManagerCSSDeclaration, $this->style, $parentStyleDeclaration, $parentFontMetrics->fontSize, $parentFontMetrics->xHeight, $programmaticChange);
			}
		} else {
			if($this->_needsStyleDeclarationUpdate === true || $this->styleManagerCSSDeclaration === null) {
				$this->getStyleDeclaration();
				$this->_needsStyleDeclarationUpdate = false;
			}
			if($this->_shouldCascadeAllProperties === true) {
				$cascadeManager->shouldCascadeAll();
			} else {
				$length = $this->_pendingChangedProperties->length;
				{
					$_g = 0;
					while($_g < $length) {
						$i = $_g++;
						$cascadeManager->addPropertyToCascade($this->_pendingChangedProperties[$i]);
						unset($i);
					}
				}
			}
			$this->coreStyle->cascade($cascadeManager, $initialStyleDeclaration, $this->styleManagerCSSDeclaration, $this->style, $initialStyleDeclaration, 12, 12, $programmaticChange);
		}
		$this->_shouldCascadeAllProperties = false;
		$this->_pendingChangedProperties = cocktail_core_utils_Utils::clear($this->_pendingChangedProperties);
		$GLOBALS['%s']->pop();
	}
	public function getStyleDeclaration() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLElement::getStyleDeclaration");
		$»spos = $GLOBALS['%s']->length;
		$this->_shouldCascadeAllProperties = true;
		$this->styleManagerCSSDeclaration = $this->_ownerHTMLDocument->getStyleDeclaration($this);
		$GLOBALS['%s']->pop();
	}
	public function cascade($cascadeManager, $programmaticChange) {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLElement::cascade");
		$»spos = $GLOBALS['%s']->length;
		if($this->_needsCascading === true || $cascadeManager->hasPropertiesToCascade === true) {
			$this->cascadeSelf($cascadeManager, $programmaticChange);
			$this->_needsCascading = false;
			if($cascadeManager->hasDisplay === true || $cascadeManager->hasFloat === true || $cascadeManager->hasOverflowX === true || $cascadeManager->hasOverflowY === true) {
				$this->detach(true);
				$this->invalidateElementRenderer();
			} else {
				if($cascadeManager->hasTransform === true || $cascadeManager->hasZIndex === true || $cascadeManager->hasPosition === true) {
					$this->invalidateLayerRenderer();
				}
			}
		}
		$childNodes = $this->childNodes;
		$childLength = $childNodes->length;
		{
			$_g = 0;
			while($_g < $childLength) {
				$i = $_g++;
				$childNode = $childNodes[$i];
				$childNode->cascade($cascadeManager, $programmaticChange);
				unset($i,$childNode);
			}
		}
		$GLOBALS['%s']->pop();
	}
	public function detach($recursive) {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLElement::detach");
		$»spos = $GLOBALS['%s']->length;
		if($this->elementRenderer !== null) {
			if($recursive === true) {
				if($this->get_nodeType() === 1) {
					$length = $this->childNodes->length;
					{
						$_g = 0;
						while($_g < $length) {
							$i = $_g++;
							_hx_array_get($this->childNodes, $i)->detach(true);
							unset($i);
						}
					}
				}
			}
			$this->detachFromParentElementRenderer();
			$this->elementRenderer = null;
		}
		$GLOBALS['%s']->pop();
	}
	public function attach($recursive) {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLElement::attach");
		$»spos = $GLOBALS['%s']->length;
		if($this->isParentRendered() === false) {
			$GLOBALS['%s']->pop();
			return;
		}
		$this->createElementRenderer();
		if($this->elementRenderer !== null) {
			$this->attachToParentElementRenderer();
			if($recursive === true) {
				if($this->get_nodeType() === 1) {
					$length = $this->childNodes->length;
					{
						$_g = 0;
						while($_g < $length) {
							$i = $_g++;
							_hx_array_get($this->childNodes, $i)->attach(true);
							unset($i);
						}
					}
				}
			}
		}
		$this->_needsElementRendererUpdate = false;
		$GLOBALS['%s']->pop();
	}
	public function updateElementRenderer() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLElement::updateElementRenderer");
		$»spos = $GLOBALS['%s']->length;
		if($this->_needsElementRendererUpdate === true) {
			$this->_needsElementRendererUpdate = false;
			if($this->isRendered() === false) {
				if($this->elementRenderer !== null) {
					$this->detach(true);
					{
						$GLOBALS['%s']->pop();
						return;
					}
				}
			} else {
				if($this->elementRenderer === null) {
					$this->attach(true);
					{
						$GLOBALS['%s']->pop();
						return;
					}
				} else {
					$this->detach(false);
					$this->attach(false);
				}
			}
		}
		if($this->get_nodeType() === 1) {
			$length = $this->childNodes->length;
			{
				$_g = 0;
				while($_g < $length) {
					$i = $_g++;
					_hx_array_get($this->childNodes, $i)->updateElementRenderer();
					unset($i);
				}
			}
		}
		$GLOBALS['%s']->pop();
	}
	public function isAttachedToDOM() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLElement::isAttachedToDOM");
		$»spos = $GLOBALS['%s']->length;
		$parent = $this->parentNode;
		while($parent !== null) {
			if($parent->get_nodeName() === "HTML") {
				$GLOBALS['%s']->pop();
				return true;
			}
			$parent = $parent->parentNode;
		}
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function removedFromDOM() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLElement::removedFromDOM");
		$»spos = $GLOBALS['%s']->length;
		switch($this->get_nodeType()) {
		case 1:case 3:{
			$this->detach(true);
			$this->invalidateElementRenderer();
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	public function addedToDOM() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLElement::addedToDOM");
		$»spos = $GLOBALS['%s']->length;
		switch($this->get_nodeType()) {
		case 1:case 3:{
			$this->invalidateElementRenderer();
		}break;
		}
		$this->invalidateStyleDeclaration(true);
		$this->invalidateCascade();
		$GLOBALS['%s']->pop();
	}
	public function removed() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLElement::removed");
		$»spos = $GLOBALS['%s']->length;
		$this->attachedToDOM = false;
		$this->removedFromDOM();
		$child = $this->get_firstChild();
		while($child !== null) {
			$child->removed();
			$child = $child->get_nextSibling();
		}
		$GLOBALS['%s']->pop();
	}
	public function appended() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLElement::appended");
		$»spos = $GLOBALS['%s']->length;
		if($this->get_attachedToDOM() === false) {
			if($this->isAttachedToDOM() === true) {
				$this->attachedToDOM = true;
				$this->addedToDOM();
				$child = $this->get_firstChild();
				while($child !== null) {
					$child->appended();
					$child = $child->get_nextSibling();
				}
			}
		}
		$GLOBALS['%s']->pop();
	}
	public function invalidateCascade() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLElement::invalidateCascade");
		$»spos = $GLOBALS['%s']->length;
		$this->_needsCascading = true;
		if($this->_ownerHTMLDocument !== null) {
			$this->_ownerHTMLDocument->invalidationManager->invalidateCascade();
		}
		$GLOBALS['%s']->pop();
	}
	public function invalidateStyleDeclaration($recursive) {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLElement::invalidateStyleDeclaration");
		$»spos = $GLOBALS['%s']->length;
		$this->_needsStyleDeclarationUpdate = true;
		if($recursive === true) {
			if($this->get_nodeType() === 1) {
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
		}
		$this->invalidateCascade();
		$GLOBALS['%s']->pop();
	}
	public function invalidateLayerRenderer() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLElement::invalidateLayerRenderer");
		$»spos = $GLOBALS['%s']->length;
		if($this->elementRenderer !== null) {
			$this->elementRenderer->invalidateLayerRenderer();
		}
		$GLOBALS['%s']->pop();
	}
	public function invalidateElementRenderer() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLElement::invalidateElementRenderer");
		$»spos = $GLOBALS['%s']->length;
		$this->_needsElementRendererUpdate = true;
		if($this->_ownerHTMLDocument !== null) {
			$this->_ownerHTMLDocument->invalidationManager->invalidateRenderingTree();
		}
		$GLOBALS['%s']->pop();
	}
	public function updateDocumentImmediately() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLElement::updateDocumentImmediately");
		$»spos = $GLOBALS['%s']->length;
		if($this->elementRenderer !== null) {
			$this->_ownerHTMLDocument->invalidationManager->updateDocumentImmediately();
		}
		$GLOBALS['%s']->pop();
	}
	public function invalidateStyle($styleName) {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLElement::invalidateStyle");
		$»spos = $GLOBALS['%s']->length;
		if($this->elementRenderer !== null) {
			$this->elementRenderer->invalidateStyle($styleName);
		}
		$GLOBALS['%s']->pop();
	}
	public function invalidate() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLElement::invalidate");
		$»spos = $GLOBALS['%s']->length;
		if($this->elementRenderer !== null) {
			$this->elementRenderer->invalidate();
		}
		$GLOBALS['%s']->pop();
	}
	public function set_ownerDocument($value) {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLElement::set_ownerDocument");
		$»spos = $GLOBALS['%s']->length;
		parent::set_ownerDocument($value);
		$this->_ownerHTMLDocument = $value;
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function executeDefaultActionIfNeeded($defaultPrevented, $event) {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLElement::executeDefaultActionIfNeeded");
		$»spos = $GLOBALS['%s']->length;
		if($defaultPrevented === false) {
			switch($event->type) {
			case "mousedown":{
				$this->focus();
			}break;
			}
		}
		$GLOBALS['%s']->pop();
	}
	public function getTargetAncestors() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLElement::getTargetAncestors");
		$»spos = $GLOBALS['%s']->length;
		$targetAncestors = parent::getTargetAncestors();
		$targetAncestors->push(cocktail_Lib::get_document());
		$targetAncestors->push(cocktail_Lib::get_window());
		{
			$GLOBALS['%s']->pop();
			return $targetAncestors;
		}
		$GLOBALS['%s']->pop();
	}
	public function getAttribute($name) {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLElement::getAttribute");
		$»spos = $GLOBALS['%s']->length;
		if($name === "style") {
			$»tmp = $this->style->get_cssText();
			$GLOBALS['%s']->pop();
			return $»tmp;
		} else {
			if($name === "tabindex") {
				$»tmp = Std::string($this->get_tabIndex());
				$GLOBALS['%s']->pop();
				return $»tmp;
			} else {
				if($name === "style") {
					$»tmp = $this->style->get_cssText();
					$GLOBALS['%s']->pop();
					return $»tmp;
				} else {
					$»tmp = parent::getAttribute($name);
					$GLOBALS['%s']->pop();
					return $»tmp;
				}
			}
		}
		$GLOBALS['%s']->pop();
	}
	public function setAttribute($name, $value) {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLElement::setAttribute");
		$»spos = $GLOBALS['%s']->length;
		if($name === "style") {
			$this->style->set_cssText($value);
			$this->invalidateCascade();
		} else {
			if($name === "class") {
				$this->set_className($value);
			} else {
				parent::setAttribute($name,$value);
				$this->invalidateStyleDeclaration(true);
			}
		}
		$GLOBALS['%s']->pop();
	}
	public function getElementsByTagName($tagName) {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLElement::getElementsByTagName");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = parent::getElementsByTagName(strtoupper($tagName));
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function removeChild($oldChild) {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLElement::removeChild");
		$»spos = $GLOBALS['%s']->length;
		parent::removeChild($oldChild);
		$oldChild->removed();
		{
			$GLOBALS['%s']->pop();
			return $oldChild;
		}
		$GLOBALS['%s']->pop();
	}
	public function appendChild($newChild) {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLElement::appendChild");
		$»spos = $GLOBALS['%s']->length;
		parent::appendChild($newChild);
		$newChild->appended();
		$this->invalidateCascade();
		{
			$GLOBALS['%s']->pop();
			return $newChild;
		}
		$GLOBALS['%s']->pop();
	}
	public function initId() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLElement::initId");
		$»spos = $GLOBALS['%s']->length;
		$id = new cocktail_core_dom_Attr("id");
		$this->setIdAttributeNode($id, true);
		$GLOBALS['%s']->pop();
	}
	public function initStyle() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLElement::initStyle");
		$»spos = $GLOBALS['%s']->length;
		$this->style = new cocktail_core_css_CSSStyleDeclaration(null, (isset($this->onInlineStyleChange) ? $this->onInlineStyleChange: array($this, "onInlineStyleChange")));
		$GLOBALS['%s']->pop();
	}
	public function initCoreStyle() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLElement::initCoreStyle");
		$»spos = $GLOBALS['%s']->length;
		$this->coreStyle = new cocktail_core_css_CoreStyle($this);
		$GLOBALS['%s']->pop();
	}
	public function init() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLElement::init");
		$»spos = $GLOBALS['%s']->length;
		$this->initCoreStyle();
		$this->initStyle();
		$this->initId();
		$GLOBALS['%s']->pop();
	}
	public $_ownerHTMLDocument;
	public $_shouldCascadeAllProperties;
	public $_pendingChangedProperties;
	public $_needsElementRendererUpdate;
	public $_needsStyleDeclarationUpdate;
	public $_needsCascading;
	public $attachedToDOM;
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
	public $outerHTML;
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
	static $__properties__ = array("set_tabIndex" => "set_tabIndex","get_tabIndex" => "get_tabIndex","set_id" => "set_id","get_id" => "get_id","set_className" => "set_className","get_className" => "get_className","set_hidden" => "set_hidden","get_hidden" => "get_hidden","set_scrollTop" => "set_scrollTop","get_scrollTop" => "get_scrollTop","set_scrollLeft" => "set_scrollLeft","get_scrollLeft" => "get_scrollLeft","get_scrollHeight" => "get_scrollHeight","get_scrollWidth" => "get_scrollWidth","set_innerHTML" => "set_innerHTML","get_innerHTML" => "get_innerHTML","set_outerHTML" => "set_outerHTML","get_outerHTML" => "get_outerHTML","get_offsetParent" => "get_offsetParent","get_offsetWidth" => "get_offsetWidth","get_offsetHeight" => "get_offsetHeight","get_offsetLeft" => "get_offsetLeft","get_offsetTop" => "get_offsetTop","get_clientWidth" => "get_clientWidth","get_clientHeight" => "get_clientHeight","get_clientLeft" => "get_clientLeft","get_clientTop" => "get_clientTop","get_attachedToDOM" => "get_attachedToDOM","get_firstElementChild" => "get_firstElementChild","get_lastElementChild" => "get_lastElementChild","get_previousElementSibling" => "get_previousElementSibling","get_nextElementSibling" => "get_nextElementSibling","get_childElementCount" => "get_childElementCount","get_firstChild" => "get_firstChild","get_lastChild" => "get_lastChild","get_nextSibling" => "get_nextSibling","get_previousSibling" => "get_previousSibling","get_nodeType" => "get_nodeType","set_nodeValue" => "set_nodeValue","get_nodeValue" => "get_nodeValue","get_nodeName" => "get_nodeName","set_ownerDocument" => "set_ownerDocument","set_onclick" => "set_onClick","set_ondblclick" => "set_onDblClick","set_onmousedown" => "set_onMouseDown","set_onmouseup" => "set_onMouseUp","set_onmouseover" => "set_onMouseOver","set_onmouseout" => "set_onMouseOut","set_onmousemove" => "set_onMouseMove","set_onmousewheel" => "set_onMouseWheel","set_onkeydown" => "set_onKeyDown","set_onkeyup" => "set_onKeyUp","set_onfocus" => "set_onFocus","set_onblur" => "set_onBlur","set_onresize" => "set_onResize","set_onfullscreenchange" => "set_onFullScreenChange","set_onscroll" => "set_onScroll","set_onload" => "set_onLoad","set_onerror" => "set_onError","set_onloadstart" => "set_onLoadStart","set_onprogress" => "set_onProgress","set_onsuspend" => "set_onSuspend","set_onemptied" => "set_onEmptied","set_onstalled" => "set_onStalled","set_onloadedmetadata" => "set_onLoadedMetadata","set_onloadeddata" => "set_onLoadedData","set_oncanplay" => "set_onCanPlay","set_oncanplaythrough" => "set_onCanPlayThrough","set_onplaying" => "set_onPlaying","set_onwaiting" => "set_onWaiting","set_onseeking" => "set_onSeeking","set_onseeked" => "set_onSeeked","set_onended" => "set_onEnded","set_ondurationchange" => "set_onDurationChanged","set_ontimeupdate" => "set_onTimeUpdate","set_onplay" => "set_onPlay","set_onpause" => "set_onPause","set_onvolumechange" => "set_onVolumeChange","set_ontransitionend" => "set_onTransitionEnd","set_onpopstate" => "set_onPopState");
	function __toString() { return 'cocktail.core.html.HTMLElement'; }
}
function cocktail_core_html_HTMLElement_0(&$»this) {
	$»spos = $GLOBALS['%s']->length;
	{
		$_this = $»this->coreStyle->computedValues;
		$typedProperty = null;
		$length = $_this->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($_this->_properties, $i)->name === "display") {
					$typedProperty = $_this->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}
function cocktail_core_html_HTMLElement_1(&$»this) {
	$»spos = $GLOBALS['%s']->length;
	{
		$_this = $»this->coreStyle->computedValues;
		$typedProperty = null;
		$length = $_this->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($_this->_properties, $i)->name === "display") {
					$typedProperty = $_this->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}

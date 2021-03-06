<?php

class cocktail_core_graphics_GraphicsContext extends cocktail_core_utils_FastNode {
	public function __construct($layerRenderer) {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.graphics.GraphicsContext::new");
		$製pos = $GLOBALS['%s']->length;
		parent::__construct();
		$this->layerRenderer = $layerRenderer;
		$this->_needsNativeLayerUpdate = true;
		$this->graphics = new cocktail_core_graphics_AbstractGraphicsContextImpl();
		$GLOBALS['%s']->pop();
	}}
	public function get_nativeLayer() {
		$GLOBALS['%s']->push("cocktail.core.graphics.GraphicsContext::get_nativeLayer");
		$製pos = $GLOBALS['%s']->length;
		{
			$裨mp = $this->graphics->get_nativeLayer();
			$GLOBALS['%s']->pop();
			return $裨mp;
		}
		$GLOBALS['%s']->pop();
	}
	public function doDetach() {
		$GLOBALS['%s']->push("cocktail.core.graphics.GraphicsContext::doDetach");
		$製pos = $GLOBALS['%s']->length;
		$this->graphics->detach($this);
		$GLOBALS['%s']->pop();
	}
	public function doAttach() {
		$GLOBALS['%s']->push("cocktail.core.graphics.GraphicsContext::doAttach");
		$製pos = $GLOBALS['%s']->length;
		$index = 0;
		$previousGraphicsContextSibling = $this->previousSibling;
		while($previousGraphicsContextSibling !== null) {
			$index++;
			$previousGraphicsContextSibling = $previousGraphicsContextSibling->previousSibling;
		}
		$this->graphics->attach($this, $index);
		$GLOBALS['%s']->pop();
	}
	public function detach() {
		$GLOBALS['%s']->push("cocktail.core.graphics.GraphicsContext::detach");
		$製pos = $GLOBALS['%s']->length;
		$child = $this->firstChild;
		while($child !== null) {
			$child->detach();
			$child = $child->nextSibling;
		}
		$this->doDetach();
		$GLOBALS['%s']->pop();
	}
	public function attach() {
		$GLOBALS['%s']->push("cocktail.core.graphics.GraphicsContext::attach");
		$製pos = $GLOBALS['%s']->length;
		$this->doAttach();
		$child = $this->firstChild;
		while($child !== null) {
			$child->attach();
			$child = $child->nextSibling;
		}
		$GLOBALS['%s']->pop();
	}
	public function invalidateNativeLayer() {
		$GLOBALS['%s']->push("cocktail.core.graphics.GraphicsContext::invalidateNativeLayer");
		$製pos = $GLOBALS['%s']->length;
		$this->_needsNativeLayerUpdate = true;
		$htmlDocument = $this->layerRenderer->rootElementRenderer->domNode->ownerDocument;
		$htmlDocument->invalidationManager->invalidateNativeLayerTree();
		$GLOBALS['%s']->pop();
	}
	public function updateNativeLayer() {
		$GLOBALS['%s']->push("cocktail.core.graphics.GraphicsContext::updateNativeLayer");
		$製pos = $GLOBALS['%s']->length;
		if($this->_needsNativeLayerUpdate === true) {
			$this->_needsNativeLayerUpdate = false;
			$this->detach();
			$this->attach();
			{
				$GLOBALS['%s']->pop();
				return;
			}
		}
		$child = $this->firstChild;
		while($child !== null) {
			$child->updateNativeLayer();
			$child = $child->nextSibling;
		}
		$GLOBALS['%s']->pop();
	}
	public function insertBefore($newChild, $refChild) {
		$GLOBALS['%s']->push("cocktail.core.graphics.GraphicsContext::insertBefore");
		$製pos = $GLOBALS['%s']->length;
		parent::insertBefore($newChild,$refChild);
		$newChild->invalidateNativeLayer();
		$GLOBALS['%s']->pop();
	}
	public function removeChild($oldChild) {
		$GLOBALS['%s']->push("cocktail.core.graphics.GraphicsContext::removeChild");
		$製pos = $GLOBALS['%s']->length;
		$oldChild->detach();
		$oldChild->invalidateNativeLayer();
		parent::removeChild($oldChild);
		$GLOBALS['%s']->pop();
	}
	public function appendChild($newChild) {
		$GLOBALS['%s']->push("cocktail.core.graphics.GraphicsContext::appendChild");
		$製pos = $GLOBALS['%s']->length;
		parent::appendChild($newChild);
		$newChild->invalidateNativeLayer();
		$GLOBALS['%s']->pop();
	}
	public function dispose() {
		$GLOBALS['%s']->push("cocktail.core.graphics.GraphicsContext::dispose");
		$製pos = $GLOBALS['%s']->length;
		$this->graphics->dispose();
		$this->graphics = null;
		$this->layerRenderer = null;
		$GLOBALS['%s']->pop();
	}
	public $_needsNativeLayerUpdate;
	public $graphics;
	public $layerRenderer;
	public $nativeLayer;
	public function __call($m, $a) {
		if(isset($this->$m) && is_callable($this->$m))
			return call_user_func_array($this->$m, $a);
		else if(isset($this->蜿ynamics[$m]) && is_callable($this->蜿ynamics[$m]))
			return call_user_func_array($this->蜿ynamics[$m], $a);
		else if('toString' == $m)
			return $this->__toString();
		else
			throw new HException('Unable to call �'.$m.'�');
	}
	static $__properties__ = array("get_nativeLayer" => "get_nativeLayer");
	function __toString() { return 'cocktail.core.graphics.GraphicsContext'; }
}

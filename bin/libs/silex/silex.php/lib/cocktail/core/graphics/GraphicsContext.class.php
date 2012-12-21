<?php

class cocktail_core_graphics_GraphicsContext extends cocktail_core_utils_FastNode {
	public function __construct($layerRenderer) {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.graphics.GraphicsContext::new");
		$»spos = $GLOBALS['%s']->length;
		parent::__construct();
		$this->layerRenderer = $layerRenderer;
		$this->_needsNativeLayerUpdate = true;
		$this->graphics = new cocktail_core_graphics_AbstractGraphicsContextImpl();
		$GLOBALS['%s']->pop();
	}}
	public function get_nativeLayer() {
		$GLOBALS['%s']->push("cocktail.core.graphics.GraphicsContext::get_nativeLayer");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->graphics->get_nativeLayer();
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function doDetach() {
		$GLOBALS['%s']->push("cocktail.core.graphics.GraphicsContext::doDetach");
		$»spos = $GLOBALS['%s']->length;
		$this->graphics->detach($this);
		$GLOBALS['%s']->pop();
	}
	public function doAttach() {
		$GLOBALS['%s']->push("cocktail.core.graphics.GraphicsContext::doAttach");
		$»spos = $GLOBALS['%s']->length;
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
		$»spos = $GLOBALS['%s']->length;
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
		$»spos = $GLOBALS['%s']->length;
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
		$»spos = $GLOBALS['%s']->length;
		$this->_needsNativeLayerUpdate = true;
		$htmlDocument = $this->layerRenderer->rootElementRenderer->domNode->ownerDocument;
		$htmlDocument->invalidationManager->invalidateNativeLayerTree();
		$GLOBALS['%s']->pop();
	}
	public function updateNativeLayer() {
		$GLOBALS['%s']->push("cocktail.core.graphics.GraphicsContext::updateNativeLayer");
		$»spos = $GLOBALS['%s']->length;
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
		$»spos = $GLOBALS['%s']->length;
		parent::insertBefore($newChild,$refChild);
		$newChild->invalidateNativeLayer();
		$GLOBALS['%s']->pop();
	}
	public function removeChild($oldChild) {
		$GLOBALS['%s']->push("cocktail.core.graphics.GraphicsContext::removeChild");
		$»spos = $GLOBALS['%s']->length;
		$oldChild->detach();
		$oldChild->invalidateNativeLayer();
		parent::removeChild($oldChild);
		$GLOBALS['%s']->pop();
	}
	public function appendChild($newChild) {
		$GLOBALS['%s']->push("cocktail.core.graphics.GraphicsContext::appendChild");
		$»spos = $GLOBALS['%s']->length;
		parent::appendChild($newChild);
		$newChild->invalidateNativeLayer();
		$GLOBALS['%s']->pop();
	}
	public function dispose() {
		$GLOBALS['%s']->push("cocktail.core.graphics.GraphicsContext::dispose");
		$»spos = $GLOBALS['%s']->length;
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
		else if(isset($this->»dynamics[$m]) && is_callable($this->»dynamics[$m]))
			return call_user_func_array($this->»dynamics[$m], $a);
		else if('toString' == $m)
			return $this->__toString();
		else
			throw new HException('Unable to call «'.$m.'»');
	}
	static $__properties__ = array("get_nativeLayer" => "get_nativeLayer");
	function __toString() { return 'cocktail.core.graphics.GraphicsContext'; }
}

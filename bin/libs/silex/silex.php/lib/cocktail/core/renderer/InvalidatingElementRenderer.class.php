<?php

class cocktail_core_renderer_InvalidatingElementRenderer extends cocktail_core_renderer_ElementRenderer {
	public function __construct($domNode) {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.renderer.InvalidatingElementRenderer::new");
		$»spos = $GLOBALS['%s']->length;
		parent::__construct($domNode);
		$this->_needsLayout = true;
		$this->_childrenNeedLayout = true;
		$this->_positionedChildrenNeedLayout = true;
		$GLOBALS['%s']->pop();
	}}
	public function invalidateText() {
		$GLOBALS['%s']->push("cocktail.core.renderer.InvalidatingElementRenderer::invalidateText");
		$»spos = $GLOBALS['%s']->length;
		$child = $this->firstChild;
		while($child !== null) {
			if($child->isText() === true) {
				$child->invalidate();
			}
			$child = $child->nextSibling;
		}
		$GLOBALS['%s']->pop();
	}
	public function invalidateLayoutAndRendering() {
		$GLOBALS['%s']->push("cocktail.core.renderer.InvalidatingElementRenderer::invalidateLayoutAndRendering");
		$»spos = $GLOBALS['%s']->length;
		$this->_needsLayout = true;
		$htmlDocument = $this->domNode->ownerDocument;
		$htmlDocument->invalidationManager->invalidateLayout(false);
		if($this->layerRenderer !== null) {
			$this->layerRenderer->invalidateRendering();
		}
		$GLOBALS['%s']->pop();
	}
	public function invalidateLayout() {
		$GLOBALS['%s']->push("cocktail.core.renderer.InvalidatingElementRenderer::invalidateLayout");
		$»spos = $GLOBALS['%s']->length;
		$this->_needsLayout = true;
		$htmlDocument = $this->domNode->ownerDocument;
		if($htmlDocument !== null) {
			$htmlDocument->invalidationManager->invalidateLayout(false);
		}
		$GLOBALS['%s']->pop();
	}
	public function invalidatedPositionedChildStyle($styleName) {
		$GLOBALS['%s']->push("cocktail.core.renderer.InvalidatingElementRenderer::invalidatedPositionedChildStyle");
		$»spos = $GLOBALS['%s']->length;
		switch($styleName) {
		case "background-color":case "background-clip":case "background-image":case "background-position":case "background-origin":case "background-repeat":case "background-size":{
		}break;
		default:{
			$this->_positionedChildrenNeedLayout = true;
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	public function invalidatedChildStyle($styleName) {
		$GLOBALS['%s']->push("cocktail.core.renderer.InvalidatingElementRenderer::invalidatedChildStyle");
		$»spos = $GLOBALS['%s']->length;
		switch($styleName) {
		case "background-color":case "background-clip":case "background-image":case "background-position":case "background-origin":case "background-repeat":case "background-size":{
		}break;
		default:{
			$this->_childrenNeedLayout = true;
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	public function invalidatedStyle($styleName) {
		$GLOBALS['%s']->push("cocktail.core.renderer.InvalidatingElementRenderer::invalidatedStyle");
		$»spos = $GLOBALS['%s']->length;
		switch($styleName) {
		case "left":case "right":case "top":case "bottom":{
			if($this->isPositioned() === true && $this->isRelativePositioned() === false) {
				$this->invalidateLayoutAndRendering();
				$this->invalidateContainingBlock($styleName);
			} else {
				$this->invalidateRendering();
			}
		}break;
		case "color":case "font-family":case "font-size":case "font-variant":case "font-style":case "font-weight":case "letter-spacing":case "text-transform":case "white-space":{
			$this->invalidateText();
			$this->invalidateLayoutAndRendering();
			$this->invalidateContainingBlock($styleName);
		}break;
		case "opacity":case "visibility":{
			$this->invalidateRendering();
		}break;
		case "background-color":case "background-clip":case "background-image":case "background-position":case "background-origin":case "background-repeat":case "background-size":{
			$this->invalidateRendering();
		}break;
		default:{
			$this->invalidateLayout();
			$this->invalidateContainingBlock($styleName);
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	public function invalidateContainingBlock($styleName) {
		$GLOBALS['%s']->push("cocktail.core.renderer.InvalidatingElementRenderer::invalidateContainingBlock");
		$»spos = $GLOBALS['%s']->length;
		if($this->containingBlock === null) {
			$GLOBALS['%s']->pop();
			return;
		}
		if($this->isPositioned() === true && $this->isRelativePositioned() === false) {
			$this->containingBlock->invalidatedChildStyle($styleName);
		} else {
			$this->containingBlock->invalidatedPositionedChildStyle($styleName);
		}
		$GLOBALS['%s']->pop();
	}
	public function positionedChildInvalidated() {
		$GLOBALS['%s']->push("cocktail.core.renderer.InvalidatingElementRenderer::positionedChildInvalidated");
		$»spos = $GLOBALS['%s']->length;
		$this->invalidate();
		$GLOBALS['%s']->pop();
	}
	public function childInvalidated() {
		$GLOBALS['%s']->push("cocktail.core.renderer.InvalidatingElementRenderer::childInvalidated");
		$»spos = $GLOBALS['%s']->length;
		$this->invalidate();
		$GLOBALS['%s']->pop();
	}
	public function invalidateStyle($styleName) {
		$GLOBALS['%s']->push("cocktail.core.renderer.InvalidatingElementRenderer::invalidateStyle");
		$»spos = $GLOBALS['%s']->length;
		switch($styleName) {
		case "left":case "right":case "top":case "bottom":{
			if($this->isPositioned() === true && $this->isRelativePositioned() === false) {
				$this->invalidateLayoutAndRendering();
				$this->invalidateContainingBlock($styleName);
			} else {
				$this->invalidateRendering();
			}
		}break;
		case "color":case "font-family":case "font-size":case "font-variant":case "font-style":case "font-weight":case "letter-spacing":case "text-transform":case "white-space":{
			$this->invalidateText();
			$this->invalidateLayoutAndRendering();
			$this->invalidateContainingBlock($styleName);
		}break;
		case "opacity":case "visibility":{
			$this->invalidateRendering();
		}break;
		case "background-color":case "background-clip":case "background-image":case "background-position":case "background-origin":case "background-repeat":case "background-size":{
			$this->invalidateRendering();
		}break;
		default:{
			$this->invalidateLayout();
			$this->invalidateContainingBlock($styleName);
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	public function invalidateRendering() {
		$GLOBALS['%s']->push("cocktail.core.renderer.InvalidatingElementRenderer::invalidateRendering");
		$»spos = $GLOBALS['%s']->length;
		if($this->layerRenderer !== null) {
			$this->layerRenderer->invalidateRendering();
		}
		$GLOBALS['%s']->pop();
	}
	public function invalidate() {
		$GLOBALS['%s']->push("cocktail.core.renderer.InvalidatingElementRenderer::invalidate");
		$»spos = $GLOBALS['%s']->length;
		$this->_childrenNeedLayout = true;
		$this->_positionedChildrenNeedLayout = true;
		$this->invalidateLayoutAndRendering();
		$GLOBALS['%s']->pop();
	}
	public function addedToRenderingTree() {
		$GLOBALS['%s']->push("cocktail.core.renderer.InvalidatingElementRenderer::addedToRenderingTree");
		$»spos = $GLOBALS['%s']->length;
		parent::addedToRenderingTree();
		$this->invalidateLayout();
		$GLOBALS['%s']->pop();
	}
	public $_positionedChildrenNeedLayout;
	public $_childrenNeedLayout;
	public $_needsLayout;
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
	static $__properties__ = array("get_bounds" => "get_bounds","get_globalBounds" => "get_globalBounds","get_scrollableBounds" => "get_scrollableBounds","set_scrollLeft" => "set_scrollLeft","get_scrollLeft" => "get_scrollLeft","set_scrollTop" => "set_scrollTop","get_scrollTop" => "get_scrollTop","get_scrollWidth" => "get_scrollWidth","get_scrollHeight" => "get_scrollHeight");
	function __toString() { return 'cocktail.core.renderer.InvalidatingElementRenderer'; }
}

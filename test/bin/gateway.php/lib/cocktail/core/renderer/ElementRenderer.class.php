<?php

class cocktail_core_renderer_ElementRenderer extends cocktail_core_dom_NodeBase {
	public function __construct($domNode) {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::new");
		$»spos = $GLOBALS['%s']->length;
		parent::__construct();
		$this->domNode = $domNode;
		$this->_hasOwnLayer = false;
		$this->_wasPositioned = false;
		$this->set_bounds(new cocktail_core_geom_RectangleVO(0.0, 0.0, 0.0, 0.0));
		$this->scrollOffset = new cocktail_core_geom_PointVO(0.0, 0.0);
		$this->positionedOrigin = new cocktail_core_geom_PointVO(0.0, 0.0);
		$this->globalPositionnedAncestorOrigin = new cocktail_core_geom_PointVO(0.0, 0.0);
		$this->globalContainingBlockOrigin = new cocktail_core_geom_PointVO(0.0, 0.0);
		$this->lineBoxes = new _hx_array(array());
		$GLOBALS['%s']->pop();
	}}
	public function get_scrollHeight() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::get_scrollHeight");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->get_bounds()->height;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_scrollWidth() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::get_scrollWidth");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->get_bounds()->width;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_scrollTop($value) {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::set_scrollTop");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_scrollTop() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::get_scrollTop");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return 0;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_scrollLeft($value) {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::set_scrollLeft");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_scrollLeft() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::get_scrollLeft");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return 0;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_bounds($value) {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::set_bounds");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->bounds = $value;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_bounds() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::get_bounds");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->bounds;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_scrollableBounds() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::get_scrollableBounds");
		$»spos = $GLOBALS['%s']->length;
		if($this->isRelativePositioned() === false) {
			$»tmp = $this->get_bounds();
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$relativeOffset = $this->getRelativeOffset();
		$bounds = $this->get_bounds();
		{
			$»tmp = new cocktail_core_geom_RectangleVO($bounds->x + $relativeOffset->x, $bounds->y + $relativeOffset->y, $bounds->width, $bounds->height);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_globalBounds() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::get_globalBounds");
		$»spos = $GLOBALS['%s']->length;
		$globalX = null;
		$globalY = null;
		$bounds = $this->get_bounds();
		$positionKeyword = $this->coreStyle->getKeyword($this->coreStyle->get_position());
		if($positionKeyword === cocktail_core_css_CSSKeywordValue::$FIXED) {
			if($this->coreStyle->isAuto($this->coreStyle->get_left()) === true && $this->coreStyle->isAuto($this->coreStyle->get_right()) === true) {
				$globalX = $this->globalContainingBlockOrigin->x + $bounds->x;
			} else {
				$globalX = $this->positionedOrigin->x;
			}
			if($this->coreStyle->isAuto($this->coreStyle->get_top()) === true && $this->coreStyle->isAuto($this->coreStyle->get_bottom()) === true) {
				$globalY = $this->globalContainingBlockOrigin->y + $bounds->y;
			} else {
				$globalY = $this->positionedOrigin->y;
			}
		} else {
			if($positionKeyword === cocktail_core_css_CSSKeywordValue::$ABSOLUTE) {
				if($this->coreStyle->isAuto($this->coreStyle->get_left()) === true && $this->coreStyle->isAuto($this->coreStyle->get_right()) === true) {
					$globalX = $this->globalContainingBlockOrigin->x + $bounds->x;
				} else {
					$globalX = $this->globalPositionnedAncestorOrigin->x + $this->positionedOrigin->x;
				}
				if($this->coreStyle->isAuto($this->coreStyle->get_top()) === true && $this->coreStyle->isAuto($this->coreStyle->get_bottom()) === true) {
					$globalY = $this->globalContainingBlockOrigin->y + $bounds->y;
				} else {
					$globalY = $this->globalPositionnedAncestorOrigin->y + $this->positionedOrigin->y;
				}
			} else {
				$globalX = $this->globalContainingBlockOrigin->x + $bounds->x;
				$globalY = $this->globalContainingBlockOrigin->y + $bounds->y;
			}
		}
		{
			$»tmp = new cocktail_core_geom_RectangleVO($globalX, $globalY, $bounds->width, $bounds->height);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function invalidate($invalidationReason) {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::invalidate");
		$»spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public function getChildrenBounds($childrenBounds) {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::getChildrenBounds");
		$»spos = $GLOBALS['%s']->length;
		$bounds = null;
		$left = 50000;
		$top = 50000;
		$right = -50000;
		$bottom = -50000;
		$length = $childrenBounds->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				$childBounds = $childrenBounds[$i];
				if($childBounds->x < $left) {
					$left = $childBounds->x;
				}
				if($childBounds->y < $top) {
					$top = $childBounds->y;
				}
				if($childBounds->x + $childBounds->width > $right) {
					$right = $childBounds->x + $childBounds->width;
				}
				if($childBounds->y + $childBounds->height > $bottom) {
					$bottom = $childBounds->y + $childBounds->height;
				}
				unset($i,$childBounds);
			}
		}
		$bounds = new cocktail_core_geom_RectangleVO($left, $top, $right - $left, $bottom - $top);
		if($bounds->width < 0) {
			$bounds->width = 0;
		}
		if($bounds->height < 0) {
			$bounds->height = 0;
		}
		{
			$GLOBALS['%s']->pop();
			return $bounds;
		}
		$GLOBALS['%s']->pop();
	}
	public function getFirstBlockContainer() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::getFirstBlockContainer");
		$»spos = $GLOBALS['%s']->length;
		$parent = $this->parentNode;
		while($parent->isBlockContainer() === false) {
			$parent = $parent->parentNode;
		}
		{
			$»tmp = $parent;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getInitialContainingBlock() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::getInitialContainingBlock");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->domNode->ownerDocument->documentElement->elementRenderer;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getFirstPositionedAncestor() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::getFirstPositionedAncestor");
		$»spos = $GLOBALS['%s']->length;
		$parent = $this->parentNode;
		while($parent->isPositioned() === false) {
			if($parent->parentNode === null) {
				break;
			}
			$parent = $parent->parentNode;
		}
		{
			$»tmp = $parent;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getContainingBlock() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::getContainingBlock");
		$»spos = $GLOBALS['%s']->length;
		if($this->isPositioned() === true && $this->isRelativePositioned() === false) {
			if($this->coreStyle->getKeyword($this->coreStyle->get_position()) == cocktail_core_css_CSSKeywordValue::$FIXED) {
				$»tmp = $this->getInitialContainingBlock();
				$GLOBALS['%s']->pop();
				return $»tmp;
			} else {
				$»tmp = $this->getFirstPositionedAncestor();
				$GLOBALS['%s']->pop();
				return $»tmp;
			}
		} else {
			$»tmp = $this->getFirstBlockContainer();
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function createLayer($parentLayer) {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::createLayer");
		$»spos = $GLOBALS['%s']->length;
		if($this->createOwnLayer() === true) {
			$this->layerRenderer = new cocktail_core_layer_LayerRenderer($this);
			$parentLayer->appendChild($this->layerRenderer);
			$this->_hasOwnLayer = true;
		} else {
			$this->layerRenderer = $parentLayer;
		}
		$GLOBALS['%s']->pop();
	}
	public function rendersAsIfCreateOwnLayer() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::rendersAsIfCreateOwnLayer");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function getRelativeOffset() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::getRelativeOffset");
		$»spos = $GLOBALS['%s']->length;
		$relativeOffset = new cocktail_core_geom_PointVO(0.0, 0.0);
		if($this->isRelativePositioned() === true) {
			if($this->coreStyle->isAuto($this->coreStyle->get_left()) === false) {
				$relativeOffset->x += $this->coreStyle->usedValues->left;
			} else {
				if($this->coreStyle->isAuto($this->coreStyle->get_right()) === false) {
					$relativeOffset->x -= $this->coreStyle->usedValues->right;
				}
			}
			if($this->coreStyle->isAuto($this->coreStyle->get_top()) === false) {
				$relativeOffset->y += $this->coreStyle->usedValues->top;
			} else {
				if($this->coreStyle->isAuto($this->coreStyle->get_bottom()) === false) {
					$relativeOffset->y -= $this->coreStyle->usedValues->bottom;
				}
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $relativeOffset;
		}
		$GLOBALS['%s']->pop();
	}
	public function createOwnLayer() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::createOwnLayer");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function isVisible() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::isVisible");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return true;
		}
		$GLOBALS['%s']->pop();
	}
	public function isTransformed() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::isTransformed");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function isAnonymousBlockBox() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::isAnonymousBlockBox");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function childrenInline() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::childrenInline");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function isBlockContainer() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::isBlockContainer");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function isTransparent() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::isTransparent");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function isRelativePositioned() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::isRelativePositioned");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function isText() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::isText");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function isReplaced() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::isReplaced");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function isInlineLevel() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::isInlineLevel");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function isPositioned() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::isPositioned");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function isFloat() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::isFloat");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function isScrollBar() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::isScrollBar");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function establishesNewFormattingContext() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::establishesNewFormattingContext");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function isHorizontallyScrollable($scrollOffset) {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::isHorizontallyScrollable");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function isVerticallyScrollable($scrollOffset) {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::isVerticallyScrollable");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function unregisterWithContainingBlock() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::unregisterWithContainingBlock");
		$»spos = $GLOBALS['%s']->length;
		if($this->_wasPositioned === true) {
			$this->_containingBlock->removePositionedChild($this);
			$this->_wasPositioned = false;
		}
		$GLOBALS['%s']->pop();
	}
	public function registerWithContaininingBlock() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::registerWithContaininingBlock");
		$»spos = $GLOBALS['%s']->length;
		if($this->isPositioned() === true) {
			$this->_containingBlock->addPositionedChildren($this);
			$this->_wasPositioned = true;
		}
		$GLOBALS['%s']->pop();
	}
	public function detachLayer() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::detachLayer");
		$»spos = $GLOBALS['%s']->length;
		if($this->_hasOwnLayer === true) {
			$parent = $this->parentNode;
			$parent->layerRenderer->removeChild($this->layerRenderer);
			$this->_hasOwnLayer = false;
		}
		$this->layerRenderer = null;
		$GLOBALS['%s']->pop();
	}
	public function attachLayer() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::attachLayer");
		$»spos = $GLOBALS['%s']->length;
		if($this->layerRenderer === null) {
			if($this->parentNode !== null) {
				$parent = $this->parentNode;
				if($parent->layerRenderer !== null) {
					$this->createLayer($parent->layerRenderer);
				}
			}
		}
		$GLOBALS['%s']->pop();
	}
	public function detach() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::detach");
		$»spos = $GLOBALS['%s']->length;
		$this->unregisterWithContainingBlock();
		$this->_containingBlock = null;
		$length = $this->childNodes->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				$child = $this->childNodes[$i];
				$child->detach();
				unset($i,$child);
			}
		}
		$this->detachLayer();
		$GLOBALS['%s']->pop();
	}
	public function attach() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::attach");
		$»spos = $GLOBALS['%s']->length;
		$this->attachLayer();
		$length = $this->childNodes->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				$child = $this->childNodes[$i];
				$child->attach();
				unset($i,$child);
			}
		}
		$this->_containingBlock = $this->getContainingBlock();
		$this->registerWithContaininingBlock();
		$GLOBALS['%s']->pop();
	}
	public function setGlobalOrigins($addedX, $addedY, $addedPositionedX, $addedPositionedY, $addedScrollX, $addedScrollY) {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::setGlobalOrigins");
		$»spos = $GLOBALS['%s']->length;
		if($this->establishesNewFormattingContext() === true) {
			$globalBounds = $this->get_globalBounds();
			$addedX = $globalBounds->x;
			$addedY = $globalBounds->y;
		}
		if($this->isPositioned() === true) {
			$globalBounds = $this->get_globalBounds();
			$addedPositionedX = $globalBounds->x;
			$addedPositionedY = $globalBounds->y;
		}
		if($this->coreStyle->getKeyword($this->coreStyle->get_position()) != cocktail_core_css_CSSKeywordValue::$FIXED) {
			$addedScrollX += $this->get_scrollLeft();
			$addedScrollY += $this->get_scrollTop();
		} else {
			$addedScrollX = 0;
			$addedScrollY = 0;
		}
		$length = $this->childNodes->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				$child = $this->childNodes[$i];
				$currentChildGlobalBounds = $child->get_globalBounds();
				$child->globalContainingBlockOrigin->x = $addedX;
				$child->globalContainingBlockOrigin->y = $addedY;
				$child->globalPositionnedAncestorOrigin->x = $addedPositionedX;
				$child->globalPositionnedAncestorOrigin->y = $addedPositionedY;
				$child->scrollOffset->x = $addedScrollX;
				$child->scrollOffset->y = $addedScrollY;
				$newChildGlobalBounds = $child->get_globalBounds();
				if($currentChildGlobalBounds->x !== $newChildGlobalBounds->x || $currentChildGlobalBounds->y !== $newChildGlobalBounds->y || $currentChildGlobalBounds->width !== $newChildGlobalBounds->width || $currentChildGlobalBounds->height !== $newChildGlobalBounds->height) {
					$child->layerRenderer->invalidateRendering();
				}
				if($child->hasChildNodes() === true) {
					$child->setGlobalOrigins($addedX, $addedY, $addedPositionedX, $addedPositionedY, $addedScrollX, $addedScrollY);
				}
				unset($newChildGlobalBounds,$i,$currentChildGlobalBounds,$child);
			}
		}
		$GLOBALS['%s']->pop();
	}
	public function layout($forceLayout) {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::layout");
		$»spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public function renderScrollBars($graphicContext, $windowWidth, $windowHeight) {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::renderScrollBars");
		$»spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public function render($parentGraphicContext) {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::render");
		$»spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public function removeChild($oldChild) {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::removeChild");
		$»spos = $GLOBALS['%s']->length;
		$oldChild->detach();
		parent::removeChild($oldChild);
		$this->invalidate(cocktail_core_renderer_InvalidationReason::$other);
		{
			$GLOBALS['%s']->pop();
			return $oldChild;
		}
		$GLOBALS['%s']->pop();
	}
	public function appendChild($newChild) {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::appendChild");
		$»spos = $GLOBALS['%s']->length;
		parent::appendChild($newChild);
		$newChild->attach();
		$this->invalidate(cocktail_core_renderer_InvalidationReason::$other);
		{
			$GLOBALS['%s']->pop();
			return $newChild;
		}
		$GLOBALS['%s']->pop();
	}
	public $_containingBlock;
	public $scrollHeight;
	public $scrollWidth;
	public $scrollTop;
	public $scrollLeft;
	public $_wasPositioned;
	public $_hasOwnLayer;
	public $lineBoxes;
	public $layerRenderer;
	public $coreStyle;
	public $domNode;
	public $scrollOffset;
	public $globalPositionnedAncestorOrigin;
	public $positionedOrigin;
	public $globalContainingBlockOrigin;
	public $scrollableBounds;
	public $globalBounds;
	public $bounds;
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
	function __toString() { return 'cocktail.core.renderer.ElementRenderer'; }
}

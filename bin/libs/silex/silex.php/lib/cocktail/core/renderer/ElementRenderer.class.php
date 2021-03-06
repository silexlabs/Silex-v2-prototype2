<?php

class cocktail_core_renderer_ElementRenderer extends cocktail_core_utils_FastNode {
	public function __construct($domNode) {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::new");
		$製pos = $GLOBALS['%s']->length;
		parent::__construct();
		$this->domNode = $domNode;
		$this->initCoreStyle();
		$this->_hasOwnLayer = false;
		$this->_wasPositioned = false;
		$this->_needsLayerRendererUpdate = true;
		$this->bounds = new cocktail_core_geom_RectangleVO();
		$this->globalBounds = new cocktail_core_geom_RectangleVO();
		$this->scrollOffset = new cocktail_core_geom_PointVO(0.0, 0.0);
		$this->positionedOrigin = new cocktail_core_geom_PointVO(0.0, 0.0);
		$this->globalPositionnedAncestorOrigin = new cocktail_core_geom_PointVO(0.0, 0.0);
		$this->globalContainingBlockOrigin = new cocktail_core_geom_PointVO(0.0, 0.0);
		$this->scrollableBounds = new cocktail_core_geom_RectangleVO();
		$this->_childrenBounds = new cocktail_core_geom_RectangleVO();
		$this->lineBoxes = new _hx_array(array());
		$GLOBALS['%s']->pop();
	}}
	public function get_scrollHeight() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::get_scrollHeight");
		$製pos = $GLOBALS['%s']->length;
		{
			$裨mp = $this->get_bounds()->height;
			$GLOBALS['%s']->pop();
			return $裨mp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_scrollWidth() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::get_scrollWidth");
		$製pos = $GLOBALS['%s']->length;
		{
			$裨mp = $this->get_bounds()->width;
			$GLOBALS['%s']->pop();
			return $裨mp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_scrollTop($value) {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::set_scrollTop");
		$製pos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_scrollTop() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::get_scrollTop");
		$製pos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return 0;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_scrollLeft($value) {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::set_scrollLeft");
		$製pos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_scrollLeft() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::get_scrollLeft");
		$製pos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return 0;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_bounds() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::get_bounds");
		$製pos = $GLOBALS['%s']->length;
		{
			$裨mp = $this->bounds;
			$GLOBALS['%s']->pop();
			return $裨mp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_scrollableBounds() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::get_scrollableBounds");
		$製pos = $GLOBALS['%s']->length;
		if($this->isRelativePositioned() === false) {
			$裨mp = $this->get_bounds();
			$GLOBALS['%s']->pop();
			return $裨mp;
		}
		$relativeOffset = $this->getRelativeOffset();
		$bounds = $this->get_bounds();
		$this->scrollableBounds->x = $bounds->x + $relativeOffset->x;
		$this->scrollableBounds->y = $bounds->y + $relativeOffset->y;
		$this->scrollableBounds->width = $bounds->width;
		$this->scrollableBounds->height = $bounds->height;
		{
			$裨mp = $this->scrollableBounds;
			$GLOBALS['%s']->pop();
			return $裨mp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_globalBounds() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::get_globalBounds");
		$製pos = $GLOBALS['%s']->length;
		{
			$裨mp = $this->globalBounds;
			$GLOBALS['%s']->pop();
			return $裨mp;
		}
		$GLOBALS['%s']->pop();
	}
	public function invalidateRendering() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::invalidateRendering");
		$製pos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public function invalidateStyle($styleName) {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::invalidateStyle");
		$製pos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public function invalidate() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::invalidate");
		$製pos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public function doGetChildrenBounds($rootElementRenderer, $bounds) {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::doGetChildrenBounds");
		$製pos = $GLOBALS['%s']->length;
		$child = $rootElementRenderer->firstChild;
		while($child !== null) {
			$this->doGetBounds($child->get_bounds(), $bounds);
			if($child->firstChild !== null) {
				$this->doGetChildrenBounds($child, $bounds);
			}
			$child = $child->nextSibling;
		}
		$GLOBALS['%s']->pop();
	}
	public function doGetBounds($childBounds, $globalBounds) {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::doGetBounds");
		$製pos = $GLOBALS['%s']->length;
		if($childBounds->x < $globalBounds->x) {
			$globalBounds->x = $childBounds->x;
		}
		if($childBounds->y < $globalBounds->y) {
			$globalBounds->y = $childBounds->y;
		}
		if($childBounds->x + $childBounds->width > $globalBounds->x + $globalBounds->width) {
			$globalBounds->width = $childBounds->x + $childBounds->width - $globalBounds->x;
		}
		if($childBounds->y + $childBounds->height > $globalBounds->y + $globalBounds->height) {
			$globalBounds->height = $childBounds->y + $childBounds->height - $globalBounds->y;
		}
		$GLOBALS['%s']->pop();
	}
	public function getChildrenBounds($rootElementRenderer, $bounds) {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::getChildrenBounds");
		$製pos = $GLOBALS['%s']->length;
		$bounds->x = 50000;
		$bounds->y = 50000;
		$bounds->width = 0;
		$bounds->height = 0;
		$length = $this->lineBoxes->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				$this->doGetBounds(_hx_array_get($this->lineBoxes, $i)->get_bounds(), $bounds);
				unset($i);
			}
		}
		$GLOBALS['%s']->pop();
	}
	public function getLineBoxesBounds($lineBoxes, $bounds) {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::getLineBoxesBounds");
		$製pos = $GLOBALS['%s']->length;
		$bounds->x = 50000;
		$bounds->y = 50000;
		$bounds->width = 0;
		$bounds->height = 0;
		$length = $lineBoxes->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				$this->doGetBounds(_hx_array_get($lineBoxes, $i)->get_bounds(), $bounds);
				unset($i);
			}
		}
		$GLOBALS['%s']->pop();
	}
	public function getFirstBlockContainer() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::getFirstBlockContainer");
		$製pos = $GLOBALS['%s']->length;
		$parent = $this->parentNode;
		while($parent->isBlockContainer() === false) {
			$parent = $parent->parentNode;
		}
		{
			$裨mp = $parent;
			$GLOBALS['%s']->pop();
			return $裨mp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getInitialContainingBlock() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::getInitialContainingBlock");
		$製pos = $GLOBALS['%s']->length;
		{
			$裨mp = $this->domNode->ownerDocument->documentElement->elementRenderer;
			$GLOBALS['%s']->pop();
			return $裨mp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getFirstPositionedAncestor() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::getFirstPositionedAncestor");
		$製pos = $GLOBALS['%s']->length;
		$parent = $this->parentNode;
		while($parent->isPositioned() === false) {
			if($parent->parentNode === null) {
				break;
			}
			$parent = $parent->parentNode;
		}
		{
			$裨mp = $parent;
			$GLOBALS['%s']->pop();
			return $裨mp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getContainingBlock() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::getContainingBlock");
		$製pos = $GLOBALS['%s']->length;
		if($this->isPositioned() === true && $this->isRelativePositioned() === false) {
			if($this->coreStyle->getKeyword(_hx_deref((cocktail_core_renderer_ElementRenderer_0($this)))->typedValue) == cocktail_core_css_CSSKeywordValue::$FIXED) {
				$裨mp = $this->getInitialContainingBlock();
				$GLOBALS['%s']->pop();
				return $裨mp;
			} else {
				$裨mp = $this->getFirstPositionedAncestor();
				$GLOBALS['%s']->pop();
				return $裨mp;
			}
		} else {
			$裨mp = $this->getFirstBlockContainer();
			$GLOBALS['%s']->pop();
			return $裨mp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getNextLayerRendererSibling() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::getNextLayerRendererSibling");
		$製pos = $GLOBALS['%s']->length;
		$nextElementRendererSibling = $this->nextSibling;
		if($this->nextSibling === null) {
			$GLOBALS['%s']->pop();
			return null;
		}
		while($nextElementRendererSibling !== null) {
			if($nextElementRendererSibling->layerRenderer !== null) {
				if($nextElementRendererSibling->createOwnLayer() === true) {
					$裨mp = $nextElementRendererSibling->layerRenderer;
					$GLOBALS['%s']->pop();
					return $裨mp;
					unset($裨mp);
				}
			}
			$nextElementRendererSibling = $nextElementRendererSibling->nextSibling;
		}
		{
			$GLOBALS['%s']->pop();
			return null;
		}
		$GLOBALS['%s']->pop();
	}
	public function doCreateLayer() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::doCreateLayer");
		$製pos = $GLOBALS['%s']->length;
		$this->layerRenderer = new cocktail_core_layer_LayerRenderer($this);
		$GLOBALS['%s']->pop();
	}
	public function createLayer($parentLayer) {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::createLayer");
		$製pos = $GLOBALS['%s']->length;
		if($this->createOwnLayer() === true) {
			$this->doCreateLayer();
			$parentLayer->insertBefore($this->layerRenderer, $this->getNextLayerRendererSibling());
			$this->_hasOwnLayer = true;
		} else {
			$this->layerRenderer = $parentLayer;
		}
		$GLOBALS['%s']->pop();
	}
	public function rendersAsIfCreateOwnLayer() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::rendersAsIfCreateOwnLayer");
		$製pos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function getRelativeOffset() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::getRelativeOffset");
		$製pos = $GLOBALS['%s']->length;
		$relativeOffset = new cocktail_core_geom_PointVO(0.0, 0.0);
		if($this->isRelativePositioned() === true) {
			if($this->coreStyle->isAuto(cocktail_core_renderer_ElementRenderer_1($this, $relativeOffset)) === false) {
				$relativeOffset->x += $this->coreStyle->usedValues->left;
			} else {
				if($this->coreStyle->isAuto(cocktail_core_renderer_ElementRenderer_2($this, $relativeOffset)) === false) {
					$relativeOffset->x -= $this->coreStyle->usedValues->right;
				}
			}
			if($this->coreStyle->isAuto(cocktail_core_renderer_ElementRenderer_3($this, $relativeOffset)) === false) {
				$relativeOffset->y += $this->coreStyle->usedValues->top;
			} else {
				if($this->coreStyle->isAuto(cocktail_core_renderer_ElementRenderer_4($this, $relativeOffset)) === false) {
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
		$製pos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function isVisible() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::isVisible");
		$製pos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return true;
		}
		$GLOBALS['%s']->pop();
	}
	public function isTransformed() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::isTransformed");
		$製pos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function isAnonymousBlockBox() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::isAnonymousBlockBox");
		$製pos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function childrenInline() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::childrenInline");
		$製pos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function isBlockContainer() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::isBlockContainer");
		$製pos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function isTransparent() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::isTransparent");
		$製pos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function isRelativePositioned() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::isRelativePositioned");
		$製pos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function isText() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::isText");
		$製pos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function isReplaced() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::isReplaced");
		$製pos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function isInlineLevel() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::isInlineLevel");
		$製pos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function isPositioned() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::isPositioned");
		$製pos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function isFloat() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::isFloat");
		$製pos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function isScrollBar() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::isScrollBar");
		$製pos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function establishesNewFormattingContext() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::establishesNewFormattingContext");
		$製pos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function isHorizontallyScrollable($scrollOffset) {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::isHorizontallyScrollable");
		$製pos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function isVerticallyScrollable($scrollOffset) {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::isVerticallyScrollable");
		$製pos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function unregisterWithContainingBlock() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::unregisterWithContainingBlock");
		$製pos = $GLOBALS['%s']->length;
		if($this->_wasPositioned === true) {
			$this->containingBlock->removePositionedChild($this);
			$this->_wasPositioned = false;
		}
		$GLOBALS['%s']->pop();
	}
	public function registerWithContaininingBlock() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::registerWithContaininingBlock");
		$製pos = $GLOBALS['%s']->length;
		if($this->isPositioned() === true) {
			$this->containingBlock->addPositionedChildren($this);
			$this->_wasPositioned = true;
		}
		$GLOBALS['%s']->pop();
	}
	public function detachLayer() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::detachLayer");
		$製pos = $GLOBALS['%s']->length;
		if($this->_hasOwnLayer === true) {
			$this->parentNode->layerRenderer->removeChild($this->layerRenderer);
			$this->_hasOwnLayer = false;
			$this->layerRenderer->dispose();
		}
		$this->layerRenderer = null;
		$GLOBALS['%s']->pop();
	}
	public function attachLayer() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::attachLayer");
		$製pos = $GLOBALS['%s']->length;
		if($this->parentNode !== null) {
			$this->createLayer($this->parentNode->layerRenderer);
		}
		$GLOBALS['%s']->pop();
	}
	public function removedFromRenderingTree() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::removedFromRenderingTree");
		$製pos = $GLOBALS['%s']->length;
		$this->detach();
		$this->unregisterWithContainingBlock();
		$this->containingBlock = null;
		$GLOBALS['%s']->pop();
	}
	public function addedToRenderingTree() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::addedToRenderingTree");
		$製pos = $GLOBALS['%s']->length;
		$this->containingBlock = $this->getContainingBlock();
		$this->registerWithContaininingBlock();
		$this->invalidateLayerRenderer();
		$GLOBALS['%s']->pop();
	}
	public function updateLineBoxes() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::updateLineBoxes");
		$製pos = $GLOBALS['%s']->length;
		$child = $this->firstChild;
		while($child !== null) {
			$child->updateLineBoxes();
			$child = $child->nextSibling;
		}
		$GLOBALS['%s']->pop();
	}
	public function updateAnonymousBlock() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::updateAnonymousBlock");
		$製pos = $GLOBALS['%s']->length;
		$child = $this->firstChild;
		while($child !== null) {
			$child->updateAnonymousBlock();
			$child = $child->nextSibling;
		}
		$GLOBALS['%s']->pop();
	}
	public function detach() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::detach");
		$製pos = $GLOBALS['%s']->length;
		$child = $this->firstChild;
		while($child !== null) {
			$child->detach();
			$child = $child->nextSibling;
		}
		if($this->layerRenderer !== null) {
			$this->detachLayer();
		}
		$GLOBALS['%s']->pop();
	}
	public function attach() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::attach");
		$製pos = $GLOBALS['%s']->length;
		$this->attachLayer();
		$child = $this->firstChild;
		while($child !== null) {
			$child->attach();
			$child = $child->nextSibling;
		}
		$GLOBALS['%s']->pop();
	}
	public function updateLayerRenderer() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::updateLayerRenderer");
		$製pos = $GLOBALS['%s']->length;
		if($this->_needsLayerRendererUpdate === true) {
			$this->_needsLayerRendererUpdate = false;
			if($this->layerRenderer === null) {
				$this->attach();
				{
					$GLOBALS['%s']->pop();
					return;
				}
			} else {
				if($this->_hasOwnLayer != $this->createOwnLayer()) {
					$this->detach();
					$this->attach();
					{
						$GLOBALS['%s']->pop();
						return;
					}
				} else {
					if($this->createOwnLayer() === true) {
						$this->parentNode->layerRenderer->insertBefore($this->layerRenderer, $this->getNextLayerRendererSibling());
					}
				}
			}
		}
		$child = $this->firstChild;
		while($child !== null) {
			$child->updateLayerRenderer();
			$child = $child->nextSibling;
		}
		$GLOBALS['%s']->pop();
	}
	public function updateGlobalBounds() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::updateGlobalBounds");
		$製pos = $GLOBALS['%s']->length;
		$globalX = null;
		$globalY = null;
		$positionKeyword = $this->coreStyle->getKeyword(_hx_deref((cocktail_core_renderer_ElementRenderer_5($this, $globalX, $globalY)))->typedValue);
		if($positionKeyword === cocktail_core_css_CSSKeywordValue::$FIXED) {
			if($this->coreStyle->isAuto(cocktail_core_renderer_ElementRenderer_6($this, $globalX, $globalY, $positionKeyword)) === true && $this->coreStyle->isAuto(cocktail_core_renderer_ElementRenderer_7($this, $globalX, $globalY, $positionKeyword)) === true) {
				$globalX = $this->globalContainingBlockOrigin->x + $this->get_bounds()->x;
			} else {
				$globalX = $this->positionedOrigin->x;
			}
			if($this->coreStyle->isAuto(cocktail_core_renderer_ElementRenderer_8($this, $globalX, $globalY, $positionKeyword)) === true && $this->coreStyle->isAuto(cocktail_core_renderer_ElementRenderer_9($this, $globalX, $globalY, $positionKeyword)) === true) {
				$globalY = $this->globalContainingBlockOrigin->y + $this->get_bounds()->y;
			} else {
				$globalY = $this->positionedOrigin->y;
			}
		} else {
			if($positionKeyword === cocktail_core_css_CSSKeywordValue::$ABSOLUTE) {
				if($this->coreStyle->isAuto(cocktail_core_renderer_ElementRenderer_10($this, $globalX, $globalY, $positionKeyword)) === true && $this->coreStyle->isAuto(cocktail_core_renderer_ElementRenderer_11($this, $globalX, $globalY, $positionKeyword)) === true) {
					$globalX = $this->globalContainingBlockOrigin->x + $this->get_bounds()->x;
				} else {
					$globalX = $this->globalPositionnedAncestorOrigin->x + $this->positionedOrigin->x;
				}
				if($this->coreStyle->isAuto(cocktail_core_renderer_ElementRenderer_12($this, $globalX, $globalY, $positionKeyword)) === true && $this->coreStyle->isAuto(cocktail_core_renderer_ElementRenderer_13($this, $globalX, $globalY, $positionKeyword)) === true) {
					$globalY = $this->globalContainingBlockOrigin->y + $this->get_bounds()->y;
				} else {
					$globalY = $this->globalPositionnedAncestorOrigin->y + $this->positionedOrigin->y;
				}
			} else {
				$globalX = $this->globalContainingBlockOrigin->x + $this->get_bounds()->x;
				$globalY = $this->globalContainingBlockOrigin->y + $this->get_bounds()->y;
			}
		}
		$this->get_globalBounds()->x = $globalX;
		$this->get_globalBounds()->y = $globalY;
		$this->get_globalBounds()->width = $this->get_bounds()->width;
		$this->get_globalBounds()->height = $this->get_bounds()->height;
		$GLOBALS['%s']->pop();
	}
	public function updateBounds() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::updateBounds");
		$製pos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public function setGlobalOrigins($addedX, $addedY, $addedPositionedX, $addedPositionedY, $addedScrollX, $addedScrollY) {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::setGlobalOrigins");
		$製pos = $GLOBALS['%s']->length;
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
		if($this->coreStyle->getKeyword(_hx_deref((cocktail_core_renderer_ElementRenderer_14($this, $addedPositionedX, $addedPositionedY, $addedScrollX, $addedScrollY, $addedX, $addedY)))->typedValue) != cocktail_core_css_CSSKeywordValue::$FIXED) {
			$addedScrollX += $this->get_scrollLeft();
			$addedScrollY += $this->get_scrollTop();
		} else {
			$addedScrollX = 0;
			$addedScrollY = 0;
		}
		$child = $this->firstChild;
		while($child !== null) {
			$childGlobalBounds = $child->get_globalBounds();
			$currentX = $childGlobalBounds->x;
			$currentY = $childGlobalBounds->y;
			$currentWidth = $childGlobalBounds->width;
			$currentHeight = $childGlobalBounds->height;
			$child->globalContainingBlockOrigin->x = $addedX;
			$child->globalContainingBlockOrigin->y = $addedY;
			$child->globalPositionnedAncestorOrigin->x = $addedPositionedX;
			$child->globalPositionnedAncestorOrigin->y = $addedPositionedY;
			$child->scrollOffset->x = $addedScrollX;
			$child->scrollOffset->y = $addedScrollY;
			$child->updateBounds();
			$child->updateGlobalBounds();
			if($currentX !== $childGlobalBounds->x || $currentY !== $childGlobalBounds->y || $currentWidth !== $childGlobalBounds->width || $currentHeight !== $childGlobalBounds->height) {
				$child->layerRenderer->invalidateRendering();
			}
			if($child->firstChild !== null) {
				$child->setGlobalOrigins($addedX, $addedY, $addedPositionedX, $addedPositionedY, $addedScrollX, $addedScrollY);
			}
			$child = $child->nextSibling;
			unset($currentY,$currentX,$currentWidth,$currentHeight,$childGlobalBounds);
		}
		$GLOBALS['%s']->pop();
	}
	public function layout($forceLayout) {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::layout");
		$製pos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public function invalidateLayerRenderer() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::invalidateLayerRenderer");
		$製pos = $GLOBALS['%s']->length;
		$this->_needsLayerRendererUpdate = true;
		switch($this->domNode->get_nodeType()) {
		case 1:{
			$htmlDocument = $this->domNode->ownerDocument;
			$htmlDocument->invalidationManager->invalidateLayerTree();
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	public function renderScrollBars($graphicContext, $windowWidth, $windowHeight) {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::renderScrollBars");
		$製pos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public function render($parentGraphicContext) {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::render");
		$製pos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public function insertBefore($newChild, $refChild) {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::insertBefore");
		$製pos = $GLOBALS['%s']->length;
		parent::insertBefore($newChild,$refChild);
		if($refChild === null) {
			$GLOBALS['%s']->pop();
			return;
		}
		$newChild->addedToRenderingTree();
		$this->invalidate();
		$GLOBALS['%s']->pop();
	}
	public function removeChild($oldChild) {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::removeChild");
		$製pos = $GLOBALS['%s']->length;
		$oldChild->removedFromRenderingTree();
		parent::removeChild($oldChild);
		$this->invalidate();
		$GLOBALS['%s']->pop();
	}
	public function appendChild($newChild) {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::appendChild");
		$製pos = $GLOBALS['%s']->length;
		parent::appendChild($newChild);
		$newChild->addedToRenderingTree();
		$this->invalidate();
		$GLOBALS['%s']->pop();
	}
	public function initCoreStyle() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::initCoreStyle");
		$製pos = $GLOBALS['%s']->length;
		$this->coreStyle = $this->domNode->coreStyle;
		$GLOBALS['%s']->pop();
	}
	public function dispose() {
		$GLOBALS['%s']->push("cocktail.core.renderer.ElementRenderer::dispose");
		$製pos = $GLOBALS['%s']->length;
		$this->domNode = null;
		$this->coreStyle = null;
		$this->bounds = null;
		$this->globalBounds = null;
		$this->scrollOffset = null;
		$this->positionedOrigin = null;
		$this->globalPositionnedAncestorOrigin = null;
		$this->globalContainingBlockOrigin = null;
		$this->layerRenderer = null;
		$length = $this->lineBoxes->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				_hx_array_get($this->lineBoxes, $i)->dispose();
				unset($i);
			}
		}
		$this->lineBoxes = null;
		$GLOBALS['%s']->pop();
	}
	public $containingBlock;
	public $scrollHeight;
	public $scrollWidth;
	public $scrollTop;
	public $scrollLeft;
	public $_wasPositioned;
	public $_needsLayerRendererUpdate;
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
	public $_childrenBounds;
	public $bounds;
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
	static $__properties__ = array("get_bounds" => "get_bounds","get_globalBounds" => "get_globalBounds","get_scrollableBounds" => "get_scrollableBounds","set_scrollLeft" => "set_scrollLeft","get_scrollLeft" => "get_scrollLeft","set_scrollTop" => "set_scrollTop","get_scrollTop" => "get_scrollTop","get_scrollWidth" => "get_scrollWidth","get_scrollHeight" => "get_scrollHeight");
	function __toString() { return 'cocktail.core.renderer.ElementRenderer'; }
}
function cocktail_core_renderer_ElementRenderer_0(&$裨his) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this = $裨his->coreStyle->computedValues;
		$typedProperty = null;
		$length = $_this->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($_this->_properties, $i)->name === "position") {
					$typedProperty = $_this->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}
function cocktail_core_renderer_ElementRenderer_1(&$裨his, &$relativeOffset) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this = $裨his->coreStyle;
		{
			$transition = $_this->_transitionManager->getTransition("left", $_this);
			if($transition !== null) {
				return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
			} else {
				return _hx_deref((cocktail_core_renderer_ElementRenderer_15($裨his, $_this, $relativeOffset, $transition)))->typedValue;
			}
			unset($transition);
		}
		unset($_this);
	}
}
function cocktail_core_renderer_ElementRenderer_2(&$裨his, &$relativeOffset) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this = $裨his->coreStyle;
		{
			$transition = $_this->_transitionManager->getTransition("right", $_this);
			if($transition !== null) {
				return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
			} else {
				return _hx_deref((cocktail_core_renderer_ElementRenderer_16($裨his, $_this, $relativeOffset, $transition)))->typedValue;
			}
			unset($transition);
		}
		unset($_this);
	}
}
function cocktail_core_renderer_ElementRenderer_3(&$裨his, &$relativeOffset) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this = $裨his->coreStyle;
		{
			$transition = $_this->_transitionManager->getTransition("top", $_this);
			if($transition !== null) {
				return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
			} else {
				return _hx_deref((cocktail_core_renderer_ElementRenderer_17($裨his, $_this, $relativeOffset, $transition)))->typedValue;
			}
			unset($transition);
		}
		unset($_this);
	}
}
function cocktail_core_renderer_ElementRenderer_4(&$裨his, &$relativeOffset) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this = $裨his->coreStyle;
		{
			$transition = $_this->_transitionManager->getTransition("bottom", $_this);
			if($transition !== null) {
				return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
			} else {
				return _hx_deref((cocktail_core_renderer_ElementRenderer_18($裨his, $_this, $relativeOffset, $transition)))->typedValue;
			}
			unset($transition);
		}
		unset($_this);
	}
}
function cocktail_core_renderer_ElementRenderer_5(&$裨his, &$globalX, &$globalY) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this = $裨his->coreStyle->computedValues;
		$typedProperty = null;
		$length = $_this->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($_this->_properties, $i)->name === "position") {
					$typedProperty = $_this->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}
function cocktail_core_renderer_ElementRenderer_6(&$裨his, &$globalX, &$globalY, &$positionKeyword) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this = $裨his->coreStyle;
		{
			$transition = $_this->_transitionManager->getTransition("left", $_this);
			if($transition !== null) {
				return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
			} else {
				return _hx_deref((cocktail_core_renderer_ElementRenderer_19($裨his, $_this, $globalX, $globalY, $positionKeyword, $transition)))->typedValue;
			}
			unset($transition);
		}
		unset($_this);
	}
}
function cocktail_core_renderer_ElementRenderer_7(&$裨his, &$globalX, &$globalY, &$positionKeyword) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this = $裨his->coreStyle;
		{
			$transition = $_this->_transitionManager->getTransition("right", $_this);
			if($transition !== null) {
				return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
			} else {
				return _hx_deref((cocktail_core_renderer_ElementRenderer_20($裨his, $_this, $globalX, $globalY, $positionKeyword, $transition)))->typedValue;
			}
			unset($transition);
		}
		unset($_this);
	}
}
function cocktail_core_renderer_ElementRenderer_8(&$裨his, &$globalX, &$globalY, &$positionKeyword) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this = $裨his->coreStyle;
		{
			$transition = $_this->_transitionManager->getTransition("top", $_this);
			if($transition !== null) {
				return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
			} else {
				return _hx_deref((cocktail_core_renderer_ElementRenderer_21($裨his, $_this, $globalX, $globalY, $positionKeyword, $transition)))->typedValue;
			}
			unset($transition);
		}
		unset($_this);
	}
}
function cocktail_core_renderer_ElementRenderer_9(&$裨his, &$globalX, &$globalY, &$positionKeyword) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this = $裨his->coreStyle;
		{
			$transition = $_this->_transitionManager->getTransition("bottom", $_this);
			if($transition !== null) {
				return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
			} else {
				return _hx_deref((cocktail_core_renderer_ElementRenderer_22($裨his, $_this, $globalX, $globalY, $positionKeyword, $transition)))->typedValue;
			}
			unset($transition);
		}
		unset($_this);
	}
}
function cocktail_core_renderer_ElementRenderer_10(&$裨his, &$globalX, &$globalY, &$positionKeyword) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this = $裨his->coreStyle;
		{
			$transition = $_this->_transitionManager->getTransition("left", $_this);
			if($transition !== null) {
				return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
			} else {
				return _hx_deref((cocktail_core_renderer_ElementRenderer_23($裨his, $_this, $globalX, $globalY, $positionKeyword, $transition)))->typedValue;
			}
			unset($transition);
		}
		unset($_this);
	}
}
function cocktail_core_renderer_ElementRenderer_11(&$裨his, &$globalX, &$globalY, &$positionKeyword) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this = $裨his->coreStyle;
		{
			$transition = $_this->_transitionManager->getTransition("right", $_this);
			if($transition !== null) {
				return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
			} else {
				return _hx_deref((cocktail_core_renderer_ElementRenderer_24($裨his, $_this, $globalX, $globalY, $positionKeyword, $transition)))->typedValue;
			}
			unset($transition);
		}
		unset($_this);
	}
}
function cocktail_core_renderer_ElementRenderer_12(&$裨his, &$globalX, &$globalY, &$positionKeyword) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this = $裨his->coreStyle;
		{
			$transition = $_this->_transitionManager->getTransition("top", $_this);
			if($transition !== null) {
				return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
			} else {
				return _hx_deref((cocktail_core_renderer_ElementRenderer_25($裨his, $_this, $globalX, $globalY, $positionKeyword, $transition)))->typedValue;
			}
			unset($transition);
		}
		unset($_this);
	}
}
function cocktail_core_renderer_ElementRenderer_13(&$裨his, &$globalX, &$globalY, &$positionKeyword) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this = $裨his->coreStyle;
		{
			$transition = $_this->_transitionManager->getTransition("bottom", $_this);
			if($transition !== null) {
				return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
			} else {
				return _hx_deref((cocktail_core_renderer_ElementRenderer_26($裨his, $_this, $globalX, $globalY, $positionKeyword, $transition)))->typedValue;
			}
			unset($transition);
		}
		unset($_this);
	}
}
function cocktail_core_renderer_ElementRenderer_14(&$裨his, &$addedPositionedX, &$addedPositionedY, &$addedScrollX, &$addedScrollY, &$addedX, &$addedY) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this = $裨his->coreStyle->computedValues;
		$typedProperty = null;
		$length = $_this->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($_this->_properties, $i)->name === "position") {
					$typedProperty = $_this->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}
function cocktail_core_renderer_ElementRenderer_15(&$裨his, &$_this, &$relativeOffset, &$transition) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this1 = $_this->computedValues;
		$typedProperty = null;
		$length = $_this1->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($_this1->_properties, $i)->name === "left") {
					$typedProperty = $_this1->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}
function cocktail_core_renderer_ElementRenderer_16(&$裨his, &$_this, &$relativeOffset, &$transition) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this1 = $_this->computedValues;
		$typedProperty = null;
		$length = $_this1->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($_this1->_properties, $i)->name === "right") {
					$typedProperty = $_this1->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}
function cocktail_core_renderer_ElementRenderer_17(&$裨his, &$_this, &$relativeOffset, &$transition) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this1 = $_this->computedValues;
		$typedProperty = null;
		$length = $_this1->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($_this1->_properties, $i)->name === "top") {
					$typedProperty = $_this1->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}
function cocktail_core_renderer_ElementRenderer_18(&$裨his, &$_this, &$relativeOffset, &$transition) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this1 = $_this->computedValues;
		$typedProperty = null;
		$length = $_this1->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($_this1->_properties, $i)->name === "bottom") {
					$typedProperty = $_this1->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}
function cocktail_core_renderer_ElementRenderer_19(&$裨his, &$_this, &$globalX, &$globalY, &$positionKeyword, &$transition) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this1 = $_this->computedValues;
		$typedProperty = null;
		$length = $_this1->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($_this1->_properties, $i)->name === "left") {
					$typedProperty = $_this1->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}
function cocktail_core_renderer_ElementRenderer_20(&$裨his, &$_this, &$globalX, &$globalY, &$positionKeyword, &$transition) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this1 = $_this->computedValues;
		$typedProperty = null;
		$length = $_this1->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($_this1->_properties, $i)->name === "right") {
					$typedProperty = $_this1->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}
function cocktail_core_renderer_ElementRenderer_21(&$裨his, &$_this, &$globalX, &$globalY, &$positionKeyword, &$transition) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this1 = $_this->computedValues;
		$typedProperty = null;
		$length = $_this1->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($_this1->_properties, $i)->name === "top") {
					$typedProperty = $_this1->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}
function cocktail_core_renderer_ElementRenderer_22(&$裨his, &$_this, &$globalX, &$globalY, &$positionKeyword, &$transition) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this1 = $_this->computedValues;
		$typedProperty = null;
		$length = $_this1->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($_this1->_properties, $i)->name === "bottom") {
					$typedProperty = $_this1->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}
function cocktail_core_renderer_ElementRenderer_23(&$裨his, &$_this, &$globalX, &$globalY, &$positionKeyword, &$transition) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this1 = $_this->computedValues;
		$typedProperty = null;
		$length = $_this1->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($_this1->_properties, $i)->name === "left") {
					$typedProperty = $_this1->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}
function cocktail_core_renderer_ElementRenderer_24(&$裨his, &$_this, &$globalX, &$globalY, &$positionKeyword, &$transition) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this1 = $_this->computedValues;
		$typedProperty = null;
		$length = $_this1->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($_this1->_properties, $i)->name === "right") {
					$typedProperty = $_this1->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}
function cocktail_core_renderer_ElementRenderer_25(&$裨his, &$_this, &$globalX, &$globalY, &$positionKeyword, &$transition) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this1 = $_this->computedValues;
		$typedProperty = null;
		$length = $_this1->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($_this1->_properties, $i)->name === "top") {
					$typedProperty = $_this1->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}
function cocktail_core_renderer_ElementRenderer_26(&$裨his, &$_this, &$globalX, &$globalY, &$positionKeyword, &$transition) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this1 = $_this->computedValues;
		$typedProperty = null;
		$length = $_this1->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($_this1->_properties, $i)->name === "bottom") {
					$typedProperty = $_this1->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}

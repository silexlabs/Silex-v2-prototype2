<?php

class cocktail_core_renderer_BlockBoxRenderer extends cocktail_core_renderer_ScrollableRenderer {
	public function __construct($node) {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.renderer.BlockBoxRenderer::new");
		$»spos = $GLOBALS['%s']->length;
		parent::__construct($node);
		$this->rootLineBoxes = new _hx_array(array());
		$this->_usedRootLineBoxes = 0;
		$GLOBALS['%s']->pop();
	}}
	public function getContainerBlockData() {
		$GLOBALS['%s']->push("cocktail.core.renderer.BlockBoxRenderer::getContainerBlockData");
		$»spos = $GLOBALS['%s']->length;
		$height = $this->coreStyle->usedValues->height;
		if($this->_horizontalScrollBar !== null) {
			$height -= $this->_horizontalScrollBar->coreStyle->usedValues->height;
		}
		$width = $this->coreStyle->usedValues->width;
		if($this->_verticalScrollBar !== null) {
			$width -= $this->_verticalScrollBar->coreStyle->usedValues->width;
		}
		$this->_containerBlockData->width = $width;
		$this->_containerBlockData->isWidthAuto = $this->coreStyle->isAuto(cocktail_core_renderer_BlockBoxRenderer_0($this, $height, $width));
		$this->_containerBlockData->height = $height;
		$this->_containerBlockData->isHeightAuto = $this->coreStyle->isAuto(cocktail_core_renderer_BlockBoxRenderer_1($this, $height, $width));
		{
			$»tmp = $this->_containerBlockData;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function rendersAsIfCreateOwnLayer() {
		$GLOBALS['%s']->push("cocktail.core.renderer.BlockBoxRenderer::rendersAsIfCreateOwnLayer");
		$»spos = $GLOBALS['%s']->length;
		if($this->coreStyle->getKeyword(_hx_deref((cocktail_core_renderer_BlockBoxRenderer_2($this)))->typedValue) == cocktail_core_css_CSSKeywordValue::$INLINE_BLOCK) {
			$GLOBALS['%s']->pop();
			return true;
		} else {
			if($this->isFloat() === true) {
				$GLOBALS['%s']->pop();
				return true;
			}
		}
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function isBlockContainer() {
		$GLOBALS['%s']->push("cocktail.core.renderer.BlockBoxRenderer::isBlockContainer");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return true;
		}
		$GLOBALS['%s']->pop();
	}
	public function establishesNewFormattingContext() {
		$GLOBALS['%s']->push("cocktail.core.renderer.BlockBoxRenderer::establishesNewFormattingContext");
		$»spos = $GLOBALS['%s']->length;
		$establishesNewFormattingContext = false;
		if($this->isFloat() === true) {
			$establishesNewFormattingContext = true;
		} else {
			if($this->canAlwaysOverflow() === false) {
				$establishesNewFormattingContext = true;
			} else {
				if($this->isPositioned() === true && $this->isRelativePositioned() === false) {
					$establishesNewFormattingContext = true;
				} else {
					if($this->isAnonymousBlockBox() === true) {
						$establishesNewFormattingContext = true;
					} else {
						$»t = ($this->coreStyle->getKeyword(_hx_deref((cocktail_core_renderer_BlockBoxRenderer_3($this, $establishesNewFormattingContext)))->typedValue));
						switch($»t->index) {
						case 29:
						{
							$establishesNewFormattingContext = true;
						}break;
						case 28:
						{
							if($this->childrenInline() === true) {
								$establishesNewFormattingContext = true;
							}
						}break;
						default:{
						}break;
						}
					}
				}
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $establishesNewFormattingContext;
		}
		$GLOBALS['%s']->pop();
	}
	public function createOwnLayer() {
		$GLOBALS['%s']->push("cocktail.core.renderer.BlockBoxRenderer::createOwnLayer");
		$»spos = $GLOBALS['%s']->length;
		$creatOwnLayer = parent::createOwnLayer();
		if($creatOwnLayer === true) {
			$GLOBALS['%s']->pop();
			return true;
		}
		{
			$»tmp = $this->canAlwaysOverflow() !== true;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function doFormat() {
		$GLOBALS['%s']->push("cocktail.core.renderer.BlockBoxRenderer::doFormat");
		$»spos = $GLOBALS['%s']->length;
		if($this->childrenInline() === true) {
			$htmlDocument = $this->domNode->ownerDocument;
			$htmlDocument->layoutManager->inlineFormattingContext->format($this, true);
		} else {
			$htmlDocument = $this->domNode->ownerDocument;
			$htmlDocument->layoutManager->blockFormattingContext->format($this, true);
		}
		$GLOBALS['%s']->pop();
	}
	public function format() {
		$GLOBALS['%s']->push("cocktail.core.renderer.BlockBoxRenderer::format");
		$»spos = $GLOBALS['%s']->length;
		if($this->establishesNewFormattingContext() === true) {
			if($this->isPositioned() === true && $this->isRelativePositioned() === false) {
				$this->doFormat();
			} else {
				if($this->isFloat() === true) {
					$this->doFormat();
				} else {
					if($this->coreStyle->getKeyword(_hx_deref((cocktail_core_renderer_BlockBoxRenderer_4($this)))->typedValue) == cocktail_core_css_CSSKeywordValue::$INLINE_BLOCK) {
						$this->doFormat();
					} else {
						if($this->childrenInline() === false) {
							$this->doFormat();
						}
					}
				}
			}
		}
		$GLOBALS['%s']->pop();
	}
	public function layoutChildren() {
		$GLOBALS['%s']->push("cocktail.core.renderer.BlockBoxRenderer::layoutChildren");
		$»spos = $GLOBALS['%s']->length;
		parent::layoutChildren();
		$this->format();
		$GLOBALS['%s']->pop();
	}
	public function renderScrollBars($graphicContext, $windowWidth, $windowHeight) {
		$GLOBALS['%s']->push("cocktail.core.renderer.BlockBoxRenderer::renderScrollBars");
		$»spos = $GLOBALS['%s']->length;
		if($this->_horizontalScrollBar !== null) {
			$this->_horizontalScrollBar->elementRenderer->layerRenderer->render($windowWidth, $windowHeight);
		}
		if($this->_verticalScrollBar !== null) {
			$this->_verticalScrollBar->elementRenderer->layerRenderer->render($windowWidth, $windowHeight);
		}
		$GLOBALS['%s']->pop();
	}
	public function renderBlockContainerChildren($rootElementRenderer, $referenceLayer, $graphicContext) {
		$GLOBALS['%s']->push("cocktail.core.renderer.BlockBoxRenderer::renderBlockContainerChildren");
		$»spos = $GLOBALS['%s']->length;
		$child = $rootElementRenderer->firstChild;
		while($child !== null) {
			if($child->layerRenderer === $referenceLayer) {
				if($child->isReplaced() === false && $child->coreStyle->getKeyword(_hx_deref((cocktail_core_renderer_BlockBoxRenderer_5($this, $child, $graphicContext, $referenceLayer, $rootElementRenderer)))->typedValue) != cocktail_core_css_CSSKeywordValue::$INLINE_BLOCK) {
					$child->render($graphicContext);
					$this->renderBlockContainerChildren($child, $referenceLayer, $graphicContext);
				}
			}
			$child = $child->nextSibling;
		}
		$GLOBALS['%s']->pop();
	}
	public function renderBlockReplacedChildren($rootRenderer, $referenceLayer, $graphicContext) {
		$GLOBALS['%s']->push("cocktail.core.renderer.BlockBoxRenderer::renderBlockReplacedChildren");
		$»spos = $GLOBALS['%s']->length;
		$child = $rootRenderer->firstChild;
		while($child !== null) {
			if($child->layerRenderer === $referenceLayer) {
				if($child->isReplaced() === false && $child->coreStyle->getKeyword(_hx_deref((cocktail_core_renderer_BlockBoxRenderer_6($this, $child, $graphicContext, $referenceLayer, $rootRenderer)))->typedValue) == cocktail_core_css_CSSKeywordValue::$BLOCK) {
					$this->renderBlockReplacedChildren($child, $referenceLayer, $graphicContext);
				} else {
					if($child->coreStyle->getKeyword(_hx_deref((cocktail_core_renderer_BlockBoxRenderer_7($this, $child, $graphicContext, $referenceLayer, $rootRenderer)))->typedValue) == cocktail_core_css_CSSKeywordValue::$BLOCK) {
						$child->render($graphicContext);
					}
				}
			}
			$child = $child->nextSibling;
		}
		$GLOBALS['%s']->pop();
	}
	public function renderLineBoxesInLine($rootLineBox, $graphicContext, $referenceLayer) {
		$GLOBALS['%s']->push("cocktail.core.renderer.BlockBoxRenderer::renderLineBoxesInLine");
		$»spos = $GLOBALS['%s']->length;
		$child = $rootLineBox->firstChild;
		while($child !== null) {
			if($child->elementRenderer->layerRenderer === $referenceLayer) {
				$child->render($graphicContext);
				if($child->firstChild !== null) {
					$this->renderLineBoxesInLine($child, $graphicContext, $referenceLayer);
				}
			}
			$child = $child->nextSibling;
		}
		$GLOBALS['%s']->pop();
	}
	public function renderLineBoxes($rootRenderer, $referenceLayer, $graphicContext) {
		$GLOBALS['%s']->push("cocktail.core.renderer.BlockBoxRenderer::renderLineBoxes");
		$»spos = $GLOBALS['%s']->length;
		if($rootRenderer->establishesNewFormattingContext() === true && $rootRenderer->childrenInline() === true) {
			$blockboxRenderer = $rootRenderer;
			$length = $blockboxRenderer->rootLineBoxes->length;
			{
				$_g = 0;
				while($_g < $length) {
					$i = $_g++;
					$this->renderLineBoxesInLine($blockboxRenderer->rootLineBoxes[$i], $graphicContext, $referenceLayer);
					unset($i);
				}
			}
		} else {
			$child = $rootRenderer->firstChild;
			while($child !== null) {
				if($child->layerRenderer === $referenceLayer) {
					if($child->isReplaced() === false) {
						$this->renderLineBoxes($child, $referenceLayer, $graphicContext);
					}
				}
				$child = $child->nextSibling;
			}
		}
		$GLOBALS['%s']->pop();
	}
	public function renderChildren($graphicContext) {
		$GLOBALS['%s']->push("cocktail.core.renderer.BlockBoxRenderer::renderChildren");
		$»spos = $GLOBALS['%s']->length;
		parent::renderChildren($graphicContext);
		if($this->createOwnLayer() === true || $this->rendersAsIfCreateOwnLayer() === true) {
			$this->renderBlockContainerChildren($this, $this->layerRenderer, $graphicContext);
			$this->renderBlockReplacedChildren($this, $this->layerRenderer, $graphicContext);
			$this->renderLineBoxes($this, $this->layerRenderer, $graphicContext);
		}
		$GLOBALS['%s']->pop();
	}
	public function hasSignificantChild() {
		$GLOBALS['%s']->push("cocktail.core.renderer.BlockBoxRenderer::hasSignificantChild");
		$»spos = $GLOBALS['%s']->length;
		$child = $this->firstChild;
		while($child !== null) {
			if($child->isFloat() === false) {
				if($child->isPositioned() === false || $child->isRelativePositioned() === true) {
					$GLOBALS['%s']->pop();
					return true;
				}
			}
			$child = $child->nextSibling;
		}
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function createAnonymousBlock($child) {
		$GLOBALS['%s']->push("cocktail.core.renderer.BlockBoxRenderer::createAnonymousBlock");
		$»spos = $GLOBALS['%s']->length;
		$anonymousBlock = new cocktail_core_renderer_AnonymousBlockBoxRenderer();
		$anonymousBlock->appendChild($child);
		$anonymousBlock->coreStyle = $anonymousBlock->domNode->coreStyle;
		$cascadeManager = new cocktail_core_css_CascadeManager();
		$cascadeManager->shouldCascadeAll();
		$initialStyleDeclaration = cocktail_Lib::get_document()->initialStyleDeclaration;
		$anonymousBlock->coreStyle->cascade($cascadeManager, $initialStyleDeclaration, $initialStyleDeclaration, $initialStyleDeclaration, $initialStyleDeclaration, 12, 12, false);
		{
			$GLOBALS['%s']->pop();
			return $anonymousBlock;
		}
		$GLOBALS['%s']->pop();
	}
	public function makeChildrenNonInline() {
		$GLOBALS['%s']->push("cocktail.core.renderer.BlockBoxRenderer::makeChildrenNonInline");
		$»spos = $GLOBALS['%s']->length;
		$newChildNodes = new _hx_array(array());
		$child = $this->lastChild;
		while($child !== null) {
			$previousSibling = $child->previousSibling;
			if($child->isInlineLevel() === true) {
				$anonymousBlock = $this->createAnonymousBlock($child);
				$newChildNodes->push($anonymousBlock);
				unset($anonymousBlock);
			} else {
				$newChildNodes->push($child);
			}
			$child = $previousSibling;
			unset($previousSibling);
		}
		$newChildNodes->reverse();
		$length = $newChildNodes->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				$this->appendChild($newChildNodes[$i]);
				unset($i);
			}
		}
		$GLOBALS['%s']->pop();
	}
	public function updateAnonymousBlock() {
		$GLOBALS['%s']->push("cocktail.core.renderer.BlockBoxRenderer::updateAnonymousBlock");
		$»spos = $GLOBALS['%s']->length;
		$shouldMakeChildrenNonInline = false;
		if($this->hasSignificantChild() === true) {
			$childrenInline = $this->childrenInline();
			$child = $this->firstChild;
			while($child !== null) {
				if($child->isPositioned() === false || $child->isRelativePositioned() === true) {
					if($child->isInlineLevel() !== $childrenInline) {
						$shouldMakeChildrenNonInline = true;
						break;
					}
				}
				$child = $child->nextSibling;
			}
		}
		if($shouldMakeChildrenNonInline === true) {
			$this->makeChildrenNonInline();
		}
		parent::updateAnonymousBlock();
		$GLOBALS['%s']->pop();
	}
	public function getLastRootLineBox() {
		$GLOBALS['%s']->push("cocktail.core.renderer.BlockBoxRenderer::getLastRootLineBox");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->rootLineBoxes[$this->_usedRootLineBoxes - 1];
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getRootLineBox() {
		$GLOBALS['%s']->push("cocktail.core.renderer.BlockBoxRenderer::getRootLineBox");
		$»spos = $GLOBALS['%s']->length;
		$this->_usedRootLineBoxes++;
		if($this->_usedRootLineBoxes > $this->rootLineBoxes->length) {
			$this->rootLineBoxes->push(new cocktail_core_linebox_RootLineBox($this));
		}
		{
			$»tmp = $this->rootLineBoxes[$this->_usedRootLineBoxes - 1];
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function resetRootLineBoxes() {
		$GLOBALS['%s']->push("cocktail.core.renderer.BlockBoxRenderer::resetRootLineBoxes");
		$»spos = $GLOBALS['%s']->length;
		$length = $this->rootLineBoxes->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				$rootLineBox = $this->rootLineBoxes[$i];
				$rootLineBox->get_bounds()->x = 0;
				$rootLineBox->get_bounds()->y = 0;
				$rootLineBox->get_bounds()->width = 0;
				$rootLineBox->get_bounds()->height = 0;
				$child = $rootLineBox->firstChild;
				while($child !== null) {
					$nextSibling = $child->nextSibling;
					$rootLineBox->removeChild($child);
					$child = $nextSibling;
					unset($nextSibling);
				}
				unset($rootLineBox,$i,$child);
			}
		}
		$this->_usedRootLineBoxes = 0;
		$GLOBALS['%s']->pop();
	}
	public $_usedRootLineBoxes;
	public $rootLineBoxes;
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
	function __toString() { return 'cocktail.core.renderer.BlockBoxRenderer'; }
}
function cocktail_core_renderer_BlockBoxRenderer_0(&$»this, &$height, &$width) {
	$»spos = $GLOBALS['%s']->length;
	{
		$_this = $»this->coreStyle;
		{
			$transition = $_this->_transitionManager->getTransition("width", $_this);
			if($transition !== null) {
				return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
			} else {
				return _hx_deref((cocktail_core_renderer_BlockBoxRenderer_8($»this, $_this, $height, $transition, $width)))->typedValue;
			}
			unset($transition);
		}
		unset($_this);
	}
}
function cocktail_core_renderer_BlockBoxRenderer_1(&$»this, &$height, &$width) {
	$»spos = $GLOBALS['%s']->length;
	{
		$_this = $»this->coreStyle;
		{
			$transition = $_this->_transitionManager->getTransition("height", $_this);
			if($transition !== null) {
				return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
			} else {
				return _hx_deref((cocktail_core_renderer_BlockBoxRenderer_9($»this, $_this, $height, $transition, $width)))->typedValue;
			}
			unset($transition);
		}
		unset($_this);
	}
}
function cocktail_core_renderer_BlockBoxRenderer_2(&$»this) {
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
function cocktail_core_renderer_BlockBoxRenderer_3(&$»this, &$establishesNewFormattingContext) {
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
function cocktail_core_renderer_BlockBoxRenderer_4(&$»this) {
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
function cocktail_core_renderer_BlockBoxRenderer_5(&$»this, &$child, &$graphicContext, &$referenceLayer, &$rootElementRenderer) {
	$»spos = $GLOBALS['%s']->length;
	{
		$_this = $child->coreStyle->computedValues;
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
function cocktail_core_renderer_BlockBoxRenderer_6(&$»this, &$child, &$graphicContext, &$referenceLayer, &$rootRenderer) {
	$»spos = $GLOBALS['%s']->length;
	{
		$_this = $child->coreStyle->computedValues;
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
function cocktail_core_renderer_BlockBoxRenderer_7(&$»this, &$child, &$graphicContext, &$referenceLayer, &$rootRenderer) {
	$»spos = $GLOBALS['%s']->length;
	{
		$_this = $child->coreStyle->computedValues;
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
function cocktail_core_renderer_BlockBoxRenderer_8(&$»this, &$_this, &$height, &$transition, &$width) {
	$»spos = $GLOBALS['%s']->length;
	{
		$_this1 = $_this->computedValues;
		$typedProperty = null;
		$length = $_this1->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($_this1->_properties, $i)->name === "width") {
					$typedProperty = $_this1->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}
function cocktail_core_renderer_BlockBoxRenderer_9(&$»this, &$_this, &$height, &$transition, &$width) {
	$»spos = $GLOBALS['%s']->length;
	{
		$_this1 = $_this->computedValues;
		$typedProperty = null;
		$length = $_this1->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($_this1->_properties, $i)->name === "height") {
					$typedProperty = $_this1->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}

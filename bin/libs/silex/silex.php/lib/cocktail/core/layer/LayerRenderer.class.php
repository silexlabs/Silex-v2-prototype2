<?php

class cocktail_core_layer_LayerRenderer extends cocktail_core_utils_FastNode {
	public function __construct($rootElementRenderer) {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.layer.LayerRenderer::new");
		$»spos = $GLOBALS['%s']->length;
		parent::__construct();
		$this->rootElementRenderer = $rootElementRenderer;
		$this->zeroAndAutoZIndexChildLayerRenderers = new _hx_array(array());
		$this->positiveZIndexChildLayerRenderers = new _hx_array(array());
		$this->negativeZIndexChildLayerRenderers = new _hx_array(array());
		$this->_parentStackingContexts = new _hx_array(array());
		$this->hasOwnGraphicsContext = false;
		$this->_needsRendering = true;
		$this->_needsBitmapSizeUpdate = true;
		$this->_needsGraphicsContextUpdate = true;
		$this->_needsStackingContextUpdate = true;
		$this->_alpha = 1.0;
		$this->_windowWidth = 0;
		$this->_windowHeight = 0;
		$GLOBALS['%s']->pop();
	}}
	public function establishesNewStackingContext() {
		$GLOBALS['%s']->push("cocktail.core.layer.LayerRenderer::establishesNewStackingContext");
		$»spos = $GLOBALS['%s']->length;
		$»t = (_hx_deref((cocktail_core_layer_LayerRenderer_0($this)))->typedValue);
		switch($»t->index) {
		case 4:
		$value = $»t->params[0];
		{
			if($value === cocktail_core_css_CSSKeywordValue::$AUTO) {
				$GLOBALS['%s']->pop();
				return false;
			}
		}break;
		default:{
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return true;
		}
		$GLOBALS['%s']->pop();
	}
	public function insertNegativeZIndexChildRenderer($childLayerRenderer, $rootElementRendererZIndex, $negativeZIndexChildLayerRenderers) {
		$GLOBALS['%s']->push("cocktail.core.layer.LayerRenderer::insertNegativeZIndexChildRenderer");
		$»spos = $GLOBALS['%s']->length;
		$length = $negativeZIndexChildLayerRenderers->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				$currentRendererZIndex = 0;
				$»t = (_hx_deref((cocktail_core_layer_LayerRenderer_1($this, $_g, $childLayerRenderer, $currentRendererZIndex, $i, $length, $negativeZIndexChildLayerRenderers, $rootElementRendererZIndex)))->typedValue);
				switch($»t->index) {
				case 0:
				$value = $»t->params[0];
				{
					$currentRendererZIndex = $value;
				}break;
				default:{
				}break;
				}
				if($currentRendererZIndex > $rootElementRendererZIndex) {
					$negativeZIndexChildLayerRenderers->insert($i, $childLayerRenderer);
					{
						$GLOBALS['%s']->pop();
						return;
					}
				}
				unset($i,$currentRendererZIndex);
			}
		}
		$negativeZIndexChildLayerRenderers->push($childLayerRenderer);
		$GLOBALS['%s']->pop();
	}
	public function insertPositiveZIndexChildRenderer($childLayerRenderer, $rootElementRendererZIndex, $positiveZIndexChildLayerRenderers) {
		$GLOBALS['%s']->push("cocktail.core.layer.LayerRenderer::insertPositiveZIndexChildRenderer");
		$»spos = $GLOBALS['%s']->length;
		$length = $positiveZIndexChildLayerRenderers->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				$currentRendererZIndex = 0;
				$»t = (_hx_deref((cocktail_core_layer_LayerRenderer_2($this, $_g, $childLayerRenderer, $currentRendererZIndex, $i, $length, $positiveZIndexChildLayerRenderers, $rootElementRendererZIndex)))->typedValue);
				switch($»t->index) {
				case 0:
				$value = $»t->params[0];
				{
					$currentRendererZIndex = $value;
				}break;
				default:{
				}break;
				}
				if($rootElementRendererZIndex < $currentRendererZIndex) {
					$positiveZIndexChildLayerRenderers->insert($i, $childLayerRenderer);
					{
						$GLOBALS['%s']->pop();
						return;
					}
				}
				unset($i,$currentRendererZIndex);
			}
		}
		$positiveZIndexChildLayerRenderers->push($childLayerRenderer);
		$GLOBALS['%s']->pop();
	}
	public function getParentStackingContext() {
		$GLOBALS['%s']->push("cocktail.core.layer.LayerRenderer::getParentStackingContext");
		$»spos = $GLOBALS['%s']->length;
		$parentStackingContext = $this->parentNode;
		while($parentStackingContext->establishesNewStackingContext() === false) {
			$parentStackingContext = $parentStackingContext->parentNode;
		}
		$this->_parentStackingContexts = cocktail_core_utils_Utils::clear($this->_parentStackingContexts);
		$length = $parentStackingContext->negativeZIndexChildLayerRenderers->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				$this->_parentStackingContexts->push($parentStackingContext->negativeZIndexChildLayerRenderers[$i]);
				unset($i);
			}
		}
		$length = $parentStackingContext->zeroAndAutoZIndexChildLayerRenderers->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				$this->_parentStackingContexts->push($parentStackingContext->zeroAndAutoZIndexChildLayerRenderers[$i]);
				unset($i);
			}
		}
		$length = $parentStackingContext->positiveZIndexChildLayerRenderers->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				$this->_parentStackingContexts->push($parentStackingContext->positiveZIndexChildLayerRenderers[$i]);
				unset($i);
			}
		}
		{
			$»tmp = $this->_parentStackingContexts;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getConcatenatedMatrix($matrix, $relativeOffset) {
		$GLOBALS['%s']->push("cocktail.core.layer.LayerRenderer::getConcatenatedMatrix");
		$»spos = $GLOBALS['%s']->length;
		$currentMatrix = new cocktail_core_geom_Matrix(null, null, null, null, null, null);
		$globalBounds = $this->rootElementRenderer->get_globalBounds();
		$currentMatrix->translate($globalBounds->x + $relativeOffset->x, $globalBounds->y + $relativeOffset->y);
		$currentMatrix->concatenate($matrix);
		$currentMatrix->translate(($globalBounds->x + $relativeOffset->x) * -1, ($globalBounds->y + $relativeOffset->y) * -1);
		{
			$GLOBALS['%s']->pop();
			return $currentMatrix;
		}
		$GLOBALS['%s']->pop();
	}
	public function getTransformationMatrix($graphicContext) {
		$GLOBALS['%s']->push("cocktail.core.layer.LayerRenderer::getTransformationMatrix");
		$»spos = $GLOBALS['%s']->length;
		$relativeOffset = $this->rootElementRenderer->getRelativeOffset();
		$concatenatedMatrix = $this->getConcatenatedMatrix($this->rootElementRenderer->coreStyle->usedValues->transform, $relativeOffset);
		$concatenatedMatrix->translate($relativeOffset->x, $relativeOffset->y);
		{
			$GLOBALS['%s']->pop();
			return $concatenatedMatrix;
		}
		$GLOBALS['%s']->pop();
	}
	public function clear() {
		$GLOBALS['%s']->push("cocktail.core.layer.LayerRenderer::clear");
		$»spos = $GLOBALS['%s']->length;
		$this->graphicsContext->graphics->clear();
		$GLOBALS['%s']->pop();
	}
	public function initBitmapData($width, $height) {
		$GLOBALS['%s']->push("cocktail.core.layer.LayerRenderer::initBitmapData");
		$»spos = $GLOBALS['%s']->length;
		$this->graphicsContext->graphics->initBitmapData($width, $height);
		$GLOBALS['%s']->pop();
	}
	public function render($windowWidth, $windowHeight) {
		$GLOBALS['%s']->push("cocktail.core.layer.LayerRenderer::render");
		$»spos = $GLOBALS['%s']->length;
		if($this->_needsBitmapSizeUpdate === true) {
			if($this->hasOwnGraphicsContext === true) {
				$this->initBitmapData($windowWidth, $windowHeight);
			}
			$this->_needsBitmapSizeUpdate = false;
			$this->invalidateRendering();
		} else {
			if($windowWidth !== $this->_windowWidth || $windowHeight !== $this->_windowHeight) {
				if($this->hasOwnGraphicsContext === true) {
					$this->initBitmapData($windowWidth, $windowHeight);
					$this->_needsBitmapSizeUpdate = false;
				}
				$this->invalidateRendering();
			}
		}
		$this->_windowWidth = $windowWidth;
		$this->_windowHeight = $windowHeight;
		if($this->_needsRendering === true) {
			if($this->hasOwnGraphicsContext === true) {
				$this->clear();
			}
		}
		$negativeChildLength = $this->negativeZIndexChildLayerRenderers->length;
		{
			$_g = 0;
			while($_g < $negativeChildLength) {
				$i = $_g++;
				_hx_array_get($this->negativeZIndexChildLayerRenderers, $i)->render($windowWidth, $windowHeight);
				unset($i);
			}
		}
		if($this->_needsRendering === true) {
			if($this->_alpha !== 1.0) {
				$this->graphicsContext->graphics->beginTransparency($this->_alpha);
			}
			$this->rootElementRenderer->render($this->graphicsContext);
			if($this->_alpha !== 1.0) {
				$this->graphicsContext->graphics->endTransparency();
			}
		}
		$childLength = $this->zeroAndAutoZIndexChildLayerRenderers->length;
		{
			$_g = 0;
			while($_g < $childLength) {
				$i = $_g++;
				_hx_array_get($this->zeroAndAutoZIndexChildLayerRenderers, $i)->render($windowWidth, $windowHeight);
				unset($i);
			}
		}
		$positiveChildLength = $this->positiveZIndexChildLayerRenderers->length;
		{
			$_g = 0;
			while($_g < $positiveChildLength) {
				$i = $_g++;
				_hx_array_get($this->positiveZIndexChildLayerRenderers, $i)->render($windowWidth, $windowHeight);
				unset($i);
			}
		}
		$this->rootElementRenderer->renderScrollBars($this->graphicsContext, $windowWidth, $windowHeight);
		if($this->_needsRendering === true) {
			if($this->rootElementRenderer->isTransformed() === true) {
				cocktail_core_layout_computer_VisualEffectStylesComputer::compute($this->rootElementRenderer->coreStyle);
				$this->graphicsContext->graphics->transform($this->getTransformationMatrix($this->graphicsContext));
			}
		}
		$this->_needsRendering = false;
		$GLOBALS['%s']->pop();
	}
	public function isCompositingLayer() {
		$GLOBALS['%s']->push("cocktail.core.layer.LayerRenderer::isCompositingLayer");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function hasCompositingLayerSibling() {
		$GLOBALS['%s']->push("cocktail.core.layer.LayerRenderer::hasCompositingLayerSibling");
		$»spos = $GLOBALS['%s']->length;
		$parentStackingContexts = $this->getParentStackingContext();
		$length = $parentStackingContexts->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				$child = $parentStackingContexts[$i];
				if($child === $this) {
					$GLOBALS['%s']->pop();
					return false;
				} else {
					if($child->isCompositingLayer() === true || $child->hasOwnGraphicsContext === true) {
						$GLOBALS['%s']->pop();
						return true;
					}
				}
				unset($i,$child);
			}
		}
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function hasCompositingLayerDescendant($rootLayerRenderer) {
		$GLOBALS['%s']->push("cocktail.core.layer.LayerRenderer::hasCompositingLayerDescendant");
		$»spos = $GLOBALS['%s']->length;
		$child = $rootLayerRenderer->firstChild;
		while($child !== null) {
			if($child->isCompositingLayer() === true) {
				$GLOBALS['%s']->pop();
				return true;
			} else {
				if($child->firstChild !== null) {
					$hasCompositingLayer = $this->hasCompositingLayerDescendant($child);
					if($hasCompositingLayer === true) {
						$GLOBALS['%s']->pop();
						return true;
					}
					unset($hasCompositingLayer);
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
	public function establishesNewGraphicsContext() {
		$GLOBALS['%s']->push("cocktail.core.layer.LayerRenderer::establishesNewGraphicsContext");
		$»spos = $GLOBALS['%s']->length;
		if($this->establishesNewStackingContext() === false) {
			$GLOBALS['%s']->pop();
			return false;
		} else {
			if($this->hasCompositingLayerDescendant($this) === true) {
				$GLOBALS['%s']->pop();
				return true;
			} else {
				if($this->hasCompositingLayerSibling() === true) {
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
	public function createGraphicsContext($parentGraphicsContext) {
		$GLOBALS['%s']->push("cocktail.core.layer.LayerRenderer::createGraphicsContext");
		$»spos = $GLOBALS['%s']->length;
		if($this->establishesNewGraphicsContext() === true) {
			$this->graphicsContext = new cocktail_core_graphics_GraphicsContext($this);
			$this->_needsBitmapSizeUpdate = true;
			$this->hasOwnGraphicsContext = true;
			$parentStackingContexts = $this->getParentStackingContext();
			$foundSelf = false;
			$inserted = false;
			$length = $parentStackingContexts->length;
			{
				$_g = 0;
				while($_g < $length) {
					$i = $_g++;
					$child = $parentStackingContexts[$i];
					if($foundSelf === true) {
						if($child->graphicsContext !== null) {
							if($child->hasOwnGraphicsContext === true && $inserted === false) {
								$parentGraphicsContext->insertBefore($this->graphicsContext, $child->graphicsContext);
								$inserted = true;
							}
						}
					}
					if($child === $this) {
						$foundSelf = true;
					}
					unset($i,$child);
				}
			}
			if($inserted === false) {
				$parentGraphicsContext->appendChild($this->graphicsContext);
			}
		} else {
			$this->graphicsContext = $parentGraphicsContext;
		}
		$GLOBALS['%s']->pop();
	}
	public function detachGraphicsContext() {
		$GLOBALS['%s']->push("cocktail.core.layer.LayerRenderer::detachGraphicsContext");
		$»spos = $GLOBALS['%s']->length;
		if($this->hasOwnGraphicsContext === true) {
			$this->parentNode->graphicsContext->removeChild($this->graphicsContext);
			$this->graphicsContext->dispose();
			$this->hasOwnGraphicsContext = false;
		}
		$this->graphicsContext = null;
		$GLOBALS['%s']->pop();
	}
	public function attachGraphicsContext() {
		$GLOBALS['%s']->push("cocktail.core.layer.LayerRenderer::attachGraphicsContext");
		$»spos = $GLOBALS['%s']->length;
		if($this->parentNode !== null) {
			$this->createGraphicsContext($this->parentNode->graphicsContext);
		}
		$GLOBALS['%s']->pop();
	}
	public function detach() {
		$GLOBALS['%s']->push("cocktail.core.layer.LayerRenderer::detach");
		$»spos = $GLOBALS['%s']->length;
		$child = $this->firstChild;
		while($child !== null) {
			$child->detach();
			$child = $child->nextSibling;
		}
		$this->detachGraphicsContext();
		$GLOBALS['%s']->pop();
	}
	public function attach() {
		$GLOBALS['%s']->push("cocktail.core.layer.LayerRenderer::attach");
		$»spos = $GLOBALS['%s']->length;
		$this->attachGraphicsContext();
		$child = $this->firstChild;
		while($child !== null) {
			$child->attach();
			$child = $child->nextSibling;
		}
		$GLOBALS['%s']->pop();
	}
	public function removeChild($oldChild) {
		$GLOBALS['%s']->push("cocktail.core.layer.LayerRenderer::removeChild");
		$»spos = $GLOBALS['%s']->length;
		$oldChild->invalidateGraphicsContext($oldChild->isCompositingLayer());
		$oldChild->invalidateStackingContext();
		$oldChild->invalidateRendering();
		$this->invalidateStackingContext();
		$oldChild->detach();
		parent::removeChild($oldChild);
		$GLOBALS['%s']->pop();
	}
	public function insertBefore($newChild, $refChild) {
		$GLOBALS['%s']->push("cocktail.core.layer.LayerRenderer::insertBefore");
		$»spos = $GLOBALS['%s']->length;
		parent::insertBefore($newChild,$refChild);
		if($refChild === null) {
			$GLOBALS['%s']->pop();
			return;
		}
		$this->invalidateStackingContext();
		$newChild->invalidateStackingContext();
		$newChild->invalidateRendering();
		$newChild->invalidateGraphicsContext($newChild->isCompositingLayer());
		$GLOBALS['%s']->pop();
	}
	public function appendChild($newChild) {
		$GLOBALS['%s']->push("cocktail.core.layer.LayerRenderer::appendChild");
		$»spos = $GLOBALS['%s']->length;
		parent::appendChild($newChild);
		$this->invalidateStackingContext();
		$newChild->invalidateStackingContext();
		$newChild->invalidateGraphicsContext($newChild->isCompositingLayer());
		$GLOBALS['%s']->pop();
	}
	public function invalidateChildLayerRenderer($rootLayer) {
		$GLOBALS['%s']->push("cocktail.core.layer.LayerRenderer::invalidateChildLayerRenderer");
		$»spos = $GLOBALS['%s']->length;
		$child = $rootLayer->firstChild;
		while($child !== null) {
			if($child->hasOwnGraphicsContext === false) {
				$child->invalidateOwnRendering();
				$this->invalidateChildLayerRenderer($child);
			}
			$child = $child->nextSibling;
		}
		$GLOBALS['%s']->pop();
	}
	public function invalidateStackingContext() {
		$GLOBALS['%s']->push("cocktail.core.layer.LayerRenderer::invalidateStackingContext");
		$»spos = $GLOBALS['%s']->length;
		$this->negativeZIndexChildLayerRenderers = cocktail_core_utils_Utils::clear($this->negativeZIndexChildLayerRenderers);
		$this->zeroAndAutoZIndexChildLayerRenderers = cocktail_core_utils_Utils::clear($this->zeroAndAutoZIndexChildLayerRenderers);
		$this->positiveZIndexChildLayerRenderers = cocktail_core_utils_Utils::clear($this->positiveZIndexChildLayerRenderers);
		$htmlDocument = $this->rootElementRenderer->domNode->ownerDocument;
		$htmlDocument->invalidationManager->invalidateStackingContexts();
		$this->_needsStackingContextUpdate = true;
		$GLOBALS['%s']->pop();
	}
	public function invalidateOwnRendering() {
		$GLOBALS['%s']->push("cocktail.core.layer.LayerRenderer::invalidateOwnRendering");
		$»spos = $GLOBALS['%s']->length;
		$this->_needsRendering = true;
		$GLOBALS['%s']->pop();
	}
	public function invalidateRendering() {
		$GLOBALS['%s']->push("cocktail.core.layer.LayerRenderer::invalidateRendering");
		$»spos = $GLOBALS['%s']->length;
		$this->_needsRendering = true;
		if($this->hasOwnGraphicsContext === true) {
			$this->invalidateChildLayerRenderer($this);
		} else {
			if($this->parentNode !== null) {
				$parent = $this->parentNode;
				while($parent->establishesNewGraphicsContext() === false) {
					$parent = $parent->parentNode;
				}
				$parent->invalidateRendering();
			}
		}
		$htmlDocument = $this->rootElementRenderer->domNode->ownerDocument;
		$htmlDocument->invalidationManager->invalidateRendering();
		$GLOBALS['%s']->pop();
	}
	public function invalidateGraphicsContext($force) {
		$GLOBALS['%s']->push("cocktail.core.layer.LayerRenderer::invalidateGraphicsContext");
		$»spos = $GLOBALS['%s']->length;
		$this->_needsGraphicsContextUpdate = true;
		$htmlDocument = $this->rootElementRenderer->domNode->ownerDocument;
		$htmlDocument->invalidationManager->invalidateGraphicsContextTree($force);
		$GLOBALS['%s']->pop();
	}
	public function doUpdateStackingContext($rootLayerRenderer, $negativeChildContext, $autoAndZeroChildContext, $positiveChildContext) {
		$GLOBALS['%s']->push("cocktail.core.layer.LayerRenderer::doUpdateStackingContext");
		$»spos = $GLOBALS['%s']->length;
		$child = $rootLayerRenderer->firstChild;
		while($child !== null) {
			$»t = (_hx_deref((cocktail_core_layer_LayerRenderer_3($this, $autoAndZeroChildContext, $child, $negativeChildContext, $positiveChildContext, $rootLayerRenderer)))->typedValue);
			switch($»t->index) {
			case 4:
			$value = $»t->params[0];
			{
				if($value !== cocktail_core_css_CSSKeywordValue::$AUTO) {
					throw new HException("Illegal value for z-index style");
				}
				$autoAndZeroChildContext->push($child);
			}break;
			case 0:
			$value = $»t->params[0];
			{
				if($value === 0) {
					$autoAndZeroChildContext->push($child);
				} else {
					if($value > 0) {
						$this->insertPositiveZIndexChildRenderer($child, $value, $positiveChildContext);
					} else {
						if($value < 0) {
							$this->insertNegativeZIndexChildRenderer($child, $value, $negativeChildContext);
						}
					}
				}
			}break;
			default:{
				throw new HException("Illegal value for z-index style");
			}break;
			}
			if($child->establishesNewStackingContext() === false) {
				$this->doUpdateStackingContext($child, $negativeChildContext, $autoAndZeroChildContext, $positiveChildContext);
			}
			$child = $child->nextSibling;
		}
		$GLOBALS['%s']->pop();
	}
	public function updateStackingContext() {
		$GLOBALS['%s']->push("cocktail.core.layer.LayerRenderer::updateStackingContext");
		$»spos = $GLOBALS['%s']->length;
		$this->_needsStackingContextUpdate = false;
		$this->negativeZIndexChildLayerRenderers = cocktail_core_utils_Utils::clear($this->negativeZIndexChildLayerRenderers);
		$this->zeroAndAutoZIndexChildLayerRenderers = cocktail_core_utils_Utils::clear($this->zeroAndAutoZIndexChildLayerRenderers);
		$this->positiveZIndexChildLayerRenderers = cocktail_core_utils_Utils::clear($this->positiveZIndexChildLayerRenderers);
		if($this->establishesNewStackingContext() === true) {
			$this->doUpdateStackingContext($this, $this->negativeZIndexChildLayerRenderers, $this->zeroAndAutoZIndexChildLayerRenderers, $this->positiveZIndexChildLayerRenderers);
		}
		$child = $this->firstChild;
		while($child !== null) {
			$child->updateStackingContext();
			$child = $child->nextSibling;
		}
		$GLOBALS['%s']->pop();
	}
	public function updateLayerAlpha($parentAlpha) {
		$GLOBALS['%s']->push("cocktail.core.layer.LayerRenderer::updateLayerAlpha");
		$»spos = $GLOBALS['%s']->length;
		$layerAlpha = 1.0;
		if($this->rootElementRenderer->isTransparent() === true) {
			$coreStyle = $this->rootElementRenderer->coreStyle;
			$»t = (cocktail_core_layer_LayerRenderer_4($this, $coreStyle, $layerAlpha, $parentAlpha));
			switch($»t->index) {
			case 1:
			$value = $»t->params[0];
			{
				$layerAlpha = $value;
			}break;
			case 17:
			$value = $»t->params[0];
			{
				$layerAlpha = $value;
			}break;
			default:{
			}break;
			}
		}
		$this->_alpha = $layerAlpha * $parentAlpha;
		$child = $this->firstChild;
		while($child !== null) {
			$child->updateLayerAlpha($this->_alpha);
			$child = $child->nextSibling;
		}
		$GLOBALS['%s']->pop();
	}
	public function updateGraphicsContext($force) {
		$GLOBALS['%s']->push("cocktail.core.layer.LayerRenderer::updateGraphicsContext");
		$»spos = $GLOBALS['%s']->length;
		if($this->_needsGraphicsContextUpdate === true || $force === true) {
			$this->_needsGraphicsContextUpdate = false;
			if($this->graphicsContext === null) {
				$this->attach();
				{
					$GLOBALS['%s']->pop();
					return;
				}
			} else {
				if($this->hasOwnGraphicsContext != $this->establishesNewGraphicsContext()) {
					$this->detach();
					$this->attach();
					{
						$GLOBALS['%s']->pop();
						return;
					}
				}
			}
		}
		$child = $this->firstChild;
		while($child !== null) {
			$child->updateGraphicsContext($force);
			$child = $child->nextSibling;
		}
		$GLOBALS['%s']->pop();
	}
	public function dispose() {
		$GLOBALS['%s']->push("cocktail.core.layer.LayerRenderer::dispose");
		$»spos = $GLOBALS['%s']->length;
		$this->zeroAndAutoZIndexChildLayerRenderers = null;
		$this->positiveZIndexChildLayerRenderers = null;
		$this->negativeZIndexChildLayerRenderers = null;
		$this->rootElementRenderer = null;
		$this->graphicsContext = null;
		$GLOBALS['%s']->pop();
	}
	public $_alpha;
	public $_needsBitmapSizeUpdate;
	public $_needsStackingContextUpdate;
	public $_needsGraphicsContextUpdate;
	public $_needsRendering;
	public $hasOwnGraphicsContext;
	public $_windowHeight;
	public $_windowWidth;
	public $graphicsContext;
	public $_parentStackingContexts;
	public $negativeZIndexChildLayerRenderers;
	public $positiveZIndexChildLayerRenderers;
	public $zeroAndAutoZIndexChildLayerRenderers;
	public $rootElementRenderer;
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
	function __toString() { return 'cocktail.core.layer.LayerRenderer'; }
}
function cocktail_core_layer_LayerRenderer_0(&$»this) {
	$»spos = $GLOBALS['%s']->length;
	{
		$_this = $»this->rootElementRenderer->coreStyle->computedValues;
		$typedProperty = null;
		$length = $_this->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($_this->_properties, $i)->name === "z-index") {
					$typedProperty = $_this->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}
function cocktail_core_layer_LayerRenderer_1(&$»this, &$_g, &$childLayerRenderer, &$currentRendererZIndex, &$i, &$length, &$negativeZIndexChildLayerRenderers, &$rootElementRendererZIndex) {
	$»spos = $GLOBALS['%s']->length;
	{
		$_this = _hx_array_get($negativeZIndexChildLayerRenderers, $i)->rootElementRenderer->coreStyle->computedValues;
		$typedProperty = null;
		$length1 = $_this->_properties->length;
		{
			$_g1 = 0;
			while($_g1 < $length1) {
				$i1 = $_g1++;
				if(_hx_array_get($_this->_properties, $i1)->name === "z-index") {
					$typedProperty = $_this->_properties[$i1];
				}
				unset($i1);
			}
		}
		return $typedProperty;
	}
}
function cocktail_core_layer_LayerRenderer_2(&$»this, &$_g, &$childLayerRenderer, &$currentRendererZIndex, &$i, &$length, &$positiveZIndexChildLayerRenderers, &$rootElementRendererZIndex) {
	$»spos = $GLOBALS['%s']->length;
	{
		$_this = _hx_array_get($positiveZIndexChildLayerRenderers, $i)->rootElementRenderer->coreStyle->computedValues;
		$typedProperty = null;
		$length1 = $_this->_properties->length;
		{
			$_g1 = 0;
			while($_g1 < $length1) {
				$i1 = $_g1++;
				if(_hx_array_get($_this->_properties, $i1)->name === "z-index") {
					$typedProperty = $_this->_properties[$i1];
				}
				unset($i1);
			}
		}
		return $typedProperty;
	}
}
function cocktail_core_layer_LayerRenderer_3(&$»this, &$autoAndZeroChildContext, &$child, &$negativeChildContext, &$positiveChildContext, &$rootLayerRenderer) {
	$»spos = $GLOBALS['%s']->length;
	{
		$_this = $child->rootElementRenderer->coreStyle->computedValues;
		$typedProperty = null;
		$length = $_this->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($_this->_properties, $i)->name === "z-index") {
					$typedProperty = $_this->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}
function cocktail_core_layer_LayerRenderer_4(&$»this, &$coreStyle, &$layerAlpha, &$parentAlpha) {
	$»spos = $GLOBALS['%s']->length;
	{
		$transition = $coreStyle->_transitionManager->getTransition("opacity", $coreStyle);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layer_LayerRenderer_5($»this, $coreStyle, $layerAlpha, $parentAlpha, $transition)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layer_LayerRenderer_5(&$»this, &$coreStyle, &$layerAlpha, &$parentAlpha, &$transition) {
	$»spos = $GLOBALS['%s']->length;
	{
		$_this = $coreStyle->computedValues;
		$typedProperty = null;
		$length = $_this->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($_this->_properties, $i)->name === "opacity") {
					$typedProperty = $_this->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}

<?php

class cocktail_core_renderer_FlowBoxRenderer extends cocktail_core_renderer_BoxRenderer {
	public function __construct($node) {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.renderer.FlowBoxRenderer::new");
		$»spos = $GLOBALS['%s']->length;
		parent::__construct($node);
		$this->_positionedChildren = new _hx_array(array());
		$GLOBALS['%s']->pop();
	}}
	public function childrenInline() {
		$GLOBALS['%s']->push("cocktail.core.renderer.FlowBoxRenderer::childrenInline");
		$»spos = $GLOBALS['%s']->length;
		$length = $this->childNodes->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				$child = $this->childNodes[$i];
				if($child->isInlineLevel() === true) {
					if($child->isFloat() === false) {
						if($child->isPositioned() === false || $child->isRelativePositioned() === true) {
							$GLOBALS['%s']->pop();
							return true;
						}
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
	public function getBottomOffset($elementRenderer, $containingHTMLElementHeight) {
		$GLOBALS['%s']->push("cocktail.core.renderer.FlowBoxRenderer::getBottomOffset");
		$»spos = $GLOBALS['%s']->length;
		$usedValues = $elementRenderer->coreStyle->usedValues;
		{
			$»tmp = $containingHTMLElementHeight - $usedValues->height - $usedValues->paddingTop - $usedValues->paddingBottom - $usedValues->bottom;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getTopOffset($elementRenderer) {
		$GLOBALS['%s']->push("cocktail.core.renderer.FlowBoxRenderer::getTopOffset");
		$»spos = $GLOBALS['%s']->length;
		$usedValues = $elementRenderer->coreStyle->usedValues;
		{
			$»tmp = $usedValues->top + $usedValues->marginTop;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getRightOffset($elementRenderer, $containingHTMLElementWidth) {
		$GLOBALS['%s']->push("cocktail.core.renderer.FlowBoxRenderer::getRightOffset");
		$»spos = $GLOBALS['%s']->length;
		$usedValues = $elementRenderer->coreStyle->usedValues;
		{
			$»tmp = $containingHTMLElementWidth - $usedValues->width - $usedValues->paddingLeft - $usedValues->paddingRight - $usedValues->right - $usedValues->marginRight;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getLeftOffset($elementRenderer) {
		$GLOBALS['%s']->push("cocktail.core.renderer.FlowBoxRenderer::getLeftOffset");
		$»spos = $GLOBALS['%s']->length;
		$usedValues = $elementRenderer->coreStyle->usedValues;
		{
			$»tmp = $usedValues->left + $usedValues->marginLeft;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function doLayoutPositionedChild($elementRenderer, $containingBlockData) {
		$GLOBALS['%s']->push("cocktail.core.renderer.FlowBoxRenderer::doLayoutPositionedChild");
		$»spos = $GLOBALS['%s']->length;
		$elementCoreStyle = $elementRenderer->coreStyle;
		if($elementCoreStyle->isAuto($elementCoreStyle->get_left()) === false) {
			$elementRenderer->positionedOrigin->x = $this->getLeftOffset($elementRenderer);
		} else {
			if($elementCoreStyle->isAuto($elementCoreStyle->get_right()) === false) {
				$elementRenderer->positionedOrigin->x = $this->getRightOffset($elementRenderer, $containingBlockData->width);
			}
		}
		if($elementCoreStyle->isAuto($elementCoreStyle->get_top()) === false) {
			$elementRenderer->positionedOrigin->y = $this->getTopOffset($elementRenderer);
		} else {
			if($elementCoreStyle->isAuto($elementCoreStyle->get_bottom()) === false) {
				$elementRenderer->positionedOrigin->y = $this->getBottomOffset($elementRenderer, $containingBlockData->height);
			}
		}
		$GLOBALS['%s']->pop();
	}
	public function layoutPositionedChild($elementRenderer, $firstPositionedAncestorData, $viewportData) {
		$GLOBALS['%s']->push("cocktail.core.renderer.FlowBoxRenderer::layoutPositionedChild");
		$»spos = $GLOBALS['%s']->length;
		$coreStyle = $elementRenderer->coreStyle;
		$»t = ($coreStyle->getKeyword($elementRenderer->coreStyle->get_position()));
		switch($»t->index) {
		case 35:
		{
			$this->doLayoutPositionedChild($elementRenderer, $viewportData);
		}break;
		case 34:
		{
			$this->doLayoutPositionedChild($elementRenderer, $firstPositionedAncestorData);
		}break;
		default:{
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	public function layoutPositionedChildren() {
		$GLOBALS['%s']->push("cocktail.core.renderer.FlowBoxRenderer::layoutPositionedChildren");
		$»spos = $GLOBALS['%s']->length;
		$containerBlockData = $this->getContainerBlockData();
		$windowData = $this->getWindowData();
		$length = $this->_positionedChildren->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				$this->layoutPositionedChild($this->_positionedChildren[$i], $containerBlockData, $windowData);
				unset($i);
			}
		}
		$GLOBALS['%s']->pop();
	}
	public function layoutChildren() {
		$GLOBALS['%s']->push("cocktail.core.renderer.FlowBoxRenderer::layoutChildren");
		$»spos = $GLOBALS['%s']->length;
		$childNodes = $this->childNodes;
		$length = $childNodes->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				_hx_array_get($childNodes, $i)->layout($this->_childrenNeedLayout);
				unset($i);
			}
		}
		$GLOBALS['%s']->pop();
	}
	public function layout($forceLayout) {
		$GLOBALS['%s']->push("cocktail.core.renderer.FlowBoxRenderer::layout");
		$»spos = $GLOBALS['%s']->length;
		parent::layout($forceLayout);
		$this->layoutChildren();
		if($this->_positionedChildrenNeedLayout === true || $forceLayout === true) {
			if($this->isPositioned() === true) {
				$this->layoutPositionedChildren();
			}
			$this->_positionedChildrenNeedLayout = false;
		}
		$GLOBALS['%s']->pop();
	}
	public function removePositionedChild($element) {
		$GLOBALS['%s']->push("cocktail.core.renderer.FlowBoxRenderer::removePositionedChild");
		$»spos = $GLOBALS['%s']->length;
		$this->_positionedChildren->remove($element);
		$GLOBALS['%s']->pop();
	}
	public function addPositionedChildren($element) {
		$GLOBALS['%s']->push("cocktail.core.renderer.FlowBoxRenderer::addPositionedChildren");
		$»spos = $GLOBALS['%s']->length;
		$this->_positionedChildren->push($element);
		$GLOBALS['%s']->pop();
	}
	public function getLineBoxesInLine($rootLineBox) {
		$GLOBALS['%s']->push("cocktail.core.renderer.FlowBoxRenderer::getLineBoxesInLine");
		$»spos = $GLOBALS['%s']->length;
		$ret = new _hx_array(array());
		$length = $rootLineBox->childNodes->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				$child = $rootLineBox->childNodes[$i];
				$ret->push($child);
				if($child->hasChildNodes() === true) {
					$childLineBoxes = $this->getLineBoxesInLine($child);
					$childLength = $childLineBoxes->length;
					{
						$_g1 = 0;
						while($_g1 < $childLength) {
							$j = $_g1++;
							$ret->push($childLineBoxes[$j]);
							unset($j);
						}
						unset($_g1);
					}
					unset($childLineBoxes,$childLength);
				}
				unset($i,$child);
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $ret;
		}
		$GLOBALS['%s']->pop();
	}
	public $_positionedChildren;
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
	function __toString() { return 'cocktail.core.renderer.FlowBoxRenderer'; }
}

<?php

class cocktail_core_style_floats_FloatsManager {
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.style.floats.FloatsManager::new");
		$»spos = $GLOBALS['%s']->length;
		$floatsLeft = new _hx_array(array());
		$floatsRight = new _hx_array(array());
		$this->_floats = _hx_anonymous(array("left" => $floatsLeft, "right" => $floatsRight));
		$GLOBALS['%s']->pop();
	}}
	public function getFloats() {
		$GLOBALS['%s']->push("cocktail.core.style.floats.FloatsManager::getFloats");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->_floats;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getLeftFloatOffset($y) {
		$GLOBALS['%s']->push("cocktail.core.style.floats.FloatsManager::getLeftFloatOffset");
		$»spos = $GLOBALS['%s']->length;
		$leftFloatOffset = 0;
		{
			$_g1 = 0; $_g = $this->_floats->left->length;
			while($_g1 < $_g) {
				$i = $_g1++;
				if(_hx_array_get($this->_floats->left, $i)->y + _hx_array_get($this->_floats->left, $i)->height > $y && _hx_array_get($this->_floats->left, $i)->y <= $y) {
					if(_hx_array_get($this->_floats->left, $i)->x + _hx_array_get($this->_floats->left, $i)->width > $leftFloatOffset) {
						$leftFloatOffset = _hx_array_get($this->_floats->left, $i)->x + _hx_array_get($this->_floats->left, $i)->width;
					}
				}
				unset($i);
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $leftFloatOffset;
		}
		$GLOBALS['%s']->pop();
	}
	public function getRightFloatOffset($y, $containingWidth) {
		$GLOBALS['%s']->push("cocktail.core.style.floats.FloatsManager::getRightFloatOffset");
		$»spos = $GLOBALS['%s']->length;
		$rightFloatOffset = 0;
		{
			$_g1 = 0; $_g = $this->_floats->right->length;
			while($_g1 < $_g) {
				$i = $_g1++;
				if(_hx_array_get($this->_floats->right, $i)->y + _hx_array_get($this->_floats->right, $i)->height > $y && _hx_array_get($this->_floats->right, $i)->y <= $y) {
					if($containingWidth - _hx_array_get($this->_floats->right, $i)->x > $rightFloatOffset) {
						$rightFloatOffset = $containingWidth - _hx_array_get($this->_floats->right, $i)->x;
					}
				}
				unset($i);
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $rightFloatOffset;
		}
		$GLOBALS['%s']->pop();
	}
	public function doRemoveFloat($floats, $flowY) {
		$GLOBALS['%s']->push("cocktail.core.style.floats.FloatsManager::doRemoveFloat");
		$»spos = $GLOBALS['%s']->length;
		$newFloats = new _hx_array(array());
		{
			$_g1 = 0; $_g = $floats->length;
			while($_g1 < $_g) {
				$i = $_g1++;
				if(_hx_array_get($floats, $i)->y + _hx_array_get($floats, $i)->height > $flowY) {
					$newFloats->push($floats[$i]);
				}
				unset($i);
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $newFloats;
		}
		$GLOBALS['%s']->pop();
	}
	public function removeFloats($flowY) {
		$GLOBALS['%s']->push("cocktail.core.style.floats.FloatsManager::removeFloats");
		$»spos = $GLOBALS['%s']->length;
		$this->_floats->left = $this->doRemoveFloat($this->_floats->left, $flowY);
		$this->_floats->right = $this->doRemoveFloat($this->_floats->right, $flowY);
		$GLOBALS['%s']->pop();
	}
	public function getFirstAvailableY($currentFormattingContextY, $elementWidth, $containingBlockWidth) {
		$GLOBALS['%s']->push("cocktail.core.style.floats.FloatsManager::getFirstAvailableY");
		$»spos = $GLOBALS['%s']->length;
		$retY = $currentFormattingContextY;
		while($this->getLeftFloatOffset($retY) + $this->getRightFloatOffset($retY, $containingBlockWidth) + $elementWidth > $containingBlockWidth) {
			$afterFloats = new _hx_array(array());
			$leftFloatLength = $this->_floats->left->length;
			{
				$_g = 0;
				while($_g < $leftFloatLength) {
					$i = $_g++;
					if(_hx_array_get($this->_floats->left, $i)->y <= $retY && _hx_array_get($this->_floats->left, $i)->height + _hx_array_get($this->_floats->left, $i)->y > $retY) {
						$afterFloats->push($this->_floats->left[$i]);
					}
					unset($i);
				}
				unset($_g);
			}
			{
				$_g1 = 0; $_g = $this->_floats->right->length;
				while($_g1 < $_g) {
					$i = $_g1++;
					if(_hx_array_get($this->_floats->right, $i)->y <= $retY && _hx_array_get($this->_floats->right, $i)->height + _hx_array_get($this->_floats->right, $i)->y > $retY) {
						$afterFloats->push($this->_floats->right[$i]);
					}
					unset($i);
				}
				unset($_g1,$_g);
			}
			if($afterFloats->length === 0) {
				break;
			} else {
				$nextY = 1000000;
				{
					$_g1 = 0; $_g = $afterFloats->length;
					while($_g1 < $_g) {
						$i = $_g1++;
						if(_hx_array_get($afterFloats, $i)->y + _hx_array_get($afterFloats, $i)->height - $retY < $nextY) {
							$nextY = _hx_array_get($afterFloats, $i)->y + _hx_array_get($afterFloats, $i)->height - $retY;
						}
						unset($i);
					}
					unset($_g1,$_g);
				}
				$retY += $nextY;
				unset($nextY);
			}
			unset($leftFloatLength,$afterFloats);
		}
		{
			$GLOBALS['%s']->pop();
			return $retY;
		}
		$GLOBALS['%s']->pop();
	}
	public function getFloatData($elementRenderer, $currentFormattingContextY, $currentFormattingContextX, $containingBlockWidth) {
		$GLOBALS['%s']->push("cocktail.core.style.floats.FloatsManager::getFloatData");
		$»spos = $GLOBALS['%s']->length;
		$computedStyle = $elementRenderer->coreStyle->computedStyle;
		$floatWidth = $computedStyle->getWidth() + $computedStyle->getPaddingLeft() + $computedStyle->getPaddingRight() + $computedStyle->getMarginLeft() + $computedStyle->getMarginRight();
		$floatHeight = $computedStyle->getHeight() + $computedStyle->getPaddingTop() + $computedStyle->getPaddingBottom() + $computedStyle->getMarginTop() + $computedStyle->getMarginBottom();
		$floatY = $this->getFirstAvailableY($currentFormattingContextY, $floatWidth, $containingBlockWidth);
		$floatX = 0.0;
		{
			$»tmp = _hx_anonymous(array("x" => $floatX, "y" => $floatY, "width" => $floatWidth, "height" => $floatHeight));
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getRightFloatData($elementRenderer, $currentFormattingContextY, $currentFormattingContextX, $containingBlockWidth) {
		$GLOBALS['%s']->push("cocktail.core.style.floats.FloatsManager::getRightFloatData");
		$»spos = $GLOBALS['%s']->length;
		$floatData = $this->getFloatData($elementRenderer, $currentFormattingContextY, $currentFormattingContextX, $containingBlockWidth);
		$floatData->x = $containingBlockWidth - $floatData->width - $this->getRightFloatOffset($floatData->y, $containingBlockWidth);
		{
			$GLOBALS['%s']->pop();
			return $floatData;
		}
		$GLOBALS['%s']->pop();
	}
	public function getLeftFloatData($elementRenderer, $currentFormattingContextY, $currentFormattingContextX, $containingBlockWidth) {
		$GLOBALS['%s']->push("cocktail.core.style.floats.FloatsManager::getLeftFloatData");
		$»spos = $GLOBALS['%s']->length;
		$floatData = $this->getFloatData($elementRenderer, $currentFormattingContextY, $currentFormattingContextX, $containingBlockWidth);
		$floatData->x = $this->getLeftFloatOffset($floatData->y);
		{
			$GLOBALS['%s']->pop();
			return $floatData;
		}
		$GLOBALS['%s']->pop();
	}
	public function registerFloat($elementRenderer, $currentFormattingContextY, $currentFormattingContextX, $containingBlockWidth) {
		$GLOBALS['%s']->push("cocktail.core.style.floats.FloatsManager::registerFloat");
		$»spos = $GLOBALS['%s']->length;
		$ret = null;
		$»t = ($elementRenderer->coreStyle->computedStyle->cssFloat);
		switch($»t->index) {
		case 0:
		{
			$ret = $this->getLeftFloatData($elementRenderer, $currentFormattingContextY, $currentFormattingContextX, $containingBlockWidth);
			$this->_floats->left->push($ret);
		}break;
		case 1:
		{
			$ret = $this->getRightFloatData($elementRenderer, $currentFormattingContextY, $currentFormattingContextX, $containingBlockWidth);
			$this->_floats->right->push($ret);
		}break;
		case 2:
		{
			$ret = null;
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $ret;
		}
		$GLOBALS['%s']->pop();
	}
	public function doClearFloat($currentFormattingContextY, $floats) {
		$GLOBALS['%s']->push("cocktail.core.style.floats.FloatsManager::doClearFloat");
		$»spos = $GLOBALS['%s']->length;
		if($floats->length > 0) {
			$highestFloat = $floats[0];
			{
				$_g1 = 0; $_g = $floats->length;
				while($_g1 < $_g) {
					$i = $_g1++;
					if(_hx_array_get($floats, $i)->y + _hx_array_get($floats, $i)->height > $highestFloat->y + $highestFloat->height) {
						$highestFloat = $floats[$i];
					}
					unset($i);
				}
			}
			{
				$»tmp = $highestFloat->y + $highestFloat->height;
				$GLOBALS['%s']->pop();
				return $»tmp;
			}
		} else {
			$GLOBALS['%s']->pop();
			return $currentFormattingContextY;
		}
		$GLOBALS['%s']->pop();
	}
	public function clearBoth($currentFormattingContextY) {
		$GLOBALS['%s']->push("cocktail.core.style.floats.FloatsManager::clearBoth");
		$»spos = $GLOBALS['%s']->length;
		$leftY = $this->doClearFloat($currentFormattingContextY, $this->_floats->left);
		$rightY = $this->doClearFloat($currentFormattingContextY, $this->_floats->right);
		if($leftY > $rightY) {
			$GLOBALS['%s']->pop();
			return $leftY;
		} else {
			$GLOBALS['%s']->pop();
			return $rightY;
		}
		$GLOBALS['%s']->pop();
	}
	public function clearRight($currentFormattingContextY) {
		$GLOBALS['%s']->push("cocktail.core.style.floats.FloatsManager::clearRight");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->doClearFloat($currentFormattingContextY, $this->_floats->right);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function clearLeft($currentFormattingContextY) {
		$GLOBALS['%s']->push("cocktail.core.style.floats.FloatsManager::clearLeft");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->doClearFloat($currentFormattingContextY, $this->_floats->left);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function clearFloat($clear, $currentFormattingContextY) {
		$GLOBALS['%s']->push("cocktail.core.style.floats.FloatsManager::clearFloat");
		$»spos = $GLOBALS['%s']->length;
		$ret = null;
		$»t = ($clear);
		switch($»t->index) {
		case 1:
		{
			$ret = $this->clearLeft($currentFormattingContextY);
			$this->_floats->left = new _hx_array(array());
		}break;
		case 2:
		{
			$ret = $this->clearRight($currentFormattingContextY);
			$this->_floats->right = new _hx_array(array());
		}break;
		case 3:
		{
			$ret = $this->clearBoth($currentFormattingContextY);
			$this->_floats->right = new _hx_array(array());
			$this->_floats->left = new _hx_array(array());
		}break;
		case 0:
		{
			$ret = $currentFormattingContextY;
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $ret;
		}
		$GLOBALS['%s']->pop();
	}
	public $floats;
	public $_floats;
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
	static $__properties__ = array("get_floats" => "getFloats");
	function __toString() { return 'cocktail.core.style.floats.FloatsManager'; }
}

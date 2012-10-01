<?php

class cocktail_core_layout_floats_FloatsManager {
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.layout.floats.FloatsManager::new");
		$»spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}}
	public function getFloats() {
		$GLOBALS['%s']->push("cocktail.core.layout.floats.FloatsManager::getFloats");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->_floats;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getLeftFloatOffset($y) {
		$GLOBALS['%s']->push("cocktail.core.layout.floats.FloatsManager::getLeftFloatOffset");
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
		$GLOBALS['%s']->push("cocktail.core.layout.floats.FloatsManager::getRightFloatOffset");
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
		$GLOBALS['%s']->push("cocktail.core.layout.floats.FloatsManager::doRemoveFloat");
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
		$GLOBALS['%s']->push("cocktail.core.layout.floats.FloatsManager::removeFloats");
		$»spos = $GLOBALS['%s']->length;
		$this->_floats->left = $this->doRemoveFloat($this->_floats->left, $flowY);
		$this->_floats->right = $this->doRemoveFloat($this->_floats->right, $flowY);
		$GLOBALS['%s']->pop();
	}
	public function getFirstAvailableY($currentFormattingContextY, $elementWidth, $containingBlockWidth) {
		$GLOBALS['%s']->push("cocktail.core.layout.floats.FloatsManager::getFirstAvailableY");
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
		$GLOBALS['%s']->push("cocktail.core.layout.floats.FloatsManager::getFloatData");
		$»spos = $GLOBALS['%s']->length;
		$usedValues = $elementRenderer->coreStyle->usedValues;
		$floatWidth = $usedValues->width + $usedValues->paddingLeft + $usedValues->paddingRight + $usedValues->marginLeft + $usedValues->marginRight;
		$floatHeight = $usedValues->height + $usedValues->paddingTop + $usedValues->paddingBottom + $usedValues->marginTop + $usedValues->marginBottom;
		$floatY = $this->getFirstAvailableY($currentFormattingContextY, $floatWidth, $containingBlockWidth);
		$floatX = 0.0;
		{
			$»tmp = new cocktail_core_geom_RectangleVO($floatX, $floatY, $floatWidth, $floatHeight);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getRightFloatData($elementRenderer, $currentFormattingContextY, $currentFormattingContextX, $containingBlockWidth) {
		$GLOBALS['%s']->push("cocktail.core.layout.floats.FloatsManager::getRightFloatData");
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
		$GLOBALS['%s']->push("cocktail.core.layout.floats.FloatsManager::getLeftFloatData");
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
		$GLOBALS['%s']->push("cocktail.core.layout.floats.FloatsManager::registerFloat");
		$»spos = $GLOBALS['%s']->length;
		$ret = null;
		$coreStyle = $elementRenderer->coreStyle;
		$»t = ($coreStyle->getKeyword($coreStyle->get_cssFloat()));
		switch($»t->index) {
		case 11:
		{
			$ret = $this->getLeftFloatData($elementRenderer, $currentFormattingContextY, $currentFormattingContextX, $containingBlockWidth);
			$this->_floats->left->push($ret);
		}break;
		case 12:
		{
			$ret = $this->getRightFloatData($elementRenderer, $currentFormattingContextY, $currentFormattingContextX, $containingBlockWidth);
			$this->_floats->right->push($ret);
		}break;
		case 18:
		{
			$ret = null;
		}break;
		default:{
			throw new HException("Illegal value for float style");
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $ret;
		}
		$GLOBALS['%s']->pop();
	}
	public function doClearFloat($currentFormattingContextY, $floats) {
		$GLOBALS['%s']->push("cocktail.core.layout.floats.FloatsManager::doClearFloat");
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
		$GLOBALS['%s']->push("cocktail.core.layout.floats.FloatsManager::clearBoth");
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
		$GLOBALS['%s']->push("cocktail.core.layout.floats.FloatsManager::clearRight");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->doClearFloat($currentFormattingContextY, $this->_floats->right);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function clearLeft($currentFormattingContextY) {
		$GLOBALS['%s']->push("cocktail.core.layout.floats.FloatsManager::clearLeft");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->doClearFloat($currentFormattingContextY, $this->_floats->left);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function clearFloat($clear, $currentFormattingContextY) {
		$GLOBALS['%s']->push("cocktail.core.layout.floats.FloatsManager::clearFloat");
		$»spos = $GLOBALS['%s']->length;
		$ret = null;
		$»t = ($clear);
		switch($»t->index) {
		case 4:
		$value = $»t->params[0];
		{
			$»t2 = ($value);
			switch($»t2->index) {
			case 11:
			{
				$ret = $this->clearLeft($currentFormattingContextY);
				$this->_floats->left = new _hx_array(array());
			}break;
			case 12:
			{
				$ret = $this->clearRight($currentFormattingContextY);
				$this->_floats->right = new _hx_array(array());
			}break;
			case 31:
			{
				$ret = $this->clearBoth($currentFormattingContextY);
				$this->_floats->right = new _hx_array(array());
				$this->_floats->left = new _hx_array(array());
			}break;
			case 18:
			{
				$ret = $currentFormattingContextY;
			}break;
			default:{
				$ret = $currentFormattingContextY;
			}break;
			}
		}break;
		default:{
			$ret = $currentFormattingContextY;
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $ret;
		}
		$GLOBALS['%s']->pop();
	}
	public function init() {
		$GLOBALS['%s']->push("cocktail.core.layout.floats.FloatsManager::init");
		$»spos = $GLOBALS['%s']->length;
		$floatsLeft = new _hx_array(array());
		$floatsRight = new _hx_array(array());
		$this->_floats = new cocktail_core_layout_FloatsVO($floatsLeft, $floatsRight);
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
	function __toString() { return 'cocktail.core.layout.floats.FloatsManager'; }
}

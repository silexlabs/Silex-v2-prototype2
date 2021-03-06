<?php

class cocktail_core_layout_floats_FloatsManager {
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.layout.floats.FloatsManager::new");
		$製pos = $GLOBALS['%s']->length;
		$floatsLeft = new _hx_array(array());
		$floatsRight = new _hx_array(array());
		$this->_floats = new cocktail_core_layout_FloatsVO($floatsLeft, $floatsRight);
		$GLOBALS['%s']->pop();
	}}
	public function getFloats() {
		$GLOBALS['%s']->push("cocktail.core.layout.floats.FloatsManager::getFloats");
		$製pos = $GLOBALS['%s']->length;
		{
			$裨mp = $this->_floats;
			$GLOBALS['%s']->pop();
			return $裨mp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getLeftFloatOffset($y) {
		$GLOBALS['%s']->push("cocktail.core.layout.floats.FloatsManager::getLeftFloatOffset");
		$製pos = $GLOBALS['%s']->length;
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
		$製pos = $GLOBALS['%s']->length;
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
		$製pos = $GLOBALS['%s']->length;
		$length = $floats->length;
		if($length === 0) {
			$GLOBALS['%s']->pop();
			return $floats;
		}
		$newFloats = new _hx_array(array());
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
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
		$製pos = $GLOBALS['%s']->length;
		$this->_floats->left = $this->doRemoveFloat($this->_floats->left, $flowY);
		$this->_floats->right = $this->doRemoveFloat($this->_floats->right, $flowY);
		$GLOBALS['%s']->pop();
	}
	public function getFirstAvailableY($currentFormattingContextY, $elementWidth, $containingBlockWidth) {
		$GLOBALS['%s']->push("cocktail.core.layout.floats.FloatsManager::getFirstAvailableY");
		$製pos = $GLOBALS['%s']->length;
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
		$製pos = $GLOBALS['%s']->length;
		$usedValues = $elementRenderer->coreStyle->usedValues;
		$floatWidth = $usedValues->width + $usedValues->paddingLeft + $usedValues->paddingRight + $usedValues->marginLeft + $usedValues->marginRight;
		$floatHeight = $usedValues->height + $usedValues->paddingTop + $usedValues->paddingBottom + $usedValues->marginTop + $usedValues->marginBottom;
		$floatY = $this->getFirstAvailableY($currentFormattingContextY, $floatWidth, $containingBlockWidth);
		$floatX = 0.0;
		$rect = new cocktail_core_geom_RectangleVO();
		$rect->x = $floatX;
		$rect->y = $floatY;
		$rect->width = $floatWidth;
		$rect->height = $floatHeight;
		{
			$GLOBALS['%s']->pop();
			return $rect;
		}
		$GLOBALS['%s']->pop();
	}
	public function getRightFloatData($elementRenderer, $currentFormattingContextY, $currentFormattingContextX, $containingBlockWidth) {
		$GLOBALS['%s']->push("cocktail.core.layout.floats.FloatsManager::getRightFloatData");
		$製pos = $GLOBALS['%s']->length;
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
		$製pos = $GLOBALS['%s']->length;
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
		$製pos = $GLOBALS['%s']->length;
		$ret = null;
		$coreStyle = $elementRenderer->coreStyle;
		$裨 = ($coreStyle->getKeyword(_hx_deref((cocktail_core_layout_floats_FloatsManager_0($this, $containingBlockWidth, $coreStyle, $currentFormattingContextX, $currentFormattingContextY, $elementRenderer, $ret)))->typedValue));
		switch($裨->index) {
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
		$製pos = $GLOBALS['%s']->length;
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
				$裨mp = $highestFloat->y + $highestFloat->height;
				$GLOBALS['%s']->pop();
				return $裨mp;
			}
		} else {
			$GLOBALS['%s']->pop();
			return $currentFormattingContextY;
		}
		$GLOBALS['%s']->pop();
	}
	public function clearBoth($currentFormattingContextY) {
		$GLOBALS['%s']->push("cocktail.core.layout.floats.FloatsManager::clearBoth");
		$製pos = $GLOBALS['%s']->length;
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
		$製pos = $GLOBALS['%s']->length;
		{
			$裨mp = $this->doClearFloat($currentFormattingContextY, $this->_floats->right);
			$GLOBALS['%s']->pop();
			return $裨mp;
		}
		$GLOBALS['%s']->pop();
	}
	public function clearLeft($currentFormattingContextY) {
		$GLOBALS['%s']->push("cocktail.core.layout.floats.FloatsManager::clearLeft");
		$製pos = $GLOBALS['%s']->length;
		{
			$裨mp = $this->doClearFloat($currentFormattingContextY, $this->_floats->left);
			$GLOBALS['%s']->pop();
			return $裨mp;
		}
		$GLOBALS['%s']->pop();
	}
	public function clearFloat($clear, $currentFormattingContextY) {
		$GLOBALS['%s']->push("cocktail.core.layout.floats.FloatsManager::clearFloat");
		$製pos = $GLOBALS['%s']->length;
		$ret = null;
		$裨 = ($clear);
		switch($裨->index) {
		case 4:
		$value = $裨->params[0];
		{
			$裨2 = ($value);
			switch($裨2->index) {
			case 11:
			{
				$ret = $this->clearLeft($currentFormattingContextY);
				$this->_floats->left = cocktail_core_utils_Utils::clear($this->_floats->left);
			}break;
			case 12:
			{
				$ret = $this->clearRight($currentFormattingContextY);
				$this->_floats->right = cocktail_core_utils_Utils::clear($this->_floats->right);
			}break;
			case 31:
			{
				$ret = $this->clearBoth($currentFormattingContextY);
				$this->_floats->right = cocktail_core_utils_Utils::clear($this->_floats->right);
				$this->_floats->left = cocktail_core_utils_Utils::clear($this->_floats->left);
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
		$製pos = $GLOBALS['%s']->length;
		if($this->_floats->left->length > 0 || $this->getFloats()->right->length > 0) {
			$this->_floats->left = cocktail_core_utils_Utils::clear($this->_floats->left);
			$this->_floats->right = cocktail_core_utils_Utils::clear($this->_floats->right);
		}
		$GLOBALS['%s']->pop();
	}
	public $floats;
	public $_floats;
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
	static $__properties__ = array("get_floats" => "getFloats");
	function __toString() { return 'cocktail.core.layout.floats.FloatsManager'; }
}
function cocktail_core_layout_floats_FloatsManager_0(&$裨his, &$containingBlockWidth, &$coreStyle, &$currentFormattingContextX, &$currentFormattingContextY, &$elementRenderer, &$ret) {
	$製pos = $GLOBALS['%s']->length;
	{
		$_this = $coreStyle->computedValues;
		$typedProperty = null;
		$length = $_this->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($_this->_properties, $i)->name === "float") {
					$typedProperty = $_this->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}

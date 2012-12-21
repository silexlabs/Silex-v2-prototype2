<?php

class cocktail_core_css_CascadeManager {
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.css.CascadeManager::new");
		$»spos = $GLOBALS['%s']->length;
		$this->propertiesToCascade = new _hx_array(array());
		$this->reset();
		$GLOBALS['%s']->pop();
	}}
	public function flagProperty($name) {
		$GLOBALS['%s']->push("cocktail.core.css.CascadeManager::flagProperty");
		$»spos = $GLOBALS['%s']->length;
		switch($name) {
		case "font-size":{
			if($this->hasFontSize === false) {
				$this->hasFontSize = true;
			} else {
				$GLOBALS['%s']->pop();
				return true;
			}
		}break;
		case "font-family":{
			if($this->hasFontFamily === false) {
				$this->hasFontFamily = true;
			} else {
				$GLOBALS['%s']->pop();
				return true;
			}
		}break;
		case "background-color":{
			if($this->hasBackgroundColor === false) {
				$this->hasBackgroundColor = true;
			} else {
				$GLOBALS['%s']->pop();
				return true;
			}
		}break;
		case "color":{
			if($this->hasColor === false) {
				$this->hasColor = true;
			} else {
				$GLOBALS['%s']->pop();
				return true;
			}
		}break;
		case "display":{
			if($this->hasDisplay === false) {
				$this->hasDisplay = true;
			} else {
				$GLOBALS['%s']->pop();
				return true;
			}
		}break;
		case "float":{
			if($this->hasFloat === false) {
				$this->hasFloat = true;
			} else {
				$GLOBALS['%s']->pop();
				return true;
			}
		}break;
		case "overflow-x":{
			if($this->hasOverflowX === false) {
				$this->hasOverflowX = true;
			} else {
				$GLOBALS['%s']->pop();
				return true;
			}
		}break;
		case "overflow-y":{
			if($this->hasOverflowY === false) {
				$this->hasOverflowY = true;
			} else {
				$GLOBALS['%s']->pop();
				return true;
			}
		}break;
		case "transform":{
			if($this->hasTransform === false) {
				$this->hasTransform = true;
			} else {
				$GLOBALS['%s']->pop();
				return true;
			}
		}break;
		case "z-index":{
			if($this->hasZIndex === false) {
				$this->hasZIndex = true;
			} else {
				$GLOBALS['%s']->pop();
				return true;
			}
		}break;
		case "position":{
			if($this->hasPosition === false) {
				$this->hasPosition = true;
			} else {
				$GLOBALS['%s']->pop();
				return true;
			}
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function shouldCascadeAll() {
		$GLOBALS['%s']->push("cocktail.core.css.CascadeManager::shouldCascadeAll");
		$»spos = $GLOBALS['%s']->length;
		$this->cascadeAll = true;
		$this->hasPropertiesToCascade = true;
		$GLOBALS['%s']->pop();
	}
	public function addPropertyToCascade($name) {
		$GLOBALS['%s']->push("cocktail.core.css.CascadeManager::addPropertyToCascade");
		$»spos = $GLOBALS['%s']->length;
		if($this->cascadeAll === true) {
			$GLOBALS['%s']->pop();
			return;
		}
		$wasAlreadyAdded = $this->flagProperty($name);
		if($wasAlreadyAdded === true) {
			$GLOBALS['%s']->pop();
			return;
		}
		$length = $this->propertiesToCascade->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if($this->propertiesToCascade[$i] === $name) {
					$GLOBALS['%s']->pop();
					return;
				}
				unset($i);
			}
		}
		$this->propertiesToCascade->push($name);
		$this->hasPropertiesToCascade = true;
		$GLOBALS['%s']->pop();
	}
	public function reset() {
		$GLOBALS['%s']->push("cocktail.core.css.CascadeManager::reset");
		$»spos = $GLOBALS['%s']->length;
		if($this->hasPropertiesToCascade === true) {
			$this->propertiesToCascade = cocktail_core_utils_Utils::clear($this->propertiesToCascade);
		}
		$this->hasFontSize = false;
		$this->hasFontFamily = false;
		$this->hasBackgroundColor = false;
		$this->hasColor = false;
		$this->hasDisplay = false;
		$this->hasFloat = false;
		$this->hasOverflowX = false;
		$this->hasOverflowY = false;
		$this->hasTransform = false;
		$this->hasZIndex = false;
		$this->hasPosition = false;
		$this->hasPropertiesToCascade = false;
		$this->cascadeAll = false;
		$GLOBALS['%s']->pop();
	}
	public $hasPosition;
	public $hasZIndex;
	public $hasTransform;
	public $hasOverflowY;
	public $hasOverflowX;
	public $hasFloat;
	public $hasDisplay;
	public $hasColor;
	public $hasBackgroundColor;
	public $hasFontFamily;
	public $hasFontSize;
	public $hasPropertiesToCascade;
	public $cascadeAll;
	public $propertiesToCascade;
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
	function __toString() { return 'cocktail.core.css.CascadeManager'; }
}

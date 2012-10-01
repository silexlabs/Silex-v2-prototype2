<?php

class cocktail_core_animation_Animator {
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.animation.Animator::new");
		$»spos = $GLOBALS['%s']->length;
		$this->_pendingAnimations = new _hx_array(array());
		$GLOBALS['%s']->pop();
	}}
	public function onTransitionUpdate($transition) {
		$GLOBALS['%s']->push("cocktail.core.animation.Animator::onTransitionUpdate");
		$»spos = $GLOBALS['%s']->length;
		$this->onTransitionUpdateCallback($transition);
		$GLOBALS['%s']->pop();
	}
	public function onTransitionComplete($transition) {
		$GLOBALS['%s']->push("cocktail.core.animation.Animator::onTransitionComplete");
		$»spos = $GLOBALS['%s']->length;
		$this->onTransitionCompleteCallback($transition);
		$GLOBALS['%s']->pop();
	}
	public function getRepeatedIndex($index, $length) {
		$GLOBALS['%s']->push("cocktail.core.animation.Animator::getRepeatedIndex");
		$»spos = $GLOBALS['%s']->length;
		if($index < $length) {
			$GLOBALS['%s']->pop();
			return $index;
		}
		{
			$»tmp = _hx_mod($length, $index);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getTransitionDelayOrDurationAsFloat($value) {
		$GLOBALS['%s']->push("cocktail.core.animation.Animator::getTransitionDelayOrDurationAsFloat");
		$»spos = $GLOBALS['%s']->length;
		$»t = ($value);
		switch($»t->index) {
		case 0:
		$value1 = $»t->params[0];
		{
			$GLOBALS['%s']->pop();
			return $value1;
		}break;
		case 9:
		$value1 = $»t->params[0];
		{
			$»t2 = ($value1);
			switch($»t2->index) {
			case 1:
			$value2 = $»t2->params[0];
			{
				$GLOBALS['%s']->pop();
				return $value2;
			}break;
			case 0:
			$value2 = $»t2->params[0];
			{
				$»tmp = $value2 * 1000;
				$GLOBALS['%s']->pop();
				return $»tmp;
			}break;
			default:{
			}break;
			}
		}break;
		default:{
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return 0.0;
		}
		$GLOBALS['%s']->pop();
	}
	public function getAsFloatArray($value) {
		$GLOBALS['%s']->push("cocktail.core.animation.Animator::getAsFloatArray");
		$»spos = $GLOBALS['%s']->length;
		$floats = new _hx_array(array());
		$»t = ($value);
		switch($»t->index) {
		case 14:
		$value1 = $»t->params[0];
		{
			$_g1 = 0; $_g = $value1->length;
			while($_g1 < $_g) {
				$i = $_g1++;
				$floats->push($this->getTransitionDelayOrDurationAsFloat($value1[$i]));
				unset($i);
			}
		}break;
		default:{
			$floats->push($this->getTransitionDelayOrDurationAsFloat($value));
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $floats;
		}
		$GLOBALS['%s']->pop();
	}
	public function getTransitionTimingFunctionsAsArray($transitionTimingFunction) {
		$GLOBALS['%s']->push("cocktail.core.animation.Animator::getTransitionTimingFunctionsAsArray");
		$»spos = $GLOBALS['%s']->length;
		$»t = ($transitionTimingFunction);
		switch($»t->index) {
		case 4:
		$value = $»t->params[0];
		{
			$»tmp = new _hx_array(array($transitionTimingFunction));
			$GLOBALS['%s']->pop();
			return $»tmp;
		}break;
		case 14:
		$value = $»t->params[0];
		{
			$GLOBALS['%s']->pop();
			return $value;
		}break;
		default:{
			$GLOBALS['%s']->pop();
			return null;
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	public function getEndValue($style, $propertyName) {
		$GLOBALS['%s']->push("cocktail.core.animation.Animator::getEndValue");
		$»spos = $GLOBALS['%s']->length;
		switch($propertyName) {
		case "opacity":{
			$»t = ($style->get_opacity());
			switch($»t->index) {
			case 1:
			$value = $»t->params[0];
			{
				$GLOBALS['%s']->pop();
				return $value;
			}break;
			case 17:
			$value = $»t->params[0];
			{
				$GLOBALS['%s']->pop();
				return $value;
			}break;
			default:{
				$GLOBALS['%s']->pop();
				return 0;
			}break;
			}
		}break;
		default:{
			$»tmp = Reflect::getProperty($style->usedValues, $propertyName);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	public function startTransitionIfNeeded($pendingAnimation, $style) {
		$GLOBALS['%s']->push("cocktail.core.animation.Animator::startTransitionIfNeeded");
		$»spos = $GLOBALS['%s']->length;
		$usedValues = $style->usedValues;
		$propertyIndex = 0;
		$»t = ($style->get_transitionProperty());
		switch($»t->index) {
		case 4:
		$value = $»t->params[0];
		{
			$»t2 = ($value);
			switch($»t2->index) {
			case 18:
			{
				$GLOBALS['%s']->pop();
				return false;
			}break;
			case 48:
			{
			}break;
			default:{
				throw new HException("Illegal keyword value for transition property");
			}break;
			}
		}break;
		case 3:
		$value = $»t->params[0];
		{
			if($value !== $pendingAnimation->propertyName) {
				$GLOBALS['%s']->pop();
				return false;
			}
		}break;
		case 14:
		$value = $»t->params[0];
		{
			$foundFlag = false;
			{
				$_g1 = 0; $_g = $value->length;
				while($_g1 < $_g) {
					$i = $_g1++;
					$»t2 = ($value[$i]);
					switch($»t2->index) {
					case 3:
					$value1 = $»t2->params[0];
					{
						if($value1 === $pendingAnimation->propertyName) {
							$propertyIndex = $i;
							$foundFlag = true;
							break 2;
						}
					}break;
					default:{
						throw new HException("Illegal value for transition property");
					}break;
					}
					unset($i);
				}
			}
			if($foundFlag === false) {
				$GLOBALS['%s']->pop();
				return false;
			}
		}break;
		default:{
			throw new HException("Illegal values for transition property style");
		}break;
		}
		$combinedDuration = 0.0;
		$transitionDelays = $this->getAsFloatArray($style->get_transitionDelay());
		$transitionDurations = $this->getAsFloatArray($style->get_transitionDuration());
		$transitionDelay = $transitionDelays[$this->getRepeatedIndex($propertyIndex, $transitionDelays->length)];
		$transitionDuration = $transitionDurations[$this->getRepeatedIndex($propertyIndex, $transitionDurations->length)];
		$combinedDuration = $transitionDuration + $transitionDelay;
		if($combinedDuration <= 0) {
			$GLOBALS['%s']->pop();
			return false;
		}
		$transitionTimingFunctionAsArray = $this->getTransitionTimingFunctionsAsArray($style->get_transitionTimingFunction());
		$transitionTimingFunction = $transitionTimingFunctionAsArray[$this->getRepeatedIndex($propertyIndex, $transitionTimingFunctionAsArray->length)];
		$transitionManager = cocktail_core_animation_TransitionManager::getInstance();
		$transition = $transitionManager->getTransition($pendingAnimation->propertyName, $style);
		if($transition !== null) {
			$GLOBALS['%s']->pop();
			return false;
		}
		$endValue = $this->getEndValue($style, $pendingAnimation->propertyName);
		$transitionManager->startTransition($style, $pendingAnimation->propertyName, $pendingAnimation->startValue, $endValue, $transitionDuration, $transitionDelay, $transitionTimingFunction, (isset($this->onTransitionComplete) ? $this->onTransitionComplete: array($this, "onTransitionComplete")), (isset($this->onTransitionUpdate) ? $this->onTransitionUpdate: array($this, "onTransitionUpdate")), $pendingAnimation->invalidationReason);
		{
			$GLOBALS['%s']->pop();
			return true;
		}
		$GLOBALS['%s']->pop();
	}
	public function registerPendingAnimation($propertyName, $invalidationReason, $startValue) {
		$GLOBALS['%s']->push("cocktail.core.animation.Animator::registerPendingAnimation");
		$»spos = $GLOBALS['%s']->length;
		$this->_pendingAnimations->push(_hx_anonymous(array("propertyName" => $propertyName, "invalidationReason" => $invalidationReason, "startValue" => $startValue)));
		$GLOBALS['%s']->pop();
	}
	public function startPendingAnimations($style) {
		$GLOBALS['%s']->push("cocktail.core.animation.Animator::startPendingAnimations");
		$»spos = $GLOBALS['%s']->length;
		$atLeastOneAnimationStarted = false;
		{
			$_g1 = 0; $_g = $this->_pendingAnimations->length;
			while($_g1 < $_g) {
				$i = $_g1++;
				$animationStarted = $this->startTransitionIfNeeded($this->_pendingAnimations[$i], $style);
				if($animationStarted === true) {
					$atLeastOneAnimationStarted = true;
				}
				unset($i,$animationStarted);
			}
		}
		$this->_pendingAnimations = new _hx_array(array());
		{
			$GLOBALS['%s']->pop();
			return $atLeastOneAnimationStarted;
		}
		$GLOBALS['%s']->pop();
	}
	public $onTransitionUpdateCallback;
	public $onTransitionCompleteCallback;
	public $_pendingAnimations;
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
	function __toString() { return 'cocktail.core.animation.Animator'; }
}

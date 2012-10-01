<?php

class cocktail_core_animation_Animator {
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		$this->_pendingAnimations = new _hx_array(array());
	}}
	public function onTransitionUpdate($transition) {
		$this->onTransitionUpdateCallback($transition);
	}
	public function onTransitionComplete($transition) {
		$this->onTransitionCompleteCallback($transition);
	}
	public function getRepeatedIndex($index, $length) {
		if($index < $length) {
			return $index;
		}
		return _hx_mod($length, $index);
	}
	public function getTransitionDelayOrDurationAsFloat($value) {
		$퍁 = ($value);
		switch($퍁->index) {
		case 0:
		$value1 = $퍁->params[0];
		{
			return $value1;
		}break;
		case 9:
		$value1 = $퍁->params[0];
		{
			$퍁2 = ($value1);
			switch($퍁2->index) {
			case 1:
			$value2 = $퍁2->params[0];
			{
				return $value2;
			}break;
			case 0:
			$value2 = $퍁2->params[0];
			{
				return $value2 * 1000;
			}break;
			default:{
			}break;
			}
		}break;
		default:{
		}break;
		}
		return 0.0;
	}
	public function getAsFloatArray($value) {
		$floats = new _hx_array(array());
		$퍁 = ($value);
		switch($퍁->index) {
		case 14:
		$value1 = $퍁->params[0];
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
		return $floats;
	}
	public function getTransitionTimingFunctionsAsArray($transitionTimingFunction) {
		$퍁 = ($transitionTimingFunction);
		switch($퍁->index) {
		case 4:
		$value = $퍁->params[0];
		{
			return new _hx_array(array($transitionTimingFunction));
		}break;
		case 14:
		$value = $퍁->params[0];
		{
			return $value;
		}break;
		default:{
			return null;
		}break;
		}
	}
	public function getEndValue($style, $propertyName) {
		switch($propertyName) {
		case "opacity":{
			$퍁 = ($style->get_opacity());
			switch($퍁->index) {
			case 1:
			$value = $퍁->params[0];
			{
				return $value;
			}break;
			case 17:
			$value = $퍁->params[0];
			{
				return $value;
			}break;
			default:{
				return 0;
			}break;
			}
		}break;
		default:{
			return Reflect::getProperty($style->usedValues, $propertyName);
		}break;
		}
	}
	public function startTransitionIfNeeded($pendingAnimation, $style) {
		$usedValues = $style->usedValues;
		$propertyIndex = 0;
		$퍁 = ($style->get_transitionProperty());
		switch($퍁->index) {
		case 4:
		$value = $퍁->params[0];
		{
			$퍁2 = ($value);
			switch($퍁2->index) {
			case 18:
			{
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
		$value = $퍁->params[0];
		{
			if($value !== $pendingAnimation->propertyName) {
				return false;
			}
		}break;
		case 14:
		$value = $퍁->params[0];
		{
			$foundFlag = false;
			{
				$_g1 = 0; $_g = $value->length;
				while($_g1 < $_g) {
					$i = $_g1++;
					$퍁2 = ($value[$i]);
					switch($퍁2->index) {
					case 3:
					$value1 = $퍁2->params[0];
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
			return false;
		}
		$transitionTimingFunctionAsArray = $this->getTransitionTimingFunctionsAsArray($style->get_transitionTimingFunction());
		$transitionTimingFunction = $transitionTimingFunctionAsArray[$this->getRepeatedIndex($propertyIndex, $transitionTimingFunctionAsArray->length)];
		$transitionManager = cocktail_core_animation_TransitionManager::getInstance();
		$transition = $transitionManager->getTransition($pendingAnimation->propertyName, $style);
		if($transition !== null) {
			return false;
		}
		$endValue = $this->getEndValue($style, $pendingAnimation->propertyName);
		$transitionManager->startTransition($style, $pendingAnimation->propertyName, $pendingAnimation->startValue, $endValue, $transitionDuration, $transitionDelay, $transitionTimingFunction, (isset($this->onTransitionComplete) ? $this->onTransitionComplete: array($this, "onTransitionComplete")), (isset($this->onTransitionUpdate) ? $this->onTransitionUpdate: array($this, "onTransitionUpdate")), $pendingAnimation->invalidationReason);
		return true;
	}
	public function registerPendingAnimation($propertyName, $invalidationReason, $startValue) {
		$this->_pendingAnimations->push(_hx_anonymous(array("propertyName" => $propertyName, "invalidationReason" => $invalidationReason, "startValue" => $startValue)));
	}
	public function startPendingAnimations($style) {
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
		return $atLeastOneAnimationStarted;
	}
	public $onTransitionUpdateCallback;
	public $onTransitionCompleteCallback;
	public $_pendingAnimations;
	public function __call($m, $a) {
		if(isset($this->$m) && is_callable($this->$m))
			return call_user_func_array($this->$m, $a);
		else if(isset($this->팪ynamics[$m]) && is_callable($this->팪ynamics[$m]))
			return call_user_func_array($this->팪ynamics[$m], $a);
		else if('toString' == $m)
			return $this->__toString();
		else
			throw new HException('Unable to call �'.$m.'�');
	}
	function __toString() { return 'cocktail.core.animation.Animator'; }
}

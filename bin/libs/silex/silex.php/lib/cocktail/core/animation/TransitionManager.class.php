<?php

class cocktail_core_animation_TransitionManager {
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.animation.TransitionManager::new");
		$製pos = $GLOBALS['%s']->length;
		$this->_transitions = new _hx_array(array());
		$this->_currentTransitionsNumber = 0;
		$this->_lastTick = 0;
		$GLOBALS['%s']->pop();
	}}
	public function onTransitionTick($timeStamp) {
		$GLOBALS['%s']->push("cocktail.core.animation.TransitionManager::onTransitionTick");
		$製pos = $GLOBALS['%s']->length;
		$interval = $timeStamp - $this->_lastTick;
		$this->_lastTick = $timeStamp;
		$transitionsLength = $this->_transitions->length;
		{
			$_g = 0;
			while($_g < $transitionsLength) {
				$i = $_g++;
				$completedTransitions = new _hx_array(array());
				$transitionsForProperty = _hx_array_get($this->_transitions, $i)->transitions;
				$length = $transitionsForProperty->length;
				{
					$_g1 = 0;
					while($_g1 < $length) {
						$j = $_g1++;
						$transition = $transitionsForProperty[$j];
						$transition->updateTime($interval);
						if($transition->get_complete() === true) {
							$transition->onComplete($transition);
							$completedTransitions->push($transition);
						} else {
							$transition->onUpdate($transition);
						}
						unset($transition,$j);
					}
					unset($_g1);
				}
				$completedTransitionsLength = $completedTransitions->length;
				{
					$_g1 = 0;
					while($_g1 < $completedTransitionsLength) {
						$i1 = $_g1++;
						$this->stopTransition($completedTransitions[$i1]);
						unset($i1);
					}
					unset($_g1);
				}
				unset($transitionsForProperty,$length,$i,$completedTransitionsLength,$completedTransitions);
			}
		}
		if($this->_currentTransitionsNumber > 0) {
			cocktail_Lib::get_document()->timer->delay((isset($this->onTransitionTick) ? $this->onTransitionTick: array($this, "onTransitionTick")), null);
		}
		$GLOBALS['%s']->pop();
	}
	public function startTransitionUpdate() {
		$GLOBALS['%s']->push("cocktail.core.animation.TransitionManager::startTransitionUpdate");
		$製pos = $GLOBALS['%s']->length;
		$this->_lastTick = Date::now()->getTime();
		cocktail_Lib::get_document()->timer->delay((isset($this->onTransitionTick) ? $this->onTransitionTick: array($this, "onTransitionTick")), null);
		$GLOBALS['%s']->pop();
	}
	public function getTransitionsForProperty($propertyName) {
		$GLOBALS['%s']->push("cocktail.core.animation.TransitionManager::getTransitionsForProperty");
		$製pos = $GLOBALS['%s']->length;
		$length = $this->_transitions->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($this->_transitions, $i)->propertyName === $propertyName) {
					$裨mp = _hx_array_get($this->_transitions, $i)->transitions;
					$GLOBALS['%s']->pop();
					return $裨mp;
					unset($裨mp);
				}
				unset($i);
			}
		}
		{
			$GLOBALS['%s']->pop();
			return null;
		}
		$GLOBALS['%s']->pop();
	}
	public function stopTransition($transition) {
		$GLOBALS['%s']->push("cocktail.core.animation.TransitionManager::stopTransition");
		$製pos = $GLOBALS['%s']->length;
		$propertyTransitions = $this->getTransitionsForProperty($transition->propertyName);
		$propertyTransitions->remove($transition);
		$transition->dispose();
		$this->_currentTransitionsNumber--;
		$GLOBALS['%s']->pop();
	}
	public function startTransition($target, $propertyName, $startValue, $endValue, $transitionDuration, $transitionDelay, $transitionTimingFunction, $onComplete, $onUpdate) {
		$GLOBALS['%s']->push("cocktail.core.animation.TransitionManager::startTransition");
		$製pos = $GLOBALS['%s']->length;
		$transition = new cocktail_core_animation_Transition($propertyName, $target, $transitionDuration, $transitionDelay, $transitionTimingFunction, $startValue, $endValue, $onComplete, $onUpdate);
		$transitionsForProperty = $this->getTransitionsForProperty($propertyName);
		if($transitionsForProperty === null) {
			$transitionsForProperty = new _hx_array(array());
			$transitionsVO = new cocktail_core_animation_TransitionsVO();
			$transitionsVO->propertyName = $propertyName;
			$transitionsVO->transitions = $transitionsForProperty;
			$this->_transitions->push($transitionsVO);
		}
		$transitionsForProperty->push($transition);
		if($this->_currentTransitionsNumber === 0) {
			$this->startTransitionUpdate();
		}
		$this->_currentTransitionsNumber++;
		$GLOBALS['%s']->pop();
	}
	public function getTransition($propertyName, $style) {
		$GLOBALS['%s']->push("cocktail.core.animation.TransitionManager::getTransition");
		$製pos = $GLOBALS['%s']->length;
		if($this->_currentTransitionsNumber === 0) {
			$GLOBALS['%s']->pop();
			return null;
		}
		$transitionsForProperty = $this->getTransitionsForProperty($propertyName);
		if($transitionsForProperty === null) {
			$GLOBALS['%s']->pop();
			return null;
		}
		$length = $transitionsForProperty->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($transitionsForProperty, $i)->target === $style) {
					$裨mp = $transitionsForProperty[$i];
					$GLOBALS['%s']->pop();
					return $裨mp;
					unset($裨mp);
				}
				unset($i);
			}
		}
		{
			$GLOBALS['%s']->pop();
			return null;
		}
		$GLOBALS['%s']->pop();
	}
	public $_lastTick;
	public $_currentTransitionsNumber;
	public $_transitions;
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
	static $_instance;
	static function getInstance() {
		$GLOBALS['%s']->push("cocktail.core.animation.TransitionManager::getInstance");
		$製pos = $GLOBALS['%s']->length;
		if(cocktail_core_animation_TransitionManager::$_instance === null) {
			cocktail_core_animation_TransitionManager::$_instance = new cocktail_core_animation_TransitionManager();
		}
		{
			$裨mp = cocktail_core_animation_TransitionManager::$_instance;
			$GLOBALS['%s']->pop();
			return $裨mp;
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'cocktail.core.animation.TransitionManager'; }
}

<?php

class cocktail_core_style_transition_TransitionManager {
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.style.transition.TransitionManager::new");
		$»spos = $GLOBALS['%s']->length;
		$this->_transitions = new Hash();
		$this->_currentTransitionsNumber = 0;
		$this->_lastTick = 0;
		$GLOBALS['%s']->pop();
	}}
	public function onTransitionTick() {
		$GLOBALS['%s']->push("cocktail.core.style.transition.TransitionManager::onTransitionTick");
		$»spos = $GLOBALS['%s']->length;
		$tick = Date::now()->getTime();
		$interval = $tick - $this->_lastTick;
		$this->_lastTick = $tick;
		if(null == $this->_transitions) throw new HException('null iterable');
		$»it = $this->_transitions->iterator();
		while($»it->hasNext()) {
			$propertyTransitions = $»it->next();
			$completedTransitions = new _hx_array(array());
			$length = $propertyTransitions->length;
			{
				$_g = 0;
				while($_g < $length) {
					$i = $_g++;
					$transition = $propertyTransitions[$i];
					$transition->updateTime($interval);
					if($transition->get_complete() === true) {
						$transition->onComplete($transition);
						$completedTransitions->push($transition);
					} else {
						$transition->onUpdate($transition);
					}
					unset($transition,$i);
				}
				unset($_g);
			}
			$completedTransitionsLength = $completedTransitions->length;
			{
				$_g = 0;
				while($_g < $completedTransitionsLength) {
					$i = $_g++;
					$this->stopTransition($completedTransitions[$i]);
					unset($i);
				}
				unset($_g);
			}
			unset($length,$completedTransitionsLength,$completedTransitions);
		}
		if($this->_currentTransitionsNumber > 0) {
		}
		$GLOBALS['%s']->pop();
	}
	public function startTransitionTimer() {
		$GLOBALS['%s']->push("cocktail.core.style.transition.TransitionManager::startTransitionTimer");
		$»spos = $GLOBALS['%s']->length;
		$this->_lastTick = Date::now()->getTime();
		$GLOBALS['%s']->pop();
	}
	public function stopTransition($transition) {
		$GLOBALS['%s']->push("cocktail.core.style.transition.TransitionManager::stopTransition");
		$»spos = $GLOBALS['%s']->length;
		$propertyTransitions = $this->_transitions->get($transition->propertyName);
		$propertyTransitions->remove($transition);
		$transition->dispose();
		$this->_currentTransitionsNumber--;
		$GLOBALS['%s']->pop();
	}
	public function startTransition($target, $propertyName, $startValue, $endValue, $transitionDuration, $transitionDelay, $transitionTimingFunction, $onComplete, $onUpdate, $invalidationReason) {
		$GLOBALS['%s']->push("cocktail.core.style.transition.TransitionManager::startTransition");
		$»spos = $GLOBALS['%s']->length;
		$transition = new cocktail_core_style_transition_Transition($propertyName, $target, $transitionDuration, $transitionDelay, $transitionTimingFunction, $startValue, $endValue, $onComplete, $onUpdate, $invalidationReason);
		if($this->_transitions->exists($propertyName) === false) {
			$this->_transitions->set($propertyName, new _hx_array(array()));
		}
		$propertyTransitions = $this->_transitions->get($propertyName);
		$propertyTransitions->push($transition);
		if($this->_currentTransitionsNumber === 0) {
			$this->startTransitionTimer();
		}
		$this->_currentTransitionsNumber++;
		$GLOBALS['%s']->pop();
	}
	public function getTransition($propertyName, $style) {
		$GLOBALS['%s']->push("cocktail.core.style.transition.TransitionManager::getTransition");
		$»spos = $GLOBALS['%s']->length;
		if($this->_currentTransitionsNumber === 0) {
			$GLOBALS['%s']->pop();
			return null;
		}
		if($this->_transitions->exists($propertyName)) {
			$propertyTransitions = $this->_transitions->get($propertyName);
			$length = $propertyTransitions->length;
			{
				$_g = 0;
				while($_g < $length) {
					$i = $_g++;
					if(_hx_array_get($propertyTransitions, $i)->target === $style) {
						$»tmp = $propertyTransitions[$i];
						$GLOBALS['%s']->pop();
						return $»tmp;
						unset($»tmp);
					}
					unset($i);
				}
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
		else if(isset($this->»dynamics[$m]) && is_callable($this->»dynamics[$m]))
			return call_user_func_array($this->»dynamics[$m], $a);
		else if('toString' == $m)
			return $this->__toString();
		else
			throw new HException('Unable to call «'.$m.'»');
	}
	static $_instance;
	static $TRANSITION_UPDATE_SPEED = 20;
	static function getInstance() {
		$GLOBALS['%s']->push("cocktail.core.style.transition.TransitionManager::getInstance");
		$»spos = $GLOBALS['%s']->length;
		if(cocktail_core_style_transition_TransitionManager::$_instance === null) {
			cocktail_core_style_transition_TransitionManager::$_instance = new cocktail_core_style_transition_TransitionManager();
		}
		{
			$»tmp = cocktail_core_style_transition_TransitionManager::$_instance;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'cocktail.core.style.transition.TransitionManager'; }
}

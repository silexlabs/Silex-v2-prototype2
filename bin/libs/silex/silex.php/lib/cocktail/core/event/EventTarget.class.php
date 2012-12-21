<?php

class cocktail_core_event_EventTarget {
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.event.EventTarget::new");
		$»spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}}
	public function executeDefaultActionIfNeeded($defaultPrevented, $event) {
		$GLOBALS['%s']->push("cocktail.core.event.EventTarget::executeDefaultActionIfNeeded");
		$»spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public function getTargetAncestors() {
		$GLOBALS['%s']->push("cocktail.core.event.EventTarget::getTargetAncestors");
		$»spos = $GLOBALS['%s']->length;
		if($this->_targetAncestors === null) {
			$this->_targetAncestors = new _hx_array(array());
		} else {
			$this->_targetAncestors = cocktail_core_utils_Utils::clear($this->_targetAncestors);
		}
		{
			$»tmp = $this->_targetAncestors;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function endEventDispatching($evt) {
		$GLOBALS['%s']->push("cocktail.core.event.EventTarget::endEventDispatching");
		$»spos = $GLOBALS['%s']->length;
		$defaultPrevented = $evt->defaultPrevented;
		$this->executeDefaultActionIfNeeded($defaultPrevented, $evt);
		{
			$GLOBALS['%s']->pop();
			return $defaultPrevented;
		}
		$GLOBALS['%s']->pop();
	}
	public function shouldStopEventPropagation($evt) {
		$GLOBALS['%s']->push("cocktail.core.event.EventTarget::shouldStopEventPropagation");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $evt->propagationStopped === true || $evt->immediatePropagationStopped === true;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function doDispatchEvent($eventListeners, $evt) {
		$GLOBALS['%s']->push("cocktail.core.event.EventTarget::doDispatchEvent");
		$»spos = $GLOBALS['%s']->length;
		$length = $eventListeners->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				$eventListener = $eventListeners[$i];
				if($evt->eventPhase === 1) {
					if($eventListener->useCapture === true) {
						$eventListener->handleEvent($evt);
					}
				} else {
					if($evt->eventPhase === 3) {
						if($eventListener->useCapture === false) {
							$eventListener->handleEvent($evt);
						}
					} else {
						if($evt->eventPhase === 2) {
							$eventListener->handleEvent($evt);
						}
					}
				}
				if($evt->immediatePropagationStopped === true) {
					$GLOBALS['%s']->pop();
					return;
				}
				unset($i,$eventListener);
			}
		}
		$GLOBALS['%s']->pop();
	}
	public function removeEventListener($type, $listener, $useCapture = null) {
		$GLOBALS['%s']->push("cocktail.core.event.EventTarget::removeEventListener");
		$»spos = $GLOBALS['%s']->length;
		if($useCapture === null) {
			$useCapture = false;
		}
		if($this->_registeredEventListeners === null) {
			$GLOBALS['%s']->pop();
			return;
		}
		if($this->_registeredEventListeners->exists($type) === true) {
			$registeredListeners = $this->_registeredEventListeners->get($type);
			$newEventListeners = new _hx_array(array());
			$length = $registeredListeners->length;
			{
				$_g = 0;
				while($_g < $length) {
					$i = $_g++;
					$eventListener = $registeredListeners[$i];
					if($eventListener->eventType === $type && $eventListener->useCapture === $useCapture && $eventListener->listener == $listener) {
						$eventListener->dispose();
					} else {
						$newEventListeners->push($eventListener);
					}
					unset($i,$eventListener);
				}
			}
			$this->_registeredEventListeners->set($type, $newEventListeners);
		}
		$GLOBALS['%s']->pop();
	}
	public function addEventListener($type, $listener, $useCapture = null) {
		$GLOBALS['%s']->push("cocktail.core.event.EventTarget::addEventListener");
		$»spos = $GLOBALS['%s']->length;
		if($useCapture === null) {
			$useCapture = false;
		}
		if($this->_registeredEventListeners === null) {
			$this->_registeredEventListeners = new Hash();
		}
		if($this->_registeredEventListeners->exists($type) === false) {
			$this->_registeredEventListeners->set($type, new _hx_array(array()));
		}
		$this->removeEventListener($type, $listener, $useCapture);
		$eventListener = new cocktail_core_event_EventListener($type, $listener, $useCapture);
		$this->_registeredEventListeners->get($type)->push($eventListener);
		$GLOBALS['%s']->pop();
	}
	public function dispatchEvent($evt) {
		$GLOBALS['%s']->push("cocktail.core.event.EventTarget::dispatchEvent");
		$»spos = $GLOBALS['%s']->length;
		$evt->currentTarget = $this;
		if($evt->dispatched === false) {
			$evt->target = $this;
			$evt->dispatched = true;
			$targetAncestors = $this->getTargetAncestors();
			$evt->eventPhase = 1;
			$targetAncestors->reverse();
			$length = $targetAncestors->length;
			{
				$_g = 0;
				while($_g < $length) {
					$i = $_g++;
					_hx_array_get($targetAncestors, $i)->dispatchEvent($evt);
					if($this->shouldStopEventPropagation($evt) === true) {
						$»tmp = $this->endEventDispatching($evt);
						$GLOBALS['%s']->pop();
						return $»tmp;
						unset($»tmp);
					}
					unset($i);
				}
			}
			$evt->eventPhase = 2;
			$this->dispatchEvent($evt);
			if($this->shouldStopEventPropagation($evt) === true) {
				$»tmp = $this->endEventDispatching($evt);
				$GLOBALS['%s']->pop();
				return $»tmp;
			}
			if($evt->bubbles === true) {
				$evt->eventPhase = 3;
				$targetAncestors->reverse();
				$length1 = $targetAncestors->length;
				{
					$_g = 0;
					while($_g < $length1) {
						$i = $_g++;
						_hx_array_get($targetAncestors, $i)->dispatchEvent($evt);
						if($this->shouldStopEventPropagation($evt) === true) {
							$»tmp = $this->endEventDispatching($evt);
							$GLOBALS['%s']->pop();
							return $»tmp;
							unset($»tmp);
						}
						unset($i);
					}
				}
				{
					$»tmp = $this->endEventDispatching($evt);
					$GLOBALS['%s']->pop();
					return $»tmp;
				}
			}
		} else {
			if($this->_registeredEventListeners !== null) {
				if($this->_registeredEventListeners->exists($evt->type) === true) {
					$this->doDispatchEvent($this->_registeredEventListeners->get($evt->type), $evt);
				}
			}
		}
		{
			$»tmp = $evt->defaultPrevented;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public $_targetAncestors;
	public $_registeredEventListeners;
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
	function __toString() { return 'cocktail.core.event.EventTarget'; }
}

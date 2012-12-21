<?php

class brix_component_navigation_transition_TransitionObserver {
	public function __construct($page, $startEvent, $stopEvent) {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("brix.component.navigation.transition.TransitionObserver::new");
		$»spos = $GLOBALS['%s']->length;
		$this->page = $page;
		$this->startEvent = $startEvent;
		$this->stopEvent = $stopEvent;
		$GLOBALS['%s']->pop();
	}}
	public function dispatch($eventName) {
		$GLOBALS['%s']->push("brix.component.navigation.transition.TransitionObserver::dispatch");
		$»spos = $GLOBALS['%s']->length;
		try {
			$event = cocktail_Lib::get_document()->createEvent("CustomEvent");
			$event->initCustomEvent($eventName, true, true, $this->page);
			$this->page->rootElement->dispatchEvent($event);
		}catch(Exception $»e) {
			$_ex_ = ($»e instanceof HException) ? $»e->e : $»e;
			$e = $_ex_;
			{
				$GLOBALS['%e'] = new _hx_array(array());
				while($GLOBALS['%s']->length >= $»spos) {
					$GLOBALS['%e']->unshift($GLOBALS['%s']->pop());
				}
				$GLOBALS['%s']->push($GLOBALS['%e'][0]);
				null;
			}
		}
		$GLOBALS['%s']->pop();
	}
	public function doRemoveTransition() {
		$GLOBALS['%s']->push("brix.component.navigation.transition.TransitionObserver::doRemoveTransition");
		$»spos = $GLOBALS['%s']->length;
		if($this->hasStoped) {
			$GLOBALS['%s']->pop();
			return;
		}
		$this->pendingTransitions--;
		if($this->pendingTransitions === 0) {
			$this->hasStoped = true;
			$this->dispatch($this->stopEvent);
		}
		$GLOBALS['%s']->pop();
	}
	public function removeTransition($layer) {
		$GLOBALS['%s']->push("brix.component.navigation.transition.TransitionObserver::removeTransition");
		$»spos = $GLOBALS['%s']->length;
		brix_util_DomTools::doLater((isset($this->doRemoveTransition) ? $this->doRemoveTransition: array($this, "doRemoveTransition")), null);
		$GLOBALS['%s']->pop();
	}
	public function addTransition($layer) {
		$GLOBALS['%s']->push("brix.component.navigation.transition.TransitionObserver::addTransition");
		$»spos = $GLOBALS['%s']->length;
		if($this->pendingTransitions === 0) {
			if($this->hasStoped) {
				$GLOBALS['%s']->pop();
				return;
			}
			$this->hasStarted = true;
			$this->dispatch($this->startEvent);
		}
		$this->pendingTransitions++;
		$GLOBALS['%s']->pop();
	}
	public $stopEvent;
	public $startEvent;
	public $page;
	public $pendingTransitions = 0;
	public $hasStoped = false;
	public $hasStarted = false;
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
	function __toString() { return 'brix.component.navigation.transition.TransitionObserver'; }
}

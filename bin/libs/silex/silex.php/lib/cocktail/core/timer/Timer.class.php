<?php

class cocktail_core_timer_Timer {
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.timer.Timer::new");
		$»spos = $GLOBALS['%s']->length;
		$this->_pendingCallbacks = new _hx_array(array());
		$this->_pendingCount = 0;
		$GLOBALS['%s']->pop();
	}}
	public function onUpdate() {
		$GLOBALS['%s']->push("cocktail.core.timer.Timer::onUpdate");
		$»spos = $GLOBALS['%s']->length;
		if($this->_pendingCount > 0) {
			$time = Date::now()->getTime();
			$length = $this->_pendingCallbacks->length;
			{
				$_g = 0;
				while($_g < $length) {
					$i = $_g++;
					$pendingCallback = $this->_pendingCallbacks[$i];
					if($pendingCallback->callbackTime < $time && $pendingCallback->called === false) {
						$pendingCallback->timerCallback($time);
						$pendingCallback->called = true;
						$this->_pendingCount--;
					}
					unset($pendingCallback,$i);
				}
			}
		}
		$GLOBALS['%s']->pop();
	}
	public function delay($timerCallback, $delay = null) {
		$GLOBALS['%s']->push("cocktail.core.timer.Timer::delay");
		$»spos = $GLOBALS['%s']->length;
		if($delay === null) {
			$delay = 0;
		}
		$this->_pendingCount++;
		$callbackTime = Date::now()->getTime() + $delay;
		$length = $this->_pendingCallbacks->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				$pendingCallback = $this->_pendingCallbacks[$i];
				if($pendingCallback->called === true) {
					$pendingCallback->called = false;
					$pendingCallback->callbackTime = $callbackTime;
					$pendingCallback->timerCallback = $timerCallback;
					{
						$GLOBALS['%s']->pop();
						return;
					}
				}
				unset($pendingCallback,$i);
			}
		}
		$newTimerCallback = new cocktail_core_timer_TimerCallbackVO();
		$newTimerCallback->called = false;
		$newTimerCallback->callbackTime = $callbackTime;
		$newTimerCallback->timerCallback = $timerCallback;
		$this->_pendingCallbacks->push($newTimerCallback);
		$GLOBALS['%s']->pop();
	}
	public $_pendingCount;
	public $_pendingCallbacks;
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
	function __toString() { return 'cocktail.core.timer.Timer'; }
}

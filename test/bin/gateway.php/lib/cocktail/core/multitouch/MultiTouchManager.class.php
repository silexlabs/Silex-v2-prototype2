<?php

class cocktail_core_multitouch_MultiTouchManager {
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.multitouch.MultiTouchManager::new");
		$»spos = $GLOBALS['%s']->length;
		$this->_touches = new _hx_array(array());
		$GLOBALS['%s']->pop();
	}}
	public function getTouchByIdentifier($identifier) {
		$GLOBALS['%s']->push("cocktail.core.multitouch.MultiTouchManager::getTouchByIdentifier");
		$»spos = $GLOBALS['%s']->length;
		$length = $this->_touches->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				$touch = $this->_touches[$i];
				if($touch->identifier === $identifier) {
					$GLOBALS['%s']->pop();
					return $touch;
				}
				unset($touch,$i);
			}
		}
		{
			$GLOBALS['%s']->pop();
			return null;
		}
		$GLOBALS['%s']->pop();
	}
	public function getTouchesByTarget($target) {
		$GLOBALS['%s']->push("cocktail.core.multitouch.MultiTouchManager::getTouchesByTarget");
		$»spos = $GLOBALS['%s']->length;
		$targetTouches = new _hx_array(array());
		$length = $this->_touches->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				$touch = $this->_touches[$i];
				if($touch->target === $target) {
					$targetTouches->push($touch);
				}
				unset($touch,$i);
			}
		}
		{
			$»tmp = new cocktail_core_event_TouchList($targetTouches);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function initTouchEvent($touchEvent, $targetTouches, $changedTouches) {
		$GLOBALS['%s']->push("cocktail.core.multitouch.MultiTouchManager::initTouchEvent");
		$»spos = $GLOBALS['%s']->length;
		$touchEvent->initTouchEvent($touchEvent->type, true, true, null, 0.0, new cocktail_core_event_TouchList($this->_touches), $targetTouches, $changedTouches, false, false, false, false);
		$GLOBALS['%s']->pop();
	}
	public function updatePagePosition($touch) {
		$GLOBALS['%s']->push("cocktail.core.multitouch.MultiTouchManager::updatePagePosition");
		$»spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public function updateStoredTouch($storedTouch, $touch) {
		$GLOBALS['%s']->push("cocktail.core.multitouch.MultiTouchManager::updateStoredTouch");
		$»spos = $GLOBALS['%s']->length;
		$storedTouch->clientX = $touch->clientX;
		$storedTouch->clientY = $touch->clientY;
		$storedTouch->screenX = $touch->screenX;
		$storedTouch->screenY = $touch->screenY;
		$this->updatePagePosition($storedTouch);
		$GLOBALS['%s']->pop();
	}
	public function updateTouch($touch, $touchEvent) {
		$GLOBALS['%s']->push("cocktail.core.multitouch.MultiTouchManager::updateTouch");
		$»spos = $GLOBALS['%s']->length;
		$storedTouch = $this->getTouchByIdentifier($touch->identifier);
		$this->updateStoredTouch($storedTouch, $touch);
		$this->initTouchEvent($touchEvent, $this->getTouchesByTarget($touch->target), new cocktail_core_event_TouchList(new _hx_array(array($touch))));
		$GLOBALS['%s']->pop();
	}
	public function unregisterTouch($touch, $touchEvent) {
		$GLOBALS['%s']->push("cocktail.core.multitouch.MultiTouchManager::unregisterTouch");
		$»spos = $GLOBALS['%s']->length;
		$storedTouch = $this->getTouchByIdentifier($touch->identifier);
		$this->updateStoredTouch($storedTouch, $touch);
		$this->initTouchEvent($touchEvent, $this->getTouchesByTarget($touch->target), new cocktail_core_event_TouchList(new _hx_array(array($touch))));
		$this->_touches->remove($storedTouch);
		$GLOBALS['%s']->pop();
	}
	public function registerTouch($touch, $touchEvent, $target) {
		$GLOBALS['%s']->push("cocktail.core.multitouch.MultiTouchManager::registerTouch");
		$»spos = $GLOBALS['%s']->length;
		$touch->target = $target;
		$this->updatePagePosition($touch);
		$this->_touches->push($touch);
		$this->initTouchEvent($touchEvent, $this->getTouchesByTarget($target), new cocktail_core_event_TouchList(new _hx_array(array($touch))));
		$GLOBALS['%s']->pop();
	}
	public function setUpTouchEvent($touchEvent, $target) {
		$GLOBALS['%s']->push("cocktail.core.multitouch.MultiTouchManager::setUpTouchEvent");
		$»spos = $GLOBALS['%s']->length;
		$touch = $touchEvent->touches->item(0);
		switch($touchEvent->type) {
		case "touchstart":{
			$this->registerTouch($touch, $touchEvent, $target);
		}break;
		case "touchend":{
			$this->unregisterTouch($touch, $touchEvent);
		}break;
		case "touchmove":{
			$this->updateTouch($touch, $touchEvent);
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	public $_touches;
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
	function __toString() { return 'cocktail.core.multitouch.MultiTouchManager'; }
}

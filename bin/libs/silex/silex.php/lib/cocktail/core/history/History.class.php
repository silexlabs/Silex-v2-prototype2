<?php

class cocktail_core_history_History {
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.history.History::new");
		$»spos = $GLOBALS['%s']->length;
		$this->stateDataArray = new _hx_array(array());
		$this->currentIdx = 0;
		$this->stateDataArray->push(_hx_anonymous(array("state" => null, "title" => "", "url" => null)));
		$GLOBALS['%s']->pop();
	}}
	public function resolveUrl($url, $base = null) {
		$GLOBALS['%s']->push("cocktail.core.history.History::resolveUrl");
		$»spos = $GLOBALS['%s']->length;
		if($base === null) {
			$tags = cocktail_Lib::get_document()->getElementsByTagName("base");
			{
				$_g1 = 0; $_g = $tags->length;
				while($_g1 < $_g) {
					$idx = $_g1++;
					if(_hx_array_get($tags, $idx)->hasAttribute("href")) {
						$base = _hx_array_get($tags, $idx)->getAttribute("href");
						break;
					}
					unset($idx);
				}
			}
			if($base === null) {
				$base = "";
			}
		}
		$url = str_replace("\\", "/", $url);
		$idxBase = _hx_index_of($url, "http", null);
		if($idxBase !== 0) {
			$url = $base . $url;
		}
		$urlArray = _hx_explode("/", $url);
		$absoluteUrlArray = new _hx_array(array());
		{
			$_g1 = 0; $_g = $urlArray->length;
			while($_g1 < $_g) {
				$idx = $_g1++;
				if($urlArray[$idx] === "..") {
					$absoluteUrlArray->pop();
				} else {
					$absoluteUrlArray->push($urlArray[$idx]);
				}
				unset($idx);
			}
		}
		$url = $absoluteUrlArray->join("/");
		{
			$GLOBALS['%s']->pop();
			return $url;
		}
		$GLOBALS['%s']->pop();
	}
	public function computeStateData($data, $title, $url = null) {
		$GLOBALS['%s']->push("cocktail.core.history.History::computeStateData");
		$»spos = $GLOBALS['%s']->length;
		$clonedData = null;
		try {
			$clonedData = $this->cloneData($data);
		}catch(Exception $»e) {
			$_ex_ = ($»e instanceof HException) ? $»e->e : $»e;
			$e = $_ex_;
			{
				$GLOBALS['%e'] = new _hx_array(array());
				while($GLOBALS['%s']->length >= $»spos) {
					$GLOBALS['%e']->unshift($GLOBALS['%s']->pop());
				}
				$GLOBALS['%s']->push($GLOBALS['%e'][0]);
				throw new HException("SecurityError - Error duplicating the data passed to History::replaceState or History::pushState. The error is: " . Std::string($e));
			}
		}
		if($url !== null) {
			$url = $this->resolveUrl($url, null);
		} else {
			$url = _hx_array_get($this->stateDataArray, $this->currentIdx)->url;
		}
		{
			$»tmp = _hx_anonymous(array("state" => $clonedData, "title" => $title, "url" => $url));
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function cloneData($data) {
		$GLOBALS['%s']->push("cocktail.core.history.History::cloneData");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = haxe_Unserializer::run(haxe_Serializer::run($data));
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function onPopState($stateData) {
		$GLOBALS['%s']->push("cocktail.core.history.History::onPopState");
		$»spos = $GLOBALS['%s']->length;
		$clonedState = $this->cloneData($stateData->state);
		$event = new cocktail_core_event_PopStateEvent();
		$event->initPopStateEvent("popstate", true, false, null, 0.0, $clonedState);
		cocktail_Lib::get_window()->dispatchEvent($event);
		if(cocktail_Lib::get_window()->onpopstate !== null) {
			cocktail_Lib::get_window()->onpopstate($event);
		}
		$GLOBALS['%s']->pop();
	}
	public function replaceState($data, $title, $url = null) {
		$GLOBALS['%s']->push("cocktail.core.history.History::replaceState");
		$»spos = $GLOBALS['%s']->length;
		$newStateData = $this->computeStateData($data, $title, $url);
		$this->stateDataArray[$this->currentIdx] = $newStateData;
		$this->state = $this->cloneData($newStateData->state);
		$GLOBALS['%s']->pop();
	}
	public function pushState($data, $title, $url = null) {
		$GLOBALS['%s']->push("cocktail.core.history.History::pushState");
		$»spos = $GLOBALS['%s']->length;
		while($this->stateDataArray->length > $this->currentIdx + 1) {
			$this->stateDataArray->pop();
		}
		$newStateData = $this->computeStateData($data, $title, $url);
		$this->stateDataArray->push($newStateData);
		$this->currentIdx++;
		$this->state = $this->cloneData($newStateData->state);
		$GLOBALS['%s']->pop();
	}
	public function forward() {
		$GLOBALS['%s']->push("cocktail.core.history.History::forward");
		$»spos = $GLOBALS['%s']->length;
		$this->go(1);
		$GLOBALS['%s']->pop();
	}
	public function back() {
		$GLOBALS['%s']->push("cocktail.core.history.History::back");
		$»spos = $GLOBALS['%s']->length;
		$this->go(-1);
		$GLOBALS['%s']->pop();
	}
	public function go($delta) {
		$GLOBALS['%s']->push("cocktail.core.history.History::go");
		$»spos = $GLOBALS['%s']->length;
		$newIndex = $this->currentIdx + $delta;
		if($newIndex < 0 || $newIndex >= $this->stateDataArray->length) {
			$GLOBALS['%s']->pop();
			return;
		}
		$this->currentIdx = $newIndex;
		$this->state = $this->cloneData(_hx_array_get($this->stateDataArray, $this->currentIdx)->state);
		$this->onPopState(_hx_anonymous(array("state" => $this->state, "title" => _hx_array_get($this->stateDataArray, $this->currentIdx)->title, "url" => _hx_array_get($this->stateDataArray, $this->currentIdx)->url)));
		$GLOBALS['%s']->pop();
	}
	public function getLength() {
		$GLOBALS['%s']->push("cocktail.core.history.History::getLength");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return 0;
		}
		$GLOBALS['%s']->pop();
	}
	public $currentIdx;
	public $stateDataArray;
	public $state;
	public $length;
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
	static $__properties__ = array("get_length" => "getLength");
	function __toString() { return 'cocktail.core.history.History'; }
}

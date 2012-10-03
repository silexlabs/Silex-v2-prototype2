<?php

class cocktail_core_resource_ResourceLoader {
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.resource.ResourceLoader::new");
		$»spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}}
	public function onLoadError($msg) {
		$GLOBALS['%s']->push("cocktail.core.resource.ResourceLoader::onLoadError");
		$»spos = $GLOBALS['%s']->length;
		$this->_urlToLoadIdx++;
		if($this->_urlToLoadIdx < $this->_urls->length - 1) {
			$this->doLoad($this->_urls[$this->_urlToLoadIdx]);
		} else {
			$this->_onLoadErrorCallback($msg);
		}
		$GLOBALS['%s']->pop();
	}
	public function onLoadComplete($data) {
		$GLOBALS['%s']->push("cocktail.core.resource.ResourceLoader::onLoadComplete");
		$»spos = $GLOBALS['%s']->length;
		$this->_onLoadCompleteCallback($data);
		$GLOBALS['%s']->pop();
	}
	public function doLoad($url) {
		$GLOBALS['%s']->push("cocktail.core.resource.ResourceLoader::doLoad");
		$»spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public function load($urls, $onLoadComplete, $onLoadError) {
		$GLOBALS['%s']->push("cocktail.core.resource.ResourceLoader::load");
		$»spos = $GLOBALS['%s']->length;
		$this->_onLoadCompleteCallback = $onLoadComplete;
		$this->_onLoadErrorCallback = $onLoadError;
		$this->_urls = $urls;
		$this->_urlToLoadIdx = 0;
		$this->doLoad($this->_urls[$this->_urlToLoadIdx]);
		$GLOBALS['%s']->pop();
	}
	public $_urls;
	public $_urlToLoadIdx;
	public $_onLoadErrorCallback;
	public $_onLoadCompleteCallback;
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
	function __toString() { return 'cocktail.core.resource.ResourceLoader'; }
}

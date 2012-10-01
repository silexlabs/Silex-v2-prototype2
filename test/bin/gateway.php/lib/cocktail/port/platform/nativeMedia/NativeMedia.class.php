<?php

class cocktail_port_platform_nativeMedia_NativeMedia {
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.port.platform.nativeMedia.NativeMedia::new");
		$»spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}}
	public function set_viewport($value) {
		$GLOBALS['%s']->push("cocktail.port.platform.nativeMedia.NativeMedia::set_viewport");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->viewport = $value;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_viewport() {
		$GLOBALS['%s']->push("cocktail.port.platform.nativeMedia.NativeMedia::get_viewport");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->viewport;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_volume($value) {
		$GLOBALS['%s']->push("cocktail.port.platform.nativeMedia.NativeMedia::set_volume");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_src($value) {
		$GLOBALS['%s']->push("cocktail.port.platform.nativeMedia.NativeMedia::set_src");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_duration() {
		$GLOBALS['%s']->push("cocktail.port.platform.nativeMedia.NativeMedia::get_duration");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return 0;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_nativeElement() {
		$GLOBALS['%s']->push("cocktail.port.platform.nativeMedia.NativeMedia::get_nativeElement");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return null;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_width() {
		$GLOBALS['%s']->push("cocktail.port.platform.nativeMedia.NativeMedia::get_width");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return null;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_height() {
		$GLOBALS['%s']->push("cocktail.port.platform.nativeMedia.NativeMedia::get_height");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return null;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_currentTime() {
		$GLOBALS['%s']->push("cocktail.port.platform.nativeMedia.NativeMedia::get_currentTime");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return 0;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_bytesLoaded() {
		$GLOBALS['%s']->push("cocktail.port.platform.nativeMedia.NativeMedia::get_bytesLoaded");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return 0;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_bytesTotal() {
		$GLOBALS['%s']->push("cocktail.port.platform.nativeMedia.NativeMedia::get_bytesTotal");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return 0;
		}
		$GLOBALS['%s']->pop();
	}
	public function onNativeLoadedMetaData() {
		$GLOBALS['%s']->push("cocktail.port.platform.nativeMedia.NativeMedia::onNativeLoadedMetaData");
		$»spos = $GLOBALS['%s']->length;
		if($this->onLoadedMetaData !== null) {
			$loaddedMetadataEvent = new cocktail_core_event_Event();
			$loaddedMetadataEvent->initEvent("loadedmetadata", false, false);
			$this->onLoadedMetaData($loaddedMetadataEvent);
		}
		$GLOBALS['%s']->pop();
	}
	public function attach($graphicsContext) {
		$GLOBALS['%s']->push("cocktail.port.platform.nativeMedia.NativeMedia::attach");
		$»spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public function canPlayType($type) {
		$GLOBALS['%s']->push("cocktail.port.platform.nativeMedia.NativeMedia::canPlayType");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return null;
		}
		$GLOBALS['%s']->pop();
	}
	public function seek($time) {
		$GLOBALS['%s']->push("cocktail.port.platform.nativeMedia.NativeMedia::seek");
		$»spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public function pause() {
		$GLOBALS['%s']->push("cocktail.port.platform.nativeMedia.NativeMedia::pause");
		$»spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public function play() {
		$GLOBALS['%s']->push("cocktail.port.platform.nativeMedia.NativeMedia::play");
		$»spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public $viewport;
	public $onLoadedMetaData;
	public $bytesTotal;
	public $bytesLoaded;
	public $nativeElement;
	public $currentTime;
	public $height;
	public $width;
	public $src;
	public $volume;
	public $duration;
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
	static $__properties__ = array("get_duration" => "get_duration","set_volume" => "set_volume","set_src" => "set_src","get_width" => "get_width","get_height" => "get_height","get_currentTime" => "get_currentTime","get_nativeElement" => "get_nativeElement","get_bytesLoaded" => "get_bytesLoaded","get_bytesTotal" => "get_bytesTotal","set_viewport" => "set_viewport","get_viewport" => "get_viewport");
	function __toString() { return 'cocktail.port.platform.nativeMedia.NativeMedia'; }
}

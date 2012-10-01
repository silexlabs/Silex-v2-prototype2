<?php

class cocktail_core_css_StyleSheet {
	public function __construct($stylesheet, $ownerNode = null, $href = null, $parentStyleSheet = null) {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.css.StyleSheet::new");
		$»spos = $GLOBALS['%s']->length;
		$this->ownerNode = $ownerNode;
		$this->href = $href;
		$this->parentStyleSheet = $parentStyleSheet;
		$GLOBALS['%s']->pop();
	}}
	public $disabled;
	public $media;
	public $title;
	public $parentStyleSheet;
	public $ownerNode;
	public $href;
	public $type;
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
	function __toString() { return 'cocktail.core.css.StyleSheet'; }
}

<?php

class cocktail_core_css_UsedValuesVO {
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.css.UsedValuesVO::new");
		$»spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}}
	public $backgroundColor;
	public $transform;
	public $transformOrigin;
	public $letterSpacing;
	public $lineHeight;
	public $color;
	public $textIndent;
	public $bottom;
	public $top;
	public $right;
	public $left;
	public $paddingBottom;
	public $paddingTop;
	public $paddingRight;
	public $paddingLeft;
	public $marginBottom;
	public $marginTop;
	public $marginRight;
	public $marginLeft;
	public $height;
	public $maxWidth;
	public $minWidth;
	public $maxHeight;
	public $minHeight;
	public $width;
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
	function __toString() { return 'cocktail.core.css.UsedValuesVO'; }
}

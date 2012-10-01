<?php

class cocktail_core_font_FontMetricsVO {
	public function __construct($fontSize, $ascent, $descent, $xHeight, $subscriptOffset, $superscriptOffset, $underlineOffset, $spaceWidth) {
		if(!php_Boot::$skip_constructor) {
		$this->fontSize = $fontSize;
		$this->ascent = $ascent;
		$this->descent = $descent;
		$this->xHeight = $xHeight;
		$this->subscriptOffset = $subscriptOffset;
		$this->superscriptOffset = $superscriptOffset;
		$this->underlineOffset = $underlineOffset;
		$this->spaceWidth = $spaceWidth;
	}}
	public $spaceWidth;
	public $underlineOffset;
	public $superscriptOffset;
	public $subscriptOffset;
	public $xHeight;
	public $descent;
	public $ascent;
	public $fontSize;
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
	function __toString() { return 'cocktail.core.font.FontMetricsVO'; }
}

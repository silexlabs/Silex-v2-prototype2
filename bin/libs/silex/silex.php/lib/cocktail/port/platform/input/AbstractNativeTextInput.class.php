<?php

class cocktail_port_platform_input_AbstractNativeTextInput {
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.port.platform.input.AbstractNativeTextInput::new");
		$»spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}}
	public function get_letterSpacing() {
		$GLOBALS['%s']->push("cocktail.port.platform.input.AbstractNativeTextInput::get_letterSpacing");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->letterSpacing;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_letterSpacing($value) {
		$GLOBALS['%s']->push("cocktail.port.platform.input.AbstractNativeTextInput::set_letterSpacing");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->letterSpacing = $value;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_value($textValue) {
		$GLOBALS['%s']->push("cocktail.port.platform.input.AbstractNativeTextInput::set_value");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->value = $textValue;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_value() {
		$GLOBALS['%s']->push("cocktail.port.platform.input.AbstractNativeTextInput::get_value");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->value;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_fontSize() {
		$GLOBALS['%s']->push("cocktail.port.platform.input.AbstractNativeTextInput::get_fontSize");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->fontSize;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_fontSize($value) {
		$GLOBALS['%s']->push("cocktail.port.platform.input.AbstractNativeTextInput::set_fontSize");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->fontSize = $value;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_fontFamily() {
		$GLOBALS['%s']->push("cocktail.port.platform.input.AbstractNativeTextInput::get_fontFamily");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->fontFamily;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_fontFamily($value) {
		$GLOBALS['%s']->push("cocktail.port.platform.input.AbstractNativeTextInput::set_fontFamily");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->fontFamily = $value;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_color() {
		$GLOBALS['%s']->push("cocktail.port.platform.input.AbstractNativeTextInput::get_color");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->color;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_color($value) {
		$GLOBALS['%s']->push("cocktail.port.platform.input.AbstractNativeTextInput::set_color");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->color = $value;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_bold($value) {
		$GLOBALS['%s']->push("cocktail.port.platform.input.AbstractNativeTextInput::set_bold");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->set_italic($value);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_bold() {
		$GLOBALS['%s']->push("cocktail.port.platform.input.AbstractNativeTextInput::get_bold");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->get_italic();
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_italic() {
		$GLOBALS['%s']->push("cocktail.port.platform.input.AbstractNativeTextInput::get_italic");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->italic;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_italic($value) {
		$GLOBALS['%s']->push("cocktail.port.platform.input.AbstractNativeTextInput::set_italic");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->italic = $value;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_viewport($value) {
		$GLOBALS['%s']->push("cocktail.port.platform.input.AbstractNativeTextInput::set_viewport");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->viewport = $value;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_viewport() {
		$GLOBALS['%s']->push("cocktail.port.platform.input.AbstractNativeTextInput::get_viewport");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->viewport;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function focus() {
		$GLOBALS['%s']->push("cocktail.port.platform.input.AbstractNativeTextInput::focus");
		$»spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public function detach($graphicContext) {
		$GLOBALS['%s']->push("cocktail.port.platform.input.AbstractNativeTextInput::detach");
		$»spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public function attach($graphicContext) {
		$GLOBALS['%s']->push("cocktail.port.platform.input.AbstractNativeTextInput::attach");
		$»spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public $fontSize;
	public $letterSpacing;
	public $fontFamily;
	public $color;
	public $bold;
	public $italic;
	public $viewport;
	public $value;
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
	static $__properties__ = array("set_value" => "set_value","get_value" => "get_value","set_viewport" => "set_viewport","get_viewport" => "get_viewport","set_italic" => "set_italic","get_italic" => "get_italic","set_bold" => "set_italic","get_bold" => "get_italic","set_color" => "set_color","get_color" => "get_color","set_fontFamily" => "set_fontFamily","get_fontFamily" => "get_fontFamily","set_letterSpacing" => "set_letterSpacing","get_letterSpacing" => "get_letterSpacing","set_fontSize" => "set_fontSize","get_fontSize" => "get_fontSize");
	function __toString() { return 'cocktail.port.platform.input.AbstractNativeTextInput'; }
}

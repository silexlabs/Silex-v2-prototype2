<?php

class haxe_io_StringInput extends haxe_io_BytesInput {
	public function __construct($s) { if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("haxe.io.StringInput::new");
		$»spos = $GLOBALS['%s']->length;
		parent::__construct(haxe_io_Bytes::ofString($s),null,null);
		$GLOBALS['%s']->pop();
	}}
	static $__properties__ = array("set_bigEndian" => "setEndian");
	function __toString() { return 'haxe.io.StringInput'; }
}

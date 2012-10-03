<?php

class haxe_Md5 {
	public function __construct(){}
	static function encode($s) {
		$GLOBALS['%s']->push("haxe.Md5::encode");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = md5($s);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'haxe.Md5'; }
}

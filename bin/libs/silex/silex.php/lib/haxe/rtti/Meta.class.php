<?php

class haxe_rtti_Meta {
	public function __construct(){}
	static function getType($t) {
		$GLOBALS['%s']->push("haxe.rtti.Meta::getType");
		$�spos = $GLOBALS['%s']->length;
		$meta = $t->__meta__;
		{
			$�tmp = haxe_rtti_Meta_0($meta, $t);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function getStatics($t) {
		$GLOBALS['%s']->push("haxe.rtti.Meta::getStatics");
		$�spos = $GLOBALS['%s']->length;
		$meta = $t->__meta__;
		{
			$�tmp = haxe_rtti_Meta_1($meta, $t);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function getFields($t) {
		$GLOBALS['%s']->push("haxe.rtti.Meta::getFields");
		$�spos = $GLOBALS['%s']->length;
		$meta = $t->__meta__;
		{
			$�tmp = haxe_rtti_Meta_2($meta, $t);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'haxe.rtti.Meta'; }
}
function haxe_rtti_Meta_0(&$meta, &$t) {
	$�spos = $GLOBALS['%s']->length;
	if($meta === null || _hx_field($meta, "obj") === null) {
		return _hx_anonymous(array());
	} else {
		return $meta->obj;
	}
}
function haxe_rtti_Meta_1(&$meta, &$t) {
	$�spos = $GLOBALS['%s']->length;
	if($meta === null || _hx_field($meta, "statics") === null) {
		return _hx_anonymous(array());
	} else {
		return $meta->statics;
	}
}
function haxe_rtti_Meta_2(&$meta, &$t) {
	$�spos = $GLOBALS['%s']->length;
	if($meta === null || _hx_field($meta, "fields") === null) {
		return _hx_anonymous(array());
	} else {
		return $meta->fields;
	}
}

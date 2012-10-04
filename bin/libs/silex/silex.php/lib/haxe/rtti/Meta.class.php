<?php

class haxe_rtti_Meta {
	public function __construct(){}
	static function getType($t) {
		$GLOBALS['%s']->push("haxe.rtti.Meta::getType");
		$製pos = $GLOBALS['%s']->length;
		$meta = $t->__meta__;
		{
			$裨mp = haxe_rtti_Meta_0($meta, $t);
			$GLOBALS['%s']->pop();
			return $裨mp;
		}
		$GLOBALS['%s']->pop();
	}
	static function getStatics($t) {
		$GLOBALS['%s']->push("haxe.rtti.Meta::getStatics");
		$製pos = $GLOBALS['%s']->length;
		$meta = $t->__meta__;
		{
			$裨mp = haxe_rtti_Meta_1($meta, $t);
			$GLOBALS['%s']->pop();
			return $裨mp;
		}
		$GLOBALS['%s']->pop();
	}
	static function getFields($t) {
		$GLOBALS['%s']->push("haxe.rtti.Meta::getFields");
		$製pos = $GLOBALS['%s']->length;
		$meta = $t->__meta__;
		{
			$裨mp = haxe_rtti_Meta_2($meta, $t);
			$GLOBALS['%s']->pop();
			return $裨mp;
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'haxe.rtti.Meta'; }
}
function haxe_rtti_Meta_0(&$meta, &$t) {
	$製pos = $GLOBALS['%s']->length;
	if($meta === null || _hx_field($meta, "obj") === null) {
		return _hx_anonymous(array());
	} else {
		return $meta->obj;
	}
}
function haxe_rtti_Meta_1(&$meta, &$t) {
	$製pos = $GLOBALS['%s']->length;
	if($meta === null || _hx_field($meta, "statics") === null) {
		return _hx_anonymous(array());
	} else {
		return $meta->statics;
	}
}
function haxe_rtti_Meta_2(&$meta, &$t) {
	$製pos = $GLOBALS['%s']->length;
	if($meta === null || _hx_field($meta, "fields") === null) {
		return _hx_anonymous(array());
	} else {
		return $meta->fields;
	}
}

<?php

class cocktail_core_css_StructuralPseudoClassSelectorValue extends Enum {
	public static $EMPTY;
	public static $FIRST_CHILD;
	public static $FIRST_OF_TYPE;
	public static $LAST_CHILD;
	public static $LAST_OF_TYPE;
	public static function NTH_CHILD($value) { return new cocktail_core_css_StructuralPseudoClassSelectorValue("NTH_CHILD", 8, array($value)); }
	public static function NTH_LAST_CHILD($value) { return new cocktail_core_css_StructuralPseudoClassSelectorValue("NTH_LAST_CHILD", 9, array($value)); }
	public static function NTH_LAST_OF_TYPE($value) { return new cocktail_core_css_StructuralPseudoClassSelectorValue("NTH_LAST_OF_TYPE", 11, array($value)); }
	public static function NTH_OF_TYPE($value) { return new cocktail_core_css_StructuralPseudoClassSelectorValue("NTH_OF_TYPE", 10, array($value)); }
	public static $ONLY_CHILD;
	public static $ONLY_OF_TYPE;
	public static $ROOT;
	public static $__constructors = array(7 => 'EMPTY', 1 => 'FIRST_CHILD', 3 => 'FIRST_OF_TYPE', 2 => 'LAST_CHILD', 4 => 'LAST_OF_TYPE', 8 => 'NTH_CHILD', 9 => 'NTH_LAST_CHILD', 11 => 'NTH_LAST_OF_TYPE', 10 => 'NTH_OF_TYPE', 5 => 'ONLY_CHILD', 6 => 'ONLY_OF_TYPE', 0 => 'ROOT');
	}
cocktail_core_css_StructuralPseudoClassSelectorValue::$EMPTY = new cocktail_core_css_StructuralPseudoClassSelectorValue("EMPTY", 7);
cocktail_core_css_StructuralPseudoClassSelectorValue::$FIRST_CHILD = new cocktail_core_css_StructuralPseudoClassSelectorValue("FIRST_CHILD", 1);
cocktail_core_css_StructuralPseudoClassSelectorValue::$FIRST_OF_TYPE = new cocktail_core_css_StructuralPseudoClassSelectorValue("FIRST_OF_TYPE", 3);
cocktail_core_css_StructuralPseudoClassSelectorValue::$LAST_CHILD = new cocktail_core_css_StructuralPseudoClassSelectorValue("LAST_CHILD", 2);
cocktail_core_css_StructuralPseudoClassSelectorValue::$LAST_OF_TYPE = new cocktail_core_css_StructuralPseudoClassSelectorValue("LAST_OF_TYPE", 4);
cocktail_core_css_StructuralPseudoClassSelectorValue::$ONLY_CHILD = new cocktail_core_css_StructuralPseudoClassSelectorValue("ONLY_CHILD", 5);
cocktail_core_css_StructuralPseudoClassSelectorValue::$ONLY_OF_TYPE = new cocktail_core_css_StructuralPseudoClassSelectorValue("ONLY_OF_TYPE", 6);
cocktail_core_css_StructuralPseudoClassSelectorValue::$ROOT = new cocktail_core_css_StructuralPseudoClassSelectorValue("ROOT", 0);

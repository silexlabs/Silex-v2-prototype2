<?php

class cocktail_core_css_CombinatorValue extends Enum {
	public static $ADJACENT_SIBLING;
	public static $CHILD;
	public static $DESCENDANT;
	public static $GENERAL_SIBLING;
	public static $__constructors = array(2 => 'ADJACENT_SIBLING', 1 => 'CHILD', 0 => 'DESCENDANT', 3 => 'GENERAL_SIBLING');
	}
cocktail_core_css_CombinatorValue::$ADJACENT_SIBLING = new cocktail_core_css_CombinatorValue("ADJACENT_SIBLING", 2);
cocktail_core_css_CombinatorValue::$CHILD = new cocktail_core_css_CombinatorValue("CHILD", 1);
cocktail_core_css_CombinatorValue::$DESCENDANT = new cocktail_core_css_CombinatorValue("DESCENDANT", 0);
cocktail_core_css_CombinatorValue::$GENERAL_SIBLING = new cocktail_core_css_CombinatorValue("GENERAL_SIBLING", 3);

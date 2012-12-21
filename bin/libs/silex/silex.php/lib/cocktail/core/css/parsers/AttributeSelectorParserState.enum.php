<?php

class cocktail_core_css_parsers_AttributeSelectorParserState extends Enum {
	public static $ATTRIBUTE;
	public static $BEGIN_VALUE;
	public static $END_SELECTOR;
	public static $INVALID_SELECTOR;
	public static $OPERATOR;
	public static $VALUE;
	public static $__constructors = array(0 => 'ATTRIBUTE', 2 => 'BEGIN_VALUE', 4 => 'END_SELECTOR', 5 => 'INVALID_SELECTOR', 1 => 'OPERATOR', 3 => 'VALUE');
	}
cocktail_core_css_parsers_AttributeSelectorParserState::$ATTRIBUTE = new cocktail_core_css_parsers_AttributeSelectorParserState("ATTRIBUTE", 0);
cocktail_core_css_parsers_AttributeSelectorParserState::$BEGIN_VALUE = new cocktail_core_css_parsers_AttributeSelectorParserState("BEGIN_VALUE", 2);
cocktail_core_css_parsers_AttributeSelectorParserState::$END_SELECTOR = new cocktail_core_css_parsers_AttributeSelectorParserState("END_SELECTOR", 4);
cocktail_core_css_parsers_AttributeSelectorParserState::$INVALID_SELECTOR = new cocktail_core_css_parsers_AttributeSelectorParserState("INVALID_SELECTOR", 5);
cocktail_core_css_parsers_AttributeSelectorParserState::$OPERATOR = new cocktail_core_css_parsers_AttributeSelectorParserState("OPERATOR", 1);
cocktail_core_css_parsers_AttributeSelectorParserState::$VALUE = new cocktail_core_css_parsers_AttributeSelectorParserState("VALUE", 3);

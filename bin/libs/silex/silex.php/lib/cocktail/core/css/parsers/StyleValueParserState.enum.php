<?php

class cocktail_core_css_parsers_StyleValueParserState extends Enum {
	public static $BEGIN_VALUE;
	public static $END;
	public static $HEX;
	public static $IDENT_FUNCTION;
	public static $IGNORE_SPACES;
	public static $IMPORTANT;
	public static $INVALID_STYLE_VALUE;
	public static $NUMBER_INTEGER_DIMENSION_PERCENTAGE;
	public static $SPACE_OR_END;
	public static $STRING;
	public static $__constructors = array(1 => 'BEGIN_VALUE', 7 => 'END', 8 => 'HEX', 2 => 'IDENT_FUNCTION', 0 => 'IGNORE_SPACES', 6 => 'IMPORTANT', 5 => 'INVALID_STYLE_VALUE', 3 => 'NUMBER_INTEGER_DIMENSION_PERCENTAGE', 4 => 'SPACE_OR_END', 9 => 'STRING');
	}
cocktail_core_css_parsers_StyleValueParserState::$BEGIN_VALUE = new cocktail_core_css_parsers_StyleValueParserState("BEGIN_VALUE", 1);
cocktail_core_css_parsers_StyleValueParserState::$END = new cocktail_core_css_parsers_StyleValueParserState("END", 7);
cocktail_core_css_parsers_StyleValueParserState::$HEX = new cocktail_core_css_parsers_StyleValueParserState("HEX", 8);
cocktail_core_css_parsers_StyleValueParserState::$IDENT_FUNCTION = new cocktail_core_css_parsers_StyleValueParserState("IDENT_FUNCTION", 2);
cocktail_core_css_parsers_StyleValueParserState::$IGNORE_SPACES = new cocktail_core_css_parsers_StyleValueParserState("IGNORE_SPACES", 0);
cocktail_core_css_parsers_StyleValueParserState::$IMPORTANT = new cocktail_core_css_parsers_StyleValueParserState("IMPORTANT", 6);
cocktail_core_css_parsers_StyleValueParserState::$INVALID_STYLE_VALUE = new cocktail_core_css_parsers_StyleValueParserState("INVALID_STYLE_VALUE", 5);
cocktail_core_css_parsers_StyleValueParserState::$NUMBER_INTEGER_DIMENSION_PERCENTAGE = new cocktail_core_css_parsers_StyleValueParserState("NUMBER_INTEGER_DIMENSION_PERCENTAGE", 3);
cocktail_core_css_parsers_StyleValueParserState::$SPACE_OR_END = new cocktail_core_css_parsers_StyleValueParserState("SPACE_OR_END", 4);
cocktail_core_css_parsers_StyleValueParserState::$STRING = new cocktail_core_css_parsers_StyleValueParserState("STRING", 9);

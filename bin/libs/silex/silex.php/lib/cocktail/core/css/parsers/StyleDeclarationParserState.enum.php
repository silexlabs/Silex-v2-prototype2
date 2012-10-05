<?php

class cocktail_core_css_parsers_StyleDeclarationParserState extends Enum {
	public static $BEGIN;
	public static $BEGIN_COMMENT;
	public static $COMMENT;
	public static $END_COMMENT;
	public static $IGNORE_SPACES;
	public static $INVALID_STYLE;
	public static $STYLE_NAME;
	public static $STYLE_SEPARATOR;
	public static $STYLE_VALUE;
	public static $__constructors = array(5 => 'BEGIN', 7 => 'BEGIN_COMMENT', 6 => 'COMMENT', 8 => 'END_COMMENT', 2 => 'IGNORE_SPACES', 3 => 'INVALID_STYLE', 0 => 'STYLE_NAME', 4 => 'STYLE_SEPARATOR', 1 => 'STYLE_VALUE');
	}
cocktail_core_css_parsers_StyleDeclarationParserState::$BEGIN = new cocktail_core_css_parsers_StyleDeclarationParserState("BEGIN", 5);
cocktail_core_css_parsers_StyleDeclarationParserState::$BEGIN_COMMENT = new cocktail_core_css_parsers_StyleDeclarationParserState("BEGIN_COMMENT", 7);
cocktail_core_css_parsers_StyleDeclarationParserState::$COMMENT = new cocktail_core_css_parsers_StyleDeclarationParserState("COMMENT", 6);
cocktail_core_css_parsers_StyleDeclarationParserState::$END_COMMENT = new cocktail_core_css_parsers_StyleDeclarationParserState("END_COMMENT", 8);
cocktail_core_css_parsers_StyleDeclarationParserState::$IGNORE_SPACES = new cocktail_core_css_parsers_StyleDeclarationParserState("IGNORE_SPACES", 2);
cocktail_core_css_parsers_StyleDeclarationParserState::$INVALID_STYLE = new cocktail_core_css_parsers_StyleDeclarationParserState("INVALID_STYLE", 3);
cocktail_core_css_parsers_StyleDeclarationParserState::$STYLE_NAME = new cocktail_core_css_parsers_StyleDeclarationParserState("STYLE_NAME", 0);
cocktail_core_css_parsers_StyleDeclarationParserState::$STYLE_SEPARATOR = new cocktail_core_css_parsers_StyleDeclarationParserState("STYLE_SEPARATOR", 4);
cocktail_core_css_parsers_StyleDeclarationParserState::$STYLE_VALUE = new cocktail_core_css_parsers_StyleDeclarationParserState("STYLE_VALUE", 1);

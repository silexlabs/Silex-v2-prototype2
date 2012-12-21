<?php

class cocktail_core_css_parsers_StyleSheetRulesParserState extends Enum {
	public static $BEGIN;
	public static $BEGIN_COMMENT;
	public static $BEGIN_RULE;
	public static $COMMENT;
	public static $END_COMMENT;
	public static $END_RULE;
	public static $IGNORE_SPACES;
	public static $RULE;
	public static $__constructors = array(1 => 'BEGIN', 6 => 'BEGIN_COMMENT', 2 => 'BEGIN_RULE', 5 => 'COMMENT', 7 => 'END_COMMENT', 4 => 'END_RULE', 0 => 'IGNORE_SPACES', 3 => 'RULE');
	}
cocktail_core_css_parsers_StyleSheetRulesParserState::$BEGIN = new cocktail_core_css_parsers_StyleSheetRulesParserState("BEGIN", 1);
cocktail_core_css_parsers_StyleSheetRulesParserState::$BEGIN_COMMENT = new cocktail_core_css_parsers_StyleSheetRulesParserState("BEGIN_COMMENT", 6);
cocktail_core_css_parsers_StyleSheetRulesParserState::$BEGIN_RULE = new cocktail_core_css_parsers_StyleSheetRulesParserState("BEGIN_RULE", 2);
cocktail_core_css_parsers_StyleSheetRulesParserState::$COMMENT = new cocktail_core_css_parsers_StyleSheetRulesParserState("COMMENT", 5);
cocktail_core_css_parsers_StyleSheetRulesParserState::$END_COMMENT = new cocktail_core_css_parsers_StyleSheetRulesParserState("END_COMMENT", 7);
cocktail_core_css_parsers_StyleSheetRulesParserState::$END_RULE = new cocktail_core_css_parsers_StyleSheetRulesParserState("END_RULE", 4);
cocktail_core_css_parsers_StyleSheetRulesParserState::$IGNORE_SPACES = new cocktail_core_css_parsers_StyleSheetRulesParserState("IGNORE_SPACES", 0);
cocktail_core_css_parsers_StyleSheetRulesParserState::$RULE = new cocktail_core_css_parsers_StyleSheetRulesParserState("RULE", 3);

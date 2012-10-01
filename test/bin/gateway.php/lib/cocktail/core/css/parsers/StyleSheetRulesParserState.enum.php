<?php

class cocktail_core_css_parsers_StyleSheetRulesParserState extends Enum {
	public static $BEGIN_RULE;
	public static $END_RULE;
	public static $IGNORE_SPACES;
	public static $RULE;
	public static $__constructors = array(1 => 'BEGIN_RULE', 3 => 'END_RULE', 0 => 'IGNORE_SPACES', 2 => 'RULE');
	}
cocktail_core_css_parsers_StyleSheetRulesParserState::$BEGIN_RULE = new cocktail_core_css_parsers_StyleSheetRulesParserState("BEGIN_RULE", 1);
cocktail_core_css_parsers_StyleSheetRulesParserState::$END_RULE = new cocktail_core_css_parsers_StyleSheetRulesParserState("END_RULE", 3);
cocktail_core_css_parsers_StyleSheetRulesParserState::$IGNORE_SPACES = new cocktail_core_css_parsers_StyleSheetRulesParserState("IGNORE_SPACES", 0);
cocktail_core_css_parsers_StyleSheetRulesParserState::$RULE = new cocktail_core_css_parsers_StyleSheetRulesParserState("RULE", 2);

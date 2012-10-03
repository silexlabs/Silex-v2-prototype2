<?php

class cocktail_core_css_parsers_StyleSheetRuleParserState extends Enum {
	public static $BEGIN_AT_RULE;
	public static $BEGIN_RULE;
	public static $END_MEDIA_RULE;
	public static $END_STYLE_RULE;
	public static $IGNORE_SPACES;
	public static $RULE;
	public static $__constructors = array(2 => 'BEGIN_AT_RULE', 1 => 'BEGIN_RULE', 3 => 'END_MEDIA_RULE', 5 => 'END_STYLE_RULE', 0 => 'IGNORE_SPACES', 4 => 'RULE');
	}
cocktail_core_css_parsers_StyleSheetRuleParserState::$BEGIN_AT_RULE = new cocktail_core_css_parsers_StyleSheetRuleParserState("BEGIN_AT_RULE", 2);
cocktail_core_css_parsers_StyleSheetRuleParserState::$BEGIN_RULE = new cocktail_core_css_parsers_StyleSheetRuleParserState("BEGIN_RULE", 1);
cocktail_core_css_parsers_StyleSheetRuleParserState::$END_MEDIA_RULE = new cocktail_core_css_parsers_StyleSheetRuleParserState("END_MEDIA_RULE", 3);
cocktail_core_css_parsers_StyleSheetRuleParserState::$END_STYLE_RULE = new cocktail_core_css_parsers_StyleSheetRuleParserState("END_STYLE_RULE", 5);
cocktail_core_css_parsers_StyleSheetRuleParserState::$IGNORE_SPACES = new cocktail_core_css_parsers_StyleSheetRuleParserState("IGNORE_SPACES", 0);
cocktail_core_css_parsers_StyleSheetRuleParserState::$RULE = new cocktail_core_css_parsers_StyleSheetRuleParserState("RULE", 4);

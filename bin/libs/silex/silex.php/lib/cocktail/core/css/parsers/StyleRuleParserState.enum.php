<?php

class cocktail_core_css_parsers_StyleRuleParserState extends Enum {
	public static $BEGIN_SELECTOR;
	public static $BEGIN_STYLES;
	public static $END_SELECTOR;
	public static $END_STYLES;
	public static $IGNORE_SPACES;
	public static $SELECTOR;
	public static $STYLES;
	public static $__constructors = array(1 => 'BEGIN_SELECTOR', 4 => 'BEGIN_STYLES', 2 => 'END_SELECTOR', 6 => 'END_STYLES', 0 => 'IGNORE_SPACES', 3 => 'SELECTOR', 5 => 'STYLES');
	}
cocktail_core_css_parsers_StyleRuleParserState::$BEGIN_SELECTOR = new cocktail_core_css_parsers_StyleRuleParserState("BEGIN_SELECTOR", 1);
cocktail_core_css_parsers_StyleRuleParserState::$BEGIN_STYLES = new cocktail_core_css_parsers_StyleRuleParserState("BEGIN_STYLES", 4);
cocktail_core_css_parsers_StyleRuleParserState::$END_SELECTOR = new cocktail_core_css_parsers_StyleRuleParserState("END_SELECTOR", 2);
cocktail_core_css_parsers_StyleRuleParserState::$END_STYLES = new cocktail_core_css_parsers_StyleRuleParserState("END_STYLES", 6);
cocktail_core_css_parsers_StyleRuleParserState::$IGNORE_SPACES = new cocktail_core_css_parsers_StyleRuleParserState("IGNORE_SPACES", 0);
cocktail_core_css_parsers_StyleRuleParserState::$SELECTOR = new cocktail_core_css_parsers_StyleRuleParserState("SELECTOR", 3);
cocktail_core_css_parsers_StyleRuleParserState::$STYLES = new cocktail_core_css_parsers_StyleRuleParserState("STYLES", 5);

<?php

class cocktail_core_css_parsers_SelectorParserState extends Enum {
	public static $BEGIN_ATTRIBUTE_SELECTOR;
	public static $BEGIN_COMBINATOR;
	public static $BEGIN_PSEUDO_SELECTOR;
	public static $BEGIN_SIMPLE_SELECTOR;
	public static $COMBINATOR;
	public static $END_CLASS_SELECTOR;
	public static $END_ID_SELECTOR;
	public static $END_SIMPLE_SELECTOR;
	public static $END_TYPE_SELECTOR;
	public static $END_UNIVERSAL_SELECTOR;
	public static $IGNORE_SPACES;
	public static $INVALID_SELECTOR;
	public static $PSEUDO_ELEMENT_SELECTOR;
	public static $SIMPLE_SELECTOR;
	public static $__constructors = array(12 => 'BEGIN_ATTRIBUTE_SELECTOR', 7 => 'BEGIN_COMBINATOR', 9 => 'BEGIN_PSEUDO_SELECTOR', 1 => 'BEGIN_SIMPLE_SELECTOR', 8 => 'COMBINATOR', 5 => 'END_CLASS_SELECTOR', 6 => 'END_ID_SELECTOR', 2 => 'END_SIMPLE_SELECTOR', 4 => 'END_TYPE_SELECTOR', 10 => 'END_UNIVERSAL_SELECTOR', 0 => 'IGNORE_SPACES', 13 => 'INVALID_SELECTOR', 11 => 'PSEUDO_ELEMENT_SELECTOR', 3 => 'SIMPLE_SELECTOR');
	}
cocktail_core_css_parsers_SelectorParserState::$BEGIN_ATTRIBUTE_SELECTOR = new cocktail_core_css_parsers_SelectorParserState("BEGIN_ATTRIBUTE_SELECTOR", 12);
cocktail_core_css_parsers_SelectorParserState::$BEGIN_COMBINATOR = new cocktail_core_css_parsers_SelectorParserState("BEGIN_COMBINATOR", 7);
cocktail_core_css_parsers_SelectorParserState::$BEGIN_PSEUDO_SELECTOR = new cocktail_core_css_parsers_SelectorParserState("BEGIN_PSEUDO_SELECTOR", 9);
cocktail_core_css_parsers_SelectorParserState::$BEGIN_SIMPLE_SELECTOR = new cocktail_core_css_parsers_SelectorParserState("BEGIN_SIMPLE_SELECTOR", 1);
cocktail_core_css_parsers_SelectorParserState::$COMBINATOR = new cocktail_core_css_parsers_SelectorParserState("COMBINATOR", 8);
cocktail_core_css_parsers_SelectorParserState::$END_CLASS_SELECTOR = new cocktail_core_css_parsers_SelectorParserState("END_CLASS_SELECTOR", 5);
cocktail_core_css_parsers_SelectorParserState::$END_ID_SELECTOR = new cocktail_core_css_parsers_SelectorParserState("END_ID_SELECTOR", 6);
cocktail_core_css_parsers_SelectorParserState::$END_SIMPLE_SELECTOR = new cocktail_core_css_parsers_SelectorParserState("END_SIMPLE_SELECTOR", 2);
cocktail_core_css_parsers_SelectorParserState::$END_TYPE_SELECTOR = new cocktail_core_css_parsers_SelectorParserState("END_TYPE_SELECTOR", 4);
cocktail_core_css_parsers_SelectorParserState::$END_UNIVERSAL_SELECTOR = new cocktail_core_css_parsers_SelectorParserState("END_UNIVERSAL_SELECTOR", 10);
cocktail_core_css_parsers_SelectorParserState::$IGNORE_SPACES = new cocktail_core_css_parsers_SelectorParserState("IGNORE_SPACES", 0);
cocktail_core_css_parsers_SelectorParserState::$INVALID_SELECTOR = new cocktail_core_css_parsers_SelectorParserState("INVALID_SELECTOR", 13);
cocktail_core_css_parsers_SelectorParserState::$PSEUDO_ELEMENT_SELECTOR = new cocktail_core_css_parsers_SelectorParserState("PSEUDO_ELEMENT_SELECTOR", 11);
cocktail_core_css_parsers_SelectorParserState::$SIMPLE_SELECTOR = new cocktail_core_css_parsers_SelectorParserState("SIMPLE_SELECTOR", 3);

<?php

class cocktail_core_css_parsers_CSSRulesParser {
	public function __construct() { if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.css.parsers.CSSRulesParser::new");
		$�spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}}
	public function parseRule($rule, $parentSyleSheet) {
		$GLOBALS['%s']->push("cocktail.core.css.parsers.CSSRulesParser::parseRule");
		$�spos = $GLOBALS['%s']->length;
		$state = cocktail_core_css_parsers_StyleSheetRuleParserState::$IGNORE_SPACES;
		$next = cocktail_core_css_parsers_StyleSheetRuleParserState::$BEGIN_RULE;
		$start = 0;
		$position = 0;
		$c = ord(substr($rule,$position,1));
		$cssRule = null;
		while(!($c === 0)) {
			$�t = ($state);
			switch($�t->index) {
			case 0:
			{
				switch($c) {
				case 10:case 13:case 9:case 32:{
				}break;
				default:{
					$state = $next;
					continue 3;
				}break;
				}
			}break;
			case 1:
			{
				switch($c) {
				case 64:{
					$state = cocktail_core_css_parsers_StyleSheetRuleParserState::$BEGIN_AT_RULE;
					$start = $position;
				}break;
				default:{
					$state = cocktail_core_css_parsers_StyleSheetRuleParserState::$RULE;
					$next = cocktail_core_css_parsers_StyleSheetRuleParserState::$END_STYLE_RULE;
					$start = $position;
					continue 3;
				}break;
				}
			}break;
			case 2:
			{
				if(!($c >= 97 && $c <= 122 || $c >= 65 && $c <= 90 || $c >= 48 && $c <= 57 || $c === 58 || $c === 46 || $c === 95 || $c === 45)) {
					$atRule = _hx_substr($rule, $start, $position - $start);
					switch($atRule) {
					case "@media":{
						$state = cocktail_core_css_parsers_StyleSheetRuleParserState::$RULE;
						$next = cocktail_core_css_parsers_StyleSheetRuleParserState::$END_MEDIA_RULE;
						continue 3;
					}break;
					default:{
						$state = cocktail_core_css_parsers_StyleSheetRuleParserState::$IGNORE_SPACES;
						$next = cocktail_core_css_parsers_StyleSheetRuleParserState::$BEGIN_RULE;
					}break;
					}
				}
			}break;
			case 4:
			{
				switch($c) {
				case 125:{
					$state = $next;
					continue 3;
				}break;
				}
			}break;
			case 3:
			{
				$rule1 = _hx_substr($rule, $start, $position - $start + 1);
				$cssMediaRule = new cocktail_core_css_CSSMediaRule($parentSyleSheet, null);
				$cssMediaRule->set_cssText($rule1);
				{
					$GLOBALS['%s']->pop();
					return $cssMediaRule;
				}
			}break;
			case 5:
			{
				$rule1 = _hx_substr($rule, $start, $position - $start + 1);
				$cssStyleRule = new cocktail_core_css_CSSStyleRule($parentSyleSheet, null);
				$cssStyleRule->set_cssText($rule1);
				{
					$GLOBALS['%s']->pop();
					return $cssStyleRule;
				}
			}break;
			}
			$c = ord(substr($rule,++$position,1));
		}
		{
			$GLOBALS['%s']->pop();
			return $cssRule;
		}
		$GLOBALS['%s']->pop();
	}
	public function parseRules($css) {
		$GLOBALS['%s']->push("cocktail.core.css.parsers.CSSRulesParser::parseRules");
		$�spos = $GLOBALS['%s']->length;
		$state = cocktail_core_css_parsers_StyleSheetRulesParserState::$IGNORE_SPACES;
		$next = cocktail_core_css_parsers_StyleSheetRulesParserState::$BEGIN_RULE;
		$start = 0;
		$position = 0;
		$c = ord(substr($css,$position,1));
		$ruleStarted = false;
		$rules = new _hx_array(array());
		while(!($c === 0)) {
			$�t = ($state);
			switch($�t->index) {
			case 0:
			{
				switch($c) {
				case 10:case 13:case 9:case 32:{
				}break;
				default:{
					$state = $next;
					continue 3;
				}break;
				}
			}break;
			case 1:
			{
				$start = $position;
				$state = cocktail_core_css_parsers_StyleSheetRulesParserState::$RULE;
				$ruleStarted = true;
				continue 2;
			}break;
			case 2:
			{
				switch($c) {
				case 125:{
					$state = cocktail_core_css_parsers_StyleSheetRulesParserState::$END_RULE;
				}break;
				}
			}break;
			case 3:
			{
				$rule = _hx_substr($css, $start, $position - $start);
				$rules->push($rule);
				$state = cocktail_core_css_parsers_StyleSheetRulesParserState::$IGNORE_SPACES;
				$next = cocktail_core_css_parsers_StyleSheetRulesParserState::$BEGIN_RULE;
				$ruleStarted = false;
				continue 2;
			}break;
			}
			$c = ord(substr($css,++$position,1));
		}
		if($ruleStarted === true) {
			$rule = _hx_substr($css, $start, $position - $start);
			$rules->push($rule);
		}
		{
			$GLOBALS['%s']->pop();
			return $rules;
		}
		$GLOBALS['%s']->pop();
	}
	static function isValidChar($c) {
		$GLOBALS['%s']->push("cocktail.core.css.parsers.CSSRulesParser::isValidChar");
		$�spos = $GLOBALS['%s']->length;
		{
			$�tmp = $c >= 97 && $c <= 122 || $c >= 65 && $c <= 90 || $c >= 48 && $c <= 57 || $c === 58 || $c === 46 || $c === 95 || $c === 45;
			$GLOBALS['%s']->pop();
			return $�tmp;
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'cocktail.core.css.parsers.CSSRulesParser'; }
}

<?php

class cocktail_core_css_parsers_CSSSelectorParser {
	public function __construct() { if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.css.parsers.CSSSelectorParser::new");
		$製pos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}}
	public function parseAttributeSelector($selector, $position, $simpleSelectorSequenceItemValues) {
		$GLOBALS['%s']->push("cocktail.core.css.parsers.CSSSelectorParser::parseAttributeSelector");
		$製pos = $GLOBALS['%s']->length;
		$c = ord(substr($selector,$position,1));
		$start = $position;
		$attribute = null;
		$operator = null;
		$value = null;
		$state = cocktail_core_css_parsers_AttributeSelectorParserState::$ATTRIBUTE;
		while(true) {
			$裨 = ($state);
			switch($裨->index) {
			case 0:
			{
				if(!($c >= 97 && $c <= 122 || $c >= 65 && $c <= 90 || $c >= 48 && $c <= 57)) {
					$attribute = _hx_substr($selector, $start, $position - $start);
					$state = cocktail_core_css_parsers_AttributeSelectorParserState::$OPERATOR;
					$start = $position;
					continue 2;
				}
			}break;
			case 1:
			{
				if(!($c === 61 || $c === 126 || $c === 94 || $c === 36 || $c === 42 || $c === 124)) {
					switch($c) {
					case 34:case 39:{
						$operator = _hx_substr($selector, $start, $position - $start);
						$start = $position;
						$state = cocktail_core_css_parsers_AttributeSelectorParserState::$BEGIN_VALUE;
					}break;
					case 93:{
						$state = cocktail_core_css_parsers_AttributeSelectorParserState::$END_SELECTOR;
					}break;
					default:{
						$state = cocktail_core_css_parsers_AttributeSelectorParserState::$INVALID_SELECTOR;
					}break;
					}
				}
			}break;
			case 2:
			{
				$start = $position;
				$state = cocktail_core_css_parsers_AttributeSelectorParserState::$VALUE;
			}break;
			case 3:
			{
				if(!($c >= 97 && $c <= 122 || $c >= 65 && $c <= 90 || $c >= 48 && $c <= 57)) {
					switch($c) {
					case 34:case 39:{
						$value = _hx_substr($selector, $start, $position - $start);
						$state = cocktail_core_css_parsers_AttributeSelectorParserState::$END_SELECTOR;
					}break;
					case 93:{
						$state = cocktail_core_css_parsers_AttributeSelectorParserState::$INVALID_SELECTOR;
					}break;
					default:{
						$state = cocktail_core_css_parsers_AttributeSelectorParserState::$INVALID_SELECTOR;
					}break;
					}
				}
			}break;
			case 5:
			{
				break 2;
			}break;
			case 4:
			{
				break 2;
			}break;
			}
			$c = ord(substr($selector,++$position,1));
		}
		if($attribute !== null) {
			if($operator !== null) {
				switch($operator) {
				case "=":{
					$simpleSelectorSequenceItemValues->push(cocktail_core_css_SimpleSelectorSequenceItemValue::ATTRIBUTE(cocktail_core_css_AttributeSelectorValue::ATTRIBUTE_VALUE($attribute, $value)));
				}break;
				case "^=":{
					$simpleSelectorSequenceItemValues->push(cocktail_core_css_SimpleSelectorSequenceItemValue::ATTRIBUTE(cocktail_core_css_AttributeSelectorValue::ATTRIBUTE_VALUE_BEGINS($attribute, $value)));
				}break;
				case "~=":{
					$simpleSelectorSequenceItemValues->push(cocktail_core_css_SimpleSelectorSequenceItemValue::ATTRIBUTE(cocktail_core_css_AttributeSelectorValue::ATTRIBUTE_LIST($attribute, $value)));
				}break;
				case "\$=":{
					$simpleSelectorSequenceItemValues->push(cocktail_core_css_SimpleSelectorSequenceItemValue::ATTRIBUTE(cocktail_core_css_AttributeSelectorValue::ATTRIBUTE_VALUE_ENDS($attribute, $value)));
				}break;
				case "*=":{
					$simpleSelectorSequenceItemValues->push(cocktail_core_css_SimpleSelectorSequenceItemValue::ATTRIBUTE(cocktail_core_css_AttributeSelectorValue::ATTRIBUTE_VALUE_CONTAINS($attribute, $value)));
				}break;
				case "|=":{
					$simpleSelectorSequenceItemValues->push(cocktail_core_css_SimpleSelectorSequenceItemValue::ATTRIBUTE(cocktail_core_css_AttributeSelectorValue::ATTRIBUTE_VALUE_BEGINS_HYPHEN_LIST($attribute, $value)));
				}break;
				}
			} else {
				$simpleSelectorSequenceItemValues->push(cocktail_core_css_SimpleSelectorSequenceItemValue::ATTRIBUTE(cocktail_core_css_AttributeSelectorValue::ATTRIBUTE($attribute)));
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $position;
		}
		$GLOBALS['%s']->pop();
	}
	public function parsePseudoElement($selector, $position, $selectorData) {
		$GLOBALS['%s']->push("cocktail.core.css.parsers.CSSSelectorParser::parsePseudoElement");
		$製pos = $GLOBALS['%s']->length;
		$c = ord(substr($selector,$position,1));
		$start = $position;
		while(true) {
			if(!($c >= 97 && $c <= 122 || $c >= 65 && $c <= 90 || $c >= 48 && $c <= 57 || $c === 45)) {
				break;
			}
			$c = ord(substr($selector,++$position,1));
		}
		$pseudoElement = _hx_substr($selector, $start, $position - $start);
		$typedPseudoElement = null;
		switch($pseudoElement) {
		case "first-line":{
			$typedPseudoElement = cocktail_core_css_PseudoElementSelectorValue::$FIRST_LINE;
		}break;
		case "first-letter":{
			$typedPseudoElement = cocktail_core_css_PseudoElementSelectorValue::$FIRST_LETTER;
		}break;
		case "before":{
			$typedPseudoElement = cocktail_core_css_PseudoElementSelectorValue::$BEFORE;
		}break;
		case "after":{
			$typedPseudoElement = cocktail_core_css_PseudoElementSelectorValue::$AFTER;
		}break;
		}
		$selectorData->pseudoElement = $typedPseudoElement;
		{
			$裨mp = --$position;
			$GLOBALS['%s']->pop();
			return $裨mp;
		}
		$GLOBALS['%s']->pop();
	}
	public function parsePseudoClass($selector, $position, $simpleSelectorSequenceItemValues) {
		$GLOBALS['%s']->push("cocktail.core.css.parsers.CSSSelectorParser::parsePseudoClass");
		$製pos = $GLOBALS['%s']->length;
		$c = ord(substr($selector,$position,1));
		$start = $position;
		while(true) {
			if(!($c >= 97 && $c <= 122 || $c >= 65 && $c <= 90 || $c >= 48 && $c <= 57 || $c === 45)) {
				break;
			}
			$c = ord(substr($selector,++$position,1));
		}
		$pseudoClass = _hx_substr($selector, $start, $position - $start);
		$typedPseudoClass = null;
		switch($pseudoClass) {
		case "first-child":{
			$typedPseudoClass = cocktail_core_css_PseudoClassSelectorValue::STRUCTURAL(cocktail_core_css_StructuralPseudoClassSelectorValue::$FIRST_CHILD);
		}break;
		case "last-child":{
			$typedPseudoClass = cocktail_core_css_PseudoClassSelectorValue::STRUCTURAL(cocktail_core_css_StructuralPseudoClassSelectorValue::$LAST_CHILD);
		}break;
		case "empty":{
			$typedPseudoClass = cocktail_core_css_PseudoClassSelectorValue::STRUCTURAL(cocktail_core_css_StructuralPseudoClassSelectorValue::$hEMPTY);
		}break;
		case "root":{
			$typedPseudoClass = cocktail_core_css_PseudoClassSelectorValue::STRUCTURAL(cocktail_core_css_StructuralPseudoClassSelectorValue::$ROOT);
		}break;
		case "first-of-type":{
			$typedPseudoClass = cocktail_core_css_PseudoClassSelectorValue::STRUCTURAL(cocktail_core_css_StructuralPseudoClassSelectorValue::$FIRST_OF_TYPE);
		}break;
		case "last-of-type":{
			$typedPseudoClass = cocktail_core_css_PseudoClassSelectorValue::STRUCTURAL(cocktail_core_css_StructuralPseudoClassSelectorValue::$LAST_OF_TYPE);
		}break;
		case "only-of-type":{
			$typedPseudoClass = cocktail_core_css_PseudoClassSelectorValue::STRUCTURAL(cocktail_core_css_StructuralPseudoClassSelectorValue::$ONLY_OF_TYPE);
		}break;
		case "only-child":{
			$typedPseudoClass = cocktail_core_css_PseudoClassSelectorValue::STRUCTURAL(cocktail_core_css_StructuralPseudoClassSelectorValue::$ONLY_CHILD);
		}break;
		case "link":{
			$typedPseudoClass = cocktail_core_css_PseudoClassSelectorValue::LINK(cocktail_core_css_LinkPseudoClassValue::$LINK);
		}break;
		case "visited":{
			$typedPseudoClass = cocktail_core_css_PseudoClassSelectorValue::LINK(cocktail_core_css_LinkPseudoClassValue::$VISITED);
		}break;
		case "active":{
			$typedPseudoClass = cocktail_core_css_PseudoClassSelectorValue::USER_ACTION(cocktail_core_css_UserActionPseudoClassValue::$ACTIVE);
		}break;
		case "hover":{
			$typedPseudoClass = cocktail_core_css_PseudoClassSelectorValue::USER_ACTION(cocktail_core_css_UserActionPseudoClassValue::$HOVER);
		}break;
		case "focus":{
			$typedPseudoClass = cocktail_core_css_PseudoClassSelectorValue::USER_ACTION(cocktail_core_css_UserActionPseudoClassValue::$FOCUS);
		}break;
		case "target":{
			$typedPseudoClass = cocktail_core_css_PseudoClassSelectorValue::$TARGET;
		}break;
		case "nth-child":{
		}break;
		case "nth-last-child":{
		}break;
		case "nth-of-type":{
		}break;
		case "nth-last-of-type":{
		}break;
		case "not":{
		}break;
		case "lang":{
		}break;
		case "enabled":{
			$typedPseudoClass = cocktail_core_css_PseudoClassSelectorValue::UI_ELEMENT_STATES(cocktail_core_css_UIElementStatesValue::$ENABLED);
		}break;
		case "disabled":{
			$typedPseudoClass = cocktail_core_css_PseudoClassSelectorValue::UI_ELEMENT_STATES(cocktail_core_css_UIElementStatesValue::$DISABLED);
		}break;
		case "checked":{
			$typedPseudoClass = cocktail_core_css_PseudoClassSelectorValue::UI_ELEMENT_STATES(cocktail_core_css_UIElementStatesValue::$CHECKED);
		}break;
		}
		$simpleSelectorSequenceItemValues->push(cocktail_core_css_SimpleSelectorSequenceItemValue::PSEUDO_CLASS($typedPseudoClass));
		{
			$裨mp = --$position;
			$GLOBALS['%s']->pop();
			return $裨mp;
		}
		$GLOBALS['%s']->pop();
	}
	public function flushSelectors($simpleSelectorSequenceStartValue, $simpleSelectorSequenceItemValues, $components) {
		$GLOBALS['%s']->push("cocktail.core.css.parsers.CSSSelectorParser::flushSelectors");
		$製pos = $GLOBALS['%s']->length;
		if($simpleSelectorSequenceStartValue === null && $simpleSelectorSequenceItemValues->length === 0) {
			$GLOBALS['%s']->pop();
			return;
		}
		if($simpleSelectorSequenceStartValue === null) {
			$simpleSelectorSequenceStartValue = cocktail_core_css_SimpleSelectorSequenceStartValue::$UNIVERSAL;
		}
		$simpleSelectorSequence = new cocktail_core_css_SimpleSelectorSequenceVO($simpleSelectorSequenceStartValue, $simpleSelectorSequenceItemValues);
		$components->push(cocktail_core_css_SelectorComponentValue::SIMPLE_SELECTOR_SEQUENCE($simpleSelectorSequence));
		$GLOBALS['%s']->pop();
	}
	public function parseSelector($selector, $typedSelectors) {
		$GLOBALS['%s']->push("cocktail.core.css.parsers.CSSSelectorParser::parseSelector");
		$製pos = $GLOBALS['%s']->length;
		$state = cocktail_core_css_parsers_SelectorParserState::$IGNORE_SPACES;
		$next = cocktail_core_css_parsers_SelectorParserState::$BEGIN_SIMPLE_SELECTOR;
		$start = 0;
		$position = 0;
		$c = ord(substr($selector,$position,1));
		$simpleSelectorSequenceStartValue = null;
		$simpleSelectorSequenceItemValues = new _hx_array(array());
		$components = new _hx_array(array());
		$selectorData = new cocktail_core_css_SelectorVO($components, cocktail_core_css_PseudoElementSelectorValue::$NONE);
		while(!($c === 0)) {
			$裨 = ($state);
			switch($裨->index) {
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
				if($c >= 97 && $c <= 122 || $c >= 65 && $c <= 90 || $c >= 48 && $c <= 57) {
					$state = cocktail_core_css_parsers_SelectorParserState::$SIMPLE_SELECTOR;
					$next = cocktail_core_css_parsers_SelectorParserState::$END_TYPE_SELECTOR;
					$start = $position;
				} else {
					switch($c) {
					case 46:{
						$state = cocktail_core_css_parsers_SelectorParserState::$SIMPLE_SELECTOR;
						$next = cocktail_core_css_parsers_SelectorParserState::$END_CLASS_SELECTOR;
						$start = $position + 1;
					}break;
					case 35:{
						$state = cocktail_core_css_parsers_SelectorParserState::$SIMPLE_SELECTOR;
						$next = cocktail_core_css_parsers_SelectorParserState::$END_ID_SELECTOR;
						$start = $position + 1;
					}break;
					case 42:{
						$state = cocktail_core_css_parsers_SelectorParserState::$SIMPLE_SELECTOR;
						$next = cocktail_core_css_parsers_SelectorParserState::$END_UNIVERSAL_SELECTOR;
						$start = $position;
					}break;
					case 58:{
						$state = cocktail_core_css_parsers_SelectorParserState::$BEGIN_PSEUDO_SELECTOR;
						$start = $position;
					}break;
					case 91:{
						$state = cocktail_core_css_parsers_SelectorParserState::$BEGIN_ATTRIBUTE_SELECTOR;
						$start = $position;
					}break;
					default:{
						$state = cocktail_core_css_parsers_SelectorParserState::$INVALID_SELECTOR;
						continue 3;
					}break;
					}
				}
			}break;
			case 12:
			{
				$position = $this->parseAttributeSelector($selector, $position, $simpleSelectorSequenceItemValues);
				$state = cocktail_core_css_parsers_SelectorParserState::$END_SIMPLE_SELECTOR;
				$next = cocktail_core_css_parsers_SelectorParserState::$IGNORE_SPACES;
			}break;
			case 9:
			{
				if($c >= 97 && $c <= 122 || $c >= 65 && $c <= 90 || $c >= 48 && $c <= 57) {
					$position = $this->parsePseudoClass($selector, $position, $simpleSelectorSequenceItemValues);
					$state = cocktail_core_css_parsers_SelectorParserState::$END_SIMPLE_SELECTOR;
					$next = cocktail_core_css_parsers_SelectorParserState::$IGNORE_SPACES;
				} else {
					switch($c) {
					case 58:{
						$state = cocktail_core_css_parsers_SelectorParserState::$PSEUDO_ELEMENT_SELECTOR;
					}break;
					default:{
						$state = cocktail_core_css_parsers_SelectorParserState::$INVALID_SELECTOR;
						continue 3;
					}break;
					}
				}
			}break;
			case 11:
			{
				$position = $this->parsePseudoElement($selector, $position, $selectorData);
				$state = cocktail_core_css_parsers_SelectorParserState::$IGNORE_SPACES;
				$next = cocktail_core_css_parsers_SelectorParserState::$INVALID_SELECTOR;
			}break;
			case 2:
			{
				switch($c) {
				case 32:case 62:{
					$state = cocktail_core_css_parsers_SelectorParserState::$BEGIN_COMBINATOR;
					continue 3;
				}break;
				case 58:case 35:case 46:case 91:{
					$state = cocktail_core_css_parsers_SelectorParserState::$BEGIN_SIMPLE_SELECTOR;
					continue 3;
				}break;
				default:{
					$state = cocktail_core_css_parsers_SelectorParserState::$INVALID_SELECTOR;
					continue 3;
				}break;
				}
			}break;
			case 3:
			{
				if(!($c >= 97 && $c <= 122 || $c >= 65 && $c <= 90 || $c >= 48 && $c <= 57 || $c === 45)) {
					switch($c) {
					case 32:case 62:case 58:case 35:case 46:case 91:{
						$state = $next;
						continue 3;
					}break;
					default:{
						$state = cocktail_core_css_parsers_SelectorParserState::$INVALID_SELECTOR;
						continue 3;
					}break;
					}
				}
			}break;
			case 4:
			{
				$type = _hx_substr($selector, $start, $position - $start);
				$simpleSelectorSequenceStartValue = cocktail_core_css_SimpleSelectorSequenceStartValue::TYPE($type);
				$state = cocktail_core_css_parsers_SelectorParserState::$END_SIMPLE_SELECTOR;
				continue 2;
			}break;
			case 5:
			{
				$className = _hx_substr($selector, $start, $position - $start);
				$simpleSelectorSequenceItemValues->push(cocktail_core_css_SimpleSelectorSequenceItemValue::CLASS($className));
				$state = cocktail_core_css_parsers_SelectorParserState::$END_SIMPLE_SELECTOR;
				continue 2;
			}break;
			case 6:
			{
				$id = _hx_substr($selector, $start, $position - $start);
				$simpleSelectorSequenceItemValues->push(cocktail_core_css_SimpleSelectorSequenceItemValue::ID($id));
				$state = cocktail_core_css_parsers_SelectorParserState::$END_SIMPLE_SELECTOR;
				continue 2;
			}break;
			case 10:
			{
				$simpleSelectorSequenceStartValue = cocktail_core_css_SimpleSelectorSequenceStartValue::$UNIVERSAL;
				$state = cocktail_core_css_parsers_SelectorParserState::$END_SIMPLE_SELECTOR;
				continue 2;
			}break;
			case 7:
			{
				$this->flushSelectors($simpleSelectorSequenceStartValue, $simpleSelectorSequenceItemValues, $components);
				$simpleSelectorSequenceStartValue = null;
				$simpleSelectorSequenceItemValues = new _hx_array(array());
				$state = cocktail_core_css_parsers_SelectorParserState::$IGNORE_SPACES;
				$next = cocktail_core_css_parsers_SelectorParserState::$COMBINATOR;
				continue 2;
			}break;
			case 8:
			{
				if($c >= 97 && $c <= 122 || $c >= 65 && $c <= 90 || $c >= 48 && $c <= 57) {
					$state = cocktail_core_css_parsers_SelectorParserState::$BEGIN_SIMPLE_SELECTOR;
					$components->push(cocktail_core_css_SelectorComponentValue::COMBINATOR(cocktail_core_css_CombinatorValue::$DESCENDANT));
					continue 2;
				} else {
					switch($c) {
					case 62:{
						$state = cocktail_core_css_parsers_SelectorParserState::$IGNORE_SPACES;
						$next = cocktail_core_css_parsers_SelectorParserState::$BEGIN_SIMPLE_SELECTOR;
						$components->push(cocktail_core_css_SelectorComponentValue::COMBINATOR(cocktail_core_css_CombinatorValue::$CHILD));
					}break;
					case 43:{
						$state = cocktail_core_css_parsers_SelectorParserState::$IGNORE_SPACES;
						$next = cocktail_core_css_parsers_SelectorParserState::$BEGIN_SIMPLE_SELECTOR;
						$components->push(cocktail_core_css_SelectorComponentValue::COMBINATOR(cocktail_core_css_CombinatorValue::$ADJACENT_SIBLING));
					}break;
					case 126:{
						$state = cocktail_core_css_parsers_SelectorParserState::$IGNORE_SPACES;
						$next = cocktail_core_css_parsers_SelectorParserState::$BEGIN_SIMPLE_SELECTOR;
						$components->push(cocktail_core_css_SelectorComponentValue::COMBINATOR(cocktail_core_css_CombinatorValue::$GENERAL_SIBLING));
					}break;
					case 58:case 35:case 46:case 91:case 42:{
						$state = cocktail_core_css_parsers_SelectorParserState::$BEGIN_SIMPLE_SELECTOR;
						$components->push(cocktail_core_css_SelectorComponentValue::COMBINATOR(cocktail_core_css_CombinatorValue::$DESCENDANT));
						continue 3;
					}break;
					}
				}
			}break;
			case 13:
			{
				$GLOBALS['%s']->pop();
				return;
			}break;
			}
			$c = ord(substr($selector,++$position,1));
		}
		$裨 = ($next);
		switch($裨->index) {
		case 4:
		{
			$type = _hx_substr($selector, $start, $position - $start);
			$simpleSelectorSequenceStartValue = cocktail_core_css_SimpleSelectorSequenceStartValue::TYPE($type);
		}break;
		case 10:
		{
			$simpleSelectorSequenceStartValue = cocktail_core_css_SimpleSelectorSequenceStartValue::$UNIVERSAL;
		}break;
		case 5:
		{
			$className = _hx_substr($selector, $start, $position - $start);
			$simpleSelectorSequenceItemValues->push(cocktail_core_css_SimpleSelectorSequenceItemValue::CLASS($className));
			$state = cocktail_core_css_parsers_SelectorParserState::$END_SIMPLE_SELECTOR;
		}break;
		case 6:
		{
			$id = _hx_substr($selector, $start, $position - $start);
			$simpleSelectorSequenceItemValues->push(cocktail_core_css_SimpleSelectorSequenceItemValue::ID($id));
		}break;
		default:{
		}break;
		}
		$this->flushSelectors($simpleSelectorSequenceStartValue, $simpleSelectorSequenceItemValues, $components);
		$selectorData->components->reverse();
		$typedSelector = new cocktail_core_css_SelectorVO($selectorData->components, $selectorData->pseudoElement);
		$typedSelectors->push($typedSelector);
		$GLOBALS['%s']->pop();
	}
	static function isOperatorChar($c) {
		$GLOBALS['%s']->push("cocktail.core.css.parsers.CSSSelectorParser::isOperatorChar");
		$製pos = $GLOBALS['%s']->length;
		{
			$裨mp = $c === 61 || $c === 126 || $c === 94 || $c === 36 || $c === 42 || $c === 124;
			$GLOBALS['%s']->pop();
			return $裨mp;
		}
		$GLOBALS['%s']->pop();
	}
	static function isAsciiChar($c) {
		$GLOBALS['%s']->push("cocktail.core.css.parsers.CSSSelectorParser::isAsciiChar");
		$製pos = $GLOBALS['%s']->length;
		{
			$裨mp = $c >= 97 && $c <= 122 || $c >= 65 && $c <= 90 || $c >= 48 && $c <= 57;
			$GLOBALS['%s']->pop();
			return $裨mp;
		}
		$GLOBALS['%s']->pop();
	}
	static function isSelectorChar($c) {
		$GLOBALS['%s']->push("cocktail.core.css.parsers.CSSSelectorParser::isSelectorChar");
		$製pos = $GLOBALS['%s']->length;
		{
			$裨mp = $c >= 97 && $c <= 122 || $c >= 65 && $c <= 90 || $c >= 48 && $c <= 57 || $c === 45;
			$GLOBALS['%s']->pop();
			return $裨mp;
		}
		$GLOBALS['%s']->pop();
	}
	static function isPseudoClassChar($c) {
		$GLOBALS['%s']->push("cocktail.core.css.parsers.CSSSelectorParser::isPseudoClassChar");
		$製pos = $GLOBALS['%s']->length;
		{
			$裨mp = $c >= 97 && $c <= 122 || $c >= 65 && $c <= 90 || $c >= 48 && $c <= 57 || $c === 45;
			$GLOBALS['%s']->pop();
			return $裨mp;
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'cocktail.core.css.parsers.CSSSelectorParser'; }
}

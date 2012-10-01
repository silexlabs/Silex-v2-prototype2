<?php

class cocktail_core_css_parsers_SelectorSerializer {
	public function __construct() { if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.css.parsers.SelectorSerializer::new");
		$�spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}}
	static function serialize($selector) {
		$GLOBALS['%s']->push("cocktail.core.css.parsers.SelectorSerializer::serialize");
		$�spos = $GLOBALS['%s']->length;
		$serializedSelector = "";
		{
			$_g1 = 0; $_g = $selector->components->length;
			while($_g1 < $_g) {
				$i = $_g1++;
				$component = $selector->components[$i];
				$�t = ($component);
				switch($�t->index) {
				case 0:
				$value = $�t->params[0];
				{
					$serializedSelector .= cocktail_core_css_parsers_SelectorSerializer::serializeSimpleSelectorSequence($value);
				}break;
				case 1:
				$value = $�t->params[0];
				{
					$serializedSelector .= cocktail_core_css_parsers_SelectorSerializer::serializeCombinator($value);
				}break;
				}
				unset($i,$component);
			}
		}
		$serializedSelector .= cocktail_core_css_parsers_SelectorSerializer::serializePseudoElement($selector->pseudoElement);
		{
			$GLOBALS['%s']->pop();
			return $serializedSelector;
		}
		$GLOBALS['%s']->pop();
	}
	static function serializePseudoElement($pseudoElement) {
		$GLOBALS['%s']->push("cocktail.core.css.parsers.SelectorSerializer::serializePseudoElement");
		$�spos = $GLOBALS['%s']->length;
		$�t = ($pseudoElement);
		switch($�t->index) {
		case 0:
		{
			$GLOBALS['%s']->pop();
			return "";
		}break;
		case 2:
		{
			$GLOBALS['%s']->pop();
			return "::first-letter";
		}break;
		case 1:
		{
			$GLOBALS['%s']->pop();
			return "::first-line";
		}break;
		case 3:
		{
			$GLOBALS['%s']->pop();
			return "::before";
		}break;
		case 4:
		{
			$GLOBALS['%s']->pop();
			return "::after";
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	static function serializeSimpleSelectorSequence($simpleSelectorSequence) {
		$GLOBALS['%s']->push("cocktail.core.css.parsers.SelectorSerializer::serializeSimpleSelectorSequence");
		$�spos = $GLOBALS['%s']->length;
		$serializedSimpleSelectorSequence = "";
		$serializedSimpleSelectorSequence .= cocktail_core_css_parsers_SelectorSerializer::serializeStartValue($simpleSelectorSequence->startValue);
		{
			$_g1 = 0; $_g = $simpleSelectorSequence->simpleSelectors->length;
			while($_g1 < $_g) {
				$i = $_g1++;
				$simpleSelector = $simpleSelectorSequence->simpleSelectors[$i];
				$serializedSimpleSelectorSequence .= cocktail_core_css_parsers_SelectorSerializer::serializeSimpleSelector($simpleSelector);
				unset($simpleSelector,$i);
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $serializedSimpleSelectorSequence;
		}
		$GLOBALS['%s']->pop();
	}
	static function serializeCombinator($combinator) {
		$GLOBALS['%s']->push("cocktail.core.css.parsers.SelectorSerializer::serializeCombinator");
		$�spos = $GLOBALS['%s']->length;
		$�t = ($combinator);
		switch($�t->index) {
		case 0:
		{
			$GLOBALS['%s']->pop();
			return " ";
		}break;
		case 1:
		{
			$GLOBALS['%s']->pop();
			return " > ";
		}break;
		case 2:
		{
			$GLOBALS['%s']->pop();
			return " + ";
		}break;
		case 3:
		{
			$GLOBALS['%s']->pop();
			return " ~ ";
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	static function serializeStartValue($selectorStartValue) {
		$GLOBALS['%s']->push("cocktail.core.css.parsers.SelectorSerializer::serializeStartValue");
		$�spos = $GLOBALS['%s']->length;
		$�t = ($selectorStartValue);
		switch($�t->index) {
		case 0:
		{
			$GLOBALS['%s']->pop();
			return "*";
		}break;
		case 1:
		$value = $�t->params[0];
		{
			$GLOBALS['%s']->pop();
			return $value;
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	static function serializeSimpleSelector($simpleSelector) {
		$GLOBALS['%s']->push("cocktail.core.css.parsers.SelectorSerializer::serializeSimpleSelector");
		$�spos = $GLOBALS['%s']->length;
		$�t = ($simpleSelector);
		switch($�t->index) {
		case 3:
		$value = $�t->params[0];
		{
			$�tmp = "#" . $value;
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 2:
		$value = $�t->params[0];
		{
			$�tmp = "." . $value;
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 0:
		$value = $�t->params[0];
		{
			$�tmp = cocktail_core_css_parsers_SelectorSerializer::serializeAttributeSelector($value);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 1:
		$value = $�t->params[0];
		{
			$�tmp = cocktail_core_css_parsers_SelectorSerializer::serializePseudoClassSelector($value);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	static function serializeAttributeSelector($attributeSelector) {
		$GLOBALS['%s']->push("cocktail.core.css.parsers.SelectorSerializer::serializeAttributeSelector");
		$�spos = $GLOBALS['%s']->length;
		$�t = ($attributeSelector);
		switch($�t->index) {
		case 0:
		$value = $�t->params[0];
		{
			$�tmp = "[" . $value . "]";
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 1:
		$value = $�t->params[1]; $name = $�t->params[0];
		{
			$�tmp = "[" . $name . "=\"" . $value . "\"]";
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 2:
		$value = $�t->params[1]; $name = $�t->params[0];
		{
			$�tmp = "[" . $name . "~=\"" . $value . "\"]";
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 3:
		$value = $�t->params[1]; $name = $�t->params[0];
		{
			$�tmp = "[" . $name . "^=\"" . $value . "\"]";
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 4:
		$value = $�t->params[1]; $name = $�t->params[0];
		{
			$�tmp = "[" . $name . "\$=\"" . $value . "\"]";
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 5:
		$value = $�t->params[1]; $name = $�t->params[0];
		{
			$�tmp = "[" . $name . "*=\"" . $value . "\"]";
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 6:
		$value = $�t->params[1]; $name = $�t->params[0];
		{
			$�tmp = "[" . $name . "|=\"" . $value . "\"]";
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	static function serializePseudoClassSelector($pseudoClassSelector) {
		$GLOBALS['%s']->push("cocktail.core.css.parsers.SelectorSerializer::serializePseudoClassSelector");
		$�spos = $GLOBALS['%s']->length;
		$�t = ($pseudoClassSelector);
		switch($�t->index) {
		case 0:
		$value = $�t->params[0];
		{
			$�tmp = cocktail_core_css_parsers_SelectorSerializer::serializeStructuralPseudoClassSelector($value);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 1:
		$value = $�t->params[0];
		{
			$�tmp = cocktail_core_css_parsers_SelectorSerializer::serializeLinkPseudoClassSelector($value);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 2:
		{
			$GLOBALS['%s']->pop();
			return ":target";
		}break;
		case 3:
		$value = $�t->params[0];
		{
			$�tmp = cocktail_core_css_parsers_SelectorSerializer::serializeLangPseudoClassSelector($value);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 4:
		$value = $�t->params[0];
		{
			$�tmp = cocktail_core_css_parsers_SelectorSerializer::serializeUserActionPseudoClassSelector($value);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 5:
		$value = $�t->params[0];
		{
			$�tmp = cocktail_core_css_parsers_SelectorSerializer::serializeUIElementStatePseudoClass($value);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case 6:
		$value = $�t->params[0];
		{
			$�tmp = ":not(" . cocktail_core_css_parsers_SelectorSerializer::serializeSimpleSelectorSequence($value) . ")";
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	static function serializeUIElementStatePseudoClass($uiElementStateSelector) {
		$GLOBALS['%s']->push("cocktail.core.css.parsers.SelectorSerializer::serializeUIElementStatePseudoClass");
		$�spos = $GLOBALS['%s']->length;
		$�t = ($uiElementStateSelector);
		switch($�t->index) {
		case 0:
		{
			$GLOBALS['%s']->pop();
			return ":enabled";
		}break;
		case 1:
		{
			$GLOBALS['%s']->pop();
			return ":disabled";
		}break;
		case 2:
		{
			$GLOBALS['%s']->pop();
			return ":checked";
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	static function serializeLangPseudoClassSelector($langs) {
		$GLOBALS['%s']->push("cocktail.core.css.parsers.SelectorSerializer::serializeLangPseudoClassSelector");
		$�spos = $GLOBALS['%s']->length;
		$serializedLangSelector = ":lang(";
		{
			$_g1 = 0; $_g = $langs->length;
			while($_g1 < $_g) {
				$i = $_g1++;
				$serializedLangSelector .= $langs[$i];
				if($i < $langs->length) {
					$serializedLangSelector .= "-";
				}
				unset($i);
			}
		}
		$serializedLangSelector .= ")";
		{
			$GLOBALS['%s']->pop();
			return $serializedLangSelector;
		}
		$GLOBALS['%s']->pop();
	}
	static function serializeLinkPseudoClassSelector($linkPseudoClassSelector) {
		$GLOBALS['%s']->push("cocktail.core.css.parsers.SelectorSerializer::serializeLinkPseudoClassSelector");
		$�spos = $GLOBALS['%s']->length;
		$�t = ($linkPseudoClassSelector);
		switch($�t->index) {
		case 1:
		{
			$GLOBALS['%s']->pop();
			return ":visited";
		}break;
		case 0:
		{
			$GLOBALS['%s']->pop();
			return ":link";
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	static function serializeUserActionPseudoClassSelector($userActionPseudoClassSelector) {
		$GLOBALS['%s']->push("cocktail.core.css.parsers.SelectorSerializer::serializeUserActionPseudoClassSelector");
		$�spos = $GLOBALS['%s']->length;
		$�t = ($userActionPseudoClassSelector);
		switch($�t->index) {
		case 0:
		{
			$GLOBALS['%s']->pop();
			return ":active";
		}break;
		case 1:
		{
			$GLOBALS['%s']->pop();
			return ":hover";
		}break;
		case 2:
		{
			$GLOBALS['%s']->pop();
			return ":focus";
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	static function serializeStructuralPseudoClassSelector($structuralpseudoClassSelector) {
		$GLOBALS['%s']->push("cocktail.core.css.parsers.SelectorSerializer::serializeStructuralPseudoClassSelector");
		$�spos = $GLOBALS['%s']->length;
		$�t = ($structuralpseudoClassSelector);
		switch($�t->index) {
		case 0:
		{
			$GLOBALS['%s']->pop();
			return ":root";
		}break;
		case 1:
		{
			$GLOBALS['%s']->pop();
			return ":first-child";
		}break;
		case 2:
		{
			$GLOBALS['%s']->pop();
			return ":last-child";
		}break;
		case 3:
		{
			$GLOBALS['%s']->pop();
			return ":first-of-type";
		}break;
		case 4:
		{
			$GLOBALS['%s']->pop();
			return ":last-of-type";
		}break;
		case 5:
		{
			$GLOBALS['%s']->pop();
			return ":only-child";
		}break;
		case 6:
		{
			$GLOBALS['%s']->pop();
			return ":only-of-type";
		}break;
		case 7:
		{
			$GLOBALS['%s']->pop();
			return ":empty";
		}break;
		default:{
			$GLOBALS['%s']->pop();
			return "";
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'cocktail.core.css.parsers.SelectorSerializer'; }
}

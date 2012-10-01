<?php

class cocktail_core_css_parsers_SelectorSerializer {
	public function __construct() { 
	}
	static function serialize($selector) {
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
		return $serializedSelector;
	}
	static function serializePseudoElement($pseudoElement) {
		$�t = ($pseudoElement);
		switch($�t->index) {
		case 0:
		{
			return "";
		}break;
		case 2:
		{
			return "::first-letter";
		}break;
		case 1:
		{
			return "::first-line";
		}break;
		case 3:
		{
			return "::before";
		}break;
		case 4:
		{
			return "::after";
		}break;
		}
	}
	static function serializeSimpleSelectorSequence($simpleSelectorSequence) {
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
		return $serializedSimpleSelectorSequence;
	}
	static function serializeCombinator($combinator) {
		$�t = ($combinator);
		switch($�t->index) {
		case 0:
		{
			return " ";
		}break;
		case 1:
		{
			return " > ";
		}break;
		case 2:
		{
			return " + ";
		}break;
		case 3:
		{
			return " ~ ";
		}break;
		}
	}
	static function serializeStartValue($selectorStartValue) {
		$�t = ($selectorStartValue);
		switch($�t->index) {
		case 0:
		{
			return "*";
		}break;
		case 1:
		$value = $�t->params[0];
		{
			return $value;
		}break;
		}
	}
	static function serializeSimpleSelector($simpleSelector) {
		$�t = ($simpleSelector);
		switch($�t->index) {
		case 3:
		$value = $�t->params[0];
		{
			return "#" . $value;
		}break;
		case 2:
		$value = $�t->params[0];
		{
			return "." . $value;
		}break;
		case 0:
		$value = $�t->params[0];
		{
			return cocktail_core_css_parsers_SelectorSerializer::serializeAttributeSelector($value);
		}break;
		case 1:
		$value = $�t->params[0];
		{
			return cocktail_core_css_parsers_SelectorSerializer::serializePseudoClassSelector($value);
		}break;
		}
	}
	static function serializeAttributeSelector($attributeSelector) {
		$�t = ($attributeSelector);
		switch($�t->index) {
		case 0:
		$value = $�t->params[0];
		{
			return "[" . $value . "]";
		}break;
		case 1:
		$value = $�t->params[1]; $name = $�t->params[0];
		{
			return "[" . $name . "=\"" . $value . "\"]";
		}break;
		case 2:
		$value = $�t->params[1]; $name = $�t->params[0];
		{
			return "[" . $name . "~=\"" . $value . "\"]";
		}break;
		case 3:
		$value = $�t->params[1]; $name = $�t->params[0];
		{
			return "[" . $name . "^=\"" . $value . "\"]";
		}break;
		case 4:
		$value = $�t->params[1]; $name = $�t->params[0];
		{
			return "[" . $name . "\$=\"" . $value . "\"]";
		}break;
		case 5:
		$value = $�t->params[1]; $name = $�t->params[0];
		{
			return "[" . $name . "*=\"" . $value . "\"]";
		}break;
		case 6:
		$value = $�t->params[1]; $name = $�t->params[0];
		{
			return "[" . $name . "|=\"" . $value . "\"]";
		}break;
		}
	}
	static function serializePseudoClassSelector($pseudoClassSelector) {
		$�t = ($pseudoClassSelector);
		switch($�t->index) {
		case 0:
		$value = $�t->params[0];
		{
			return cocktail_core_css_parsers_SelectorSerializer::serializeStructuralPseudoClassSelector($value);
		}break;
		case 1:
		$value = $�t->params[0];
		{
			return cocktail_core_css_parsers_SelectorSerializer::serializeLinkPseudoClassSelector($value);
		}break;
		case 2:
		{
			return ":target";
		}break;
		case 3:
		$value = $�t->params[0];
		{
			return cocktail_core_css_parsers_SelectorSerializer::serializeLangPseudoClassSelector($value);
		}break;
		case 4:
		$value = $�t->params[0];
		{
			return cocktail_core_css_parsers_SelectorSerializer::serializeUserActionPseudoClassSelector($value);
		}break;
		case 5:
		$value = $�t->params[0];
		{
			return cocktail_core_css_parsers_SelectorSerializer::serializeUIElementStatePseudoClass($value);
		}break;
		case 6:
		$value = $�t->params[0];
		{
			return ":not(" . cocktail_core_css_parsers_SelectorSerializer::serializeSimpleSelectorSequence($value) . ")";
		}break;
		}
	}
	static function serializeUIElementStatePseudoClass($uiElementStateSelector) {
		$�t = ($uiElementStateSelector);
		switch($�t->index) {
		case 0:
		{
			return ":enabled";
		}break;
		case 1:
		{
			return ":disabled";
		}break;
		case 2:
		{
			return ":checked";
		}break;
		}
	}
	static function serializeLangPseudoClassSelector($langs) {
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
		return $serializedLangSelector;
	}
	static function serializeLinkPseudoClassSelector($linkPseudoClassSelector) {
		$�t = ($linkPseudoClassSelector);
		switch($�t->index) {
		case 1:
		{
			return ":visited";
		}break;
		case 0:
		{
			return ":link";
		}break;
		}
	}
	static function serializeUserActionPseudoClassSelector($userActionPseudoClassSelector) {
		$�t = ($userActionPseudoClassSelector);
		switch($�t->index) {
		case 0:
		{
			return ":active";
		}break;
		case 1:
		{
			return ":hover";
		}break;
		case 2:
		{
			return ":focus";
		}break;
		}
	}
	static function serializeStructuralPseudoClassSelector($structuralpseudoClassSelector) {
		$�t = ($structuralpseudoClassSelector);
		switch($�t->index) {
		case 0:
		{
			return ":root";
		}break;
		case 1:
		{
			return ":first-child";
		}break;
		case 2:
		{
			return ":last-child";
		}break;
		case 3:
		{
			return ":first-of-type";
		}break;
		case 4:
		{
			return ":last-of-type";
		}break;
		case 5:
		{
			return ":only-child";
		}break;
		case 6:
		{
			return ":only-of-type";
		}break;
		case 7:
		{
			return ":empty";
		}break;
		default:{
			return "";
		}break;
		}
	}
	function __toString() { return 'cocktail.core.css.parsers.SelectorSerializer'; }
}

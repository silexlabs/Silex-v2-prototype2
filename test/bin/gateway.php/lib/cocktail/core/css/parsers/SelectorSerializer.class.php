<?php

class cocktail_core_css_parsers_SelectorSerializer {
	public function __construct() { if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.css.parsers.SelectorSerializer::new");
		$퍀pos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}}
	static function serialize($selector) {
		$GLOBALS['%s']->push("cocktail.core.css.parsers.SelectorSerializer::serialize");
		$퍀pos = $GLOBALS['%s']->length;
		$serializedSelector = "";
		{
			$_g1 = 0; $_g = $selector->components->length;
			while($_g1 < $_g) {
				$i = $_g1++;
				$component = $selector->components[$i];
				$퍁 = ($component);
				switch($퍁->index) {
				case 0:
				$value = $퍁->params[0];
				{
					$serializedSelector .= cocktail_core_css_parsers_SelectorSerializer::serializeSimpleSelectorSequence($value);
				}break;
				case 1:
				$value = $퍁->params[0];
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
		$퍀pos = $GLOBALS['%s']->length;
		$퍁 = ($pseudoElement);
		switch($퍁->index) {
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
		$퍀pos = $GLOBALS['%s']->length;
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
		$퍀pos = $GLOBALS['%s']->length;
		$퍁 = ($combinator);
		switch($퍁->index) {
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
		$퍀pos = $GLOBALS['%s']->length;
		$퍁 = ($selectorStartValue);
		switch($퍁->index) {
		case 0:
		{
			$GLOBALS['%s']->pop();
			return "*";
		}break;
		case 1:
		$value = $퍁->params[0];
		{
			$GLOBALS['%s']->pop();
			return $value;
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	static function serializeSimpleSelector($simpleSelector) {
		$GLOBALS['%s']->push("cocktail.core.css.parsers.SelectorSerializer::serializeSimpleSelector");
		$퍀pos = $GLOBALS['%s']->length;
		$퍁 = ($simpleSelector);
		switch($퍁->index) {
		case 3:
		$value = $퍁->params[0];
		{
			$퍁mp = "#" . $value;
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		case 2:
		$value = $퍁->params[0];
		{
			$퍁mp = "." . $value;
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		case 0:
		$value = $퍁->params[0];
		{
			$퍁mp = cocktail_core_css_parsers_SelectorSerializer::serializeAttributeSelector($value);
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		case 1:
		$value = $퍁->params[0];
		{
			$퍁mp = cocktail_core_css_parsers_SelectorSerializer::serializePseudoClassSelector($value);
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	static function serializeAttributeSelector($attributeSelector) {
		$GLOBALS['%s']->push("cocktail.core.css.parsers.SelectorSerializer::serializeAttributeSelector");
		$퍀pos = $GLOBALS['%s']->length;
		$퍁 = ($attributeSelector);
		switch($퍁->index) {
		case 0:
		$value = $퍁->params[0];
		{
			$퍁mp = "[" . $value . "]";
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		case 1:
		$value = $퍁->params[1]; $name = $퍁->params[0];
		{
			$퍁mp = "[" . $name . "=\"" . $value . "\"]";
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		case 2:
		$value = $퍁->params[1]; $name = $퍁->params[0];
		{
			$퍁mp = "[" . $name . "~=\"" . $value . "\"]";
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		case 3:
		$value = $퍁->params[1]; $name = $퍁->params[0];
		{
			$퍁mp = "[" . $name . "^=\"" . $value . "\"]";
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		case 4:
		$value = $퍁->params[1]; $name = $퍁->params[0];
		{
			$퍁mp = "[" . $name . "\$=\"" . $value . "\"]";
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		case 5:
		$value = $퍁->params[1]; $name = $퍁->params[0];
		{
			$퍁mp = "[" . $name . "*=\"" . $value . "\"]";
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		case 6:
		$value = $퍁->params[1]; $name = $퍁->params[0];
		{
			$퍁mp = "[" . $name . "|=\"" . $value . "\"]";
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	static function serializePseudoClassSelector($pseudoClassSelector) {
		$GLOBALS['%s']->push("cocktail.core.css.parsers.SelectorSerializer::serializePseudoClassSelector");
		$퍀pos = $GLOBALS['%s']->length;
		$퍁 = ($pseudoClassSelector);
		switch($퍁->index) {
		case 0:
		$value = $퍁->params[0];
		{
			$퍁mp = cocktail_core_css_parsers_SelectorSerializer::serializeStructuralPseudoClassSelector($value);
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		case 1:
		$value = $퍁->params[0];
		{
			$퍁mp = cocktail_core_css_parsers_SelectorSerializer::serializeLinkPseudoClassSelector($value);
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		case 2:
		{
			$GLOBALS['%s']->pop();
			return ":target";
		}break;
		case 3:
		$value = $퍁->params[0];
		{
			$퍁mp = cocktail_core_css_parsers_SelectorSerializer::serializeLangPseudoClassSelector($value);
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		case 4:
		$value = $퍁->params[0];
		{
			$퍁mp = cocktail_core_css_parsers_SelectorSerializer::serializeUserActionPseudoClassSelector($value);
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		case 5:
		$value = $퍁->params[0];
		{
			$퍁mp = cocktail_core_css_parsers_SelectorSerializer::serializeUIElementStatePseudoClass($value);
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		case 6:
		$value = $퍁->params[0];
		{
			$퍁mp = ":not(" . cocktail_core_css_parsers_SelectorSerializer::serializeSimpleSelectorSequence($value) . ")";
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	static function serializeUIElementStatePseudoClass($uiElementStateSelector) {
		$GLOBALS['%s']->push("cocktail.core.css.parsers.SelectorSerializer::serializeUIElementStatePseudoClass");
		$퍀pos = $GLOBALS['%s']->length;
		$퍁 = ($uiElementStateSelector);
		switch($퍁->index) {
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
		$퍀pos = $GLOBALS['%s']->length;
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
		$퍀pos = $GLOBALS['%s']->length;
		$퍁 = ($linkPseudoClassSelector);
		switch($퍁->index) {
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
		$퍀pos = $GLOBALS['%s']->length;
		$퍁 = ($userActionPseudoClassSelector);
		switch($퍁->index) {
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
		$퍀pos = $GLOBALS['%s']->length;
		$퍁 = ($structuralpseudoClassSelector);
		switch($퍁->index) {
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

<?php

class cocktail_core_css_SelectorManager {
	public function __construct() { if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.css.SelectorManager::new");
		$퍀pos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}}
	public function getSimpleSelectorSequenceItemSpecificity($simpleSelectorSequenceItem, $selectorSpecificity) {
		$GLOBALS['%s']->push("cocktail.core.css.SelectorManager::getSimpleSelectorSequenceItemSpecificity");
		$퍀pos = $GLOBALS['%s']->length;
		$퍁 = ($simpleSelectorSequenceItem);
		switch($퍁->index) {
		case 0:
		$value = $퍁->params[0];
		{
			$selectorSpecificity->classAttributesAndPseudoClassesNumber++;
		}break;
		case 1:
		$value = $퍁->params[0];
		{
			$selectorSpecificity->classAttributesAndPseudoClassesNumber++;
		}break;
		case 2:
		$value = $퍁->params[0];
		{
			$selectorSpecificity->classAttributesAndPseudoClassesNumber++;
		}break;
		case 3:
		$value = $퍁->params[0];
		{
			$selectorSpecificity->idSelectorsNumber++;
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	public function getSimpleSelectorSequenceStartSpecificity($simpleSelectorSequenceStart, $selectorSpecificity) {
		$GLOBALS['%s']->push("cocktail.core.css.SelectorManager::getSimpleSelectorSequenceStartSpecificity");
		$퍀pos = $GLOBALS['%s']->length;
		$퍁 = ($simpleSelectorSequenceStart);
		switch($퍁->index) {
		case 1:
		$value = $퍁->params[0];
		{
			$selectorSpecificity->typeAndPseudoElementsNumber++;
		}break;
		case 0:
		{
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	public function getSimpleSelectorSequenceSpecificity($simpleSelectorSequence, $selectorSpecificity) {
		$GLOBALS['%s']->push("cocktail.core.css.SelectorManager::getSimpleSelectorSequenceSpecificity");
		$퍀pos = $GLOBALS['%s']->length;
		$this->getSimpleSelectorSequenceStartSpecificity($simpleSelectorSequence->startValue, $selectorSpecificity);
		$simpleSelectors = $simpleSelectorSequence->simpleSelectors;
		$length = $simpleSelectors->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				$simpleSelectorSequenceItem = $simpleSelectors[$i];
				$this->getSimpleSelectorSequenceItemSpecificity($simpleSelectorSequenceItem, $selectorSpecificity);
				unset($simpleSelectorSequenceItem,$i);
			}
		}
		$GLOBALS['%s']->pop();
	}
	public function getSelectorSpecifity($selector) {
		$GLOBALS['%s']->push("cocktail.core.css.SelectorManager::getSelectorSpecifity");
		$퍀pos = $GLOBALS['%s']->length;
		$selectorSpecificity = new cocktail_core_css_SelectorSpecificityVO();
		$퍁 = ($selector->pseudoElement);
		switch($퍁->index) {
		case 2:
		case 1:
		case 4:
		case 3:
		{
			$selectorSpecificity->typeAndPseudoElementsNumber++;
		}break;
		case 0:
		{
		}break;
		}
		$components = $selector->components;
		$length = $components->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				$component = $components[$i];
				$퍁 = ($component);
				switch($퍁->index) {
				case 1:
				$value = $퍁->params[0];
				{
				}break;
				case 0:
				$value = $퍁->params[0];
				{
					$this->getSimpleSelectorSequenceSpecificity($value, $selectorSpecificity);
				}break;
				}
				unset($i,$component);
			}
		}
		$concatenatedSpecificity = Std::string($selectorSpecificity->idSelectorsNumber) . Std::string($selectorSpecificity->classAttributesAndPseudoClassesNumber) . Std::string($selectorSpecificity->typeAndPseudoElementsNumber);
		{
			$퍁mp = Std::parseInt($concatenatedSpecificity);
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}
		$GLOBALS['%s']->pop();
	}
	public function matchTargetPseudoClassSelector($node) {
		$GLOBALS['%s']->push("cocktail.core.css.SelectorManager::matchTargetPseudoClassSelector");
		$퍀pos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function matchUserActionPseudoClassSelector($node, $userActionPseudoClassSelector, $matchedPseudoClass) {
		$GLOBALS['%s']->push("cocktail.core.css.SelectorManager::matchUserActionPseudoClassSelector");
		$퍀pos = $GLOBALS['%s']->length;
		$퍁 = ($userActionPseudoClassSelector);
		switch($퍁->index) {
		case 0:
		{
			$퍁mp = $matchedPseudoClass->active;
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		case 1:
		{
			$퍁mp = $matchedPseudoClass->hover;
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		case 2:
		{
			$퍁mp = $matchedPseudoClass->focus;
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	public function matchLinkPseudoClassSelector($node, $linkPseudoClassSelector, $matchedPseudoClass) {
		$GLOBALS['%s']->push("cocktail.core.css.SelectorManager::matchLinkPseudoClassSelector");
		$퍀pos = $GLOBALS['%s']->length;
		$퍁 = ($linkPseudoClassSelector);
		switch($퍁->index) {
		case 0:
		{
			$퍁mp = $matchedPseudoClass->link;
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		case 1:
		{
			$GLOBALS['%s']->pop();
			return false;
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	public function matchOnlyOfType($node) {
		$GLOBALS['%s']->push("cocktail.core.css.SelectorManager::matchOnlyOfType");
		$퍀pos = $GLOBALS['%s']->length;
		{
			$퍁mp = $this->matchLastOfType($node) === true && $this->matchFirstOfType($node) === true;
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}
		$GLOBALS['%s']->pop();
	}
	public function matchLastOfType($node) {
		$GLOBALS['%s']->push("cocktail.core.css.SelectorManager::matchLastOfType");
		$퍀pos = $GLOBALS['%s']->length;
		$type = $node->tagName;
		$nextElementSibling = $node->get_nextElementSibling();
		while($nextElementSibling !== null) {
			if($nextElementSibling->tagName === $type) {
				$GLOBALS['%s']->pop();
				return false;
			}
			$nextElementSibling = $nextElementSibling->get_nextElementSibling();
		}
		{
			$GLOBALS['%s']->pop();
			return true;
		}
		$GLOBALS['%s']->pop();
	}
	public function matchFirstOfType($node) {
		$GLOBALS['%s']->push("cocktail.core.css.SelectorManager::matchFirstOfType");
		$퍀pos = $GLOBALS['%s']->length;
		$type = $node->tagName;
		$previousElementSibling = $node->get_previousElementSibling();
		while($previousElementSibling !== null) {
			if($previousElementSibling->tagName === $type) {
				$GLOBALS['%s']->pop();
				return false;
			}
			$previousElementSibling = $previousElementSibling->get_previousElementSibling();
		}
		{
			$GLOBALS['%s']->pop();
			return true;
		}
		$GLOBALS['%s']->pop();
	}
	public function matchNthOfType($node, $value) {
		$GLOBALS['%s']->push("cocktail.core.css.SelectorManager::matchNthOfType");
		$퍀pos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function matchNthLastOfType($node, $value) {
		$GLOBALS['%s']->push("cocktail.core.css.SelectorManager::matchNthLastOfType");
		$퍀pos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function matchNthLastChild($node, $value) {
		$GLOBALS['%s']->push("cocktail.core.css.SelectorManager::matchNthLastChild");
		$퍀pos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function matchNthChild($node, $value) {
		$GLOBALS['%s']->push("cocktail.core.css.SelectorManager::matchNthChild");
		$퍀pos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function matchStructuralPseudoClassSelector($node, $structuralPseudoClassSelector) {
		$GLOBALS['%s']->push("cocktail.core.css.SelectorManager::matchStructuralPseudoClassSelector");
		$퍀pos = $GLOBALS['%s']->length;
		$퍁 = ($structuralPseudoClassSelector);
		switch($퍁->index) {
		case 7:
		{
			$퍁mp = $node->hasChildNodes();
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		case 1:
		{
			$퍁mp = $node->get_previousSibling() === null;
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		case 2:
		{
			$퍁mp = $node->get_nextSibling() === null;
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		case 5:
		{
			$퍁mp = $node->parentNode->childNodes->length === 1;
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		case 0:
		{
			$퍁mp = $node->tagName === "HTML" && $node->parentNode === null;
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		case 6:
		{
			$퍁mp = $this->matchOnlyOfType($node);
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		case 3:
		{
			$퍁mp = $this->matchFirstOfType($node);
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		case 4:
		{
			$퍁mp = $this->matchLastOfType($node);
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		case 8:
		$value = $퍁->params[0];
		{
			$퍁mp = $this->matchNthChild($node, $value);
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		case 9:
		$value = $퍁->params[0];
		{
			$퍁mp = $this->matchNthLastChild($node, $value);
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		case 11:
		$value = $퍁->params[0];
		{
			$퍁mp = $this->matchNthLastOfType($node, $value);
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		case 10:
		$value = $퍁->params[0];
		{
			$퍁mp = $this->matchNthOfType($node, $value);
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	public function matchLangPseudoClassSelector($node, $lang) {
		$GLOBALS['%s']->push("cocktail.core.css.SelectorManager::matchLangPseudoClassSelector");
		$퍀pos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function matchNegationPseudoClassSelector($node, $negationSimpleSelectorSequence) {
		$GLOBALS['%s']->push("cocktail.core.css.SelectorManager::matchNegationPseudoClassSelector");
		$퍀pos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function matchUIElementStatesSelector($node, $uiElementState, $matchedPseudoClasses) {
		$GLOBALS['%s']->push("cocktail.core.css.SelectorManager::matchUIElementStatesSelector");
		$퍀pos = $GLOBALS['%s']->length;
		$퍁 = ($uiElementState);
		switch($퍁->index) {
		case 2:
		{
			$퍁mp = $matchedPseudoClasses->checked;
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		case 1:
		{
			$퍁mp = $matchedPseudoClasses->disabled;
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		case 0:
		{
			$퍁mp = $matchedPseudoClasses->enabled;
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	public function matchPseudoClassSelector($node, $pseudoClassSelector, $matchedPseudoClasses) {
		$GLOBALS['%s']->push("cocktail.core.css.SelectorManager::matchPseudoClassSelector");
		$퍀pos = $GLOBALS['%s']->length;
		$퍁 = ($pseudoClassSelector);
		switch($퍁->index) {
		case 0:
		$value = $퍁->params[0];
		{
			$퍁mp = $this->matchStructuralPseudoClassSelector($node, $value);
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		case 1:
		$value = $퍁->params[0];
		{
			$퍁mp = $this->matchLinkPseudoClassSelector($node, $value, $matchedPseudoClasses);
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		case 4:
		$value = $퍁->params[0];
		{
			$퍁mp = $this->matchUserActionPseudoClassSelector($node, $value, $matchedPseudoClasses);
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		case 2:
		{
			$퍁mp = $this->matchTargetPseudoClassSelector($node);
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		case 6:
		$value = $퍁->params[0];
		{
			$퍁mp = $this->matchNegationPseudoClassSelector($node, $value);
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		case 3:
		$value = $퍁->params[0];
		{
			$퍁mp = $this->matchLangPseudoClassSelector($node, $value);
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		case 5:
		$value = $퍁->params[0];
		{
			$퍁mp = $this->matchUIElementStatesSelector($node, $value, $matchedPseudoClasses);
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	public function matchAttributeList($node, $name, $value) {
		$GLOBALS['%s']->push("cocktail.core.css.SelectorManager::matchAttributeList");
		$퍀pos = $GLOBALS['%s']->length;
		$attributeValue = $node->getAttribute($name);
		if($attributeValue === null) {
			$GLOBALS['%s']->pop();
			return false;
		}
		$attributeValueAsList = _hx_explode(" ", $attributeValue);
		{
			$_g1 = 0; $_g = $attributeValueAsList->length;
			while($_g1 < $_g) {
				$i = $_g1++;
				if($attributeValueAsList[$i] === $value) {
					$GLOBALS['%s']->pop();
					return true;
				}
				unset($i);
			}
		}
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function matchAttributeBeginValue($node, $name, $value) {
		$GLOBALS['%s']->push("cocktail.core.css.SelectorManager::matchAttributeBeginValue");
		$퍀pos = $GLOBALS['%s']->length;
		$attributeValue = $node->getAttribute($name);
		if($attributeValue === null) {
			$GLOBALS['%s']->pop();
			return false;
		}
		{
			$퍁mp = _hx_index_of($attributeValue, $value, null) === 0;
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}
		$GLOBALS['%s']->pop();
	}
	public function matchAttributeContainsValue($node, $name, $value) {
		$GLOBALS['%s']->push("cocktail.core.css.SelectorManager::matchAttributeContainsValue");
		$퍀pos = $GLOBALS['%s']->length;
		$attributeValue = $node->getAttribute($name);
		if($attributeValue === null) {
			$GLOBALS['%s']->pop();
			return false;
		}
		{
			$퍁mp = _hx_index_of($attributeValue, $value, null) !== -1;
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}
		$GLOBALS['%s']->pop();
	}
	public function matchAttributeEndValue($node, $name, $value) {
		$GLOBALS['%s']->push("cocktail.core.css.SelectorManager::matchAttributeEndValue");
		$퍀pos = $GLOBALS['%s']->length;
		$attributeValue = $node->getAttribute($name);
		if($attributeValue === null) {
			$GLOBALS['%s']->pop();
			return false;
		}
		{
			$퍁mp = _hx_last_index_of($attributeValue, $value, null) === strlen($attributeValue) - strlen($value);
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}
		$GLOBALS['%s']->pop();
	}
	public function matchAttributeBeginsHyphenList($node, $name, $value) {
		$GLOBALS['%s']->push("cocktail.core.css.SelectorManager::matchAttributeBeginsHyphenList");
		$퍀pos = $GLOBALS['%s']->length;
		$attributeValue = $node->getAttribute($name);
		if($attributeValue === null) {
			$GLOBALS['%s']->pop();
			return false;
		}
		$attributeValueAsList = _hx_explode("-", $attributeValue);
		{
			$퍁mp = $attributeValueAsList[0] === $value;
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}
		$GLOBALS['%s']->pop();
	}
	public function matchAttributeSelector($node, $attributeSelector) {
		$GLOBALS['%s']->push("cocktail.core.css.SelectorManager::matchAttributeSelector");
		$퍀pos = $GLOBALS['%s']->length;
		$퍁 = ($attributeSelector);
		switch($퍁->index) {
		case 0:
		$value = $퍁->params[0];
		{
			$퍁mp = $node->getAttribute($value) !== null;
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		case 1:
		$value = $퍁->params[1]; $name = $퍁->params[0];
		{
			$퍁mp = $node->getAttribute($name) === $value;
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		case 2:
		$value = $퍁->params[1]; $name = $퍁->params[0];
		{
			$퍁mp = $this->matchAttributeList($node, $name, $value);
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		case 3:
		$value = $퍁->params[1]; $name = $퍁->params[0];
		{
			$퍁mp = $this->matchAttributeBeginValue($node, $name, $value);
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		case 5:
		$value = $퍁->params[1]; $name = $퍁->params[0];
		{
			$퍁mp = $this->matchAttributeContainsValue($node, $name, $value);
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		case 4:
		$value = $퍁->params[1]; $name = $퍁->params[0];
		{
			$퍁mp = $this->matchAttributeEndValue($node, $name, $value);
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		case 6:
		$value = $퍁->params[1]; $name = $퍁->params[0];
		{
			$퍁mp = $this->matchAttributeBeginsHyphenList($node, $name, $value);
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return true;
		}
		$GLOBALS['%s']->pop();
	}
	public function matchSimpleSelectorSequence($node, $simpleSelectorSequence, $matchedPseudoClasses) {
		$GLOBALS['%s']->push("cocktail.core.css.SelectorManager::matchSimpleSelectorSequence");
		$퍀pos = $GLOBALS['%s']->length;
		if($this->matchSimpleSelectorSequenceStart($node, $simpleSelectorSequence->startValue) === false) {
			$GLOBALS['%s']->pop();
			return false;
		}
		$simpleSelectors = $simpleSelectorSequence->simpleSelectors;
		$length = $simpleSelectors->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				$simpleSelectorSequence1 = $simpleSelectors[$i];
				if($this->matchSimpleSelectorSequenceItem($node, $simpleSelectorSequence1, $matchedPseudoClasses) === false) {
					$GLOBALS['%s']->pop();
					return false;
				}
				unset($simpleSelectorSequence1,$i);
			}
		}
		{
			$GLOBALS['%s']->pop();
			return true;
		}
		$GLOBALS['%s']->pop();
	}
	public function matchSimpleSelectorSequenceItem($node, $simpleSelectorSequenceItem, $matchedPseudoClasses) {
		$GLOBALS['%s']->push("cocktail.core.css.SelectorManager::matchSimpleSelectorSequenceItem");
		$퍀pos = $GLOBALS['%s']->length;
		$퍁 = ($simpleSelectorSequenceItem);
		switch($퍁->index) {
		case 2:
		$value = $퍁->params[0];
		{
			$classList = $node->classList;
			if($classList === null) {
				$GLOBALS['%s']->pop();
				return false;
			}
			$length = $classList->length;
			{
				$_g = 0;
				while($_g < $length) {
					$i = $_g++;
					if($value === $classList[$i]) {
						$GLOBALS['%s']->pop();
						return true;
					}
					unset($i);
				}
			}
			{
				$GLOBALS['%s']->pop();
				return false;
			}
		}break;
		case 3:
		$value = $퍁->params[0];
		{
			$퍁mp = $node->get_id() === $value;
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		case 1:
		$value = $퍁->params[0];
		{
			$퍁mp = $this->matchPseudoClassSelector($node, $value, $matchedPseudoClasses);
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		case 0:
		$value = $퍁->params[0];
		{
			$퍁mp = $this->matchAttributeSelector($node, $value);
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	public function matchSimpleSelectorSequenceStart($node, $simpleSelectorSequenceStart) {
		$GLOBALS['%s']->push("cocktail.core.css.SelectorManager::matchSimpleSelectorSequenceStart");
		$퍀pos = $GLOBALS['%s']->length;
		$퍁 = ($simpleSelectorSequenceStart);
		switch($퍁->index) {
		case 1:
		$value = $퍁->params[0];
		{
			$퍁mp = $node->tagName === strtoupper($value);
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		case 0:
		{
			$GLOBALS['%s']->pop();
			return true;
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	public function matchChildCombinator($node, $nextSelectorSequence, $matchedPseudoClasses) {
		$GLOBALS['%s']->push("cocktail.core.css.SelectorManager::matchChildCombinator");
		$퍀pos = $GLOBALS['%s']->length;
		{
			$퍁mp = $this->matchSimpleSelectorSequence($node->parentNode, $nextSelectorSequence, $matchedPseudoClasses);
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}
		$GLOBALS['%s']->pop();
	}
	public function matchDescendantCombinator($node, $nextSelectorSequence, $matchedPseudoClasses) {
		$GLOBALS['%s']->push("cocktail.core.css.SelectorManager::matchDescendantCombinator");
		$퍀pos = $GLOBALS['%s']->length;
		$parentNode = $node->parentNode;
		while($parentNode !== null) {
			if($this->matchSimpleSelectorSequence($parentNode, $nextSelectorSequence, $matchedPseudoClasses) === true) {
				$GLOBALS['%s']->pop();
				return true;
			}
			$parentNode = $parentNode->parentNode;
		}
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function matchAdjacentSiblingCombinator($node, $nextSelectorSequence, $matchedPseudoClasses) {
		$GLOBALS['%s']->push("cocktail.core.css.SelectorManager::matchAdjacentSiblingCombinator");
		$퍀pos = $GLOBALS['%s']->length;
		$previousElementSibling = $node->get_previousElementSibling();
		if($previousElementSibling === null) {
			$GLOBALS['%s']->pop();
			return false;
		}
		{
			$퍁mp = $this->matchSimpleSelectorSequence($previousElementSibling, $nextSelectorSequence, $matchedPseudoClasses);
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}
		$GLOBALS['%s']->pop();
	}
	public function matchGeneralSiblingCombinator($node, $nextSelectorSequence, $matchedPseudoClasses) {
		$GLOBALS['%s']->push("cocktail.core.css.SelectorManager::matchGeneralSiblingCombinator");
		$퍀pos = $GLOBALS['%s']->length;
		$previousElementSibling = $node->get_previousElementSibling();
		while($previousElementSibling !== null) {
			if($this->matchSimpleSelectorSequence($previousElementSibling, $nextSelectorSequence, $matchedPseudoClasses) === true) {
				$GLOBALS['%s']->pop();
				return true;
			}
			$previousElementSibling = $previousElementSibling->get_previousElementSibling();
		}
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function matchCombinator($node, $combinator, $nextSelectorComponent, $matchedPseudoClasses) {
		$GLOBALS['%s']->push("cocktail.core.css.SelectorManager::matchCombinator");
		$퍀pos = $GLOBALS['%s']->length;
		if($node->parentNode === null) {
			$GLOBALS['%s']->pop();
			return false;
		}
		$nextSelectorSequence = null;
		$퍁 = ($nextSelectorComponent);
		switch($퍁->index) {
		case 0:
		$value = $퍁->params[0];
		{
			$nextSelectorSequence = $value;
		}break;
		case 1:
		$value = $퍁->params[0];
		{
			$GLOBALS['%s']->pop();
			return false;
		}break;
		}
		$퍁 = ($combinator);
		switch($퍁->index) {
		case 2:
		{
			$퍁mp = $this->matchAdjacentSiblingCombinator($node, $nextSelectorSequence, $matchedPseudoClasses);
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		case 3:
		{
			$퍁mp = $this->matchGeneralSiblingCombinator($node, $nextSelectorSequence, $matchedPseudoClasses);
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		case 1:
		{
			$퍁mp = $this->matchChildCombinator($node, $nextSelectorSequence, $matchedPseudoClasses);
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		case 0:
		{
			$퍁mp = $this->matchDescendantCombinator($node, $nextSelectorSequence, $matchedPseudoClasses);
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	public function matchSelector($node, $selector, $matchedPseudoClasses) {
		$GLOBALS['%s']->push("cocktail.core.css.SelectorManager::matchSelector");
		$퍀pos = $GLOBALS['%s']->length;
		$components = $selector->components;
		$lastWasCombinator = false;
		$length = $components->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				$component = $components[$i];
				$matched = false;
				$퍁 = ($component);
				switch($퍁->index) {
				case 1:
				$value = $퍁->params[0];
				{
					$matched = $this->matchCombinator($node, $value, $components[$i + 1], $matchedPseudoClasses);
					$lastWasCombinator = true;
				}break;
				case 0:
				$value = $퍁->params[0];
				{
					if($lastWasCombinator === true) {
						$matched = true;
						$lastWasCombinator = false;
					} else {
						$matched = $this->matchSimpleSelectorSequence($node, $value, $matchedPseudoClasses);
					}
				}break;
				}
				if($matched === false) {
					$GLOBALS['%s']->pop();
					return false;
				}
				unset($matched,$i,$component);
			}
		}
		{
			$GLOBALS['%s']->pop();
			return true;
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'cocktail.core.css.SelectorManager'; }
}

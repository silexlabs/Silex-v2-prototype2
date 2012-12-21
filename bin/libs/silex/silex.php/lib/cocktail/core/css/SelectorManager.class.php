<?php

class cocktail_core_css_SelectorManager {
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.css.SelectorManager::new");
		$»spos = $GLOBALS['%s']->length;
		$this->_selectorSpecificityVO = new cocktail_core_css_SelectorSpecificityVO();
		$GLOBALS['%s']->pop();
	}}
	public function getSimpleSelectorSequenceItemSpecificity($simpleSelectorSequenceItem, $selectorSpecificity) {
		$GLOBALS['%s']->push("cocktail.core.css.SelectorManager::getSimpleSelectorSequenceItemSpecificity");
		$»spos = $GLOBALS['%s']->length;
		$»t = ($simpleSelectorSequenceItem);
		switch($»t->index) {
		case 0:
		$value = $»t->params[0];
		{
			$selectorSpecificity->classAttributesAndPseudoClassesNumber++;
		}break;
		case 1:
		$value = $»t->params[0];
		{
			$selectorSpecificity->classAttributesAndPseudoClassesNumber++;
		}break;
		case 2:
		$value = $»t->params[0];
		{
			$selectorSpecificity->classAttributesAndPseudoClassesNumber++;
		}break;
		case 3:
		$value = $»t->params[0];
		{
			$selectorSpecificity->idSelectorsNumber++;
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	public function getSimpleSelectorSequenceStartSpecificity($simpleSelectorSequenceStart, $selectorSpecificity) {
		$GLOBALS['%s']->push("cocktail.core.css.SelectorManager::getSimpleSelectorSequenceStartSpecificity");
		$»spos = $GLOBALS['%s']->length;
		$»t = ($simpleSelectorSequenceStart);
		switch($»t->index) {
		case 1:
		$value = $»t->params[0];
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
		$»spos = $GLOBALS['%s']->length;
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
		$»spos = $GLOBALS['%s']->length;
		$this->_selectorSpecificityVO->classAttributesAndPseudoClassesNumber = 0;
		$this->_selectorSpecificityVO->idSelectorsNumber = 0;
		$this->_selectorSpecificityVO->typeAndPseudoElementsNumber = 0;
		$»t = ($selector->pseudoElement);
		switch($»t->index) {
		case 2:
		case 1:
		case 4:
		case 3:
		{
			$this->_selectorSpecificityVO->typeAndPseudoElementsNumber++;
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
				$»t = ($component);
				switch($»t->index) {
				case 1:
				$value = $»t->params[0];
				{
				}break;
				case 0:
				$value = $»t->params[0];
				{
					$this->getSimpleSelectorSequenceSpecificity($value, $this->_selectorSpecificityVO);
				}break;
				}
				unset($i,$component);
			}
		}
		$concatenatedSpecificity = Std::string($this->_selectorSpecificityVO->idSelectorsNumber) . Std::string($this->_selectorSpecificityVO->classAttributesAndPseudoClassesNumber) . Std::string($this->_selectorSpecificityVO->typeAndPseudoElementsNumber);
		{
			$»tmp = Std::parseInt($concatenatedSpecificity);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function matchTargetPseudoClassSelector($node) {
		$GLOBALS['%s']->push("cocktail.core.css.SelectorManager::matchTargetPseudoClassSelector");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function matchUserActionPseudoClassSelector($node, $userActionPseudoClassSelector, $matchedPseudoClass) {
		$GLOBALS['%s']->push("cocktail.core.css.SelectorManager::matchUserActionPseudoClassSelector");
		$»spos = $GLOBALS['%s']->length;
		$»t = ($userActionPseudoClassSelector);
		switch($»t->index) {
		case 0:
		{
			$»tmp = $matchedPseudoClass->active;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}break;
		case 1:
		{
			$»tmp = $matchedPseudoClass->hover;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}break;
		case 2:
		{
			$»tmp = $matchedPseudoClass->focus;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	public function matchLinkPseudoClassSelector($node, $linkPseudoClassSelector, $matchedPseudoClass) {
		$GLOBALS['%s']->push("cocktail.core.css.SelectorManager::matchLinkPseudoClassSelector");
		$»spos = $GLOBALS['%s']->length;
		$»t = ($linkPseudoClassSelector);
		switch($»t->index) {
		case 0:
		{
			$»tmp = $matchedPseudoClass->link;
			$GLOBALS['%s']->pop();
			return $»tmp;
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
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->matchLastOfType($node) === true && $this->matchFirstOfType($node) === true;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function matchLastOfType($node) {
		$GLOBALS['%s']->push("cocktail.core.css.SelectorManager::matchLastOfType");
		$»spos = $GLOBALS['%s']->length;
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
		$»spos = $GLOBALS['%s']->length;
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
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function matchNthLastOfType($node, $value) {
		$GLOBALS['%s']->push("cocktail.core.css.SelectorManager::matchNthLastOfType");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function matchNthLastChild($node, $value) {
		$GLOBALS['%s']->push("cocktail.core.css.SelectorManager::matchNthLastChild");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function matchNthChild($node, $value) {
		$GLOBALS['%s']->push("cocktail.core.css.SelectorManager::matchNthChild");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function matchStructuralPseudoClassSelector($node, $structuralPseudoClassSelector) {
		$GLOBALS['%s']->push("cocktail.core.css.SelectorManager::matchStructuralPseudoClassSelector");
		$»spos = $GLOBALS['%s']->length;
		$»t = ($structuralPseudoClassSelector);
		switch($»t->index) {
		case 7:
		{
			$»tmp = $node->hasChildNodes();
			$GLOBALS['%s']->pop();
			return $»tmp;
		}break;
		case 1:
		{
			$»tmp = $node->get_previousSibling() === null;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}break;
		case 2:
		{
			$»tmp = $node->get_nextSibling() === null;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}break;
		case 5:
		{
			$»tmp = $node->parentNode->childNodes->length === 1;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}break;
		case 0:
		{
			$»tmp = $node->tagName === "HTML" && $node->parentNode === null;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}break;
		case 6:
		{
			$»tmp = $this->matchOnlyOfType($node);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}break;
		case 3:
		{
			$»tmp = $this->matchFirstOfType($node);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}break;
		case 4:
		{
			$»tmp = $this->matchLastOfType($node);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}break;
		case 8:
		$value = $»t->params[0];
		{
			$»tmp = $this->matchNthChild($node, $value);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}break;
		case 9:
		$value = $»t->params[0];
		{
			$»tmp = $this->matchNthLastChild($node, $value);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}break;
		case 11:
		$value = $»t->params[0];
		{
			$»tmp = $this->matchNthLastOfType($node, $value);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}break;
		case 10:
		$value = $»t->params[0];
		{
			$»tmp = $this->matchNthOfType($node, $value);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	public function matchLangPseudoClassSelector($node, $lang) {
		$GLOBALS['%s']->push("cocktail.core.css.SelectorManager::matchLangPseudoClassSelector");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function matchNegationPseudoClassSelector($node, $negationSimpleSelectorSequence) {
		$GLOBALS['%s']->push("cocktail.core.css.SelectorManager::matchNegationPseudoClassSelector");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function matchUIElementStatesSelector($node, $uiElementState, $matchedPseudoClasses) {
		$GLOBALS['%s']->push("cocktail.core.css.SelectorManager::matchUIElementStatesSelector");
		$»spos = $GLOBALS['%s']->length;
		$»t = ($uiElementState);
		switch($»t->index) {
		case 2:
		{
			$»tmp = $matchedPseudoClasses->checked;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}break;
		case 1:
		{
			$»tmp = $matchedPseudoClasses->disabled;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}break;
		case 0:
		{
			$»tmp = $matchedPseudoClasses->enabled;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	public function matchPseudoClassSelector($node, $pseudoClassSelector, $matchedPseudoClasses) {
		$GLOBALS['%s']->push("cocktail.core.css.SelectorManager::matchPseudoClassSelector");
		$»spos = $GLOBALS['%s']->length;
		$»t = ($pseudoClassSelector);
		switch($»t->index) {
		case 0:
		$value = $»t->params[0];
		{
			$»tmp = $this->matchStructuralPseudoClassSelector($node, $value);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}break;
		case 1:
		$value = $»t->params[0];
		{
			$»tmp = $this->matchLinkPseudoClassSelector($node, $value, $matchedPseudoClasses);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}break;
		case 4:
		$value = $»t->params[0];
		{
			$»tmp = $this->matchUserActionPseudoClassSelector($node, $value, $matchedPseudoClasses);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}break;
		case 2:
		{
			$»tmp = $this->matchTargetPseudoClassSelector($node);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}break;
		case 6:
		$value = $»t->params[0];
		{
			$»tmp = $this->matchNegationPseudoClassSelector($node, $value);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}break;
		case 3:
		$value = $»t->params[0];
		{
			$»tmp = $this->matchLangPseudoClassSelector($node, $value);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}break;
		case 5:
		$value = $»t->params[0];
		{
			$»tmp = $this->matchUIElementStatesSelector($node, $value, $matchedPseudoClasses);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	public function matchAttributeList($node, $name, $value) {
		$GLOBALS['%s']->push("cocktail.core.css.SelectorManager::matchAttributeList");
		$»spos = $GLOBALS['%s']->length;
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
		$»spos = $GLOBALS['%s']->length;
		$attributeValue = $node->getAttribute($name);
		if($attributeValue === null) {
			$GLOBALS['%s']->pop();
			return false;
		}
		{
			$»tmp = _hx_index_of($attributeValue, $value, null) === 0;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function matchAttributeContainsValue($node, $name, $value) {
		$GLOBALS['%s']->push("cocktail.core.css.SelectorManager::matchAttributeContainsValue");
		$»spos = $GLOBALS['%s']->length;
		$attributeValue = $node->getAttribute($name);
		if($attributeValue === null) {
			$GLOBALS['%s']->pop();
			return false;
		}
		{
			$»tmp = _hx_index_of($attributeValue, $value, null) !== -1;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function matchAttributeEndValue($node, $name, $value) {
		$GLOBALS['%s']->push("cocktail.core.css.SelectorManager::matchAttributeEndValue");
		$»spos = $GLOBALS['%s']->length;
		$attributeValue = $node->getAttribute($name);
		if($attributeValue === null) {
			$GLOBALS['%s']->pop();
			return false;
		}
		{
			$»tmp = _hx_last_index_of($attributeValue, $value, null) === strlen($attributeValue) - strlen($value);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function matchAttributeBeginsHyphenList($node, $name, $value) {
		$GLOBALS['%s']->push("cocktail.core.css.SelectorManager::matchAttributeBeginsHyphenList");
		$»spos = $GLOBALS['%s']->length;
		$attributeValue = $node->getAttribute($name);
		if($attributeValue === null) {
			$GLOBALS['%s']->pop();
			return false;
		}
		$attributeValueAsList = _hx_explode("-", $attributeValue);
		{
			$»tmp = $attributeValueAsList[0] === $value;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function matchAttributeSelector($node, $attributeSelector) {
		$GLOBALS['%s']->push("cocktail.core.css.SelectorManager::matchAttributeSelector");
		$»spos = $GLOBALS['%s']->length;
		$»t = ($attributeSelector);
		switch($»t->index) {
		case 0:
		$value = $»t->params[0];
		{
			$»tmp = $node->getAttribute($value) !== null;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}break;
		case 1:
		$value = $»t->params[1]; $name = $»t->params[0];
		{
			$»tmp = $node->getAttribute($name) === $value;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}break;
		case 2:
		$value = $»t->params[1]; $name = $»t->params[0];
		{
			$»tmp = $this->matchAttributeList($node, $name, $value);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}break;
		case 3:
		$value = $»t->params[1]; $name = $»t->params[0];
		{
			$»tmp = $this->matchAttributeBeginValue($node, $name, $value);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}break;
		case 5:
		$value = $»t->params[1]; $name = $»t->params[0];
		{
			$»tmp = $this->matchAttributeContainsValue($node, $name, $value);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}break;
		case 4:
		$value = $»t->params[1]; $name = $»t->params[0];
		{
			$»tmp = $this->matchAttributeEndValue($node, $name, $value);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}break;
		case 6:
		$value = $»t->params[1]; $name = $»t->params[0];
		{
			$»tmp = $this->matchAttributeBeginsHyphenList($node, $name, $value);
			$GLOBALS['%s']->pop();
			return $»tmp;
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
		$»spos = $GLOBALS['%s']->length;
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
		$»spos = $GLOBALS['%s']->length;
		$»t = ($simpleSelectorSequenceItem);
		switch($»t->index) {
		case 2:
		$value = $»t->params[0];
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
		$value = $»t->params[0];
		{
			$»tmp = $node->get_id() === $value;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}break;
		case 1:
		$value = $»t->params[0];
		{
			$»tmp = $this->matchPseudoClassSelector($node, $value, $matchedPseudoClasses);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}break;
		case 0:
		$value = $»t->params[0];
		{
			$»tmp = $this->matchAttributeSelector($node, $value);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	public function matchSimpleSelectorSequenceStart($node, $simpleSelectorSequenceStart) {
		$GLOBALS['%s']->push("cocktail.core.css.SelectorManager::matchSimpleSelectorSequenceStart");
		$»spos = $GLOBALS['%s']->length;
		$»t = ($simpleSelectorSequenceStart);
		switch($»t->index) {
		case 1:
		$value = $»t->params[0];
		{
			$»tmp = $node->tagName === $value;
			$GLOBALS['%s']->pop();
			return $»tmp;
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
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->matchSimpleSelectorSequence($node->parentNode, $nextSelectorSequence, $matchedPseudoClasses);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function matchDescendantCombinator($node, $nextSelectorSequence, $matchedPseudoClasses) {
		$GLOBALS['%s']->push("cocktail.core.css.SelectorManager::matchDescendantCombinator");
		$»spos = $GLOBALS['%s']->length;
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
		$»spos = $GLOBALS['%s']->length;
		$previousElementSibling = $node->get_previousElementSibling();
		if($previousElementSibling === null) {
			$GLOBALS['%s']->pop();
			return false;
		}
		{
			$»tmp = $this->matchSimpleSelectorSequence($previousElementSibling, $nextSelectorSequence, $matchedPseudoClasses);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function matchGeneralSiblingCombinator($node, $nextSelectorSequence, $matchedPseudoClasses) {
		$GLOBALS['%s']->push("cocktail.core.css.SelectorManager::matchGeneralSiblingCombinator");
		$»spos = $GLOBALS['%s']->length;
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
		$»spos = $GLOBALS['%s']->length;
		if($node->parentNode === null) {
			$GLOBALS['%s']->pop();
			return false;
		}
		$nextSelectorSequence = null;
		$»t = ($nextSelectorComponent);
		switch($»t->index) {
		case 0:
		$value = $»t->params[0];
		{
			$nextSelectorSequence = $value;
		}break;
		case 1:
		$value = $»t->params[0];
		{
			$GLOBALS['%s']->pop();
			return false;
		}break;
		}
		$»t = ($combinator);
		switch($»t->index) {
		case 2:
		{
			$»tmp = $this->matchAdjacentSiblingCombinator($node, $nextSelectorSequence, $matchedPseudoClasses);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}break;
		case 3:
		{
			$»tmp = $this->matchGeneralSiblingCombinator($node, $nextSelectorSequence, $matchedPseudoClasses);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}break;
		case 1:
		{
			$»tmp = $this->matchChildCombinator($node, $nextSelectorSequence, $matchedPseudoClasses);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}break;
		case 0:
		{
			$»tmp = $this->matchDescendantCombinator($node, $nextSelectorSequence, $matchedPseudoClasses);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	public function matchSelector($node, $selector, $matchedPseudoClasses) {
		$GLOBALS['%s']->push("cocktail.core.css.SelectorManager::matchSelector");
		$»spos = $GLOBALS['%s']->length;
		$components = $selector->components;
		$lastWasCombinator = false;
		$length = $components->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				$component = $components[$i];
				$matched = false;
				$»t = ($component);
				switch($»t->index) {
				case 1:
				$value = $»t->params[0];
				{
					$matched = $this->matchCombinator($node, $value, $components[$i + 1], $matchedPseudoClasses);
					$lastWasCombinator = true;
				}break;
				case 0:
				$value = $»t->params[0];
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
	public $_selectorSpecificityVO;
	public function __call($m, $a) {
		if(isset($this->$m) && is_callable($this->$m))
			return call_user_func_array($this->$m, $a);
		else if(isset($this->»dynamics[$m]) && is_callable($this->»dynamics[$m]))
			return call_user_func_array($this->»dynamics[$m], $a);
		else if('toString' == $m)
			return $this->__toString();
		else
			throw new HException('Unable to call «'.$m.'»');
	}
	function __toString() { return 'cocktail.core.css.SelectorManager'; }
}

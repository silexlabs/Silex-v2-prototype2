<?php

class cocktail_core_css_SelectorManager {
	public function __construct() { 
	}
	public function getSimpleSelectorSequenceItemSpecificity($simpleSelectorSequenceItem, $selectorSpecificity) {
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
	}
	public function getSimpleSelectorSequenceStartSpecificity($simpleSelectorSequenceStart, $selectorSpecificity) {
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
	}
	public function getSimpleSelectorSequenceSpecificity($simpleSelectorSequence, $selectorSpecificity) {
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
	}
	public function getSelectorSpecifity($selector) {
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
		return Std::parseInt($concatenatedSpecificity);
	}
	public function matchTargetPseudoClassSelector($node) {
		return false;
	}
	public function matchUserActionPseudoClassSelector($node, $userActionPseudoClassSelector, $matchedPseudoClass) {
		$퍁 = ($userActionPseudoClassSelector);
		switch($퍁->index) {
		case 0:
		{
			return $matchedPseudoClass->active;
		}break;
		case 1:
		{
			return $matchedPseudoClass->hover;
		}break;
		case 2:
		{
			return $matchedPseudoClass->focus;
		}break;
		}
	}
	public function matchLinkPseudoClassSelector($node, $linkPseudoClassSelector, $matchedPseudoClass) {
		$퍁 = ($linkPseudoClassSelector);
		switch($퍁->index) {
		case 0:
		{
			return $matchedPseudoClass->link;
		}break;
		case 1:
		{
			return false;
		}break;
		}
	}
	public function matchOnlyOfType($node) {
		return $this->matchLastOfType($node) === true && $this->matchFirstOfType($node) === true;
	}
	public function matchLastOfType($node) {
		$type = $node->tagName;
		$nextElementSibling = $node->get_nextElementSibling();
		while($nextElementSibling !== null) {
			if($nextElementSibling->tagName === $type) {
				return false;
			}
			$nextElementSibling = $nextElementSibling->get_nextElementSibling();
		}
		return true;
	}
	public function matchFirstOfType($node) {
		$type = $node->tagName;
		$previousElementSibling = $node->get_previousElementSibling();
		while($previousElementSibling !== null) {
			if($previousElementSibling->tagName === $type) {
				return false;
			}
			$previousElementSibling = $previousElementSibling->get_previousElementSibling();
		}
		return true;
	}
	public function matchNthOfType($node, $value) {
		return false;
	}
	public function matchNthLastOfType($node, $value) {
		return false;
	}
	public function matchNthLastChild($node, $value) {
		return false;
	}
	public function matchNthChild($node, $value) {
		return false;
	}
	public function matchStructuralPseudoClassSelector($node, $structuralPseudoClassSelector) {
		$퍁 = ($structuralPseudoClassSelector);
		switch($퍁->index) {
		case 7:
		{
			return $node->hasChildNodes();
		}break;
		case 1:
		{
			return $node->get_previousSibling() === null;
		}break;
		case 2:
		{
			return $node->get_nextSibling() === null;
		}break;
		case 5:
		{
			return $node->parentNode->childNodes->length === 1;
		}break;
		case 0:
		{
			return $node->tagName === "HTML" && $node->parentNode === null;
		}break;
		case 6:
		{
			return $this->matchOnlyOfType($node);
		}break;
		case 3:
		{
			return $this->matchFirstOfType($node);
		}break;
		case 4:
		{
			return $this->matchLastOfType($node);
		}break;
		case 8:
		$value = $퍁->params[0];
		{
			return $this->matchNthChild($node, $value);
		}break;
		case 9:
		$value = $퍁->params[0];
		{
			return $this->matchNthLastChild($node, $value);
		}break;
		case 11:
		$value = $퍁->params[0];
		{
			return $this->matchNthLastOfType($node, $value);
		}break;
		case 10:
		$value = $퍁->params[0];
		{
			return $this->matchNthOfType($node, $value);
		}break;
		}
	}
	public function matchLangPseudoClassSelector($node, $lang) {
		return false;
	}
	public function matchNegationPseudoClassSelector($node, $negationSimpleSelectorSequence) {
		return false;
	}
	public function matchUIElementStatesSelector($node, $uiElementState, $matchedPseudoClasses) {
		$퍁 = ($uiElementState);
		switch($퍁->index) {
		case 2:
		{
			return $matchedPseudoClasses->checked;
		}break;
		case 1:
		{
			return $matchedPseudoClasses->disabled;
		}break;
		case 0:
		{
			return $matchedPseudoClasses->enabled;
		}break;
		}
	}
	public function matchPseudoClassSelector($node, $pseudoClassSelector, $matchedPseudoClasses) {
		$퍁 = ($pseudoClassSelector);
		switch($퍁->index) {
		case 0:
		$value = $퍁->params[0];
		{
			return $this->matchStructuralPseudoClassSelector($node, $value);
		}break;
		case 1:
		$value = $퍁->params[0];
		{
			return $this->matchLinkPseudoClassSelector($node, $value, $matchedPseudoClasses);
		}break;
		case 4:
		$value = $퍁->params[0];
		{
			return $this->matchUserActionPseudoClassSelector($node, $value, $matchedPseudoClasses);
		}break;
		case 2:
		{
			return $this->matchTargetPseudoClassSelector($node);
		}break;
		case 6:
		$value = $퍁->params[0];
		{
			return $this->matchNegationPseudoClassSelector($node, $value);
		}break;
		case 3:
		$value = $퍁->params[0];
		{
			return $this->matchLangPseudoClassSelector($node, $value);
		}break;
		case 5:
		$value = $퍁->params[0];
		{
			return $this->matchUIElementStatesSelector($node, $value, $matchedPseudoClasses);
		}break;
		}
	}
	public function matchAttributeList($node, $name, $value) {
		$attributeValue = $node->getAttribute($name);
		if($attributeValue === null) {
			return false;
		}
		$attributeValueAsList = _hx_explode(" ", $attributeValue);
		{
			$_g1 = 0; $_g = $attributeValueAsList->length;
			while($_g1 < $_g) {
				$i = $_g1++;
				if($attributeValueAsList[$i] === $value) {
					return true;
				}
				unset($i);
			}
		}
		return false;
	}
	public function matchAttributeBeginValue($node, $name, $value) {
		$attributeValue = $node->getAttribute($name);
		if($attributeValue === null) {
			return false;
		}
		return _hx_index_of($attributeValue, $value, null) === 0;
	}
	public function matchAttributeContainsValue($node, $name, $value) {
		$attributeValue = $node->getAttribute($name);
		if($attributeValue === null) {
			return false;
		}
		return _hx_index_of($attributeValue, $value, null) !== -1;
	}
	public function matchAttributeEndValue($node, $name, $value) {
		$attributeValue = $node->getAttribute($name);
		if($attributeValue === null) {
			return false;
		}
		return _hx_last_index_of($attributeValue, $value, null) === strlen($attributeValue) - strlen($value);
	}
	public function matchAttributeBeginsHyphenList($node, $name, $value) {
		$attributeValue = $node->getAttribute($name);
		if($attributeValue === null) {
			return false;
		}
		$attributeValueAsList = _hx_explode("-", $attributeValue);
		return $attributeValueAsList[0] === $value;
	}
	public function matchAttributeSelector($node, $attributeSelector) {
		$퍁 = ($attributeSelector);
		switch($퍁->index) {
		case 0:
		$value = $퍁->params[0];
		{
			return $node->getAttribute($value) !== null;
		}break;
		case 1:
		$value = $퍁->params[1]; $name = $퍁->params[0];
		{
			return $node->getAttribute($name) === $value;
		}break;
		case 2:
		$value = $퍁->params[1]; $name = $퍁->params[0];
		{
			return $this->matchAttributeList($node, $name, $value);
		}break;
		case 3:
		$value = $퍁->params[1]; $name = $퍁->params[0];
		{
			return $this->matchAttributeBeginValue($node, $name, $value);
		}break;
		case 5:
		$value = $퍁->params[1]; $name = $퍁->params[0];
		{
			return $this->matchAttributeContainsValue($node, $name, $value);
		}break;
		case 4:
		$value = $퍁->params[1]; $name = $퍁->params[0];
		{
			return $this->matchAttributeEndValue($node, $name, $value);
		}break;
		case 6:
		$value = $퍁->params[1]; $name = $퍁->params[0];
		{
			return $this->matchAttributeBeginsHyphenList($node, $name, $value);
		}break;
		}
		return true;
	}
	public function matchSimpleSelectorSequence($node, $simpleSelectorSequence, $matchedPseudoClasses) {
		if($this->matchSimpleSelectorSequenceStart($node, $simpleSelectorSequence->startValue) === false) {
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
					return false;
				}
				unset($simpleSelectorSequence1,$i);
			}
		}
		return true;
	}
	public function matchSimpleSelectorSequenceItem($node, $simpleSelectorSequenceItem, $matchedPseudoClasses) {
		$퍁 = ($simpleSelectorSequenceItem);
		switch($퍁->index) {
		case 2:
		$value = $퍁->params[0];
		{
			$classList = $node->classList;
			if($classList === null) {
				return false;
			}
			$length = $classList->length;
			{
				$_g = 0;
				while($_g < $length) {
					$i = $_g++;
					if($value === $classList[$i]) {
						return true;
					}
					unset($i);
				}
			}
			return false;
		}break;
		case 3:
		$value = $퍁->params[0];
		{
			return $node->get_id() === $value;
		}break;
		case 1:
		$value = $퍁->params[0];
		{
			return $this->matchPseudoClassSelector($node, $value, $matchedPseudoClasses);
		}break;
		case 0:
		$value = $퍁->params[0];
		{
			return $this->matchAttributeSelector($node, $value);
		}break;
		}
	}
	public function matchSimpleSelectorSequenceStart($node, $simpleSelectorSequenceStart) {
		$퍁 = ($simpleSelectorSequenceStart);
		switch($퍁->index) {
		case 1:
		$value = $퍁->params[0];
		{
			return $node->tagName === strtoupper($value);
		}break;
		case 0:
		{
			return true;
		}break;
		}
	}
	public function matchChildCombinator($node, $nextSelectorSequence, $matchedPseudoClasses) {
		return $this->matchSimpleSelectorSequence($node->parentNode, $nextSelectorSequence, $matchedPseudoClasses);
	}
	public function matchDescendantCombinator($node, $nextSelectorSequence, $matchedPseudoClasses) {
		$parentNode = $node->parentNode;
		while($parentNode !== null) {
			if($this->matchSimpleSelectorSequence($parentNode, $nextSelectorSequence, $matchedPseudoClasses) === true) {
				return true;
			}
			$parentNode = $parentNode->parentNode;
		}
		return false;
	}
	public function matchAdjacentSiblingCombinator($node, $nextSelectorSequence, $matchedPseudoClasses) {
		$previousElementSibling = $node->get_previousElementSibling();
		if($previousElementSibling === null) {
			return false;
		}
		return $this->matchSimpleSelectorSequence($previousElementSibling, $nextSelectorSequence, $matchedPseudoClasses);
	}
	public function matchGeneralSiblingCombinator($node, $nextSelectorSequence, $matchedPseudoClasses) {
		$previousElementSibling = $node->get_previousElementSibling();
		while($previousElementSibling !== null) {
			if($this->matchSimpleSelectorSequence($previousElementSibling, $nextSelectorSequence, $matchedPseudoClasses) === true) {
				return true;
			}
			$previousElementSibling = $previousElementSibling->get_previousElementSibling();
		}
		return false;
	}
	public function matchCombinator($node, $combinator, $nextSelectorComponent, $matchedPseudoClasses) {
		if($node->parentNode === null) {
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
			return false;
		}break;
		}
		$퍁 = ($combinator);
		switch($퍁->index) {
		case 2:
		{
			return $this->matchAdjacentSiblingCombinator($node, $nextSelectorSequence, $matchedPseudoClasses);
		}break;
		case 3:
		{
			return $this->matchGeneralSiblingCombinator($node, $nextSelectorSequence, $matchedPseudoClasses);
		}break;
		case 1:
		{
			return $this->matchChildCombinator($node, $nextSelectorSequence, $matchedPseudoClasses);
		}break;
		case 0:
		{
			return $this->matchDescendantCombinator($node, $nextSelectorSequence, $matchedPseudoClasses);
		}break;
		}
	}
	public function matchSelector($node, $selector, $matchedPseudoClasses) {
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
					return false;
				}
				unset($matched,$i,$component);
			}
		}
		return true;
	}
	function __toString() { return 'cocktail.core.css.SelectorManager'; }
}

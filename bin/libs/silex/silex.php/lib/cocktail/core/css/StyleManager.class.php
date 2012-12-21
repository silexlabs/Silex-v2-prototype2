<?php

class cocktail_core_css_StyleManager {
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.css.StyleManager::new");
		$»spos = $GLOBALS['%s']->length;
		$this->_styleSheets = new _hx_array(array());
		$this->_matchingStyleDeclaration = new _hx_array(array());
		$this->_mostSpecificMatchingProperties = new _hx_array(array());
		$this->_matchingProperties = new _hx_array(array());
		$this->_matchedProperties = new _hx_array(array());
		$this->_userAgentDeclarations = new _hx_array(array());
		$this->_authorNormalDeclarations = new _hx_array(array());
		$this->_authorImportantDeclarations = new _hx_array(array());
		$this->_selectorManager = new cocktail_core_css_SelectorManager();
		$GLOBALS['%s']->pop();
	}}
	public function getSortedMatchingPropertiesBySpecificity($matchingProperties) {
		$GLOBALS['%s']->push("cocktail.core.css.StyleManager::getSortedMatchingPropertiesBySpecificity");
		$»spos = $GLOBALS['%s']->length;
		$this->_mostSpecificMatchingProperties = cocktail_core_utils_Utils::clear($this->_mostSpecificMatchingProperties);
		$currentHigherSpecificity = 0;
		$length = $matchingProperties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				$property = $matchingProperties[$i];
				$propertySpecificity = $this->_selectorManager->getSelectorSpecifity($property->selector);
				if($propertySpecificity > $currentHigherSpecificity) {
					$currentHigherSpecificity = $propertySpecificity;
					$length1 = $this->_mostSpecificMatchingProperties->length;
					{
						$_g1 = 0;
						while($_g1 < $length1) {
							$j = $_g1++;
							cocktail_core_css_PropertyVO::getPool()->release($this->_mostSpecificMatchingProperties[$j]);
							unset($j);
						}
						unset($_g1);
					}
					$this->_mostSpecificMatchingProperties = cocktail_core_utils_Utils::clear($this->_mostSpecificMatchingProperties);
					unset($length1);
				}
				if($propertySpecificity === $currentHigherSpecificity) {
					$this->_mostSpecificMatchingProperties->push($property);
				}
				unset($propertySpecificity,$property,$i);
			}
		}
		{
			$»tmp = $this->_mostSpecificMatchingProperties;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getSortedMatchingPropertiesByPriority($matchingProperties) {
		$GLOBALS['%s']->push("cocktail.core.css.StyleManager::getSortedMatchingPropertiesByPriority");
		$»spos = $GLOBALS['%s']->length;
		$this->_userAgentDeclarations = cocktail_core_utils_Utils::clear($this->_userAgentDeclarations);
		$this->_authorNormalDeclarations = cocktail_core_utils_Utils::clear($this->_authorNormalDeclarations);
		$this->_authorImportantDeclarations = cocktail_core_utils_Utils::clear($this->_authorImportantDeclarations);
		$length = $matchingProperties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				$matchingProperty = $matchingProperties[$i];
				$»t = ($matchingProperty->origin);
				switch($»t->index) {
				case 1:
				{
					$this->_userAgentDeclarations->push($matchingProperty);
				}break;
				case 0:
				{
					if($matchingProperty->important === true) {
						$this->_authorImportantDeclarations->push($matchingProperty);
					} else {
						$this->_authorNormalDeclarations->push($matchingProperty);
					}
				}break;
				}
				unset($matchingProperty,$i);
			}
		}
		if($this->_authorImportantDeclarations->length > 0) {
			$length1 = $this->_authorNormalDeclarations->length;
			{
				$_g = 0;
				while($_g < $length1) {
					$i = $_g++;
					cocktail_core_css_PropertyVO::getPool()->release($this->_authorNormalDeclarations[$i]);
					unset($i);
				}
			}
			$length1 = $this->_userAgentDeclarations->length;
			{
				$_g = 0;
				while($_g < $length1) {
					$i = $_g++;
					cocktail_core_css_PropertyVO::getPool()->release($this->_userAgentDeclarations[$i]);
					unset($i);
				}
			}
			{
				$»tmp = $this->_authorImportantDeclarations;
				$GLOBALS['%s']->pop();
				return $»tmp;
			}
		}
		if($this->_authorNormalDeclarations->length > 0) {
			$length = $this->_userAgentDeclarations->length;
			{
				$_g = 0;
				while($_g < $length) {
					$i = $_g++;
					cocktail_core_css_PropertyVO::getPool()->release($this->_userAgentDeclarations[$i]);
					unset($i);
				}
			}
			{
				$»tmp = $this->_authorNormalDeclarations;
				$GLOBALS['%s']->pop();
				return $»tmp;
			}
		}
		{
			$»tmp = $this->_userAgentDeclarations;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function applyMatchingProperty($property, $matchingStyleDeclarations, $nodeStyleDeclaration) {
		$GLOBALS['%s']->push("cocktail.core.css.StyleManager::applyMatchingProperty");
		$»spos = $GLOBALS['%s']->length;
		$this->_matchingProperties = cocktail_core_utils_Utils::clear($this->_matchingProperties);
		$matchingStyleDeclarationsLength = $matchingStyleDeclarations->length;
		{
			$_g = 0;
			while($_g < $matchingStyleDeclarationsLength) {
				$i = $_g++;
				$styleDeclaration = _hx_array_get($matchingStyleDeclarations, $i)->style;
				$selector = _hx_array_get($matchingStyleDeclarations, $i)->selector;
				$typedProperty = cocktail_core_css_StyleManager_0($this, $_g, $i, $matchingStyleDeclarations, $matchingStyleDeclarationsLength, $nodeStyleDeclaration, $property, $selector, $styleDeclaration);
				if($typedProperty !== null) {
					$matchingProperty = cocktail_core_css_PropertyVO::getPool()->get();
					$matchingProperty->selector = $selector;
					$matchingProperty->typedValue = $typedProperty->typedValue;
					$matchingProperty->origin = $styleDeclaration->parentRule->parentStyleSheet->origin;
					$matchingProperty->important = $typedProperty->important;
					$this->_matchingProperties->push($matchingProperty);
					unset($matchingProperty);
				}
				unset($typedProperty,$styleDeclaration,$selector,$i);
			}
		}
		if($this->_matchingProperties->length === 1) {
			$matchingProperty = $this->_matchingProperties[0];
			$nodeStyleDeclaration->setTypedProperty($property, $matchingProperty->typedValue, $matchingProperty->important);
			cocktail_core_css_PropertyVO::getPool()->release($matchingProperty);
			{
				$GLOBALS['%s']->pop();
				return;
			}
		}
		$tempMatchingProperties = $this->getSortedMatchingPropertiesByPriority($this->_matchingProperties);
		if($tempMatchingProperties->length === 1) {
			$matchingProperty = $tempMatchingProperties[0];
			$nodeStyleDeclaration->setTypedProperty($property, $matchingProperty->typedValue, $matchingProperty->important);
			cocktail_core_css_PropertyVO::getPool()->release($matchingProperty);
			{
				$GLOBALS['%s']->pop();
				return;
			}
		}
		$tempMatchingProperties = $this->getSortedMatchingPropertiesBySpecificity($tempMatchingProperties);
		if($tempMatchingProperties->length === 1) {
			$matchingProperty = $tempMatchingProperties[0];
			$nodeStyleDeclaration->setTypedProperty($property, $matchingProperty->typedValue, $matchingProperty->important);
			cocktail_core_css_PropertyVO::getPool()->release($matchingProperty);
			{
				$GLOBALS['%s']->pop();
				return;
			}
		}
		$matchingProperty = $tempMatchingProperties[$tempMatchingProperties->length - 1];
		$nodeStyleDeclaration->setTypedProperty($property, $matchingProperty->typedValue, $matchingProperty->important);
		{
			$_g1 = 0; $_g = $tempMatchingProperties->length;
			while($_g1 < $_g) {
				$i = $_g1++;
				cocktail_core_css_PropertyVO::getPool()->release($tempMatchingProperties[$i]);
				unset($i);
			}
		}
		$GLOBALS['%s']->pop();
	}
	public function getMatchingStyleDeclarations($node, $styleSheets, $matchedPseudoClasses) {
		$GLOBALS['%s']->push("cocktail.core.css.StyleManager::getMatchingStyleDeclarations");
		$»spos = $GLOBALS['%s']->length;
		$length = $this->_matchingStyleDeclaration->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				cocktail_core_css_StyleDeclarationVO::getPool()->release($this->_matchingStyleDeclaration[$i]);
				unset($i);
			}
		}
		$this->_matchingStyleDeclaration = cocktail_core_utils_Utils::clear($this->_matchingStyleDeclaration);
		$styleSheetsLength = $styleSheets->length;
		{
			$_g = 0;
			while($_g < $styleSheetsLength) {
				$i = $_g++;
				$styleSheet = $styleSheets[$i];
				$cssRules = $styleSheet->cssRules;
				$cssRulesLength = $cssRules->length;
				{
					$_g1 = 0;
					while($_g1 < $cssRulesLength) {
						$j = $_g1++;
						$cssRule = $cssRules[$j];
						switch($cssRule->get_type()) {
						case 1:{
							$styleRule = $cssRule;
							$selectors = $styleRule->selectors;
							$selectorsLength = $selectors->length;
							{
								$_g2 = 0;
								while($_g2 < $selectorsLength) {
									$k = $_g2++;
									if($this->_selectorManager->matchSelector($node, $selectors[$k], $matchedPseudoClasses) === true) {
										$matchingStyleDeclaration = cocktail_core_css_StyleDeclarationVO::getPool()->get();
										$matchingStyleDeclaration->style = $styleRule->style;
										$matchingStyleDeclaration->selector = $selectors[$k];
										$this->_matchingStyleDeclaration->push($matchingStyleDeclaration);
										break;
										unset($matchingStyleDeclaration);
									}
									unset($k);
								}
							}
						}break;
						default:{
						}break;
						}
						unset($j,$cssRule);
					}
					unset($_g1);
				}
				unset($styleSheet,$i,$cssRulesLength,$cssRules);
			}
		}
		{
			$»tmp = $this->_matchingStyleDeclaration;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function alreadyMatched($property, $matchedProperties) {
		$GLOBALS['%s']->push("cocktail.core.css.StyleManager::alreadyMatched");
		$»spos = $GLOBALS['%s']->length;
		$length = $matchedProperties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if($matchedProperties[$i] === $property) {
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
	public function applyStyleSheets($node, $nodeStyleDeclaration, $styleSheets, $matchedPseudoClasses) {
		$GLOBALS['%s']->push("cocktail.core.css.StyleManager::applyStyleSheets");
		$»spos = $GLOBALS['%s']->length;
		$matchingStyleDeclarations = $this->getMatchingStyleDeclarations($node, $styleSheets, $matchedPseudoClasses);
		$this->_matchedProperties = cocktail_core_utils_Utils::clear($this->_matchedProperties);
		$length = $matchingStyleDeclarations->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				$cssStyleDeclaration = _hx_array_get($matchingStyleDeclarations, $i)->style;
				$styleLength = $cssStyleDeclaration->get_length();
				{
					$_g1 = 0;
					while($_g1 < $styleLength) {
						$j = $_g1++;
						$property = $cssStyleDeclaration->item($j);
						if($this->alreadyMatched($property, $this->_matchedProperties) === false) {
							$this->applyMatchingProperty($property, $matchingStyleDeclarations, $nodeStyleDeclaration);
							$this->_matchedProperties->push($property);
						}
						unset($property,$j);
					}
					unset($_g1);
				}
				unset($styleLength,$i,$cssStyleDeclaration);
			}
		}
		$GLOBALS['%s']->pop();
	}
	public function getStyleDeclaration($node, $matchedPseudoClasses) {
		$GLOBALS['%s']->push("cocktail.core.css.StyleManager::getStyleDeclaration");
		$»spos = $GLOBALS['%s']->length;
		$styleDeclaration = null;
		if($node->styleManagerCSSDeclaration !== null) {
			$styleDeclaration = $node->styleManagerCSSDeclaration;
			$styleDeclaration->reset();
		} else {
			$styleDeclaration = new cocktail_core_css_CSSStyleDeclaration(null, null);
		}
		$this->applyStyleSheets($node, $styleDeclaration, $this->_styleSheets, $matchedPseudoClasses);
		{
			$GLOBALS['%s']->pop();
			return $styleDeclaration;
		}
		$GLOBALS['%s']->pop();
	}
	public function removeStyleSheet($styleSheet) {
		$GLOBALS['%s']->push("cocktail.core.css.StyleManager::removeStyleSheet");
		$»spos = $GLOBALS['%s']->length;
		$this->_styleSheets->remove($styleSheet);
		$GLOBALS['%s']->pop();
	}
	public function addStyleSheet($styleSheet) {
		$GLOBALS['%s']->push("cocktail.core.css.StyleManager::addStyleSheet");
		$»spos = $GLOBALS['%s']->length;
		$this->_styleSheets->push($styleSheet);
		$GLOBALS['%s']->pop();
	}
	public $_authorImportantDeclarations;
	public $_authorNormalDeclarations;
	public $_userAgentDeclarations;
	public $_mostSpecificMatchingProperties;
	public $_matchingProperties;
	public $_matchingStyleDeclaration;
	public $_matchedProperties;
	public $_selectorManager;
	public $_styleSheets;
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
	function __toString() { return 'cocktail.core.css.StyleManager'; }
}
function cocktail_core_css_StyleManager_0(&$»this, &$_g, &$i, &$matchingStyleDeclarations, &$matchingStyleDeclarationsLength, &$nodeStyleDeclaration, &$property, &$selector, &$styleDeclaration) {
	$»spos = $GLOBALS['%s']->length;
	{
		$typedProperty = null;
		$length = $styleDeclaration->_properties->length;
		{
			$_g1 = 0;
			while($_g1 < $length) {
				$i1 = $_g1++;
				if(_hx_array_get($styleDeclaration->_properties, $i1)->name === $property) {
					$typedProperty = $styleDeclaration->_properties[$i1];
				}
				unset($i1);
			}
		}
		return $typedProperty;
	}
}

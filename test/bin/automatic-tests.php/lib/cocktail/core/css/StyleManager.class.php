<?php

class cocktail_core_css_StyleManager {
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		$this->_styleSheets = new _hx_array(array());
		$this->_selectorManager = new cocktail_core_css_SelectorManager();
	}}
	public function getSortedMatchingPropertiesBySpecificity($matchingProperties) {
		$mostSpecificMatchingProperties = new _hx_array(array());
		$currentHigherSpecificity = 0;
		{
			$_g1 = 0; $_g = $matchingProperties->length;
			while($_g1 < $_g) {
				$i = $_g1++;
				$property = $matchingProperties[$i];
				$propertySpecificity = $this->_selectorManager->getSelectorSpecifity($property->selector);
				if($propertySpecificity > $currentHigherSpecificity) {
					$currentHigherSpecificity = $propertySpecificity;
					$mostSpecificMatchingProperties = new _hx_array(array());
				}
				if($propertySpecificity === $currentHigherSpecificity) {
					$mostSpecificMatchingProperties->push($property);
				}
				unset($propertySpecificity,$property,$i);
			}
		}
		return $mostSpecificMatchingProperties;
	}
	public function getSortedMatchingPropertiesByPriority($matchingProperties) {
		$userAgentDeclarations = new _hx_array(array());
		$authorNormalDeclarations = new _hx_array(array());
		$authorImportantDeclarations = new _hx_array(array());
		{
			$_g1 = 0; $_g = $matchingProperties->length;
			while($_g1 < $_g) {
				$i = $_g1++;
				$matchingProperty = $matchingProperties[$i];
				$»t = ($matchingProperty->origin);
				switch($»t->index) {
				case 1:
				{
					$userAgentDeclarations->push($matchingProperty);
				}break;
				case 0:
				{
					if($matchingProperty->important === true) {
						$authorImportantDeclarations->push($matchingProperty);
					} else {
						$authorNormalDeclarations->push($matchingProperty);
					}
				}break;
				}
				unset($matchingProperty,$i);
			}
		}
		if($authorImportantDeclarations->length > 0) {
			return $authorImportantDeclarations;
		}
		if($authorNormalDeclarations->length > 0) {
			return $authorNormalDeclarations;
		}
		return $userAgentDeclarations;
	}
	public function applyMatchingProperty($property, $matchingStyleDeclarations, $nodeStyleDeclaration) {
		$matchingProperties = new _hx_array(array());
		$matchingStyleDeclarationsLength = $matchingStyleDeclarations->length;
		{
			$_g = 0;
			while($_g < $matchingStyleDeclarationsLength) {
				$i = $_g++;
				$styleDeclaration = _hx_array_get($matchingStyleDeclarations, $i)->style;
				$selector = _hx_array_get($matchingStyleDeclarations, $i)->selector;
				$typedProperty = $styleDeclaration->getTypedProperty($property);
				if($typedProperty !== null) {
					$matchingProperty = new cocktail_core_css_PropertyVO($selector, $typedProperty->typedValue, $styleDeclaration->parentRule->parentStyleSheet->origin, $typedProperty->important);
					$matchingProperties->push($matchingProperty);
					unset($matchingProperty);
				}
				unset($typedProperty,$styleDeclaration,$selector,$i);
			}
		}
		if($matchingProperties->length === 1) {
			$matchingProperty = $matchingProperties[0];
			$nodeStyleDeclaration->setTypedProperty($property, $matchingProperty->typedValue, $matchingProperty->important);
			return;
		}
		$matchingProperties = $this->getSortedMatchingPropertiesByPriority($matchingProperties);
		if($matchingProperties->length === 1) {
			$matchingProperty = $matchingProperties[0];
			$nodeStyleDeclaration->setTypedProperty($property, $matchingProperty->typedValue, $matchingProperty->important);
			return;
		}
		$matchingProperties = $this->getSortedMatchingPropertiesBySpecificity($matchingProperties);
		if($matchingProperties->length === 1) {
			$matchingProperty = $matchingProperties[0];
			$nodeStyleDeclaration->setTypedProperty($property, $matchingProperty->typedValue, $matchingProperty->important);
			return;
		}
		$matchingProperty = $matchingProperties[$matchingProperties->length - 1];
		$nodeStyleDeclaration->setTypedProperty($property, $matchingProperty->typedValue, $matchingProperty->important);
	}
	public function getMatchingStyleDeclarations($node, $styleSheets, $matchedPseudoClasses) {
		$matchingStyleDeclarations = new _hx_array(array());
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
										$matchingStyleDeclaration = new cocktail_core_css_StyleDeclarationVO($styleRule->style, $selectors[$k]);
										$matchingStyleDeclarations->push($matchingStyleDeclaration);
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
		return $matchingStyleDeclarations;
	}
	public function applyStyleSheets($node, $nodeStyleDeclaration, $styleSheets, $matchedPseudoClasses) {
		$matchingStyleDeclarations = $this->getMatchingStyleDeclarations($node, $styleSheets, $matchedPseudoClasses);
		$matchedProperties = new Hash();
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
						if($matchedProperties->exists($property) === false) {
							$this->applyMatchingProperty($property, $matchingStyleDeclarations, $nodeStyleDeclaration);
							$matchedProperties->set($property, null);
						}
						unset($property,$j);
					}
					unset($_g1);
				}
				unset($styleLength,$i,$cssStyleDeclaration);
			}
		}
	}
	public function getStyleDeclaration($node, $matchedPseudoClasses) {
		$styleDeclaration = new cocktail_core_css_CSSStyleDeclaration(null, null);
		$this->applyStyleSheets($node, $styleDeclaration, $this->_styleSheets, $matchedPseudoClasses);
		return $styleDeclaration;
	}
	public function removeStyleSheet($styleSheet) {
		$this->_styleSheets->remove($styleSheet);
	}
	public function addStyleSheet($styleSheet) {
		$this->_styleSheets->push($styleSheet);
	}
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

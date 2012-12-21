<?php

class cocktail_core_layout_formatter_InlineFormattingContext extends cocktail_core_layout_formatter_FormattingContext {
	public function __construct($floatsManager) {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.layout.formatter.InlineFormattingContext::new");
		$»spos = $GLOBALS['%s']->length;
		parent::__construct($floatsManager);
		$this->_lineBoxesAsArray = new _hx_array(array());
		$this->_unbreakableLineBoxes = new _hx_array(array());
		$this->_openedElementRenderers = new _hx_array(array());
		$GLOBALS['%s']->pop();
	}}
	public function alignLineBoxesVertically($lineBox, $lineBoxAscent, $formattingContextY, $parentBaseLineOffset, $formattingContextFontMetrics) {
		$GLOBALS['%s']->push("cocktail.core.layout.formatter.InlineFormattingContext::alignLineBoxesVertically");
		$»spos = $GLOBALS['%s']->length;
		$child = $lineBox->firstChild;
		while($child !== null) {
			$baselineOffset = $child->getBaselineOffset($parentBaseLineOffset, $formattingContextFontMetrics->xHeight);
			$childCoreStyle = $child->elementRenderer->coreStyle;
			$»t = ($childCoreStyle->getKeyword(_hx_deref((cocktail_core_layout_formatter_InlineFormattingContext_0($this, $baselineOffset, $child, $childCoreStyle, $formattingContextFontMetrics, $formattingContextY, $lineBox, $lineBoxAscent, $parentBaseLineOffset)))->typedValue));
			switch($»t->index) {
			case 22:
			{
				$child->get_bounds()->y = $formattingContextY;
			}break;
			default:{
				$child->get_bounds()->y = $formattingContextY - $baselineOffset;
				if($child->firstChild !== null) {
					$child->get_bounds()->y += $lineBoxAscent;
					$child->get_bounds()->y -= $child->leadedAscent;
				}
			}break;
			}
			if($child->firstChild !== null) {
				$this->alignLineBoxesVertically($child, $lineBoxAscent, $formattingContextY, $baselineOffset, $formattingContextFontMetrics);
			} else {
				if($child->isStaticPosition() === true || $child->elementRenderer->isReplaced() === true || $child->elementRenderer->establishesNewFormattingContext() === true) {
					$child->get_bounds()->y += $child->elementRenderer->coreStyle->usedValues->marginTop;
				}
			}
			$child = $child->nextSibling;
			unset($childCoreStyle,$baselineOffset);
		}
		$GLOBALS['%s']->pop();
	}
	public function setRootLineBoxMetrics($lineBox, $rootLineBox, $parentBaseLineOffset, $formattingContextFontMetrics) {
		$GLOBALS['%s']->push("cocktail.core.layout.formatter.InlineFormattingContext::setRootLineBoxMetrics");
		$»spos = $GLOBALS['%s']->length;
		$child = $lineBox->firstChild;
		while($child !== null) {
			if($child->isStaticPosition() === false) {
				$leadedAscent = $child->leadedAscent;
				$leadedDescent = $child->leadedDescent;
				$baselineOffset = $child->getBaselineOffset($parentBaseLineOffset, $formattingContextFontMetrics->xHeight);
				if($leadedAscent + $baselineOffset > $rootLineBox->leadedAscent) {
					$rootLineBox->leadedAscent = $leadedAscent + $baselineOffset;
				}
				if($leadedDescent + $baselineOffset > $rootLineBox->leadedDescent) {
					$rootLineBox->leadedDescent = $leadedDescent + $baselineOffset;
				}
				if($child->firstChild !== null) {
					$this->setRootLineBoxMetrics($child, $rootLineBox, $baselineOffset, $formattingContextFontMetrics);
				}
				unset($leadedDescent,$leadedAscent,$baselineOffset);
			}
			$child = $child->nextSibling;
		}
		$GLOBALS['%s']->pop();
	}
	public function computeLineBoxHeight($rootLineBox) {
		$GLOBALS['%s']->push("cocktail.core.layout.formatter.InlineFormattingContext::computeLineBoxHeight");
		$»spos = $GLOBALS['%s']->length;
		$formattingContextFontMetrics = $this->_formattingContextRoot->coreStyle->fontMetrics;
		$this->setRootLineBoxMetrics($rootLineBox, $rootLineBox, 0.0, $formattingContextFontMetrics);
		$this->alignLineBoxesVertically($rootLineBox, $rootLineBox->leadedAscent, $this->_formattingContextData->y, 0.0, $formattingContextFontMetrics);
		$lineBoxHeight = $rootLineBox->get_bounds()->height;
		{
			$GLOBALS['%s']->pop();
			return $lineBoxHeight;
		}
		$GLOBALS['%s']->pop();
	}
	public function getLineBoxTreeAsArray($rootLineBox, $lineBoxes) {
		$GLOBALS['%s']->push("cocktail.core.layout.formatter.InlineFormattingContext::getLineBoxTreeAsArray");
		$»spos = $GLOBALS['%s']->length;
		$child = $rootLineBox->firstChild;
		while($child !== null) {
			if($child->firstChild !== null && $child->isStaticPosition() === false) {
				$this->getLineBoxTreeAsArray($child, $lineBoxes);
			} else {
				$lineBoxes->push($child);
			}
			$child = $child->nextSibling;
		}
		$GLOBALS['%s']->pop();
	}
	public function removeSpaces($rootLineBox) {
		$GLOBALS['%s']->push("cocktail.core.layout.formatter.InlineFormattingContext::removeSpaces");
		$»spos = $GLOBALS['%s']->length;
		$this->_lineBoxesAsArray = cocktail_core_utils_Utils::clear($this->_lineBoxesAsArray);
		$this->getLineBoxTreeAsArray($rootLineBox, $this->_lineBoxesAsArray);
		if($this->_lineBoxesAsArray->length === 0) {
			$GLOBALS['%s']->pop();
			return;
		}
		$i = 0;
		$length = $this->_lineBoxesAsArray->length;
		while($i < $length) {
			$lineBox = $this->_lineBoxesAsArray[$i];
			if($lineBox->isSpace() === true) {
				$coreStyle = $lineBox->elementRenderer->coreStyle;
				$»t = ($coreStyle->getKeyword(_hx_deref((cocktail_core_layout_formatter_InlineFormattingContext_1($this, $coreStyle, $i, $length, $lineBox, $rootLineBox)))->typedValue));
				switch($»t->index) {
				case 0:
				case 8:
				case 10:
				{
					$lineBox->parentNode->removeChild($lineBox);
				}break;
				default:{
					break 2;
				}break;
				}
				unset($coreStyle);
			} else {
				if($lineBox->isStaticPosition() === false) {
					if($lineBox->isEmbedded() === true) {
						break;
					} else {
						$child = $lineBox->firstChild;
						while($child !== null) {
							if($child->isSpace() === false) {
								break;
							}
							$child = $child->nextSibling;
						}
						unset($child);
					}
				}
			}
			$i++;
			unset($lineBox);
		}
		$this->_lineBoxesAsArray = cocktail_core_utils_Utils::clear($this->_lineBoxesAsArray);
		$this->getLineBoxTreeAsArray($rootLineBox, $this->_lineBoxesAsArray);
		if($this->_lineBoxesAsArray->length === 0) {
			$GLOBALS['%s']->pop();
			return;
		}
		$i1 = $this->_lineBoxesAsArray->length - 1;
		while($i1 >= 0) {
			$lineBox = $this->_lineBoxesAsArray[$i1];
			if($lineBox->isSpace() === true) {
				$coreStyle = $lineBox->elementRenderer->coreStyle;
				$»t = ($coreStyle->getKeyword(_hx_deref((cocktail_core_layout_formatter_InlineFormattingContext_2($this, $coreStyle, $i, $i1, $length, $lineBox, $rootLineBox)))->typedValue));
				switch($»t->index) {
				case 0:
				case 8:
				case 10:
				{
					$lineBox->parentNode->removeChild($lineBox);
				}break;
				default:{
					break 2;
				}break;
				}
				unset($coreStyle);
			} else {
				if($lineBox->isStaticPosition() === false) {
					break;
				}
			}
			$i1--;
			unset($lineBox);
		}
		$GLOBALS['%s']->pop();
	}
	public function alignJustify($flowX, $remainingSpace, $lineBox, $spacesInLine) {
		$GLOBALS['%s']->push("cocktail.core.layout.formatter.InlineFormattingContext::alignJustify");
		$»spos = $GLOBALS['%s']->length;
		$child = $lineBox->firstChild;
		while($child !== null) {
			if($child->isSpace() === true) {
				$spaceWidth = $remainingSpace / $spacesInLine;
				$spacesInLine--;
				$remainingSpace -= $spaceWidth;
				$flowX += $spaceWidth;
				unset($spaceWidth);
			}
			$child->get_bounds()->x = $flowX;
			$flowX += $child->get_bounds()->width;
			if($child->firstChild !== null) {
				$this->alignJustify($flowX, $remainingSpace, $child, $spacesInLine);
			}
			$child = $child->nextSibling;
		}
		$GLOBALS['%s']->pop();
	}
	public function alignRight($flowX, $remainingSpace, $lineBox) {
		$GLOBALS['%s']->push("cocktail.core.layout.formatter.InlineFormattingContext::alignRight");
		$»spos = $GLOBALS['%s']->length;
		$flowX += $lineBox->marginLeft + $lineBox->paddingLeft;
		$child = $lineBox->firstChild;
		while($child !== null) {
			if($child->firstChild !== null) {
				$flowX = $this->alignRight($flowX, $remainingSpace, $child);
			}
			$child->get_bounds()->x = $flowX + $remainingSpace;
			$flowX += $child->get_bounds()->width;
			$child = $child->nextSibling;
		}
		$flowX += $lineBox->marginRight + $lineBox->paddingRight;
		{
			$GLOBALS['%s']->pop();
			return $flowX;
		}
		$GLOBALS['%s']->pop();
	}
	public function alignCenter($flowX, $remainingSpace, $lineBox) {
		$GLOBALS['%s']->push("cocktail.core.layout.formatter.InlineFormattingContext::alignCenter");
		$»spos = $GLOBALS['%s']->length;
		$flowX += $lineBox->marginLeft + $lineBox->paddingLeft;
		$child = $lineBox->firstChild;
		while($child !== null) {
			if($child->firstChild !== null) {
				$flowX = $this->alignCenter($flowX, $remainingSpace, $child);
			}
			$child->get_bounds()->x = $remainingSpace / 2 + $flowX;
			$flowX += $child->get_bounds()->width;
			$child = $child->nextSibling;
		}
		$flowX += $lineBox->marginRight + $lineBox->paddingRight;
		{
			$GLOBALS['%s']->pop();
			return $flowX;
		}
		$GLOBALS['%s']->pop();
	}
	public function alignLeft($flowX, $lineBox) {
		$GLOBALS['%s']->push("cocktail.core.layout.formatter.InlineFormattingContext::alignLeft");
		$»spos = $GLOBALS['%s']->length;
		$flowX += $lineBox->paddingLeft + $lineBox->marginLeft;
		$child = $lineBox->firstChild;
		while($child !== null) {
			if($child->firstChild !== null && $child->isStaticPosition() === false) {
				$flowX = $this->alignLeft($flowX, $child);
			} else {
				$child->get_bounds()->x = $flowX + $child->marginLeft;
				if($child->isStaticPosition() === false) {
					$flowX += $child->get_bounds()->width + $child->marginLeft + $child->marginRight;
				}
			}
			$child = $child->nextSibling;
		}
		$flowX += $lineBox->paddingRight + $lineBox->marginRight;
		{
			$GLOBALS['%s']->pop();
			return $flowX;
		}
		$GLOBALS['%s']->pop();
	}
	public function alignLineBox($rootLineBox, $isLastLine, $concatenatedLength) {
		$GLOBALS['%s']->push("cocktail.core.layout.formatter.InlineFormattingContext::alignLineBox");
		$»spos = $GLOBALS['%s']->length;
		$remainingSpace = null;
		$flowX = null;
		$formattingContextRootUsedValues = $this->_formattingContextRoot->coreStyle->usedValues;
		$remainingSpace = $formattingContextRootUsedValues->width - $concatenatedLength - $this->_floatsManager->getLeftFloatOffset($this->_formattingContextData->y) - $this->_floatsManager->getRightFloatOffset($this->_formattingContextData->y + $this->_formattingContextRoot->get_bounds()->y, $formattingContextRootUsedValues->width);
		$flowX = $formattingContextRootUsedValues->paddingLeft;
		if($this->_firstLineFormatted === false) {
			$flowX += $formattingContextRootUsedValues->textIndent;
			$remainingSpace -= $formattingContextRootUsedValues->textIndent;
		}
		$flowX += $this->_floatsManager->getLeftFloatOffset($this->_formattingContextData->y + $this->_formattingContextRoot->get_bounds()->y);
		$»t = ($this->_formattingContextRoot->coreStyle->getKeyword(_hx_deref((cocktail_core_layout_formatter_InlineFormattingContext_3($this, $concatenatedLength, $flowX, $formattingContextRootUsedValues, $isLastLine, $remainingSpace, $rootLineBox)))->typedValue));
		switch($»t->index) {
		case 11:
		{
			$this->alignLeft($flowX, $rootLineBox);
		}break;
		case 12:
		{
			$this->alignRight($flowX, $remainingSpace, $rootLineBox);
		}break;
		case 13:
		{
			$this->alignCenter($flowX, $remainingSpace, $rootLineBox);
		}break;
		case 14:
		{
			if($isLastLine === true) {
				$this->alignLeft($flowX, $rootLineBox);
			} else {
				$concatenatedLength = $formattingContextRootUsedValues->width;
				$this->alignJustify($flowX, $remainingSpace, $rootLineBox, $this->getSpacesNumber($rootLineBox));
			}
		}break;
		default:{
			throw new HException("Illegal value for text-align style");
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return $concatenatedLength;
		}
		$GLOBALS['%s']->pop();
	}
	public function getRemainingLineWidth() {
		$GLOBALS['%s']->push("cocktail.core.layout.formatter.InlineFormattingContext::getRemainingLineWidth");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->_formattingContextRoot->coreStyle->usedValues->width - $this->_formattingContextData->x - $this->_floatsManager->getRightFloatOffset($this->_formattingContextData->y + $this->_formattingContextRoot->get_bounds()->y, $this->_formattingContextRoot->coreStyle->usedValues->width);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getSpacesNumber($lineBox) {
		$GLOBALS['%s']->push("cocktail.core.layout.formatter.InlineFormattingContext::getSpacesNumber");
		$»spos = $GLOBALS['%s']->length;
		$spacesNumber = 0;
		$child = $lineBox->firstChild;
		while($child !== null) {
			if($child->firstChild !== null) {
				$spacesNumber += $this->getSpacesNumber($child);
			}
			if($child->isSpace() === true) {
				$spacesNumber++;
			}
			$child = $child->nextSibling;
		}
		{
			$GLOBALS['%s']->pop();
			return $spacesNumber;
		}
		$GLOBALS['%s']->pop();
	}
	public function getConcatenatedWidth($lineBox) {
		$GLOBALS['%s']->push("cocktail.core.layout.formatter.InlineFormattingContext::getConcatenatedWidth");
		$»spos = $GLOBALS['%s']->length;
		$concatenatedWidth = 0.0;
		$child = $lineBox->firstChild;
		while($child !== null) {
			if($child->isStaticPosition() === false) {
				if($child->firstChild !== null) {
					$concatenatedWidth += $this->getConcatenatedWidth($child);
				}
				$concatenatedWidth += $child->get_bounds()->width;
			}
			$child = $child->nextSibling;
		}
		{
			$GLOBALS['%s']->pop();
			return $concatenatedWidth;
		}
		$GLOBALS['%s']->pop();
	}
	public function formatLine($rootLineBox, $isLastLine) {
		$GLOBALS['%s']->push("cocktail.core.layout.formatter.InlineFormattingContext::formatLine");
		$»spos = $GLOBALS['%s']->length;
		if($rootLineBox->firstChild !== null) {
			$this->removeSpaces($rootLineBox);
		}
		$lineBoxWidth = $this->alignLineBox($rootLineBox, $isLastLine, $this->getConcatenatedWidth($rootLineBox));
		if($lineBoxWidth > $this->_formattingContextData->width) {
			$this->_formattingContextData->width = $lineBoxWidth;
		}
		$lineBoxHeight = $this->computeLineBoxHeight($rootLineBox);
		$this->_formattingContextData->y += $lineBoxHeight;
		$this->_firstLineFormatted = true;
		$GLOBALS['%s']->pop();
	}
	public function insertIntoLine($childLineBox, $lineBox, $openedElementRenderers) {
		$GLOBALS['%s']->push("cocktail.core.layout.formatter.InlineFormattingContext::insertIntoLine");
		$»spos = $GLOBALS['%s']->length;
		$this->_unbreakableLineBoxes->push($childLineBox);
		if($childLineBox->isStaticPosition() === false) {
			$this->_unbreakableWidth += $childLineBox->get_bounds()->width + $childLineBox->marginLeft + $childLineBox->marginRight;
		}
		$remainingLineWidth = $this->getRemainingLineWidth();
		if($remainingLineWidth - $this->_unbreakableWidth < 0) {
			$this->_formattingContextData->y = $this->_floatsManager->getFirstAvailableY($this->_formattingContextData->y + $this->_formattingContextRoot->get_bounds()->y, $this->_unbreakableWidth, $this->_formattingContextRoot->coreStyle->usedValues->width);
			$this->_formattingContextData->y -= $this->_formattingContextRoot->get_bounds()->y;
			$this->_formattingContextData->x = $this->_floatsManager->getLeftFloatOffset($this->_formattingContextData->y + $this->_formattingContextRoot->get_bounds()->y);
			$this->formatLine($this->_formattingContextRoot->getLastRootLineBox(), false);
			$rootLineBox = $this->_formattingContextRoot->getRootLineBox();
			$lineBox = $rootLineBox;
			$length = $openedElementRenderers->length;
			{
				$_g = 0;
				while($_g < $length) {
					$j = $_g++;
					$childLineBox1 = $this->createContainerLineBox($openedElementRenderers[$j]);
					$lineBox->appendChild($childLineBox1);
					$lineBox = $childLineBox1;
					unset($j,$childLineBox1);
				}
			}
		}
		$unbreakableLength = $this->_unbreakableLineBoxes->length;
		{
			$_g = 0;
			while($_g < $unbreakableLength) {
				$j = $_g++;
				$lineBox->appendChild($this->_unbreakableLineBoxes[$j]);
				unset($j);
			}
		}
		$this->_formattingContextData->x += $this->_unbreakableWidth;
		$this->_unbreakableLineBoxes = cocktail_core_utils_Utils::clear($this->_unbreakableLineBoxes);
		$this->_unbreakableWidth = 0;
		{
			$GLOBALS['%s']->pop();
			return $lineBox;
		}
		$GLOBALS['%s']->pop();
	}
	public function createContainerLineBox($child) {
		$GLOBALS['%s']->push("cocktail.core.layout.formatter.InlineFormattingContext::createContainerLineBox");
		$»spos = $GLOBALS['%s']->length;
		$lineBox = new cocktail_core_linebox_LineBox($child);
		$child->lineBoxes->push($lineBox);
		{
			$GLOBALS['%s']->pop();
			return $lineBox;
		}
		$GLOBALS['%s']->pop();
	}
	public function doFormat($elementRenderer, $lineBox, $openedElementRenderers) {
		$GLOBALS['%s']->push("cocktail.core.layout.formatter.InlineFormattingContext::doFormat");
		$»spos = $GLOBALS['%s']->length;
		$child = $elementRenderer->firstChild;
		while($child !== null) {
			if($child->isPositioned() === true && $child->isRelativePositioned() === false) {
				$staticLineBox = $child->lineBoxes[0];
				$child->get_bounds()->x = 0;
				$child->get_bounds()->y = 0;
				$child->get_bounds()->width = $child->coreStyle->usedValues->width + $child->coreStyle->usedValues->paddingLeft + $child->coreStyle->usedValues->paddingRight;
				$child->get_bounds()->height = $child->coreStyle->usedValues->height + $child->coreStyle->usedValues->paddingTop + $child->coreStyle->usedValues->paddingBottom;
				$staticLineBox->marginLeft = $child->coreStyle->usedValues->marginLeft;
				$staticLineBox->marginRight = $child->coreStyle->usedValues->marginRight;
				$lineBox = $this->insertIntoLine($staticLineBox, $lineBox, $openedElementRenderers);
				unset($staticLineBox);
			} else {
				if($child->establishesNewFormattingContext() === true || $child->isReplaced() === true) {
					$childUsedValues = $child->coreStyle->usedValues;
					$childBounds = $child->get_bounds();
					$child->get_bounds()->x = 0;
					$child->get_bounds()->y = 0;
					$childBounds->width = $childUsedValues->width + $childUsedValues->paddingLeft + $childUsedValues->paddingRight;
					$childBounds->height = $childUsedValues->height + $childUsedValues->paddingTop + $childUsedValues->paddingBottom;
					$embeddedLineBox = $child->lineBoxes[0];
					$embeddedLineBox->marginLeft = $childUsedValues->marginLeft;
					$embeddedLineBox->marginRight = $childUsedValues->marginRight;
					$lineBox = $this->insertIntoLine($embeddedLineBox, $lineBox, $openedElementRenderers);
					unset($embeddedLineBox,$childUsedValues,$childBounds);
				} else {
					if($child->firstChild !== null) {
						if($child->lineBoxes->length > 0) {
							$child->lineBoxes = new _hx_array(array());
						}
						$childLineBox = $this->createContainerLineBox($child);
						$childUsedValues = $child->coreStyle->usedValues;
						$childLineBox->marginLeft = $childUsedValues->marginLeft;
						$childLineBox->paddingLeft = $childUsedValues->paddingLeft;
						$this->_unbreakableWidth += $childUsedValues->marginLeft + $childUsedValues->paddingLeft;
						$lineBox->appendChild($childLineBox);
						$openedElementRenderers->push($child);
						$lineBox = $this->doFormat($child, $childLineBox, $openedElementRenderers);
						$openedElementRenderers->pop();
						$lineBox = $lineBox->parentNode;
						$lastLineBox = $child->lineBoxes[$child->lineBoxes->length - 1];
						$lastLineBox->marginRight = $childUsedValues->marginRight;
						$lastLineBox->paddingRight = $childUsedValues->paddingRight;
						$this->_unbreakableWidth += $childUsedValues->marginRight + $childUsedValues->paddingRight;
						unset($lastLineBox,$childUsedValues,$childLineBox);
					} else {
						$textLength = $child->lineBoxes->length;
						{
							$_g = 0;
							while($_g < $textLength) {
								$j = $_g++;
								$lineBox = $this->insertIntoLine($child->lineBoxes[$j], $lineBox, $openedElementRenderers);
								unset($j);
							}
							unset($_g);
						}
						unset($textLength);
					}
				}
			}
			$child = $child->nextSibling;
		}
		{
			$GLOBALS['%s']->pop();
			return $lineBox;
		}
		$GLOBALS['%s']->pop();
	}
	public function startFormatting() {
		$GLOBALS['%s']->push("cocktail.core.layout.formatter.InlineFormattingContext::startFormatting");
		$»spos = $GLOBALS['%s']->length;
		$this->_unbreakableLineBoxes = cocktail_core_utils_Utils::clear($this->_unbreakableLineBoxes);
		$this->_openedElementRenderers = cocktail_core_utils_Utils::clear($this->_openedElementRenderers);
		$this->_unbreakableWidth = 0.0;
		$this->_firstLineFormatted = false;
		$this->_formattingContextRoot->resetRootLineBoxes();
		$initialRootLineBox = $this->_formattingContextRoot->getRootLineBox();
		$this->_firstLineFormatted = false;
		$this->_unbreakableWidth = $this->_formattingContextRoot->coreStyle->usedValues->textIndent;
		$this->_formattingContextData->x = $this->_formattingContextRoot->coreStyle->usedValues->textIndent;
		$this->_formattingContextData->x += $this->_floatsManager->getLeftFloatOffset($this->_formattingContextRoot->get_bounds()->y);
		$this->doFormat($this->_formattingContextRoot, $initialRootLineBox, $this->_openedElementRenderers);
		$this->formatLine($this->_formattingContextRoot->getLastRootLineBox(), true);
		$formattingContextCoreStyle = $this->_formattingContextRoot->coreStyle;
		if($formattingContextCoreStyle->isAuto(cocktail_core_layout_formatter_InlineFormattingContext_4($this, $formattingContextCoreStyle, $initialRootLineBox)) === true) {
			$formattingContextUsedValues = $this->_formattingContextRoot->coreStyle->usedValues;
			$this->_formattingContextRoot->get_bounds()->height = $this->_formattingContextData->y + $formattingContextUsedValues->paddingBottom;
			$formattingContextUsedValues->height = $this->_formattingContextData->y - $formattingContextUsedValues->paddingTop;
		}
		$GLOBALS['%s']->pop();
	}
	public $_openedElementRenderers;
	public $_lineBoxesAsArray;
	public $_firstLineFormatted;
	public $_unbreakableWidth;
	public $_unbreakableLineBoxes;
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
	function __toString() { return 'cocktail.core.layout.formatter.InlineFormattingContext'; }
}
function cocktail_core_layout_formatter_InlineFormattingContext_0(&$»this, &$baselineOffset, &$child, &$childCoreStyle, &$formattingContextFontMetrics, &$formattingContextY, &$lineBox, &$lineBoxAscent, &$parentBaseLineOffset) {
	$»spos = $GLOBALS['%s']->length;
	{
		$_this = $childCoreStyle->computedValues;
		$typedProperty = null;
		$length = $_this->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($_this->_properties, $i)->name === "vertical-align") {
					$typedProperty = $_this->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}
function cocktail_core_layout_formatter_InlineFormattingContext_1(&$»this, &$coreStyle, &$i, &$length, &$lineBox, &$rootLineBox) {
	$»spos = $GLOBALS['%s']->length;
	{
		$_this = $coreStyle->computedValues;
		$typedProperty = null;
		$length1 = $_this->_properties->length;
		{
			$_g = 0;
			while($_g < $length1) {
				$i1 = $_g++;
				if(_hx_array_get($_this->_properties, $i1)->name === "white-space") {
					$typedProperty = $_this->_properties[$i1];
				}
				unset($i1);
			}
		}
		return $typedProperty;
	}
}
function cocktail_core_layout_formatter_InlineFormattingContext_2(&$»this, &$coreStyle, &$i, &$i1, &$length, &$lineBox, &$rootLineBox) {
	$»spos = $GLOBALS['%s']->length;
	{
		$_this = $coreStyle->computedValues;
		$typedProperty = null;
		$length1 = $_this->_properties->length;
		{
			$_g = 0;
			while($_g < $length1) {
				$i2 = $_g++;
				if(_hx_array_get($_this->_properties, $i2)->name === "white-space") {
					$typedProperty = $_this->_properties[$i2];
				}
				unset($i2);
			}
		}
		return $typedProperty;
	}
}
function cocktail_core_layout_formatter_InlineFormattingContext_3(&$»this, &$concatenatedLength, &$flowX, &$formattingContextRootUsedValues, &$isLastLine, &$remainingSpace, &$rootLineBox) {
	$»spos = $GLOBALS['%s']->length;
	{
		$_this = $»this->_formattingContextRoot->coreStyle->computedValues;
		$typedProperty = null;
		$length = $_this->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($_this->_properties, $i)->name === "text-align") {
					$typedProperty = $_this->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}
function cocktail_core_layout_formatter_InlineFormattingContext_4(&$»this, &$formattingContextCoreStyle, &$initialRootLineBox) {
	$»spos = $GLOBALS['%s']->length;
	{
		$transition = $formattingContextCoreStyle->_transitionManager->getTransition("height", $formattingContextCoreStyle);
		if($transition !== null) {
			return cocktail_core_css_CSSPropertyValue::ABSOLUTE_LENGTH($transition->get_currentValue());
		} else {
			return _hx_deref((cocktail_core_layout_formatter_InlineFormattingContext_5($»this, $formattingContextCoreStyle, $initialRootLineBox, $transition)))->typedValue;
		}
		unset($transition);
	}
}
function cocktail_core_layout_formatter_InlineFormattingContext_5(&$»this, &$formattingContextCoreStyle, &$initialRootLineBox, &$transition) {
	$»spos = $GLOBALS['%s']->length;
	{
		$_this = $formattingContextCoreStyle->computedValues;
		$typedProperty = null;
		$length = $_this->_properties->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				if(_hx_array_get($_this->_properties, $i)->name === "height") {
					$typedProperty = $_this->_properties[$i];
				}
				unset($i);
			}
		}
		return $typedProperty;
	}
}

<?php

class cocktail_core_layout_formatter_InlineFormattingContext extends cocktail_core_layout_formatter_FormattingContext {
	public function __construct($floatsManager) {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.layout.formatter.InlineFormattingContext::new");
		$»spos = $GLOBALS['%s']->length;
		parent::__construct($floatsManager);
		$GLOBALS['%s']->pop();
	}}
	public function alignLineBoxesVertically($lineBox, $lineBoxAscent, $formattingContextY, $parentBaseLineOffset, $formattingContextFontMetrics) {
		$GLOBALS['%s']->push("cocktail.core.layout.formatter.InlineFormattingContext::alignLineBoxesVertically");
		$»spos = $GLOBALS['%s']->length;
		$length = $lineBox->childNodes->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				$child = $lineBox->childNodes[$i];
				$baselineOffset = $child->getBaselineOffset($parentBaseLineOffset, $formattingContextFontMetrics->xHeight);
				$childCoreStyle = $child->elementRenderer->coreStyle;
				$»t = ($childCoreStyle->getKeyword($childCoreStyle->get_verticalAlign()));
				switch($»t->index) {
				case 22:
				{
					$child->get_bounds()->y = $formattingContextY;
				}break;
				default:{
					$child->get_bounds()->y = $formattingContextY - $baselineOffset;
					if($child->hasChildNodes() === false) {
						$child->get_bounds()->y += $lineBoxAscent;
						$child->get_bounds()->y -= $child->leadedAscent;
					}
				}break;
				}
				if($child->hasChildNodes() === true) {
					$this->alignLineBoxesVertically($child, $lineBoxAscent, $formattingContextY, $baselineOffset, $formattingContextFontMetrics);
				} else {
					if($child->isStaticPosition() === true || $child->elementRenderer->isReplaced() === true || $child->elementRenderer->establishesNewFormattingContext() === true) {
						$child->get_bounds()->y += $child->elementRenderer->coreStyle->usedValues->marginTop;
					}
				}
				unset($i,$childCoreStyle,$child,$baselineOffset);
			}
		}
		$GLOBALS['%s']->pop();
	}
	public function setRootLineBoxMetrics($lineBox, $rootLineBox, $parentBaseLineOffset, $formattingContextFontMetrics) {
		$GLOBALS['%s']->push("cocktail.core.layout.formatter.InlineFormattingContext::setRootLineBoxMetrics");
		$»spos = $GLOBALS['%s']->length;
		$length = $lineBox->childNodes->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				$child = $lineBox->childNodes[$i];
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
					if($child->hasChildNodes() === true) {
						$this->setRootLineBoxMetrics($child, $rootLineBox, $baselineOffset, $formattingContextFontMetrics);
					}
					unset($leadedDescent,$leadedAscent,$baselineOffset);
				}
				unset($i,$child);
			}
		}
		$GLOBALS['%s']->pop();
	}
	public function computeLineBoxHeight($rootLineBox) {
		$GLOBALS['%s']->push("cocktail.core.layout.formatter.InlineFormattingContext::computeLineBoxHeight");
		$»spos = $GLOBALS['%s']->length;
		$formattingContextFontMetrics = $this->_formattingContextRoot->coreStyle->get_fontMetricsData();
		$this->setRootLineBoxMetrics($rootLineBox, $rootLineBox, 0.0, $formattingContextFontMetrics);
		$this->alignLineBoxesVertically($rootLineBox, $rootLineBox->leadedAscent, $this->_formattingContextData->y, 0.0, $formattingContextFontMetrics);
		$lineBoxHeight = $rootLineBox->get_bounds()->height;
		{
			$GLOBALS['%s']->pop();
			return $lineBoxHeight;
		}
		$GLOBALS['%s']->pop();
	}
	public function getLineBoxTreeAsArray($rootLineBox) {
		$GLOBALS['%s']->push("cocktail.core.layout.formatter.InlineFormattingContext::getLineBoxTreeAsArray");
		$»spos = $GLOBALS['%s']->length;
		$ret = new _hx_array(array());
		{
			$_g1 = 0; $_g = $rootLineBox->childNodes->length;
			while($_g1 < $_g) {
				$i = $_g1++;
				$child = $rootLineBox->childNodes[$i];
				if($child->hasChildNodes() === true && $child->isStaticPosition() === false) {
					$children = $this->getLineBoxTreeAsArray($child);
					{
						$_g3 = 0; $_g2 = $children->length;
						while($_g3 < $_g2) {
							$j = $_g3++;
							$ret->push($children[$j]);
							unset($j);
						}
						unset($_g3,$_g2);
					}
					unset($children);
				} else {
					$ret->push($child);
				}
				unset($i,$child);
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $ret;
		}
		$GLOBALS['%s']->pop();
	}
	public function removeSpaces($rootLineBox) {
		$GLOBALS['%s']->push("cocktail.core.layout.formatter.InlineFormattingContext::removeSpaces");
		$»spos = $GLOBALS['%s']->length;
		$lineBoxes = $this->getLineBoxTreeAsArray($rootLineBox);
		if($lineBoxes->length === 0) {
			$GLOBALS['%s']->pop();
			return;
		}
		$i = 0;
		while($i < $lineBoxes->length) {
			$lineBox = $lineBoxes[$i];
			if($lineBox->isSpace() === true) {
				$coreStyle = $lineBox->elementRenderer->coreStyle;
				$»t = ($coreStyle->getKeyword($coreStyle->get_whiteSpace()));
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
			$i++;
			unset($lineBox);
		}
		$lineBoxes = $this->getLineBoxTreeAsArray($rootLineBox);
		if($lineBoxes->length === 0) {
			$GLOBALS['%s']->pop();
			return;
		}
		$i1 = $lineBoxes->length - 1;
		while($i1 >= 0) {
			$lineBox = $lineBoxes[$i1];
			if($lineBox->isSpace() === true) {
				$coreStyle = $lineBox->elementRenderer->coreStyle;
				$»t = ($coreStyle->getKeyword($coreStyle->get_whiteSpace()));
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
		$length = $lineBox->childNodes->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				$child = $lineBox->childNodes[$i];
				if($child->isSpace() === true) {
					$spaceWidth = $remainingSpace / $spacesInLine;
					$spacesInLine--;
					$remainingSpace -= $spaceWidth;
					$flowX += $spaceWidth;
					unset($spaceWidth);
				}
				$child->get_bounds()->x = $flowX;
				$flowX += $child->get_bounds()->width;
				if($child->hasChildNodes() === true) {
					$this->alignJustify($flowX, $remainingSpace, $child, $spacesInLine);
				}
				unset($i,$child);
			}
		}
		$GLOBALS['%s']->pop();
	}
	public function alignRight($flowX, $remainingSpace, $lineBox) {
		$GLOBALS['%s']->push("cocktail.core.layout.formatter.InlineFormattingContext::alignRight");
		$»spos = $GLOBALS['%s']->length;
		$flowX += $lineBox->marginLeft + $lineBox->paddingLeft;
		$length = $lineBox->childNodes->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				$child = $lineBox->childNodes[$i];
				if($child->hasChildNodes() === true) {
					$flowX = $this->alignRight($flowX, $remainingSpace, $child);
				}
				$child->get_bounds()->x = $flowX + $remainingSpace;
				$flowX += $child->get_bounds()->width;
				unset($i,$child);
			}
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
		$length = $lineBox->childNodes->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				$child = $lineBox->childNodes[$i];
				if($child->hasChildNodes() === true) {
					$flowX = $this->alignCenter($flowX, $remainingSpace, $child);
				}
				$child->get_bounds()->x = $remainingSpace / 2 + $flowX;
				$flowX += $child->get_bounds()->width;
				unset($i,$child);
			}
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
		$length = $lineBox->childNodes->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				$child = $lineBox->childNodes[$i];
				if($child->hasChildNodes() === true && $child->isStaticPosition() === false) {
					$flowX = $this->alignLeft($flowX, $child);
				} else {
					$child->get_bounds()->x = $flowX + $child->marginLeft;
					if($child->isStaticPosition() === false) {
						$flowX += $child->get_bounds()->width + $child->marginLeft + $child->marginRight;
					}
				}
				unset($i,$child);
			}
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
		$»t = ($this->_formattingContextRoot->coreStyle->getKeyword($this->_formattingContextRoot->coreStyle->get_textAlign()));
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
		{
			$_g1 = 0; $_g = $lineBox->childNodes->length;
			while($_g1 < $_g) {
				$i = $_g1++;
				$child = $lineBox->childNodes[$i];
				if($child->hasChildNodes() === true) {
					$spacesNumber += $this->getSpacesNumber($child);
				}
				if($child->isSpace() === true) {
					$spacesNumber++;
				}
				unset($i,$child);
			}
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
		$length = $lineBox->childNodes->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				$child = $lineBox->childNodes[$i];
				if($child->isStaticPosition() === false) {
					if($child->hasChildNodes() === true) {
						$concatenatedWidth += $this->getConcatenatedWidth($child);
					}
					$concatenatedWidth += $child->get_bounds()->width;
				}
				unset($i,$child);
			}
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
		$this->removeSpaces($rootLineBox);
		$lineBoxWidth = $this->alignLineBox($rootLineBox, $isLastLine, $this->getConcatenatedWidth($rootLineBox));
		if($lineBoxWidth > $this->_formattingContextData->width) {
			$this->_formattingContextData->width = $lineBoxWidth;
		}
		$lineBoxHeight = $this->computeLineBoxHeight($rootLineBox);
		$this->_formattingContextData->y += $lineBoxHeight;
		$this->_firstLineFormatted = true;
		$GLOBALS['%s']->pop();
	}
	public function insertIntoLine($lineBoxes, $lineBox, $rootLineBoxes, $openedElementRenderers) {
		$GLOBALS['%s']->push("cocktail.core.layout.formatter.InlineFormattingContext::insertIntoLine");
		$»spos = $GLOBALS['%s']->length;
		$length = $lineBoxes->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				$this->_unbreakableLineBoxes->push($lineBoxes[$i]);
				if(_hx_array_get($lineBoxes, $i)->isStaticPosition() === false) {
					$this->_unbreakableWidth += _hx_array_get($lineBoxes, $i)->get_bounds()->width + $lineBox->marginLeft + $lineBox->marginRight;
				}
				$remainingLineWidth = $this->getRemainingLineWidth();
				if($remainingLineWidth - $this->_unbreakableWidth < 0) {
					$this->_formattingContextData->y = $this->_floatsManager->getFirstAvailableY($this->_formattingContextData->y + $this->_formattingContextRoot->get_bounds()->y, $this->_unbreakableWidth, $this->_formattingContextRoot->coreStyle->usedValues->width);
					$this->_formattingContextData->y -= $this->_formattingContextRoot->get_bounds()->y;
					$this->_formattingContextData->x = $this->_floatsManager->getLeftFloatOffset($this->_formattingContextData->y + $this->_formattingContextRoot->get_bounds()->y);
					$this->formatLine($rootLineBoxes[$rootLineBoxes->length - 1], false);
					$rootLineBox = new cocktail_core_linebox_RootLineBox($this->_formattingContextRoot);
					$rootLineBoxes->push($rootLineBox);
					$lineBox = $rootLineBox;
					{
						$_g2 = 0; $_g1 = $openedElementRenderers->length;
						while($_g2 < $_g1) {
							$j = $_g2++;
							$childLineBox = $this->createContainerLineBox($openedElementRenderers[$j]);
							$lineBox->appendChild($childLineBox);
							$lineBox = $childLineBox;
							unset($j,$childLineBox);
						}
						unset($_g2,$_g1);
					}
					unset($rootLineBox);
				}
				$unbreakableLength = $this->_unbreakableLineBoxes->length;
				{
					$_g1 = 0;
					while($_g1 < $unbreakableLength) {
						$j = $_g1++;
						$lineBox->appendChild($this->_unbreakableLineBoxes[$j]);
						unset($j);
					}
					unset($_g1);
				}
				$this->_formattingContextData->x += $this->_unbreakableWidth;
				$this->_unbreakableLineBoxes = new _hx_array(array());
				$this->_unbreakableWidth = 0;
				unset($unbreakableLength,$remainingLineWidth,$i);
			}
		}
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
	public function doFormat($elementRenderer, $lineBox, $rootLineBoxes, $openedElementRenderers) {
		$GLOBALS['%s']->push("cocktail.core.layout.formatter.InlineFormattingContext::doFormat");
		$»spos = $GLOBALS['%s']->length;
		$length = $elementRenderer->childNodes->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				$child = $elementRenderer->childNodes[$i];
				if($child->isPositioned() === true && $child->isRelativePositioned() === false) {
					$staticLineBox = new cocktail_core_linebox_StaticPositionLineBox($child);
					$child->get_bounds()->width = $child->coreStyle->usedValues->width + $child->coreStyle->usedValues->paddingLeft + $child->coreStyle->usedValues->paddingRight;
					$child->get_bounds()->height = $child->coreStyle->usedValues->height + $child->coreStyle->usedValues->paddingTop + $child->coreStyle->usedValues->paddingBottom;
					$staticLineBox->marginLeft = $child->coreStyle->usedValues->marginLeft;
					$staticLineBox->marginRight = $child->coreStyle->usedValues->marginRight;
					$lineBox = $this->insertIntoLine(new _hx_array(array($staticLineBox)), $lineBox, $rootLineBoxes, $openedElementRenderers);
					unset($staticLineBox);
				} else {
					if($child->establishesNewFormattingContext() === true || $child->isReplaced() === true) {
						$childUsedValues = $child->coreStyle->usedValues;
						$childBounds = $child->get_bounds();
						$childBounds->width = $childUsedValues->width + $childUsedValues->paddingLeft + $childUsedValues->paddingRight;
						$childBounds->height = $childUsedValues->height + $childUsedValues->paddingTop + $childUsedValues->paddingBottom;
						$embeddedLineBox = new cocktail_core_linebox_EmbeddedLineBox($child);
						$embeddedLineBox->marginLeft = $childUsedValues->marginLeft;
						$embeddedLineBox->marginRight = $childUsedValues->marginRight;
						$lineBox = $this->insertIntoLine(new _hx_array(array($embeddedLineBox)), $lineBox, $rootLineBoxes, $openedElementRenderers);
						unset($embeddedLineBox,$childUsedValues,$childBounds);
					} else {
						if($child->hasChildNodes() === true) {
							$child->lineBoxes = new _hx_array(array());
							$childLineBox = $this->createContainerLineBox($child);
							$childUsedValues = $child->coreStyle->usedValues;
							$childLineBox->marginLeft = $childUsedValues->marginLeft;
							$childLineBox->paddingLeft = $childUsedValues->paddingLeft;
							$this->_unbreakableWidth += $childUsedValues->marginLeft + $childUsedValues->paddingLeft;
							$lineBox->appendChild($childLineBox);
							$openedElementRenderers->push($child);
							$lineBox = $this->doFormat($child, $childLineBox, $rootLineBoxes, $openedElementRenderers);
							$openedElementRenderers->pop();
							$lineBox = $lineBox->parentNode;
							$lastLineBox = $child->lineBoxes[$child->lineBoxes->length - 1];
							$lastLineBox->marginRight = $childUsedValues->marginRight;
							$lastLineBox->paddingRight = $childUsedValues->paddingRight;
							$this->_unbreakableWidth += $childUsedValues->marginRight + $childUsedValues->paddingRight;
							unset($lastLineBox,$childUsedValues,$childLineBox);
						} else {
							$lineBox = $this->insertIntoLine($child->lineBoxes, $lineBox, $rootLineBoxes, $openedElementRenderers);
						}
					}
				}
				unset($i,$child);
			}
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
		$this->_unbreakableLineBoxes = new _hx_array(array());
		$this->_unbreakableWidth = 0.0;
		$this->_firstLineFormatted = false;
		$rootLineBoxes = new _hx_array(array());
		$initialRootLineBox = new cocktail_core_linebox_RootLineBox($this->_formattingContextRoot);
		$rootLineBoxes->push($initialRootLineBox);
		$this->_firstLineFormatted = false;
		$this->_unbreakableWidth = $this->_formattingContextRoot->coreStyle->usedValues->textIndent;
		$this->_formattingContextData->x = $this->_formattingContextRoot->coreStyle->usedValues->textIndent;
		$this->_formattingContextData->x += $this->_floatsManager->getLeftFloatOffset($this->_formattingContextRoot->get_bounds()->y);
		$this->doFormat($this->_formattingContextRoot, $initialRootLineBox, $rootLineBoxes, new _hx_array(array()));
		$this->formatLine($rootLineBoxes[$rootLineBoxes->length - 1], true);
		$this->_formattingContextRoot->lineBoxes = $rootLineBoxes;
		$formattingContextCoreStyle = $this->_formattingContextRoot->coreStyle;
		if($formattingContextCoreStyle->isAuto($formattingContextCoreStyle->get_height()) === true) {
			$formattingContextUsedValues = $this->_formattingContextRoot->coreStyle->usedValues;
			$this->_formattingContextRoot->get_bounds()->height = $this->_formattingContextData->y + $formattingContextUsedValues->paddingBottom;
			$formattingContextUsedValues->height = $this->_formattingContextData->y - $formattingContextUsedValues->paddingTop;
		}
		$GLOBALS['%s']->pop();
	}
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

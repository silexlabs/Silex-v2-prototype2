<?php

class cocktail_core_style_computer_boxComputers_EmbeddedBlockBoxStylesComputer extends cocktail_core_style_computer_boxComputers_BoxStylesComputer {
	public function __construct() { if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.style.computer.boxComputers.EmbeddedBlockBoxStylesComputer::new");
		$製pos = $GLOBALS['%s']->length;
		parent::__construct();
		$GLOBALS['%s']->pop();
	}}
	public function getComputedAutoMargin($marginStyleValue, $opositeMargin, $containingHTMLElementDimension, $computedDimension, $isDimensionAuto, $computedPaddingsDimension, $fontSize, $xHeight, $isHorizontalMargin) {
		$GLOBALS['%s']->push("cocktail.core.style.computer.boxComputers.EmbeddedBlockBoxStylesComputer::getComputedAutoMargin");
		$製pos = $GLOBALS['%s']->length;
		$computedMargin = null;
		if($isHorizontalMargin === false) {
			$computedMargin = 0.0;
		} else {
			$computedMargin = parent::getComputedAutoMargin($marginStyleValue,$opositeMargin,$containingHTMLElementDimension,$computedDimension,false,$computedPaddingsDimension,$fontSize,$xHeight,$isHorizontalMargin);
		}
		{
			$GLOBALS['%s']->pop();
			return $computedMargin;
		}
		$GLOBALS['%s']->pop();
	}
	public function getComputedAutoHeight($style, $containingBlockData, $fontMetrics) {
		$GLOBALS['%s']->push("cocktail.core.style.computer.boxComputers.EmbeddedBlockBoxStylesComputer::getComputedAutoHeight");
		$製pos = $GLOBALS['%s']->length;
		$ret = 0.0;
		$embeddedHTMLElement = $style->htmlElement;
		if($embeddedHTMLElement->getAttributeNode("height") !== null) {
			$ret = $embeddedHTMLElement->get_height();
		} else {
			if($style->width == cocktail_core_style_Dimension::$cssAuto) {
				if($embeddedHTMLElement->get_intrinsicHeight() !== null) {
					$ret = $embeddedHTMLElement->get_intrinsicHeight();
				} else {
					if($embeddedHTMLElement->get_intrinsicWidth() !== null && $embeddedHTMLElement->get_intrinsicRatio() !== null) {
						$ret = $embeddedHTMLElement->get_intrinsicWidth() * $embeddedHTMLElement->get_intrinsicRatio();
					} else {
						if($embeddedHTMLElement->get_intrinsicRatio() !== null) {
						}
					}
				}
			} else {
				$computedWidth = $this->getComputedDimension($style->width, $containingBlockData->width, $containingBlockData->isWidthAuto, $fontMetrics->fontSize, $fontMetrics->xHeight);
				if($embeddedHTMLElement->get_intrinsicRatio() !== null) {
					$ret = $style->computedStyle->getWidth() * $embeddedHTMLElement->get_intrinsicRatio();
				} else {
					$ret = 150;
				}
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $ret;
		}
		$GLOBALS['%s']->pop();
	}
	public function getComputedAutoWidth($style, $containingBlockData, $fontMetrics) {
		$GLOBALS['%s']->push("cocktail.core.style.computer.boxComputers.EmbeddedBlockBoxStylesComputer::getComputedAutoWidth");
		$製pos = $GLOBALS['%s']->length;
		$ret = 0.0;
		$embeddedHTMLElement = $style->htmlElement;
		if($embeddedHTMLElement->getAttributeNode("width") !== null) {
			$ret = $embeddedHTMLElement->get_width();
		} else {
			if($style->height == cocktail_core_style_Dimension::$cssAuto) {
				if($embeddedHTMLElement->get_intrinsicWidth() !== null) {
					$ret = $embeddedHTMLElement->get_intrinsicWidth();
				} else {
					if($embeddedHTMLElement->get_intrinsicHeight() !== null && $embeddedHTMLElement->get_intrinsicRatio() !== null) {
						$ret = $embeddedHTMLElement->get_intrinsicHeight() * $embeddedHTMLElement->get_intrinsicRatio();
					} else {
						if($embeddedHTMLElement->get_intrinsicRatio() !== null) {
							if($containingBlockData->isWidthAuto === false) {
								$computedStyle = $style->computedStyle;
								$ret = $containingBlockData->width - $computedStyle->getMarginLeft() - $computedStyle->getMarginRight() - $computedStyle->getPaddingLeft() - $computedStyle->getPaddingRight();
							} else {
								$ret = 0.0;
							}
						}
					}
				}
			} else {
				$computedHeight = $this->getComputedDimension($style->height, $containingBlockData->height, $containingBlockData->isHeightAuto, $fontMetrics->fontSize, $fontMetrics->xHeight);
				if($embeddedHTMLElement->get_intrinsicRatio() !== null) {
					$ret = $computedHeight / $embeddedHTMLElement->get_intrinsicRatio();
				} else {
					if($embeddedHTMLElement->get_intrinsicWidth() !== null) {
						$ret = $embeddedHTMLElement->get_intrinsicWidth();
					} else {
						$ret = 300;
					}
				}
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $ret;
		}
		$GLOBALS['%s']->pop();
	}
	public function measureAutoWidth($style, $containingBlockData, $fontMetrics) {
		$GLOBALS['%s']->push("cocktail.core.style.computer.boxComputers.EmbeddedBlockBoxStylesComputer::measureAutoWidth");
		$製pos = $GLOBALS['%s']->length;
		$computedWidth = $this->getComputedAutoWidth($style, $containingBlockData, $fontMetrics);
		$style->computedStyle->set_marginLeft($this->getComputedMarginLeft($style, $computedWidth, $containingBlockData, $fontMetrics));
		$style->computedStyle->set_marginRight($this->getComputedMarginRight($style, $computedWidth, $containingBlockData, $fontMetrics));
		{
			$GLOBALS['%s']->pop();
			return $computedWidth;
		}
		$GLOBALS['%s']->pop();
	}
	public function constrainDimensions($style, $computedWidth, $computedHeight) {
		$GLOBALS['%s']->push("cocktail.core.style.computer.boxComputers.EmbeddedBlockBoxStylesComputer::constrainDimensions");
		$製pos = $GLOBALS['%s']->length;
		$maxHeight = $style->computedStyle->getMaxHeight();
		$minHeight = $style->computedStyle->getMinHeight();
		$maxWidth = $style->computedStyle->getMaxWidth();
		$minWidth = $style->computedStyle->getMinWidth();
		$widthSuperiorToMaxWidth = false;
		if($style->maxWidth != cocktail_core_style_ConstrainedDimension::$none) {
			$widthSuperiorToMaxWidth = $computedWidth > $maxWidth;
		}
		$heightSuperiorToMaxHeight = false;
		if($style->maxHeight != cocktail_core_style_ConstrainedDimension::$none) {
			$heightSuperiorToMaxHeight = $computedHeight > $maxHeight;
		}
		$widthInferiorToMinWidth = $computedWidth < $minWidth;
		$heightInferiorToMinHeight = $computedHeight < $minHeight;
		if($widthSuperiorToMaxWidth === true) {
			if($heightSuperiorToMaxHeight === true) {
				if($maxWidth / $computedWidth <= $maxHeight / $computedHeight) {
					if($minHeight > $maxWidth * ($computedHeight / $computedWidth)) {
						$computedHeight = $minHeight;
					} else {
						$computedHeight = $maxWidth * ($computedHeight / $computedWidth);
					}
					$computedWidth = $maxWidth;
				}
			} else {
				if($heightInferiorToMinHeight === true) {
					$computedWidth = $maxWidth;
					$computedHeight = $minHeight;
				} else {
					if($maxWidth * ($computedHeight / $computedWidth) > $minHeight) {
						$computedHeight = $maxWidth * ($computedHeight / $computedWidth);
					} else {
						$computedHeight = $minHeight;
					}
					$computedWidth = $maxWidth;
				}
			}
		} else {
			if($widthInferiorToMinWidth === true) {
				if($heightInferiorToMinHeight === true) {
					if($minWidth / $computedWidth <= $minHeight / $computedHeight) {
						if($maxWidth < $minHeight * ($computedWidth / $computedHeight)) {
							$computedWidth = $maxWidth;
						} else {
							$computedWidth = $minHeight * ($computedWidth / $computedHeight);
						}
						$computedHeight = $minHeight;
					} else {
						if($maxHeight < $minWidth * ($computedHeight / $computedWidth)) {
							$computedHeight = $maxHeight;
						} else {
							$computedHeight = $minWidth * ($computedHeight / $computedWidth);
						}
						$computedWidth = $minWidth;
					}
				} else {
					if($heightSuperiorToMaxHeight === true) {
						$computedWidth = $minWidth;
						$computedHeight = $maxHeight;
					} else {
						if($minWidth * ($computedHeight / $computedWidth) < $maxHeight) {
							$computedHeight = $minWidth * ($computedHeight / $computedWidth);
						} else {
							$computedHeight = $maxHeight;
						}
						$computedWidth = $minWidth;
					}
				}
			} else {
				if($heightSuperiorToMaxHeight === true) {
					if($maxHeight * ($computedWidth / $computedHeight) > $minWidth) {
						$computedWidth = $maxHeight * ($computedWidth / $computedHeight);
					} else {
						$computedWidth = $minWidth;
					}
					$computedHeight = $maxHeight;
				} else {
					if($heightInferiorToMinHeight === true) {
						if($minHeight * ($computedWidth / $computedHeight) < $minHeight) {
							$computedWidth = $minHeight * ($computedWidth / $computedHeight);
						} else {
							$computedWidth = $minHeight;
						}
						$computedHeight = $minHeight;
					}
				}
			}
		}
		$style->computedStyle->set_width($computedWidth);
		$style->computedStyle->set_height($computedHeight);
		$GLOBALS['%s']->pop();
	}
	public function measureDimensionsAndMargins($style, $containingBlockData, $fontMetrics) {
		$GLOBALS['%s']->push("cocktail.core.style.computer.boxComputers.EmbeddedBlockBoxStylesComputer::measureDimensionsAndMargins");
		$製pos = $GLOBALS['%s']->length;
		$computedWidth = $this->measureWidthAndHorizontalMargins($style, $containingBlockData, $fontMetrics);
		$computedHeight = $this->measureHeightAndVerticalMargins($style, $containingBlockData, $fontMetrics);
		if($style->width == cocktail_core_style_Dimension::$cssAuto && $style->height == cocktail_core_style_Dimension::$cssAuto) {
			$this->constrainDimensions($style, $computedWidth, $computedHeight);
		} else {
			$style->computedStyle->set_width($this->constrainWidth($style, $computedWidth));
			$style->computedStyle->set_height($this->constrainHeight($style, $computedHeight));
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'cocktail.core.style.computer.boxComputers.EmbeddedBlockBoxStylesComputer'; }
}

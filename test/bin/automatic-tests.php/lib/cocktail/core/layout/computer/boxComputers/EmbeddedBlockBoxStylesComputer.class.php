<?php

class cocktail_core_layout_computer_boxComputers_EmbeddedBlockBoxStylesComputer extends cocktail_core_layout_computer_boxComputers_BoxStylesComputer {
	public function __construct() { if(!php_Boot::$skip_constructor) {
		parent::__construct();
	}}
	public function getComputedAutoMargin($marginStyleValue, $opositeMargin, $containingHTMLElementDimension, $computedDimension, $isDimensionAuto, $computedPaddingsDimension, $isHorizontalMargin) {
		$usedMargin = null;
		if($isHorizontalMargin === false) {
			$usedMargin = 0.0;
		} else {
			$usedMargin = parent::getComputedAutoMargin($marginStyleValue,$opositeMargin,$containingHTMLElementDimension,$computedDimension,false,$computedPaddingsDimension,$isHorizontalMargin);
		}
		return $usedMargin;
	}
	public function getComputedAutoHeight($style, $containingBlockData) {
		$usedValues = $style->usedValues;
		$usedHeight = 0.0;
		$embeddedHTMLElement = $style->htmlElement;
		if($embeddedHTMLElement->getAttributeNode("height") !== null) {
			$usedHeight = $embeddedHTMLElement->get_height();
		} else {
			if($style->isAuto($style->get_width()) === true) {
				if($embeddedHTMLElement->get_intrinsicHeight() !== null) {
					$usedHeight = $embeddedHTMLElement->get_intrinsicHeight();
				} else {
					if($embeddedHTMLElement->get_intrinsicWidth() !== null && $embeddedHTMLElement->get_intrinsicRatio() !== null) {
						$usedHeight = $embeddedHTMLElement->get_intrinsicWidth() * $embeddedHTMLElement->get_intrinsicRatio();
					} else {
						if($embeddedHTMLElement->get_intrinsicRatio() !== null) {
						}
					}
				}
			} else {
				if($embeddedHTMLElement->get_intrinsicRatio() !== null) {
					$usedWidth = $this->getComputedDimension($style->get_width(), $containingBlockData->width, $containingBlockData->isWidthAuto);
					$usedHeight = $usedWidth * $embeddedHTMLElement->get_intrinsicRatio();
				} else {
					if($embeddedHTMLElement->get_intrinsicHeight() !== null) {
						$usedHeight = $embeddedHTMLElement->get_intrinsicHeight();
					} else {
						$usedHeight = 150;
					}
				}
			}
		}
		return $usedHeight;
	}
	public function getComputedAutoWidth($style, $containingBlockData) {
		$usedValues = $style->usedValues;
		$usedWidth = 0.0;
		$embeddedHTMLElement = $style->htmlElement;
		if($embeddedHTMLElement->getAttributeNode("width") !== null) {
			$usedWidth = $embeddedHTMLElement->get_width();
		} else {
			if($style->isAuto($style->get_height()) === true) {
				if($embeddedHTMLElement->get_intrinsicWidth() !== null) {
					$usedWidth = $embeddedHTMLElement->get_intrinsicWidth();
				} else {
					if($embeddedHTMLElement->get_intrinsicHeight() !== null && $embeddedHTMLElement->get_intrinsicRatio() !== null) {
						$usedWidth = $embeddedHTMLElement->get_intrinsicHeight() * $embeddedHTMLElement->get_intrinsicRatio();
					} else {
						if($embeddedHTMLElement->get_intrinsicRatio() !== null) {
							if($containingBlockData->isWidthAuto === false) {
								$usedWidth = $containingBlockData->width - $usedValues->marginLeft - $usedValues->marginRight - $usedValues->paddingLeft - $usedValues->paddingRight;
							} else {
								$usedWidth = 0.0;
							}
						}
					}
				}
			} else {
				$usedHeight = $this->getComputedDimension($style->get_height(), $containingBlockData->height, $containingBlockData->isHeightAuto);
				if($embeddedHTMLElement->get_intrinsicRatio() !== null) {
					$usedWidth = $usedHeight / $embeddedHTMLElement->get_intrinsicRatio();
				} else {
					if($embeddedHTMLElement->get_intrinsicWidth() !== null) {
						$usedWidth = $embeddedHTMLElement->get_intrinsicWidth();
					} else {
						$usedWidth = 300;
					}
				}
			}
		}
		return $usedWidth;
	}
	public function measureAutoWidth($style, $containingBlockData) {
		$usedValues = $style->usedValues;
		$usedWidth = $this->getComputedAutoWidth($style, $containingBlockData);
		$usedValues->marginLeft = $this->getComputedMarginLeft($style, $usedWidth, $containingBlockData);
		$usedValues->marginRight = $this->getComputedMarginRight($style, $usedWidth, $containingBlockData);
		return $usedWidth;
	}
	public function constrainDimensions($style, $usedWidth, $usedHeight) {
		$usedValues = $style->usedValues;
		$maxHeight = $usedValues->maxHeight;
		$minHeight = $usedValues->minHeight;
		$maxWidth = $usedValues->maxWidth;
		$minWidth = $usedValues->minWidth;
		$widthSuperiorToMaxWidth = false;
		if($style->isNone($style->get_maxWidth()) === false) {
			$widthSuperiorToMaxWidth = $usedWidth > $maxWidth;
		}
		$heightSuperiorToMaxHeight = false;
		if($style->isNone($style->get_maxHeight()) === false) {
			$heightSuperiorToMaxHeight = $usedHeight > $maxHeight;
		}
		$widthInferiorToMinWidth = $usedWidth < $minWidth;
		$heightInferiorToMinHeight = $usedHeight < $minHeight;
		if($widthSuperiorToMaxWidth === true) {
			if($heightSuperiorToMaxHeight === true) {
				if($maxWidth / $usedWidth <= $maxHeight / $usedHeight) {
					if($minHeight > $maxWidth * ($usedHeight / $usedWidth)) {
						$usedHeight = $minHeight;
					} else {
						$usedHeight = $maxWidth * ($usedHeight / $usedWidth);
					}
					$usedWidth = $maxWidth;
				}
			} else {
				if($heightInferiorToMinHeight === true) {
					$usedWidth = $maxWidth;
					$usedHeight = $minHeight;
				} else {
					if($maxWidth * ($usedHeight / $usedWidth) > $minHeight) {
						$usedHeight = $maxWidth * ($usedHeight / $usedWidth);
					} else {
						$usedHeight = $minHeight;
					}
					$usedWidth = $maxWidth;
				}
			}
		} else {
			if($widthInferiorToMinWidth === true) {
				if($heightInferiorToMinHeight === true) {
					if($minWidth / $usedWidth <= $minHeight / $usedHeight) {
						if($maxWidth < $minHeight * ($usedWidth / $usedHeight)) {
							$usedWidth = $maxWidth;
						} else {
							$usedWidth = $minHeight * ($usedWidth / $usedHeight);
						}
						$usedHeight = $minHeight;
					} else {
						if($maxHeight < $minWidth * ($usedHeight / $usedWidth)) {
							$usedHeight = $maxHeight;
						} else {
							$usedHeight = $minWidth * ($usedHeight / $usedWidth);
						}
						$usedWidth = $minWidth;
					}
				} else {
					if($heightSuperiorToMaxHeight === true) {
						$usedWidth = $minWidth;
						$usedHeight = $maxHeight;
					} else {
						if($minWidth * ($usedHeight / $usedWidth) < $maxHeight) {
							$usedHeight = $minWidth * ($usedHeight / $usedWidth);
						} else {
							$usedHeight = $maxHeight;
						}
						$usedWidth = $minWidth;
					}
				}
			} else {
				if($heightSuperiorToMaxHeight === true) {
					if($maxHeight * ($usedWidth / $usedHeight) > $minWidth) {
						$usedWidth = $maxHeight * ($usedWidth / $usedHeight);
					} else {
						$usedWidth = $minWidth;
					}
					$usedHeight = $maxHeight;
				} else {
					if($heightInferiorToMinHeight === true) {
						if($minHeight * ($usedWidth / $usedHeight) < $minHeight) {
							$usedWidth = $minHeight * ($usedWidth / $usedHeight);
						} else {
							$usedWidth = $minHeight;
						}
						$usedHeight = $minHeight;
					}
				}
			}
		}
		$usedValues->width = $usedWidth;
		$usedValues->height = $usedHeight;
	}
	public function measureDimensionsAndMargins($style, $containingBlockData) {
		$usedValues = $style->usedValues;
		$usedWidth = $this->measureWidthAndHorizontalMargins($style, $containingBlockData);
		$usedHeight = $this->measureHeightAndVerticalMargins($style, $containingBlockData);
		if($style->isAuto($style->get_width()) === true && $style->isAuto($style->get_height()) === true) {
			$this->constrainDimensions($style, $usedWidth, $usedHeight);
		} else {
			$usedValues->width = $this->constrainWidth($style, $usedWidth);
			$usedValues->height = $this->constrainHeight($style, $usedHeight);
		}
	}
	function __toString() { return 'cocktail.core.layout.computer.boxComputers.EmbeddedBlockBoxStylesComputer'; }
}

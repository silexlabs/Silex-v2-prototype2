<?php

class cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer extends cocktail_core_layout_computer_boxComputers_EmbeddedBlockBoxStylesComputer {
	public function __construct() { if(!php_Boot::$skip_constructor) {
		parent::__construct();
	}}
	public function getComputedStaticTop($style, $containingBlockData) {
		return $style->usedValues->marginTop;
	}
	public function getComputedStaticLeft($style, $containingBlockData) {
		return $style->usedValues->marginLeft;
	}
	public function measureVerticalPositionOffsets($style, $containingBlockData) {
		$usedValues = $style->usedValues;
		if($style->isAuto($style->get_top()) === true || $style->isAuto($style->get_bottom()) === true) {
			if($style->isAuto($style->get_marginTop()) === true) {
				$usedValues->marginTop = 0;
			}
			if($style->isAuto($style->get_marginTop()) === true) {
				$usedValues->marginBottom = 0;
			}
			if($style->isAuto($style->get_top()) === true && $style->isAuto($style->get_bottom()) === true) {
				$usedValues->top = $this->getComputedStaticTop($style, $containingBlockData);
				$usedValues->bottom = $containingBlockData->height - $usedValues->height - $usedValues->marginTop - $usedValues->marginBottom - $usedValues->paddingTop - $usedValues->paddingBottom - $usedValues->top;
			} else {
				if($style->isAuto($style->get_top()) === true) {
					$usedValues->bottom = $this->getComputedPositionOffset($style->get_bottom(), $containingBlockData->height);
					$usedValues->top = $containingBlockData->height - $usedValues->height - $usedValues->marginTop - $usedValues->marginBottom - $usedValues->bottom - $usedValues->paddingTop - $usedValues->paddingBottom;
				} else {
					if($style->isAuto($style->get_bottom()) === true) {
						$usedValues->top = $this->getComputedPositionOffset($style->get_top(), $containingBlockData->height);
						$usedValues->bottom = $containingBlockData->height - $usedValues->height - $usedValues->marginTop - $usedValues->marginBottom - $usedValues->top - $usedValues->paddingTop - $usedValues->paddingBottom;
					} else {
						$usedValues->top = $this->getComputedPositionOffset($style->get_top(), $containingBlockData->height);
						$usedValues->bottom = $this->getComputedPositionOffset($style->get_bottom(), $containingBlockData->height);
					}
				}
			}
		} else {
			$usedValues->top = $this->getComputedPositionOffset($style->get_top(), $containingBlockData->height);
			$usedValues->bottom = $this->getComputedPositionOffset($style->get_bottom(), $containingBlockData->height);
			if($style->isAuto($style->get_marginTop()) === true && $style->isAuto($style->get_marginTop()) === true) {
				$margin = ($containingBlockData->height - $usedValues->top - $usedValues->bottom - $usedValues->paddingTop - $usedValues->paddingBottom) / 2;
				$usedMargin = ($containingBlockData->height - $usedValues->height - $usedValues->paddingTop - $usedValues->paddingBottom - $usedValues->top - $usedValues->bottom) / 2;
				if($usedMargin >= 0) {
					$usedValues->marginTop = $usedMargin;
					$usedValues->marginBottom = $usedMargin;
				} else {
					$usedValues->marginTop = 0;
					$usedValues->marginBottom = $containingBlockData->height - $usedValues->height - $usedValues->paddingTop - $usedValues->paddingBottom - $usedValues->top - $usedValues->bottom;
				}
			} else {
				if($style->isAuto($style->get_marginTop()) === true) {
					$usedValues->marginTop = $containingBlockData->height - $usedValues->height - $usedValues->paddingTop - $usedValues->paddingBottom - $usedValues->top - $usedValues->bottom - $usedValues->marginBottom;
				} else {
					if($style->isAuto($style->get_marginTop()) === true) {
						$usedValues->marginBottom = $containingBlockData->height - $usedValues->height - $usedValues->paddingTop - $usedValues->paddingBottom - $usedValues->top - $usedValues->bottom - $usedValues->marginTop;
					}
				}
			}
		}
	}
	public function measureHorizontalPositionOffsets($style, $containingBlockData) {
		$usedValues = $style->usedValues;
		if($style->isAuto($style->get_left()) === true || $style->isAuto($style->get_right()) === true) {
			if($style->isAuto($style->get_marginLeft()) === true) {
				$usedValues->marginLeft = 0;
			}
			if($style->isAuto($style->get_marginRight()) === true) {
				$usedValues->marginRight = 0;
			}
			if($style->isAuto($style->get_left()) === true && $style->isAuto($style->get_right()) === true) {
				$usedValues->left = $this->getComputedStaticLeft($style, $containingBlockData);
				$usedValues->right = $containingBlockData->width - $usedValues->width - $usedValues->marginLeft - $usedValues->marginRight - $usedValues->paddingLeft - $usedValues->paddingRight - $usedValues->left;
			} else {
				if($style->isAuto($style->get_left()) === true) {
					$usedValues->right = $this->getComputedPositionOffset($style->get_right(), $containingBlockData->width);
					$usedValues->left = $containingBlockData->width - $usedValues->width - $usedValues->marginLeft - $usedValues->marginRight - $usedValues->right - $usedValues->paddingLeft - $usedValues->paddingRight;
				} else {
					if($style->isAuto($style->get_right()) === true) {
						$usedValues->left = $this->getComputedPositionOffset($style->get_left(), $containingBlockData->width);
						$usedValues->right = $containingBlockData->width - $usedValues->width - $usedValues->marginLeft - $usedValues->marginRight - $usedValues->left - $usedValues->paddingLeft - $usedValues->paddingRight;
					}
				}
			}
		} else {
			$usedValues->left = $this->getComputedPositionOffset($style->get_left(), $containingBlockData->width);
			$usedValues->right = $this->getComputedPositionOffset($style->get_right(), $containingBlockData->width);
			if($style->isAuto($style->get_marginLeft()) === true && $style->isAuto($style->get_marginRight()) === true) {
				$margin = ($containingBlockData->width - $usedValues->left - $usedValues->right - $usedValues->paddingLeft - $usedValues->paddingRight) / 2;
				$usedMargin = ($containingBlockData->width - $usedValues->width - $usedValues->paddingLeft - $usedValues->paddingRight - $usedValues->left - $usedValues->right) / 2;
				if($usedMargin >= 0) {
					$usedValues->marginLeft = $usedMargin;
					$usedValues->marginRight = $usedMargin;
				} else {
					$usedValues->marginLeft = 0;
					$usedValues->marginRight = $containingBlockData->width - $usedValues->width - $usedValues->paddingLeft - $usedValues->paddingRight - $usedValues->left - $usedValues->right;
				}
				$usedValues->marginLeft = 0;
			} else {
				if($style->isAuto($style->get_marginLeft()) === true) {
					$usedValues->marginLeft = $containingBlockData->width - $usedValues->width - $usedValues->paddingLeft - $usedValues->paddingRight - $usedValues->left - $usedValues->right - $usedValues->marginRight;
				} else {
					if($style->isAuto($style->get_marginRight()) === true) {
						$usedValues->marginRight = $containingBlockData->width - $usedValues->width - $usedValues->paddingLeft - $usedValues->paddingRight - $usedValues->left - $usedValues->right - $usedValues->marginLeft;
					}
				}
			}
		}
	}
	public function measurePositionOffsets($style, $containingBlockData) {
		$this->measureHorizontalPositionOffsets($style, $containingBlockData);
		$this->measureVerticalPositionOffsets($style, $containingBlockData);
	}
	function __toString() { return 'cocktail.core.layout.computer.boxComputers.EmbeddedPositionedBoxStylesComputer'; }
}

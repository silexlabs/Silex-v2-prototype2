<?php

class cocktail_core_style_computer_boxComputers_PositionedBoxStylesComputer extends cocktail_core_style_computer_boxComputers_BoxStylesComputer {
	public function __construct() { if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.style.computer.boxComputers.PositionedBoxStylesComputer::new");
		$製pos = $GLOBALS['%s']->length;
		parent::__construct();
		$GLOBALS['%s']->pop();
	}}
	public function getComputedStaticTop($style, $containingBlockData) {
		$GLOBALS['%s']->push("cocktail.core.style.computer.boxComputers.PositionedBoxStylesComputer::getComputedStaticTop");
		$製pos = $GLOBALS['%s']->length;
		{
			$裨mp = $style->computedStyle->getMarginTop();
			$GLOBALS['%s']->pop();
			return $裨mp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getComputedStaticLeft($style, $containingBlockData) {
		$GLOBALS['%s']->push("cocktail.core.style.computer.boxComputers.PositionedBoxStylesComputer::getComputedStaticLeft");
		$製pos = $GLOBALS['%s']->length;
		{
			$裨mp = $style->computedStyle->getMarginLeft();
			$GLOBALS['%s']->pop();
			return $裨mp;
		}
		$GLOBALS['%s']->pop();
	}
	public function measureHeight($style, $containingBlockData, $fontMetrics) {
		$GLOBALS['%s']->push("cocktail.core.style.computer.boxComputers.PositionedBoxStylesComputer::measureHeight");
		$製pos = $GLOBALS['%s']->length;
		$computedStyle = $style->computedStyle;
		$computedHeight = $this->getComputedHeight($style, $containingBlockData, $fontMetrics);
		if($style->top != cocktail_core_style_PositionOffset::$cssAuto && $style->bottom != cocktail_core_style_PositionOffset::$cssAuto) {
			$style->computedStyle->set_top($this->getComputedPositionOffset($style->top, $containingBlockData->height, $fontMetrics->fontSize, $fontMetrics->xHeight));
			$style->computedStyle->set_bottom($this->getComputedPositionOffset($style->bottom, $containingBlockData->height, $fontMetrics->fontSize, $fontMetrics->xHeight));
			if($style->marginTop == cocktail_core_style_Margin::$cssAuto && $style->marginBottom == cocktail_core_style_Margin::$cssAuto) {
				$computedMargin = ($containingBlockData->height - $computedStyle->getHeight() - $computedStyle->getPaddingTop() - $computedStyle->getPaddingBottom() - $computedStyle->getTop() - $computedStyle->getBottom()) / 2;
				if($computedMargin >= 0) {
					$style->computedStyle->set_marginTop($computedMargin);
					$style->computedStyle->set_marginBottom($computedMargin);
				} else {
					$style->computedStyle->set_marginBottom(0);
					$style->computedStyle->set_marginTop($containingBlockData->height - $computedStyle->getHeight() - $computedStyle->getPaddingTop() - $computedStyle->getPaddingBottom() - $computedStyle->getBottom() - $computedStyle->getTop());
				}
			} else {
				if($style->marginTop == cocktail_core_style_Margin::$cssAuto) {
					$style->computedStyle->set_marginBottom($this->getComputedMarginBottom($style, $computedHeight, $containingBlockData, $fontMetrics));
					$style->computedStyle->set_marginTop($containingBlockData->height - $computedStyle->getHeight() - $computedStyle->getPaddingTop() - $computedStyle->getPaddingBottom() - $computedStyle->getTop() - $computedStyle->getBottom() - $computedStyle->getMarginBottom());
				} else {
					if($style->marginBottom == cocktail_core_style_Margin::$cssAuto) {
						$style->computedStyle->set_marginTop($this->getComputedMarginTop($style, $computedHeight, $containingBlockData, $fontMetrics));
						$style->computedStyle->set_marginBottom($containingBlockData->height - $computedStyle->getHeight() - $computedStyle->getPaddingTop() - $computedStyle->getPaddingBottom() - $computedStyle->getTop() - $computedStyle->getBottom() - $computedStyle->getMarginTop());
					} else {
						$style->computedStyle->set_marginTop($this->getComputedMarginTop($style, $computedHeight, $containingBlockData, $fontMetrics));
						$style->computedStyle->set_marginBottom($this->getComputedMarginBottom($style, $computedHeight, $containingBlockData, $fontMetrics));
					}
				}
			}
		} else {
			if($style->marginTop == cocktail_core_style_Margin::$cssAuto) {
				$style->computedStyle->set_marginTop(0);
			} else {
				$style->computedStyle->set_marginTop($this->getComputedMarginTop($style, $computedHeight, $containingBlockData, $fontMetrics));
			}
			if($style->marginBottom == cocktail_core_style_Margin::$cssAuto) {
				$style->computedStyle->set_marginBottom(0);
			} else {
				$style->computedStyle->set_marginBottom($this->getComputedMarginBottom($style, $computedHeight, $containingBlockData, $fontMetrics));
			}
			if($style->top == cocktail_core_style_PositionOffset::$cssAuto && $style->bottom == cocktail_core_style_PositionOffset::$cssAuto) {
				$style->computedStyle->set_top($this->getComputedStaticTop($style, $containingBlockData));
				$style->computedStyle->set_bottom($containingBlockData->height - $computedStyle->getMarginTop() - $computedStyle->getMarginBottom() - $computedStyle->getHeight() - $computedStyle->getPaddingTop() - $computedStyle->getPaddingBottom() - $computedStyle->getTop());
			} else {
				if($style->bottom == cocktail_core_style_PositionOffset::$cssAuto) {
					$style->computedStyle->set_top($this->getComputedPositionOffset($style->top, $containingBlockData->height, $fontMetrics->fontSize, $fontMetrics->xHeight));
					$style->computedStyle->set_bottom($containingBlockData->height - $computedStyle->getMarginTop() - $computedStyle->getMarginBottom() - $computedStyle->getHeight() - $computedStyle->getPaddingTop() - $computedStyle->getPaddingBottom() - $computedStyle->getTop());
				} else {
					if($style->top == cocktail_core_style_PositionOffset::$cssAuto) {
						$style->computedStyle->set_bottom($this->getComputedPositionOffset($style->bottom, $containingBlockData->height, $fontMetrics->fontSize, $fontMetrics->xHeight));
						$style->computedStyle->set_top($containingBlockData->height - $computedStyle->getMarginTop() - $computedStyle->getMarginBottom() - $computedStyle->getHeight() - $computedStyle->getPaddingTop() - $computedStyle->getPaddingBottom() - $computedStyle->getBottom());
					}
				}
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $computedHeight;
		}
		$GLOBALS['%s']->pop();
	}
	public function measureAutoHeight($style, $containingBlockData, $fontMetrics) {
		$GLOBALS['%s']->push("cocktail.core.style.computer.boxComputers.PositionedBoxStylesComputer::measureAutoHeight");
		$製pos = $GLOBALS['%s']->length;
		$computedStyle = $style->computedStyle;
		$computedHeight = 0.0;
		if($style->marginTop == cocktail_core_style_Margin::$cssAuto) {
			$style->computedStyle->set_marginTop(0);
		} else {
			$style->computedStyle->set_marginTop($this->getComputedMarginTop($style, $computedHeight, $containingBlockData, $fontMetrics));
		}
		if($style->marginBottom == cocktail_core_style_Margin::$cssAuto) {
			$style->computedStyle->set_marginBottom(0);
		} else {
			$style->computedStyle->set_marginBottom($this->getComputedMarginBottom($style, $computedHeight, $containingBlockData, $fontMetrics));
		}
		if($style->top != cocktail_core_style_PositionOffset::$cssAuto && $style->bottom != cocktail_core_style_PositionOffset::$cssAuto) {
			$style->computedStyle->set_top($this->getComputedPositionOffset($style->top, $containingBlockData->height, $fontMetrics->fontSize, $fontMetrics->xHeight));
			$style->computedStyle->set_bottom($this->getComputedPositionOffset($style->bottom, $containingBlockData->height, $fontMetrics->fontSize, $fontMetrics->xHeight));
			$computedHeight = $containingBlockData->height - $computedStyle->getMarginTop() - $computedStyle->getTop() - $computedStyle->getBottom() - $computedStyle->getMarginBottom() - $computedStyle->getPaddingTop() - $computedStyle->getPaddingBottom();
		} else {
			if($style->bottom == cocktail_core_style_PositionOffset::$cssAuto) {
				$style->computedStyle->set_top($this->getComputedPositionOffset($style->top, $containingBlockData->height, $fontMetrics->fontSize, $fontMetrics->xHeight));
				$style->computedStyle->set_bottom($containingBlockData->height - $computedStyle->getMarginTop() - $computedStyle->getMarginBottom() - $computedStyle->getHeight() - $computedStyle->getPaddingTop() - $computedStyle->getPaddingBottom() - $computedStyle->getTop());
			} else {
				if($style->top == cocktail_core_style_PositionOffset::$cssAuto) {
					$style->computedStyle->set_bottom($this->getComputedPositionOffset($style->bottom, $containingBlockData->height, $fontMetrics->fontSize, $fontMetrics->xHeight));
					$style->computedStyle->set_top($containingBlockData->height - $computedStyle->getMarginTop() - $computedStyle->getMarginBottom() - $computedStyle->getHeight() - $computedStyle->getPaddingTop() - $computedStyle->getPaddingBottom() - $computedStyle->getBottom());
				}
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $computedHeight;
		}
		$GLOBALS['%s']->pop();
	}
	public function measureWidth($style, $containingBlockData, $fontMetrics) {
		$GLOBALS['%s']->push("cocktail.core.style.computer.boxComputers.PositionedBoxStylesComputer::measureWidth");
		$製pos = $GLOBALS['%s']->length;
		$computedStyle = $style->computedStyle;
		$computedWidth = $this->getComputedWidth($style, $containingBlockData, $fontMetrics);
		if($style->left != cocktail_core_style_PositionOffset::$cssAuto && $style->right != cocktail_core_style_PositionOffset::$cssAuto) {
			$style->computedStyle->set_left($this->getComputedPositionOffset($style->left, $containingBlockData->width, $fontMetrics->fontSize, $fontMetrics->xHeight));
			$style->computedStyle->set_right($this->getComputedPositionOffset($style->right, $containingBlockData->width, $fontMetrics->fontSize, $fontMetrics->xHeight));
			if($style->marginLeft == cocktail_core_style_Margin::$cssAuto && $style->marginRight == cocktail_core_style_Margin::$cssAuto) {
				$computedMargin = ($containingBlockData->width - $computedStyle->getWidth() - $computedStyle->getPaddingLeft() - $computedStyle->getPaddingRight() - $computedStyle->getLeft() - $computedStyle->getRight()) / 2;
				if($computedMargin >= 0) {
					$style->computedStyle->set_marginLeft($computedMargin);
					$style->computedStyle->set_marginRight($computedMargin);
				} else {
					$style->computedStyle->set_marginLeft(0);
					$style->computedStyle->set_marginRight($containingBlockData->width - $computedStyle->getWidth() - $computedStyle->getPaddingLeft() - $computedStyle->getPaddingRight() - $computedStyle->getLeft() - $computedStyle->getRight());
				}
			} else {
				if($style->marginLeft == cocktail_core_style_Margin::$cssAuto) {
					$style->computedStyle->set_marginRight($this->getComputedMarginRight($style, $computedWidth, $containingBlockData, $fontMetrics));
					$style->computedStyle->set_marginLeft($containingBlockData->width - $computedStyle->getWidth() - $computedStyle->getPaddingLeft() - $computedStyle->getPaddingRight() - $computedStyle->getLeft() - $computedStyle->getRight() - $computedStyle->getMarginRight());
				} else {
					if($style->marginRight == cocktail_core_style_Margin::$cssAuto) {
						$style->computedStyle->set_marginLeft($this->getComputedMarginLeft($style, $computedWidth, $containingBlockData, $fontMetrics));
						$style->computedStyle->set_marginRight($containingBlockData->width - $computedStyle->getWidth() - $computedStyle->getPaddingLeft() - $computedStyle->getPaddingRight() - $computedStyle->getLeft() - $computedStyle->getRight() - $computedStyle->getMarginLeft());
					} else {
						$style->computedStyle->set_marginLeft($this->getComputedMarginLeft($style, $computedWidth, $containingBlockData, $fontMetrics));
						$style->computedStyle->set_marginRight($this->getComputedMarginRight($style, $computedWidth, $containingBlockData, $fontMetrics));
					}
				}
			}
		} else {
			if($style->marginLeft == cocktail_core_style_Margin::$cssAuto) {
				$style->computedStyle->set_marginLeft(0);
			} else {
				$style->computedStyle->set_marginLeft($this->getComputedMarginLeft($style, $computedWidth, $containingBlockData, $fontMetrics));
			}
			if($style->marginRight == cocktail_core_style_Margin::$cssAuto) {
				$style->computedStyle->set_marginRight(0);
			} else {
				$style->computedStyle->set_marginRight($this->getComputedMarginRight($style, $computedWidth, $containingBlockData, $fontMetrics));
			}
			if($style->left == cocktail_core_style_PositionOffset::$cssAuto && $style->right == cocktail_core_style_PositionOffset::$cssAuto) {
				$style->computedStyle->set_left($this->getComputedStaticLeft($style, $containingBlockData));
				$style->computedStyle->set_right($containingBlockData->width - $computedStyle->getMarginLeft() - $computedStyle->getMarginRight() - $computedStyle->getWidth() - $computedStyle->getPaddingLeft() - $computedStyle->getPaddingRight() - $computedStyle->getLeft());
			} else {
				if($style->left == cocktail_core_style_PositionOffset::$cssAuto) {
					$style->computedStyle->set_right($this->getComputedPositionOffset($style->right, $containingBlockData->width, $fontMetrics->fontSize, $fontMetrics->xHeight));
					$style->computedStyle->set_left($containingBlockData->width - $computedStyle->getMarginLeft() - $computedStyle->getMarginRight() - $computedStyle->getWidth() - $computedStyle->getPaddingLeft() - $computedStyle->getPaddingRight() - $computedStyle->getRight());
				} else {
					if($style->right == cocktail_core_style_PositionOffset::$cssAuto) {
						$style->computedStyle->set_left($this->getComputedPositionOffset($style->left, $containingBlockData->width, $fontMetrics->fontSize, $fontMetrics->xHeight));
						$style->computedStyle->set_right($containingBlockData->width - $computedStyle->getMarginLeft() - $computedStyle->getMarginRight() - $computedStyle->getWidth() - $computedStyle->getPaddingLeft() - $computedStyle->getPaddingRight() - $computedStyle->getLeft());
					}
				}
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $computedWidth;
		}
		$GLOBALS['%s']->pop();
	}
	public function measureAutoWidth($style, $containingBlockData, $fontMetrics) {
		$GLOBALS['%s']->push("cocktail.core.style.computer.boxComputers.PositionedBoxStylesComputer::measureAutoWidth");
		$製pos = $GLOBALS['%s']->length;
		$computedStyle = $style->computedStyle;
		$computedWidth = 0.0;
		if($style->marginLeft == cocktail_core_style_Margin::$cssAuto) {
			$computedStyle->set_marginLeft(0);
		} else {
			$computedStyle->set_marginLeft($this->getComputedMarginLeft($style, $computedWidth, $containingBlockData, $fontMetrics));
		}
		if($style->marginRight == cocktail_core_style_Margin::$cssAuto) {
			$computedStyle->set_marginRight(0);
		} else {
			$computedStyle->set_marginRight($this->getComputedMarginRight($style, $computedWidth, $containingBlockData, $fontMetrics));
		}
		if($style->left != cocktail_core_style_PositionOffset::$cssAuto && $style->right != cocktail_core_style_PositionOffset::$cssAuto) {
			$computedStyle->set_left($this->getComputedPositionOffset($style->left, $containingBlockData->width, $fontMetrics->fontSize, $fontMetrics->xHeight));
			$computedStyle->set_right($this->getComputedPositionOffset($style->right, $containingBlockData->width, $fontMetrics->fontSize, $fontMetrics->xHeight));
			$computedWidth = $containingBlockData->width - $computedStyle->getMarginLeft() - $computedStyle->getLeft() - $computedStyle->getRight() - $computedStyle->getMarginRight() - $computedStyle->getPaddingLeft() - $computedStyle->getPaddingRight();
		} else {
			if($style->left == cocktail_core_style_PositionOffset::$cssAuto) {
				$style->computedStyle->set_right($this->getComputedPositionOffset($style->right, $containingBlockData->width, $fontMetrics->fontSize, $fontMetrics->xHeight));
			} else {
				if($style->right == cocktail_core_style_PositionOffset::$cssAuto) {
					$style->computedStyle->set_left($this->getComputedPositionOffset($style->left, $containingBlockData->width, $fontMetrics->fontSize, $fontMetrics->xHeight));
				}
			}
			$computedWidth = $containingBlockData->width;
		}
		{
			$GLOBALS['%s']->pop();
			return $computedWidth;
		}
		$GLOBALS['%s']->pop();
	}
	public function measurePositionOffsets($style, $containingBlockData, $fontMetrics) {
		$GLOBALS['%s']->push("cocktail.core.style.computer.boxComputers.PositionedBoxStylesComputer::measurePositionOffsets");
		$製pos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'cocktail.core.style.computer.boxComputers.PositionedBoxStylesComputer'; }
}

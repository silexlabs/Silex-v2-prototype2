<?php

class cocktail_core_layout_LayoutManager {
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		$floatsManager = new cocktail_core_layout_floats_FloatsManager();
		$this->inlineFormattingContext = new cocktail_core_layout_formatter_InlineFormattingContext($floatsManager);
		$this->blockFormattingContext = new cocktail_core_layout_formatter_BlockFormattingContext($this->inlineFormattingContext, $floatsManager);
		$this->embeddedBlockBoxStylesComputer = new cocktail_core_layout_computer_boxComputers_EmbeddedBlockBoxStylesComputer();
		$this->embeddedFloatBoxStylesComputer = new cocktail_core_layout_computer_boxComputers_EmbeddedFloatBoxStylesComputer();
		$this->embeddedInlineBlockBoxStylesComputer = new cocktail_core_layout_computer_boxComputers_EmbeddedInlineBlockBoxStylesComputer();
		$this->embeddedInlineBoxStylesComputer = new cocktail_core_layout_computer_boxComputers_EmbeddedInlineBoxStylesComputer();
		$this->embeddedPositionedBoxStylesComputer = new cocktail_core_layout_computer_boxComputers_EmbeddedPositionedBoxStylesComputer();
		$this->blockBoxStyleComputer = new cocktail_core_layout_computer_boxComputers_BlockBoxStylesComputer();
		$this->floatBoxStylesComputer = new cocktail_core_layout_computer_boxComputers_FloatBoxStylesComputer();
		$this->inlineBoxStylesComputer = new cocktail_core_layout_computer_boxComputers_InLineBoxStylesComputer();
		$this->inlineBlockBoxStylesComputer = new cocktail_core_layout_computer_boxComputers_InlineBlockBoxStylesComputer();
		$this->positionedBoxStylesComputer = new cocktail_core_layout_computer_boxComputers_PositionedBoxStylesComputer();
	}}
	public function getBoxStylesComputer($elementRenderer) {
		if($elementRenderer->isFloat() === true) {
			if($elementRenderer->isReplaced() === true) {
				return $this->embeddedFloatBoxStylesComputer;
			} else {
				return $this->floatBoxStylesComputer;
			}
		} else {
			if($elementRenderer->isPositioned() === true && $elementRenderer->isRelativePositioned() === false) {
				if($elementRenderer->isReplaced() === true) {
					return $this->embeddedPositionedBoxStylesComputer;
				} else {
					return $this->positionedBoxStylesComputer;
				}
			} else {
				$»t = ($elementRenderer->coreStyle->get_display());
				switch($»t->index) {
				case 4:
				$value = $»t->params[0];
				{
					$»t2 = ($value);
					switch($»t2->index) {
					case 28:
					{
						if($elementRenderer->isReplaced() === true) {
							return $this->embeddedBlockBoxStylesComputer;
						} else {
							return $this->blockBoxStyleComputer;
						}
					}break;
					case 29:
					{
						if($elementRenderer->isReplaced() === true) {
							return $this->embeddedInlineBlockBoxStylesComputer;
						} else {
							return $this->inlineBlockBoxStylesComputer;
						}
					}break;
					case 30:
					{
						if($elementRenderer->isReplaced() === true) {
							return $this->embeddedInlineBoxStylesComputer;
						} else {
							return $this->inlineBoxStylesComputer;
						}
					}break;
					default:{
						return null;
					}break;
					}
				}break;
				default:{
					return null;
				}break;
				}
			}
		}
	}
	public $positionedBoxStylesComputer;
	public $inlineBoxStylesComputer;
	public $inlineBlockBoxStylesComputer;
	public $floatBoxStylesComputer;
	public $embeddedPositionedBoxStylesComputer;
	public $embeddedInlineBoxStylesComputer;
	public $embeddedInlineBlockBoxStylesComputer;
	public $embeddedFloatBoxStylesComputer;
	public $embeddedBlockBoxStylesComputer;
	public $blockBoxStyleComputer;
	public $blockFormattingContext;
	public $inlineFormattingContext;
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
	function __toString() { return 'cocktail.core.layout.LayoutManager'; }
}

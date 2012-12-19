<?php

class cocktail_core_linebox_LineBox extends cocktail_core_utils_FastNode {
	public function __construct($elementRenderer) {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.linebox.LineBox::new");
		$»spos = $GLOBALS['%s']->length;
		parent::__construct();
		$this->bounds = new cocktail_core_geom_RectangleVO();
		$this->elementRenderer = $elementRenderer;
		$this->marginLeft = 0;
		$this->marginRight = 0;
		$this->paddingLeft = 0;
		$this->paddingRight = 0;
		$this->leadedAscent = $this->getLeadedAscent();
		$this->leadedDescent = $this->getLeadedDescent();
		$GLOBALS['%s']->pop();
	}}
	public function get_bounds() {
		$GLOBALS['%s']->push("cocktail.core.linebox.LineBox::get_bounds");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->bounds;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getLeadedDescent() {
		$GLOBALS['%s']->push("cocktail.core.linebox.LineBox::getLeadedDescent");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return 0;
		}
		$GLOBALS['%s']->pop();
	}
	public function getLeadedAscent() {
		$GLOBALS['%s']->push("cocktail.core.linebox.LineBox::getLeadedAscent");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return 0;
		}
		$GLOBALS['%s']->pop();
	}
	public function doGetBounds($childBounds, $globalBounds) {
		$GLOBALS['%s']->push("cocktail.core.linebox.LineBox::doGetBounds");
		$»spos = $GLOBALS['%s']->length;
		if($childBounds->x < $globalBounds->x) {
			$globalBounds->x = $childBounds->x;
		}
		if($childBounds->y < $globalBounds->y) {
			$globalBounds->y = $childBounds->y;
		}
		if($childBounds->x + $childBounds->width > $globalBounds->x + $globalBounds->width) {
			$globalBounds->width = $childBounds->x + $childBounds->width - $globalBounds->x;
		}
		if($childBounds->y + $childBounds->height > $globalBounds->y + $globalBounds->height) {
			$globalBounds->height = $childBounds->y + $childBounds->height - $globalBounds->y;
		}
		$GLOBALS['%s']->pop();
	}
	public function getLineBoxesBounds($rootLineBox, $bounds) {
		$GLOBALS['%s']->push("cocktail.core.linebox.LineBox::getLineBoxesBounds");
		$»spos = $GLOBALS['%s']->length;
		$child = $rootLineBox->firstChild;
		while($child !== null) {
			if($child->isStaticPosition() === false) {
				$this->doGetBounds($child->get_bounds(), $bounds);
				if($child->firstChild !== null) {
					$this->getLineBoxesBounds($child, $bounds);
				}
			}
			$child = $child->nextSibling;
		}
		$GLOBALS['%s']->pop();
	}
	public function getBaselineOffset($parentBaselineOffset, $parentXHeight) {
		$GLOBALS['%s']->push("cocktail.core.linebox.LineBox::getBaselineOffset");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return $parentBaselineOffset;
		}
		$GLOBALS['%s']->pop();
	}
	public function isEmbedded() {
		$GLOBALS['%s']->push("cocktail.core.linebox.LineBox::isEmbedded");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function isStaticPosition() {
		$GLOBALS['%s']->push("cocktail.core.linebox.LineBox::isStaticPosition");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function isSpace() {
		$GLOBALS['%s']->push("cocktail.core.linebox.LineBox::isSpace");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function isText() {
		$GLOBALS['%s']->push("cocktail.core.linebox.LineBox::isText");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function render($graphicContext) {
		$GLOBALS['%s']->push("cocktail.core.linebox.LineBox::render");
		$»spos = $GLOBALS['%s']->length;
		$this->getLineBoxesBounds($this, $this->get_bounds());
		$this->get_bounds()->x = $this->get_bounds()->x + $this->elementRenderer->get_globalBounds()->x - $this->elementRenderer->scrollOffset->x;
		$this->get_bounds()->y = $this->elementRenderer->get_globalBounds()->y - $this->elementRenderer->scrollOffset->y;
		cocktail_core_background_BackgroundManager::render($graphicContext, $this->get_bounds(), $this->elementRenderer->coreStyle, $this->elementRenderer);
		$GLOBALS['%s']->pop();
	}
	public function dispose() {
		$GLOBALS['%s']->push("cocktail.core.linebox.LineBox::dispose");
		$»spos = $GLOBALS['%s']->length;
		$this->elementRenderer = null;
		$GLOBALS['%s']->pop();
	}
	public $paddingRight;
	public $paddingLeft;
	public $marginRight;
	public $marginLeft;
	public $leadedDescent;
	public $leadedAscent;
	public $bounds;
	public $elementRenderer;
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
	static $__properties__ = array("get_bounds" => "get_bounds");
	function __toString() { return 'cocktail.core.linebox.LineBox'; }
}

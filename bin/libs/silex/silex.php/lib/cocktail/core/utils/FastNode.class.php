<?php

class cocktail_core_utils_FastNode {
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.utils.FastNode::new");
		$»spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}}
	public function insertBefore($newChild, $refChild) {
		$GLOBALS['%s']->push("cocktail.core.utils.FastNode::insertBefore");
		$»spos = $GLOBALS['%s']->length;
		if($this->firstChild === null || $refChild === null) {
			$this->appendChild($newChild);
			{
				$GLOBALS['%s']->pop();
				return;
			}
		}
		$this->removeFromParentIfNecessary($newChild);
		$newChild->parentNode = $this;
		$oldPreviousSibling = $refChild->previousSibling;
		if($oldPreviousSibling === null) {
			$this->firstChild = $newChild;
			$refChild->previousSibling = $newChild;
			$newChild->nextSibling = $refChild;
			$newChild->previousSibling = null;
		} else {
			$oldPreviousSibling->nextSibling = $newChild;
			$refChild->previousSibling = $newChild;
			$newChild->previousSibling = $oldPreviousSibling;
			$newChild->nextSibling = $refChild;
		}
		$GLOBALS['%s']->pop();
	}
	public function removeFromParentIfNecessary($newChild) {
		$GLOBALS['%s']->push("cocktail.core.utils.FastNode::removeFromParentIfNecessary");
		$»spos = $GLOBALS['%s']->length;
		if($newChild->parentNode !== null) {
			$parentNode = $newChild->parentNode;
			$parentNode->removeChild($newChild);
		}
		$GLOBALS['%s']->pop();
	}
	public function appendChild($newChild) {
		$GLOBALS['%s']->push("cocktail.core.utils.FastNode::appendChild");
		$»spos = $GLOBALS['%s']->length;
		$this->removeFromParentIfNecessary($newChild);
		$newChild->parentNode = $this;
		if($this->firstChild === null) {
			$this->firstChild = $newChild;
			$this->lastChild = $newChild;
			$newChild->previousSibling = null;
			$newChild->nextSibling = null;
		} else {
			$oldLastChild = $this->lastChild;
			$this->lastChild = $newChild;
			$oldLastChild->nextSibling = $newChild;
			$newChild->previousSibling = $oldLastChild;
			$newChild->nextSibling = null;
		}
		$GLOBALS['%s']->pop();
	}
	public function removeChild($oldChild) {
		$GLOBALS['%s']->push("cocktail.core.utils.FastNode::removeChild");
		$»spos = $GLOBALS['%s']->length;
		$oldChild->parentNode = null;
		if($this->firstChild == $oldChild && $this->lastChild == $oldChild) {
			$this->firstChild = null;
			$this->lastChild = null;
		} else {
			if($this->firstChild == $oldChild) {
				$nextSibling = $oldChild->nextSibling;
				$this->firstChild = $nextSibling;
				if($nextSibling !== null) {
					$nextSibling->previousSibling = null;
				}
			} else {
				if($this->lastChild == $oldChild) {
					$previousSibling = $oldChild->previousSibling;
					$this->lastChild = $previousSibling;
					if($previousSibling !== null) {
						$previousSibling->nextSibling = null;
					}
				} else {
					$previousSibling = $oldChild->previousSibling;
					$nextSibling = $oldChild->nextSibling;
					$previousSibling->nextSibling = $nextSibling;
					$nextSibling->previousSibling = $previousSibling;
				}
			}
		}
		$oldChild->previousSibling = null;
		$oldChild->nextSibling = null;
		$GLOBALS['%s']->pop();
	}
	public $previousSibling;
	public $nextSibling;
	public $lastChild;
	public $firstChild;
	public $parentNode;
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
	function __toString() { return 'cocktail.core.utils.FastNode'; }
}

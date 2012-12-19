<?php

class cocktail_core_css_StyleDeclarationVO implements cocktail_core_utils_IPoolable{
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.css.StyleDeclarationVO::new");
		$»spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}}
	public function reset() {
		$GLOBALS['%s']->push("cocktail.core.css.StyleDeclarationVO::reset");
		$»spos = $GLOBALS['%s']->length;
		$this->style = null;
		$this->selector = null;
		$GLOBALS['%s']->pop();
	}
	public $selector;
	public $style;
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
	static $_pool;
	static function getPool() {
		$GLOBALS['%s']->push("cocktail.core.css.StyleDeclarationVO::getPool");
		$»spos = $GLOBALS['%s']->length;
		if(cocktail_core_css_StyleDeclarationVO::$_pool === null) {
			cocktail_core_css_StyleDeclarationVO::$_pool = new cocktail_core_utils_ObjectPool(_hx_qtype("cocktail.core.css.StyleDeclarationVO"));
		}
		{
			$»tmp = cocktail_core_css_StyleDeclarationVO::$_pool;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'cocktail.core.css.StyleDeclarationVO'; }
}

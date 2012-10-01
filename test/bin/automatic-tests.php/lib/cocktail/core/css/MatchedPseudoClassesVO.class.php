<?php

class cocktail_core_css_MatchedPseudoClassesVO {
	public function __construct($hover, $focus, $active, $link, $enabled, $disabled, $checked) {
		if(!php_Boot::$skip_constructor) {
		$this->hover = $hover;
		$this->focus = $focus;
		$this->active = $active;
		$this->link = $link;
		$this->enabled = $enabled;
		$this->disabled = $disabled;
		$this->checked = $checked;
	}}
	public $checked;
	public $disabled;
	public $enabled;
	public $link;
	public $active;
	public $focus;
	public $hover;
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
	function __toString() { return 'cocktail.core.css.MatchedPseudoClassesVO'; }
}

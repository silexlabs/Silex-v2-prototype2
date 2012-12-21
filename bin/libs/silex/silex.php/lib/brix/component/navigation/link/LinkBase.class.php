<?php

class brix_component_navigation_link_LinkBase extends brix_component_ui_DisplayObject implements brix_component_group_IGroupable{
	public function __construct($rootElement, $brixId) {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("brix.component.navigation.link.LinkBase::new");
		$»spos = $GLOBALS['%s']->length;
		parent::__construct($rootElement,$brixId);
		brix_component_group_Groupable::startGroupable($this, null);
		$rootElement->addEventListener("click", (isset($this->onClick) ? $this->onClick: array($this, "onClick")), false);
		$rootElement->style->set_cursor("pointer");
		if($rootElement->getAttribute("href") !== null) {
			$this->linkName = trim($rootElement->getAttribute("href"));
			$this->linkName = _hx_substr($this->linkName, _hx_index_of($this->linkName, "#", null) + 1, null);
		} else {
			if($rootElement->getAttribute("data-href") !== null) {
				$this->linkName = trim($rootElement->getAttribute("data-href"));
			}
		}
		if($rootElement->getAttribute("target") !== null && trim($rootElement->getAttribute("target")) !== "") {
			$this->targetAttr = trim($rootElement->getAttribute("target"));
		}
		$GLOBALS['%s']->pop();
	}}
	public function onClick($e) {
		$GLOBALS['%s']->push("brix.component.navigation.link.LinkBase::onClick");
		$»spos = $GLOBALS['%s']->length;
		$e->preventDefault();
		$this->transitionDataShow = brix_component_navigation_transition_TransitionTools::getTransitionData($this->rootElement, brix_component_navigation_transition_TransitionType::$show);
		$this->transitionDataHide = brix_component_navigation_transition_TransitionTools::getTransitionData($this->rootElement, brix_component_navigation_transition_TransitionType::$hide);
		$GLOBALS['%s']->pop();
	}
	public $transitionDataHide;
	public $transitionDataShow;
	public $targetAttr;
	public $linkName;
	public $groupElement;
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
	static function __meta__() { $»args = func_get_args(); return call_user_func_array(self::$__meta__, $»args); }
	static $__meta__;
	static $CONFIG_PAGE_NAME_ATTR = "href";
	static $CONFIG_PAGE_NAME_DATA_ATTR = "data-href";
	static $CONFIG_TARGET_ATTR = "target";
	static $CONFIG_TARGET_IS_POPUP = "_top";
	function __toString() { return 'brix.component.navigation.link.LinkBase'; }
}
brix_component_navigation_link_LinkBase::$__meta__ = _hx_anonymous(array("obj" => _hx_anonymous(array("tagNameFilter" => new _hx_array(array("a", "div"))))));

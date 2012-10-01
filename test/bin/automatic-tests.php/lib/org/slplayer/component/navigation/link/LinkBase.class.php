<?php

class org_slplayer_component_navigation_link_LinkBase extends org_slplayer_component_ui_DisplayObject implements org_slplayer_component_group_IGroupable{
	public function __construct($rootElement, $SLPId) {
		if(!php_Boot::$skip_constructor) {
		parent::__construct($rootElement,$SLPId);
		org_slplayer_component_group_Groupable::startGroupable($this);
		$rootElement->addEventListener("click", (isset($this->onClick) ? $this->onClick: array($this, "onClick")), false);
		if($rootElement->getAttribute("href") !== null) {
			$this->linkName = trim($rootElement->getAttribute("href"));
			$this->linkName = _hx_substr($this->linkName, _hx_index_of($this->linkName, "#", null) + 1, null);
		} else {
			haxe_Log::trace("Warning: the link has no href atribute (" . Std::string($rootElement) . ")", _hx_anonymous(array("fileName" => "LinkBase.hx", "lineNumber" => 93, "className" => "org.slplayer.component.navigation.link.LinkBase", "methodName" => "new")));
		}
		if($rootElement->getAttribute("target") !== null && trim($rootElement->getAttribute("target")) !== "") {
			$this->targetAttr = trim($rootElement->getAttribute("target"));
		}
	}}
	public function onClick($e) {
		$e->preventDefault();
		$this->transitionDataShow = org_slplayer_component_navigation_transition_TransitionTools::getTransitionData($this->rootElement, org_slplayer_component_navigation_transition_TransitionType::$show);
		$this->transitionDataHide = org_slplayer_component_navigation_transition_TransitionTools::getTransitionData($this->rootElement, org_slplayer_component_navigation_transition_TransitionType::$hide);
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
	static $CONFIG_TARGET_ATTR = "target";
	static $CONFIG_TARGET_IS_POPUP = "_top";
	function __toString() { return 'org.slplayer.component.navigation.link.LinkBase'; }
}
org_slplayer_component_navigation_link_LinkBase::$__meta__ = _hx_anonymous(array("obj" => _hx_anonymous(array("tagNameFilter" => new _hx_array(array("a"))))));

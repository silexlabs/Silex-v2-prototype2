<?php

class org_slplayer_component_navigation_LinkBase extends org_slplayer_component_ui_DisplayObject {
	public function __construct($rootElement, $SLPId) {
		if(!php_Boot::$skip_constructor) {
		parent::__construct($rootElement,$SLPId);
		$this->transitionData = new org_slplayer_component_transition_TransitionData(null, "0", null, null, null);
		$rootElement->addEventListener("click", (isset($this->onClick) ? $this->onClick: array($this, "onClick")), false);
		if($rootElement->getAttribute("href") !== null) {
			$this->linkName = trim($rootElement->getAttribute("href"));
			$this->linkName = _hx_substr($this->linkName, _hx_index_of($this->linkName, "#", null) + 1, null);
		}
		if($rootElement->getAttribute("target") !== null && trim($rootElement->getAttribute("target")) !== "") {
			$this->targetAttr = trim($rootElement->getAttribute("target"));
		}
	}}
	public function linkToPage($page, $targetAttr = null) {
	}
	public function linkToPagesWithName($linkName, $targetAttr = null) {
		$pages = cocktail_Lib::get_document()->getElementsByClassName("Page");
		{
			$_g1 = 0; $_g = $pages->length;
			while($_g1 < $_g) {
				$pageIdx = $_g1++;
				if(_hx_array_get($pages, $pageIdx)->getAttribute("name") === $linkName) {
					$pageInstances = $this->getSLPlayer()->getAssociatedComponents($pages[$pageIdx], _hx_qtype("org.slplayer.component.navigation.Page"));
					if(null == $pageInstances) throw new HException('null iterable');
					$»it = $pageInstances->iterator();
					while($»it->hasNext()) {
						$page = $»it->next();
						$this->linkToPage($page, $targetAttr);
					}
					return;
					unset($pageInstances);
				}
				unset($pageIdx);
			}
		}
	}
	public function onClick($e) {
		$this->transitionData = new org_slplayer_component_transition_TransitionData(null, $this->rootElement->getAttribute("data-transition-duration"), $this->rootElement->getAttribute("data-transition-timing-function"), $this->rootElement->getAttribute("data-transition-delay"), $this->rootElement->getAttribute("data-transition-is-reversed") === null);
		$this->linkToPagesWithName($this->linkName, $this->targetAttr);
	}
	public $transitionData;
	public $targetAttr;
	public $linkName;
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
	static $CONFIG_TRANSITION_DURATION = "data-transition-duration";
	static $CONFIG_TRANSITION_TIMING_FUNCTION = "data-transition-timing-function";
	static $CONFIG_TRANSITION_DELAY = "data-transition-delay";
	static $CONFIG_TRANSITION_IS_REVERSED = "data-transition-is-reversed";
	function __toString() { return 'org.slplayer.component.navigation.LinkBase'; }
}
org_slplayer_component_navigation_LinkBase::$__meta__ = _hx_anonymous(array("obj" => _hx_anonymous(array("tagNameFilter" => new _hx_array(array("a"))))));

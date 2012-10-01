<?php

class org_slplayer_component_navigation_Page extends org_slplayer_component_ui_DisplayObject implements org_slplayer_component_group_IGroupable{
	public function __construct($rootElement, $SLPId) {
		if(!php_Boot::$skip_constructor) {
		parent::__construct($rootElement,$SLPId);
		org_slplayer_component_group_Groupable::startGroupable($this);
		$this->name = $rootElement->getAttribute("name");
		if($this->name === null || $this->name === "") {
			throw new HException("Pages have to have a 'name' attribute");
		}
	}}
	public function close($transitionData = null, $preventCloseByClassName = null, $preventTransitions = null) {
		if($preventTransitions === null) {
			$preventTransitions = false;
		}
		haxe_Log::trace("close " . Std::string($transitionData) . ", " . $this->name . " - " . Std::string($preventTransitions) . " - " . Std::string($this->groupElement), _hx_anonymous(array("fileName" => "Page.hx", "lineNumber" => 262, "className" => "org.slplayer.component.navigation.Page", "methodName" => "close")));
		if($preventCloseByClassName === null) {
			$preventCloseByClassName = new _hx_array(array());
		}
		$nodes = org_slplayer_component_navigation_Layer::getLayerNodes($this->name, $this->SLPlayerInstanceId, $this->groupElement);
		{
			$_g1 = 0; $_g = $nodes->length;
			while($_g1 < $_g) {
				$idxLayerNode = $_g1++;
				$layerNode = $nodes[$idxLayerNode];
				$hasForbiddenClass = false;
				{
					$_g2 = 0;
					while($_g2 < $preventCloseByClassName->length) {
						$className = $preventCloseByClassName[$_g2];
						++$_g2;
						if(org_slplayer_util_DomTools::hasClass($layerNode, $className)) {
							$hasForbiddenClass = true;
							break;
						}
						unset($className);
					}
					unset($_g2);
				}
				if(!$hasForbiddenClass) {
					$layerInstances = $this->getSLPlayer()->getAssociatedComponents($layerNode, _hx_qtype("org.slplayer.component.navigation.Layer"));
					if(null == $layerInstances) throw new HException('null iterable');
					$»it = $layerInstances->iterator();
					while($»it->hasNext()) {
						$layerInstance = $»it->next();
						_hx_deref(($layerInstance))->hide($transitionData, $preventTransitions);
					}
					unset($layerInstances);
				}
				unset($layerNode,$idxLayerNode,$hasForbiddenClass);
			}
		}
		$nodes1 = org_slplayer_util_DomTools::getElementsByAttribute($this->groupElement, "href", $this->name);
		{
			$_g1 = 0; $_g = $nodes1->length;
			while($_g1 < $_g) {
				$idxLayerNode = $_g1++;
				$element = $nodes1[$idxLayerNode];
				org_slplayer_util_DomTools::removeClass($element, "page-opened");
				unset($idxLayerNode,$element);
			}
		}
		$nodes2 = org_slplayer_util_DomTools::getElementsByAttribute($this->groupElement, "href", "#" . $this->name);
		{
			$_g1 = 0; $_g = $nodes2->length;
			while($_g1 < $_g) {
				$idxLayerNode = $_g1++;
				$element = $nodes2[$idxLayerNode];
				org_slplayer_util_DomTools::removeClass($element, "page-opened");
				unset($idxLayerNode,$element);
			}
		}
	}
	public function doOpen($transitionData = null, $preventTransitions = null) {
		if($preventTransitions === null) {
			$preventTransitions = false;
		}
		$nodes = org_slplayer_component_navigation_Layer::getLayerNodes($this->name, $this->SLPlayerInstanceId, $this->groupElement);
		{
			$_g1 = 0; $_g = $nodes->length;
			while($_g1 < $_g) {
				$idxLayerNode = $_g1++;
				$layerNode = $nodes[$idxLayerNode];
				$layerInstances = $this->getSLPlayer()->getAssociatedComponents($layerNode, _hx_qtype("org.slplayer.component.navigation.Layer"));
				if(null == $layerInstances) throw new HException('null iterable');
				$»it = $layerInstances->iterator();
				while($»it->hasNext()) {
					$layerInstance = $»it->next();
					$layerInstance->show($transitionData, $preventTransitions);
				}
				unset($layerNode,$layerInstances,$idxLayerNode);
			}
		}
		$nodes1 = org_slplayer_util_DomTools::getElementsByAttribute($this->groupElement, "href", $this->name);
		{
			$_g1 = 0; $_g = $nodes1->length;
			while($_g1 < $_g) {
				$idxLayerNode = $_g1++;
				$element = $nodes1[$idxLayerNode];
				org_slplayer_util_DomTools::addClass($element, "page-opened");
				unset($idxLayerNode,$element);
			}
		}
		$nodes2 = org_slplayer_util_DomTools::getElementsByAttribute($this->groupElement, "href", "#" . $this->name);
		{
			$_g1 = 0; $_g = $nodes2->length;
			while($_g1 < $_g) {
				$idxLayerNode = $_g1++;
				$element = $nodes2[$idxLayerNode];
				org_slplayer_util_DomTools::addClass($element, "page-opened");
				unset($idxLayerNode,$element);
			}
		}
	}
	public function closeOthers($transitionData = null, $preventTransitions = null) {
		if($preventTransitions === null) {
			$preventTransitions = false;
		}
		$nodes = org_slplayer_component_navigation_Page::getPageNodes($this->SLPlayerInstanceId, $this->groupElement);
		{
			$_g1 = 0; $_g = $nodes->length;
			while($_g1 < $_g) {
				$idxPageNode = $_g1++;
				$pageNode = $nodes[$idxPageNode];
				$pageInstances = $this->getSLPlayer()->getAssociatedComponents($pageNode, _hx_qtype("org.slplayer.component.navigation.Page"));
				if(null == $pageInstances) throw new HException('null iterable');
				$»it = $pageInstances->iterator();
				while($»it->hasNext()) {
					$pageInstance = $»it->next();
					if($pageInstance !== $this) {
						$pageInstance->close($transitionData, new _hx_array(array($this->name)), $preventTransitions);
					}
				}
				unset($pageNode,$pageInstances,$idxPageNode);
			}
		}
	}
	public function open($transitionDataShow = null, $transitionDataHide = null, $doCloseOthers = null, $preventTransitions = null) {
		if($preventTransitions === null) {
			$preventTransitions = false;
		}
		if($doCloseOthers === null) {
			$doCloseOthers = true;
		}
		if($doCloseOthers) {
			$this->closeOthers($transitionDataHide, $preventTransitions);
		}
		$this->doOpen($transitionDataShow, $preventTransitions);
	}
	public function init() {
		parent::init();
		if($this->groupElement === null) {
			$this->groupElement = cocktail_Lib::get_document()->body;
		}
		if(org_slplayer_util_DomTools::getMeta("initialPageName", null, null) === $this->name || $this->groupElement->getAttribute("data-initial-page-name") === $this->name) {
			org_slplayer_util_DomTools::doLater(org_slplayer_component_navigation_Page_0($this), null);
		}
	}
	public $groupElement;
	public $name;
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
	static $CLASS_NAME = "Page";
	static $CONFIG_NAME_ATTR = "name";
	static $CONFIG_INITIAL_PAGE_NAME = "initialPageName";
	static $ATTRIBUTE_INITIAL_PAGE_NAME = "data-initial-page-name";
	static $OPENED_PAGE_CSS_CLASS = "page-opened";
	static function openPage($pageName, $isPopup, $transitionDataShow, $transitionDataHide, $slPlayerId, $root = null) {
		$document = $root;
		if($root === null) {
			$document = cocktail_Lib::get_document()->documentElement;
		}
		$page = org_slplayer_component_navigation_Page::getPageByName($pageName, $slPlayerId, $document);
		if($page === null) {
			$page = org_slplayer_component_navigation_Page::getPageByName($pageName, $slPlayerId, null);
			if($page === null) {
				throw new HException("Error, could not find a page with name " . $pageName);
			}
		}
		$page->open($transitionDataShow, $transitionDataHide, !$isPopup, null);
	}
	static function closePage($pageName, $transitionData, $slPlayerId, $root = null) {
		$document = $root;
		if($root === null) {
			$document = cocktail_Lib::get_document()->documentElement;
		}
		$page = org_slplayer_component_navigation_Page::getPageByName($pageName, $slPlayerId, $document);
		if($page === null) {
			$page = org_slplayer_component_navigation_Page::getPageByName($pageName, $slPlayerId, null);
			if($page === null) {
				throw new HException("Error, could not find a page with name " . $pageName);
			}
		}
		$page->close($transitionData, null, null);
	}
	static function getPageNodes($slPlayerId, $root = null) {
		$document = $root;
		if($root === null) {
			$document = cocktail_Lib::get_document()->documentElement;
		}
		return $document->getElementsByClassName("Page");
	}
	static function getPageByName($pageName, $slPlayerId, $root = null) {
		$document = $root;
		if($root === null) {
			$document = cocktail_Lib::get_document()->documentElement;
		}
		$pages = org_slplayer_component_navigation_Page::getPageNodes($slPlayerId, $document);
		{
			$_g1 = 0; $_g = $pages->length;
			while($_g1 < $_g) {
				$pageIdx = $_g1++;
				if(_hx_array_get($pages, $pageIdx)->getAttribute("name") === $pageName) {
					$pageInstances = org_slplayer_core_Application::get($slPlayerId)->getAssociatedComponents($pages[$pageIdx], _hx_qtype("org.slplayer.component.navigation.Page"));
					if(null == $pageInstances) throw new HException('null iterable');
					$»it = $pageInstances->iterator();
					while($»it->hasNext()) {
						$page = $»it->next();
						return $page;
					}
					return null;
					unset($pageInstances);
				}
				unset($pageIdx);
			}
		}
		return null;
	}
	function __toString() { return 'org.slplayer.component.navigation.Page'; }
}
org_slplayer_component_navigation_Page::$__meta__ = _hx_anonymous(array("obj" => _hx_anonymous(array("tagNameFilter" => new _hx_array(array("a"))))));
function org_slplayer_component_navigation_Page_0(&$»this) {
	{
		$f = (isset($»this->open) ? $»this->open: array($»this, "open"));
		return array(new _hx_lambda(array(&$f), "org_slplayer_component_navigation_Page_1"), 'execute');
	}
}
function org_slplayer_component_navigation_Page_1(&$f) {
	{
		call_user_func_array($f, array(null, null, true, true));
		return;
	}
}

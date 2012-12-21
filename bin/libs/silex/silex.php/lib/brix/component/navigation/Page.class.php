<?php

class brix_component_navigation_Page extends brix_component_ui_DisplayObject implements brix_component_group_IGroupable{
	public function __construct($rootElement, $brixId) {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("brix.component.navigation.Page::new");
		$»spos = $GLOBALS['%s']->length;
		parent::__construct($rootElement,$brixId);
		brix_component_group_Groupable::startGroupable($this, null);
		if($this->groupElement === null) {
			$this->groupElement = $this->getBrixApplication()->body;
		}
		$this->name = $rootElement->getAttribute("name");
		if($this->name === null || trim($this->name) === "") {
			throw new HException("Pages must have a 'name' attribute");
		}
		if(brix_component_navigation_Page::$useDeeplink === null) {
			brix_component_navigation_Page::$useDeeplink = brix_util_DomTools::getMeta("useDeeplink", null, null) === null || brix_util_DomTools::getMeta("useDeeplink", null, null) === "true";
		}
		if(brix_component_navigation_Page::$useDeeplink) {
			cocktail_Lib::get_window()->addEventListener("popstate", (isset($this->onPopState) ? $this->onPopState: array($this, "onPopState")), true);
		}
		$GLOBALS['%s']->pop();
	}}
	public function close($transitionData = null, $preventCloseByClassName = null, $preventTransitions = null) {
		$GLOBALS['%s']->push("brix.component.navigation.Page::close");
		$»spos = $GLOBALS['%s']->length;
		if($preventTransitions === null) {
			$preventTransitions = false;
		}
		$transitionObserver = new brix_component_navigation_transition_TransitionObserver($this, "pageCloseStart", "pageCloseStop");
		if($preventCloseByClassName === null) {
			$preventCloseByClassName = new _hx_array(array());
		}
		$nodes = brix_component_navigation_Layer::getLayerNodes($this->name, $this->brixInstanceId, $this->groupElement);
		$layersToBeClosed = new _hx_array(array());
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
						if(brix_util_DomTools::hasClass($layerNode, $className, null)) {
							$hasForbiddenClass = true;
						}
						unset($className);
					}
					unset($_g2);
				}
				if(!$hasForbiddenClass) {
					$layerInstances = $this->getBrixApplication()->getAssociatedComponents($layerNode, _hx_qtype("brix.component.navigation.Layer"));
					if(null == $layerInstances) throw new HException('null iterable');
					$»it = $layerInstances->iterator();
					while($»it->hasNext()) {
						$layerInstance = $»it->next();
						$layersToBeClosed->push($layerInstance);
					}
					unset($layerInstances);
				}
				unset($layerNode,$idxLayerNode,$hasForbiddenClass);
			}
		}
		{
			$_g = 0;
			while($_g < $layersToBeClosed->length) {
				$layerInstance = $layersToBeClosed[$_g];
				++$_g;
				$layerInstance->hide($transitionData, $transitionObserver, $preventTransitions);
				unset($layerInstance);
			}
		}
		$nodes1 = brix_util_DomTools::getElementsByAttribute($this->groupElement, "href", $this->name);
		{
			$_g1 = 0; $_g = $nodes1->length;
			while($_g1 < $_g) {
				$idxLayerNode = $_g1++;
				$element = $nodes1[$idxLayerNode];
				brix_util_DomTools::removeClass($element, "page-opened");
				unset($idxLayerNode,$element);
			}
		}
		$nodes2 = brix_util_DomTools::getElementsByAttribute($this->groupElement, "href", "#" . $this->name);
		{
			$_g1 = 0; $_g = $nodes2->length;
			while($_g1 < $_g) {
				$idxLayerNode = $_g1++;
				$element = $nodes2[$idxLayerNode];
				brix_util_DomTools::removeClass($element, "page-opened");
				unset($idxLayerNode,$element);
			}
		}
		$GLOBALS['%s']->pop();
	}
	public function doOpen($transitionData = null, $preventTransitions = null) {
		$GLOBALS['%s']->push("brix.component.navigation.Page::doOpen");
		$»spos = $GLOBALS['%s']->length;
		if($preventTransitions === null) {
			$preventTransitions = false;
		}
		$transitionObserver = new brix_component_navigation_transition_TransitionObserver($this, "pageOpenStart", "pageOpenStop");
		$nodes = brix_component_navigation_Layer::getLayerNodes($this->name, $this->brixInstanceId, $this->groupElement);
		{
			$_g1 = 0; $_g = $nodes->length;
			while($_g1 < $_g) {
				$idxLayerNode = $_g1++;
				$layerNode = $nodes[$idxLayerNode];
				$layerInstances = $this->getBrixApplication()->getAssociatedComponents($layerNode, _hx_qtype("brix.component.navigation.Layer"));
				if(null == $layerInstances) throw new HException('null iterable');
				$»it = $layerInstances->iterator();
				while($»it->hasNext()) {
					$layerInstance = $»it->next();
					$layerInstance->show($transitionData, $transitionObserver, $preventTransitions);
				}
				unset($layerNode,$layerInstances,$idxLayerNode);
			}
		}
		$nodes1 = brix_util_DomTools::getElementsByAttribute($this->groupElement, "href", $this->name);
		{
			$_g1 = 0; $_g = $nodes1->length;
			while($_g1 < $_g) {
				$idxLayerNode = $_g1++;
				$element = $nodes1[$idxLayerNode];
				brix_util_DomTools::addClass($element, "page-opened");
				unset($idxLayerNode,$element);
			}
		}
		$nodes2 = brix_util_DomTools::getElementsByAttribute($this->groupElement, "href", "#" . $this->name);
		{
			$_g1 = 0; $_g = $nodes2->length;
			while($_g1 < $_g) {
				$idxLayerNode = $_g1++;
				$element = $nodes2[$idxLayerNode];
				brix_util_DomTools::addClass($element, "page-opened");
				unset($idxLayerNode,$element);
			}
		}
		$GLOBALS['%s']->pop();
	}
	public function closeOthers($transitionData = null, $preventTransitions = null) {
		$GLOBALS['%s']->push("brix.component.navigation.Page::closeOthers");
		$»spos = $GLOBALS['%s']->length;
		if($preventTransitions === null) {
			$preventTransitions = false;
		}
		$nodes = brix_component_navigation_Page::getPageNodes($this->brixInstanceId, $this->groupElement);
		{
			$_g1 = 0; $_g = $nodes->length;
			while($_g1 < $_g) {
				$idxPageNode = $_g1++;
				$pageNode = $nodes[$idxPageNode];
				$pageInstances = $this->getBrixApplication()->getAssociatedComponents($pageNode, _hx_qtype("brix.component.navigation.Page"));
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
		$GLOBALS['%s']->pop();
	}
	public function open($transitionDataShow = null, $transitionDataHide = null, $doCloseOthers = null, $preventTransitions = null, $recordInHistory = null) {
		$GLOBALS['%s']->push("brix.component.navigation.Page::open");
		$»spos = $GLOBALS['%s']->length;
		if($recordInHistory === null) {
			$recordInHistory = true;
		}
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
		if($recordInHistory && brix_component_navigation_Page::$useDeeplink) {
			cocktail_Lib::get_window()->history->pushState(_hx_anonymous(array("name" => $this->name, "transitionDataShow" => $transitionDataShow, "transitionDataHide" => $transitionDataHide, "doCloseOthers" => $doCloseOthers, "preventTransitions" => $preventTransitions)), $this->name, "?/" . $this->name);
		}
		$GLOBALS['%s']->pop();
	}
	public function setPageName($newPageName) {
		$GLOBALS['%s']->push("brix.component.navigation.Page::setPageName");
		$»spos = $GLOBALS['%s']->length;
		$this->rootElement->setAttribute("name", $newPageName);
		$this->name = $newPageName;
		{
			$GLOBALS['%s']->pop();
			return $newPageName;
		}
		$GLOBALS['%s']->pop();
	}
	public function init() {
		$GLOBALS['%s']->push("brix.component.navigation.Page::init");
		$»spos = $GLOBALS['%s']->length;
		parent::init();
		if(brix_util_DomTools::getMeta("initialPageName", null, null) === $this->name || $this->groupElement->getAttribute("data-initial-page-name") === $this->name) {
			$this->open(null, null, true, true, null);
		}
		$GLOBALS['%s']->pop();
	}
	public function onPopState($e) {
		$GLOBALS['%s']->push("brix.component.navigation.Page::onPopState");
		$»spos = $GLOBALS['%s']->length;
		$event = $e;
		if(_hx_field($event, "state") !== null && _hx_equal($event->state->name, $this->name)) {
			$this->open($event->state->transitionDataShow, $event->state->transitionDataHide, $event->state->doCloseOthers, $event->state->preventTransitions, false);
		}
		$GLOBALS['%s']->pop();
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
	static $CONFIG_USE_DEEPLINK = "useDeeplink";
	static $CONFIG_INITIAL_PAGE_NAME = "initialPageName";
	static $ATTRIBUTE_INITIAL_PAGE_NAME = "data-initial-page-name";
	static $OPENED_PAGE_CSS_CLASS = "page-opened";
	static $EVENT_TYPE_OPEN_START = "pageOpenStart";
	static $EVENT_TYPE_OPEN_STOP = "pageOpenStop";
	static $EVENT_TYPE_CLOSE_START = "pageCloseStart";
	static $EVENT_TYPE_CLOSE_STOP = "pageCloseStop";
	static $useDeeplink = null;
	static function openPage($pageName, $isPopup, $transitionDataShow, $transitionDataHide, $brixId, $root = null) {
		$GLOBALS['%s']->push("brix.component.navigation.Page::openPage");
		$»spos = $GLOBALS['%s']->length;
		$body = $root;
		if($root === null) {
			$body = brix_core_Application::get($brixId)->body;
		}
		$page = brix_component_navigation_Page::getPageByName($pageName, $brixId, $body);
		if($page === null) {
			$page = brix_component_navigation_Page::getPageByName($pageName, $brixId, null);
			if($page === null) {
				throw new HException("Error, could not find a page with name " . $pageName);
			}
		}
		$page->open($transitionDataShow, $transitionDataHide, !$isPopup, null, null);
		$GLOBALS['%s']->pop();
	}
	static function closePage($pageName, $transitionData, $brixId, $root = null) {
		$GLOBALS['%s']->push("brix.component.navigation.Page::closePage");
		$»spos = $GLOBALS['%s']->length;
		$body = $root;
		if($root === null) {
			$body = brix_core_Application::get($brixId)->body;
		}
		$page = brix_component_navigation_Page::getPageByName($pageName, $brixId, $body);
		if($page === null) {
			$page = brix_component_navigation_Page::getPageByName($pageName, $brixId, null);
			if($page === null) {
				throw new HException("Error, could not find a page with name " . $pageName);
			}
		}
		$page->close($transitionData, null, null);
		$GLOBALS['%s']->pop();
	}
	static function getPageNodes($brixId, $root = null) {
		$GLOBALS['%s']->push("brix.component.navigation.Page::getPageNodes");
		$»spos = $GLOBALS['%s']->length;
		$body = $root;
		if($root === null) {
			$body = brix_core_Application::get($brixId)->body;
		}
		{
			$»tmp = $body->getElementsByClassName("Page");
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function getPageByName($pageName, $brixId, $root = null) {
		$GLOBALS['%s']->push("brix.component.navigation.Page::getPageByName");
		$»spos = $GLOBALS['%s']->length;
		$body = $root;
		if($root === null) {
			$body = brix_core_Application::get($brixId)->body;
		}
		$pages = brix_component_navigation_Page::getPageNodes($brixId, $body);
		{
			$_g1 = 0; $_g = $pages->length;
			while($_g1 < $_g) {
				$pageIdx = $_g1++;
				if(_hx_array_get($pages, $pageIdx)->getAttribute("name") === $pageName) {
					$pageInstances = brix_core_Application::get($brixId)->getAssociatedComponents($pages[$pageIdx], _hx_qtype("brix.component.navigation.Page"));
					if(null == $pageInstances) throw new HException('null iterable');
					$»it = $pageInstances->iterator();
					while($»it->hasNext()) {
						$page = $»it->next();
						$GLOBALS['%s']->pop();
						return $page;
					}
					{
						$GLOBALS['%s']->pop();
						return null;
					}
					unset($pageInstances);
				}
				unset($pageIdx);
			}
		}
		{
			$GLOBALS['%s']->pop();
			return null;
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'brix.component.navigation.Page'; }
}
brix_component_navigation_Page::$__meta__ = _hx_anonymous(array("obj" => _hx_anonymous(array("tagNameFilter" => new _hx_array(array("a"))))));

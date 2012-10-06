<?php

class brix_component_navigation_Page extends brix_component_ui_DisplayObject implements brix_component_group_IGroupable{
	public function __construct($rootElement, $BrixId) {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("brix.component.navigation.Page::new");
		$»spos = $GLOBALS['%s']->length;
		parent::__construct($rootElement,$BrixId);
		brix_component_group_Groupable::startGroupable($this);
		$this->name = $rootElement->getAttribute("name");
		if($this->name === null || $this->name === "") {
			throw new HException("Pages have to have a 'name' attribute");
		}
		$GLOBALS['%s']->pop();
	}}
	public function close($transitionData = null, $preventCloseByClassName = null, $preventTransitions = null) {
		$GLOBALS['%s']->push("brix.component.navigation.Page::close");
		$»spos = $GLOBALS['%s']->length;
		if($preventTransitions === null) {
			$preventTransitions = false;
		}
		if($preventCloseByClassName === null) {
			$preventCloseByClassName = new _hx_array(array());
		}
		$nodes = brix_component_navigation_Layer::getLayerNodes($this->name, $this->brixInstanceId, $this->groupElement);
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
							break;
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
						_hx_deref(($layerInstance))->hide($transitionData, $preventTransitions);
					}
					unset($layerInstances);
				}
				unset($layerNode,$idxLayerNode,$hasForbiddenClass);
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
					$layerInstance->show($transitionData, $preventTransitions);
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
	public function open($transitionDataShow = null, $transitionDataHide = null, $doCloseOthers = null, $preventTransitions = null) {
		$GLOBALS['%s']->push("brix.component.navigation.Page::open");
		$»spos = $GLOBALS['%s']->length;
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
		$GLOBALS['%s']->pop();
	}
	public function init() {
		$GLOBALS['%s']->push("brix.component.navigation.Page::init");
		$»spos = $GLOBALS['%s']->length;
		parent::init();
		if($this->groupElement === null) {
			$this->groupElement = cocktail_Lib::get_document()->body;
		}
		if(brix_util_DomTools::getMeta("initialPageName", null, null) === $this->name || $this->groupElement->getAttribute("data-initial-page-name") === $this->name) {
			brix_util_DomTools::doLater(brix_component_navigation_Page_0($this), null);
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
	static $CONFIG_INITIAL_PAGE_NAME = "initialPageName";
	static $ATTRIBUTE_INITIAL_PAGE_NAME = "data-initial-page-name";
	static $OPENED_PAGE_CSS_CLASS = "page-opened";
	static function openPage($pageName, $isPopup, $transitionDataShow, $transitionDataHide, $brixId, $root = null) {
		$GLOBALS['%s']->push("brix.component.navigation.Page::openPage");
		$»spos = $GLOBALS['%s']->length;
		$document = $root;
		if($root === null) {
			$document = cocktail_Lib::get_document()->documentElement;
		}
		$page = brix_component_navigation_Page::getPageByName($pageName, $brixId, $document);
		if($page === null) {
			$page = brix_component_navigation_Page::getPageByName($pageName, $brixId, null);
			if($page === null) {
				throw new HException("Error, could not find a page with name " . $pageName);
			}
		}
		$page->open($transitionDataShow, $transitionDataHide, !$isPopup, null);
		$GLOBALS['%s']->pop();
	}
	static function closePage($pageName, $transitionData, $brixId, $root = null) {
		$GLOBALS['%s']->push("brix.component.navigation.Page::closePage");
		$»spos = $GLOBALS['%s']->length;
		$document = $root;
		if($root === null) {
			$document = cocktail_Lib::get_document()->documentElement;
		}
		$page = brix_component_navigation_Page::getPageByName($pageName, $brixId, $document);
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
		$document = $root;
		if($root === null) {
			$document = cocktail_Lib::get_document()->documentElement;
		}
		{
			$»tmp = $document->getElementsByClassName("Page");
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function getPageByName($pageName, $brixId, $root = null) {
		$GLOBALS['%s']->push("brix.component.navigation.Page::getPageByName");
		$»spos = $GLOBALS['%s']->length;
		$document = $root;
		if($root === null) {
			$document = cocktail_Lib::get_document()->documentElement;
		}
		$pages = brix_component_navigation_Page::getPageNodes($brixId, $document);
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
function brix_component_navigation_Page_0(&$»this) {
	$»spos = $GLOBALS['%s']->length;
	{
		$f = (isset($»this->open) ? $»this->open: array($»this, "open"));
		return array(new _hx_lambda(array(&$f), "brix_component_navigation_Page_1"), 'execute');
	}
}
function brix_component_navigation_Page_1(&$f) {
	$»spos = $GLOBALS['%s']->length;
	{
		$GLOBALS['%s']->push("brix.component.navigation.Page::getPageByName@193");
		$»spos2 = $GLOBALS['%s']->length;
		{
			$»tmp = call_user_func_array($f, array(null, null, true, true));
			$GLOBALS['%s']->pop();
			$»tmp;
			return;
		}
		$GLOBALS['%s']->pop();
	}
}

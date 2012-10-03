<?php

class org_silex_page_PageModel extends org_silex_ModelBase {
	public function __construct() { if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("org.silex.page.PageModel::new");
		$»spos = $GLOBALS['%s']->length;
		parent::__construct("onPageHoverChange","onPageSelectionChange");
		$GLOBALS['%s']->pop();
	}}
	public function setSelectedItem($item) {
		$GLOBALS['%s']->push("org.silex.page.PageModel::setSelectedItem");
		$»spos = $GLOBALS['%s']->length;
		parent::setSelectedItem($item);
		$model = org_silex_layer_LayerModel::getInstance();
		$model->setSelectedItem(null);
		$model->setHoveredItem(null);
		{
			$GLOBALS['%s']->pop();
			return $item;
		}
		$GLOBALS['%s']->pop();
	}
	static $instance;
	static function getInstance() {
		$GLOBALS['%s']->push("org.silex.page.PageModel::getInstance");
		$»spos = $GLOBALS['%s']->length;
		if(org_silex_page_PageModel::$instance === null) {
			org_silex_page_PageModel::$instance = new org_silex_page_PageModel();
		}
		{
			$»tmp = org_silex_page_PageModel::$instance;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static $ON_SELECTION_CHANGE = "onPageSelectionChange";
	static $ON_HOVER_CHANGE = "onPageHoverChange";
	static $__properties__ = array("set_selectedItem" => "setSelectedItem","set_hoveredItem" => "setHoveredItem");
	function __toString() { return 'org.silex.page.PageModel'; }
}

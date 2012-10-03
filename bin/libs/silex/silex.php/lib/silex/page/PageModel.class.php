<?php

class silex_page_PageModel extends silex_ModelBase {
	public function __construct() { if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("silex.page.PageModel::new");
		$»spos = $GLOBALS['%s']->length;
		parent::__construct("onPageHoverChange","onPageSelectionChange","PageModel class");
		$GLOBALS['%s']->pop();
	}}
	public function setSelectedItem($item) {
		$GLOBALS['%s']->push("silex.page.PageModel::setSelectedItem");
		$»spos = $GLOBALS['%s']->length;
		$model = silex_layer_LayerModel::getInstance();
		$model->setSelectedItem(null);
		$model->setHoveredItem(null);
		{
			$»tmp = parent::setSelectedItem($item);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static $instance;
	static function getInstance() {
		$GLOBALS['%s']->push("silex.page.PageModel::getInstance");
		$»spos = $GLOBALS['%s']->length;
		if(silex_page_PageModel::$instance === null) {
			silex_page_PageModel::$instance = new silex_page_PageModel();
		}
		{
			$»tmp = silex_page_PageModel::$instance;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static $DEBUG_INFO = "PageModel class";
	static $ON_SELECTION_CHANGE = "onPageSelectionChange";
	static $ON_HOVER_CHANGE = "onPageHoverChange";
	static $__properties__ = array("set_selectedItem" => "setSelectedItem","set_hoveredItem" => "setHoveredItem");
	function __toString() { return 'silex.page.PageModel'; }
}

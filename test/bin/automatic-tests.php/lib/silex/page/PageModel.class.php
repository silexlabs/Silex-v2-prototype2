<?php

class silex_page_PageModel extends silex_ModelBase {
	public function __construct() { if(!php_Boot::$skip_constructor) {
		parent::__construct("onPageHoverChange","onPageSelectionChange");
	}}
	public function setSelectedItem($item) {
		parent::setSelectedItem($item);
		$model = silex_layer_LayerModel::getInstance();
		$model->setSelectedItem(null);
		$model->setHoveredItem(null);
		return $item;
	}
	static $instance;
	static function getInstance() {
		if(silex_page_PageModel::$instance === null) {
			silex_page_PageModel::$instance = new silex_page_PageModel();
		}
		return silex_page_PageModel::$instance;
	}
	static $ON_SELECTION_CHANGE = "onPageSelectionChange";
	static $ON_HOVER_CHANGE = "onPageHoverChange";
	static $__properties__ = array("set_selectedItem" => "setSelectedItem","set_hoveredItem" => "setHoveredItem");
	function __toString() { return 'silex.page.PageModel'; }
}

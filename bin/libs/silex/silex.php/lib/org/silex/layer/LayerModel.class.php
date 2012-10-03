<?php

class org_silex_layer_LayerModel extends org_silex_ModelBase {
	public function __construct() { if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("org.silex.layer.LayerModel::new");
		$»spos = $GLOBALS['%s']->length;
		parent::__construct("onLayerHoverChange","onLayerSelectionChange");
		$GLOBALS['%s']->pop();
	}}
	public function setSelectedItem($item) {
		$GLOBALS['%s']->push("org.silex.layer.LayerModel::setSelectedItem");
		$»spos = $GLOBALS['%s']->length;
		parent::setSelectedItem($item);
		$model = org_silex_component_ComponentModel::getInstance();
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
		$GLOBALS['%s']->push("org.silex.layer.LayerModel::getInstance");
		$»spos = $GLOBALS['%s']->length;
		if(org_silex_layer_LayerModel::$instance === null) {
			org_silex_layer_LayerModel::$instance = new org_silex_layer_LayerModel();
		}
		{
			$»tmp = org_silex_layer_LayerModel::$instance;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static $ON_SELECTION_CHANGE = "onLayerSelectionChange";
	static $ON_HOVER_CHANGE = "onLayerHoverChange";
	static $__properties__ = array("set_selectedItem" => "setSelectedItem","set_hoveredItem" => "setHoveredItem");
	function __toString() { return 'org.silex.layer.LayerModel'; }
}

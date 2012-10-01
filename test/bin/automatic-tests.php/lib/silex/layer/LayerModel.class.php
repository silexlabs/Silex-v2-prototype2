<?php

class silex_layer_LayerModel extends silex_ModelBase {
	public function __construct() { if(!php_Boot::$skip_constructor) {
		parent::__construct("onLayerHoverChange","onLayerSelectionChange");
	}}
	public function setSelectedItem($item) {
		parent::setSelectedItem($item);
		$model = silex_component_ComponentModel::getInstance();
		$model->setSelectedItem(null);
		$model->setHoveredItem(null);
		return $item;
	}
	static $instance;
	static function getInstance() {
		if(silex_layer_LayerModel::$instance === null) {
			silex_layer_LayerModel::$instance = new silex_layer_LayerModel();
		}
		return silex_layer_LayerModel::$instance;
	}
	static $ON_SELECTION_CHANGE = "onLayerSelectionChange";
	static $ON_HOVER_CHANGE = "onLayerHoverChange";
	static $__properties__ = array("set_selectedItem" => "setSelectedItem","set_hoveredItem" => "setHoveredItem");
	function __toString() { return 'silex.layer.LayerModel'; }
}

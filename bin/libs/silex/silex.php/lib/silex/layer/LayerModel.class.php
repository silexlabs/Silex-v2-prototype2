<?php

class silex_layer_LayerModel extends silex_ModelBase {
	public function __construct() { if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("silex.layer.LayerModel::new");
		$»spos = $GLOBALS['%s']->length;
		parent::__construct("onLayerHoverChange","onLayerSelectionChange","LayerModel class");
		$GLOBALS['%s']->pop();
	}}
	public function setSelectedItem($item) {
		$GLOBALS['%s']->push("silex.layer.LayerModel::setSelectedItem");
		$»spos = $GLOBALS['%s']->length;
		$model = silex_component_ComponentModel::getInstance();
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
		$GLOBALS['%s']->push("silex.layer.LayerModel::getInstance");
		$»spos = $GLOBALS['%s']->length;
		if(silex_layer_LayerModel::$instance === null) {
			silex_layer_LayerModel::$instance = new silex_layer_LayerModel();
		}
		{
			$»tmp = silex_layer_LayerModel::$instance;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static $LAYER_ID_ATTRIBUTE_NAME = "data-silex-layer-id";
	static $DEBUG_INFO = "LayerModel class";
	static $ON_SELECTION_CHANGE = "onLayerSelectionChange";
	static $ON_HOVER_CHANGE = "onLayerHoverChange";
	static $__properties__ = array("set_selectedItem" => "setSelectedItem","set_hoveredItem" => "setHoveredItem");
	function __toString() { return 'silex.layer.LayerModel'; }
}

<?php

class silex_component_ComponentModel extends silex_ModelBase {
	public function __construct() { if(!php_Boot::$skip_constructor) {
		parent::__construct("onComponentHoverChange","onComponentSelectionChange");
	}}
	public function setSelectedItem($item) {
		parent::setSelectedItem($item);
		$model = silex_property_PropertyModel::getInstance();
		$model->setSelectedItem(null);
		$model->setHoveredItem(null);
		return $item;
	}
	static $instance;
	static function getInstance() {
		if(silex_component_ComponentModel::$instance === null) {
			silex_component_ComponentModel::$instance = new silex_component_ComponentModel();
		}
		return silex_component_ComponentModel::$instance;
	}
	static $ON_SELECTION_CHANGE = "onComponentSelectionChange";
	static $ON_HOVER_CHANGE = "onComponentHoverChange";
	static $__properties__ = array("set_selectedItem" => "setSelectedItem","set_hoveredItem" => "setHoveredItem");
	function __toString() { return 'silex.component.ComponentModel'; }
}

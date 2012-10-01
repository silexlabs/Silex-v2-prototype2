<?php

class silex_property_PropertyModel extends silex_ModelBase {
	public function __construct() { if(!php_Boot::$skip_constructor) {
		parent::__construct("onPropertyHoverChange","onPropertySelectionChange");
	}}
	static $instance;
	static function getInstance() {
		if(silex_property_PropertyModel::$instance === null) {
			silex_property_PropertyModel::$instance = new silex_property_PropertyModel();
		}
		return silex_property_PropertyModel::$instance;
	}
	static $ON_SELECTION_CHANGE = "onPropertySelectionChange";
	static $ON_HOVER_CHANGE = "onPropertyHoverChange";
	static $__properties__ = array("set_selectedItem" => "setSelectedItem","set_hoveredItem" => "setHoveredItem");
	function __toString() { return 'silex.property.PropertyModel'; }
}

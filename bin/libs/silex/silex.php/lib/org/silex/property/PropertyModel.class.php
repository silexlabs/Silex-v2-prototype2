<?php

class org_silex_property_PropertyModel extends org_silex_ModelBase {
	public function __construct() { if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("org.silex.property.PropertyModel::new");
		$»spos = $GLOBALS['%s']->length;
		parent::__construct("onPropertyHoverChange","onPropertySelectionChange");
		$GLOBALS['%s']->pop();
	}}
	static $instance;
	static function getInstance() {
		$GLOBALS['%s']->push("org.silex.property.PropertyModel::getInstance");
		$»spos = $GLOBALS['%s']->length;
		if(org_silex_property_PropertyModel::$instance === null) {
			org_silex_property_PropertyModel::$instance = new org_silex_property_PropertyModel();
		}
		{
			$»tmp = org_silex_property_PropertyModel::$instance;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static $ON_SELECTION_CHANGE = "onPropertySelectionChange";
	static $ON_HOVER_CHANGE = "onPropertyHoverChange";
	static $__properties__ = array("set_selectedItem" => "setSelectedItem","set_hoveredItem" => "setHoveredItem");
	function __toString() { return 'org.silex.property.PropertyModel'; }
}

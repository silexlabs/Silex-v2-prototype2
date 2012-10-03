<?php

class org_silex_component_ComponentModel extends org_silex_ModelBase {
	public function __construct() { if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("org.silex.component.ComponentModel::new");
		$»spos = $GLOBALS['%s']->length;
		parent::__construct("onComponentHoverChange","onComponentSelectionChange");
		$GLOBALS['%s']->pop();
	}}
	public function setSelectedItem($item) {
		$GLOBALS['%s']->push("org.silex.component.ComponentModel::setSelectedItem");
		$»spos = $GLOBALS['%s']->length;
		parent::setSelectedItem($item);
		$model = org_silex_property_PropertyModel::getInstance();
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
		$GLOBALS['%s']->push("org.silex.component.ComponentModel::getInstance");
		$»spos = $GLOBALS['%s']->length;
		if(org_silex_component_ComponentModel::$instance === null) {
			org_silex_component_ComponentModel::$instance = new org_silex_component_ComponentModel();
		}
		{
			$»tmp = org_silex_component_ComponentModel::$instance;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static $ON_SELECTION_CHANGE = "onComponentSelectionChange";
	static $ON_HOVER_CHANGE = "onComponentHoverChange";
	static $__properties__ = array("set_selectedItem" => "setSelectedItem","set_hoveredItem" => "setHoveredItem");
	function __toString() { return 'org.silex.component.ComponentModel'; }
}

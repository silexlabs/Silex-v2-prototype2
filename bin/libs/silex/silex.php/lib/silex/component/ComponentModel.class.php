<?php

class silex_component_ComponentModel extends silex_ModelBase {
	public function __construct() { if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("silex.component.ComponentModel::new");
		$»spos = $GLOBALS['%s']->length;
		parent::__construct("onComponentHoverChange","onComponentSelectionChange","ComponentModel class");
		$GLOBALS['%s']->pop();
	}}
	public function setSelectedItem($item) {
		$GLOBALS['%s']->push("silex.component.ComponentModel::setSelectedItem");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = parent::setSelectedItem($item);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static $instance;
	static function getInstance() {
		$GLOBALS['%s']->push("silex.component.ComponentModel::getInstance");
		$»spos = $GLOBALS['%s']->length;
		if(silex_component_ComponentModel::$instance === null) {
			silex_component_ComponentModel::$instance = new silex_component_ComponentModel();
		}
		{
			$»tmp = silex_component_ComponentModel::$instance;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static $COMPONENT_ID_ATTRIBUTE_NAME = "data-silex-component-id";
	static $DEBUG_INFO = "ComponentModel class";
	static $ON_SELECTION_CHANGE = "onComponentSelectionChange";
	static $ON_HOVER_CHANGE = "onComponentHoverChange";
	static $__properties__ = array("set_selectedItem" => "setSelectedItem","set_hoveredItem" => "setHoveredItem");
	function __toString() { return 'silex.component.ComponentModel'; }
}

<?php

class silex_property_PropertyModel extends silex_ModelBase {
	public function __construct() { if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("silex.property.PropertyModel::new");
		$製pos = $GLOBALS['%s']->length;
		parent::__construct(null,null,"PropertyModel class");
		$GLOBALS['%s']->pop();
	}}
	public function getModel($viewHtmlDom) {
		$GLOBALS['%s']->push("silex.property.PropertyModel::getModel");
		$製pos = $GLOBALS['%s']->length;
		if(silex_component_ComponentModel::getInstance()->selectedItem === null && silex_layer_LayerModel::getInstance()->selectedItem === null) {
			throw new HException("Error: no component nor layer is selected.");
		}
		$results = null;
		$id = null;
		if(silex_component_ComponentModel::getInstance()->selectedItem !== null) {
			$id = silex_component_ComponentModel::getInstance()->selectedItem->getAttribute("data-silex-component-id");
		}
		if($id === null) {
			if(silex_layer_LayerModel::getInstance()->selectedItem !== null) {
				$id = silex_layer_LayerModel::getInstance()->selectedItem->rootElement->getAttribute("data-silex-layer-id");
				if($id !== null) {
					$results = org_slplayer_util_DomTools::getElementsByAttribute(silex_publication_PublicationModel::getInstance()->modelHtmlDom, "data-silex-layer-id", $id);
				} else {
					throw new HException("Error: the selected layer has not a Silex ID. It should have the ID in the " . "data-silex-layer-id" . " or " . "data-silex-component-id" . " attributes");
				}
			} else {
				throw new HException("Error: the selected component has not a Silex ID. It should have the ID in the " . "data-silex-component-id" . " attribute");
			}
		} else {
			$results = org_slplayer_util_DomTools::getElementsByAttribute(silex_publication_PublicationModel::getInstance()->modelHtmlDom, "data-silex-component-id", $id);
		}
		if($results === null || $results->length !== 1) {
			throw new HException("Error: 1 and only 1 component or layer is expected to have ID \"" . $id . "\".");
		}
		{
			$裨mp = $results[0];
			$GLOBALS['%s']->pop();
			return $裨mp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getStyle($viewHtmlDom, $name) {
		$GLOBALS['%s']->push("silex.property.PropertyModel::getStyle");
		$製pos = $GLOBALS['%s']->length;
		$value = null;
		$modelHtmlDom = $this->getModel($viewHtmlDom);
		try {
			$value = Reflect::field($modelHtmlDom->style, $name);
		}catch(Exception $蜜) {
			$_ex_ = ($蜜 instanceof HException) ? $蜜->e : $蜜;
			$e = $_ex_;
			{
				$GLOBALS['%e'] = new _hx_array(array());
				while($GLOBALS['%s']->length >= $製pos) {
					$GLOBALS['%e']->unshift($GLOBALS['%s']->pop());
				}
				$GLOBALS['%s']->push($GLOBALS['%e'][0]);
				throw new HException("Error: the selected element has no field " . $name . " or there was an error (" . Std::string($e) . ")");
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function setStyle($viewHtmlDom, $name, $value) {
		$GLOBALS['%s']->push("silex.property.PropertyModel::setStyle");
		$製pos = $GLOBALS['%s']->length;
		$modelHtmlDom = $this->getModel($viewHtmlDom);
		try {
			$viewHtmlDom->style->{$name} = $value;
			$modelHtmlDom->style->{$name} = $value;
		}catch(Exception $蜜) {
			$_ex_ = ($蜜 instanceof HException) ? $蜜->e : $蜜;
			$e = $_ex_;
			{
				$GLOBALS['%e'] = new _hx_array(array());
				while($GLOBALS['%s']->length >= $製pos) {
					$GLOBALS['%e']->unshift($GLOBALS['%s']->pop());
				}
				$GLOBALS['%s']->push($GLOBALS['%e'][0]);
				throw new HException("Error: the selected element has no field " . $name . " or there was an error (" . Std::string($e) . ")");
			}
		}
		$propertyData = _hx_anonymous(array("name" => $name, "value" => $value, "viewHtmlDom" => $viewHtmlDom, "modelHtmlDom" => $modelHtmlDom));
		$this->dispatchEvent($this->createEvent("onStyleChange", $propertyData), $this->debugInfo);
		$GLOBALS['%s']->pop();
	}
	public function getProperty($viewHtmlDom, $name) {
		$GLOBALS['%s']->push("silex.property.PropertyModel::getProperty");
		$製pos = $GLOBALS['%s']->length;
		$value = null;
		$modelHtmlDom = $this->getModel($viewHtmlDom);
		try {
			$value = Reflect::field($modelHtmlDom, $name);
		}catch(Exception $蜜) {
			$_ex_ = ($蜜 instanceof HException) ? $蜜->e : $蜜;
			$e = $_ex_;
			{
				$GLOBALS['%e'] = new _hx_array(array());
				while($GLOBALS['%s']->length >= $製pos) {
					$GLOBALS['%e']->unshift($GLOBALS['%s']->pop());
				}
				$GLOBALS['%s']->push($GLOBALS['%e'][0]);
				throw new HException("Error: the selected element has no field " . $name . " or there was an error (" . Std::string($e) . ")");
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function setProperty($viewHtmlDom, $name, $value) {
		$GLOBALS['%s']->push("silex.property.PropertyModel::setProperty");
		$製pos = $GLOBALS['%s']->length;
		$modelHtmlDom = $this->getModel($viewHtmlDom);
		try {
			$viewHtmlDom->{$name} = $value;
			$modelHtmlDom->{$name} = $value;
		}catch(Exception $蜜) {
			$_ex_ = ($蜜 instanceof HException) ? $蜜->e : $蜜;
			$e = $_ex_;
			{
				$GLOBALS['%e'] = new _hx_array(array());
				while($GLOBALS['%s']->length >= $製pos) {
					$GLOBALS['%e']->unshift($GLOBALS['%s']->pop());
				}
				$GLOBALS['%s']->push($GLOBALS['%e'][0]);
				throw new HException("Error: the selected element has no field " . $name . " or there was an error (" . Std::string($e) . ")");
			}
		}
		$propertyData = _hx_anonymous(array("name" => $name, "value" => $value, "viewHtmlDom" => $viewHtmlDom, "modelHtmlDom" => $modelHtmlDom));
		$this->dispatchEvent($this->createEvent("onPropertyChange", $propertyData), $this->debugInfo);
		$GLOBALS['%s']->pop();
	}
	static $instance;
	static function getInstance() {
		$GLOBALS['%s']->push("silex.property.PropertyModel::getInstance");
		$製pos = $GLOBALS['%s']->length;
		if(silex_property_PropertyModel::$instance === null) {
			silex_property_PropertyModel::$instance = new silex_property_PropertyModel();
		}
		{
			$裨mp = silex_property_PropertyModel::$instance;
			$GLOBALS['%s']->pop();
			return $裨mp;
		}
		$GLOBALS['%s']->pop();
	}
	static $DEBUG_INFO = "PropertyModel class";
	static $ON_STYLE_CHANGE = "onStyleChange";
	static $ON_PROPERTY_CHANGE = "onPropertyChange";
	static $__properties__ = array("set_selectedItem" => "setSelectedItem","set_hoveredItem" => "setHoveredItem");
	function __toString() { return 'silex.property.PropertyModel'; }
}

<?php

class org_silex_publication_PublicationModel extends org_silex_ModelBase {
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("org.silex.publication.PublicationModel::new");
		$»spos = $GLOBALS['%s']->length;
		parent::__construct(null,null);
		$this->publicationService = new org_silex_publication_PublicationService();
		$GLOBALS['%s']->pop();
	}}
	public $application;
	public $viewHtmlDom;
	public $headHtmlDom;
	public $modelHtmlDom;
	public $currentConfig;
	public $currentData;
	public $publicationService;
	public function __call($m, $a) {
		if(isset($this->$m) && is_callable($this->$m))
			return call_user_func_array($this->$m, $a);
		else if(isset($this->»dynamics[$m]) && is_callable($this->»dynamics[$m]))
			return call_user_func_array($this->»dynamics[$m], $a);
		else if('toString' == $m)
			return $this->__toString();
		else
			throw new HException('Unable to call «'.$m.'»');
	}
	static $instance;
	static function getInstance() {
		$GLOBALS['%s']->push("org.silex.publication.PublicationModel::getInstance");
		$»spos = $GLOBALS['%s']->length;
		if(org_silex_publication_PublicationModel::$instance === null) {
			org_silex_publication_PublicationModel::$instance = new org_silex_publication_PublicationModel();
		}
		{
			$»tmp = org_silex_publication_PublicationModel::$instance;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static $ON_CHANGE = "onPublicationChange";
	static $ON_LIST = "onPublicationList";
	static $ON_DATA = "onPublicationData";
	static $ON_CONFIG = "onPublicationConfigChange";
	static $ON_CONFIG_CHANGE = "onPublicationConfigChange";
	static $ON_ERROR = "onPublicationError";
	static $currentName;
	static $__properties__ = array("set_selectedItem" => "setSelectedItem","set_hoveredItem" => "setHoveredItem");
	function __toString() { return 'org.silex.publication.PublicationModel'; }
}

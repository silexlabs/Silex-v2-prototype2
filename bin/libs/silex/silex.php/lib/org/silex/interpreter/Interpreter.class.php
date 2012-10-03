<?php

class org_silex_interpreter_Interpreter {
	public function __construct(){}
	static $CONFIG_TAG_DEBUG_MODE_ACTION = "debugModeAction";
	static $BASIC_CONTEXT;
	static function exec($script, $context = null) {
		$GLOBALS['%s']->push("org.silex.interpreter.Interpreter::exec");
		$»spos = $GLOBALS['%s']->length;
		$parser = new hscript_Parser();
		$program = $parser->parseString($script);
		$interp = new hscript_Interp();
		{
			$_g = 0; $_g1 = Reflect::fields(_hx_anonymous(array("Lib" => _hx_qtype("cocktail.Lib"), "Math" => _hx_qtype("Math"), "StringTools" => _hx_qtype("StringTools"), "DomTools" => _hx_qtype("org.slplayer.util.DomTools"), "Page" => _hx_qtype("org.slplayer.component.navigation.Page"), "PropertyModel" => org_silex_property_PropertyModel::getInstance(), "ComponentModel" => org_silex_component_ComponentModel::getInstance(), "LayerModel" => org_silex_layer_LayerModel::getInstance(), "PageModel" => org_silex_page_PageModel::getInstance(), "PublicationModel" => org_silex_publication_PublicationModel::getInstance())));
			while($_g < $_g1->length) {
				$varName = $_g1[$_g];
				++$_g;
				$interp->variables->set($varName, Reflect::getProperty(_hx_anonymous(array("Lib" => _hx_qtype("cocktail.Lib"), "Math" => _hx_qtype("Math"), "StringTools" => _hx_qtype("StringTools"), "DomTools" => _hx_qtype("org.slplayer.util.DomTools"), "Page" => _hx_qtype("org.slplayer.component.navigation.Page"), "PropertyModel" => org_silex_property_PropertyModel::getInstance(), "ComponentModel" => org_silex_component_ComponentModel::getInstance(), "LayerModel" => org_silex_layer_LayerModel::getInstance(), "PageModel" => org_silex_page_PageModel::getInstance(), "PublicationModel" => org_silex_publication_PublicationModel::getInstance())), $varName));
				unset($varName);
			}
		}
		if($context !== null) {
			if(null == $context) throw new HException('null iterable');
			$»it = $context->keys();
			while($»it->hasNext()) {
				$varName = $»it->next();
				$interp->variables->set($varName, $context->get($varName));
			}
		}
		$res = $interp->execute($program);
		{
			$GLOBALS['%s']->pop();
			return $res;
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'org.silex.interpreter.Interpreter'; }
}
org_silex_interpreter_Interpreter::$BASIC_CONTEXT = _hx_anonymous(array("Lib" => _hx_qtype("cocktail.Lib"), "Math" => _hx_qtype("Math"), "StringTools" => _hx_qtype("StringTools"), "DomTools" => _hx_qtype("org.slplayer.util.DomTools"), "Page" => _hx_qtype("org.slplayer.component.navigation.Page"), "PropertyModel" => org_silex_property_PropertyModel::getInstance(), "ComponentModel" => org_silex_component_ComponentModel::getInstance(), "LayerModel" => org_silex_layer_LayerModel::getInstance(), "PageModel" => org_silex_page_PageModel::getInstance(), "PublicationModel" => org_silex_publication_PublicationModel::getInstance()));

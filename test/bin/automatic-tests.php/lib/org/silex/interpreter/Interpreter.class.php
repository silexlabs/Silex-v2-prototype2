<?php

class org_silex_interpreter_Interpreter {
	public function __construct(){}
	static $CONFIG_TAG_DEBUG_MODE_ACTION = "debugModeAction";
	static $BASIC_CONTEXT;
	static function exec($script, $context = null) {
		$parser = new hscript_Parser();
		$program = $parser->parseString($script);
		$interp = new hscript_Interp();
		{
			$_g = 0; $_g1 = Reflect::fields(_hx_anonymous(array("Lib" => _hx_qtype("cocktail.Lib"), "Math" => _hx_qtype("Math"), "StringTools" => _hx_qtype("StringTools"), "Builder" => _hx_qtype("org.silex.component.builder.Builder"), "Page" => _hx_qtype("org.slplayer.component.navigation.Page"), "DomTools" => _hx_qtype("org.slplayer.util.DomTools"))));
			while($_g < $_g1->length) {
				$varName = $_g1[$_g];
				++$_g;
				$interp->variables->set($varName, Reflect::getProperty(_hx_anonymous(array("Lib" => _hx_qtype("cocktail.Lib"), "Math" => _hx_qtype("Math"), "StringTools" => _hx_qtype("StringTools"), "Builder" => _hx_qtype("org.silex.component.builder.Builder"), "Page" => _hx_qtype("org.slplayer.component.navigation.Page"), "DomTools" => _hx_qtype("org.slplayer.util.DomTools"))), $varName));
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
		return $res;
	}
	function __toString() { return 'org.silex.interpreter.Interpreter'; }
}
org_silex_interpreter_Interpreter::$BASIC_CONTEXT = _hx_anonymous(array("Lib" => _hx_qtype("cocktail.Lib"), "Math" => _hx_qtype("Math"), "StringTools" => _hx_qtype("StringTools"), "Builder" => _hx_qtype("org.silex.component.builder.Builder"), "Page" => _hx_qtype("org.slplayer.component.navigation.Page"), "DomTools" => _hx_qtype("org.slplayer.util.DomTools")));

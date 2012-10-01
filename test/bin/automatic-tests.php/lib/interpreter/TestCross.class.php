<?php

class interpreter_TestCross {
	public function __construct() { 
	}
	public function testAction() {
		$debugModeAction = "\x0A\x09\x09\x09var res = true;\x0A\x09\x09\x09if(Lib.alert!=null){\x0A\x09\x09\x09\x09res = Lib.window.confirm(\"Please click yes!\");\x0A\x09\x09\x09}\x0A\x09\x09\x09return res;\x0A\x09\x09";
		$res = silex_interpreter_Interpreter::exec($debugModeAction, null);
		utest_Assert::equals(true, $res, null, _hx_anonymous(array("fileName" => "TestCross.hx", "lineNumber" => 23, "className" => "interpreter.TestCross", "methodName" => "testAction")));
	}
	static $THIS_TEST_PATH = "interpreter-data/";
	function __toString() { return 'interpreter.TestCross'; }
}

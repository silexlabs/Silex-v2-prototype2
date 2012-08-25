package interpreter;

import utest.Assert;
import utest.Runner;
import utest.ui.Report;

import org.silex.interpreter.Interpreter;

class TestCross {
	public static inline var THIS_TEST_PATH:String = "interpreter-data/";
	public function new(){
	}
	public function testAction():Void{
		// execute an action when needed for debug
		var debugModeAction = '
			var res = true;
			if(Lib.alert!=null){
				res = Lib.window.confirm("Please click yes!");
			}
			return res;
		';
		var res = Interpreter.exec(debugModeAction);
		Assert.equals(true, res);
		Assert.isFalse(false);
	}
}
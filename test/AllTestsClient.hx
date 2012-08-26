package ;

import org.silex.publication.PublicationService;
import org.silex.service.ServiceBase;

import utest.Assert;
import utest.Runner;
import utest.ui.Report;

class AllTestsClient {
	/**
	 * the root of silex "test/" folder
	 */
	public static inline var TEST_ROOT_PATH:String = "../";
	/**
	 * the server side gateway of silex
	 */
	public static inline var GATEWAY_URL:String = "./test.php/";
	/**
	 * Main entry point for the tests
	 * Add new tests here
	 */
	public static function main(){
		// workaround, utest says that body is null :-/
		haxe.Timer.delay(function (){
			new AllTestsClient();
		}, 100);
	}
	public function new(){
        var runner = new Runner();

/*
	    runner.addCase(new interpreter.TestCross());
	    runner.addCase(new template.TestClient());
/**/
		runner.addCase(new publication.TestClient());
        Report.create(runner);
        runner.run();

	}
}
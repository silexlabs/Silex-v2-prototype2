package ;

import haxe.remoting.HttpConnection;

import org.silex.publication.PublicationService;
import org.silex.service.ServiceBase;

import utest.Assert;
import utest.Runner;
import utest.ui.Report;

class AllTestsServer {
	/**
	 * the root of silex "test/" folder
	 */
	public static inline var TEST_ROOT_PATH:String = "../";
	/**
	 * Main entry point for the tests
	 * Add new tests here
	 */
	public static function main(){
        var runner = new Runner();

/*
	    runner.addCase(new interpreter.TestCross());
		runner.addCase(new util.TestServer());
		runner.addCase(new config.TestServer());
/**/
		runner.addCase(new publication.TestServer());

	    // handle remoting, this entry point can be a gateway 
		if( HttpConnection.handleRequest(ServiceBase.context) )
		  return;

        Report.create(runner);
        runner.run();
	}
	public function new(){}
}
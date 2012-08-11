package config;

import org.silex.config.ServerConfig;

import utest.Assert;
import utest.Runner;
import utest.ui.Report;

import php.Lib;
import php.Sys;
import php.io.File;

class Test {
	public static function main(){
        var runner = new Runner();
        runner.addCase(new Test());
        Report.create(runner);
        runner.run();
	}
	public function new(){}
	
	public function testServerConfigRead():Void
	{
		var serverConfig = new ServerConfig("../data/server-config.xml.php");
		Assert.equals("test1", serverConfig.defaultPublication);
	}
	public function testServerConfigWrite():Void
	{
		var serverConfig = new ServerConfig("../data/server-config-write.xml.php");
		serverConfig.saveData("../data/server-config-tmp.xml.php");
		Assert.equals(File.getContent("../data/server-config-write.xml.php"), File.getContent("../data/server-config-tmp.xml.php"));
	}
}
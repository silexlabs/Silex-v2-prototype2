package config;

import org.silex.core.ServerConfig;
import org.silex.publication.PublicationConfig;
import org.silex.publication.PublicationData;

import utest.Assert;
import utest.Runner;
import utest.ui.Report;

import php.Lib;
import php.Sys;
import php.io.File;

class TestServer {
	public function new(){
	}
	
	public static inline var THIS_TEST_PATH:String = "config-data/";
	public static inline var TEST_PUBLICATION_CONFIG:PublicationConfigData = {
		state : Private,
		creation : {author : "silexlabs", date : Date.fromString("2021-12-02")}, 
		lastChange : {author : "silexlabs", date : Date.fromString("2021-12-02")}
	};

	public function testServerConfigRead():Void
	{
		trace("testServerConfigRead");
		var config = new ServerConfig(AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH + "server-config.xml.php");
		Assert.equals("test1", config.defaultPublication);
	}
	public function testServerConfigWrite():Void
	{
		trace("testServerConfigWrite");
		var config = new ServerConfig(AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH + "server-config-write.xml.php");
		config.saveData(AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH + "server-config-tmp.xml.php");

		Assert.equals(
			File.getContent(AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH + "server-config-write.xml.php"), 
			File.getContent(AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH + "server-config-tmp.xml.php")
		);
	}
/**/
	//////////////////////////////////////////////////////////////////
	public function testPublicationConfigRead():Void
	{
		trace("testPublicationConfigRead");
		var config = new PublicationConfig(AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH + "publication-config.xml.php");

		Assert.equals(TEST_PUBLICATION_CONFIG.state, config.configData.state);
		Assert.equals(TEST_PUBLICATION_CONFIG.creation.author, config.configData.creation.author);
		Assert.equals(TEST_PUBLICATION_CONFIG.creation.date.getTime(), config.configData.creation.date.getTime());
		Assert.equals(TEST_PUBLICATION_CONFIG.lastChange.author, config.configData.lastChange.author);
		Assert.equals(TEST_PUBLICATION_CONFIG.lastChange.date.getTime(), config.configData.lastChange.date.getTime());
	}
/**/
	public function testPublicationConfigWrite():Void
	{
		trace("testPublicationConfigWrite");
		var config = new PublicationConfig(AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH + "publication-config.xml.php");
		config.configData = TEST_PUBLICATION_CONFIG;
		config.saveData(AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH + "publication-config-tmp.xml.php");

		Assert.equals(
			File.getContent(AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH + "publication-config.xml.php"), 
			File.getContent(AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH + "publication-config-tmp.xml.php")
		);
	}
	//////////////////////////////////////////////////////////////////
/**/
}
		
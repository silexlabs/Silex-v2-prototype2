package config;

import org.silex.config.ServerConfigManager;
import org.silex.config.PublicationConfigManager;
import org.silex.publication.PublicationData;

import utest.Assert;
import utest.Runner;
import utest.ui.Report;

import php.Lib;
import php.Sys;
import php.io.File;

class TestServer {
	public function new(){}
	
	public static inline var THIS_TEST_PATH:String = "config-data/";
/*	public static inline var TEST_PUBLICATION_CONFIG_DATA_XML:String = '<xml>
	<!--
		<?php
			exit("access denied
	-"."->
</"."xml>");
		?>
	-->
	<publicationState>Private</publicationState>
	<name>test publication config</name>
	<publicationFolder></publicationFolder>
	<creation>
		<author>silexlabs</author>
		<date>12/02/2021</date>
	</creation>
	<lastChange>
		<author>silexlabs</author>
		<date>12/02/2021</date>
	</lastChange>
</xml>';
*/
	public static inline var TEST_PUBLICATION_CONFIG:PublicationConfig = {
		name : "test publication config",
		publicationFolder : "", 
		state : Private,
		creation : {author : "silexlabs", date : Date.fromString("2021-12-02")}, 
		lastChange : {author : "silexlabs", date : Date.fromString("2021-12-02")}
	};

	public function testServerConfigManagerRead():Void
	{
		var config = new ServerConfigManager(AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH + "server-config.xml.php");
		Assert.equals("test1", config.defaultPublication);
	}
	public function testServerConfigManagerWrite():Void
	{
		var config = new ServerConfigManager(AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH + "server-config-write.xml.php");
		config.saveData(AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH + "server-config-tmp.xml.php");

		Assert.equals(
			File.getContent(AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH + "server-config-write.xml.php"), 
			File.getContent(AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH + "server-config-tmp.xml.php")
		);
	}
/**/
	//////////////////////////////////////////////////////////////////
	public function testPublicationConfigManagerRead():Void
	{
		var config = new PublicationConfigManager(AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH + "publication-config.xml.php");
		trace(config.publicationConfig);

		Assert.equals(TEST_PUBLICATION_CONFIG.name, config.publicationConfig.name);
		Assert.equals(TEST_PUBLICATION_CONFIG.publicationFolder, config.publicationConfig.publicationFolder);
		Assert.equals(TEST_PUBLICATION_CONFIG.state, config.publicationConfig.state);
		Assert.equals(TEST_PUBLICATION_CONFIG.creation.author, config.publicationConfig.creation.author);
		Assert.equals(TEST_PUBLICATION_CONFIG.creation.date.getTime(), config.publicationConfig.creation.date.getTime());
		Assert.equals(TEST_PUBLICATION_CONFIG.lastChange.author, config.publicationConfig.lastChange.author);
		Assert.equals(TEST_PUBLICATION_CONFIG.lastChange.date.getTime(), config.publicationConfig.lastChange.date.getTime());
	}
/**/
	public function testPublicationConfigManagerWrite():Void
	{
		var config = new PublicationConfigManager(AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH + "publication-config.xml.php");
		config.publicationConfig = TEST_PUBLICATION_CONFIG;
		config.saveData(AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH + "publication-config-tmp.xml.php");

		Assert.equals(
			File.getContent(AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH + "publication-config.xml.php"), 
			File.getContent(AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH + "publication-config-tmp.xml.php")
		);
	}
	//////////////////////////////////////////////////////////////////
/**/
}
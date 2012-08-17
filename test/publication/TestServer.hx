package publication;

import org.silex.publication.PublicationService;
import org.silex.publication.PublicationData;

import js.Dom;

import utest.Assert;
import utest.Runner;
import utest.ui.Report;

import sys.io.File;
import php.FileSystem;

class TestServer {
	private var publicationService:PublicationService;

	public static inline var THIS_TEST_PATH:String = "publication-data/";
	public static inline var TEST_CSS:String = "body{
	font-family: Verdana, Arial;
	font-size: 14pt;
    margin: 0;
    padding: 0;
    background-color: grey;
    overflow: auto;
}";
	public static inline var TEST_HTML:String = "<HTML>
	<HEAD>
	</HEAD>
	<BODY>
		Test Publication
	</BODY>
</HTML>";
	public static inline var TEST_PUBLICATION_DATA:PublicationData = {
		html : TEST_HTML,
		css: TEST_CSS,
		publicationConfig: {
			name : "test publication config",
			publicationFolder : "", 
			state : Private,
			creation : {
				author : "silexlabs", 
				date : Date.fromString("2021-12-02")
			}, 
			lastChange : {
				author : "silexlabs", 
				date : Date.fromString("2021-12-02")
			}
		}
	};

	public function new(){
		publicationService = new PublicationService();
	}
	
	public function testRead():Void{
		onResultRead(publicationService.getPublicationData("test-read", AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH));
	}
	private function onResultRead(publicationData:PublicationData):Void{
		Assert.notNull(publicationData);

		if (publicationData.html != null){
			Assert.equals(TEST_HTML, StringTools.trim(publicationData.html));
			Assert.equals(TEST_CSS, StringTools.trim(publicationData.css));
		}
	}
	public function testWrite():Void{

		publicationService.setPublicationData("test-write", TEST_PUBLICATION_DATA, AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH);
		
		Assert.equals(TEST_HTML, File.getContent("../publication-data/test-write/index.html"));
	}
	public function testCreate():Void{
		publicationService.create("test-create", TEST_PUBLICATION_DATA, AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH);
		
		Assert.equals(TEST_HTML, File.getContent("../publication-data/test-create/index.html"));
	}
	public function testTrash():Void{
		if (FileSystem.exists("../publication-data/test-create/index.html")){
			publicationService.trash("test-create", AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH);
			
			Assert.isFalse(FileSystem.exists("../publication-data/test-create/index.html"));
		}
	}
	public function testDuplicate():Void{
		publicationService.duplicate("test-read", "test-duplicate", AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH);
		
		Assert.isTrue(FileSystem.exists("../publication-data/test-duplicate/index.html"));
		if (FileSystem.exists("../publication-data/test-duplicate/index.html"))
			Assert.equals(TEST_HTML, File.getContent("../publication-data/test-duplicate/index.html"));
	}
	public function testRename():Void{
		if (FileSystem.exists("../publication-data/test-duplicate/index.html")){
			publicationService.rename("test-duplicate", "test-rename", AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH);

			Assert.isTrue(FileSystem.exists("../publication-data/test-rename/index.html"));
			if (FileSystem.exists("../publication-data/test-rename/index.html"))
				Assert.equals(TEST_HTML, File.getContent("../publication-data/test-rename/index.html"));
		}
	}
}
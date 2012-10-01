package publication;

import silex.publication.PublicationService;
import silex.publication.PublicationData;
import silex.util.FileSystemTools;

import js.Dom;

import utest.Assert;
import utest.Runner;
import utest.ui.Report;

import sys.io.File;
import php.FileSystem;

class TestServer {
	private var publicationService:PublicationService;

	public static inline var THIS_TEST_PATH:String = "../publication-data/";
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
	};
	public static inline var TEST_PUBLICATION_CONFIG:PublicationConfigData = {
		state : Private,
		category : Publication,
		creation : {
			author : "silexlabs", 
			date : Date.fromString("2021-12-02")
		}, 
		lastChange : {
			author : "silexlabs", 
			date : Date.fromString("2021-12-02")
		},
		debugModeAction : null,
	};

	public function new(){
		publicationService = new PublicationService();
	}
	
	public function testReadPublicationPrivate():Void{
		PublicationService.PUBLICATION_FOLDER = AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH;
		onResultRead(publicationService.getPublicationData("test-publication-private"));
	}
	private function onResultRead(publicationData:PublicationData):Void{
		Assert.notNull(publicationData);

		if (publicationData.html != null){
			Assert.equals(TEST_HTML, StringTools.trim(publicationData.html));
			Assert.equals(TEST_CSS, StringTools.trim(publicationData.css));
		}
	}
	public function testFilterPublicationPrivate():Void{
		PublicationService.PUBLICATION_FOLDER = AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH;
		var publications:Hash<PublicationConfigData> = publicationService.getPublications([Private], [Publication]);
		var length = 0;
		// browse all publications 
		for (publicationName in publications.keys()){
			Assert.isFalse(File.getContent(AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH + publicationName + "/conf/config.xml.php").indexOf("Private")==-1);
			Assert.isFalse(File.getContent(AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH + publicationName + "/conf/config.xml.php").indexOf("Publication")==-1);
			length++;
		}
		Assert.isFalse(length==0);
	}
	public function testFilterPublicationTrashed():Void{
		PublicationService.PUBLICATION_FOLDER = AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH;
		var publications:Hash<PublicationConfigData> = publicationService.getPublications([Trashed(null)], [Publication]);
		var length = 0;
		// browse all publications 
		for (publicationName in publications.keys()){
			Assert.isFalse(File.getContent(AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH + publicationName + "/conf/config.xml.php").indexOf("Trashed")==-1);
			Assert.isFalse(File.getContent(AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH + publicationName + "/conf/config.xml.php").indexOf("Publication")==-1);
			length++;
		}
		Assert.isFalse(length==0);
	}
	public function testFilterThemePublished():Void{
		PublicationService.PUBLICATION_FOLDER = AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH;
		var publications:Hash<PublicationConfigData> = publicationService.getPublications([Published(null)], [Theme]);
		var length = 0;
		// browse all publications 
		for (publicationName in publications.keys()){
			Assert.isFalse(File.getContent(AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH + publicationName + "/conf/config.xml.php").indexOf("Published")==-1);
			Assert.isFalse(File.getContent(AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH + publicationName + "/conf/config.xml.php").indexOf("Theme")==-1);
			length++;
		}
		Assert.isFalse(length==0);
	}
	public function testFilterUtilityPublished():Void{
		PublicationService.PUBLICATION_FOLDER = AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH;
		var publications:Hash<PublicationConfigData> = publicationService.getPublications([Published(null)], [Utility]);
		var length = 0;
		// browse all publications 
		for (publicationName in publications.keys()){
			Assert.isFalse(File.getContent(AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH + publicationName + "/conf/config.xml.php").indexOf("Published")==-1);
			Assert.isFalse(File.getContent(AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH + publicationName + "/conf/config.xml.php").indexOf("Utility")==-1);
			length++;
		}
		Assert.isFalse(length==0);
	}
	//////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////

	public function testWrite():Void{

		PublicationService.PUBLICATION_FOLDER = AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH;
		publicationService.setPublicationData("test-write", TEST_PUBLICATION_DATA);
		
		Assert.equals(TEST_HTML, File.getContent(AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH + "test-write/index.html"));
	}
	public function testCreateAndTrash():Void{
		if (FileSystem.exists(AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH + "test-create-tmp/"))
			FileSystemTools.recursiveDelete(AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH + "test-create-tmp/");

		PublicationService.PUBLICATION_FOLDER = AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH;
		publicationService.create("test-create-tmp", TEST_PUBLICATION_DATA);
		
		Assert.equals(TEST_HTML, File.getContent(AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH + "test-create-tmp/index.html"));

		if (FileSystem.exists(AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH + "test-create-tmp/index.html")){
			publicationService.trash("test-create-tmp");
			Assert.isFalse(File.getContent(AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH + "test-create-tmp/conf/config.xml.php").indexOf("Trashed")==-1);
		}

		// empty trash
		publicationService.emptyTrash();
		Assert.isFalse(FileSystem.exists(AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH + "test-create-tmp/"));
	}
	public function testDuplicateAndRename():Void{
		// remove existing folder
		if (FileSystem.exists(AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH + "test-duplicate-tmp/"))
			FileSystemTools.recursiveDelete(AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH + "test-duplicate-tmp/");

		PublicationService.PUBLICATION_FOLDER = AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH;
		publicationService.duplicate("test-duplicate", "test-duplicate-tmp");
		
		Assert.isTrue(FileSystem.exists(AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH + "test-duplicate-tmp/index.html"));
		if (FileSystem.exists(AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH + "test-duplicate-tmp/index.html"))
			Assert.equals(TEST_HTML, File.getContent(AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH + "test-duplicate-tmp/index.html"));

		if (FileSystem.exists(AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH + "test-duplicate-tmp/index.html")){
			// remove existing folder
			if (FileSystem.exists(AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH + "test-rename-tmp/"))
				FileSystemTools.recursiveDelete(AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH + "test-rename-tmp/");

			PublicationService.PUBLICATION_FOLDER = AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH;
			publicationService.rename("test-duplicate-tmp", "test-rename-tmp");

			Assert.isTrue(FileSystem.exists(AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH + "test-rename-tmp/index.html"));
			if (FileSystem.exists(AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH + "test-rename-tmp/index.html")){
				Assert.equals(TEST_HTML, File.getContent(AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH + "test-rename-tmp/index.html"));
				FileSystemTools.recursiveDelete(AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH + "test-rename-tmp/");
			}
		}
	}
/**/
}
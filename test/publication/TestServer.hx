package publication;

import org.silex.publication.PublicationService;
import org.silex.publication.PublicationData;
import org.silex.util.FileSystemTools;

import js.Dom;

import utest.Assert;
import utest.Runner;
import utest.ui.Report;

import sys.io.File;
import php.FileSystem;

class TestServer {
	private var publicationService:PublicationService;

	public static inline var THIS_TEST_PATH:String = "publication-data/";
	public static inline var THIS_TEST_PATH_READ:String = THIS_TEST_PATH + "read/";
	public static inline var THIS_TEST_PATH_WRITE:String = THIS_TEST_PATH + "write/";
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
		onResultRead(publicationService.getPublicationData("test-publication-private", AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH_READ));
	}
	private function onResultRead(publicationData:PublicationData):Void{
		Assert.notNull(publicationData);

		if (publicationData.html != null){
			Assert.equals(TEST_HTML, StringTools.trim(publicationData.html));
			Assert.equals(TEST_CSS, StringTools.trim(publicationData.css));
		}
	}
	public function testFilterPublicationPrivate():Void{
		var publications:Hash<PublicationConfigData> = publicationService.getPublications([Private], [Publication], 
			AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH_READ);
		var length = 0;
		// browse all publications 
		for (publicationName in publications.keys()){
			Assert.isFalse(File.getContent(AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH_READ + publicationName + "/conf/config.xml.php").indexOf("Private")==-1);
			Assert.isFalse(File.getContent(AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH_READ + publicationName + "/conf/config.xml.php").indexOf("Publication")==-1);
			length++;
		}
		Assert.isFalse(length==0);
	}
	public function testFilterPublicationTrashed():Void{
		var publications:Hash<PublicationConfigData> = publicationService.getPublications([Trashed(null)], [Publication], AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH_READ);
		var length = 0;
		// browse all publications 
		for (publicationName in publications.keys()){
			Assert.isFalse(File.getContent(AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH_READ + publicationName + "/conf/config.xml.php").indexOf("Trashed")==-1);
			Assert.isFalse(File.getContent(AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH_READ + publicationName + "/conf/config.xml.php").indexOf("Publication")==-1);
			length++;
		}
		Assert.isFalse(length==0);
	}
	public function testFilterThemePublished():Void{
		var publications:Hash<PublicationConfigData> = publicationService.getPublications([Published(null)], [Theme], AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH_READ);
		var length = 0;
		// browse all publications 
		for (publicationName in publications.keys()){
			Assert.isFalse(File.getContent(AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH_READ + publicationName + "/conf/config.xml.php").indexOf("Published")==-1);
			Assert.isFalse(File.getContent(AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH_READ + publicationName + "/conf/config.xml.php").indexOf("Theme")==-1);
			length++;
		}
		Assert.isFalse(length==0);
	}
	public function testFilterUtilityPublished():Void{
		var publications:Hash<PublicationConfigData> = publicationService.getPublications([Published(null)], [Utility], AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH_READ);
		var length = 0;
		// browse all publications 
		for (publicationName in publications.keys()){
			Assert.isFalse(File.getContent(AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH_READ + publicationName + "/conf/config.xml.php").indexOf("Published")==-1);
			Assert.isFalse(File.getContent(AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH_READ + publicationName + "/conf/config.xml.php").indexOf("Utility")==-1);
			length++;
		}
		Assert.isFalse(length==0);
	}
	//////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////

	public function testWrite():Void{

		publicationService.setPublicationData("test-write", TEST_PUBLICATION_DATA, AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH_WRITE);
		
		Assert.equals(TEST_HTML, File.getContent(AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH_WRITE + "test-write/index.html"));
	}
	public function testCreateAndTrash():Void{
		if (FileSystem.exists(AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH_WRITE + "test-create/"))
			FileSystemTools.recursiveDelete(AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH_WRITE + "test-create/");

		publicationService.create("test-create", TEST_PUBLICATION_DATA, AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH_WRITE);
		
		Assert.equals(TEST_HTML, File.getContent(AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH_WRITE + "test-create/index.html"));

		if (FileSystem.exists(AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH_WRITE + "test-create/index.html")){
			publicationService.trash("test-create", AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH_WRITE);
			Assert.isFalse(File.getContent(AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH_WRITE + "test-create/conf/config.xml.php").indexOf("Trashed")==-1);
		}

		// empty trash
		publicationService.emptyTrash(AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH_WRITE);
		Assert.isFalse(FileSystem.exists(AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH_WRITE + "test-create/"));
	}
	public function testDuplicateAndRename():Void{
		// remove existing folder
		if (FileSystem.exists(AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH_WRITE + "test-duplicate/"))
			FileSystemTools.recursiveDelete(AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH_WRITE + "test-duplicate/");

		publicationService.duplicate("test-read", "test-duplicate", AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH_WRITE);
		
		Assert.isTrue(FileSystem.exists(AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH_WRITE + "test-duplicate/index.html"));
		if (FileSystem.exists(AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH_WRITE + "test-duplicate/index.html"))
			Assert.equals(TEST_HTML, File.getContent(AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH_WRITE + "test-duplicate/index.html"));

		if (FileSystem.exists(AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH_WRITE + "test-duplicate/index.html")){
			// remove existing folder
			if (FileSystem.exists(AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH_WRITE + "test-rename/"))
				FileSystemTools.recursiveDelete(AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH_WRITE + "test-rename/");

			publicationService.rename("test-duplicate", "test-rename", AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH_WRITE);

			Assert.isTrue(FileSystem.exists(AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH_WRITE + "test-rename/index.html"));
			if (FileSystem.exists(AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH_WRITE + "test-rename/index.html")){
				Assert.equals(TEST_HTML, File.getContent(AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH_WRITE + "test-rename/index.html"));
				FileSystemTools.recursiveDelete(AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH_WRITE + "test-rename/");
			}
		}
	}
/**/
}
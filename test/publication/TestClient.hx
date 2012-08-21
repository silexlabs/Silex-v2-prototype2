package publication;

import org.silex.publication.PublicationService;
import org.silex.publication.PublicationData;

import js.Dom;
import js.XMLHttpRequest;

import utest.Assert;
import utest.Runner;
import utest.ui.Report;

class TestClient {
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
		publicationService = new PublicationService(AllTestsClient.TEST_ROOT_PATH + THIS_TEST_PATH, AllTestsClient.GATEWAY_URL);
	}

	//////////////////////////////////////////////////////////////////////////////////////////	
	private function onError(msg:String):Void{
		trace("onError "+msg);
		Assert.isTrue(false);
	}
	private function onPuropseError(msg:String):Void{
		trace("on purpose error: "+msg);
		Assert.notNull(msg);
	}

	private function loadString(url:String, onSuccess, onError):Void{
		var req = new XMLHttpRequest();
		req.onreadystatechange = function (){
			trace(req.readyState);
			if (req.readyState == 4) { 
				if (req.status == 200) {
					//trace("onreadystatechange"+req.responseText);
					onSuccess(req.responseText);
				} 
				else {
					//trace("Error", req.statusText);
					onError(req.statusText);
				}
			}
			else {
				//trace("Not ready", req);
			}
		};
		 
		req.open("GET", url, true);
		req.send(null);
	}
	
	private function onResultWriteNeverCalled():Void{
		Assert.isTrue(false);
	}
	private function onResultWriteNoCheck():Void{
		Assert.isTrue(true);
	}
	private function onResultStartAjaxCheck(urlToCompare:String, onHttpRequestReadyCallback):Void{
		trace("Load this to check the result: "+urlToCompare);
		loadString(urlToCompare, onHttpRequestReadyCallback, onHttpRequestReadyCallback);
	}
	private function onHttpRequestReady(response:String, expected:String):Void{
		trace("onHttpRequestReady "+response);
		Assert.notNull(response);
		if (response != null){
			Assert.equals(StringTools.trim(expected), StringTools.trim(response));
		}
	}
	private function createAsyncCallback(urlToCompare:String, expected:String):Dynamic{
		var onHttpRequestReadyCallback = cast(Assert.createEvent(callback(onHttpRequestReady,TEST_CSS), 2000));
		return callback(onResultStartAjaxCheck, urlToCompare, onHttpRequestReadyCallback);
	}


	//////////////////////////////////////////////////////////////////////////////////////////	
	public function testRead():Void{
		publicationService.getPublicationData("test-read", Assert.createEvent(onResultRead, 2000)
			, onError
		);
		publicationService.getPublicationData("test-not-exist", onResultRead
			, cast(Assert.createEvent(onPuropseError, 2000))
		);
	}
	private function onResultRead(publicationData:PublicationData):Void{
		Assert.notNull(publicationData);

		if (publicationData.html != null){
			Assert.equals(TEST_HTML, StringTools.trim(publicationData.html));
			Assert.equals(TEST_CSS, StringTools.trim(publicationData.css));
		}
	}
	//////////////////////////////////////////////////////////////////////////////////////////	
	public function testWrite():Void{
		publicationService.setPublicationData("test-write", TEST_PUBLICATION_DATA
			, createAsyncCallback("publication-data/test-read/app.css",TEST_CSS)
			, onError
		);
	}
	public function testWriteError():Void{
		publicationService.setPublicationData("test-not-exist", TEST_PUBLICATION_DATA
			, onResultWriteNeverCalled
			, cast(Assert.createEvent(onPuropseError, 2000))
		);
	}
	//////////////////////////////////////////////////////////////////////////////////////////	

	public function testCreateAndTrash():Void{

		publicationService.create("test-create", TEST_PUBLICATION_DATA
			, createAsyncCallback("publication-data/test-create/app.css",TEST_CSS)
			, onError
		);
		haxe.Timer.delay(doTrash, 200);
	}
	public function doTrash():Void{
		publicationService.trash("test-create"
			, Assert.createAsync(onResultWriteNoCheck, 2000)
			, onError
		);
		haxe.Timer.delay(doEmptyTrash, 200);
	}
	public function doEmptyTrash():Void{
		// empty trash
		publicationService.emptyTrash(
			Assert.createAsync(onResultWriteNoCheck, 200)
			//createAsyncCallback("publication-data/test-create/app.css", "Not Found")
			, onError
		);
	}
/*	public function testDuplicateAndRename():Void{
		// remove existing folder
		if (FileSystem.exists(AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH + "test-duplicate/"))
			FileSystemTools.recursiveDelete(AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH + "test-duplicate/");

		publicationService.duplicate("test-read", "test-duplicate");
		
		Assert.isTrue(FileSystem.exists(AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH + "test-duplicate/index.html"));
		if (FileSystem.exists(AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH + "test-duplicate/index.html"))
			Assert.equals(TEST_HTML, File.getContent(AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH + "test-duplicate/index.html"));

		if (FileSystem.exists(AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH + "test-duplicate/index.html")){
			// remove existing folder
			if (FileSystem.exists(AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH + "test-rename/"))
				FileSystemTools.recursiveDelete(AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH + "test-rename/");

			publicationService.rename("test-duplicate", "test-rename");

			Assert.isTrue(FileSystem.exists(AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH + "test-rename/index.html"));
			if (FileSystem.exists(AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH + "test-rename/index.html"))
				Assert.equals(TEST_HTML, File.getContent(AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH + "test-rename/index.html"));
		}
	}
	public function testGetPublications():Void{
		var publicationArray:Array<PublicationConfig> = publicationService.getPublications([Private]);
		// browse all publications 
		for (publicationConfig in publicationArray){
			Assert.isFalse(File.getContent(AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH + publicationConfig.publicationFolder + "conf/config.xml.php").indexOf("Private")==-1);
		}
		var publicationArray:Array<PublicationConfig> = publicationService.getPublications([Trashed(null)]);
		// browse all publications 
		for (publicationConfig in publicationArray){
			Assert.isFalse(File.getContent(AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH + publicationConfig.publicationFolder + "conf/config.xml.php").indexOf("Trashed")==-1);
		}
		var publicationArray:Array<PublicationConfig> = publicationService.getPublications([Published(null)]);
		// browse all publications 
		for (publicationConfig in publicationArray){
			Assert.isFalse(File.getContent(AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH + publicationConfig.publicationFolder + "conf/config.xml.php").indexOf("Published")==-1);
		}
	}
*/
}
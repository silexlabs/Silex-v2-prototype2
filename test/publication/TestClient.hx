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
	};
	public static inline var TEST_PUBLICATION_CONFIG:PublicationConfig = {
		state : Private,
		creation : {
			author : "silexlabs", 
			date : Date.fromString("2021-12-02")
		}, 
		lastChange : {
			author : "silexlabs", 
			date : Date.fromString("2021-12-02")
		}
	};

	public function new(){
		publicationService = new PublicationService(AllTestsClient.TEST_ROOT_PATH + THIS_TEST_PATH, AllTestsClient.GATEWAY_URL);
	}
	//////////////////////////////////////////////////////////////////////////////////////////	
	private function onError(msg:String):Void{
		trace("onError "+msg);
		throw("onError "+msg);
	}
	private function onPuropseError(msg:String):Void{
		//trace("on purpose error: "+msg);
		Assert.notNull(msg);
	}

	private function loadString(url:String, onSuccess, onError):Void{
		var req = new XMLHttpRequest();
		req.onreadystatechange = function (){
			//trace(req.readyState);
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
		trace("AJAX-Load this to check the result: "+urlToCompare);
		loadString(urlToCompare, onHttpRequestReadyCallback, onHttpRequestReadyCallback);
	}
	private function onHttpRequestReady(response:String, expected:String):Void{
		//trace("onHttpRequestReady "+response);
		Assert.notNull(response);
		if (response != null){
			Assert.equals(StringTools.trim(expected), StringTools.trim(response));
		}
	}
	private function createAsyncCallback(urlToCompare:String, expected:String):Dynamic{
		var onHttpRequestReadyCallback = cast(Assert.createEvent(callback(onHttpRequestReady,TEST_CSS), 4000));
		return callback(onResultStartAjaxCheck, urlToCompare, onHttpRequestReadyCallback);
	}


	//////////////////////////////////////////////////////////////////////////////////////////	
	public function testRead():Void{
		publicationService.getPublicationData("test-read", Assert.createEvent(onResultRead, 4000)
			, onError
		);
		publicationService.getPublicationData("test-not-exist", onResultRead
			, cast(Assert.createEvent(onPuropseError, 4000))
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
			, cast(Assert.createEvent(onPuropseError, 4000))
		);
	}
	//////////////////////////////////////////////////////////////////////////////////////////	

	public function testCreateAndTrash():Void{
		trace("testCreateAndTrash");
		publicationService.create("test-create", TEST_PUBLICATION_DATA
			, createAsyncCallback("publication-data/test-create/app.css",TEST_CSS)
			, onError
		);
		haxe.Timer.delay(doTrash, 100);
	}
	private function doTrash():Void{
		trace("doTrash");
		publicationService.trash("test-create"
			, Assert.createAsync(onResultWriteNoCheck, 4000)
			, onError
		);
		haxe.Timer.delay(doEmptyTrash, 100);
	}
	private function doEmptyTrash():Void{
		trace("doEmptyTrash");
		// empty trash
		publicationService.emptyTrash(
			Assert.createAsync(onResultWriteNoCheck, 4000)
			//createAsyncCallback("publication-data/test-create/app.css", "Not Found")
			, onError
		);
	}
	public function testDuplicateAndRename():Void{
		trace("testDuplicateAndRename");
		publicationService.duplicate("test-read", "test-duplicate"
			, createAsyncCallback("publication-data/test-duplicate/app.css",TEST_CSS)
			, onError
		);
		haxe.Timer.delay(doRename, 500);
	}
	private function doRename():Void{
		trace("doRename");
		publicationService.rename("test-duplicate", "test-rename"
			, createAsyncCallback("publication-data/test-rename/app.css",TEST_CSS)
			, onError
		);
		trace("NOW REMOVE THE FOLDER bin/publication-data/test-rename/");
/*		haxe.Timer.delay(cleanup, 1000);
	}
	private function cleanup():Void{
		trace("cleanup");
		publicationService.trash("test-rename"
			, Assert.createAsync(onResultWriteNoCheck, 4000)
			, onError
		);
		haxe.Timer.delay(doEmptyTrash, 100);
*/	}
	public function testGetPublications():Void{
		publicationService.getPublications([Private], cast(Assert.createEvent(onResultGetPublications)));
	}
	private function onResultGetPublications(publications:Hash<PublicationConfig>):Void{
		if (publications != null){
			// browse all publications 
			for (publicationName in publications.keys()){
				trace("Publication "+ publicationName+" is "+publications.get(publicationName).state);
				Assert.same(Private, publications.get(publicationName).state);
			}
		}
	}
}
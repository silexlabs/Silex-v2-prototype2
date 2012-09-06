package publication;

import silex.publication.PublicationService;
import silex.publication.PublicationData;

import js.Dom;
import js.XMLHttpRequest;

import utest.Assert;
import utest.Runner;
import utest.ui.Report;

class TestClient {
	private var publicationServiceRead:PublicationService;
	private var publicationServiceWrite:PublicationService;

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
	public static inline var TEST_PUBLICATION_CONFIG_TRASHED:String = '<xml>
	<!--
		<?php
			exit("access denied
	-"."->
</"."xml>");
		?>
	-->
<state author="todo: authors and security" date="2012-08-26 10:24:40">Trashed</state>
<category>Publication</category>
<creation>
	<author>silexlabs</author>
	<date>2012-08-26 10:24:40</date>
</creation>
<lastChange>
	<author>to do this author</author>
	<date>2012-08-26 10:24:40</date>
</lastChange>
</xml>';
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
		debugModeAction: null,
	};

	public function new(){
		publicationServiceRead = new PublicationService(AllTestsClient.TEST_ROOT_PATH + THIS_TEST_PATH_READ, AllTestsClient.GATEWAY_URL);
		publicationServiceWrite = new PublicationService(AllTestsClient.TEST_ROOT_PATH + THIS_TEST_PATH_WRITE, AllTestsClient.GATEWAY_URL);
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
		var onHttpRequestReadyCallback = cast(Assert.createEvent(callback(onHttpRequestReady,expected), 6000));
		return callback(onResultStartAjaxCheck, urlToCompare, onHttpRequestReadyCallback);
	}


	//////////////////////////////////////////////////////////////////////////////////////////	
	public function testRead():Void{
		publicationServiceRead.getPublicationData("test-publication-private", 
			Assert.createEvent(onResultRead, 2000)
			, onError
		);
		publicationServiceRead.getPublicationData("test-not-exist", 
			onResultRead
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
	public function testGetPublications():Void{
		publicationServiceRead.getPublications([Private], null, cast(Assert.createEvent(onResultGetPublications)));
	}
	private function onResultGetPublications(publications:Hash<PublicationConfigData>):Void{
		Assert.isFalse(publications == null);
		if (publications != null){
			var length = 0;
			// browse all publications 
			for (publicationName in publications.keys()){
				trace("Publication "+ publicationName+" is "+publications.get(publicationName).state);
				Assert.same(Private, publications.get(publicationName).state);
				length++;
			}
			Assert.isFalse(length == 0);
		}
	}
	public function testGetThemes():Void{
		publicationServiceRead.getPublications(null, [Theme], cast(Assert.createEvent(onResultGetThemes)));
	}
	private function onResultGetThemes(publications:Hash<PublicationConfigData>):Void{
		Assert.isFalse(publications == null);
		if (publications != null){
			var length = 0;
			// browse all publications 
			for (publicationName in publications.keys()){
				trace("Publication "+ publicationName+" is "+publications.get(publicationName).category);
				Assert.same(Theme, publications.get(publicationName).category);
				length++;
			}
			Assert.isFalse(length == 0);
		}
	}
	//////////////////////////////////////////////////////////////////////////////////////////	
	public function testWrite():Void{
		publicationServiceWrite.setPublicationData("test-write", TEST_PUBLICATION_DATA
			, createAsyncCallback(THIS_TEST_PATH_WRITE + "test-write/app.css",TEST_CSS)
			, onError
		);
	}
	public function testWriteError():Void{
		publicationServiceWrite.setPublicationData("test-not-exist", TEST_PUBLICATION_DATA
			, onResultWriteNeverCalled
			, cast(Assert.createEvent(onPuropseError, 4000))
		);
	}
	//////////////////////////////////////////////////////////////////////////////////////////	

	public function testCreateAndTrash():Void{
		trace("testCreateAndTrash");
		publicationServiceWrite.create("test-create-tmp", TEST_PUBLICATION_DATA
			, createAsyncCallback(THIS_TEST_PATH_WRITE + "test-create-tmp/app.css",TEST_CSS)
			, onError
		);
		haxe.Timer.delay(doTrash, 100);
	}
	private function doTrash():Void{
		trace("doTrash");
		publicationServiceWrite.trash("test-create-tmp"
			, Assert.createAsync(onResultWriteNoCheck, 4000)
			, onError
		);
		haxe.Timer.delay(doEmptyTrash, 100);
	}
	private function doEmptyTrash():Void{
		trace("doEmptyTrash");
		// empty trash
		publicationServiceWrite.emptyTrash(
			Assert.createAsync(onResultWriteNoCheck, 4000)
			//createAsyncCallback(THIS_TEST_PATH_WRITE + "test-create/app.css", "Not Found")
			, onError
		);
	}
	public function testDuplicateAndRename():Void{
		trace("testDuplicateAndRename, REMEMBER TO DELETE FOLDERS FROM PREVIOUS TEST: sudo rm -R test/bin/publication-data/write/*-tmp");
		publicationServiceWrite.duplicate("test-duplicate", "duplicated-tmp"
			, createAsyncCallback(THIS_TEST_PATH_WRITE + "duplicated-tmp/app.css",TEST_CSS)
			, onError
		);
		haxe.Timer.delay(doRename, 100);
	}
	private function doRename():Void{
		trace("doRename");
		publicationServiceWrite.rename("duplicated-tmp", "renamed-tmp"
			, createAsyncCallback(THIS_TEST_PATH_WRITE + "renamed-tmp/app.css",TEST_CSS)
			, onError
		);
		trace("NOW REMOVE THE FOLDERS FROM PREVIOUS TEST: sudo rm -R test/bin/publication-data/write/*-tmp");
	}
/**/
}
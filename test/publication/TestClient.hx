package publication;

import org.silex.publication.PublicationService;

import js.Dom;

import utest.Assert;
import utest.Runner;
import utest.ui.Report;

class TestClient {
	private var publicationService:PublicationService;

	public static inline var THIS_TEST_PATH:String = "publication-data/";
	public static inline var TEST_HTML:String = "<HTML>
	<HEAD>
	</HEAD>
	<BODY>
		Test Publication
	</BODY>
</HTML>";

	public function new(){
		publicationService = new PublicationService(AllTestsClient.TEST_ROOT_PATH + THIS_TEST_PATH, "./test.php/");
	}
	
	public function testReadRawHtml():Void{
		publicationService.getRawHtml("test-read", Assert.createEvent(onResultReadRawHtml), onError);
		publicationService.getRawHtml("test-not-exist", onResultReadRawHtml, Assert.createEvent(onPuropseError));
	}
	public function testWriteRawHtml():Void{
		publicationService.setRawHtml("test-write", TEST_HTML, Assert.createAsync(onResultWriteRawHtml), onError);
		publicationService.setRawHtml("test-not-exist", TEST_HTML, onResultWriteRawHtml, Assert.createEvent(onPuropseError));
	}
	private function onError(msg:String):Void{
		trace("onError "+msg);
	}
	private function onPuropseError(msg:String):Void{
		trace("on purpose error: "+msg);
		Assert.notNull(msg);
	}
	private function onResultWriteRawHtml():Void{
		Assert.isTrue(true);
	}
	private function onResultReadRawHtml(html:String):Void{
		Assert.notNull(html);
		Assert.notEquals("", html);
		if (html != null){
			Assert.equals(TEST_HTML, StringTools.trim(html));
		}
	}
}
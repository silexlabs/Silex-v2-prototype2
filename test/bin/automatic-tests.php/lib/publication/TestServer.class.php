<?php

class publication_TestServer {
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		$this->publicationService = new silex_publication_PublicationService();
	}}
	public function testDuplicateAndRename() {
		if(file_exists("../" . "../publication-data/" . "test-duplicate-tmp/")) {
			silex_util_FileSystemTools::recursiveDelete("../" . "../publication-data/" . "test-duplicate-tmp/");
		}
		silex_publication_PublicationService::$PUBLICATION_FOLDER = "../" . "../publication-data/";
		$this->publicationService->duplicate("test-duplicate", "test-duplicate-tmp");
		utest_Assert::isTrue(file_exists("../" . "../publication-data/" . "test-duplicate-tmp/index.html"), null, _hx_anonymous(array("fileName" => "TestServer.hx", "lineNumber" => 155, "className" => "publication.TestServer", "methodName" => "testDuplicateAndRename")));
		if(file_exists("../" . "../publication-data/" . "test-duplicate-tmp/index.html")) {
			utest_Assert::equals("<HTML>\x0A\x09<HEAD>\x0A\x09</HEAD>\x0A\x09<BODY>\x0A\x09\x09Test Publication\x0A\x09</BODY>\x0A</HTML>", sys_io_File::getContent("../" . "../publication-data/" . "test-duplicate-tmp/index.html"), null, _hx_anonymous(array("fileName" => "TestServer.hx", "lineNumber" => 157, "className" => "publication.TestServer", "methodName" => "testDuplicateAndRename")));
		}
		if(file_exists("../" . "../publication-data/" . "test-duplicate-tmp/index.html")) {
			if(file_exists("../" . "../publication-data/" . "test-rename-tmp/")) {
				silex_util_FileSystemTools::recursiveDelete("../" . "../publication-data/" . "test-rename-tmp/");
			}
			silex_publication_PublicationService::$PUBLICATION_FOLDER = "../" . "../publication-data/";
			$this->publicationService->rename("test-duplicate-tmp", "test-rename-tmp");
			utest_Assert::isTrue(file_exists("../" . "../publication-data/" . "test-rename-tmp/index.html"), null, _hx_anonymous(array("fileName" => "TestServer.hx", "lineNumber" => 167, "className" => "publication.TestServer", "methodName" => "testDuplicateAndRename")));
			if(file_exists("../" . "../publication-data/" . "test-rename-tmp/index.html")) {
				utest_Assert::equals("<HTML>\x0A\x09<HEAD>\x0A\x09</HEAD>\x0A\x09<BODY>\x0A\x09\x09Test Publication\x0A\x09</BODY>\x0A</HTML>", sys_io_File::getContent("../" . "../publication-data/" . "test-rename-tmp/index.html"), null, _hx_anonymous(array("fileName" => "TestServer.hx", "lineNumber" => 169, "className" => "publication.TestServer", "methodName" => "testDuplicateAndRename")));
				silex_util_FileSystemTools::recursiveDelete("../" . "../publication-data/" . "test-rename-tmp/");
			}
		}
	}
	public function testCreateAndTrash() {
		if(file_exists("../" . "../publication-data/" . "test-create-tmp/")) {
			silex_util_FileSystemTools::recursiveDelete("../" . "../publication-data/" . "test-create-tmp/");
		}
		silex_publication_PublicationService::$PUBLICATION_FOLDER = "../" . "../publication-data/";
		$this->publicationService->create("test-create-tmp", _hx_anonymous(array("html" => "<HTML>\x0A\x09<HEAD>\x0A\x09</HEAD>\x0A\x09<BODY>\x0A\x09\x09Test Publication\x0A\x09</BODY>\x0A</HTML>", "css" => "body{\x0A\x09font-family: Verdana, Arial;\x0A\x09font-size: 14pt;\x0A    margin: 0;\x0A    padding: 0;\x0A    background-color: grey;\x0A    overflow: auto;\x0A}")));
		utest_Assert::equals("<HTML>\x0A\x09<HEAD>\x0A\x09</HEAD>\x0A\x09<BODY>\x0A\x09\x09Test Publication\x0A\x09</BODY>\x0A</HTML>", sys_io_File::getContent("../" . "../publication-data/" . "test-create-tmp/index.html"), null, _hx_anonymous(array("fileName" => "TestServer.hx", "lineNumber" => 136, "className" => "publication.TestServer", "methodName" => "testCreateAndTrash")));
		if(file_exists("../" . "../publication-data/" . "test-create-tmp/index.html")) {
			$this->publicationService->trash("test-create-tmp");
			utest_Assert::isFalse(_hx_index_of(sys_io_File::getContent("../" . "../publication-data/" . "test-create-tmp/conf/config.xml.php"), "Trashed", null) === -1, null, _hx_anonymous(array("fileName" => "TestServer.hx", "lineNumber" => 140, "className" => "publication.TestServer", "methodName" => "testCreateAndTrash")));
		}
		$this->publicationService->emptyTrash();
		utest_Assert::isFalse(file_exists("../" . "../publication-data/" . "test-create-tmp/"), null, _hx_anonymous(array("fileName" => "TestServer.hx", "lineNumber" => 145, "className" => "publication.TestServer", "methodName" => "testCreateAndTrash")));
	}
	public function testWrite() {
		silex_publication_PublicationService::$PUBLICATION_FOLDER = "../" . "../publication-data/";
		$this->publicationService->setPublicationData("test-write", _hx_anonymous(array("html" => "<HTML>\x0A\x09<HEAD>\x0A\x09</HEAD>\x0A\x09<BODY>\x0A\x09\x09Test Publication\x0A\x09</BODY>\x0A</HTML>", "css" => "body{\x0A\x09font-family: Verdana, Arial;\x0A\x09font-size: 14pt;\x0A    margin: 0;\x0A    padding: 0;\x0A    background-color: grey;\x0A    overflow: auto;\x0A}")));
		utest_Assert::equals("<HTML>\x0A\x09<HEAD>\x0A\x09</HEAD>\x0A\x09<BODY>\x0A\x09\x09Test Publication\x0A\x09</BODY>\x0A</HTML>", sys_io_File::getContent("../" . "../publication-data/" . "test-write/index.html"), null, _hx_anonymous(array("fileName" => "TestServer.hx", "lineNumber" => 127, "className" => "publication.TestServer", "methodName" => "testWrite")));
	}
	public function testFilterUtilityPublished() {
		silex_publication_PublicationService::$PUBLICATION_FOLDER = "../" . "../publication-data/";
		$publications = $this->publicationService->getPublications(new _hx_array(array(silex_publication_PublicationState::Published(null))), new _hx_array(array(silex_publication_PublicationCategory::$Utility)));
		$length = 0;
		if(null == $publications) throw new HException('null iterable');
		$»it = $publications->keys();
		while($»it->hasNext()) {
			$publicationName = $»it->next();
			utest_Assert::isFalse(_hx_index_of(sys_io_File::getContent("../" . "../publication-data/" . $publicationName . "/conf/config.xml.php"), "Published", null) === -1, null, _hx_anonymous(array("fileName" => "TestServer.hx", "lineNumber" => 111, "className" => "publication.TestServer", "methodName" => "testFilterUtilityPublished")));
			utest_Assert::isFalse(_hx_index_of(sys_io_File::getContent("../" . "../publication-data/" . $publicationName . "/conf/config.xml.php"), "Utility", null) === -1, null, _hx_anonymous(array("fileName" => "TestServer.hx", "lineNumber" => 112, "className" => "publication.TestServer", "methodName" => "testFilterUtilityPublished")));
			$length++;
		}
		utest_Assert::isFalse($length === 0, null, _hx_anonymous(array("fileName" => "TestServer.hx", "lineNumber" => 115, "className" => "publication.TestServer", "methodName" => "testFilterUtilityPublished")));
	}
	public function testFilterThemePublished() {
		silex_publication_PublicationService::$PUBLICATION_FOLDER = "../" . "../publication-data/";
		$publications = $this->publicationService->getPublications(new _hx_array(array(silex_publication_PublicationState::Published(null))), new _hx_array(array(silex_publication_PublicationCategory::$Theme)));
		$length = 0;
		if(null == $publications) throw new HException('null iterable');
		$»it = $publications->keys();
		while($»it->hasNext()) {
			$publicationName = $»it->next();
			utest_Assert::isFalse(_hx_index_of(sys_io_File::getContent("../" . "../publication-data/" . $publicationName . "/conf/config.xml.php"), "Published", null) === -1, null, _hx_anonymous(array("fileName" => "TestServer.hx", "lineNumber" => 99, "className" => "publication.TestServer", "methodName" => "testFilterThemePublished")));
			utest_Assert::isFalse(_hx_index_of(sys_io_File::getContent("../" . "../publication-data/" . $publicationName . "/conf/config.xml.php"), "Theme", null) === -1, null, _hx_anonymous(array("fileName" => "TestServer.hx", "lineNumber" => 100, "className" => "publication.TestServer", "methodName" => "testFilterThemePublished")));
			$length++;
		}
		utest_Assert::isFalse($length === 0, null, _hx_anonymous(array("fileName" => "TestServer.hx", "lineNumber" => 103, "className" => "publication.TestServer", "methodName" => "testFilterThemePublished")));
	}
	public function testFilterPublicationTrashed() {
		silex_publication_PublicationService::$PUBLICATION_FOLDER = "../" . "../publication-data/";
		$publications = $this->publicationService->getPublications(new _hx_array(array(silex_publication_PublicationState::Trashed(null))), new _hx_array(array(silex_publication_PublicationCategory::$Publication)));
		$length = 0;
		if(null == $publications) throw new HException('null iterable');
		$»it = $publications->keys();
		while($»it->hasNext()) {
			$publicationName = $»it->next();
			utest_Assert::isFalse(_hx_index_of(sys_io_File::getContent("../" . "../publication-data/" . $publicationName . "/conf/config.xml.php"), "Trashed", null) === -1, null, _hx_anonymous(array("fileName" => "TestServer.hx", "lineNumber" => 87, "className" => "publication.TestServer", "methodName" => "testFilterPublicationTrashed")));
			utest_Assert::isFalse(_hx_index_of(sys_io_File::getContent("../" . "../publication-data/" . $publicationName . "/conf/config.xml.php"), "Publication", null) === -1, null, _hx_anonymous(array("fileName" => "TestServer.hx", "lineNumber" => 88, "className" => "publication.TestServer", "methodName" => "testFilterPublicationTrashed")));
			$length++;
		}
		utest_Assert::isFalse($length === 0, null, _hx_anonymous(array("fileName" => "TestServer.hx", "lineNumber" => 91, "className" => "publication.TestServer", "methodName" => "testFilterPublicationTrashed")));
	}
	public function testFilterPublicationPrivate() {
		silex_publication_PublicationService::$PUBLICATION_FOLDER = "../" . "../publication-data/";
		$publications = $this->publicationService->getPublications(new _hx_array(array(silex_publication_PublicationState::$Private)), new _hx_array(array(silex_publication_PublicationCategory::$Publication)));
		$length = 0;
		if(null == $publications) throw new HException('null iterable');
		$»it = $publications->keys();
		while($»it->hasNext()) {
			$publicationName = $»it->next();
			utest_Assert::isFalse(_hx_index_of(sys_io_File::getContent("../" . "../publication-data/" . $publicationName . "/conf/config.xml.php"), "Private", null) === -1, null, _hx_anonymous(array("fileName" => "TestServer.hx", "lineNumber" => 75, "className" => "publication.TestServer", "methodName" => "testFilterPublicationPrivate")));
			utest_Assert::isFalse(_hx_index_of(sys_io_File::getContent("../" . "../publication-data/" . $publicationName . "/conf/config.xml.php"), "Publication", null) === -1, null, _hx_anonymous(array("fileName" => "TestServer.hx", "lineNumber" => 76, "className" => "publication.TestServer", "methodName" => "testFilterPublicationPrivate")));
			$length++;
		}
		utest_Assert::isFalse($length === 0, null, _hx_anonymous(array("fileName" => "TestServer.hx", "lineNumber" => 79, "className" => "publication.TestServer", "methodName" => "testFilterPublicationPrivate")));
	}
	public function onResultRead($publicationData) {
		utest_Assert::notNull($publicationData, null, _hx_anonymous(array("fileName" => "TestServer.hx", "lineNumber" => 62, "className" => "publication.TestServer", "methodName" => "onResultRead")));
		if($publicationData->html !== null) {
			utest_Assert::equals("<HTML>\x0A\x09<HEAD>\x0A\x09</HEAD>\x0A\x09<BODY>\x0A\x09\x09Test Publication\x0A\x09</BODY>\x0A</HTML>", trim($publicationData->html), null, _hx_anonymous(array("fileName" => "TestServer.hx", "lineNumber" => 65, "className" => "publication.TestServer", "methodName" => "onResultRead")));
			utest_Assert::equals("body{\x0A\x09font-family: Verdana, Arial;\x0A\x09font-size: 14pt;\x0A    margin: 0;\x0A    padding: 0;\x0A    background-color: grey;\x0A    overflow: auto;\x0A}", trim($publicationData->css), null, _hx_anonymous(array("fileName" => "TestServer.hx", "lineNumber" => 66, "className" => "publication.TestServer", "methodName" => "onResultRead")));
		}
	}
	public function testReadPublicationPrivate() {
		silex_publication_PublicationService::$PUBLICATION_FOLDER = "../" . "../publication-data/";
		$this->onResultRead($this->publicationService->getPublicationData("test-publication-private"));
	}
	public $publicationService;
	public function __call($m, $a) {
		if(isset($this->$m) && is_callable($this->$m))
			return call_user_func_array($this->$m, $a);
		else if(isset($this->»dynamics[$m]) && is_callable($this->»dynamics[$m]))
			return call_user_func_array($this->»dynamics[$m], $a);
		else if('toString' == $m)
			return $this->__toString();
		else
			throw new HException('Unable to call «'.$m.'»');
	}
	static $THIS_TEST_PATH = "../publication-data/";
	static $TEST_CSS = "body{\x0A\x09font-family: Verdana, Arial;\x0A\x09font-size: 14pt;\x0A    margin: 0;\x0A    padding: 0;\x0A    background-color: grey;\x0A    overflow: auto;\x0A}";
	static $TEST_HTML = "<HTML>\x0A\x09<HEAD>\x0A\x09</HEAD>\x0A\x09<BODY>\x0A\x09\x09Test Publication\x0A\x09</BODY>\x0A</HTML>";
	static $TEST_PUBLICATION_DATA;
	static $TEST_PUBLICATION_CONFIG;
	function __toString() { return 'publication.TestServer'; }
}
publication_TestServer::$TEST_PUBLICATION_DATA = _hx_anonymous(array("html" => "<HTML>\x0A\x09<HEAD>\x0A\x09</HEAD>\x0A\x09<BODY>\x0A\x09\x09Test Publication\x0A\x09</BODY>\x0A</HTML>", "css" => "body{\x0A\x09font-family: Verdana, Arial;\x0A\x09font-size: 14pt;\x0A    margin: 0;\x0A    padding: 0;\x0A    background-color: grey;\x0A    overflow: auto;\x0A}"));
publication_TestServer::$TEST_PUBLICATION_CONFIG = _hx_anonymous(array("state" => silex_publication_PublicationState::$Private, "category" => silex_publication_PublicationCategory::$Publication, "creation" => _hx_anonymous(array("author" => "silexlabs", "date" => Date::fromString("2021-12-02"))), "lastChange" => _hx_anonymous(array("author" => "silexlabs", "date" => Date::fromString("2021-12-02"))), "debugModeAction" => null));

<?php

class util_TestServer {
	public function __construct() { 
	}
	public function testRecursiveCopyAndDelete() {
		if(file_exists("../" . "util-data/" . "test-recursive-delete/")) {
			throw new HException("error, can not run test because " . "../" . "util-data/" . "test-recursive-delete/ already exist");
		}
		silex_util_FileSystemTools::recursiveCopy("../" . "util-data/" . "test-recursive-copy/", "../" . "util-data/" . "test-recursive-delete/");
		utest_Assert::isTrue(file_exists("../" . "util-data/" . "test-recursive-delete/"), null, _hx_anonymous(array("fileName" => "TestServer.hx", "lineNumber" => 21, "className" => "util.TestServer", "methodName" => "testRecursiveCopyAndDelete")));
		utest_Assert::isTrue(file_exists("../" . "util-data/" . "test-recursive-delete/test1"), null, _hx_anonymous(array("fileName" => "TestServer.hx", "lineNumber" => 22, "className" => "util.TestServer", "methodName" => "testRecursiveCopyAndDelete")));
		utest_Assert::isTrue(file_exists("../" . "util-data/" . "test-recursive-delete/test1/test.txt"), null, _hx_anonymous(array("fileName" => "TestServer.hx", "lineNumber" => 23, "className" => "util.TestServer", "methodName" => "testRecursiveCopyAndDelete")));
		silex_util_FileSystemTools::recursiveDelete("../" . "util-data/" . "test-recursive-delete/");
		utest_Assert::isFalse(file_exists("../" . "util-data/" . "test-recursive-delete/"), null, _hx_anonymous(array("fileName" => "TestServer.hx", "lineNumber" => 26, "className" => "util.TestServer", "methodName" => "testRecursiveCopyAndDelete")));
	}
	static $THIS_TEST_PATH = "util-data/";
	function __toString() { return 'util.TestServer'; }
}

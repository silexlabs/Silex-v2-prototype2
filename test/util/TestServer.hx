package util;

import utest.Assert;
import utest.Runner;
import utest.ui.Report;

import sys.io.File;
import php.FileSystem;

import silex.util.FileSystemTools;

class TestServer {
	public static inline var THIS_TEST_PATH:String = "util-data/";
	public function new(){
	}
	public function testRecursiveCopyAndDelete():Void{
		if (FileSystem.exists(AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH + "test-recursive-delete/"))
			throw ("error, can not run test because "+AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH + "test-recursive-delete/ already exist");

		FileSystemTools.recursiveCopy(AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH + "test-recursive-copy/", AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH + "test-recursive-delete/");
		Assert.isTrue(FileSystem.exists(AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH + "test-recursive-delete/"));
		Assert.isTrue(FileSystem.exists(AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH + "test-recursive-delete/test1"));
		Assert.isTrue(FileSystem.exists(AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH + "test-recursive-delete/test1/test.txt"));

		FileSystemTools.recursiveDelete(AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH + "test-recursive-delete/");
		Assert.isFalse(FileSystem.exists(AllTestsServer.TEST_ROOT_PATH + THIS_TEST_PATH + "test-recursive-delete/"));
	}
}
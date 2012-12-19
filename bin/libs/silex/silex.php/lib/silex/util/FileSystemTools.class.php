<?php

class silex_util_FileSystemTools {
	public function __construct(){}
	static function recursiveDelete($path) {
		$GLOBALS['%s']->push("silex.util.FileSystemTools::recursiveDelete");
		$»spos = $GLOBALS['%s']->length;
		$files = sys_FileSystem::readDirectory($path);
		{
			$_g = 0;
			while($_g < $files->length) {
				$filePath = $files[$_g];
				++$_g;
				if(is_dir($path . "/" . $filePath)) {
					silex_util_FileSystemTools::recursiveDelete($path . "/" . $filePath);
				} else {
					@unlink($path . "/" . $filePath);
				}
				unset($filePath);
			}
		}
		@rmdir($path);
		$GLOBALS['%s']->pop();
	}
	static function recursiveCopy($srcPath, $dstPath) {
		$GLOBALS['%s']->push("silex.util.FileSystemTools::recursiveCopy");
		$»spos = $GLOBALS['%s']->length;
		if(!StringTools::endsWith($srcPath, "/")) {
			$srcPath .= "/";
		}
		if(!StringTools::endsWith($dstPath, "/")) {
			$dstPath .= "/";
		}
		if(!file_exists($dstPath)) {
			@mkdir($dstPath, 493);
		}
		$files = sys_FileSystem::readDirectory($srcPath);
		{
			$_g = 0;
			while($_g < $files->length) {
				$filePath = $files[$_g];
				++$_g;
				if(is_dir($srcPath . $filePath)) {
					silex_util_FileSystemTools::recursiveCopy($srcPath . $filePath . "/", $dstPath . $filePath . "/");
				} else {
					sys_io_File::copy($srcPath . $filePath, $dstPath . $filePath);
				}
				unset($filePath);
			}
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'silex.util.FileSystemTools'; }
}

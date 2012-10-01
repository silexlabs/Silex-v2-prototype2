<?php

class org_silex_util_FileSystemTools {
	public function __construct(){}
	static function recursiveDelete($path) {
		$files = sys_FileSystem::readDirectory($path);
		{
			$_g = 0;
			while($_g < $files->length) {
				$filePath = $files[$_g];
				++$_g;
				if(is_dir($path . "/" . $filePath)) {
					org_silex_util_FileSystemTools::recursiveDelete($path . "/" . $filePath);
				} else {
					@unlink($path . "/" . $filePath);
				}
				unset($filePath);
			}
		}
		@rmdir($path);
	}
	static function recursiveCopy($srcPath, $dstPath) {
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
					org_silex_util_FileSystemTools::recursiveCopy($srcPath . $filePath . "/", $dstPath . $filePath . "/");
				} else {
					sys_io_File::copy($srcPath . $filePath, $dstPath . $filePath);
				}
				unset($filePath);
			}
		}
	}
	function __toString() { return 'org.silex.util.FileSystemTools'; }
}

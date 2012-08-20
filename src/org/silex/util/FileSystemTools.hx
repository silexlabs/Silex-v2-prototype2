package org.silex.util;

import sys.FileSystem;
import sys.io.File;

/**
 * FileSystem helper functions
 * Server side only
 */
class FileSystemTools
{
	/**
	 * Recursively delete directory content
	 */
	public static function recursiveDelete(path:String){
		// browse all files and folders in the directory
		var files:Array<String> = FileSystem.readDirectory(path);
		for(filePath in files){
			if(FileSystem.isDirectory(path + "/" + filePath)){
				// recursively delete the directory
				recursiveDelete(path + "/" + filePath);
			}
			else{
				// delete files in the directory
				FileSystem.deleteFile(path + "/" + filePath);
			}
		}
		// delete the root directory
		FileSystem.deleteDirectory(path);
	}
	/**
	 * Recursively copy directory content
	 * Merge folders if the destination exists
	 */
	public static function recursiveCopy(srcPath:String, dstPath:String){
		// the path is supposed to end with a "/"
		if (!StringTools.endsWith(srcPath, "/"))
			srcPath += "/";
		if (!StringTools.endsWith(dstPath, "/"))
			dstPath += "/";

		// create the destination directory
		if(!FileSystem.exists(dstPath))
			FileSystem.createDirectory(dstPath);

		// browse all files and folders in the directory
		var files:Array<String> = FileSystem.readDirectory(srcPath);
		for(filePath in files){
			if(FileSystem.isDirectory(srcPath + filePath)){
				// recursively copy the directory
				recursiveCopy(srcPath + filePath + "/", dstPath + filePath + "/");
			}
			else{
				// copy this files
				File.copy(srcPath + filePath, dstPath + filePath);
			}
		}
	}
}
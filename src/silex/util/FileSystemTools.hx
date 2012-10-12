package silex.util;

import sys.FileSystem;
import sys.io.File;
import php.Web;

/**
 * FileSystem helper functions
 * Server side only
 */
class FileSystemTools
{
	/**
	 * Retrieve the path to the root folder of the app, given the location of the php library
	 */
/*	public static inline var SILEX_ROOT_PATH_FROM_PHP_LIB = "../../../";
	public static inline var SILEX_PHP_LIB_PATH = "libs/silex/silex.php";
	public static var DEFAULT_PHP_LIB_PATH = SILEX_PHP_LIB_PATH;

	public static function getRootFolder(pathOfPhpLib:String = null):String{
		if (pathOfPhpLib == null)
			pathOfPhpLib = DEFAULT_PHP_LIB_PATH;

		if (StringTools.startsWith(pathOfPhpLib, "./"))
			pathOfPhpLib = pathOfPhpLib.substr(-2);
		if (StringTools.endsWith(pathOfPhpLib, "/"))
			pathOfPhpLib = pathOfPhpLib.substr(0, pathOfPhpLib.length-1);

		var thisFile = Web.getCwd();
		var ret = thisFile.substr(0,thisFile.indexOf(pathOfPhpLib));
		
		return ret;
	}
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
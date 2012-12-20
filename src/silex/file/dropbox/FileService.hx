package silex.file.dropbox;

import silex.ServiceBase;

import php.Web;
import php.Lib;

import sys.io.File;
import sys.FileSystem;

import silex.config.ServerConfig;

/**
 * server side implementation of the file service
 * this class let you manipulate files on the server
 * todo: security checks to modify only the user folder
 */
class FileService extends ServiceBase{
	/**
	 * Constant for this service name, as exposed to Haxe remoting
	 */
	public static var SERVICE_NAME:String = "FileService";
	/**
	 */
//	public static var DROPBOX_APP_PATH:String = "Applications/Silex, live web creation/";
	/**
	 * store the config
	 * @example serverConfig.userFolder
	 */
	private var serverConfig:ServerConfig;
	/**
	 * Constructor
	 */
	public function new(serverConfig:ServerConfig){
		super(SERVICE_NAME);
		this.serverConfig = serverConfig;
		// Lib.print("--- "+FileSystem.fullPath("./"));
		// here ./ is bin/
		untyped __call__("require_once", "libs/dropbox/functions.php");
	}

	/**
	 * Load the content of an existing file
	 */
	public function load(name:String):String {
		var content:String="";
//		try{
			if (FileSystem.exists(serverConfig.userFolder + name)){
				content = File.getContent(serverConfig.userFolder + name);
			}
			else{
				var resObj = Lib.objectOfAssociativeArray(untyped __call__("getFile", name));
				if (Reflect.hasField(resObj,"data")){
					content = resObj.data;
				}
				else{
					throw("file not found "+Lib.dump(resObj));
				}
			}
/*		}
		catch(e:Dynamic){
			throw("load("+name+") error: "+e+" - current directory: "+Web.getCwd());
		}
*/		return content;
	}
	/**
	 * Duplicate an existing file
	 */
	public function duplicate(src:String, dst:String) {
//		try{
			if (FileSystem.exists(serverConfig.userFolder + dst)){
				// File.copy(serverConfig.userFolder + src, serverConfig.userFolder + dst);
				throw("The file name "+dst+" exists on the server, it is a reserved name.");
			}
			else{
				var resObj = untyped __call__("getFile", src);
				var content = resObj.data;
				var resObj = untyped __call__("putFile", dst, content);
			}
/*		}
		catch(e:Dynamic){
			throw("duplicate("+src+", "+dst+") error: "+e);
		}
*/	}
	/**
	 * Rename an existing file
	 */
	public function rename(src:String, dst:String) {
		throw("rename is not implemented for dropbox");
//		try{
			// FileSystem.rename(serverConfig.userFolder + src, serverConfig.userFolder + dst);
/*		}
		catch(e:Dynamic){
			throw("rename("+src+", "+dst+") error: "+e);
		}
*/	}
	/**
	 * Delete a file
	 * todo: Put it in the trash 
	 */
	public function trash(name:String) {
		throw("trash is not implemented for dropbox");
//		try{
//			FileSystem.deleteFile(serverConfig.userFolder + name);
/*		}
		catch(e:Dynamic){
			throw("trash("+name+") error: "+e);
		}
*/	}
	/**
	 * save a file content
	 * todo: check file extension
	 */
	public function save(name:String, content:String) {
//		try{
			var resObj = untyped __call__("putFile", name, content);
			if (resObj == false)
				throw("There was an error saving the file. Did you installed Silex application in your dropbox account?");
			//File.saveContent(serverConfig.userFolder + name, content);
/*		}
		catch(e:Dynamic){
			throw("save("+name+", "+content+") error: "+e);
		}
*/	}
}
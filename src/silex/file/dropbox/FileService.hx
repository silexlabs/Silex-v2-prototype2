package silex.file.dropbox;

import silex.ServiceBase;

import php.Web;
import php.Lib;

import sys.io.File;
import sys.FileSystem;

import silex.config.ServerConfig;
import silex.file.FileService;

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
		untyped __call__("initDropbox", serverConfig.key, serverConfig.secret, serverConfig.encrypter, serverConfig.dbHost, serverConfig.dbName, serverConfig.dbUser, serverConfig.dbPass, serverConfig.dbPort);
	}

	/**
	 * Check installation
	 * Copy some files the first time
	 */
	public function checkInstall():InstallStatus {
		var res:Dynamic = untyped __call__("checkInstall");
		if (res == null){
			throw("Silex could not be initialized");
		}
		else{
			return Lib.objectOfAssociativeArray(res);
		}
	}
	/**
	 * Load the content of an existing file
	 */
	public function load(name:String):String {
		var content:String="";
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
				return null;
			}
		}
		return content;
	}
	/**
	 * Duplicate an existing file
	 */
	public function duplicate(src:String, dst:String) {
		if (FileSystem.exists(serverConfig.userFolder + dst)){
			// File.copy(serverConfig.userFolder + src, serverConfig.userFolder + dst);
			throw("The file name "+dst+" exists on the server, it is a reserved name.");
		}
		else{
			var resObj = untyped __call__("getFile", src);
			var content = resObj.data;
			var resObj = untyped __call__("putFile", dst, content);
		}
	}
	/**
	 * Rename an existing file
	 */
	public function rename(src:String, dst:String) {
		throw("rename is not implemented for dropbox");
		// FileSystem.rename(serverConfig.userFolder + src, serverConfig.userFolder + dst);
	}
	/**
	 * Delete a file
	 * todo: Put it in the trash 
	 */
	public function trash(name:String) {
		var resObj = untyped __call__("deleteFile", name);
		if (resObj == false)
			throw("There was an error deleting the file. ");
		// FileSystem.deleteFile(serverConfig.userFolder + name);
	}
	/**
	 * save a file content
	 * todo: check file extension
	 */
	public function save(name:String, content:String) {
		var resObj = untyped __call__("putFile", name, content);
		if (resObj == false)
			throw("There was an error saving the file. Did you authorize Silex application in your dropbox account?");
		// File.saveContent(serverConfig.userFolder + name, content);
	}
	/**
	 * import an asset
	 * todo: check file extension
	 * @example importFile("http://test.com/test.jpg", "assets/test.jpg")
	 */
	public function importFile(url:String, name:String) {
		// get the file content
		var content = haxe.Http.requestUrl(url);

		var resObj = untyped __call__("putFile", name, content);
		if (resObj == false)
			throw("There was an error importing the file.");
	}
}
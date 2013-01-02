package silex.file.kcfinder;

import silex.ServiceBase;
import silex.file.FileService;

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
	}
	/**
	 * Check installation
	 * Do initial actions the 1st time
	 */
	public function checkInstall():InstallStatus {
		return {
			version : "2.0",
			latest_version : "2.0",
			redirect : null,
		};
	}
	/**
	 * Load the content of an existing file
	 */
	public function load(name:String):String {
		var content:String="";
		try{
			content = File.getContent(serverConfig.userFolder + name);
		}
		catch(e:Dynamic){
			throw("load("+name+") error: "+e+" - current directory: "+Web.getCwd());
		}
		return content;
	}
	/**
	 * Duplicate an existing file
	 */
	public function duplicate(src:String, dst:String) {
		try{
			File.copy(serverConfig.userFolder + src, serverConfig.userFolder + dst);
		}
		catch(e:Dynamic){
			throw("duplicate("+src+", "+dst+") error: "+e);
		}
	}
	/**
	 * Rename an existing file
	 */
	public function rename(src:String, dst:String) {
		try{
			FileSystem.rename(serverConfig.userFolder + src, serverConfig.userFolder + dst);
		}
		catch(e:Dynamic){
			throw("rename("+src+", "+dst+") error: "+e);
		}
	}
	/**
	 * Delete a file
	 * todo: Put it in the trash 
	 */
	public function trash(name:String) {
		try{
			FileSystem.deleteFile(serverConfig.userFolder + name);
		}
		catch(e:Dynamic){
			throw("trash("+name+") error: "+e);
		}
	}
	/**
	 * save a file content
	 * todo: check file extension
	 */
	public function save(name:String, content:String) {
		try{
			File.saveContent(serverConfig.userFolder + name, content);
		}
		catch(e:Dynamic){
			throw("save("+name+", "+content+") error: "+e);
		}
	}
}
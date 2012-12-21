 package silex.file.client;

import silex.ServiceBase;
import silex.file.FileService;

import js.Lib;
import js.Dom;

/**
 * client side implementation of the file service
 * this class let you manipulate files on the server
 */
class FileService extends ServiceBase{
	/**
	 * Constant for this service name, as exposed to Haxe remoting
	 */
	public static var SERVICE_NAME:String = "FileService";
	/**
	 * Constructor
	 */
	public function new(){
		super(SERVICE_NAME);
	}
	/**
	 * Check installation
	 * Do initial actions the 1st time
	 */
	public function checkInstall(onResult:InstallStatus->Void, onError:String->Void=null) {
		callServerMethod("checkInstall", [], onResult, onError);
	}
	/**
	 * load a file content
	 */
	public function load(name:String, onResult:String->Void, onError:String->Void=null) {
		callServerMethod("load", [name], onResult, onError);
	}
	/**
	 * Move a file to trash
	 */
	public function trash(name:String, onResult:Void->Void, onError:String->Void=null) {
		callServerMethod("trash", [name], onResult, onError);
	}
	/**
	 * Duplicate an existing file
	 */
	public function duplicate(src:String, dst:String, onResult:Void->Void, onError:String->Void=null) {
		callServerMethod("duplicate", [src, dst], onResult, onError);
	}
	/**
	 * Rename an existing file
	 */
	public function rename(src:String, dst:String, onResult:Void->Void, onError:String->Void=null) {
		callServerMethod("rename", [src, dst], onResult, onError);
	}
	/**
	 * save a file content
	 */
	public function save(name:String, content:String, onResult:Void->Void, onError:String->Void=null) {
		callServerMethod("save", [name, content], onResult, onError);
	}
}
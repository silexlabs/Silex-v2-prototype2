package silex.file.kcfinder;

import js.Lib;
import js.Dom;

import brix.component.ui.DisplayObject;
import brix.component.navigation.transition.TransitionData;
import brix.component.navigation.Page;
import brix.util.DomTools;

import silex.file.FileModel;
import silex.Silex;

/**
 * This static class holds helpers and constants for the KCFinder library
 */
class FileBrowser
{
	/**
	 * The page name of this dialog
	 */
	public static inline var FB_PAGE_NAME = "file-browser-dialog";
	/**
	 * url relative to the "files/" folder
	 */
	public static inline var KC_FINDER_URL = "../libs/kcfinder/";
	/**
	 * The css class name of the div used to display the file browser
	 */
	public static inline var FB_CLASS_NAME = "file-browser-div";
	/**
	 * The css class name of the element used to display a message for the user
	 */
	public static inline var FB_MESSAGE_CLASS_NAME = "message-zone";
	/**
	 * static callback method
	 * Called after a click on the submit button
	 */
	public static var onValidate:String->Void;
	/**
	 * static callback method 
	 * Called after a click on the submit button
	 */
	public static var onValidateMultiple:Array<String>->Void;
	/**
	 * static property to be set before openning this dialog
	 * set this to true in if you expect multiple file, default is false
	 */
	public static var expectMultipleFiles:Bool = false;
	/**
	 * static property to be set before openning this dialog
	 * it will be placed in the element with class name "message-zone"
	 */
	public static var message:String;
	/**
	 * static property to be set before openning this dialog
	 * folder to display by default
	 */
	public static var intialPath:String;
	/**
	 * open file browser
	 * called when the user clicks on a button with "select-file-button" class
	 */
	public static function selectMultipleFiles(userCallback:Array<String>->Void, brixInstanceId:String, msg:String = null, path:String = "files/"){
		// default message
		if (msg==null) msg = "Double click to select one or more files!";
		// intial folder path
		intialPath = path;
		// callback
		onValidateMultiple = userCallback;
		// message
		message = msg;
		// config
		expectMultipleFiles = true;
		// open the dialog
		Page.openPage(FB_PAGE_NAME, true, null, null, brixInstanceId);
	}
	/**
	 * open file browser
	 * called when the user clicks on a button with "select-file-button" class
	 */
	public static function selectFile(userCallback:String->Void, brixInstanceId:String, msg:String = null, path:String = "files/"){
		// default message
		if (msg==null) msg = "Double click to select a file!";
		// intial folder path
		intialPath = path;
		// callback
		onValidate = userCallback;
		// message
		message = msg;
		// config
		expectMultipleFiles = false;
		// open the dialog
		Page.openPage(FB_PAGE_NAME, true, null, null, brixInstanceId);
	}
	/**
	 * compute the relative url from the returned path
	 * file browser may return a url like http://localhost:8888/Silex/bin/files/assets/IMG_0167.JPG
	 * or /files/assets/IMG_0167.JPG
	 * depending on the browser (chrome / ff)
	 */
	public static function getRelativeURLFromFileBrowser(url:String){
		var idx = url.indexOf("://");
		// check that we have absolute urls
		if (idx == -1){ // case of /files/assets/IMG_0167.JPG
			// remove path to the publication folder
			var pubUrl = "files/";
			var idxPubFolder = url.indexOf(pubUrl);
			if (idxPubFolder >= 0){
				// remove all the common parts
				url = url.substr(idxPubFolder + pubUrl.length);
			}
		}
		else{ // case of http://localhost:8888/Silex/bin/files/assets/IMG_0167.JPG
			url = DomTools.abs2rel(url);
		}
		return url;
	}
}

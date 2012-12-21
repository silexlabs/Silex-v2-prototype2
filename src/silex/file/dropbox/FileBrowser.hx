package silex.file.dropbox;

import js.Lib;
import js.Dom;

import brix.component.ui.DisplayObject;
import brix.component.navigation.transition.TransitionData;
import brix.component.navigation.Page;
import brix.component.interaction.NotificationManager;
import brix.util.DomTools;

import silex.file.FileModel;
import silex.Silex;

/**
 * This component displays a file browser and lets one choose a file or manage them
 * It is mainly used in silex.ui.toolbox.editor.EditorBase class
 */
class FileBrowser // extends DialogBase
{
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
		if (msg==null) msg = "Double click to select a file!";
		// intial folder path
		intialPath = path;
		// callback
		onValidateMultiple = userCallback;
		// message
		message = msg;
		// config
		expectMultipleFiles = false;
		// open the dialog
		var options = {
			  linkType: "direct",
			  success: validateMultipleSelection,
			  cancel: null
			};
		untyped {
			Dropbox.choose(options);
		}
	}
	/**
	 * Called after a click on the submit button
	 */
	public static function validateMultipleSelection(files:Array<Dynamic>) {
		trace("validateMultipleSelection "+files);
		var urls = [];
		for (file  in files){
			urls.push(file.link);
		}
		if (FileBrowser.onValidateMultiple != null){
			FileBrowser.onValidateMultiple(urls);
			FileBrowser.onValidateMultiple = null;
		}
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
		var options = {
			  linkType: "direct",
			  success: validateSelection,
			  cancel: null
			};
		untyped {
			Dropbox.choose(options);
		}
	}
	/**
	 * Called after a click on the submit button
	 */
	public static function validateSelection(files:Array<Dynamic>) {
		trace("validateSelection "+files);
		var url = files[0].link;
		if (url != null){
			if (FileBrowser.onValidate != null){
				FileBrowser.onValidate(url);
				FileBrowser.onValidate = null;
			}
		}
	}
	/**
	 * compute the relative url from the returned path
	 * dropbox chooser will return a url like https://dl.dropbox.com/0/view/46gnrs0726vn7ry/Applications/Silex/bemyapp/docs/specs.txt
	 * this method converts it to bemyapp/docs/specs.txt
	 */
	public static function getRelativeURLFromFileBrowser(url:String){
		trace("getRelativeURLFromFileBrowser "+url);
		// get the index of the 1st "/" after "view/"
		var idx = url.indexOf("Silex");
		if (idx <0){
			NotificationManager.notifyError("Error", "Please choose from folder Applications/Silex, live web creation/");
			throw ("Can only take files from dropbox Application/Silex/ folder");
		}
		idx += 5; // length of "Silex"
		trace("getRelativeURLFromFileBrowser "+idx);
		idx = url.indexOf("/", idx+1);
		trace("getRelativeURLFromFileBrowser "+idx);
		// remove all the absolute part
		url = url.substr(idx+1);
		trace("getRelativeURLFromFileBrowser "+url);
		return url;
	}
}
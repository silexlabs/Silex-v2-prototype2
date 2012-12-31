package silex.file.dropbox;

import js.Lib;
import js.Dom;

import brix.component.ui.DisplayObject;
import brix.component.navigation.transition.TransitionData;
import brix.component.navigation.Page;
import brix.component.interaction.NotificationManager;
import brix.util.DomTools;

import silex.file.FileService;
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
	 */
	public static function manageFiles(brixInstanceId:String, msg:String = null, path:String = "./"){
		Lib.window.open("https://www.dropbox.com/home/Apps/Silex/"+path);
	}
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
	 * take only 1 file
	 * todo: support multiple files
	 */
	public static function validateMultipleSelection(files:Array<Dynamic>) {
		trace("validateMultipleSelection "+files);
		var url:String = files[0].link;
		var idx = url.indexOf("Silex");
		if (idx <0){
			// get the name of the file
			var idx = url.lastIndexOf("/");
			var name = "assets/"+url.substring(idx+1);
			// cleanup file name
			name = StringTools.replace(name, " ", "_");
			name = StringTools.replace(name, "%20", "_");
			// import into assets
			(new FileService()).importFile(url, name, callback(doValidateMultipleSelection, name));
			// notify user, this may take a while
			NotificationManager.notifySuccess("Importing", "I am importing the file into folder Applications/Silex/assets/. This may take some time...");
		}
		else{
			// do validate
			doValidateMultipleSelection(url);
		}
	}
	public static function doValidateMultipleSelection(url:String) {

		if (FileBrowser.onValidateMultiple != null){
			FileBrowser.onValidateMultiple([url]);
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
		var url:String = files[0].link;
		var idx = url.indexOf("Silex");
		if (idx <0){
			// get the name of the file
			var idx = url.lastIndexOf("/");
			var name = "assets/"+url.substring(idx+1);
			// cleanup file name
			name = StringTools.replace(name, " ", "_");
			name = StringTools.replace(name, "%20", "_");
			// import into assets
			(new FileService()).importFile(url, name, callback(doValidateSelection, name));
			// notify user, this may take a while
			NotificationManager.notifySuccess("Importing", "I am importing the file into folder Applications/Silex/assets/. This may take some time...");
		}
		else{
			// do validate
			doValidateSelection(url);
		}
	}
	public static function doValidateSelection(url:String) {
		if (FileBrowser.onValidate != null){
			FileBrowser.onValidate(url);
			FileBrowser.onValidate = null;
		}
	}
	/**
	 * compute the relative url from the returned path
	 * dropbox chooser will return a url like https://dl.dropbox.com/0/view/46gnrs0726vn7ry/Applications/Silex/bemyapp/docs/specs.txt
	 * this method converts it to bemyapp/docs/specs.txt
	 */
	public static function getRelativeURLFromFileBrowser(url:String){
		// get the index of the 1st "/" after "view/"
		var idx = url.indexOf("Silex");
		if (idx <0){
			//NotificationManager.notifyError("Error", "Please choose from folder Applications/Silex, live web creation/");
			//throw ("Can only take files from dropbox Application/Silex/ folder");
		}
		else{
			idx += 5; // length of "Silex"
			idx = url.indexOf("/", idx);
			// remove all the absolute part
			url = url.substr(idx+1);
		}
		return url;
	}
}
package silex.ui.dialog;

import js.Lib;
import js.Dom;

import brix.component.ui.DisplayObject;
import brix.component.navigation.transition.TransitionData;
import brix.component.navigation.Page;
import brix.util.DomTools;

import silex.file.FileModel;

/**
 * This component displays a file browser and lets one choose a file or manage them
 * It is mainly used in silex.ui.toolbox.editor.EditorBase class
 */
class FileBrowserDialog extends DialogBase
{
	public static inline var KC_FINDER_URL = "../libs/kcfinder/";
	////////////////////////////////////////////////////////////////////////
	// static helper methods
	////////////////////////////////////////////////////////////////////////
	/**
	 * open file browser
	 * called when the user clicks on a button with "select-file-button" class
	 */
	public static function selectMultipleFiles(userCallback:Array<String>->Void, brixInstanceId:String, msg:String = null, intialPath:String = "files/"){
		// default message
		if (msg==null) msg = "Double click to select one or more files!";
		// intial folder path
		FileBrowserDialog.intialPath = intialPath;
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
	public static function selectFile(userCallback:String->Void, brixInstanceId:String, msg:String = null, intialPath:String = "files/"){
		// default message
		if (msg==null) msg = "Double click to select a file!";
		// intial folder path
		FileBrowserDialog.intialPath = intialPath;
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
	////////////////////////////////////////////////////////////////////////
	// component methods and attributes
	////////////////////////////////////////////////////////////////////////
	/**
	 * The css class name of the div used to display the file browser
	 */
	public static inline var FB_CLASS_NAME = "file-browser-div";
	/**
	 * The css class name of the element used to display a message for the user
	 */
	public static inline var FB_MESSAGE_CLASS_NAME = "message-zone";
	/**
	 * The page name of this dialog
	 */
	public static inline var FB_PAGE_NAME = "file-browser-dialog";
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
	 * Constructor
	 * Define the callbacks
	 */
	public function new(rootElement:HtmlDom, BrixId:String){
		super(rootElement, BrixId, requestRedraw, null, null, cancelSelection);
	}
	/**
	 * Callback for the "show" event of the Layer class
	 * Update when the page is opened
	 */
	public function requestRedraw(transitionData:TransitionData) {
		// redraw the list, which will reload data and then refresh the list when onListData is dispatched by the model
/*		var element = DomTools.getSingleElement(rootElement, FB_CLASS_NAME, true);
		element.innerHTML = '<iframe name="kcfinder_iframe" src="'+KC_FINDER_URL+'browse.php?type=files&dir=./files/assets/" ' +
        'frameborder="0" width="100%" height="100%" marginwidth="0" marginheight="0" scrolling="no" />';
*/
		var element = DomTools.getSingleElement(rootElement, FB_CLASS_NAME, true);
		element.innerHTML = '<iframe name="kcfinder_iframe" src="../libs/kcfinder/browse.php?type=files&dir='+intialPath+'" ' +
        'frameborder="0" width="100%" height="100%" marginwidth="0" marginheight="0" scrolling="no" />';

		// display the message in the element
		if (message!=null){
			var element = DomTools.getSingleElement(rootElement, FB_MESSAGE_CLASS_NAME, false);
			if (element != null){
				element.innerHTML = message;
			}
		}
		if (expectMultipleFiles){
	        Reflect.setField(Lib.window, "KCFinder", {
			    callBackMultiple: validateMultipleSelection
	        });
		}
		else{
	        Reflect.setField(Lib.window, "KCFinder", {
			    callBack: validateSelection
	        });
	    }
	}
	/**
	 * Called after a click on the submit button
	 */
	public function validateSelection(url:String) {
		trace("validateSelection "+url);
		if (url != null){
			if (onValidate != null){
				onValidate(url);
			}
			close();
		}
	}
	/**
	 * Called after a click on the submit button
	 */
	public function validateMultipleSelection(files:Array<String>) {
		trace("validateMultipleSelection "+files);
    	if (files != null){
			if (onValidateMultiple != null){
				onValidateMultiple(files);
			}
			close();
		}
	}
	/**
	 * Called after a click on the cancel button
	 */
	public function cancelSelection() {
		close();
	}
	/**
	 * Close this dialog
	 * It uses the dialog name as a css class
	 */
	override public function close() {
		// cleanup
		var element = DomTools.getSingleElement(rootElement, FB_CLASS_NAME, true);
		element.innerHTML = "";
        Reflect.setField(Lib.window, "KCFinder", null);
        // reset to default
		expectMultipleFiles = false;
		// now do the default behavior
		super.close();
	}
}

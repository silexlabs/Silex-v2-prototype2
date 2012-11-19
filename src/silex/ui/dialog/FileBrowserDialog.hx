package silex.ui.dialog;

import js.Lib;
import js.Dom;

import brix.component.ui.DisplayObject;
import brix.component.navigation.transition.TransitionData;
import brix.component.navigation.Page;
import brix.util.DomTools;

import silex.publication.PublicationModel;
import silex.publication.PublicationData;

/**
 * This component displays a file browser and lets one choose a file or manage them
 * It is mainly used in silex.ui.toolbox.editor.EditorBase class
 */
class FileBrowserDialog extends DialogBase
{
	////////////////////////////////////////////////////////////////////////
	// static helper methods
	////////////////////////////////////////////////////////////////////////
	/**
	 * open file browser
	 * called when the user clicks on a button with "select-file-button" class
	 */
	public static function selectMultipleFiles(userCallback:Array<String>->Void, brixInstanceId:String, msg:String = null){
		// default message
		if (msg==null) msg = "Double click to select one or more files!";
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
	public static function selectFile(userCallback:String->Void, brixInstanceId:String, msg:String = null){
		// default message
		if (msg==null) msg = "Double click to select a file!";
		// callback
		onValidate = userCallback;
		// message
		message = msg;
		// config
		expectMultipleFiles = false;
		// open the dialog
		Page.openPage(FB_PAGE_NAME, true, null, null, brixInstanceId);
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
	 * Constructor
	 * Define the callbacks
	 */
	public function new(rootElement:HtmlDom, BrixId:String){
		super(rootElement, BrixId, requestRedraw, null, null, cancelSelection);
	}
	/**
	 * Callback for the "show" event of the Layer class
	 * Update the publications list when the page is opened
	 */
	public function requestRedraw(transitionData:TransitionData) {
		// redraw the list, which will reload data and then refresh the list when onListData is dispatched by the model
		var element = DomTools.getSingleElement(rootElement, FB_CLASS_NAME, true);
		element.innerHTML = '<iframe name="kcfinder_iframe" src="../../third-party-tools/kcfinder/browse.php?type=publications&dir='+
		PublicationConstants.PUBLICATION_FOLDER+PublicationModel.getInstance().currentName+"/"+PublicationConstants.PUBLICATION_ASSETS_FOLDER+'/" ' +
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

package silex.ui.dialog;

import js.Lib;
import js.Dom;

import brix.component.ui.DisplayObject;
import brix.component.navigation.transition.TransitionData;
import brix.component.navigation.Page;
import brix.util.DomTools;

import silex.file.FileModel;
import silex.file.FileBrowser;
import silex.Silex;

/**
 * This component displays a file browser and lets one choose a file or manage them
 * It is mainly used in silex.ui.toolbox.editor.EditorBase class
 */
class KCFinderDialog extends DialogBase
{
	////////////////////////////////////////////////////////////////////////
	// component methods and attributes
	////////////////////////////////////////////////////////////////////////
#if !silexDropboxMode
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
/*		var element = DomTools.getSingleElement(rootElement, FileBrowser.FB_CLASS_NAME, true);
		element.innerHTML = '<iframe name="kcfinder_iframe" src="'+KC_FINDER_URL+'browse.php?type=files&dir=./files/assets/" ' +
        'frameborder="0" width="100%" height="100%" marginwidth="0" marginheight="0" scrolling="no" />';
*/
		var element = DomTools.getSingleElement(rootElement, FileBrowser.FB_CLASS_NAME, true);
		element.innerHTML = '<iframe name="kcfinder_iframe" src="'+Silex.initialBaseUrl+'../libs/kcfinder/browse.php?type=files&dir='+FileBrowser.intialPath+'" ' +
        'frameborder="0" width="100%" height="100%" marginwidth="0" marginheight="0" scrolling="no" />';

		// display the message in the element
		if (FileBrowser.message!=null){
			var element = DomTools.getSingleElement(rootElement, FileBrowser.FB_MESSAGE_CLASS_NAME, false);
			if (element != null){
				element.innerHTML = FileBrowser.message;
			}
		}
		if (FileBrowser.expectMultipleFiles){
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
			if (FileBrowser.onValidate != null){
				FileBrowser.onValidate(url);
				FileBrowser.onValidate = null;
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
			if (FileBrowser.onValidateMultiple != null){
				FileBrowser.onValidateMultiple(files);
				FileBrowser.onValidateMultiple = null;
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
		var element = DomTools.getSingleElement(rootElement, FileBrowser.FB_CLASS_NAME, true);
		element.innerHTML = "";
        Reflect.setField(Lib.window, "KCFinder", null);
        // reset to default
		FileBrowser.expectMultipleFiles = false;
		// now do the default behavior
		super.close();
	}
#end
}

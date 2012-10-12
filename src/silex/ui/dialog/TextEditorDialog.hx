package silex.ui.dialog;

import js.Lib;
import js.Dom;

import brix.component.ui.DisplayObject;
import brix.component.navigation.Page;
import brix.util.DomTools;

import brix.component.navigation.transition.TransitionData;

import silex.publication.PublicationModel;

/**
 * This component displays a text editor and lets one edit html
 * It is mainly used in silex.ui.toolbox.editor.EditorBase class
 */
class TextEditorDialog extends DialogBase
{
	/**
	 * The css class name of the div used to display the file browser
	 */
	public static inline var TEXT_EDITOR_CONTAINER_CLASS_NAME = "text-editor-div";
	/**
	 * The css class name of the element used to display a message for the user
	 */
	public static inline var MESSAGE_ZONE_CLASS_NAME = "message-zone";
	/**
	 * The page name of this dialog
	 */
	public static inline var TEXT_EDITOR_PAGE_NAME = "text-editor-dialog";
	/**
	 * static callback method
	 * Called after a click on the submit button
	 */
	public static var onValidate:String->Void;
	/**
	 * static property to be set before openning this dialog
	 * it will be placed in the text editor when it opens
	 */
	public static var textContent:String;
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
		var element = DomTools.getSingleElement(rootElement, TEXT_EDITOR_CONTAINER_CLASS_NAME, true);
		element.innerHTML = '<iframe name="kcfinder_iframe" src="../../third-party-tools/ckeditor/ckeditor.html"'
			+' frameborder="0" width="100%" height="100%" marginwidth="0" marginheight="0" scrolling="no" />';

		// display the message in the element
		if (message!=null){
			var element = DomTools.getSingleElement(rootElement, MESSAGE_ZONE_CLASS_NAME, false);
			if (element != null){
				element.innerHTML = message;
			}
		}
        Reflect.setField(Lib.window, "CKEDITOR", {
		    textContent: textContent,
		    callBack : validateSelection
        });
	}
	/**
	 * Called after a click on the submit button
	 */
	public function validateSelection(text:String) {
		trace("validateSelection "+text);
		if (text != null){
			if (onValidate != null){
				onValidate(text);
			}
			
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
		var element = DomTools.getSingleElement(rootElement, TEXT_EDITOR_CONTAINER_CLASS_NAME, true);
		element.innerHTML = "";
		// now do the default behavior
		super.close();
	}
}

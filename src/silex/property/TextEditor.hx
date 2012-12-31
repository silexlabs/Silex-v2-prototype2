package silex.property;

import js.Lib;
import js.Dom;

import silex.ui.dialog.TextEditorDialog;

import brix.component.navigation.Page;
import brix.component.navigation.Layer;
import brix.component.ui.DisplayObject;
import brix.component.navigation.transition.TransitionData;
import brix.component.navigation.Page;
import brix.util.DomTools;

/**
 * This static class holds helpers and constants for the TextEditorDialog component
 * This class handles the link with the TextEditorDialog:
 * - opens the page text-editor with the TextEditor component
 * - retrieve the result and put it in selectedItem.innerHTML
 */
class TextEditor
{
	/**
	 * open text editor
	 * called when the user clicks on a button with "property-editor-edit-text" class
	 */
	public static function openTextEditor(onChange:String->Void, textContent:String, brixInstanceId:String, msg:String = "Edit text and click \"close\""){
		TextEditorDialog.onValidate = onChange;
		TextEditorDialog.textContent = textContent;
		TextEditorDialog.message = msg;
		Page.openPage(TextEditorDialog.TEXT_EDITOR_PAGE_NAME, true, null, null, brixInstanceId);
	}
}
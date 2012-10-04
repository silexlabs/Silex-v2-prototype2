package silex.ui.dialog;

import js.Lib;
import js.Dom;

import brix.component.ui.DisplayObject;
import brix.component.navigation.transition.TransitionData;
import brix.component.navigation.link.LinkToPage;
import brix.component.navigation.Page;
import brix.util.DomTools;

import silex.publication.PublicationData;
import silex.publication.PublicationModel;
import silex.ui.dialog.DialogBase;
import silex.ui.list.PublicationList;
import silex.ui.stage.PublicationViewer;

/**
 * This component displays a window with a list of publications and let the user choose which one to use.
 * It has to be position on the foreground with the CSS styles of the DOM element with which it is associated. 
 * &gt;div class="OpenPublicationDialog"&lt;
 */
class OpenDialog extends DialogBase
{
	/**
	 * The css class name of the list used to display the publications
	 */
	public static inline var LIST_CLASS_NAME = "PublicationList";
	/**
	 * Constructor
	 * Define the callbacks
	 */
	public function new(rootElement:HtmlDom, BrixId:String){
		super(rootElement, BrixId, requestRedraw, null, validateSelection, cancelSelection);
	}
	/**
	 * Callback for the "show" event of the Layer class
	 * Update the publications list when the page is opened
	 */
	public function requestRedraw(transitionData:TransitionData) {
		// redraw the list, which will reload data and then refresh the list when onListData is dispatched by the model
		getListComponent().redraw();
	}
	/**
	 * Called after a click on the submit button
	 * Open the selected publication
	 */
	public function validateSelection() {
		// get the list instance
		var list = getListComponent();
		// get the selected item
		var item:PublicationListItem = list.selectedItem;
		// if a publication is selected
		if (item != null){
			PublicationModel.getInstance().load(item.name, item.configData);
			close();
		}
	}
	/**
	 * Returns the list component which is in the dialog
	 */
	public function getListComponent():PublicationList {
		// get the node with the list
		var listNode = DomTools.getSingleElement(rootElement, LIST_CLASS_NAME, true);
		// returns the list instance
		return getBrixApplication().getAssociatedComponents(listNode, PublicationList).first();
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
	 * Unselect the item in the list and close
	 */
	override public function close() {
		// get the list instance
		var list = getListComponent();
		// unselect
		list.selectedItem = null;
		// now do the default behavior
		super.close();
	}
}

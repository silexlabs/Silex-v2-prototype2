package org.silex.ui.dialog;

import js.Lib;
import js.Dom;

import org.slplayer.component.ui.DisplayObject;
import org.slplayer.component.navigation.transition.TransitionData;
import org.slplayer.component.navigation.link.LinkToPage;
import org.slplayer.component.navigation.Page;
import org.slplayer.util.DomTools;

import org.silex.publication.PublicationData;
import org.silex.publication.PublicationModel;
import org.silex.ui.dialog.DialogBase;
import org.silex.ui.list.PublicationList;
import org.silex.ui.stage.PublicationViewer;

/**
 * This component displays a window with a list of publications and let the user choose which one to use.
 * It has to be position on the foreground with the CSS styles of the DOM element with which it is associated. 
 * &gt;div class="OpenPublicationDialog"&lt;
 */
@tagNameFilter("div")
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
	public function new(rootElement:HtmlDom, SLPId:String){
		super(rootElement, SLPId, requestRedraw, null, validateSelection, cancelSelection);
	}
	/**
	 * Callback for the "show" event of the Layer class
	 * Update the publications list when the page is opened
	 */
	public function requestRedraw(transitionData:TransitionData) {
		// reload data
		PublicationModel.getInstance().loadList();
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
			Page.openPage(PublicationViewer.BUILDER_MODE_PAGE_NAME, false, null, SLPlayerInstanceId);
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
		return getSLPlayer().getAssociatedComponents(listNode, PublicationList).first();
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

package org.silex.component.dialog;

import js.Lib;
import js.Dom;

import org.slplayer.component.ui.DisplayObject;
import org.slplayer.component.navigation.transition.TransitionData;
import org.slplayer.component.navigation.link.LinkToPage;
import org.slplayer.component.navigation.Page;
import org.slplayer.util.DomTools;

import org.silex.component.PublicationConnector;
import org.silex.publication.PublicationData;
import org.silex.component.builder.Builder;
import org.silex.component.dialog.DialogBase;

/**
 * This component displays a window with a list of publications and let the user choose which one to use.
 * It has to be position on the foreground with the CSS styles of the DOM element with which it is associated. 
 * &gt;div class="OpenPublicationDialog"&lt;
 */
@tagNameFilter("div")
class SelectPublication extends DialogBase
{
	public static inline var CONNECTOR_CLASS_NAME = "PublicationConnector";
	public static inline var LIST_CLASS_NAME = "PublicationList";
	/**
	 * Constructor
	 * Define the callbacks
	 */
	public function new(rootElement:HtmlDom, SLPId:String){
		super(rootElement, SLPId, requestRedraw, null, validateSelection, cancelSelection);
		// listen to the list events
		var listNode = rootElement.getElementsByClassName(LIST_CLASS_NAME)[0];
		listNode.addEventListener("click", onClick, false);
	}
	/**
	 * Callback for the "show" event of the Layer class
	 * Update the data of the connector
	 */
	public function requestRedraw(transitionData:TransitionData) {

		trace("requestRedraw ");
		// update the list when the page is opened
		var event:CustomEvent = cast Lib.document.createEvent("CustomEvent");
		event.initCustomEvent(PublicationConnector.REFRESH_DATA_EVENT, true, true, null);

		var connectorNode = rootElement.getElementsByClassName(CONNECTOR_CLASS_NAME)[0];
		connectorNode.dispatchEvent(event);
	}
	/**
	 * Called after a click on the submit button
	 * Open the selected publication
	 */
	public function validateSelection() {
		// get the list instance
		var list = getListComponent();
		// get the selected item
		var item:{name:String, configData:PublicationConfigData} = list.selectedItem;
		// if a publication is selected
		if (item != null){
			Builder.loadPublication(item.name);
			Page.openPage(Builder.BUILDER_MODE_PAGE_NAME, false, null, SLPlayerInstanceId);
			close();
		}
	}
	/**
	 * Returns the list component which is in the dialog
	 */
	public function getListComponent():PublicationList {
		// get the node with the list
		var listNode = rootElement.getElementsByClassName(LIST_CLASS_NAME)[0];
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

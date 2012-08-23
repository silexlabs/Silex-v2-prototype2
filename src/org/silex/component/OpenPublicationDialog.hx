package org.silex.component;

import js.Lib;
import js.Dom;

import org.slplayer.component.ui.DisplayObject;
import org.slplayer.component.transition.TransitionData;
import org.slplayer.component.navigation.LinkToPage;
import org.slplayer.util.DomTools;

import org.silex.component.PublicationConnector;
import org.silex.publication.PublicationData;
import org.silex.builder.Builder;

/**
 * This component displays a window with a list of publications and let the user choose which one to use.
 * It has to be position on the foreground with the CSS styles of the DOM element with which it is associated. 
 * &gt;div class="OpenPublicationDialog"&lt;
 */
@tagNameFilter("div")
class OpenPublicationDialog extends LinkToPage
{
	public static inline var THIS_DIALOG_PAGE_NAME = "open-publication";

	public static inline var SUBMIT_BUTTON_CLASS_NAME = "ok-button";
	public static inline var CANCEL_BUTTON_CLASS_NAME = "cancel-button";

	public static inline var CONNECTOR_CLASS_NAME = "PublicationConnector";
	public static inline var LIST_CLASS_NAME = "PublicationList";
	/**
	 * Constructor
	 * Start listening the buttons
	 */
	public function new(rootElement:HtmlDom, SLPId:String){
		super(rootElement, SLPId);
		// listen to the list events
		var listNode = rootElement.getElementsByClassName(LIST_CLASS_NAME)[0];
		listNode.addEventListener("click", onClick, false);

		// listen to the Layer class event
		rootElement.addEventListener(TransitionData.EVENT_TYPE_REQUEST, onLayerShowOrHide, false);
	}
	/**
	 * Callback for the "show" event of the Layer class
	 * Update the data of the connector
	 */
	public function onLayerShowOrHide(event:Event) {
		trace("onLayerShowOrHide "+event);

		// retrieve the transition event data
		var transitionData:TransitionData = cast(event).detail;
		// only if it is a show request
		if (transitionData.type == show){
			// update the list when the page is opened
			var event:CustomEvent = cast Lib.document.createEvent("CustomEvent");
			event.initCustomEvent(PublicationConnector.REFRESH_DATA_EVENT, true, true, null);

			var connectorNode = rootElement.getElementsByClassName(CONNECTOR_CLASS_NAME)[0];
			connectorNode.dispatchEvent(event);
		}
	}
	/**
	 * Handle click on submit button
	 */
	override public function onClick(e:Event) {
		trace("onClick "+e.target);
		// retrieve the node who triggered the event
		var target:HtmlDom = cast(e.target);
		// it is supposed to have ok-button in its class name
		if (DomTools.hasClass(target, SUBMIT_BUTTON_CLASS_NAME)){
			// get the node with the list
			var listNode = rootElement.getElementsByClassName(LIST_CLASS_NAME)[0];
			// get the list instance
			var list = getSLPlayer().getAssociatedComponents(listNode, PublicationList).first();
			// get the selected item
			var item:{name:String, configData:PublicationConfigData} = list.selectedItem;

			Builder.loadPublication(item.name, item.configData);
			linkToPagesWithName(Builder.BUILDER_MODE_PAGE_NAME);
		}
		else if (DomTools.hasClass(target, CANCEL_BUTTON_CLASS_NAME)){
			throw("not implemented: should close the popup");
		}
	}
}

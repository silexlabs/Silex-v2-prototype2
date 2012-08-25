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

/**
 * This component displays a window. Derive this class in order to make a new Dialog.
 * Pass your callbacks to the constructor and manage your content. 
 * Use Page.openPage() to change the state of the application and this.close() to simply close this dialog
 * 
 * It has to be position on the foreground with the CSS styles of the DOM element with which it is associated. 
 * You are expected to open the dialogs as popups.
 * You are expected to place the dialogs on nodes with the Layer class (to detect open/close events)
 */
@tagNameFilter("div")
class DialogBase extends DisplayObject 
{
	public static inline var SUBMIT_BUTTON_CLASS_NAME = "ok-button";
	public static inline var CANCEL_BUTTON_CLASS_NAME = "cancel-button";
	public static inline var CONFIG_DIALOG_NAME = "data-dialog-name";
	/**
	 * Callback, called automatically
	 * Passed to the constructor or set during execution
	 */
	private var onShow:Null<TransitionData->Void>;
	/**
	 * Callback, called automatically
	 * Passed to the constructor or set during execution
	 */
	private var onHide:Null<TransitionData->Void>;
	/**
	 * Callback, called automatically
	 * Passed to the constructor or set during execution
	 */
	private var onSubmit:Null<Void->Void>;
	/**
	 * Callback, called automatically
	 * Passed to the constructor or set during execution
	 */
	private var onCancel:Null<Void->Void>;
	/**
	 * Name of the dialog
	 * Passed as an attribute of the node
	 * It is not supposed to contain white spaces in the name since it is used as a css class
	 * @example	 &lt;div class=&quot;MyDialog&quot; data-dialog-name=&quot;the-dialog-name&quot; &gt;Test dialog&lt;/div&gt;
	 */
	private var dialogName:String;

	/**
	 * Constructor
	 * Start listening the buttons
	 */
	public function new(rootElement:HtmlDom, SLPId:String, 
		onShow:Null<TransitionData->Void>, onHide:Null<TransitionData->Void>, 
		onSubmit:Null<Void->Void>, onCancel:Null<Void->Void>)
	{
		super(rootElement, SLPId);

		// store the callbacks
		this.onShow = onShow;
		this.onHide = onHide;
		this.onSubmit = onSubmit;
		this.onCancel = onCancel;

		// init dialogName
		dialogName = rootElement.getAttribute(CONFIG_DIALOG_NAME);
		if (dialogName == null){
			trace("Warning, this dialog has no dialog name. It will not be able to close automatically.");
		}else{
			// add the dialog name as a css class
			DomTools.addClass(rootElement, dialogName);
		}

		// listen to the Layer class event
		rootElement.addEventListener(TransitionData.EVENT_TYPE_REQUEST, onLayerShowOrHide, false);
		// listen to the buttons event
		rootElement.addEventListener("click", onClick, false);
	}
	/**
	 * Callback for the "show" and hide events of the Layer class
	 * Call onShow or onHide callbacks
	 */
	public function onLayerShowOrHide(event:Event) {
		// retrieve the transition event data
		var transitionData:TransitionData = cast(event).detail;

		// call onShow if it is a show request and onHide otherwise
		if (transitionData.type == show){
			if (onShow != null)
				onShow(transitionData);
		}else{
			if (onHide != null)
				onHide(transitionData);
		}
	}
	/**
	 * Close this dialog
	 * It uses the dialog name as a css class
	 */
	public function close() {
		Page.closePage(dialogName, null, SLPlayerInstanceId);
	}
	/**
	 * Handle click on buttons
	 * Call onSubmit or onCancel callbacks
	 */
	public function onClick(e:Event) {
		// retrieve the node who triggered the event
		var target:HtmlDom = cast(e.target);
		// it is supposed to have ok-button in its class name
		if (DomTools.hasClass(target, SUBMIT_BUTTON_CLASS_NAME)){
			if (onSubmit != null)
				onSubmit();
		}
		else if (DomTools.hasClass(target, CANCEL_BUTTON_CLASS_NAME)){
			if (onCancel != null)
				onCancel();
		}
	}
}
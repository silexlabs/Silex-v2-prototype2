package silex.ui.dialog;

import js.Lib;
import js.Dom;

import brix.component.ui.DisplayObject;
import brix.component.navigation.transition.TransitionData;
import brix.component.navigation.transition.TransitionTools;
import brix.component.navigation.link.LinkToPage;
import brix.component.navigation.Page;
import brix.component.navigation.Layer;
import brix.util.DomTools;

/**
 * This component displays a window. Derive this class in order to make a new Dialog.
 * Pass your callbacks to the constructor and manage your content. 
 * Use Page.openPage() to change the state of the application and this.close() to simply close this dialog
 * 
 * It has to be position on the foreground with the CSS styles of the DOM element with which it is associated. 
 * You are expected to open the dialogs as popups.
 * You are expected to place the dialogs on nodes with the Layer class (to detect open/close events)
 */
class DialogBase extends DisplayObject 
{
	/**
	 * The css class name of the button used to submit the form
	 */
	public static inline var SUBMIT_BUTTON_CLASS_NAME = "validate-button";
	/**
	 * The css class name of the button used to close the form
	 */
	public static inline var CANCEL_BUTTON_CLASS_NAME = "cancel-button";
	/**
	 * The dialog css class name, used to close it
	 */
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
	public function new(rootElement:HtmlDom, BrixId:String, 
		onShow:Null<TransitionData->Void>, onHide:Null<TransitionData->Void>, 
		onSubmit:Null<Void->Void>, onCancel:Null<Void->Void>)
	{
		super(rootElement, BrixId);

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
		rootElement.addEventListener(Layer.EVENT_TYPE_SHOW_STOP, onLayerShow, false);
		rootElement.addEventListener(Layer.EVENT_TYPE_HIDE_STOP, onLayerHide, false);
		// listen to the buttons event
		rootElement.addEventListener("click", onClick, false);
	}
	/**
	 * Callback for the show event of the Layer class
	 * Call onShow callback
	 */
	public function onLayerShow(event:Event) {
		// retrieve the transition event data
		var transitionData:TransitionData = cast(event).detail.transitionData;
		// Call onShow callback
		if (onShow != null)
			onShow(transitionData);
	}
	/**
	 * Callback for the hide event of the Layer class
	 * Call onHide callback
	 */
	public function onLayerHide(event:Event) {
		// retrieve the transition event data
		var transitionData:TransitionData = cast(event).detail.transitionData;
		// Call onHide callback
		if (onHide != null)
			onHide(transitionData);
	}
	/**
	 * Close this dialog
	 * It uses the dialog name as a css class
	 */
	public function close() {
		Page.closePage(dialogName, null, brixInstanceId);
	}
	/**
	 * Handle click on buttons
	 * Call onSubmit or onCancel callbacks
	 */
	public function onClick(e:Event) {
		e.preventDefault();
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

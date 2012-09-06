package silex.ui.dialog;

import js.Lib;
import js.Dom;

import org.slplayer.component.ui.DisplayObject;
import org.slplayer.component.navigation.transition.TransitionData;
import org.slplayer.component.navigation.Page;
import org.slplayer.component.navigation.link.LinkToPage;
import org.slplayer.util.DomTools;

/**
 * This component displays the login window and prevent interactions with the UI.
 * It has to be position on the foreground with the CSS styles of the DOM element with which it is associated. 
 * &gt;div class="LoginDialog login-dialog"&lt;
 */
@tagNameFilter("div")
class AuthDialog extends DialogBase
{
	/**
	 * The dialog css class name, used to close it
	 */
	public static inline var LOADING_PAGE_NAME = "loading-pending";
	/**
	 * The css class name of the text field used to display error
	 */
	public static inline var ERROR_TEXT_FIELD_CLASS_NAME = "error-text";
	/**
	 * The css class name of the text field used as input 
	 */
	public static inline var LOGIN_INPUT_FIELD_CLASS_NAME = "input-field-login";
	/**
	 * The css class name of the text field used as input 
	 */
	public static inline var PASSWORD_INPUT_FIELD_CLASS_NAME = "input-field-pass";
	/**
	 * Constant for error text
	 */
	public static inline var LOGIN_INPUT_FIELD_NOT_FOUND = "Could not find the input field for login. It is expected to have input-field-login as a css class name.";
	/**
	 * Constant for error text
	 */
	public static inline var PASSWORD_INPUT_FIELD_NOT_FOUND = "Could not find the input field for password. It is expected to have input-field-pass as a css class name.";
	/**
	 * Constant for error text
	 */
	public static inline var ALL_FIELDS_REQUIRED = "All fields are required.";
	/**
	 * Constant for error text
	 */
	public static inline var NETWORK_ERROR = "Network error.";
	/**
	 * Constructor
	 * Define the callbacks
	 */
	public function new(rootElement:HtmlDom, SLPId:String){
		super(rootElement, SLPId, null, null, validate, cancel);
	}
	/**
	 * Called after a click on the submit button
	 * Retrive values and submit form
	 */
	public function validate() {
		// get login
		var login:String;
		try{
			login = cast(DomTools.getSingleElement(rootElement, LOGIN_INPUT_FIELD_CLASS_NAME, true)).value;
		}catch(e:Dynamic){
			throw(PASSWORD_INPUT_FIELD_NOT_FOUND);
		}

		// get pass
		var pass:String;
		try{
			pass = cast(DomTools.getSingleElement(rootElement, PASSWORD_INPUT_FIELD_CLASS_NAME, true)).value;
		}catch(e:Dynamic){
			throw(PASSWORD_INPUT_FIELD_NOT_FOUND);
		}

		// check required fields
		if (login == "" || pass == ""){
			onLoginError(ALL_FIELDS_REQUIRED);
		}
		else{
			// submit form
			Page.openPage(LOADING_PAGE_NAME, true, null, SLPlayerInstanceId);
			haxe.Timer.delay(callback(onLoginError, NETWORK_ERROR),2000);
			// todo : implement authentication here
		}
	}
	/**
	 * Called after a click on the cancel button
	 */
	public function cancel() {
		close();
	}
	/**
	 * login error callback
	 */
	private function onLoginError(msg:String){
		trace("onLoginError "+msg);
		Page.openPage(dialogName, true, null, SLPlayerInstanceId);
		var inputElements:HtmlCollection<HtmlDom> = rootElement.getElementsByClassName(ERROR_TEXT_FIELD_CLASS_NAME);
		if(inputElements.length>0){
			inputElements[0].innerHTML = msg;
		}
	}
}

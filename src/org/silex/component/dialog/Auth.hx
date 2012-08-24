package org.silex.component.dialog;

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
class Auth extends DialogBase
{
	public static inline var LOADING_PAGE_NAME = "loading-pending";

	public static inline var ERROR_TEXT_FIELD_CLASS_NAME = "error-text";

	public static inline var LOGIN_INPUT_FIELD_CLASS_NAME = "input-field-login";
	public static inline var LOGIN_INPUT_FIELD_NOT_FOUND = "Could not find the input field for login. It is expected to have input-field-login as a css class name.";

	public static inline var PASSWORD_INPUT_FIELD_CLASS_NAME = "input-field-pass";
	public static inline var PASSWORD_INPUT_FIELD_NOT_FOUND = "Could not find the input field for password. It is expected to have input-field-pass as a css class name.";
	
	public static inline var ALL_FIELDS_REQUIRED = "All fields are required.";
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
		var inputElements:HtmlCollection<HtmlDom> = rootElement.getElementsByClassName(LOGIN_INPUT_FIELD_CLASS_NAME);

		if(inputElements.length<1)
			throw(LOGIN_INPUT_FIELD_NOT_FOUND);

		var login = cast(inputElements[0]).value;

		// get pass
		var inputElements:HtmlCollection<HtmlDom> = rootElement.getElementsByClassName(PASSWORD_INPUT_FIELD_CLASS_NAME);
		if(inputElements.length<1)
			throw(PASSWORD_INPUT_FIELD_NOT_FOUND);

		var pass = cast(inputElements[0]).value;

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

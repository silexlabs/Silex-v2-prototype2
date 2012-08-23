package org.silex.component;

import js.Lib;
import js.Dom;

import org.slplayer.component.ui.DisplayObject;
import org.slplayer.component.transition.TransitionData;
import org.slplayer.component.navigation.LinkToPage;
import org.slplayer.util.DomTools;

/**
 * This component displays the login window and prevent interactions with the UI.
 * It has to be position on the foreground with the CSS styles of the DOM element with which it is associated. 
 * &gt;div class="LoginDialog login-dialog"&lt;
 */
@tagNameFilter("div")
class LoginDialog extends LinkToPage
{
	public static inline var LOADING_PAGE_NAME = "loading-pending";
	public static inline var THIS_PAGE_NAME = "login-dialog";

	public static inline var SUBMIT_BUTTON_CLASS_NAME = "ok-button";
	public static inline var ERROR_TEXT_FIELD_CLASS_NAME = "error-text";

	public static inline var LOGIN_INPUT_FIELD_CLASS_NAME = "input-field-login";
	public static inline var LOGIN_INPUT_FIELD_NOT_FOUND = "Could not find the input field for login. It is expected to have input-field-login as a css class name.";

	public static inline var PASSWORD_INPUT_FIELD_CLASS_NAME = "input-field-pass";
	public static inline var PASSWORD_INPUT_FIELD_NOT_FOUND = "Could not find the input field for password. It is expected to have input-field-pass as a css class name.";
	
	public static inline var ALL_FIELDS_REQUIRED = "All fields are required.";
	public static inline var NETWORK_ERROR = "Network error.";
	/**
	 * Handle click on submit button
	 */
	override public function onClick(e:Event) {
		// retrieve the node who triggered the event
		var target:HtmlDom = cast(e.target);
		// it is supposed to have ok-button in its class name
		if (DomTools.hasClass(target, SUBMIT_BUTTON_CLASS_NAME)){
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

			// 
			if (login == "" || pass == ""){
				onLoginError(ALL_FIELDS_REQUIRED);
			}
			else{
				linkToPagesWithName(LOADING_PAGE_NAME);
				haxe.Timer.delay(callback(onLoginError, NETWORK_ERROR),2000);
				// todo : implement authentication here
			}
		}
	}
	private function onLoginError(msg:String){
		linkToPagesWithName(THIS_PAGE_NAME);
		var inputElements:HtmlCollection<HtmlDom> = rootElement.getElementsByClassName(ERROR_TEXT_FIELD_CLASS_NAME);
		if(inputElements.length>0){
			inputElements[0].innerHTML = msg;
		}
	}
}

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
 * &gt;div class="LoginPopup login-popup"&lt;
 */
@tagNameFilter("div")
class LoginPopup extends LinkToPage
{
	/**
	 * array used to store all the children while the layer is hided
	 */
	private var childrenArray:Array<HtmlDom>;
	/**
	 * Constructor
	 * Start listening the buttons
	 */
	public function new(rootElement:HtmlDom, SLPId:String){
		super(rootElement, SLPId);
//		rootElement.addEventListener("click", onClick, false);
	}
	/**
	 * Handle click on submit button
	 */
	override public function onClick(e:Event) {
		// retrieve the node who triggered the event
		var target:HtmlDom = cast(e.target);
		// it is supposed to have ok-button in its class name
		if (DomTools.hasClass(target, "ok-button")){
			// get login
			//var inputElements:HtmlCollection<HtmlDom> = rootElement.getElementsByClassName("input-field-login");
			var inputElements:HtmlCollection<HtmlDom> = rootElement.getElementsByClassName("input-field-login");
//	trace(inputElements.length + " - ");
//	DomTools.inspectTrace(rootElement);
			if(inputElements.length<1)
				throw("Could not find the input field for login. It is expected to have input-field-login as a css class name.");
			var login = cast(inputElements[0]).value;

			// get pass
			var inputElements:HtmlCollection<HtmlDom> = rootElement.getElementsByClassName("input-field-pass");
			if(inputElements.length<1)
				throw("Could not find the input field for password. It is expected to have input-field-pass as a css class name.");
			var pass = cast(inputElements[0]).value;

			// 
			if (login == "" || pass == ""){
				trace("Pass or login emty");
				onLoginError("All fields are required.");
			}
			else{
				linkToPagesWithName("login-pending");
				haxe.Timer.delay(callback(onLoginError, "Network error"),2000);
			}
		}
	}
	private function onLoginError(msg:String){
		linkToPagesWithName("login-popup");
		var inputElements:HtmlCollection<HtmlDom> = rootElement.getElementsByClassName("error-text");
		if(inputElements.length>0){
			inputElements[0].innerHTML = msg;
		}
	}
}

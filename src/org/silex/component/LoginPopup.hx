package org.silex.component;

import js.Lib;
import js.Dom;

import org.slplayer.component.ui.DisplayObject;
import org.slplayer.util.DomTools;

/**
 * This component displays the login window and prevent interactions with the UI.
 * It has to be position on the foreground with the CSS styles of the DOM element with which it is associated. 
 * &gt;div class="LoginPopup login-popup"&lt;
 */
@tagNameFilter("div")
class LoginPopup extends DisplayObject
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
		rootElement.addEventListener("click", onClick, false);
	}
	/**
	 * Handle click on submit button
	 */
	public function onClick(e:Event) {
		// retrieve the node who triggered the event
		var target:HtmlDom = cast(e.target);
		// it is supposed to be a A tag
		if (target.nodeName.toLowerCase() != "a" || target.getAttribute("href")==""){
			throw("The menu items are expectted to be A tags with href set to the page name. ("+target.nodeName+", "+ target.getAttribute("href")+")");
		}
		// retrieve the page name from the href attribute, without the "#"
		var menuPageName = target.getAttribute("href").substr(1);
		trace("Menu event "+menuPageName);

		// take an action depending on the menu name
		switch (menuPageName) {
			case "item-login":
				trace ("now login");
		}
	}
}

package silex.ui.stage;

import js.Lib;
import js.Dom;

import org.slplayer.component.ui.DisplayObject;
import org.slplayer.util.DomTools;

import silex.publication.PublicationModel;

/**
 * This component listen to the menu events and start the desired actions. 
 */
@tagNameFilter("a")
class MenuController extends DisplayObject
{
	/**
	 * Constructor
	 * Start listening the node
	 */
	public function new(rootElement:HtmlDom, SLPId:String){
		super(rootElement, SLPId);
		rootElement.addEventListener("click", onClick, false);
	}

	/**
	 * Handle menu events
	 */
	public function onClick(e:Event) {
		// retrieve the node who triggered the event
		var target:Anchor = cast(e.target);

		// it is supposed to be a A tag with href attribute
		if (target.href==""){
			throw("The menu items are expectted to be A tags with href set to the page name. ("+target.nodeName+", "+ target.href+")");
		}
		// retrieve the page name from the href attribute, without the "#"
		var menuPageName = target.href.substr(target.href.indexOf("#")+1);
		trace("Menu event "+menuPageName);

		// take an action depending on the menu name
		switch (menuPageName) {
			case "close-publication":
				PublicationModel.getInstance().unload();
		}

	}
}

package silex.ui.stage;

import js.Lib;
import js.Dom;

import org.slplayer.component.navigation.Page;
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
		// prevent default links behavior
		// e.preventDefault();

		// retrieve the node who triggered the event
		var target:HtmlDom = e.target;

		// retrieve the item name from the href attribute, without the "#"
		var itemName = target.getAttribute("data-menu-item");
		if (itemName == null)
			itemName = target.parentNode.getAttribute("data-menu-item");

//		trace("Menu event "+itemName+" - "+target.className);

		// take an action depending on the menu name
		switch (itemName) {
			case "open":
				Page.openPage("open-dialog", true, null, null, SLPlayerInstanceId);
			case "close":
				PublicationModel.getInstance().unload();
			case "save":
				PublicationModel.getInstance().save();
		}

	}
}

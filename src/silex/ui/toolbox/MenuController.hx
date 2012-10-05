package silex.ui.toolbox;

import js.Lib;
import js.Dom;

import brix.component.navigation.Page;
import brix.component.ui.DisplayObject;
import brix.util.DomTools;

import silex.publication.PublicationModel;
import silex.page.PageModel;

/**
 * This component listen to the menu events and start the desired actions. 
 */
@tagNameFilter("DIV")
class MenuController extends DisplayObject
{
	/**
	 * Constructor
	 * Start listening the node
	 */
	public function new(rootElement:HtmlDom, BrixId:String){
		super(rootElement, BrixId);
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

		trace("Menu event "+itemName+" - "+target.className);

		// take an action depending on the menu name
		switch (itemName) {
			case "create-publication":
				var newName = Lib.window.prompt("I need a name for your publication.", PublicationModel.getInstance().currentName);
				if (newName != null)
					PublicationModel.getInstance().create(newName);
			case "trash-publication":
				var confirm = Lib.window.confirm("I am about to trash the publication "+PublicationModel.getInstance().currentName+". Are you sure?");
				if (confirm == true)
					PublicationModel.getInstance().trash(PublicationModel.getInstance().currentName);
			case "open-publication":
				Page.openPage("open-dialog", true, null, null, brixInstanceId);
			case "close-publication":
				PublicationModel.getInstance().unload();
			case "save-publication":
				PublicationModel.getInstance().save();
			case "save-publication-as":
				var newName = Lib.window.prompt("New name for your publication?", PublicationModel.getInstance().currentName);
				if (newName != null)
					PublicationModel.getInstance().saveAs(newName);
			case "save-publication-copy":
				var newName = Lib.window.prompt("What name for your copy?", PublicationModel.getInstance().currentName);
				if (newName != null)
					PublicationModel.getInstance().saveACopy(newName);
			case "add-page":
				PageModel.getInstance().addPage(Lib.window.prompt("I need a name for this new page."));
			case "del-page":
				var pageModel = PageModel.getInstance();
				// remove the page
				pageModel.removePage(pageModel.selectedItem);
		}

	}
}

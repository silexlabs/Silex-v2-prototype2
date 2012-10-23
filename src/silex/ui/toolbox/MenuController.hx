package silex.ui.toolbox;

import js.Lib;
import js.Dom;

import brix.component.navigation.Page;
import brix.component.ui.DisplayObject;
import brix.util.DomTools;

import silex.publication.PublicationData;
import silex.publication.PublicationModel;
import silex.page.PageModel;
import silex.ui.dialog.FileBrowserDialog;

/**
 * This component listen to the menu events and start the desired actions. 
 * The static methods can be used from anywhere in the app
 */
@tagNameFilter("DIV")
class MenuController extends DisplayObject
{
	/** 
	 * Brix ID of the menu controller (only one is supposed to be defined in an app)
	 * static attribute set by the instance constructor
	 */
	static public var menuBrixId:String;
	static public function createPublication(){
		PublicationModel.getInstance().create();
	}
	/**
	 * trash the current publication
	 */
	static public function trashPublication(){
		var confirm = Lib.window.confirm("I am about to trash the publication "+PublicationModel.getInstance().currentName+". Are you sure?");
		if (confirm == true)
			PublicationModel.getInstance().trash(PublicationModel.getInstance().currentName);
	}
	/**
	 * open the "open publication" popup
	 */
	static public function openPublication(){
		Page.openPage("open-dialog", true, null, null, menuBrixId);
	}
	/**
	 * close the current publication
	 */
	static public function closePublication(){
		PublicationModel.getInstance().unload();
	}
	/**
	 * open the current publication in a new browser window
	 */
	static public function viewPublication(){
		Lib.window.open("../"+PublicationModel.getInstance().currentName, '_blank');
	}
	/**
	 * save the current publication with its current name
	 * if there is no current name, ask for one and create the new publication
	 */
	static public function savePublication(){
		// check the case where a new publication is about to be created
		if (PublicationModel.getInstance().currentName == PublicationConstants.CREATION_TEMPLATE_PUBLICATION_NAME){
			var newName = Lib.window.prompt("New name for your publication?", "");
			if (newName != null && newName!="")
				PublicationModel.getInstance().doCreate(newName);
		}
		else{
			PublicationModel.getInstance().save();
		}
	}
	/**
	 * ask for a new name and save the current pulication as
	 */
	static public function savePublicationAs(){
		var newName = Lib.window.prompt("New name for your publication?", PublicationModel.getInstance().currentName);
		if (newName != null)
			PublicationModel.getInstance().saveAs(newName);
	}
	/**
	 * save a copy of the current application with a new name
	 */
	static public function savePublicationCopy(){
		var newName = Lib.window.prompt("What name for your copy?", PublicationModel.getInstance().currentName);
		if (newName != null)
			PublicationModel.getInstance().saveACopy(newName);
	}
	/**
	 * add a page to the current publication
	 */
	static public function addPage(){
		var newName = Lib.window.prompt("What name for your new page?");
		if (newName != null)
			PageModel.getInstance().addPage(newName);
	}
	/**
	 * remove the current page
	 */
	static public function delPage(){
		// remove the page
		var confirm = Lib.window.confirm("I am about to delete the page "+PageModel.getInstance().selectedItem.name+". Are you sure?");
		if (confirm == true)
			PageModel.getInstance().removePage(PageModel.getInstance().selectedItem);
	}
	/**
	 * rename the current page
	 */
	static public function renamePage(){
		var newName = Lib.window.prompt("What name do your want to give to the page "+PageModel.getInstance().selectedItem.name+"?");
		if (newName != null)
			PageModel.getInstance().renamePage(PageModel.getInstance().selectedItem, newName);
	}
	/**
	 * open the file manager
	 */
	static public function openFileBrowser(){
		FileBrowserDialog.message = "Manage your files and click \"close\"";
		Page.openPage(FileBrowserDialog.FB_PAGE_NAME, true, null, null, menuBrixId);
	}
	/**
	 * Constructor
	 * Start listening the node
	 */
	public function new(rootElement:HtmlDom, BrixId:String){
		super(rootElement, BrixId);
		rootElement.addEventListener("click", onClick, false);
		menuBrixId = BrixId;
	}

	/**
	 * Handle menu events
	 */
	public function onClick(e:Event) {
		// prevent default links behavior
		e.preventDefault();

		// retrieve the node who triggered the event
		var target:HtmlDom = e.target;

		// retrieve the item name from the href attribute, without the "#"
		var itemName = target.getAttribute("data-menu-item");
		if (itemName == null)
			itemName = target.parentNode.getAttribute("data-menu-item");

		// take an action depending on the menu name
		switch (itemName) {
			/////////////
			// file
			/////////////
			case "create-publication":
				createPublication();
			case "trash-publication":
				trashPublication();
			case "open-publication":
				openPublication();
			case "close-publication":
				closePublication();
			case "view-publication":
				viewPublication();
			case "save-publication":
				savePublication();
			case "save-publication-as":
				savePublicationAs();
			case "save-publication-copy":
				savePublicationCopy();

			/////////////
			// page
			/////////////
			case "add-page":
				addPage();
			case "del-page":
				delPage();
			case "rename-page":
				renamePage();
			/////////////
			// files
			/////////////
			case "open-file-browser":
				openFileBrowser();
		}
	}
}

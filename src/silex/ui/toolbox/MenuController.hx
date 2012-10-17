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
	public function createPublication(){
		PublicationModel.getInstance().load(PublicationConstants.CREATION_TEMPLATE_PUBLICATION_NAME);
	}
	public function trashPublication(){
		var confirm = Lib.window.confirm("I am about to trash the publication "+PublicationModel.getInstance().currentName+". Are you sure?");
		if (confirm == true)
			PublicationModel.getInstance().trash(PublicationModel.getInstance().currentName);
	}
	public function openPublication(){
		Page.openPage("open-dialog", true, null, null, brixInstanceId);
	}
	public function closePublication(){
		PublicationModel.getInstance().unload();
	}
	public function viewPublication(){
		Lib.window.open("../"+PublicationModel.getInstance().currentName, '_blank');
	}
	public function savePublication(){
		// check the case where a new publication is about to be created
		if (PublicationModel.getInstance().currentName == PublicationConstants.CREATION_TEMPLATE_PUBLICATION_NAME){
			savePublicationAs();
		}
		else{
			PublicationModel.getInstance().save();
		}
	}
	public function savePublicationAs(){
		var newName = Lib.window.prompt("New name for your publication?", PublicationModel.getInstance().currentName);
		if (newName != null)
			PublicationModel.getInstance().saveAs(newName);
	}
	public function savePublicationCopy(){
		var newName = Lib.window.prompt("What name for your copy?", PublicationModel.getInstance().currentName);
		if (newName != null)
			PublicationModel.getInstance().saveACopy(newName);
	}
	public function addPage(){
		var newName = Lib.window.prompt("What name for your new page?");
		if (newName != null)
			PageModel.getInstance().addPage(newName);
	}
	public function delPage(){
		// remove the page
		var confirm = Lib.window.confirm("I am about to delete the page "+PageModel.getInstance().selectedItem.name+". Are you sure?");
		if (confirm == true)
			PageModel.getInstance().removePage(PageModel.getInstance().selectedItem);
	}
	public function renamePage(){
		var newName = Lib.window.prompt("What name do your want to give to the page "+PageModel.getInstance().selectedItem.name+"?");
		if (newName != null)
			PageModel.getInstance().renamePage(PageModel.getInstance().selectedItem, newName);
	}
	public function openFileBrowser(){
		FileBrowserDialog.message = "Manage your files and click \"close\"";
		Page.openPage(FileBrowserDialog.FB_PAGE_NAME, true, null, null, brixInstanceId);
	}
}

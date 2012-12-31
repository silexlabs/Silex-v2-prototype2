package silex.ui.toolbox;

import js.Lib;
import js.Dom;

import brix.component.navigation.Page;
import brix.component.ui.DisplayObject;
import brix.util.DomTools;

import silex.interpreter.Interpreter;
import silex.file.FileModel;
import silex.file.FileBrowser;
import silex.page.PageModel;

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
	/** 
	 * create a new empty file
	 */
	static public function createFile(){
		FileModel.getInstance().create();
	}
	/**
	 * trash the current file
	 */
	static public function trashFile(){
		var confirm = Lib.window.confirm("I am about to trash the file "+FileModel.getInstance().currentData.name+". Are you sure?");
		if (confirm == true)
			FileModel.getInstance().trash(FileModel.getInstance().currentData.name);
	}
	/**
	 * open the "open file" popup
	 */
	static public function openFile(){
		FileBrowser.selectFile(onFileChosen, menuBrixId);
	}
	/**
	 * callback for the FileBrowser
	 */
	static private function onFileChosen(fileUrl:String){
		var file = FileBrowser.getRelativeURLFromFileBrowser(fileUrl);
		FileModel.getInstance().load(file);
	}
	/**
	 * close the current file
	 */
/*	static public function closeFile(){
		FileModel.getInstance().unload();
	}
	/**
	 * open the current file in a new browser window
	 */
	static public function viewFile(){
		Lib.window.open(Silex.initialBaseUrl+FileModel.getInstance().currentData.name, '_blank');
	}
	/**
	 * save the current file with its current name
	 * if there is no current name, ask for one and create the new file
	 */
	static public function saveFile(){
		// check the case where a new file is about to be created
		FileModel.getInstance().save();
	}
	/**
	 * ask for a new name and save the current pulication as
	 */
	static public function saveFileAs(){
		var newName = Lib.window.prompt("New name for your file?", FileModel.getInstance().currentData.name);
		if (newName != null)
			FileModel.getInstance().saveAs(newName);
	}
	/**
	 * save a copy of the current application with a new name
	 */
	static public function saveFileCopy(){
		var newName = Lib.window.prompt("What name for your copy?", FileModel.getInstance().currentData.name);
		if (newName != null)
			FileModel.getInstance().saveACopy(newName);
	}
	/**
	 * add a page to the current file
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
		FileBrowser.manageFiles(menuBrixId, "Manage your files and click \"close\"");
	}
	/**
	 * Constructor
	 * Start listening the node
	 */
	public function new(rootElement:HtmlDom, BrixId:String){
		super(rootElement, BrixId);
		rootElement.addEventListener("click", onClick, false);
		menuBrixId = BrixId;
		// expose the class to the scripts interpreter
		Interpreter.getInstance().expose("MenuController", MenuController);
		#if js
			// todo: put the "prevent user leaving Silex builder accidentally" elsewhere and/or use a "dirty" flag to determine wether it is a problem to leave the page?
			// prevent user leaving Silex builder accidentally
			untyped Lib.window.onbeforeunload = function(){
				return "You're about to leave this page.";
			};
		#end
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
			case "create-file":
				createFile();
			case "trash-file":
				trashFile();
			case "open-file":
				openFile();
//			case "close-file":
//				closeFile();
			case "view-file":
				viewFile();
			case "save-file":
				saveFile();
			case "save-file-as":
				saveFileAs();
			case "save-file-copy":
				saveFileCopy();

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

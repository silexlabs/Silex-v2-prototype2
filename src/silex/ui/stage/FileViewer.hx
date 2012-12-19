package silex.ui.stage;

import js.Dom;
import js.Lib;

import silex.page.PageModel;
import silex.file.FileModel;

import brix.component.navigation.Page;
import brix.component.navigation.transition.TransitionData;

import brix.component.ui.DisplayObject;
import brix.component.layout.LayoutBase;

/**
 * This class is in charge of attaching the file to the DOM.
 */
@tagNameFilter("DIV")
class FileViewer extends DisplayObject{
	/**
	 * Information for debugging, e.g. the class name
	 */ 
	public static inline var DEBUG_INFO = "FileViewer class";
	/**
	 * name for the builder mode of the Silex editor
	 */
	public static inline var BUILDER_MODE_PAGE_NAME = "builder-mode";
	/**
	 * file model
	 */
	public var fileModel:FileModel;
	/**
	 * page model
	 */
	public var pageModel:PageModel;

	/**
	 * Constructor
	 * Define the callbacks
	 */
	public function new(rootElement:HtmlDom, BrixId:String){
		super(rootElement, BrixId);

		// store a reference to the model
		fileModel = FileModel.getInstance();

		// update the data when the file data changed
		fileModel.addEventListener(FileModel.ON_LOAD_START, onFileChange, DEBUG_INFO);
		fileModel.addEventListener(FileModel.ON_LOAD_SUCCESS, onFileData, DEBUG_INFO);
		
		// store a reference to the model
		pageModel = PageModel.getInstance();
		// attach events to the model
		pageModel.addEventListener(PageModel.ON_SELECTION_CHANGE, onPageChange, DEBUG_INFO);
	}
	/**
	 * Callback for the event, dispatched when a new file is about to be loaded
	 */
	public function onFileChange(event:CustomEvent){
		rootElement.innerHTML = "";
		LayoutBase.redrawLayouts();
	}
	/**
	 * Callback for the event, dispatched when a new file is loaded
	 * Attach the file view, i.e. add the duplicated DOM to the browser DOM.
	 */
	public function onFileData(event:CustomEvent){
		// display the file for editing
		rootElement.innerHTML = "";
		rootElement.appendChild(fileModel.currentData.viewHtmlDom);
		rootElement.appendChild(fileModel.currentData.headHtmlDom);
		LayoutBase.redrawLayouts();
	}
	/**
	 * Callback for the event dispatched when the page selection changes.
	 * Open the selected page in the view
	 */
	public function onPageChange(event:CustomEvent){
		if (pageModel.selectedItem!=null){
			Page.openPage(pageModel.selectedItem.name, false, null, null, fileModel.application.id, fileModel.currentData.viewHtmlDom);
		}
	}
}
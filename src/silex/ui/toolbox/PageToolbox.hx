package silex.ui.toolbox;

import js.Lib;
import js.Dom;

import silex.page.PageModel;

import org.slplayer.util.DomTools;

/**
 * This component displays the pages of the loaded publication.
 * 
 * It has to be position on the foreground with the CSS styles of the DOM element with which it is associated. 
 */
@tagNameFilter("div")
class PageToolbox extends ToolboxBase 
{
	/**
	 * class name expected for the add page button
	 */
	public static inline var ADD_BUTTON_CLASS_NAME:String = "add-button";
	/**
	 * class name expected for the delete page button
	 */
	public static inline var DEL_BUTTON_CLASS_NAME:String = "del-button";
	/**
	 * Constructor
	 * Start listening the input events
	 */
	public function new(rootElement:HtmlDom, SLPId:String)
	{
		super(rootElement, SLPId);
		// listen to the input event
		rootElement.addEventListener("click", onClick, true);
	}
	/**
	 * callback for toolbox events
	 */
	public function onClick(e:Event) {
		// retrieve the node who triggered the event
		var target:HtmlDom = e.target;
		// handle the change event
		if (DomTools.hasClass(e.target, ADD_BUTTON_CLASS_NAME))
			addPage();
		else if (DomTools.hasClass(e.target, DEL_BUTTON_CLASS_NAME))
			removePage();
	}
	/**
	 * Handle toolbox events
	 */
	public function addPage() {
		trace("addPage - ");
		PageModel.getInstance().addPage(Lib.window.prompt("Name for the publication"));
	}
	/**
	 * Handle toolbox events
	 */
	public function removePage() {
		trace("removePage - ");
		// store the page to remove
		var pageModel = PageModel.getInstance();
		var pageToRemove = pageModel.selectedItem;

		// open the page before or ater
/*		if (selectedIndex > 0) selectedIndex--;
		else selectedIndex++;
*/
		// remove the page
		pageModel.removePage(pageToRemove);
	}
}
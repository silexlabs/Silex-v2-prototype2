package silex.ui.toolbox;

import js.Lib;
import js.Dom;

import silex.page.PageModel;
import silex.layer.LayerModel;

import org.slplayer.util.DomTools;

/**
 * This component displays the masters of the loaded publication.
 * 
 * It has to be position on the foreground with the CSS styles of the DOM element with which it is associated. 
 */
@tagNameFilter("div")
class MasterToolbox extends ToolboxBase 
{
	/**
	 * class name expected for the add page button
	 */
	public static inline var ADD_BUTTON_CLASS_NAME:String = "add-button";
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
		trace("onClick "+e.target.className);
		// retrieve the node who triggered the event
		var target:HtmlDom = e.target;
		// handle the change event
		if (DomTools.hasClass(e.target, ADD_BUTTON_CLASS_NAME))
			addMaster();
	}
	/**
	 * Handle toolbox events
	 */
	public function addMaster() {
		trace("addMaster - ");
		var page = PageModel.getInstance().selectedItem;
		var layer = LayerModel.getInstance().selectedItem;
		if (page == null)
			throw("You must select a page to add a master to it");
		if (layer == null)
			throw("You must select the master to add it to the page");
			
		if (layer.rootElement.getAttribute(LayerModel.MASTER_PROPERTY_NAME) == null)
			throw("You must select the master to add it to the page");

		LayerModel.getInstance().addMaster(layer, page);
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
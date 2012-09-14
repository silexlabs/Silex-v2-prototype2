package silex.ui.list;

import js.Lib;
import js.Dom;

import org.slplayer.component.navigation.Page;
import org.slplayer.component.list.List;
import org.slplayer.util.DomTools;

import silex.page.PageModel;
import silex.publication.PublicationModel;
import silex.property.PropertyModel;

/**
 * list component used to visualize and manipulate pages 
 * listen to the model events to update the list 
 * @example 	<ul class="PageList"><li>::name::</li></ul> displays the name of the items
 */
@tagNameFilter("ul")
class PageList extends List<Page>
{
	/**
	 * Information for debugging, e.g. the class name
	 */ 
	public static inline var DEBUG_INFO = "PageList class";
	/**
	 * constructor
	 */
	public function new(rootElement:HtmlDom, SLPId:String){
		super(rootElement, SLPId);

		// store a reference to the model
		var pageModel = PageModel.getInstance();

		// update the data when the publication data changed
		pageModel.addEventListener(PageModel.ON_LIST_CHANGE, onListChange, DEBUG_INFO);

		// update the selection
		pageModel.addEventListener(PageModel.ON_SELECTION_CHANGE, onListChange, DEBUG_INFO);

		// update the selection
		PropertyModel.getInstance().addEventListener(PropertyModel.ON_PROPERTY_CHANGE, onListChange, DEBUG_INFO);

		// open the page when the selection changes
		onChange = onSelectPage;
	}
	/**
	 * refresh list data, and then redraw the display by calling doRedraw
	 * to be overriden to handle the model or do nothing if you manipulate the list and dataProvider by composition
	 * if you override this, either call super.reloadData() to redraw immediately, or call doRedraw() when the data is ready
	 */
	override public function reloadData(){
		var publicationModel = PublicationModel.getInstance();
		// if a publication is loaded only
		if(publicationModel.application != null){
			dataProvider = PageModel.getInstance().getClasses(publicationModel.viewHtmlDom, publicationModel.application.id, Page);
			selectedItem = PageModel.getInstance().selectedItem;
		}
		trace("reloadData "+dataProvider);
		super.reloadData();
	}
	public function onListChange(e:CustomEvent){
		trace("onListChange("+e+")");
		reloadData();
	}
	/**
	 * selection changed, open the selected page
	 */
	override function setSelectedIndex(idx:Int):Int {
		trace("setSelectedIndex "+idx);
		return super.setSelectedIndex(idx);
	}
	/**
	 * callback for the list, dispatched when the user selection changed
	 */
	private function onSelectPage(page:Page){
		if (PageModel.getInstance().selectedItem != page){
			trace("onSelectPage("+page+")");
			PageModel.getInstance().selectedItem = page;
		}
	}
}
package silex.ui.list;

import js.Lib;
import js.Dom;

import brix.component.navigation.Page;
import brix.component.list.List;
import brix.util.DomTools;

import silex.page.PageModel;
import silex.publication.PublicationModel;
import silex.property.PropertyModel;

/**
 * list component used to visualize and manipulate pages 
 * listen to the model events to update the list 
 * @example 	<ul class="PageList"><li>::name::</li></ul> displays the name of the items
 */
class PageList extends List<Page>
{
	/**
	 * Information for debugging, e.g. the class name
	 */ 
	public static inline var DEBUG_INFO = "PageList class";
	/**
	 * constructor
	 */
	public function new(rootElement:HtmlDom, BrixId:String){
		super(rootElement, BrixId);

		// store a reference to the model
		var pageModel = PageModel.getInstance();

		// update the data when the publication data changed
		pageModel.addEventListener(PageModel.ON_LIST_CHANGE, onListChange, DEBUG_INFO);

		// update the selection
		pageModel.addEventListener(PageModel.ON_SELECTION_CHANGE, onListChange, DEBUG_INFO);

		// update the selection
		PropertyModel.getInstance().addEventListener(PropertyModel.ON_PROPERTY_CHANGE, onListChange, DEBUG_INFO);
	}
	/**
	 * refresh list data, and then redraw the display by calling doRedraw
	 * to be overriden to handle the model or do nothing if you manipulate the list and dataProvider by composition
	 * if you override this, either call super.reloadData() to redraw immediately, or call doRedraw() when the data is ready
	 */
	override public function reloadData(){
		dataProvider = buildDataProvider();
		selectedItem = PageModel.getInstance().selectedItem;
		super.reloadData();
	}
	/**
	 * build the data provider out of the pages array in the loaded publication
	 */
	private function buildDataProvider():Array<Page>{
		var publicationModel = PublicationModel.getInstance();
		if(publicationModel.application != null){
			// if a publication is loaded only
			return dataProvider = PageModel.getInstance().getClasses(publicationModel.viewHtmlDom, publicationModel.application.id, Page);
		}
		return new Array();
	}
	public function onListChange(e:CustomEvent){
		// trace("onListChange("+e+")");
		reloadData();
	}
	/**
	 * selection changed, open the selected page
	 */
	override function setSelectedIndex(idx:Int):Int {
		idx = super.setSelectedIndex(idx);
		// trace("setSelectedIndex "+idx);
		if (PageModel.getInstance().selectedItem != selectedItem){
			// trace("onSelectPage("+page+")");
			PageModel.getInstance().selectedItem = selectedItem;
		}
		return idx;
	}
}
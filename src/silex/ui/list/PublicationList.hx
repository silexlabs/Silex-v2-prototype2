UNUSED
REPLACED BY FILE BROWSER







package silex.ui.list;

import js.Lib;
import js.Dom;

import brix.component.list.List;
import brix.util.DomTools;

import silex.file.FileModel;
import silex.publication.PublicationData;

/**
 * list component with PublicationConfigData as an input
 * takes objects in its data provider, with the name of the publication, and its config
 * takes a template in the HTML and duplicate it for each element
 * listen to the model events to get the PublicationConfigData
 * to refresh this list, simply call FileModel.getInstance().listPublications()
 * @example 	<ul class="PublicationList"><li>::name::</li></ul> displays the name of the items
 */
@tagNameFilter("ul")
class PublicationList extends List<PublicationListItem>
{
	/**
	 * Information for debugging, e.g. the class name
	 */ 
	public static inline var DEBUG_INFO = "PublicationList class";
	/**
	 * CSS class name for the container of the loagin anim
	 */ 
	public static inline var LOADING_ANIM_CONTAINER_CLASS_NAME = "publications-list-loading";
	/**
	 * Publication model, used to interact with the DOM
	 */
	private var publicationModel:PublicationModel;
	/**
	 * constructor
	 */
	public function new(rootElement:HtmlDom, BrixId:String){
		super(rootElement, BrixId);

		// store a reference to the model
		publicationModel = FileModel.getInstance();

		// update the data when the publication data changed
		publicationModel.addEventListener(PublicationModel.ON_LIST, onListResult, DEBUG_INFO);
	}
	/**
	 * refreh list data, and then redraw the display by calling doRedraw
	 * to be overriden to handle the model or do nothing if you manipulate the list and dataProvider by composition
	 * if you override this, either call super.reloadData() to redraw immediately, or call doRedraw() when the data is ready
	 */
	override public function reloadData(){
		// reload data, this will trigger a  refresh on the list when onListData is dispatched by the model
		FileModel.getInstance().loadList();

		// empty the list
		dataProvider = [];
		doRedraw();

		// show the loading anim
		var loadingAnimContainer = DomTools.getSingleElement(Lib.document.body, LOADING_ANIM_CONTAINER_CLASS_NAME, false);
		if (loadingAnimContainer == null){
			throw("Error: could not find the container of the loading anim of the publications list component");
		}
		loadingAnimContainer.style.display = "inline";
	}
	/**
	 * callback for the onList event, dispatched by the PublicationModel
* call the list doRedraw method to redraw the display
	 */
	private function onListResult(event:Event){
		dataProvider = cast(event).detail;

		// redraw the list
		doRedraw();

		// hide the loading anim
		var loadingAnimContainer = DomTools.getSingleElement(Lib.document.body, LOADING_ANIM_CONTAINER_CLASS_NAME, false);
		if (loadingAnimContainer == null){
			throw("Error: could not find the container of the loading anim of the publications list component");
		}
		loadingAnimContainer.style.display = "none";
	}
}
package silex.page;

import js.Lib;
import js.Dom;

import silex.ModelBase;
import silex.publication.PublicationModel;
import silex.layer.LayerModel;

import org.slplayer.component.navigation.Page;
import org.slplayer.component.navigation.Layer;
import org.slplayer.util.DomTools;

/**
 * Manipulation of pages, remove, add, etc. 
 * This class is a singleton and it can be used on the client side (may be used on the server side with cocktail).
 * The models in Silex are used only when editing, not when viewing a publication.
 */
class PageModel extends ModelBase<Page>{
	////////////////////////////////////////////////
	// Singleton implementation
	////////////////////////////////////////////////
	/**
	 * implement the singleton pattern
	 */
	static private var instance:PageModel;
	/**
	 * implement the singleton pattern
	 */
	static public function getInstance():PageModel {
	 	if (instance == null){
	 		instance = new PageModel();
	 	}
	 	return instance;
	}
	////////////////////////////////////////////////
	// Selection
	////////////////////////////////////////////////
	/**
	 * Information for debugging, e.g. the class name
	 */ 
	public static inline var DEBUG_INFO:String = "PageModel class";
	/**
	 * event dispatched when selection changes
	 */
	public static inline var ON_SELECTION_CHANGE:String = "onPageSelectionChange";
	/**
	 * event dispatched when hover changes
	 * hover is like a pre-selection visualization
	 */
	public static inline var ON_HOVER_CHANGE:String = "onPageHoverChange";
	/**
	 * event dispatched when the list of pages changes
	 */
	public static inline var ON_LIST_CHANGE = "onPageListChange";
	/**
	 * Models are singletons
	 * Constructor is private
	 */
	private function new(){
		super(ON_HOVER_CHANGE, ON_SELECTION_CHANGE, DEBUG_INFO);
	}
	/**
	 * Setter for the selected item
	 * Reset the selection
	 */
	override public function setSelectedItem(item:Page):Page {
		// reset model selection
		var model = LayerModel.getInstance();
		model.selectedItem = null;
		model.hoveredItem = null;
		return super.setSelectedItem(item);
	}
	public function getPages():Array<Page>{
		// get all pages, i.e. all element with class name "page"
		var viewHtmlDom = PublicationModel.getInstance().viewHtmlDom;
		var pages:Array<Page> = new Array();

		// if a publication is loaded only
		if (viewHtmlDom == null)
			return pages;
			
		// get the page nodes
		var pageNodes:HtmlCollection<HtmlDom> = Page.getPageNodes(PublicationModel.getInstance().application.id, viewHtmlDom);

		// browse all pages
		for (pageIdx in 0...pageNodes.length)
		{
			// retrieve the Page class instance associated with this node
			var pageInstances:List<Page> = PublicationModel.getInstance().application.getAssociatedComponents(pageNodes[pageIdx], Page);
			if (pageInstances.length == 1){
				// store the first instance
				pages.push(pageInstances.first());
			}
			else{
				throw ("Error: there should be 1 and only 1 instance of Page associated with this node, and there is "+pageInstances.length+ " - "+pageNodes[pageIdx].className);
			}
		}
		return pages;
	}
	/**
	 * add a page to the view and model of the publication
	 * dispatch the change event
	 */
	public function addPage(name:String = ""){
		// default value
		if (name == "") name = getNewName();
		var className = name.toLowerCase().split(" ").join("");
		
		// get the publication model
		var publicationModel = PublicationModel.getInstance();
		// get the view and model DOM
		var viewHtmlDom = publicationModel.viewHtmlDom;
		var modelHtmlDom = publicationModel.modelHtmlDom;

		// create the node and the associated instance
		var newNode = Lib.document.createElement("a");
		newNode.className = "Page";
		newNode.setAttribute(Page.CONFIG_NAME_ATTR, className);
		newNode.innerHTML = name;

		// add to the view and model DOMs
		modelHtmlDom.appendChild(newNode.cloneNode(true));
		viewHtmlDom.appendChild(newNode);

		// create the Page instance
		var newPage:Page = new Page(newNode, publicationModel.application.id);
		newPage.init();

		// create a node for an empty new layer
		var newNode = Lib.document.createElement("div");
		newNode.className = "Layer "+className;
		PublicationModel.getInstance().prepareForEdit(newNode);

		// add to the view and model DOMs
		modelHtmlDom.appendChild(newNode.cloneNode(true));
		viewHtmlDom.appendChild(newNode);

		// create the Layer instance
		var newLayer:Layer = new Layer(newNode, publicationModel.application.id);
		newLayer.init();

		// open the new page
		Page.getPageByName(className, publicationModel.application.id, viewHtmlDom).open(null, null, true, true);

		// dispatch the change event
		dispatchEvent(createEvent(ON_LIST_CHANGE, newPage), DEBUG_INFO);
	}
	/** 
	 * build a new unique name
	 */
	public function getNewName():String{
		return "New Page Name"+Math.round(Math.random()*999999);
	}
	/**
	 * remove a page from the view and model of the publication
	 * remove the page from all layers css class name
	 * dispatch the change event
	 */
	public function removePage(page:Page){
		// get the publication model
		var publicationModel = PublicationModel.getInstance();
		// get the view and model DOM
		var viewHtmlDom = publicationModel.viewHtmlDom;
		var modelHtmlDom = publicationModel.modelHtmlDom;

		// close the page
		//page.close(null, null, true);

		// open the default page
		var initialPageName = DomTools.getMeta(Page.CONFIG_INITIAL_PAGE_NAME, null, publicationModel.headHtmlDom);
		Page.getPageByName(initialPageName, publicationModel.application.id, viewHtmlDom).open(null, null, true, true);

		// retrieve the node in the model, which is associated to the page instance
		// get all pages, i.e. all element with class name "page"
		var pages:HtmlCollection<HtmlDom> = Page.getPageNodes(publicationModel.application.id, modelHtmlDom);
		// browse all pages
		for (pageIdx in 0...pages.length){
			// check if it has the desired name
			if (pages[pageIdx].getAttribute(Page.CONFIG_NAME_ATTR) == page.name){
				// remove the node 
				pages[pageIdx].parentNode.removeChild(pages[pageIdx]);
				break;
			}
		}

		page.rootElement.parentNode.removeChild(page.rootElement);
		//page.rootElement = null;

		// remove the page from all layers css class name
		removeClassFromLayers(page.name, publicationModel.application.id, modelHtmlDom);
		removeClassFromLayers(page.name, publicationModel.application.id, viewHtmlDom);

		// dispatch the change event
		dispatchEvent(createEvent(ON_LIST_CHANGE), DEBUG_INFO);
	}
	public function removeClassFromLayers(className:String, slPlayerId:String, htmlDom:HtmlDom) {
		trace("removeClassFromLayers("+className+", "+slPlayerId+", "+htmlDom+")");
		var nodes = Layer.getLayerNodes(className, slPlayerId, htmlDom);
		// browse the layers
		for (idxLayerNode in 0...nodes.length){
			trace("found "+nodes[0].className);

			// always take the 1st element since the HtmlList is updated, and the nodes are removed automatically
			DomTools.removeClass(nodes[0], className);
		}
	}
}

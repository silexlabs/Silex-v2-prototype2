package silex.page;

import js.Lib;
import js.Dom;

import silex.interpreter.Interpreter;
import silex.ModelBase;
import silex.file.FileModel;
import silex.layer.LayerModel;
import silex.component.ComponentModel;
import silex.property.PropertyModel;
import silex.util.SilexTools;

import brix.component.navigation.link.LinkBase;
import brix.component.navigation.Page;
import brix.component.navigation.Layer;
import brix.util.DomTools;

/**
 * Manipulation of pages, remove, add, etc. 
 * This class is a singleton and it can be used on the client side (may be used on the server side with cocktail).
 * The models in Silex are used only when editing, not when viewing a file.
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
		// expose the class to the scripts interpreter
		Interpreter.getInstance().expose("PageModel", PageModel);
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
	/**
	 * add a page to the view and model of the file
	 * dispatch the change event
	 */
	public function addPage(name:String = ""){
		// default value
		if (name == "") name = getNewName();
		var className = SilexTools.cleanupName(name);
		
		// get the file model
		var fileModel = FileModel.getInstance();
		// get the view and model DOM
		var viewHtmlDom = fileModel.currentData.viewHtmlDom;
		var modelHtmlDom = fileModel.currentData.modelHtmlDom;

		// create the node and the associated instance
		var newNode = Lib.document.createElement("a");
		newNode.className = "Page";
		newNode.setAttribute(Page.CONFIG_NAME_ATTR, className);
		newNode.innerHTML = name;

		// add to the view and model DOMs
		modelHtmlDom.appendChild(newNode.cloneNode(true));
		viewHtmlDom.appendChild(newNode);

		// add the needed data to edit the component
		fileModel.prepareForEdit(newNode);

		// create the Page instance
/**/
		var newPage:Page = new Page(newNode, fileModel.application.id);
		//fileModel.application.addAssociatedComponent(newNode, newPage);
		newPage.init();
/*
		fileModel.application.initDom(newNode);
		fileModel.application.initComponents();
		var newPage:Page = fileModel.application.getAssociatedComponents(newNode, Page).first();
/**/
		// create an empty new layer
		LayerModel.getInstance().addRequiredMasters(className, true);

		// add a link in the nav bar
		var navBarNode = DomTools.getSingleElement(fileModel.currentData.viewHtmlDom, LayerModel.NAV_LAYER_NAME, true);
		var layerInstance = fileModel.application.getAssociatedComponents(navBarNode, Layer).first();
		var textElement = ComponentModel.getInstance().addComponent("div", layerInstance, navBarNode.childNodes.length);
		PropertyModel.getInstance().setAttribute(textElement, "title", "Link to "+name);
		PropertyModel.getInstance().setProperty(textElement, "innerHTML", name);
		ComponentModel.getInstance().makeLinkToPage(textElement, className);

		// open the new page
		newPage.open(null, null, true, true);

		// update selection
		selectedItem = newPage;

		// dispatch the change event
		dispatchEvent(createEvent(ON_LIST_CHANGE, newPage), DEBUG_INFO);
	}
	/** 
	 * build a new unique name
	 * todo: page1 page2 ...
	 */
	public function getNewName():String{
		return "New Page Name "+Math.round(Math.random()*999999);
	}
	/**
	 * remove a page from the view and model of the file
	 * remove the page from all layers css class name
	 * dispatch the change event
	 */
	public function removePage(page:Page){
		// get the file model
		var fileModel = FileModel.getInstance();
		// get the view and model DOM
		var viewHtmlDom = fileModel.currentData.viewHtmlDom;
		var modelHtmlDom = fileModel.currentData.modelHtmlDom;

		// remove the link from the nav bar
		var navBarNode = DomTools.getSingleElement(fileModel.currentData.viewHtmlDom, LayerModel.NAV_LAYER_NAME, true);
		var linkNodes = navBarNode.getElementsByClassName("SilexLink");
		// browse link nodes and remove the one which links to the page
		for (nodeIdx in 0...linkNodes.length){
			var node = linkNodes[nodeIdx];
			if (node != null
				&& (node.getAttribute(LinkBase.CONFIG_PAGE_NAME_DATA_ATTR) == page.name 
				|| node.getAttribute(LinkBase.CONFIG_PAGE_NAME_ATTR) == page.name)
			){
				// remove from the view and the model
				ComponentModel.getInstance().removeComponent(node);
			}
		}

		// remove the page from all layers which has the class name as css rule
		var nodes = Layer.getLayerNodes(page.name, fileModel.application.id, viewHtmlDom);

		// browse the layers
		for (idxLayerNode in 0...nodes.length){
			// always take the 1st element since the HtmlList is updated, and the nodes are removed automatically
			var layerNode = nodes[0];
			var layerInstance:Layer = fileModel.application.getAssociatedComponents(layerNode, Layer).first();
			LayerModel.getInstance().removeLayer(layerInstance, page.name);
		}

		// retrieve the node in the model, which is associated to the page instance
		// get all pages, i.e. all element with class name "page"
		var pages:HtmlCollection<HtmlDom> = Page.getPageNodes(fileModel.application.id, modelHtmlDom);
		// browse all pages
		for (pageIdx in 0...pages.length){
			// check if it has the desired name
			if (pages[pageIdx].getAttribute(Page.CONFIG_NAME_ATTR) == page.name){
				// remove the node 
				pages[pageIdx].parentNode.removeChild(pages[pageIdx]);
				break;
			}
		}

		// reset components associated wit hthis element
		fileModel.application.removeAllAssociatedComponent(page.rootElement);
		// remove element from dom
		page.rootElement.parentNode.removeChild(page.rootElement);
		// todo: maybe free the domelement, not possible to write page.rootElement = null;
		// todo: unregister class from Brix

		// change selection 
		if(selectedItem == page)
			selectedItem = null;

		// open the default page
		var initialPageName = DomTools.getMeta(Page.CONFIG_INITIAL_PAGE_NAME, null, fileModel.currentData.headHtmlDom);
		Page.getPageByName(initialPageName, fileModel.application.id, viewHtmlDom).open(null, null, true, true);
		// todo: handle the case where we are removing the default page

		// dispatch the change event
		dispatchEvent(createEvent(ON_LIST_CHANGE), DEBUG_INFO);
	}
	/**
	 * rename a page from the view and model of the file
	 * change the page name from all layers css class name
	 * dispatch the change event
	 */
	public function renamePage(page:Page, newName:String){
		// get the file model
		var fileModel = FileModel.getInstance();
		var className = SilexTools.cleanupName(newName);

		
		// get the view and model DOM
		var viewHtmlDom = fileModel.currentData.viewHtmlDom;
		var modelHtmlDom = fileModel.currentData.modelHtmlDom;
		var headHtmlDom = fileModel.currentData.headHtmlDom;

		// update all layers which has the class name as css rule
		var viewNodes = Layer.getLayerNodes(page.name, fileModel.application.id, viewHtmlDom);
		var modelNodes = Layer.getLayerNodes(page.name, fileModel.application.id, modelHtmlDom);

		// browse the layers and replace page name in the view
		for (idxLayerNode in 0...viewNodes.length){
			var layerNode = viewNodes[0];
			DomTools.removeClass(layerNode, page.name);
			DomTools.addClass(layerNode, className);
		}
		// browse the layers and replace page name in the model
		for (idxLayerNode in 0...modelNodes.length){
			var layerNode = modelNodes[0];
			DomTools.removeClass(layerNode, page.name);
			DomTools.addClass(layerNode, className);
		}
		// update the initial page name if needed
		var initialPageName = DomTools.getMeta(Page.CONFIG_INITIAL_PAGE_NAME, null, headHtmlDom);
		if (initialPageName == page.name){
			DomTools.setMeta(Page.CONFIG_INITIAL_PAGE_NAME, className, null, headHtmlDom);
		}

		// update the links
		var links = fileModel.application.getComponents(LinkBase);
		// browse links and update those which link to the page
		trace("links: "+links);
		for (link in links){
			trace("update link "+link);
			if (link.linkName == page.name){
				var linkText: String = "";
				// replace text if it was not changed
				if (SilexTools.cleanupName(link.rootElement.innerHTML) == page.name){
					linkText = newName;
				}
				// update the link
				ComponentModel.getInstance().updateLink(link.rootElement, page.name, className, linkText);
 				link.linkName = className;
			}
		}

		// change the page name
		var viewPageNode = DomTools.getElementsByAttribute(viewHtmlDom, "name", page.name)[0];
		var modelPageNode = DomTools.getElementsByAttribute(modelHtmlDom, "name", page.name)[0];
		viewPageNode.setAttribute("name", className);
		modelPageNode.setAttribute("name", className);
		page.setPageName(className);

		// refresh selection 
		refresh();
	}
}

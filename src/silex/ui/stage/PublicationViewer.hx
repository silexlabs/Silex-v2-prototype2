package silex.ui.stage;

import js.Dom;
import js.Lib;

import silex.page.PageModel;
import silex.publication.PublicationModel;
import silex.publication.PublicationData;

import org.slplayer.component.navigation.Page;
import org.slplayer.component.navigation.transition.TransitionData;

import org.slplayer.util.DomTools;

import org.slplayer.component.ui.DisplayObject;

/**
 * This class is in charge of attaching the publication to the DOM.
 */
class PublicationViewer extends DisplayObject{
	/**
	 * Information for debugging, e.g. the class name
	 */ 
	public static inline var DEBUG_INFO = "PublicationViewer class";
	/**
	 * name for the builder mode of the Silex editor
	 */
	public static inline var BUILDER_MODE_PAGE_NAME = "builder-mode";
	/**
	 * publication model
	 */
	public var publicationModel:PublicationModel;
	/**
	 * page model
	 */
	public var pageModel:PageModel;

	/**
	 * Constructor
	 * Define the callbacks
	 */
	public function new(rootElement:HtmlDom, SLPId:String){
		super(rootElement, SLPId);

		// store a reference to the model
		publicationModel = PublicationModel.getInstance();

		// update the data when the publication data changed
		publicationModel.addEventListener(PublicationModel.ON_DATA, onPublicationData, DEBUG_INFO);
		publicationModel.addEventListener(PublicationModel.ON_CHANGE, onPublicationChange, DEBUG_INFO);
		
		// store a reference to the model
		pageModel = PageModel.getInstance();
		// attach events to the model
		pageModel.addEventListener(PageModel.ON_SELECTION_CHANGE, onPageChange, DEBUG_INFO);
	}
	/**
	 * Callback for the event, dispatched when a new publication is about to be loaded
	 */
	public function onPublicationChange(event:CustomEvent){
		rootElement.innerHTML = "";
	}
	/**
	 * Callback for the event, dispatched when a new publication is loaded
	 * Attach the publication view, i.e. add the duplicated DOM to the browser DOM.
	 */
	public function onPublicationData(event:CustomEvent){
		// display the publication for editing
		rootElement.innerHTML = "";
		rootElement.appendChild(publicationModel.viewHtmlDom);
	}
	/**
	 * Callback for the event dispatched when the page selection changes.
	 * Open the selected page in the view
	 */
	public function onPageChange(event:CustomEvent){
		if (pageModel.selectedItem==null){
			// open the builder initial page
			var initialPageName = DomTools.getMeta(Page.CONFIG_INITIAL_PAGE_NAME);
			if (initialPageName != null)
				Page.openPage(initialPageName, false, null, null, SLPlayerInstanceId);
		}
		else{
			Page.openPage(pageModel.selectedItem.name, false, null, null, publicationModel.application.id, publicationModel.viewHtmlDom);
		}
	}
}
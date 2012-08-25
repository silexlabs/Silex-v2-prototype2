package org.silex.component;

import js.Lib;
import js.Dom;

import org.slplayer.component.ui.DisplayObject;
import org.silex.publication.PublicationService;
import org.silex.publication.PublicationData;

/**
 * list component with PublicationConfigData as an input
 * takes objects in its data provider, with the name of the publication, and its config
 * takes a template in the HTML and duplicate it for each element
 * listen to the event onData on the attached html node, to get the PublicationConfigData
 * @example 	<ul class="PublicationList"><li>::name::</li></ul> displays the name of the items
 */
@tagNameFilter("ul")
class PublicationConnector extends DisplayObject
{
	public static inline var ON_DATA_EVENT:String = "onData";
	public static inline var REFRESH_DATA_EVENT:String = "refreshData";
	private var publicationService:PublicationService;

	/**
	 * constructor
	 */
	public function new(rootElement:HtmlDom, SLPId:String){
		super(rootElement, SLPId);
		publicationService = new PublicationService();

		// update the data when refreshData is dispatched
		rootElement.addEventListener(REFRESH_DATA_EVENT, loadData, false);
	}
	/**
	 * starts the loading process
	 */
	public function loadData(unused:Event = null){
		publicationService.getPublications(null, onResult, onError);
	}
	/**
	 * An error occured
	 */
	private function onError(msg:String):Void{
		// todo: display notification
		throw("An error occured while loading publications list ("+msg+")");
	}
	/**
	 * Data is loaded 
	 * build the data object and throw the onData event
	 */
	private function onResult(publications:Hash<PublicationConfigData>):Void{
		var data:Array<{name:String, configData:PublicationConfigData}> = new Array();
		if (publications != null){
			// browse all publications 
			for (publicationName in publications.keys()){
				trace("Publication "+ publicationName);
				// create the item (name and config data)
				var item = {name:publicationName, configData:publications.get(publicationName)};
				// add to the data
				data.push(item);
			}
		}
		// populate the list
		var event:CustomEvent = cast Lib.document.createEvent("CustomEvent");
		event.initCustomEvent(ON_DATA_EVENT, true, true, data);
		rootElement.dispatchEvent(event);
	}
}
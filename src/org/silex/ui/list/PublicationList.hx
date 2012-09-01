package org.silex.ui.list;

import js.Lib;
import js.Dom;

import org.slplayer.component.list.List;
import org.slplayer.util.DomTools;

import org.silex.publication.PublicationModel;
import org.silex.publication.PublicationData;

/**
 * list component with PublicationConfigData as an input
 * takes objects in its data provider, with the name of the publication, and its config
 * takes a template in the HTML and duplicate it for each element
 * listen to the model events to get the PublicationConfigData
 * to refresh this list, simply call PublicationModel.getInstance().listPublications()
 * @example 	<ul class="PublicationList"><li>::name::</li></ul> displays the name of the items
 */
@tagNameFilter("ul")
class PublicationList extends List<PublicationListItem>
{
	/**
	 * Publication model, used to interact with the DOM
	 */
	private var publicationModel:PublicationModel;
	/**
	 * constructor
	 */
	public function new(rootElement:HtmlDom, SLPId:String){
		super(rootElement, SLPId);

		// store a reference to the model
		publicationModel = PublicationModel.getInstance();

		// update the data when the publication data changed
		publicationModel.addEventListener(PublicationModel.ON_LIST, onListResult);
	}
	/**
	 * callback for the onList event, dispatched by the PublicationModel
	 */
	private function onListResult(event:Event){
		trace("onData "+event);
		dataProvider = cast(event).detail;
		redraw();
	}
}
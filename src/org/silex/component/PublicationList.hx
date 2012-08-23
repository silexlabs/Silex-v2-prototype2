package org.silex.component;

import js.Lib;
import js.Dom;

import org.slplayer.component.list.List;
import org.slplayer.util.DomTools;

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
class PublicationList extends List<{name:String, configData:PublicationConfigData}>
{
	static inline var ON_DATA_EVENT:String = "onData";
	/**
	 * constructor
	 */
	public function new(rootElement:HtmlDom, SLPId:String){
		super(rootElement, SLPId);
		rootElement.addEventListener(ON_DATA_EVENT, onData, false);
	}
	/**
	 * callback for the onData event, dispatched by a DataProvider or connector component
	 */
	private function onData(event:Event){
		trace("onData "+event);
		dataProvider = cast(event).detail;
		redraw();
	}
}
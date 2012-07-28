package org.silex.components;

import js.Lib;
import js.Dom;

import org.slplayer.component.ui.DisplayObject;
import org.silex.core.DomTools;

/**
 * Let you specify a page to display when the user clicks on the component's node
 * Also open home page, causing the other pages to stop their audios and videos
 */
class LinkToPage extends DisplayObject{
	public static inline var PAGE_CLASS_NAME:String = "page";
	public static inline var VISIBLE_PAGE_CLASS_NAME:String = "visible-page";
	public static inline var HIDDEN_PAGE_CLASS_NAME:String = "hidden-page";

	private static var isInitDone:Bool = false;
	/**
	 * constructor
	 */
	public function new(rootElement:HtmlDom, SLPId:String) {
		super(rootElement, SLPId);
		rootElement.onclick = onClick;
	}
	/**
	 * open home page
	 * causing the other pages to stop their audios and videos
	 */
	override public function init() : Void {
		// init, open the 1st page
		trace("init "+isInitDone+" - "+VISIBLE_PAGE_CLASS_NAME);
		if (!isInitDone){
			isInitDone = true;
			showPageByName(VISIBLE_PAGE_CLASS_NAME);
		}
	}
	/**
	 * user clicked the link
	 * show the pages corresponding to our link and hide the others
	 */
	private function onClick(e:Event){
		trace("onClick");

		// retrieve the name of our link 
		var linkName : String;
		if (Reflect.hasField(rootElement, "href") || Reflect.field(rootElement, "href") != null){
			linkName = Reflect.field(rootElement, "href");
			// removes the URL before the deep link
			linkName = linkName.substr(linkName.indexOf("#")+1);
		}
		else throw("error, the link has no href atribute ("+rootElement+")");

		// show the page with this name
		showPageByName(linkName);
	}
	/** 
	 * show the pages with linkname in their css style class name
	 * hide the other pages
	 */
	private function showPageByName(linkName:String) {
		// get all pages, i.e. all element with class name "page"
		var pages:HtmlCollection<HtmlDom> = Lib.document.getElementsByClassName(PAGE_CLASS_NAME);
		// check all pages and show the one wich have the desired name in their css style
		for (pageIdx in 0...pages.length){
			trace(pageIdx + " - "+ pages[pageIdx].className);
			if (pages[pageIdx].className.indexOf(linkName) > -1)
				show(pages[pageIdx]);
			else
				hide(pages[pageIdx]);
		}
	}
	/**
	 * show the given node by removing the hidden-page css style and adding the visible-page one
	 */
	private function show(element:HtmlDom) {
		trace("show page "+element);
		// show hide pages
		DomTools.removeClass(element, HIDDEN_PAGE_CLASS_NAME);
		DomTools.addClass(element, VISIBLE_PAGE_CLASS_NAME);

		// play the videos/sounds when entering the page
		var audioTags:HtmlCollection<HtmlDom> = element.getElementsByTagName("audio");
		for (idx in 0...audioTags.length){
			if (cast(audioTags[idx]).autoplay == true){
				cast(audioTags[idx]).play();
			}
		}
	}
	/**
	 * hide the given node by removing the visible-page css style and adding the hidden-page one
	 */
	private function hide(element:HtmlDom) {
		// show hide pages
		DomTools.removeClass(element, VISIBLE_PAGE_CLASS_NAME);
		DomTools.addClass(element, HIDDEN_PAGE_CLASS_NAME);

		// stop the videos/sounds when leaving the page
		var audioTags:HtmlCollection<HtmlDom> = element.getElementsByTagName("audio");
		for (idx in 0...audioTags.length){
			cast(audioTags[idx]).pause();
			cast(audioTags[idx]).currentTime = 0;
		}
	}
}

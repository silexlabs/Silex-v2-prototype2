package silex.file;

import js.Dom;

typedef FileData = {
	/** 
	 * Head section of the current dom object, being edited
	 */
	headHtmlDom:HtmlDom,
	/** 
	 * Current dom object, being edited, this is the actual model
	 */
	modelHtmlDom:HtmlDom,
	/** 
	 * Current duplicated DOM in order to be displayed and edited
	 */
	viewHtmlDom:HtmlDom,
	/**
	 * currently loaded file name
	 */
	name:String,
	/**
	 * raw html data
	 */
	rawHtml:String,
	/**
	 * true if a file is currently being edited
	 */
	isLoaded:Bool,
}
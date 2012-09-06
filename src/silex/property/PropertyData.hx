package silex.property;

import js.Lib;
import js.Dom;

/**
 * structure used to hold a property data
 * it is passed as the detail of a property change event
 */
typedef PropertyData = {
	name:String,
	value:String,
	viewHtmlDom:HtmlDom,
	modelHtmlDom:HtmlDom,
}
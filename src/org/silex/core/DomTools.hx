package org.silex.core;

import js.Lib;
import js.Dom;

/**
 * Helper to manipulate the dom
 */
class DomTools {
	/**
	 * add a css class to a node if it is not already in the class name
	 */
	static public function toggleClass(element:HtmlDom, className:String) {
		if(hasClass(element, className))
			removeClass(element, className);
		else
			addClass(element, className);
	}
	/**
	 * add a css class to a node if it is not already in the class name
	 */
	static public function addClass(element:HtmlDom, className:String) {
		if(!hasClass(element, className))
			element.className += " "+ className;
	}
	/**
	 * remove a css class from a node 
	 */
	static public function removeClass(element:HtmlDom, className:String) {
		if(hasClass(element, className))
			element.className = StringTools.replace(element.className, className, "");
	}
	/**
	 * check if the node has a given css class
	 */
	static public function hasClass(element:HtmlDom, className:String) {
		return element.className.indexOf(className) > -1;
	}
}

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
	/**
	 * set a rule on a given css style
	 * @throws 	ERROR: in chrome, this will work only with a web server and the http protocole, you can not open the HTML file directly 
	 */
/*
Do not work properly : when an existing rule is modified, the DOM is not refreshed
	static public function setStyleRule(selector:String, styleName:String, value:String):CssRule {
		var sheets = Lib.document.styleSheets;
		trace("setStyleRule ("+selector+ "," + styleName+", "+value+")");
		// find existing rule and set its value
		for (sheetIdx in 0...sheets.length) {
			var sheet = sheets[sheetIdx];
			if (sheet.cssRules != null){
				for (ruleIdx in 0...sheet.cssRules.length) {
					var rule = sheet.cssRules[ruleIdx];
					if (StringTools.indexOf(rule.cssText, selector)>=0) {
						trace("setStyleRule 5 FOUND "+Reflect.field(rule.style, styleName));
						Reflect.setField(rule.style, styleName, value);
						trace("setStyleRule 5 FOUND "+Reflect.field(rule.style, styleName));
						return rule;
					}
				}
			}
			else{
				throw("**Error** in chrome, this will work only with a web server and the http protocole, you can not open the HTML file directly ");
			}
		}
		// case when the class name does not exist, add it
		var css = Lib.document.createElement('style');
		css.setAttribute('type', 'text/css');

		var cssText = selector+" {"+styleName+":"+ value+"}";
		css.appendChild(Lib.document.createTextNode(cssText));

		Lib.document.getElementsByTagName("head")[0].appendChild(css);

		return css;
	}
*/
}

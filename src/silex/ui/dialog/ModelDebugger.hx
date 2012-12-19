package silex.ui.dialog;

import js.Lib;
import js.Dom;

import brix.component.ui.DisplayObject;
import brix.component.navigation.transition.TransitionData;
import brix.component.navigation.link.LinkToPage;
import brix.component.navigation.Page;
import brix.util.DomTools;

import silex.property.PropertyModel;
import silex.component.ComponentModel;
import silex.layer.LayerModel;
import silex.page.PageModel;
import silex.file.FileModel;

/**
 * This component displays a window with a list of files and let the user choose which one to use.
 * It has to be position on the foreground with the CSS styles of the DOM element with which it is associated. 
 * &gt;div class="OpenFileDialog"&lt;
 */
class ModelDebugger extends DialogBase
{
	/**
	 * Information for debugging, e.g. the class name
	 */ 
	public static inline var DEBUG_INFO = "ModelDebugger class";
	/**
	 * Constructor
	 * Define the callbacks
	 */
	public function new(rootElement:HtmlDom, BrixId:String){
		super(rootElement, BrixId, null, null, null, null);
		// listen to the model events
/*
		ComponentModel.getInstance().addEventListener(ComponentModel.ON_LIST_CHANGE, redraw, DEBUG_INFO);
		LayerModel.getInstance().addEventListener(LayerModel.ON_LIST_CHANGE, redraw, DEBUG_INFO);
		PageModel.getInstance().addEventListener(PageModel.ON_LIST_CHANGE, redraw, DEBUG_INFO);
		fileModel.getInstance().addEventListener(FileModel.ON_LOAD_SUCCESS, redraw, DEBUG_INFO);
		PropertyModel.getInstance().addEventListener(PropertyModel.ON_PROPERTY_CHANGE, redraw, DEBUG_INFO);
		PropertyModel.getInstance().addEventListener(PropertyModel.ON_STYLE_CHANGE, redraw, DEBUG_INFO);
*/
		(new haxe.Timer(200)).run = callback(redraw);
	}
	/**
	 * Display the model
	 */
	public function redraw(e:CustomEvent = null) {
		var htmlContainer = DomTools.getSingleElement(rootElement, "debug-html", true);
		var rawContainer = DomTools.getSingleElement(rootElement, "debug-raw", true);

		var htmlString = FileModel.getInstance().currentData.modelHtmlDom.innerHTML;

		htmlContainer.innerHTML = htmlString;

		var rawHtml = StringTools.htmlEscape(htmlString);
		rawHtml = StringTools.replace(rawHtml, "class=\"", "<b>class</b>=\"");
		rawHtml = StringTools.replace(rawHtml, "&lt;", "<br />&lt;");
		rawHtml = StringTools.replace(rawHtml, "&gt;", "&gt;<br />");
		rawHtml = StringTools.replace(rawHtml, "<br />
			<br />", "<br /><hr /><br />");
		rawContainer.innerHTML = rawHtml;
	}
}

package silex.ui.dialog;

import js.Lib;
import js.Dom;

import org.slplayer.component.ui.DisplayObject;
import org.slplayer.component.navigation.transition.TransitionData;
import org.slplayer.component.navigation.link.LinkToPage;
import org.slplayer.component.navigation.Page;
import org.slplayer.util.DomTools;

import silex.property.PropertyModel;
import silex.component.ComponentModel;
import silex.layer.LayerModel;
import silex.page.PageModel;
import silex.publication.PublicationModel;

/**
 * This component displays a window with a list of publications and let the user choose which one to use.
 * It has to be position on the foreground with the CSS styles of the DOM element with which it is associated. 
 * &gt;div class="OpenPublicationDialog"&lt;
 */
@tagNameFilter("div")
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
	public function new(rootElement:HtmlDom, SLPId:String){
		super(rootElement, SLPId, null, null, null, null);
		// listen to the model events
/*
		ComponentModel.getInstance().addEventListener(ComponentModel.ON_LIST_CHANGE, redraw, DEBUG_INFO);
		LayerModel.getInstance().addEventListener(LayerModel.ON_LIST_CHANGE, redraw, DEBUG_INFO);
		PageModel.getInstance().addEventListener(PageModel.ON_LIST_CHANGE, redraw, DEBUG_INFO);
		PublicationModel.getInstance().addEventListener(PublicationModel.ON_DATA, redraw, DEBUG_INFO);
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

		var htmlString = PublicationModel.getInstance().modelHtmlDom.innerHTML;

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

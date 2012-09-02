package silex.ui.toolbox;

import js.Lib;
import js.Dom;

/**
 * This component displays the properties of the selected component/layer/page.
 * 
 * It has to be position on the foreground with the CSS styles of the DOM element with which it is associated. 
 */
@tagNameFilter("div")
class PropertiesToolbox extends ToolboxBase 
{
	/**
	 * Constructor
	 * Start listening the input events
	 */
	public function new(rootElement:HtmlDom, SLPId:String)
	{
		super(rootElement, SLPId);
		
	}
}
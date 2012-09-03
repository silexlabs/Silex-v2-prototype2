package silex.ui.toolbox;

import js.Lib;
import js.Dom;

import org.slplayer.util.DomTools;

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
		// listen to the input event
//		rootElement.addEventListener("input", onInput, true);
	}
	/**
	 * callback for toolbox events
	 */
/*	public function onInput(e:Event) {
		// retrieve the node who triggered the event
		var target:HtmlDom = e.target;
		// handle the change event
		handleChange(target);
	}
	/**
	 * Handle toolbox events
	 */
/*	public function handleChange(target:HtmlDom) {
		trace("PropertiesToolbox - "+cast(target).value);
		switch(target.className){
			
		}
	}
	*/
}
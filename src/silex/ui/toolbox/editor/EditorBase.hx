package silex.ui.toolbox.editor;

import js.Lib;
import js.Dom;

import org.slplayer.component.ui.DisplayObject;

/**
 * This component is the base class for all editors in Silex. 
 * Editors are SLPlayer components, in charge of handling HTML input elements, 
 * in order to let the user enter values and edit css style values or tag attributes.
 * The name of the style or attribute is specifiyed as data-attribute-name or data-style-name
 * And the values are given as key/value pairs
 */
@tagNameFilter("fieldset div")
class EditorBase extends DisplayObject 
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
	 * apply the properties values
	 */
	private function saveAttribute(names:Array<String>, values:Array<String>) {
	}
	/**
	 * apply the properties values
	 */
/*	private function saveAttribute(names:Array<String>, values:Array<String>) {
	}
	/**
	 * load the properties values
	 */
/*	private function load(names:Array<String>, values:Array<String>) {
	}
/**/
}
package silex.ui.toolbox.editor;

import silex.property.PropertyModel;
import silex.component.ComponentModel;
import silex.layer.LayerModel;

import js.Lib;
import js.Dom;

import brix.component.ui.DisplayObject;
import brix.util.DomTools;

/**
 * Editor for padding styles. 
 * Editors are Brix components, in charge of handling HTML input elements, 
 * in order to let the user enter values and edit css style values or tag attributes.
 * todo: background alpha
 */
class PlacementStyleEditor extends BoxTypeEditorBase 
{
	/**
	 * Constructor
	 * store the prefix values 
	 */
	public function new(rootElement:HtmlDom, BrixId:String){
		super(rootElement, BrixId, "positioning_placement", "", "top", "left", "right", "bottom");
	}
}
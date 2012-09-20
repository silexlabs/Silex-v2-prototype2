package silex.ui.toolbox.editor;

import silex.property.PropertyModel;
import silex.component.ComponentModel;
import silex.layer.LayerModel;

import js.Lib;
import js.Dom;

import org.slplayer.component.ui.DisplayObject;
import org.slplayer.util.DomTools;

/**
 * Editor for padding styles. 
 * Editors are SLPlayer components, in charge of handling HTML input elements, 
 * in order to let the user enter values and edit css style values or tag attributes.
 * todo: background alpha
 */
@tagNameFilter("fieldset div")
class PlacementStyleEditor extends BoxTypeEditorBase 
{
	/**
	 * Constructor
	 * store the prefix values 
	 */
	public function new(rootElement:HtmlDom, SLPId:String){
		super(rootElement, SLPId, "positioning_placement", "", "top", "left", "right", "bottom");
	}
}
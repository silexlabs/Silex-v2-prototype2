package silex.ui.toolbox.editor;

import silex.property.PropertyModel;
import silex.component.ComponentModel;
import silex.layer.LayerModel;

import js.Lib;
import js.Dom;

import brix.component.ui.DisplayObject;
import brix.util.DomTools;

/**
 * Editor for box styles. 
 * Editors are Brix components, in charge of handling HTML input elements, 
 * in order to let the user enter values and edit css style values or tag attributes.
 * todo: background alpha
 */
class BorderWidthEditor extends BorderRadiusEditor {
	/**
	 * Constructor
	 * store the prefix values 
	 */
	public function new(rootElement:HtmlDom, BrixId:String, prefix:String="border", stylePrefix:String="border", topStyleSufix:String="TopWidth", leftStyleSufix:String="LeftWidth", rightStyleSufix:String="RightWidth", bottomStyleSufix:String="BottomWidth"){
		super(rootElement, BrixId, prefix, stylePrefix, topStyleSufix, leftStyleSufix, rightStyleSufix, bottomStyleSufix);
	}
}
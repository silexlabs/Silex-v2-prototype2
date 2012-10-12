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
class BorderRadiusEditor extends BoxTypeEditorBase {
	/**
	 * class name for the "apply to all" buttons
	 * when clicked, it will apply the first value to all fields, i.e. top, left, bottom and right
	 */ 
	public static inline var APPLY_ALL_CLASS_NAME:String = "apply_to_all";
	/**
	 * Constructor
	 * store the prefix values 
	 */
	public function new(rootElement:HtmlDom, BrixId:String, prefix:String="border", stylePrefix:String="border", topStyleSufix:String="TopLeftRadius", leftStyleSufix:String="TopRightRadius", rightStyleSufix:String="BottomRightRadius", bottomStyleSufix:String="BottomLeftRadius"){
		super(rootElement, BrixId, prefix, stylePrefix, topStyleSufix, leftStyleSufix, rightStyleSufix, bottomStyleSufix);
	}
	/**
	 * callback for the click event, check if a dialog must be opened
	 */
	override private function onClick(e:Event) {
		super.onClick(e);

		if (DomTools.hasClass(e.target, APPLY_ALL_CLASS_NAME)){
			// prevent default button behaviour
			e.preventDefault();
			// apply the first value to all fields
			var value:String = getInputValue("border_top");
			setInputValue("border_left", value);
			setInputValue("border_bottom", value);
			setInputValue("border_right", value);
			var value:String = getInputValue("border_top_unit");
			setInputValue("border_left_unit", value);
			setInputValue("border_bottom_unit", value);
			setInputValue("border_right_unit", value);
			apply();
		}
	}

}
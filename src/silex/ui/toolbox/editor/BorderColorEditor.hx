package silex.ui.toolbox.editor;

import silex.property.PropertyModel;
import silex.component.ComponentModel;
import silex.layer.LayerModel;

import silex.ui.toolbox.editor.BorderEditorBase;

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
class BorderColorEditor extends BorderEditorBase {
	/**
	 * virtual method to be implemented in derived classes
	 * retrieve the value being edited
	 */
	override private function getPropVal(element:HtmlDom, side:Side):String{
		switch (side){
			case top:
				return element.style.borderTopColor;
			case left:
				return element.style.borderLeftColor;
			case bottom:
				return element.style.borderBottomColor;
			case right:
				return element.style.borderRightColor;
		}
		return null;
	}
	/**
	 * virtual method to be implemented in derived classes
	 * retrieve the name of the property being edited
	 */
	override private function getPropName(side:Side):String{
		switch (side){
			case top:
				return "borderTopColor";
			case left:
				return "borderLeftColor";
			case bottom:
				return "borderBottomColor";
			case right:
				return "borderRightColor";
		}
		return null;
	}
}
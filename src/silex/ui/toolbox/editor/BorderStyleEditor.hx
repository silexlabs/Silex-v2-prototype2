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
class BorderStyleEditor extends BorderEditorBase {
	/**
	 * virtual method to be implemented in derived classes
	 * retrieve the value being edited
	 */
	override private function getPropVal(element:HtmlDom, side:Side):String{
		switch (side){
			case top:
				return element.style.borderTopStyle;
			case left:
				return element.style.borderLeftStyle;
			case bottom:
				return element.style.borderBottomStyle;
			case right:
				return element.style.borderRightStyle;
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
				return "borderTopStyle";
			case left:
				return "borderLeftStyle";
			case bottom:
				return "borderBottomStyle";
			case right:
				return "borderRightStyle";
		}
		return null;
	}
}
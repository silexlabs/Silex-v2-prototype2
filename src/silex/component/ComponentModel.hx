package silex.component;

import js.Lib;
import js.Dom;

import silex.ModelBase;
import silex.property.PropertyModel;


/**
 * Manipulation of components, selection etc. 
 * This class is a singleton and it can be used on the client side (may be used on the server side with cocktail).
 * The models in Silex are used only when editing, not when viewing a publication.
 */
class ComponentModel extends ModelBase<HtmlDom>{
	////////////////////////////////////////////////
	// Singleton implementation
	////////////////////////////////////////////////
	/**
	 * implement the singleton pattern
	 */
	static private var instance:ComponentModel;
	/**
	 * implement the singleton pattern
	 */
	static public function getInstance():ComponentModel {
	 	if (instance == null){
	 		instance = new ComponentModel();
	 	}
	 	return instance;
	}
	////////////////////////////////////////////////
	// Selection
	////////////////////////////////////////////////
	/**
	 * event dispatched when selection changes
	 */
	public static inline var ON_SELECTION_CHANGE:String = "onComponentSelectionChange";
	/**
	 * event dispatched when hover changes
	 * hover is like a pre-selection visualization
	 */
	public static inline var ON_HOVER_CHANGE:String = "onComponentHoverChange";
	/**
	 * Models are singletons
	 * Constructor is private
	 */
	private function new(){
		super(ON_HOVER_CHANGE, ON_SELECTION_CHANGE);
	}
	/**
	 * Setter for the selected item
	 * Reset the selection
	 */
	override public function setSelectedItem(item:HtmlDom):HtmlDom {
		super.setSelectedItem(item);
		// reset model selection
		var model = PropertyModel.getInstance();
		model.selectedItem = null;
		model.hoveredItem = null;
		return item;
	}
}
package silex.layer;

import js.Lib;
import js.Dom;

import silex.ModelBase;
import silex.component.ComponentModel;

import org.slplayer.component.navigation.Layer;

/**
 * Manipulation of layers, remove, add, etc. 
 * This class is a singleton and it can be used on the client side (may be used on the server side with cocktail).
 * The models in Silex are used only when editing, not when viewing a publication.
 */
class LayerModel extends ModelBase<Layer>{
	////////////////////////////////////////////////
	// Singleton implementation
	////////////////////////////////////////////////
	/**
	 * implement the singleton pattern
	 */
	static private var instance:LayerModel;
	/**
	 * implement the singleton pattern
	 */
	static public function getInstance():LayerModel {
	 	if (instance == null){
	 		instance = new LayerModel();
	 	}
	 	return instance;
	}
	////////////////////////////////////////////////
	// Selection
	////////////////////////////////////////////////
	/**
	 * Information for debugging, e.g. the class name
	 */ 
	public static inline var DEBUG_INFO:String = "LayerModel class";
	/**
	 * event dispatched when selection changes
	 */
	public static inline var ON_SELECTION_CHANGE:String = "onLayerSelectionChange";
	/**
	 * event dispatched when hover changes
	 * hover is like a pre-selection visualization
	 */
	public static inline var ON_HOVER_CHANGE:String = "onLayerHoverChange";
	/**
	 * Models are singletons
	 * Constructor is private
	 */
	private function new(){
		super(ON_HOVER_CHANGE, ON_SELECTION_CHANGE, DEBUG_INFO);
	}
	/**
	 * Setter for the selected item
	 * Reset the selection
	 */
	override public function setSelectedItem(item:Layer):Layer {
		super.setSelectedItem(item);
		// reset model selection
		var model = ComponentModel.getInstance();
		model.selectedItem = null;
		model.hoveredItem = null;
		return item;
	}
}

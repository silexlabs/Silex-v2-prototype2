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
	 * Name of the attribute for the component id
	 * The component id is used only when editing a Silex publication, and it is not saved in the HTML file
	 * It is used to ease the synch between the view and the model, i.e. the publication DOM which is displayed by the browser and the one which is stored by Silex
	 */ 
	public static inline var COMPONENT_ID_ATTRIBUTE_NAME = "data-silex-component-id";
	/**
	 * Information for debugging, e.g. the class name
	 */ 
	public static inline var DEBUG_INFO = "ComponentModel class";
	/**
	 * event dispatched when selection changes
	 */
	public static inline var ON_SELECTION_CHANGE = "onComponentSelectionChange";
	/**
	 * event dispatched when hover changes
	 * hover is like a pre-selection visualization
	 */
	public static inline var ON_HOVER_CHANGE = "onComponentHoverChange";
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
	override public function setSelectedItem(item:HtmlDom):HtmlDom {
		// reset model selection
		// Todo: onSlectionChange event could be dispatched when the property editor has the focus
		/* var model = PropertyModel.getInstance();
		   model.selectedItem = null;
		   model.hoveredItem = null;
		*/
		return super.setSelectedItem(item);
	}
}
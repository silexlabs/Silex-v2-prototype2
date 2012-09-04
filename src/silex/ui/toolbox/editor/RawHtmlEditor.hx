package silex.ui.toolbox.editor;

import silex.property.PropertyModel;
import silex.component.ComponentModel;
import silex.layer.LayerModel;

import js.Lib;
import js.Dom;

import org.slplayer.component.ui.DisplayObject;
import org.slplayer.util.DomTools;

/**
 * Editor for raw HTML input. data-attribute-name is not used since it is always used to edit the innerHTML attribute
 * Editors are SLPlayer components, in charge of handling HTML input elements, 
 * in order to let the user enter values and edit css style values or tag attributes.
 * The name of the style or attribute is specifiyed as data-attribute-name or data-style-name
 * And the values are given as key/value pairs
 */
@tagNameFilter("fieldset div")
class RawHtmlEditor extends EditorBase 
{
	/**
	 * The css class name of the button used to submit the form
	 */
	public static inline var SUBMIT_BUTTON_CLASS_NAME = "validate-button";
	/**
	 * The css class name of the text area or text input used to input data
	 */
	public static inline var TEXT_INPUT_CLASS_NAME = "text-input";
	/**
	 * The attribute name, which the editor modify
	 */
	public static inline var ATTRIBUTE_NAME = "innerHTML";
	/**
	 * Information for debugging, e.g. the class name
	 */ 
	public static inline var DEBUG_INFO:String = "silex.ui.toolbox.editor.RawHtmlEditor class";
	/**
	 * selected element
	 */ 
	public var selectedItem(default, setSelectedItem):HtmlDom;

	/**
	 * Constructor
	 * Start listening the input events
	 */
	public function new(rootElement:HtmlDom, SLPId:String)
	{
		super(rootElement, SLPId);
		// listen to the validation event
		var okButton = DomTools.getSingleElement(rootElement, SUBMIT_BUTTON_CLASS_NAME, true);
		okButton.onclick = onClick;
		// listen to the property change event
		PropertyModel.getInstance().addEventListener(PropertyModel.ON_PROPERTY_CHANGE, onPropertyChange, DEBUG_INFO);
		// listen to the component change event
		ComponentModel.getInstance().addEventListener(ComponentModel.ON_SELECTION_CHANGE, onSelectComponent, DEBUG_INFO);
		// listen to the component change event
		LayerModel.getInstance().addEventListener(LayerModel.ON_SELECTION_CHANGE, onSelectLayer, DEBUG_INFO);
	}
	/**
	 * Setter for the selected item
	 * Dispatch the change event with the item reference as the detail property of the custom event
	 */
	public function setSelectedItem(item:HtmlDom):HtmlDom {
		selectedItem = item;
		if (selectedItem == null)
			load("");
		else
			load(PropertyModel.getInstance().getProperty(selectedItem, ATTRIBUTE_NAME));

		return selectedItem;
	}
	/**
	 * callback for the click event, validate the data
	 */
	private function onClick(e:Event) {
		e.preventDefault();
		var textArea = DomTools.getSingleElement(rootElement, TEXT_INPUT_CLASS_NAME, true);
		var value:String = cast(textArea).value;
		save(value);
	}
	private var propertyChangePending:Bool = false;
	/**
	 * apply the property value
	 */
	private function save(value) {
		propertyChangePending = true;
		PropertyModel.getInstance().setProperty(selectedItem, ATTRIBUTE_NAME, value);
		propertyChangePending = false;
	}
	/**
	 * Callback for the component model event
	 * display the component raw html
	 */
	private function onSelectComponent(e:CustomEvent) {
		trace("RawHtmlEditor - display the component raw html");
		selectedItem = e.detail;
	}
	/**
	 * Callback for the layer model event
	 * display the layer raw html
	 */
	private function onSelectLayer(e:CustomEvent) {
		trace("RawHtmlEditor - display the layer raw html");
		if (e.detail == null){
			selectedItem = null;
		}
		else{
			selectedItem = e.detail.rootElement;
		}
	}
	/**
	 * Callback for the PropertyModel singleton
	 * A property value has changed,
	 * display the new value if it corresponds to the property watched by this editor
	 * @param 	e 	CustomEvent with the PropertyData object in e.detail
	 */
	private function onPropertyChange(e:CustomEvent) {
		if (propertyChangePending)
			return;

		if (e.detail.name == ATTRIBUTE_NAME){
			var textArea = DomTools.getSingleElement(rootElement, TEXT_INPUT_CLASS_NAME, true);
			load(e.detail.value);
		}
	}
	/**
	 * display the property value
	 */
	private function load(value:String) {
		var textArea = DomTools.getSingleElement(rootElement, TEXT_INPUT_CLASS_NAME, true);
		cast(textArea).value = value;
	}
}
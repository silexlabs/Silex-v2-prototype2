package silex.ui.stage;

import js.Lib;
import js.Dom;

import brix.util.DomTools;
import brix.component.navigation.Layer;
import brix.component.interaction.Draggable;
import silex.layer.LayerModel;
import silex.page.PageModel;
import silex.publication.PublicationModel;
import silex.component.ComponentModel;
import silex.interpreter.Interpreter;

/**
 * Selection markers are selection rectangles put over the selection, 
 * i.e. on top of the selected layer or component on the stage
 * This class uses from draggable and adds the behavior of moving the layers and components.
 * use attribute like rthis: data-dropzones-class-name="Layer" data-dropzones-class-name="silex-view"
 * use with Draggable on the same node
 */
@tagNameFilter("DIV")
class SelectionDropHandler extends DropHandlerBase{
	/**
	 * class name expected for the add page button
	 */
	public static inline var DELETE_BUTTON_CLASS_NAME:String = "selection-marker-delete";
	/**
	 * class name expected for the display zone, i.e. a div which contains a template to display selection info
	 */
	public static inline var DISPLAY_ZONE_CLASS_NAME:String = "selection-marker-name";
	/**
	 * minimum size for the component or layer, 
	 * under this size, I will not display the trash and display zone
	 */
	public static inline var MIN_WIDTH_FOR_DISPLAY_ZONE:Int = 50;
	/**
	 * minimum size for the component or layer, 
	 * under this size, I will not display the trash and display zone
	 */
	public static inline var MIN_HEIGHT_FOR_DISPLAY_ZONE:Int = 25;
	/**
	 * selected component
	 * store a component while dragging
	 */ 
	private static var draggedComponent:HtmlDom;
	/**
	 * selected layer
	 * store a layer while dragging
	 */ 
	private static var draggedLayer:Layer;
	/**
	 * store the template for the display zone
	 */ 
	private var displayZoneTemplate:String;
	/**
	 * store the reference to the display zone
	 */ 
	private var displayZone:HtmlDom;
	/**
	 * store the reference to the trash can icon
	 */ 
	private var delBtn:HtmlDom;
	/**
	 * constructor
	 * listen to the Draggable class events
	 */
	public function new(rootElement:HtmlDom, BrixId:String){
		super(rootElement, BrixId);
		delBtn = DomTools.getSingleElement(rootElement, DELETE_BUTTON_CLASS_NAME, true);
		delBtn.addEventListener("click", onClick, false);
		
		rootElement.addEventListener(SelectionController.REDRAW_MARKER_EVENT, cast(redraw), false);

		// store the template for the display zone
		displayZone = DomTools.getSingleElement(rootElement, DISPLAY_ZONE_CLASS_NAME, false);
		if (displayZone != null){
			displayZoneTemplate = displayZone.innerHTML;
		}
	}
	/**
	 * callback called when the marker is moved on a new component
	 */
	private function redraw(e:CustomEvent) {
		// update the name of the component
		if (displayZoneTemplate != null && displayZone != null){
			if (rootElement.clientWidth > MIN_WIDTH_FOR_DISPLAY_ZONE && rootElement.clientHeight > MIN_HEIGHT_FOR_DISPLAY_ZONE ){
				try{
					// the component is big enough to display the display zone
					displayZone.style.display = "block";
					delBtn.style.display = "block";
					// resolve the template
			        var t = new haxe.Template(displayZoneTemplate);
			        var context = {
			        		layerName: null,
			        		componentName: null,
			        	};
					if (LayerModel.getInstance().selectedItem != null)
						context.layerName = LayerModel.getInstance().selectedItem.rootElement.getAttribute("data-silex-name");
					else if (ComponentModel.getInstance().selectedItem != null )
						context.layerName = ComponentModel.getInstance().selectedItem.parentNode.getAttribute("data-silex-name");
					if (ComponentModel.getInstance().selectedItem != null )
						context.componentName = ComponentModel.getInstance().selectedItem.getAttribute("data-silex-name");
			        
			        var output = t.execute(context);
		
					// display the content
					displayZone.innerHTML = output;

				}catch(e:Dynamic){
					throw("Error while executing the template of the marker. The error: "+e);
				}
			}
			else{
				// the component is too small to display the display zone
				displayZone.style.display = "none";
				delBtn.style.display = "none";
			}
		}
	}
	/**
	 * check if the user clicked on a UI of the marker
	 */
	private function onClick(e:Event) {
		// delete layer or component
		if (DomTools.hasClass(e.target, DELETE_BUTTON_CLASS_NAME)){
			e.preventDefault();
			deleteSelection();
		}
	}
	/**
	 * delete selection
	 */
	private function deleteSelection() {
		var component = ComponentModel.getInstance().selectedItem;
		if (component == null){
			// case of a layer
			var layer = LayerModel.getInstance().selectedItem;
			var page = PageModel.getInstance().selectedItem;
			var name:String = layer.rootElement.getAttribute("data-silex-name");
			if (name == null) name = "";
			var confirm = Lib.window.confirm("I am about to delete the container "+name+". Are you sure?");
			if (confirm == true)
				LayerModel.getInstance().removeLayer(layer, page.name);
		}
		else{
			var name:String = component.getAttribute("data-silex-name");
			if (name == null) name = "";
			var confirm = Lib.window.confirm("I am about to delete the component "+name+". Are you sure?");
			if (confirm == true)
				ComponentModel.getInstance().removeComponent(component);
		}
	}
	/**
	 * virtual method to be implemented in derived classes
	 */
	override private function setDraggedElement(draggableEvent:DraggableEvent) {
		// check that we have finished dragging any other element
		if (draggedComponent != null || draggedLayer != null){
			throw ("Error: could not start dragging this component or layer, another layer is still being dragged");
		}
		// remove the element from the DOM
		if(ComponentModel.getInstance().selectedItem != null){
			// case of a component
			// store the component and its parent and index
			draggedComponent = ComponentModel.getInstance().selectedItem;
			// change the style of the phantom to reflect the element style
			//draggableEvent.draggable.initPhantomStyle(draggedComponent);
		}
		else if(LayerModel.getInstance().selectedItem != null){
			// case of a layer
			// store the component 
			draggedLayer = LayerModel.getInstance().selectedItem;
			// change the style of the phantom to reflect the element style
			//draggableEvent.draggable.initPhantomStyle(draggedLayer.rootElement);
		}
	}
	/**
	 * virtual method to be implemented in derived classes
	 */
	override private function getDraggedElement(draggableEvent:DraggableEvent):HtmlDom {
		// get what's to drop
		if (draggedComponent != null){
			// case of a component
			return draggedComponent;
		}
		else if (draggedLayer != null){
			// case of a layer
			return draggedLayer.rootElement;
		}
		else{
			throw("No component nor layer being dragged");
		}
	}
	/**
	 * Handle Draggable events
	 */
	override public function onDrop(e:Event) {
		super.onDrop(e);

		// refresh the builder display
		if (draggedComponent != null){
			// case of a component
			DomTools.doLater(ComponentModel.getInstance().refresh);
		}
		else if (draggedLayer != null){
			// case of a layer
			DomTools.doLater(LayerModel.getInstance().refresh);
		}
		// **
		// reset state
		draggedComponent = null;
		draggedLayer = null;
	}
}

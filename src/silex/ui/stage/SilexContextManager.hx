package silex.ui.stage;

import brix.component.navigation.ContextManager;
import brix.util.DomTools;

import silex.file.FileModel;
import silex.layer.LayerModel;
import silex.component.ComponentModel;

import js.Dom;
import js.Lib;


/**
 * The ContextManager component is a component that is in charge to show/hide Layer components when they are in/out of context
 * It takes the parameters data-context-list and data-initial-context in the associated node 
 * It has an invalidation mechanism
 * Note: I removed invalidation system, it is not required anymore since I changed the ContextManager to use styles instead of layers
 * @example <div class="ContextManager" data-context-list="context1, context2, context3" data-initial-context="context1, context2" />
 */
class SilexContextManager extends ContextManager
{
	/**
	 * Information for debugging, e.g. the class name
	 */ 
	public static inline var DEBUG_INFO:String = "silex.ui.stage.SilexContextManager";
	/**
	 * names of the contexts, set according to the type of the selected component or layer
	 * used to interact with the context manager
	 */
	public static inline var VIDEO_CONTEXT = "context-video";
	public static inline var AUDIO_CONTEXT = "context-audio";
	public static inline var IMG_CONTEXT = "context-img";
	public static inline var LAYER_CONTEXT = "context-layer";
	public static inline var DIV_CONTEXT = "context-div";
	/**
	 * contexts list
	 */
	public static inline var ALL_CONTEXTS = [VIDEO_CONTEXT, AUDIO_CONTEXT, IMG_CONTEXT, LAYER_CONTEXT, DIV_CONTEXT];
	/** 
	 * constructor, add listeners
	 */
	public function new(rootElement:HtmlDom, brixId:String)
	{
		super(rootElement, brixId);
		// listen to the component change event
		ComponentModel.getInstance().addEventListener(ComponentModel.ON_SELECTION_CHANGE, onSelectComponent, DEBUG_INFO);
		// listen to the component change event
		LayerModel.getInstance().addEventListener(LayerModel.ON_SELECTION_CHANGE, onSelectLayer, DEBUG_INFO);
	}
	/**
	 * Callback for the component model event
	 * display the component context
	 */
	private function onSelectComponent(e:CustomEvent) {
		for (contextValue in ALL_CONTEXTS)
			removeContext(contextValue);

		var item = ComponentModel.getInstance().selectedItem;
		if (item != null){
			// update context according to the new selection
			switch (item.nodeName.toLowerCase()) {
				case "audio":
					addContext(AUDIO_CONTEXT);
				case "video":
					addContext(VIDEO_CONTEXT);
				case "img":
					addContext(IMG_CONTEXT);
				case "div":
					addContext(DIV_CONTEXT);
			}
		}
	}
	/**
	 * Callback for the layer model event
	 * display the layer context
	 */
	private function onSelectLayer(e:CustomEvent) {
		if (LayerModel.getInstance().selectedItem == null){
			removeContext(LAYER_CONTEXT);
		}
		else{
			addContext(LAYER_CONTEXT);
		}
	}
}
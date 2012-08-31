package org.silex.component.stage;

import js.Dom;
import js.Lib;

import org.silex.publication.PublicationModel;
import org.silex.publication.PublicationData;
import org.slplayer.component.navigation.transition.TransitionData;

import org.slplayer.util.DomTools;

import org.slplayer.component.ui.DisplayObject;

/**
 * This class is in charge of attaching the publication to the DOM.
 */
class Stage extends DisplayObject{
	/**
	 * name for the builder mode of the Silex editor
	 */
	public static inline var BUILDER_MODE_PAGE_NAME = "builder-mode";
	/**
	 * publication model
	 */
	public static var publicationModel:PublicationModel;

	/**
	 * Constructor
	 * Define the callbacks
	 */
	public function new(rootElement:HtmlDom, SLPId:String){
		super(rootElement, SLPId);

		// store a reference to the model
		publicationModel = PublicationModel.getInstance();

		// update the data when the publication data changed
		publicationModel.addEventListener(PublicationModel.ON_DATA, onPublicationData);
		publicationModel.addEventListener(PublicationModel.ON_CHANGE, onPublicationChange);
	}
	/**
	 * Callback for the event, dispatched when a new publication is about to be loaded
	 */
	public function onPublicationChange(event:CustomEvent){
		rootElement.innerHTML = "";
	}
	/**
	 * Callback for the event, dispatched when a new publication is loaded
	 * Attach the publication view, i.e. add the duplicated DOM to the browser DOM.
	 */
	public function onPublicationData(event:CustomEvent){
		// display the publication for editing
		rootElement.innerHTML = "";
		rootElement.appendChild(publicationModel.view);
	}
}
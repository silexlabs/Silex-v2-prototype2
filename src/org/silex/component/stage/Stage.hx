package org.silex.component.stage;

import js.Dom;
import js.Lib;

import org.silex.interpreter.Interpreter;
import org.silex.publication.PublicationModel;
import org.silex.publication.PublicationData;
import org.slplayer.component.navigation.transition.TransitionData;
import org.slplayer.component.navigation.Page;

import org.slplayer.util.DomTools;

import org.slplayer.core.Application;
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
	 * Duplicate the loaded DOM
	 * Initialize the SLPlayer for the view
	 * Attach the publication view, i.e. add the duplicated DOM to the browser DOM.
	 */
	public function onPublicationData(event:CustomEvent){
		// Duplicate DOM
		var body = publicationModel.body.cloneNode(true);

		// Add the CSS in the body tag rather than head tag, because the later is not really added to the browser dom
		DomTools.addCssRules(publicationModel.currentData.css, body);

		// display the publication for editing
		rootElement.innerHTML = "";
		rootElement.appendChild(body);

		// create an SLPlayer app
		var application = Application.createApplication();

		// init SLPlayer
		application.init(rootElement);

		// initial page
		var initialPageName = DomTools.getMeta(Page.CONFIG_INITIAL_PAGE_NAME, null, publicationModel.head);
		if (initialPageName != null){
			Page.openPage(initialPageName, true, null, application.id);
		}
		else{
			trace("Warning: no initial page found");
		}

		// execute debug actions
		#if silexDebug
		// execute an action when needed for debug (publication and server config)
		if (publicationModel.currentConfig.debugModeAction != null){
			var context = new Hash();
			context.set("slpid", application.id);
			trace("slpid = "+ application.id);
			var res = Interpreter.exec(publicationModel.currentConfig.debugModeAction, context);
		}
		#end
	}
}
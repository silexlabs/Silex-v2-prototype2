package org.silex.builder;

import js.Dom;
import js.Lib;

import org.silex.publication.PublicationService;
import org.silex.publication.PublicationData;
import org.slplayer.util.DomTools;

/**
 * This class is in charge of loading and saving the publications.
 * It also has all the methods to manipulate the loaded publication DOM
 */
class Builder {
	/**
	 * name for the builder mode of the Silex editor
	 */
	public static inline var BUILDER_MODE_PAGE_NAME = "builder-mode";
	/**
	 * publication DOM used as the model
	 */
	public static var publicationModel:HtmlDom;
	/**
	 * publication DOM used as the view
	 * it is attached to the browser dom
	 */
	public static var publicationView:HtmlDom;
	/**
	 * currently loaded publication config
	 */
	public static var configData:PublicationConfigData;
	/**
	 * currently loaded publication name
	 */
	public static var publicationName:String;

	/**
	 * load a publication
	 */
	public static function loadPublication(name:String, configData:PublicationConfigData){
		trace("loading publication "+name);
		var publicationService = new PublicationService();
		publicationName = name;
		publicationService.getPublicationData(name, onLoad, onError);
	}
	/**
	 * the publication is loaded
	 * duplicate the loaded dom and store the model and the view
	 * initialize the SLPlayer for the view
	 */
	public static function onLoad(data:PublicationData){
		publicationModel = Lib.document.createElement("div");
		publicationModel.innerHTML = data.html;
		trace(data.html);
		trace(publicationModel.innerHTML);
		DomTools.addCssRules(data.html, publicationModel);
		publicationView = publicationModel.cloneNode(true);
	}
	/**
	 * publication loading went wrong
	 */
	public static function onError(msg:String){
		throw("not implemented: notify the user");
	}
}
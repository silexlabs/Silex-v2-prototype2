package org.silex.builder;

import js.Dom;
import js.Lib;
import haxe.xml.Fast;

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
	public static var publicationModel:{body:HtmlDom, head:HtmlDom};
	/**
	 * publication DOM used as the view
	 * it is attached to the browser dom
	 */
	public static var publicationView:{body:HtmlDom, head:HtmlDom};
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
		publicationModel = {
			body:Lib.document.createElement("div"),
			head: Lib.document.createElement("div")
		}
		trace("parsing data "+data.html);
		var xml = new Fast(Xml.parse(data.html).firstChild());

		trace("Convert to DOM "+xml.hasNode.head+" - "+xml.hasNode.body);
		if (xml.hasNode.body)
			publicationModel.body.innerHTML = xml.node.body.innerHTML;
		else if (xml.hasNode.BODY)
			publicationModel.body.innerHTML = xml.node.BODY.innerHTML;
		if (xml.hasNode.head)
			publicationModel.head.innerHTML = xml.node.head.innerHTML;
		else if (xml.hasNode.HEAD)
			publicationModel.head.innerHTML = xml.node.HEAD.innerHTML;

		trace("Duplicate DOM "+publicationModel.body);
		publicationView = {
			body: publicationModel.body.cloneNode(true),
			head: publicationModel.head.cloneNode(true)
		}
		trace(publicationView.head.innerHTML);
		DomTools.addCssRules(data.css, publicationView.head);
		trace(publicationView.head.innerHTML);
	}
	/**
	 * publication loading went wrong
	 */
	public static function onError(msg:String){
		throw("not implemented: notify the user");
	}
}
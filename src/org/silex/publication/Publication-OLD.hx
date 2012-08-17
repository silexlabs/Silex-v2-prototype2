NOT USED


package org.silex.publication;

import js.Lib;
import js.Dom;

/**
 * This class represents the highest level container for Silex visual elements. A publication is an HTML file on the server.
 * Note that Publication::document is the model of the publication, whereas the browser DOM is the view. So the browser DOM is an interpreted version / a render, of Publication::document.
 */
class Publication {
	/**
	 * name of the publication
	 */
	public var publicationName:String;
	/**
	 * folder where publications are stored
	 */
	public var publicationFolder:String;
	/**
	 * raw HTML DOM for this publication
	 */
	public var document:Document;

	/**
	 * Constructor
	 */
	public function new(publicationName:String, publicationFolder:String = DEFAULT_PUBLICATION_FOLDER){
		this.publicationName = publicationName;
		this.publicationFolder = publicationFolder;
		this.document = loadDocument();
	}
	/**
	 * Load the publication raw HTML and build its DOM
	 * @return the generated Document object of the publication
	 * TODO: handle the case where the publication does not exist
	 */
	private function loadDocument():Null<Document> {
		var html = new PublicationService().getRawHtml(publicationName, publicationFolder);

		var document = new Document();
		document.innerHTML = html;

		return document;
	}
}
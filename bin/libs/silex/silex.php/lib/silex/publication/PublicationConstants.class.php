<?php

class silex_publication_PublicationConstants {
	public function __construct(){}
	static $PUBLICATION_HTML_FILE = "index.html";
	static $PUBLICATION_CSS_FILE = "app.css";
	static $PUBLICATION_ASSETS_FOLDER = "assets/";
	static $PUBLICATION_CONFIG_FOLDER = "conf/";
	static $PUBLICATION_CONFIG_FILE = "config.xml.php";
	static $PUBLICATION_FOLDER = "publications/";
	static $BUILDER_PUBLICATION_NAME = "admin";
	static $CREATION_TEMPLATE_PUBLICATION_NAME = "creation-template";
	function __toString() { return 'silex.publication.PublicationConstants'; }
}

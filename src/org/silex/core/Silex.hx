package org.silex.core;

import js.Lib;
import js.Dom;

import org.slplayer.core.Application;

/**
 * Entry point for Silex applications
 */
class Silex {
	/**
	 * Entry point for Silex applications
	 * Load Silex config
	 * Load HTML and site config
	 * Init plugins
	 * Init SLPayer
	 * Init Silex pages
	 * Open the default page or the page designated by the deeplink
	 */
	static public function main() {
		trace("Silex starting");
		
		Application.init();
	}
}

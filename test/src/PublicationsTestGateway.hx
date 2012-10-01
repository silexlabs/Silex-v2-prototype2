package ;

//////////////////////////////////////////////////
// Imports
//////////////////////////////////////////////////

import silex.publication.PublicationService;

import php.Web;
import haxe.remoting.HttpConnection;

import silex.ServiceBase;

class PublicationsTestGateway {

	static public function main() {
		PublicationService.PUBLICATION_FOLDER = "../publications-test/";

		// create the services (which are then exposed)
		var publicationService = new PublicationService();

	    // handle remoting, this entry point can be a gateway 
		if( HttpConnection.handleRequest(ServiceBase.context) )
		  return;

		php.Lib.print("This is a haxe remoting gateway. Go to the <a href='../publications-test/'>tests here</a>!");

		// redirect to the builder
//		Web.setHeader("Location", "../publications-test/");

	}
}
package silex;

#if silexClientSide
import haxe.remoting.HttpAsyncConnection;
import brix.util.DomTools;
import silex.Silex;
#end
import haxe.remoting.Context;
/**
 * Base class for all services.
 * Note on Silex architecture:
 * Code on the server side is made of service classes, with a name like *Service. 
 * These classes have client side implementation which are classes with the same name in charge of handling remoting, authentication when needed, 
 * and which handle the case of the client and server being compiled into a single native application.
 */
class ServiceBase{
	/**
	 * The service name, as exposed to Haxe remoting
	 */
	public var serviceName:String;

#if silexClientSide
	/**
	 * Default Silex server URL
	 */
	public static var GATEWAY_URL:String = "../";
	/**
	 * Constructor
	 * Store the gateway URL
	 */
	public function new(serviceName:String){
		// store the service name
		this.serviceName = serviceName;
	}
	/**
	 * Make a remoting call
	 */
	public function callServerMethod(methodName:String, args:Array<Dynamic>, onResult:Dynamic, onError:String->Void=null) {
		// init connection to the server
		var connection = HttpAsyncConnection.urlConnect(Silex.initialBaseUrl+GATEWAY_URL);
		// add error handler
		connection.setErrorHandler(onError);

		// make the call
		connection.resolve(serviceName).resolve(methodName).call(args, onResult);
	}

#end

#if silexServerSide
	/**
	 * Remoting context
	 * Each service adds itself to this context, see the constructor
	 */
	public static var context:Context = new Context();
	/**
	 * Constructor
	 * Adds itself to the context, expose the public methods
	 */
	public function new(serviceName:String){
		//trace("EXPOSE " + serviceName);
		// store the service name
		this.serviceName = serviceName;
		// share the service
		context.addObject(serviceName, this);
	}
#end
}

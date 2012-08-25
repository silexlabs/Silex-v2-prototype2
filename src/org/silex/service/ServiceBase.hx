package org.silex.service;

#if silexClientSide
import haxe.remoting.HttpAsyncConnection;
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
	public static inline var DEFAULT_GATEWAY_URL:String = "./";//"libs/silex/silex.php/";
	/**
	 * Connection to the gateway (Haxe remoting)
	 */
	public var connection:HttpAsyncConnection;
	/**
	 * Constructor
	 * Store the gateway URL
	 */
	public function new(serviceName:String, gatewayUrl:String = DEFAULT_GATEWAY_URL){
		// store the service name
		this.serviceName = serviceName;
		// init connection to the server
		connection = HttpAsyncConnection.urlConnect(gatewayUrl);
	}
	/**
	 * Make a remoting call
	 */
	public function callServerMethod(methodName:String, args:Array<Dynamic>, onResult:Dynamic, onError:String->Void=null) {
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

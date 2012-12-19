package silex.server;

import haxe.xml.Fast;

import silex.config.ConfigBase;

/**
 * This class is in charge of loading and storing the configuration data of the Silex server
 */
class ServerConfig extends ConfigBase{
	/**
	 * Default path for the config file
	 */
	public static inline var SERVER_CONFIG_FILE = "conf/server-config.xml.php";
	/**
	 * Config data
	 * Default file
	 */
	public var defaultFile:String;
	/**
	 * Config data
	 * path of the user folder, i.e. the folder where all files are stored
	 */
	public var userFolder:String;
	/**
	 * Config data
	 * application key, used when compiled for dropbox mode
	 */
	public var key:String;
	/**
	 * Config data
	 * application secret key, used when compiled for dropbox mode
	 */
	public var secret:String;
	/**
	 * Constructor
	 * Load the provided config file
	 */
	public function new(configFile:String = SERVER_CONFIG_FILE){
		super(configFile);
	}
	/**
	 * Convert XML data into structured data structure
	 * Virtual method implemented by the derived classes
	 * This method is automatically called by Config::loadData
	 */
	override public function xmlToConfData(xml:Fast){
		if(xml.hasNode.defaultFile)
			defaultFile = xml.node.defaultFile.innerData;
		else
			trace("Warning: missing defaultFile in config file ");

		if(xml.hasNode.userFolder)
			userFolder = xml.node.userFolder.innerData;
		else
			trace("Warning: missing userFolder in config file ");

		if(xml.hasNode.key)
			key = xml.node.key.innerData;

		if(xml.hasNode.secret)
			secret = xml.node.secret.innerData;
	}
	/**
	 * Convert the structured config data to XML data
	 * Virtual method implemented by the derived classes
	 * This method is used by Config::saveData
	 * @param 	xml 	Fast XML object with a root node and security comments 
	 */
	override public function confDataToXml(xml:Fast):Fast{
		// array to store all config nodes
		var node:Xml = xml.x.firstChild();
		// add one node per config data
		node.addChild(Xml.parse("
			<defaultFile>"+defaultFile+"</defaultFile>
"));
		node.addChild(Xml.parse("
			<userFolder>"+userFolder+"</userFolder>
"));
		return xml;
	}
}
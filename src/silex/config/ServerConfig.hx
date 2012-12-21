package silex.config;

import haxe.xml.Fast;

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
	 * Default file to edit
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
	 * config data used only in dropbox mode
	 */
	public var encrypter:String;
	/**
	 * config data used only in dropbox mode
	 */
	public var dbHost:String;
	/**
	 * config data used only in dropbox mode
	 */
	public var dbName:String;
	/**
	 * config data used only in dropbox mode
	 */
	public var dbUser:String;
	/**
	 * config data used only in dropbox mode
	 */
	public var dbPass:String;
	/**
	 * config data used only in dropbox mode
	 */
	public var dbPort:String;
	/**
	 * Constructor
	 * Load the provided config file
	 */
	public function new(configFile:String = SERVER_CONFIG_FILE){
		super(configFile);
	}
	/**
	 * remove server protexted config data and creates a client config object
	 */
/*	override public function toClientConfig():ClientConfig{
		return {
			defaultFile:defaultFile,
			userFolder:userFolder,
		};
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
		if(xml.hasNode.encrypter)
			encrypter = xml.node.encrypter.innerData;
		if(xml.hasNode.dbHost)
			dbHost = xml.node.dbHost.innerData;
		if(xml.hasNode.dbName)
			dbName = xml.node.dbName.innerData;
		if(xml.hasNode.dbUser)
			dbUser = xml.node.dbUser.innerData;
		if(xml.hasNode.dbPass)
			dbPass = xml.node.dbPass.innerData;
		if(xml.hasNode.dbPort)
			dbPort = xml.node.dbPort.innerData;
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
		node.addChild(Xml.parse("
			<key>"+key+"</key>
"));
		node.addChild(Xml.parse("
			<secret>"+secret+"</secret>
"));
		node.addChild(Xml.parse("
			<encrypter>"+encrypter+"</encrypter>
"));
		node.addChild(Xml.parse("
			<dbHost>"+dbHost+"</dbHost>
"));
		node.addChild(Xml.parse("
			<dbName>"+dbName+"</dbName>
"));
		node.addChild(Xml.parse("
			<dbUser>"+dbUser+"</dbUser>
"));
		node.addChild(Xml.parse("
			<dbPass>"+dbPass+"</dbPass>
"));
		node.addChild(Xml.parse("
			<dbPort>"+dbPort+"</dbPort>
"));
		return xml;
	}
}
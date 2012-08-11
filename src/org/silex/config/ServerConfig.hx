package org.silex.config;

/**
 * This class is in charge of loading and storing the configuration data of the Silex server
 */
class ServerConfig extends Config{
	/**
	 * Default path for the config file
	 */
	public static inline var SERVER_CONFIG_FILE:String = "conf/server-config.xml.php";
	/**
	 * Config data
	 * Default publication
	 */
	public var defaultPublication:String;
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
	override public function xmlToConfData(xml:Xml){
		// take the first level nodes
		var children = xml.firstChild().elements();
		// browse the node
		for (child in children){
			// check the node name and get the config value
			switch(child.nodeName){
				case "defaultPublication":
					defaultPublication = child.firstChild().nodeValue;
				default:
					trace("Warning: unknown config tag "+child);
			}
		}
	}
	/**
	 * Convert the structured config data to XML data
	 * Virtual method implemented by the derived classes
	 * This method is used by Config::saveData
	 * @param 	xml 	XML object with a root node and security comments 
	 */
	override public function confDataToXml(xml:Xml):Xml{
		// array to store all config nodes
		var configNodes:Array<Xml> = new Array();
		// add one node per config data
		configNodes.push(Xml.parse("
			<defaultPublication>"+defaultPublication+"</defaultPublication>
"));
		// add all nodes to the XML data
		for (node in configNodes){
			trace("add node "+node);
			xml.firstChild().addChild(node);
		}
		return xml;
	}
}
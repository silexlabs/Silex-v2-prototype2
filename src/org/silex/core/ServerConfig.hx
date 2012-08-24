package org.silex.core;

import haxe.xml.Fast;

import org.silex.config.ConfigBase;

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
	 * Default publication
	 */
	public var defaultPublication:String;
	/**
	 * Config data
	 * Admin user, the one who has installed Silex
	 */
	public var admin:String;
	/**
	 * Actions to be executed at start, on the client side for debugging
	 * @example	openPublication("test1"); to open the publication directly at
	 */
	public var debugModeAction:String;
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
		if(xml.hasNode.defaultPublication)
			defaultPublication = xml.node.defaultPublication.innerData;
		else
			trace("Warning: missing defaultPublication in config file ");

		if(xml.hasNode.admin)
			admin = xml.node.admin.innerData;
		else
			trace("Warning: missing admin in config file ");

		if(xml.hasNode.debugModeAction)
			debugModeAction = xml.node.debugModeAction.innerData;
		else
			debugModeAction = "";
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
			<defaultPublication>"+defaultPublication+"</defaultPublication>
"));
		node.addChild(Xml.parse("
			<admin>"+admin+"</admin>
"));
		node.addChild(Xml.parse("
			<debugModeAction>"+debugModeAction+"</debugModeAction>
"));
		return xml;
	}
}
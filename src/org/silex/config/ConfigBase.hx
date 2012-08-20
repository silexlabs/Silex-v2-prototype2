package org.silex.config;

import php.io.File;
import haxe.xml.Fast;

/**
 * This class is in charge of loading and storing the configuration data of the Silex server
 */
class ConfigBase{
	public static inline var SECURITY_STRING:String = '<xml>
	<!--
		<?php
			exit("access denied
	-"."->
</"."xml>");
		?>
	-->
</xml>';

	/**
	 * Constructor
	 * Load the provided config file and parse its content
	 * Then call the xmlToConfData virtual method implemented by the derived classes
	 */
	public function new(configFile:String = null){
		if (configFile != null)
			loadData(configFile);
	}
	/**
	 * Convert XML data into structured data structure
	 * Virtual method implemented by the derived classes
	 * This method is automatically called by Config::loadData
	 */
	public function xmlToConfData(xml:Fast){
		throw("This virtual method has to be implemented in the derived class");
	}
	/**
	 * Convert the structured config data to XML data
	 * Virtual method implemented by the derived classes
	 * This method is used by Config::saveData
	 * @param 	xml 	Fast XML object with a root node and security comments 
	 */
	public function confDataToXml(xml:Fast):Fast{
		throw("This virtual method has to be implemented in the derived class");
		return xml;
	}
	/**
	 * Load data from XML config file
	 * This will call xmlToConfData virtual method implemented by the derived classes
	 */
	public function loadData(configFile:String){
		// load and parse XML data
		var xml:Fast = new Fast(Xml.parse(File.getContent(configFile)).firstElement());
		// call the xmlToConfData
		xmlToConfData(xml); 
	}
	/**
	 * Write data to XML config file
	 * Use confDataToXml virtual method implemented by the derived classes
	 */
	public function saveData(configFile:String){
		var xml = new Fast(Xml.parse(SECURITY_STRING));
		File.saveContent(configFile, confDataToXml(xml).innerHTML);
	}
}
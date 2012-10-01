package silex.publication;

import silex.ConfigBase;
import silex.publication.PublicationData;
import haxe.xml.Fast;
import silex.util.FileSystemTools;

/**
 * This class is in charge of reading and writing the configuration data of one given Silex publication.
 * It is only implemented for the server side, use PublicationService to access this from the client side.
 */
class PublicationConfig extends ConfigBase{
	/**
	 * constant, path and file names
	 */
	public static inline var PUBLICATION_HTML_FILE:String = "index.html";
	/**
	 * constant, path and file names
	 */
	public static inline var PUBLICATION_CSS_FILE:String = "app.css";
	/**
	 * constant, path and file names
	 */
	public static inline var PUBLICATION_CONFIG_FOLDER:String = "conf/";
	/**
	 * constant, path and file names
	 */
	public static inline var PUBLICATION_CONFIG_FILE:String = "config.xml.php";
	/**
	 * The the publication data
	 * This is the public information for the publications
	 */
	public var configData:PublicationConfigData;
	/**
	 * Constructor
	 * Load the provided config file
	 */
	public function new(configFile:String = null){
		configData = {
			state : Private,
			category : Publication,
			creation : {
				author : "", 
				date : new Date(0, 0, 0, 0, 0, 0)
			}, 
			lastChange : {
				author : "", 
				date : new Date(0, 0, 0, 0, 0, 0)
			},
			debugModeAction: null
		};
		super(configFile);
	}
	/**
	 * Convert XML data into structured data structure
	 * Virtual method implemented by the derived classes
	 * This method is automatically called by Config::loadData
	 */
	override public function xmlToConfData(xml:Fast){

		if(xml.hasNode.creation)
			configData.creation = getChangeDataFromXML(xml.node.creation);
		else
			trace("Warning: missing creation tag in config file ");

		if(xml.hasNode.lastChange)
			configData.lastChange = getChangeDataFromXML(xml.node.lastChange);
		else
			trace("Warning: missing lastChange tag in config file ");

		if(xml.hasNode.debugModeAction)
			configData.debugModeAction = xml.node.debugModeAction.innerData;
		else
			configData.debugModeAction=null;

		if(xml.hasNode.state){
			switch(xml.node.state.innerData){
				case "Trashed":
					var changeData = getChangeDataFromXML(xml.node.state);
					configData.state = Trashed({
						author : changeData.author,
						date : changeData.date
					});
				case "Published":
					var changeData = getChangeDataFromXML(xml.node.state);
					configData.state = Published({
						author : changeData.author,
						date : changeData.date
					});
				case "Private":
					configData.state = Private;
			}
		}
		else
			trace("Warning: missing state tag in config file ");

		if(xml.hasNode.category){
			switch(xml.node.category.innerData){
				case "Publication":
					configData.category = Publication;
				case "Theme":
					configData.category = Theme;
				case "Utility":
					configData.category = Utility;
			}
		}
		else
			trace("Warning: missing category tag in config file ");
	}
	/**
	 * retrieve the change data from XML node
	 * the change data (author, date) may be in attr of the xml node
	 * @example 		<creation><author>silexlabs</author><date>2021-12-01</date></creation> would return {author:"silexlabs", date:5487454}
	 * @example 		<state author="silexlabs" date="2021-12-01">Trashed</state> would return {author:"silexlabs", date:5487454}
	 */
	private function getChangeDataFromXML(xml:Fast):ChangeData{
		// Get the author
		var author:String = ""; 
		if(xml.hasNode.author)
			author = xml.node.author.innerData;
		else
			if(xml.has.author)
				author = xml.att.author;
			else
				trace("Warning: missing author in config file ");

		// The date
		var date:Date = null;
		if(xml.hasNode.date)
			date = Date.fromString(xml.node.date.innerData);
		else
			if(xml.has.date)
				date = Date.fromString(xml.att.date);
			else
				trace("Warning: missing date in config file ");

		// returns a structured data
		return {
			author:author,
			date:date
		};
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
		switch (configData.state) {
			case Private:
				node.addChild(Xml.parse("
			<state>Private</state>
"));
			case Trashed(changeData):
				node.addChild(Xml.parse("
			<state author=\""+changeData.author+"\" date=\""+changeData.date.toString()+"\" >Trashed</state>
"));
			case Published(changeData):
				node.addChild(Xml.parse("
			<state author=\""+changeData.author+"\" date=\""+changeData.date.toString()+"\" >Published</state>
"));
		}
		switch (configData.category) {
			case Publication:
				node.addChild(Xml.parse("
			<category>Publication</category>
"));
			case Utility:
				node.addChild(Xml.parse("
			<category>Utility</category>
"));
			case Theme:
				node.addChild(Xml.parse("
			<category>Theme</category>
"));
		}
		node.addChild(Xml.parse("
<creation>
	<author>"+configData.creation.author+"</author>
	<date>"+configData.creation.date.toString()+"</date>
</creation>
"));
		node.addChild(Xml.parse("
<lastChange>
	<author>"+configData.lastChange.author+"</author>
	<date>"+configData.lastChange.date.toString()+"</date>
</lastChange>
"));
		if (configData.debugModeAction != null)
			node.addChild(Xml.parse("
<debugModeAction>"+configData.debugModeAction+"</debugModeAction>
"));

		return xml;
	}
}
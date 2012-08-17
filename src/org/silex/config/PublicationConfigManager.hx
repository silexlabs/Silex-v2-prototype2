package org.silex.config;

/**
 * state of a publication
 * use PublicationConfigManager::publicationConfig to get the config of a given publication
 */
enum PublicationState{
	Trashed(data:ChangeData);
	Published(data:ChangeData);
	Private;
}
/**
 * Store the data concerning a change of a publication data, i.e. creation, deletion, ...
 */
typedef ChangeData = {
	/**
	 * The author of the change
	 */
	public var author:String; // TODO: UserId instead of String
	/**
	 * The date of the change
	 */
	public var date:Date;
}
/**
 * Store the configuration data of a publiction
 * Stored in a .xml.php file
 * use PublicationConfigManager::publicationConfig to get the config of a given publication
 */
typedef PublicationConfig = {
	/**
	 * the name of the publication
	 */
	var name:String;
	/**
	 * folder where publication is stored
	 */
	var publicationFolder:String;
	/**
	 * State of the publication
	 */
	var state:PublicationState;
	/**
	 * The owner of the publication and the date of creation
	 */
	var creation:ChangeData;
	/**
	 * The last change data
	 */
	var lastChange:ChangeData;
}

/**
 * This class is in charge of loading and storing the configuration data of a Silex publication
 */
class PublicationConfigManager extends ConfigBase{
	/**
	 * Default folder where publications are stored
	 */
	public static inline var DEFAULT_PUBLICATION_FOLDER:String = "publications/";
	/**
	 * constant, path and file names
	 */
	public static inline var PUBLICATION_HTML_FILE:String = "index.html";
	/**
	 * constant, path and file names
	 */
	public static inline var PUBLICATION_CSS_FILE:String = "styles/app.css";
	/**
	 * constant, path and file names
	 */
	public static inline var PUBLICATION_CONFIG_FILE:String = "conf/config.xml.php";
	/**
	 * The the publication data
	 * This is the public information for the publications
	 */
	public var publicationConfig:PublicationConfig;
/*	public var publicationConfig:PublicationConfig = {
		name : "",
		publicationFolder : "", 
		state : Private,
		creation : {
			author : "", 
			date : null
		}, 
		lastChange : {
			author : "", 
			date : null
		}
	};
*/	/**
	 * Constructor
	 * Load the provided config file
	 */
	public function new(configFile:String = null){
		publicationConfig = {
			name : "",
			publicationFolder : "", 
			state : Private,
			creation : {
				author : "", 
				date : new Date(0, 0, 0, 0, 0, 0)
			}, 
			lastChange : {
				author : "", 
				date : new Date(0, 0, 0, 0, 0, 0)
			}
		};
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
				case "name":
					publicationConfig.name = child.firstChild().nodeValue;
				case "publicationFolder":
					publicationConfig.publicationFolder = child.firstChild().nodeValue;
				case "state":
					// string to enum
					switch(child.firstChild().nodeValue){
						case "Trashed":
							publicationConfig.state = Trashed({
								author : child.get("author"),
								date : Date.fromString(child.get("date"))
							});
						case "Published":
							publicationConfig.state = Published({
								author : child.get("author"),
								date : Date.fromString(child.get("date"))
							});
						case "Private":
							publicationConfig.state = Private;
					}
					// for the state, the change data (author, date) may be in attr of the xml node
					/*
					var attributeChangeData:Array<String> = new Array();
					switch(stateName){
						case "Trashed", "Published":
							attributeChangeData.push({
								author : child.get("author"),
								date : Date.fromString(child.get("date"))
							});
					}
					*/
					// string to enum
					//publicationConfig.state = Type.createEnum(PublicationState, stateName, attributeChangeData);
				case "creation":
					publicationConfig.creation = getChangeDataFromXML(child.firstChild());
				case "lastChange":
					publicationConfig.lastChange = getChangeDataFromXML(child.firstChild());
				default:
					trace("Warning: unknown config tag "+child);
			}
		}
	}
	/**
	 * retrieve the change data from XML node
	 * @example 		<creation><author>silexlabs</author><date>12/02/2021</date></creation> would return {author:"silexlabs", date:5487454}
	 */
	private function getChangeDataFromXML(xml:Xml):ChangeData
	{
		var author:String = ""; 
		var date:Date = null;

		// take the first level nodes
		var children = xml.firstChild().elements();

		// browse the node
		for (child in children){
			// check the node name and get the config value
			switch(child.nodeName){
				case "author":
					author = cast(child.firstChild().nodeValue);
				case "date":
					date = Date.fromString(child.firstChild().nodeValue);
				default:
					trace("Warning: unknown config tag "+child);
			}
		}
		return {
			author:author,
			date:date
		};
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
			<state>"+publicationConfig.state+"</state>
"));
		configNodes.push(Xml.parse("
			<name>"+publicationConfig.name+"</name>
"));
		configNodes.push(Xml.parse("
			<publicationFolder>"+publicationConfig.publicationFolder+"</publicationFolder>
"));
		configNodes.push(Xml.parse("
			<creation>
				<author>"+publicationConfig.creation.author+"</author>
				<date>"+publicationConfig.creation.date.toString()+"</date>
			</creation>
"));
		configNodes.push(Xml.parse("
			<lastChange>
				<author>"+publicationConfig.lastChange.author+"</author>
				<date>"+publicationConfig.lastChange.date.toString()+"</date>
			</lastChange>
"));

		// add all nodes to the XML data
		for (node in configNodes){
			trace("add node "+node);
			xml.firstChild().addChild(node);
		}
		return xml;
	}
}
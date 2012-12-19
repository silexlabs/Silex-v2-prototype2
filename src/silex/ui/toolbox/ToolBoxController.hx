package silex.ui.toolbox;

import haxe.Template;

import js.Lib;
import js.Dom;
import js.XMLHttpRequest;

import haxe.xml.Fast;

import brix.component.ui.DisplayObject;
import brix.util.DomTools;
import brix.component.template.TemplateMacros;
import brix.component.navigation.Page;

import silex.interpreter.Interpreter;
import silex.file.FileModel;
import silex.page.PageModel;
import silex.ui.dialog.FileBrowserDialog;

import haxe.remoting.HttpAsyncConnection;


typedef ToolboxData = {
	categories: Array<{
		name: String,
		groups: Array<{
			name: String,
			properties: Array<{
				name: String,
				cssName: String,
				types: Array<{
					name: String,
					options: Array<{
						name: String,
						help: String // optional, in the attribute of the node
					}>
				}>
			}>
		}>
	}>
}

/**
 * This component displays editors for all css properties in a Brix accordion UI. 
 */
class ToolBoxController extends DisplayObject
{
	/**
	 * CSS styles descriptor (XML file) URL
	 */
	public static var CSS_DESCRIPTOR_FILE_URL:String = "assets/admin/css-styles.xml";
	/**
	 * class name expected for the container of the template
	 */
	public static var TOOL_BOX_CONTROLLER_TEMPLATE:String = "tool-box-controller-template";
	/**
	 * template
	 */
	public var template:String;
	/**
	 * template container
	 * this container is expected to hold the HTML with the editors
	 */
	public var templateContainer:HtmlDom;
	/**
	 * data provider
	 * this is an object in which I store the data from the XML file
	 * used to execute the template
	 */
	public var dataProvider:ToolboxData;
	/**
	 * Constructor
	 * Start listening the node
	 */
	public function new(rootElement:HtmlDom, BrixId:String){
		super(rootElement, BrixId);
		// expose the class to the scripts interpreter
		Interpreter.getInstance().expose("ToolBoxController", ToolBoxController);
		// get the template container
		templateContainer = DomTools.getSingleElement(rootElement, TOOL_BOX_CONTROLLER_TEMPLATE, true);
		// get the template from the node
		template = templateContainer.innerHTML;
		templateContainer.innerHTML = "";
		// load css properties XML file
		var req = new XMLHttpRequest();
		req.onreadystatechange = callback(onLoadEvent, req);
		req.open("GET", CSS_DESCRIPTOR_FILE_URL, true);
		req.send(null);
	}
	/**
	 * callback for events of the XMLHttpRequest class
	 */
	private function onLoadEvent(req : XMLHttpRequest){
		if (req.readyState == 4) { 
			if (req.status == 200) {
				//trace("onreadystatechange"+req.responseText);
				onLoadSuccess(req.responseText);
			} 
			else {
				onLoadError(req.statusText);
			}
		}
		else {
			//trace("Not ready", req);
		}
	}
	/**
	 * Handle css descriptor file loading error
	 */
	private function onLoadError(message:String){
		throw("Could not load the css descriptor XML file "+CSS_DESCRIPTOR_FILE_URL+". Error message: "+message);
	}
	/**
	 * Handle css descriptor file loaded
	 */
	private function onLoadSuccess(xmlString:String){
		// build the data provider
		var xmlData:Xml = Xml.parse(xmlString);
		var fast = new Fast(xmlData.firstElement());

		dataProvider = xmlToObj(fast);
		//trace("onLoadSuccess dataProvider=");
		//DomTools.inspectTrace(dataProvider.categories, "ToolBoxController");

		// refresh display
		redraw();

		// open default accordion category
		//var initialPage = dataProvider.categories[0].name;
		var initialPage = rootElement.getAttribute("data-initial-page-name");
		if (initialPage == null){
			trace("Warning: the initialPage attribute is not set on the ToolBoxController node");
		}
		Page.openPage(initialPage, false, null, null, brixInstanceId, rootElement);
	}
	/**
	 * convert the xml to an object for the template
	 */
	private function xmlToObj(xml:Fast):ToolboxData{
		var res = {
			categories: []
		};
		// browse <category> nodes
		for (catXml in xml.nodes.category){
			var cat = {
				name: catXml.node.name.innerData,
				groups: []
			}
			// browse <group> nodes
			for (groupXml in catXml.nodes.group){
				var group = {
					name: groupXml.node.name.innerData,
					properties: []
				}
				// browse <property> nodes
				for (propXml in groupXml.nodes.property){
					var prop = {
						name: propXml.node.name.innerData,
						cssName: propXml.node.cssName.innerData,
						types: []
					}
					// browse <type> nodes
					for (typeXml in propXml.nodes.type){
						var type = {
							name: typeXml.node.name.innerData,
							options: []
						}
						// browse <option> nodes
						for (optionXml in typeXml.nodes.option){
							var option = {
								name: optionXml.innerData,
								help: ""
							}
							if (optionXml.has.help)
								option.help = optionXml.att.help;
							type.options.push(option);
						}
						prop.types.push(type);
					}
					group.properties.push(prop);
				}
				cat.groups.push(group);
			}
			res.categories.push(cat);
		}
		return res;
	}
	/**
	 * Exectute the template with the data provider 
	 * Redraw the node content
	 * Throw a redraw event
	 */
	private function redraw(){
		trace("redraw ");
		// reset content
		var innerHtml:String = "";
		// execute template 
		var t : Template;
		try	{
			t = new Template(template);
			innerHtml += t.execute(dataProvider, TemplateMacros);
			//trace("redraw "+innerHtml);
		}
		catch(e:Dynamic){
			throw("Error: an error occured while interpreting the template - "+template+" - with the data "+dataProvider+" - error message: "+e);
		}
		// remove brix components of the current content
		for (i in 0...templateContainer.childNodes.length)
		{
			getBrixApplication().cleanNode(templateContainer.childNodes[i]);
		}
		// refresh content
		templateContainer.innerHTML = innerHtml;
		// init brix components
		for (i in 0...templateContainer.childNodes.length)
		{
			getBrixApplication().initNode(templateContainer.childNodes[i]);
		}
	}
}

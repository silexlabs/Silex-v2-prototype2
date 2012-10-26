package silex.interpreter;

import js.Lib;
import js.Dom;

import brix.core.Application;
import brix.component.navigation.Page;
import brix.component.navigation.Layer;
import brix.util.DomTools;

import hscript.Interp;
import hscript.Parser;

import haxe.Timer;
/**
 * This class is in charge of loading and storing the configuration data of the Silex server
 */
class Interpreter{
	/**
	 * Debug action executed at start
	 */
	public static inline var CONFIG_TAG_DEBUG_MODE_ACTION = "debugModeAction";
	/**
	 * Basic context for Silex
	 */
	public static inline var BASIC_CONTEXT = {
		"Lib": Lib,
		"Math": Math,
		"Timer": Timer,
		
		"StringTools": StringTools,
		"DomTools": DomTools,

		"Application": Application,
		"Page": Page,
		"Layer": Layer,
	};

	/**
	 * the context exposed to the scripts
	 */
	private var context:Hash<Dynamic>;
	/**
	 * singleton pattern
	 */
	static private var instance:Interpreter;
	/**
	 * singleton pattern
	 */
	static public function getInstance():Interpreter {
		if (instance == null)
			instance = new Interpreter();
		return instance;
	}
	/**
	 * singleton pattern
	 * private constructor
	 */
	private function new(){
		context = new Hash();
	}
	/**
	 * execute a set of actions
	 */
	public function exec(script:String):Dynamic {
		var parser = new hscript.Parser();
		var program = parser.parseString(script);
		var interp = new hscript.Interp();
		for (varName in Reflect.fields(BASIC_CONTEXT)){
			interp.variables.set(varName,Reflect.getProperty(BASIC_CONTEXT, varName));
		}
		if (context != null){
			for (varName in context.keys()){
				interp.variables.set(varName,context.get(varName));
			}
		}
		var res = interp.execute(program);
		return res;
	}
	/**
	 * add an object to the context
	 */
	public function expose(key:String, obj:Dynamic){
		trace("expose "+key);
		context.set(key, obj);
	}
	/**
	 * interpret all scipts
	 */
	public function execScriptTags(rootElement:HtmlDom){
		// retrieve the hscript tags
		var scriptTags = DomTools.getElementsByAttribute(rootElement, "type", "text/hscript");
		trace("execScriptTags "+rootElement+" - "+rootElement.className+" - "+scriptTags.length);
		// browse all scripts
		for (idx in 0...scriptTags.length){
			var script = scriptTags[idx].innerHTML;
			try{
				exec(script);
			}catch(e:Dynamic){
				throw("Error while executing the script in the config file of the publication (debugModeAction variable). The error: "+e);
			}
		}
	}
}
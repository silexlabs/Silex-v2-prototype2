package silex.interpreter;

import js.Lib;
import js.Dom;

import org.slplayer.core.Application;
import org.slplayer.component.navigation.Page;
import org.slplayer.component.navigation.Layer;
import org.slplayer.util.DomTools;

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
	 * execute a set of actions
	 */
	public static function exec(script:String, context:Hash<Dynamic>=null) {
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

}
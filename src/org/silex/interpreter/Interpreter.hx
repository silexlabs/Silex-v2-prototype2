package org.silex.interpreter;

import js.Lib;
import js.Dom;

import org.silex.property.PropertyModel;
import org.silex.component.ComponentModel;
import org.silex.layer.LayerModel;
import org.silex.page.PageModel;
import org.silex.publication.PublicationModel;
import org.slplayer.component.navigation.Page;
import org.slplayer.util.DomTools;

import hscript.Interp;
import hscript.Parser;
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
		
		"StringTools": StringTools,
		"DomTools": DomTools,

		"Page": Page,
		
		"PropertyModel": PropertyModel.getInstance(),
		"ComponentModel": ComponentModel.getInstance(),
		"LayerModel": LayerModel.getInstance(),
		"PageModel": PageModel.getInstance(),
		"PublicationModel": PublicationModel.getInstance(),
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
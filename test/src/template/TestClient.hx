package template;

import brix.component.template.TemplateMacros;

import js.Dom;
import js.XMLHttpRequest;

import utest.Assert;
import utest.Runner;
import utest.ui.Report;

class TestClient {
	public function new(){
	}
	public function testTemplateMacros():Void{
		var date = Date.fromString("2021-12-02 00:00:00");

		var t = new haxe.Template("$$trace(::date::)$$makeDateReadable(::date::)");
		Assert.equals("2021/12/02 00:00", t.execute({date:date}, TemplateMacros));

		var t = new haxe.Template("$$makeDateReadable(::date::,%Y/%m/%d)");
		Assert.equals("2021/12/02", t.execute({date:date}, TemplateMacros));

		var t = new haxe.Template("$$makeDateReadable(::date::,%H:%M)");
		Assert.equals("00:00", t.execute({date:date}, TemplateMacros)); 

	}
}
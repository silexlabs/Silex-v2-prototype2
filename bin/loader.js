function hasHtml5() {
	var ret = !!document.createElement('canvas').getContext;
	return ret;
}
function addScript(scriptPath){
	var node = document.createElement("script");
	node.src = scriptPath;
	node.type = 'text/javascript';
	node.async = true;
	var head = document.getElementsByTagName("head")[0];
	head.appendChild(node);
	return node;
}
function startSilexJs(){
	addScript("libs/silex/silex.js");
}

function startSilexFlash(){
	var node = addScript("libs/swfobject.js");
	node.onload = swfobjectLoaded;

	var node = document.createElement("div");
	node.id = "flashContainer";
	document.body.appendChild(node);

}
function swfobjectLoaded(){
	swfobject.embedSWF("myContent.swf", "flashContainer", "300", "120", "9.0.0");
}

var _hasHtml5 = hasHtml5();

_hasHtml5 = false;

if (_hasHtml5)
	startSilexJs();
else
	startSilexFlash();
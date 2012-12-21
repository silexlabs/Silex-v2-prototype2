/**
 * detect if the browser supports html5
 * TODO: better detection, in function of the publication needs in term of HTML5 support
 */
function hasHtml5() {
	var ret = !!document.createElement('canvas').getContext;
	return ret;
}
/**
 * add a js script to the page
 * @return	the script node
 */
function addScript(scriptPath){
	// check if this script tag is already set
	var scriptNodes = document.getElementsByTagName("script");
	for (var idxNode=0; idxNode<scriptNodes.length; idxNode++){
		var node = scriptNodes[idxNode];
		if(node.getAttribute("src") == scriptPath){
			return node;
		}
	}
	var node = document.createElement("script");
	node.src = scriptPath;
	node.type = 'text/javascript';
	node.async = true;
	var head = document.getElementsByTagName("head")[0];
	head.appendChild(node);
	return node;
}
/**
 * load the javascript version of Silex
 */
function startSilexJs(){
	addScript("scripts/silex.js");
}
/**
 * load the Flash version of Silex
 * load swfobject library
 * create a node to embed silex.swf 
 */
function startSilexFlash(){
	var node = document.createElement("div");
	node.id = "flashContainer";

	//document.body.innerHTML = "";
	document.body.appendChild(node);

	var node = addScript("scripts/swfobject.js");
	node.onload = swfobjectLoaded;
}
/**
 * add the meta tags (config) to the flashvars
 * embed silex.swf
 */
function swfobjectLoaded(){
	// retrieve all config tags (the meta tags)
	var metaTags = document.getElementsByTagName("META");

	// the flashvars object passed to flash
	var flashvars = {};

	// for each config element, store the name/value pair
	for (idxNode=0; idxNode<metaTags.length; idxNode++){
		var node = metaTags[idxNode];
		var configName = node.getAttribute("name");
		var configValue = node.getAttribute("content");
		if (configName!=null && configValue!=null){
			flashvars[configName] = escape(configValue);
			//console.log(flashvars);
		}
	}
	// add html data
	flashvars["publicationBody"] = document.getElementsByTagName("body")[0].innerHTML;

	// retrieve initialPageName from deeplink
	if (window.location.hash != "" && flashvars["useDeeplink"]!="false"){
		// hash is the page name after the # in the URL
		var initialPageName = window.location.hash.substr(1);
		// set initial page 
		flashvars["initialPageName"] = initialPageName;
	}

	// embed silex
	swfobject.embedSWF("scripts/silex.swf", "flashContainer", "100%", "100%", "10.2.0", null, flashvars);

	var node = document.getElementById("flashContainer");
	node.style.position = "absolute";
	node.style.width = "100%";
	node.style.height = "100%";
	node.style.left = "0";
	node.style.top = "0";
}

window.onload = function (){
	var _hasHtml5 = hasHtml5();

	// debug only 
//	_hasHtml5 = false;

	// flash or html version
	if (_hasHtml5){	
		startSilexJs();
	}
	else{
		startSilexFlash();
	}
}

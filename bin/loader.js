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
	addScript("libs/silex/silex.js");
}
/**
 * load the Flash version of Silex
 * load swfobject library
 * create a node to embed silex.swf 
 */
function startSilexFlash(){
	var node = addScript("libs/swfobject.js");
	node.onload = swfobjectLoaded;

	var node = document.createElement("div");
	node.id = "flashContainer";
	document.body.appendChild(node);

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
				console.log(flashvars);
			}
		}

	// embed silex
	swfobject.embedSWF("libs/silex/silex.swf", "flashContainer", "100%", "400", "10.2.0", null, flashvars);
}

var _hasHtml5 = hasHtml5();

// debug only 
//_hasHtml5 = false;

// flash or html version
if (_hasHtml5)
	startSilexJs();
else
	startSilexFlash();

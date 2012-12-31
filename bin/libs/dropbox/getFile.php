<?php

require_once('functions.php');
require_once('xml2array.php');

if(isset($_GET['name'])){
	$path = $_GET['name'];
	// read silex config file
	$config = xml2array(file_get_contents('../../conf/server-config.xml.php'));
	// init dropbox
	initDropbox($config['xml']['key'], $config['xml']['secret'], $config['xml']['encrypter'], $config['xml']['dbHost'], $config['xml']['dbName'], $config['xml']['dbUser'], $config['xml']['dbPass'], $config['xml']['dbPort']);
	$dropbox = getDropbox();
	$obj = getFile($path);
	if ($obj){
		header("Content-type: ".$obj['mime']); 
		echo($obj['data']);
	}
	else{
		header('HTTP/1.0 404 Not Found');
		echo ('Not found in your dropbox: '.$path);
	}
}
else{
	header('HTTP/1.0 404 Not Found');
	echo ('Filename is expected in the "name" variable in GET');
}

?>
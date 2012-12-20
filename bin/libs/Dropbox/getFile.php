<?php

require_once('functions.php');

if(isset($_GET['name'])){
	$path = $_GET['name'];
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
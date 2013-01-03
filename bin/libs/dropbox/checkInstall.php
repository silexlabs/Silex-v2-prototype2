<?php

if(version_compare(PHP_VERSION, '5.3.0', '<')) {
    exit('Your current PHP version is: ' . PHP_VERSION . '. Silex requires version 5.3.0 or later, when used with dropbox.');
}

require_once('functions.php');
require_once('xml2array.php');

// read silex config file
$config = xml2array(file_get_contents('../../conf/server-config.xml.php'));
// init dropbox
initDropbox($config['xml']['key'], $config['xml']['secret'], $config['xml']['encrypter'], $config['xml']['dbHost'], $config['xml']['dbName'], $config['xml']['dbUser'], $config['xml']['dbPass'], $config['xml']['dbPort']);

$check = checkInstall();
if($check != NULL){
	$redirectUrl = '../../';
	if (isset($check['redirect'])){
		$redirectUrl = $check['redirect'];
	}
    header('Location: '.$redirectUrl);
}
else{
	echo 'an error occured, I could not drop Silex files to your dropbox.';
}
?>
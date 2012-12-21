<?php

require_once('functions.php');
require_once('xml2array.php');

// read silex config file
$config = xml2array(file_get_contents('../../conf/server-config.xml.php'));
// init dropbox
initDropbox($config['xml']['key'], $config['xml']['secret'], $config['xml']['encrypter'], $config['xml']['dbHost'], $config['xml']['dbName'], $config['xml']['dbUser'], $config['xml']['dbPass'], $config['xml']['dbPort']);

if(checkInstall()){
    header('Location: ../../');
    exit;
}
else{
	echo 'an error occured, I could not drop Silex files to your dropbox.';
}
?>
<?php


// Prevent access via command line interface
if (PHP_SAPI === 'cli') {
    exit(0);
}

// Don't allow direct access to the bootstrap
if(basename($_SERVER['REQUEST_URI']) == 'functions.php'){
    exit(0);
}

// Register a simple autoload function
spl_autoload_register(function($class){
    $class = str_replace('\\', '/', $class);
    require_once('' . $class . '.php');
});
global $key, $secret, $storage, $callback;
// Set your consumer key, secret and callback URL
//https://www.dropbox.com/chooser/browse/bemyapp?app_key=ofkiejv31uyyrfc&link_type=preview&
//https://www.dropbox.com/c/browse/bemyapp?src=shmodel
$key      = 'ofkiejv31uyyrfc';
$secret   = '2qjqwovsx3n8udp';

// Check whether to use HTTPS and set the callback URL
$protocol = (!empty($_SERVER['HTTPS'])) ? 'https' : 'http';
$callback = $protocol . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

// Instantiate the Encrypter and storage objects
$encrypter = new \Dropbox\OAuth\Storage\Encrypter('XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX');

// User ID assigned by your auth system (used by persistent storage handlers)
$userID = 1;

// Instantiate the database data store and connect
$storage = new \Dropbox\OAuth\Storage\PDO($encrypter, $userID);
//$storage->connect('localhost', 'dropbox', 'username', 'password', 3306);
$storage->connect('localhost', 'dropbox', 'root', 'root', 3306);
// Optionally set the table name, default is dropbox_oauth_tokens
// $storage->setTable('oauth_tokens');

// If you use this, comment out lines 44-47
//$storage = new \Dropbox\OAuth\Storage\Session($encrypter);

// Instantiate the filesystem store and set the token directory
// Note: If you use this, comment out lines 44-47 and 50
//$storage = new \Dropbox\OAuth\Storage\Filesystem($encrypter, $userID);
//$storage->setDirectory('tokens');

function getDropbox(){
	global $key, $secret, $storage, $callback;
	$OAuth = new \Dropbox\OAuth\Consumer\Curl($key, $secret, $storage, $callback);
//	return new \Dropbox\API($OAuth, 'dropbox');
	return new \Dropbox\API($OAuth);
}
function checkInstall(){
	if(putFile("installed.txt", "success"))
		return true;
	else{
		session_destroy();
//		getDropbox()->putFile("../../files/", "files/");
		return false;
	}
}
/**
 * Download a file and its metadata
 * The object returned will contain the file name, MIME type, metadata 
 * (obtained from x-dropbox-metadata HTTP header) and file contents
 * @link https://www.dropbox.com/developers/reference/api#files-GET
 * @link https://github.com/BenTheDesigner/Dropbox/blob/master/Dropbox/API.php#L129-168
 */
function getFile($path){
	try {
		$res = getDropbox()->getFile($path, false);
		return $res;
//		return Array($res["data"], $res["mime"]);
	}
	catch (Exception $e) {
		return NULL;
	}
}

/**
 * Upload a file to the authenticated user's Dropbox
 * @link https://www.dropbox.com/developers/reference/api#files-POST
 * @link https://github.com/BenTheDesigner/Dropbox/blob/master/Dropbox/API.php#L80-110
 */
function putFile($path, $data){
	
	try {
		// Create a temporary file and write some data to it
		$tmp = tempnam('/tmp', 'dropbox');
		
		file_put_contents($tmp, $data);
		
		// Upload the file with an alternative filename
		$put = getDropbox()->putFile($tmp, $path);
		
		// Unlink the temporary file
		unlink($tmp);

		return true;
	}
	catch (Exception $e) {
		return false;
	}
}


?>
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
global $OAuth, $callback, $userID;
// Check whether to use HTTPS and set the callback URL
$protocol = (!empty($_SERVER['HTTPS'])) ? 'https' : 'http';
$callback = $protocol . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

// User ID assigned by your auth system (used by persistent storage handlers)
// $userID = 1;
session_start();
if(isset($_SESSION['silex_user_id'])){
	$userID = $_SESSION['silex_user_id'];
}
else{
	$userID = time();//rand(100000, 999999);//uniqid();
	$_SESSION['silex_user_id'] = $userID;
}
//exit($_SESSION['silex_user_id']);
//unset($_SESSION['silex_user_id']);

// If you use this, comment out lines 44-47
//$storage = new \Dropbox\OAuth\Storage\Session($encrypter);

// Instantiate the filesystem store and set the token directory
// Note: If you use this, comment out lines 44-47 and 50
//$storage = new \Dropbox\OAuth\Storage\Filesystem($encrypter, $userID);
//$storage->setDirectory('tokens');

/**
 * call this function before any other one
 */
function initDropbox($key, $secret, $encrypterString, $dbHost, $dbName, $dbUser, $dbPass, $dbPort){
	global $OAuth, $callback, $userID;

	$encrypter = new \Dropbox\OAuth\Storage\Encrypter($encrypterString);
	$storage = new \Dropbox\OAuth\Storage\PDO($encrypter, $userID);
	$storage->connect($dbHost, $dbName, $dbUser, $dbPass, $dbPort);
	$OAuth = new \Dropbox\OAuth\Consumer\Curl($key, $secret, $storage, $callback);
	// Optionally set the table name, default is dropbox_oauth_tokens
	// $storage->setTable('oauth_tokens');
}
function getDropbox(){
	global $OAuth;
//	return new \Dropbox\API($OAuth, 'dropbox');
	return new \Dropbox\API($OAuth);
}
function copySilexFiles(){
	$rootFolder = dirname(__FILE__);
	return createFolder('scripts')
		&& putFile('scripts/loader.js', file_get_contents($rootFolder.'/../../files/scripts/loader.js'))
		&& putFile('scripts/silex-builder.js', file_get_contents($rootFolder.'/../../files/scripts/silex-builder.js'))
		&& putFile('scripts/silex.js', file_get_contents($rootFolder.'/../../files/scripts/silex.js'))
		&& putFile('scripts/silex.swf', file_get_contents($rootFolder.'/../../files/scripts/silex.swf'))
		&& putFile('scripts/swfobject.js', file_get_contents($rootFolder.'/../../files/scripts/swfobject.js'));
}
function checkInstall(){
	global $OAuth;
	$res = getFile('scripts/loader.js');

	// when app is not authorized, it will never pass here since Dropbox/OAuth/Consumer/ConsumerAbstract.php does exit at line 85
	// so call the script checkInstall.php directly instead

	if($res == NULL){
		if (copySilexFiles() == false){

			return Array("redirect" => $OAuth->getAuthoriseUrl());


			// reset
			session_unset();
			// retry
			if (copySilexFiles() == false){
				return Array("redirect" => $OAuth->getAuthoriseUrl());
			}
		}
	}
	global $userID;
	return Array("version" => "2.0", "latest_version" => "2.0", "debug" => $userID);
}
/**
 * Download a file and its metadata
 * The object returned will contain the file name, MIME type, metadata 
 * (obtained from x-dropbox-metadata HTTP header) and file contents
 * @link https://www.dropbox.com/developers/reference/api#files-GET
 * @link https://github.com/BenTheDesigner/Dropbox/blob/master/Dropbox/API.php#L129-168
 */
function getFile($path){
	$res = getDropbox()->getFile($path, false);
	return $res;
}

/**
 * Upload a file to the authenticated user's Dropbox
 * @link https://www.dropbox.com/developers/reference/api#files-POST
 * @link https://github.com/BenTheDesigner/Dropbox/blob/master/Dropbox/API.php#L80-110
 */
function putFile($path, $data){
	
	// Create a temporary file and write some data to it
	$tmp = tempnam('/tmp', 'dropbox');
	
	file_put_contents($tmp, $data);

	// split the path and file name
	$path_parts = pathinfo($path);
	$filepath = $path_parts['dirname'];
	$filename = $path_parts['basename'];
	
	// Upload the file with an alternative filename
	$put = getDropbox()->putFile($tmp, $filename, $filepath);
	
	// Unlink the temporary file
	unlink($tmp);

	return $put !== NULL;
}
/**
 * delete a file or folder from the authenticated user's Dropbox
 */
function deleteFile($path){
	// Upload the file with an alternative filename
	$put = getDropbox()->delete($path);
	return $put !== NULL;
}
/**
 * Creates a folder
 * @param string New folder to create relative to root
 */
function createFolder($path){
	// Upload the file with an alternative filename
	$put = getDropbox()->create($path);
	return $put !== NULL;
}


?>
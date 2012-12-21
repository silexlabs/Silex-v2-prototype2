package silex.file;

typedef InstallStatus = {
	redirect: Null<String>,
	version: Null<String>,
	latest_version: Null<String>,
}


/**
 * this class let you manipulate files on the server
 * it has server side and client side implementations
 */
#if silexServerSide
	#if silexDropboxMode
		typedef FileService = silex.file.dropbox.FileService;
	#else
		typedef FileService = silex.file.server.FileService;
	#end
#else
	typedef FileService = silex.file.client.FileService;
#end
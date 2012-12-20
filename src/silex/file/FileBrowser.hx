package silex.file;

#if silexDropboxMode
	typedef FileBrowser = silex.file.dropbox.FileBrowser;
#else
	typedef FileBrowser = silex.file.kcfinder.FileBrowser;
#end

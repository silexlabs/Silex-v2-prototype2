package silex.config;

/**
 * used to store the config of the client app
 */
typedef ClientConfig = {
	/**
	 * Config data
	 * Default file to edit
	 */
	public var defaultFile:String;
	/**
	 * Config data
	 * path of the user folder, i.e. the folder where all files are stored
	 */
	public var userFolder:String;
}
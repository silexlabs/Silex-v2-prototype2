package silex.util;

/**
 * Generic helper functions
 */
class SilexTools{
	/**
	 * Cleanup a name so that it can be used as a page name and file name
	 */
	static public function cleanupName(name:String):String {
		return name.toLowerCase().split(" ").join("-")
			.split("'").join("-")
			.split("\"").join("");
	}
}
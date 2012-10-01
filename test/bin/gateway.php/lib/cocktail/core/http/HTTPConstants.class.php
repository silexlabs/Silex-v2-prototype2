<?php

class cocktail_core_http_HTTPConstants {
	public function __construct() { if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.http.HTTPConstants::new");
		$»spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}}
	static $UNSENT = 0;
	static $OPENED = 1;
	static $HEADERS_RECEIVED = 2;
	static $LOADING = 3;
	static $DONE = 4;
	static $CONNECT = "connect";
	static $DELETE = "delete";
	static $GET = "get";
	static $HEAD = "head";
	static $OPTIONS = "options";
	static $POST = "post";
	static $PUT = "put";
	static $TRACE = "trace";
	static $TRACK = "track";
	static $TYPE_TEXT = "text";
	static $TYPE_ARRAY_BUFFER = "arraybuffer";
	static $TYPE_BLOB = "blob";
	static $TYPE_DOCUMENT = "document";
	static $TYPE_JSON = "json";
	static $ACCEPT_CHARSET = "accept-charset";
	static $ACCEPT_ENCODING = "accept-encoding";
	static $ACCESS_CONTROL_REQUEST_HEADERS = "access-control-request-headers";
	static $ACCESS_CONTROL_REQUEST_METHOD = "access-control-request-method";
	static $CONNECTION = "connection";
	static $CONTENT_LENGTH = "content-length";
	static $COOKIE = "cookie";
	static $COOKIE_2 = "cookie2";
	static $CONTENT_TRANSFER_ENCODING = "content-transfer-encoding";
	static $DATE = "date";
	static $EXPECT = "expect";
	static $HOST = "host";
	static $KEEP_ALIVE = "keep-alive";
	static $ORIGIN = "origin";
	static $REFERER = "referer";
	static $TE = "te";
	static $TRAILER = "trailer";
	static $TRANSFER_ENCODING = "transfer-encoding";
	static $UPGRADE = "upgrade";
	static $USER_AGENT = "user-agent";
	static $VIA = "via";
	static $PROXY = "proxy-";
	static $SEC = "sec-";
	function __toString() { return 'cocktail.core.http.HTTPConstants'; }
}

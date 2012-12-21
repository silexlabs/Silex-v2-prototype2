<?php

class sys_io_File {
	public function __construct(){}
	static function getContent($path) {
		$GLOBALS['%s']->push("sys.io.File::getContent");
		$�spos = $GLOBALS['%s']->length;
		{
			$�tmp = file_get_contents($path);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function getBytes($path) {
		$GLOBALS['%s']->push("sys.io.File::getBytes");
		$�spos = $GLOBALS['%s']->length;
		{
			$�tmp = haxe_io_Bytes::ofString(sys_io_File::getContent($path));
			$GLOBALS['%s']->pop();
			return $�tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function saveContent($path, $content) {
		$GLOBALS['%s']->push("sys.io.File::saveContent");
		$�spos = $GLOBALS['%s']->length;
		file_put_contents($path, $content);
		$GLOBALS['%s']->pop();
	}
	static function saveBytes($path, $bytes) {
		$GLOBALS['%s']->push("sys.io.File::saveBytes");
		$�spos = $GLOBALS['%s']->length;
		$f = sys_io_File::write($path, null);
		$f->write($bytes);
		$f->close();
		$GLOBALS['%s']->pop();
	}
	static function read($path, $binary = null) {
		$GLOBALS['%s']->push("sys.io.File::read");
		$�spos = $GLOBALS['%s']->length;
		if($binary === null) {
			$binary = true;
		}
		{
			$�tmp = new sys_io_FileInput(fopen($path, (($binary) ? "rb" : "r")));
			$GLOBALS['%s']->pop();
			return $�tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function write($path, $binary = null) {
		$GLOBALS['%s']->push("sys.io.File::write");
		$�spos = $GLOBALS['%s']->length;
		if($binary === null) {
			$binary = true;
		}
		{
			$�tmp = new sys_io_FileOutput(fopen($path, (($binary) ? "wb" : "w")));
			$GLOBALS['%s']->pop();
			return $�tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function append($path, $binary = null) {
		$GLOBALS['%s']->push("sys.io.File::append");
		$�spos = $GLOBALS['%s']->length;
		if($binary === null) {
			$binary = true;
		}
		{
			$�tmp = new sys_io_FileOutput(fopen($path, (($binary) ? "ab" : "a")));
			$GLOBALS['%s']->pop();
			return $�tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function copy($src, $dst) {
		$GLOBALS['%s']->push("sys.io.File::copy");
		$�spos = $GLOBALS['%s']->length;
		copy($src, $dst);
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'sys.io.File'; }
}

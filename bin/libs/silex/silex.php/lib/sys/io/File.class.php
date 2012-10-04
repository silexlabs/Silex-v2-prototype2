<?php

class sys_io_File {
	public function __construct(){}
	static function getContent($path) {
		$GLOBALS['%s']->push("sys.io.File::getContent");
		$製pos = $GLOBALS['%s']->length;
		{
			$裨mp = file_get_contents($path);
			$GLOBALS['%s']->pop();
			return $裨mp;
		}
		$GLOBALS['%s']->pop();
	}
	static function getBytes($path) {
		$GLOBALS['%s']->push("sys.io.File::getBytes");
		$製pos = $GLOBALS['%s']->length;
		{
			$裨mp = haxe_io_Bytes::ofString(sys_io_File::getContent($path));
			$GLOBALS['%s']->pop();
			return $裨mp;
		}
		$GLOBALS['%s']->pop();
	}
	static function saveContent($path, $content) {
		$GLOBALS['%s']->push("sys.io.File::saveContent");
		$製pos = $GLOBALS['%s']->length;
		file_put_contents($path, $content);
		$GLOBALS['%s']->pop();
	}
	static function saveBytes($path, $bytes) {
		$GLOBALS['%s']->push("sys.io.File::saveBytes");
		$製pos = $GLOBALS['%s']->length;
		$f = sys_io_File::write($path, null);
		$f->write($bytes);
		$f->close();
		$GLOBALS['%s']->pop();
	}
	static function read($path, $binary = null) {
		$GLOBALS['%s']->push("sys.io.File::read");
		$製pos = $GLOBALS['%s']->length;
		if($binary === null) {
			$binary = true;
		}
		{
			$裨mp = new sys_io_FileInput(fopen($path, (($binary) ? "rb" : "r")));
			$GLOBALS['%s']->pop();
			return $裨mp;
		}
		$GLOBALS['%s']->pop();
	}
	static function write($path, $binary = null) {
		$GLOBALS['%s']->push("sys.io.File::write");
		$製pos = $GLOBALS['%s']->length;
		if($binary === null) {
			$binary = true;
		}
		{
			$裨mp = new sys_io_FileOutput(fopen($path, (($binary) ? "wb" : "w")));
			$GLOBALS['%s']->pop();
			return $裨mp;
		}
		$GLOBALS['%s']->pop();
	}
	static function append($path, $binary = null) {
		$GLOBALS['%s']->push("sys.io.File::append");
		$製pos = $GLOBALS['%s']->length;
		if($binary === null) {
			$binary = true;
		}
		{
			$裨mp = new sys_io_FileOutput(fopen($path, (($binary) ? "ab" : "a")));
			$GLOBALS['%s']->pop();
			return $裨mp;
		}
		$GLOBALS['%s']->pop();
	}
	static function copy($src, $dst) {
		$GLOBALS['%s']->push("sys.io.File::copy");
		$製pos = $GLOBALS['%s']->length;
		copy($src, $dst);
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'sys.io.File'; }
}

<?php

class Sys {
	public function __construct(){}
	static function hprint($v) {
		$GLOBALS['%s']->push("Sys::print");
		$製pos = $GLOBALS['%s']->length;
		echo(Std::string($v));
		$GLOBALS['%s']->pop();
	}
	static function println($v) {
		$GLOBALS['%s']->push("Sys::println");
		$製pos = $GLOBALS['%s']->length;
		Sys::hprint($v);
		Sys::hprint("\x0A");
		$GLOBALS['%s']->pop();
	}
	static function args() {
		$GLOBALS['%s']->push("Sys::args");
		$製pos = $GLOBALS['%s']->length;
		{
			$裨mp = ((array_key_exists("argv", $_SERVER)) ? new _hx_array(array_slice($_SERVER["argv"], 1)) : new _hx_array(array()));
			$GLOBALS['%s']->pop();
			return $裨mp;
		}
		$GLOBALS['%s']->pop();
	}
	static function getEnv($s) {
		$GLOBALS['%s']->push("Sys::getEnv");
		$製pos = $GLOBALS['%s']->length;
		{
			$裨mp = getenv($s);
			$GLOBALS['%s']->pop();
			return $裨mp;
		}
		$GLOBALS['%s']->pop();
	}
	static function putEnv($s, $v) {
		$GLOBALS['%s']->push("Sys::putEnv");
		$製pos = $GLOBALS['%s']->length;
		{
			$裨mp = putenv($s . "=" . $v);
			$GLOBALS['%s']->pop();
			$裨mp;
			return;
		}
		$GLOBALS['%s']->pop();
	}
	static function sleep($seconds) {
		$GLOBALS['%s']->push("Sys::sleep");
		$製pos = $GLOBALS['%s']->length;
		{
			$裨mp = usleep($seconds * 1000000);
			$GLOBALS['%s']->pop();
			$裨mp;
			return;
		}
		$GLOBALS['%s']->pop();
	}
	static function setTimeLocale($loc) {
		$GLOBALS['%s']->push("Sys::setTimeLocale");
		$製pos = $GLOBALS['%s']->length;
		{
			$裨mp = setlocale(LC_TIME, $loc) !== false;
			$GLOBALS['%s']->pop();
			return $裨mp;
		}
		$GLOBALS['%s']->pop();
	}
	static function getCwd() {
		$GLOBALS['%s']->push("Sys::getCwd");
		$製pos = $GLOBALS['%s']->length;
		$cwd = getcwd();
		$l = _hx_substr($cwd, -1, null);
		{
			$裨mp = $cwd . ((($l === "/" || $l === "\\") ? "" : "/"));
			$GLOBALS['%s']->pop();
			return $裨mp;
		}
		$GLOBALS['%s']->pop();
	}
	static function setCwd($s) {
		$GLOBALS['%s']->push("Sys::setCwd");
		$製pos = $GLOBALS['%s']->length;
		chdir($s);
		$GLOBALS['%s']->pop();
	}
	static function systemName() {
		$GLOBALS['%s']->push("Sys::systemName");
		$製pos = $GLOBALS['%s']->length;
		$s = php_uname("s");
		$p = null;
		if(($p = _hx_index_of($s, " ", null)) >= 0) {
			$裨mp = _hx_substr($s, 0, $p);
			$GLOBALS['%s']->pop();
			return $裨mp;
		} else {
			$GLOBALS['%s']->pop();
			return $s;
		}
		$GLOBALS['%s']->pop();
	}
	static function escapeArgument($arg) {
		$GLOBALS['%s']->push("Sys::escapeArgument");
		$製pos = $GLOBALS['%s']->length;
		$ok = true;
		{
			$_g1 = 0; $_g = strlen($arg);
			while($_g1 < $_g) {
				$i = $_g1++;
				switch(_hx_char_code_at($arg, $i)) {
				case 32:case 34:{
					$ok = false;
				}break;
				case 0:case 13:case 10:{
					$arg = _hx_substr($arg, 0, $i);
				}break;
				}
				unset($i);
			}
		}
		if($ok) {
			$GLOBALS['%s']->pop();
			return $arg;
		}
		{
			$裨mp = "\"" . _hx_explode("\"", $arg)->join("\\\"") . "\"";
			$GLOBALS['%s']->pop();
			return $裨mp;
		}
		$GLOBALS['%s']->pop();
	}
	static function command($cmd, $args = null) {
		$GLOBALS['%s']->push("Sys::command");
		$製pos = $GLOBALS['%s']->length;
		if($args !== null) {
			$cmd = Sys::escapeArgument($cmd);
			{
				$_g = 0;
				while($_g < $args->length) {
					$a = $args[$_g];
					++$_g;
					$cmd .= " " . Sys::escapeArgument($a);
					unset($a);
				}
			}
		}
		$result = 0;
		system($cmd, $result);
		{
			$GLOBALS['%s']->pop();
			return $result;
		}
		$GLOBALS['%s']->pop();
	}
	static function hexit($code) {
		$GLOBALS['%s']->push("Sys::exit");
		$製pos = $GLOBALS['%s']->length;
		exit($code);
		$GLOBALS['%s']->pop();
	}
	static function time() {
		$GLOBALS['%s']->push("Sys::time");
		$製pos = $GLOBALS['%s']->length;
		{
			$裨mp = microtime(true);
			$GLOBALS['%s']->pop();
			return $裨mp;
		}
		$GLOBALS['%s']->pop();
	}
	static function cpuTime() {
		$GLOBALS['%s']->push("Sys::cpuTime");
		$製pos = $GLOBALS['%s']->length;
		{
			$裨mp = microtime(true) - $_SERVER['REQUEST_TIME'];
			$GLOBALS['%s']->pop();
			return $裨mp;
		}
		$GLOBALS['%s']->pop();
	}
	static function executablePath() {
		$GLOBALS['%s']->push("Sys::executablePath");
		$製pos = $GLOBALS['%s']->length;
		{
			$裨mp = $_SERVER['SCRIPT_FILENAME'];
			$GLOBALS['%s']->pop();
			return $裨mp;
		}
		$GLOBALS['%s']->pop();
	}
	static function environment() {
		$GLOBALS['%s']->push("Sys::environment");
		$製pos = $GLOBALS['%s']->length;
		{
			$裨mp = php_Lib::hashOfAssociativeArray($_SERVER);
			$GLOBALS['%s']->pop();
			return $裨mp;
		}
		$GLOBALS['%s']->pop();
	}
	static function stdin() {
		$GLOBALS['%s']->push("Sys::stdin");
		$製pos = $GLOBALS['%s']->length;
		{
			$裨mp = new sys_io_FileInput(fopen("php://stdin", "r"));
			$GLOBALS['%s']->pop();
			return $裨mp;
		}
		$GLOBALS['%s']->pop();
	}
	static function stdout() {
		$GLOBALS['%s']->push("Sys::stdout");
		$製pos = $GLOBALS['%s']->length;
		{
			$裨mp = new sys_io_FileOutput(fopen("php://stdout", "w"));
			$GLOBALS['%s']->pop();
			return $裨mp;
		}
		$GLOBALS['%s']->pop();
	}
	static function stderr() {
		$GLOBALS['%s']->push("Sys::stderr");
		$製pos = $GLOBALS['%s']->length;
		{
			$裨mp = new sys_io_FileOutput(fopen("php://stderr", "w"));
			$GLOBALS['%s']->pop();
			return $裨mp;
		}
		$GLOBALS['%s']->pop();
	}
	static function getChar($echo) {
		$GLOBALS['%s']->push("Sys::getChar");
		$製pos = $GLOBALS['%s']->length;
		$v = fgetc(STDIN);
		if($echo) {
			echo($v);
		}
		{
			$GLOBALS['%s']->pop();
			return $v;
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'Sys'; }
}

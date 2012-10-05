<?php

class haxe_Unserializer {
	public function __construct($buf) {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("haxe.Unserializer::new");
		$»spos = $GLOBALS['%s']->length;
		$this->buf = $buf;
		$this->length = strlen($buf);
		$this->pos = 0;
		$this->scache = new _hx_array(array());
		$this->cache = new _hx_array(array());
		$r = haxe_Unserializer::$DEFAULT_RESOLVER;
		if($r === null) {
			$r = _hx_qtype("Type");
			haxe_Unserializer::$DEFAULT_RESOLVER = $r;
		}
		$this->setResolver($r);
		$GLOBALS['%s']->pop();
	}}
	public function unserialize() {
		$GLOBALS['%s']->push("haxe.Unserializer::unserialize");
		$»spos = $GLOBALS['%s']->length;
		switch(ord(substr($this->buf,$this->pos++,1))) {
		case 110:{
			$GLOBALS['%s']->pop();
			return null;
		}break;
		case 116:{
			$GLOBALS['%s']->pop();
			return true;
		}break;
		case 102:{
			$GLOBALS['%s']->pop();
			return false;
		}break;
		case 122:{
			$GLOBALS['%s']->pop();
			return 0;
		}break;
		case 105:{
			$»tmp = $this->readDigits();
			$GLOBALS['%s']->pop();
			return $»tmp;
		}break;
		case 100:{
			$p1 = $this->pos;
			while(true) {
				$c = ord(substr($this->buf,$this->pos,1));
				if($c >= 43 && $c < 58 || $c === 101 || $c === 69) {
					$this->pos++;
				} else {
					break;
				}
				unset($c);
			}
			{
				$»tmp = Std::parseFloat(_hx_substr($this->buf, $p1, $this->pos - $p1));
				$GLOBALS['%s']->pop();
				return $»tmp;
			}
		}break;
		case 121:{
			$len = $this->readDigits();
			if(ord(substr($this->buf,$this->pos++,1)) !== 58 || $this->length - $this->pos < $len) {
				throw new HException("Invalid string length");
			}
			$s = _hx_substr($this->buf, $this->pos, $len);
			$this->pos += $len;
			$s = urldecode($s);
			$this->scache->push($s);
			{
				$GLOBALS['%s']->pop();
				return $s;
			}
		}break;
		case 107:{
			$»tmp = Math::$NaN;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}break;
		case 109:{
			$»tmp = Math::$NEGATIVE_INFINITY;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}break;
		case 112:{
			$»tmp = Math::$POSITIVE_INFINITY;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}break;
		case 97:{
			$buf = $this->buf;
			$a = new _hx_array(array());
			$this->cache->push($a);
			while(true) {
				$c = ord(substr($this->buf,$this->pos,1));
				if($c === 104) {
					$this->pos++;
					break;
				}
				if($c === 117) {
					$this->pos++;
					$n = $this->readDigits();
					$a[$a->length + $n - 1] = null;
					unset($n);
				} else {
					$a->push($this->unserialize());
				}
				unset($c);
			}
			{
				$GLOBALS['%s']->pop();
				return $a;
			}
		}break;
		case 111:{
			$o = _hx_anonymous(array());
			$this->cache->push($o);
			$this->unserializeObject($o);
			{
				$GLOBALS['%s']->pop();
				return $o;
			}
		}break;
		case 114:{
			$n = $this->readDigits();
			if($n < 0 || $n >= $this->cache->length) {
				throw new HException("Invalid reference");
			}
			{
				$»tmp = $this->cache[$n];
				$GLOBALS['%s']->pop();
				return $»tmp;
			}
		}break;
		case 82:{
			$n = $this->readDigits();
			if($n < 0 || $n >= $this->scache->length) {
				throw new HException("Invalid string reference");
			}
			{
				$»tmp = $this->scache[$n];
				$GLOBALS['%s']->pop();
				return $»tmp;
			}
		}break;
		case 120:{
			throw new HException($this->unserialize());
		}break;
		case 99:{
			$name = $this->unserialize();
			$cl = $this->resolver->resolveClass($name);
			if($cl === null) {
				throw new HException("Class not found " . $name);
			}
			$o = Type::createEmptyInstance($cl);
			$this->cache->push($o);
			$this->unserializeObject($o);
			{
				$GLOBALS['%s']->pop();
				return $o;
			}
		}break;
		case 119:{
			$name = $this->unserialize();
			$edecl = $this->resolver->resolveEnum($name);
			if($edecl === null) {
				throw new HException("Enum not found " . $name);
			}
			$e = $this->unserializeEnum($edecl, $this->unserialize());
			$this->cache->push($e);
			{
				$GLOBALS['%s']->pop();
				return $e;
			}
		}break;
		case 106:{
			$name = $this->unserialize();
			$edecl = $this->resolver->resolveEnum($name);
			if($edecl === null) {
				throw new HException("Enum not found " . $name);
			}
			$this->pos++;
			$index = $this->readDigits();
			$tag = _hx_array_get(Type::getEnumConstructs($edecl), $index);
			if($tag === null) {
				throw new HException("Unknown enum index " . $name . "@" . _hx_string_rec($index, ""));
			}
			$e = $this->unserializeEnum($edecl, $tag);
			$this->cache->push($e);
			{
				$GLOBALS['%s']->pop();
				return $e;
			}
		}break;
		case 108:{
			$l = new HList();
			$this->cache->push($l);
			$buf = $this->buf;
			while(ord(substr($this->buf,$this->pos,1)) !== 104) {
				$l->add($this->unserialize());
			}
			$this->pos++;
			{
				$GLOBALS['%s']->pop();
				return $l;
			}
		}break;
		case 98:{
			$h = new Hash();
			$this->cache->push($h);
			$buf = $this->buf;
			while(ord(substr($this->buf,$this->pos,1)) !== 104) {
				$s = $this->unserialize();
				$h->set($s, $this->unserialize());
				unset($s);
			}
			$this->pos++;
			{
				$GLOBALS['%s']->pop();
				return $h;
			}
		}break;
		case 113:{
			$h = new IntHash();
			$this->cache->push($h);
			$buf = $this->buf;
			$c = ord(substr($this->buf,$this->pos++,1));
			while($c === 58) {
				$i = $this->readDigits();
				$h->set($i, $this->unserialize());
				$c = ord(substr($this->buf,$this->pos++,1));
				unset($i);
			}
			if($c !== 104) {
				throw new HException("Invalid IntHash format");
			}
			{
				$GLOBALS['%s']->pop();
				return $h;
			}
		}break;
		case 118:{
			$d = Date::fromString(_hx_substr($this->buf, $this->pos, 19));
			$this->cache->push($d);
			$this->pos += 19;
			{
				$GLOBALS['%s']->pop();
				return $d;
			}
		}break;
		case 115:{
			$len = $this->readDigits();
			$buf = $this->buf;
			if(ord(substr($this->buf,$this->pos++,1)) !== 58 || $this->length - $this->pos < $len) {
				throw new HException("Invalid bytes length");
			}
			$codes = haxe_Unserializer::$CODES;
			if($codes === null) {
				$codes = haxe_Unserializer::initCodes();
				haxe_Unserializer::$CODES = $codes;
			}
			$i = $this->pos;
			$rest = $len & 3;
			$size = ($len >> 2) * 3 + (haxe_Unserializer_0($this, $buf, $codes, $i, $len, $rest));
			$max = $i + ($len - $rest);
			$bytes = haxe_io_Bytes::alloc($size);
			$bpos = 0;
			while($i < $max) {
				$c1 = $codes[ord(substr($buf,$i++,1))];
				$c2 = $codes[ord(substr($buf,$i++,1))];
				$bytes->b[$bpos++] = chr($c1 << 2 | $c2 >> 4);
				$c3 = $codes[ord(substr($buf,$i++,1))];
				$bytes->b[$bpos++] = chr($c2 << 4 | $c3 >> 2);
				$c4 = $codes[ord(substr($buf,$i++,1))];
				$bytes->b[$bpos++] = chr($c3 << 6 | $c4);
				unset($c4,$c3,$c2,$c1);
			}
			if($rest >= 2) {
				$c1 = $codes[ord(substr($buf,$i++,1))];
				$c2 = $codes[ord(substr($buf,$i++,1))];
				$bytes->b[$bpos++] = chr($c1 << 2 | $c2 >> 4);
				if($rest === 3) {
					$c3 = $codes[ord(substr($buf,$i++,1))];
					$bytes->b[$bpos++] = chr($c2 << 4 | $c3 >> 2);
				}
			}
			$this->pos += $len;
			$this->cache->push($bytes);
			{
				$GLOBALS['%s']->pop();
				return $bytes;
			}
		}break;
		case 67:{
			$name = $this->unserialize();
			$cl = $this->resolver->resolveClass($name);
			if($cl === null) {
				throw new HException("Class not found " . $name);
			}
			$o = Type::createEmptyInstance($cl);
			$this->cache->push($o);
			$o->hxUnserialize($this);
			if(ord(substr($this->buf,$this->pos++,1)) !== 103) {
				throw new HException("Invalid custom data");
			}
			{
				$GLOBALS['%s']->pop();
				return $o;
			}
		}break;
		default:{
		}break;
		}
		$this->pos--;
		throw new HException("Invalid char " . _hx_char_at($this->buf, $this->pos) . " at position " . _hx_string_rec($this->pos, ""));
		$GLOBALS['%s']->pop();
	}
	public function unserializeEnum($edecl, $tag) {
		$GLOBALS['%s']->push("haxe.Unserializer::unserializeEnum");
		$»spos = $GLOBALS['%s']->length;
		if(ord(substr($this->buf,$this->pos++,1)) !== 58) {
			throw new HException("Invalid enum format");
		}
		$nargs = $this->readDigits();
		if($nargs === 0) {
			$»tmp = Type::createEnum($edecl, $tag, null);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$args = new _hx_array(array());
		while($nargs-- > 0) {
			$args->push($this->unserialize());
		}
		{
			$»tmp = Type::createEnum($edecl, $tag, $args);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function unserializeObject($o) {
		$GLOBALS['%s']->push("haxe.Unserializer::unserializeObject");
		$»spos = $GLOBALS['%s']->length;
		while(true) {
			if($this->pos >= $this->length) {
				throw new HException("Invalid object");
			}
			if(ord(substr($this->buf,$this->pos,1)) === 103) {
				break;
			}
			$k = $this->unserialize();
			if(!Std::is($k, _hx_qtype("String"))) {
				throw new HException("Invalid object key");
			}
			$v = $this->unserialize();
			$o->{$k} = $v;
			unset($v,$k);
		}
		$this->pos++;
		$GLOBALS['%s']->pop();
	}
	public function readDigits() {
		$GLOBALS['%s']->push("haxe.Unserializer::readDigits");
		$»spos = $GLOBALS['%s']->length;
		$k = 0;
		$s = false;
		$fpos = $this->pos;
		while(true) {
			$c = ord(substr($this->buf,$this->pos,1));
			if(($c === 0)) {
				break;
			}
			if($c === 45) {
				if($this->pos !== $fpos) {
					break;
				}
				$s = true;
				$this->pos++;
				continue;
			}
			if($c < 48 || $c > 57) {
				break;
			}
			$k = $k * 10 + ($c - 48);
			$this->pos++;
			unset($c);
		}
		if($s) {
			$k *= -1;
		}
		{
			$GLOBALS['%s']->pop();
			return $k;
		}
		$GLOBALS['%s']->pop();
	}
	public function get($p) {
		$GLOBALS['%s']->push("haxe.Unserializer::get");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = ord(substr($this->buf,$p,1));
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getResolver() {
		$GLOBALS['%s']->push("haxe.Unserializer::getResolver");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->resolver;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function setResolver($r) {
		$GLOBALS['%s']->push("haxe.Unserializer::setResolver");
		$»spos = $GLOBALS['%s']->length;
		if($r === null) {
			$this->resolver = _hx_anonymous(array("resolveClass" => array(new _hx_lambda(array(&$r), "haxe_Unserializer_1"), 'execute'), "resolveEnum" => array(new _hx_lambda(array(&$r), "haxe_Unserializer_2"), 'execute')));
		} else {
			$this->resolver = $r;
		}
		$GLOBALS['%s']->pop();
	}
	public $resolver;
	public $scache;
	public $cache;
	public $length;
	public $pos;
	public $buf;
	public function __call($m, $a) {
		if(isset($this->$m) && is_callable($this->$m))
			return call_user_func_array($this->$m, $a);
		else if(isset($this->»dynamics[$m]) && is_callable($this->»dynamics[$m]))
			return call_user_func_array($this->»dynamics[$m], $a);
		else if('toString' == $m)
			return $this->__toString();
		else
			throw new HException('Unable to call «'.$m.'»');
	}
	static $DEFAULT_RESOLVER;
	static $BASE64 = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789%:";
	static $CODES = null;
	static function initCodes() {
		$GLOBALS['%s']->push("haxe.Unserializer::initCodes");
		$»spos = $GLOBALS['%s']->length;
		$codes = new _hx_array(array());
		{
			$_g1 = 0; $_g = strlen(haxe_Unserializer::$BASE64);
			while($_g1 < $_g) {
				$i = $_g1++;
				$codes[ord(substr(haxe_Unserializer::$BASE64,$i,1))] = $i;
				unset($i);
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $codes;
		}
		$GLOBALS['%s']->pop();
	}
	static function run($v) {
		$GLOBALS['%s']->push("haxe.Unserializer::run");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = _hx_deref(new haxe_Unserializer($v))->unserialize();
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'haxe.Unserializer'; }
}
haxe_Unserializer::$DEFAULT_RESOLVER = _hx_qtype("Type");
function haxe_Unserializer_0(&$»this, &$buf, &$codes, &$i, &$len, &$rest) {
	$»spos = $GLOBALS['%s']->length;
	if($rest >= 2) {
		return $rest - 1;
	} else {
		return 0;
	}
}
function haxe_Unserializer_1(&$r, $_) {
	$»spos = $GLOBALS['%s']->length;
	{
		$GLOBALS['%s']->push("haxe.Unserializer::setResolver@84");
		$»spos2 = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return null;
		}
		$GLOBALS['%s']->pop();
	}
}
function haxe_Unserializer_2(&$r, $_) {
	$»spos = $GLOBALS['%s']->length;
	{
		$GLOBALS['%s']->push("haxe.Unserializer::setResolver@85");
		$»spos2 = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return null;
		}
		$GLOBALS['%s']->pop();
	}
}

<?php

class lib_hxtml_CssParser {
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("lib.hxtml.CssParser::new");
		$퍀pos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}}
	public function readToken() {
		$GLOBALS['%s']->push("lib.hxtml.CssParser::readToken");
		$퍀pos = $GLOBALS['%s']->length;
		$t = $this->tokens->pop();
		if($t !== null) {
			$GLOBALS['%s']->pop();
			return $t;
		}
		while(true) {
			$c = ord(substr($this->css,$this->pos++,1));
			if(($c === 0)) {
				$퍁mp = lib_hxtml_Token::$TEof;
				$GLOBALS['%s']->pop();
				return $퍁mp;
				unset($퍁mp);
			}
			if($c === 32 || $c === 10 || $c === 13 || $c === 9) {
				if($this->spacesTokens) {
					while(lib_hxtml_CssParser_0($this, $c, $t)) {
					}
					$this->pos--;
					{
						$퍁mp = lib_hxtml_Token::$TSpaces;
						$GLOBALS['%s']->pop();
						return $퍁mp;
						unset($퍁mp);
					}
				}
				continue;
			}
			if($c >= 97 && $c <= 122 || $c >= 65 && $c <= 90 || $c === 45) {
				$pos = $this->pos - 1;
				do {
					$c = ord(substr($this->css,$this->pos++,1));
				} while($c >= 97 && $c <= 122 || $c >= 65 && $c <= 90 || $c === 45);
				$this->pos--;
				{
					$퍁mp = lib_hxtml_Token::TIdent(strtolower(_hx_substr($this->css, $pos, $this->pos - $pos)));
					$GLOBALS['%s']->pop();
					return $퍁mp;
					unset($퍁mp);
				}
				unset($pos);
			}
			if($c >= 48 && $c <= 57) {
				$i = 0;
				do {
					$i = $i * 10 + ($c - 48);
					$c = ord(substr($this->css,$this->pos++,1));
				} while($c >= 48 && $c <= 57);
				if($c === 46) {
					$f = $i;
					$k = 0.1;
					while(lib_hxtml_CssParser_1($this, $c, $f, $i, $k, $t)) {
						$f += ($c - 48) * $k;
						$k *= 0.1;
					}
					$this->pos--;
					{
						$퍁mp = lib_hxtml_Token::TFloat($f);
						$GLOBALS['%s']->pop();
						return $퍁mp;
						unset($퍁mp);
					}
					unset($k,$f);
				}
				$this->pos--;
				{
					$퍁mp = lib_hxtml_Token::TInt($i);
					$GLOBALS['%s']->pop();
					return $퍁mp;
					unset($퍁mp);
				}
				unset($i);
			}
			switch($c) {
			case 58:{
				$퍁mp = lib_hxtml_Token::$TDblDot;
				$GLOBALS['%s']->pop();
				return $퍁mp;
			}break;
			case 35:{
				$퍁mp = lib_hxtml_Token::$TSharp;
				$GLOBALS['%s']->pop();
				return $퍁mp;
			}break;
			case 40:{
				$퍁mp = lib_hxtml_Token::$TPOpen;
				$GLOBALS['%s']->pop();
				return $퍁mp;
			}break;
			case 41:{
				$퍁mp = lib_hxtml_Token::$TPClose;
				$GLOBALS['%s']->pop();
				return $퍁mp;
			}break;
			case 33:{
				$퍁mp = lib_hxtml_Token::$TExclam;
				$GLOBALS['%s']->pop();
				return $퍁mp;
			}break;
			case 37:{
				$퍁mp = lib_hxtml_Token::$TPercent;
				$GLOBALS['%s']->pop();
				return $퍁mp;
			}break;
			case 59:{
				$퍁mp = lib_hxtml_Token::$TSemicolon;
				$GLOBALS['%s']->pop();
				return $퍁mp;
			}break;
			case 46:{
				$퍁mp = lib_hxtml_Token::$TDot;
				$GLOBALS['%s']->pop();
				return $퍁mp;
			}break;
			case 123:{
				$퍁mp = lib_hxtml_Token::$TBrOpen;
				$GLOBALS['%s']->pop();
				return $퍁mp;
			}break;
			case 125:{
				$퍁mp = lib_hxtml_Token::$TBrClose;
				$GLOBALS['%s']->pop();
				return $퍁mp;
			}break;
			case 44:{
				$퍁mp = lib_hxtml_Token::$TComma;
				$GLOBALS['%s']->pop();
				return $퍁mp;
			}break;
			case 47:{
				if(($c = ord(substr($this->css,$this->pos++,1))) !== 42) {
					$this->pos--;
					{
						$퍁mp = lib_hxtml_Token::$TSlash;
						$GLOBALS['%s']->pop();
						return $퍁mp;
					}
				}
				while(true) {
					while(($c = ord(substr($this->css,$this->pos++,1))) !== 42) {
						if(($c === 0)) {
							throw new HException("Unclosed comment");
						}
					}
					$c = ord(substr($this->css,$this->pos++,1));
					if($c === 47) {
						break;
					}
					if(($c === 0)) {
						throw new HException("Unclosed comment");
					}
				}
				{
					$퍁mp = $this->readToken();
					$GLOBALS['%s']->pop();
					return $퍁mp;
				}
			}break;
			case 39:case 34:{
				$pos = $this->pos;
				$k = null;
				while(($k = ord(substr($this->css,$this->pos++,1))) !== $c) {
					if(($k === 0)) {
						throw new HException("Unclosed string constant");
					}
					if($k === 92) {
						throw new HException("todo");
						continue;
					}
				}
				{
					$퍁mp = lib_hxtml_Token::TString(_hx_substr($this->css, $pos, $this->pos - $pos - 1));
					$GLOBALS['%s']->pop();
					return $퍁mp;
				}
			}break;
			default:{
			}break;
			}
			$this->pos--;
			throw new HException("Invalid char " . _hx_char_at($this->css, $this->pos));
			unset($c);
		}
		{
			$GLOBALS['%s']->pop();
			return null;
		}
		$GLOBALS['%s']->pop();
	}
	public function readRGB() {
		$GLOBALS['%s']->push("lib.hxtml.CssParser::readRGB");
		$퍀pos = $GLOBALS['%s']->length;
		$c = ord(substr($this->css,$this->pos++,1));
		while($c === 32 || $c === 10 || $c === 13 || $c === 9) {
			$c = ord(substr($this->css,$this->pos++,1));
		}
		$start = $this->pos - 1;
		while(true) {
			if(($c === 0)) {
				break;
			}
			$c = ord(substr($this->css,$this->pos++,1));
			if($c === 41) {
				break;
			}
		}
		{
			$퍁mp = trim(_hx_substr($this->css, $start, $this->pos - $start - 1));
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}
		$GLOBALS['%s']->pop();
	}
	public function readRGBA() {
		$GLOBALS['%s']->push("lib.hxtml.CssParser::readRGBA");
		$퍀pos = $GLOBALS['%s']->length;
		$c = ord(substr($this->css,$this->pos++,1));
		while($c === 32 || $c === 10 || $c === 13 || $c === 9) {
			$c = ord(substr($this->css,$this->pos++,1));
		}
		$start = $this->pos - 1;
		while(true) {
			if(($c === 0)) {
				break;
			}
			$c = ord(substr($this->css,$this->pos++,1));
			if($c === 41) {
				break;
			}
		}
		{
			$퍁mp = trim(_hx_substr($this->css, $start, $this->pos - $start - 1));
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}
		$GLOBALS['%s']->pop();
	}
	public function readUrl() {
		$GLOBALS['%s']->push("lib.hxtml.CssParser::readUrl");
		$퍀pos = $GLOBALS['%s']->length;
		$c0 = ord(substr($this->css,$this->pos++,1));
		while($c0 === 32 || $c0 === 10 || $c0 === 13 || $c0 === 9) {
			$c0 = ord(substr($this->css,$this->pos++,1));
		}
		$quote = $c0;
		if($quote === 39 || $quote === 34) {
			$this->pos--;
			$퍁 = ($this->readToken());
			switch($퍁->index) {
			case 1:
			$s = $퍁->params[0];
			{
				$c01 = ord(substr($this->css,$this->pos++,1));
				while($c01 === 32 || $c01 === 10 || $c01 === 13 || $c01 === 9) {
					$c01 = ord(substr($this->css,$this->pos++,1));
				}
				if($c01 !== 41) {
					throw new HException("Invalid char " . chr($c01));
				}
				{
					$GLOBALS['%s']->pop();
					return $s;
				}
			}break;
			default:{
				throw new HException("assert");
			}break;
			}
		}
		$start = $this->pos - 1;
		while(true) {
			if(($c0 === 0)) {
				break;
			}
			$c0 = ord(substr($this->css,$this->pos++,1));
			if($c0 === 41) {
				break;
			}
		}
		{
			$퍁mp = trim(_hx_substr($this->css, $start, $this->pos - $start - 1));
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}
		$GLOBALS['%s']->pop();
	}
	public function next() {
		$GLOBALS['%s']->push("lib.hxtml.CssParser::next");
		$퍀pos = $GLOBALS['%s']->length;
		{
			$퍁mp = ord(substr($this->css,$this->pos++,1));
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}
		$GLOBALS['%s']->pop();
	}
	public function isNum($c) {
		$GLOBALS['%s']->push("lib.hxtml.CssParser::isNum");
		$퍀pos = $GLOBALS['%s']->length;
		{
			$퍁mp = $c >= 48 && $c <= 57;
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}
		$GLOBALS['%s']->pop();
	}
	public function isIdentChar($c) {
		$GLOBALS['%s']->push("lib.hxtml.CssParser::isIdentChar");
		$퍀pos = $GLOBALS['%s']->length;
		{
			$퍁mp = $c >= 97 && $c <= 122 || $c >= 65 && $c <= 90 || $c === 45;
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}
		$GLOBALS['%s']->pop();
	}
	public function isSpace($c) {
		$GLOBALS['%s']->push("lib.hxtml.CssParser::isSpace");
		$퍀pos = $GLOBALS['%s']->length;
		{
			$퍁mp = $c === 32 || $c === 10 || $c === 13 || $c === 9;
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}
		$GLOBALS['%s']->pop();
	}
	public function loopComma($v, $v2) {
		$GLOBALS['%s']->push("lib.hxtml.CssParser::loopComma");
		$퍀pos = $GLOBALS['%s']->length;
		{
			$퍁mp = lib_hxtml_CssParser_2($this, $v, $v2);
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}
		$GLOBALS['%s']->pop();
	}
	public function loopNext($v, $v2) {
		$GLOBALS['%s']->push("lib.hxtml.CssParser::loopNext");
		$퍀pos = $GLOBALS['%s']->length;
		{
			$퍁mp = lib_hxtml_CssParser_3($this, $v, $v2);
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}
		$GLOBALS['%s']->pop();
	}
	public function readValueNext($v) {
		$GLOBALS['%s']->push("lib.hxtml.CssParser::readValueNext");
		$퍀pos = $GLOBALS['%s']->length;
		$t = $this->readToken();
		{
			$퍁mp = lib_hxtml_CssParser_4($this, $t, $v);
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}
		$GLOBALS['%s']->pop();
	}
	public function readValueUnit($f, $i = null) {
		$GLOBALS['%s']->push("lib.hxtml.CssParser::readValueUnit");
		$퍀pos = $GLOBALS['%s']->length;
		$t = $this->readToken();
		{
			$퍁mp = lib_hxtml_CssParser_5($this, $f, $i, $t);
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}
		$GLOBALS['%s']->pop();
	}
	public function readHex() {
		$GLOBALS['%s']->push("lib.hxtml.CssParser::readHex");
		$퍀pos = $GLOBALS['%s']->length;
		$start = $this->pos;
		while(true) {
			$c = ord(substr($this->css,$this->pos++,1));
			if($c >= 65 && $c <= 70 || $c >= 97 && $c <= 102 || $c >= 48 && $c <= 57) {
				continue;
			}
			$this->pos--;
			break;
			unset($c);
		}
		{
			$퍁mp = _hx_substr($this->css, $start, $this->pos - $start);
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}
		$GLOBALS['%s']->pop();
	}
	public function readValue($opt = null) {
		$GLOBALS['%s']->push("lib.hxtml.CssParser::readValue");
		$퍀pos = $GLOBALS['%s']->length;
		$t = $this->readToken();
		$v = lib_hxtml_CssParser_6($this, $opt, $t);
		if($v !== null) {
			$v = $this->readValueNext($v);
		}
		{
			$GLOBALS['%s']->pop();
			return $v;
		}
		$GLOBALS['%s']->pop();
	}
	public function readIdent() {
		$GLOBALS['%s']->push("lib.hxtml.CssParser::readIdent");
		$퍀pos = $GLOBALS['%s']->length;
		$t = $this->readToken();
		{
			$퍁mp = lib_hxtml_CssParser_7($this, $t);
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}
		$GLOBALS['%s']->pop();
	}
	public function parseStyle($eof) {
		$GLOBALS['%s']->push("lib.hxtml.CssParser::parseStyle");
		$퍀pos = $GLOBALS['%s']->length;
		while(true) {
			if($this->isToken($eof)) {
				break;
			}
			$r = $this->readIdent();
			$this->expect(lib_hxtml_Token::$TDblDot);
			$v = $this->readValue(null);
			$s = $this->s;
			$퍁 = ($v);
			switch($퍁->index) {
			case 11:
			$val = $퍁->params[1]; $label = $퍁->params[0];
			{
				if($label === "important") {
					$v = $val;
				}
			}break;
			default:{
			}break;
			}
			if(!$this->applyStyle($r, $v, $s)) {
				throw new HException("Invalid value " . Std::string($v) . " for css " . $r);
			}
			if($this->isToken($eof)) {
				break;
			}
			$this->expect(lib_hxtml_Token::$TSemicolon);
			unset($v,$s,$r);
		}
		$GLOBALS['%s']->pop();
	}
	public function parse($css, $d, $s) {
		$GLOBALS['%s']->push("lib.hxtml.CssParser::parse");
		$퍀pos = $GLOBALS['%s']->length;
		$this->css = $css;
		$this->s = $s;
		$this->d = $d;
		$this->pos = 0;
		$this->tokens = new _hx_array(array());
		$this->parseStyle(lib_hxtml_Token::$TEof);
		$GLOBALS['%s']->pop();
	}
	public function isToken($t) {
		$GLOBALS['%s']->push("lib.hxtml.CssParser::isToken");
		$퍀pos = $GLOBALS['%s']->length;
		$tk = $this->readToken();
		if($tk === $t) {
			$GLOBALS['%s']->pop();
			return true;
		}
		$this->tokens->push($tk);
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function push($t) {
		$GLOBALS['%s']->push("lib.hxtml.CssParser::push");
		$퍀pos = $GLOBALS['%s']->length;
		$this->tokens->push($t);
		$GLOBALS['%s']->pop();
	}
	public function expect($t) {
		$GLOBALS['%s']->push("lib.hxtml.CssParser::expect");
		$퍀pos = $GLOBALS['%s']->length;
		$tk = $this->readToken();
		if($tk !== $t) {
			$this->unexpected($tk);
		}
		$GLOBALS['%s']->pop();
	}
	public function unexpected($t) {
		$GLOBALS['%s']->push("lib.hxtml.CssParser::unexpected");
		$퍀pos = $GLOBALS['%s']->length;
		throw new HException("Unexpected " . Std::string($t));
		{
			$GLOBALS['%s']->pop();
			return null;
		}
		$GLOBALS['%s']->pop();
	}
	public function getFontName($v) {
		$GLOBALS['%s']->push("lib.hxtml.CssParser::getFontName");
		$퍀pos = $GLOBALS['%s']->length;
		{
			$퍁mp = lib_hxtml_CssParser_8($this, $v);
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getCol($v) {
		$GLOBALS['%s']->push("lib.hxtml.CssParser::getCol");
		$퍀pos = $GLOBALS['%s']->length;
		{
			$퍁mp = lib_hxtml_CssParser_9($this, $v);
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getIdent($v) {
		$GLOBALS['%s']->push("lib.hxtml.CssParser::getIdent");
		$퍀pos = $GLOBALS['%s']->length;
		{
			$퍁mp = lib_hxtml_CssParser_10($this, $v);
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getPix($v) {
		$GLOBALS['%s']->push("lib.hxtml.CssParser::getPix");
		$퍀pos = $GLOBALS['%s']->length;
		{
			$퍁mp = lib_hxtml_CssParser_11($this, $v);
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getList($v, $f) {
		$GLOBALS['%s']->push("lib.hxtml.CssParser::getList");
		$퍀pos = $GLOBALS['%s']->length;
		$퍁 = ($v);
		switch($퍁->index) {
		case 8:
		$l = $퍁->params[0];
		{
			$a = new _hx_array(array());
			{
				$_g = 0;
				while($_g < $l->length) {
					$v1 = $l[$_g];
					++$_g;
					$v2 = call_user_func_array($f, array($v1));
					if($v2 === null) {
						$GLOBALS['%s']->pop();
						return null;
					}
					$a->push($v2);
					unset($v2,$v1);
				}
			}
			{
				$GLOBALS['%s']->pop();
				return $a;
			}
		}break;
		default:{
			$v1 = call_user_func_array($f, array($v));
			{
				$퍁mp = (($v1 === null) ? null : new _hx_array(array($v1)));
				$GLOBALS['%s']->pop();
				return $퍁mp;
			}
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	public function getGroup($v, $f) {
		$GLOBALS['%s']->push("lib.hxtml.CssParser::getGroup");
		$퍀pos = $GLOBALS['%s']->length;
		$퍁 = ($v);
		switch($퍁->index) {
		case 9:
		$l = $퍁->params[0];
		{
			$a = new _hx_array(array());
			{
				$_g = 0;
				while($_g < $l->length) {
					$v1 = $l[$_g];
					++$_g;
					$v2 = call_user_func_array($f, array($v1));
					if($v2 === null) {
						$GLOBALS['%s']->pop();
						return null;
					}
					$a->push($v2);
					unset($v2,$v1);
				}
			}
			{
				$GLOBALS['%s']->pop();
				return $a;
			}
		}break;
		default:{
			$v1 = call_user_func_array($f, array($v));
			{
				$퍁mp = (($v1 === null) ? null : new _hx_array(array($v1)));
				$GLOBALS['%s']->pop();
				return $퍁mp;
			}
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	public function isNullInt($v) {
		$GLOBALS['%s']->push("lib.hxtml.CssParser::isNullInt");
		$퍀pos = $GLOBALS['%s']->length;
		{
			$퍁mp = lib_hxtml_CssParser_12($this, $v);
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getValueObject($i) {
		$GLOBALS['%s']->push("lib.hxtml.CssParser::getValueObject");
		$퍀pos = $GLOBALS['%s']->length;
		{
			$퍁mp = lib_hxtml_CssParser_13($this, $i);
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}
		$GLOBALS['%s']->pop();
	}
	public function applyComposite($names, $v, $s) {
		$GLOBALS['%s']->push("lib.hxtml.CssParser::applyComposite");
		$퍀pos = $GLOBALS['%s']->length;
		$vl = lib_hxtml_CssParser_14($this, $names, $s, $v);
		while($vl->length > 0) {
			$found = false;
			{
				$_g = 0;
				while($_g < $names->length) {
					$n = $names[$_g];
					++$_g;
					$count = lib_hxtml_CssParser_15($this, $_g, $found, $n, $names, $s, $v, $vl);
					if($count > $vl->length) {
						$count = $vl->length;
					}
					while($count > 0) {
						$v1 = lib_hxtml_CssParser_16($this, $_g, $count, $found, $n, $names, $s, $v, $vl);
						if($this->applyStyle($n, $v1, $s)) {
							$found = true;
							$names->remove($n);
							{
								$_g1 = 0;
								while($_g1 < $count) {
									$i = $_g1++;
									$vl->shift();
									unset($i);
								}
								unset($_g1);
							}
							break;
						}
						$count--;
						unset($v1);
					}
					if($found) {
						break;
					}
					unset($n,$count);
				}
				unset($_g);
			}
			if(!$found) {
				$GLOBALS['%s']->pop();
				return false;
			}
			unset($found);
		}
		{
			$GLOBALS['%s']->pop();
			return true;
		}
		$GLOBALS['%s']->pop();
	}
	public function applyStyle($r, $v, $s) {
		$GLOBALS['%s']->push("lib.hxtml.CssParser::applyStyle");
		$퍀pos = $GLOBALS['%s']->length;
		switch($r) {
		case "margin":{
			$i = $this->isNullInt($v);
			if($i) {
				$s->setMarginBottomZero($this->d);
				$s->setMarginTopZero($this->d);
				$s->setMarginLeftZero($this->d);
				$s->setMarginRightZero($this->d);
				{
					$GLOBALS['%s']->pop();
					return true;
				}
			}
			$vl = lib_hxtml_CssParser_17($this, $i, $r, $s, $v);
			$vUnits = new _hx_array(array());
			{
				$_g = 0;
				while($_g < $vl->length) {
					$i1 = $vl[$_g];
					++$_g;
					$vo = $this->getValueObject($i1);
					if($vo !== null) {
						$vUnits->push($vo);
					}
					unset($vo,$i1);
				}
			}
			switch($vUnits->length) {
			case 1:{
				$s->setMarginTopNum($this->d, _hx_array_get($vUnits, 0)->value, _hx_array_get($vUnits, 0)->unit);
				$s->setMarginRightNum($this->d, _hx_array_get($vUnits, 0)->value, _hx_array_get($vUnits, 0)->unit);
				$s->setMarginBottomNum($this->d, _hx_array_get($vUnits, 0)->value, _hx_array_get($vUnits, 0)->unit);
				$s->setMarginLeftNum($this->d, _hx_array_get($vUnits, 0)->value, _hx_array_get($vUnits, 0)->unit);
				{
					$GLOBALS['%s']->pop();
					return true;
				}
			}break;
			case 2:{
				$s->setMarginTopNum($this->d, _hx_array_get($vUnits, 0)->value, _hx_array_get($vUnits, 0)->unit);
				$s->setMarginRightNum($this->d, _hx_array_get($vUnits, 1)->value, _hx_array_get($vUnits, 1)->unit);
				$s->setMarginBottomNum($this->d, _hx_array_get($vUnits, 0)->value, _hx_array_get($vUnits, 0)->unit);
				$s->setMarginLeftNum($this->d, _hx_array_get($vUnits, 1)->value, _hx_array_get($vUnits, 1)->unit);
				{
					$GLOBALS['%s']->pop();
					return true;
				}
			}break;
			case 3:{
				$s->setMarginTopNum($this->d, _hx_array_get($vUnits, 0)->value, _hx_array_get($vUnits, 0)->unit);
				$s->setMarginRightNum($this->d, _hx_array_get($vUnits, 1)->value, _hx_array_get($vUnits, 1)->unit);
				$s->setMarginBottomNum($this->d, _hx_array_get($vUnits, 2)->value, _hx_array_get($vUnits, 2)->unit);
				$s->setMarginLeftNum($this->d, _hx_array_get($vUnits, 1)->value, _hx_array_get($vUnits, 1)->unit);
				{
					$GLOBALS['%s']->pop();
					return true;
				}
			}break;
			case 4:{
				$s->setMarginTopNum($this->d, _hx_array_get($vUnits, 0)->value, _hx_array_get($vUnits, 0)->unit);
				$s->setMarginRightNum($this->d, _hx_array_get($vUnits, 1)->value, _hx_array_get($vUnits, 1)->unit);
				$s->setMarginBottomNum($this->d, _hx_array_get($vUnits, 2)->value, _hx_array_get($vUnits, 2)->unit);
				$s->setMarginLeftNum($this->d, _hx_array_get($vUnits, 3)->value, _hx_array_get($vUnits, 3)->unit);
				{
					$GLOBALS['%s']->pop();
					return true;
				}
			}break;
			}
		}break;
		case "margin-left":{
			$val = $this->getIdent($v);
			if($val !== null) {
				$s->setMarginLeftKey($this->d, $val);
				{
					$GLOBALS['%s']->pop();
					return true;
				}
			}
			$퍁 = ($v);
			switch($퍁->index) {
			case 9:
			$a = $퍁->params[0];
			{
				$퍁2 = ($a[1]);
				switch($퍁2->index) {
				case 2:
				$u = $퍁2->params[1]; $v1 = $퍁2->params[0];
				{
					$s->setMarginLeftNum($this->d, $v1 * -1, $u);
					{
						$GLOBALS['%s']->pop();
						return true;
					}
				}break;
				default:{
				}break;
				}
			}break;
			default:{
			}break;
			}
			$i = $this->isNullInt($v);
			if($i) {
				$s->setMarginLeftZero($this->d);
				{
					$GLOBALS['%s']->pop();
					return true;
				}
			}
			$l = $this->getValueObject($v);
			if($l !== null) {
				$s->setMarginLeftNum($this->d, $l->value, $l->unit);
				{
					$GLOBALS['%s']->pop();
					return true;
				}
			}
		}break;
		case "margin-right":{
			$val = $this->getIdent($v);
			if($val !== null) {
				$s->setMarginRightKey($this->d, $val);
				{
					$GLOBALS['%s']->pop();
					return true;
				}
			}
			$퍁 = ($v);
			switch($퍁->index) {
			case 9:
			$a = $퍁->params[0];
			{
				$퍁2 = ($a[1]);
				switch($퍁2->index) {
				case 2:
				$u = $퍁2->params[1]; $v1 = $퍁2->params[0];
				{
					$s->setMarginRightNum($this->d, $v1 * -1, $u);
					{
						$GLOBALS['%s']->pop();
						return true;
					}
				}break;
				default:{
				}break;
				}
			}break;
			default:{
			}break;
			}
			$i = $this->isNullInt($v);
			if($i) {
				$s->setMarginRightZero($this->d);
				{
					$GLOBALS['%s']->pop();
					return true;
				}
			}
			$l = $this->getValueObject($v);
			if($l !== null) {
				$s->setMarginRightNum($this->d, $l->value, $l->unit);
				{
					$GLOBALS['%s']->pop();
					return true;
				}
			}
		}break;
		case "margin-top":{
			$퍁 = ($v);
			switch($퍁->index) {
			case 9:
			$a = $퍁->params[0];
			{
				$퍁2 = ($a[1]);
				switch($퍁2->index) {
				case 2:
				$u = $퍁2->params[1]; $v1 = $퍁2->params[0];
				{
					$s->setMarginTopNum($this->d, $v1 * -1, $u);
					{
						$GLOBALS['%s']->pop();
						return true;
					}
				}break;
				default:{
				}break;
				}
			}break;
			default:{
			}break;
			}
			$i = $this->isNullInt($v);
			if($i) {
				$s->setMarginTopZero($this->d);
				{
					$GLOBALS['%s']->pop();
					return true;
				}
			}
			$val = $this->getIdent($v);
			if($val !== null) {
				$s->setMarginTopKey($this->d, $val);
				{
					$GLOBALS['%s']->pop();
					return true;
				}
			}
			$l = $this->getValueObject($v);
			if($l !== null) {
				$s->setMarginTopNum($this->d, $l->value, $l->unit);
				{
					$GLOBALS['%s']->pop();
					return true;
				}
			}
		}break;
		case "margin-bottom":{
			$퍁 = ($v);
			switch($퍁->index) {
			case 9:
			$a = $퍁->params[0];
			{
				$퍁2 = ($a[1]);
				switch($퍁2->index) {
				case 2:
				$u = $퍁2->params[1]; $v1 = $퍁2->params[0];
				{
					$s->setMarginBottomNum($this->d, $v1 * -1, $u);
					{
						$GLOBALS['%s']->pop();
						return true;
					}
				}break;
				default:{
				}break;
				}
			}break;
			default:{
			}break;
			}
			$i = $this->isNullInt($v);
			if($i) {
				$s->setMarginBottomZero($this->d);
				{
					$GLOBALS['%s']->pop();
					return true;
				}
			}
			$val = $this->getIdent($v);
			if($val !== null) {
				$s->setMarginBottomKey($this->d, $val);
				{
					$GLOBALS['%s']->pop();
					return true;
				}
			}
			$l = $this->getValueObject($v);
			if($l !== null) {
				$s->setMarginBottomNum($this->d, $l->value, $l->unit);
				{
					$GLOBALS['%s']->pop();
					return true;
				}
			}
		}break;
		case "padding":{
			$vl = lib_hxtml_CssParser_18($this, $r, $s, $v);
			$vUnits = new _hx_array(array());
			{
				$_g = 0;
				while($_g < $vl->length) {
					$i = $vl[$_g];
					++$_g;
					$vo = $this->getValueObject($i);
					if($vo !== null) {
						$vUnits->push($vo);
					}
					unset($vo,$i);
				}
			}
			switch($vUnits->length) {
			case 1:{
				$s->setPaddingTop($this->d, _hx_array_get($vUnits, 0)->value, _hx_array_get($vUnits, 0)->unit);
				$s->setPaddingRight($this->d, _hx_array_get($vUnits, 0)->value, _hx_array_get($vUnits, 0)->unit);
				$s->setPaddingBottom($this->d, _hx_array_get($vUnits, 0)->value, _hx_array_get($vUnits, 0)->unit);
				$s->setPaddingLeft($this->d, _hx_array_get($vUnits, 0)->value, _hx_array_get($vUnits, 0)->unit);
				{
					$GLOBALS['%s']->pop();
					return true;
				}
			}break;
			case 2:{
				$s->setPaddingTop($this->d, _hx_array_get($vUnits, 0)->value, _hx_array_get($vUnits, 0)->unit);
				$s->setPaddingRight($this->d, _hx_array_get($vUnits, 1)->value, _hx_array_get($vUnits, 1)->unit);
				$s->setPaddingBottom($this->d, _hx_array_get($vUnits, 0)->value, _hx_array_get($vUnits, 0)->unit);
				$s->setPaddingLeft($this->d, _hx_array_get($vUnits, 1)->value, _hx_array_get($vUnits, 1)->unit);
				{
					$GLOBALS['%s']->pop();
					return true;
				}
			}break;
			case 3:{
				$s->setPaddingTop($this->d, _hx_array_get($vUnits, 0)->value, _hx_array_get($vUnits, 0)->unit);
				$s->setPaddingRight($this->d, _hx_array_get($vUnits, 1)->value, _hx_array_get($vUnits, 1)->unit);
				$s->setPaddingBottom($this->d, _hx_array_get($vUnits, 2)->value, _hx_array_get($vUnits, 2)->unit);
				$s->setPaddingLeft($this->d, _hx_array_get($vUnits, 1)->value, _hx_array_get($vUnits, 1)->unit);
				{
					$GLOBALS['%s']->pop();
					return true;
				}
			}break;
			case 4:{
				$s->setPaddingTop($this->d, _hx_array_get($vUnits, 0)->value, _hx_array_get($vUnits, 0)->unit);
				$s->setPaddingRight($this->d, _hx_array_get($vUnits, 1)->value, _hx_array_get($vUnits, 1)->unit);
				$s->setPaddingBottom($this->d, _hx_array_get($vUnits, 2)->value, _hx_array_get($vUnits, 2)->unit);
				$s->setPaddingLeft($this->d, _hx_array_get($vUnits, 3)->value, _hx_array_get($vUnits, 3)->unit);
				{
					$GLOBALS['%s']->pop();
					return true;
				}
			}break;
			}
		}break;
		case "padding-left":{
			$i = $this->getValueObject($v);
			if($i !== null) {
				$s->setPaddingLeft($this->d, $i->value, $i->unit);
				{
					$GLOBALS['%s']->pop();
					return true;
				}
			}
		}break;
		case "padding-right":{
			$i = $this->getValueObject($v);
			if($i !== null) {
				$s->setPaddingRight($this->d, $i->value, $i->unit);
				{
					$GLOBALS['%s']->pop();
					return true;
				}
			}
		}break;
		case "padding-top":{
			$i = $this->getValueObject($v);
			if($i !== null) {
				$s->setPaddingTop($this->d, $i->value, $i->unit);
				{
					$GLOBALS['%s']->pop();
					return true;
				}
			}
		}break;
		case "padding-bottom":{
			$i = $this->getValueObject($v);
			if($i !== null) {
				$s->setPaddingBottom($this->d, $i->value, $i->unit);
				{
					$GLOBALS['%s']->pop();
					return true;
				}
			}
		}break;
		case "width":{
			$val = $this->getIdent($v);
			if($val !== null) {
				$s->setWidthKey($this->d, $val);
				{
					$GLOBALS['%s']->pop();
					return true;
				}
			}
			$i = $this->isNullInt($v);
			if($i) {
				$s->setWidthZero($this->d);
				{
					$GLOBALS['%s']->pop();
					return true;
				}
			}
			$i1 = $this->getValueObject($v);
			if($i1 !== null) {
				$s->setWidth($this->d, $i1->value, $i1->unit);
				{
					$GLOBALS['%s']->pop();
					return true;
				}
			}
		}break;
		case "height":{
			$val = $this->getIdent($v);
			if($val !== null) {
				$s->setHeightKey($this->d, $val);
				{
					$GLOBALS['%s']->pop();
					return true;
				}
			}
			$i = $this->getValueObject($v);
			if($i !== null) {
				$s->setHeight($this->d, $i->value, $i->unit);
				{
					$GLOBALS['%s']->pop();
					return true;
				}
			}
		}break;
		case "min-width":{
			$i = $this->isNullInt($v);
			if($i) {
				$s->setMinWidthZero($this->d);
				{
					$GLOBALS['%s']->pop();
					return true;
				}
			}
			$i1 = $this->getValueObject($v);
			if($i1 !== null) {
				$s->setMinWidth($this->d, $i1->value, $i1->unit);
				{
					$GLOBALS['%s']->pop();
					return true;
				}
			}
		}break;
		case "min-height":{
			$i = $this->isNullInt($v);
			if($i) {
				$s->setMinHeightZero($this->d);
				{
					$GLOBALS['%s']->pop();
					return true;
				}
			}
			$i1 = $this->getValueObject($v);
			if($i1 !== null) {
				$s->setMinHeight($this->d, $i1->value, $i1->unit);
				{
					$GLOBALS['%s']->pop();
					return true;
				}
			}
		}break;
		case "max-height":{
			$i = $this->isNullInt($v);
			if($i) {
				$s->setMaxHeightZero($this->d);
				{
					$GLOBALS['%s']->pop();
					return true;
				}
			}
			$val = $this->getIdent($v);
			if($val !== null) {
				$s->setMaxHeightKey($this->d, $val);
				{
					$GLOBALS['%s']->pop();
					return true;
				}
			}
			$i1 = $this->getValueObject($v);
			if($i1 !== null) {
				$s->setMaxHeight($this->d, $i1->value, $i1->unit);
				{
					$GLOBALS['%s']->pop();
					return true;
				}
			}
		}break;
		case "max-width":{
			$i = $this->isNullInt($v);
			if($i) {
				$s->setMaxWidthZero($this->d);
				{
					$GLOBALS['%s']->pop();
					return true;
				}
			}
			$val = $this->getIdent($v);
			if($val !== null) {
				$s->setMaxWidthKey($this->d, $val);
				{
					$GLOBALS['%s']->pop();
					return true;
				}
			}
			$i1 = $this->getValueObject($v);
			if($i1 !== null) {
				$s->setMaxWidth($this->d, $i1->value, $i1->unit);
				{
					$GLOBALS['%s']->pop();
					return true;
				}
			}
		}break;
		case "background-color":{
			$퍁 = ($v);
			switch($퍁->index) {
			case 7:
			$v1 = $퍁->params[0];
			{
				$s->setBgColorHex($this->d, $v1);
				{
					$GLOBALS['%s']->pop();
					return true;
				}
			}break;
			case 3:
			$v1 = $퍁->params[0];
			{
				$s->setBgColorRGBA($this->d, $v1);
				{
					$GLOBALS['%s']->pop();
					return true;
				}
			}break;
			case 4:
			$v1 = $퍁->params[0];
			{
				$s->setBgColorRGB($this->d, $v1);
				{
					$GLOBALS['%s']->pop();
					return true;
				}
			}break;
			case 0:
			$i = $퍁->params[0];
			{
				$s->setBgColorKey($this->d, $i);
				{
					$GLOBALS['%s']->pop();
					return true;
				}
			}break;
			default:{
				$GLOBALS['%s']->pop();
				return true;
			}break;
			}
		}break;
		case "background-repeat":{
			$s->setBgRepeat($this->d, new _hx_array(array($this->getIdent($v))));
			{
				$GLOBALS['%s']->pop();
				return true;
			}
		}break;
		case "background-image":{
			$퍁 = ($v);
			switch($퍁->index) {
			case 10:
			$url = $퍁->params[0];
			{
				$s->setBgImage($this->d, new _hx_array(array($url)));
				{
					$GLOBALS['%s']->pop();
					return true;
				}
			}break;
			case 0:
			$i = $퍁->params[0];
			{
				$s->setBgImage($this->d, new _hx_array(array($i)));
				{
					$GLOBALS['%s']->pop();
					return true;
				}
			}break;
			default:{
			}break;
			}
		}break;
		case "background-attachment":{
			$s->setBgAttachment($this->d, $this->getIdent($v));
			{
				$GLOBALS['%s']->pop();
				return true;
			}
		}break;
		case "background-position":{
			$vl = lib_hxtml_CssParser_19($this, $r, $s, $v);
			$str = "";
			{
				$_g1 = 0; $_g = $vl->length;
				while($_g1 < $_g) {
					$i = $_g1++;
					$퍁 = ($vl[$i]);
					switch($퍁->index) {
					case 0:
					$v1 = $퍁->params[0];
					{
						if($i === 0) {
							$str .= $v1 . " ";
						} else {
							$str .= $v1;
						}
					}break;
					case 2:
					$u = $퍁->params[1]; $v1 = $퍁->params[0];
					{
						if($i === 0) {
							$str .= Std::string($v1) . $u . " ";
						} else {
							$str .= Std::string($v1) . $u;
						}
					}break;
					default:{
					}break;
					}
					unset($i);
				}
			}
			$s->setBgPos($this->d, $str);
			{
				$GLOBALS['%s']->pop();
				return true;
			}
		}break;
		case "background":{
			$퍁mp = $this->applyComposite(new _hx_array(array("background-color", "background-image", "background-repeat", "background-attachment", "background-position")), $v, $s);
			$GLOBALS['%s']->pop();
			return $퍁mp;
		}break;
		case "font-family":{
			$l = $this->getList($v, (isset($this->getFontName) ? $this->getFontName: array($this, "getFontName")));
			if($l !== null) {
				$s->setFontFamily($this->d, $l);
				{
					$GLOBALS['%s']->pop();
					return true;
				}
			}
		}break;
		case "font-style":{
			$s->setFontStyle($this->d, $this->getIdent($v));
			{
				$GLOBALS['%s']->pop();
				return true;
			}
		}break;
		case "font-variant":{
			$s->setFontVariant($this->d, $this->getIdent($v));
			{
				$GLOBALS['%s']->pop();
				return true;
			}
		}break;
		case "font-weight":{
			$val = $this->getIdent($v);
			if($val !== null) {
				$s->setFontWeightKey($this->d, $val);
				{
					$GLOBALS['%s']->pop();
					return true;
				}
			}
			$퍁 = ($v);
			switch($퍁->index) {
			case 6:
			$i = $퍁->params[0];
			{
				$s->setFontWeightNum($this->d, $i);
				{
					$GLOBALS['%s']->pop();
					return true;
				}
			}break;
			default:{
			}break;
			}
		}break;
		case "font-size":{
			$val = $this->getIdent($v);
			if($val !== null) {
				$s->setFontSizeKey($this->d, $val);
				{
					$GLOBALS['%s']->pop();
					return true;
				}
			}
			$l = $this->getValueObject($v);
			if($l !== null) {
				$s->setFontSizeNum($this->d, $l->value, $l->unit);
				{
					$GLOBALS['%s']->pop();
					return true;
				}
			}
		}break;
		case "font":{
			$vl = lib_hxtml_CssParser_20($this, $r, $s, $v);
			$v1 = lib_hxtml_Value::VGroup($vl);
			$this->applyComposite(new _hx_array(array("font-style", "font-variant", "font-weight")), $v1, $s);
			$this->applyComposite(new _hx_array(array("font-size")), $v1, $s);
			if($vl->length > 0) {
				$퍁 = ($vl[0]);
				switch($퍁->index) {
				case 12:
				{
					$vl->shift();
				}break;
				default:{
				}break;
				}
			}
			$this->applyComposite(new _hx_array(array("line-height")), $v1, $s);
			$this->applyComposite(new _hx_array(array("font-family")), $v1, $s);
			if($vl->length === 0) {
				$GLOBALS['%s']->pop();
				return true;
			}
		}break;
		case "color":{
			$퍁 = ($v);
			switch($퍁->index) {
			case 7:
			$v1 = $퍁->params[0];
			{
				$s->setTextColorNum($this->d, Std::parseInt($v1));
				{
					$GLOBALS['%s']->pop();
					return true;
				}
			}break;
			case 4:
			$v1 = $퍁->params[0];
			{
				$s->setTextColorRGB($this->d, $v1);
				{
					$GLOBALS['%s']->pop();
					return true;
				}
			}break;
			case 3:
			$v1 = $퍁->params[0];
			{
				$s->setTextColorRGBA($this->d, $v1);
				{
					$GLOBALS['%s']->pop();
					return true;
				}
			}break;
			case 0:
			$i = $퍁->params[0];
			{
				$s->setTextColorKey($this->d, $i);
				{
					$GLOBALS['%s']->pop();
					return true;
				}
			}break;
			default:{
			}break;
			}
		}break;
		case "text-decoration":{
			$idents = $this->getGroup($v, (isset($this->getIdent) ? $this->getIdent: array($this, "getIdent")));
			{
				$_g = 0;
				while($_g < $idents->length) {
					$i = $idents[$_g];
					++$_g;
					$s->setTextDecoration($this->d, $i);
					unset($i);
				}
			}
			{
				$GLOBALS['%s']->pop();
				return true;
			}
		}break;
		case "text-transform":{
			$val = $this->getIdent($v);
			if($val !== null) {
				$s->setTextTransform($this->d, $val);
				{
					$GLOBALS['%s']->pop();
					return true;
				}
			}
		}break;
		case "white-space":{
			$val = $this->getIdent($v);
			if($val !== null) {
				$s->setWhiteSpace($this->d, $val);
				{
					$GLOBALS['%s']->pop();
					return true;
				}
			}
		}break;
		case "z-index":{
			$퍁 = ($v);
			switch($퍁->index) {
			case 9:
			$a = $퍁->params[0];
			{
				$퍁2 = ($a[1]);
				switch($퍁2->index) {
				case 6:
				$v1 = $퍁2->params[0];
				{
					$s->setZIndex($this->d, Std::string($v1 * -1));
					{
						$GLOBALS['%s']->pop();
						return true;
					}
				}break;
				default:{
				}break;
				}
			}break;
			default:{
			}break;
			}
			$퍁 = ($v);
			switch($퍁->index) {
			case 6:
			$i = $퍁->params[0];
			{
				$s->setZIndex($this->d, Std::string($i));
				{
					$GLOBALS['%s']->pop();
					return true;
				}
			}break;
			default:{
			}break;
			}
			$val = $this->getIdent($v);
			if($val !== null) {
				$s->setZIndex($this->d, $val);
				{
					$GLOBALS['%s']->pop();
					return true;
				}
			}
		}break;
		case "line-height":{
			$i = $this->isNullInt($v);
			if($i) {
				$s->setLineHeightZero($this->d);
				{
					$GLOBALS['%s']->pop();
					return true;
				}
			}
			$val = $this->getIdent($v);
			if($val !== null) {
				$s->setLineHeightKey($this->d, $val);
				{
					$GLOBALS['%s']->pop();
					return true;
				}
			}
			$l = $this->getValueObject($v);
			if($l !== null) {
				$s->setLineHeightNum($this->d, $l->value, $l->unit);
				{
					$GLOBALS['%s']->pop();
					return true;
				}
			}
		}break;
		case "vertical-align":{
			$val = $this->getIdent($v);
			if($val !== null) {
				$s->setVerticalAlignKey($this->d, $val);
				{
					$GLOBALS['%s']->pop();
					return true;
				}
			}
			$l = $this->getValueObject($v);
			if($l !== null) {
				$s->setVerticalAlignNum($this->d, $l->value, $l->unit);
				{
					$GLOBALS['%s']->pop();
					return true;
				}
			}
		}break;
		case "word-spacing":{
			$val = $this->getIdent($v);
			if($val !== null) {
				$s->setWordSpacingKey($this->d, $val);
				{
					$GLOBALS['%s']->pop();
					return true;
				}
			}
			$l = $this->getValueObject($v);
			if($l !== null) {
				$s->setWordSpacingNum($this->d, $l->value, $l->unit);
				{
					$GLOBALS['%s']->pop();
					return true;
				}
			}
		}break;
		case "letter-spacing":{
			$val = $this->getIdent($v);
			if($val !== null) {
				$s->setLetterSpacingKey($this->d, $val);
				{
					$GLOBALS['%s']->pop();
					return true;
				}
			}
			$l = $this->getValueObject($v);
			if($l !== null) {
				$s->setLetterSpacingNum($this->d, $l->value, $l->unit);
				{
					$GLOBALS['%s']->pop();
					return true;
				}
			}
		}break;
		case "text-indent":{
			$l = $this->getValueObject($v);
			if($l !== null) {
				$s->setTextIndent($this->d, $l->value, $l->unit);
				{
					$GLOBALS['%s']->pop();
					return true;
				}
			}
		}break;
		case "text-align":{
			$val = $this->getIdent($v);
			if($val !== null) {
				$s->setTextAlign($this->d, $val);
				{
					$GLOBALS['%s']->pop();
					return true;
				}
			}
		}break;
		case "top":{
			$퍁 = ($v);
			switch($퍁->index) {
			case 9:
			$a = $퍁->params[0];
			{
				$퍁2 = ($a[1]);
				switch($퍁2->index) {
				case 2:
				$u = $퍁2->params[1]; $v1 = $퍁2->params[0];
				{
					$s->setTop($this->d, $v1 * -1, $u);
					{
						$GLOBALS['%s']->pop();
						return true;
					}
				}break;
				default:{
				}break;
				}
			}break;
			default:{
			}break;
			}
			$val = $this->getIdent($v);
			if($val !== null) {
				$s->setTopKey($this->d, $val);
				{
					$GLOBALS['%s']->pop();
					return true;
				}
			}
			$i = $this->isNullInt($v);
			if($i) {
				$s->setTopZero($this->d);
				{
					$GLOBALS['%s']->pop();
					return true;
				}
			}
			$l = $this->getValueObject($v);
			if($l !== null) {
				$s->setTop($this->d, $l->value, $l->unit);
				{
					$GLOBALS['%s']->pop();
					return true;
				}
			}
			{
				$GLOBALS['%s']->pop();
				return true;
			}
		}break;
		case "left":{
			$퍁 = ($v);
			switch($퍁->index) {
			case 9:
			$a = $퍁->params[0];
			{
				$퍁2 = ($a[1]);
				switch($퍁2->index) {
				case 2:
				$u = $퍁2->params[1]; $v1 = $퍁2->params[0];
				{
					$s->setLeft($this->d, $v1 * -1, $u);
					{
						$GLOBALS['%s']->pop();
						return true;
					}
				}break;
				default:{
				}break;
				}
			}break;
			default:{
			}break;
			}
			$val = $this->getIdent($v);
			if($val !== null) {
				$s->setLeftKey($this->d, $val);
				{
					$GLOBALS['%s']->pop();
					return true;
				}
			}
			$i = $this->isNullInt($v);
			if($i) {
				$s->setLeftZero($this->d);
				{
					$GLOBALS['%s']->pop();
					return true;
				}
			}
			$l = $this->getValueObject($v);
			if($l !== null) {
				$s->setLeft($this->d, $l->value, $l->unit);
				{
					$GLOBALS['%s']->pop();
					return true;
				}
			}
			{
				$GLOBALS['%s']->pop();
				return true;
			}
		}break;
		case "right":{
			$퍁 = ($v);
			switch($퍁->index) {
			case 9:
			$a = $퍁->params[0];
			{
				$퍁2 = ($a[1]);
				switch($퍁2->index) {
				case 2:
				$u = $퍁2->params[1]; $v1 = $퍁2->params[0];
				{
					$s->setRight($this->d, $v1 * -1, $u);
					{
						$GLOBALS['%s']->pop();
						return true;
					}
				}break;
				default:{
				}break;
				}
			}break;
			default:{
			}break;
			}
			$val = $this->getIdent($v);
			if($val !== null) {
				$s->setRightKey($this->d, $val);
				{
					$GLOBALS['%s']->pop();
					return true;
				}
			}
			$i = $this->isNullInt($v);
			if($i) {
				$s->setRightZero($this->d);
				{
					$GLOBALS['%s']->pop();
					return true;
				}
			}
			$l = $this->getValueObject($v);
			if($l !== null) {
				$s->setRight($this->d, $l->value, $l->unit);
				{
					$GLOBALS['%s']->pop();
					return true;
				}
			}
			{
				$GLOBALS['%s']->pop();
				return true;
			}
		}break;
		case "bottom":{
			$퍁 = ($v);
			switch($퍁->index) {
			case 9:
			$a = $퍁->params[0];
			{
				$퍁2 = ($a[1]);
				switch($퍁2->index) {
				case 2:
				$u = $퍁2->params[1]; $v1 = $퍁2->params[0];
				{
					$s->setBottom($this->d, $v1 * -1, $u);
					{
						$GLOBALS['%s']->pop();
						return true;
					}
				}break;
				default:{
				}break;
				}
			}break;
			default:{
			}break;
			}
			$val = $this->getIdent($v);
			if($val !== null) {
				$s->setBottomKey($this->d, $val);
				{
					$GLOBALS['%s']->pop();
					return true;
				}
			}
			$i = $this->isNullInt($v);
			if($i) {
				$s->setBottomZero($this->d);
				{
					$GLOBALS['%s']->pop();
					return true;
				}
			}
			$l = $this->getValueObject($v);
			if($l !== null) {
				$s->setBottom($this->d, $l->value, $l->unit);
				{
					$GLOBALS['%s']->pop();
					return true;
				}
			}
			{
				$GLOBALS['%s']->pop();
				return true;
			}
		}break;
		case "display":{
			$s->setDisplay($this->d, $this->getIdent($v));
			{
				$GLOBALS['%s']->pop();
				return true;
			}
		}break;
		case "float":{
			$s->setCssFloat($this->d, $this->getIdent($v));
			{
				$GLOBALS['%s']->pop();
				return true;
			}
		}break;
		case "clear":{
			$s->setClear($this->d, $this->getIdent($v));
			{
				$GLOBALS['%s']->pop();
				return true;
			}
		}break;
		case "position":{
			$s->setPosition($this->d, $this->getIdent($v));
			{
				$GLOBALS['%s']->pop();
				return true;
			}
		}break;
		case "overflow":{
			$퍁 = ($v);
			switch($퍁->index) {
			case 9:
			$a = $퍁->params[0];
			{
				$퍁2 = ($a[0]);
				switch($퍁2->index) {
				case 0:
				$v1 = $퍁2->params[0];
				{
					$s->setOverflowX($this->d, $v1);
				}break;
				default:{
				}break;
				}
				$퍁2 = ($a[1]);
				switch($퍁2->index) {
				case 0:
				$v1 = $퍁2->params[0];
				{
					$s->setOverflowY($this->d, $v1);
				}break;
				default:{
				}break;
				}
				{
					$GLOBALS['%s']->pop();
					return true;
				}
			}break;
			case 0:
			$v1 = $퍁->params[0];
			{
				$s->setOverflowX($this->d, $v1);
				$s->setOverflowY($this->d, $v1);
				{
					$GLOBALS['%s']->pop();
					return true;
				}
			}break;
			default:{
			}break;
			}
		}break;
		case "transition-property":{
			$val = $this->getIdent($v);
			if($val !== null) {
				$s->setTransitionProperty($this->d, $val);
			}
			{
				$GLOBALS['%s']->pop();
				return true;
			}
		}break;
		case "transition-duration":{
			$val = $this->getIdent($v);
			if($val !== null) {
				$s->setTransitionDuration($this->d, $val);
			}
			{
				$GLOBALS['%s']->pop();
				return true;
			}
		}break;
		case "transition-timing-function":{
			$val = $this->getIdent($v);
			if($val !== null) {
				$s->setTransitionTimingFunction($this->d, $val);
			}
			{
				$GLOBALS['%s']->pop();
				return true;
			}
		}break;
		case "transition-delay":{
			$val = $this->getIdent($v);
			if($val !== null) {
				$s->setTransitionDelay($this->d, $val);
			}
			{
				$GLOBALS['%s']->pop();
				return true;
			}
		}break;
		case "transform-origin":{
			$val = $this->getIdent($v);
			if($val !== null) {
				$s->setTransformOrigin($this->d, $val);
			}
			{
				$GLOBALS['%s']->pop();
				return true;
			}
		}break;
		case "transform":{
			$val = $this->getIdent($v);
			if($val !== null) {
				$s->setTransform($this->d, $val);
			}
			{
				$GLOBALS['%s']->pop();
				return true;
			}
		}break;
		default:{
			throw new HException("Not implemented '" . $r . "' = " . Std::string($v));
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function notImplemented($pos = null) {
		$GLOBALS['%s']->push("lib.hxtml.CssParser::notImplemented");
		$퍀pos = $GLOBALS['%s']->length;
		haxe_Log::trace("Not implemented", $pos);
		$GLOBALS['%s']->pop();
	}
	public $tokens;
	public $spacesTokens;
	public $pos;
	public $d;
	public $s;
	public $css;
	public function __call($m, $a) {
		if(isset($this->$m) && is_callable($this->$m))
			return call_user_func_array($this->$m, $a);
		else if(isset($this->팪ynamics[$m]) && is_callable($this->팪ynamics[$m]))
			return call_user_func_array($this->팪ynamics[$m], $a);
		else if('toString' == $m)
			return $this->__toString();
		else
			throw new HException('Unable to call �'.$m.'�');
	}
	function __toString() { return 'lib.hxtml.CssParser'; }
}
function lib_hxtml_CssParser_0(&$퍁his, &$c, &$t) {
	$퍀pos = $GLOBALS['%s']->length;
	{
		$c1 = ord(substr($퍁his->css,$퍁his->pos++,1));
		return $c1 === 32 || $c1 === 10 || $c1 === 13 || $c1 === 9;
	}
}
function lib_hxtml_CssParser_1(&$퍁his, &$c, &$f, &$i, &$k, &$t) {
	$퍀pos = $GLOBALS['%s']->length;
	{
		$c1 = $c = ord(substr($퍁his->css,$퍁his->pos++,1));
		return $c1 >= 48 && $c1 <= 57;
	}
}
function lib_hxtml_CssParser_2(&$퍁his, &$v, &$v2) {
	$퍀pos = $GLOBALS['%s']->length;
	$퍁 = ($v2);
	switch($퍁->index) {
	case 8:
	$l = $퍁->params[0];
	{
		$l->unshift($v);
		return $v2;
	}break;
	case 11:
	$v21 = $퍁->params[1]; $lab = $퍁->params[0];
	{
		return lib_hxtml_Value::VLabel($lab, $퍁his->loopComma($v, $v21));
	}break;
	default:{
		return lib_hxtml_Value::VList(new _hx_array(array($v, $v2)));
	}break;
	}
}
function lib_hxtml_CssParser_3(&$퍁his, &$v, &$v2) {
	$퍀pos = $GLOBALS['%s']->length;
	$퍁 = ($v2);
	switch($퍁->index) {
	case 9:
	$l = $퍁->params[0];
	{
		$l->unshift($v);
		return $v2;
	}break;
	case 8:
	$l = $퍁->params[0];
	{
		$l[0] = $퍁his->loopNext($v, $l[0]);
		return $v2;
	}break;
	case 11:
	$v21 = $퍁->params[1]; $lab = $퍁->params[0];
	{
		return lib_hxtml_Value::VLabel($lab, $퍁his->loopNext($v, $v21));
	}break;
	default:{
		return lib_hxtml_Value::VGroup(new _hx_array(array($v, $v2)));
	}break;
	}
}
function lib_hxtml_CssParser_4(&$퍁his, &$t, &$v) {
	$퍀pos = $GLOBALS['%s']->length;
	$퍁 = ($t);
	switch($퍁->index) {
	case 6:
	{
		$퍁2 = ($v);
		switch($퍁2->index) {
		case 0:
		$i = $퍁2->params[0];
		{
			switch($i) {
			case "url":{
				return $퍁his->readValueNext(lib_hxtml_Value::VUrl($퍁his->readUrl()));
			}break;
			case "rgba":{
				return $퍁his->readValueNext(lib_hxtml_Value::VRGBA($퍁his->readRGBA()));
			}break;
			case "rgb":{
				return $퍁his->readValueNext(lib_hxtml_Value::VRGB($퍁his->readRGB()));
			}break;
			default:{
				$퍁his->tokens->push($t);
				return $v;
			}break;
			}
		}break;
		default:{
			$퍁his->tokens->push($t);
			return $v;
		}break;
		}
	}break;
	case 8:
	{
		$t1 = $퍁his->readToken();
		$퍁2 = ($t1);
		switch($퍁2->index) {
		case 0:
		$i = $퍁2->params[0];
		{
			return lib_hxtml_Value::VLabel($i, $v);
		}break;
		default:{
			return $퍁his->unexpected($t1);
		}break;
		}
		unset($t1);
	}break;
	case 9:
	{
		return $퍁his->loopComma($v, $퍁his->readValue(null));
	}break;
	default:{
		$퍁his->tokens->push($t);
		$v2 = $퍁his->readValue(true);
		if($v2 === null) {
			return $v;
		} else {
			return $퍁his->loopNext($v, $v2);
		}
		unset($v2);
	}break;
	}
}
function lib_hxtml_CssParser_5(&$퍁his, &$f, &$i, &$t) {
	$퍀pos = $GLOBALS['%s']->length;
	$퍁 = ($t);
	switch($퍁->index) {
	case 0:
	$i1 = $퍁->params[0];
	{
		return lib_hxtml_Value::VUnit($f, $i1);
	}break;
	case 11:
	{
		return lib_hxtml_Value::VUnit($f, "%");
	}break;
	default:{
		$퍁his->tokens->push($t);
		if($i !== null) {
			return lib_hxtml_Value::VInt($i);
		} else {
			return lib_hxtml_Value::VFloat($f);
		}
	}break;
	}
}
function lib_hxtml_CssParser_6(&$퍁his, &$opt, &$t) {
	$퍀pos = $GLOBALS['%s']->length;
	$퍁 = ($t);
	switch($퍁->index) {
	case 5:
	{
		return lib_hxtml_Value::VHex($퍁his->readHex());
	}break;
	case 0:
	$i = $퍁->params[0];
	{
		return lib_hxtml_Value::VIdent($i);
	}break;
	case 1:
	$s = $퍁->params[0];
	{
		return lib_hxtml_Value::VString($s);
	}break;
	case 2:
	$i = $퍁->params[0];
	{
		return $퍁his->readValueUnit($i, $i);
	}break;
	case 3:
	$f = $퍁->params[0];
	{
		return $퍁his->readValueUnit($f, null);
	}break;
	case 17:
	{
		return lib_hxtml_Value::$VSlash;
	}break;
	default:{
		if(!$opt) {
			$퍁his->unexpected($t);
		}
		$퍁his->tokens->push($t);
		return null;
	}break;
	}
}
function lib_hxtml_CssParser_7(&$퍁his, &$t) {
	$퍀pos = $GLOBALS['%s']->length;
	$퍁 = ($t);
	switch($퍁->index) {
	case 0:
	$i = $퍁->params[0];
	{
		return $i;
	}break;
	default:{
		return $퍁his->unexpected($t);
	}break;
	}
}
function lib_hxtml_CssParser_8(&$퍁his, &$v) {
	$퍀pos = $GLOBALS['%s']->length;
	$퍁 = ($v);
	switch($퍁->index) {
	case 1:
	$s = $퍁->params[0];
	{
		return $s;
	}break;
	case 9:
	{
		$g = $퍁his->getGroup($v, (isset($퍁his->getIdent) ? $퍁his->getIdent: array($퍁his, "getIdent")));
		if($g === null) {
			return null;
		} else {
			return $g->join(" ");
		}
		unset($g);
	}break;
	case 0:
	$i = $퍁->params[0];
	{
		return $i;
	}break;
	default:{
		return null;
	}break;
	}
}
function lib_hxtml_CssParser_9(&$퍁his, &$v) {
	$퍀pos = $GLOBALS['%s']->length;
	$퍁 = ($v);
	switch($퍁->index) {
	case 7:
	$v1 = $퍁->params[0];
	{
		if(strlen($v1) === 6) {
			return Std::parseInt("0x" . $v1);
		} else {
			if(strlen($v1) === 3) {
				return Std::parseInt("0x" . _hx_char_at($v1, 0) . _hx_char_at($v1, 0) . _hx_char_at($v1, 1) . _hx_char_at($v1, 1) . _hx_char_at($v1, 2) . _hx_char_at($v1, 2));
			}
		}
	}break;
	case 0:
	$i = $퍁->params[0];
	{
		switch($i) {
		case "black":{
			return 0;
		}break;
		case "red":{
			return 16711680;
		}break;
		case "lime":{
			return 65280;
		}break;
		case "blue":{
			return 255;
		}break;
		case "white":{
			return 16777215;
		}break;
		case "aqua":{
			return 65535;
		}break;
		case "fuchsia":{
			return 16711935;
		}break;
		case "yellow":{
			return 16776960;
		}break;
		case "maroon":{
			return 8388608;
		}break;
		case "green":{
			return 32768;
		}break;
		case "navy":{
			return 128;
		}break;
		case "olive":{
			return 8421376;
		}break;
		case "purple":{
			return 8388736;
		}break;
		case "teal":{
			return 32896;
		}break;
		case "silver":{
			return 12632256;
		}break;
		case "gray":case "grey":{
			return 8421504;
		}break;
		default:{
			return null;
		}break;
		}
	}break;
	default:{
		return null;
	}break;
	}
}
function lib_hxtml_CssParser_10(&$퍁his, &$v) {
	$퍀pos = $GLOBALS['%s']->length;
	$퍁 = ($v);
	switch($퍁->index) {
	case 0:
	$v1 = $퍁->params[0];
	{
		return $v1;
	}break;
	default:{
		return null;
	}break;
	}
}
function lib_hxtml_CssParser_11(&$퍁his, &$v) {
	$퍀pos = $GLOBALS['%s']->length;
	$퍁 = ($v);
	switch($퍁->index) {
	case 2:
	$u = $퍁->params[1]; $f = $퍁->params[0];
	{
		switch($u) {
		case "px":{
			return intval($f);
		}break;
		case "pt":{
			return intval($f * 4 / 3);
		}break;
		default:{
			return null;
		}break;
		}
	}break;
	case 6:
	$v1 = $퍁->params[0];
	{
		return $v1;
	}break;
	default:{
		return null;
	}break;
	}
}
function lib_hxtml_CssParser_12(&$퍁his, &$v) {
	$퍀pos = $GLOBALS['%s']->length;
	$퍁 = ($v);
	switch($퍁->index) {
	case 6:
	$v1 = $퍁->params[0];
	{
		return $v1 === 0;
	}break;
	default:{
		return false;
	}break;
	}
}
function lib_hxtml_CssParser_13(&$퍁his, &$i) {
	$퍀pos = $GLOBALS['%s']->length;
	$퍁 = ($i);
	switch($퍁->index) {
	case 2:
	$u = $퍁->params[1]; $v = $퍁->params[0];
	{
		return _hx_anonymous(array("value" => $v, "unit" => $u));
	}break;
	default:{
		return null;
	}break;
	}
}
function lib_hxtml_CssParser_14(&$퍁his, &$names, &$s, &$v) {
	$퍀pos = $GLOBALS['%s']->length;
	$퍁 = ($v);
	switch($퍁->index) {
	case 9:
	$l = $퍁->params[0];
	{
		return $l;
	}break;
	default:{
		return new _hx_array(array($v));
	}break;
	}
}
function lib_hxtml_CssParser_15(&$퍁his, &$_g, &$found, &$n, &$names, &$s, &$v, &$vl) {
	$퍀pos = $GLOBALS['%s']->length;
	switch($n) {
	case "background-position":{
		return 2;
	}break;
	default:{
		return 1;
	}break;
	}
}
function lib_hxtml_CssParser_16(&$퍁his, &$_g, &$count, &$found, &$n, &$names, &$s, &$v, &$vl) {
	$퍀pos = $GLOBALS['%s']->length;
	if($count === 1) {
		return $vl[0];
	} else {
		return lib_hxtml_Value::VGroup($vl->slice(0, $count));
	}
}
function lib_hxtml_CssParser_17(&$퍁his, &$i, &$r, &$s, &$v) {
	$퍀pos = $GLOBALS['%s']->length;
	$퍁 = ($v);
	switch($퍁->index) {
	case 9:
	$l = $퍁->params[0];
	{
		return $l;
	}break;
	default:{
		return new _hx_array(array($v));
	}break;
	}
}
function lib_hxtml_CssParser_18(&$퍁his, &$r, &$s, &$v) {
	$퍀pos = $GLOBALS['%s']->length;
	$퍁 = ($v);
	switch($퍁->index) {
	case 9:
	$l = $퍁->params[0];
	{
		return $l;
	}break;
	default:{
		return new _hx_array(array($v));
	}break;
	}
}
function lib_hxtml_CssParser_19(&$퍁his, &$r, &$s, &$v) {
	$퍀pos = $GLOBALS['%s']->length;
	$퍁 = ($v);
	switch($퍁->index) {
	case 9:
	$l = $퍁->params[0];
	{
		return $l;
	}break;
	default:{
		return new _hx_array(array($v));
	}break;
	}
}
function lib_hxtml_CssParser_20(&$퍁his, &$r, &$s, &$v) {
	$퍀pos = $GLOBALS['%s']->length;
	$퍁 = ($v);
	switch($퍁->index) {
	case 9:
	$l = $퍁->params[0];
	{
		return $l;
	}break;
	default:{
		return new _hx_array(array($v));
	}break;
	}
}

<?php

class utest_Assert {
	public function __construct(){}
	static $results;
	static function isTrue($cond, $msg = null, $pos = null) {
		if(utest_Assert::$results === null) {
			throw new HException("Assert.results is not currently bound to any assert context");
		}
		if(null === $msg) {
			$msg = "expected true";
		}
		if($cond) {
			utest_Assert::$results->add(utest_Assertation::Success($pos));
		} else {
			utest_Assert::$results->add(utest_Assertation::Failure($msg, $pos));
		}
	}
	static function isFalse($value, $msg = null, $pos = null) {
		if(null === $msg) {
			$msg = "expected false";
		}
		utest_Assert::isTrue($value === false, $msg, $pos);
	}
	static function isNull($value, $msg = null, $pos = null) {
		if($msg === null) {
			$msg = "expected null but was " . utest_Assert::q($value);
		}
		utest_Assert::isTrue($value === null, $msg, $pos);
	}
	static function notNull($value, $msg = null, $pos = null) {
		if(null === $msg) {
			$msg = "expected false";
		}
		utest_Assert::isTrue($value !== null, $msg, $pos);
	}
	static function is($value, $type, $msg = null, $pos = null) {
		if($msg === null) {
			$msg = "expected type " . utest_Assert::typeToString($type) . " but was " . utest_Assert::typeToString($value);
		}
		utest_Assert::isTrue(Std::is($value, $type), $msg, $pos);
	}
	static function notEquals($expected, $value, $msg = null, $pos = null) {
		if($msg === null) {
			$msg = "expected " . utest_Assert::q($expected) . " and testa value " . utest_Assert::q($value) . " should be different";
		}
		utest_Assert::isFalse(_hx_equal($expected, $value), $msg, $pos);
	}
	static function equals($expected, $value, $msg = null, $pos = null) {
		if($msg === null) {
			$msg = "expected " . utest_Assert::q($expected) . " but was " . utest_Assert::q($value);
		}
		utest_Assert::isTrue(_hx_equal($expected, $value), $msg, $pos);
	}
	static function match($pattern, $value, $msg = null, $pos = null) {
		if($msg === null) {
			$msg = "the value " . utest_Assert::q($value) . "does not match the provided pattern";
		}
		utest_Assert::isTrue($pattern->match($value), $msg, $pos);
	}
	static function floatEquals($expected, $value, $approx = null, $msg = null, $pos = null) {
		if($msg === null) {
			$msg = "expected " . utest_Assert::q($expected) . " but was " . utest_Assert::q($value);
		}
		utest_Assert::isTrue(utest_Assert::_floatEquals($expected, $value, $approx), $msg, $pos);
		return;
	}
	static function _floatEquals($expected, $value, $approx = null) {
		if(Math::isNaN($expected)) {
			return Math::isNaN($value);
		} else {
			if(Math::isNaN($value)) {
				return false;
			} else {
				if(!Math::isFinite($expected) && !Math::isFinite($value)) {
					return ($expected > 0) == $value > 0;
				}
			}
		}
		if(null === $approx) {
			$approx = 1e-5;
		}
		return Math::abs($value - $expected) < $approx;
	}
	static function getTypeName($v) {
		$»t = (Type::typeof($v));
		switch($»t->index) {
		case 0:
		{
			return "[null]";
		}break;
		case 1:
		{
			return "Int";
		}break;
		case 2:
		{
			return "Float";
		}break;
		case 3:
		{
			return "Bool";
		}break;
		case 5:
		{
			return "function";
		}break;
		case 6:
		$c = $»t->params[0];
		{
			return Type::getClassName($c);
		}break;
		case 7:
		$e = $»t->params[0];
		{
			return Type::getEnumName($e);
		}break;
		case 4:
		{
			return "Object";
		}break;
		case 8:
		{
			return "Unknown";
		}break;
		}
	}
	static function isIterable($v, $isAnonym) {
		$fields = (($isAnonym) ? Reflect::fields($v) : Type::getInstanceFields(Type::getClass($v)));
		if(!Lambda::has($fields, "iterator", null)) {
			return false;
		}
		return Reflect::isFunction(Reflect::field($v, "iterator"));
	}
	static function isIterator($v, $isAnonym) {
		$fields = (($isAnonym) ? Reflect::fields($v) : Type::getInstanceFields(Type::getClass($v)));
		if(!Lambda::has($fields, "next", null) || !Lambda::has($fields, "hasNext", null)) {
			return false;
		}
		return Reflect::isFunction(Reflect::field($v, "next")) && Reflect::isFunction(Reflect::field($v, "hasNext"));
	}
	static function sameAs($expected, $value, $status) {
		$texpected = utest_Assert::getTypeName($expected);
		$tvalue = utest_Assert::getTypeName($value);
		if($texpected !== $tvalue) {
			$status->error = "expected type " . $texpected . " but it is " . $tvalue . (utest_Assert_0($expected, $status, $texpected, $tvalue, $value));
			return false;
		}
		$»t = (Type::typeof($expected));
		switch($»t->index) {
		case 2:
		{
			if(!utest_Assert::_floatEquals($expected, $value, null)) {
				$status->error = "expected " . utest_Assert::q($expected) . " but it is " . utest_Assert::q($value) . (utest_Assert_1($expected, $status, $texpected, $tvalue, $value));
				return false;
			}
			return true;
		}break;
		case 0:
		case 1:
		case 3:
		{
			if(!_hx_equal($expected, $value)) {
				$status->error = "expected " . utest_Assert::q($expected) . " but it is " . utest_Assert::q($value) . (utest_Assert_2($expected, $status, $texpected, $tvalue, $value));
				return false;
			}
			return true;
		}break;
		case 5:
		{
			if(!Reflect::compareMethods($expected, $value)) {
				$status->error = "expected same function reference" . (utest_Assert_3($expected, $status, $texpected, $tvalue, $value));
				return false;
			}
			return true;
		}break;
		case 6:
		$c = $»t->params[0];
		{
			$cexpected = Type::getClassName($c);
			$cvalue = Type::getClassName(Type::getClass($value));
			if($cexpected !== $cvalue) {
				$status->error = "expected instance of " . utest_Assert::q($cexpected) . " but it is " . utest_Assert::q($cvalue) . (utest_Assert_4($c, $cexpected, $cvalue, $expected, $status, $texpected, $tvalue, $value));
				return false;
			}
			if(Std::is($expected, _hx_qtype("String")) && !_hx_equal($expected, $value)) {
				$status->error = "expected '" . Std::string($expected) . "' but it is '" . Std::string($value) . "'";
				return false;
			}
			if(Std::is($expected, _hx_qtype("Array"))) {
				if($status->recursive || $status->path === "") {
					if(!_hx_equal(_hx_len($expected), _hx_len($value))) {
						$status->error = "expected " . Std::string(_hx_len($expected)) . " elements but they were " . Std::string(_hx_len($value)) . (utest_Assert_5($c, $cexpected, $cvalue, $expected, $status, $texpected, $tvalue, $value));
						return false;
					}
					$path = $status->path;
					{
						$_g1 = 0; $_g = _hx_len($expected);
						while($_g1 < $_g) {
							$i = $_g1++;
							$status->path = utest_Assert_6($_g, $_g1, $c, $cexpected, $cvalue, $expected, $i, $path, $status, $texpected, $tvalue, $value);
							if(!utest_Assert::sameAs($expected[$i], $value[$i], $status)) {
								$status->error = "expected " . utest_Assert::q($expected) . " but it is " . utest_Assert::q($value) . (utest_Assert_7($_g, $_g1, $c, $cexpected, $cvalue, $expected, $i, $path, $status, $texpected, $tvalue, $value));
								return false;
							}
							unset($i);
						}
					}
				}
				return true;
			}
			if(Std::is($expected, _hx_qtype("Date"))) {
				if(!_hx_equal($expected->getTime(), $value->getTime())) {
					$status->error = "expected " . utest_Assert::q($expected) . " but it is " . utest_Assert::q($value) . (utest_Assert_8($c, $cexpected, $cvalue, $expected, $status, $texpected, $tvalue, $value));
					return false;
				}
				return true;
			}
			if(Std::is($expected, _hx_qtype("haxe.io.Bytes"))) {
				if($status->recursive || $status->path === "") {
					$ebytes = $expected;
					$vbytes = $value;
					if($ebytes->length !== $vbytes->length) {
						return false;
					}
					{
						$_g1 = 0; $_g = $ebytes->length;
						while($_g1 < $_g) {
							$i = $_g1++;
							if(ord($ebytes->b[$i]) !== ord($vbytes->b[$i])) {
								$status->error = "expected byte " . _hx_string_rec(ord($ebytes->b[$i]), "") . " but wss " . _hx_string_rec(ord($ebytes->b[$i]), "") . (utest_Assert_9($_g, $_g1, $c, $cexpected, $cvalue, $ebytes, $expected, $i, $status, $texpected, $tvalue, $value, $vbytes));
								return false;
							}
							unset($i);
						}
					}
				}
				return true;
			}
			if(Std::is($expected, _hx_qtype("Hash")) || Std::is($expected, _hx_qtype("IntHash"))) {
				if($status->recursive || $status->path === "") {
					$keys = Lambda::harray(_hx_anonymous(array("iterator" => array(new _hx_lambda(array(&$c, &$cexpected, &$cvalue, &$expected, &$status, &$texpected, &$tvalue, &$value), "utest_Assert_10"), 'execute'))));
					$vkeys = Lambda::harray(_hx_anonymous(array("iterator" => array(new _hx_lambda(array(&$c, &$cexpected, &$cvalue, &$expected, &$keys, &$status, &$texpected, &$tvalue, &$value), "utest_Assert_11"), 'execute'))));
					if($keys->length !== $vkeys->length) {
						$status->error = "expected " . _hx_string_rec($keys->length, "") . " keys but they were " . _hx_string_rec($vkeys->length, "") . (utest_Assert_12($c, $cexpected, $cvalue, $expected, $keys, $status, $texpected, $tvalue, $value, $vkeys));
						return false;
					}
					$path = $status->path;
					{
						$_g = 0;
						while($_g < $keys->length) {
							$key = $keys[$_g];
							++$_g;
							$status->path = utest_Assert_13($_g, $c, $cexpected, $cvalue, $expected, $key, $keys, $path, $status, $texpected, $tvalue, $value, $vkeys);
							if(!utest_Assert::sameAs($expected->get($key), $value->get($key), $status)) {
								$status->error = "expected " . utest_Assert::q($expected) . " but it is " . utest_Assert::q($value) . (utest_Assert_14($_g, $c, $cexpected, $cvalue, $expected, $key, $keys, $path, $status, $texpected, $tvalue, $value, $vkeys));
								return false;
							}
							unset($key);
						}
					}
				}
				return true;
			}
			if(utest_Assert::isIterator($expected, false)) {
				if($status->recursive || $status->path === "") {
					$evalues = Lambda::harray(_hx_anonymous(array("iterator" => array(new _hx_lambda(array(&$c, &$cexpected, &$cvalue, &$expected, &$status, &$texpected, &$tvalue, &$value), "utest_Assert_15"), 'execute'))));
					$vvalues = Lambda::harray(_hx_anonymous(array("iterator" => array(new _hx_lambda(array(&$c, &$cexpected, &$cvalue, &$evalues, &$expected, &$status, &$texpected, &$tvalue, &$value), "utest_Assert_16"), 'execute'))));
					if($evalues->length !== $vvalues->length) {
						$status->error = "expected " . _hx_string_rec($evalues->length, "") . " values in Iterator but they were " . _hx_string_rec($vvalues->length, "") . (utest_Assert_17($c, $cexpected, $cvalue, $evalues, $expected, $status, $texpected, $tvalue, $value, $vvalues));
						return false;
					}
					$path = $status->path;
					{
						$_g1 = 0; $_g = $evalues->length;
						while($_g1 < $_g) {
							$i = $_g1++;
							$status->path = utest_Assert_18($_g, $_g1, $c, $cexpected, $cvalue, $evalues, $expected, $i, $path, $status, $texpected, $tvalue, $value, $vvalues);
							if(!utest_Assert::sameAs($evalues[$i], $vvalues[$i], $status)) {
								$status->error = "expected " . utest_Assert::q($expected) . " but it is " . utest_Assert::q($value) . (utest_Assert_19($_g, $_g1, $c, $cexpected, $cvalue, $evalues, $expected, $i, $path, $status, $texpected, $tvalue, $value, $vvalues));
								return false;
							}
							unset($i);
						}
					}
				}
				return true;
			}
			if(utest_Assert::isIterable($expected, false)) {
				if($status->recursive || $status->path === "") {
					$evalues = Lambda::harray($expected);
					$vvalues = Lambda::harray($value);
					if($evalues->length !== $vvalues->length) {
						$status->error = "expected " . _hx_string_rec($evalues->length, "") . " values in Iterable but they were " . _hx_string_rec($vvalues->length, "") . (utest_Assert_20($c, $cexpected, $cvalue, $evalues, $expected, $status, $texpected, $tvalue, $value, $vvalues));
						return false;
					}
					$path = $status->path;
					{
						$_g1 = 0; $_g = $evalues->length;
						while($_g1 < $_g) {
							$i = $_g1++;
							$status->path = utest_Assert_21($_g, $_g1, $c, $cexpected, $cvalue, $evalues, $expected, $i, $path, $status, $texpected, $tvalue, $value, $vvalues);
							if(!utest_Assert::sameAs($evalues[$i], $vvalues[$i], $status)) {
								return false;
							}
							unset($i);
						}
					}
				}
				return true;
			}
			if($status->recursive || $status->path === "") {
				$fields = Type::getInstanceFields(Type::getClass($expected));
				$path = $status->path;
				{
					$_g = 0;
					while($_g < $fields->length) {
						$field = $fields[$_g];
						++$_g;
						$status->path = utest_Assert_22($_g, $c, $cexpected, $cvalue, $expected, $field, $fields, $path, $status, $texpected, $tvalue, $value);
						$e = Reflect::field($expected, $field);
						if(Reflect::isFunction($e)) {
							continue;
						}
						$v = Reflect::field($value, $field);
						if(!utest_Assert::sameAs($e, $v, $status)) {
							return false;
						}
						unset($v,$field,$e);
					}
				}
			}
			return true;
		}break;
		case 7:
		$e = $»t->params[0];
		{
			$eexpected = Type::getEnumName($e);
			$evalue = Type::getEnumName(Type::getEnum($value));
			if($eexpected !== $evalue) {
				$status->error = "expected enumeration of " . utest_Assert::q($eexpected) . " but it is " . utest_Assert::q($evalue) . (utest_Assert_23($e, $eexpected, $evalue, $expected, $status, $texpected, $tvalue, $value));
				return false;
			}
			if($status->recursive || $status->path === "") {
				if($expected->index !== $value->index) {
					$status->error = "expected " . utest_Assert::q(Type::enumConstructor($expected)) . " but is " . utest_Assert::q(Type::enumConstructor($value)) . (utest_Assert_24($e, $eexpected, $evalue, $expected, $status, $texpected, $tvalue, $value));
					return false;
				}
				$eparams = Type::enumParameters($expected);
				$vparams = Type::enumParameters($value);
				$path = $status->path;
				{
					$_g1 = 0; $_g = $eparams->length;
					while($_g1 < $_g) {
						$i = $_g1++;
						$status->path = utest_Assert_25($_g, $_g1, $e, $eexpected, $eparams, $evalue, $expected, $i, $path, $status, $texpected, $tvalue, $value, $vparams);
						if(!utest_Assert::sameAs($eparams[$i], $vparams[$i], $status)) {
							$status->error = "expected " . utest_Assert::q($expected) . " but it is " . utest_Assert::q($value) . (utest_Assert_26($_g, $_g1, $e, $eexpected, $eparams, $evalue, $expected, $i, $path, $status, $texpected, $tvalue, $value, $vparams));
							return false;
						}
						unset($i);
					}
				}
			}
			return true;
		}break;
		case 4:
		{
			if($status->recursive || $status->path === "") {
				$tfields = Reflect::fields($value);
				$fields = Reflect::fields($expected);
				$path = $status->path;
				{
					$_g = 0;
					while($_g < $fields->length) {
						$field = $fields[$_g];
						++$_g;
						$tfields->remove($field);
						$status->path = utest_Assert_27($_g, $expected, $field, $fields, $path, $status, $texpected, $tfields, $tvalue, $value);
						if(!_hx_has_field($value, $field)) {
							$status->error = "expected field " . $status->path . " does not exist in " . utest_Assert::q($value);
							return false;
						}
						$e = Reflect::field($expected, $field);
						if(Reflect::isFunction($e)) {
							continue;
						}
						$v = Reflect::field($value, $field);
						if(!utest_Assert::sameAs($e, $v, $status)) {
							return false;
						}
						unset($v,$field,$e);
					}
				}
				if($tfields->length > 0) {
					$status->error = "the tested object has extra field(s) (" . $tfields->join(", ") . ") not included in the expected ones";
					return false;
				}
			}
			if(utest_Assert::isIterator($expected, true)) {
				if(!utest_Assert::isIterator($value, true)) {
					$status->error = "expected Iterable but it is not " . (utest_Assert_28($expected, $status, $texpected, $tvalue, $value));
					return false;
				}
				if($status->recursive || $status->path === "") {
					$evalues = Lambda::harray(_hx_anonymous(array("iterator" => array(new _hx_lambda(array(&$expected, &$status, &$texpected, &$tvalue, &$value), "utest_Assert_29"), 'execute'))));
					$vvalues = Lambda::harray(_hx_anonymous(array("iterator" => array(new _hx_lambda(array(&$evalues, &$expected, &$status, &$texpected, &$tvalue, &$value), "utest_Assert_30"), 'execute'))));
					if($evalues->length !== $vvalues->length) {
						$status->error = "expected " . _hx_string_rec($evalues->length, "") . " values in Iterator but they were " . _hx_string_rec($vvalues->length, "") . (utest_Assert_31($evalues, $expected, $status, $texpected, $tvalue, $value, $vvalues));
						return false;
					}
					$path = $status->path;
					{
						$_g1 = 0; $_g = $evalues->length;
						while($_g1 < $_g) {
							$i = $_g1++;
							$status->path = utest_Assert_32($_g, $_g1, $evalues, $expected, $i, $path, $status, $texpected, $tvalue, $value, $vvalues);
							if(!utest_Assert::sameAs($evalues[$i], $vvalues[$i], $status)) {
								$status->error = "expected " . utest_Assert::q($expected) . " but it is " . utest_Assert::q($value) . (utest_Assert_33($_g, $_g1, $evalues, $expected, $i, $path, $status, $texpected, $tvalue, $value, $vvalues));
								return false;
							}
							unset($i);
						}
					}
				}
				return true;
			}
			if(utest_Assert::isIterable($expected, true)) {
				if(!utest_Assert::isIterable($value, true)) {
					$status->error = "expected Iterator but it is not " . (utest_Assert_34($expected, $status, $texpected, $tvalue, $value));
					return false;
				}
				if($status->recursive || $status->path === "") {
					$evalues = Lambda::harray($expected);
					$vvalues = Lambda::harray($value);
					if($evalues->length !== $vvalues->length) {
						$status->error = "expected " . _hx_string_rec($evalues->length, "") . " values in Iterable but they were " . _hx_string_rec($vvalues->length, "") . (utest_Assert_35($evalues, $expected, $status, $texpected, $tvalue, $value, $vvalues));
						return false;
					}
					$path = $status->path;
					{
						$_g1 = 0; $_g = $evalues->length;
						while($_g1 < $_g) {
							$i = $_g1++;
							$status->path = utest_Assert_36($_g, $_g1, $evalues, $expected, $i, $path, $status, $texpected, $tvalue, $value, $vvalues);
							if(!utest_Assert::sameAs($evalues[$i], $vvalues[$i], $status)) {
								return false;
							}
							unset($i);
						}
					}
				}
				return true;
			}
			return true;
		}break;
		case 8:
		{
			utest_Assert_37($expected, $status, $texpected, $tvalue, $value);
		}break;
		}
		utest_Assert_38($expected, $status, $texpected, $tvalue, $value);
	}
	static function q($v) {
		if(Std::is($v, _hx_qtype("String"))) {
			return "\"" . str_replace("\"", "\\\"", $v) . "\"";
		} else {
			return Std::string($v);
		}
	}
	static function same($expected, $value, $recursive = null, $msg = null, $pos = null) {
		$status = _hx_anonymous(array("recursive" => ((null === $recursive) ? true : $recursive), "path" => "", "error" => null));
		if(utest_Assert::sameAs($expected, $value, $status)) {
			utest_Assert::isTrue(true, $msg, $pos);
		} else {
			utest_Assert::fail(utest_Assert_39($expected, $msg, $pos, $recursive, $status, $value), $pos);
		}
	}
	static function raises($method, $type = null, $msgNotThrown = null, $msgWrongType = null, $pos = null) {
		if($type === null) {
			$type = _hx_qtype("String");
		}
		try {
			call_user_func($method);
			$name = Type::getClassName($type);
			if($name === null) {
				$name = "" . Std::string($type);
			}
			if(null === $msgNotThrown) {
				$msgNotThrown = "exception of type " . $name . " not raised";
			}
			utest_Assert::fail($msgNotThrown, $pos);
		}catch(Exception $»e) {
			$_ex_ = ($»e instanceof HException) ? $»e->e : $»e;
			$ex = $_ex_;
			{
				$name = Type::getClassName($type);
				if($name === null) {
					$name = "" . Std::string($type);
				}
				if(null === $msgWrongType) {
					$msgWrongType = "expected throw of type " . $name . " but was " . Std::string($ex);
				}
				utest_Assert::isTrue(Std::is($ex, $type), $msgWrongType, $pos);
			}
		}
	}
	static function allows($possibilities, $value, $msg = null, $pos = null) {
		if(Lambda::has($possibilities, $value, null)) {
			utest_Assert::isTrue(true, $msg, $pos);
		} else {
			utest_Assert::fail(utest_Assert_40($msg, $pos, $possibilities, $value), $pos);
		}
	}
	static function contains($match, $values, $msg = null, $pos = null) {
		if(Lambda::has($values, $match, null)) {
			utest_Assert::isTrue(true, $msg, $pos);
		} else {
			utest_Assert::fail(utest_Assert_41($match, $msg, $pos, $values), $pos);
		}
	}
	static function notContains($match, $values, $msg = null, $pos = null) {
		if(!Lambda::has($values, $match, null)) {
			utest_Assert::isTrue(true, $msg, $pos);
		} else {
			utest_Assert::fail(utest_Assert_42($match, $msg, $pos, $values), $pos);
		}
	}
	static function stringContains($match, $value, $msg = null, $pos = null) {
		if($value !== null && _hx_index_of($value, $match, null) >= 0) {
			utest_Assert::isTrue(true, $msg, $pos);
		} else {
			utest_Assert::fail(utest_Assert_43($match, $msg, $pos, $value), $pos);
		}
	}
	static function stringSequence($sequence, $value, $msg = null, $pos = null) {
		if(null === $value) {
			utest_Assert::fail((($msg === null) ? "null argument value" : $msg), $pos);
			return;
		}
		$p = 0;
		{
			$_g = 0;
			while($_g < $sequence->length) {
				$s = $sequence[$_g];
				++$_g;
				$p2 = _hx_index_of($value, $s, $p);
				if($p2 < 0) {
					if($msg === null) {
						$msg = "expected '" . $s . "' after ";
						if($p > 0) {
							$cut = _hx_substr($value, 0, $p);
							if(strlen($cut) > 30) {
								$cut = "..." . _hx_substr($cut, -27, null);
							}
							$msg .= " '" . $cut . "'";
							unset($cut);
						} else {
							$msg .= " begin";
						}
					}
					utest_Assert::fail($msg, $pos);
					return;
				}
				$p = $p2 + strlen($s);
				unset($s,$p2);
			}
		}
		utest_Assert::isTrue(true, $msg, $pos);
	}
	static function fail($msg = null, $pos = null) {
		if($msg === null) {
			$msg = "failure expected";
		}
		utest_Assert::isTrue(false, $msg, $pos);
	}
	static function warn($msg) {
		utest_Assert::$results->add(utest_Assertation::Warning($msg));
	}
	static function createAsync($f, $timeout = null) { return call_user_func_array(self::$createAsync, array($f, $timeout)); }
	public static $createAsync = null;
	static function createEvent($f, $timeout = null) { return call_user_func_array(self::$createEvent, array($f, $timeout)); }
	public static $createEvent = null;
	static function typeToString($t) {
		try {
			$_t = Type::getClass($t);
			if($_t !== null) {
				$t = $_t;
			}
		}catch(Exception $»e) {
			$_ex_ = ($»e instanceof HException) ? $»e->e : $»e;
			$e = $_ex_;
			{
			}
		}
		try {
			return Type::getClassName($t);
		}catch(Exception $»e) {
			$_ex_ = ($»e instanceof HException) ? $»e->e : $»e;
			$e2 = $_ex_;
			{
			}
		}
		try {
			$_t = Type::getEnum($t);
			if($_t !== null) {
				$t = $_t;
			}
		}catch(Exception $»e) {
			$_ex_ = ($»e instanceof HException) ? $»e->e : $»e;
			$e3 = $_ex_;
			{
			}
		}
		try {
			return Type::getEnumName($t);
		}catch(Exception $»e) {
			$_ex_ = ($»e instanceof HException) ? $»e->e : $»e;
			$e4 = $_ex_;
			{
			}
		}
		try {
			return Std::string(Type::typeof($t));
		}catch(Exception $»e) {
			$_ex_ = ($»e instanceof HException) ? $»e->e : $»e;
			$e5 = $_ex_;
			{
			}
		}
		try {
			return Std::string($t);
		}catch(Exception $»e) {
			$_ex_ = ($»e instanceof HException) ? $»e->e : $»e;
			$e6 = $_ex_;
			{
			}
		}
		return "<unable to retrieve type name>";
	}
	function __toString() { return 'utest.Assert'; }
}
utest_Assert::$createAsync = array(new _hx_lambda(array(), "utest_Assert_44"), 'execute');
utest_Assert::$createEvent = array(new _hx_lambda(array(), "utest_Assert_45"), 'execute');
function utest_Assert_0(&$expected, &$status, &$texpected, &$tvalue, &$value) {
	if($status->path === "") {
		return "";
	} else {
		return " for field " . $status->path;
	}
}
function utest_Assert_1(&$expected, &$status, &$texpected, &$tvalue, &$value) {
	if($status->path === "") {
		return "";
	} else {
		return " for field " . $status->path;
	}
}
function utest_Assert_2(&$expected, &$status, &$texpected, &$tvalue, &$value) {
	if($status->path === "") {
		return "";
	} else {
		return " for field " . $status->path;
	}
}
function utest_Assert_3(&$expected, &$status, &$texpected, &$tvalue, &$value) {
	if($status->path === "") {
		return "";
	} else {
		return " for field " . $status->path;
	}
}
function utest_Assert_4(&$c, &$cexpected, &$cvalue, &$expected, &$status, &$texpected, &$tvalue, &$value) {
	if($status->path === "") {
		return "";
	} else {
		return " for field " . $status->path;
	}
}
function utest_Assert_5(&$c, &$cexpected, &$cvalue, &$expected, &$status, &$texpected, &$tvalue, &$value) {
	if($status->path === "") {
		return "";
	} else {
		return " for field " . $status->path;
	}
}
function utest_Assert_6(&$_g, &$_g1, &$c, &$cexpected, &$cvalue, &$expected, &$i, &$path, &$status, &$texpected, &$tvalue, &$value) {
	if($path === "") {
		return "array[" . _hx_string_rec($i, "") . "]";
	} else {
		return $path . "[" . _hx_string_rec($i, "") . "]";
	}
}
function utest_Assert_7(&$_g, &$_g1, &$c, &$cexpected, &$cvalue, &$expected, &$i, &$path, &$status, &$texpected, &$tvalue, &$value) {
	if($status->path === "") {
		return "";
	} else {
		return " for field " . $status->path;
	}
}
function utest_Assert_8(&$c, &$cexpected, &$cvalue, &$expected, &$status, &$texpected, &$tvalue, &$value) {
	if($status->path === "") {
		return "";
	} else {
		return " for field " . $status->path;
	}
}
function utest_Assert_9(&$_g, &$_g1, &$c, &$cexpected, &$cvalue, &$ebytes, &$expected, &$i, &$status, &$texpected, &$tvalue, &$value, &$vbytes) {
	if($status->path === "") {
		return "";
	} else {
		return " for field " . $status->path;
	}
}
function utest_Assert_10(&$c, &$cexpected, &$cvalue, &$expected, &$status, &$texpected, &$tvalue, &$value) {
	{
		return $expected->keys();
	}
}
function utest_Assert_11(&$c, &$cexpected, &$cvalue, &$expected, &$keys, &$status, &$texpected, &$tvalue, &$value) {
	{
		return $value->keys();
	}
}
function utest_Assert_12(&$c, &$cexpected, &$cvalue, &$expected, &$keys, &$status, &$texpected, &$tvalue, &$value, &$vkeys) {
	if($status->path === "") {
		return "";
	} else {
		return " for field " . $status->path;
	}
}
function utest_Assert_13(&$_g, &$c, &$cexpected, &$cvalue, &$expected, &$key, &$keys, &$path, &$status, &$texpected, &$tvalue, &$value, &$vkeys) {
	if($path === "") {
		return "hash[" . $key . "]";
	} else {
		return $path . "[" . $key . "]";
	}
}
function utest_Assert_14(&$_g, &$c, &$cexpected, &$cvalue, &$expected, &$key, &$keys, &$path, &$status, &$texpected, &$tvalue, &$value, &$vkeys) {
	if($status->path === "") {
		return "";
	} else {
		return " for field " . $status->path;
	}
}
function utest_Assert_15(&$c, &$cexpected, &$cvalue, &$expected, &$status, &$texpected, &$tvalue, &$value) {
	{
		return $expected;
	}
}
function utest_Assert_16(&$c, &$cexpected, &$cvalue, &$evalues, &$expected, &$status, &$texpected, &$tvalue, &$value) {
	{
		return $value;
	}
}
function utest_Assert_17(&$c, &$cexpected, &$cvalue, &$evalues, &$expected, &$status, &$texpected, &$tvalue, &$value, &$vvalues) {
	if($status->path === "") {
		return "";
	} else {
		return " for field " . $status->path;
	}
}
function utest_Assert_18(&$_g, &$_g1, &$c, &$cexpected, &$cvalue, &$evalues, &$expected, &$i, &$path, &$status, &$texpected, &$tvalue, &$value, &$vvalues) {
	if($path === "") {
		return "iterator[" . _hx_string_rec($i, "") . "]";
	} else {
		return $path . "[" . _hx_string_rec($i, "") . "]";
	}
}
function utest_Assert_19(&$_g, &$_g1, &$c, &$cexpected, &$cvalue, &$evalues, &$expected, &$i, &$path, &$status, &$texpected, &$tvalue, &$value, &$vvalues) {
	if($status->path === "") {
		return "";
	} else {
		return " for field " . $status->path;
	}
}
function utest_Assert_20(&$c, &$cexpected, &$cvalue, &$evalues, &$expected, &$status, &$texpected, &$tvalue, &$value, &$vvalues) {
	if($status->path === "") {
		return "";
	} else {
		return " for field " . $status->path;
	}
}
function utest_Assert_21(&$_g, &$_g1, &$c, &$cexpected, &$cvalue, &$evalues, &$expected, &$i, &$path, &$status, &$texpected, &$tvalue, &$value, &$vvalues) {
	if($path === "") {
		return "iterable[" . _hx_string_rec($i, "") . "]";
	} else {
		return $path . "[" . _hx_string_rec($i, "") . "]";
	}
}
function utest_Assert_22(&$_g, &$c, &$cexpected, &$cvalue, &$expected, &$field, &$fields, &$path, &$status, &$texpected, &$tvalue, &$value) {
	if($path === "") {
		return $field;
	} else {
		return $path . "." . $field;
	}
}
function utest_Assert_23(&$e, &$eexpected, &$evalue, &$expected, &$status, &$texpected, &$tvalue, &$value) {
	if($status->path === "") {
		return "";
	} else {
		return " for field " . $status->path;
	}
}
function utest_Assert_24(&$e, &$eexpected, &$evalue, &$expected, &$status, &$texpected, &$tvalue, &$value) {
	if($status->path === "") {
		return "";
	} else {
		return " for field " . $status->path;
	}
}
function utest_Assert_25(&$_g, &$_g1, &$e, &$eexpected, &$eparams, &$evalue, &$expected, &$i, &$path, &$status, &$texpected, &$tvalue, &$value, &$vparams) {
	if($path === "") {
		return "enum[" . _hx_string_rec($i, "") . "]";
	} else {
		return $path . "[" . _hx_string_rec($i, "") . "]";
	}
}
function utest_Assert_26(&$_g, &$_g1, &$e, &$eexpected, &$eparams, &$evalue, &$expected, &$i, &$path, &$status, &$texpected, &$tvalue, &$value, &$vparams) {
	if($status->path === "") {
		return "";
	} else {
		return " for field " . $status->path;
	}
}
function utest_Assert_27(&$_g, &$expected, &$field, &$fields, &$path, &$status, &$texpected, &$tfields, &$tvalue, &$value) {
	if($path === "") {
		return $field;
	} else {
		return $path . "." . $field;
	}
}
function utest_Assert_28(&$expected, &$status, &$texpected, &$tvalue, &$value) {
	if($status->path === "") {
		return "";
	} else {
		return " for field " . $status->path;
	}
}
function utest_Assert_29(&$expected, &$status, &$texpected, &$tvalue, &$value) {
	{
		return $expected;
	}
}
function utest_Assert_30(&$evalues, &$expected, &$status, &$texpected, &$tvalue, &$value) {
	{
		return $value;
	}
}
function utest_Assert_31(&$evalues, &$expected, &$status, &$texpected, &$tvalue, &$value, &$vvalues) {
	if($status->path === "") {
		return "";
	} else {
		return " for field " . $status->path;
	}
}
function utest_Assert_32(&$_g, &$_g1, &$evalues, &$expected, &$i, &$path, &$status, &$texpected, &$tvalue, &$value, &$vvalues) {
	if($path === "") {
		return "iterator[" . _hx_string_rec($i, "") . "]";
	} else {
		return $path . "[" . _hx_string_rec($i, "") . "]";
	}
}
function utest_Assert_33(&$_g, &$_g1, &$evalues, &$expected, &$i, &$path, &$status, &$texpected, &$tvalue, &$value, &$vvalues) {
	if($status->path === "") {
		return "";
	} else {
		return " for field " . $status->path;
	}
}
function utest_Assert_34(&$expected, &$status, &$texpected, &$tvalue, &$value) {
	if($status->path === "") {
		return "";
	} else {
		return " for field " . $status->path;
	}
}
function utest_Assert_35(&$evalues, &$expected, &$status, &$texpected, &$tvalue, &$value, &$vvalues) {
	if($status->path === "") {
		return "";
	} else {
		return " for field " . $status->path;
	}
}
function utest_Assert_36(&$_g, &$_g1, &$evalues, &$expected, &$i, &$path, &$status, &$texpected, &$tvalue, &$value, &$vvalues) {
	if($path === "") {
		return "iterable[" . _hx_string_rec($i, "") . "]";
	} else {
		return $path . "[" . _hx_string_rec($i, "") . "]";
	}
}
function utest_Assert_37(&$expected, &$status, &$texpected, &$tvalue, &$value) {
	throw new HException("Unable to compare two unknown types");
}
function utest_Assert_38(&$expected, &$status, &$texpected, &$tvalue, &$value) {
	throw new HException("Unable to compare values: " . utest_Assert::q($expected) . " and " . utest_Assert::q($value));
}
function utest_Assert_39(&$expected, &$msg, &$pos, &$recursive, &$status, &$value) {
	if($msg === null) {
		return $status->error;
	} else {
		return $msg;
	}
}
function utest_Assert_40(&$msg, &$pos, &$possibilities, &$value) {
	if($msg === null) {
		return "value " . utest_Assert::q($value) . " not found in the expected possibilities " . Std::string($possibilities);
	} else {
		return $msg;
	}
}
function utest_Assert_41(&$match, &$msg, &$pos, &$values) {
	if($msg === null) {
		return "values " . utest_Assert::q($values) . " do not contain " . Std::string($match);
	} else {
		return $msg;
	}
}
function utest_Assert_42(&$match, &$msg, &$pos, &$values) {
	if($msg === null) {
		return "values " . utest_Assert::q($values) . " do contain " . Std::string($match);
	} else {
		return $msg;
	}
}
function utest_Assert_43(&$match, &$msg, &$pos, &$value) {
	if($msg === null) {
		return "value " . utest_Assert::q($value) . " does not contain " . utest_Assert::q($match);
	} else {
		return $msg;
	}
}
function utest_Assert_44($f, $timeout) {
	{
		return array(new _hx_lambda(array(&$f, &$timeout), "utest_Assert_46"), 'execute');
	}
}
function utest_Assert_45($f, $timeout) {
	{
		return array(new _hx_lambda(array(&$f, &$timeout), "utest_Assert_47"), 'execute');
	}
}
function utest_Assert_46(&$f, &$timeout) {
	{
	}
}
function utest_Assert_47(&$f, &$timeout, $e) {
	{
	}
}

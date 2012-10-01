<?php

class utest_ui_common_ClassResult {
	public function __construct($className, $setupName, $teardownName) {
		if(!php_Boot::$skip_constructor) {
		$this->fixtures = new Hash();
		$this->className = $className;
		$this->setupName = $setupName;
		$this->hasSetup = $setupName !== null;
		$this->teardownName = $teardownName;
		$this->hasTeardown = $teardownName !== null;
		$this->methods = 0;
		$this->stats = new utest_ui_common_ResultStats();
	}}
	public function methodNames($errorsHavePriority = null) {
		if($errorsHavePriority === null) {
			$errorsHavePriority = true;
		}
		$names = new _hx_array(array());
		if(null == $this->fixtures) throw new HException('null iterable');
		$»it = $this->fixtures->keys();
		while($»it->hasNext()) {
			$name = $»it->next();
			$names->push($name);
		}
		if($errorsHavePriority) {
			$me = $this;
			$names->sort(array(new _hx_lambda(array(&$errorsHavePriority, &$me, &$names), "utest_ui_common_ClassResult_0"), 'execute'));
		} else {
			$names->sort(array(new _hx_lambda(array(&$errorsHavePriority, &$names), "utest_ui_common_ClassResult_1"), 'execute'));
		}
		return $names;
	}
	public function exists($method) {
		return $this->fixtures->exists($method);
	}
	public function get($method) {
		return $this->fixtures->get($method);
	}
	public function add($result) {
		if($this->fixtures->exists($result->methodName)) {
			throw new HException("invalid duplicated fixture result");
		}
		$this->stats->wire($result->stats);
		$this->methods++;
		$this->fixtures->set($result->methodName, $result);
	}
	public $stats;
	public $methods;
	public $hasTeardown;
	public $hasSetup;
	public $teardownName;
	public $setupName;
	public $className;
	public $fixtures;
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
	function __toString() { return 'utest.ui.common.ClassResult'; }
}
function utest_ui_common_ClassResult_0(&$errorsHavePriority, &$me, &$names, $a, $b) {
	{
		$as = $me->get($a)->stats;
		$bs = $me->get($b)->stats;
		if($as->hasErrors) {
			return ((!$bs->hasErrors) ? -1 : (($as->errors === $bs->errors) ? Reflect::compare($a, $b) : Reflect::compare($as->errors, $bs->errors)));
		} else {
			if($bs->hasErrors) {
				return 1;
			} else {
				if($as->hasFailures) {
					return ((!$bs->hasFailures) ? -1 : (($as->failures === $bs->failures) ? Reflect::compare($a, $b) : Reflect::compare($as->failures, $bs->failures)));
				} else {
					if($bs->hasFailures) {
						return 1;
					} else {
						if($as->hasWarnings) {
							return ((!$bs->hasWarnings) ? -1 : (($as->warnings === $bs->warnings) ? Reflect::compare($a, $b) : Reflect::compare($as->warnings, $bs->warnings)));
						} else {
							if($bs->hasWarnings) {
								return 1;
							} else {
								return Reflect::compare($a, $b);
							}
						}
					}
				}
			}
		}
	}
}
function utest_ui_common_ClassResult_1(&$errorsHavePriority, &$names, $a, $b) {
	{
		return Reflect::compare($a, $b);
	}
}

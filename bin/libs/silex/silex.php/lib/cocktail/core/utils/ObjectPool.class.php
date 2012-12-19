<?php

class cocktail_core_utils_ObjectPool {
	public function __construct($pooledClass) {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.utils.ObjectPool::new");
		$»spos = $GLOBALS['%s']->length;
		$this->_pooledClass = $pooledClass;
		$this->_pool = new _hx_array(array());
		$this->_freeObjectIndex = -1;
		$this->_args = new _hx_array(array());
		$GLOBALS['%s']->pop();
	}}
	public function release($object) {
		$GLOBALS['%s']->push("cocktail.core.utils.ObjectPool::release");
		$»spos = $GLOBALS['%s']->length;
		$object->reset();
		$this->_freeObjectIndex++;
		$this->_pool[$this->_freeObjectIndex] = $object;
		$GLOBALS['%s']->pop();
	}
	public function get() {
		$GLOBALS['%s']->push("cocktail.core.utils.ObjectPool::get");
		$»spos = $GLOBALS['%s']->length;
		if($this->_freeObjectIndex === -1) {
			$»tmp = Type::createInstance($this->_pooledClass, $this->_args);
			$GLOBALS['%s']->pop();
			return $»tmp;
		} else {
			$object = $this->_pool[$this->_freeObjectIndex];
			$this->_freeObjectIndex--;
			{
				$GLOBALS['%s']->pop();
				return $object;
			}
		}
		$GLOBALS['%s']->pop();
	}
	public $_args;
	public $_pooledClass;
	public $_freeObjectIndex;
	public $_pool;
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
	static $_g = 0;
	function __toString() { return 'cocktail.core.utils.ObjectPool'; }
}

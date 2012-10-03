<?php

class org_slplayer_core_Application {
	public function __construct($id, $args = null) {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("org.slplayer.core.Application::new");
		$»spos = $GLOBALS['%s']->length;
		$this->dataObject = $args;
		$this->id = $id;
		$this->nodesIdSequence = 0;
		$this->registeredUIComponents = new _hx_array(array());
		$this->registeredNonUIComponents = new _hx_array(array());
		$this->nodeToCmpInstances = new Hash();
		$this->applicationContext = new org_slplayer_core_ApplicationContext();
		$GLOBALS['%s']->pop();
	}}
	public function getUnconflictedClassTag($displayObjectClassName) {
		$GLOBALS['%s']->push("org.slplayer.core.Application::getUnconflictedClassTag");
		$»spos = $GLOBALS['%s']->length;
		$classTag = $displayObjectClassName;
		if(_hx_index_of($classTag, ".", null) !== -1) {
			$classTag = _hx_substr($classTag, _hx_last_index_of($classTag, ".", null) + 1, null);
		}
		{
			$_g = 0; $_g1 = $this->getRegisteredUIComponents();
			while($_g < $_g1->length) {
				$rc = $_g1[$_g];
				++$_g;
				if($rc->classname !== $displayObjectClassName && $classTag === _hx_substr($rc->classname, _hx_last_index_of($classTag, ".", null) + 1, null)) {
					$GLOBALS['%s']->pop();
					return $displayObjectClassName;
				}
				unset($rc);
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $classTag;
		}
		$GLOBALS['%s']->pop();
	}
	public function getAssociatedComponents($node, $typeFilter) {
		$GLOBALS['%s']->push("org.slplayer.core.Application::getAssociatedComponents");
		$»spos = $GLOBALS['%s']->length;
		$nodeId = $node->getAttribute("data-" . "slpid");
		if($nodeId !== null) {
			$l = new HList();
			if($this->nodeToCmpInstances->exists($nodeId)) {
				if(null == $this->nodeToCmpInstances->get($nodeId)) throw new HException('null iterable');
				$»it = $this->nodeToCmpInstances->get($nodeId)->iterator();
				while($»it->hasNext()) {
					$i = $»it->next();
					if(Std::is($i, $typeFilter)) {
						$inst = $i;
						$l->add($inst);
						unset($inst);
					}
				}
			}
			{
				$GLOBALS['%s']->pop();
				return $l;
			}
		}
		{
			$»tmp = new HList();
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function removeAllAssociatedComponent($node) {
		$GLOBALS['%s']->push("org.slplayer.core.Application::removeAllAssociatedComponent");
		$»spos = $GLOBALS['%s']->length;
		$nodeId = $node->getAttribute("data-" . "slpid");
		if($nodeId !== null) {
			$node->removeAttribute("data-" . "slpid");
			$isError = !$this->nodeToCmpInstances->remove($nodeId);
			if($isError) {
				throw new HException("Could not find the node in the associated components list.");
			}
		}
		$GLOBALS['%s']->pop();
	}
	public function removeAssociatedComponent($node, $cmp) {
		$GLOBALS['%s']->push("org.slplayer.core.Application::removeAssociatedComponent");
		$»spos = $GLOBALS['%s']->length;
		$nodeId = $node->getAttribute("data-" . "slpid");
		$associatedCmps = null;
		if($nodeId !== null) {
			$associatedCmps = $this->nodeToCmpInstances->get($nodeId);
			$isError = !$associatedCmps->remove($cmp);
			if($isError) {
				throw new HException("Could not find the component in the node's associated components list.");
			}
			if($associatedCmps->isEmpty()) {
				$node->removeAttribute("data-" . "slpid");
				$this->nodeToCmpInstances->remove($nodeId);
			}
		}
		$GLOBALS['%s']->pop();
	}
	public function addAssociatedComponent($node, $cmp) {
		$GLOBALS['%s']->push("org.slplayer.core.Application::addAssociatedComponent");
		$»spos = $GLOBALS['%s']->length;
		$nodeId = $node->getAttribute("data-" . "slpid");
		$associatedCmps = null;
		if($nodeId !== null) {
			$associatedCmps = $this->nodeToCmpInstances->get($nodeId);
		} else {
			$this->nodesIdSequence++;
			$nodeId = Std::string($this->nodesIdSequence);
			$node->setAttribute("data-" . "slpid", $nodeId);
			$associatedCmps = new HList();
		}
		$associatedCmps->add($cmp);
		$this->nodeToCmpInstances->set($nodeId, $associatedCmps);
		$GLOBALS['%s']->pop();
	}
	public function cleanNode($node) {
		$GLOBALS['%s']->push("org.slplayer.core.Application::cleanNode");
		$»spos = $GLOBALS['%s']->length;
		if($node->get_nodeType() !== cocktail_Lib::get_document()->body->get_nodeType()) {
			$GLOBALS['%s']->pop();
			return;
		}
		$comps = $this->getAssociatedComponents($node, _hx_qtype("org.slplayer.component.ui.DisplayObject"));
		if(null == $comps) throw new HException('null iterable');
		$»it = $comps->iterator();
		while($»it->hasNext()) {
			$c = $»it->next();
			$c->remove();
		}
		{
			$_g1 = 0; $_g = $node->childNodes->length;
			while($_g1 < $_g) {
				$childCnt = $_g1++;
				$this->cleanNode($node->childNodes[$childCnt]);
				unset($childCnt);
			}
		}
		$GLOBALS['%s']->pop();
	}
	public function resolveCompClass($classname) {
		$GLOBALS['%s']->push("org.slplayer.core.Application::resolveCompClass");
		$»spos = $GLOBALS['%s']->length;
		$componentClass = Type::resolveClass($classname);
		if($componentClass === null) {
			throw new HException("ERROR cannot resolve " . $classname);
			null;
		}
		{
			$GLOBALS['%s']->pop();
			return $componentClass;
		}
		$GLOBALS['%s']->pop();
	}
	public function createNonUIComponents() {
		$GLOBALS['%s']->push("org.slplayer.core.Application::createNonUIComponents");
		$»spos = $GLOBALS['%s']->length;
		$_g = 0; $_g1 = $this->getRegisteredNonUIComponents();
		while($_g < $_g1->length) {
			$rc = $_g1[$_g];
			++$_g;
			$componentClass = $this->resolveCompClass($rc->classname);
			if($componentClass === null) {
				continue;
			}
			$cmpInstance = null;
			if($rc->args !== null) {
				$cmpInstance = Type::createInstance($componentClass, new _hx_array(array($rc->args)));
			} else {
				$cmpInstance = Type::createInstance($componentClass, new _hx_array(array()));
			}
			if($cmpInstance !== null && Std::is($cmpInstance, _hx_qtype("org.slplayer.component.ISLPlayerComponent"))) {
				$cmpInstance->initSLPlayerComponent($this->id);
			}
			unset($rc,$componentClass,$cmpInstance);
		}
		$GLOBALS['%s']->pop();
	}
	public function initUIComponents($compInstances) {
		$GLOBALS['%s']->push("org.slplayer.core.Application::initUIComponents");
		$»spos = $GLOBALS['%s']->length;
		if(null == $compInstances) throw new HException('null iterable');
		$»it = $compInstances->iterator();
		while($»it->hasNext()) {
			$ci = $»it->next();
			$ci->init();
		}
		$GLOBALS['%s']->pop();
	}
	public function createUIComponents($node) {
		$GLOBALS['%s']->push("org.slplayer.core.Application::createUIComponents");
		$»spos = $GLOBALS['%s']->length;
		if($node->get_nodeType() !== cocktail_Lib::get_document()->body->get_nodeType()) {
			$GLOBALS['%s']->pop();
			return null;
		}
		if($node->getAttribute("data-" . "slpid") !== null) {
			$GLOBALS['%s']->pop();
			return null;
		}
		$compsToInit = new HList();
		if($node->getAttribute("class") !== null) {
			$_g = 0; $_g1 = _hx_explode(" ", $node->getAttribute("class"));
			while($_g < $_g1->length) {
				$classValue = $_g1[$_g];
				++$_g;
				{
					$_g2 = 0; $_g3 = $this->getRegisteredUIComponents();
					while($_g2 < $_g3->length) {
						$rc = $_g3[$_g2];
						++$_g2;
						$componentClassAttrValues = new _hx_array(array($this->getUnconflictedClassTag($rc->classname)));
						if($componentClassAttrValues[0] !== $rc->classname) {
							$componentClassAttrValues->push($rc->classname);
						}
						if(!Lambda::exists($componentClassAttrValues, array(new _hx_lambda(array(&$_g, &$_g1, &$_g2, &$_g3, &$classValue, &$componentClassAttrValues, &$compsToInit, &$node, &$rc), "org_slplayer_core_Application_0"), 'execute'))) {
							continue;
						}
						$componentClass = $this->resolveCompClass($rc->classname);
						if($componentClass === null) {
							continue;
						}
						$newDisplayObject = null;
						$newDisplayObject = Type::createInstance($componentClass, new _hx_array(array($node, $this->id)));
						$compsToInit->add($newDisplayObject);
						unset($rc,$newDisplayObject,$componentClassAttrValues,$componentClass);
					}
					unset($_g3,$_g2);
				}
				unset($classValue);
			}
		}
		{
			$_g1 = 0; $_g = $node->childNodes->length;
			while($_g1 < $_g) {
				$cc = $_g1++;
				$res = $this->createUIComponents($node->childNodes[$cc]);
				if($res !== null) {
					$compsToInit = Lambda::concat($compsToInit, $res);
				}
				unset($res,$cc);
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $compsToInit;
		}
		$GLOBALS['%s']->pop();
	}
	public function initNode($node) {
		$GLOBALS['%s']->push("org.slplayer.core.Application::initNode");
		$»spos = $GLOBALS['%s']->length;
		$comps = $this->createUIComponents($node);
		if($comps === null) {
			$GLOBALS['%s']->pop();
			return;
		}
		$this->initUIComponents($comps);
		$GLOBALS['%s']->pop();
	}
	public function initComponents() {
		$GLOBALS['%s']->push("org.slplayer.core.Application::initComponents");
		$»spos = $GLOBALS['%s']->length;
		$this->initNode($this->htmlRootElement);
		$this->createNonUIComponents();
		$GLOBALS['%s']->pop();
	}
	public function initDom($appendTo = null) {
		$GLOBALS['%s']->push("org.slplayer.core.Application::initDom");
		$»spos = $GLOBALS['%s']->length;
		$this->htmlRootElement = $appendTo;
		if($this->htmlRootElement === null || $this->htmlRootElement->get_nodeType() !== cocktail_Lib::get_document()->documentElement->get_nodeType()) {
			$this->htmlRootElement = cocktail_Lib::get_document()->documentElement;
		}
		if($this->htmlRootElement === null) {
			$GLOBALS['%s']->pop();
			return;
		}
		$GLOBALS['%s']->pop();
	}
	public function getRegisteredNonUIComponents() {
		$GLOBALS['%s']->push("org.slplayer.core.Application::getRegisteredNonUIComponents");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->applicationContext->registeredNonUIComponents;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public $registeredNonUIComponents;
	public function getRegisteredUIComponents() {
		$GLOBALS['%s']->push("org.slplayer.core.Application::getRegisteredUIComponents");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->applicationContext->registeredUIComponents;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public $registeredUIComponents;
	public $applicationContext;
	public $dataObject;
	public $htmlRootElement;
	public $nodeToCmpInstances;
	public $nodesIdSequence;
	public $id;
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
	static $SLPID_ATTR_NAME = "slpid";
	static $instances;
	static function get($SLPId) {
		$GLOBALS['%s']->push("org.slplayer.core.Application::get");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = org_slplayer_core_Application::$instances->get($SLPId);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function main() {
		$GLOBALS['%s']->push("org.slplayer.core.Application::main");
		$»spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	static function createApplication($args = null) {
		$GLOBALS['%s']->push("org.slplayer.core.Application::createApplication");
		$»spos = $GLOBALS['%s']->length;
		$newId = org_slplayer_core_Application::generateUniqueId();
		$newInstance = new org_slplayer_core_Application($newId, $args);
		org_slplayer_core_Application::$instances->set($newId, $newInstance);
		{
			$GLOBALS['%s']->pop();
			return $newInstance;
		}
		$GLOBALS['%s']->pop();
	}
	static function generateUniqueId() {
		$GLOBALS['%s']->push("org.slplayer.core.Application::generateUniqueId");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = Std::string(Math::round(Math::random() * 10000));
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static $__properties__ = array("get_registeredUIComponents" => "getRegisteredUIComponents","get_registeredNonUIComponents" => "getRegisteredNonUIComponents");
	function __toString() { return 'org.slplayer.core.Application'; }
}
org_slplayer_core_Application::$instances = new Hash();
function org_slplayer_core_Application_0(&$_g, &$_g1, &$_g2, &$_g3, &$classValue, &$componentClassAttrValues, &$compsToInit, &$node, &$rc, $s) {
	$»spos = $GLOBALS['%s']->length;
	{
		$GLOBALS['%s']->push("org.slplayer.core.Application::createUIComponents@332");
		$»spos2 = $GLOBALS['%s']->length;
		{
			$»tmp = $s === $classValue;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
}

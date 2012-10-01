<?php

class org_slplayer_core_Application {
	public function __construct($id, $args = null) {
		if(!php_Boot::$skip_constructor) {
		$this->dataObject = $args;
		$this->id = $id;
		$this->nodesIdSequence = 0;
		$this->registeredUIComponents = new _hx_array(array());
		$this->registeredNonUIComponents = new _hx_array(array());
		$this->nodeToCmpInstances = new Hash();
		$this->applicationContext = new org_slplayer_core_ApplicationContext();
		haxe_Log::trace("new SLPlayer instance built", _hx_anonymous(array("fileName" => "Application.hx", "lineNumber" => 163, "className" => "org.slplayer.core.Application", "methodName" => "new")));
	}}
	public function getUnconflictedClassTag($displayObjectClassName) {
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
					return $displayObjectClassName;
				}
				unset($rc);
			}
		}
		return $classTag;
	}
	public function getAssociatedComponents($node, $typeFilter) {
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
			return $l;
		}
		return new HList();
	}
	public function removeAllAssociatedComponent($node) {
		$nodeId = $node->getAttribute("data-" . "slpid");
		if($nodeId !== null) {
			$node->removeAttribute("data-" . "slpid");
			$isError = !$this->nodeToCmpInstances->remove($nodeId);
			if($isError) {
				throw new HException("Could not find the node in the associated components list.");
			}
		} else {
			haxe_Log::trace("Warning: there are no components associated with this node", _hx_anonymous(array("fileName" => "Application.hx", "lineNumber" => 612, "className" => "org.slplayer.core.Application", "methodName" => "removeAllAssociatedComponent")));
		}
	}
	public function removeAssociatedComponent($node, $cmp) {
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
		} else {
			haxe_Log::trace("Warning: there are no components associated with this node", _hx_anonymous(array("fileName" => "Application.hx", "lineNumber" => 587, "className" => "org.slplayer.core.Application", "methodName" => "removeAssociatedComponent")));
		}
	}
	public function addAssociatedComponent($node, $cmp) {
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
	}
	public function cleanNode($node) {
		if($node->get_nodeType() !== cocktail_Lib::get_document()->body->get_nodeType()) {
			return;
		}
		haxe_Log::trace("clean " . $node->tagName, _hx_anonymous(array("fileName" => "Application.hx", "lineNumber" => 516, "className" => "org.slplayer.core.Application", "methodName" => "cleanNode")));
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
	}
	public function resolveCompClass($classname) {
		$componentClass = Type::resolveClass($classname);
		if($componentClass === null) {
			haxe_Log::trace("ERROR cannot resolve " . $classname, _hx_anonymous(array("fileName" => "Application.hx", "lineNumber" => 499, "className" => "org.slplayer.core.Application", "methodName" => "resolveCompClass")));
		}
		return $componentClass;
	}
	public function createNonUIComponents() {
		$_g = 0; $_g1 = $this->getRegisteredNonUIComponents();
		while($_g < $_g1->length) {
			$rc = $_g1[$_g];
			++$_g;
			haxe_Log::trace("Try to create an instance of " . $rc->classname . " non visual component", _hx_anonymous(array("fileName" => "Application.hx", "lineNumber" => 431, "className" => "org.slplayer.core.Application", "methodName" => "createNonUIComponents")));
			$componentClass = $this->resolveCompClass($rc->classname);
			if($componentClass === null) {
				continue;
			}
			$cmpInstance = null;
			try {
				if($rc->args !== null) {
					$cmpInstance = Type::createInstance($componentClass, new _hx_array(array($rc->args)));
				} else {
					$cmpInstance = Type::createInstance($componentClass, new _hx_array(array()));
				}
				haxe_Log::trace("Successfuly created instance of " . $rc->classname, _hx_anonymous(array("fileName" => "Application.hx", "lineNumber" => 454, "className" => "org.slplayer.core.Application", "methodName" => "createNonUIComponents")));
			}catch(Exception $»e) {
				$_ex_ = ($»e instanceof HException) ? $»e->e : $»e;
				$unknown = $_ex_;
				{
					haxe_Log::trace("ERROR while creating " . $rc->classname . ": " . Std::string($unknown), _hx_anonymous(array("fileName" => "Application.hx", "lineNumber" => 461, "className" => "org.slplayer.core.Application", "methodName" => "createNonUIComponents")));
					$excptArr = haxe_Stack::exceptionStack();
					if($excptArr->length > 0) {
						haxe_Log::trace(haxe_Stack::toString(haxe_Stack::exceptionStack()), _hx_anonymous(array("fileName" => "Application.hx", "lineNumber" => 465, "className" => "org.slplayer.core.Application", "methodName" => "createNonUIComponents")));
					}
					unset($excptArr);
				}
			}
			if($cmpInstance !== null && Std::is($cmpInstance, _hx_qtype("org.slplayer.component.ISLPlayerComponent"))) {
				$cmpInstance->initSLPlayerComponent($this->id);
			}
			unset($unknown,$rc,$componentClass,$cmpInstance);
		}
	}
	public function initUIComponents($compInstances) {
		if(null == $compInstances) throw new HException('null iterable');
		$»it = $compInstances->iterator();
		while($»it->hasNext()) {
			$ci = $»it->next();
			try {
				haxe_Log::trace("call init() on " . Type::getClassName(Type::getClass($ci)), _hx_anonymous(array("fileName" => "Application.hx", "lineNumber" => 404, "className" => "org.slplayer.core.Application", "methodName" => "initUIComponents")));
				$ci->init();
			}catch(Exception $»e) {
				$_ex_ = ($»e instanceof HException) ? $»e->e : $»e;
				$unknown = $_ex_;
				{
					haxe_Log::trace("ERROR while trying to call init() on a " . Type::getClassName(Type::getClass($ci)) . ": " . Std::string($unknown), _hx_anonymous(array("fileName" => "Application.hx", "lineNumber" => 412, "className" => "org.slplayer.core.Application", "methodName" => "initUIComponents")));
					$excptArr = haxe_Stack::exceptionStack();
					if($excptArr->length > 0) {
						haxe_Log::trace(haxe_Stack::toString(haxe_Stack::exceptionStack()), _hx_anonymous(array("fileName" => "Application.hx", "lineNumber" => 416, "className" => "org.slplayer.core.Application", "methodName" => "initUIComponents")));
					}
					unset($excptArr);
				}
			}
			unset($unknown);
		}
	}
	public function createUIComponents($node) {
		if($node->get_nodeType() !== cocktail_Lib::get_document()->body->get_nodeType()) {
			return null;
		}
		if($node->getAttribute("data-" . "slpid") !== null) {
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
						try {
							$newDisplayObject = Type::createInstance($componentClass, new _hx_array(array($node, $this->id)));
							haxe_Log::trace("Successfuly created instance of " . $rc->classname, _hx_anonymous(array("fileName" => "Application.hx", "lineNumber" => 355, "className" => "org.slplayer.core.Application", "methodName" => "createUIComponents")));
						}catch(Exception $»e) {
							$_ex_ = ($»e instanceof HException) ? $»e->e : $»e;
							$unknown = $_ex_;
							{
								haxe_Log::trace("ERROR while creating " . $rc->classname . ": " . Std::string($unknown), _hx_anonymous(array("fileName" => "Application.hx", "lineNumber" => 362, "className" => "org.slplayer.core.Application", "methodName" => "createUIComponents")));
								$excptArr = haxe_Stack::exceptionStack();
								if($excptArr->length > 0) {
									haxe_Log::trace(haxe_Stack::toString(haxe_Stack::exceptionStack()), _hx_anonymous(array("fileName" => "Application.hx", "lineNumber" => 366, "className" => "org.slplayer.core.Application", "methodName" => "createUIComponents")));
								}
								unset($excptArr);
							}
						}
						$compsToInit->add($newDisplayObject);
						unset($unknown,$rc,$newDisplayObject,$componentClassAttrValues,$componentClass);
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
		return $compsToInit;
	}
	public function initNode($node) {
		$comps = $this->createUIComponents($node);
		if($comps === null) {
			return;
		}
		$this->initUIComponents($comps);
	}
	public function initComponents() {
		$this->initNode($this->htmlRootElement);
		$this->createNonUIComponents();
	}
	public function initDom($appendTo = null) {
		haxe_Log::trace("Initializing SLPlayer id " . $this->id . " on " . Std::string($appendTo), _hx_anonymous(array("fileName" => "Application.hx", "lineNumber" => 203, "className" => "org.slplayer.core.Application", "methodName" => "initDom")));
		haxe_Log::trace("setting htmlRootElement to " . Std::string($appendTo), _hx_anonymous(array("fileName" => "Application.hx", "lineNumber" => 208, "className" => "org.slplayer.core.Application", "methodName" => "initDom")));
		$this->htmlRootElement = $appendTo;
		if($this->htmlRootElement === null || $this->htmlRootElement->get_nodeType() !== cocktail_Lib::get_document()->documentElement->get_nodeType()) {
			haxe_Log::trace("setting htmlRootElement to Lib.document.documentElement", _hx_anonymous(array("fileName" => "Application.hx", "lineNumber" => 216, "className" => "org.slplayer.core.Application", "methodName" => "initDom")));
			$this->htmlRootElement = cocktail_Lib::get_document()->documentElement;
		}
		if($this->htmlRootElement === null) {
			haxe_Log::trace("ERROR could not set Application's root element.", _hx_anonymous(array("fileName" => "Application.hx", "lineNumber" => 227, "className" => "org.slplayer.core.Application", "methodName" => "initDom")));
			return;
		}
	}
	public function getRegisteredNonUIComponents() {
		return $this->applicationContext->registeredNonUIComponents;
	}
	public $registeredNonUIComponents;
	public function getRegisteredUIComponents() {
		return $this->applicationContext->registeredUIComponents;
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
		return org_slplayer_core_Application::$instances->get($SLPId);
	}
	static function main() {
	}
	static function createApplication($args = null) {
		haxe_Log::trace("SLPlayer createApplication() called with args=" . Std::string($args), _hx_anonymous(array("fileName" => "Application.hx", "lineNumber" => 175, "className" => "org.slplayer.core.Application", "methodName" => "createApplication")));
		$newId = org_slplayer_core_Application::generateUniqueId();
		haxe_Log::trace("New SLPlayer id created : " . $newId, _hx_anonymous(array("fileName" => "Application.hx", "lineNumber" => 182, "className" => "org.slplayer.core.Application", "methodName" => "createApplication")));
		$newInstance = new org_slplayer_core_Application($newId, $args);
		haxe_Log::trace("setting ref to SLPlayer instance " . $newId, _hx_anonymous(array("fileName" => "Application.hx", "lineNumber" => 188, "className" => "org.slplayer.core.Application", "methodName" => "createApplication")));
		org_slplayer_core_Application::$instances->set($newId, $newInstance);
		return $newInstance;
	}
	static function generateUniqueId() {
		return Std::string(Math::round(Math::random() * 10000));
	}
	static $__properties__ = array("get_registeredUIComponents" => "getRegisteredUIComponents","get_registeredNonUIComponents" => "getRegisteredNonUIComponents");
	function __toString() { return 'org.slplayer.core.Application'; }
}
org_slplayer_core_Application::$instances = new Hash();
function org_slplayer_core_Application_0(&$_g, &$_g1, &$_g2, &$_g3, &$classValue, &$componentClassAttrValues, &$compsToInit, &$node, &$rc, $s) {
	{
		return $s === $classValue;
	}
}

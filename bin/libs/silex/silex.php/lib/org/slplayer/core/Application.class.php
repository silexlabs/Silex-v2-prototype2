<?php

class org_slplayer_core_Application {
	public function __construct($id, $args = null) {
		if(!php_Boot::$skip_constructor) {
		$this->dataObject = $args;
		$this->id = $id;
		$this->registeredComponents = new _hx_array(array());
		$this->nodeToCmpInstances = new Hash();
		$this->metaParameters = new Hash();
	}}
	public function getUnconflictedClassTag($displayObjectClassName) {
		$classTag = $displayObjectClassName;
		if(_hx_index_of($classTag, ".", null) !== -1) {
			$classTag = _hx_substr($classTag, _hx_last_index_of($classTag, ".", null) + 1, null);
		}
		{
			$_g = 0; $_g1 = $this->registeredComponents;
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
			return $l;
		}
		return new HList();
	}
	public function addAssociatedComponent($node, $cmp) {
		$nodeId = $node->getAttribute("data-" . "slpid");
		$associatedCmps = null;
		if($nodeId !== null) {
			$associatedCmps = $this->nodeToCmpInstances->get($nodeId);
		} else {
			$nodeId = org_slplayer_core_Application::generateUniqueId();
			$node->setAttribute("data-" . "slpid", $nodeId);
			$associatedCmps = new HList();
		}
		$associatedCmps->add($cmp);
		$this->nodeToCmpInstances->set($nodeId, $associatedCmps);
	}
	public function callInitOnComponents() {
		if(null == $this->nodeToCmpInstances) throw new HException('null iterable');
		$»it = $this->nodeToCmpInstances->iterator();
		while($»it->hasNext()) {
			$l = $»it->next();
			if(null == $l) throw new HException('null iterable');
			$»it2 = $l->iterator();
			while($»it2->hasNext()) {
				$c = $»it2->next();
				try {
					$c->init();
				}catch(Exception $»e) {
					$_ex_ = ($»e instanceof HException) ? $»e->e : $»e;
					$unknown = $_ex_;
					{
						haxe_Log::trace("ERROR while trying to call init() on a " . Type::getClassName(Type::getClass($c)) . ": " . Std::string($unknown), _hx_anonymous(array("fileName" => "Application.hx", "lineNumber" => 408, "className" => "org.slplayer.core.Application", "methodName" => "callInitOnComponents")));
						$excptArr = haxe_Stack::exceptionStack();
						if($excptArr->length > 0) {
							haxe_Log::trace(haxe_Stack::toString(haxe_Stack::exceptionStack()), _hx_anonymous(array("fileName" => "Application.hx", "lineNumber" => 412, "className" => "org.slplayer.core.Application", "methodName" => "callInitOnComponents")));
						}
						unset($excptArr);
					}
				}
				unset($unknown);
			}
		}
	}
	public function createComponentsOfType($componentClassName, $args = null) {
		$componentClass = Type::resolveClass($componentClassName);
		if($componentClass === null) {
			$rslErrMsg = "ERROR cannot resolve " . $componentClassName;
			haxe_Log::trace($rslErrMsg, _hx_anonymous(array("fileName" => "Application.hx", "lineNumber" => 271, "className" => "org.slplayer.core.Application", "methodName" => "createComponentsOfType")));
			return;
		}
		if(org_slplayer_component_ui_DisplayObject::isDisplayObject($componentClass)) {
			$classTag = $this->getUnconflictedClassTag($componentClassName);
			$taggedNodes = new _hx_array(array());
			$taggedNodesCollection = $this->htmlRootElement->getElementsByClassName($classTag);
			{
				$_g1 = 0; $_g = $taggedNodesCollection->length;
				while($_g1 < $_g) {
					$nodeCnt = $_g1++;
					$taggedNodes->push($taggedNodesCollection[$nodeCnt]);
					unset($nodeCnt);
				}
			}
			if($componentClassName !== $classTag) {
				$taggedNodesCollection = $this->htmlRootElement->getElementsByClassName($componentClassName);
				{
					$_g1 = 0; $_g = $taggedNodesCollection->length;
					while($_g1 < $_g) {
						$nodeCnt = $_g1++;
						$taggedNodes->push($taggedNodesCollection[$nodeCnt]);
						unset($nodeCnt);
					}
				}
			}
			{
				$_g = 0;
				while($_g < $taggedNodes->length) {
					$node = $taggedNodes[$_g];
					++$_g;
					$newDisplayObject = null;
					try {
						$newDisplayObject = Type::createInstance($componentClass, new _hx_array(array($node, $this->id)));
					}catch(Exception $»e) {
						$_ex_ = ($»e instanceof HException) ? $»e->e : $»e;
						$unknown = $_ex_;
						{
							haxe_Log::trace("ERROR while creating " . $componentClassName . ": " . Std::string($unknown), _hx_anonymous(array("fileName" => "Application.hx", "lineNumber" => 331, "className" => "org.slplayer.core.Application", "methodName" => "createComponentsOfType")));
							$excptArr = haxe_Stack::exceptionStack();
							if($excptArr->length > 0) {
								haxe_Log::trace(haxe_Stack::toString(haxe_Stack::exceptionStack()), _hx_anonymous(array("fileName" => "Application.hx", "lineNumber" => 335, "className" => "org.slplayer.core.Application", "methodName" => "createComponentsOfType")));
							}
							unset($excptArr);
						}
					}
					unset($unknown,$node,$newDisplayObject);
				}
			}
		} else {
			$cmpInstance = null;
			try {
				if($args !== null) {
					$cmpInstance = Type::createInstance($componentClass, new _hx_array(array($args)));
				} else {
					$cmpInstance = Type::createInstance($componentClass, new _hx_array(array()));
				}
			}catch(Exception $»e) {
				$_ex_ = ($»e instanceof HException) ? $»e->e : $»e;
				$unknown = $_ex_;
				{
					haxe_Log::trace("ERROR while creating " . $componentClassName . ": " . Std::string($unknown), _hx_anonymous(array("fileName" => "Application.hx", "lineNumber" => 367, "className" => "org.slplayer.core.Application", "methodName" => "createComponentsOfType")));
					$excptArr = haxe_Stack::exceptionStack();
					if($excptArr->length > 0) {
						haxe_Log::trace(haxe_Stack::toString(haxe_Stack::exceptionStack()), _hx_anonymous(array("fileName" => "Application.hx", "lineNumber" => 371, "className" => "org.slplayer.core.Application", "methodName" => "createComponentsOfType")));
					}
				}
			}
			if($cmpInstance !== null && Std::is($cmpInstance, _hx_qtype("org.slplayer.component.ISLPlayerComponent"))) {
				$cmpInstance->initSLPlayerComponent($this->id);
			}
		}
	}
	public function initComponents() {
		{
			$_g = 0; $_g1 = $this->registeredComponents;
			while($_g < $_g1->length) {
				$rc = $_g1[$_g];
				++$_g;
				$this->createComponentsOfType($rc->classname, $rc->args);
				unset($rc);
			}
		}
		$this->callInitOnComponents();
	}
	public function registerComponent($componentClassName, $args = null) {
		$this->registeredComponents->push(_hx_anonymous(array("classname" => $componentClassName, "args" => $args)));
	}
	public function registerComponentsforInit() {
	}
	public function initMetaParameters() {
	}
	public function initHtmlRootElementContent() {
		$this->htmlRootElement->set_innerHTML(org_slplayer_core_Application::$_htmlBody);
	}
	public function launch($appendTo = null) {
		if($appendTo !== null) {
			$this->htmlRootElement = $appendTo;
		}
		if($this->htmlRootElement === null || $this->htmlRootElement->get_nodeType() !== cocktail_Lib::get_document()->body->get_nodeType()) {
			$this->htmlRootElement = cocktail_Lib::get_document()->body;
		}
		if($this->htmlRootElement === null) {
			haxe_Log::trace("ERROR could not set Application's root element.", _hx_anonymous(array("fileName" => "Application.hx", "lineNumber" => 138, "className" => "org.slplayer.core.Application", "methodName" => "launch")));
			return;
		}
		$this->initHtmlRootElementContent();
		$this->initMetaParameters();
		$this->registerComponentsforInit();
		$this->initComponents();
	}
	public function getMetaParameter($metaParamKey) {
		return $this->metaParameters->get($metaParamKey);
	}
	public $metaParameters;
	public $registeredComponents;
	public $dataObject;
	public $htmlRootElement;
	public $nodeToCmpInstances;
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
	static function generateUniqueId() {
		return haxe_Md5::encode(Date::now()->toString() . Std::string(Std::random(intval(Date::now()->getTime()))));
	}
	static function init($appendTo = null, $args = null) {
		$newId = org_slplayer_core_Application::generateUniqueId();
		$newInstance = new org_slplayer_core_Application($newId, $args);
		org_slplayer_core_Application::$instances->set($newId, $newInstance);
		$newInstance->launch($appendTo);
	}
	static function main() {
		org_slplayer_core_Application::init(null, null);
	}
	static $_htmlBody;
	function __toString() { return 'org.slplayer.core.Application'; }
}
org_slplayer_core_Application::$instances = new Hash();
org_slplayer_core_Application::$_htmlBody = haxe_Unserializer::run("y0:");

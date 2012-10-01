<?php

class org_slplayer_component_navigation_Layer extends org_slplayer_component_ui_DisplayObject {
	public function __construct($rootElement, $SLPId) {
		if(!php_Boot::$skip_constructor) {
		parent::__construct($rootElement,$SLPId);
		$this->childrenArray = new _hx_array(array());
		$this->status = org_slplayer_component_navigation_LayerStatus::$notInit;
		$this->styleAttrDisplay = $rootElement->style->get_display();
	}}
	public function cleanupVideoElements($nodeList) {
		$_g1 = 0; $_g = $nodeList->length;
		while($_g1 < $_g) {
			$idx = $_g1++;
			try {
				$element = $nodeList[$idx];
				$element->pause();
				$element->set_currentTime(0);
				unset($element);
			}catch(Exception $»e) {
				$_ex_ = ($»e instanceof HException) ? $»e->e : $»e;
				$e = $_ex_;
				{
					haxe_Log::trace("Layer error: could not access audio or video element", _hx_anonymous(array("fileName" => "Layer.hx", "lineNumber" => 505, "className" => "org.slplayer.component.navigation.Layer", "methodName" => "cleanupVideoElements")));
				}
			}
			unset($idx,$e);
		}
	}
	public function cleanupAudioElements($nodeList) {
		$_g1 = 0; $_g = $nodeList->length;
		while($_g1 < $_g) {
			$idx = $_g1++;
			try {
				$element = $nodeList[$idx];
				$element->pause();
				$element->set_currentTime(0);
				unset($element);
			}catch(Exception $»e) {
				$_ex_ = ($»e instanceof HException) ? $»e->e : $»e;
				$e = $_ex_;
				{
					haxe_Log::trace("Layer error: could not access audio or video element", _hx_anonymous(array("fileName" => "Layer.hx", "lineNumber" => 483, "className" => "org.slplayer.component.navigation.Layer", "methodName" => "cleanupAudioElements")));
				}
			}
			unset($idx,$e);
		}
	}
	public function setupVideoElements($nodeList) {
		$_g1 = 0; $_g = $nodeList->length;
		while($_g1 < $_g) {
			$idx = $_g1++;
			try {
				$element = $nodeList[$idx];
				if($element->get_autoplay() === true) {
					$element->set_currentTime(0);
					$element->play();
				}
				$element->set_muted(org_slplayer_component_sound_SoundOn::$isMuted);
				unset($element);
			}catch(Exception $»e) {
				$_ex_ = ($»e instanceof HException) ? $»e->e : $»e;
				$e = $_ex_;
				{
					haxe_Log::trace("Layer error: could not access audio or video element", _hx_anonymous(array("fileName" => "Layer.hx", "lineNumber" => 461, "className" => "org.slplayer.component.navigation.Layer", "methodName" => "setupVideoElements")));
				}
			}
			unset($idx,$e);
		}
	}
	public function setupAudioElements($nodeList) {
		$_g1 = 0; $_g = $nodeList->length;
		while($_g1 < $_g) {
			$idx = $_g1++;
			try {
				$element = $nodeList[$idx];
				if($element->get_autoplay() === true) {
					$element->set_currentTime(0);
					$element->play();
				}
				$element->set_muted(org_slplayer_component_sound_SoundOn::$isMuted);
				unset($element);
			}catch(Exception $»e) {
				$_ex_ = ($»e instanceof HException) ? $»e->e : $»e;
				$e = $_ex_;
				{
					haxe_Log::trace("Layer error: could not access audio or video element", _hx_anonymous(array("fileName" => "Layer.hx", "lineNumber" => 436, "className" => "org.slplayer.component.navigation.Layer", "methodName" => "setupAudioElements")));
				}
			}
			unset($idx,$e);
		}
	}
	public function doHide($transitionData, $preventTransitions, $e) {
		if($e !== null && $e->target != $this->rootElement) {
			haxe_Log::trace("End transition event from another html element", _hx_anonymous(array("fileName" => "Layer.hx", "lineNumber" => 367, "className" => "org.slplayer.component.navigation.Layer", "methodName" => "doHide")));
			return;
		}
		if($preventTransitions === false && $this->doHideCallback === null) {
			haxe_Log::trace("Warning: end transition callback already called", _hx_anonymous(array("fileName" => "Layer.hx", "lineNumber" => 371, "className" => "org.slplayer.component.navigation.Layer", "methodName" => "doHide")));
			return;
		}
		if($preventTransitions === false) {
			$this->endTransition(org_slplayer_component_navigation_transition_TransitionType::$hide, $transitionData, (isset($this->doHideCallback) ? $this->doHideCallback: array($this, "doHideCallback")));
			$this->doHideCallback = null;
		}
		$this->status = org_slplayer_component_navigation_LayerStatus::$hidden;
		try {
			$event = cocktail_Lib::get_document()->createEvent("CustomEvent");
			$event->initCustomEvent("onLayerHide", false, false, _hx_anonymous(array("transitionData" => $transitionData, "target" => $this->rootElement, "layer" => $this)));
			$this->rootElement->dispatchEvent($event);
		}catch(Exception $»e) {
			$_ex_ = ($»e instanceof HException) ? $»e->e : $»e;
			$e1 = $_ex_;
			{
				haxe_Log::trace("Error: could not dispatch event " . Std::string($e1), _hx_anonymous(array("fileName" => "Layer.hx", "lineNumber" => 394, "className" => "org.slplayer.component.navigation.Layer", "methodName" => "doHide")));
			}
		}
		$audioNodes = $this->rootElement->getElementsByTagName("audio");
		$this->cleanupAudioElements($audioNodes);
		$videoNodes = $this->rootElement->getElementsByTagName("video");
		$this->cleanupVideoElements($videoNodes);
		while($this->rootElement->childNodes->length > 0) {
			$element = $this->rootElement->childNodes[0];
			$this->rootElement->removeChild($element);
			$this->childrenArray->push($element);
			unset($element);
		}
		$this->rootElement->style->set_display("none");
	}
	public function hide($transitionData = null, $preventTransitions) {
		if($this->status != org_slplayer_component_navigation_LayerStatus::$visible && $this->status != org_slplayer_component_navigation_LayerStatus::$notInit) {
			return;
		}
		if($this->status == org_slplayer_component_navigation_LayerStatus::$hideTransition) {
			haxe_Log::trace("Warning: hide break previous transition hide", _hx_anonymous(array("fileName" => "Layer.hx", "lineNumber" => 335, "className" => "org.slplayer.component.navigation.Layer", "methodName" => "hide")));
			$this->doHideCallback(null);
			$this->removeTransitionEvent((isset($this->doHideCallback) ? $this->doHideCallback: array($this, "doHideCallback")));
		} else {
			if($this->status == org_slplayer_component_navigation_LayerStatus::$showTransition) {
				haxe_Log::trace("Warning: hide break previous transition show", _hx_anonymous(array("fileName" => "Layer.hx", "lineNumber" => 341, "className" => "org.slplayer.component.navigation.Layer", "methodName" => "hide")));
				$this->doShowCallback(null);
				$this->removeTransitionEvent((isset($this->doShowCallback) ? $this->doShowCallback: array($this, "doShowCallback")));
			}
		}
		$this->status = org_slplayer_component_navigation_LayerStatus::$hideTransition;
		if($preventTransitions === false) {
			$this->doHideCallback = org_slplayer_component_navigation_Layer_0($this, $preventTransitions, $transitionData);
			$this->startTransition(org_slplayer_component_navigation_transition_TransitionType::$hide, $transitionData, (isset($this->doHideCallback) ? $this->doHideCallback: array($this, "doHideCallback")));
		} else {
			$this->doHide($transitionData, $preventTransitions, null);
		}
	}
	public function doShow($transitionData, $preventTransitions, $e) {
		if($e !== null && $e->target != $this->rootElement) {
			haxe_Log::trace("End transition event from another html element", _hx_anonymous(array("fileName" => "Layer.hx", "lineNumber" => 305, "className" => "org.slplayer.component.navigation.Layer", "methodName" => "doShow")));
			return;
		}
		if($preventTransitions === false && $this->doShowCallback === null) {
			haxe_Log::trace("Warning: end transition callback already called", _hx_anonymous(array("fileName" => "Layer.hx", "lineNumber" => 309, "className" => "org.slplayer.component.navigation.Layer", "methodName" => "doShow")));
			return;
		}
		if($preventTransitions === false) {
			$this->endTransition(org_slplayer_component_navigation_transition_TransitionType::$show, $transitionData, (isset($this->doShowCallback) ? $this->doShowCallback: array($this, "doShowCallback")));
		}
		$this->doShowCallback = null;
		$this->status = org_slplayer_component_navigation_LayerStatus::$visible;
	}
	public function show($transitionData = null, $preventTransitions = null) {
		if($preventTransitions === null) {
			$preventTransitions = false;
		}
		if($this->status != org_slplayer_component_navigation_LayerStatus::$hidden && $this->status != org_slplayer_component_navigation_LayerStatus::$notInit) {
			haxe_Log::trace("Warning: can not show the layer, since it has the status '" . Std::string($this->status) . "'", _hx_anonymous(array("fileName" => "Layer.hx", "lineNumber" => 240, "className" => "org.slplayer.component.navigation.Layer", "methodName" => "show")));
			return;
		}
		if($this->status == org_slplayer_component_navigation_LayerStatus::$hideTransition) {
			haxe_Log::trace("Warning: hide break previous transition hide", _hx_anonymous(array("fileName" => "Layer.hx", "lineNumber" => 245, "className" => "org.slplayer.component.navigation.Layer", "methodName" => "show")));
			$this->doHideCallback(null);
			$this->removeTransitionEvent((isset($this->doHideCallback) ? $this->doHideCallback: array($this, "doHideCallback")));
		} else {
			if($this->status == org_slplayer_component_navigation_LayerStatus::$showTransition) {
				haxe_Log::trace("Warning: hide break previous transition show", _hx_anonymous(array("fileName" => "Layer.hx", "lineNumber" => 251, "className" => "org.slplayer.component.navigation.Layer", "methodName" => "show")));
				$this->doShowCallback(null);
				$this->removeTransitionEvent((isset($this->doShowCallback) ? $this->doShowCallback: array($this, "doShowCallback")));
			}
		}
		$this->status = org_slplayer_component_navigation_LayerStatus::$showTransition;
		while($this->childrenArray->length > 0) {
			$element = $this->childrenArray->shift();
			$this->rootElement->appendChild($element);
			unset($element);
		}
		$audioNodes = $this->rootElement->getElementsByTagName("audio");
		$this->setupAudioElements($audioNodes);
		$videoNodes = $this->rootElement->getElementsByTagName("video");
		$this->setupVideoElements($videoNodes);
		try {
			$event = cocktail_Lib::get_document()->createEvent("CustomEvent");
			$event->initCustomEvent("onLayerShow", false, false, _hx_anonymous(array("transitionData" => $transitionData, "target" => $this->rootElement, "layer" => $this)));
			$this->rootElement->dispatchEvent($event);
		}catch(Exception $»e) {
			$_ex_ = ($»e instanceof HException) ? $»e->e : $»e;
			$e = $_ex_;
			{
				haxe_Log::trace("Error: could not dispatch event " . Std::string($e), _hx_anonymous(array("fileName" => "Layer.hx", "lineNumber" => 282, "className" => "org.slplayer.component.navigation.Layer", "methodName" => "show")));
			}
		}
		if($preventTransitions === false) {
			$this->doShowCallback = org_slplayer_component_navigation_Layer_1($this, $audioNodes, $e, $preventTransitions, $transitionData, $videoNodes);
			$this->startTransition(org_slplayer_component_navigation_transition_TransitionType::$show, $transitionData, (isset($this->doShowCallback) ? $this->doShowCallback: array($this, "doShowCallback")));
		} else {
			$this->doShow($transitionData, $preventTransitions, null);
		}
		$this->rootElement->style->set_display($this->styleAttrDisplay);
	}
	public function removeTransitionEvent($onEndCallback) {
		$this->rootElement->removeEventListener("transitionend", $onEndCallback, false);
	}
	public function addTransitionEvent($onEndCallback) {
		$this->rootElement->addEventListener("transitionend", $onEndCallback, false);
	}
	public function endTransition($type, $transitionData = null, $onComplete = null) {
		$this->removeTransitionEvent($onComplete);
		if($transitionData !== null) {
			org_slplayer_util_DomTools::removeClass($this->rootElement, $transitionData->endStyleName);
		}
		$transitionData2 = org_slplayer_component_navigation_transition_TransitionTools::getTransitionData($this->rootElement, $type);
		if($transitionData2 !== null) {
			org_slplayer_util_DomTools::removeClass($this->rootElement, $transitionData2->endStyleName);
		}
	}
	public function doStartTransition($sumOfTransitions, $onComplete = null) {
		{
			$_g = 0;
			while($_g < $sumOfTransitions->length) {
				$transition = $sumOfTransitions[$_g];
				++$_g;
				org_slplayer_util_DomTools::removeClass($this->rootElement, $transition->startStyleName);
				unset($transition);
			}
		}
		if($onComplete !== null) {
			$this->addTransitionEvent($onComplete);
		}
		org_slplayer_component_navigation_transition_TransitionTools::setTransitionProperty($this->rootElement, "transitionDuration", null);
		{
			$_g = 0;
			while($_g < $sumOfTransitions->length) {
				$transition = $sumOfTransitions[$_g];
				++$_g;
				org_slplayer_util_DomTools::addClass($this->rootElement, $transition->endStyleName);
				unset($transition);
			}
		}
	}
	public function startTransition($type, $transitionData = null, $onComplete = null) {
		$transitionData2 = org_slplayer_component_navigation_transition_TransitionTools::getTransitionData($this->rootElement, $type);
		$sumOfTransitions = new _hx_array(array());
		if($transitionData !== null) {
			$sumOfTransitions->push($transitionData);
		}
		if($transitionData2 !== null) {
			$sumOfTransitions->push($transitionData2);
		}
		if($sumOfTransitions->length === 0) {
			if($onComplete !== null) {
				call_user_func_array($onComplete, array(null));
			}
		} else {
			$this->hasTransitionStarted = true;
			org_slplayer_component_navigation_transition_TransitionTools::setTransitionProperty($this->rootElement, "transitionDuration", "0");
			{
				$_g = 0;
				while($_g < $sumOfTransitions->length) {
					$transition = $sumOfTransitions[$_g];
					++$_g;
					org_slplayer_util_DomTools::addClass($this->rootElement, $transition->startStyleName);
					unset($transition);
				}
			}
			org_slplayer_util_DomTools::doLater(org_slplayer_component_navigation_Layer_2($this, $onComplete, $sumOfTransitions, $transitionData, $transitionData2, $type), null);
		}
	}
	public $doHideCallback;
	public $doShowCallback;
	public $styleAttrDisplay;
	public $hasTransitionStarted = false;
	public $status;
	public $childrenArray;
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
	static $EVENT_TYPE_SHOW = "onLayerShow";
	static $EVENT_TYPE_HIDE = "onLayerHide";
	static function getLayerNodes($pageName, $slPlayerId, $root = null) {
		$document = $root;
		if($root === null) {
			$document = cocktail_Lib::get_document()->documentElement;
		}
		return $document->getElementsByClassName($pageName);
	}
	function __toString() { return 'org.slplayer.component.navigation.Layer'; }
}
function org_slplayer_component_navigation_Layer_0(&$»this, &$preventTransitions, &$transitionData) {
	{
		$f = (isset($»this->doHide) ? $»this->doHide: array($»this, "doHide")); $a1 = $transitionData; $a2 = $preventTransitions;
		return array(new _hx_lambda(array(&$a1, &$a2, &$f, &$preventTransitions, &$transitionData), "org_slplayer_component_navigation_Layer_3"), 'execute');
	}
}
function org_slplayer_component_navigation_Layer_1(&$»this, &$audioNodes, &$e, &$preventTransitions, &$transitionData, &$videoNodes) {
	{
		$f = (isset($»this->doShow) ? $»this->doShow: array($»this, "doShow")); $a1 = $transitionData; $a2 = $preventTransitions;
		return array(new _hx_lambda(array(&$a1, &$a2, &$audioNodes, &$e, &$f, &$preventTransitions, &$transitionData, &$videoNodes), "org_slplayer_component_navigation_Layer_4"), 'execute');
	}
}
function org_slplayer_component_navigation_Layer_2(&$»this, &$onComplete, &$sumOfTransitions, &$transitionData, &$transitionData2, &$type) {
	{
		$f = (isset($»this->doStartTransition) ? $»this->doStartTransition: array($»this, "doStartTransition")); $a1 = $sumOfTransitions; $a2 = $onComplete;
		return array(new _hx_lambda(array(&$a1, &$a2, &$f, &$onComplete, &$sumOfTransitions, &$transitionData, &$transitionData2, &$type), "org_slplayer_component_navigation_Layer_5"), 'execute');
	}
}
function org_slplayer_component_navigation_Layer_3(&$a1, &$a2, &$f, &$preventTransitions, &$transitionData, $e) {
	{
		call_user_func_array($f, array($a1, $a2, $e));
		return;
	}
}
function org_slplayer_component_navigation_Layer_4(&$a1, &$a2, &$audioNodes, &$e, &$f, &$preventTransitions, &$transitionData, &$videoNodes, $e2) {
	{
		call_user_func_array($f, array($a1, $a2, $e2));
		return;
	}
}
function org_slplayer_component_navigation_Layer_5(&$a1, &$a2, &$f, &$onComplete, &$sumOfTransitions, &$transitionData, &$transitionData2, &$type) {
	{
		call_user_func_array($f, array($a1, $a2));
		return;
	}
}

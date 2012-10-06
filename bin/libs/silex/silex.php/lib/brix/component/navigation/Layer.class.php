<?php

class brix_component_navigation_Layer extends brix_component_ui_DisplayObject {
	public function __construct($rootElement, $BrixId) {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("brix.component.navigation.Layer::new");
		$»spos = $GLOBALS['%s']->length;
		parent::__construct($rootElement,$BrixId);
		$this->childrenArray = new _hx_array(array());
		$this->status = brix_component_navigation_LayerStatus::$notInit;
		$this->styleAttrDisplay = $rootElement->style->get_display();
		$GLOBALS['%s']->pop();
	}}
	public function cleanupVideoElements($nodeList) {
		$GLOBALS['%s']->push("brix.component.navigation.Layer::cleanupVideoElements");
		$»spos = $GLOBALS['%s']->length;
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
					$GLOBALS['%e'] = new _hx_array(array());
					while($GLOBALS['%s']->length >= $»spos) {
						$GLOBALS['%e']->unshift($GLOBALS['%s']->pop());
					}
					$GLOBALS['%s']->push($GLOBALS['%e'][0]);
					null;
				}
			}
			unset($idx,$e);
		}
		$GLOBALS['%s']->pop();
	}
	public function cleanupAudioElements($nodeList) {
		$GLOBALS['%s']->push("brix.component.navigation.Layer::cleanupAudioElements");
		$»spos = $GLOBALS['%s']->length;
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
					$GLOBALS['%e'] = new _hx_array(array());
					while($GLOBALS['%s']->length >= $»spos) {
						$GLOBALS['%e']->unshift($GLOBALS['%s']->pop());
					}
					$GLOBALS['%s']->push($GLOBALS['%e'][0]);
					null;
				}
			}
			unset($idx,$e);
		}
		$GLOBALS['%s']->pop();
	}
	public function setupVideoElements($nodeList) {
		$GLOBALS['%s']->push("brix.component.navigation.Layer::setupVideoElements");
		$»spos = $GLOBALS['%s']->length;
		$_g1 = 0; $_g = $nodeList->length;
		while($_g1 < $_g) {
			$idx = $_g1++;
			try {
				$element = $nodeList[$idx];
				if($element->get_autoplay() === true) {
					$element->set_currentTime(0);
					$element->play();
				}
				$element->set_muted(brix_component_sound_SoundOn::$isMuted);
				unset($element);
			}catch(Exception $»e) {
				$_ex_ = ($»e instanceof HException) ? $»e->e : $»e;
				$e = $_ex_;
				{
					$GLOBALS['%e'] = new _hx_array(array());
					while($GLOBALS['%s']->length >= $»spos) {
						$GLOBALS['%e']->unshift($GLOBALS['%s']->pop());
					}
					$GLOBALS['%s']->push($GLOBALS['%e'][0]);
					null;
				}
			}
			unset($idx,$e);
		}
		$GLOBALS['%s']->pop();
	}
	public function setupAudioElements($nodeList) {
		$GLOBALS['%s']->push("brix.component.navigation.Layer::setupAudioElements");
		$»spos = $GLOBALS['%s']->length;
		$_g1 = 0; $_g = $nodeList->length;
		while($_g1 < $_g) {
			$idx = $_g1++;
			try {
				$element = $nodeList[$idx];
				if($element->get_autoplay() === true) {
					$element->set_currentTime(0);
					$element->play();
				}
				$element->set_muted(brix_component_sound_SoundOn::$isMuted);
				unset($element);
			}catch(Exception $»e) {
				$_ex_ = ($»e instanceof HException) ? $»e->e : $»e;
				$e = $_ex_;
				{
					$GLOBALS['%e'] = new _hx_array(array());
					while($GLOBALS['%s']->length >= $»spos) {
						$GLOBALS['%e']->unshift($GLOBALS['%s']->pop());
					}
					$GLOBALS['%s']->push($GLOBALS['%e'][0]);
					null;
				}
			}
			unset($idx,$e);
		}
		$GLOBALS['%s']->pop();
	}
	public function doHide($transitionData, $preventTransitions, $e) {
		$GLOBALS['%s']->push("brix.component.navigation.Layer::doHide");
		$»spos = $GLOBALS['%s']->length;
		if($e !== null && $e->target != $this->rootElement) {
			$GLOBALS['%s']->pop();
			return;
		}
		if($preventTransitions === false && $this->doHideCallback === null) {
			$GLOBALS['%s']->pop();
			return;
		}
		if($preventTransitions === false) {
			$this->endTransition(brix_component_navigation_transition_TransitionType::$hide, $transitionData, (isset($this->doHideCallback) ? $this->doHideCallback: array($this, "doHideCallback")));
			$this->doHideCallback = null;
		}
		$this->status = brix_component_navigation_LayerStatus::$hidden;
		try {
			$event = cocktail_Lib::get_document()->createEvent("CustomEvent");
			$event->initCustomEvent("onLayerHide", false, false, _hx_anonymous(array("transitionData" => $transitionData, "target" => $this->rootElement, "layer" => $this)));
			$this->rootElement->dispatchEvent($event);
		}catch(Exception $»e) {
			$_ex_ = ($»e instanceof HException) ? $»e->e : $»e;
			$e1 = $_ex_;
			{
				$GLOBALS['%e'] = new _hx_array(array());
				while($GLOBALS['%s']->length >= $»spos) {
					$GLOBALS['%e']->unshift($GLOBALS['%s']->pop());
				}
				$GLOBALS['%s']->push($GLOBALS['%e'][0]);
				null;
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
		$GLOBALS['%s']->pop();
	}
	public function hide($transitionData = null, $preventTransitions) {
		$GLOBALS['%s']->push("brix.component.navigation.Layer::hide");
		$»spos = $GLOBALS['%s']->length;
		if($this->status != brix_component_navigation_LayerStatus::$visible && $this->status != brix_component_navigation_LayerStatus::$notInit) {
			$GLOBALS['%s']->pop();
			return;
		}
		if($this->status == brix_component_navigation_LayerStatus::$hideTransition) {
			$this->doHideCallback(null);
			$this->removeTransitionEvent((isset($this->doHideCallback) ? $this->doHideCallback: array($this, "doHideCallback")));
		} else {
			if($this->status == brix_component_navigation_LayerStatus::$showTransition) {
				$this->doShowCallback(null);
				$this->removeTransitionEvent((isset($this->doShowCallback) ? $this->doShowCallback: array($this, "doShowCallback")));
			}
		}
		$this->status = brix_component_navigation_LayerStatus::$hideTransition;
		if($preventTransitions === false) {
			$this->doHideCallback = brix_component_navigation_Layer_0($this, $preventTransitions, $transitionData);
			$this->startTransition(brix_component_navigation_transition_TransitionType::$hide, $transitionData, (isset($this->doHideCallback) ? $this->doHideCallback: array($this, "doHideCallback")));
		} else {
			$this->doHide($transitionData, $preventTransitions, null);
		}
		$GLOBALS['%s']->pop();
	}
	public function doShow($transitionData, $preventTransitions, $e) {
		$GLOBALS['%s']->push("brix.component.navigation.Layer::doShow");
		$»spos = $GLOBALS['%s']->length;
		if($e !== null && $e->target != $this->rootElement) {
			$GLOBALS['%s']->pop();
			return;
		}
		if($preventTransitions === false && $this->doShowCallback === null) {
			$GLOBALS['%s']->pop();
			return;
		}
		if($preventTransitions === false) {
			$this->endTransition(brix_component_navigation_transition_TransitionType::$show, $transitionData, (isset($this->doShowCallback) ? $this->doShowCallback: array($this, "doShowCallback")));
		}
		$this->doShowCallback = null;
		$this->status = brix_component_navigation_LayerStatus::$visible;
		$GLOBALS['%s']->pop();
	}
	public function show($transitionData = null, $preventTransitions = null) {
		$GLOBALS['%s']->push("brix.component.navigation.Layer::show");
		$»spos = $GLOBALS['%s']->length;
		if($preventTransitions === null) {
			$preventTransitions = false;
		}
		if($this->status != brix_component_navigation_LayerStatus::$hidden && $this->status != brix_component_navigation_LayerStatus::$notInit) {
			$GLOBALS['%s']->pop();
			return;
		}
		if($this->status == brix_component_navigation_LayerStatus::$hideTransition) {
			$this->doHideCallback(null);
			$this->removeTransitionEvent((isset($this->doHideCallback) ? $this->doHideCallback: array($this, "doHideCallback")));
		} else {
			if($this->status == brix_component_navigation_LayerStatus::$showTransition) {
				$this->doShowCallback(null);
				$this->removeTransitionEvent((isset($this->doShowCallback) ? $this->doShowCallback: array($this, "doShowCallback")));
			}
		}
		$this->status = brix_component_navigation_LayerStatus::$showTransition;
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
				$GLOBALS['%e'] = new _hx_array(array());
				while($GLOBALS['%s']->length >= $»spos) {
					$GLOBALS['%e']->unshift($GLOBALS['%s']->pop());
				}
				$GLOBALS['%s']->push($GLOBALS['%e'][0]);
				null;
			}
		}
		if($preventTransitions === false) {
			$this->doShowCallback = brix_component_navigation_Layer_1($this, $audioNodes, $e, $preventTransitions, $transitionData, $videoNodes);
			$this->startTransition(brix_component_navigation_transition_TransitionType::$show, $transitionData, (isset($this->doShowCallback) ? $this->doShowCallback: array($this, "doShowCallback")));
		} else {
			$this->doShow($transitionData, $preventTransitions, null);
		}
		$this->rootElement->style->set_display($this->styleAttrDisplay);
		$GLOBALS['%s']->pop();
	}
	public function removeTransitionEvent($onEndCallback) {
		$GLOBALS['%s']->push("brix.component.navigation.Layer::removeTransitionEvent");
		$»spos = $GLOBALS['%s']->length;
		$this->rootElement->removeEventListener("transitionend", $onEndCallback, false);
		$GLOBALS['%s']->pop();
	}
	public function addTransitionEvent($onEndCallback) {
		$GLOBALS['%s']->push("brix.component.navigation.Layer::addTransitionEvent");
		$»spos = $GLOBALS['%s']->length;
		$this->rootElement->addEventListener("transitionend", $onEndCallback, false);
		$GLOBALS['%s']->pop();
	}
	public function endTransition($type, $transitionData = null, $onComplete = null) {
		$GLOBALS['%s']->push("brix.component.navigation.Layer::endTransition");
		$»spos = $GLOBALS['%s']->length;
		$this->removeTransitionEvent($onComplete);
		if($transitionData !== null) {
			brix_util_DomTools::removeClass($this->rootElement, $transitionData->endStyleName);
		}
		$transitionData2 = brix_component_navigation_transition_TransitionTools::getTransitionData($this->rootElement, $type);
		if($transitionData2 !== null) {
			brix_util_DomTools::removeClass($this->rootElement, $transitionData2->endStyleName);
		}
		$GLOBALS['%s']->pop();
	}
	public function doStartTransition($sumOfTransitions, $onComplete = null) {
		$GLOBALS['%s']->push("brix.component.navigation.Layer::doStartTransition");
		$»spos = $GLOBALS['%s']->length;
		{
			$_g = 0;
			while($_g < $sumOfTransitions->length) {
				$transition = $sumOfTransitions[$_g];
				++$_g;
				brix_util_DomTools::removeClass($this->rootElement, $transition->startStyleName);
				unset($transition);
			}
		}
		if($onComplete !== null) {
			$this->addTransitionEvent($onComplete);
		}
		brix_component_navigation_transition_TransitionTools::setTransitionProperty($this->rootElement, "transitionDuration", null);
		{
			$_g = 0;
			while($_g < $sumOfTransitions->length) {
				$transition = $sumOfTransitions[$_g];
				++$_g;
				brix_util_DomTools::addClass($this->rootElement, $transition->endStyleName);
				unset($transition);
			}
		}
		$GLOBALS['%s']->pop();
	}
	public function startTransition($type, $transitionData = null, $onComplete = null) {
		$GLOBALS['%s']->push("brix.component.navigation.Layer::startTransition");
		$»spos = $GLOBALS['%s']->length;
		$transitionData2 = brix_component_navigation_transition_TransitionTools::getTransitionData($this->rootElement, $type);
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
			brix_component_navigation_transition_TransitionTools::setTransitionProperty($this->rootElement, "transitionDuration", "0");
			{
				$_g = 0;
				while($_g < $sumOfTransitions->length) {
					$transition = $sumOfTransitions[$_g];
					++$_g;
					brix_util_DomTools::addClass($this->rootElement, $transition->startStyleName);
					unset($transition);
				}
			}
			brix_util_DomTools::doLater(brix_component_navigation_Layer_2($this, $onComplete, $sumOfTransitions, $transitionData, $transitionData2, $type), null);
		}
		$GLOBALS['%s']->pop();
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
	static function getLayerNodes($pageName, $brixId, $root = null) {
		$GLOBALS['%s']->push("brix.component.navigation.Layer::getLayerNodes");
		$»spos = $GLOBALS['%s']->length;
		$document = $root;
		if($root === null) {
			$document = cocktail_Lib::get_document()->documentElement;
		}
		{
			$»tmp = $document->getElementsByClassName($pageName);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'brix.component.navigation.Layer'; }
}
function brix_component_navigation_Layer_0(&$»this, &$preventTransitions, &$transitionData) {
	$»spos = $GLOBALS['%s']->length;
	{
		$f = (isset($»this->doHide) ? $»this->doHide: array($»this, "doHide")); $a1 = $transitionData; $a2 = $preventTransitions;
		return array(new _hx_lambda(array(&$a1, &$a2, &$f, &$preventTransitions, &$transitionData), "brix_component_navigation_Layer_3"), 'execute');
	}
}
function brix_component_navigation_Layer_1(&$»this, &$audioNodes, &$e, &$preventTransitions, &$transitionData, &$videoNodes) {
	$»spos = $GLOBALS['%s']->length;
	{
		$f = (isset($»this->doShow) ? $»this->doShow: array($»this, "doShow")); $a1 = $transitionData; $a2 = $preventTransitions;
		return array(new _hx_lambda(array(&$a1, &$a2, &$audioNodes, &$e, &$f, &$preventTransitions, &$transitionData, &$videoNodes), "brix_component_navigation_Layer_4"), 'execute');
	}
}
function brix_component_navigation_Layer_2(&$»this, &$onComplete, &$sumOfTransitions, &$transitionData, &$transitionData2, &$type) {
	$»spos = $GLOBALS['%s']->length;
	{
		$f = (isset($»this->doStartTransition) ? $»this->doStartTransition: array($»this, "doStartTransition")); $a1 = $sumOfTransitions; $a2 = $onComplete;
		return array(new _hx_lambda(array(&$a1, &$a2, &$f, &$onComplete, &$sumOfTransitions, &$transitionData, &$transitionData2, &$type), "brix_component_navigation_Layer_5"), 'execute');
	}
}
function brix_component_navigation_Layer_3(&$a1, &$a2, &$f, &$preventTransitions, &$transitionData, $e) {
	$»spos = $GLOBALS['%s']->length;
	{
		$GLOBALS['%s']->push("brix.component.navigation.Layer::getLayerNodes@355");
		$»spos2 = $GLOBALS['%s']->length;
		{
			$»tmp = call_user_func_array($f, array($a1, $a2, $e));
			$GLOBALS['%s']->pop();
			$»tmp;
			return;
		}
		$GLOBALS['%s']->pop();
	}
}
function brix_component_navigation_Layer_4(&$a1, &$a2, &$audioNodes, &$e, &$f, &$preventTransitions, &$transitionData, &$videoNodes, $e2) {
	$»spos = $GLOBALS['%s']->length;
	{
		$GLOBALS['%s']->push("brix.component.navigation.Layer::getLayerNodes@293");
		$»spos2 = $GLOBALS['%s']->length;
		{
			$»tmp = call_user_func_array($f, array($a1, $a2, $e2));
			$GLOBALS['%s']->pop();
			$»tmp;
			return;
		}
		$GLOBALS['%s']->pop();
	}
}
function brix_component_navigation_Layer_5(&$a1, &$a2, &$f, &$onComplete, &$sumOfTransitions, &$transitionData, &$transitionData2, &$type) {
	$»spos = $GLOBALS['%s']->length;
	{
		$GLOBALS['%s']->push("brix.component.navigation.Layer::getLayerNodes@165");
		$»spos2 = $GLOBALS['%s']->length;
		{
			$»tmp = call_user_func_array($f, array($a1, $a2));
			$GLOBALS['%s']->pop();
			$»tmp;
			return;
		}
		$GLOBALS['%s']->pop();
	}
}

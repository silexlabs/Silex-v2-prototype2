<?php

class cocktail_core_style_computer_TransitionStylesComputer {
	public function __construct() { if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.style.computer.TransitionStylesComputer::new");
		$»spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}}
	static function compute($style) {
		$GLOBALS['%s']->push("cocktail.core.style.computer.TransitionStylesComputer::compute");
		$»spos = $GLOBALS['%s']->length;
		$computedStyle = $style->computedStyle;
		$computedStyle->transitionDelay = cocktail_core_style_computer_TransitionStylesComputer::getComputedTransitionDelay($style);
		$computedStyle->transitionDuration = cocktail_core_style_computer_TransitionStylesComputer::getComputedTransitionDuration($style);
		$GLOBALS['%s']->pop();
	}
	static function getComputedTransitionDuration($style) {
		$GLOBALS['%s']->push("cocktail.core.style.computer.TransitionStylesComputer::getComputedTransitionDuration");
		$»spos = $GLOBALS['%s']->length;
		$transitionDurations = new _hx_array(array());
		{
			$_g1 = 0; $_g = $style->transitionDuration->length;
			while($_g1 < $_g) {
				$i = $_g1++;
				$»t = ($style->transitionDuration[$i]);
				switch($»t->index) {
				case 0:
				$value = $»t->params[0];
				{
					$transitionDurations->push($value);
				}break;
				case 1:
				$value = $»t->params[0];
				{
					$transitionDurations->push($value / 1000);
				}break;
				}
				unset($i);
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $transitionDurations;
		}
		$GLOBALS['%s']->pop();
	}
	static function getComputedTransitionDelay($style) {
		$GLOBALS['%s']->push("cocktail.core.style.computer.TransitionStylesComputer::getComputedTransitionDelay");
		$»spos = $GLOBALS['%s']->length;
		$transitionDelays = new _hx_array(array());
		{
			$_g1 = 0; $_g = $style->transitionDelay->length;
			while($_g1 < $_g) {
				$i = $_g1++;
				$»t = ($style->transitionDelay[$i]);
				switch($»t->index) {
				case 0:
				$value = $»t->params[0];
				{
					$transitionDelays->push($value);
				}break;
				case 1:
				$value = $»t->params[0];
				{
					$transitionDelays->push($value / 1000);
				}break;
				}
				unset($i);
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $transitionDelays;
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'cocktail.core.style.computer.TransitionStylesComputer'; }
}

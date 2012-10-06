<?php

class brix_component_navigation_LayerStatus extends Enum {
	public static $hidden;
	public static $hideTransition;
	public static $notInit;
	public static $showTransition;
	public static $visible;
	public static $__constructors = array(3 => 'hidden', 1 => 'hideTransition', 4 => 'notInit', 0 => 'showTransition', 2 => 'visible');
	}
brix_component_navigation_LayerStatus::$hidden = new brix_component_navigation_LayerStatus("hidden", 3);
brix_component_navigation_LayerStatus::$hideTransition = new brix_component_navigation_LayerStatus("hideTransition", 1);
brix_component_navigation_LayerStatus::$notInit = new brix_component_navigation_LayerStatus("notInit", 4);
brix_component_navigation_LayerStatus::$showTransition = new brix_component_navigation_LayerStatus("showTransition", 0);
brix_component_navigation_LayerStatus::$visible = new brix_component_navigation_LayerStatus("visible", 2);

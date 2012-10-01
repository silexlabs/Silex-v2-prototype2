<?php

class org_slplayer_component_navigation_LayerStatus extends Enum {
	public static $hidden;
	public static $hideTransition;
	public static $notInit;
	public static $showTransition;
	public static $visible;
	public static $__constructors = array(3 => 'hidden', 1 => 'hideTransition', 4 => 'notInit', 0 => 'showTransition', 2 => 'visible');
	}
org_slplayer_component_navigation_LayerStatus::$hidden = new org_slplayer_component_navigation_LayerStatus("hidden", 3);
org_slplayer_component_navigation_LayerStatus::$hideTransition = new org_slplayer_component_navigation_LayerStatus("hideTransition", 1);
org_slplayer_component_navigation_LayerStatus::$notInit = new org_slplayer_component_navigation_LayerStatus("notInit", 4);
org_slplayer_component_navigation_LayerStatus::$showTransition = new org_slplayer_component_navigation_LayerStatus("showTransition", 0);
org_slplayer_component_navigation_LayerStatus::$visible = new org_slplayer_component_navigation_LayerStatus("visible", 2);

<?php

class org_silex_publication_PublicationCategory extends Enum {
	public static $Publication;
	public static $Theme;
	public static $Utility;
	public static $__constructors = array(0 => 'Publication', 2 => 'Theme', 1 => 'Utility');
	}
org_silex_publication_PublicationCategory::$Publication = new org_silex_publication_PublicationCategory("Publication", 0);
org_silex_publication_PublicationCategory::$Theme = new org_silex_publication_PublicationCategory("Theme", 2);
org_silex_publication_PublicationCategory::$Utility = new org_silex_publication_PublicationCategory("Utility", 1);

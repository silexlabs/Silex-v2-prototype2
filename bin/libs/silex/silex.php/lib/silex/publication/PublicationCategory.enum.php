<?php

class silex_publication_PublicationCategory extends Enum {
	public static $Publication;
	public static $Theme;
	public static $Utility;
	public static $__constructors = array(0 => 'Publication', 2 => 'Theme', 1 => 'Utility');
	}
silex_publication_PublicationCategory::$Publication = new silex_publication_PublicationCategory("Publication", 0);
silex_publication_PublicationCategory::$Theme = new silex_publication_PublicationCategory("Theme", 2);
silex_publication_PublicationCategory::$Utility = new silex_publication_PublicationCategory("Utility", 1);

<?php

class silex_publication_PublicationState extends Enum {
	public static $Private;
	public static function Published($data) { return new silex_publication_PublicationState("Published", 1, array($data)); }
	public static function Trashed($data) { return new silex_publication_PublicationState("Trashed", 0, array($data)); }
	public static $__constructors = array(2 => 'Private', 1 => 'Published', 0 => 'Trashed');
	}
silex_publication_PublicationState::$Private = new silex_publication_PublicationState("Private", 2);

<?php

class cocktail_core_font_FontManager {
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.font.FontManager::new");
		$»spos = $GLOBALS['%s']->length;
		$this->_fontManagerImpl = new cocktail_core_font_AbstractFontManagerImpl();
		$GLOBALS['%s']->pop();
	}}
	public function createNativeTextElement($text, $style) {
		$GLOBALS['%s']->push("cocktail.core.font.FontManager::createNativeTextElement");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->_fontManagerImpl->createNativeTextElement($text, $style);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getFontMetrics($fontFamily, $fontSize) {
		$GLOBALS['%s']->push("cocktail.core.font.FontManager::getFontMetrics");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->_fontManagerImpl->getFontMetrics($fontFamily, $fontSize);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public $_fontManagerImpl;
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
	static $_instance;
	static function getInstance() {
		$GLOBALS['%s']->push("cocktail.core.font.FontManager::getInstance");
		$»spos = $GLOBALS['%s']->length;
		if(cocktail_core_font_FontManager::$_instance === null) {
			cocktail_core_font_FontManager::$_instance = new cocktail_core_font_FontManager();
		}
		{
			$»tmp = cocktail_core_font_FontManager::$_instance;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'cocktail.core.font.FontManager'; }
}

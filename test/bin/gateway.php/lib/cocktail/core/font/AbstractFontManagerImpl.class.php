<?php

class cocktail_core_font_AbstractFontManagerImpl {
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.font.AbstractFontManagerImpl::new");
		$»spos = $GLOBALS['%s']->length;
		$this->_computedFontMetrics = new Hash();
		$GLOBALS['%s']->pop();
	}}
	public function doGetFontMetrics($fontFamily, $fontSize) {
		$GLOBALS['%s']->push("cocktail.core.font.AbstractFontManagerImpl::doGetFontMetrics");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return null;
		}
		$GLOBALS['%s']->pop();
	}
	public function createNativeTextElement($text, $style) {
		$GLOBALS['%s']->push("cocktail.core.font.AbstractFontManagerImpl::createNativeTextElement");
		$»spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return null;
		}
		$GLOBALS['%s']->pop();
	}
	public function getFontMetrics($fontFamily, $fontSize) {
		$GLOBALS['%s']->push("cocktail.core.font.AbstractFontManagerImpl::getFontMetrics");
		$»spos = $GLOBALS['%s']->length;
		$fontMetrics = null;
		if($this->_computedFontMetrics->exists($fontFamily) === true) {
			$fontSizeHash = $this->_computedFontMetrics->get($fontFamily);
			if($fontSizeHash->exists(Std::string($fontSize)) === true) {
				$fontMetrics = $fontSizeHash->get(Std::string($fontSize));
			} else {
				$fontMetrics = $this->doGetFontMetrics($fontFamily, $fontSize);
				$fontSizeHash->set(Std::string($fontSize), $fontMetrics);
				$this->_computedFontMetrics->set($fontFamily, $fontSizeHash);
			}
		} else {
			$fontMetrics = $this->doGetFontMetrics($fontFamily, $fontSize);
			$fontSizeHash = new Hash();
			$fontSizeHash->set(Std::string($fontSize), $fontMetrics);
			$this->_computedFontMetrics->set($fontFamily, $fontSizeHash);
		}
		{
			$GLOBALS['%s']->pop();
			return $fontMetrics;
		}
		$GLOBALS['%s']->pop();
	}
	public $_computedFontMetrics;
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
	function __toString() { return 'cocktail.core.font.AbstractFontManagerImpl'; }
}

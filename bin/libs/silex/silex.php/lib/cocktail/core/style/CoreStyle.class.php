<?php

class cocktail_core_style_CoreStyle {
	public function __construct($htmlElement) {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.style.CoreStyle::new");
		$»spos = $GLOBALS['%s']->length;
		$this->htmlElement = $htmlElement;
		$this->_fontManager = cocktail_core_font_FontManager::getInstance();
		$this->_pendingAnimations = new _hx_array(array());
		$this->initDefaultStyleValues($htmlElement->tagName);
		$GLOBALS['%s']->pop();
	}}
	public function setCursor($value) {
		$GLOBALS['%s']->push("cocktail.core.style.CoreStyle::setCursor");
		$»spos = $GLOBALS['%s']->length;
		$this->cursor = $value;
		$this->computedStyle->cursor = $value;
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function setBackgroundOrigin($value) {
		$GLOBALS['%s']->push("cocktail.core.style.CoreStyle::setBackgroundOrigin");
		$»spos = $GLOBALS['%s']->length;
		$this->backgroundOrigin = $value;
		$this->computedStyle->backgroundOrigin = $value;
		$this->invalidate(cocktail_core_renderer_InvalidationReason::styleChanged("background-origin"));
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function setBackgroundRepeat($value) {
		$GLOBALS['%s']->push("cocktail.core.style.CoreStyle::setBackgroundRepeat");
		$»spos = $GLOBALS['%s']->length;
		$this->backgroundRepeat = $value;
		$this->computedStyle->backgroundRepeat = $value;
		$this->invalidate(cocktail_core_renderer_InvalidationReason::styleChanged("background-repeat"));
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function setBackgroundPosition($value) {
		$GLOBALS['%s']->push("cocktail.core.style.CoreStyle::setBackgroundPosition");
		$»spos = $GLOBALS['%s']->length;
		$this->backgroundPosition = $value;
		$this->computedStyle->backgroundPosition = $value;
		$this->invalidate(cocktail_core_renderer_InvalidationReason::styleChanged("background-position"));
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function setBackgroundClip($value) {
		$GLOBALS['%s']->push("cocktail.core.style.CoreStyle::setBackgroundClip");
		$»spos = $GLOBALS['%s']->length;
		$this->backgroundClip = $value;
		$this->computedStyle->backgroundClip = $value;
		$this->invalidate(cocktail_core_renderer_InvalidationReason::styleChanged("background-clip"));
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function setBackgroundSize($value) {
		$GLOBALS['%s']->push("cocktail.core.style.CoreStyle::setBackgroundSize");
		$»spos = $GLOBALS['%s']->length;
		$this->backgroundSize = $value;
		$this->computedStyle->backgroundSize = $value;
		$this->invalidate(cocktail_core_renderer_InvalidationReason::styleChanged("background-size"));
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function setBackgroundImage($value) {
		$GLOBALS['%s']->push("cocktail.core.style.CoreStyle::setBackgroundImage");
		$»spos = $GLOBALS['%s']->length;
		$this->backgroundImage = $value;
		$this->invalidate(cocktail_core_renderer_InvalidationReason::styleChanged("background-image"));
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function setBackgroundColor($value) {
		$GLOBALS['%s']->push("cocktail.core.style.CoreStyle::setBackgroundColor");
		$»spos = $GLOBALS['%s']->length;
		$this->backgroundColor = $value;
		$this->invalidate(cocktail_core_renderer_InvalidationReason::styleChanged("background-color"));
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function setTransitionTimingFunction($value) {
		$GLOBALS['%s']->push("cocktail.core.style.CoreStyle::setTransitionTimingFunction");
		$»spos = $GLOBALS['%s']->length;
		$this->transitionTimingFunction = $value;
		$this->computedStyle->transitionTimingFunction = $value;
		$this->invalidate(cocktail_core_renderer_InvalidationReason::styleChanged("transition-timing-function"));
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function setTransitionDelay($value) {
		$GLOBALS['%s']->push("cocktail.core.style.CoreStyle::setTransitionDelay");
		$»spos = $GLOBALS['%s']->length;
		$this->transitionDelay = $value;
		$this->invalidate(cocktail_core_renderer_InvalidationReason::styleChanged("transition-delay"));
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function setTransitionDuration($value) {
		$GLOBALS['%s']->push("cocktail.core.style.CoreStyle::setTransitionDuration");
		$»spos = $GLOBALS['%s']->length;
		$this->transitionDuration = $value;
		$this->invalidate(cocktail_core_renderer_InvalidationReason::styleChanged("transition-duration"));
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function setTransitionProperty($value) {
		$GLOBALS['%s']->push("cocktail.core.style.CoreStyle::setTransitionProperty");
		$»spos = $GLOBALS['%s']->length;
		$this->transitionProperty = $value;
		$this->computedStyle->transitionProperty = $value;
		$this->invalidate(cocktail_core_renderer_InvalidationReason::styleChanged("transition-property"));
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function setOverflowY($value) {
		$GLOBALS['%s']->push("cocktail.core.style.CoreStyle::setOverflowY");
		$»spos = $GLOBALS['%s']->length;
		$this->overflowY = $value;
		$this->computedStyle->overflowY = $value;
		$this->invalidatePositioningScheme();
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function setOverflowX($value) {
		$GLOBALS['%s']->push("cocktail.core.style.CoreStyle::setOverflowX");
		$»spos = $GLOBALS['%s']->length;
		$this->overflowX = $value;
		$this->computedStyle->overflowX = $value;
		$this->invalidatePositioningScheme();
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function setTransform($value) {
		$GLOBALS['%s']->push("cocktail.core.style.CoreStyle::setTransform");
		$»spos = $GLOBALS['%s']->length;
		$this->transform = $value;
		$this->invalidatePositioningScheme();
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function setTransformOrigin($value) {
		$GLOBALS['%s']->push("cocktail.core.style.CoreStyle::setTransformOrigin");
		$»spos = $GLOBALS['%s']->length;
		$this->transformOrigin = $value;
		$this->invalidate(cocktail_core_renderer_InvalidationReason::styleChanged("transform-origin"));
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function setVisibility($value) {
		$GLOBALS['%s']->push("cocktail.core.style.CoreStyle::setVisibility");
		$»spos = $GLOBALS['%s']->length;
		$this->visibility = $value;
		$this->computedStyle->visibility = $value;
		$this->invalidate(cocktail_core_renderer_InvalidationReason::styleChanged("visibility"));
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function setOpacity($value) {
		$GLOBALS['%s']->push("cocktail.core.style.CoreStyle::setOpacity");
		$»spos = $GLOBALS['%s']->length;
		$this->opacity = $value;
		$invalidationReason = cocktail_core_renderer_InvalidationReason::styleChanged("opacity");
		$this->registerPendingAnimation("opacity", $invalidationReason, $this->computedStyle->getOpacity());
		$this->invalidate($invalidationReason);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function setTextAlign($value) {
		$GLOBALS['%s']->push("cocktail.core.style.CoreStyle::setTextAlign");
		$»spos = $GLOBALS['%s']->length;
		$this->textAlign = $value;
		$this->computedStyle->textAlign = $value;
		$this->invalidate(cocktail_core_renderer_InvalidationReason::styleChanged("text-align"));
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function setWhiteSpace($value) {
		$GLOBALS['%s']->push("cocktail.core.style.CoreStyle::setWhiteSpace");
		$»spos = $GLOBALS['%s']->length;
		$this->whiteSpace = $value;
		$this->computedStyle->whiteSpace = $value;
		$this->invalidate(cocktail_core_renderer_InvalidationReason::styleChanged("white-space"));
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function setTextIndent($value) {
		$GLOBALS['%s']->push("cocktail.core.style.CoreStyle::setTextIndent");
		$»spos = $GLOBALS['%s']->length;
		$this->textIndent = $value;
		$invalidationReason = cocktail_core_renderer_InvalidationReason::styleChanged("text-indent");
		$this->invalidate($invalidationReason);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function setVerticalAlign($value) {
		$GLOBALS['%s']->push("cocktail.core.style.CoreStyle::setVerticalAlign");
		$»spos = $GLOBALS['%s']->length;
		$this->verticalAlign = $value;
		$invalidationReason = cocktail_core_renderer_InvalidationReason::styleChanged("vertical-align");
		$this->invalidate($invalidationReason);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function setColor($value) {
		$GLOBALS['%s']->push("cocktail.core.style.CoreStyle::setColor");
		$»spos = $GLOBALS['%s']->length;
		$this->color = $value;
		$this->invalidate(cocktail_core_renderer_InvalidationReason::styleChanged("color"));
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function setLineHeight($value) {
		$GLOBALS['%s']->push("cocktail.core.style.CoreStyle::setLineHeight");
		$»spos = $GLOBALS['%s']->length;
		$this->lineHeight = $value;
		$invalidationReason = cocktail_core_renderer_InvalidationReason::styleChanged("line-height");
		$this->invalidate($invalidationReason);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function setWordSpacing($value) {
		$GLOBALS['%s']->push("cocktail.core.style.CoreStyle::setWordSpacing");
		$»spos = $GLOBALS['%s']->length;
		$this->wordSpacing = $value;
		$invalidationReason = cocktail_core_renderer_InvalidationReason::styleChanged("word-spacing");
		$this->invalidate($invalidationReason);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function setLetterSpacing($value) {
		$GLOBALS['%s']->push("cocktail.core.style.CoreStyle::setLetterSpacing");
		$»spos = $GLOBALS['%s']->length;
		$this->letterSpacing = $value;
		$invalidationReason = cocktail_core_renderer_InvalidationReason::styleChanged("letter-spacing");
		$this->invalidate($invalidationReason);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function setTextTransform($value) {
		$GLOBALS['%s']->push("cocktail.core.style.CoreStyle::setTextTransform");
		$»spos = $GLOBALS['%s']->length;
		$this->textTransform = $value;
		$this->computedStyle->textTransform = $value;
		$this->invalidate(cocktail_core_renderer_InvalidationReason::styleChanged("text-tranform"));
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function setFontVariant($value) {
		$GLOBALS['%s']->push("cocktail.core.style.CoreStyle::setFontVariant");
		$»spos = $GLOBALS['%s']->length;
		$this->fontVariant = $value;
		$this->computedStyle->fontVariant = $value;
		$this->invalidate(cocktail_core_renderer_InvalidationReason::styleChanged("font-variant"));
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function setFontFamily($value) {
		$GLOBALS['%s']->push("cocktail.core.style.CoreStyle::setFontFamily");
		$»spos = $GLOBALS['%s']->length;
		$this->fontFamily = $value;
		$this->computedStyle->fontFamily = $value;
		$this->invalidate(cocktail_core_renderer_InvalidationReason::styleChanged("font-family"));
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function setFontStyle($value) {
		$GLOBALS['%s']->push("cocktail.core.style.CoreStyle::setFontStyle");
		$»spos = $GLOBALS['%s']->length;
		$this->fontStyle = $value;
		$this->computedStyle->fontStyle = $value;
		$this->invalidate(cocktail_core_renderer_InvalidationReason::styleChanged("font-style"));
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function setFontWeight($value) {
		$GLOBALS['%s']->push("cocktail.core.style.CoreStyle::setFontWeight");
		$»spos = $GLOBALS['%s']->length;
		$this->fontWeight = $value;
		$this->computedStyle->fontWeight = $value;
		$this->invalidate(cocktail_core_renderer_InvalidationReason::styleChanged("font-weight"));
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function setFontSize($value) {
		$GLOBALS['%s']->push("cocktail.core.style.CoreStyle::setFontSize");
		$»spos = $GLOBALS['%s']->length;
		$this->fontSize = $value;
		$invalidationReason = cocktail_core_renderer_InvalidationReason::styleChanged("font-size");
		$this->invalidate($invalidationReason);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function setZIndex($value) {
		$GLOBALS['%s']->push("cocktail.core.style.CoreStyle::setZIndex");
		$»spos = $GLOBALS['%s']->length;
		$this->zIndex = $value;
		$this->computedStyle->zIndex = $value;
		$this->invalidatePositioningScheme();
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function setClear($value) {
		$GLOBALS['%s']->push("cocktail.core.style.CoreStyle::setClear");
		$»spos = $GLOBALS['%s']->length;
		$this->clear = $value;
		$this->invalidate(cocktail_core_renderer_InvalidationReason::styleChanged("clear"));
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function setCSSFloat($value) {
		$GLOBALS['%s']->push("cocktail.core.style.CoreStyle::setCSSFloat");
		$»spos = $GLOBALS['%s']->length;
		$this->cssFloat = $value;
		$this->invalidatePositioningScheme();
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function setRight($value) {
		$GLOBALS['%s']->push("cocktail.core.style.CoreStyle::setRight");
		$»spos = $GLOBALS['%s']->length;
		$this->right = $value;
		$invalidationReason = cocktail_core_renderer_InvalidationReason::styleChanged("right");
		$this->registerPendingAnimation("right", $invalidationReason, $this->computedStyle->getRight());
		$this->invalidate($invalidationReason);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function setBottom($value) {
		$GLOBALS['%s']->push("cocktail.core.style.CoreStyle::setBottom");
		$»spos = $GLOBALS['%s']->length;
		$this->bottom = $value;
		$invalidationReason = cocktail_core_renderer_InvalidationReason::styleChanged("bottom");
		$this->registerPendingAnimation("bottom", $invalidationReason, $this->computedStyle->getBottom());
		$this->invalidate($invalidationReason);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function setLeft($value) {
		$GLOBALS['%s']->push("cocktail.core.style.CoreStyle::setLeft");
		$»spos = $GLOBALS['%s']->length;
		$this->left = $value;
		$invalidationReason = cocktail_core_renderer_InvalidationReason::styleChanged("left");
		$this->registerPendingAnimation("left", $invalidationReason, $this->computedStyle->getLeft());
		$this->invalidate($invalidationReason);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function setTop($value) {
		$GLOBALS['%s']->push("cocktail.core.style.CoreStyle::setTop");
		$»spos = $GLOBALS['%s']->length;
		$this->top = $value;
		$invalidationReason = cocktail_core_renderer_InvalidationReason::styleChanged("top");
		$this->registerPendingAnimation("top", $invalidationReason, $this->computedStyle->getTop());
		$this->invalidate($invalidationReason);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function setMaxWidth($value) {
		$GLOBALS['%s']->push("cocktail.core.style.CoreStyle::setMaxWidth");
		$»spos = $GLOBALS['%s']->length;
		$this->maxWidth = $value;
		$invalidationReason = cocktail_core_renderer_InvalidationReason::styleChanged("max-width");
		$this->invalidate($invalidationReason);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function setMinWidth($value) {
		$GLOBALS['%s']->push("cocktail.core.style.CoreStyle::setMinWidth");
		$»spos = $GLOBALS['%s']->length;
		$this->minWidth = $value;
		$invalidationReason = cocktail_core_renderer_InvalidationReason::styleChanged("min-width");
		$this->invalidate($invalidationReason);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function setMaxHeight($value) {
		$GLOBALS['%s']->push("cocktail.core.style.CoreStyle::setMaxHeight");
		$»spos = $GLOBALS['%s']->length;
		$this->maxHeight = $value;
		$invalidationReason = cocktail_core_renderer_InvalidationReason::styleChanged("max-height");
		$this->invalidate($invalidationReason);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function setMinHeight($value) {
		$GLOBALS['%s']->push("cocktail.core.style.CoreStyle::setMinHeight");
		$»spos = $GLOBALS['%s']->length;
		$this->minHeight = $value;
		$invalidationReason = cocktail_core_renderer_InvalidationReason::styleChanged("min-height");
		$this->invalidate($invalidationReason);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function setHeight($value) {
		$GLOBALS['%s']->push("cocktail.core.style.CoreStyle::setHeight");
		$»spos = $GLOBALS['%s']->length;
		$this->height = $value;
		$invalidationReason = cocktail_core_renderer_InvalidationReason::styleChanged("height");
		$this->registerPendingAnimation("height", $invalidationReason, $this->computedStyle->getHeight());
		$this->invalidate($invalidationReason);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function setPosition($value) {
		$GLOBALS['%s']->push("cocktail.core.style.CoreStyle::setPosition");
		$»spos = $GLOBALS['%s']->length;
		$this->position = $value;
		$this->computedStyle->position = $value;
		$this->invalidatePositioningScheme();
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function setDisplay($value) {
		$GLOBALS['%s']->push("cocktail.core.style.CoreStyle::setDisplay");
		$»spos = $GLOBALS['%s']->length;
		$this->display = $value;
		$this->invalidatePositioningScheme();
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function setPaddingBottom($value) {
		$GLOBALS['%s']->push("cocktail.core.style.CoreStyle::setPaddingBottom");
		$»spos = $GLOBALS['%s']->length;
		$this->paddingBottom = $value;
		$invalidationReason = cocktail_core_renderer_InvalidationReason::styleChanged("padding-bottom");
		$this->invalidate($invalidationReason);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function setPaddingTop($value) {
		$GLOBALS['%s']->push("cocktail.core.style.CoreStyle::setPaddingTop");
		$»spos = $GLOBALS['%s']->length;
		$this->paddingTop = $value;
		$invalidationReason = cocktail_core_renderer_InvalidationReason::styleChanged("padding-top");
		$this->invalidate($invalidationReason);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function setPaddingRight($value) {
		$GLOBALS['%s']->push("cocktail.core.style.CoreStyle::setPaddingRight");
		$»spos = $GLOBALS['%s']->length;
		$this->paddingRight = $value;
		$invalidationReason = cocktail_core_renderer_InvalidationReason::styleChanged("padding-right");
		$this->invalidate($invalidationReason);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function setPaddingLeft($value) {
		$GLOBALS['%s']->push("cocktail.core.style.CoreStyle::setPaddingLeft");
		$»spos = $GLOBALS['%s']->length;
		$this->paddingLeft = $value;
		$invalidationReason = cocktail_core_renderer_InvalidationReason::styleChanged("padding-left");
		$this->invalidate($invalidationReason);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function setMarginBottom($value) {
		$GLOBALS['%s']->push("cocktail.core.style.CoreStyle::setMarginBottom");
		$»spos = $GLOBALS['%s']->length;
		$this->marginBottom = $value;
		$invalidationReason = cocktail_core_renderer_InvalidationReason::styleChanged("margin-bottom");
		$this->invalidate($invalidationReason);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function setMarginTop($value) {
		$GLOBALS['%s']->push("cocktail.core.style.CoreStyle::setMarginTop");
		$»spos = $GLOBALS['%s']->length;
		$this->marginTop = $value;
		$invalidationReason = cocktail_core_renderer_InvalidationReason::styleChanged("margin-top");
		$this->invalidate($invalidationReason);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function setMarginRight($value) {
		$GLOBALS['%s']->push("cocktail.core.style.CoreStyle::setMarginRight");
		$»spos = $GLOBALS['%s']->length;
		$this->marginRight = $value;
		$invalidationReason = cocktail_core_renderer_InvalidationReason::styleChanged("margin-right");
		$this->invalidate($invalidationReason);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function setMarginLeft($value) {
		$GLOBALS['%s']->push("cocktail.core.style.CoreStyle::setMarginLeft");
		$»spos = $GLOBALS['%s']->length;
		$this->marginLeft = $value;
		$invalidationReason = cocktail_core_renderer_InvalidationReason::styleChanged("margin-left");
		$this->invalidate($invalidationReason);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function setWidth($value) {
		$GLOBALS['%s']->push("cocktail.core.style.CoreStyle::setWidth");
		$»spos = $GLOBALS['%s']->length;
		$this->width = $value;
		$invalidationReason = cocktail_core_renderer_InvalidationReason::styleChanged("width");
		$this->registerPendingAnimation("width", $invalidationReason, $this->computedStyle->getWidth());
		$this->invalidate($invalidationReason);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_fontMetricsData() {
		$GLOBALS['%s']->push("cocktail.core.style.CoreStyle::get_fontMetricsData");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = $this->_fontManager->getFontMetrics(cocktail_core_unit_UnitManager::getCSSFontFamily($this->computedStyle->fontFamily), $this->computedStyle->getFontSize());
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function onTransitionUpdate($transition) {
		$GLOBALS['%s']->push("cocktail.core.style.CoreStyle::onTransitionUpdate");
		$»spos = $GLOBALS['%s']->length;
		$this->invalidate($transition->invalidationReason);
		$GLOBALS['%s']->pop();
	}
	public function onTransitionComplete($transition) {
		$GLOBALS['%s']->push("cocktail.core.style.CoreStyle::onTransitionComplete");
		$»spos = $GLOBALS['%s']->length;
		$this->invalidate($transition->invalidationReason);
		$transitionEvent = new cocktail_core_event_TransitionEvent();
		$transitionEvent->initTransitionEvent("transitionend", true, true, $transition->propertyName, $transition->transitionDuration, "");
		$this->htmlElement->dispatchEvent($transitionEvent);
		$GLOBALS['%s']->pop();
	}
	public function getRepeatedIndex($index, $length) {
		$GLOBALS['%s']->push("cocktail.core.style.CoreStyle::getRepeatedIndex");
		$»spos = $GLOBALS['%s']->length;
		if($index < $length) {
			$GLOBALS['%s']->pop();
			return $index;
		}
		{
			$»tmp = _hx_mod($length, $index);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	public function startTransitionIfNeeded($pendingAnimation) {
		$GLOBALS['%s']->push("cocktail.core.style.CoreStyle::startTransitionIfNeeded");
		$»spos = $GLOBALS['%s']->length;
		$propertyIndex = 0;
		$»t = ($this->computedStyle->transitionProperty);
		switch($»t->index) {
		case 0:
		{
			$GLOBALS['%s']->pop();
			return false;
		}break;
		case 2:
		$value = $»t->params[0];
		{
			$foundFlag = false;
			{
				$_g1 = 0; $_g = $value->length;
				while($_g1 < $_g) {
					$i = $_g1++;
					if($value[$i] === $pendingAnimation->propertyName) {
						$propertyIndex = $i;
						$foundFlag = true;
						break;
					}
					unset($i);
				}
			}
			if($foundFlag === false) {
				$GLOBALS['%s']->pop();
				return false;
			}
		}break;
		case 1:
		{
		}break;
		}
		$combinedDuration = 0.0;
		$transitionDelay = $this->computedStyle->transitionDelay[$this->getRepeatedIndex($propertyIndex, $this->computedStyle->transitionDelay->length)];
		$transitionDuration = $this->computedStyle->transitionDuration[$this->getRepeatedIndex($propertyIndex, $this->computedStyle->transitionDuration->length)];
		$combinedDuration = $transitionDuration + $transitionDelay;
		if($combinedDuration <= 0) {
			$GLOBALS['%s']->pop();
			return false;
		}
		$transitionTimingFunction = $this->computedStyle->transitionTimingFunction[$this->getRepeatedIndex($propertyIndex, $this->computedStyle->transitionTimingFunction->length)];
		$transitionManager = cocktail_core_style_transition_TransitionManager::getInstance();
		$transition = $transitionManager->getTransition($pendingAnimation->propertyName, $this->computedStyle);
		if($transition !== null) {
			$GLOBALS['%s']->pop();
			return false;
		}
		$endValue = Reflect::getProperty($this->computedStyle, $pendingAnimation->propertyName);
		$transitionManager->startTransition($this->computedStyle, $pendingAnimation->propertyName, $pendingAnimation->startValue, $endValue, $transitionDuration, $transitionDelay, $transitionTimingFunction, (isset($this->onTransitionComplete) ? $this->onTransitionComplete: array($this, "onTransitionComplete")), (isset($this->onTransitionUpdate) ? $this->onTransitionUpdate: array($this, "onTransitionUpdate")), $pendingAnimation->invalidationReason);
		{
			$GLOBALS['%s']->pop();
			return true;
		}
		$GLOBALS['%s']->pop();
	}
	public function registerPendingAnimation($propertyName, $invalidationReason, $startValue) {
		$GLOBALS['%s']->push("cocktail.core.style.CoreStyle::registerPendingAnimation");
		$»spos = $GLOBALS['%s']->length;
		$this->_pendingAnimations->push(_hx_anonymous(array("propertyName" => $propertyName, "invalidationReason" => $invalidationReason, "startValue" => $startValue)));
		$GLOBALS['%s']->pop();
	}
	public function startPendingAnimations() {
		$GLOBALS['%s']->push("cocktail.core.style.CoreStyle::startPendingAnimations");
		$»spos = $GLOBALS['%s']->length;
		$atLeastOneAnimationStarted = false;
		{
			$_g1 = 0; $_g = $this->_pendingAnimations->length;
			while($_g1 < $_g) {
				$i = $_g1++;
				$animationStarted = $this->startTransitionIfNeeded($this->_pendingAnimations[$i]);
				if($animationStarted === true) {
					$atLeastOneAnimationStarted = true;
				}
				unset($i,$animationStarted);
			}
		}
		$this->_pendingAnimations = new _hx_array(array());
		{
			$GLOBALS['%s']->pop();
			return $atLeastOneAnimationStarted;
		}
		$GLOBALS['%s']->pop();
	}
	public function invalidatePositioningScheme() {
		$GLOBALS['%s']->push("cocktail.core.style.CoreStyle::invalidatePositioningScheme");
		$»spos = $GLOBALS['%s']->length;
		$this->htmlElement->invalidatePositioningScheme();
		$GLOBALS['%s']->pop();
	}
	public function invalidate($invalidationReason) {
		$GLOBALS['%s']->push("cocktail.core.style.CoreStyle::invalidate");
		$»spos = $GLOBALS['%s']->length;
		$this->htmlElement->invalidate($invalidationReason);
		$GLOBALS['%s']->pop();
	}
	public function applyDefaultHTMLStyles($tagName) {
		$GLOBALS['%s']->push("cocktail.core.style.CoreStyle::applyDefaultHTMLStyles");
		$»spos = $GLOBALS['%s']->length;
		switch(strtoupper($tagName)) {
		case "HTML":case "ADRESS":case "DD":case "DIV":case "DL":case "DT":case "FIELDSET":case "FORM":case "FRAME":case "FRAMESET":case "NOFRAMES":case "OL":case "CENTER":case "DIR":case "HR":case "MENU":{
			$this->setDisplay(cocktail_core_style_Display::$block);
		}break;
		case "LI":{
			$this->setDisplay(cocktail_core_style_Display::$block);
		}break;
		case "A":{
			$this->setCursor(cocktail_core_style_Cursor::$pointer);
		}break;
		case "UL":{
			$this->setDisplay(cocktail_core_style_Display::$block);
			$this->setMarginTop($this->setMarginBottom(cocktail_core_style_Margin::length(cocktail_core_unit_Length::em(1.12))));
			$this->setMarginLeft(cocktail_core_style_Margin::length(cocktail_core_unit_Length::px(40)));
		}break;
		case "HEAD":{
			$this->setDisplay(cocktail_core_style_Display::$none);
		}break;
		case "BODY":{
			$this->setDisplay(cocktail_core_style_Display::$block);
			$this->setMarginLeft($this->setMarginRight($this->setMarginTop($this->setMarginBottom(cocktail_core_style_Margin::length(cocktail_core_unit_Length::px(8))))));
		}break;
		case "H1":{
			$this->setDisplay(cocktail_core_style_Display::$block);
			$this->setFontSize(cocktail_core_style_FontSize::length(cocktail_core_unit_Length::em(2)));
			$this->setFontWeight(cocktail_core_style_FontWeight::$bolder);
			$this->setMarginTop($this->setMarginBottom(cocktail_core_style_Margin::length(cocktail_core_unit_Length::em(0.67))));
		}break;
		case "H2":{
			$this->setDisplay(cocktail_core_style_Display::$block);
			$this->setFontSize(cocktail_core_style_FontSize::length(cocktail_core_unit_Length::em(1.5)));
			$this->setFontWeight(cocktail_core_style_FontWeight::$bolder);
			$this->setMarginTop($this->setMarginBottom(cocktail_core_style_Margin::length(cocktail_core_unit_Length::em(0.75))));
		}break;
		case "H3":{
			$this->setDisplay(cocktail_core_style_Display::$block);
			$this->setFontSize(cocktail_core_style_FontSize::length(cocktail_core_unit_Length::em(1.17)));
			$this->setFontWeight(cocktail_core_style_FontWeight::$bolder);
			$this->setMarginTop($this->setMarginBottom(cocktail_core_style_Margin::length(cocktail_core_unit_Length::em(0.83))));
		}break;
		case "H4":{
			$this->setDisplay(cocktail_core_style_Display::$block);
			$this->setFontWeight(cocktail_core_style_FontWeight::$bolder);
			$this->setMarginTop($this->setMarginBottom(cocktail_core_style_Margin::length(cocktail_core_unit_Length::em(1.12))));
		}break;
		case "H5":{
			$this->setDisplay(cocktail_core_style_Display::$block);
			$this->setFontSize(cocktail_core_style_FontSize::length(cocktail_core_unit_Length::em(0.83)));
			$this->setFontWeight(cocktail_core_style_FontWeight::$bolder);
			$this->setMarginTop($this->setMarginBottom(cocktail_core_style_Margin::length(cocktail_core_unit_Length::em(1.5))));
		}break;
		case "H6":{
			$this->setDisplay(cocktail_core_style_Display::$block);
			$this->setFontSize(cocktail_core_style_FontSize::length(cocktail_core_unit_Length::em(0.75)));
			$this->setFontWeight(cocktail_core_style_FontWeight::$bolder);
			$this->setMarginTop($this->setMarginBottom(cocktail_core_style_Margin::length(cocktail_core_unit_Length::em(1.67))));
		}break;
		case "P":{
			$this->setDisplay(cocktail_core_style_Display::$block);
			$this->setMarginTop($this->setMarginBottom(cocktail_core_style_Margin::length(cocktail_core_unit_Length::em(1))));
		}break;
		case "PRE":{
			$this->setDisplay(cocktail_core_style_Display::$block);
			$this->setWhiteSpace(cocktail_core_style_WhiteSpace::$pre);
			$this->setFontFamily(new _hx_array(array("monospace")));
		}break;
		case "CODE":{
			$this->setFontFamily(new _hx_array(array("monospace")));
		}break;
		case "I":case "CITE":case "EM":case "VAR":{
			$this->setFontStyle(cocktail_core_style_FontStyle::$italic);
		}break;
		case "INPUT":{
			$this->setDisplay(cocktail_core_style_Display::$inlineBlock);
		}break;
		case "BLOCKQUOTE":{
			$this->setDisplay(cocktail_core_style_Display::$block);
			$this->setMarginTop($this->setMarginBottom(cocktail_core_style_Margin::length(cocktail_core_unit_Length::em(1.12))));
			$this->setMarginLeft($this->setMarginRight(cocktail_core_style_Margin::length(cocktail_core_unit_Length::px(40))));
		}break;
		case "STRONG":{
			$this->setFontWeight(cocktail_core_style_FontWeight::$bolder);
		}break;
		case "BIG":{
			$this->setFontSize(cocktail_core_style_FontSize::length(cocktail_core_unit_Length::em(1.17)));
		}break;
		case "SMALL":{
			$this->setFontSize(cocktail_core_style_FontSize::length(cocktail_core_unit_Length::em(0.83)));
		}break;
		case "SUB":{
			$this->setFontSize(cocktail_core_style_FontSize::length(cocktail_core_unit_Length::em(0.83)));
			$this->setVerticalAlign(cocktail_core_style_VerticalAlign::$sub);
		}break;
		case "SUP":{
			$this->setFontSize(cocktail_core_style_FontSize::length(cocktail_core_unit_Length::em(0.83)));
			$this->setVerticalAlign(cocktail_core_style_VerticalAlign::$cssSuper);
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	public function initComputedStyles() {
		$GLOBALS['%s']->push("cocktail.core.style.CoreStyle::initComputedStyles");
		$»spos = $GLOBALS['%s']->length;
		$this->computedStyle->init();
		$GLOBALS['%s']->pop();
	}
	public function initDefaultStyleValues($tagName) {
		$GLOBALS['%s']->push("cocktail.core.style.CoreStyle::initDefaultStyleValues");
		$»spos = $GLOBALS['%s']->length;
		$this->computedStyle = new cocktail_core_style_ComputedStyle($this);
		$this->initComputedStyles();
		$this->setWidth(cocktail_core_style_CoreStyle::getWidthDefaultValue());
		$this->setHeight(cocktail_core_style_CoreStyle::getHeightDefaultValue());
		$this->setMinWidth(cocktail_core_style_CoreStyle::getMinWidthDefaultValue());
		$this->setMaxWidth(cocktail_core_style_CoreStyle::getMaxWidthDefaultValue());
		$this->setMinHeight(cocktail_core_style_CoreStyle::getMinHeightDefaultValue());
		$this->setMaxHeight(cocktail_core_style_CoreStyle::getMaxHeightDefaultValue());
		$this->setMarginTop(cocktail_core_style_Margin::length(cocktail_core_unit_Length::px(0)));
		$this->setMarginBottom(cocktail_core_style_Margin::length(cocktail_core_unit_Length::px(0)));
		$this->setMarginLeft(cocktail_core_style_Margin::length(cocktail_core_unit_Length::px(0)));
		$this->setMarginRight(cocktail_core_style_Margin::length(cocktail_core_unit_Length::px(0)));
		$this->setPaddingTop(cocktail_core_style_Padding::length(cocktail_core_unit_Length::px(0)));
		$this->setPaddingBottom(cocktail_core_style_Padding::length(cocktail_core_unit_Length::px(0)));
		$this->setPaddingLeft(cocktail_core_style_Padding::length(cocktail_core_unit_Length::px(0)));
		$this->setPaddingRight(cocktail_core_style_Padding::length(cocktail_core_unit_Length::px(0)));
		$this->setLineHeight(cocktail_core_style_LineHeight::$normal);
		$this->setVerticalAlign(cocktail_core_style_VerticalAlign::$baseline);
		$this->setDisplay(cocktail_core_style_Display::$cssInline);
		$this->setPosition(cocktail_core_style_Position::$cssStatic);
		$this->setZIndex(cocktail_core_style_ZIndex::$cssAuto);
		$this->setTop(cocktail_core_style_PositionOffset::$cssAuto);
		$this->setBottom(cocktail_core_style_PositionOffset::$cssAuto);
		$this->setLeft(cocktail_core_style_PositionOffset::$cssAuto);
		$this->setRight(cocktail_core_style_PositionOffset::$cssAuto);
		$this->setCSSFloat(cocktail_core_style_CSSFloat::$none);
		$this->setClear(cocktail_core_style_Clear::$none);
		$this->setBackgroundColor(cocktail_core_unit_CSSColor::$transparent);
		$this->setBackgroundImage(new _hx_array(array(cocktail_core_style_BackgroundImage::$none)));
		$this->setBackgroundRepeat(new _hx_array(array(_hx_anonymous(array("x" => cocktail_core_style_BackgroundRepeatValue::$repeat, "y" => cocktail_core_style_BackgroundRepeatValue::$repeat)))));
		$this->setBackgroundPosition(cocktail_core_style_CoreStyle::getBackgroundPositionDefaultValue());
		$this->setBackgroundOrigin(new _hx_array(array(cocktail_core_style_BackgroundOrigin::$paddingBox)));
		$this->setBackgroundSize(new _hx_array(array(cocktail_core_style_BackgroundSize::dimensions(_hx_anonymous(array("x" => cocktail_core_style_BackgroundSizeDimension::$cssAuto, "y" => cocktail_core_style_BackgroundSizeDimension::$cssAuto))))));
		$this->setBackgroundClip(new _hx_array(array(cocktail_core_style_BackgroundClip::$borderBox)));
		$this->setFontStyle(cocktail_core_style_FontStyle::$normal);
		$this->setFontVariant(cocktail_core_style_FontVariant::$normal);
		$this->setFontWeight(cocktail_core_style_FontWeight::$normal);
		$this->setFontSize(cocktail_core_style_FontSize::absoluteSize(cocktail_core_unit_FontSizeAbsoluteSize::$medium));
		$this->setTextIndent(cocktail_core_style_TextIndent::length(cocktail_core_unit_Length::px(0)));
		$this->setTextAlign(cocktail_core_style_TextAlign::$left);
		$this->setLetterSpacing(cocktail_core_style_LetterSpacing::$normal);
		$this->setWordSpacing(cocktail_core_style_WordSpacing::$normal);
		$this->setTextTransform(cocktail_core_style_TextTransform::$none);
		$this->setWhiteSpace(cocktail_core_style_WhiteSpace::$normal);
		$this->setVisibility(cocktail_core_style_Visibility::$visible);
		$this->setOpacity(1.0);
		$this->setOverflowX(cocktail_core_style_Overflow::$visible);
		$this->setOverflowY(cocktail_core_style_Overflow::$visible);
		$this->setTransitionDelay(new _hx_array(array(cocktail_core_unit_TimeValue::seconds(0))));
		$this->setTransitionDuration(new _hx_array(array(cocktail_core_unit_TimeValue::seconds(0))));
		$this->setTransitionProperty(cocktail_core_style_TransitionProperty::$all);
		$this->setTransitionTimingFunction(new _hx_array(array(cocktail_core_style_TransitionTimingFunctionValue::$ease)));
		$this->setTransformOrigin(_hx_anonymous(array("x" => cocktail_core_style_TransformOriginX::$center, "y" => cocktail_core_style_TransformOriginY::$center)));
		$this->setTransform(cocktail_core_style_Transform::$none);
		$this->setCursor(cocktail_core_style_Cursor::$cssAuto);
		$defaultStyles = cocktail_core_style_CoreStyle::getDefaultStyle();
		$this->setFontFamily($defaultStyles->fontFamily);
		$this->setColor($defaultStyles->color);
		$this->applyDefaultHTMLStyles($tagName);
		$GLOBALS['%s']->pop();
	}
	public $_pendingAnimations;
	public $_fontManager;
	public $htmlElement;
	public $fontMetrics;
	public $computedStyle;
	public $transitionTimingFunction;
	public $transitionDelay;
	public $transitionDuration;
	public $transitionProperty;
	public $cursor;
	public $transform;
	public $transformOrigin;
	public $overflowY;
	public $overflowX;
	public $visibility;
	public $opacity;
	public $verticalAlign;
	public $textIndent;
	public $textAlign;
	public $whiteSpace;
	public $wordSpacing;
	public $letterSpacing;
	public $textTransform;
	public $lineHeight;
	public $color;
	public $fontVariant;
	public $fontFamily;
	public $fontStyle;
	public $fontWeight;
	public $fontSize;
	public $backgroundClip;
	public $backgroundPosition;
	public $backgroundSize;
	public $backgroundOrigin;
	public $backgroundRepeat;
	public $backgroundImage;
	public $backgroundColor;
	public $right;
	public $bottom;
	public $left;
	public $top;
	public $maxWidth;
	public $minWidth;
	public $maxHeight;
	public $minHeight;
	public $height;
	public $width;
	public $paddingBottom;
	public $paddingTop;
	public $paddingRight;
	public $paddingLeft;
	public $marginBottom;
	public $marginTop;
	public $marginRight;
	public $marginLeft;
	public $zIndex;
	public $clear;
	public $cssFloat;
	public $position;
	public $display;
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
	static function getDefaultStyle() {
		$GLOBALS['%s']->push("cocktail.core.style.CoreStyle::getDefaultStyle");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = _hx_anonymous(array("fontFamily" => new _hx_array(array("serif")), "color" => cocktail_core_style_CoreStyle::getColorDefaultValue()));
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function getBackgroundColorDefaultValue() {
		$GLOBALS['%s']->push("cocktail.core.style.CoreStyle::getBackgroundColorDefaultValue");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = cocktail_core_unit_CSSColor::$transparent;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function getBackgroundPositionDefaultValue() {
		$GLOBALS['%s']->push("cocktail.core.style.CoreStyle::getBackgroundPositionDefaultValue");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = new _hx_array(array(_hx_anonymous(array("x" => cocktail_core_style_BackgroundPositionX::percent(0), "y" => cocktail_core_style_BackgroundPositionY::percent(0)))));
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function getColorDefaultValue() {
		$GLOBALS['%s']->push("cocktail.core.style.CoreStyle::getColorDefaultValue");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = cocktail_core_unit_CSSColor::keyword(cocktail_core_unit_ColorKeyword::$black);
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function getDisplayDefaultValue() {
		$GLOBALS['%s']->push("cocktail.core.style.CoreStyle::getDisplayDefaultValue");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = cocktail_core_style_Display::$cssInline;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function getPositionDefaultValue() {
		$GLOBALS['%s']->push("cocktail.core.style.CoreStyle::getPositionDefaultValue");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = cocktail_core_style_Position::$cssStatic;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function getWidthDefaultValue() {
		$GLOBALS['%s']->push("cocktail.core.style.CoreStyle::getWidthDefaultValue");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = cocktail_core_style_Dimension::$cssAuto;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function getHeightDefaultValue() {
		$GLOBALS['%s']->push("cocktail.core.style.CoreStyle::getHeightDefaultValue");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = cocktail_core_style_Dimension::$cssAuto;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function getMinHeightDefaultValue() {
		$GLOBALS['%s']->push("cocktail.core.style.CoreStyle::getMinHeightDefaultValue");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = cocktail_core_style_ConstrainedDimension::length(cocktail_core_unit_Length::px(0));
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function getMinWidthDefaultValue() {
		$GLOBALS['%s']->push("cocktail.core.style.CoreStyle::getMinWidthDefaultValue");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = cocktail_core_style_ConstrainedDimension::length(cocktail_core_unit_Length::px(0));
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function getMaxWidthDefaultValue() {
		$GLOBALS['%s']->push("cocktail.core.style.CoreStyle::getMaxWidthDefaultValue");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = cocktail_core_style_ConstrainedDimension::$none;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function getMaxHeightDefaultValue() {
		$GLOBALS['%s']->push("cocktail.core.style.CoreStyle::getMaxHeightDefaultValue");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = cocktail_core_style_ConstrainedDimension::$none;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function getMarginDefaultValue() {
		$GLOBALS['%s']->push("cocktail.core.style.CoreStyle::getMarginDefaultValue");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = cocktail_core_style_Margin::length(cocktail_core_unit_Length::px(0));
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function getPaddingDefaultValue() {
		$GLOBALS['%s']->push("cocktail.core.style.CoreStyle::getPaddingDefaultValue");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = cocktail_core_style_Padding::length(cocktail_core_unit_Length::px(0));
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function getLineHeightDefaultValue() {
		$GLOBALS['%s']->push("cocktail.core.style.CoreStyle::getLineHeightDefaultValue");
		$»spos = $GLOBALS['%s']->length;
		{
			$»tmp = cocktail_core_style_LineHeight::$normal;
			$GLOBALS['%s']->pop();
			return $»tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static $__properties__ = array("set_display" => "setDisplay","set_position" => "setPosition","set_cssFloat" => "setCSSFloat","set_clear" => "setClear","set_zIndex" => "setZIndex","set_marginLeft" => "setMarginLeft","set_marginRight" => "setMarginRight","set_marginTop" => "setMarginTop","set_marginBottom" => "setMarginBottom","set_paddingLeft" => "setPaddingLeft","set_paddingRight" => "setPaddingRight","set_paddingTop" => "setPaddingTop","set_paddingBottom" => "setPaddingBottom","set_width" => "setWidth","set_height" => "setHeight","set_minHeight" => "setMinHeight","set_maxHeight" => "setMaxHeight","set_minWidth" => "setMinWidth","set_maxWidth" => "setMaxWidth","set_top" => "setTop","set_left" => "setLeft","set_bottom" => "setBottom","set_right" => "setRight","set_backgroundColor" => "setBackgroundColor","set_backgroundImage" => "setBackgroundImage","set_backgroundRepeat" => "setBackgroundRepeat","set_backgroundOrigin" => "setBackgroundOrigin","set_backgroundSize" => "setBackgroundSize","set_backgroundPosition" => "setBackgroundPosition","set_backgroundClip" => "setBackgroundClip","set_fontSize" => "setFontSize","set_fontWeight" => "setFontWeight","set_fontStyle" => "setFontStyle","set_fontFamily" => "setFontFamily","set_fontVariant" => "setFontVariant","set_color" => "setColor","set_lineHeight" => "setLineHeight","set_textTransform" => "setTextTransform","set_letterSpacing" => "setLetterSpacing","set_wordSpacing" => "setWordSpacing","set_whiteSpace" => "setWhiteSpace","set_textAlign" => "setTextAlign","set_textIndent" => "setTextIndent","set_verticalAlign" => "setVerticalAlign","set_opacity" => "setOpacity","set_visibility" => "setVisibility","set_overflowX" => "setOverflowX","set_overflowY" => "setOverflowY","set_transformOrigin" => "setTransformOrigin","set_transform" => "setTransform","set_cursor" => "setCursor","set_transitionProperty" => "setTransitionProperty","set_transitionDuration" => "setTransitionDuration","set_transitionDelay" => "setTransitionDelay","set_transitionTimingFunction" => "setTransitionTimingFunction","get_fontMetrics" => "get_fontMetricsData");
	function __toString() { return 'cocktail.core.style.CoreStyle'; }
}
